<?php
$content = $args[0];
$f = $args[1];
$v2_content = get_field('v2_content');
$content = $v2_content[4];

$has_building = 1;
if (is_array($content['building']) == null) {
	$has_building = 0;
}
if ($content['hide_b'] == 'hide') {
	$has_building = 0;
}
?>
<!-- For Facilities section -->
<style type="text/css">
	#facility {
		background-size: cover;
		background-position: center;
	}

	.facility_alt-text {
		font-style: normal;
		font-weight: 500;
		font-size: 22px;
		line-height: 1.2;
	}

	.facility_alt-icon {
		width: auto;
		display: block;
		margin-bottom: 8px;
	}

	.facility_alt-icon img {
		height: 70px;
		width: 100%;
		object-fit: contain;
		object-position: center bottom;
	}

	.facility_alt-blocks {
		--block-h: 128px;
		flex-flow: row wrap;
		margin-top: 48px;
		margin-bottom: 78px;
		max-width: 1000px;
		margin-left: auto;
		margin-right: auto;
		display: none;
		/*height: calc(var(--block-h) * 2);
		overflow: auto;*/
		justify-content: center;
	}

	.facility_alt-text {
		color: var(--text-color);
		max-height: calc(28px * 2);
		max-height: 2lh;
		overflow: hidden;
	}

	.facility_alt-blocks[data-show="1"] {
		display: flex;
	}

	.facility_alt-block {
		width: calc(100% / 6);
		height: 128px;
		text-align: center;
		padding: 0 16px;
	}

	@media (max-width: 767px) {
		.facility_alt-block {
			padding: 0 4px;
		}
	}



	.facility_alt-blocks[data-show='1'] {
		display: flex;
		max-height: calc(128px * 2);
		overflow: auto;
	}

	.facility_alt-blocks::-webkit-scrollbar {
		width: 8px;
	}

	.facility_alt-blocks::-webkit-scrollbar-track {
		background: #323A4100;
		border-radius: 8px;
	}


	.facility_alt-blocks::-webkit-scrollbar-thumb {
		background: var(--mc-main-2);
		border-radius: 8px;
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
		padding-bottom: 6px;
		border-bottom: 1px solid var(--ci-grey-300);
	}

	.another-faci-wrap {
		display: flex;
	}

	.-line-f {
		height: 8px;
		width: 1px;
		background-color: var(--ci-grey-300);
		position: relative;
		top: 10px !important;
	}

	.another-faci-wrap .-text {
		cursor: pointer;
		transition: .5s;
		padding: 0 32px;
		width: max-content;
	}

	.another-faci-wrap .-text.-active {
		color: #973A43;
	}

	.another-faci-wrap .-text:hover {
		color: #973A43;
	}

	.facility-chevron {
		width: 20px;
		height: .5rem;
		cursor: pointer;
		transition: .5s;
		background-image: var(--mc-chevron-up);
		background-repeat: no-repeat;
		background-size: contain;
		background-position: center;
		cursor: pointer;
		transition: .5s;
		transform: rotate(90deg);
	}

	.facility-chevron.-left {
		transform: rotate(-90deg);
	}

	.fac-draw-inner[data-end="1"] .facility-chevron.-right {
		opacity: 0;
		pointer-events: none;
	}

	.faci-content-body .-inner {
		width: calc(24.5vw - (32px * 2));
	}

	.facility_gallery_wrap {
		--i: 0;
		--max: 2;
		width: 100vw;
		overflow: hidden;
	}

	.facility_gallery_rail {
		width: calc(var(--max) * 100vw);
		transition: all .5s ease-in-out;
		transform: translateX(calc(var(--i)*-100vw));
		display: flex;
	}

	.facility_gallery {
		width: 100%;
	}

	/*NEW*/
	.facility_desktop {
		color: #fff;
	}

	.facility_desktop {
		--g: 0;
	}

	.facility_desktop .-item {
		position: relative;
		background: #0008;
		width: 100%;
		display: grid;
		grid-template-columns: auto var(--side-w);
		transition: all .5s linear;
	}

	.facility_desktop .-side {
		background: linear-gradient(to right, yellow, blue);
	}

	.facility_desktop .-body {
		background: #0ff9;
		overflow: hidden;

	}

	.facility_desktop .-group {
		--i-l: 75vw;
		--i-s: 12.5vw;
		--side-w: 25vw;
		width: 100vw;
		display: grid;
		transition: all .5s linear;
		height: 32vw;
		grid-template-columns: var(--i-s) var(--i-s) var(--i-s);
	}

	.facility_desktop .-group[data-gi="0"] {
		grid-template-columns: var(--i-l) var(--i-s) var(--i-s);
	}

	.facility_desktop .-group[data-gi="1"] {
		grid-template-columns: var(--i-s) var(--i-l) var(--i-s);
	}

	.facility_desktop .-group[data-gi="2"] {
		grid-template-columns: var(--i-s) var(--i-s) var(--i-l);
	}




	.facility_desktop .-group[data-gi-max="2"] {
		grid-template-columns: var(--i-l) calc(var(--i-s) * 2);
	}

	.facility_desktop .-group[data-gi-max="2"][data-gi="1"] {
		grid-template-columns: calc(var(--i-s) * 2) var(--i-l);
	}

	.facility_desktop .-group[data-gi-max="1"] {
		grid-template-columns: 90vw;
		margin-left: 5vw;
	}

	.facility_desktop .-group[data-gi-max="1"] .-item[data-active="1"] .-pseudo-block {
		width: 90vw;
	}

	.facility_desktop .-group[data-gi-max="1"] .-item[data-active="1"] {
		padding-right: 0;
	}

	.facility_desktop .-item[data-active="0"] {
		grid-template-columns: auto 0vw;
	}

	.facility_desktop .-body-inner {
		width: var(--side-w);
		padding: 36px 32px;

	}

	.facility_desktop .-side {
		position: relative;
		background-image: var(--bgi);
		background-size: cover;
		background-position: left center;
		padding: 20px 24px;
	}

	.facility_desktop .-body {
		background: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));
	}

	.facility_desktop .-side-overlay {
		width: 100%;
		position: absolute;
		background: #14141488;
		transition: all .5s linear;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;
		z-index: 1;
	}

	.facility_desktop .-item[data-active="1"] .-side-overlay {
		background: #0000;
	}

	.facility_desktop .-side-content {
		transition: all .5s ease-in-out;
		position: relative;
		z-index: 2;
		opacity: 1;
	}

	.facility_desktop .-item[data-active="1"] .-side-content {
		opacity: 0;
	}

	.facility_desktop .-item[data-active="1"] {
		padding-right: 8px;
	}

	.facility_desktop .-title-blank {}

	.facility_desktop .-item .-pseudo-block {
		position: absolute;
		top: 0;
		left: 0;
		width: var(--i-s);
		display: grid;
		grid-template-columns: auto var(--side-w);
		transition: all .5s linear;
		z-index: 5;
	}

	.facility_desktop .-item[data-active="0"] .-pseudo-block {
		grid-template-columns: auto 0;
	}

	.facility_desktop .-item[data-active="1"] .-pseudo-block {
		width: var(--i-l);
	}

	.facility_desktop .-pseudo-block .--right {
		position: relative;
	}

	.facility_desktop .-pseudo-block .-title {
		transition: all .5s linear;
		font-size: 30px;
		font-weight: 500;
		line-height: 32px;
		width: var(--i-s);
		display: block;
		padding: 0 24px;
		transform: scale(1);
		transform-origin: left top;
		position: relative;
		top: 0;
		left: calc(var(--i-s) * -1);
	}

	.facility_desktop .-item[data-active="1"] .-pseudo-block .-title {
		color: var(--mc-main-3);
		transform: scale(1.6);
		padding-left: 15px;
		left: 0;
	}

	.facility_desktop .-item[data-active="0"] .-pseudo-block .-title {
		color: var(--mc-main-3);
		top: 2em !important;
	}

	.facility_desktop .-item-i {
		color: var(--mc-main-3);
		font-size: 26px;
		line-height: 32px;
	}

	.facility_desktop .-wrap {
		overflow: hidden;
	}

	.facility_desktop .-rail {
		width: max-content;
		display: flex;
		transition: all .7s ease-in-out;
		transform: translateX(calc(-100vw*var(--g)));
	}

	.facility-menu-wrap {
		overflow: hidden;
		width: 100%;
	}

	.fac-draw-inner {

		--g: 0;
		--max: 3;
		width: 100%;
		grid-template-columns: 20px calc(100% - 40px) 20px;
		display: grid;
		justify-content: center;
		align-items: center;
	}

	.facility-menu-rail {
		display: flex;
		--left: 0;
		width: calc(100% * var(--max));
		transition: all .7s ease-in-out;
		transform: translateX(calc(var(--left) * -1px - 3px));
	}

	.facility-menu-group {
		width: 100%;
		background: linear-gradient(45deg, black, red);
	}

	.fac-draw {
		overflow: hidden;
	}

	.facility-menu {
		color: var(--mc-tab-text-color);
		position: relative;
		cursor: pointer;
		padding: 0 16px;
		min-width: 120px;
		max-width: 260px;
		text-align: center;
		transition: all .3s;
	}

	.facility-menu::after {
		border-radius: 50%;
		content: '';
		height: 4px;
		width: 4px;
		background-color: var(--mc-tab-text-color);
		position: absolute;
		left: -2px;
		top: 45%;
	}

	.facility-menu:nth-child(1):after {
		height: 0;
		width: 0;
	}

	.facility-menu.-active,
	.facility-menu:hover {
		color: var(--mc-tab-text-hover) !important;
	}

	.-absolute {
		--w: 20;
		--l: 0;
		position: absolute;
		bottom: -1px;
		left: 0;
		width: calc(1px*var(--w));
		transform: translateX(calc(1px*var(--l)));
		transition: all .4s ease-in-out;
		height: 2px;
		background: var(--mc-gd);
	}

	.facility_mobile {
		display: none;
	}

	.fac-draw-mob {
		display: none;
	}

	.facility-main-wrap {
		padding-top: 64px;
	}

	.another-faci-title {
		padding-top: 53px;
		padding-bottom: 1.5rem;
		font-size: 48px !important;
		font-weight: 400;
		line-height: 48px;
	}

	#facility .fac-draw-inner[data-g="0"] .-left {
		opacity: 0;
		pointer-events: none;
	}

	.faci-title {
		color: var(--mc-main-3);
	}

	/*-- Mobile Version --*/
	@media (max-width: 1319px) {
		#facility {
			background-image: url('<?= $content['bg_img_mobile']['sizes']['large'] ?>') !important;
		}

		#facility_main {
			padding-top: 64px;
			padding-bottom: 48px;
		}

		.facility_main-content {
			padding: 0 .5rem;
		}

		.facility_alt-blocks {
			height: calc(var(--block-h) * 4);
			height: auto;
			margin-bottom: 0;
			padding-left: 12px;
			padding-right: 12px;
			padding-bottom: 40px;
		}

		.facility_alt-block {
			width: calc(100% / 3);
		}

		.facility_main-content-body {
			text-align: left;
		}

		.faci-title {
			text-align: center;
			padding: 0 1rem;
			margin-top: 42px;
		}

		.fac-draw {
			display: none;
		}

		.facility_desktop {
			display: none;
		}

		.facility_mobile {
			display: flex;
			color: #fff;
		}

		.facility_mobile .-item-i {
			font-weight: 400;
			font-size: 26px;
			line-height: 32px;
		}

		.facility_mobile .-title {

			font-weight: 400;
			font-size: 36px;
			line-height: 40px;
		}

		.facility_mobile .-text {
			margin-top: 18px;
			font-weight: 400;
			font-size: 22px;
			line-height: 28px;
		}

		.facility_mobile .-body {
			padding: 24px 2rem 48px;
			background: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));
		}

		.facility_mobile .-img {
			width: 100%;
			padding-top: 64.2%;
			background-size: cover;
			background-position: center;
		}

		.facility_mobile .-wrap {
			overflow: hidden;
		}

		.facility_mobile .-rail {
			display: flex;
			width: max-content;
			transform: translateX(calc(var(--i)*-100vw));
			transition: all .5s;
		}

		.facility_mobile .-item {
			width: 100vw;
		}

		.fac-draw-mob {
			width: 100vw;
			display: block;
			margin-bottom: 28px;
			color: #fff;
		}

		.fac-draw-inner-mobile {
			display: grid;
			grid-template-columns: 20px auto 20px;
			grid-gap: 8px;
			align-items: center;
		}

		.facility-menu-wrap-mob {
			width: 100%;
			overflow: hidden;
		}

		.facility-menu-rail-mob {
			--l: 0;
			display: flex;
			width: max-content;
			transition: all .3s;
			transform: translateX(calc(var(--l) * -1px - 3px));
			margin: auto;
		}

		.another-faci-title {
			padding-top: 43px;
			line-height: 40px;
			font-size: 38px !important;
			padding-bottom: 10px;
		}

		.facility_alt-icon img {
			height: 60px;
		}

		#fac_alt .info-tabs-blocks {
			border-bottom: 1px solid #323A41;
		}

		#fac_alt .info-tabs-block {
			padding: 0;
			border-bottom: 0;
		}
	}

	#fac_alt .info-tabs-blocks {
		border-bottom: 1px solid #323A41;
	}

	.facility-menu:nth-child(1) {
		/*	padding-left: 0;*/
	}

	.facility-menu:last-child {
		/*	padding-right: 0;*/
	}
