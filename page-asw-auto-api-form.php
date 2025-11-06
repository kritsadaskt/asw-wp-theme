<?php 
$count = get_field('count');
if ($count == '') {
	$count = 0;
}
$count = $count + 1;
update_field('count',$count);
$form_id = 7436;
$posts = $wpdb->get_results("SELECT * FROM asset_db7_forms WHERE form_post_id = $form_id");
foreach ($posts as $i => $data) {
	$v = maybe_unserialize( $data->form_value );
	if (is_array($v)) {
		if (array_key_exists("apistatus", $v) AND $v['apistatus']  == 'submitted') {
			asw_form_promotion__sendAPI($wpdb,$v,$data);
		}
	}
}
pre($count);
function asw_form_promotion__sendAPI($wpdb,$v,$data){
	$table = 'asset_db7_forms';
	$submit_id = $data->form_id;
	$where = array("form_id"=>$submit_id);
	$v['apistatus'] = 'send_success';
	pre($v);
	$v = maybe_serialize( $v );
	$update = $wpdb->update( $table, array('form_value'=>$v), $where);
	pre($update);
}
// function asw_form_promotion__delete(){

// }


?>
