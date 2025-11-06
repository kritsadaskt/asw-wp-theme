<?php 
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
	$posts_query = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE form_post_id = $form_id order by form_id desc");
	$posts = $posts_query;
	$msg['posts'] = $posts_query;

	// foreach ($posts_query as $i => $submit_data) {
	// 	$v = maybe_unserialize($submit_data->form_value);
	// 	if (empty($v['_log_id'])) {
	// 		array_push($posts,$submit_data);
	// 	}else{
	// 	}
	// }
	// $msg['posts'] = $posts;
	// $msg['wp_db7_query_size'] = ofsize($posts);
	// $msg['time_on_run'] = time();

	foreach ($posts as $i => $submit_data) {
		$v = maybe_unserialize($submit_data->form_value);
		$submit_id = $submit_data->form_id;
		$_ref2 = '[Submit: '.$submit_id.'] '.$_ref;
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

				// $v['_log_id'] = $new_post;
				// $v['_log_title'] = $log_title;
				// $v['_log_url'] = get_site_url()."/wp-admin/post.php?post=".$v['_log_id']."&action=edit";

				$_form_value = json_encode($v,JSON_UNESCAPED_UNICODE);

				$_try_status = 'new';
				$_delete_on = time();
				$_delete_on += $_delete_count_day*86400;

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
				update_field('_try_status',$_try_status,$new_post);

				foreach ($option_data_field as $key => $value) {
					update_field($key,$value,$new_post);
				}

				wp_set_post_terms($new_post,$_try_status,'form_api_category');

				// $v['_log_send_status_api'] = 0;
				// $v['_log_send_status_sms'] = 0;
				// $v['_log_send_status_email'] = 0;

				$new_v = maybe_serialize($v);

				// $posts_query = $wpdb->update('asset_db7_forms',array('form_value'=>$new_v), array('form_id'=>$submit_id));

				$msg['my_new_post'] = $my_new_post;
				$msg['json_position'] = 1;
			}
		}
	}
}else{
	$msg['status'] = 'void';
}
$msg['json_position'] = 2;
// $contents = file_get_contents(get_site_url().'/api-form-auto-cron/');
echo json_encode($msg,JSON_UNESCAPED_UNICODE);
?>
