<?php 
if (current_user_can('administrator')) {
	$data = jpx_getPost();
	$msg = [];
	$cf7_api_id = $_GET['cf7_api_id'];
	if ($data != false AND $cf7_api_id != '') {
		$json = $data;
		$msg['payload'] = $json;
		$msg['cf7_api_id'] = $cf7_api_id;
		foreach ($json as $key => $value) {
			update_field($key,$value,$cf7_api_id);
		}
		$msg['status'] = 200;
	}else{
		$msg['status'] = 'void';
	}
	echo json_encode($msg);
}else{
	echo 'admin only';
}
?>
