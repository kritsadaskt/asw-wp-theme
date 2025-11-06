<?php
$content = $args[0];
$f = $args[1];
?>
<!-- For Facilities section -->
<style type="text/css">
	.facility_alt-icon {
		width: 48px;
		display: inline-block;
	}

	.facility_alt-blocks {
		display: none;
		grid-template-columns: repeat(6, 1fr);
		column-gap: 50px;
		grid-row-gap: 40px;
		padding-top: 80px;
		padding-bottom: 83px;
		height: 427px;
	}

	.facility_alt-block {
		width: 100px;
		text-align: center;
	}

	.facility_alt-text {
		font-style: normal;
		font-weight: 500;
		font-size: 22px;
		line-height: 28px;
	}

	.facility-cont {
		display: flex;
		transition: .75s;
	}

	.faci-img {
		transition: .75s;
		width: 0;
		background-size: cover !important;
		background-position: center !important;
	}

	.faci-desc {
		transition: .75s;
		position: relative;
		padding: 112px 24px;
		padding-top: 0;
		color: white;
		width: 12.5vw;
		background-size: cover !important;
		background-position: center !important;
	}

	.faci-num {
		transition: .75s;
		font-size: 26px;
		font-weight: 400;
		line-height: 32px;
		margin-top: 20px;
		color: var(--ci-grey-500);
		z-index: 2;
		position: relative;
	}

	.faci-content-title {
		transition: .75s;
		font-size: 30px;
		font-weight: 500;
		line-height: 32px;
/*		height: calc(32px * 2);*/
color: white;
z-index: 2;
position: relative;
}

.faci-content-body {
	transition: .5s;
	font-size: 26px;
	font-weight: 300;
	line-height: 32px;
	height: calc(32px * 6);
	z-index: 2;
	position: relative;
	left: 100%;
	z-index: -1;
	opacity: 0;
	overflow: hidden;
	width: 0%;
	/*display: none;*/
}

.-shadow {
	opacity: 0.6;
	z-index: 1;
	background-color: black;
	width: 100%;
	height: 100%;
	position: absolute;
	left: 0;
}

.-open .-shadow {
	opacity: 0;
}

.-open.facility-cont {
	margin-right: 8px;
	margin-left: 8px;
}

.-open.facility-cont:nth-child(1) {
	margin-left: 0;
}

.-open .faci-content-body {
	opacity: 1;
	/*display: block;*/
	left: 0;
	z-index: 2;
}

.-open .faci-img {
	height: 100%;
	width: 50.5vw;
}

