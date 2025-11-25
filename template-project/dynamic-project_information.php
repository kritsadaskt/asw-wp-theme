<?php 
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
$bg = $content['information_background']['sizes']['1536x1536'];
?>
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
				<div id="info-btn-group" class="hidden xl:flex">
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
				<div id="info-btn-group" class="flex xl:hidden">
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
							<!-- <div id="info-img" style="background-image:url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/01/Rectangle-576.png')"></div> -->
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