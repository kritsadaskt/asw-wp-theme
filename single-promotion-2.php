<?php get_header() ?>

<!--=== The Section Boxes : banner ===-->
<?php $v = get_fields();?>
<section id="banner" class="">
	<div class="bg-cover blank" ratio="10:4" style="background-image:url(<?=$v['banner']['url']?>)">
	</div>
</section>

<!--=== The Section Boxes : detail ===-->
<section id="detail" class="padding-l-vtc">
	<div class="cont-pd">
		<h2 class="t-center">รายละเอียดโปรโมชั่น</h2>
		<sp class="vl"></sp>
		<theboxes class="top spacing-vl -clip middle">
			<box col="6"><inner class="">
				<div class="bg-cover blank" ratio="facebook" style="background-image:url(<?=$v['promotion_image']['url']?>)"></div>
			</inner></box>
			<box col="6"><inner class="">
				<?=$v['detail']?>
				<sp class=""></sp>
				สิทธิประโยชน์
				<br>
				<ul class="list">
					<?php foreach ($v['benefit'] as $key => $value){ ?>
						<li><?=$value['benefit_detail'] ?></li>
					<?php }
					?>
				</ul>
				<br>
				ระยะเวลาโปรโมช่ัน
				<br>
				<?=$v['period']?>
				<sp class=""></sp>
				*เงื่อนไขเป็นไปตามที่บริษัทกำหนด 
			</inner></box>
		</theboxes>
	</div>
</section>
<sp class="vl"></sp>

<!--=== The Section Boxes : related-project ===-->
<section id="related-project" class="padding-xl-vtc bg-smoke">
	<div class="cont-pd">
		<div class="t-center">
			<h2>โครงการที่เกี่ยวข้อง</h2>
			<sp class="l"></sp>
			<theboxes class="top spacing-l -clip rack" boxing="4">
				<?php
				// pre($v['participating_projects']);
				foreach ($v['participating_projects'] as $key => $value) {
					$info = get_fields( $value->ID );
					// pre($info); ?>

					<box col=""><inner class="bg-grey bg-cover t-center" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID) ?>');box-shadow: 0px -140px 10px -15px #434242c2 inset">
					<div class="padding">
						<span class="padding-s cl-white" style="background-color: <?=$info['color_status']?>"><?=$info['project_status']?></span>
						<sp class=""></sp>
						<sp class="vl"></sp>
						<sp class="vl"></sp>
						<sp class="vl"></sp>
						<sp class="vl"></sp>
						<sp class="vl"></sp>
						<div class="bg-grey-2 padding">
							<?php echo get_the_title($value->ID); ?>
						</div>
						<sp class=""></sp>
						<span class="cl-white"><?=$info['area']?></span>
						<sp class=""></sp>
						<sp class="bg-black xs"></sp>
						<sp class=""></sp>
						<span class="cl-white">ราคาเริ่มต้น <?=$info['price']?> ล้าน</span>
					</div>
				</inner></box>

				<?php }
				?>
			</theboxes>
		</div>
	</div>
</section>
<?php get_footer() ?>