</style>
<?php
$max = 0;
if (is_array($content['facility'])) {
	$max = ofsize($content['facility']);
}
$gmax = intval($max / 3);
$gleft = $gmax % 3;
if ($gleft > 0) {
	$gmax++;
}

?>
<section id="facility" class="is-on-nav is-on-nav-mob">
	<?php if ($content['hide_a'] != 'hide' && $max != 0): ?>
		<div style="background-image: url('<?= acf_img($content['background_image']) ?>');height: fit-content;">
			<div class="relative container mx-auto section-fade facility-main-wrap" style="padding-bottom: 25px">
				<div class="container mx-auto grid grid-cols-12">
					<div class="theme-title col-span-12 xl:col-span-4 text-center xl:text-left">
						<h1 class="text-left faci-title">สิ่งอำนวยความสะดวก</h1>
					</div>
					<div class="col-span-2"></div>
					<div class="fac-draw col-span-12 xl:col-span-6 overflow-hidden flex items-center justify-between gap-2">
						<div class="fac-draw-inner" data-g="0" data-i="0" data-end="0"
						data-max="<?= ofsize($content['facility']) ?>">
						<div onclick="changeFactNavSlot(-1)" class="facility-chevron -left"></div>
						<div class="facility-menu-wrap scroll-hid w-full">
							<div class="facility-menu-rail inline-flex relative h-full items-center">
								<?php
								foreach ($content['facility'] as $key => $value) {
									?>
									<div class="facility-menu <?= ($key == 0) ? '-active' : '' ?>"
										onclick="changeFacNav(this)" data-i="<?= $key ?>" data-g="<?= intval($key / 3) ?>">
										<?= $value['title'] ?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<div onclick="changeFactNavSlot(1)" class="facility-chevron -right"></div>
					</div>
				</div>
				<script type="text/javascript">
					function changeFactNavSlot(d) {
						let nowG = parseInt($('.fac-draw-inner').dataset.g)
						let maxI = parseInt($('.fac-draw-inner').dataset.max)
						let maxG = parseInt(maxI / 3)
						if (maxI % 3 > 0) {
							maxG++
						}
						let nextG = ((nowG + d) % maxG + maxG) % maxG

						if (nextG == maxG - 1) {
							$('.fac-draw-inner').dataset.end = 1
						} else {
							$('.fac-draw-inner').dataset.end = 0
						}

						changeFactNavSlotTo(nextG)
					}

					function changeFactNavSlotTo(nextG) {
						let maxI = parseInt($('.fac-draw-inner').dataset.max)
						let maxG = parseInt(maxI / 3)
						if (maxI % 3 > 0) {
							maxG++
						}
						$('.fac-draw-inner').dataset.g = nextG
						$('.fac-draw-inner').style.setProperty('--g', nextG)
						let left = 0;
						let items = $$('.facility-menu')
						let child = $$(`.facility-menu[data-g="${nextG}"]`)
						let child_width = 0;
						for (let i of child) {
							child_width += i.clientWidth;
						}
						let shift = $('.facility-menu-wrap').clientWidth - child_width
						for (let i of items) {
							if (parseInt(i.dataset.g) < nextG) {
								left += i.clientWidth
							}
						}
						xconsolex.log('shift', shift)
						if (nextG == maxG - 1) {
							$('.facility-menu-rail').style.setProperty('--left', left - shift)
						} else {
							$('.facility-menu-rail').style.setProperty('--left', left)
						}
						// $('.facility_desktop').style.setProperty('--g',nextG)
					}

					function changeFacNav(el) {
						fac_reset()
						let g = parseInt(el.dataset.g)
						let i = parseInt(el.dataset.i)
						// changeFactNavSlotTo(g)
						$$('.facility_desktop .-group')[g].dataset.gi = i % 3
						let child = $$('.facility_desktop .-group')[g].querySelectorAll('.-item')
						for (let k of child) {
							k.dataset.active = 0
						}
						child[i % 3].dataset.active = 1
						let navI = $$('.facility-menu')
						for (let k of navI) {
							k.classList.remove('-active')
						}
						navI[i].classList.add('-active')
						$('.facility_desktop').style.setProperty('--g', g)
					}
				</script>
			</div>
		</div>
		<div class="facility_desktop section-fade" data-g="0" data-g-max="<?= $gmax ?>" data-g-left="<?= $gleft ?>">
			<div class="-wrap">
				<div class="-rail">
					<div class="-group" data-gi="0" data-gi-max="3">
						<?php
						$g = 0;
						foreach ($content['facility'] as $key => $value) {
							if ($key % 3 == 0 && $key > 0) {
								?>
							</div>
							<div class="-group" data-gi="-1" data-gi-max="3">
								<?php
							}
							?>
							<div class="-item" data-active="<?= ($key == 0) ? 1 : 0 ?>" onmouseenter="fac_elegant_gi(this)"
								data-gi="<?= $key % 3 ?>" data-i="<?= $key ?>"
								style="--bgi:url(<?= $value['image']['url'] ?>)">
								<div class="-side -s1">
									<div class="-side-overlay"></div>
									<div class="-side-content">
										<div class="-item-i" style="font-size: 26px;line-height: 32px">
											<?= sprintf("%02d", $key + 1); ?>
										</div>
									</div>
								</div>
								<div class="-body -b1">
									<div class="-body-inner">
										<div class="-item-i" style="font-size: 26px;line-height: 32px">
											<?= sprintf("%02d", $key + 1); ?>
										</div>
										<h2 class="-title-blank"></h2>
										<div class="-text" style="padding-top: 15px;">
											<?= $value['description'] ?>
										</div>
									</div>
								</div>
								<div class="-pseudo-block">
									<div class="--left"></div>
									<div class="--right">
										<h2 class="-title">
											<?= $value['title'] ?>
										</h2>
									</div>
								</div>
							</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<script type="text/javascript">
				function fac_elegant_gi(el) {
					fac_reset()
					let gi = el.dataset.gi
					el.parentElement.dataset.gi = gi
					let items = el.parentElement.querySelectorAll(`.-item`)
					for (let i of items) {
						i.dataset.active = 0
					}
					el.dataset.active = 1
					let nav = $$('.facility-menu')
					let k = parseInt(el.dataset.i)
					for (let i of nav) {
						i.classList.remove('-active')
					}
					nav[k].classList.add('-active')
				}

				function setFacItems() {
					let items = $$('.facility_desktop .-pseudo-block .-title')
					let items_blank = $$('.facility_desktop .-title-blank')
					for (let i = 0; i < items.length; i++) {
						let h = items[i].clientHeight
						items_blank[i].style.height = (h * 1.6) + 'px'
						items[i].style.top = items_blank[i].offsetTop + 'px'
					}
					let theG = $$('.facility_desktop .-group')
					for (let g of theG) {
						let it = g.querySelectorAll('.-item')
						g.dataset.giMax = it.length
					}

				}
				setFacItems()
			</script>
		</div>
		<style type="text/css">
			/*-- Mobile Version --*/
			@media (max-width: 1319px) {
				.fac-draw-mob .facility-chevron {
					opacity: 1;
					transition: all .2s;
				}

				.fac-draw-mob[data-i="0"] .-left {
					opacity: 0;
					pointer-events: none;
				}

				.fac-draw-mob[data-end="1"] .-right {
					opacity: 0;
					pointer-events: none;
				}
			}
		</style>
		<div class="fac-draw-mob" data-end="0" data-i="0">
			<div class="fac-draw-inner-mobile">
				<div onclick="faciMobNav(-1)" class="facility-chevron -left"></div>
				<div class="facility-menu-wrap-mob">
					<div class="facility-menu-rail-mob">
						<?php
						foreach ($content['facility'] as $key => $value) {
							?>
							<div class="facility-menu <?= ($key == 0) ? '-active' : '' ?>" onclick="faciNavTo(<?= $key ?>)"
								data-i="<?= $key ?>">
								<?= $value['title'] ?>
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<div onclick="faciMobNav(1)" class="facility-chevron -right"></div>
			</div>
		</div>

		<div class="facility_mobile section-fade" style="--max:<?= $max ?>;--i:0">
			<div class="-wrap">
				<div class="-rail">
					<?php
					foreach ($content['facility'] as $key => $value) {
						pre($value);
						?>
						<div class="-item">
							<div class="-img" style="background-image:url('<?= $value['image']['url'] ?>')">
							</div>
							<div class="-body">
								<div class="-body-inner">
									<div class="-item-i">
										<?= sprintf("%02d", $key + 1); ?>
									</div>
									<div class="-title">
										<?= $value['title'] ?>
									</div>
									<div class="-text">
										<?= $value['description'] ?>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function faciMobNav(d) {
				let el = $('.facility_mobile')
				let max = parseInt(el.style.getPropertyValue('--max'))
				let i = parseInt($(`.fac-draw-mob`).dataset.i)
				let wrap_width = $('.facility-menu-wrap-mob').clientWidth

				let nextNavI = (((i + d) % max) + max) % max
				$(`.fac-draw-mob`).dataset.i = nextNavI;

				let mobNav = $$('.fac-draw-mob .facility-menu')
				let left = 0
				let right = 0;
				let c = 0
				for (let j of mobNav) {
					if (c < nextNavI) {
						left += j.clientWidth
					} else {
						right += j.clientWidth
					}
					c++
				}

				let lastItems = mobNav[max - 1]
				shift = wrap_width - right;
				xconsolex.log('wrap_width', wrap_width)
				xconsolex.log('left', left)
				xconsolex.log('right', right)
				if (shift > 0) {
					$(`.fac-draw-mob`).dataset.end = 1
					$('.facility-menu-rail-mob').style.setProperty('--l', left - shift)
				} else {
					$(`.fac-draw-mob`).dataset.end = 0
					$('.facility-menu-rail-mob').style.setProperty('--l', left)
				}
			}

			function faciNavTo(i) {
				$('.facility_mobile').style.setProperty('--i', i)
				let mobNav = $$('.fac-draw-mob .facility-menu')
				for (let j of mobNav) {
					j.classList.remove('-active')
				}
				mobNav[i].classList.add('-active')
			}

			function fac_reset() {
				let item = $$('.facility_desktop .-item')
				let group = $$('.facility_desktop .-group')
				for (let i of item) {
					i.dataset.active = 0
				}
				for (let g of group) {
					g.dataset.gi = -1
				}
			}
		</script>
	</div>
<?php endif ?>

<?php if ($has_building): ?>
	<div id="fac_alt" class="container mx-auto section-fade">
		<div class="text-center">
			<h1 class="-title another-faci-title">สิ่งอำนวยความสะดวกอื่นๆ</h1>
			<style>
				#fac_alt {
					color: var(--mc-main-3);
				}

				#fac_alt .info-tabs-block-wrap {
					max-width: 800px;
					margin: auto;
				}

				#fac_alt .info-tabs-block {
					border-bottom: 0;
				}

				#fac_alt .info-tab.-active>.info-tab-txt {
					color: var(--mc-tab-text-hover) !important;
				}

				#fac_alt .info-tabs-block .info-tab {
					color: var(--mc-tab-text-color);
				}

				#fac_alt .-line-f {
					top: calc(50% - 4px) !important;
				}

				@media (max-width: 1319px) {
					#fac_alt .info-tabs-block .info-tab {
						/* padding: 6px 24px; */
					}

				}
			</style>
			<div class="text-center">
				<div class="info-tabs-block-wrap">
					<div class="info-tabs-block fac_alt-tabs-override">
						<div class="info-tabs-block-arrow -left"></div>
						<div class="info-tabs-blocks">
							<div class="info-tabs-rail">
								<?php
								foreach ($content['building'] as $key => $value) { ?>
									<div class="-line-f <?= ($key == 0) ? 'hidden' : '' ?>"></div>
									<div class="info-tab" data-tab="<?= $key ?>"
										onclick="change_anotherfac(<?= $key ?>, this)">
										<h6 class="info-tab-txt">
											<?= $value['building_name'] ?>
										</h6>
									</div>
								<?php }
								?>
								<div class="-absolute"></div>
							</div>

						</div>
						<div class="info-tabs-block-arrow -right"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
