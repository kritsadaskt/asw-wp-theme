<?php
$content = $args[0];
$f = $args[1];
pre($f);
?>

<style type="text/css">
#register {
	background-position: center;
	background-color: #001B28;
	background-image: url('<?= $form_bg ?>')
}

.form-template-elegant {
	max-width: 533px;
	display: block;
	margin: auto;
	color: #fff;
}

.form-template-elegant label span {
	font-weight: 700;
	font-size: 18px;
	line-height: 20px;
}

.form-template-elegant .wpcf7-text {
	padding: 6px 8px;
	background: rgba(255, 255, 255, 0.1);
	border: 1px solid rgba(255, 255, 255, 0.3);
	backdrop-filter: blur(10px);
	border-radius: 0 !important;
	transition: all .3s;
	height: 40px;
	font-weight: 400;
	font-size: 22px;
	line-height: 28px;
	width: 100%;
}

.form-template-elegant .wpcf7-text:hover {
	background: rgba(255, 255, 255, 0.3);
}

#consent_label {
	margin-top: 14px;
}

#consent_label a {
	color: #b64b57;
	text-decoration: underline;
}

.wpcf7 form.invalid .wpcf7-response-output {
	display: none;
}

.form-template-elegant .wpcf7-list-item label span {
	font-size: 22px;
	font-weight: 400;
}

.wpcf7-spinner {
	margin: em auto;
	background: #1de3e388;
	display: block;
}

.form-template-elegant .wpcf7-submit {
	padding: 6px 65px;
	display: inline-block;
	background: #973a43;
	border-radius: 0px;
	color: #ffffff;
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
	background: #b64b57;
}

.wpcf7-not-valid-tip {
	display: inline-block;
	margin-right: 0.5em;
}

.form-template-elegant .wpcf7-list-item {
	display: inline-block;
	margin: 0;
}

.form-template-elegant .wpcf7-list-item input[type=checkbox] {
	display: inline-block;
	width: auto;
	margin-right: 0.2em;
	accent-color: #b64b57;

}

.wpcf7-list-item label {
	display: inline-block;
	margin: 0;
}

.form-template-elegant .wpcf7-text:focus {
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

.form-template-elegant .form-column-2 {
	display: grid;
	grid-template-columns: 1fr 1fr;
	grid-gap: 22px 16px;
}

/*-- Mobile Version --*/
@media (max-width: 1319px) {
	.form-template-elegant .form-column-2 {
		grid-template-columns: 1fr;
		grid-gap: 16px;
	}

	.form-template-elegant .wpcf7-text {
		width: 100%;
	}

	.form-column-2 label {
		width: 100%;
	}
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

.hov-glow {
	position: absolute;
	top: 19.5%;
	left: 19.5%;
	opacity: 0;
}

.concept-nav-arrow:hover .hov-glow {
	opacity: 0.1;
}

.pr-25px {
	padding-right: 25px;
}

.pl-25px {
	padding-left: 25px;
}
.width-20px{
	width: 20px;
}
.cl-contact{
	color: #c6bdbc
	}
.hover-white{
	transition: all .5s;
}
.hover-white:hover{
	color: #fff;
}
</style>


<!--=== The Section Boxes : register ===-->
<section id="register" class="">
	<?php
	if ($content['form_type'] == 'right') {
		?>
		<div class="grid grid-cols-12">
			<div class="col-span-6">
				<div class="bg-cover" style="background-image:url('<?= $content['promotion_image']['sizes']['1536x1536'] ?>');height: 632px">
				</div>
			</div>
			<div class="col-span-6">
				<div class="" style="background-image:url('<?= $content['background_image']['sizes']['1536x1536'] ?>');height: 632px">
					<div class="cont-pd">
						<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;">ลงทะเบียน</h1>
						<?=$content['form']?>
					</div>
				</div>
			</div>
		</div>
		<?php
	} elseif ($content['form_type'] == 'left') {
		?>
		<div class="grid grid-cols-12">
			<div class="col-span-6">
				<div class="" style="background-image:url('<?= $content['background_image']['url'] ?>');height: 632px">
					<div class="form-template-elegant elegant-form-1">
						<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;">ลงทะเบียน</h1>
						<?= $content['form'] ?>
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
							<span class="underline cl-contact hover-white">สอบถามเพิ่มเติม</span>
						</div>
					</div>

				</div>
			</div>
			<div class="col-span-6">
				<div class="bg-cover" style="background-image:url('<?= $content['promotion_image']['sizes']['1536x1536'] ?>');height: 632px">
				</div>
			</div>
		</div>
		<?php
	} else {
		?>
		<div class="bg-cover blank" ratio="10:4" style="background-image:url('<?= $content['promotion_image']['sizes']['1536x1536'] ?>')">
		</div>
		<div class="" style="background-image:url('<?= $content['background_image']['sizes']['1536x1536'] ?>');height: 632px;">
			<div class="cont-pd">
				<h1 class="text-center cl-ci1 py-10" style="line-height: 56px;font-size: 56px;font-weight: 400;">ลงทะเบียน</h1>
				<?=$content['form']?>
			</div>
		</div>
		<?php
	}
	?>
</section>
<?php theme_overide_style($content) ?>