<?php 
$pj = $args;
$pj_content = get_field('content',$pj->ID);
$pj_f = get_fields($pj->ID);
$pj_contact = [];
$pj_contact['telephone_number'] = get_field('telephone_number',$pj->ID);
$pj_contact['line_id'] = get_field('line_id',$pj->ID);
$pj_contact['facebook'] = get_field('facebook',$pj->ID);
$pj_contact['sales_gallery'] = get_field('sales_gallery',$pj->ID);
$theme_img = get_site_url().'/wp-content/themes/seed-spring/img/hotdeal';
?>
<style type="text/css">
	#contact-us{
		background: var(--blue-blue-300-main, #123F6D);
		color: var(--white, #FFF);
		padding: 1.5rem 0;
	}
	.contact-us-inner{
		display: grid;
		grid-template-columns: 1fr 1fr;
		gap: 1rem;
		align-items: center;
	}
	.contact-us-inner .-title{
		font-size: 30px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
	.contact-us-inner .-pj-title{
		font-size: 48px;
		font-style: normal;
		font-weight: 400;
		line-height: 48px;
		text-transform: capitalize;
	}
	.-contact {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 49px;
	}
	.-contact-btn{
		position: relative;
	}
	.-contact-btn a {
		display: flex;
		gap: 12px;
		color: var(--white, #FFF);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px; 
		align-items: center;
	}
	.-contact-btn img{
		height: 24px;
	}
	.-button-group {
		display: flex;
		gap: 8px;
	}
	.-btn-light {
		border-radius: 8px;
		border: 1px solid var(--blue-blue-700, #B7CDE4);
		background: var(--white, #FFF);
		display: inline-flex;
		justify-content: center;
		align-items: center;
	}
	.-btn-light a{
		color: #123F6D;

		padding: 10px;
		height: 44px;
		min-width: 44px;
		display: flex;
	}
	.-contact-btn.-telephone_number a::after {
		content: " ";
		background: #fff;
		width: 1px;
		height: 1rem;
		position: absolute;
		top: 8px;
		right: -25px;
	}
</style>

<section id="contact-us">
	<div class="cont">
		<div class="contact-us-inner">
			<div class="-about">
				<h5 class="-title"><?php pll_e('สนใจติดต่อโครงการ') ?></h5>
				<h2 class="-pj-title"><?=$pj->post_title?></h2>
			</div>
			<div class="-contact">
				<div class="-contact-btn -telephone_number">
					<a href="tel:<?=$pj_contact['telephone_number']?>" class="">
						<img src="<?=$theme_img?>/c-phone.svg">
						<span><?=$pj_contact['telephone_number']?></span>
					</a>
				</div>
				<div class="-button-group">
					<div class="-contact-btn -btn-light -line_id ">
						<a href="<?=$pj_contact['line_id']?>" class="">
							<img src="<?=$theme_img?>/c-line.png?1">
						</a>
					</div>
					<div class="-contact-btn -btn-light -facebook ">
						<a href="<?=$pj_contact['facebook']?>" class="">
							<img src="<?=$theme_img?>/c-fb.png?1">
						</a>
					</div>
					<div class="-contact-btn -btn-light -sales_gallery -desktop">
						<a href="<?=$pj_contact['sales_gallery']?>" class="px-3">
							<img src="<?=$theme_img?>/c-sale.svg">
							<span><?php pll_e('Sale Gallery') ?></span>
						</a>
					</div>
				</div>
				<div class="-contact-btn -btn-light -sales_gallery -mob">
					<a href="<?=$pj_contact['sales_gallery']?>" class="px-3">
						<img src="<?=$theme_img?>/c-sale.svg">
						<span><?php pll_e('Sale Gallery') ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>