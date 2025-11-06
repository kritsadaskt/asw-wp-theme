<?php 
<<<<<<< HEAD
require 'vendor/autoload.php';
=======
>>>>>>> 3d5ac6a9bdaa7d50f3b1a3e59201b02061bd7ab4
if ($option_data_field['use_sms'] == 'enabled') {
	if ($v['Tel'] != '') {
		$username = $option_data_field['sms_user'];
		$password = $option_data_field['sms_password'];
		$host = $option_data_field['sms_base_url'];
		$script = $option_data_field['sms_base_script'];
		$sms_url = $host.$script;
		$sms_txt = $option_data_field['sms_text'];
		$sender_name = $option_data_field['sms_sender_name'];

		$sms_auth = base64_encode($username.':'.$password);
		$sms_tel = $v['Tel'];
		$sms_key = md5($sms_tel.'100');
		$sms_sender = $sender_name;

		$sms_xml = "<?xml version=\"1.0\" encoding=\"tis-620\"?>\n<corpsms_request>\n<key>$sms_key</key>\n<sender>$sms_sender</sender>\n<mtype>T</mtype>\n<msg>$sms_txt</msg>\n<tid>100</tid>\n<recipients>\n<msisdn>$sms_tel</msisdn>\n</recipients>\n</corpsms_request>";

		$sms_options = [
			'headers' => [
				'Authorization'   =>  'Basic '.$sms_auth,
				'Content-Type'    =>  'text/xml; charset=UTF8',
			],
			'body' => $sms_xml,
			'version' => 1.1
		];

		$sms_client = new \GuzzleHttp\Client();
		$sms_response = $sms_client->request('POST', $sms_url, $sms_options);

		ob_start();
		error_log(ob_get_clean());

		$sms_body = $sms_response->getBody();
		$sms_content = $sms_body->getContents();

		libxml_use_internal_errors(true);
		$sms_xml_result = simplexml_load_string($sms_content);
		$sms_xml_result = json_encode($sms_xml_result,JSON_UNESCAPED_UNICODE);
		$_try_sms .=  "\n".wp_date('Y/m/d H:i:s')." - SMS [$sms_xml_result]\n";
	}
}else{
	$_try_sms .=  "\nSMS Disabled\n";
}
?>