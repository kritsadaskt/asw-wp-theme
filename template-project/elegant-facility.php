<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);

$has_building = 1;
if (is_array($content['building']) == null) {
	$has_building = 0;
}
if ($content['hide_b'] == 'hide') {
	$has_building = 0;
}
?>
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
		<div style="background-image: url('<?= acf_img($content['background_image']) ?>');height: fit-content;background-color: var(--facility--background_color);">
			<div class="relative container mx-auto section-fade facility-main-wrap" style="padding-bottom: 25px">
				<div class="container mx-auto grid grid-cols-12">
					<div class="theme-title col-span-12 xl:col-span-4 text-center xl:text-left">
						<h1 class="text-left faci-title"><?php pll_e('สิ่งอำนวยความสะดวก')?></h1>
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
						// pre($value);
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
			<h1 class="-title another-faci-title"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h1>
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