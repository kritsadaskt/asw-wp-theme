<?php 
function send_sms( $record, $url) {
	$auth= base64_encode($record['username'].':'.$record['password']);
	$tel = $record['tel'];
	$key = md5($record['tel'].'100');
	$sender = $record['sender'];
	$text = $record['text'];
	$xml = "<?xml version=\"1.0\" encoding=\"tis-620\"?>\n<corpsms_request>\n<key>$key</key>\n<sender>$sender</sender>\n<mtype>T</mtype>\n<msg>$text</msg>\n<tid>100</tid>\n<recipients>\n<msisdn>$tel</msisdn>\n</recipients>\n</corpsms_request>";
	$options = [
		'headers' => [
			'Authorization' => 'Basic '.$auth,
			'Content-Type' => 'text/xml; charset=UTF8',
		],
		'body' => $xml,
		'version' => 1.1
	];
	$client = new Client();
	$response = $client->request('POST', $url, $options);

	ob_start();
	print_r($response);
	error_log(ob_get_clean());

	$body = $response->getBody();
	$content = $body->getContents();

	libxml_use_internal_errors(true);
	$xml_result = simplexml_load_string($content);
	return $xml_result;
}
?>