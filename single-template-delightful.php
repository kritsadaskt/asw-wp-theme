<?php
/* 
Template Name: Delightful
Template Post Type: house, condominium
*/
get_header();
$f = get_fields();
?>
<script src="/wp-content/themes/seed-spring/js/circle-progress.min.js"></script>
<?php asw_tpj_header($f); ?>
<style type="text/css">
	.info-tabs-block {
		display: inline-flex;
		position: relative;
		border: 0;
		/*		border-bottom: 0.7px solid #FFEFD8;*/
		border-radius: 0;
		padding: 0;
		justify-content: center;
	}

	.info-tab-wrap {
		padding: 0 30px;
		position: relative;
	}

	.info-tabs-block[data-is-overflow="1"] .info-tabs-blocks {
		padding-left: 0;
	}

	.info-tabs-block-arrow::after {
		top: -2px;
	}

	.info-tab:hover {
		color: var(--mc-nav-btn-txt-ready);
		transition: all .5s;
	}

	.info-tab>img {
		height: 20px;
		width: auto;
	}

	.-active .info-tab {
		color: var(--mc-nav-btn-txt-ready);
		border-bottom: 4px solid var(--mc-nav-btn-txt-ready);
		background-position: center center;
		background-size: cover;
	}

	.info-tab.-active .info-tab-txt {
		border-bottom: 4px solid var(--mc-nav-btn-txt-ready);
	}

	.info-tabs-rail .info-tab {
		border-bottom: 0;
	}

	.info-tab {
		border-bottom: 4px solid transparent;
	}

	.info-tab-wrap:after {
		content: '';
		height: 16px;
		width: 0.7px;
		background-color: var(--mc-tab-border-cl);
		position: absolute;
		left: 0;
		top: 30%;
	}

	.info-tab-wrap:nth-child(1):after {
		height: 0;
		width: 0;
	}

	.info-line {
		position: absolute;
		bottom: 0;
		width: 100%;
		height: 0.7px;
		background-color: var(--mc-tab-border-cl);
	}

	.info-mar {
		margin-top: 26px;
		margin-bottom: 40px;
		width: 100% !important;
	}

	.info-btn {
		display: inline-block;

	}

	.info-tab-txt {
		padding: 6px 10px;
		font-size: 26px;
		line-height: 32px;
		font-weight: 400;
	}


	.info-btn>div {
		background-color: var(--mc-nav-btn-bg-ready);
		display: flex;
		align-items: center;
		justify-content: center;
		gap: .5rem;
		padding: 6px 24px;
		transition: .5s;

	}

	.info-btn>div:hover {
		background-color: var(--mc-nav-btn-bg-hover);
		transition: .5s;
	}

	.info-btn>div>img {
		margin: 0 0.5rem;
		height: 24px;
		width: auto;
	}


	.info-tab:after {
		content: '';
		height: 16px;
		width: 0.7px;
		background-color: #FFEED4;
		position: absolute;
		left: 0;
		top: 30%;
	}

	.info-tab:nth-child(1):after {
		height: 0;
		width: 0;
	}

	.info-tab {
		position: relative;
		display: flex;
		align-items: center;
		cursor: pointer;
		padding: 0 24px;
		gap: 6px;
		border-radius: 0;
		transition: all .5s;
		white-space: nowrap;
		color: var(--mc-main-5);
	}

	.info-tabs-block-arrow {
		width: 24px;
	}

	.arrow-hover {
		opacity: 0.7;
		transition: 0.7s;
	}

	.arrow-hover:hover {
		opacity: 1;
		transition: 0.7s;
	}

	@media (max-width : 1319px) {
		.info-tab {
			position: relative;
			/* padding: 10px 16px; */
		}

		.info-btn {
			width: 100%;
		}

		.info-tabs-block {
			display: inline-flex;
			position: relative;
			border: 0;
			/*			border-bottom: 0.7px solid #FFEFD8;*/
			border-radius: 0;
/*			justify-content: start;*/
		}
	}
</style>
<?php
foreach ($f['content'] as $key => $content) {
	$layout = $content['acf_fc_layout'];
	$show = $content['hide'];
	if ($show == 'show') {
		// pre($layout);
		$opt = 'delightful';
		$common_layout = ['banner', 'form', 'plan', 'location', 'contact', 'related_location'];
		$trash = [];
		if (in_array($layout, $common_layout)) {
			$opt = 'all';
		}
		if (!in_array($layout, $trash)) {
			get_template_part('template-parts/template-' . $opt, $layout, [$content, $f, 'delight']);
		}
	}
}
?>

<?php asw_tpj_scroll_js() ?>
<?php get_footer() ?>