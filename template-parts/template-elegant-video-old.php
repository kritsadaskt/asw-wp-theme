<?php
$content = $args[0];
$f = $args[1];
$bg = acf_img($content['bg_img']);
$has_tour = 0;
if ($content['virtual_file']['ID'] != '') {
	$has_tour = 1;
}
if ($has_tour) {
	$url_360 = theme_gen_visual_tour($content);
}
?>
<style type="text/css">
	#video {
		--mg: calc((100vw - 1280px) / 2);
		background-size: cover;
		background-image: url('<?= $bg ?>');
		padding-top: 68px;
		background-size: cover;
		background-position: top;
		padding-bottom: 66px;
		min-height: 100vh;
	}

	.video-wrap {
		margin-top: 32px;
		overflow: hidden;
		position: relative;
		--i: 1;
		--g: 3;
		--j: calc(((var(--i) + 0)*3) - 5);
	}

	.video-rail {
		display: flex;
		justify-content: flex-start;
		align-items: center;
		width: calc(55vw * var(--g));
		position: relative;
		transition: left .5s ease-in-out;
		left: calc((-55vw * (var(--i) - 1)) + 22.5vw);
	}

	.video-block {
		width: 55vw;
		display: inline-block;
		padding: 0 8px;
		transition: left .5s ease-in-out, width .5s ease-in-out;
		opacity: .3;
		transition: all .3s;
	}

	.video-block.-active {
		opacity: 1;
	}

	.video-item {
		background-color: #222;
		border-radius: 0;
		overflow: hidden;
		aspect-ratio: 16/9;
	}

	.video-nav {
		display: inline-flex;
		height: 48px;
		margin-top: 36px;
		justify-content: center;
		align-items: center;
	}

	.video-nav-arrow {
		background-image: var(--mc-arrow-up);
		width: 48px;
		height: 48px;
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
		position: absolute;
		cursor: pointer;
		transition: .5s;
		top: calc(50% - 48px - 48px + 32px);
	}

	.video-nav-arrow:hover {
		filter: brightness(120%);
		transition: .5s;
	}

	.video-nav-arrow.-r {
		/*        margin-left: 24px;*/
		right: var(--mg);
		transform: rotate(90deg);
	}

	.video-nav-arrow.-l {
		/*        margin-right: 24px;*/
		left: var(--mg);
		transform: rotate(-90deg);
	}

	.video-nav-dot {
		background-color: #BFC4C8;
		background-image: linear-gradient();
		width: 40px;
		height: 2px;
		transition: all .3s;
		cursor: pointer;
	}

	.video-nav-dot.-active {
		height: 4px;
		box-shadow: 0px 1px 12px var(--mc-main-5);
		background-image: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));
	}

	.video-hov-glow {
		position: absolute;
		top: 16.5%;
		left: 16.5%;
		opacity: 0;
	}

	.video-nav-arrow:hover .video-hov-glow {
		opacity: 0.1;
	}

	.plyr__poster {
		background-size: cover !important;
	}

	.video-tabs-override {
		/*		max-width: 800px;*/
		/*		width: max-content;*/
		/*		margin: auto;*/
	}

	.video-nav-bars {
		--max: 3;
		display: flex;
		grid-template-columns: repeat(var(--max), 1fr);
		align-items: center;
		justify-content: end;
		gap: 8px;
	}

	.-inside-nav {
		position: absolute;
		top: 0;
		left: 0;
		background-size: #0f03;
		height: 100%;
		width: 100%;
	}

	.-inside-nav .container {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	#video .info-tabs-block {
		border-bottom: 0;
		padding: 0;
	}

	.-line {
		height: 8px;
		width: 1px;
		background-color: var(--ci-grey-300);
		position: relative;
		top: 15px;
	}

	.tour_iframe_wrap {
		max-width: 900px !important;
		margin-top: 32px;
	}

	.tour_iframe_inner {

		padding-top: 56.25%;
		position: relative;
	}

	.tour_iframe {
		position: absolute;
		left: 0;
		top: 0;
		width: 100% !important;
		height: 100%;
		aspect-ratio: 4 / 3;
	}

	.info-tab-txt {
		padding: 6px 32px;
	}

	#video .video-wrap[data-i="1"] + div .-l {
		pointer-events: none;
		opacity: 0.5;
	}

	#video .video-wrap[data-end="1"] + div .-r {
		pointer-events: none;
		opacity: 0.5;
	}
	.title-v {
		color: var(--mc-main-3);
	}
	/*-- Mobile Version --*/
	@media (max-width: 1319px) {
		#video {
			padding-top: 0px;
			padding-bottom: 32px;
			min-height: auto;
		}

		.video-nav-arrow {
			display: none;
		}

		.video-block.-active {
			width: 90vw;
		}

		.video-rail {
			height: 50vw;
			width: calc(90vw + ((var(--g) - 1) * 50vw));
			left: calc(-50vw * (var(--i) - 1) + 5vw);
		}

		.video-block {
			width: 50vw;
		}

		.video-nav-bars {
			justify-content: center;

		}

		.title-v {
			font-size: 38px !important;
			line-height: 40px;
			padding-top: 43px;
		}

		.info-tab-txt {
			padding: 6px 16px;
		}

		.another-faci-wrap .-text {
			padding: 0px 16px;
		}

		.another-faci-topic>.-absolute {
			--w: 64 !important;
		}

		#video .info-tabs-blocks {
			border-bottom: 1px solid #323A41;
		}

		#video .info-tabs-block {
			padding: 0;
			border-bottom: 0;
		}
	}

	#video .info-tabs-blocks {
		border-bottom: 1px solid #323A41;
	}
