<?php
$username = "estateq";
$password = "Asdf1234#";
$host = "www.corp-sms.com";
$script = "/CorporateSMS/SMSReceiverXML";
$port = 80;

$tid = "123456789";
$first_msisdn = "0954838222";
$key = $first_msisdn.$tid;
$key_md5 = md5($key);

$xml.=		'<?xml version="1.0" encoding="tis-620" ?>' ;
$xml.=		'<corpsms_request>';
$xml.=			'<key>'.$key_md5.'</key> ';
$xml.=			'<sender>AssetWise</sender> ';
$xml.=			'<mtype>T</mtype>';
$xml.=			'<msg>UTF8 สวัสดี Hello</msg>';
$xml.=			'<tid>'.$tid.'</tid>';
$xml.=			'<recipients>';
$xml.=				'<msisdn>'.$first_msisdn.'</msisdn>';
$xml.=			'</recipients>';
$xml.=			'</corpsms_request>';


$xml=	urlencode($xml);
echo "[encode] = ".$xml."<br>";

$xml_length = strlen($xml);
$method = "POST"; 

$header = "$method $script HTTP/1.1\r\n";
$header .= "Host: $host\r\n";
$header .= "Authorization: Basic ".base64_encode($username.":".$password)."\r\n";
$header .= "Content-Type: text/xml; charset=UTF8\r\n";
$header .= "Content-Length: $xml_length\r\n";
$header .= "Connection: close\r\n";
$header .= "\r\n";
$header .= "$xml"; 
$header .= "\r\n";

$response = "";
pre($header);
$socket = @fsockopen($host, $port, $errno, $errstr); 

if ($socket) { 

  fwrite($socket, $header); 
  while(!feof($socket)) {
    $response .= fgets($socket, 128); 
  }
  fclose($socket); 

} 
$response = htmlspecialchars($response); 

echo nl2br($response);
?>
