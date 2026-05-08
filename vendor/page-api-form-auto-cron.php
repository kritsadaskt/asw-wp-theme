<?php 

cron_new_log();
function cron_new_log(){ // สั่งให้เฉพาะตัวที่มาใหม่ ทำการส่งทั้ง 3 อย่าง ตามที่ตั้งค่าไว้
	$submit_new_all = afac_get_new();
	$submit_new = [];
	$submit_new['count'] = 0;
	$submit_new['posts'] = [];
	foreach ($submit_new_all['posts'] as $s_index => $s_value) {
		$p = $s_value;
		$status_api = afac_check_status_api($p->ID);
		$status_email = afac_check_status_email($p->ID);
		$status_sms = afac_check_status_sms($p->ID);
		$skip = true;
		if ($status_api == 'new') {
			$skip = false;
		}
		if ($status_email == '' OR $status_email == 'failed') {
			$skip = false;
		}
		if ($status_sms == '' OR $status_sms == 'failed') {
			$skip = false;
		}
		if (!$skip) {
			array_push($submit_new['posts'], $s_value);
		}
	}
	$submit_new['count'] = ofsize($submit_new['posts']);
	foreach ($submit_new['posts'] as $s_index => $s_value) {
		$p = $s_value;
		$f = get_fields($p->ID);
		$status_api = afac_check_status_api($p->ID);
		$status_email = afac_check_status_email($p->ID);
		$status_sms = afac_check_status_sms($p->ID);

		if ($status_email == '' OR $status_email == 'failed') {
			pre('!-- Maybe send Email');
			$email = $f['email_api'];
			foreach ($email as $e_index => $e_value) {
				if ($e_value['use_email'] == 'enabled') {
					afac_send_mail($submit_new,$p,$f,$e_value);
				}
			}
			if (ofsize($email) == 0) {
				foreach ($submit_new['posts'] as $ss_index => $ss_value) {
					$loop_submit_id = get_field('submit_id',$ss_value->ID);
					if ($loop_submit_id == $f['submit_id']) {
						wp_set_post_terms($ss_value->ID,'Disabled','form_email_category');
					}			
				}
			}
		}

		if ($status_sms == '' OR $status_sms == 'failed') {
			pre('!-- Maybe send SMS');
			afac_send_sms($submit_new,$p,$f);
		}

		if ($status_api == 'new') {
			pre('!-- Maybe send API');
			afac_send_api($p,$f);
		}

		$status_api = afac_check_status_api($p->ID);
		$status_email = afac_check_status_email($p->ID);
		$status_sms = afac_check_status_sms($p->ID);

		pre('$status_api');
		pre($status_api);
		pre('$status_email');
		pre($status_email);
		pre('$status_sms');
		pre($status_sms);
		pre('------------------------------');
	}
}
function afac_get_new(){ //ดึงข้อมูลเฉพาะการลงทะเบียนใหม่จาก API Log
	$args = array(
		'post_type'   => 'form_api_log',
		'tax_query' => array(
			array (
				'taxonomy' => 'form_api_category',
				'field' => 'slug',
				'terms' => ['new'],
			)
		),
		'numberposts' => -1
	);
	$args = array(
		'post_type'   => 'form_api_log',
		'numberposts' => -1
	);
	$my_posts = get_posts($args);
	$m = [];
	$m['count'] = ofsize($my_posts);
	$m['posts'] = $my_posts;
	return $m;
}

function afac_send_mail($submit_new,$p,$f,$e_value){
	$to = afac_decode_value_form($e_value['email_to'],$f);
	$to = str_replace(' ', '', $to);
	
	$subject = afac_decode_value_form($e_value['email_subject'],$f);
	$body = afac_decode_value_form($e_value['email_body'],$f);

	$headers = array('Content-Type: text/html; charset=UTF-8');
	pre('!-- Sending.. Email to '.$to);
	$send = wp_mail($to,$subject,$body,$headers);
	if ($send) {
		pre('>>>> !-- Email send success!');
		foreach ($submit_new['posts'] as $s_index => $s_value) {
			$loop_submit_id = get_field('submit_id',$s_value->ID);
			if ($loop_submit_id == $f['submit_id']) {
				wp_set_post_terms($s_value->ID,'done','form_email_category');
			}			
		}
	}else{
		pre('>>>> !-- Email send failed!');
	}
}
function afac_send_sms($submit_new,$p,$f){
	require 'vendor/autoload.php';
	$sms_client = new \GuzzleHttp\Client();

	$must_send = true;

	$form_value = $f['_form_value'];
	$form_value = json_decode($form_value,true);
	$use_sms = $f['use_sms'];

	if ($use_sms != 'enabled') {
		$must_send = false;
		foreach ($submit_new['posts'] as $s_index => $s_value) {
			$loop_submit_id = get_field('submit_id',$s_value->ID);
			if ($loop_submit_id == $f['submit_id']) {
				wp_set_post_terms($s_value->ID,'disabled','form_sms_category');
			}			
		}
	}
	if ($must_send) {
		$tel = $form_value['Tel'];
		if ($tel == '') {
			$must_send = false;
		}
	}


	if ($must_send) {
		$sms_base_url = $f['sms_base_url'];
		$sms_user = $f['sms_user'];
		$sms_password = $f['sms_password'];
		$sms_sender_name = $f['sms_sender_name'];
		$sms_text = $f['sms_text'];
		$sms_base_script = $f['sms_base_script'];

		if ($sms_base_url == '' OR $sms_user == '' OR $sms_password == '' OR $sms_sender_name == '' OR $sms_text == '' OR $sms_base_script == '') {
			$must_send = false;
		}
	}

	if ($must_send) {
		pre('!-- Sending.. SMS');
		$_try_sms = $f['_try_sms'];
		$username = $sms_user;
		$password = $sms_password;
		$host = $sms_base_url;
		$script = $sms_base_script;
		$sms_url = $host.$script;
		$sms_txt = $sms_text;
		$sender_name = $sms_sender_name;
		$sms_auth = base64_encode($username.':'.$password);
		$sms_tel = $tel;
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

		$sms_response = $sms_client->request('POST', $sms_url, $sms_options);
		ob_start();
		error_log(ob_get_clean());

		$sms_body = $sms_response->getBody();
		$sms_content = $sms_body->getContents();

		libxml_use_internal_errors(true);
		$sms_xml_result = simplexml_load_string($sms_content);
		$sms_xml_result = json_encode($sms_xml_result,JSON_UNESCAPED_UNICODE);
		$_try_sms .=  "\n".wp_date('Y/m/d H:i:s')." - SMS [$sms_xml_result]\n";
		pre($_try_sms);
		update_field('_try_sms',$_try_sms,$p->ID);
		$sms_xml_result_arr = json_decode($sms_xml_result,true);

		if ($sms_xml_result_arr['STATUS'] == '000') {
			pre('>>>> !-- SMS send success!');
			foreach ($submit_new['posts'] as $s_index => $s_value) {
				$loop_submit_id = get_field('submit_id',$s_value->ID);
				if ($loop_submit_id == $f['submit_id']) {
					wp_set_post_terms($s_value->ID,'done','form_sms_category');
				}	
			}
		}else{
			pre('>>>> !-- SMS send failed!');
			foreach ($submit_new['posts'] as $s_index => $s_value) {
				$loop_submit_id = get_field('submit_id',$s_value->ID);
				if ($loop_submit_id == $f['submit_id']) {
					wp_set_post_terms($s_value->ID,'failed','form_sms_category');
				}	
			}
		}	
	}
}