</style>
<script type="text/javascript">
	function navVideo(k, tnum) {
		let v = document.querySelector('.video-wrap.video-t' + tnum)
		let now = parseInt(v.dataset.i)
		let next = now + k
		let end = parseInt(v.dataset.g)
		if (next < 1) {
			next = end
		} else if (next > end) {
			next = 1
		}
		setVideo(next, tnum)
	}

	function setVideo(next, tnum) {
		let v = document.querySelector('.video-wrap.video-t' + tnum)
		v.dataset.i = next
		let end = parseInt(v.dataset.g)
		if (next == end) {
			v.dataset.end = 1
		} else {
			v.dataset.end = 0
		}
		v.style.setProperty('--i', next)
		if (document.querySelector(`.video-t${tnum} .video-block.-active`) != null) {
			document.querySelector(`.video-t${tnum} .video-block.-active`).classList.remove('-active')
		}
		if (document.querySelector(`.video-t${tnum} .video-nav-dot.-active`) != null) {
			document.querySelector(`.video-t${tnum} .video-nav-dot.-active`).classList.remove('-active')
		}
		document.querySelector(`.video-t${tnum} .video-block[data-i="${next}"]`).classList.add('-active')
		document.querySelector(`.video-t${tnum} .video-nav-dot[data-i="${next}"]`).classList.add('-active')
	}
