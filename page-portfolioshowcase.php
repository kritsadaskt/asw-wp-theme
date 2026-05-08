<?php get_header() ?>
<!--=== The Section Boxes : banner ===-->
<style type="text/css">
	body, html{
		overflow: visible;
	}
	.about-menu{
		color: var(--ci-grey-400);
		transition: all .15s;
	}
	.cl-ci-orange-500{
		color: var(--ci-orange-500) !important;
	}
	.about_vbar{
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: auto;
    bottom: 2px;
		background-color: #F1683B;
		transition: all .2s;
	}
	.side-nav-menu, .side-nav-menu-about{
		border-left: 0;
	}
	.about-ani:hover .bg-cover, .about-ani:hover, .about-wrap:hover .about-ani {
		transform: scale(1.07);
		transition: all .8s;
	}
	.about_hbar{
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}
	#menu-about{
		transition: all .15s;
	}
	/*-- Mobile Version --*/
	@media (max-width: 1023px) {
		#menu-about{
			transition: all .15s;
			gap: 2rem;
			margin-bottom: 1rem;
		}
	}
	#about-menu{
		position: sticky;
		top: calc(.5em + 70px);
	}
	div#about-info-section {
		position: absolute;
		width: 10px;
		height: 10px;
		top: -70px;
	}
	@media (max-width: 1023px){
		.side-nav-menu-about{
			overflow: auto;
			white-space: nowrap;
			scroll-behavior: smooth;
			background-color: white;
			overflow-y: hidden;
			/*width: 95.5vw;*/
			/*width: 100%;*/
		}
		#bg-circle{
			left: -40%;
			top: calc(5% + 25vw);
			width: 100%;
			height: auto;
		}

	}
	@media (max-width: 767px){
		.side-nav-menu, .side-nav-menu-about {
			border-left: 0; 
			border-bottom: 0; 
		}
		#bg-circle{
			top: calc(10% + 50vw);
		}

	}


	.wavebar{
		height: 100%;
		/* background-color: yellow; */
	}
	[data-play="0"] .wavebar span{
		animation-play-state: paused !important;
	}
	.wavebar span{
		background-color: #1e9f9b;
		height: 0;
		width: 100%;
		padding-top: 15%;
		display: block;
		margin: 0 auto 20%;
		will-change: width;
		border-radius: 3px;
	}
	.wavebar.wave-2 span{
		background-color: #F1683B;
	}
	.wavebar span:nth-child(6n+0){
		/*		width: 30%;*/
		animation:wavebar .6s 0s infinite alternate linear;
	}
	.wavebar span:nth-child(6n+1),
	.wavebar span:nth-child(6n+5){
		/*		width: 60%;*/
		animation:wavebar .6s -.2s infinite alternate linear;
	}
	.wavebar span:nth-child(6n+2),
	.wavebar span:nth-child(6n+4){
		/*		width: 80%;*/
		animation:wavebar .6s -.4s infinite alternate linear;
	}
	.wavebar span:nth-child(6n+3){
		/*		width: 100%;*/
		animation:wavebar .6s -.6s infinite alternate linear;
	}

	@keyframes wavebar{
		from{width:30%}
		to{width:100%}
	}

	.paused {
		animation-play-state: paused;
	}

	/* #recent-projects {
		background: url("/wp-content/uploads/2022/12/circle.png");
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-position: left 8rem;
	} */

</style>

<?php 

$f = get_fields();
$slider = $f['banner']['home_banner'];
$d_banners = $f['banners']['desktop_banner'];
$m_banners = $f['banners']['mobile_banner'];
$soldout_projects = $f['sold_out_projects_listed'];
$recent_projects = $f['recent_projects'];

function pad($num){
	if ($num>9) {
		return $num;
	}else{
		return '0'.$num;
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

	.__home-blog-card {
		position: relative;
		top: 100%;
		opacity: 0;
		transition: .5s;
	}

	.__home-blog-card:nth-child(2) {
		transition-delay: .25s;
	}

	.__home-blog-card:nth-child(3) {
		transition-delay: .5s;
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

	@media (max-width: 767px) {
		#home-slider-inner {
			display: none;
		}
	}

	/*-- Mobile Version --*/
	@media (max-width: 1024px) {
		#home-slider-count{
			top: -10px;
		}
		#home-slider-arrow {
			bottom: 40px;
		}
	}
	.about-mini-section{
		transition: all 2s cubic-bezier(0, 0, 0, 1.5)
	}
	.about-mini-section[data-show="0"]{
		opacity: 0;
		transform: translateY(100px);
		
	}
	.about-mini-section[data-show="1"]{
		opacity: 1;
		transform: translateY(0px);
	}

