<?php get_header() ?>
<?php 
$f = get_fields();
$slider = $f['home_banner'];
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
	body, html{
		overflow: visible;
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

	.home-slider-info{
		position: absolute;
		bottom: 12vw;
		right: 0;
		width: 46%;
		background: linear-gradient(90deg, #123F6D 0%, rgba(18, 63, 109, 0) 198.74%);
		padding-left: 49px;
		padding-top: 49px;
		padding-bottom: 69px;
	}
	.home-slider-info h1{
		height: calc(30px *4);
	}
	@media (max-width: 1367px){
		.home-slider-info {
			bottom: 5vw;
		}
	}

	@media (max-width: 1280px){
		.home-slider-info {
			bottom: 3vw;
			padding-left: 34px;
			padding-top: 40px;
			padding-bottom: 46px;
		}
	}
	@media (max-width: 1160px){
		.home-slider-info{
			bottom: 3vw;
			padding-left: 34px;
			padding-top: 29px;
			padding-bottom: 20px;
		}
	}
	@media (max-width: 1024px){
		.home-slider-info {
			position: absolute;
			bottom: 5vw;
			right: 0;
			width: 95%;
			background: linear-gradient(90deg, #123F6D 0%, rgba(18, 63, 109, 0) 198.74%);
			padding-left: 24px;
			padding-top: 50px;
			padding-bottom: 50px;
		}
	}

	@media (max-width: 767px) {
		#home-slider-inner {
			display: none;
		}
		.home-slider-info h1 {
			height: calc(42px *4);
		}
	}
	@media (max-width: 424px) {
		.home-slider-info {
			position: absolute;
			bottom: 5vw;
			right: 0;
			width: 95%;
			background: linear-gradient(90deg, #123F6D 0%, rgba(18, 63, 109, 0) 198.74%);
			padding-left: 24px;
			padding-top: 27px;
			padding-bottom: 32px;
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

</style>
<script type="text/javascript">
	let allSlideVideo = []
	let allSlideVideoMob = []
</script>
<section id="home-slider">
	<div id="home-slider-inner">
		<div class="home-slider-shadow pointer-events-none"></div>
		<div id="home-slider-slides">
			<?php 
			foreach ($slider as $key => $v) {
				switch ($v['acf_fc_layout']) {
					case 'desktop_banner':
					$new_banner_onclick_condition = ' data-click="0" ';
					if ($v['url'] != '') {
						$new_banner_onclick_condition = ' onclick="window.open(`'.$v['url'].'`)" ';
					}
					?>
					<div class="home-slider-slide bg-cover pointer" <?=$new_banner_onclick_condition?> style="background-image:url('<?=$v['image']['sizes']['1536x1536']?>')"></div>
					<?php

					break;
					case 'video_banner':
					?>
					<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;">
						<div class="plyr-slider-wrap">
							<div id="slide_player_<?=$key?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?=acf_oembed_to_youtubeID($v['video'])?>"></div>
						</div>
					</div>

					<script>
						const slide_player_<?=$key?> = new Plyr('#slide_player_<?=$key?>',{
							controls:['play-large'],
							loop:{ active: true}
						});
						allSlideVideo.push(slide_player_<?=$key?>)
						// slide_player_3.pause()
					</script>
					<?php
					break;
				}
			}
			?> 
		</div>
		<div id="home-slider-arrow">
			<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l" onclick="changeSlider(-1);stopAutoplay()">
			<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="changeSlider(1);stopAutoplay()">
		</div>
		<div id="home-slider-count">
			<div >
				<h3 class="-num-min">01</h3>
			</div>
			<div class="-num-bar">
				<div class=""></div>
			</div>
			<div><h3 class="-num-next">02</h3></div>
			<div>
				<p style="margin-left: 3px;">/<span class="-num-max">06</span></p>
			</div>
		</div>
	</div>
	<div id="home-slider-inner-mob">
		<style type="text/css">
			#home-slider-inner-mob .home-slider-slide[data-active="0"]{
				opacity: 1;
				z-index: 10;
			}
		</style>
		<div id="home-slider-slides-mob">
			<?php 
			$data_active = -1;
			foreach ($slider as $key => $v) {
				switch ($v['acf_fc_layout']) {
					case 'mobile_banner':
					$data_active++
					?>
					<div class="home-slider-slide bg-cover" onclick="location.href='<?=$v['url']?>'" style="background-image:url('<?=$v['image']['sizes']['1536x1536']?>')" data-active="<?=$data_active?>" data-i="<?=$data_active?>"></div>
					<?php
					break;
					case 'video_banner':
					$data_active++
					?>
					<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;" data-active="<?=$data_active?>" data-i="<?=$data_active?>" onclick="clearInterval(mhbannerInterval)">
						<div class="plyr-slider-wrap">
							<div id="slide_player_mob_<?=$key?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?=acf_oembed_to_youtubeID($v['video'])?>" data-active="<?=$data_active?>"></div>
						</div>
					</div>

					<script>
						const slide_player_mob_<?=$key?> = new Plyr('#slide_player_mob_<?=$key?>',{
							controls:['play-large'],
							loop:{ active: true}
						});
						allSlideVideoMob.push(slide_player_mob_<?=$key?>)
					</script>
					<?php
					break;
				}
			}
			?> 
		</div>
	</div>

	<script type="text/javascript">
		home_slides = document.querySelector('#home-slider-inner #home-slider-slides')
		home_slide = document.querySelectorAll('#home-slider-inner .home-slider-slide')
		home_slide_active = 0;
		home_slide[0].style.opacity = 1;
		home_slide[0].style.zIndex = 1;
		home_slide_nex = get_home_slide_nex(1);
		let autoPlay = 1;
		document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(1,2)
		document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(home_slide_nex,2)
		document.querySelector('#home-slider-inner #home-slider-count .-num-max').innerText = pad(home_slide.length,2)
		document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--z',home_slide.length)
		function changeSlider(plus){
			document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.remove('go')
			if (autoPlay) {
				setTimeout(()=>{
					document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
				},100)
			}
			for(let s of home_slide){
				s.style.opacity = 0;
				s.style.zIndex = -1;
			}
			home_slide_active += plus


			if ( home_slide_active >= home_slide.length) {
				home_slide_active = 0;
			}else if(home_slide_active < 0){
				home_slide_active = home_slide.length-1;
			}
			home_slide[home_slide_active].style.opacity = 1;
			home_slide[home_slide_active].style.zIndex = 1;
			document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(home_slide_active+1,2)
			document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(get_home_slide_nex(home_slide_active+1),2)
			document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--i',home_slide_active)
			for(let i of allSlideVideo){
				i.pause()
			}
		}

		autoPlaySlide = setInterval(()=>{
			if (autoPlay) {
				changeSlider(1);
			}

		},5000)
		function stopAutoplay(){
			autoPlay = 0
		}
		function get_home_slide_nex(now){
			now++
			// xconsolex.log(now)
			if (now>home_slide.length) {
				now = 1
				// xconsolex.log('if')
				// xconsolex.log(now)
			}
			return now
		}
		setTimeout(()=>{
			document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
		},100)
	</script>
</section>

<div id="home-slide-cmd-mob">
	<style type="text/css">
		/*-- Mobile Version --*/
		@media (max-width: 1116px) {
			#home-slider-arrow {
				transform: scale(0.8) translateY(50%);
				transform-origin: bottom left;
			}
		}
		/*-- Mobile Version --*/
		@media (max-width: 767px) {


			#home-slider {
				padding-top: 100%;
			}

			#home-slider-inner-mob {
				display: block;
			}

			#home-slide-cmd-mob {
				padding: 14px 15px;
				display: grid;
				grid-template-columns: 40px auto 40px;
				grid-column-gap: 40px;
				color: var(--ci-grey-100);
			}

			#home-slide-cmd-mob .-num-bar {
				width: 100%;
				height: 1px;
				background: var(--ci-blue-500);
				position: relative;
			}

			#home-slide-cmd-mob .-num-bar div {
				width: 100%;
				height: 2px;
				background: var(--ci-veri-500);
				position: absolute;
				top: -.5px;
				width: 0%;
				transition: 2950ms linear;
			}

			#home-slider-count-mob {
				display: flex;
				gap: 10px;
				justify-content: space-between;
				align-items: center;
			}

			
			/*.mini-filter {
				left: 0;
			}*/

			.plyr__video-embed iframe {
				transform: scale(1.8);
			}

		}
	</style>
	<div class="hsm-arrow -l" onclick="mhbanner_slide_plus(1);clearInterval(mhbannerInterval)">
		<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l" onclick="">
	</div>
	<div id="home-slider-count-mob">
		<div >
			<h5 class="-num-min">01</h5>
		</div>
		<div class="-num-bar" data-play="0">
			<div class=""></div>
		</div>
		<div><h5 class="-num-next">
			<span class="-num-next-num">02</span><span style="margin-left: 3px;color: var(--ci-grey-400);font-weight: 300;font-size: 20px;">/<span class="-num-max"><?=pad($data_active+1)?></span></span></h5></div>
		</div>
		<div class="hsm-arrow -r" onclick="mhbanner_slide_plus(-1);clearInterval(mhbannerInterval)">
			<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="">
		</div>
		<script type="text/javascript">
			let mhbannerAutoPlay = 1;
			setTimeout(()=>{
				document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
			},50)
			mhbannerInterval = setInterval(()=>{
				mhbanner_slide_plus(-1)
				document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "0%"
				document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "0ms"
				setTimeout(()=>{
					document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
					document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "2950ms linear"
				},50)
				
			},3000)
			function mhbanner_slide_plus(p){
				let x = document.querySelectorAll('#home-slider-inner-mob .home-slider-slide')
				let lim = x.length
				for(let i of x){
					i.dataset.active = (Number(i.dataset.active)+p)%lim
				}
				let now = Number(document.querySelector('#home-slider-inner-mob .home-slider-slide[data-active="0"]').dataset.i)
				document.querySelector('#home-slider-count-mob .-num-min').innerText = pad(now+1,2)
				let next = now+2
				if (next>lim) {
					next = 1
				}
				document.querySelector('#home-slider-count-mob .-num-next-num').innerText = pad(next,2)
				for(let i of allSlideVideoMob){
					i.pause()
				}
			}
		</script>
	</div>
