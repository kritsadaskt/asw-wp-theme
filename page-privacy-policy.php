<?php get_header() ?>
<!--=== The Section Boxes : banner ===-->
<style type="text/css">
	body,
	html {
		overflow: visible;
	}

	.about-menu {
		color: var(--ci-grey-400);
		transition: all .2s;
	}

	.cl-ci-orange-500 {
		color: var(--ci-orange-500) !important;
	}

	.about_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	.side-nav-menu,
	.side-nav-menu-about {
		border-left: 0;
	}

	.about-ani:hover .bg-cover,
	.about-ani:hover,
	.about-wrap:hover .about-ani {
		transform: scale(1.07);
		transition: all .8s;
	}

	.about_hline {
		/*width: 100%;*/
	}

	.about_hbar {
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}

	#menu-about {
		transition: all .15s;
	}

	#about-menu {
		position: sticky;
		top: calc(.5em + 70px);
	}

	div#about-info-section {
		position: absolute;
		width: 10px;
		height: 10px;
		top: -70px;
	}

	@media (max-width: 1023px) {
		.side-nav-menu-about {
			overflow: auto;
			white-space: nowrap;
			scroll-behavior: smooth;
			overflow-y: hidden;
			/*width: 95.5vw;*/
			/*width: 100%;*/
		}

		#bg-circle {
			left: -40%;
			top: calc(5% + 25vw);
			width: 100%;
			height: auto;
		}

	}

	@media (max-width: 767px) {

		.side-nav-menu,
		.side-nav-menu-about {
			border-left: 0;
			border-bottom: 0;
		}

		.side-nav-menu-about {
			/*width: 91.5vw;*/
		}

		#bg-circle {
			top: calc(10% + 50vw);
		}

	}
</style>

<?php
$f = get_fields();
$slider = $f['banner']['home_banner'];
function pad($num)
{
	if ($num > 9) {
		return $num;
	} else {
		return '0' . $num;
	}
}
?>
<script type="text/javascript">
	function pad(num, size) {
		num = num.toString();
		while (num.length < size) num = "0" + num;
		return num;
	}
