<?php
global $pagewidth;
$pagewidth = get_field('pagewidth');
if ($pagewidth === null) {
	$pagewidth = 'container';
}
$v = get_field('content');
?>
<?php get_header() ?>
<style type="text/css">
	.t-center h1 {
		font-size: 40px !important;
		line-height: 44px !important;
	}

	.single-area>.content-area {
		max-width: 1440px;
	}

	#txt_20 {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: calc(28px * 2);

	}

	#txt_header {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: calc(32px * 2);
	}

	#related-news, .main-news-bg{
		padding-bottom: 5rem !important;
	}

	@media (max-width: 1023px) {
		#txt_header {
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			height: calc(32px * 1);
		}
		#related-news, .main-news-bg{
			padding-bottom: 3rem !important;
		}
	}

	.news-item-0 .line05 {
		display: none;
	}

	.news-item-2 .line04 {
		display: none;
	}
</style>
<div style="background: linear-gradient(360deg, #EDF2F7 0%, #FFFFFF 103.44%);">
	<div class="container -bc mx-auto pt-3 xl:pt-4 truncate px-4 xl:px-0 flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/news" class="cl-ci-blue-400"><?php pll_e('ข่าวสาร')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="#!" class=""><?php the_title() ?></a>
	</div>
	<?php while (have_posts()) : the_post(); ?>
		<!-- <?php seed_banner_title(get_the_ID()); ?> -->
		<?php $g = get_post();

		if ($g->post_type == 'post') {
			?>
			<div class="bg-grey-2">
				<div class="cont-pd padding-vtc">
					<a href="/<?=pll_current_language()?>/news" class=""><?php pll_e('ข่าวสาร')?></a> > <?php the_title() ?>
				</div>
			</div>
			<?php
		}
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
		<?= $v[0]['acf_fc_layout'] != 'gallery' ? '</div>' : '' ?>
	<?php endwhile; ?>

	<?php
	if ($v != '') {
		foreach ($v as $key => $type) {
			if ($type['acf_fc_layout'] == 'gallery') {
				// pre($type['acf_fc_layout']);
				?>
				<!--=== The Section Boxes : gallery ===-->
				<section id="gallery" class="padding-xl-vtc">
					<div class="">
						<h1 class="container mx-auto px-4 xl:px-0"><?php pll_e('แกลเลอรี')?></h1>
						<sp class="l"></sp>
						<?php
						$chk = sizeof($type['gallery']);
						$chk = count($type['gallery']);
						if ($chk == 1) { ?>
							<div class="grid grid-cols-2 md:grid-rows-2 md:grid-cols-4 md:gap-6 gap-2 container md:mx-auto">
								<div class="jb-lightbox md:row-start-1 md:col-start-2 md:row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
							</div>
						<?php } else if ($chk == 2) { ?>
							<div class="grid grid-rows-2 grid-cols-4 md:gap-6 gap-2 container mx-auto">
								<div class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-1 col-start-3 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['1']['url'] ?>);cursor: pointer;"></div>
							</div>
						<?php } else if ($chk == 3) { ?>
							<div class="grid grid-rows-2 grid-cols-3 md:gap-6 gap-2 container mx-auto">
								<div class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-1 col-start-3 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['1']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-2 col-start-3 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['2']['url'] ?>);cursor: pointer;"></div>
							</div>
						<?php } else if ($chk == 4) { ?>
							<div class="grid grid-rows-2 grid-cols-2 md:gap-6 gap-2 container mx-auto">
								<div class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-1 col-start-2 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['1']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['2']['url'] ?>);cursor: pointer;"></div>
								<div class="jb-lightbox row-start-2 col-start-2 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $type['gallery']['3']['url'] ?>);cursor: pointer;"></div>
							</div>
						<?php } else if ($chk > 5 or $chk == 5) { ?>
							<!-- desktop -->
							<div class="hidden lg:grid grid-rows-2 grid-cols-4 gap-6 container mx-auto">
								<div data-jb-lightbox="d" class="jb-lightbox row-start-1 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['1']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="d" class="jb-lightbox row-start-2 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['2']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-2 row-span-2 col-span-2 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="d" class="jb-lightbox row-start-1 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['3']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="d" class="jb-lightbox row-start-2 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['4']['url'] ?>);cursor: pointer;">
									<?php if ($chk > 5) { ?>
										<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80"></div>
										<div class="centered">
											<h3 class="">+ <?= $chk - 5 ?></h3>
										</div>
										<?php
										for ($i = 5; $i < $chk; $i++) {
											$img = $type['gallery'][$i]['url'];
											echo "<span data-jb-lightbox='d' class='jb-lightbox' style='--img:url($img)'></span>";
										}
										?>
									<?php } ?>
								</div>
							</div>
							<!-- Mobile && Tablet -->
							<div class="lg:hidden grid grid-rows-6 grid-cols-12 gap-2 container mx-auto">
								<div data-jb-lightbox="m" class="jb-lightbox row-start-1 row-span-4 col-span-8 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['1']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="m" class="jb-lightbox col-start-9 row-span-2 col-span-4 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['2']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="m" class="jb-lightbox col-start-9 row-span-2 col-span-4 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['0']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="m" class="jb-lightbox row-start-5 col-start-1 row-span-3 col-span-6 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['3']['url'] ?>);cursor: pointer;"></div>
								<div data-jb-lightbox="m" class="jb-lightbox col-start-7 row-span-3 col-span-6 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $type['gallery']['4']['url'] ?>);cursor: pointer;">
									<?php if ($chk > 5) { ?>
										<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80"></div>
										<div class="centered">
											<h3 class="">+ <?= $chk - 5 ?></h3>
										</div>
										<?php
										for ($i = 5; $i < $chk; $i++) {
											$img = $type['gallery'][$i]['url'];
											echo "<span data-jb-lightbox='m' class='jb-lightbox' style='--img:url($img)'></span>";
										}
										?>

									<?php } ?>
								</div>
							</div>
						<?php }
						?>
						<sp class="h-6 md:h-10"></sp>
					</div>
				</section>
				<?php if ($type['acf_fc_layout'] == 'gallery') echo '</div>' ?>

			<?php } elseif ($type['acf_fc_layout'] == 'related_post') {
				$p_cate = wp_get_post_categories($post->ID, ['fields' => 'all']);
				if ($p_cate[0]->slug == "") { ?>
					<!--=== The Section Boxes : related news ===-->
					<sp class="xl"></sp>
					<section id="related-news" class="padding-l-vtc">
						<div class="cont-pd">
							<sp class="rem-3 hidden md:block"></sp>
							<div class="grid grid-cols-2">
								<div class="col-span-1">
									<h1 class=""><?php pll_e('ข่าวสารอื่นๆ')?></h1>
								</div>
								<div class="col-span-1 text-right pr-0">
									<a href="/<?=pll_current_language()?>/news" class="see-more flex justify-end pointer cl-ci-blue-300">
										<h5 class="cl-ci-blue-300 f30-28"><?php pll_e('ดูทั้งหมด')?></h5> <img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block" style="width:35px;margin:0;margin-left: 10px;">
									</a>
								</div>
							</div>
							<sp class="xl hidden md:block"></sp>
							<sp class="l"></sp>
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

								sp.s.bg-ci-veri-500,
								sp.s.bg-ci-orange-500 {
									width: 15%;
									transition: .8s;
								}

								.news-item-0:hover sp.s.bg-ci-orange-500,
								.news-item-1:hover sp.s.bg-ci-veri-500,
								.news-item-2:hover sp.s.bg-ci-orange-500 {
									width: 100%;
									transition: .8s;
								}

								.news-cards-wrap .col-span-1 .blank {
									transition: all .8s;
									transform: scale(1);
								}

								.news-item-0:hover .blank,
								.news-item-1:hover .blank,
								.news-item-2:hover .blank {
									transform: scale(1.1);
									transition: .8s;
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

								.line05 {
									position: absolute;
									top: -8px;
									right: -8px;
									background-color: var(--ci-orange-500);
									width: 30%;
									height: 0;
									z-index: 0;
									padding-top: 30%;
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

								#txt_title {
									overflow: hidden;
									text-overflow: ellipsis;
									display: -webkit-box;
									-webkit-line-clamp: 2;
									-webkit-box-orient: vertical;
									height: calc(32px * 2);
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
										left: calc(var(--i) * -105%);
										width: 100%;
									}

									.news-nav {
										display: flex;
									}
								}
							</style>
							<div class="grid news-cards-wrap sm:grid-cols-3 gap-8">
								<?php
								foreach ($type['related_post'] as $key => $value) {
									if ($key == 1) { ?>
										<div class="col-span-1 news-item-<?= $key ?> relative">
											<div class="grid grid-rows-12 bg-ci-grey-900 h-full px-4 py-6 relative pointer" onclick="location.href='<?= $value->guid ?>'">
												<div class="row-span-5">
													<h5 id="text-title" class="" style=""><?= $value->post_title ?></h5>
													<sp class=""></sp>
													<span id="txt_20" class=" cl-ci-grey-300">
														<?= $value->post_excerpt ?>
													</span>
													<sp class="rem-2"></sp>
													<a href="<?= $value->guid ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
													<sp class=""></sp>
													<sp class="s <?php if ($key == 1) {
														echo 'bg-ci-veri-500';
													} else {
														echo 'bg-ci-orange-500';
													} ?>" style="height: 4px;"></sp>
													<sp class=""></sp>
												</div>
												<div class="row-span-6 relative">
													<!-- <div class="line04"></div> -->
													<div id="middle-news-pic">
														<div style="overflow: hidden;">
															<div class="bg-cover blank" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'medium-large-thumb') ?>');">
															</div>
														</div>
													</div>
												</div>

												<?php if ($key == 1) {
													echo '<sp class=""></sp>';
												} ?>
												<div class="home-news-date-sp"></div>
												<div class="row-span-1 cl-ci-grey-300 home-news-date">
													<?=asw_date_format($value->post_date)?>
												</div>
											</div>
										</div>
									<?php } else {
										?>
										<div class="col-span-1 news-item-<?= $key ?> relative">
											<div class="grid grid-rows-12 bg-ci-grey-900 h-full px-4 py-6 relative pointer" onclick="location.href='<?= $value->guid ?>'">
												<div class="row-span-6 relative">
													<div class="line04"></div>
													<div class="line05"></div>
													<div style="overflow: hidden;">
														<div class="bg-cover blank" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'medium-large-thumb') ?>');">
														</div>
													</div>
												</div>
												<div class="row-span-5">
													<?php if ($key != 1) {
														echo '<sp class="rm"></sp>';
													} ?>
													<h5 id="text-title" class="" style=""><?= $value->post_title ?></h5>
													<sp class=""></sp>
													<span id="txt_20" class=" cl-ci-grey-300">
														<?= $value->post_excerpt ?>
													</span>
													<sp class="rem-2"></sp>
													<a href="<?= $value->guid ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
													<sp class=""></sp>
													<sp class="s bg-ci-orange-500" style="height: 4px;"></sp>
													<sp class=""></sp>
												</div>
												<div class="home-news-date-sp"></div>
												<div class="row-span-1 cl-ci-grey-300 home-news-date">
													<?php
													$date = strtotime($value->post_date);
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
													$year = (int)$year + 543;
													echo "<i class='far fa-clock size-m'></i> " . gmdate("d", $date) . " " . $month . " " . $year;
													?>
												</div>
											</div>
										</div>
									<?php }
								}
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

					<!--=== The Section Boxes : related post ===-->
					<section id="related-post" class="padding-l-vtc bg-ci-blue-300 cl-white">
						<div class="cont-pd">
							<div class="grid grid-cols-2">
								<div class="col-span-1">
									<h2 class="text-3xl">
										<?php
										$txt = "";
										switch ($p_cate[0]->slug) {
											case "art":
											$txt = "บทความอื่นๆใน ART & DECORATOR";
											break;
											case "growgreen":
											$txt = "บทความอื่นๆใน GROWGREEN";
											break;
											case "lifestyle":
											$txt = "บทความอื่นๆใน LIFESTYLE SEEKER";
											break;
											case "money":
											$txt = "บทความอื่นๆใน MONEY MAKER";
											break;
											case "storyteller":
											$txt = "บทความอื่นๆใน STORYTELLER";
											break;
											case "teach":
											$txt = "บทความอื่นๆใน TECH LOVER";
											break;
										}
										echo $txt;
										?>
									</h2>
								</div>
								<div class="col-span-1 text-right pointer" onclick="location.href='/<?= $p_cate[0]->slug; ?>'">
									<?php pll_e('ดูทั้งหมด')?>
								</div>
							</div>
							<sp class="vl"></sp>
							<div class="grid grid-rows-4 md:grid-rows-1 md:grid-cols-4 gap-3">
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

										<div class="row-start-1 row-span-2 md:row-span-1 md:col-start-2 md:col-span-2 pointer bg-cover blank" ratio="1:1" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID); ?>');" onclick="location.href='/<?= get_permalink() ?>'">
											<div class="bottom-left padding-s" style="z-index: 1;">
												<span class="btn round bg-white cl-orange size-s" onclick="location.href='/<?= $p_cate[0]->slug; ?>'">
													<?php
													echo $p_cate[0]->name;
													?>
												</span>
												<br>
												<span class="b7"><?php the_title() ?></span>
												<span class="hidden md:block"><?php the_excerpt() ?></span>
											</div>
										</div>

									<?php } elseif ($chk == 1) { ?>
										<div class="row-start-3 row-span-1 md:col-start-1 md:row-start-1 md:col-span-1 pointer" onclick="location.href='/<?= get_permalink() ?>'">
											<div class="grid grid-cols-12 md:grid-cols-1 md:grid-rows-12 bg-ci-blue-400">
												<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>

												<div class="col-span-7 md:col-span-1 md:row-span-5 p-4">
													<span class="btn round bg-white cl-orange size-s">
														<?php
														echo $p_cate[0]->name;
														?>
													</span>
													<sp class=""></sp>
													<span class="b7"><?php the_title() ?></span>
													<span id="txt_20" class="hidden md:block cl-ci-blue-800">
														<?php the_excerpt() ?>
													</span>
												</div>
											</div>
										</div>
									<?php } else if ($chk == 2) { ?>
										<div class="row-start-4 row-span-1 md:col-start-4 md:row-start-1 md:col-span-1 pointer" onclick="location.href='/<?= get_permalink() ?>'">
											<div class="grid grid-cols-12 md:grid-cols-1 md:grid-rows-12 bg-ci-blue-400">
												<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>

												<div class="col-span-7 md:col-span-1 md:row-span-5 p-4">
													<span class="btn round bg-white cl-orange size-s" onclick="location.href='/<?= $p_cate[0]->slug; ?>'">
														<?php
														echo $p_cate[0]->name;
														?>
													</span>
													<sp class=""></sp>
													<span class="b7"><?php the_title() ?></span>
													<span id="txt_20" class="hidden md:block cl-ci-blue-800">
														<?php the_excerpt() ?>
													</span>
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
				<?php } ?>


			<?php } ?>

		<?php } // end foreach
		?>
		<?php
	} // end if 
	if ($v == "") {
		?>
		<div class="main-news-bg" style="background-color: #edf2f8"></div>
		<?php
	}
	?>
	
	<?= get_template_part('template-parts/site-share', 'content'); ?>
	

	<?php
	// $v = get_field('relationship');
	// pre($v);
	?>
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
			ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 134);
		}
	</script>
	<?php get_footer() ?>