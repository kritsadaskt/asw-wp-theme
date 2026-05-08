<?php
$f = get_fields();
$slider = $f['home_banner'];
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
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}

	.quick-filter h6 {
		line-height: 1.5;
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
		#home-slider-count {
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
					?>
					<div class="home-slider-slide bg-cover"
					style="background-image:url('<?= $v['image']['sizes']['1536x1536'] ?>')"></div>
					<?php

					break;
					case 'video_banner':
					?>
					<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;">
						<div class="plyr-slider-wrap">
							<div id="slide_player_<?= $key ?>" loops data-plyr-provider="youtube"
								data-plyr-embed-id="<?= acf_oembed_to_youtubeID($v['video']) ?>"></div>
							</div>
						</div>

						<script>
							const slide_player_<?= $key ?> = new Plyr('#slide_player_<?= $key ?>', {
								controls: ['play-large'],
								loop: {
									active: true
								}
							});
							allSlideVideo.push(slide_player_<?= $key ?>)
										// slide_player_3.pause()
						</script>
						<?php
						break;
					}
				}
				?>
			</div>
			<div id="home-slider-arrow">
				<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l"
				onclick="changeSlider(-1);stopAutoplay()">
				<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r"
				onclick="changeSlider(1);stopAutoplay()">
			</div>
			<div id="home-slider-count">
				<div>
					<h3 class="-num-min">01</h3>
				</div>
				<div class="-num-bar">
					<div class=""></div>
				</div>
				<div>
					<h3 class="-num-next">02</h3>
				</div>
				<div>
					<p style="margin-left: 3px;">/<span class="-num-max">06</span></p>
				</div>
			</div>
		</div>
		<div id="home-slider-inner-mob">
			<style type="text/css">
				#home-slider-inner-mob .home-slider-slide[data-active="0"] {
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
						<div class="home-slider-slide bg-cover"
						style="background-image:url('<?= $v['image']['sizes']['1536x1536'] ?>')"
						data-active="<?= $data_active ?>" data-i="<?= $data_active ?>"></div>
						<?php
						break;
						case 'video_banner':
						$data_active++
						?>
						<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;"
						data-active="<?= $data_active ?>" data-i="<?= $data_active ?>"
						onclick="clearInterval(mhbannerInterval)">
						<div class="plyr-slider-wrap">
							<div id="slide_player_mob_<?= $key ?>" loops data-plyr-provider="youtube"
								data-plyr-embed-id="<?= acf_oembed_to_youtubeID($v['video']) ?>"
								data-active="<?= $data_active ?>"></div>
							</div>
						</div>

						<script>
							const slide_player_mob_<?= $key ?> = new Plyr('#slide_player_mob_<?= $key ?>', {
								controls: ['play-large'],
								loop: {
									active: true
								}
							});
							allSlideVideoMob.push(slide_player_mob_<?= $key ?>)
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
			document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(1, 2)
			document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(home_slide_nex, 2)
			document.querySelector('#home-slider-inner #home-slider-count .-num-max').innerText = pad(home_slide.length, 2)
			document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--z', home_slide.length)

			function changeSlider(plus) {
				document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.remove('go')
				if (autoPlay) {
					setTimeout(() => {
						document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
					}, 100)
				}
				for (let s of home_slide) {
					s.style.opacity = 0;
					s.style.zIndex = -1;
				}
				home_slide_active += plus


				if (home_slide_active >= home_slide.length) {
					home_slide_active = 0;
				} else if (home_slide_active < 0) {
					home_slide_active = home_slide.length - 1;
				}
				home_slide[home_slide_active].style.opacity = 1;
				home_slide[home_slide_active].style.zIndex = 1;
				document.querySelector('#home-slider-inner #home-slider-count .-num-min').innerText = pad(home_slide_active + 1, 2)
				document.querySelector('#home-slider-inner #home-slider-count .-num-next').innerText = pad(get_home_slide_nex(home_slide_active + 1), 2)
				document.querySelector('#home-slider-inner #home-slider-count').style.setProperty('--i', home_slide_active)
				for (let i of allSlideVideo) {
					i.pause()
				}
			}

			autoPlaySlide = setInterval(() => {
				if (autoPlay) {
					changeSlider(1);
				}

			}, 5000)

			function stopAutoplay() {
				autoPlay = 0
			}

			function get_home_slide_nex(now) {
				now++
			// xconsolex.log(now)
				if (now > home_slide.length) {
					now = 1
				// xconsolex.log('if')
				// xconsolex.log(now)
				}
				return now
			}
			setTimeout(() => {
				document.querySelector('#home-slider-inner #home-slider-count .-num-bar div').classList.add('go')
			}, 100)
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
			<div>
				<h5 class="-num-min">01</h5>
			</div>
			<div class="-num-bar" data-play="0">
				<div class=""></div>
			</div>
			<div>
				<h5 class="-num-next">
					<span class="-num-next-num">02</span><span
					style="margin-left: 3px;color: var(--ci-grey-400);font-weight: 300;font-size: 20px;">/<span
					class="-num-max">
					<?= pad($data_active + 1) ?>
				</span></span>
			</h5>
		</div>
	</div>
	<div class="hsm-arrow -r" onclick="mhbanner_slide_plus(-1);clearInterval(mhbannerInterval)">
		<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="">
	</div>
	<script type="text/javascript">
		let mhbannerAutoPlay = 1;
		setTimeout(() => {
			document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
		}, 50)
		mhbannerInterval = setInterval(() => {
			mhbanner_slide_plus(-1)
			document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "0%"
			document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "0ms"
			setTimeout(() => {
				document.querySelector('#home-slider-count-mob .-num-bar div').style.width = "100%"
				document.querySelector('#home-slider-count-mob .-num-bar div').style.transition = "2950ms linear"
			}, 50)

		}, 3000)

		function mhbanner_slide_plus(p) {
			let x = document.querySelectorAll('#home-slider-inner-mob .home-slider-slide')
			let lim = x.length
			for (let i of x) {
				i.dataset.active = (Number(i.dataset.active) + p) % lim
			}
			let now = Number(document.querySelector('#home-slider-inner-mob .home-slider-slide[data-active="0"]').dataset.i)
			document.querySelector('#home-slider-count-mob .-num-min').innerText = pad(now + 1, 2)
			let next = now + 2
			if (next > lim) {
				next = 1
			}
			document.querySelector('#home-slider-count-mob .-num-next-num').innerText = pad(next, 2)
			for (let i of allSlideVideoMob) {
				i.pause()
			}
		}
	</script>
</div>

