<?php
$content = $args[0];
$f = $args[1];
$bg = $content['information_background']['sizes']['1536x1536'];
?>
<style type="text/css">
	#info {
		color: var(--text-color);
		background-color: var(--bg-color);
		background-image: var(--bg-img);
		background-position: center;
		background-size: cover;
		padding-top: 5.625rem;
		padding-bottom: 5rem;
		padding-top: 4rem;
		padding-bottom: 4rem;
	}

	.info-wrap {
		margin-top: 42px;
		display: none;
	}

	.info-wrap[data-show="1"] {
		display: block;
	}

	/*-- Mobile Version --*/
	@media (max-width: 1024px) {
		.info-wrap {
			padding-left: 1rem;
			padding-right: 1rem;
		}
	}

	@media (max-width: 767px) {
		.info-wrap {
			padding-left: 0rem;
			padding-right: 0rem;
		}
	}

	#info-img {
		box-shadow: 0px 4px 32px 8px rgba(0, 0, 0, 0.25);
		border-radius: 16px;
		aspect-ratio: 1024/656;
		width: 100%;
		background-size: cover;
		background-position: center;
	}

	#info-img-block {
		background-image: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));
		border-radius: 22px;
		padding: 8px;
		position: relative;
		z-index: 2;
		aspect-ratio: 1024/656;
	}

	#info-img-ring {
		background-size: cover;
		background-position: center;
		aspect-ratio: 1252/155;
		width: 120%;
		position: relative;
		left: -10%;
		margin-top: -6.5%;
	}

	#info-img-wrap {
		position: relative;
		z-index: 1;
	}


	#info-detail-wrap {
		padding-top: 56px;
		/*height: 448px;
		overflow-y: auto;*/
		padding-right: 72px;
	}

	#info-detail-wrap::-webkit-scrollbar {
		width: 8px;
	}

	#info-detail-wrap::-webkit-scrollbar-track {
		background: #03112180;
		border-radius: 8px;
	}

	#info-detail-wrap::-webkit-scrollbar-thumb {
		background: #FFFFFF;
		border: 1px solid var(--mc-main-1);
		box-shadow: 0px 1px 12px var(--mc-main-1);
		border-radius: 8px;
	}

	#info-detail {
		display: grid;
		grid-template-columns: 1fr 1fr;
		grid-column-gap: 40px;
		grid-row-gap: 50px;
	}

	.info-detail-title {
		color: var(--mc-main-4);
		font-style: normal;
		font-weight: 400;
		font-size: 26px;
		line-height: 32px;
	}

	.info-detail-body {
		font-style: normal;
		font-weight: 400;
		font-size: 22px;
		margin-top: -6px;
		line-height: 28px;
		color: var(--text-color);
	}

	.info-detail-block {
		display: grid;
		grid-template-columns: 48px auto;
		grid-column-gap: 16px;
	}

	.info-detail-icon img {
		width: 100%;
	}

	.info-grid {
		grid-column-gap: 100px;
		padding-left: 96px;
	}

	.master-btn {
		margin: .5rem;
	}

	#info .info-tabs-block-wrap {
		width: max-content;
	}

	@media (max-width: 1280px) {
		#info-detail-wrap {
			padding-top: 0;
			height: auto;
			overflow-y: visible;
			padding-right: 0;
		}

		#info-detail {
			padding-top: 2rem;
			display: grid;
			grid-template-columns: 1fr 1fr;
			grid-column-gap: 25px;
			grid-row-gap: 46px;
		}

		.info-detail-title {
			font-style: normal;
			font-weight: 400;
			font-size: 26px;
			line-height: 32px;
			padding-top: 10px;
		}

		.info-detail-body {
			font-style: normal;
			font-weight: 400;
			font-size: 22px;
			line-height: 28px;
			color: var(--text-color);
			margin-top: 1px;
		}

		.info-grid {
			grid-column-gap: 0;
			padding-left: 0;
		}

		.info-btn {
			padding: 6px 24px;
			color: var(--mc-nav-btn-txt-ready);
			background: var(--mc-nav-btn-bg-ready);
			transition: .5s;
			border-radius: 10em;
			display: inline-block;
			margin: 4px;
			width: 70%;
		}

		.info-btn:hover {
			color: var(--mc-nav-btn-txt-hover);
			background: var(--mc-nav-btn-bg-hover);
			transition: .5s;
		}

		.info-detail-block {
			display: flex;
			flex-direction: column;
			grid-column-gap: 16px;
		}

		.info-detail-icon img {
			width: auto;
			height: 40px;
			margin: 0;
		}

		.circle-progress {
			width: 100% !important;
		}

		.info-progress-summary-body {
			padding-left: 0.5rem !important;
		}
	}