</script>
<section id="video" class="is-on-nav is-on-nav-mob">
	<div class="section-fade">
		<div class="mx-auto container text-white">
			<h2 class="title-alt text-center title-v">วิดีโอ</h2>
			<div class="text-center">
				<div class="info-tabs-block-wrap">
					<div class="info-tabs-block" data-tab="0">
						<div class="info-tabs-block-arrow -left"></div>
						<div class="info-tabs-blocks">
							<div class="info-tabs-rail">
								<?php
								foreach ($content['tab'] as $i => $v) {
									?>
									<div class="-line <?php if ($i == 0) {
										echo 'hidden';
									} ?>"></div>
									<div class="-video info-tab" data-tab="<?= $i ?>" onclick="video_tab_change(<?= $i ?>)">
										<span class="info-tab-txt"><?= $v['tab_name'] ?></span>
									</div>
									<?php
								}
								?>
								<?php
								if ($has_tour) {
									$i++;
									?>
									<div class="-line <?php if ($i == 0) {
										echo 'hidden';
									} ?>"></div>
									<div class="-video info-tab" data-tab="<?= $i ?>" onclick="video_tab_change(<?= $i ?>)">
										<span class="info-tab-txt"><?= $content['virtual_title'] ?></span>
									</div>
									<?php
								}
								?>
							</div>
						</div>
						<div class="info-tabs-block-arrow -right"></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		foreach ($content['tab'] as $i => $v) {
			if ($v['video_or_virtual']=='video') {
				$vid = $v['video'];
			}else{
				$vid = $v['virtual'];
			}
			$vid_group = 0;
			if (is_array($vid)) {
				$vid_group = ofsize($vid);
			}
			?>
			<style>
				.video-tab-body {
					position: relative;
				}
			</style>
			<div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
				<div class="video-wrap video-t<?= $i ?>" data-i="1" data-g="<?= $vid_group ?>" style="--i:1;--g:<?= $vid_group ?>">
					<div class="video-rail">

						<?php
						if ($v['video_or_virtual']=='video') {
							foreach ($vid as $vi => $vv) {
								?>
								<div data-i="<?= $vi + 1 ?>" class="video-block <?= ($vi == 0) ? '-active' : '' ?> ">
									<div class="video-item">

										<div class="bg-cover video-item-slider-slide-video" style="background-color:#000;">
											<div class="plyr-slider-wrap">
												<?= jb_ytplayer($vv['video_url'], 'slide_player_t' . $i . '_' . ($vi + 1), $vv['video_cover_image']['sizes']['large']); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
							}
						}else{
							?>
							<div>
								<!-- virtual code here -->
							</div>
							<?php
						}
						?>
					</div>
				</div>
				<?php if ($vid_group > 1) : ?>

					<div class="container mx-auto">
						<div class="video-nav-arrow -l" onclick="navVideo(-1,<?= $i ?>)">
						</div>
						<div class="video-nav-arrow -r" onclick="navVideo(1,<?= $i ?>)">
						</div>
						<div class="video-nav video-t<?= $i ?> video-nav-bars" style="<?= $vid_group ?>">
							<?php
							foreach ($vid as $vi => $vv) {
								?>
								<div onclick="setVideo(<?= ($vi + 1) ?>,<?= $i ?>)" data-i="<?= ($vi + 1) ?>" class="video-nav-dot <?= ($vi == 0) ? '-active' : '' ?>"></div>
								<?php
							}
							?>
						</div>
					</div>

				<?php endif ?>
			</div>
			<?php
		}
		?>
		<?php
		if ($has_tour) {
			$i++;
			?>
			<div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
				<div class="container mx-auto tour_iframe_wrap">
					<div class="tour_iframe_inner">
						<iframe src="<?= $url_360 ?>" class="tour_iframe"></iframe>
					</div>
				</div>
			</div>
			<?php
		}
		?>


	</div>
</section>
<script type="text/javascript">
	function render_video_slider() {
		let node = document.createElement("div")
		let width = document.querySelector('#video .info-tab').offsetWidth
		node.classList.add('-absolute')
		node.classList.add('video-tab-slider')
		node.style.setProperty('--l', 0)
		node.style.setProperty('--w', width)
		document.querySelector('#video .info-tabs-blocks .info-tabs-rail').appendChild(node)
	}
	render_video_slider()

	function video_tab_change(tab) {
		if ($('.-video.info-tab.-active') != null) {
			$('.-video.info-tab.-active').classList.remove('-active')
		}
		$(`.-video.info-tab[data-tab="${tab}"]`).classList.add('-active')

		if ($('.video-tab-body[data-showb="1"]') != null) {
			$('.video-tab-body[data-showb="1"]').dataset.showb = 0
		}
		$(`.video-tab-body[data-tab="${tab}"]`).dataset.showb = 1
		if (tab == 0) {
			document.querySelector('.video-tab-slider').style.setProperty('--w', document.querySelectorAll('#video .info-tab-txt')[tab].offsetWidth)
			document.querySelector('.video-tab-slider').style.setProperty('--l', 0)
		} else if (tab == 1) {
			document.querySelector('.video-tab-slider').style.setProperty('--w', document.querySelectorAll('#video .info-tab-txt')[tab].offsetWidth)
			document.querySelector('.video-tab-slider').style.setProperty('--l', document.querySelectorAll('#video .info-tab-txt')[tab - 1].offsetWidth)
		} else if (tab > 1) {
			document.querySelector('.video-tab-slider').style.setProperty('--w', document.querySelectorAll('#video .info-tab-txt')[tab].offsetWidth)
			let sumWidth = 0
			for (let j = 0; j < tab; j++) {
				sumWidth += document.querySelectorAll('#video .info-tab-txt')[j].offsetWidth
			}
			document.querySelector('.video-tab-slider').style.setProperty('--l', sumWidth)
		}
	}
	setTimeout(() => {
		video_tab_change(0)
	}, 100)
</script>
<?php theme_overide_style($content) ?>