.-open .faci-desc {
	width: 24.5vw;
	background: linear-gradient(144.04deg, #2D100D 2.16%, #3D1611 45.66%, #481B13 62.72%, #7F3020 101.39%) !important;
	padding: 112px 32px;
	padding-top: 0;
}

.-open .faci-num {
	font-size: 26px;
	font-weight: 400;
	line-height: 32px;
	margin-top: 36px;
	color: white;
}

.-open .faci-content-title {
	font-size: 48px;
	font-weight: 400;
	font-weight: 500;
	line-height: 48px;
}

.-open .faci-content-body {
	font-size: 26px;
	font-weight: 300;
	line-height: 32px;
	width: 100%;
}

.hidescroll::-webkit-scrollbar {
	display: none;
}

.hidescroll {
	-ms-overflow-style: none;
	scrollbar-width: none;
}

.another-faci-topic {
	position: relative;
	display: flex;
	gap: 64px;
	padding-left: 32px;
	padding-right: 8px;
	padding-bottom: 6px;
	border-bottom: 1px solid var(--ci-grey-300);
}

.another-faci-wrap {
	display: flex;
	gap: 32px;
}

.-line {
	height: 8px;
	width: 1px;
	background-color: var(--ci-grey-300);
	position: relative;
	top: 10px;
}

.another-faci-wrap .-text {
	cursor: pointer;
	transition: .5s;
}

.another-faci-wrap .-text.-active {
	color: #973A43;
}

.another-faci-wrap .-text:hover {
	color: #973A43;
}
.facility-chevron {
	width: 20px;
	height: 20px;
	cursor: pointer;
	transition: .5s;
	background-image: var(--mc-chevron-up);
	background-repeat: no-repeat;
	background-size: contain;
	cursor: pointer;
	transition: .5s;
	transform: rotate(90deg);
}

.facility-chevron.-left {
	transform: rotate(-90deg);
}
.faci-content-body .-inner {
	width: calc(24.5vw - (32px * 2));
}
.facility_gallery_wrap{
	--i:0;
	--max:2;
	width: 100vw;
	overflow: hidden;
}
.facility_gallery_rail{
	width: calc(var(--max) * 100vw);
	transition: all .5s ease-in-out;
	transform: translateX(calc(var(--i)*-100vw));
	display: flex;
}
.facility_gallery {
    width: 100%;
}
</style>


<section id="facility" class="is-on-nav">
	<div style="background-image: url('<?= acf_img($content['bg_img']) ?>');height: fit-content;">
		<div class="container mx-auto">
			<div class="text-center py-10">
				<h1 class="text-white text-left"><?php pll_e('สิ่งอำนวยความสะดวก')?></h1>
			</div>
		</div>
		<div class="facility_gallery_wrap">
			<div class="facility_gallery_rail">
				<?php
				foreach ($content['facility'] as $key => $value) { ?>
					<?php if ($key%3 == 0): ?><div class="facility_gallery flex"><?php endif ?>
					<div class="facility-cont <?= ($key == 0) ? '-open' : '' ?>">
						<div class="faci-img" style="background-image: url('<?= $value['image']['url'] ?>');">
						</div>
						<div id="" class="faci-desc" style="background-image: url('<?= $value['image']['url'] ?>');">
							<div class="-shadow"></div>
							<h6 class="faci-num">
								<?php echo sprintf("%02d", $key + 1); ?>

							</h6>
							<h2 class="faci-content-title mb-6">
								<?= $value['title'] ?>
							</h2>
							<div class="faci-content-body">
								<div class="-inner">
									<?= $value['description'] ?>
								</div>
							</div>
						</div>
					</div>
					<?php if ($key%3 == 2): ?></div><?php endif ?>
					<?php
				}
				?>
			</div>
		</div>
		<div class="container mx-auto">
			<div class="text-center text-white flex flex-col items-center">
				<h2 class="-title py-10"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h2>
				<div class="another-faci-topic text-center place-content-center items-center">
					<div class="another-faci-wrap">
						<?php
						foreach ($content['building'] as $key => $value) { ?>
							<div class="-line <?php if ($key == 0) {
								echo 'hidden';
							} ?>"></div>
							<div class="-text faci-nav <?php if ($key == 0) {
								echo '-active';
							} ?>" onclick="change_anotherfac(<?= $key ?>, this)">
							<span><?= $value['building_name'] ?></span>
						</div>
					<?php }
					?>
				</div>
				<div class="pointer">
					<span>
						<div class="facility-chevron"></div>
					</span>
				</div>
				<div class="absolute" style="bottom: -1px;left: 0;width: 96px;height: 2px;background: linear-gradient(121.54deg, #D1AB8C -8.39%, #882D39 70.92%);"></div>
			</div>
		</div>
		<div class="text-white">
			<?php
			foreach ($content['building'] as $key => $value) { ?>
				<div class="facility_alt-blocks justify-items-center px-20" style="<?php if ($key == 0) {
					echo "display: grid;";
				} ?>">
				<?php
				foreach ($value['image_and_text'] as $k => $v) { ?>
					<div class="facility_alt-block">
						<div class="facility_alt-icon">
							<img src="<?= $v['icon']['url'] ?>" style="width: 40px;height: 40px;">
						</div>
						<p class="facility_alt-text pt-4"><?= $v['text'] ?></p>
					</div>
				<?php }
				?>
			</div>
		<?php }
		?>
	</div>
</div>
</div>
</section>
<!-- For Facilities section -->
<script type="text/javascript">
	for (let e of document.getElementsByClassName('facility-cont')) {
		e.addEventListener('mouseover', onMouseOver, true);
	}

	function onMouseOver(event) {
		for (let ele of document.getElementsByClassName('facility-cont')) {
			ele.classList.remove("-open");
		}
		this.classList.add("-open");
	}

	function change_anotherfac(num, ele) {
		for (let e of document.getElementsByClassName('faci-nav')) {
			e.classList.remove("-active")
		}
		ele.classList.add("-active")
		let fac_block = document.getElementsByClassName("facility_alt-blocks")
		for (let i = 0; i < fac_block.length; i++) {
			fac_block[i].style.display = "none"
		}
		fac_block[num].style.display = "grid"
	}
</script>
<?php theme_overide_style($content) ?>