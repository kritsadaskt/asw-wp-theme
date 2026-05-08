<?php 
// pre($post);
$arg = array('post_type' => 'hot-deal', 'posts_per_page' => 1,'post_parent'=>0);
$qr = new WP_Query($arg);
$url = get_the_permalink( $qr->posts[0]);
if ($qr->post_count) {
	header( "location: $url" );
	exit(0);
}else{
	get_header();
	?>
	<div class="cont-pd py-4 flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/hot-deal" class=""><?php pll_e('Hot Deal')?></a>
	</div>
	<div class="cont-pd my-4">
		<div class="text-center pb-16 mt-12">
			<img src="/wp-content/uploads/2023/05/projects-search.png" style="max-width:286px" class="mb-5">
			<div><?php pll_e('ขออภัย ไม่มีแคมเปญในช่วงเวลานี้') ?></div>
		</div>
	</div>
	<?php
	get_footer();
}

?>