<?= get_template_part('template-parts/site-home', 'filter'); ?>
<style type="text/css">
	#home_promotion_slides_wrap {
		--max: 4;
		--i: 0;
		position: relative;
		top: -72px;
	}

	.promotion-slide--r.--l {
		right: unset;
		left: -24px;
		transform: rotate(180deg);
		z-index: 100;
		top: calc(50% - 24px - 36px);
	}

	#home_promotion_slides_num {
		left: 0;
		color: var(--ci-blue-400);
		font-size: 48px;
		font-style: italic;
		font-weight: 300;
		height: 1.5em;
	}

	#home_promotion_slides_num span {
		font-weight: 300;
		font-family: "DBHeaventExt";
		font-size: 64px;
		line-height: 1.4em;
	}

	#home_promotion_slides {
		--pc: 85%;
		display: grid;
		width: calc(var(--max) * var(--pc));
		grid-template-columns: repeat(var(--max), 1fr);
		grid-column-gap: 32px;
		position: relative;
		left: calc(var(--i) * var(--pc) * -1);

		grid-column-gap: 0;

	}

	#home_promotion_slides.sliding {
		transition: all 1s cubic-bezier(0.1, 1.02, 0.16, 1.01);
	}

	#home_promotion_title {
		position: relative;
		z-index: 10;
	}

	#home_promotion_slides_wrap_inner {
		margin-bottom: -72px;
	}

	#desktop_promotion {
		position: relative;
		background-color: #082240;
	}

	#desktop_promotion .home-promo-title {
		max-height: 56px;
		overflow: hidden;
	}

	#desktop_promotion::before {
		background-color: var(--ci-blue-300);
		content: " ";
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: calc(100% - 32px);
	}

	/*-- Mobile Version --*/
	@media (max-width: 890px) {
		#desktop_promotion::before {}

		#home_promotion_slides_wrap::after {
			/*			bottom: 4px !important;*/
		}
	}

	#home_promotion_slides_wrap::before {
		/*content: " ";
		background: var(--ci-blue-200);
		position: absolute;
		left: 0;
		bottom: -5px;
		width: 500%;
		height: 40px;
		z-index: 0;
		left: -100%;*/
	}

	#home_promotion_slides_wrap::after {
		/*content: " ";
		background: var(--ci-blue-300);
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		height: calc(100% - 72px);
		z-index: 2;
		left: -100%;
		bottom: 32px;*/
	}

	#home_promotion_slides_wrap::after{
		content: " ";
		background: var(--ci-blue-300);
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		height: calc(100% - 72px);
		z-index: 2;
		left: -100%;
	}
	#home_promotion_slides_wrap::before,
	#home_promotion_slides::before{
		content: " ";
		z-index: 3;
		width: 100%;
		height: 32px;
		position: absolute;
		left: -100%;
		bottom: 0;
		background-color: red;
		background: var(--ci-blue-200);
		background-color: #fff;
	}
	#home_promotion_slides::before{
		left: 0;
		z-index: -1;
	}

	#desktop_promotion .promotion-slide--r {
		transition: .5s all;
	}

	#desktop_promotion .promotion-slide--r:hover {
		transition: .5s all;
		filter: brightness(200%);
	}

	#desktop_promotion .home-promo-title {
		color: #87AACE;
		transition: .5s all;
	}

	#desktop_promotion .home-promo-title:hover {
		transition: .5s all;
		color: white;
	}

	/*-- Mobile Version --*/
	@media (min-width: 1441px) {
		#home_promotion_slides_wrap {
			overflow: hidden;
		}
	}

	#home_promotion_slides_wrap_inner[data-items="1"] #home_promotion_slides .home_promotion_slide:not(:nth-child(1)) {
		display: none;
	}

	#home_promotion_slides_wrap_inner[data-items="1"] .promotion-slide--r {
		display: none;
	}

	/*-- Mobile Version --*/
	@media (max-width: 1116px) {
		.news-head {
			height: 5rem;
		}
	}
</style>
<?php
if ($f['is_open']=='open') {
	?>
	<div class="bg-yellow-200-" id="desktop_promotion">
		<img src="/wp-content/uploads/2022/10/เงากิ่งไม้-1.png" class="absolute pointer-events-none leaf01">
		<img src="/wp-content/uploads/2022/10/leaves-shadow-1.png" class="absolute pointer-events-none leaf03">
		<div class="cont-pd">
			<div id="home-slider-wrap-cont">
				<div id="home-slider-wrap-cont_header" data-aos="fade-up">
					<sp class="xl"></sp>
					<sp class="rem-4 pmt-sp"></sp>
					<h1 class="cl-white t-left">โปรโมชั่น</h1>
					<sp class="xl"></sp>
				</div>
				<theboxes class="top -clip" id="home_promotion_title_sec" data-aos="fade-up">
					<?php
					// $args = array(
					// 	'post_type' => 'promotion',
					// 	'post_status' => 'publish',
					// 	'posts_per_page' => 6,
					// 	'orderby' => 'date',
					// 	'order' => 'DESC',
					// 	'tax_query' => array(
					// 		array(
					// 			'taxonomy' => 'promotion_type',
					// 			'operator' => 'EXISTS',
					// 			'category_name' => 'condominium-pro',
					// 		),
					// 	),
					// );
					// $loop = new WP_Query($args);
					?>

					<box col="3" id="home_promotion_title">
						<inner id="home_promotion_title_inner" class="hidden md:block relative scroll-hid"
						style="margin-left: 25px;">
						<div class="absolute bg-ci-blue-400 promo-desk-line"
						style="width: 2px;height: 220%;left: 1.15px;top: -0;z-index: -1;">
						<div class="promotion_vbar"></div>
					</div>
					<?php
					$chk = 0;
					foreach ($f['promotion'] as $key => $promo) {
						?>
						<div class="home-promo-title padding-hzt <?php if ($chk == 0) {
							echo 'cl-ci-orange-700';
						} ?>" style="cursor: pointer;font-size: 26px;line-height: 28px;z-index: 2;padding-left:15px !important;"
						onclick="show_promo(<?= $chk ?>)"><?php echo $promo->post_title ?> </div>
						<sp class="vl"></sp>
						<?php
						$chk++;
					}
					wp_reset_postdata();
					$promo_chk = $chk;
					?>
				</inner>
				<div>
					<sp class="xl"></sp>
					<h5 class="see-more cl-white"><a href="/promotion" class="">
						<span class="cl-white f30-24">ดูทั้งหมด</span> <img
						src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block"
						style="width:30px">
					</a></h5>
					<sp class="xl"></sp>
				</div>
			</box>

			<box col="9" id="home_promotion_slides_wrap_box">
				<inner class="" id="home_promotion_slides_wrap_inner" data-items="<?= $promo_chk ?>">
					<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="promotion-slide--r --l"
					onclick="show_promo_arrow(-1)">
					<div id="home_promotion_slides_wrap">
						<div id="home_promotion_slides_num">
							<span id="home_promotion_slides_num_now">01</span><span>/</span><span>
								0<?= $promo_chk ?>
							</span>
						</div>
						<div id="home_promotion_slides">
							<?php
							for ($o = 0; $i < 3; $i++) {
								$chk = 0;
								$home_promotion_slides_1_url = '';
								$home_promotion_slides_1_img = '';
								while ($loop->have_posts()):
									$loop->the_post();
									$home_promotion_slides_1_url = get_the_permalink();
									$home_promotion_slides_1_img = get_the_post_thumbnail_url($post->ID, 'large');
									?>
									<div class="home_promotion_slide">
										<a href="<?= get_the_permalink() ?>" class="">
											<div class="bg-cover blank wide" ratio="16:9"
											style="background-image:url('<?= $home_promotion_slides_1_img ?>');cursor: pointer;"></div>
										</a>
									</div>
									<?php 
									$chk++;
								endwhile;
								wp_reset_postdata();
							}
							?>
						</div>
						<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="promotion-slide--r"
						onclick="show_promo_arrow(1)">
					</div>
				</inner>
			</box>

		</theboxes>
	</div>