</div>

<!--=== The Section Boxes : promotion-nav ===-->
<section id="promotion-nav" class="bg-ci-grey-900">
	<div id="promo-info-section"></div>
	<div class="cont-pd py-4 flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/promotion" class=""><?php pll_e('โปรโมชั่น')?></a>
	</div>
	<!-- <sp class="l"></sp> -->
</section>

<!--=== The Section Boxes : promotion-info ===-->
<style type="text/css">
	.cl-ci-orange-500{
		color: var(--ci-orange-500) !important;
	}
	.promotion-card{
		box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
		position: relative;
		transition: all .3s calc(var(--x) * .25s);
		transform: translateY(100px);
		opacity: .0;
	}
	.promotion-card[data-x="-1"]{
		transition: none;
	}
	.promotion-card[data-show="1"]{
		opacity: 1;
		transform: translateY(0px);
	}

	.promotion-card .-title{
		font-weight: 500;
		font-size: 30px;
		line-height: 32px;
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}
	#menu-promo{
		transition: all .15s;
	}
	#promotion-menu{
		position: sticky;
		top: calc(.5em + 70px);
	}
	.promotion-card .-desc{
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
		display: block;
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}
	.promo_vbar{
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}
	.promo_hline{
		width: 100%;
	}
	.promo_hbar{
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}
	div#promo-info-section {
		position: absolute;
		width: 10px;
		height: 10px;
		top: -70px;
	}
	@media (max-width: 1023px){
		.side-nav-menu-promo {
			overflow: auto;
			white-space: nowrap;
			scroll-behavior: smooth;
			overflow-y: hidden;
			/*width: 95.5vw;*/
			width: 100%;
		}
	}
	@media (max-width: 767px) {
		.side-nav-menu-promo {
			width: 91.5vw;
		}
		.promo-menu{
			font-size: 26px;
			line-height: 32px;
		}
		#promotion-info{
			padding-top: 0;
		}
	}
	