</style>
<script type="text/javascript">
	let allSlideVideo = []
	let allSlideVideoMob = []
</script>

<section id="banners">
  <?php if ($d_banners) : ?>
    <?= wp_get_attachment_image($d_banners, 'full', false, ['class' => 'w-full hidden md:block']) ?>
  <?php endif; ?>
  <?php if ($m_banners) : ?>
    <?= wp_get_attachment_image($m_banners, 'full', false, ['class' => 'w-full md:hidden']) ?>
  <?php endif; ?>
</section>

<div class="cont-pd pt-4">
	<div class="flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/about-us" class=""><?php pll_e('รู้จักแอสเซทไวส์')?></a>
	</div>
</div>
<sp class=""></sp>

<!--=== The Section Boxes : about us ===-->
<section id="recent-projects" class="">
	<!-- <div id="bg-circle" class="absolute">
		<img src="/wp-content/uploads/2022/12/circle.png">
	</div> -->
	<div class="cont-pd  pt-2 xl:pt-10 -pb-10">
		<div id="about-info-section"></div>
		<div class="grid grid-flow-row lg:grid-cols-12 gap-4">
			<div class="lg:col-span-3">
				<!--=== The Section Boxes : about-menu award ===-->
				<?php get_template_part('page-templates/about-page-sidebar'); ?>
			</div>
			<style type="text/css">
				@media (max-width: 767px) {
					#about-asw .cont-pd{
						padding: 0;
					}
					.f40-30 h3{
						display: inline;
					}
				}
			</style>
			<style type="text/css">
				.arrow-l{
					height: 48px;
					top: 47%;
					left: 1%;
					opacity: 1;
					transition: .5s;
				}
				.arrow-r{
					height: 48px;
					top: 47%;
					right: 1%;
					opacity: 1;
					transition: .5s;
				}
				.arrow-l:hover, .arrow-r:hover{
					filter: brightness(200%);
				}
				.about-year{
					transform: rotate(-90deg);
					top: 16px;
					z-index: 999;
				}
				@media (max-width: 767px) {
					.reward-hover{
						padding-left: 2.0rem;
					}
					.modal-img-content{
						width: 100%;
						/*height: 100%;*/
						top: 0;
					}
					.mySlides{
						height: 100% !important;
						align-items: unset !important;
					}
					.mySlides img{
						height: auto !important;
						width: 100% !important;
					}
				}
				.reward-year{
					color: var(--ci-grey-100);
					transition: .8s all;
				}
				.reward-hover{
					transition: all .3s calc(var(--x) * .25s);
					transform: translateY(100px);
					opacity: .0;
				}
				.reward-hover[data-x="-1"]{
					transition: none;
				}
				.reward-hover[data-show="1"]{
					opacity: 1;
					transform: translateY(0px);
				}
				.reward-hover:hover .reward-hovered{
					left: 0%;
					transition: .8s all;
				}
				.reward-hover:hover .reward-img{
					transform: scale(1.08);
					transition: .8s all;
				}
				.reward-hover:hover .reward-year{
					transition: .8s all;
					color: white;
				}
				.reward-year, .reward-img{
					transition: .8s all;
				}
				.reward-hovered{
					position: absolute;
					width: 100%;
					height: 100%;
					top: 0;
					left: -100%;
					background-color: rgba(18, 63, 109, 0.7);
					transition: .8s all;
				}
			</style>
			<div id="soldout-asw" class="lg:col-span-9">
				<div class="grid grid-cols-2 md:grid-cols-3 gap-x-3 gap-y-6 md:gap-x-3 md:gap-y-10">
					<?php
					foreach ($recent_projects as $key => $value) { ?>
						<div class="col-span-1 pointer reward-hover relative overflow-hidden" onclick="openModal();currentSlide(<?= $key ?>)" data-show="0" data-x="null">
							<div  class="bg-cover blank reward-img" ratio="1:1"  style="background-image: url('<?= $value['images']['thumbnail'] ?>');"></div>
							<div class="reward-hovered flex flex-col pl-4 pb-4 text-white justify-end">
								<h5><?= $value['project_name'] ?></h5>
								<sp class="h-5"></sp>
								<p><?php pll_e('อ่านเพิ่มเติม')?></p>
							</div>
						</div>
						<div class="col-span-1 block md:hidden">
							<h5><?= $value['project_name'] ?></h5>
							<small><?= $value['location'] ?></small>
							<p class="text-[18px]"><?= $value['description'] ?></p>
							<p class="cl-ci-veri-300" style="font-size: 22px;line-height: 28px;font-weight: 400;padding-top: 8px;" onclick="openModal();currentSlide(<?= $key ?>)"><?php pll_e('อ่านเพิ่มเติม')?></p>
						</div>
					<?php } ?>
				</div>
				<sp class="h-12 md:h-20"></sp>
			</div>

			<div id="Modal-img" class="modal-img scroll-hid">
				<span class="close cursor" onclick="closeModal()" style="top: 8px;right: 4vw;z-index: 10;">&times;</span>
				<div class="fixed" style="top: 0;z-index: 1;background-color: transparent;width: 100%;height: 100%;" onclick="closeModal()"></div>
				<div class="modal-img-content" style="z-index: 9;">
					<?php
					foreach ($recent_projects as $key => $value) {
						// pre($value);
						// $value['project'][$i]->ID
						?>
						<div class="mySlides" style="justify-content: center;align-items: center;height: 85vh;">
							<div class="grid grid-rows-3 md:grid-rows-1 md:grid-cols-12" style="width: 100%;">
								<div class="row-span-1 md:col-span-7">
									<div class="bg-cover blank bg-gray-200" mob-ratio="1:1" style="background-image:url('<?=$value['images']['popup_image']?>');height: 100%;">
									</div>
								</div>
								<div class="row-span-2 md:row-span-1 md:col-span-5 bg-white flex ">
									<div class="px-4 pt-10 pb-10 md:px-8 md:pt-12 md:pb-32 w-full">
										<span class="cl-ci-grey-400" style="font-size: 18px;font-weight: 700;line-height: 20px;">รายละเอียดโครงการ</span>
										<h5 class="cl-ci-grey-100" style="font-size: 30px;line-height: 32px;font-weight: 500;"><?= $value['project_name'] ?></h5>
										<small><?= $value['location'] ?></small>
										<sp style="height: 23px;" ></sp>
										<p><?= $value['description'] ?></p>
										<sp style="height: 23px;" ></sp>
										<a class="mt-7 text-[#123F6D] hover:text-[#123F6D]/70 font-medium" href="<?= $value['link'] ?>" title="">รายละเอียดเพิ่มเติม</a>
									</div>
								</div>
							</div>
						</div>
					<?php }
					?>
				</div>
				<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="absolute pointer hidden md:block arrow-l" onclick="plusSlides(-1)" style="z-index: 9;">
				<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="absolute pointer hidden md:block arrow-r" onclick="plusSlides(1)" style="z-index: 9;">
			</div>
		</div>
	</div>
