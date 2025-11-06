<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow" />
	<title>Cron Job</title>
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 1rem;
		}
		h4{
			margin-top: 0;
		}
		.cron-card {
			padding: 1rem;
			width: 100%;
			border: 2px solid #666;
			background-color: #eee;
			margin-top: 1rem;
			box-sizing: border-box;
		}
		pre.jb-pre {
			width: 100%;
			white-space: pre-wrap;
			line-break: anywhere;
			line-height: 1.8;
			background: #000a;
			border: 1px solid #000;
			border-radius: 5px;
			color: #fff;
			padding: 1rem;
			box-sizing: border-box;
			height: 1rem;
			overflow: hidden;
			cursor: help;
		}
		.cron-card[data-open="1"] pre.jb-pre{
			height: auto;
			cursor: auto;
		}
		.cron-card[data-try="done"]{
			background-color: #8bc34a66;
			border-color: #8bc34a;
		}
		.cron-card[data-try="failed"]{
			background-color: #F4433666;
			border-color: #F44336;
		}
		.cron-card[data-try="failed"]:has(.just-done) {
			background-color: #03A9F466;
			border-color: #03a9f4;
		}
	</style>
</head>
<body>
	<?php 
	$admin = current_user_can('administrator');
	$args = array(
		'post_type'   => 'form_api_log',
		'post_status' =>['publish'],
		'tax_query' => array(
			array (
				'taxonomy' => 'form_api_category',
				'field' => 'slug',
				'terms' => ['done','failed'],
			)
		),
		'numberposts' => 1000
	);
	$my_posts = get_posts($args);
	$now = time();
	$option_post_all = [];
	$ccc=0;

	foreach ($my_posts as $k => $p) {
		$ccc++;
		$pid = $p->ID;
		$ptry = get_field('_try_status',$pid);
		$pf = get_fields($pid);
		?>
		<div class="cron-card" data-try="<?=$ptry?>" onclick="this.dataset.open='1'">
			<?php 
			if ($admin) {
				echo "<h4>[$ccc] <a href='/wp-admin/post.php?post=$pid&action=edit'>($ptry) ".$p->post_title."</a></h4>";
			}else{
				echo "<h4>[$ccc] $pid</h4>";
			}
			if ($ptry == 'done') {
				if ($now>$pf['_delete_on']) {
					$submit_id = $pf['submit_id'];
					$submit = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE form_id = $submit_id");
					$table = 'asset_db7_forms';
					$where = array("form_id"=>$submit_id);
					$update = $wpdb->delete( $table, $where);
					wp_trash_post($pid);
					echo "Deleted $pid<br>";
				}else{
					echo "Waiting for delete after -> ".wp_date('D d/m/Y H:i:s',$pf['_delete_on']);
					if ($admin) {
						pre($pf['_try']);
					}
				}
			}else if($ptry == 'failed'){
				echo '>> Resend from failed';
				$option_post_field = getOptionPostField($pf);
				resendApiFromCron($pf,$p,$option_post_field);
			}else if($ptry == 'api-disabled'){
				$option_post_field = getOptionPostField($pf);
				pre($option_post_field);
				$form_id = $pf['form_id'];
				echo $option_slug = 'cf7api_'.$form_id;
				pre($option_post_all);
				pre($option_post_all[$option_slug]);
				$is_send_api = $option_post_all[$option_slug]['is_send_api'];
				pre($is_send_api);
				if ($is_send_api == 'enabled') {
					echo '>> Resend because just enable';
					resendApiFromCron($pf,$p,$option_post_field);
				}
			}
			?>
		</div>
		<?php
	}

	function getOptionPostField($pf){
		$form_id = $pf['form_id'];
		$option_slug = 'cf7api_'.$form_id;
		if ($GLOBALS['option_post_all'][$option_slug] == '') {
			$args = array(
				'name'        => $option_slug,
				'post_type'   => 'cf7_api',
				'numberposts' => 1
			);
			$option_post = get_posts($args);
			if ($option_post[0]->ID != '') {
				$option_post_field = get_fields($option_post[0]->ID);
				$GLOBALS['option_post_all'][$option_slug] = $option_post_field;
			}else{
				$GLOBALS['option_post_all'][$option_slug] = [];
				$GLOBALS['option_post_all'][$option_slug]['is_send_api'] = 'disabled';
			}
		}
		return $GLOBALS['option_post_all'][$option_slug];
	}

	function resendApiFromCron($pf,$p,$option_post_field){
		$_api_try_count = $pf['_api_try_count'];
		$_api_try_count += 1;
		if ($_api_try_count<=3) {
			echo '<br>Try count '.$_api_try_count.'<br>';
			$_form_value = $pf['_form_value'];
			$send_form_value = json_decode($_form_value,true);
			$project_id = $pf['project_id'];
			$_try = $pf['_try'];
			unset($send_form_value['cfdb7_status']);
			$_delete_count_day = 1;
			$_delete_on = get_post_timestamp($p->ID);

			if ($option_post_field['auto_delete_days'] != '') {
				$_delete_count_day = intval($option_post_field['auto_delete_days']);
				if (!is_int($_delete_count_day)) {
					$_delete_count_day = 1;
				}
			}
			$_delete_on += $_delete_count_day*86400;
			$_try_status = 'api-disabled';

			$url = get_field('endpoint', 'option');
			$send_data = [];
			$send_data["RefID"] = $pf['submit_id'];
			$send_data["Ref"] = $pf['_ref'];
			$send_data["ContactChannelID"] = 21;
			$send_data["ContactTypeID"] = 35;
			$send_data["FollowUpID"] = 42;
			$send_data["ProjectID"] = $project_id;

			$send_data["Fname"] = null;
			$send_data["Lname"] = null;
			$send_data["Tel"] = null;
			$send_data["Email"] = null;
			$send_data["LineID"] = null;
			$send_data["utm_source"] = null;
			$send_data["utm_medium"] = null;
			$send_data["utm_campaign"] = null;
			$send_data["utm_term"] = null;
			$send_data["utm_content"] = null;
			$send_data["PriceInterest"] = null;
			$send_data["ModelInterest"] = null;
			$send_data["PromoCode"] = null;
			$send_data["PurchasePurpose"] = null;
			$send_data["FlagPersonalAccept"] = true;
			$send_data["FlagContactAccept"] = true;

			$send_data["AppointDate"] = null;
			$send_data["AppointTime"] = null;
			$send_data["AppointTimeEnd"] = null;

			$send_data["RefDate"] = get_the_date("Y-m-d H:i:s",$p->ID);

			$other_send_data = [];

			foreach ($send_form_value as $key => $value) {
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
			foreach ($send_data as $skk => $svv) {
				if ($svv == null) {
					$skk_to_l = strtolower($skk);
					foreach ($other_send_data as $okk => $ovv) {
						$okk_to_l = strtolower($okk);
						if ($skk_to_l == $okk_to_l) {
							echo "<br>Change Name: $okk to $skk";
							$send_data[$skk] = $okk;
						}
					}
				}
			}

			$send_data['RegisterData'] = array_merge($send_data,$other_send_data);
			$send_data['RegisterData'] = json_encode($send_data['RegisterData'],JSON_UNESCAPED_UNICODE);

			if ($admin) {
				pre($send_data);
			}

			$_send_data = json_encode($send_data,JSON_UNESCAPED_UNICODE);
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
			$rs = json_decode($result,true);
			if (!is_array($rs)) {
				$_try .=  wp_date('Y/m/d H:i:s')." - API [ Error HTML File ]\n=== Send Data ===\n$_send_data\n\n";
			}else{
				$_try .=  wp_date('Y/m/d H:i:s')." - API [$result]\n=== Send Data ===\n$_send_data\n\n";
			}
			if ($rs['Success'] === true) {
				$_try_status = 'done';
				echo '<br><div class="just-done">>>>>> Done!</div>';
			}else{
				echo '<br>>>>>> Failed!!';
				$_try_status = 'failed';
			}
			if ($admin) {
				pre($_try);
			}
			update_field('_delete_count_day',$_delete_count_day,$p->ID);
			update_field('_delete_on',$_delete_on,$p->ID);
			update_field('_try_status',$_try_status,$p->ID);
			update_field('_try',$_try,$p->ID);
			wp_set_post_terms($p->ID,$_try_status,'form_api_category');
			update_field('_api_try_count',$_api_try_count,$p->ID);
		}else{
			echo '<br>Limit<br>';
			wp_set_post_terms($p->ID,'limit','form_api_category');
		}


	}
	?>
</body>
</html>