</style>
<section id="promotion-info" class="lg:pt-8 -pb-10 bg-ci-grey-900 relative">
	<img src="/wp-content/uploads/2022/12/Group-793.png" class="absolute pointer-events-none">
	<div class="cont-pd">
		<div class="-body-w-side">
			<div class="">
				<div id="promotion-menu" class="col-span-3 lg:pl-6 pt-4">
					<h1><?php pll_e('โปรโมชั่น')?></h1>
					<aside class="dynamic-side-nav" data-selected="0">
						<ul class="">
							<?php
							$terms = get_terms( array(
								'taxonomy' => 'promotion_type',
								'hide_empty' => false,
							) );
							foreach ($terms as $key => $value) { ?>
								<li><div onclick="show_pro(<?=$value->term_id?>, <?=$key + 1?>)"><?=$value->name?></div></li>
							<?php }
							?>
						</ul>
						<div class="-runner"></div>
					</aside>
					
					<!-- <div id="menu-promo" class="flex flex-row lg:flex-col side-nav-menu-promo relative pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8">
						<div onclick="show_pro(0, 0)" class="promo-menu px-0 lg:px-3 cl-ci-orange-500 font-medium">
							โปรโมชั่นทั้งหมด
						</div>
						<sp class="hidden lg:block" style="height: 1rem;"></sp>
						<div class="hidden lg:block absolute bg-ci-grey-800" style="width: 1px;height: 100%;left: 1.15px;z-index: 1;">
							<div class="promo_vbar"></div>
						</div>
						<div class="block lg:hidden absolute bg-ci-grey-800 promo_hline" style="height: 2.5px;bottom: 1.15px;z-index: 1;">
							<div class="promo_hbar"></div>
						</div>

						<?php
						$terms = get_terms( array(
							'taxonomy' => 'promotion_type',
							'hide_empty' => false,
						) );
					// pre($terms);
						foreach ($terms as $key => $value) { ?>
							<div onclick="show_pro(<?=$value->term_id?>, <?=$key + 1?>)" class="promo-menu px-0 lg:px-4">
								<span><?=$value->name?></span>
							</div>
							<sp class="hidden lg:block" style="height: 1rem;"></sp>
						<?php }
						?>
					</div> -->
				</div>
			</div>

			<div class="">
				<div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-10">
					<?php 
					$args = array(
						'post_type' => 'promotion',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'post_parent' => 0,
						'orderby' => 'date', 
						'order' => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy'  => 'private-project',
								'field'     => 'slug',
								'terms'     => 'private',
								'operator'  => 'NOT IN'
							)
						),
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); {
						$cate_name = wp_get_post_terms( $post->ID, 'promotion_type');
						$v = get_fields(); 
						$featured_img = get_field('banner_mobile',$post->ID)['sizes']['medium-large-thumb'];
						$card_caption = $v['card_caption'];
						if ($featured_img == '') {
							$featured_img = get_the_post_thumbnail_url($post->ID,'large');
						}
						// pre($post->post_parent);
						?>
						<div id="" onclick="location.href = '<?= get_permalink()?>'" termID="<?= $cate_name[0]->term_id ?>" class="pointer col-span-1 bg-white promotion-card" data-show="0" data-x="null" style="display: block;" >
							<div class="grid grid-rows-12-">
								<div class="row-span-6 overflow-hidden">
									<div class="bg-cover blank promo-ani" ratio="1:1" style="background-image:url('<?=$featured_img;?>')"></div>
								</div>
								<div class="row-span-6 p-4">
									<span class="cl-ci-grey-200 -title"><?php the_title() ?></span>
									<sp style="height: 8px;"></sp>
									<span id="txt_20" class="cl-ci-grey-300 -desc">
										<?= $card_caption ?>
									</span>
									<sp style="height: 26px;" ></sp>
									<a href="<?= get_permalink()?>" class="cl-ci-veri-300" style="font-size: 22px;line-height: 28px;font-weight: 400;"><?php pll_e('อ่านเพิ่มเติม')?></a>
									<sp style="height: 16px;"></sp>
								</div>
							</div>
							<sp class="promotion-card-line h-1"></sp>
						</div>
					<?php }
				endwhile;

				wp_reset_postdata();
				?>
			</div>
			<style type="text/css">
				.promotion-card .promotion-card-line{
					width: 0%;
					position: absolute;
					bottom: 0rem;
					left: 0;
					transition: .9s all;
					opacity: 0.15;
					background: white;
				}
				.promotion-card:hover .promotion-card-line{
					width: 100%;
					transition: .8s all;
					opacity: 1;
					background: var(--ci-veri-300);
				}
				.promo-ani {
					transform: scale(1);
					transition: .8s all;
				}
				.promotion-card:hover .promo-ani{
					transform: scale(1.08);
					transition: .8s all;
				}
			</style>
		</div>
	</div>