<script type="text/javascript">
	function setAltFac(j) {
		let items = $$('#fac_alt .info-tab')
		let left = 0;
		for (let i = 0; i < j; i++) {
			left += items[i].clientWidth
			left += 1
		}
		xconsolex.log(j);
		$('.info-tabs-blocks .-absolute').style.setProperty('--l', left)
		$('.info-tabs-blocks .-absolute').style.setProperty('--w', items[j].clientWidth)

	}
</script>
<div class="text-white">
	<?php
	foreach ($content['building'] as $key => $value) { ?>
		<div class="facility_alt-blocks" data-i="<?= $key ?>">
			<?php
			switch ($value['type']) {
				case 'text':
				foreach ($value['image_and_text'] as $key => $value):
					?>
					<div class="facility_alt-block">
						<div class="facility_alt-icon">
							<img src="<?= acf_img($value['icon']) ?>">
						</div>
						<p class="facility_alt-text">
							<?= $value['text'] ?>
						</p>
					</div>
					<?php
				endforeach;
				break;
				case 'image':
				?>
				<style>
					.facility_alt-blocks {
						--block-h: 150px;
					}

					.facility_alt-block {
						height: 150px;
					}

					.facility_alt-block>img {
						height: 135px;
						width: auto;
						object-fit: contain;
					}
				</style>
				<?php
				foreach ($value['image_by_image'] as $key => $value):
					?>
					<div class="facility_alt-block">
						<img src="<?= acf_img($value['image']) ?>">
					</div>
					<?php
				endforeach;
				break;
				case 'over_image':
				?>
				<style>
					.facility_alt-blocks {
						margin-bottom: 78px;
						height: auto;
					}
				</style>
				<div class="-facility_alt-block">
					<img class="hidden xl:block" src="<?= acf_img($value['overall_image']) ?>">
					<img class="block xl:hidden" src="<?= acf_img($value['overall_image_mobile']) ?>">
				</div>
				<?php
			}
			?>
		</div>
	<?php }
	?>
