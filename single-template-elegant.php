<?php
/* 
Template Name: Elegant
Template Post Type: house, condominium
*/
get_header();
$f = get_fields();
?>
<script src="/wp-content/themes/seed-spring/js/circle-progress.min.js"></script>
<?php asw_tpj_header($f); ?>

<?php

?>
<style>
	.-line {
		height: 8px;
		width: 1px;
		background-color: var(--mc-tab-border-cl) !important;
		position: relative;
		top: 15px;
	}

	.-absolute {
		--w: 20;
		--l: 0;
		position: absolute;
		bottom: -1px;
		left: 0;
		width: calc(1px*var(--w));
		transform: translateX(calc(1px*var(--l)));
		transition: all .4s ease-in-out;
		height: 2px;
		background: var(--mc-gd);
	}
</style>
<?php
foreach ($f['content'] as $key => $content) {
	$layout = $content['acf_fc_layout'];
	$show = $content['hide'];
	if ($show == 'show') {
		$opt = 'elegant';
		$common_layout = ['banner', 'form', 'plan', 'location', 'contact', 'related_location'];
		$trash = [];
		if (in_array($layout, $common_layout)) {
			$opt = 'all';
		}
		if (!in_array($layout, $trash)) {
			get_template_part('template-parts/template-' . $opt, $layout, [$content, $f, 'elegant']);
		}
	}
}

?>
<?php asw_tpj_scroll_js() ?>
<?php get_footer() ?>