function afac_decode_value_form($str,$f){
	$form_value = $f['_form_value'];
	$form_value = json_decode($form_value,true);
	$str_new = $str;
	foreach ($form_value as $key => $value) {
		$find_key = '['.$key.']';
		if (is_array($value)) {
			$found_value = join(", ",$value);
		}else{
			$found_value = $value;
		}
		$str_new = str_replace($find_key, $found_value, $str_new);
	}
	$str_new = nl2br($str_new);
	return $str_new;
}
function afac_check_status_email($pid){
	$status = get_the_terms( $pid, 'form_email_category' );
	$status = $status[0]->slug;
	return $status;
}

function afac_check_status_sms($pid){
	$status = get_the_terms( $pid, 'form_sms_category' );
	$status = $status[0]->slug;
	return $status;
}

function afac_check_status_api($pid){
	$status = get_the_terms( $pid, 'form_api_category' );
	$status = $status[0]->slug;
	return $status;
}

function afac_send_api($p,$f){
	$must_send = true;
	if ($f['is_send_api'] != 'enabled') {
		$must_send = false;
		wp_set_post_terms($p->ID,'api-disabled','form_api_category');
		update_field('_try_status','api-disabled',$p->ID);
	}
	if ($must_send) {
		pre('!-- Sending.. API');
		$url = get_field('endpoint', 'option');
		if ($url == '') {
			$url = 'https://aswinno.assetwise.co.th/CISUAT/api/Customer/SaveOtherSource/';
		}
		$header_at = get_field('authorization', 'option');
		if ($header_at == '') {
			$header_at = 'Authorization: Basic Y3VzdG9tZXJtYW5hZ2VtZW50OmN1c3RvbWVybWFuYWdlbWVudEAyMDE4';
		}
		$header = array();
		$header[] = 'Content-type: application/json';
		$header[] = $header_at;

		$submit_id = $f['submit_id'];
		$pj_id = $f['project_id'];

		$_ref2 = '[Submit: '.$submit_id.'] '.$f['_ref'];
		$_try = $f['_try'];
		$_form_value = json_decode($f['_form_value'],true);

		$utm_url = explode('/?', $f['_url']);
		$utm = [];
		$page_param = [];
		if (ofsize($utm_url)>1) {
			$utm = $utm_url[1];
			$utm = explode('&', $utm);
			foreach ($utm as $ukey => $uval) {
				$utm_split = explode('=', $uval);
				$utm[$ukey] = $utm_split;
				$page_param[$utm_split[0]] = $utm_split[1];
			}
		}
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

		foreach ($_form_value as $key => $value) {
			if (array_key_exists($key, $send_data)) {
				if (is_array($value)) {
					$send_data[$key] = implode(', ', $value);
				}else{
					if ($value != null && $value != '') {
						$send_data[$key] = $value;
					}
				}
			}else{
				if (is_array($value)) {
					$other_send_data[$key] = implode(', ', $value);
				}else{
					if ($value != null && $value != '') {
						$other_send_data[$key] = $value;
					}
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

		$_send_data = json_encode($send_data,JSON_UNESCAPED_UNICODE);

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
		if ($rs['Success'] == '1') {
			pre('>>>> !-- API send success!');
			wp_set_post_terms($p->ID,'done','form_api_category');
			update_field('_try_status','done',$p->ID);
		}else{
			pre('>>>> !-- API send failed!');
			wp_set_post_terms($p->ID,'failed','form_api_category');
			update_field('_try_status','failed',$p->ID);
		}
		pre($result);
		update_field('_try',$_try,$p->ID);
	}
}
?>