<?php
$value = $args;

$theme_img = get_site_url().'/wp-content/themes/seed-spring/img';
$vf = get_field('hot_deal_l3',$value->ID);
$full_price = setComma($vf['full_price']);
$sell_price = setComma($vf['sell_price']);
$book_price = setComma($vf['book_price']);
$fim = get_the_post_thumbnail_url( $value->ID, 'large' );
$plan = $vf['plan']['sizes']['1536x1536'];
$unit_url = get_permalink($value->ID);

$pj = get_field('hot_deal_l2',$value->post_parent)['project'][0];


$v_App = 'HotDeal';
$v_OrderTypePayment = 6;
$v_ProjectID = get_field('project_code',$pj->ID);
$v_UnitCode = $vf['unit_code'];
$v_Amount = $vf['book_price'];
$book_url = asw_hot_deal_book($v_App,$v_OrderTypePayment,$v_ProjectID,$v_UnitCode,$v_Amount);

?>
<div class="pj-unit" data-status=<?=$vf['status']?> data-aos="fade-up" data-aos-once="false">
	<div class="-header" style="background-image:url('<?=$fim?>')">
		<div class="-viewplan jb-lightbox" data-jb-lightbox="plan-<?=$value->ID?>" style="--img:url('<?=$plan?>')">
			<img src="<?=$theme_img?>/hotdeal/view-plan.svg">
		</div>
	</div>
	<div class="-detail">
		<div class="-info">
			<div class="-scope">
				<h5 class="-title"><?=$value->post_title?></h5>
				<div class="--room-detail">
					<div>
						<img src="<?=$theme_img?>/hotdeal/gis_measure-area.svg">
						<span><?=$vf['area']?> <?php pll_e('ตร.ม') ?></span>
					</div>

					<div>
						<img src="<?=$theme_img?>/hotdeal/ion_bed-outline.svg">
						<span><?=$vf['bed']?></span>
					</div>

					<div>
						<img src="<?=$theme_img?>/hotdeal/cil_bathroom.svg">
						<span><?=$vf['bath']?></span>
					</div>
				</div>
			</div>
			<div class="--line"></div>
			<div class="-overall-price">
				<div class="-unit-price">
					<?php if ($vf['full_price'] > 0): ?>
						<div class="-full-price">฿<?=$full_price?></div>
					<?php endif ?>
					<div class="-sell-price">฿<?=$sell_price?><span class="price-remark">*</span></div>
				</div>
				<div class="-book-price">
					<?php pll_e('จอง') ?> ฿<?=$book_price?>
				</div>
				<div class="-sold-out">
					<?php pll_e('Sold out') ?>
				</div>
			</div>

			<div class="-action">
				<a href="<?=$unit_url?>" target="_blank" class="-btn-1">
					<?php pll_e('ดูรายละเอียด') ?>
				</a>
				<a href="<?=$book_url?>" target="_blank" class="-btn-2"><?php pll_e('จองเลย') ?></a>
			</div>
		</div>
	</div>
</div>
<?php