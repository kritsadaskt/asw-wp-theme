<?php
$id = get_the_ID();
$fim = get_the_post_thumbnail_url($id, '1536x1536');
$cpj = get_post_parent();
$pj = get_field('hot_deal_l2', $cpj->ID)['project'][0];
$unit_f = get_field('hot_deal_l3');
$hd = '/wp-content/themes/seed-spring/hot-deal/';
$round = ofsize($unit_f['down']['table']);
$unit_status = $unit_f['status'];
$logo = get_field('logo', $pj->ID)['sizes']['large'];
$gallery = $unit_f['gallery'];
$gallerySize = ofsize($gallery);
$tour_url = theme_gen_visual_tour($unit_f['tour']['url']);
$has_tour = 0;
$has_visual = 0;

if ($unit_f['tour']['url'] != '') {
	$tour_url = theme_gen_visual_tour($unit_f['tour']['url']);
	if ($tour_url != '') {
		$has_tour = 1;
	}
}

if ($has_tour == 1 OR $gallerySize > 0) {
	$has_visual = 1;
}

$v_App = 'HotDeal';
$v_OrderTypePayment = 6;
$v_ProjectID = get_field('project_code',$pj->ID);
$v_UnitCode = $unit_f['unit_code'];
$v_Amount = $unit_f['book_price'];
$book_url = asw_hot_deal_book($v_App,$v_OrderTypePayment,$v_ProjectID,$v_UnitCode,$v_Amount);
?>
<?php if ($has_visual==0): ?>
	