</div>
</div>

<?php
}
?>
<script type="text/javascript">
	function calPromoLine() {
		let el = $$('.home-promo-title')
		let x = 0
		for (let i of el) {
			xconsolex.log(i)
			x += i.clientHeight
			x += 24
		}
		xconsolex.log(x)
		$('.promo-desk-line').style.height = x + 'px'
	}
	calPromoLine()
</script>

<?= get_template_part('template-parts/site-home', 'mob-promotion'); ?>
<!-- <?= get_template_part('template-parts/site-home', 'sub-promotion'); ?>

<?= get_template_part('template-parts/site-home', 'project'); ?>


<style type="text/css">
	.booking_para {
		overflow: hidden;
		position: relative;
		display: inline-block;
	}

	.bg-booking,
	#booking1,
	#booking2 {
		transition: all .5s;
	}

	@media (max-width: 768px) {
		.bg-booking {
			height: 75vw !important;
		}
	}
	@media (max-width: 767px) {
		.online-booking{
			padding-bottom: 38px;
		}	
	}
</style>
<?php
if ($f['featured_1']['is_open'] == 'open') {
	?>
	<!--=== The Section Boxes : booking ===-->
	<section id="booking-info" class="relative" style="transition: .5s;">
		<div class="">
			<div class="" style="background-color: #11B6B1">
				<div class="grid grid-flow-row md:grid-cols-12 gap-3 cont-booking">
					<div id="booking1"
					class="row-start-1 row-span-1 md:col-span-6 booking_para 2xl:col-span-7">
					<div class="bg-cover blank bg-booking"
					style="background-image:url('/wp-content/uploads/2022/09/Rectangle-523.png');height: 100%;">
				</div>
			</div>
			<div id="booking2" class="row-span-1 md:col-span-6 md:my-12 2xl:col-span-5">
				<div class="booking-content cl-white">
					<h1 class="uppercase online-booking">Online Booking</h1>
					<div class="md:ml-12">
						<h6 class="f26-24">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque erat orci,
							vulputate vitae tincidunt a, tincidunt at mi. Aliquam finibus a urna ac ornare. Cras
							consectetur, risus eu bibendum ultrices, ipsum turpis consequat sem, at blandit urna
							enim ac purus
						</h6>
						<sp class="l"></sp>
						<a href="#!" class="text-2xl">
							<h5 class="see-more">
								<span class="cl-white f30-28" style="font-weight: 500;">ดูทั้งหมด</span>
								<img src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block"
								style="width:30px">
							</h5>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php
}
?>

<!--=== The Section Boxes : feature ===-->
<style type="text/css">
	.line01 {
		width: 8px;
		height: calc(100% - 96px);
		position: absolute;
		z-index: 0;
		right: 0;
		top: 10%;
	}

	.line02 {
		width: 8px;
		height: calc(100% - 48px);
		position: absolute;
		z-index: 1;
	}

	.line03 {
		width: 8px;
		height: calc(100% - 120px);
		position: absolute;
		z-index: 1;
		top: 15%;
	}

	.bg-finn {
		width: calc(100% + 32px);
		left: -20px;
		top: 20px;
		padding-top: 15px;
	}
	.bg-finn2 {
		width: calc(60% + 50px);
		left: 170px;
		top: -30px;
		padding-top: 15px;
	}
	@media (max-width: 767px) {
		.bg-finn2 {
			width: calc(100% + 32px);
			left: -20px;
			top: 20px;
			padding-top: 15px;
		}
	}

	.im_360 {
		position: absolute;
		right: -2vw;
		z-index: 1;
		top: -40px;
		display: none;
		/*width: 12vw;*/
	}

	.bg-360 {
		left: -30px;
		padding: 20px 0px;
	}

	.aapp-img {
		width: calc(85% + 48px);
		max-width: none;
		z-index: 2;
	}

	@media (min-width: 1320px) {
		.im_360 {
			top: -3.5vw;
			display: block;
		}
	}

	@media (max-width: 767px) {
		.app-btn {
			width: 45vw;
		}

		.line01 {
			width: 6px;
			height: calc(50% - 96px);
			left: 0;
			top: 55%;
		}

		.line02 {
			width: 6px;
			height: calc(40% - 48px);
			top: 60%;
			right: 0;
		}

		.line03 {
			width: 6px;
			height: calc(30% - 96px);
			top: 70%;
		}

		.bg-finn {
			top: 0;
		}

		.im_360 {
			display: none;
		}

		.cont-fin {
			width: 90vw;
		}

		.aapp {
			width: 110vw;
		}

		.aapp .aapp-img {
			left: -54px;
			width: 90%;
		}

		.bg-360 {
			left: -10px;
			padding-bottom: 0;
		}

		.bg-360 div {
			width: 100vw !important;
		}
	}

	/*-- Mobile Version --*/
	@media (max-width: 1023px) {
		.three-block {}

		#virtual-360,
		#finplus,
		#asw-app {
			/*			max-width: 500px;*/
			margin: auto;
		}

		.line02 {
			left: -15px;
		}
	}

	/*-- Mobile Version --*/
	@media (min-width: 768px) and (max-width: 1320px) {
		.desktop-360-pic {
			display: none;
		}

		.mobile-360-pic {
			position: static !important;
			background-image: url('/wp-content/uploads/2022/09/Rectangle-522.png');
			background-size: cover;
			background-position: center;
		}

		.desktop-finn-pic {
			left: 0;
			top: 0;
		}

		.bg-finn {
			width: 100%;
			position: static !important;
			margin: 0;
			padding: 0;
		}

		.desktop-finn-pic {
			left: 0 !important;
			top: 0 !important;
			width: 100% !important;
		}

		.app-btn-wrap {
			width: 100% !important;
		}

		.line02 {
			left: 0 !important;
		}
	}
