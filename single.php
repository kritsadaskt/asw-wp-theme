<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header();
global $pagewidth;
$pagewidth = get_field('pagewidth');
if ($pagewidth === null) {
	$pagewidth = 's-container';
}
?>
<?php
$singleclass = '';
if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
	$singleclass = 'single-area';
}
?>
<style type="text/css">
	.s-container {
		max-width: 1320px !important;
		/*		padding: 0 1rem !important;*/
	}

	#related-project h5 a {
		color: var(--ci-blue-300);
	}

	#related-project h5:hover a {
		color: var(--ci-blue-300) !important;
	}

	.single-area>.content-area {
		max-width: 1024px;
	}
</style>

<style type="text/css">
	#related-project h5 a {
		color: var(--ci-blue-300);
		--cont-w:1312px;
	}

	#related-project h5:hover a {
		color: var(--ci-blue-300) !important;
	}
	.single-cards-wrap[data-end="1"] {
		--card-shift-end:calc(var(--card-width) * var(--card-shift-blank) + 12px);
	}
	.single-cards-wrap {
		--cont-m:calc(100% - var(--cont-w));    
		--i: 0;
		--cards:4;
		--cards-slide:4;
		--card-width:calc(
			((100% - (12px * (var(--cards) - 1))) / var(--cards))
		);
		--card-shift-blank:0;
		--card-shift-end:0px;
		--max:8;
		transition: all .5s ease-in-out;
		will-change: transform;
		display: grid;
		grid-column-gap: 12px;
		position: relative;
		grid-gap: 12px;
		grid-template-columns: repeat(
			var(--max),
			var(--card-width)
		);
		transform: translateX(
			calc(
				var(--cards-slide) * var(--card-width) * var(--i) * -1 + 
				(
					(var(--cards-slide)) * -12px * var(--i)
				) 
				+ var(--card-shift-end)
			));
	}
	@media (min-width: 1441px) {
		.single-cards-wrap {
			--cards:4.1;
		}
	}
	@media (max-width: 1024px) {
		.single-cards-wrap {
			--cards:3.2;
			--cards-slide:1;
		}
	}
	@media (max-width: 768px) {
		.single-cards-wrap {
			--cards:2.2;
			--cards-slide:1;
		}
	}
	@media (max-width: 460px) {
		.single-cards-wrap {
			--cards:1.2;
			--cards-slide:1;
		}
	}

	.single-project-nav {
		display: flex;
		justify-content: center;
	}

	.single-project-nav .-nav {
		width: 32px;
		height: 32px;
		display: flex;
		align-items: center;
		margin: 0 3px;
		cursor: pointer;
	}

	.single-project-nav .-nav div {
		width: 100%;
		height: 1px;
		background-color: #828A92;
		transition: all .3s;
	}

	.single-project-nav .-nav.-active div {
		height: 4px;
		background-color: #3A638E
	}

	#home-pro-arrow-1 {
		top: 51%;
		left: -15px;
		width: 48px;
		transition: .5s;
		opacity: 0;
		z-index: -1;
	}

	#home-pro-arrow-2 {
		top: 51%;
		right: -15px;
		width: 48px;
		transition: .5s;
		opacity: 1;
	}

	#home-pro-arrow-1:hover,
	#home-pro-arrow-2:hover {
		opacity: 1;
	}

	.-nav.hid {
		display: none !important;
	}

	.single-project-card {
		box-shadow: 0px 4px 12px rgb(0 0 0 / 15%);
	}

	.single-project-card:hover {}

	.single-project-card .blank {
		transition: all .8s;
		background-size: 105% auto !important;
		background-position: center;
		background-repeat: no-repeat;
	}

	.single-project-card:hover .blank {
		/* transform: scale(1.1); */
		background-size: 115% auto !important;
	}

	@media (max-width: 1024px) {
		.-nav.hid {
			display: flex !important;
		}

		.sec-project {
			padding-top: 0 !important;
			padding-bottom: 0 !important;
		}


		.single-project-nav .-nav.-active div {
			background-color: #11B6B1;
		}

		#home-pro-arrow-1,
		#home-pro-arrow-2 {
			display: none;
		}
	}
	/*-- Mobile Version --*/
	@media (max-width: 1024px) {
		.relative-wrap{
			padding: 0 2rem;
		}
	}
	@media (max-width: 767px) {
		.relative-wrap{
			padding: 0 1rem;
		}
	}
	#related-project:is([data-relatecount="0"],[data-relatecount="1"],[data-relatecount="2"],[data-relatecount="3"],[data-relatecount="4"]) .related-project-arrow{
		display: none;
	}
