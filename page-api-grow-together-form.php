<?php

/**
 * Grow Together form API endpoint
 *
 * Expected payload (JSON in $_POST['json']):
 * {
 *   "token": "recaptcha_token",
 *   "action": "grow_together",
 *   "form_values": {
 *     "shopName": "...",
 *     "contactNumber": "...",
 *     "email": "...",
 *     "address": "...",
 *     "productType": "...",
 *     "promotion": "...",
 *     "promotionPeriod": "..."
 *   }
 * }
 */

if (!defined('ABSPATH')) {
    exit;
}

$data = function_exists('jpx_getPost') ? jpx_getPost() : null;
$response = array(
    'status' => 'error',
    'reason' => 'invalid_request',
);

if (!$data || !is_array($data)) {
    $response['reason'] = 'no_data';
    wp_send_json($response);
}

$token  = isset($data['token']) ? $data['token'] : '';
$action = isset($data['action']) ? $data['action'] : '';
$values = isset($data['form_values']) && is_array($data['form_values']) ? $data['form_values'] : array();

// Basic validation: required fields.
$required_fields = array('shopName', 'contactNumber', 'email', 'address');
foreach ($required_fields as $field) {
    if (empty($values[$field])) {
        wp_send_json(array(
            'status' => 'error',
            'reason' => 'validation_failed',
            'message' => 'กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน',
        ));
    }
}

// Verify reCAPTCHA v3 token.
if (!function_exists('asw_verify_recaptcha_v3')) {
    wp_send_json(array(
        'status' => 'error',
        'reason' => 'recaptcha_not_configured',
    ));
}

$verify = asw_verify_recaptcha_v3($token, $action);

if (empty($verify['success'])) {
    wp_send_json(array(
        'status' => 'error',
        'reason' => 'recaptcha_failed',
    ));
}

// Server-side sanitization.
$shop_name        = sanitize_text_field($values['shopName']);
$contact_number   = sanitize_text_field($values['contactNumber']);
$email            = sanitize_email($values['email']);
$address          = sanitize_text_field($values['address']);
$product_type     = isset($values['productType']) ? sanitize_text_field($values['productType']) : '';
$promotion        = isset($values['promotion']) ? sanitize_textarea_field($values['promotion']) : '';
$promotion_period = isset($values['promotionPeriod']) ? sanitize_text_field($values['promotionPeriod']) : '';

if (!is_email($email)) {
    wp_send_json(array(
        'status' => 'error',
        'reason' => 'validation_failed',
        'message' => 'รูปแบบอีเมลไม่ถูกต้อง',
    ));
}

// Store or send the form data. For now, send an email to the site admin.

// Send data to the webhook endpoint
try {
    $webhook_url = 'https://node.assetwise.dev/webhook/asw-grow-together';

    $webhook_payload = array(
        'createdAt'        => current_time('mysql', 1),
        'shopName'         => $shop_name,
        'contactNumber'    => $contact_number,
        'email'            => $email,
        'address'          => $address,
        'productType'      => $product_type,
        'promotion'        => $promotion,
        'promotionPeriod'  => $promotion_period,
        'recaptcha_score'  => isset($verify['score']) ? $verify['score'] : null,
        'utm_source'       => isset($_GET['utm_source']) ? $_GET['utm_source'] : null,
        'utm_medium'       => isset($_GET['utm_medium']) ? $_GET['utm_medium'] : null,
        'utm_campaign'     => isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : null,
        'utm_term'         => isset($_GET['utm_term']) ? $_GET['utm_term'] : null,
        'utm_content'      => isset($_GET['utm_content']) ? $_GET['utm_content'] : null,
    );

    $webhook_args = array(
        'headers' => array('Content-Type' => 'application/json'),
        'timeout' => 8,
        'body'    => wp_json_encode($webhook_payload),
    );

    // Fire webhook (ignore response, but optionally you could log it)
    $webhook_response = wp_remote_post($webhook_url, $webhook_args);
    // Not failing request regardless of webhook error.
} catch (Exception $e) {
    // Silently fail; optionally log error or leave empty
    error_log('Webhook error: ' . $e->getMessage());
}


$admin_email = array('napat.t@assetwise.co.th', 'rada@assetwise.co.th');
$bcc_email = get_option('admin_email');
$subject = sprintf('[Grow Together] ลงทะเบียนร้านค้าใหม่จาก %s', $shop_name);

$headers = array('Content-Type: text/html; charset=UTF-8', 'Bcc: ' . implode(',', $bcc_email));

$body_lines = array(
    '<strong>ชื่อร้านค้า:</strong> ' . $shop_name . '<br>',
    '<strong>เบอร์ติดต่อ:</strong> ' . $contact_number . '<br>',
    '<strong>อีเมล:</strong> ' . $email . '<br>',
    '<strong>ที่อยู่ร้านค้า:</strong> ' . $address . '<br>',
    '<strong>ประเภทผลิตภัณฑ์:</strong> ' . $product_type . '<br>',
    '<strong>โปรโมชั่นที่ต้องการให้ส่วนลด:</strong> ' . $promotion . '<br>',
    '<strong>ระยะเวลาโปรโมชั่น:</strong> ' . $promotion_period . '<br>',
    '<strong>utm_source:</strong> ' . (isset($_GET['utm_source']) ? $_GET['utm_source'] : '-') . '<br>',
    '<strong>utm_medium:</strong> ' . (isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '-') . '<br>',
    '<strong>utm_campaign:</strong> ' . (isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '-') . '<br>',
    '<strong>utm_term:</strong> ' . (isset($_GET['utm_term']) ? $_GET['utm_term'] : '-') . '<br>',
    '<strong>utm_content:</strong> ' . (isset($_GET['utm_content']) ? $_GET['utm_content'] : '-') . '<br>',
    '<div style="display: none;"><strong>SPAM SCORE:</strong> ' . (isset($verify['score']) ? $verify['score'] : 'n/a') . '</div>',
);

$body = implode("\n", $body_lines);

wp_mail($admin_email, $subject, $body, $headers);

wp_send_json(array(
    'status' => 'success',
));


