<?php
// $startTime = microtime(true);

// $theme_root = get_template_directory();
// $log_file = $theme_root . '/__cron-log.txt';
// $timestamp = date('Y-m-d H:i:s');

// $epoch = time();
// file_put_contents($log_file, 'Start Epoch: '.$epoch.PHP_EOL, FILE_APPEND);

// ================================

$args = array(
	'post_type'   => 'form_api_log',
	'numberposts' => 1
);
$log = get_posts($args);
$_cron_date = wp_date('Y-m-j H:i:s');
pre($_cron_date);
$log_size = ofsize($log);
if ($log_size == 0) {
	$posts_query = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE 1 order by form_id asc");
}else{
	$last_log = $log[0];
	$last_log_id = $last_log->ID;
	$last_log_submit_id = get_field('submit_id',$last_log_id);
	$posts_query = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE form_id > $last_log_submit_id order by form_id asc");
}
pre($last_log_submit_id);
$db = $posts_query;
$option_post = [];
$option_post_field = [];
foreach ($db as $db_k => $db_v) {
	$db_v->form_value = maybe_unserialize($db_v->form_value,true);
	// pre($db_v);
	$form_id = $db_v->form_post_id;
	if (!in_array($db_v->form_post_id, $option_post)) {
		array_push($option_post,$db_v->form_post_id);	
		$option_post_field[$db_v->form_post_id] = [];
		$option_slug = 'cf7api_'.$form_id;
		$args = array(
			'name'        => $option_slug,
			'post_type'   => 'cf7_api',
			'numberposts' => 1
		);
		$option_post_this = get_posts($args);
		if(ofsize($option_post_this)>0){
			$option_post_this = $option_post_this[0];
			$option_post_field[$form_id] = get_fields($option_post_this->ID);
		};
	}

	if ($db_v->form_value['form_meta_track'] != '') {
		$k = $db_v->form_value['form_meta_track']; 
		$k = str_replace('&quot;', '"', $k);
		$k = str_replace('&#092;&#092;"', '&quot;', $k);
		$k = json_decode($k,true);
		$db_v->form_value['form_meta_track'] = $k;

		if ($k['post_type'] == 'promotion') {
			if (ofsize($k['project_wp_id']) == 0) {
				$k['project_title'][0] = 'No Project';
				$k['project_wp_id'][0] = 0;
				$k['project_id'][0] = 0;
				$db_v->form_value['form_meta_track'] = $k;
			}
		}
		// pre($k);
		for ($i=0; $i < ofsize($k['project_wp_id']); $i++) { 
			createFormLog($db_v,$i,$option_post_field[$form_id]);
		}
	}else{
		createFormLog($db_v,0,$option_post_field[$form_id]);
	}
}
// pre($option_post_field);
function createFormLog($db_v,$i,$option){
	$_cron_date = wp_date('Y-m-d H:i:s');
	$_delete_count_day = 1;
	$submit_id = $db_v->form_id;
	$contactForm_id = $db_v->form_post_id;
	$pj_wp_id = '';
	$pj_title = '';
	$pj_id = 0;
	$post_type = '';
	$page_title = '';
	// pre($db_v);
	if (is_array($db_v->form_value['form_meta_track'])) {
		$pj_wp_id = $db_v->form_value['form_meta_track']['project_wp_id'][$i];
		$pj_title = $db_v->form_value['form_meta_track']['project_title'][$i];
		$pj_id = $db_v->form_value['form_meta_track']['project_id'][$i];
		$post_type = ucfirst($db_v->form_value['form_meta_track']['post_type']);
		$page_title = $db_v->form_value['form_meta_track']['page_title'];
	}
	$contat_form_data = get_post($db_v->form_post_id);
	$contatForm_title = $contat_form_data->post_title;
	$submitOn = $db_v->form_date;
	$log_email = $db_v->form_value['Email'];
	$page_url = $db_v->form_value['form_url_track'];
	$_ref = "FormID: $contactForm_id - Page: $page_title ($page_url)";
	if ($post_type == '') {
		$post_type = 'Other';
	}
	$slug = $submit_id.'-'.$i.'-'.$contactForm_id.'--'.$pj_wp_id;
	// pre($slug);
	$log_title = $submit_id." [F-WP:$contactForm_id-$pj_wp_id] ($post_type → CF7:$contatForm_title) Page: $page_title - User: $log_email ($submitOn)";
	if ($pj_wp_id == '') {
		$log_title = $submit_id." [F:$contactForm_id] ($post_type → CF7:$contatForm_title) Page: $page_title - User: $log_email ($submitOn)";
	}
	if ($post_type == 'Promotion') {
		$log_title = $submit_id." [F-WP:$contactForm_id-$pj_wp_id] ($post_type → CF7:$contatForm_title) Page: $page_title [$pj_title] - User: $log_email ($submitOn)";
	}
	$log_title;
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
		$_data = json_encode($db_v,JSON_UNESCAPED_UNICODE);
		$_form_value = json_encode($db_v->form_value,JSON_UNESCAPED_UNICODE);
		$_try_status = 'new';
		$_delete_on = time();
		$_delete_on += $_delete_count_day*86400;

		update_field('submit_id',$submit_id,$new_post);
		update_field('form_id',$contactForm_id,$new_post);
		update_field('form_title',$contatForm_title,$new_post);
		update_field('project_id',$pj_id,$new_post);
		update_field('project_wp_id',$pj_wp_id,$new_post);
		update_field('project_title',$pj_title,$new_post);
		update_field('page_title',$page_title,$new_post);
		update_field('_form_value',$_form_value,$new_post);
		update_field('_ref',$_ref,$new_post);
		update_field('_delete_count_day',$_delete_count_day,$new_post);
		update_field('_delete_on',$_delete_on,$new_post);
		update_field('_url',$page_url,$new_post);
		update_field('_try_status',$_try_status,$new_post);
		update_field('_submit_date',$submitOn,$new_post);
		update_field('_cron_date',$_cron_date,$new_post);
		update_field('_data',$_data,$new_post);
		update_field('_api_try_count',0,$new_post);
		

		foreach ($option as $key => $value) {
			update_field($key,$value,$new_post);
		}

		wp_set_post_terms($new_post,$_try_status,'form_api_category');
	}
}

// $endTime = microtime(true);
// $executionTime = $endTime - $startTime;
// $log_message = 'cron [create-api-log] runs at: ' . $timestamp . ' - Execution time: ' . $executionTime . " seconds\n";
// file_put_contents($log_file, $log_message, FILE_APPEND);
?>