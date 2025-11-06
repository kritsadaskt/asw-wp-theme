<?php
/* 
Template Name: Modern
Template Post Type: house, condominium
*/
get_header();
$f = get_fields();
?>
<script src="/wp-content/themes/seed-spring/js/circle-progress.min.js"></script>
<?php asw_tpj_header($f);
?>
<style>
	.master-btn {
		border-radius: 4px;
	}
	span{
		white-space: nowrap;
	}
</style>
<?php
foreach ($f['content'] as $key => $content) {
	$layout = $content['acf_fc_layout'];
	$show = $content['hide'];
	if ($show == 'show') {
		$opt = 'modern';
		$common_layout = ['banner', 'form', 'location', 'contact', 'related_location'];
		$trash = [];
		if (in_array($layout, $common_layout)) {
			$opt = 'all';
		}
		if (!in_array($layout, $trash)) {
			get_template_part('template-parts/template-' . $opt, $layout, [$content, $f, 'modern']);
		}
	}
}

?>
<?php asw_tpj_scroll_js() ?>
<?php get_footer() ?>