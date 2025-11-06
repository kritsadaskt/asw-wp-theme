<?php get_header() ?>
<style type="text/css">
	.breadcrumb-privacy{
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
		padding-top: 25px !important;
	}
	.bread-home{
		color: #3A638E;
	}
	.title-privacy{
		color: #323A41;
		font-size: 48px !important;
		line-height: 48px;
		font-weight: 400;
		padding-bottom: 21px;
	}
	.content-pravacy{
		font-size: 22px;
		font-weight: 500;
		line-height: 28px;
		text-align: justify;
	}
	.container-privacy{
		text-align: justify;
		justify-content: center;
		margin: auto;
		max-width: 920px;
	}
	.content-box-privacy{
		padding-bottom: 72px;
	}
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		.container-privacy{
			text-align: left;
		}
	}
</style>
<div class="">
	<div class="cont-pd padding-vtc breadcrumb-privacy">
		<a href="/<?=pll_current_language()?>/home" class="bread-home"><?php pll_e('หน้าแรก')?></a> <img src="/wp-content/uploads/2023/03/breadcrumbs.png" style="display: inline;vertical-align: baseline;height: 12px;width: 8px;margin-left: 12px;margin-right: 12px;top: -1px;"> <?php pll_e('นโยบายคุ้มครองข้อมูลส่วนบุคคล')?>
	</div>
</div>

<!--=== The Section Boxes : content ===-->
<section id="content" class="" style="padding-top: 60px;">
	<div class="cont-pd">
		<div class="text-center content-box-privacy">
			<h1 class="title-privacy"><?php the_title() ?></h1>
			<div class="container-privacy entry-content">
				<p class="content-privacy"><?php the_content() ?></p>
			</div>
		</div>
	</div>
</section>

<?php get_footer() ?>