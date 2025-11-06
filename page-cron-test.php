<?php 
$counting = get_field('counting');
$last_hits = get_field('last_hits');
if ($_GET['view'] != 'monitor') {
	if ($counting == '') {
		$counting = 1;
	}
	$counting++;
	update_field('counting',$counting);
	update_field('last_hits',wp_date('d:m:Y H:i:s'));
}
?>
Cron Hits : <?=$counting?><br>
Last Update : <?=$last_hits?>