</script>
<style type="text/css">
	.txt_120 {
		display: block;
		height: calc(28px * 2);
		overflow: hidden;
	}

	#txt_20 {
		height: calc(28px * 2);
		overflow: hidden;
	}

	#home-slider {
		width: 100%;
		padding-top: 41.111%;
		/*padding-top: 56.25%;*/
		position: relative;
		display: flex;
	}

	#home-slider-inner {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #000;
	}

	#home-slider-arrow {
		display: grid;
		grid-template-columns: 48px 48px;
		grid-column-gap: 8px;
		position: absolute;
		left: 24px;
		bottom: 64px;
		z-index: 10;
	}

	#home-slider-arrow img {
		display: inline-block;
		border-radius: 100%;
		cursor: pointer;
		transition: all .2s;
		opacity: .7;
	}

	#home-slider-arrow img:hover {
		opacity: 1;
	}

	#home-slider-slides {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	.home-slider-slide {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		transition: all .4s;
	}

	#home-slider-count {
		--i: 0;
		--z: 5;
		width: 240px;
		height: 30px;
		left: -200px;
		top: 48px;
		z-index: 10;
		position: absolute;
		align-items: center;
		display: flex;
		color: #fff;
		transform: rotate(-90deg);
		transform-origin: center right;
	}

	#home-slider-count .-num-bar {
		height: 2px;
		width: 93px;
		margin: 0 12px;
		background-color: #fff4;
		position: relative;
		display: flex;
	}

	#home-slider-count .-num-bar div {
		background-color: #fff;
		height: 100%;
		width: 0;
	}

	#home-slider-count .-num-bar div.go {
		width: 100%;
		transition: all 4.9s linear;
	}

	.home-slider-slide-video .plyr--video {
		max-height: 100% !important;
	}

	.home-news-date {
		position: absolute;
		bottom: 1.2rem;
		left: 1rem;
	}

	.home-news-date-sp {
		width: 100%;
		height: 30px;
	}

	#home-slider-count h3 {
		font-size: 40px;
	}

	#home-slider-count p {
		font-size: 26px;
		position: relative;
		top: 4px;
		padding-left: 4px;
		color: #EDF2F7;
	}

	.plyr-slider-wrap {
		position: absolute;
		display: flex;
		width: 100%;
		height: 200%;
		/*background-color: yellow;*/
		left: 0;
		top: -50%;
	}

	.plyr__video-embed iframe {
		transform: scale(.75);
	}

	.home-slider-slide-video {
		overflow: hidden;
	}

	.promotion_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	#middle-news-pic {
		position: relative;
		width: calc(100% + 8px);
		padding-right: 8px;
		padding-bottom: 8px;
	}

	#middle-news-pic::before {
		content: " ";
		position: absolute;
		background-color: var(--ci-veri-500);
		width: 30%;
		height: 30%;
		right: 0;
		bottom: 0;
	}

	.home-blog-inner {
		position: relative;
	}

	.home-blog-inner::before {
		content: " ";
		position: absolute;
		left: 0;
		top: 0;
		background: var(--ci-orange-500);
		width: 4px;
		transition: all .8s;
		height: 0%;
	}

	.home-blog-card:hover .home-blog-inner::before {
		height: 100%;
	}

	#home-slider-inner-mob {
		display: none;
	}

	.home-slider-shadow {
		width: 200px;
		height: 100%;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		background: linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(255, 255, 255, 0) 100%);
	}

	@media (max-width: 768px) {
		.home-blog-inner {
			display: flex;
			align-items: center;
		}
	}

	#home-slide-cmd-mob {
		display: none;
	}

	@media (max-width: 768px) {
		#home-slider-inner {
			display: none;
		}
	}

	.about-mini-section {
		transition: all 2s cubic-bezier(0, 0, 0, 1.5)
	}

	.about-mini-section[data-show="0"] {
		opacity: 0;
		transform: translateY(100px);

	}

	.about-mini-section[data-show="1"] {
		opacity: 1;
		transform: translateY(0px);
	}
</style>

</div>
<style type="text/css">
	#about-us {
		background: url(/wp-content/uploads/2022/12/circle.png);
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-position: left 8rem;
	}

	@media (max-width: 767px) {
		#about-us {
			background-position: -7rem 2rem;
			background-size: contain;
		}
	}
</style>
<style type="text/css">
	.arrow-l {
		height: 48px;
		top: 47%;
		left: 1%;
		opacity: 1;
		transition: .5s;
	}

	.arrow-r {
		height: 48px;
		top: 47%;
		right: 1%;
		opacity: 1;
		transition: .5s;
	}

	.arrow-l:hover,
	.arrow-r:hover {
		filter: brightness(200%);
	}

	.about-year {
		transform: rotate(-90deg);
		top: 16px;
		z-index: 999;
	}

	@media (max-width: 767px) {
		.modal-img-content {
			width: 100%;
			/*height: 100%;*/
			top: 0;
		}

		.mySlides {
			height: 100% !important;
			align-items: unset !important;
		}

		.mySlides img {
			height: auto !important;
			width: 100% !important;
		}
	}

	.reward-year {
		color: var(--ci-grey-100);
		transition: .8s all;
	}

	.reward-hover:hover .reward-hovered {
		left: 0%;
		transition: .8s all;
	}

	.reward-hover:hover .reward-img {
		transform: scale(1.08);
		transition: .8s all;
	}

	.reward-hover:hover .reward-year {
		transition: .8s all;
		color: white;
	}

	.reward-year,
	.reward-img {
		transition: .8s all;
	}

	.reward-hovered {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: -100%;
		background-color: rgba(18, 63, 109, 0.7);
		transition: .8s all;
	}
</style>
<div class=" mx-auto py-6  px-4">
	<div class="flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/about-us" class=""><?php pll_e('นโยบายการคุ้มครองข้อมูลส่วนบุคคล')?></a>
	</div>
</div>

