<?php 
require 'vendor/autoload.php';
$sms_record = [];
$sms_record['username'] = 'estateq';
$sms_record['password'] = 'Asdf1234#';
$sms_record['tel'] = '0982641941';
$sms_record['sender'] = 'AssetWise';
$sms_record['text'] = 'Thx ขอบคุณที่ให้ความสนใจ KAVE SALAYA คอนโดใหม่ ติดถนนใหญ่ ใกล้ ม.มหิดล ศาลายา แต่งครบ เริ่ม 1.49 ล้าน* 6 มี.ค.นี้ VVIP DAY เลือกยูนิตที่ใช่ก่อนใคร  ชมห้องตัวอย่างพร้อมจองสิทธิ์ได้แล้ววันนี้! สอบถามข้อมูลเพิ่มเติม 021680000 Line OA @kavesalaya หรือคลิก https://lin.ee/ePiumAf';
$sms_url = "https://www.corp-sms.com/CorporateSMS/SMSReceiverXML";
$sms_sms = send_sms( $sms_record, $sms_url );
echo '<br>----sms<br>';
print_r($sms_sms);

function send_sms( $sms_record, $sms_url ) {
  $sms_auth = base64_encode($sms_record['username'].':'.$sms_record['password']);
  $sms_tel = $sms_record['tel'];
  $sms_key = md5($sms_record['tel'].'100');
  $sms_sender = $sms_record['sender'];
  $sms_text = $sms_record['text'];

  $sms_xml = "<?xml version=\"1.0\" encoding=\"tis-620\"?>\n<corpsms_request>\n<key>$sms_key</key>\n<sender>$sms_sender</sender>\n<mtype>T</mtype>\n<msg>$sms_text</msg>\n<tid>100</tid>\n<recipients>\n<msisdn>$sms_tel</msisdn>\n</recipients>\n</corpsms_request>";

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
  print_r($sms_response);
  error_log(ob_get_clean());

  $sms_body = $sms_response->getBody();
  $sms_content = $sms_body->getContents();

  libxml_use_internal_errors(true);
  $sms_xml_result = simplexml_load_string($sms_content);

  return $sms_xml_result;
}
?>