<?php endif ?>
<style type="text/css">
	.unit-wrap[data-status="2"] .-pmr-btn {
		background: var(--grey-grey-700, #CFD4D9);
		pointer-events: none;
	}

	div#content {
		background-color: #EDF2F6;
	}

	.cpj-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 56px;
		font-style: normal;
		font-weight: 400;
		line-height: 56px;
		/* 100% */
		margin-top: 26px;
		margin-bottom: 17px;
	}

	.unit-top {
		display: grid;
		grid-template-columns: 8.43fr 3fr;
		grid-gap: 32px;
	}

	.grid-cell-info {
	}
	.cell-plan {
		border: 1px solid var(--grey-grey-800, #DFE3E8);
	}

	.ticket {
		background: var(--white, #FFF);
		stroke-width: 1px;
		stroke: var(--grey-grey-800, #DFE3E8);
		filter: drop-shadow(0px 4px 12px rgba(0, 0, 0, 0.05));
		padding: 24px;
		padding-top: 30px;
		border-radius: 12px;
		position: sticky;
		top: 9rem;
	}

	.-pvr {
		margin-bottom: 8px;
	}

	.-pvr .--m {
		display: grid;
		grid-template-columns: auto 4rem;
	}

	.-pvr .--m .-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		/* 127.273% */
	}

	.-pvr .--m .-text {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
		/* 127.273% */
		text-align: right;
	}

	.-pvr .--m .-remark {
		color: var(--grey-grey-400, #828A92);
		font-size: 20px;
		font-style: normal;
		font-weight: 400;
		line-height: 24px;
		/* 120% */
	}

	.pvr-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
		/* 127.273% */
	}

	.overall-price>div {
		display: grid;
		grid-template-columns: 4em auto;
	}

	.overall-price>div .-title {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
	}

	.overall-price .-old-price {
		color: var(--grey-grey-400, #828A92);
		text-align: right;
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		position: relative;
		margin-right: .5rem;
	}

	.overall-price>div .-text {
		color: var(--grey-grey-200-emphasize, #323A41);
		text-align: right;
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
	}

	.overall-price>div.-price-line-2>.-title {
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
	}

	.overall-price>div.-price-line-2>.-text {
		color: var(--veridian-veridian-400-main, #1D9F9B);
		text-align: right;
		font-size: 30px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
	.overall-price .-old-price span{
		display: inline-block;
	}
	.overall-price .-old-price span::after {
		content: " ";
		position: absolute;
		height: 1px;
		width: calc(100% + 6px);
		width: 100%;
		background: var(--grey-grey-400, #828A92);
		display: block;
		top: 0.6em;
		left: -3px;
	}

	.-pmr-btn {
		display: flex;
		width: 100%;
		padding: 8px 34px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		border-radius: 8px;
		background: var(--blue-blue-300-main, #123F6D);
		color: #fff;
		cursor: pointer;
	}
	.-pmr-btn[href="#!"] {
		background: var(--grey-grey-700, #CFD4D9);
		pointer-events: none;
	}

	.cpj-subtitle {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 48px;
		font-style: normal;
		font-weight: 400;
		line-height: 48px;
	}

	#cpj-units {
		padding-top: 36px;
	}

	.unit-data-grid {
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 20px;
	}

	.unit-data-item {
		display: grid;
		grid-template-columns: 32px auto;
		gap: 8px;
	}

	.line-full-1 {
		display: block;
		height: 2px;
		background-color: var(--grey-grey-800, #DFE3E8);
		width: 100%;
		margin-top: 45px;
		margin-bottom: 36px;
	}
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		.line-full-1.-before-room-tour {
			margin-bottom: 0;
		}
	}

	.money-down {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
	}

	.money-down .-full-price,
	.money-down .-round {
		color: var(--blue-blue-400, #3A638E);
		font-size: 30px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}

	.money-table {
		display: grid;
		grid-template-columns: repeat(8, 1fr);
		gap: 10px;
	}

	.money-table .-td {
		display: flex;
		border-radius: 8px;
		border: 1px solid var(--blue-blue-700, #B7CDE4);
		flex-flow: column;
		background: #fff;
		overflow: hidden;
	}

	.money-table .-th {
		display: flex;
		background: var(--blue-blue-800, #E0ECF8);
		color: var(--grey-grey-200-emphasize, #323A41);
		text-align: center;
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
		justify-content: center;
		align-items: center;
		height: 48px;
	}

	.money-table .-tb {
		display: flex;
		color: var(--grey-grey-200-emphasize, #323A41);
		text-align: center;
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		justify-content: center;
		align-items: center;
		height: 48px;
	}

	.-nav-room-wrap {
		margin-top: -36px;
		padding-bottom: 36px;
	}
	.down-remark{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
		margin-top: 28px;
	}
	.down-remark h6{
		font-size: 26px;
		margin-top: 32px;
		font-weight: 500;
	}
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		.down-remark h6{
			line-height: 32px;
			font-size: 24px;
		}
	}
</style>
<main class="main-unit">
	<?php
	$hotdealnav = [];
	$hotdealnav['layer'] = 3;
	$hotdealnav['logo'] = $logo;
	$hotdealnav['cpj'] = $cpj;
	get_template_part('template-parts/hot-deal', 'nav', $hotdealnav);
	?>
	<div class="body-nav">
		<div class="-nav-unit"></div>
		<div class="unit-wrap" data-status="<?= $unit_status ?>">
			<section id="hd-l3-header">
				<div class="cont">
					<h1 class="cpj-title"><?= get_the_title() ?></h1>
					<div class="unit-top">
						<div class="grid-cell-info">
							<div data-aos="fade-up" data-aos-once="false" class="jb-lightbox cursor-pointer mb-8" data-jb-lightbox="theplan" style="--img:url('<?= $unit_f['plan']['sizes']['1536x1536'] ?>')">
								<img src="<?= $unit_f['plan']['sizes']['1536x1536'] ?>" class="w-full">
								<div class="-nav-info"></div>
							</div>
							<div class="">
								<?php if (ofsize($unit_f['unit-data'])>0): ?>
									

									<h2 class="cpj-subtitle mb-4" data-aos="fade-up" data-aos-once="false"><?php pll_e('ข้อมูลยูนิต') ?></h2>
									<div class="unit-data-grid" data-aos="fade-up" data-aos-once="false">
										<?php foreach ($unit_f['unit-data'] as $uk => $uv) : ?>
											<div class="unit-data-item">
												<div>
													<img class="-img" src="<?= $uv['icon']['sizes']['medium'] ?>">
												</div>
												<div>
													<span class="-txt"><?= $uv['text'] ?></span>
												</div>
											</div>
										<?php endforeach ?>
									</div>
									<div class="line-full-1" data-aos="fade-up" data-aos-once="false"></div>

								<?php endif ?>
								<?php if ($unit_f['down']['pay'] > 0): ?>
									<h2 class="cpj-subtitle mb-1" data-aos="fade-up" data-aos-once="false"><?php pll_e('เงินดาวน์') ?></h2>
									<p class="money-down mb-3" data-aos="fade-up" data-aos-once="false">
										<?php pll_e('เงินดาวน์') ?> <span class="-full-price">฿<?= setComma($unit_f['down']['pay']) ?></span> 
										<?php if ($round >0 ): ?>
											<?php pll_e('จำนวนงวดที่ผ่อน') ?> <span class="-round"><?= $round ?></span> <?php pll_e('งวด') ?> <?php pll_e('ดังนี้') ?>
										<?php endif ?>
									</p>
									<div class="money-table" data-aos="fade-up" data-aos-once="false">
										<?php foreach ($unit_f['down']['table'] as $mk => $mv) : ?>
											<div class="-td">
												<div class="-th"><?php pll_e('งวดที่') ?> <?= $mk + 1 ?></div>
												<div class="-tb">฿<?= setComma($mv['pay']) ?></div>
											</div>
										<?php endforeach ?>
									</div>
									<div class="down-remark"><?=$unit_f['down']['remark']?></div>
									<div class="line-full-1 -before-room-tour" data-aos="fade-up" data-aos-once="false"></div>
								<?php endif ?>
								<?php if ($has_visual): ?>
									<style type="text/css">
										.roomtour-tab {
											border-bottom: 1px solid var(--grey-grey-600, #BFC4C8);
											background: var(--white, #FFF);
											height: 72px;
											width: 100%;
											display: flex;
											align-items: center;
											margin-bottom: 24px;
										}

										.roomtour-tab .-item {
											position: relative;
											height: 100%;
											display: flex;
											justify-content: center;
											align-items: center;
											padding: 0 24px;
											box-shadow: 0px 0px 0px #2973A5 inset;
											color: #323A41;
											font-size: 26px;
											font-style: normal;
											font-weight: 400;
											line-height: 32px;
											transition: all .3s;
											cursor: pointer;
										}

										.roomtour-tab .-item[data-active="1"] {
											box-shadow: 0px -4px 0px #2973A5 inset;
											color: #2973A5;
										}

										.roomtour-tab .-item:after {
											content: " ";
											width: 1px;
											height: 8px;
											position: absolute;
											top: calc(50% - 4px);
											right: 0;
											background: #CFD4D9;
										}

										.roomtour-tab .-item:last-child:after {
											display: none;
										}

										.room-gallery {
											display: grid;
											grid-template-columns: 2.08fr 1fr;
											grid-auto-rows: 1fr;
											grid-template-areas:
											"a b"
											"a c";
											grid-gap: 8px;

										}

										.room-gallery>div {
											display: flex;
											background-color: #0008;
										}

										.room-gallery .-a {
											grid-area: a
										}

										.room-gallery .-b {
											grid-area: b
										}

										.room-gallery .-c {
											grid-area: c;
										}

										.room-gallery .-inner {
											width: 100%;
											height: 100%;
											background-image: var(--img);
											background-size: cover;
											background-position: center;
											cursor: pointer;
										}

										.room-gallery .-a .-inner {
											padding-top: 56.96%;
										}

										.room-gallery .--overlay {
											width: 100%;
											height: 100%;
											background-color: #1414149c;
											color: var(--white, #FFF);
											font-size: 56px;
											font-style: normal;
											font-weight: 400;
											line-height: 56px;
											justify-content: center;
											align-items: center;
											display: flex;
										}

										.room-tab-body.-gll-s-2 .room-gallery {
											grid-template-columns: 1fr 1fr;
											grid-template-areas: "a b";
										}

										.room-tab-body.-gll-s-1 .room-gallery {
											grid-template-columns: 1fr;
											grid-template-areas: "a";
											grid-gap: 0px;
										}

										.room-tab-body[data-active="-1"] {
											display: none;
										}

										.tour_iframe_inner {
											width: 100%;
											padding-top: 56.25%;
											position: relative;
										}

										.tour_iframe_inner iframe {
											width: 100% !important;
											position: absolute;
											top: 0;
											left: 0;
											right: 0;
											bottom: 0;
											height: 100% !important;
											min-height: 100% !important;
											max-height: 100% !important;
										}
									</style>
									<div class="-nav-room"></div>
									<div class="-nav-room-wrap" data-aos="fade-up" data-aos-once="false">
										
									</div>
									<div class="room-padding" data-aos="fade-up" data-aos-once="false"></div>
									<h2 class="cpj-subtitle mb-5" data-aos="fade-up" data-aos-once="false"><?php pll_e('บรรยากาศภายในห้อง') ?></h2>


									<div class="roomtour-wrap" data-aos="fade-up" data-aos-once="false">
										<div class="roomtour-tab">
											<?php if ($gallerySize>0): ?>
												<div class="-item" onclick="changeTabGal(this)" data-active="1" data-tab-id="0"><?php pll_e('แกเลอรี') ?></div>
											<?php endif ?>
											<?php if ($has_tour) : ?>
												<div class="-item" onclick="changeTabGal(this)" data-active="-1" data-tab-id="1"><?php pll_e('Virtual tour 360') ?></div>
											<?php endif ?>
										</div>
										<?php if ($gallerySize>0): ?>
											<?php if ($gallerySize == 1): ?>
												<div class="room-tab-body -gll-s-1" data-tab-id="0" data-active="1">
													<div class="room-gallery">
														<div class="-a">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[0]['sizes']['1536x1536'] ?>)"></div>
														</div>
													</div>
												</div>
											<?php endif ?>
											<?php if ($gallerySize == 2): ?>
												<div class="room-tab-body -gll-s-2" data-tab-id="0" data-active="1">
													<div class="room-gallery">
														<div class="-a">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[0]['sizes']['1536x1536'] ?>)"></div>
														</div>
														<div class="-b">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[1]['sizes']['1536x1536'] ?>)"></div>
														</div>
													</div>
												</div>
											<?php endif ?>
											<?php if ($gallerySize == 3): ?>
												<div class="room-tab-body -gll-s-3" data-tab-id="0" data-active="1">
													<div class="room-gallery">
														<div class="-a">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[0]['sizes']['1536x1536'] ?>)"></div>
														</div>
														<div class="-b">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[1]['sizes']['1536x1536'] ?>)"></div>
														</div>
														<div class="-c">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[2]['sizes']['1536x1536'] ?>)"></div>
														</div>
													</div>
												</div>
											<?php endif ?>

											<?php if ($gallerySize>3): ?>
												<div class="room-tab-body -gll-s-m" data-tab-id="0" data-active="1">
													<div class="room-gallery">
														<div class="-a">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[0]['sizes']['1536x1536'] ?>)"></div>
														</div>
														<div class="-b">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[1]['sizes']['1536x1536'] ?>)"></div>
														</div>
														<div class="-c">
															<div data-jb-lightbox="d" class="-inner jb-lightbox" style="--img:url(<?= $gallery[2]['sizes']['1536x1536'] ?>)">
																<div class="--overlay">+<?= $gallerySize - 3 ?></div>
															</div>
														</div>
													</div>
												</div>
											<?php endif ?>
										<?php endif ?>
										<?php if ($has_tour) : ?>
											<div class="room-tab-body" data-tab-id="1" data-active="-1">
												<div class="tour_iframe_inner">
													<iframe src="<?= $tour_url ?>"></iframe>
												</div>
											</div>
										<?php endif ?>
										<?php
										for ($gc = 3; $gc < $gallerySize; $gc++) {
											?>
											<span data-jb-lightbox="d" class="jb-lightbox" style="--img:url(<?= $gallery[$gc]['sizes']['1536x1536'] ?>)"></span>
											<?php
										}
										?>
									</div>
									<div class="py-4"></div>
								<?php endif ?>
							</div>
						</div>
						<div class="grid-cell-ticket" data-aos="fade-up" data-aos-once="false">
							<div class="ticket">
								<h5 class="pvr-title"><?php pll_e('สิทธิประโยชน์') ?></h5>
								<?php foreach ($unit_f['privilege'] as $k => $v) : ?>
									<div class="-pvr">
										<div class="--m">
											<div class="-title"><?= $v['title'] ?></div>
											<div class="-text"><?= $v['text'] ?></div>
										</div>
										<div class="--m">
											<div class="-remark">
												<?= $v['remark'] ?>
											</div>
										</div>
									</div>
								<?php endforeach ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="2" viewBox="0 0 290 2" fill="none">
									<path d="M0 1H290" stroke="#DFE3E8" stroke-width="2" stroke-dasharray="3 3" />
								</svg>
								<div class="overall-price mt-5">
									<div class="-price-line-1">
										<div class="-title">
											<?php pll_e('ราคา') ?>
										</div>
										<div class="-text">
											<?php if ($unit_f['full_price'] > 0): ?>
												<span class="-old-price"><span>฿<?= setComma($unit_f['full_price']) ?></span></span>
											<?php endif ?>
											
											<span>
												฿<?= setComma($unit_f['sell_price']) ?><span class="price-remark">*</span>
											</span>
										</div>
									</div>
									<div class="-price-line-2">
										<div class="-title">
											<?php pll_e('ราคาจอง') ?>
										</div>
										<div class="-text">
											<span>฿<?= setComma($unit_f['book_price']) ?></span>
										</div>
									</div>
								</div>
								<a class="-pmr-btn mt-5" href="<?=$book_url?>">
									<?php pll_e('จองเลย') ?>
								</a>
							</div>
						</div>
					</div>
					<div></div>
				</div>
			</section>
			<script type="text/javascript">
				function changeTabGal(el) {
					let all = $$('.roomtour-tab .-item')
					let bodytab = $$('.room-tab-body')
					let id = parseInt(el.dataset.tabId)
					xconsolex.log(id)

					for (let i = 0; i < all.length; i++) {
						all[i].dataset.active = -1
						bodytab[i].dataset.active = -1
					}
					el.dataset.active = 1
					bodytab[id].dataset.active = 1
				}
			</script>
		</div>

		<style type="text/css">
			#nearby-unit {
				padding: 60px 0;
			}

			#nearby-unit header {
				display: flex;
				justify-content: space-between;
				align-items: flex-end;
			}

			a.seemore {
				color: var(--blue-blue-300-main, #123F6D) !important;
				font-size: 24px;
				font-style: normal;
				font-weight: 500;
				line-height: 32px;
				display: grid;
				grid-template-columns: auto 24px;
				grid-gap: 8px;
				align-items: center;
			}

			/* @media (max-width: 768px) {
				.pj-unit-wrap {
					display: flex !important;
					overflow-x: auto !important;
					width: 100% !important;
				}

				.pj-unit-wrap .-units {
					display: flex;
					grid-template-columns: none;
				}
			} */
		</style>

		<?php if (ofsize($unit_f['related'])>0): ?>
			<!-- <div class="cont">
				<div style="width:100%;height: 1px;background-color: #DFE3E8;"></div>
			</div> -->
			<section id="nearby-unit" data-aos="fade-up" data-aos-once="false">
				<div class="cont">
					<div class="nearby-unit-inner">
						<header class=" mb-5">
							<h2 class="cpj-subtitle"><?php pll_e('ยูนิตอื่นใกล้เคียง') ?></h2>
							<a href="<?= get_permalink($cpj->ID) ?>" class="seemore">
								<span><span data-lang="th"><?php pll_e('ดูทั้งหมด') ?></span></span>

								<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="12" cy="12" r="11.3143" stroke="#123F6D" stroke-width="1.37143" />
									<path d="M13.7229 16.4551L17.5354 12.3408L13.7229 8.22656" stroke="#123F6D" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M6.85498 12.3418L17.1407 12.3418" stroke="#123F6D" stroke-width="1.71429" stroke-linecap="round" stroke-linejoin="round" />
								</svg>

							</a>
						</header>
						<div class="pj-unit-wrap">
							<?php get_template_part('template-parts/hot-deal', 'units', [0, $unit_f['related']], 'nocont'); ?>
						</div>
					</div>
				</div>
			</section>
		<?php endif ?>
	</div>
</main>
<?php get_template_part('template-parts/hot-deal', 'contact', $pj) ?>
<?php get_template_part('template-parts/hot-deal', 'responsive') ?>