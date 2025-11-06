<?php 
$data = jpx_getPost();
$msg = [];
$f = get_fields($cf7_api_id);
if ($data != false) {
	$json = $data;
	$form_id = $data['form_id'];
	$form_data = $data['form_data'];
	$hash_value = $data['hash_value'];
	$the_slug = 'cf7api_'.$form_id;
	$args = array(
		'name'        => $the_slug,
		'post_type'   => 'cf7_api',
		'numberposts' => 1
	);
	$my_posts = get_posts($args);

	$msg['payload'] = $json;
	$msg['form_id'] = $form_id;

	$_delete_count_day = 1;
	$_delete_on = time();

	if (!$my_posts) {
		$msg['option_status'] = 100;
	}else{
		$option_id = $my_posts[0]->ID;
		$f = get_fields($option_id);
		$msg['option_status'] = 200;
		$msg['option_data'] = $f;
		if ($f['auto_delete_days'] != '') {
			$_delete_count_day = intval($f['auto_delete_days']);
			if (!is_int($_delete_count_day)) {
				$_delete_count_day = 1;
			}
		}
	}
	$msg['status'] = 200;
	$hash = hash('sha256', time().$hash_value);
	$log_title = $data['page_title']." - User: ".$data['form_value']['email'];
	$my_new_post = array(
		'post_title'	=> $log_title,
		'post_name' 	=> $hash,
		'post_status'	=> 'publish',
		'post_type'		=> 'form_api_log',
	);
	$new_post = wp_insert_post( $my_new_post );
	$msg['post_log'] = $new_post;
	$msg['hash'] = $hash;
	$_delete_on += $_delete_count_day*86400;
	$_data = json_encode($msg,JSON_UNESCAPED_UNICODE);

	update_field('_delete_count_day',$_delete_count_day,$new_post);
	update_field('_delete_on',$_delete_on,$new_post);
	update_field('_data',$_data,$new_post);
}else{
	$msg['status'] = 'void';
}
echo json_encode($msg);

?>