</section>
<script>
	window.addEventListener("resize", ()=>{
		setTimeout(()=>{
			setWidthMenu();
		},200)
	});
	let current = 1;
	let width_hline_gap;

	function setWidthMenu(){
		const elAll = document.querySelectorAll('.about-menu');
		const menu = document.querySelector('#menu-about');
		const hline = document.querySelector('.about_hline');
		const hbar = document.querySelector('.about_hbar');

		let width_hline = 0;
		let left_hline = 0;
		let iCount = 0;

		elAll.forEach((el, index) => {
			width_hline += el.offsetWidth;
			xconsolex.log(el.offsetWidth, index);
		})
		// xconsolex.log('elALl',elAll);
		for (let i of elAll){
			if (iCount<current) {
				if(document.body.clientWidth < 768){
					left_hline += i.offsetWidth;
					// xconsolex.log(iCount + 1);
				}else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024){
					left_hline += i.offsetWidth;
				}
			}
			iCount++
		}
		if(document.body.clientWidth < 768){ 
			// width_hline_gap = width_hline;
			// width_hline_gap += ((elAll.length - 1) * 16); // 32px
			// menu.style.width = 'calc(100vw - 32px)';

			// if (width_hline_gap < menu.offsetWidth) { // flex
			// 	// menu.style.width = 100+'%';
			// 	//menu.style.justifyContent = 'flex-start';				
			// 	// gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1) 

			// 	left_hline = left_hline + (current*32)
				
			// 	hbar.style.right = 0;
			// 	hbar.style.left = 'auto';
			// 	hline.style.width =  100 + '%';
			// } else{
			// 	// menu.style.width = 'calc(100vw - 32px)';
			// 	width_hline_gap = 0;
			// 	width_hline += ((elAll.length - 1) * 16); // 16px
			// 	// menu.style.columnGap = 16 + "px";
			// 	left_hline = left_hline + (current*16);

			// 	hbar.style.left = 'auto';
			// 	hbar.style.right = 0;
			// 	hline.style.width = width_hline + 'px';
			// }
			return;
			
		}else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024){
			width_hline_gap = width_hline;
			menu.style.width = 'calc(100vw - 32px)';

			if (width_hline_gap < menu.offsetWidth) { //flex
				// menu.style.width = 100+'%';
				menu.style.width = '';
				menu.style.justifyContent = 'flex-start';
				// gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (current*32)
				hbar.style.left = left_hline + 'px';
				hline.style.width =  100 + '%';
				xconsolex.log(menu.offsetWidth - width_hline)
			} else {
				// menu.style.width = 'calc(100vw - 32px)';
				menu.style.width = '';
				width_hline_gap = 0;
				width_hline_gap += ((elAll.length - 1) * 32); // 32px
				// menu.style.columnGap = 32 + "px";
				left_hline = left_hline + (current*32);
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';

			}
		}

		// xconsolex.log('width_div',width_hline, 'menu-promo_width', menu.offsetWidth);

		
		// xconsolex.log(width_hline_gap);
		hbar.style.width = elAll[current].offsetWidth + 'px';
	}


	setTimeout(() => {
		setWidthMenu();
	}, 200);

	function toFilterTop(){
		document.querySelector('#about-info-section').scrollIntoView({
			behavior: 'smooth'
		});
	}

	function show_info(num){
		toFilterTop()
		if (num == 0) {
			document.getElementById("about-asw").style.display = "block";
			document.getElementById("reward-asw").style.display = "none";
			document.getElementById("bg-circle").style.display = "block"
		}
		else if (num == 1) {
			document.getElementById("about-asw").style.display = "none";
			document.getElementById("reward-asw").style.display = "block";
			document.getElementById("bg-circle").style.display = "none"

		}
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

		for (let i of allEl){

			i.classList.remove('cl-ci-orange-500')
			i.classList.remove('font-medium')
			if (iCount<elNum) {
				scrollY += i.offsetHeight;
				barY += i.offsetHeight;

				barX += i.offsetWidth;
			}
			iCount++

		}
		scrollY = scrollY+(16*elNum);
		barY = barY+(16*elNum);
		scrollY -= 32; 
		allEl[elNum].classList.add('cl-ci-orange-500');
		allEl[elNum].classList.add('font-medium');
		barYoffset = (document.querySelectorAll('.about-menu')[elNum].offsetHeight - 28) /2;				
		document.querySelector('.about_vbar').style.top = barY+barYoffset+'px';


		if(document.body.clientWidth < 768){
			if (width_hline_gap != 0){
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			}else{
				barX = barX + (current*16);
			}


		}else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024){
			xconsolex.log(width_hline_gap);
			if (width_hline_gap != 0) {
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			}else{
				barX = barX + (current*32);
			}

		}


		document.querySelector('.about_hbar').style.width = allEl[current].offsetWidth +'px';
		document.querySelector('.about_hbar').style.left = barX+'px';
	} 
	function openModal() {
		document.getElementById("Modal-img").style.display = "block";
	}

	function closeModal() {
		document.getElementById("Modal-img").style.display = "none";
	}
	var slideIndex = 0;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}
	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		if (n > slides.length-1) {slideIndex = 0};
		if (n < 0) {slideIndex = slides.length-1};
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slides[slideIndex].style.display = "flex";
	}

	let card_arr_x = []
	function scrollCard(){
		// xconsolex.log(num)
		card_arr_x = []
		let h = window.innerHeight
		let cards = document.querySelectorAll('.reward-hover')
		let offset = 200
		
		for(let i of cards){
			let react = i.getBoundingClientRect()
			if (card_arr_x.indexOf(react.x) == -1) {
				card_arr_x.push(react.x)
			}
		}
		card_arr_x = card_arr_x.sort(function (a, b) {  return a - b;  })
		let index = card_arr_x.indexOf(0);
		if (index !== -1) {
			card_arr_x.splice(index, 1);
		}
		for(let i of cards){
			let react = i.getBoundingClientRect()
			let point = react.y-h+offset
			i.dataset.x = card_arr_x.indexOf(react.x)
			i.style.setProperty('--x',i.dataset.x)
			if (point<0) {
				i.dataset.show = 1
			}
		}
	}
	function restartSort(){
		let cards = document.querySelectorAll('.reward-hover')
		for(let i of cards){
			i.dataset.show = 0
			i.dataset.x = -1
		}
		scrollCard()
	}
	window.onscroll = ()=>{
		scrollCard()
	}
	scrollCard()
</script>
<?php get_footer() ?>