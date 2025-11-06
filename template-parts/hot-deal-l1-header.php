<?php 
$cp_arg = array('post_type' => 'hot-deal', 'posts_per_page' => -1, 'post_parent' => 0);
$cp_qry = new WP_Query($cp_arg);
$cp_title = $args['cp_title'];
$cp_id = $args['cp_id'];
$fim = get_the_post_thumbnail_url($cp_id, '1536x1536');
?>
<style type="text/css">
	.site-content {
		--bg-color: #EDF2F6;
	}

	.cp-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 48px;
		font-style: normal;
		font-weight: 400;
		line-height: 48px;
		text-align: center;
		margin-bottom: 12px;
	}

	.campaign-now {
		display: flex;
		justify-content: center;
		gap: 12px;
	}

	.cp-item {
		display: flex;
		padding: 8px 24px;
		align-items: flex-start;
		gap: 24px;
		border-radius: 32px;
		border: 1px solid var(--grey-grey-700, #CFD4D9);
		background: var(--white, #FFF);
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
	}

	.cp-item.-active {
		border: 2px solid var(--blue-blue-400, #3A638E);
		color: var(--dynamic-text-link, #2973A5);
	}

	.cp-pj-wrap {
		padding-top: 64px;
	}

	.cp-pj-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		text-align: center;
		font-size: 48px;
		font-style: normal;
		font-weight: 400;
		line-height: 48px;
	}

	.hd-pj-cards-section {
		padding-bottom: 40px;
	}

	.hd-pj-card {
		border: 1px solid var(--grey-grey-800, #DFE3E8);
		background: var(--white, #FFF);
		display: grid;
		grid-template-columns: 1fr 3fr;
		padding: 24px;
		padding-left: 0;
		margin-bottom: 24px;
	}

	.hd-pj-card>.-units {
		display: grid;
		grid-template-columns: repeat(3, 1fr);
		grid-gap: 16px;
	}

	.hd-pj-card .-about .-img {
		height: auto;
		width: 160px;
		margin-top: 94px;
	}

	.hd-pj-card .-about .-btn {
		border-radius: 8px;
		border: 1px solid var(--blue-blue-700, #B7CDE4);
		background: var(--white, #FFF);
		display: inline-flex;
		padding: 8px 16px;
		align-items: flex-start;
		gap: 4px;
		color: var(--blue-blue-300-main, #123F6D);
		text-align: center;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		/* 123.077% */
	}

	.hd-pj-card .-about {
		padding: .5rem;
		text-align: center;
	}

	.hd-pj-card .-about .-pj-status {
		font-size: 18px;
		font-style: normal;
		font-weight: 700;
		line-height: 20px;
		margin-bottom: 20px;
		display: block;
	}
	#hd-l2-header{
		display: none;
	}
	.hd-l2-1pj-header{
		padding: 18px 0 0;
	}
	.hd-l2-1pj-header h1{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 56px;
		font-style: normal;
		font-weight: 400;
		line-height: 56px;
		display: none;
	}
	.hd-l2-1pj-header-mob {
		padding-top: 26px;
	}
	.hd-l2-1pj-header-mob h1{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 38px;
		font-style: normal;
		font-weight: 400;
		line-height: 40px;
	}
	/*-- Mobile Version --*/
	@media (max-width: 1320px) {
		#cpj-units{
			padding-top: 23px !important;
		}
	}
	/*-- Mobile Version --*/
	@media (min-width: 1321px) {
		.hd-l2-1pj-header-mob{
			display: none;
		}
		.header-nav-inner .-logo{
			display: none;
		}
		.header-nav-inner {
			grid-template-columns: auto 130px;
		}
		#header-nav .-nav{
			justify-content: flex-start;
		}
		.hd-l2-1pj-header h1{
			display: block;
		}
		.hd-l2-1pj-header{

			padding: 22px 0 16px;
		}
	}
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		.l2-units .pj-unit-wrap > .-units{
			display: block;
		}
	}
</style>


<div class="cont py-6 flex flex-row items-center" style="white-space: nowrap;">
	<a href="/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก') ?></a>
	<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
	<a href="" class="truncate"><?=$cp_title?></a>
</div>
<div class="mt-1 mb-6">
	<div class="cont">
		<h2 class="cp-title"><?php pll_e('แคมเปญ') ?></h2>
		<div class="campaign-now">
			<?php
			foreach ($cp_qry->posts as $cp_k => $cp_v) {
				$active = '';
				if ($cp_v->ID == $cp_id) {
					$active = '-active';
				}
				$href = get_the_permalink($cp_v->ID);
				echo "<a href='$href' class='cp-item $active'>$cp_v->post_title</a>";
			}
			?>
		</div>
	</div>
</div>
<div class="hd-banner" data-aos="fade-up">
	<img src="<?= $fim ?>" class="w-full">
</div>