</style>
<section id="feature" class="padding-l-vtc" style="background-color: #EDF2F6;z-index: 2;padding-bottom: 7rem;">
	<img src="/wp-content/uploads/2022/10/Vector-1.png" class="absolute pointer-events-none leaf04">
	<img src="/wp-content/uploads/2022/11/Vector-12.png" class="absolute pointer-events-none leaf04-1">
	<img src="/wp-content/uploads/2022/10/Vector-5.png" class="absolute pointer-events-none leaf05">
	<img src="/wp-content/uploads/2022/11/Vector-11.png" class="absolute pointer-events-none leaf05-1">
	<div class="-px-4 -md:px-20 cont-pd three-block">
		<sp class="xl"></sp>
		<?php
		if ($f['virtual-is-open'] == 'open') {
			?>
			<div id="virtual-360" class="grid grid-flow-row md:grid-rows-1 md:grid-cols-2 relative gap-3"
			style="background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0.509729) 64.11%, rgba(255, 255, 255, 0) 100%);"
			data-aos="fade-up">
			<div class="row-span-1 md:col-span-1 flex items-center relative bg-360 mobile-360-pic">
				<div class="bg-cover blank desktop-360-pic" ratio="3:2"
				style="background-image:url('/wp-content/uploads/2022/09/Rectangle-522.png');width: calc(100% + 30px);z-index: 2;">
			</div>
		</div>
		<div class="row-span-1 xl:col-span-1 flex items-center">
			<div class="bg-ci-orange-500 line01"></div>
			<img src="/wp-content/uploads/2022/11/image-73-1.png" class="im_360">
			<div class="p-4 pb-8 pl-8 md:pb-4 md:pl-0">
				<h1 class="b4 cl-ci-blue-300 ">360 VIRTUAL<br>GALLERY</h1>
				<div class="p-4 md:pl-8 md:pr-8 cl-ci-grey-300" style="font-size: 22px;line-height: 28px;">
					มอบประสบการณ์เสมือนจริง
					ส่งตรงทุกประสบการณ์เยี่ยมชม โครงการเสมือนสัมผัสด้วยตา ตัวเอง กับ 12 โครงการคุณภาพ
					พร้อมอยู่และโครงการใหม่ล่าสุด
					<sp class="" style="height: 2.5rem;"></sp>
					<a href="/360-virtual-tour" class="">
						<h5 class="see-more cl-ci-blue-300">
							<span class="f30-28" style="font-weight: 500;">ดูทั้งหมด</span>
							<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
							style="width:30px">
						</h5>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<sp class="vl" style="height: 32px;"></sp>
<div id="fin-app" class="relative grid grid-flow-row xl:grid-cols-2 gap-8" data-aos="fade-up">
	<?php
	if ($f['finplus-is-open'] == 'open' && $f['app-is-open'] == 'open') {
		?>
		<div class="row-span-1 md:col-span-1 cont-fin">
			<div id="finplus" class="relative py-4 pb-10 pt-0 md:pb-4 md:pt-4"
			style="background: linear-gradient(270deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);">
			<div class="bg-ci-veri-400 line02"></div>
			<div class="pb-0 pt-0 md:pb-4 md:pt-10" style="padding-right: 0 !important;">
				<div class="grid grid-rows-1 md:grid-cols-12 gap-4">
					<div class="row-span-1 md:col-start-8 md:col-span-5">
						<div class="relative bg-finn">
							<div class="bg-cover blank desktop-finn-pic" ratio="4:3"
							style="background-image:url('/wp-content/uploads/2022/09/Rectangle-570.png');top: 2vw;z-index: 2;">
						</div>
					</div>
				</div>
				<div
				class="row-span-1 md:row-start-1 md:col-span-10 md:col-span-7 cl-ci-grey-300 md:px-10 mt-5 md:mt-0 md:pb-10">
				<h1 class="b4 cl-ci-blue-300" style="">FIN PLUS</h1>
				<sp class=""></sp>
				<p class="ml-4 mr-4 md:mr-0 md:ml-8 text-xl" style="font-size: 22px;line-height: 28px;">
					บริการยื่นสินเชื่อง่ายๆ ได้ด้วย
					มือคุณ มุ่งเน้นพัฒนาบริการเพื่อ สร้างความสะดวก ความพึงพอใจ
					และความมั่นใจในการขอสินเชื่อ แก่ลูกค้า
				</p>
				<sp class="" style="height: 2.5rem;"></sp>
				<a href="https://aswinno.assetwise.co.th/FINPlus">
					<h5 class="see-more cl-ci-blue-300 ml-4 md:ml-8">
						<span style="font-weight: 500;" class="f30-28">ยื่นสินเชื่อออนไลน์</span>
						<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
						style="width:30px">
					</h5>
				</a>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}
?>
<?php
if ($f['finplus-is-open'] == 'open' && $f['app-is-open'] == 'close') {
	?>
	<div class="row-span-1 md:col-span-2 cont-fin">
		<div id="finplus" class="relative py-4 pb-10 pt-0 md:pb-4 md:pt-4"
		style="background: linear-gradient(270deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);">
		<div class="bg-ci-veri-400 line02"></div>
		<div class="pb-0 pt-0 md:pb-4 md:pt-10" style="padding-right: 0 !important;">
			<div class="grid grid-rows-1 md:grid-cols-12 gap-4">
				<div class="row-span-1 md:col-start-8 md:col-span-5">
					<div class="relative bg-finn2">
						<div class="bg-cover blank desktop-finn-pic" ratio="4:3"
						style="background-image:url('/wp-content/uploads/2022/09/Rectangle-570.png');top: 2vw;z-index: 2;">
					</div>
				</div>
			</div>
			<div
			class="row-span-1 md:row-start-1 md:col-span-10 md:col-span-7 cl-ci-grey-300 md:px-10 mt-5 md:mt-0 md:pb-10">
			<h1 class="b4 cl-ci-blue-300" style="">FIN PLUS</h1>
			<sp class=""></sp>
			<p class="ml-4 mr-4 md:mr-0 md:ml-8 text-xl" style="font-size: 22px;line-height: 28px;">
				บริการยื่นสินเชื่อง่ายๆ ได้ด้วย
				มือคุณ มุ่งเน้นพัฒนาบริการเพื่อ สร้างความสะดวก ความพึงพอใจ
				และความมั่นใจในการขอสินเชื่อ แก่ลูกค้า
			</p>
			<sp class="" style="height: 2.5rem;"></sp>
			<a href="https://aswinno.assetwise.co.th/FINPlus">
				<h5 class="see-more cl-ci-blue-300 ml-4 md:ml-8">
					<span style="font-weight: 500;" class="f30-28">ยื่นสินเชื่อออนไลน์</span>
					<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
					style="width:30px">
				</h5>
			</a>
		</div>
	</div>
</div>
</div>
</div>
<?php
}
?>
<?php
if ($f['app-is-open'] == 'open' && $f['finplus-is-open'] == 'open') {
	?>
	<div class="row-span-1 relative md:col-span-1 xl:mt-10"
	style="background: linear-gradient(270deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 100%);left: 1px;"
	id="asw-app">
	<div class="bg-ci-orange-500 line03"></div>
	<div class="pb-4 pt-5 md:pt-10" style="padding-right:0 !important">
		<div class="grid md:grid-cols-12 gap-4">
			<div class="row-span-1 md:col-start-8 md:col-span-5 aapp">
				<img src="/wp-content/uploads/2022/09/Group-840-e1664441008972.png"
				class="relative md:top-6 aapp-img">
			</div>
			<div
			class="row-span-1 relative bottom-16 md:static md:bottom-0 md:row-start-1 md:col-span-7 cl-ci-grey-300 px-10 aapp">
			<h1 class="cl-ci-blue-300" style="">AssetWise<br>Application</h1>
			<sp class=""></sp>
			<p class="ml-4 md:ml-8 pr-8 md:pr-0" style="font-size: 22px;line-height: 28px;">
				แอพพลิเคชั่นสำหรับทุกๆ คนที่สนใจ รับข้อมูลข่าวสารของบริษัท AssetWise
				และช่วยให้ทุกเรื่องบ้านจบง่ายๆ ในมือคุณ
				สามารถดาวน์โหลดได้แล้ววันนี้ที่
			</p>
			<sp class="l hidden md:block"></sp>
			<div class="app-btn-wrap">
				<a href="https://apps.apple.com/th/app/assetwise/id1436265481" class="">
					<img src="/wp-content/uploads/2022/09/google-play-1.png" class="app-btn">
				</a>
				<a href="https://play.google.com/store/search?q=assetwise&c=apps&hl=en" class="">
					<img src="/wp-content/uploads/2022/09/google-play.png" class="app-btn">
				</a>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}
?>
<?php
if ($f['app-is-open'] == 'open' && $f['finplus-is-open'] == 'close') {
	?>
	<div class="row-span-1 relative md:col-span-2 xl:mt-10"
	style="background: linear-gradient(270deg, rgba(255, 255, 255, 0) 0%, #FFFFFF 100%);left: 1px;"
	id="asw-app">
	<div class="bg-ci-orange-500 line03"></div>
	<div class="pb-4 pt-5 md:pt-10" style="padding-right:0 !important">
		<div class="grid md:grid-cols-12 gap-4">
			<div class="row-span-1 md:col-start-8 md:col-span-5 aapp">
				<img src="/wp-content/uploads/2022/09/Group-840-e1664441008972.png"
				class="relative md:top-6 aapp-img">
			</div>
			<div
			class="row-span-1 relative bottom-16 md:static md:bottom-0 md:row-start-1 md:col-span-7 cl-ci-grey-300 px-10 aapp">
			<h1 class="cl-ci-blue-300" style="">AssetWise<br>Application</h1>
			<sp class=""></sp>
			<p class="ml-4 md:ml-8 pr-8 md:pr-0" style="font-size: 22px;line-height: 28px;">
				แอพพลิเคชั่นสำหรับทุกๆ คนที่สนใจ รับข้อมูลข่าวสารของบริษัท AssetWise
				และช่วยให้ทุกเรื่องบ้านจบง่ายๆ ในมือคุณ
				สามารถดาวน์โหลดได้แล้ววันนี้ที่
			</p>
			<sp class="l hidden md:block"></sp>
			<div class="app-btn-wrap">
				<a href="https://apps.apple.com/th/app/assetwise/id1436265481" class="">
					<img src="/wp-content/uploads/2022/09/google-play-1.png" class="app-btn" style="width: 300px">
				</a>
				<a href="https://play.google.com/store/search?q=assetwise&c=apps&hl=en" class="">
					<img src="/wp-content/uploads/2022/09/google-play.png" class="app-btn" style="width: 300px">
				</a>
			</div>
		</div>
	</div>
</div>
</div>
<?php
}
?>
</div>
</div>
<sp class="l"></sp>
</section>

<style type="text/css">
	/*-- Mobile Version --*/
	@media (max-width: 1116px) {
		section#news {
			padding-top: 2rem !important;
		}

		.sec-blog {
			padding-top: 3rem !important;
			padding-bottom: 3rem !important;
		}
	}