</div>
<sp class="h-14"></sp>
</section>


<?php get_footer() ?>

<script type="text/javascript">
	function txt_shorter(text, chars_limit){
		if (text.length > chars_limit){
			new_text = text.substring(0, chars_limit);
			new_text = new_text.trim();
			return new_text.concat("...")
		}
		else {
			return text
		}
	}
	window.addEventListener('scroll', () => {
		document.body.style.setProperty('--scroll',window.pageYOffset / (document.body.offsetHeight - 
			window.innerHeight));
	}, false);
	window.onscroll = function() {scrollFunction()};
	function scrollFunction(){
		
	}
	// var ttt = document.querySelectorAll("#txt_20");
	// for (let i = 0; i < ttt.length; i++) {
	// 	ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 40);
	// }

	// var btns = document.getElementsByClassName("promo-menu");
	// for (var i = 0; i < btns.length; i++) {
	// 	btns[i].addEventListener("click", function() {
	// 		var current = document.getElementsByClassName(" cl-orange b-select");
	// 		current[0].className = current[0].className.replace(" cl-orange b-select", "");
	// 		this.className += " cl-orange b-select";
	// 	});
	// }

	const nodeCard = document.getElementsByClassName("promotion-card");

	window.addEventListener("resize", ()=>{
		setTimeout(()=>{
			// setWidthMenu();
		},200)
	});
	let current = 0;
	let width_hline_gap;
	function setWidthMenu(){
		const elAll = document.querySelectorAll('.promo-menu');
		const menu = document.querySelector('#menu-promo');
		const hline = document.querySelector('.promo_hline');
		const hbar = document.querySelector('.promo_hbar');

		let width_hline = 0;
		let left_hline = 0;
		let iCount = 0;

		let gapWidth = 0;

		elAll.forEach((el, index) => {
			width_hline += el.offsetWidth;
			// xconsolex.log(el.offsetWidth, index);
		})
		// xconsolex.log(width_hline);

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
			width_hline_gap = width_hline;
			width_hline_gap += ((elAll.length - 1) * 16); // 32px

			if (width_hline_gap < menu.offsetWidth) {
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1) 
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width =  100 + '%';
			} else{
				width_hline_gap = 0;
				width_hline += ((elAll.length - 1) * 16); // 16px
				menu.style.columnGap = 16 + "px";
				left_hline = left_hline + (current*16);

				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';
			}
			
		}else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024){
			width_hline_gap = width_hline;
			width_hline_gap += ((elAll.length - 1) * 32); // 32px

			if (width_hline_gap < menu.offsetWidth) {
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width =  100 + '%';
				xconsolex.log(menu.offsetWidth - width_hline)
			} else {
				width_hline_gap = 0;
				menu.style.columnGap = 32 + "px";
				left_hline = left_hline + (current*32);
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';

			}
		}

		xconsolex.log('width_div',width_hline, 'menu-promo_width', menu.offsetWidth);

		
		xconsolex.log(width_hline_gap);
		hbar.style.width = elAll[current].offsetWidth + 'px';

	}

	setTimeout(() => {
		// setWidthMenu();
	}, 200);

	function show_pro(num, index){
		toFilterTop();
		if (num == 0) {
			for(let i of nodeCard){
				i.style.display = "block";
			}
		}
		else{
			for(let i of nodeCard){
				i.style.display = "none";
				i.dataset.show = 0
				if (parseInt(i.getAttribute("termID")) == num) {
					i.style.display = "block"; 
				}
			}
		}

		restartSort()
	}

	function show_pro_old(num, index){
		toFilterTop();
		if (num == 0) {
			for(let i of nodeCard){
				i.style.display = "block";
			}
		}
		else{
			for(let i of nodeCard){
				i.style.display = "none";
				i.dataset.show = 0
				if (parseInt(i.getAttribute("termID")) == num) {
					i.style.display = "block"; 
				}
			}
		}

		current = index;
		const elNum = index;
		const allEl = document.querySelectorAll(".promo-menu");
		const menu = document.querySelector('#menu-promo');

		let scrollY = 0;
		let iCount = 0;
		let barY = 0;

		let barX = 0;
		let currentBarX = 0;

		let width_hline = 0;
		allEl.forEach((el, index) => {
			width_hline += el.offsetWidth;
			// xconsolex.log(el.offsetWidth, index);
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

		scrollY = scrollY+(16*elNum); // 16 is Gap
		barY = barY+(16*elNum);
		scrollY -= 32; // 32 is height of Element
		allEl[elNum].classList.add('cl-ci-orange-500');
		allEl[elNum].classList.add('font-medium');
		barYoffset = (document.querySelectorAll('.promo-menu')[elNum].offsetHeight - 28) /2;				
		document.querySelector('.promo_vbar').style.top = barY+barYoffset+'px';


		if(document.body.clientWidth < 768){
			if (width_hline_gap != 0){
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			}else{
				barX = barX + (current*16);
			}
			

		}else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024){
			if (width_hline_gap != 0) {
				gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
				barX = barX + (gapWidth * current)
			}else{
				barX = barX + (current*32);
			}

		}
		document.querySelector('.promo_hbar').style.width = allEl[current].offsetWidth +'px';
		document.querySelector('.promo_hbar').style.left = barX+'px';

		restartSort()
	}

	function toFilterTop(){
		document.querySelector('#promo-info-section').scrollIntoView({
			behavior: 'smooth'
		});
	}

	let card_arr_x = []
	function scrollCard(){
		// xconsolex.log(num)
		card_arr_x = []
		let h = window.innerHeight
		let cards = document.querySelectorAll('.promotion-card')
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
		let cards = document.querySelectorAll('.promotion-card')
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