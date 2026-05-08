<?php
$banner = get_fields();

$slider = $banner['home_banner'];

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

	.home-slider-slide {
		display: flex;
		justify-content: flex-end;
		align-items: center;
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

	.home-slider-info {
		position: absolute;
		right: 0;
		width: 46%;
		background: linear-gradient(90deg, #123F6D 0%, rgba(18, 63, 109, 0) 198.74%);
		padding-left: 49px;
		padding-top: 49px;
		padding-bottom: 69px;
	}

	.home-slider-info h1 {
		height: calc(30px *4);
	}

	@media (max-width: 1280px) {
		.home-slider-info {
			padding-left: 34px;
			padding-top: 40px;
			padding-bottom: 46px;
		}
	}

	@media (max-width: 1160px) {
		.home-slider-info {
			padding-left: 34px;
			padding-top: 29px;
			padding-bottom: 20px;
		}
	}

	@media (max-width: 1024px) {
		.home-slider-info {
			width: 60%;
			background: linear-gradient(90deg, #123F6D 0%, rgba(18, 63, 109, 0) 198.74%);
			padding-left: 24px;
			padding-top: 30px;
			padding-bottom: 30px;
		}
	}

	@media (max-width: 767px) {
		.home-slider-info {
			width: 95%;
			height: calc(100% - 10vw);

		}

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
		#home-slider-count {
			top: -10px;
		}

		#home-slider-arrow {
			bottom: 40px;
		}
	}

	.hug {
		background: var(--ci-orange-500);
		border-radius: 16px;
		padding: 2px 16px;
		color: white;
		width: fit-content;
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
			<!-- page news -->
			<?php
			if ($post->post_name == 'news' || $post->post_name == 'blog') {
			?>
				<span class="relative bg-white text-3xl" style="z-index: 99999;"></span>
				<?php

				$page = ($post->post_name == 'news') ? 'news' : 'blog';
				// pre($page);			
				foreach ($banner['highlights'] as $key => $v) {
					$category = get_the_category($v[$page][0]->ID)[0]->name; // category for blog

					$featured_img = $v['image']['sizes']['1536x1536'];

					$guid = $v[$page][0]->guid;
				?>
					<div class="home-slider-slide bg-cover" style="background-image:url('<?= $featured_img ?>')">
						<div class="home-slider-info">
							<div class="">
								<div class="w-4/5 overflow-hidden">
									<?php if ($post->post_name == 'blog') { ?>
										<div class="hug">
											<?= $category ?>
										</div>
										<sp class="h-3"></sp>
									<?php } ?>
									<h1 class="text-white"><?= $v[$page][0]->post_title ?></h1>
								</div>
								<sp class="h-9"></sp>
								<div class="pr-0">
									<a href="<?= $guid ?>" class="see-more pointer text-white hover:text-white text-white flex items-center">
										<h5 class="inline-block"><?php pll_e('อ่านเพิ่มเติม') ?></h5> <img src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block" style="width:35px;margin:0;margin-left: 10px;">
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			} else {
				foreach ($slider as $key => $v) {
					switch ($v['acf_fc_layout']) {
						case 'desktop_banner':
					?>
							<div class="home-slider-slide bg-cover pointer" onclick="
						window.open('<?= $v['url'] ?>')" style="background-image:url('<?= $v['image']['sizes']['1536x1536'] ?>')"></div>
						<?php

							break;
						case 'video_banner':
						?>
							<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;">
								<div class="plyr-slider-wrap">
									<div id="slide_player_<?= $key ?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?= acf_oembed_to_youtubeID($v['video']) ?>"></div>
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
				// <?php 
			}
			?>
		</div>
		<div id="home-slider-arrow">
			<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="-l" onclick="changeSlider(-1);stopAutoplay()">
			<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="-r" onclick="changeSlider(1);stopAutoplay()">
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
			$post_slug = $post->post_name;
			$data_active = -1;
			$page = ($post->post_name == 'news') ? 'news' : 'blog';
			if ($post->post_name == 'news' || $post->post_name == 'blog') {
			?>
				<span class="relative bg-white text-3xl" style="z-index: 99999;"></span>
				<?php
				foreach ($banner['highlights'] as $key => $v) {
					$data_active++;
					$featured_img = $v['mobile_image']['url'];

					$guid = $v[$page][0]->guid;
				?>
					<div class="home-slider-slide bg-cover" style="background-image:url('<?= $featured_img ?>')" data-active="<?= $data_active ?>" data-i="<?= $data_active ?>">
						<?php if ($post->post_name == 'blog') { ?>
							<div class="home-slider-info pl-6 pr-3 p-9">
								<div class="">
									<div class="w-full overflow-hidden">
										<div class="hug">
											<?= $category ?>
										</div>
										<sp class="h-3"></sp>
										<h1 class="text-white"><?= $v[$page][0]->post_title ?></h1>
									</div>
									<sp class="h-9"></sp>
									<div class="pr-0">
										<a href="<?= $guid ?>" class="see-more pointer text-white hover:text-white text-white flex items-center">
											<h5 class="inline-block"><?php pll_e('อ่านเพิ่มเติม') ?></h5> <img src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block" style="width:35px;margin:0;margin-left: 10px;">
										</a>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="home-slider-info pl-6 pr-3 p-9">
								<sp style="height: 23px;"></sp>
								<div class="">
									<div class="w-full overflow-hidden">
										<h1 class="text-white"><?= $v[$page][0]->post_title ?></h1>
									</div>
									<sp class="h-9"></sp>
									<div class="pr-0">
										<a href="<?= $guid ?>" class="see-more pointer text-white hover:text-white text-white flex items-center">
											<h5 class="inline-block"><?php pll_e('อ่านเพิ่มเติม') ?></h5> <img src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block" style="width:35px;margin:0;margin-left: 10px;">
										</a>
									</div>
								</div>
								<sp style="height: 18px;"></sp>
							</div>
						<?php } ?>
					</div>
					<?php
				}
			} else {
				$data_active = -1;
				foreach ($slider as $key => $v) {
					switch ($v['acf_fc_layout']) {
						case 'mobile_banner':
							$data_active++
					?>
							<div class="home-slider-slide bg-cover" onclick="location.href='<?= $v['url'] ?>'" style="background-image:url('<?= $v['image']['sizes']['1536x1536'] ?>')" data-active="<?= $data_active ?>" data-i="<?= $data_active ?>"></div>
						<?php
							break;
						case 'video_banner':
							$data_active++
						?>
							<div class="home-slider-slide bg-cover home-slider-slide-video" style="background-color:#000;" data-active="<?= $data_active ?>" data-i="<?= $data_active ?>" onclick="clearInterval(mhbannerInterval)">
								<div class="plyr-slider-wrap">
									<div id="slide_player_mob_<?= $key ?>" loops data-plyr-provider="youtube" data-plyr-embed-id="<?= acf_oembed_to_youtubeID($v['video']) ?>" data-active="<?= $data_active ?>"></div>
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
				<span class="-num-next-num">02</span><span style="margin-left: 3px;color: var(--ci-grey-400);font-weight: 300;font-size: 20px;">/<span class="-num-max"><?= pad($data_active + 1) ?></span></span>
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
</div>