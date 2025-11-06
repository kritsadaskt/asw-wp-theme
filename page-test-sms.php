   <?php
// die();
   $option_data_field = [];
   $option_data_field['sms_user'] = "estateq";
   $option_data_field['sms_password'] = "Asdf1234#";
   $option_data_field['sms_base_url'] = "https://www.corp-sms.com";
   $option_data_field['sms_base_script'] = "/CorporateSMS/SMSReceiverXML";
   $option_data_field['sms_text'] = "ขอบคุณที่ให้ความสนใจ KAVE SALAYA คอนโดใหม่ ติดถนนใหญ่ ใกล้ ม.มหิดล ศาลายา แต่งครบ เริ่ม 1.49 ล้าน* 6 มี.ค.นี้ VVIP DAY เลือกยูนิตที่ใช่ก่อนใคร  ชมห้องตัวอย่างพร้อมจองสิทธิ์ได้แล้ววันนี้! สอบถามข้อมูลเพิ่มเติม 021680000 Line OA @kavesalaya หรือคลิก https://lin.ee/ePiumAf";
   $option_data_field['sms_sender_name'] = "AssetWise";
   $v = [];
   $v['Tel'] = '0954838222';


   $username = $option_data_field['sms_user'];
   $password = $option_data_field['sms_password'];
   $host = $option_data_field['sms_base_url'];
   $script = $option_data_field['sms_base_script'];
   $port = 80;
   $sms_txt = $option_data_field['sms_text'];
   $sender_name = $option_data_field['sms_sender_name'];

   $tid = $submit_id;
   $first_msisdn = $v['Tel'];
   $key = $first_msisdn.$tid;
   $key_md5 = md5($key);

   $xml.=    '<?xml version="1.0" encoding="utf-8" ?>' ;
   $xml.=    '<corpsms_request>';
   $xml.=      '<key>'.$key_md5.'</key> ';
   $xml.=      '<sender>'.$sender_name.'</sender> ';
   $xml.=      '<mtype>T</mtype>';
   $xml.=      '<msg>'.$sms_txt.'</msg>';
   $xml.=      '<tid>'.$tid.'</tid>';
   $xml.=      '<recipients>';
   $xml.=        '<msisdn>'.$first_msisdn.'</msisdn>';
   $xml.=      '</recipients>';
   $xml.=      '</corpsms_request>';
pre($xml);
   $xml=	urlencode($xml);

echo "[encode] = ".$xml."<br>";

   $xml_length = strlen($xml);
   $method = "POST"; 

   $header = "$method $script HTTP/1.1\r\n";
   $header .= "Host: $host\r\n";
   $header .= "Authorization: Basic ".base64_encode($username.":".$password)."\r\n";
   $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
   $header .= "Content-Length: $xml_length\r\n";
   $header .= "Connection: close\r\n";
   $header .= "\r\n";
   $header .= "$xml"; 
   $header .= "\r\n";

   $response = "";
   $socket = @fsockopen($host, $port, $errno, $errstr); 

   if ($socket) { 

    fwrite($socket, $header); 
    while(!feof($socket)) {
      $response .= fgets($socket, 128); 
    }
    fclose($socket); 

  } 

  $response = htmlspecialchars($response); 

  pre($response);
  $rs = nl2br($response);
  pre($rs);
  ?>
