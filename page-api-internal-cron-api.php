<?php 
<<<<<<< HEAD
$url = get_field('endpoint', 'option');
$send_data = [];
$send_data["RefID"] = $submit_id;
$send_data["Ref"] = $_ref2;
$send_data["ContactChannelID"] = 21;
$send_data["ContactTypeID"] = 35;
$send_data["FollowUpID"] = 42;
$send_data["ProjectID"] = $pj_id;

$send_data["Fname"] = null;
$send_data["Lname"] = null;
$send_data["Tel"] = null;
$send_data["Email"] = null;
$send_data["LineID"] = null;
$send_data["utm_source"] = $page_param['utm_source'];
$send_data["utm_medium"] = $page_param['utm_medium'];
$send_data["utm_campaign"] = $page_param['utm_campaign'];
$send_data["utm_term"] = $page_param['utm_term'];
$send_data["utm_content"] = $page_param['utm_content'];
$send_data["PriceInterest"] = null;
$send_data["ModelInterest"] = null;
$send_data["PromoCode"] = null;
$send_data["PurchasePurpose"] = null;
$send_data["FlagPersonalAccept"] = true;
$send_data["FlagContactAccept"] = true;

$send_data["AppointDate"] = null;
$send_data["AppointTime"] = null;
$send_data["AppointTimeEnd"] = null;

$send_data["RefDate"] = date_i18n("Y-m-d H:i:s");

$other_send_data = [];

foreach ($v as $key => $value) {
	if (array_key_exists($key, $send_data)) {
		if (is_array($value)) {
			$send_data[$key] = implode(', ', $value);
		}else{
			$send_data[$key] = $value;
		}
	}else{
		if (is_array($value)) {
			$other_send_data[$key] = implode(', ', $value);
		}else{
			$other_send_data[$key] = $value;
		}
	}
}

if ($send_data['AppointTime'] != null) {
	$appointData = $send_data['AppointTime'];
	$appointData = explode(' ', $appointData);
	$send_data['AppointTime'] = $appointData[0];
	$send_data['AppointTimeEnd'] = $appointData[2];
}

$send_data['RegisterData'] = array_merge($send_data,$other_send_data);
$send_data['RegisterData'] = json_encode($send_data['RegisterData'],JSON_UNESCAPED_UNICODE);
				// $send_data['RegisterData'] = addslashes($send_data['RegisterData']);

$_send_data = json_encode($send_data,JSON_UNESCAPED_UNICODE);
if ($option_data_field['is_send_api'] == 'enabled') {
	$header = array();
	$header[] = 'Content-type: application/json';
	$header[] = get_field('authorization', 'option');
	$options = array(
		'http' => array(
			'header'  => $header,
			'method'  => 'POST',
			'content' => $_send_data
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$_try .=  wp_date('Y/m/d H:i:s')." - API [$result]\n=== Send Data ===\n$_send_data\n";
	$rs = json_decode($result,true);
	if ($rs['Success'] === true) {
		$_try_status = 'done';
	}else{
		$_try_status = 'failed';
	}
}

$_data = json_encode($msg,JSON_UNESCAPED_UNICODE);
update_field('_data',$_data,$new_post);
=======
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
>>>>>>> 3d5ac6a9bdaa7d50f3b1a3e59201b02061bd7ab4
?>