</style>
<div style="background: linear-gradient(360deg, #EDF2F7 0%, #FFFFFF 103.44%);">
	<?php while (have_posts()) : the_post(); ?>
		<!-- <?php seed_banner_title(get_the_ID()); ?> -->
		<?php $g = get_post();

		if ($g->post_type == 'post') {
			?>
			<div class="s-container pt-3 xl:pt-4 truncate px-4 xl:mx-auto flex flex-row items-center -bc">
				<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
				<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
				<a href="/<?=pll_current_language()?>/blog" class="cl-ci-blue-400"><?php pll_e('บล็อก')?></a>
				<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
				<a href="#!" class=""><?php the_title() ?></a>
			</div>
			<?php
		} else if ($g->post_type == 'news') { ?>

			<div class="s-container pt-3 xl:pt-4 truncate px-4 xl:mx-auto flex flex-row items-center">
				<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
				<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
				<a href="/<?=pll_current_language()?>/news" class="cl-ci-blue-400"><?php pll_e('ข่าวสาร')?></a>
				<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
				<a href="#!" class=""><?php the_title() ?></a>
			</div>

		<?php }
		?>

		<div class="main-body lg:grid grid-cols-12 gap-3 <?php echo ($singleclass); ?> <?php echo '-' . $GLOBALS['s_blog_layout_single']; ?>">
			<div class="col-span-2"></div>
			<div id="primary" class="content-area col-span-8">
				<main id="main" class="site-main -hide-title">

					<?php get_template_part('template-parts/content-single', get_post_type()); ?>

					<?php if (comments_open() || get_comments_number()) {
						comments_template();
					} ?>

					<?php wp_reset_postdata(); ?>

				</main>
			</div>

			<?php
			switch ($GLOBALS['s_blog_layout_single']) {
				case 'rightbar':
				get_sidebar('right');
				break;
				case 'leftbar':
				get_sidebar('left');
				break;
				case 'full-width':
				break;
				default:
				break;
			}
			?>
		</div>
	<?php endwhile; ?>
	<?php
	$v = get_field('content');
	if ($v != '') {
		foreach ($v as $key => $type) {
			if ($type['acf_fc_layout'] == 'related_project') {
				$content = $type;
				$relate_count = 0;
				if (is_array($content['related_project'])) {
					$relate_count = count($content['related_project']);
				}
				?>
				<section id="related-project" class="py-6 lg:py-16" data-relatecount="<?=$relate_count?>">
					<div>
						<div class="absolute w-full top-1/2 related-project-arrow">
							<div class=" cont-pd">
								<img id="home-pro-arrow-1" src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="absolute pointer  " onclick="singleProjectArrow(-1)" style="opacity: 0; z-index: -1;">
								<img id="home-pro-arrow-2" src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="absolute pointer  " onclick="singleProjectArrow(1)" style="z-index: 9; top: 51%; opacity: 1;">
							</div>
						</div>
						<div class="container mx-auto">
							<div class="t-center relative-wrap">
								<div class="grid grid-cols-12">
									<div class="text-left col-span-9">
										<h1 class=""><?php pll_e('โครงการในพื้นที่ใกล้เคียงจากแอสเซทไวส์')?></h1>
										<!-- <h1 class="block lg:hidden">โครงการที่แนะนำ</h1> -->
									</div>
									<h5 class="col-span-3 text-right">
										<a href="/project-search/" class="see-more"><?php pll_e('ดูทั้งหมด')?><img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="m-0 pl-2 inline-block" style="width: auto; height: 35px;">
										</a>
									</h5>

								</div>
								<sp class="h-4"></sp>
								<div class="single-cards-wrap-block relative">
									<div class="single-cards-wrap py-4" data-end="0">
										<?php
										foreach ($content['related_project'] as $key => $project) {
											$field = get_fields($project->ID);
											$cate_name = wp_get_object_terms( $project->ID, 'project-type');
											foreach ($cate_name as $pjt_k => $pjt_v) {
												if ($pjt_v->parent == 0) {
													$cate_parent = $pjt_v;
												}else{
													$cate_brand = $pjt_v;
												}
											}
											$stat_name = wp_get_object_terms($project->ID, 'project_status');
											$loca_name = wp_get_object_terms($project->ID, 'project_location');

											foreach ($loca_name as $pjt_k => $pjt_v) {
												if ($pjt_v->parent == 0) {
													$loca_parent = $pjt_v;
												}else{
													$loca_child = $pjt_v;
												}
											}

											$cate_icon = get_field('icon','project-type' . '_' . $cate_parent->term_id);
											$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
											$stat_label = get_field('label', 'project_status' . '_' . $stat_name[0]->term_id);

											$link = get_the_guid($project->ID);
											?>
											<div class="single-project-card home-project-card -for-search" data-compare-id="<?=$project->ID?>" data-compare-selected="0">
												<a href="<?= $link ?>" class="" target="_blank">
													<div class="py-4" style="padding-right: 12px;">
														<div class="grid grid-cols-2">
															<div class="col-span-1 pl-4 flex items-center" style="color: <?= $stat_color ?>;border-left: 3px solid <?= $stat_color ?>;">
																<span class="" style="font-weight: 700;font-size: 18px;line-height: 20px;"><?= $stat_name[0]->name ?></span>
															</div>
															<div class="col-start-2 col-span-1">
																<img src="<?= $field['logo']['url'] ?>" style="width: auto;height:50px;margin-right: 10px;">
															</div>
														</div>
													</div>
													<div class="bg-cover blank home-project-image" ratio="2:3" style="background-image:linear-gradient(0deg, #000c,#0008,#0001, transparent,transparent,transparent),url('<?php echo get_the_post_thumbnail_url($project->ID, '2048x2048') ?>');">
														<div class="bottom-left">
															<div class="flex flex-row items-center" style="line-height: 28px;">
																<?php if ($cate_parent->slug == 'condominium') { ?>
																	<img src="/wp-content/uploads/2022/09/Vector.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?php pll_e('คอนโดมิเนียม')?>
																<?php } else if ($cate_parent->slug == 'house') { ?>
																	<img src="/wp-content/uploads/2022/10/Icon-in-input.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?php pll_e('บ้านและทาวน์โฮม')?>
																<?php } ?>
															</div>
															<div class="flex flex-row items-center" style="line-height: 28px;margin-top: 6px;">
																<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?= $loca_child->name ?>
															</div>
														</div>
														<div class="bottom-right cl-white" style="text-align: right;font-weight: 400;font-size: 17px;line-height: 20px;">
															<?php pll_e('เริ่มต้น')?>
															<div style="font-size: 32px;"><?= $field['price'] ?></div>
															<?php pll_e('ล้านบาท')?>
														</div>
													</div>
												</a>
												<div class="-pj-cp" onclick="cp_add_project(`<?=$project->ID?>`,`<?=$project->post_name?>`,`<?=$project->post_title?>`)">
													<div class="-s0">
														<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 7.10838C0.980973 6.86431 0.980973 6.46858 1.22505 6.2245L5.20253 2.24702C5.4466 2.00295 5.84233 2.00295 6.08641 2.24702C6.33049 2.4911 6.33049 2.88683 6.08641 3.13091L3.17588 6.04144H18.3337C18.6788 6.04144 18.9587 6.32126 18.9587 6.66644C18.9587 7.01162 18.6788 7.29144 18.3337 7.29144H3.17588L6.08641 10.202C6.33049 10.4461 6.33049 10.8418 6.08641 11.0859C5.84233 11.3299 5.4466 11.3299 5.20253 11.0859L1.22505 7.10838Z" fill="white"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 15.0254C19.019 14.7813 19.019 14.3856 18.7749 14.1415L14.7975 10.164C14.5534 9.91994 14.1577 9.91994 13.9136 10.164C13.6695 10.4081 13.6695 10.8038 13.9136 11.0479L16.8241 13.9584H1.66634C1.32116 13.9584 1.04134 14.2383 1.04134 14.5834C1.04134 14.9286 1.32116 15.2084 1.66634 15.2084H16.8241L13.9136 18.119C13.6695 18.363 13.6695 18.7588 13.9136 19.0029C14.1577 19.2469 14.5534 19.2469 14.7975 19.0029L18.7749 15.0254Z" fill="white"/>
														</svg>
													</div>
													<div class="-s1">

														<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 11.1084C0.980973 10.8643 0.980973 10.4686 1.22505 10.2245L5.20253 6.24702C5.4466 6.00295 5.84233 6.00295 6.08641 6.24702C6.33049 6.4911 6.33049 6.88683 6.08641 7.13091L3.17588 10.0414H18.3337C18.6788 10.0414 18.9587 10.3213 18.9587 10.6664C18.9587 11.0116 18.6788 11.2914 18.3337 11.2914H3.17588L6.08641 14.202C6.33049 14.4461 6.33049 14.8418 6.08641 15.0859C5.84233 15.3299 5.4466 15.3299 5.20253 15.0859L1.22505 11.1084Z" fill="white"/>
															<path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 19.0254C19.019 18.7813 19.019 18.3856 18.7749 18.1415L14.7975 14.164C14.5534 13.9199 14.1577 13.9199 13.9136 14.164C13.6695 14.4081 13.6695 14.8038 13.9136 15.0479L16.8241 17.9584H1.66634C1.32116 17.9584 1.04134 18.2383 1.04134 18.5834C1.04134 18.9286 1.32116 19.2084 1.66634 19.2084H16.8241L13.9136 22.119C13.6695 22.363 13.6695 22.7588 13.9136 23.0029C14.1577 23.2469 14.5534 23.2469 14.7975 23.0029L18.7749 19.0254Z" fill="white"/>
															<ellipse cx="18.3337" cy="7.33317" rx="6.66667" ry="6.66667" fill="#1D9F9B"/>
															<path d="M15.833 7.33317L17.4997 8.99984L20.833 5.6665" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>

													</div>
												</div>
											</div>
											<?php
										}
										?>
									</div>
								</div>
								<sp class="l"></sp>
								<div class="single-project-nav">
									<?php
									for ($i = 0; $i <= $key; $i++) {
										if ($i == 0) { ?>
											<div class="-nav -active" onclick="singleProjectNav(0,this)">
												<div></div>
											</div>
										<?php } elseif ($i == 1) { ?>
											<div class="-nav <?php if ($key <= 3) {
												echo 'hid';
											} ?>" onclick="singleProjectNav(1,this)">
											<div></div>
										</div>
									<?php } else { ?>
										<div class="-nav hid" onclick="singleProjectNav(<?= $i ?>,this)">
											<div></div>
										</div>
									<?php }
								}
								?>
							</div>
							<sp class="l"></sp>
							<script type="text/javascript">
								function singleProjectNav(num, el) {
									document.querySelector('.single-cards-wrap').style.setProperty("--i", num);
									for (let i of document.querySelectorAll('.single-project-nav .-nav')) {
										i.classList.remove('-active')
									}
									el.classList.add('-active')
									singleProjectArrow(0)
								}

								function singleProjectArrow(num) {
									let rs = getComputedStyle(document.querySelector('.single-cards-wrap'))
									var prop = parseFloat(rs.getPropertyValue('--i'))
									let totnav = 1;
									let sed = 0,
									chk = 0,
									chk1 = 0
									if (prop + num < 0) {
										sed = totnav
									} else if (prop + num > totnav) {
										sed = 0
									} else {
										sed = prop + num
									}
									for (let i of document.querySelectorAll('.single-project-nav .-nav')) {
										if (i.classList.contains("-active")) {
											chk = chk1
										}
										chk1++
									}
									chk += num
									if (chk < 0) {
										chk = 1
									};
									if (chk > 1) {
										chk = 0
									};

									chk1 = 0
									for (let i of document.querySelectorAll('.single-project-nav .-nav')) {
										if (chk == chk1) {
											chk = i
										}
										chk1++
									}
									if (num != 0) {
										singleProjectNav(sed, chk)
									}
									if (sed == 1) {
										document.getElementById("home-pro-arrow-1").style.opacity = "1"
										document.getElementById("home-pro-arrow-1").style.zIndex = "1"
										document.getElementById("home-pro-arrow-2").style.opacity = "0"
										document.getElementById("home-pro-arrow-2").style.zIndex = "-1"
									} else {
										document.getElementById("home-pro-arrow-2").style.opacity = "1"
										document.getElementById("home-pro-arrow-2").style.zIndex = "1"
										document.getElementById("home-pro-arrow-1").style.opacity = "0"
										document.getElementById("home-pro-arrow-1").style.zIndex = "-1"
									}
								}

								reproFunction()
								window.addEventListener("resize", reproFunction);
								var chkscreen = 0

								function reproFunction() {
									if (window.innerWidth <= 768) {
										if (window.innerWidth > 600) {
											document.querySelector('.single-cards-wrap').style.setProperty("--pernum", 60);
											document.querySelector('.single-cards-wrap').style.setProperty("--chk", 0.6);
										} else {
											document.querySelector('.single-cards-wrap').style.setProperty("--pernum", 70);
											document.querySelector('.single-cards-wrap').style.setProperty("--chk", 0.7);
										}
										chkscreen = 1
									} else {
										document.querySelector('.single-cards-wrap').style.setProperty("--pernum", 25);
										if (chkscreen == 1) {
											chkscreen = 0
											let chk = document.querySelectorAll('.single-project-nav .-nav')[0]
											singleProjectNav(0, chk)

											xconsolex.log(chk)
										}
									}
								}
							</script>
						</div>
					</div>
				</div>
			</section>
			<?php
		} elseif ($type['acf_fc_layout'] == 'gallery') {
			?>
			<!--=== The Section Boxes : gallery ===-->
			<section id="gallery" class="py-6 lg:py-12">
				<div class="">
					<h1 class="s-container px-4"><?php pll_e('แกลเลอรี')?></h1>
					<sp class="h-6 lg:h-12"></sp>
					<?php
					$gallery = $type;
					$chk = sizeof($gallery['gallery']);
					if ($chk == 1) { ?>
						<div class="grid grid-cols-2 md:grid-rows-2 md:grid-cols-4 gap-2 lg:gap-6 s-container px-0 lg:px-4">
							<div class="md:row-start-1 md:col-start-2 md:row-span-2 col-span-2 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)"></div>
						</div>
					<?php } else if ($chk == 2) { ?>
						<div class="grid grid-rows-2 grid-cols-4 gap-2 lg:gap-6 s-container px-0 lg:px-4">
							<div class="row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)"></div>
							<div class="row-start-1 col-start-3 row-span-2 col-span-2 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)"></div>
						</div>
					<?php } else if ($chk == 3) { ?>
						<div class="grid grid-rows-2 grid-cols-3 gap-2 lg:gap-6 s-container px-0 lg:px-4">
							<div class="row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)"></div>
							<div class="row-start-1 col-start-3 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)"></div>
							<div class="row-start-2 col-start-3 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)"></div>
						</div>
					<?php } else if ($chk == 4) { ?>
						<div class="grid grid-rows-2 grid-cols-2 gap-2 lg:gap-6 s-container px-0 lg:px-4">
							<div class="row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)"></div>
							<div class="row-start-1 col-start-2 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)"></div>
							<div class="row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)"></div>
							<div class="row-start-2 col-start-2 row-span-1 col-span-1 bg-cover blank jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['3']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(3)"></div>
						</div>
					<?php } else if ($chk > 5 or $chk == 5) { ?>
						<!-- desktop -->
						<div class="hidden lg:grid grid-rows-2 grid-cols-4 gap-3 lg:gap-6 s-container px-0 lg:px-4">
							<div class="row-start-1 row-span-1 col-span-1 bg-cover blank h-full jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['1']['url'] ?>);cursor: pointer;"></div>
							<div class="row-start-2 row-span-1 col-span-1 bg-cover blank h-full jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['2']['url'] ?>);cursor: pointer;"></div>
							<div class="row-start-1 col-start-2 row-span-2 col-span-2 bg-cover blank h-full jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;"></div>
							<div class="row-start-1 row-span-1 col-span-1 bg-cover blank h-full jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['3']['url'] ?>);cursor: pointer;"></div>
							<div class="row-start-2 row-span-1 col-span-1 bg-cover blank h-full jb-lightbox" data-jb-lightbox="d" ratio="16:9" style="--img:url(<?= $gallery['gallery']['4']['url'] ?>);cursor: pointer;">
								<?php if ($chk > 5) { ?>
									<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80"></div>
									<div class="centered">
										<h3 class="">+ <?= $chk - 5 ?></h3>
									</div>
								<?php } ?>
							</div>
						</div>
						<?php
						if ($chk > 5) {
							for ($i = 5; $i < $chk; $i++) {
								?>
								<span class="jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($gallery['gallery'][$i]) ?>)"></span>
								<?php
							}
						}
						?>


						<!-- Mobile && Tablet -->
						<div class="lg:hidden grid grid-rows-6 grid-cols-12 gap-2 s-container px-0 lg:px-4">
							<div class="row-start-1 row-span-4 col-span-8 bg-cover blank h-full jb-lightbox" data-jb-lightbox="m" ratio="16:9" style="--img:url(<?= $gallery['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)"></div>
							<div class="col-start-9 row-span-2 col-span-4 bg-cover blank h-full jb-lightbox" data-jb-lightbox="m" ratio="16:9" style="--img:url(<?= $gallery['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)"></div>
							<div class="col-start-9 row-span-2 col-span-4 bg-cover blank h-full jb-lightbox" data-jb-lightbox="m" ratio="16:9" style="--img:url(<?= $gallery['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)"></div>
							<div class="row-start-5 col-start-1 row-span-3 col-span-6 bg-cover blank h-full jb-lightbox" data-jb-lightbox="m" ratio="16:9" style="--img:url(<?= $gallery['gallery']['3']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(3)"></div>
							<div class="col-start-7 row-span-3 col-span-6 bg-cover blank h-full jb-lightbox" data-jb-lightbox="m" ratio="16:9" style="--img:url(<?= $gallery['gallery']['4']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(4)">
								<?php if ($chk > 5) { ?>
									<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80"></div>
									<div class="centered">
										<h3 class="">+ <?= $chk - 5 ?></h3>
									</div>
								<?php } ?>
							</div>
						</div>
						<?php
						if ($chk > 5) {
							for ($i = 5; $i < $chk; $i++) {
								?>
								<span class="jb-lightbox" data-jb-lightbox="m" style="--img: url(<?= acf_img($gallery['gallery'][$i]) ?>)"></span>
								<?php
							}
						}
						?>
					<?php }
					?>
				</div>
			</section>
		</div>
		<?php
	} elseif ($type['acf_fc_layout'] == 'related_post') {
		$p_cate = wp_get_post_categories($post->ID, ['fields' => 'all']);
				// pre($p_cate);
		if ($p_cate[0]->slug == "") { ?>
			<!--=== The Section Boxes : related news ===-->
			<section id="related-news" class="py-10 lg:py-12">
				<div class="s-container px-4">
					<div class="grid grid-cols-2">
						<div class="col-span-1">
							<h1 class=""><?php pll_e('ข่าวสารอื่นๆ')?></h1>
						</div>
						<h5 class="col-span-1 text-right">
							<a href="/news-archive" class="cl-ci-blue-300see-more"><?php pll_e('ดูทั้งหมด')?><img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="m-0 pl-2 inline-block" style="width: auto; height: 24px;">
							</a>
						</h5>
					</div>
					<sp class="h-6 lg:h-12"></sp>
					<style type="text/css">
						.news-nav {
							display: none;
							justify-content: center;
						}

						.news-nav .-nav {
							width: 32px;
							height: 32px;
							display: flex;
							align-items: center;
							margin: 0 3px;
							cursor: pointer;
						}

						.news-nav .-nav div {
							width: 100%;
							height: 1px;
							background-color: #828A92;
							transition: all .3s;
						}

						.news-nav .-nav.-active div {
							height: 4px;
							background-color: #3A638E
						}

						#related-news .bg-ci-grey-900 .bg-cover {
							transition: all .8s;
							transform: scale(1);
						}

						#related-news .bg-ci-grey-900:hover .bg-cover {
							transition: all .8s;
							transform: scale(1.05);
						}

						#related-news .bg-ci-grey-900 sp.s {
							transition: all .8s;
						}

						#related-news .bg-ci-grey-900:hover sp.s {
							transition: all .8s;
							width: 100% !important;
						}

						@media (max-width: 640px) {
							.news-cards-wrap {
								--max: 3;
								--i: 0;
								display: grid;
								grid-template-columns: repeat(var(--max), calc(100%));
								grid-column-gap: 20px;
								position: relative;
								transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
								left: calc(var(--i) * -100% - (var(--i) * 19.5px));
								width: 100%;
							}

							.news-nav {
								display: flex;
							}
						}
					</style>
					<div class="grid news-cards-wrap sm:grid-cols-3 gap-8">
						<?php
						foreach ($type['related_post'] as $key => $value) { ?>
							<div onclick="location.href = '<?= $value->guid ?>'" class="grid grid-rows-12 bg-ci-grey-900 p-4" style="cursor: pointer;">
								<div class="<?php if ($key == 1) {
									echo 'flex flex-col-reverse';
								} ?>">
								<?php if ($key == 1) {
									echo '<sp class=""></sp>';
								} ?>
								<div class="overflow-hidden">
									<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'full') ?>')"></div>
								</div>
								<div class="row-span-5">
									<?php if ($key != 1) {
										echo '<sp class="l"></sp>';
									} ?>
									<span class="cl-orange">
										<?php
										$txt = $t[0]->slug;
										switch ($txt) {
											case 'club-news':
											$txt = "ข่าวสาร";
											break;
											case 'club-benefit':
											$txt = "สิทธิประโยชน์";
											break;
											case 'club-activity':
											$txt = "กิจกรรม";
											break;
											default:
											break;
										}
										echo $txt;
										?>
									</span>
									<sp class=""></sp>
									<span class="b7"><?= $value->post_title ?></span>
									<sp class=""></sp>
									<span id="txt_20" class="cl-ci-grey-300">
										<?= $value->post_excerpt ?>
									</span>
									<sp class=""></sp>
									<a href="<?= $value->guid ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
									<sp class=""></sp>
									<sp class="s <?php if ($key == 1) {
										echo 'bg-ci-veri-500';
									} else {
										echo 'bg-orange';
									} ?>" style="width: 15%"></sp>
									<sp class=""></sp>
								</div>
							</div>
							<div class="row-span-1 cl-ci-grey-300">
								<?=asw_date_format($value->post_date)?>
							</div>
						</div>
					<?php }
					?>
				</div>
				<div class="news-nav">
					<?php if ($key >= 0) {
						echo '<div class="-nav -active" onclick="newsNav(0,this)"><div></div></div>';
					} ?>
					<?php if ($key >= 1) {
						echo '<div class="-nav" onclick="newsNav(1,this)"><div></div></div>';
					} ?>
					<?php if ($key == 2) {
						echo '<div class="-nav" onclick="newsNav(2,this)"><div></div></div>';
					} ?>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			function newsNav(num, el) {
				document.querySelector('.news-cards-wrap').style.setProperty("--i", num);
				for (let i of document.querySelectorAll('.news-nav .-nav')) {
					i.classList.remove('-active')
				}
				el.classList.add('-active')
			}
		</script>
	<?php } else { ?>
		<style type="text/css">
		/*#related-post h1{
							font-size: 56px !important;
							}*/

							h5:hover a {
								color: white !important;
							}

							.sec-related-post {
								background-color: #123F6D;
								padding-top: 6.5rem !important;
								padding-bottom: 5.4rem !important;
							}

							.single-blog-card:hover .home-blog-inner::before {
								height: 100%;
							}

							.single-blog-wrap::before {
								position: absolute;
								top: 0;
								left: 0;
								width: 4px;
								height: 0%;
								opacity: 0;
								background: var(--ci-orange-500);
								content: '';
								transition: all 0.5s;
							}

							.single-blog-wrap:hover::before {
								opacity: 1;
								height: 100%;

							}

							.wordbreak-2line {
								display: -webkit-box;
								-webkit-line-clamp: 2;
								-webkit-box-orient: vertical;
								overflow: hidden;
							}

							@media (max-width: 992px) {
								.single-blog-inner {
									display: flex;
									align-items: center;
								}
							}

							@media (max-width: 768px) {
								#related-post h1 {
									font-size: 42px !important;
								}

								.sec-related-post {
									padding-top: 3rem !important;
									padding-bottom: 2.8rem !important;
								}
							}

							@media (max-width: 1023px) {
								#related-post .cont-pd {
									margin: 0;
									padding: 0;
								}
							}

							@media (max-width: 1439px) {
								.single-cards-wrap {
									grid-template-columns: repeat(var(--max), calc((var(--pernum) * 1%) - 10px));
									left: calc(var(--i) * var(--chk) * -101%);
								}

								.single-cards-wrap-block {
									overflow: hidden;
								}

							}

							@media (min-width: 1441px) {
								#related-project .cont-hide {
									overflow: hidden;
								}
							}

							.blog-shadow {
								height: 50%;
								background: linear-gradient(0deg, rgba(0, 0, 0, 1) 10%, rgba(0, 0, 0, .75) 50%, rgba(255, 255, 255, 0) 100%);
								mix-blend-mode: hard-light;
							}

							.box-blog-1 .bottom-left {
								padding: 32px 24px !important;
							}
						</style>
						<!--=== The Section Boxes : related post ===-->
						<section id="related-post" class="sec-related-post padding-l-vtc bg-ci-blue-300 cl-white">
							<img src="/wp-content/uploads/2022/10/Vector-2.png" class="absolute pointer-events-none" style="top: 0; left: 0;opacity: 0.1;">
							<img src="/wp-content/uploads/2022/10/Vector-3.png" class="absolute pointer-events-none" style="top: 0; left: 0;opacity: 0.1;">
							<img src="/wp-content/uploads/2022/10/เงากิ่งไม้-2.png" class="absolute pointer-events-none leaf08">
							<div class="cont-pd">
								<div class="grid grid-cols-3 px-4 lg:px-0">
									<div class="col-span-2">
										<?php
										$txt = "";
										switch ($p_cate[0]->slug) {
											case "art":
											$txt = "ART & DECORATOR";
											break;
											case "growgreen":
											$txt = "GROWGREEN";
											break;
											case "lifestyle":
											$txt = "LIFESTYLE SEEKER";
											break;
											case "money":
											$txt = "MONEY MAKER";
											break;
											case "storyteller":
											$txt = "STORYTELLER";
											break;
											case "teach":
											$txt = "TECH LOVER";
											break;
										}
										?>
										<h1 class="hidden lg:block" style="">
											<?php pll_e('บทความอื่น ๆ ใน')?> <?= $txt ?>
										</h1>
										<h1 class="block lg:hidden" style="">
											บล็อก
										</h1>
									</div>
									<h5 class="col-span-1 text-right">
										<a href="/<?= $p_cate[0]->slug; ?>" class="see-more"><?php pll_e('ดูทั้งหมด')?><img src="/wp-content/uploads/2022/09/arrow-r.png" class="m-0 pl-2 inline-block" style="width: auto; height: 35px;">
										</a>
									</h5>

								</div>
								<sp class="h-10 lg:h-12"></sp>
								<div class="grid grid-flow-row lg:grid-rows-1 lg:grid-cols-4 gap-8">
									<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => $p_cate[0]->slug,
										'post_status' => 'publish',
										'posts_per_page' => 3,
										'orderby' => 'date',
										'order'    => 'DESC',
									);

									$loop = new WP_Query($args);
									$chk = 0;
									while ($loop->have_posts()) : $loop->the_post();
										if ($chk == 0) { ?>
											<div class="single-blog-card row-start-1 row-span-2 lg:row-span-1 lg:col-start-2 lg:col-span-2 pointer bg-cover blank box-blog box-blog-1" ratio="1:1" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb'); ?>');" onclick="location.href='/<?= get_permalink() ?>'">
												<div class="blog-shadow"></div>
												<div class="bottom-left padding-s" style="z-index: 1;">
													<span class="btn round bg-white cl-ci-orange-500 size-s mb-2" onclick="location.href='/<?= $p_cate[0]->slug; ?>'" style="line-height: 20px;font-size: 18px;">
														<?php
														echo $p_cate[0]->name;
														?>
													</span>
													<br>
													<span class="f30-28" style="font-weight: 500;"><?php the_title() ?></span>
													<span class="cl-ci-grey-700 hidden sm:block wordbreak-2line" style="padding-top: 10px;"><?php the_excerpt() ?></span>
												</div>
											</div>
										<?php } elseif ($chk == 1) { ?>
											<div class="single-blog-wrap relative h-fit row-start-3 row-span-1 lg:col-start-1 lg:row-start-1 lg:col-span-1 pointer box-blog box-blog-2 mx-4 lg:mx-0" onclick="location.href='/<?= get_permalink() ?>'" style="z-index: 3;">
												<div class="single-blog-card grid grid-cols-12 lg:grid-cols-1 lg:grid-rows-12 bg-ci-blue-400">
													<div class="bg-cover blank col-span-5 lg:col-span-1 lg:row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb') ?>')"></div>

													<div class="single-blog-inner col-span-7 lg:col-span-1 lg:row-span-5 lg:py-6 lg:px-4 p-3">
														<div class="single-blog-inner-info">
															<span class="btn round bg-white cl-ci-orange-500 size-s" onclick="location.href='/<?= $p_cate[0]->slug; ?>'" style="line-height: 20px;font-size: 18px;">
																<?php
																echo $p_cate[0]->name;

																?>
															</span>
															<sp class="xs"></sp>
															<span class="cl-white blog-txt-shorter">
																<p class="blog-title f30-24"><?php the_title() ?></p>
															</span>
															<sp class="hidden lg:block"></sp>
															<span id="txt_20" class="cl-ci-blue-800 hidden sm:block">
																<?php the_excerpt() ?>
															</span>
														</div>
													</div>
												</div>
											</div>
										<?php } else if ($chk == 2) { ?>
											<div class="single-blog-wrap relative h-fit row-start-4 row-span-1 lg:col-start-4 lg:row-start-1 lg:col-span-1 pointer box-blog box-blog-3 mx-4 lg:mx-0" onclick="location.href='/<?= get_permalink() ?>'" style="z-index: 3;">
												<div class="single-blog-card grid grid-cols-12 lg:grid-cols-1 lg:grid-rows-12 bg-ci-blue-400">
													<div class="bg-cover blank col-span-5 lg:col-span-1 lg:row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'medium-large-thumb') ?>')"></div>

													<div class="single-blog-inner col-span-7 lg:col-span-1 lg:row-span-5 lg:p-4 p-3">
														<div class="single-blog-inner-info">
															<span class="btn round bg-white cl-ci-orange-500 size-s" onclick="location.href='/<?= $p_cate[0]->slug; ?>'" style="line-height: 20px;font-size: 18px;">
																<?php
																echo $p_cate[0]->name;
																?>
															</span>
															<sp class="xs"></sp>
															<span class="cl-white blog-txt-shorter">
																<p class="blog-title f30-24"><?php the_title() ?></p>
															</span>
															<sp class="hidden lg:block"></sp>
															<span id="txt_20" class="cl-ci-blue-800 hidden sm:block">
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
							<sp class="l"></sp>
						</section>

					<?php }
				}
			}
			?>
			<?php
		}
		?>
