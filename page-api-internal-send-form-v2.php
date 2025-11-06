<?php 
require 'vendor/autoload.php';
$data = jpx_getPost();
$msg = [];
if ($data != false) {
	$form_id = $data['form_id'];
	$post_type = $data['post_type'];
	$page_title = $data['page_title'];
	$page_url = $data['page_url'];

	$_ref = "FormID: $form_id - Page: $page_title ($page_url)";

	$form_data = $data['form_data'];
	$option_slug = 'cf7api_'.$form_id;
	$args = array(
		'name'        => $option_slug,
		'post_type'   => 'cf7_api',
		'numberposts' => 1
	);
	$option_post = get_posts($args);
	$msg['payload'] = $data;
	$msg['form_id'] = $form_id;

	$_delete_count_day = 1;
	$_delete_on = time();

	if (!$option_post) {
		$msg['option_status'] = 100;
	}else{
		$option_id = $option_post[0]->ID;
		$option_data_field = get_fields($option_id);
		$msg['option_status'] = 200;
		$msg['option_data'] = $option_data_field;
		if ($option_data_field['auto_delete_days'] != '') {
			$_delete_count_day = intval($option_data_field['auto_delete_days']);
			if (!is_int($_delete_count_day)) {
				$_delete_count_day = 1;
			}
		}
	}
	$msg['status'] = 200;

	$posts_query = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE form_post_id = $form_id order by form_id desc");
	$posts = [];
	foreach ($posts_query as $i => $submit_data) {
		$v = maybe_unserialize($submit_data->form_value);
		if (empty($v['_log_id'])) {
			array_push($posts,$submit_data);
		}else{
		}
	}
	$msg['wp_db7_query_size'] = ofsize($posts);
	$msg['time_on_run'] = time();
	foreach ($posts as $i => $submit_data) {
		$v = maybe_unserialize($submit_data->form_value);
		$submit_id = $submit_data->form_id;

		$_ref2 = '[Submit: '.$submit_id.'] '.$_ref;
		
		$_try = '';
		$_try_sms = '';

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
		$project_title = $data['project_title'];
		$project_id = $data['project_id'];
		$project_wp_id = $data['project_wp_id'];
		$log_email = $v['Email'];
		if ($post_type == 'promotion') {
			$project_title = $v['project'];
			$project_id = $v['project-id'];
			$project_wp_id = $v['project-wp-id'];
		}

		$project_title = explode(',',$project_title);
		$project_id = explode(',',$project_id);
		$project_wp_id = explode(',',$project_wp_id);


		$project_size = ofsize($project_wp_id);

		for($pj_i=0; $pj_i<$project_size; $pj_i++){

			$pj_title = $project_title[$pj_i];
			$pj_id = $project_id[$pj_i];
			$pj_wp_id = $project_wp_id[$pj_i];

			$slug = $submit_id.'-'.$form_id.'--'.$pj_wp_id;
			$log_page_title = $page_title;

			if ($post_type == 'promotion') {
				$log_page_title = "$page_title -- $pj_title";
			}

			$log_title = "[s-f--pj:$slug] $log_page_title - User: $log_email";
			$slug = 'log-'.$slug;
			$args = array(
				'name'        => $slug,
				'post_type'   => 'form_api_log',
				'numberposts' => 1
			);
			$my_posts = get_posts($args);


			if (!$my_posts) {
				$my_new_post = array(
					'post_title'	=> $log_title,
					'post_name' 	=> $slug,
					'post_status'	=> 'publish',
					'post_type'		=> 'form_api_log',
				);

				$new_post = wp_insert_post( $my_new_post );

				$utm_url = explode('/?', $page_url);
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

				$v['_log_id'] = $new_post;
				$v['_log_title'] = $log_title;
				$v['_log_url'] = "/wp-admin/post.php?post=".$v['_log_id']."&action=edit";

				$_form_value = json_encode($v,JSON_UNESCAPED_UNICODE);

				$_try_status = 'api-disabled';
				$_delete_on = time();
				$_delete_on += $_delete_count_day*86400;

				$_try = $_try_sms."\n";

				// if ($option_data_field['is_send_api'] == 'disabled') {
				// 	$_delete_count_day = '';
				// 	$_delete_on = '';
				// }
				update_field('submit_id',$submit_id,$new_post);
				update_field('form_id',$form_id,$new_post);
				update_field('project_id',$pj_id,$new_post);
				update_field('project_wp_id',$pj_wp_id,$new_post);
				update_field('project_title',$pj_title,$new_post);
				update_field('_form_value',$_form_value,$new_post);
				update_field('_ref',$_ref2,$new_post);
				update_field('_delete_count_day',$_delete_count_day,$new_post);
				update_field('_delete_on',$_delete_on,$new_post);
				update_field('_url',$page_url,$new_post);

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
				update_field('_try',$_try,$new_post);
				update_field('_try_status',$_try_status,$new_post);
				wp_set_post_terms($new_post,$_try_status,'form_api_category');

				$v['_log_first_try_status'] = $_try_status;
				$v['_log_first_try_result'] = $rs;
				if ($v['_log_count'] == '') {
					$v['_log_count'] = 0;
				}else{
					$v['_log_count'] = intval($v['_log_count']);
				}
				$v['_log_count']++;
				$new_v = maybe_serialize($v);



				$posts_query = $wpdb->update('asset_db7_forms',array('form_value'=>$new_v), array('form_id'=>$submit_id));

				echo json_encode($msg);
				die();
			}
		}
	}
}else{
	$msg['status'] = 'void';
}
echo json_encode($msg);
?>