</style>

<!--=== The Section Boxes : news ===-->
<section id="news" class=""
style="z-index: 3;background-color: white;padding-top: 4rem;padding-bottom: 3rem;overflow:hidden;">
<img src="/wp-content/uploads/2022/10/shutterstock_1574382076-1.png" class="absolute pointer-events-none leaf06">
<img src="/wp-content/uploads/2022/11/Group-793-1.png" class="absolute pointer-events-none leaf07">

<div class="cont-pd" style="z-index: 3;"> <!-- px-4 md:px-20 -->
	<div class="grid grid-cols-2">
		<div class="col-span-1 flex items-center">
			<div class="bg-ci-blue-300 padding-l news-head">
			</div>
			<h1 class="cl-white" style="z-index: 3;">ข่าวสาร</h1>
		</div>
		<div class="col-span-1 text-right pr-0 p-6">
			<a href="/news" class="see-more flex justify-end pointer cl-ci-blue-300">
				<h5 class="cl-ci-blue-300 f30-28">ดูทั้งหมด</h5> <img
				src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
				style="width:30px;margin:0;margin-left: 10px;">
			</a>
		</div>
	</div>
	<div class="" style="padding-top: 3rem;">
		<!-- <sp class="xl"></sp> -->
		<style type="text/css">
			.home-news-nav {
				display: none;
				justify-content: center;
				margin-top: 1rem;
			}

			.home-news-nav .-nav {
				width: 32px;
				height: 32px;
				display: flex;
				align-items: center;
				margin: 0 3px;
				cursor: pointer;
			}

			.home-news-nav .-nav div {
				width: 100%;
				height: 1px;
				background-color: #828A92;
				transition: all .3s;
			}

			.home-news-nav .-nav.-active div {
				height: 4px;
				background-color: #3A638E
			}

			.line04 {
				position: absolute;
				top: -8px;
				left: -8px;
				background-color: var(--ci-orange-500);
				width: 30%;
				height: 0;
				z-index: 0;
				padding-top: 30%;
			}

			.news-item-2 .line04 {
				left: unset;
				right: -8px;
			}

			.news-item-1 .line04 {
				bottom: 0;
				top: unset;
				bottom: 18px;
				left: unset;
				right: -8px;
				background-color: #14b6b1;
			}

			.line05 {
				position: absolute;
				background-color: var(--ci-grey-800);
				width: 1px;
				height: 100%;
				z-index: 0;
				display: none;
			}

			.news-item-0 .line05,
			.news-item-1 .line05 {
				display: block;
				left: unset;
				right: -14px;
			}

			.sec-blog {
				background-color: #123F6D;
				padding-top: 6.5rem;
				padding-bottom: 6.5rem;
				overflow: hidden;
			}

			.box-blog-1 .bottom-left {
				width: 100%;
				left: 0;
				bottom: 0;
				padding: 32px 24px !important;
				/*position: relative;*/
				/*background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 100%);*/
			}

			.ani-news {
				position: relative;
				top: 100%;
				opacity: 0;
				transition: .5s;
			}

			.ani-news:nth-child(2) {
				transition-delay: .25s;
			}

			.ani-news:nth-child(3) {
				transition-delay: .5s;
			}

			.news-title {
				font-size: 24px;
				line-height: 24px;
				text-overflow: ellipsis;
				display: -webkit-box;
				-webkit-line-clamp: 2;
				-webkit-box-orient: vertical;
				overflow: hidden;
			}

			@media (max-width: 767px) {
				.home-news-cards-wrap {
					--max: 3;
					--i: 0;
					display: grid;
					grid-template-columns: repeat(var(--max), calc(100%));
					grid-column-gap: 20px;
					position: relative;
					transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
					left: calc(var(--i) * -103%);
					width: 100%;
				}

				.home-news-nav {
					display: flex;
				}

				.news-item-0 .line05,
				.news-item-1 .line05 {
					display: none;
				}

				.sec-blog {
					padding-top: 3rem;
					padding-bottom: 2.8rem
				}
			}

			@media (max-width: 568px) {
				.home-news-cards-wrap {
					--max: 3;
					--i: 0;
					display: grid;
					grid-template-columns: repeat(var(--max), calc(100%));
					grid-column-gap: 20px;
					position: relative;
					transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
					left: calc(var(--i) * -105%);
					width: 100%;
				}
			}

			.blog-shadow {
				height: 34%;
				background: linear-gradient(0deg, rgba(0, 0, 0, 1) 30%, rgba(0, 0, 0, .75) 53%, rgba(255, 255, 255, 0) 100%);
			}
		</style>
		<div class="grid home-news-cards-wrap md:grid-cols-3 items-stretch gap-7">
			<?php
			$args = array(
				'post_type' => 'news',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
			);


			$loop = new WP_Query($args);
			$chk = 0;
			while ($loop->have_posts()):
				$loop->the_post();
				$featured_img = wp_get_attachment_image_src($post->ID, 'medium-large-thumb');
				$v = get_postdata($post->ID);
				if ($chk == 1) {
					?>
					<div class="col-span-1 news-item-<?= $chk ?> relative" data-aos="fade-up" data-aos-duration="500"
						data-aos-delay="<?= $chk ?>00">
						<div class="line05"></div>
						<div class="grid grid-rows-12 bg-ci-grey-900 h-full px-4 py-6 relative pointer"
						onclick="location.href='<?= get_permalink() ?>'">
						<div class="row-span-5">
							<span class="b5 news-title">
								<?= get_the_title() ?>
							</span>
							<sp class=""></sp>
							<span class="txt_120 cl-ci-grey-300">
								<?= the_excerpt() ?>
							</span>
							<sp class="rem-2"></sp>
							<a href="<?= get_the_permalink() ?>" class="">อ่านเพิ่มเติม</a>
							<sp class=""></sp>
							<sp class="s <?php if ($chk == 1) {
								echo 'bg-ci-veri-500';
							} else {
								echo 'bg-ci-orange-500';
							} ?>" style="height: 4px;width: 15%"></sp>
							<sp class=""></sp>
						</div>
						<div class="row-span-6 relative">
							<!-- <div class="line04"></div> -->
							<div id="middle-news-pic">
								<div style="overflow: hidden;">
									<div class="bg-cover blank" ratio="1:1"
									style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'medium-large-thumb') ?>');">
								</div>
							</div>
						</div>
					</div>

					<?php if ($chk == 1) {
						echo '<sp class=""></sp>';
					} ?>
					<div class="home-news-date-sp"></div>
					<div class="row-span-1 cl-ci-grey-300 home-news-date">
						<?php
						$date = strtotime($v['Date']);
						$month = gmdate("F", $date);
						switch ($month) {
							case "January":
							$month = "มกราคม";
							break;
							case "February":
							$month = "กุมภาพันธ์";
							break;
							case "March":
							$month = "มีนาคม";
							break;
							case "April":
							$month = "เมษายน";
							break;
							case "May":
							$month = "พฤษภาคม";
							break;
							case "June":
							$month = "มิถุนายน";
							break;
							case "July":
							$month = "กรกฎาคม";
							break;
							case "August":
							$month = "สิงหาคม";
							break;
							case "September":
							$month = "กันยายน";
							break;
							case "October":
							$month = "ตุลาคม";
							break;
							case "November":
							$month = "พฤศจิกายน";
							break;
							case "December":
							$month = "ธันวาคม";
							break;
						}
						$year = gmdate("Y", $date);
						$year = (int) $year + 543;
						echo "<i class='far fa-clock size-m'></i> " . gmdate("d", $date) . " " . $month . " " . $year;
						?>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="col-span-1 news-item-<?= $chk ?> relative" data-aos="fade-up" data-aos-duration="500"
				data-aos-delay="<?= $chk * 2 ?>00">
				<div class="line05"></div>
				<div class="grid grid-rows-12 bg-ci-grey-900 h-full px-4 py-6 relative pointer"
				onclick="location.href='<?= get_permalink() ?>'">
				<div class="row-span-6 relative">
					<div class="line04"></div>
					<div style="overflow: hidden;">
						<div class="bg-cover blank" ratio="1:1"
						style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'medium-large-thumb') ?>');">
					</div>
				</div>
			</div>
			<div class="row-span-5">
				<?php if ($chk != 1) {
					echo '<sp class="rm"></sp>';
				} ?>
				<span class="b5 news-title">
					<?= get_the_title() ?>
				</span>
				<sp class=""></sp>
				<span id="" class="txt_120 cl-ci-grey-300">
					<?= the_excerpt() ?>
				</span>
				<sp class="rem-2"></sp>
				<a href="<?= get_the_permalink() ?>" class="">อ่านเพิ่มเติม</a>
				<sp class=""></sp>
				<sp class="s  bg-ci-orange-500" style="height: 4px;width: 15%"></sp>
				<sp class=""></sp>
			</div>
			<div class="home-news-date-sp"></div>
			<div class="row-span-1 cl-ci-grey-300 home-news-date">
				<?php
				$date = strtotime($v['Date']);
				$month = gmdate("F", $date);
				switch ($month) {
					case "January":
					$month = "มกราคม";
					break;
					case "February":
					$month = "กุมภาพันธ์";
					break;
					case "March":
					$month = "มีนาคม";
					break;
					case "April":
					$month = "เมษายน";
					break;
					case "May":
					$month = "พฤษภาคม";
					break;
					case "June":
					$month = "มิถุนายน";
					break;
					case "July":
					$month = "กรกฎาคม";
					break;
					case "August":
					$month = "สิงหาคม";
					break;
					case "September":
					$month = "กันยายน";
					break;
					case "October":
					$month = "ตุลาคม";
					break;
					case "November":
					$month = "พฤศจิกายน";
					break;
					case "December":
					$month = "ธันวาคม";
					break;
				}
				$year = gmdate("Y", $date);
				$year = (int) $year + 543;
				echo "<i class='far fa-clock size-m'></i> " . gmdate("d", $date) . " " . $month . " " . $year;
				?>
			</div>
		</div>
	</div>
