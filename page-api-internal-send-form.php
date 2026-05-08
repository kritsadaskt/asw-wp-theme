<?php 
$data = jpx_getPost();
$msg = [];
if ($data != false) {
	$form_id = $data['form_id'];
	$post_type = $data['post_type'];
	$page_title = $data['page_title'];
	$page_url = $data['page_url'];

	$_ref = "FormID: $form_id - Page: $page_title ($page_url)";

	$form_data = $data['form_data'];
	$option_slug = 'cf7api_'.$form_id;
	$args = array(
		'name'        => $option_slug,
		'post_type'   => 'cf7_api',
		'numberposts' => 1
	);
	$option_post = get_posts($args);
	if (!$option_post) {
		$msg['option_status'] = 100;
	}else{
		$option_id = $option_post[0]->ID;
		$option_data_field = get_fields($option_id);
		$msg['option_status'] = 200;
		$msg['option_data'] = $option_data_field;
		if ($option_data_field['auto_delete_days'] != '') {
			$_delete_count_day = intval($option_data_field['auto_delete_days']);
			if (!is_int($_delete_count_day)) {
				$_delete_count_day = 1;
			}
		}
	}
	$msg['status'] = 200;
	$msg['payload'] = $data;
	$msg['form_id'] = $form_id;
}else{
	$msg['status'] = 'void';
}
$msg['json_position'] = 2;
echo json_encode($msg,JSON_UNESCAPED_UNICODE);
?>
