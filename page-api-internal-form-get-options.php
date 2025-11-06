<?php 
// Use This
$form_id = $_GET['form'];
if ($form_id != '') {
	$option_slug = 'cf7api_'.$form_id;
	$args = array(
		'name'        => $option_slug,
		'post_type'   => 'cf7_api',
		'numberposts' => 1
	);
	$option_post = get_posts($args);
	if(ofsize($option_post)>0){
		$option_post = $option_post[0];
		$option_post_field = get_fields($option_post->ID);
		$option_post_field = json_encode($option_post_field,JSON_UNESCAPED_UNICODE);
		echo $option_post_field;
	};
}else{
	echo '{}';
}
?>