</style>
<section id="info" class="is-on-nav is-on-nav-mob">
	<div class="container mx-auto section-fade">
		<div class="text-center">
			<div class="theme-title">
				<span class="title-c"><?php pll_e('ข้อมูลโครงการ')?></span>
				<span class="title-b"><?php pll_e('ข้อมูลโครงการ')?></span>
				<h2 class="title-a"><?php pll_e('ข้อมูลโครงการ')?></h2>
			</div>
		</div>
		<div class="text-center">
			<div class="info-tabs-block-wrap">
				<div class="info-tabs-block info-tabs-block_main">
					<div data-tab="0" class="info-tab" onclick="info_tabs_change(0)">
						<span class="info-tab-txt"><?php pll_e('รายละเอียด')?></span>
					</div>
					<?php
					if ($content['hide-progress'] == 'show') {
						?>
						<div data-tab="1" class="info-tab" onclick="info_tabs_change(1)">
							<span class="info-tab-txt"><?php pll_e('ความคืบหน้า')?></span>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
		// pre($content);
		?>
		<div class="info-wrap" data-tab="0">
			<div class="grid grid-cols-12 info-grid">
				<div class="col-span-12 xl:col-span-6 px-8 xl:px-0">
					<div id="info-img-wrap">
						<div id="info-img-block">
							<div id="info-img"
							style="background-image:url('<?= $content['information_image']['sizes']['large'] ?>')">
						</div>
					</div>
					<div id="info-img-ring" style="background-image:url('<?= acf_img($content['under_image']) ?>')">
					</div>
				</div>
				<div id="info-btn-group" class="hidden xl:block">
					<?php if ($content['more_information']['url'] != ''): ?>
						<a  target="_blank" href="<?= $content['more_information']['url'] ?>" class="master-btn"
							target="_blank">
							<span class="info-btn-txt"><?php pll_e('ดาวน์โหลดโบรชัวร์')?></span>
						</a>
					<?php endif ?>
					<?php if ($content['more_condition'] != ''): ?>
						<a  target="_blank" href="<?php echo $content['more_condition'][0]->guid ?>" class="master-btn"
							target="_blank">
							<span class="info-btn-txt"><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></span>
						</a>
					<?php endif ?>
				</div>
			</div>
			<div class="col-span-12 xl:col-span-6 px-4 xl:px-0">
				<div id="info-detail-wrap">
					<div id="info-detail">
						<?php foreach ($content['details'] as $key => $value) { ?>
							<div class="info-detail-block">
								<div class="info-detail-icon">
									<img src="<?= $value['icon']['sizes']['medium'] ?>">
								</div>
								<div class="info-detail-text">
									<h6 class="info-detail-title">
										<?= $value['title'] ?>
									</h6>
									<div class="info-detail-body">
										<?= $value['text'] ?>
										<ul class="ml-6">
											<?php
											foreach ($value['bullet'] as $key => $v) {
												?>
												<li class="list-disc">
													<?= $v['text'] ?>
												</li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
							</div>
						<?php }
						?>

						<!-- <div style="height: 20px;"></div> -->
					</div>
				</div>
				<div id="info-btn-group" class="block xl:hidden">
					<?php if ($content['more_information']['url'] != ''): ?>
						<a href="<?= $content['more_information']['url'] ?>" class="info-btn" target="_blank">
							<span class="info-btn-txt"><?php pll_e('ดาวน์โหลดโบรชัวร์')?></span>
						</a>
					<?php endif ?>
					<?php if ($content['more_condition'] != ''): ?>
						<a href="<?php echo $content['more_condition'][0]->guid ?>" class="info-btn" target="_blank">
							<span class="info-btn-txt"><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></span>
						</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">
		#info-2-nav {
			--dots: 5;
			height: 46px;
			display: grid;
			grid-template-columns: 46px calc(var(--dots)*16px) 46px;
			grid-column-gap: 46px;
			justify-content: center;

		}

		.info-2-nav-arrow {
			background-image: var(--mc-arrow-up);
			width: 100%;
			padding-top: 100%;
			background-size: cover;
			position: relative;
			cursor: pointer;
			transform: scale(1.5) rotate(-90deg);

		}

		.info-2-nav-arrow.arrow-right {
			transform: scale(1.5) rotate(90deg);

		}

		.info-2-nav-dot {
			width: 8px;
			height: 8px;
			background-color: #fff;
			border-radius: 100%;
			transition: all .3s;
			cursor: pointer;
		}

		.info-2-nav-dot.-active {
			border: 1px solid var(--mc-main-1);
			box-shadow: 0px 1px 12px var(--mc-main-5);
			width: 12px;
			height: 12px;
		}

		.info-2-nav-dots {
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		#info-detail-wrap.progress {
			padding-top: 0;
		}

		#info-detail.progress {
			display: block;
		}

		.progress-item label {
			margin: 0;
		}

		.info-progress-summary-body {
			padding-left: 2rem;
		}

		.info-rail-wrap {
			overflow: hidden;
			border-radius: 16px;
			width: 100%;
			height: 100%;
		}

		.info-rail {
			position: relative;
			aspect-ratio: 1024/656;
			display: flex;
			transition: .5s;
			left: calc(var(--i) * -100%);
			width: calc(var(--max) * 100%);
			height: 100%;
		}

		.info-hov-glow {
			position: absolute;
			top: 16.5%;
			left: 16.5%;
			opacity: 0;
		}

		.info-2-nav-arrow:hover .info-hov-glow {
			opacity: 0.1;
		}

		#info-btn-group {
			margin-top: 30px;
		}

		.info-wrap[data-i="0"] #info-btn-group #info-2-nav .arrow-left {
			opacity: 0.5;
			pointer-events: none;
			transition: all .2s;
		}

		.info-wrap[data-end="1"] #info-btn-group #info-2-nav .arrow-right {
			opacity: 0.5;
			pointer-events: none;
			transition: all .2s;
		}

		/*-- Mobile Version --*/
		@media (max-width: 1319px) {
			#info {
				padding-top: 36px;
				padding-bottom: 40px;
			}

			.info-2-nav-arrow {
				width: 0%;
			}

			.info-progress-show {
				grid-template-columns: 1fr;
				row-gap: 24px;
			}

			.progress-bar .-percent {
				text-align: center;
			}

			#info-btn-group {
				margin-top: 36px;
			}
		}
	</style>
	<?php 
	$img_size = 0; 
	if (is_array($content['image'])) {
		$img_size = ofsize($content['image']);
	}
	$progress_size = 0; 
	if (is_array($content['progress_list'])) {
		$progress_size = ofsize($content['progress_list']);
	}
	
	?>
	<div class="info-wrap" data-tab="1" data-max="<?= $img_size ?>" data-i="0"
		style="--i: 0;--max:<?= $img_size ?>">
		<div class="grid grid-cols-12 info-grid">
			<div class="col-span-12 xl:col-span-6 px-8 xl:px-0">
				<div id="info-img-wrap">
					<div id="info-img-block">
						<div class="info-rail-wrap">
							<div class="info-rail">
								<?php foreach ($content['image'] as $key => $value) { ?>
									<div id="info-img" style="background-image:url(<?= $value['url'] ?>)"></div>
								<?php } ?>
								<!-- <div id="info-img" style="background-image:url('/wp-content/uploads/2023/01/Rectangle-576.png')"></div> -->
							</div>
						</div>
					</div>
					<div id="info-img-ring" style="background-image:url('<?= acf_img($content['under_image']) ?>')"></div>
				</div>
				<div id="info-btn-group" class="info-2-btn">
					<div id="info-2-nav" style="--dots:<?= $img_size ?>">
						<div onclick="navinfo_2(-1)" class="info-2-nav-arrow arrow-left">
							<div class="info-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
						</div>
						<div class="info-2-nav-dots">
							<?php foreach ($content['image'] as $key => $value) { ?>
								<div onclick="setinfo_2(this.dataset.i)" data-i="<?= $key ?>"
									class="info-2-nav-dot <?php echo ($key == 0) ? '-active' : '' ?>"></div>
								<?php } ?>
							</div>
							<div onclick="navinfo_2(1)" class="info-2-nav-arrow arrow-right">
								<div class="info-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-span-12 xl:col-span-6 px-4 xl:px-0">
					<div id="info-detail-wrap" class="progress">
						<div id="info-detail" class="progress">
							<div class="info-progress-summary grid grid-cols-12 gap-2 xl:gap-6 items-center">
								<style>
									.circle-progress {
										width: 168px;
										height: auto;
									}

									.circle-progress-value {
										stroke-width: 12px;
										stroke: var(--mc-main-5);
										stroke-dasharray: 3 3;
									}

									.circle-progress-circle {
										stroke-width: 12px;
										stroke: #FFFFFF33;
										stroke-dasharray: 3 3;
										stroke-dashoffset: 3.3;
									}

									.circle-progress-text {
										fill: #FFFFFF;
										font-style: normal;
										font-weight: 400;
										font-size: 32px;
										line-height: 32px;
										color: #FFFFFF;
										-webkit-text-stroke: 1px var(--mc-main-1);
										text-shadow: 0px 1px 12px var(--mc-main-5);
										position: relative;

									}
								</style>
								<div class="info-progress-summary-chart col-span-4">
									<div class="main-progress"></div>
								</div>
								<div class="info-progress-summary-body col-span-8">
									<h3 class="progress-sum-title"><?php pll_e('ภาพรวม')?></h3>
									<h6 class="progress-sum-subtitle">
										<?= $content['overall'] ?>
									</h6>
								</div>
							</div>
							<style type="text/css">
								.progress-bar .-bar {
									height: 10px;
									width: 100%;
									border-radius: 10em;
									background: #33536a;
									display: block;
								}

								.progress-bar .-bar-inner {
									height: 10px;
									width: calc(var(--pc)*1%);
									background-color: var(--mc-main-5);
									border-radius: 10em;
									display: block;
									transition: all 1s cubic-bezier(0.44, 0.67, 0.07, 0.91);
								}

								.progress-bar {
									display: grid;
									grid-template-columns: 10fr 2fr;
									grid-column-gap: 0.5rem;
									justify-content: center;
									align-items: center;
									line-height: 1rem;
								}
							</style>
							<div
							class="info-progress-show grid <?= ($progress_size > 3) ? 'grid-cols-2' : 'grid-cols-1' ?> mt-6 gap-x-8 gap-y-10">
							<?php foreach ($content['progress_list'] as $key => $value) { ?>
								<div class="progress-item">
									<label>
										<?= $value['name'] ?>
									</label>
									<div class="progress-bar">
										<span class="-bar" data-percent="<?= $value['percent'] ?>" style="--pc:0"><span
											class="-bar-inner"></span></span>
											<span class="-percent">
												<?= $value['percent'] ?>%
											</span>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	const cp = new CircleProgress('.main-progress', {
		max: 100,
		value: 0,
		textFormat: 'percent',
		animation: 'easeInOutCubic',
		animationDuration: 1200,
	});
	function info_tabs_change(i) {
		let section = document.querySelector('#info')
		let active = parseInt(section.dataset.active)
		if (!isNaN(active)) {
			document.querySelector('.info-tabs-block_main .-active').classList.remove('-active')
			document.querySelector(`.info-wrap[data-show="1"]`).dataset.show = 0
		}
		section.dataset.active = i
		document.querySelector(`.info-tabs-block_main [data-tab="${i}"]`).classList.add('-active')
		document.querySelector(`.info-wrap[data-tab="${i}"]`).dataset.show = 1
		let bars = document.querySelectorAll('.progress-bar .-bar')
		if (i == 0) {
			cp.value = 0
		}
		if (i == 1) {
			cp.value = parseInt(<?= $content['percent'] ?>)
		}
		for (let bar of bars) {
			xconsolex.log(bar)
			if (i == 1) {
				setTimeout(() => {
					bar.style.setProperty('--pc', bar.dataset.percent)
				}, 100)

			} else {
				setTimeout(() => {
					bar.style.setProperty('--pc', 0)
				}, 100)
			}

		}

	}
	info_tabs_change(0)

	function navinfo_2(k) {

		let v = document.querySelector('.info-wrap[data-tab="1"]')
		let now = parseInt(v.dataset.i)
		let max = parseInt(v.dataset.max)
		let next = now + k


		if (next == max) {
			next = 0;
		}
		if (next < 0) {
			next = max - 1;
		}
		setinfo_2(next)
	}

	function setinfo_2(next) {
		let v = document.querySelector('.info-wrap[data-tab="1"]');
		// xconsolex.log(document.querySelector('.info-2-nav-dot.-active'))
		v.dataset.i = next
		let end = parseInt(v.dataset.max)
		if (next == end - 1) {
			v.dataset.end = 1
		} else {
			v.dataset.end = 0
		}
		v.style.setProperty('--i', next)
		document.querySelector('.info-2-nav-dot.-active').classList.remove('-active');
		document.querySelectorAll('.info-2-nav-dot')[next].classList.add('-active');

	}
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    let el = $('.concept-mob-body')
    let hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = 0;
        var nav = $$('.concept-mob-body .-nav-wrap .-dot');
        let max = nav.length;
        for(let b of nav){
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
        nav[i].click()

    })
</script>
<?php theme_overide_style($content) ?>