<?php }
$chk++;
endwhile;

wp_reset_postdata();
?>

</div>
<div class="home-news-nav">
	<?php if ($chk >= 1) {
		echo '<div class="-nav -active" onclick="homeNewsNav(0,this)"><div></div></div>';
	} ?>
	<?php if ($chk >= 2) {
		echo '<div class="-nav" onclick="homeNewsNav(1,this)"><div></div></div>';
	} ?>
	<?php if ($chk == 3) {
		echo '<div class="-nav" onclick="homeNewsNav(2,this)"><div></div></div>';
	} ?>
</div>
</div>
</div>
</section>
<script type="text/javascript">
	function homeNewsNav(num, el) {
		document.querySelector('.home-news-cards-wrap').style.setProperty("--i", num);
		for (let i of document.querySelectorAll('.home-news-nav .-nav')) {
			i.classList.remove('-active')
		}
		el.classList.add('-active')
	}
</script>
<style>
	.wordbreak-2line {
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		overflow: hidden;
	}

	/*-- Mobile Version --*/
	@media (max-width: 767px) {
		.box-blog .bg-cover.blog-mini-pic {
			height: 100%;
			background-size: cover !important;
		}
	}
</style>
<!--=== The Section Boxes : blog ===-->
<section id="blog" class="sec-blog">
	<img src="/wp-content/uploads/2022/10/Vector-2.png" class="absolute pointer-events-none"
	style="top: 0; left: 0;opacity: 0.1;">
	<img src="/wp-content/uploads/2022/10/Vector-3.png" class="absolute pointer-events-none"
	style="top: 0; left: 0;opacity: 0.1;">
	<img src="/wp-content/uploads/2022/10/เงากิ่งไม้-2.png" class="absolute pointer-events-none leaf08">
	<div class="cont-pd">
		<div class="grid grid-cols-2">
			<div class="col-span-1">
				<a href="/blog" class="">
					<h1 class="cl-white " style="">บล็อก</h1>
				</a>
			</div>
			<div class="col-span-1 cl-white flex items-center justify-end" style="z-index: 2;">
				<a href="/blog" class="see-more flex justify-end pointer cl-white">
					<h5 class="f30-28">ดูทั้งหมด</h5> <img src="/wp-content/uploads/2022/09/arrow-r.png"
					class="inline-block" style="width:30px;margin:0;margin-left: 10px;">
				</a>
			</div>
		</div>
		<sp class="l"></sp>
		<div class="grid grid-flow-row md:grid-rows-1 md:grid-cols-4 gap-4 lg:gap-8">
			<?php
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',
			);

			$loop = new WP_Query($args);
			$chk = 0;
			while ($loop->have_posts()):
				$loop->the_post();
				$featured_img = wp_get_attachment_image_src($post->ID, 'medium-large-size');
				$cate_name = wp_get_post_categories($post->ID, ['fields' => 'all']);
				if ($chk == 0) { ?>
					<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="200"
					class="home-blog-card row-start-1 row-span-2 md:row-span-1 md:col-start-2 md:col-span-2 pointer bg-cover blank box-blog box-blog-1"
					ratio="1:1"
					style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb'); ?>');transition-property: opacity,transform,background-size;"
					onclick="location.href='/<?= get_permalink() ?>'">
					<div class="blog-shadow"></div>
					<div class="bottom-left padding-s" style="z-index: 1;">
						<span class="btn round bg-white cl-ci-orange-500 size-s mb-2"
						onclick="location.href='/<?= $cate_name[0]->slug; ?>'"
						style="line-height: 20px;font-size: 18px;">
						<?php
						echo $cate_name[0]->name;
						?>
					</span>
					<br>
					<span class="f30-28 wordbreak-2line" style="font-weight: 500;">
						<?php the_title() ?>
					</span>
					<span class="cl-ci-grey-700 hidden md:block wordbreak-2line" style="margin-top: 10px; ">
						<?php the_excerpt() ?>
					</span>
				</div>
			</div>
		<?php } else if ($chk == 1) { ?>
			<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="400"
			class="home-blog-card row-start-3 row-span-1 md:col-start-1 md:row-start-1 md:col-span-1 pointer box-blog box-blog-2"
			onclick="location.href='/<?= get_permalink() ?>'" style="z-index: 3;">
			<div class="home-blog-card-x grid grid-cols-12 md:grid-cols-1 md:grid-rows-12 bg-ci-blue-400">
				<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6 blog-mini-pic" ratio="1:1"
				style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb') ?>')">
			</div>

			<div class="home-blog-inner col-span-7 md:col-span-1 md:row-span-5 md:py-6 md:px-4 p-3">
				<div class="home-blog-inner-info">
					<span class="btn round bg-white cl-ci-orange-500 size-s"
					onclick="location.href='/<?= $cate_name[0]->slug; ?>'"
					style="line-height: 20px;font-size: 18px;">
					<?php
					echo $cate_name[0]->name;
					?>
				</span>
				<sp class="xs"></sp>
				<span class="cl-white blog-txt-shorter">
					<p class="blog-title f30-24">
						<?php the_title() ?>
					</p>
				</span>
				<sp class="hidden md:block"></sp>
				<span id="txt_20" class="cl-ci-blue-800 hidden md:block wordbreak-2line">
					<?php the_excerpt() ?>
				</span>
			</div>
		</div>
	</div>
