<?php 
echo get_the_date("Y/m/d H:i:s");
 ?>
<?php 
die();
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
$record = [];
$url = 'https://www.corp-sms.com/CorporateSMS/SMSReceiverXML' ;
$record['tel'] = '0815781987';
$record['username'] = 'estateq';
$record['password'] = 'Asdf1234#';
$record['sender'] = 'AssetWise';
$record['text'] = 'Hello Test';
$a = send_sms_new( $record, $url);
pre($a);
echo time();

function send_sms_new( $record, $url) {
	$auth= base64_encode($record['username'].':'.$record['password']);
	$tel = $record['tel'];
	$key = md5($record['tel'].'100');
	$sender = $record['sender'];
	$text = $record['text'];
	$xml = "<?xml version=\"1.0\" encoding=\"tis-620\"?>\n<corpsms_request>\n<key>$key</key>\n<sender>$sender</sender>\n<mtype>T</mtype>\n<msg>$text</msg>\n<tid>100</tid>\n<recipients>\n<msisdn>$tel</msisdn>\n</recipients>\n</corpsms_request>";
	$header = array();
	$header[] = 'Content-type: text/xml; charset=UTF8';
	$header[] = 'Authorization: Basic '.$auth;
	$send_context = stream_context_create(array(
		'http' => array(
			'method' => 'POST',
			'headers' => $header,
			'body' => $xml,
			'version' => 1.1
		)
	));
	pre($xml);
	return file_get_contents($url, false, $send_context);
	
}
?>

<script type="text/javascript">
	
	function asw_api_send(){
		let _data = {
			"ProjectID":null,
			"ContactChannelID":21,
			"ContactTypeID":35,
			"RefID":null,
			"Fname":null,
			"Lname":null,
			"Tel":null,
			"Email":null,
			"Ref":null,
			"RefDate":null,
			"FollowUpID":42,
			"utm_source":null,
			"utm_medium":null,
			"utm_campaign":null,
			"utm_term":null,
			"utm_content":null,
			"PriceInterest":null,
			"ModelInterest":null,
			"PromoCode":null,
			"PurchasePurpose":null,
			"FlagPersonalAccept":true,
			"FlagContactAccept":true,
			"AppointDate":null,
			"AppointTime":null,
			"AppointTimeEnd":null,
		}

		fetch('https://aswinno.assetwise.co.th/CISUAT/api/Customer/SaveOtherSource/', {
			method: "POST",
			body: JSON.stringify(_data),
			headers: {
				"Content-type": "application/json; charset=UTF-8",
				"Authorization": "Basic Y3VzdG9tZXJtYW5hZ2VtZW50OmN1c3RvbWVybWFuYWdlbWVudEAyMDE4",
			}
		})
		.then(response => response.json()) 
		.then(json => xconsolex.log(json))
		.catch(err => xconsolex.log(err));
	}
</script>