<!-- <div class="pst -ab wide">
    <theboxes class="middle padding t-center -clip pst -ab" style="background-color: rgba(255, 0, 0, 0); top: 15px;">
        <box col=""><inner class="padding quick-filter cl-white" style="background-color: #757575;">
            แสดงโครงการทั้งหมดของแอสเซทไวส์ v
        </inner></box>
    </theboxes>
</div>
<sp class="xl"></sp> -->
<?= get_template_part('template-parts/site-share', 'content'); ?>

<?php get_footer(); ?>

<script type="text/javascript">
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
</script>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	var el = $('#related-project .single-cards-wrap');
	var hammerTime = new Hammer(el);
	hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
	hammerTime.on("panend", function (ev) {
		if (el.style.getPropertyValue('--i') == '') {
			el.style.setProperty('--i',0)
		}
		if (el.style.getPropertyValue('--max') == '') {
			el.style.setProperty('--max',$$('#related-project .single-project-card').length)
		}
		let i = el.style.getPropertyValue('--i')
		let max = el.style.getPropertyValue('--max')

		i = parseInt(i)
		max = parseInt(max)

		let di = 0;
		if (ev.deltaX > 20) {
			di = -1
		} else if (ev.deltaX < -20) {
			di = +1
		}
		i = (((i+di)%max)+max)%max
        // el.dataset.i  = i
        // el.style.setProperty('--i',i)
		$$('#related-project .single-project-nav .-nav')[i].click()
	})
</script>