</div>
<?php } else if ($chk == 2) { ?>
	<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="600"
	class="home-blog-card row-start-4 row-span-1 md:col-start-4 md:row-start-1 md:col-span-1 pointer box-blog box-blog-3"
	onclick="location.href='/<?= get_permalink() ?>'" style="z-index: 3;">
	<div class="home-blog-card-x grid grid-cols-12 md:grid-cols-1 md:grid-rows-12 bg-ci-blue-400">
		<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6 blog-mini-pic" ratio="1:1"
		style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb') ?>')">
	</div>

	<div class="home-blog-inner col-span-7 md:col-span-1 md:row-span-5 md:py-6 md:px-4 p-3">
		<div class="home-blog-inner-info">
			<span class="btn round bg-white cl-ci-orange-500 size-s"
			onclick="location.href='/<?= $cate_name[0]->slug; ?>'"
			style="line-height: 20px;font-size: 18px;">
			<?php
			echo $cate_name[0]->name;
			?>
		</span>
		<sp class="xs"></sp>
		<span class="cl-white blog-txt-shorter">
			<p class="blog-title f30-24">
				<?php the_title() ?>
			</p>
		</span>
		<sp class="hidden md:block"></sp>
		<span id="txt_20" class="cl-ci-blue-800 hidden md:block wordbreak-2line">
			<?php the_excerpt() ?>
		</span>
	</div>
