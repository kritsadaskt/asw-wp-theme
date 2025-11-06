<?php 
$data = jpx_getPost();
$msg = [];
if ($data != false) {
	$msg['data_found'] = true;
}else{
	$msg['status'] = 'void';
}
$msg['json_position'] = 2;
echo json_encode($msg,JSON_UNESCAPED_UNICODE);
?>
