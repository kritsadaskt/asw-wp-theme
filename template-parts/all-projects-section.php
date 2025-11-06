<!--=== The Section Boxes : all_project ===-->
<style type="text/css">
	.mid-block {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 32%;
	}

	.mid-block .flex {
		width: 160%;
	}

	.sec-all-pro {
		padding: 32px 0px;
	}

	.txt-townhome {
		padding-top: 2.25rem;
		padding-bottom: 2.25rem;
	}

	@media (max-width: 768px) {
		.mid-block {
			width: 39%;
		}
	}

	@media (max-width: 768px) {
		.mid-block {
			margin-left: -8px;
		}

		.mid-block .flex {
			width: 95vw;
		}

		.mid-block .flex a {
			width: 100%;
		}

		.txt-townhome {
			padding-top: 1.25rem;
			padding-bottom: 1.25rem;
		}
	}

	@media (min-width: 992px) {
		.graylogo-size {
			width: 17%;
		}
	}

	@media (min-width: 768px) {
		.graylogo-size {
			width: 15%;
		}
	}
</style>
<section id="all_project" class="sec-all-pro padding-l-vtc-">
	<img src="/wp-content/uploads/2022/11/leaves-shadow-4.png" class="absolute pointer-events-none leaf09">
	<img src="/wp-content/uploads/2022/11/leaves-shadow2-1.png" class="absolute pointer-events-none leaf10">
	<div class="cont-pd text-center">
		<div class="">
			<div id="show_pro_foot" class="flex flex-row justify-center">
				<a id="txt_pro" onclick="show_allpro(-1)" class="btn cl-white b5 padding-xl-hzt">
					<h6 class="f26-20"><?php pll_e('แสดงโครงการทั้งหมดของแอสเซทไวส์') ?></h6>

				</a>
				<div id="arr_pro" onclick="show_allpro(-1)" class="bg-white pointer pt-1">
					<div id="arrow" class="arrow"></div>
				</div>
			</div>
		</div>
		<div id="show-all" style="transition: .5s;opacity: 0;max-height: 0;overflow: hidden;" class="whitespace-nowrap">
			<?php
			$term_pj_type = asw_get_term_nest('project-type');

			?>
			<sp class="hidden vl md:block"></sp>
			<div id="show-condo">
				<span class="flex flex-row items-center justify-center" style="padding-top: 1rem;padding-bottom: 1rem;">
					<img src="/wp-content/uploads/2022/09/Vector.png" style="height:24px;margin:0;margin-right: 12px;">
					<h6 class=""><?php pll_e('คอนโดมิเนียม') ?></h6>
				</span>
				<sp class="l hidden md:block"></sp>
				<div class="grid grid-cols-2 md:flex md:flex-wrap md:justify-center grid-flow-row gap-4 md:gap-6 px-1 ">
					<?php
					foreach ($term_pj_type['condominium']->child as $key => $value) {

						$iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id);
						$is_show = get_field('is_show', $value->taxonomy . '_' . $value->term_id);
					?>
						<?php $condo_link = get_term_link($value->term_id); ?>
						<?php
						if ($is_show != 'hide') {
						?>
							<a href="<?php echo $condo_link ?>"
								class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer">
								<img src="<?= $iconic['url'] ?>">
							</a>
						<?php
						}
						?>
						<!-- </div> -->
					<?php

					}
					?>
				</div>
			</div>
			<sp class="xl"></sp>
			<hr style="background-color: var(--ci-grey-900);border:1px solid var(--ci-grey-900);">
			<sp class="s"></sp>
			<div id="show-townhome">
				<span class="flex flex-row items-center justify-center txt-townhome">
					<img src="/wp-content/uploads/2022/10/Icon-in-input.png"
						style="filter: grayscale(100%);height:24px;margin:0;margin-right: 12px;">
					<h6 class=""><?php pll_e('บ้านและทาวน์โฮม') ?></h6>
				</span>
				<sp class="s"></sp>
				<div class="grid grid-cols-2 md:flex md:flex-wrap md:justify-center grid-flow-row gap-4 md:gap-6 px-1 ">
					<?php
					foreach ($term_pj_type['house']->child as $key => $value) {

						$iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id);
						$is_show = get_field('is_show', $value->taxonomy . '_' . $value->term_id);
					?>
						<?php $house_link = get_term_link($value->term_id); ?>
						<!-- <div class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer"> -->
						<?php
						if ($is_show != 'hide') {
						?>
							<a href="<?php echo $house_link ?>"
								class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer">
								<img src="<?= $iconic['url'] ?>">
							</a>
						<?php
						}
						?>
						<!-- </div> -->
					<?php }

					?>
				</div>
			</div>
			<sp style="height: 32px;"></sp>
		</div>
	</div>
</section>

