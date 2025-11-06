<?php
$content = $args[0];
$f = $args[1];
$form_pattern = $content['form_pattern'];
$form_type = $content['form_type'];
$form_bg = $content['background_image']['sizes']['1536x1536'];
if ($form_pattern == 'float') {
	$form_bg = $content['promotion_image']['sizes']['1536x1536'];
}
?>
<style type="text/css">
	#register {
		background-position: center;
		background-color: #001B28;
		background-image: url('<?= $form_bg ?>');
		background-size: cover;

	}
	.form-contact {
		display: flex;
		color: white;
		justify-content: center;
		align-items: center;
	}

	.form-contact .-txt {
		width: 3em;
		text-align: center;
	}

	.form-contact .-line {
		height: 1px;
		background: rgba(255, 255, 255, 0.3);
		width: calc(40% - 2em);
	}


	.form-template {
		max-width: 533px;
		display: block;
		margin: auto;
		margin-top: 52px;
		color: #fff;
	}

	.form-template label span {
		font-weight: 700;
		font-size: 18px;
		line-height: 20px;
	}

	.form-template .wpcf7-text {
		padding: 6px 16px;
		background: rgba(255, 255, 255, 0.1);
		border: 1px solid rgba(255, 255, 255, 0.3);
		backdrop-filter: blur(10px);
		border-radius: 24px;
		transition: all .3s;
		height: 40px;
		font-weight: 400;
		font-size: 22px;
		line-height: 28px;
		width: 100%;
	}

	.form-template .wpcf7-text:hover {
		background: rgba(255, 255, 255, 0.3);
	}

	#consent_label {
		margin-top: 14px;
	}

	#consent_label a {
		color: #20E3E3;
		text-decoration: underline;
	}

	.wpcf7 form.invalid .wpcf7-response-output {
		display: none;
	}

	.form-template .wpcf7-list-item label span {
		font-size: 22px;
		font-weight: 400;
	}

	.wpcf7-spinner {
		margin: em auto;
		background: #1de3e388;
		display: block;
	}

	.form-template .wpcf7-submit {
		padding: 6px 65px;
		display: inline-block;
		background: #20E3E3;
		border-radius: 32px;
		color: #092647;
		border: none;
		height: auto;
		line-height: 28px;
		font-size: 22px;
		font-weight: 500;
		box-sizing: border-box;
		width: auto;
		display: block;
		margin: auto;
		cursor: pointer;
		margin-top: 28px;
		transition: all 0.5s;
	}

	.wpcf7-submit:hover {
		background: hsla(180, 78%, 70%, 1);
	}

	.wpcf7-not-valid-tip {
		display: inline-block;
		margin-right: 0.5em;
	}

	.form-template .wpcf7-list-item {
		display: inline-block;
		margin: 0;
	}

	.form-template .wpcf7-list-item input[type=checkbox] {
		display: inline-block;
		width: auto;
		margin-right: 0.2em;
		opacity: .5;
	}

	.wpcf7-list-item label {
		display: inline-block;
		margin: 0;
	}

	.form-template .wpcf7-text:focus {
		border: 2px solid #0ff;
		height: 40px;
	}

	.form-title {
		font-style: normal;
		font-weight: 400;
		font-size: 56px;
		line-height: 56px;
		color: #FFFFFF;
		-webkit-text-stroke: 1px #E81E57;
		text-shadow: 0px 1px 12px #F84577;
		text-align: center;
	}

	.form-template .form-column-2 {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-gap: 22px 16px;
	}

	/*-- Mobile Version --*/
	@media (max-width: 1319px) {
		.form-template .form-column-2 {
			grid-template-columns: 1fr;
			grid-gap: 16px;
		}

		.form-template .wpcf7-text {
			width: 100%;
		}

		.form-column-2 label {
			width: 100%;
		}
	}
</style>

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
<?php theme_overide_style($content) ?>