<sp class="hidden lg:block"></sp>
<?php
$size = !empty($f['policy']);
?>
<!--=== The Section Boxes : about us ===-->
<section id="about-us" class="" data-max="<?= ($size) ? sizeof($f['policy']) : 0 ?>">
	<!-- 	<div id="bg-circle" class="absolute">
		<img src="/wp-content/uploads/2022/12/circle.png">
	</div> -->
	<div class="cont-pd lg:pt-10 -pb-10">
		<div id="about-info-section"></div>
		<div class="grid grid-flow-row lg:grid-cols-12 gap-4">
			<div class="lg:col-span-4">
				<!--=== The Section Boxes : about-menu ===-->
				<section id="about-menu" class="lg:pl-6 lg:pb-10 pt-4">
					<h1><?php pll_e('นโยบายการคุ้มครองข้อมูลส่วนบุคคล')?></h1>
					<div id="menu-about" class="flex flex-row lg:flex-col side-nav-menu-about relative pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8" style="">
						<!-- <div onclick="show_info(0)" class="about-menu px-0 lg:px-4 cl-ci-orange-500 font-medium">
							เกี่ยวกับแอสเซทไวส์
						</div>
						<sp class="hidden lg:block" style="height: 1rem;"></sp> -->
						<!-- onclick="show_info(1)" -->
						<!-- <div  class="about-menu px-0 lg:px-4">
							<a href="!#" class="">รางวัลและความสำเร็จ</a>
						</div> -->
						<?php
						foreach ($f['policy'] as $key => $value) {
							?>
							<div onclick="show_info(<?= $key ?>)" class="about-menu px-0 lg:px-4 <?= ($key == 0) ? 'cl-ci-orange-500 font-medium' : '' ?>">
								<?= $value['tab_name'] ?>
							</div>
							<sp class="hidden lg:block" style="height: 1rem;"></sp>
							<?php
						}
						?>
						<sp class="hidden lg:block" style="height: 1rem;"></sp>

						<div class="hidden lg:block absolute bg-ci-grey-900" style="width: 1px;height: 100%;left: 0px;z-index: 1;">
							<div class="about_vbar"></div>
						</div>
						<div class="block lg:hidden absolute bg-ci-grey-900 about_hline" style="height: 2.5px;bottom: 1.15px;z-index: 1;">
							<div class="about_hbar"></div>
						</div>
					</div>
				</section>
			</div>
			<style type="text/css">
				@media (max-width: 767px) {
					#about-asw .cont-pd {
						padding: 0;
					}

					.f40-30 h3 {
						display: inline;
					}
				}
			</style>
			<?php
			?>
			<style>
				.privacy-policy-tab[data-active='0'] {
					display: none;
				}
			</style>
			<?php

			foreach ($f['policy'] as $key => $value) :
				?>
				<div id="privacy-policy-<?= $key + 1 ?>" data-tab="<?= $key + 1 ?>" data-active='<?= $key == 0 ? 1 : 0 ?>' class="privacy-policy-tab lg:col-span-8 pt-8 md:pt-0 xl:pt-4 xl:pr-24 text-justify pb-20 md:pr-0">
					<!-- <?= $value['tab_name'] ?> -->
					<div class="entry-content">
						<?= $value['content'] ?>
					</div>
				</div>
				<?php
			endforeach;
			?>
		</div>
	</div>
</section>