<script>
	function txt_shorter(text, chars_limit) {
		if (text.length > chars_limit) {
			new_text = text.substring(0, chars_limit);
			new_text = new_text.trim();
			return new_text.concat("...")
		} else {
			return text
		}
	}
	var ttt = document.querySelectorAll("#txt_20");
	for (let i = 0; i < ttt.length; i++) {
		ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 100);
	}


	function onMouseOver(event) {
		this.style.outlineWidth = "2px"
		this.children[0].style.filter = "grayscale(0%)"
	}

	function onMouseOut(event) {
		this.style.outlineWidth = "1px"
		this.children[0].style.filter = "grayscale(100%)"
	}
	for (let e of document.getElementsByClassName('graylogo')) {
		e.addEventListener('mouseover', onMouseOver, true);
		e.addEventListener('mouseout', onMouseOut, true);
	}

	if (document.querySelector('#home_promotion_slides_wrap') != null) {
		document.querySelector('#home_promotion_slides_wrap').style.setProperty('--max', <?= $promo_chk * 3 ?>)
	}
	let waitingPromotionLoop = null

	function show_promo_arrow(plus) {
		let nowNum = parseInt(document.querySelector('#home_promotion_slides_wrap').style.getPropertyValue('--i'))
		const max = parseInt(document.querySelector('#home_promotion_slides_wrap').style.getPropertyValue('--max')) / 3
		if (isNaN(nowNum)) {
			nowNum = 0
		}
		nowNum += plus
		if (nowNum < 0) {
			nowNum = max - 1
		}
		nowNum = nowNum % (max * 3)
		let x = nowNum % (max) + 1;
		if (x == 0) {
			x = max
		}
		home_promotion_slides_num_now.innerText = pad(x, 2)
		show_promo(nowNum)
	}

	function show_promo(num) {
		let elNum = num

		const allEl = document.querySelectorAll('.home-promo-title')
		const max = parseInt(document.querySelector('#home_promotion_slides_wrap').style.getPropertyValue('--max')) / 3
		elNum = elNum % max
		let nowNum = parseInt(document.querySelector('#home_promotion_slides_wrap').style.getPropertyValue('--i'))

		if (isNaN(nowNum)) {
			nowNum = 0
		}
		// if (nowNum>num) {
		// 	num = num+max
		// }
		document.querySelector('#home_promotion_slides_wrap').style.setProperty('--i', num)
		document.querySelector('#home_promotion_slides').classList.add('sliding')
		let scrollY = 0;
		let iCount = 0;
		let barY = 0;
		xconsolex.log('elNum', elNum)
		for (let i of allEl) {
			xconsolex.log(i.offsetHeight)
			i.classList.remove('cl-ci-orange-700')
			i.classList.remove('font-medium')
			// i.classList.remove('b-select')
			if (iCount < elNum) {
				scrollY += i.offsetHeight
				barY += i.offsetHeight
			}
			iCount++
		}
		scrollY = scrollY + (24 * elNum)
		barY = barY + (24 * elNum)
		scrollY -= 72
		xconsolex.log(scrollY)
		allEl[elNum].classList.add('cl-ci-orange-700')
		allEl[elNum].classList.add('font-medium')
		barYoffset = (document.querySelectorAll('.home-promo-title')[elNum].offsetHeight - 28) / 2
		// barYoffset = 0
		xconsolex.log(barYoffset)
		barYoffset = 0
		document.querySelector('.promotion_vbar').style.top = barY + barYoffset + 'px'
		// allEl[elNum].classList.add('b-select')
		home_promotion_title_inner.scrollTo(0, scrollY)
		clearTimeout(waitingPromotionLoop)
		waitingPromotionLoop = setTimeout(() => {
			document.querySelector('#home_promotion_slides').classList.remove('sliding')
			if (parseInt(document.querySelector('#home_promotion_slides_wrap').style.getPropertyValue('--i')) > max - 1) {
				xconsolex.log('back')
				document.querySelector('#home_promotion_slides_wrap').style.setProperty('--i', elNum)
			}
		}, 1400)
	}
</script>
<script type="text/javascript">
	var chk = -1;
	var veri = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-400')
	document.getElementById("txt_pro").addEventListener('mouseover', proMouseOver, true);
	document.getElementById("txt_pro").addEventListener('mouseout', proMouseOut, true);
	document.getElementById("arr_pro").addEventListener('mouseover', proMouseOver, true);
	document.getElementById("arr_pro").addEventListener('mouseout', proMouseOut, true);

	function proMouseOver(event) {
		show_allpro(1)
	}

	function proMouseOut(event) {
		show_allpro(2)
	}

	function show_allpro(num) {

		if (num == 1) {
			veri = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-500');
		} else if (num == -1) {
			chk *= num
		}
		const showproj = document.getElementById('show-all');
		if (chk == 1) {
			document.getElementById('txt_pro').style.backgroundColor = "white"
			document.getElementById('txt_pro').style.setProperty('color', veri, 'important');
			document.getElementById('txt_pro').style.setProperty('border-color', veri, 'important');
			document.getElementById('arr_pro').style.setProperty('background-color', veri, 'important');
			document.getElementById('arr_pro').style.setProperty('border-color', veri, 'important');
			document.getElementById('arrow').style.borderColor = "white";
			document.getElementById('arrow').style.transform = "rotate(-135deg)";
			document.getElementById('arrow').style.top = "7px";
			showproj.style.opacity = "1";
			showproj.style.maxHeight = "1000px";
		} else {
			document.getElementById('txt_pro').style.backgroundColor = veri
			document.getElementById('txt_pro').style.setProperty('color', 'white', 'important');
			document.getElementById('txt_pro').style.setProperty('border-color', veri, 'important');
			document.getElementById('arr_pro').style.setProperty('background-color', 'white', 'important');
			document.getElementById('arr_pro').style.setProperty('border-color', veri, 'important');
			document.getElementById('arrow').style.borderColor = veri;
			document.getElementById('arrow').style.transform = "rotate(45deg)";
			document.getElementById('arrow').style.top = "0";
			showproj.style.opacity = "0";
			showproj.style.maxHeight = "0";
		}
		veri = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-400')
	}

	var recent_pop = -1;
	var blue900 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-blue-900')
</script>