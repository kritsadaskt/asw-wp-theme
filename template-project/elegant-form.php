<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
?>
<?php 
foreach ($content as $key => $value) {
	if ($value['acf_fc_layout']=='form') {
		?>
		<!--=== The Section Boxes : register ===-->
		<section id="register" class="">
			<?php
			if ($value['form_type'] == 'right') {
				?>
				<div class="grid grid-cols-12">
					<div class="col-span-6">
						<div class="bg-cover" style="background-image:url('<?= $value['promotion_image']['sizes']['1536x1536'] ?>');height: 632px">
						</div>
					</div>
					<div class="col-span-6">
						<div class="" style="background-image:url('<?= $value['background_image']['sizes']['1536x1536'] ?>');height: 632px">
							<div class="cont-pd">
								<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;"><?php pll_e('ลงทะเบียน')?></h1>
								<?=$value['form']?>
							</div>
						</div>
					</div>
				</div>
				<?php
			} elseif ($value['form_type'] == 'left') {
				?>
				<div class="grid grid-cols-12">
					<div class="col-span-6">
						<div class="" style="background-image:url('<?= $value['background_image']['url'] ?>');height: 632px">
							<div class="form-template-elegant elegant-form-1">
								<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;"><?php pll_e('ลงทะเบียน')?></h1>
								<?= $value['form'] ?>
								<script>
									document.querySelector('.form-column-2').children[0].children[0].querySelector('.wpcf7-form-control-wrap').querySelector('input').placeholder = "ชื่อ"
									document.querySelector('.form-column-2').children[1].children[0].querySelector('.wpcf7-form-control-wrap').querySelector('input').placeholder = "นามสกุล"
									document.querySelector('.form-column-2').children[2].children[0].querySelector('.wpcf7-form-control-wrap').querySelector('input').placeholder = "เบอร์โทรศัพท์"
									document.querySelector('.form-column-2').children[3].children[0].querySelector('.wpcf7-form-control-wrap').querySelector('input').placeholder = "อีเมล"
								</script>
							</div>
							<div class="form-contact">
								<div class="-line"></div>
								<div class="-txt"><?php pll_e('หรือ')?></div>
								<div class="-line"></div>
							</div>
							<div class="grid grid-cols-12 text-white pt-6">
								<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
									<span class=" p-3">
										<img class="width-20px" src="/wp-content/uploads/2023/03/Icon.png" alt="">
									</span>
									<span class="hover-white cl-contact">02-168-0000</span>
								</div>
								<div class="col-span-6 flex flex-row items-center pl-25px">
									<span class=" p-3">
										<img class="width-20px" src="/wp-content/uploads/2023/03/Icon-1.png" alt="">
									</span>
									<span class="underline cl-contact hover-white"><?php pll_e('สอบถามเพิ่มเติม')?></span>
								</div>
							</div>

						</div>
					</div>
					<div class="col-span-6">
						<div class="bg-cover" style="background-image:url('<?= $value['promotion_image']['sizes']['1536x1536'] ?>');height: 632px">
						</div>
					</div>
				</div>
				<?php
			} else {
				?>
				<div class="bg-cover blank" ratio="10:4" style="background-image:url('<?= $value['promotion_image']['sizes']['1536x1536'] ?>')">
				</div>
				<div class="" style="background-image:url('<?= $value['background_image']['sizes']['1536x1536'] ?>');height: 632px;">
					<div class="cont-pd">
						<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;"><?php pll_e('ลงทะเบียน')?></h1>
						<?=$value['form']?>
					</div>
				</div>
				<?php
			}
			?>
		</section>
		<?php
	}
}
?>