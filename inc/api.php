<?php
function handle_grow_together_form()
{
  // Verify request method
  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    wp_send_json_error('Invalid request method');
    return;
  }

  // Get and sanitize form data
  $shop_name = sanitize_text_field($_POST['shopName'] ?? '');
  $contact_number = sanitize_text_field($_POST['contactNumber'] ?? '');
  $email = sanitize_email($_POST['email'] ?? '');
  $address = sanitize_text_field($_POST['address'] ?? '');
  $product_type = sanitize_text_field($_POST['productType'] ?? '');
  $promotion = sanitize_textarea_field($_POST['promotion'] ?? '');
  $promotion_period = sanitize_text_field($_POST['promotionPeriod'] ?? '');
  $utm_source = sanitize_text_field($_POST['utm_source'] ?? '');
  $utm_medium = sanitize_text_field($_POST['utm_medium'] ?? '');
  $utm_campaign = sanitize_text_field($_POST['utm_campaign'] ?? '');
  $utm_content = sanitize_text_field($_POST['utm_content'] ?? '');
  $utm_term = sanitize_text_field($_POST['utm_term'] ?? '');

  // Validate required fields
  $required_fields = [
    'createdAt' => date('Y-m-d H:i:s', strtotime('+7 hours')),
    'shopName' => $shop_name,
    'contactNumber' => $contact_number,
    'email' => $email,
    'address' => $address,
    'productType' => $product_type,
    'promotion' => $promotion,
    'promotionPeriod' => $promotion_period,
    'utm_source' => $utm_source === 'undefined' ? '' : $utm_source,
    'utm_medium' => $utm_medium === 'undefined' ? '' : $utm_medium,
    'utm_campaign' => $utm_campaign === 'undefined' ? '' : $utm_campaign,
    'utm_content' => $utm_content === 'undefined' ? '' : $utm_content,
    'utm_term' => $utm_term === 'undefined' ? '' : $utm_term
  ];

  // Send data to webhook endpoint
  // $webhook_url = 'https://node.assetwise.dev/webhook-test/asw-grow-together';
  $webhook_url = 'https://node.assetwise.dev/webhook/asw-grow-together';

  $response = wp_remote_post($webhook_url, array(
    'headers'     => array('Content-Type' => 'application/json'),
    'body'        => json_encode($required_fields),
    'timeout'     => 30
  ));

  if (is_wp_error($response)) {
    wp_send_json_error(array(
      'message' => 'Failed to send data to webhook',
      'error' => $response->get_error_message()
    ));
    return;
  }

  $response_code = wp_remote_retrieve_response_code($response);
  if ($response_code !== 200) {
    wp_send_json_error(array(
      'message' => 'Webhook returned error',
      'code' => $response_code
    ));
    return;
  }

  // Set up email content
  $to = 'napat.t@assetwise.co.th, rada@assetwise.co.th';
  $subject = 'ลงทะเบียนร้านค้า - Assetwise Club - Grow Together';

  $message = "<strong>ชื่อร้านค้า:</strong> $shop_name<br>";
  $message .= "<strong>เบอร์ติดต่อ:</strong> $contact_number<br>";
  $message .= "<strong>อีเมล:</strong> $email<br>";
  $message .= "<strong>ที่อยู่ร้านค้า:</strong> $address<br>";
  $message .= "<strong>ประเภทผลิตภัณฑ์:</strong> $product_type<br>";
  $message .= "<strong>โปรโมชั่นที่ต้องการให้ส่วนลด:</strong> $promotion<br>";
  $message .= "<strong>ระยะเวลาโปรโมชั่น:</strong> $promotion_period<br>";

  // Email headers
  $headers = array('Content-Type: text/html; charset=UTF-8', 'Cc: kritsada.s@assetwise.co.th');

  // Send email
  $sent = wp_mail($to, $subject, $message, $headers);

  if ($sent) {
    wp_send_json_success([
      'message' => 'Form submitted successfully',
      'data' => [
        'shop_name' => $shop_name,
        'email' => $email
      ]
    ]);

    // Write to log file
    $log_file = dirname(__FILE__) . '/api-log.txt';
    
    // Check if file exists and is writable
    if (!file_exists($log_file)) {
        if (!touch($log_file)) {
            wp_send_json_error('Could not create log file');
            return;
        }
    }
    
    if (!is_writable($log_file)) {
        wp_send_json_error('Log file is not writable');
        return;
    }
    
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] Form submitted successfully :\nShop Name: {$shop_name}\nPhone: {$contact_number}\nEmail: {$email}\nAddress: {$address}\nProduct Type: {$product_type}\nPromotion: {$promotion}\nPromotion Period: {$promotion_period}\nEmail sent: Yes\n";
    $log_message .= "----------------------------------------\n";
    
    if (file_put_contents($log_file, $log_message, FILE_APPEND) === false) {
        wp_send_json_error('Failed to write to log file');
        return;
    }

  } else {
    wp_send_json_error('Failed to send email');

    // Write to log file
    $log_file = dirname(__FILE__) . '/api-log.txt';
    $timestamp = date('Y-m-d H:i:s');
    $log_message = "[{$timestamp}] Error Form Submitted :\nShop Name: {$shop_name}\nPhone: {$contact_number}\nEmail: {$email}\nAddress: {$address}\nProduct Type: {$product_type}\nPromotion: {$promotion}\nPromotion Period: {$promotion_period}\nEmail sent: No\n";
    $log_message .= "----------------------------------------\n";
    if (file_put_contents($log_file, $log_message, FILE_APPEND) === false) {
        wp_send_json_error('Failed to write to log file');
        return;
    }
  }
}

add_action('wp_ajax_handle_grow_together_form', 'handle_grow_together_form');
add_action('wp_ajax_nopriv_handle_grow_together_form', 'handle_grow_together_form');