<?php get_footer() ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	window.addEventListener("resize", () => {
		setTimeout(() => {
			setWidthMenu();
		}, 200)
	});
	let current = 0;
	let width_hline_gap;

	function setWidthMenu() {
		const elAll = document.querySelectorAll('.about-menu');
		const menu = document.querySelector('#menu-about');
		const hline = document.querySelector('.about_hline');
		const hbar = document.querySelector('.about_hbar');

		let width_hline = 0;
		let left_hline = 0;
		let iCount = 0;

		elAll.forEach((el, index) => {
			width_hline += el.offsetWidth;
		})
		for (let i of elAll) {
			if (iCount < current) {
				if (document.body.clientWidth < 768) {
					left_hline += i.offsetWidth;
				} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
					left_hline += i.offsetWidth;
				}
			}
			iCount++
		}
		if (document.body.clientWidth < 768) {
			width_hline_gap = width_hline;
			width_hline_gap += ((elAll.length - 1) * 16); // 32px
			menu.style.width = 'calc(100vw - 32px)';

			if (width_hline_gap < menu.offsetWidth) { // flex
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width = 100 + '%';
			} else {
				width_hline_gap = 0;
				width_hline += ((elAll.length - 1) * 16); // 16px
				menu.style.columnGap = 16 + "px";
				left_hline = left_hline + (current * 16);

				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';
			}

		} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
			width_hline_gap = width_hline;
			menu.style.width = 'calc(100vw - 32px)';

			if (width_hline_gap < menu.offsetWidth) { //flex
				menu.style.width = '';
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width = 100 + '%';
			} else {
				menu.style.width = '';
				width_hline_gap = 0;
				width_hline_gap += ((elAll.length - 1) * 32); // 32px
				menu.style.columnGap = 32 + "px";
				left_hline = left_hline + (current * 32);
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';

			}
		}
		hbar.style.width = elAll[current].offsetWidth + 'px';
	}


	setTimeout(() => {
		setWidthMenu();
	}, 200);

	function show_info(num) {
		toFilterTop()
		let tabAll = parseInt(document.querySelector('#about-us').dataset.max);
		if (document.querySelector('.privacy-policy-tab[data-active="1"]') != null) {
			document.querySelector('.privacy-policy-tab[data-active="1"]').dataset.active = 0;
		}
		$$('.privacy-policy-tab')[num].dataset.active = 1;
		current = num;
		const elNum = num;
		const allEl = document.querySelectorAll(".about-menu");
		const menu = document.querySelector('#menu-about');

		let scrollY = 0;
		let iCount = 0;
		let barY = 0;

		let barX = 0;
		let width_hline = 0;
		allEl.forEach((el, index) => {
			width_hline += el.offsetWidth;
		})

		for (let i of allEl) {

			i.classList.remove('cl-ci-orange-500')
			i.classList.remove('font-medium')
			if (iCount < elNum) {
				scrollY += i.offsetHeight;
				barY += i.offsetHeight;

				barX += i.offsetWidth;
			}
			iCount++

		}
		scrollY = scrollY + (16 * elNum);
		barY = barY + (16 * elNum);
		scrollY -= 32;
		allEl[elNum].classList.add('cl-ci-orange-500');
		allEl[elNum].classList.add('font-medium');
		barYoffset = (document.querySelectorAll('.about-menu')[elNum].offsetHeight - 28) / 2;
		document.querySelector('.about_vbar').style.top = barY + barYoffset + 'px';


		if (document.body.clientWidth < 768) {
			if (width_hline_gap != 0) {
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			} else {
				barX = barX + (current * 16);
			}


		} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
			xconsolex.log(width_hline_gap);
			if (width_hline_gap != 0) {
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			} else {
				barX = barX + (current * 32);
			}

		}


		document.querySelector('.about_hbar').style.width = allEl[current].offsetWidth + 'px';
		document.querySelector('.about_hbar').style.left = barX + 'px';
	}

	function toFilterTop() {
		document.querySelector('#about-info-section').scrollIntoView({
			behavior: 'smooth'
		});

	}

	function checkWaveScroll() {
		let headerHeight = document.querySelector('#masthead').offsetHeight
		let miniSec = document.querySelectorAll('.about-mini-section')
		let windowHeight = window.innerHeight
		for (let i of miniSec) {
			let thisRect = i.getBoundingClientRect()
			if (thisRect.y < headerHeight) {
				i.dataset.play = 0
			} else {
				i.dataset.play = 1
			}

			if (thisRect.y <= windowHeight - 100) {
				i.dataset.show = 1
			}


		}
	}

	window.onscroll = () => {
		checkWaveScroll()
	}
	checkWaveScroll()
</script>