</div>
</div>
</section>
<!-- For Facilities section -->
<script type="text/javascript">
	function change_anotherfac(num, ele) {
		for (let e of $$('#fac_alt .info-tab')) {
			e.classList.remove("-active")
		}
		ele.classList.add("-active")
		let fac_block = $$("#facility .facility_alt-blocks")
		for (let i = 0; i < fac_block.length; i++) {
			fac_block[i].style.display = "none"
		}
		fac_block[num].style.display = "flex"
		setAltFac(num)
		// check_section_fade()
	}
	setTimeout(() => {
		$('#fac_alt .info-tab').click()
	}, 500);

	function faciCheckWidth() {
		let rail = document.querySelector('.facility-menu-rail-mob')
		let wrap = document.querySelector('.facility-menu-wrap-mob')
		rail_width = rail.clientWidth
		wrap_width = wrap.clientWidth
		if (rail_width < wrap_width) {
			$('.fac-draw-mob .facility-chevron.-right').style.opacity = 0
		} else {
			$('.fac-draw-mob .facility-chevron.-right').style.opacity = 1
		}
	}
	faciCheckWidth()
	window.addEventListener("resize", faciCheckWidth);
</script>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	var els = $$('.facility_alt-blocks');
	for(let el of els){
		var hammerTime = new Hammer(el);
		hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
		hammerTime.on("panend", function (ev) {

			let i = 0;
			var body = $$('#facility .info-tab');
			let max = body.length;
			for(let b of body){
				if (b.classList.contains('-active')) {
					break;
				}else{
					i++;
				}
			}
			xconsolex.log(i)
			xconsolex.log(max)

			let di = 0;
			if (ev.deltaX > 20) {
				di = -1;
			} else if (ev.deltaX < -20) {
				di = +1;
			}
			i = (((i+di)%max)+max)%max
			xconsolex.log('new i',i)
			$$('#facility .info-tab')[i].click()

		})
	}
</script>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	let el = $('.facility_mobile')
	let hammerTime = new Hammer(el);
	hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
	hammerTime.on("panend", function (ev) {

		let i = 0;
		var nav = $$('.facility-menu-rail-mob .facility-menu');
		let max = nav.length;
		for(let b of nav){
			if (b.classList.contains('-active')) {
				break;
			}else{
				i++;
			}
		}


		let di = 0;
		if (ev.deltaX > 20) {
			di = -1;
		} else if (ev.deltaX < -20) {
			di = +1;
		}
		i = (((i+di)%max)+max)%max
		nav[i].click()

	})
</script>
<?php theme_overide_style($content) ?>