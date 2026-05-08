<?php
/* 
Template Name: Dynamic
Template Post Type: house, condominium
*/
get_header();
$f = get_fields();
?>
<script src="/wp-content/themes/seed-spring/js/circle-progress.min.js"></script>
<?php asw_tpj_header($f); ?>
<style type="text/css">
	:root{
		--text-color:#fff;
		--bg-color:var(--mc-main-3);
	}
	.master-btn{
		border-radius: 32px;
	}
	.theme-title {
		display: inline-block;
		position: relative;
	}

	.theme-title .title-a {
		font-style: normal;
		font-weight: 400;
		font-size: 56px;
		line-height: 56px;
		color: #FFFFFF;
		-webkit-text-stroke: 1px var(--mc-main-1);
		text-shadow: 0px 1px 12px var(--mc-main-5);
		position: relative;
	}

	.theme-title .title-b {
		font-style: normal;
		font-weight: 400;
		font-size: 56px;
		line-height: 56px;
		opacity: 0.3;
		-webkit-text-stroke: 1px var(--mc-main-1);
		color: transparent;
		position: absolute;
		top: -.5em;
		left: 0;
		width: 100%;
	}

	.theme-title .title-c {
		font-style: normal;
		font-weight: 400;
		font-size: 56px;
		line-height: 56px;
		opacity: 0.1;
		-webkit-text-stroke: 1px var(--mc-main-1);
		color: transparent;
		position: absolute;
		top: -1em;
		left: 0;
		width: 100%;
	}
	/*-- Mobile Version --*/
	@media (max-width: 1319px) {

		.theme-title .title-a,
		.theme-title .title-b,
		.theme-title .title-c {
			font-size: 38px;
			line-height: 40px;
		}
	}

	.info-tab.-active {
		background:  var(--mc-main-bg-cl) !important;
	}
	.info-tab:not(.-active):hover{
		background: var(--mc-main-bg-hover) !important;
	}
	.theme-title .title-c,
	.theme-title .title-b{
		display: none;
	}
	
</style>
<?php 
foreach ($f['content'] as $key => $content) {
	$layout = $content['acf_fc_layout'];
	$show = $content['hide'];
	if ($show == 'show') {
		// pre($layout);
		$opt = 'dynamic';
		$common_layout = ['banner','form','plan','location','contact','related_location'];
		$trash = [];
		if (in_array($layout,$common_layout)) {
			$opt = 'all';
		}
		if (!in_array($layout,$trash)) {
			get_template_part( 'template-parts/template-'.$opt, $layout , [$content,$f,'dynamic'] );
		}
	}

}
?>

<?php asw_tpj_scroll_js() ?>
<?php get_footer() ?>