<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);

$form_pattern = $content['form_pattern'];
$form_type = $content['form_type'];
$form_bg = $content['background_image']['sizes']['1536x1536'];
if ($form_pattern == 'float') {
	$form_bg = $content['promotion_image']['sizes']['1536x1536'];
}
?>

<section id="register" class="bg-cover xl:hidden" style="background-image:url('<?= $content['background_image']['sizes']['1536x1536'] ?>')">
	<div class="container mx-auto">
		<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
		<div class="register_mobile_form px-4">
			<div class="form-template form-1">
				<h2 class="form-title" style="padding-bottom: 16px"><?php pll_e('ลงทะเบียน')?></h2>
				<?= $content['form'] ?>
			</div>
			<div class="form-contact">
				<div class="-line"></div>
				<div class="-txt"><?php pll_e('หรือ')?></div>
				<div class="-line"></div>
			</div>
			<div class="grid grid-cols-12 text-white py-6">
				<div class="col-span-6 flex flex-row justify-center items-center">
					<span class="p-3">
						<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
					</span>
					<span>02-168-0000</span>
				</div>
				<div class="col-span-6 flex flex-row justify-center items-center">
					<span class=" p-3">
						<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
					</span>
					<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="register" class="bg-cover hidden xl:block">
	<div class="section-fade">
		<?php
		if ($content['promotion_image']['id'] != '') {
			if ($form_pattern == 'fix' && $form_type != 'bottom') {
				?>
				<div class="container mx-auto">
					<div class="grid grid-cols-12">
						<?php if ($form_type == 'left') : ?>
							<div class="col-span-6">
								<div class="form-template form-1">
									<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
									<?= $content['form'] ?>
								</div>
								<div class="form-contact">
									<div class="-line"></div>
									<div class="-txt"><?php pll_e('หรือ')?></div>
									<div class="-line"></div>
								</div>
								<div class="grid grid-cols-12 text-white pt-6" style="padding-bottom:70px;">
									<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
										<span class=" p-3">
											<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
										</span>
										<span>02-168-0000</span>
									</div>
									<div class="col-span-6 flex flex-row items-center pl-25px">
										<span class=" p-3">
											<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
										</span>
										<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
									</div>
								</div>
							</div>
						<?php endif ?>
						<div class="col-span-6">
							<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
						</div>
						<?php if ($form_type == 'right') : ?>
							<div class="col-span-6">
								<div class="form-template form-1">
									<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
									<?= $content['form'] ?>
								</div>
								<div class="form-contact">
									<div class="-line"></div>
									<div class="-txt"><?php pll_e('หรือ')?></div>
									<div class="-line"></div>
								</div>
								<div class="grid grid-cols-12 text-white pt-6">
									<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
										<span class=" p-3">
											<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
										</span>
										<span>02-168-0000</span>
									</div>
									<div class="col-span-6 flex flex-row items-center pl-25px">
										<span class=" p-3">
											<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
										</span>
										<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
									</div>
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
				<?php
			} else if ($form_pattern == 'fix' && $form_type == 'bottom') {
				?>
				<img src="<?= $content['promotion_image']['sizes']['large'] ?>" class="w-full">
				<div class="col-span-6">
					<div class="form-template form-1">
						<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
						<?= $content['form'] ?>
					</div>
					<div class="form-contact">
						<div class="-line"></div>
						<div class="-txt"><?php pll_e('หรือ')?></div>
						<div class="-line"></div>
					</div>
					<div class="grid grid-cols-12 text-white pt-6">
						<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
							<span class=" p-3">
								<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
							</span>
							<span>02-168-0000</span>
						</div>
						<div class="col-span-6 flex flex-row items-center pl-25px">
							<span class=" p-3">
								<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
							</span>
							<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
						</div>
					</div>
				</div>
				<?php
			} else if ($form_pattern == 'float') {
				?>
				<div class="container mx-auto">
					<div class="grid grid-cols-12">
						<?php if ($form_type == 'right') : ?>
							<div class="col-span-6"></div>
						<?php endif ?>
						<div class="col-span-6 bg-cover bg-center" style="background-image:url('<?= $content['form_bg']['sizes']['large'] ?>')">
							<div class="form-template form-1">
								<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
								<?= $content['form'] ?>
							</div>
							<div class="form-contact">
								<div class="-line"></div>
								<div class="-txt"><?php pll_e('หรือ')?></div>
								<div class="-line"></div>
							</div>
							<div class="grid grid-cols-12 text-white pt-6" style="padding-bottom:70px;">
								<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
									<span class=" p-3">
										<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
									</span>
									<span>02-168-0000</span>
								</div>
								<div class="col-span-6 flex flex-row items-center pl-25px">
									<span class=" p-3">
										<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
									</span>
									<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		} else {
			?>
			<div class="container mx-auto mb-14">
				<div class="grid grid-cols-12 center">
					<div class="col-span-3"></div>
					<div class="col-span-6">
						<div class="form-template form-1">
							<h2 class="form-title"><?php pll_e('ลงทะเบียน')?></h2>
							<?= $content['form'] ?>
						</div>
						<div class="form-contact">
							<div class="-line"></div>
							<div class="-txt"><?php pll_e('หรือ')?></div>
							<div class="-line"></div>
						</div>
						<div class="grid grid-cols-12 text-white pt-6" style="padding-bottom:70px;">
							<div class="col-span-6 flex flex-row justify-end items-center pr-25px">
								<span class=" p-3">
									<img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
								</span>
								<span>02-168-0000</span>
							</div>
							<div class="col-span-6 flex flex-row items-center pl-25px">
								<span class=" p-3">
									<img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
								</span>
								<span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</section>