</div>
</div>
</div>
<?php }
$chk++;
endwhile;

wp_reset_postdata();
?>
</div>
</div>
</section>

<style type="text/css">
	.sec-home-filter {
		padding-top: 2.25rem;
		padding-bottom: 2.25rem;
	}

	@media (max-width: 1023px) {
		.sec-home-filter {
			padding-top: 1.5rem;
			padding-bottom: 1.75rem;
		}
	}

	.home-bottom-filter h6 {
		transition: .5s;
	}

	.home-bottom-filter-img {
		transition-timing-function: ease-in;
		transition-duration: .5s;
		border: 1px solid #fff;
	}

	.home-bottom-filter:hover h6 {
		color: var(--ci-veri-400);
	}

	.home-bottom-filter:hover .home-bottom-filter-img {
		background-color: var(--ci-veri-900);
		border: 1px solid var(--ci-veri-600);
	}
</style>
<!--=== The Section Boxes : contact ===-->
<section id="home_filter" class="whitespace-nowrap bg-ci-grey-900 sec-home-filter">
	<div class="cont-pd">
		<div class="lg:flex justify-center grid grid-cols-2 lg:grid-cols-4 lg:gap-2">
			<div class="px-8 col-span-1 home-bottom-filter pointer"
			onclick="window.location.href='https://aswland.assetwise.co.th';">
			<div class="home-bottom-filter-img">
				<img src="/wp-content/uploads/2022/10/icon-menu-1.png">
			</div>
			<h6 class="text-center cl-ci-grey-200 f26-22">เสนอขายที่ดิน</h6>
		</div>
		<div class="px-8 col-span-1 home-bottom-filter pointer"
		onclick="window.location.href='https://procurement.assetwise.co.th';">
		<div class="home-bottom-filter-img">
			<img src="/wp-content/uploads/2022/10/icon-menu-2.png">
		</div>
		<h6 class="text-center cl-ci-grey-200 f26-22">เสนอขายสินค้าและบริการ</h6>
	</div>
	<div class="px-8 col-span-1 home-bottom-filter pointer" onclick="window.location.href='#';">
		<div class="home-bottom-filter-img">
			<img src="/wp-content/uploads/2022/10/icon-menu-3.png">
		</div>
		<h6 class="text-center cl-ci-grey-200 f26-22">ร่วมงานกับเรา</h6>
	</div>
	<div class="px-8 col-span-1 home-bottom-filter pointer" onclick="window.location.href='#';">
		<div class="home-bottom-filter-img">
			<img src="/wp-content/uploads/2022/10/icon-menu-4.png">
		</div>
		<h6 class="text-center cl-ci-grey-200 f26-22">ติดต่อเรา</h6>
	</div>
</div>
</div>
</section>
<script type="text/javascript">
	// let ft = new Vue({
	// 	el: "#home_filter",
	// 	data: {
	// 		filter_select: 0,
	// 	},
	// })
</script>

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

		.sec-all-pro {
			/*			padding-bottom: 3rem;*/
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
			<div id="show_pro_foot" class="flex flex-row justify-center" style="">
				<a  id="txt_pro" onclick="show_allpro(-1)" class="btn cl-white b5 padding-xl-hzt">
					<h6 class="f26-20">แสดงโครงการทั้งหมดของแอสเซทไวส์</h6>

				</a>
				<div id="arr_pro" onclick="show_allpro(-1)" class="bg-white pointer pt-1">
					<div id="arrow" class="arrow"></div>
				</div>
			</div>
		</div>
		<div id="show-all" style="transition: .5s;opacity: 0;max-height: 0;overflow: hidden;" class="whitespace-nowrap">
			<?php
			$terms = get_terms(
				array(
					'taxonomy' => 'project-type',
					'hide_empty' => false,
					'orderby' => 'name'
				)
			);
			// pre($terms);
			?>
			<sp class="hidden vl md:block"></sp>
			<div id="show-condo">
				<span class="flex flex-row items-center justify-center" style="padding-top: 1rem;padding-bottom: 1rem;">
					<img src="/wp-content/uploads/2022/09/Vector.png" style="height:24px;margin:0;margin-right: 12px;">
					<h6 class="">คอนโดมิเนียม</h6>
				</span>
				<sp class="l hidden md:block"></sp>
				<div class="grid grid-cols-2 md:flex md:flex-wrap md:justify-center grid-flow-row gap-4 md:gap-6 px-1 ">
					<?php
					foreach ($terms as $key => $value) {
						if ($value->parent == 35) {
							$iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id); ?>
							<?php $condo_link = get_term_link($value->term_id); ?>
							<a href="<?php echo $condo_link ?>"
								class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer">
								<img src="<?= $iconic['url'] ?>">
							</a>
							<!-- </div> -->
							<?php
						}
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
					<h6 class="">บ้านและทาวน์โฮม</h6>
				</span>
				<sp class="s"></sp>
				<div class="grid grid-cols-2 md:flex md:flex-wrap md:justify-center grid-flow-row gap-4 md:gap-6 px-1 ">
					<?php
					foreach ($terms as $key => $value) {
						if ($value->parent == 46) {
							$iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id); ?>
							<?php $house_link = get_term_link($value->term_id); ?>
							<!-- <div class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer"> -->
								<a href="<?php echo $house_link ?>"
									class="graylogo graylogo-size col-span-1 rounded-lg px-2 py-2 flex items-center pointer">
									<img src="<?= $iconic['url'] ?>">
								</a>
								<!-- </div> -->
							<?php }
						}
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


		document.querySelector('#home_promotion_slides_wrap').style.setProperty('--max', <?= $promo_chk * 3 ?>)
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

		function filter_pop(num, ele) {
			filter_type.style.display = 'none';
			filter_location.style.display = 'none';
			filter_project.style.display = 'none';
			filter_cost.style.display = 'none';
			let arrw = document.getElementsByClassName("quick-filter-arrow");
			for (let i of arrw) {
				i.style.transform = "rotate(0deg)";
			}
			let bgc = document.getElementsByClassName("quick-filter");
			for (let j of bgc) {
				j.style.backgroundColor = "white";
			}
			if (num != recent_pop && num != 999) {
				switch (num) {
				case 0:
					filter_type.style.display = 'block';
					break;
				case 1:
					filter_location.style.display = 'block';
					break;
				case 2:
					filter_project.style.display = 'block';
					break;
				case 3:
					filter_cost.style.display = 'block';
					break;
				}
				ele.style.backgroundColor = blue900;
				ele.children[0].children[1].style.transform = "rotate(-180deg)"
				recent_pop = num;
			} else {
				recent_pop = -1;
			}
		}
		window.addEventListener('scroll', () => {
			document.body.style.setProperty('--scroll', window.pageYOffset / (document.body.offsetHeight -
				window.innerHeight));
		}, false);
		window.onscroll = function () {
		// scrollFunction()
		};
	</script>