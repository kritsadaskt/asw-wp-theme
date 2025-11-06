<?php 
$data = $_POST;
$head = $_SERVER;
$asw = $_SERVER['HTTP_ASW'];

$hash = $data['ProjectID'].$data['UnitCode'].$data['Status'].'aswAPIhD';
$hash = md5($hash);

if ($asw == $hash) {
	$pj = 0;
	$hd_pj_id = -1;
	$msg = [];
	$msg['status'] = 404;
	$msg['message'] = 'ไม่พบ ProjectID และ UnitCode ตามที่ระบุในระบบ';
	if ($data['UnitCode'] != '' AND $data['ProjectID'] != '' AND $data['Status'] != '') {
		$arg = array('post_type' => ['hot-deal'],'posts_per_page'=>-1);
		$allsearch = new WP_Query($arg);
		foreach ($allsearch->posts as $pjk => $pjv) {
			$hot_deal_l2 = get_field('hot_deal_l2',$pjv->ID);
			if ($hot_deal_l2['project'][0]->ID != '') {
				$pj_wp_id = $hot_deal_l2['project'][0]->ID;
				$pj_id = get_field('project_code',$pj_wp_id);
				if ($pj_id == $data['ProjectID']) {
					$hd_pj_id = $pjv->ID;
				}
			}
		}

		$arg = array('post_type' => ['hot-deal'],'posts_per_page'=>-1,'post_parent'=>$hd_pj_id);
		$allsearch = new WP_Query($arg);
		foreach ($allsearch->posts as $unit_k => $unit_v) {
			$hot_deal_l3 = get_field('hot_deal_l3',$unit_v->ID);
			$unit_code = $hot_deal_l3['unit_code'];
			if ($unit_code == $data['UnitCode']) {
				$hot_deal_l3['status'] = $data['Status'];
				update_field('hot_deal_l3',$hot_deal_l3,$unit_v->ID);
				$msg['status'] = 200;
				$msg['message'] = 'บันทึกสำเร็จ';

			}
		}
	}else{
		$msg['status'] = 400;
		if ($data['ProjectID'] == '') {
			$msg['message'] = 'ไม่สามารถ Save other source ได้ เนื่องจากไม่มี ProjectID';
		}elseif ($data['UnitCode'] == '') {
			$msg['message'] = 'ไม่สามารถ Save other source ได้ เนื่องจากไม่มี UnitCode';
		}elseif ($data['Status'] == '') {
			$msg['message'] = 'ไม่สามารถ Save other source ได้ เนื่องจากไม่มี Status';
		}
	}
}else{
	$msg['status'] = 401;
	$msg['message'] = 'Unauthorized';
}


echo json_encode($msg,JSON_UNESCAPED_UNICODE);
?>