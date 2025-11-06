<?php get_header() ?>

<!--=== The Section Boxes : banner ===-->
<section id="banner" class="">
	<?= get_template_part('template-parts/site-project', 'condo-banner'); ?>
</section>


<div class="cont-pd py-4 flex flex-row items-center">
	<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
	<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
	<a href="/<?=pll_current_language()?>/blog" class=""><?php pll_e('บล็อก')?></a>
</div>
<style type="text/css">
	body,
	html {
		overflow: visible;
	}

	.blog-menu {
		color: var(--ci-grey-400);
	}

	.cl-ci-orange-500 {
		color: var(--ci-orange-500) !important;
	}

	.blog_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	.side-nav-menu,
	.side-nav-menu-blog {
		border-left: 0;
	}

	.blog-ani:hover .bg-cover,
	.blog-ani:hover,
	.blog-wrap:hover .blog-ani {
		transform: scale(1.07);
		transition: all .8s;
	}

	.blog_hline {
		/*width: 100%;*/
	}

	.blog_hbar {
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}

	#menu-blog {
		transition: all .15s;
	}

	#cate-menu {
		position: sticky;
		top: calc(.5em + 70px);
	}

	div#blog-info-section {
		position: absolute;
		width: 10px;
		height: 10px;
		top: -70px;
	}

	@media (max-width: 1023px) {
		.side-nav-menu-blog {
			overflow: auto;
			white-space: nowrap;
			scroll-behavior: smooth;
			background-color: white;
			overflow-y: hidden;
			/*width: 95.5vw;*/
			/*width: 100%;*/
		}
	}

	@media (max-width: 767px) {

		.side-nav-menu,
		.side-nav-menu-blog {
			border-left: 0;
			border-bottom: 0;
		}

		.side-nav-menu-blog {
			/*width: 91.5vw;*/
		}


	}
</style>
<div class="cont-pd lg:pt-8 -pb-10 ">
	<div id="blog-info-section"></div>
	<div class="grid grid-flow-row lg:grid-cols-12 gap-0 lg:gap-3">
		<div class="lg:col-span-3">
			<div id="cate-menu" class="col-span-3 lg:pl-6 lg:pb-10 pt-4">
				<h1 class="f56-42 cl-ci-grey-200" style="font-weight: 400;"><?php pll_e('บล็อก')?></h1>
				<aside class="dynamic-side-nav" data-selected="0">
					<ul class="">
						<li>
							<div onclick="show_info(0)"><?php pll_e('ทั้งหมด')?></div>
						</li>
						<?php
						$allcate = get_categories();

						foreach ($allcate as $key => $value) {
							if ($value->slug != 'blog') { ?>
								<li>
									<div onclick="show_info(<?= $key + 1 ?>)"><?= $value->name ?></div>
								</li>
							<?php }
						}
						?>
					</ul>
					<div class="-runner"></div>
				</aside>
				<!-- <div id="menu-blog" class="flex flex-row lg:flex-col side-nav-menu-blog relative pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8" style="">
						<div onclick="show_info(0)" class="blog-menu px-0 lg:px-4 cl-ci-orange-500 font-medium">
							<span>ทั้งหมด</span>
						</div>
						<sp class="hidden lg:block" style="height: 1rem;"></sp>
						<div class="hidden lg:block absolute bg-ci-grey-900" style="width: 1px;height: 100%;left: 0px;z-index: 1;">
							<div class="blog_vbar"></div>
						</div>
						<div class="block lg:hidden absolute bg-ci-grey-900 blog_hline" style="height: 2.5px;bottom: 1.15px;z-index: 1;">
							<div class="blog_hbar"></div>
						</div>
						<?php
						$allcate = get_categories();
						foreach ($allcate as $key => $value) {
							if ($value->slug != 'blog') { ?>
								<div onclick="show_info(<?= $key + 1 ?>)" class="blog-menu px-0 lg:px-4">
									<span><?= $value->name ?></span>
								</div>
								<sp class="hidden lg:block" style="height: 1rem;"></sp>
							<?php }
						}
						?>
					</div> -->
			</div>
		</div>
		<div class="lg:col-start-4 lg:col-span-9">

			<style type="text/css">
				.cate-blog {
					transition: all .3s;
					transform: translateY(100px);
					opacity: .0;
				}

				.cate-blog[data-show="1"] {
					opacity: 1;
					transform: translateY(0px);
				}

				.exp22-none {
					font-size: 22px;
					line-height: 28px;
					font-weight: 400px;
					display: block;
					/*						height: calc(28px * 2);*/
					overflow: hidden;
					color: var(--ci-grey-700);

					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}

				.f26-24 {
					font-weight: 500;
					display: block;
					/*						height: calc(32px * 2);*/
					overflow: hidden;

					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}

				.f30-28 {
					--i: 2;
					font-weight: 500;
					/*display: block;*/
					/*max-height: calc(32px * var(--i));*/
					overflow: hidden;
					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 2;
					-webkit-box-orient: vertical;
				}

				.f48-40 {
					color: var(--ci-grey-200);
				}

				.name-cate-18 {
					font-size: 18px;
					line-height: 20px;
					font-weight: 700;
				}

				.btn {
					padding: 2px 10px !important;
					border-radius: 16px;
				}

				.card-wrap .blog-wrap::before {
					content: " ";
					height: 0%;
					width: 4px;
					background: var(--ci-orange-500);
					position: absolute;
					left: 0;
					top: 0;
					opacity: 1;
					transition: all .5s;
				}

				.card-wrap:hover .blog-wrap::before {
					content: " ";
					height: 100%;
					width: 4px;
					background: var(--ci-orange-500);
					opacity: 1;
					transition: all .5s;

				}

				@media (max-width: 640px) {
					.f30-28 {
						--i: 2;
						font-weight: 500;
						/*display: block;*/
						height: calc(32px * var(--i));
						overflow: hidden;
					}

					.exp22-none {
						display: none;
					}

					.border-m-b {
						border-bottom: 1px solid var(--ci-grey-800);
					}
				}

				.txt-ex {
					height: auto;
					text-overflow: ellipsis;
					display: -webkit-box;
					-webkit-line-clamp: 1;
					-webkit-box-orient: vertical;
				}
			</style>
			<div id="show-all" class="blog-all-cate">
				<?php
				$allcate = get_categories();
				$chk_cate = 0;
				foreach ($allcate as $key => $value) {
					if ($value->slug != 'post') {
						if ($chk_cate == 0) { ?>
							<div class="cate-blog border-m-b pt-9 pb-8 md:pb-14 md:pt-10" data-show="0">
								<div class="grid grid-cols-1 md:grid-cols-2">
									<div class="col-span-1 f48-40">
										<?= $value->name ?>
									</div>
									<div class="col-start-2 col-span-1 flex items-center justify-end">
										<a  onclick="select_all(1)" class="see-more selected-all f30-28 cl-ci-blue-300"
											href="/<?= $value->slug ?>"
											style="overflow: visible !important; color: var(--ci-blue-300);"><?php pll_e('ดูทั้งหมด')?>
											<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
												style="width:35px">
										</a>
									</div>
								</div>
								<sp style="height: 20px;"></sp>
								<div class="grid grid-flow-row md:grid-rows-none md:grid-cols-2 gap-6 md:gap-10">
									<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => $value->slug,
										'post_status' => 'publish',
										'posts_per_page' => 3,
										'orderby' => 'date',
										'order' => 'DESC',
									);

									$loop = new WP_Query($args);
									$chk = 0;
									while ($loop->have_posts()):
										$loop->the_post();
										$featured_img = wp_get_attachment_image_src($post->ID);
										if ($chk == 1) { ?>
											<div class="row-start-2 row-span-1 md:row-start-1 md:col-start-2 md:col-span-1">
												<div class="grid grid-rows-2 gap-6">
												<?php }
										if ($chk == 0) { ?>
													<div class="row-span-1 md:col-span-1 overflow-hidden">
														<a href="<?= get_permalink(); ?>" class="relative blog-ani">
															<div class="col-span-6 bg-cover blank center"
																style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');box-shadow: 0px -220px 90px -90px rgb(0 0 0) inset;"
																ratio="1:1">
															</div>
															<div class="w-full">
																<div class="pl-4 pr-20 md:px-6 md:pb-2 absolute bottom-0">
																	<span class="btn cl-ci-orange-500 bg-white round name-cate-18"><?= $value->name ?></span>
																	<sp class="vs"></sp>
																	<span class="f30-28 -title text-white">
																		<?php the_title() ?>
																	</span>
																	<sp style="height: 10px;"></sp>
																	<span class="exp22-none">
																		<?php the_excerpt() ?>
																	</span>
																	<sp class=""></sp>
																</div>
															</div>
														</a>
													</div>
												<?php } else { ?>
													<div class="card-wrap relative row-span-1 <?php if ($chk == 2) {
														echo 'row-start-2';
													} ?>">
														<div
															class="grid grid-flow-row grid-cols-12 gap-0 md:gap-4 bg-ci-grey-900 md:px-4 md:py-5 blog-wrap">
															<div class="col-span-5 overflow-hidden">
																<a href="<?= get_permalink(); ?>" class="">
																	<div class="bg-cover blank center blog-ani"
																		style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');"
																		ratio="1:1">
																	</div>
																</a>
															</div>
															<div class="col-start-6 col-span-7 px-3 py-4 md:px-0 md:py-0 flex items-center">
																<div class="w-full">
																	<a href="<?= get_permalink(); ?>" class="">
																		<span class="cl-ci-orange-500 name-cate-18">
																			<?= $value->name ?>
																		</span>
																		<br>
																		<sp class="block md:hidden" style="height: 8px;"></sp>
																		<span class="f26-24">
																			<?php the_title() ?>
																		</span>
																		<sp style="height: 16px;"></sp>
																		<div id="" class="txt-ex">
																			<?= get_the_excerpt() ?>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>


												<?php
												$chk++;
									endwhile;
									if ($chk > 1) { ?>
											</div>
										</div>
									<?php }
									wp_reset_postdata();
									?>
								</div>
							</div>
						<?php }
						if ($chk_cate == 1 || $chk_cate == 4) { ?>
							<div class="grid md:grid-cols-2" data-show="0">
								<div id="" class="cate-blog border-m-b col-span-1 pt-9 pb-8 md:pb-14 md:pr-5 border-01">
									<div class="grid grid-cols-1 md:grid-cols-2">
										<div class="col-span-1 f48-40">
											<?= $value->name ?>
										</div>
										<div class="col-start-2 col-span-1 flex items-center justify-end">
											<a  onclick="select_all(1)" class="see-more selected-all f30-28 cl-ci-blue-300"
												href="/<?= $value->slug ?>"
												style="overflow: visible !important; color: var(--ci-blue-300);"><?php pll_e('ดูทั้งหมด')?>
												<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
													style="width:35px">
											</a>
										</div>
									</div>
									<sp style="height: 20px;"></sp>

									<div class="grid grid-flow-row gap-6">
										<?php
										$args = array(
											'post_type' => 'post',
											'category_name' => $value->slug,
											'post_status' => 'publish',
											'posts_per_page' => 3,
											'orderby' => 'date',
											'order' => 'DESC',
										);

										$loop = new WP_Query($args);
										$chk = 0;
										while ($loop->have_posts()):
											$loop->the_post();
											$featured_img = wp_get_attachment_image_src($post->ID);
											if ($chk == 0) { ?>
												<div class="row-span-2 overflow-hidden">
													<a href="<?= get_permalink(); ?>" class="relative blog-ani">
														<div class="bg-cover blank center"
															style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');box-shadow: 0px -220px 90px -90px rgb(0 0 0) inset;"
															ratio="1:1">
														</div>
														<div class="w-full">
															<div class="pl-4 pr-20 md:px-6 md:pb-2 absolute bottom-0">
																<span class="btn cl-ci-orange-500 bg-white round name-cate-18"><?= $value->name ?></span>
																<sp class="vs"></sp>
																<span class="f30-28 -title text-white">
																	<?php the_title() ?>
																</span>
																<sp style="height: 10px;"></sp>
																<span class="exp22-none">
																	<?php the_excerpt() ?>
																</span>
																<sp class=""></sp>
															</div>
														</div>
													</a>
												</div>
											<?php } else { ?>
												<div class="card-wrap relative row-span-1">
													<div class="grid grid-cols-12 gap-0 md:gap-4 bg-ci-grey-900 md:px-4 md:py-5 blog-wrap">
														<div class="col-span-5 overflow-hidden">
															<a href="<?= get_permalink(); ?>" class="">
																<div class="blog-ani bg-cover blank center"
																	style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');"
																	ratio="1:1">
																</div>
															</a>
														</div>
														<div class="col-start-6 col-span-7 px-3 py-4 md:px-0 md:py-0 flex items-center">
															<div class="w-full">
																<a href="<?= get_permalink(); ?>" class="">
																	<span class="cl-ci-orange-500 name-cate-18">
																		<?= $value->name ?>
																	</span>
																	<br>
																	<sp class="block md:hidden" style="height: 8px;"></sp>
																	<span class="f26-24">
																		<?php the_title() ?>
																	</span>
																	<sp style="height: 16px;"></sp>
																	<div id="" class="txt-ex">
																		<?php the_excerpt() ?>
																	</div>
																</a>
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
							<?php }
						if ($chk_cate == 2 || $chk_cate == 5) { ?>
								<div id=""
									class="cate-blog border-m-b col-span-1 md:col-start-2 pt-9 pb-8 md:pb-14 md:pl-5 border-02">
									<div class="grid grid-cols-1 md:grid-cols-3">
										<div class="col-span-2 f48-40">
											<?= $value->name ?>
										</div>
										<div class="col-start-3 col-span-1 flex items-center justify-end">
											<a  onclick="select_all(1)" class="see-more selected-all f30-28 cl-ci-blue-300"
												href="/<?= $value->slug ?>"
												style="overflow: visible !important; color: var(--ci-blue-300);"><?php pll_e('ดูทั้งหมด')?>
												<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
													style="width:35px">
											</a>
										</div>
									</div>
									<sp style="height: 20px;"></sp>
									<div class="grid grid-flow-row gap-6">
										<?php
										$args = array(
											'post_type' => 'post',
											'category_name' => $value->slug,
											'post_status' => 'publish',
											'posts_per_page' => 3,
											'orderby' => 'date',
											'order' => 'DESC',
										);

										$loop = new WP_Query($args);
										$chk = 0;
										while ($loop->have_posts()):
											$loop->the_post();
											$featured_img = wp_get_attachment_image_src($post->ID);
											if ($chk == 0) { ?>
												<div class="row-span-2 overflow-hidden row-start-1 md:row-start-3">
													<a href="<?= get_permalink(); ?>" class="relative blog-ani">
														<div class="bg-cover blank center"
															style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');box-shadow: 0px -220px 90px -90px rgb(0 0 0) inset;"
															ratio="1:1">
														</div>

														<div class="w-full">
															<div class="pl-4 pr-20 md:px-6 md:pb-2 absolute bottom-0">
																<span class="btn cl-ci-orange-500 bg-white round name-cate-18"><?= $value->name ?></span>
																<sp class="vs"></sp>
																<span class="f30-28 -title text-white">
																	<?php the_title() ?>
																</span>
																<sp style="height: 10px;"></sp>
																<span class="exp22-none">
																	<?php the_excerpt() ?>
																</span>
																<sp class=""></sp>
															</div>
														</div>
													</a>
												</div>

											<?php } else { ?>
												<div class="card-wrap relative row-span-1">
													<div class="grid grid-cols-12 gap-0 md:gap-4 bg-ci-grey-900 md:px-4 md:py-5 blog-wrap">
														<div class="col-span-5 overflow-hidden">
															<a href="<?= get_permalink(); ?>" class="">
																<div class="bg-cover blank blog-ani center"
																	style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');"
																	ratio="1:1">
																</div>
															</a>

														</div>
														<div class="col-start-6 col-span-7 px-3 py-4 md:px-0 md:py-0 flex items-center">
															<div class="w-full">
																<a href="<?= get_permalink(); ?>" class="">
																	<span class="cl-ci-orange-500 name-cate-18">
																		<?= $value->name ?>
																	</span>
																	<br>
																	<sp class="block md:hidden" style="height: 8px;"></sp>
																	<span class="f26-24">
																		<?php the_title() ?>
																	</span>
																	<sp style="height: 16px;"></sp>
																	<div id="" class="txt-ex">
																		<?php the_excerpt() ?>
																	</div>
																</a>
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
							</div>
						<?php }
						if ($chk_cate == 3) { ?>
							<div class="cate-blog border-m-b pt-9 pb-8 md:pb-14 md:pt-9" data-show="0">
								<div class="grid grid-cols-1 md:grid-cols-3">
									<div class="col-span-2 f48-40">
										<?= $value->name ?>
									</div>
									<div class="col-start-3 col-span-1 flex items-center justify-end">
										<a  onclick="select_all(1)" class="see-more selected-all f30-28 cl-ci-blue-300"
											href="/<?= $value->slug ?>"
											style="overflow: visible !important; color: var(--ci-blue-300);"><?php pll_e('ดูทั้งหมด')?>
											<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block"
												style="width:35px">
										</a>
									</div>
								</div>
								<sp style="height: 20px;"></sp>
								<div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 gap-6 md:gap-10">
									<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => $value->slug,
										'post_status' => 'publish',
										'posts_per_page' => 3,
										'orderby' => 'date',
										'order' => 'DESC',
									);

									$loop = new WP_Query($args);
									$chk = 0;
									while ($loop->have_posts()):
										$loop->the_post();
										$featured_img = wp_get_attachment_image_src($post->ID);
										if ($chk == 1) { ?>
											<div class="row-start-3 md:row-start-1 md:col-start-1 col-span-1">
												<div class="grid grid-flow-row gap-6">
												<?php }
										if ($chk == 0) { ?>
													<div
														class="row-start-1 row-span-2 md:row-span-1 md:col-start-2 md:col-span-1 overflow-hidden">
														<a href="<?= get_permalink(); ?>" class="blog-ani relative">
															<div class="col-span-6 bg-cover blank center"
																style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');box-shadow: 0px -170px 70px -50px rgba(0, 0, 0, 0.95) inset;"
																ratio="1:1">
															</div>

															<div class="w-full">
																<div class="pl-4 pr-20 md:px-6 md:pb-2 absolute bottom-0">
																	<span class="btn cl-ci-orange-500 bg-white round name-cate-18"><?= $value->name ?></span>
																	<sp class="vs"></sp>
																	<span class="f30-28 -title text-white">
																		<?php the_title() ?>
																	</span>
																	<sp style="height: 10px;"></sp>
																	<span class="exp22-none">
																		<?php the_excerpt() ?>
																	</span>
																	<sp class=""></sp>
																</div>
															</div>
														</a>
													</div>
												<?php } else { ?>
													<div class="card-wrap relative row-span-1 <?php if ($chk == 2) {
														echo 'row-start-2';
													} ?>">
														<div
															class="grid grid-flow-row grid-cols-12 gap-0 md:gap-3 bg-ci-grey-900 md:px-4 md:py-5 blog-wrap">
															<div class="col-span-5 overflow-hidden">
																<a href="<?= get_permalink(); ?>" class="">
																	<div class="blog-ani bg-cover blank center"
																		style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>');"
																		ratio="1:1">
																	</div>
																</a>
															</div>
															<div class="col-start-6 col-span-7 px-3 py-4 md:px-0 md:py-0 flex items-center">
																<div class="w-full">
																	<a href="<?= get_permalink(); ?>" class="">
																		<span class="cl-ci-orange-500 name-cate-18">
																			<?= $value->name ?>
																		</span>
																		<br>
																		<sp class="block md:hidden" style="height: 8px;"></sp>
																		<span class="f26-24">
																			<?php the_title() ?>
																		</span>
																		<sp style="height: 16px;"></sp>
																		<div id="" class="txt-ex">
																			<?php the_excerpt() ?>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>


												<?php
												$chk++;
									endwhile;
									if ($chk > 1) { ?>
											</div>
										</div>
									<?php }
									wp_reset_postdata();
									?>
								</div>
							</div>
						<?php }
						$chk_cate++;
						$chk_cate = $chk_cate % 6;
					}
				}
				if (($chk_cate == 2 || $chk_cate == 5)) {
					echo "</div>";
				}
				?>

			</div>

			<style type="text/css">
				.title-txt {
					display: block;
					height: calc(32px * 2);
					overflow: hidden;
					font-size: 30px;
					line-height: 32px;
					font-weight: 500;
				}

				.exp-txt {
					display: block;
					height: calc(28px * 2);
					overflow: hidden;
					font-size: 22px;
					line-height: 28px;
					font-weight: 400;
					line-break: anywhere;
				}

				.ani-subcate {
					transition: all .3s calc(var(--x) * .25s);
					transform: translateY(100px);
					opacity: .0;
				}

				.ani-subcate[data-x="-1"] {
					transition: none;
				}

				.ani-subcate[data-show="1"] {
					opacity: 1;
					transform: translateY(0px);
				}

				@media (max-width: 768px) {
					.title-txt {
						height: calc(32px * 1);
					}
				}
			</style>
			<?php
			$allcate = get_categories();
			foreach ($allcate as $key => $value) {
				if ($value->slug != 'post') {
					?>
					<div id="show-<?= $value->slug ?>" class="blog-all-cate" style="display: none;">
						<section id="<?= $value->slug ?>" class="border-m-b pt-9 pb-8 md:pb-14 md:pt-6">
							<div class="">
								<h2 class="cl-ci-grey-100">
									<?= $value->name ?>
								</h2>
								<sp class="l"></sp>
								<div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
									<?php
									$args = array(
										'post_type' => 'post',
										'category_name' => $value->slug,
										'post_status' => 'publish',
										'posts_per_page' => -1,
										'orderby' => 'date',
										'order' => 'DESC',
									);

									$loop = new WP_Query($args);
									while ($loop->have_posts()):
										$loop->the_post(); ?>
										<div class="col-span-1 bg-ci-grey-900 pointer card-wrap ani-subcate relative" data-show="0"
											data-x="null" onclick="location.href='<?= get_permalink() ?>';">
											<div class="grid grid-rows-12 blog-wrap">
												<div class="row-span-6 overflow-hidden">
													<div class="bg-cover blank blog-ani" ratio="1:1"
														style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>')">
													</div>
												</div>
												<div class="row-span-6 py-6 px-4">
													<span class="cl-ci-orange-500"
														style="font-size: 18px;line-height: 20px;font-weight: 700;"><?= $value->name ?></span>
													<sp class="xs"></sp>
													<span class="cl-ci-grey-200 title-txt">
														<?php the_title() ?>
													</span>
													<sp class="vs"></sp>
													<span id="" class="cl-ci-grey-300 exp-txt">
														<?php the_excerpt() ?>
													</span>
												</div>
											</div>
										</div>
										<?php
									endwhile;
									wp_reset_postdata();
									?>
								</div>
							</div>
						</section>
					</div>
				<?php }
			}
			?>
		</div>
	</div>
</div>

<?php get_footer() ?>

<script type="text/javascript">
	function txt_shorter(text, chars_limit) {
		if (text.length > chars_limit) {
			new_text = text.substring(0, chars_limit);
			new_text = new_text.trim();
			return new_text.concat("...")
		}
		else {
			return text
		}
	}
	// var ttt = document.querySelectorAll("#");
	// for (let i = 0; i < ttt.length; i++) {
	// 	ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 30);
	// }

	// var title = document.getElementsByClassName("f30-28 -title");
	// for (var i = 0; i < title.length; i++) {
	// 	if (title[i].textContent.length > 40) {
	// 		title[i].style.height = "64px"
	// 	}
	// }

	const blog = document.getElementsByClassName("blog-all-cate");


	window.addEventListener("resize", () => {
		setTimeout(() => {
			setWidthMenu();
		}, 200)
	});
	let current = 0;
	let width_hline_gap;

	function setWidthMenu() {
		const elAll = document.querySelectorAll('.blog-menu');
		const menu = document.querySelector('#menu-blog');
		const hline = document.querySelector('.blog_hline');
		const hbar = document.querySelector('.blog_hbar');

		let width_hline = 0;
		let left_hline = 0;
		let iCount = 0;

		elAll.forEach((el, index) => {
			width_hline += el.offsetWidth;
			xconsolex.log(el.offsetWidth, index);
		})
		// xconsolex.log(width_hline);
		for (let i of elAll) {
			if (iCount < current) {
				if (document.body.clientWidth < 768) {
					left_hline += i.offsetWidth;
					// xconsolex.log(iCount + 1);
				} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
					left_hline += i.offsetWidth;
				}
			}
			iCount++
		}
		if (document.body.clientWidth < 768) {
			width_hline_gap = width_hline;
			width_hline_gap += ((elAll.length - 1) * 16); // 32px
			menu.style.width = 'calc(100vw - 32px)';

			if (width_hline_gap < menu.offsetWidth) { // flex
				// menu.style.width = 100+'%';
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width = 100 + '%';
			} else {
				// menu.style.width = 'calc(100vw - 32px)';
				width_hline_gap = 0;
				width_hline += ((elAll.length - 1) * 16); // 16px
				menu.style.columnGap = 16 + "px";
				left_hline = left_hline + (current * 16);

				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';
			}

		} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
			width_hline_gap = width_hline;
			menu.style.width = 'calc(100vw - 32px)';

			if (width_hline_gap < menu.offsetWidth) { //flex
				// menu.style.width = 100+'%';
				menu.style.width = '';
				menu.style.justifyContent = 'space-between';
				gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
				left_hline = left_hline + (gapWidth * current)
				hbar.style.left = left_hline + 'px';
				hline.style.width = 100 + '%';
				xconsolex.log(menu.offsetWidth - width_hline)
			} else {
				// menu.style.width = 'calc(100vw - 32px)';
				menu.style.width = '';
				width_hline_gap = 0;
				width_hline_gap += ((elAll.length - 1) * 32); // 32px
				menu.style.columnGap = 32 + "px";
				left_hline = left_hline + (current * 32);
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';

			}
		}

		xconsolex.log('width_div', width_hline, 'menu-promo_width', menu.offsetWidth);


		xconsolex.log(width_hline_gap);
		hbar.style.width = elAll[current].offsetWidth + 'px';
	}

	setTimeout(() => {
		setWidthMenu();
	}, 200);

	function show_info(num) {
		toFilterTop()
		for (let i = 0; i < blog.length; i++) {
			if (i == num)
				blog[i].style.display = "block";
			else
				blog[i].style.display = "none";
		}
		// current = num;
		// const elNum = num;
		// const allEl = document.querySelectorAll(".blog-menu");
		// const menu = document.querySelector('#menu-blog');

		// let scrollY = 0;
		// let iCount = 0;
		// let barY = 0;

		// let barX = 0;
		// let width_hline = 0;
		// allEl.forEach((el, index) => {
		// 	width_hline += el.offsetWidth;
		// 	// xconsolex.log(el.offsetWidth, index);
		// })

		// for (let i of allEl) {

		// 	i.classList.remove('cl-ci-orange-500')
		// 	i.classList.remove('font-medium')
		// 	if (iCount < elNum) {
		// 		scrollY += i.offsetHeight;
		// 		barY += i.offsetHeight;

		// 		barX += i.offsetWidth;
		// 	}
		// 	iCount++

		// }

		// scrollY = scrollY + (16 * elNum);
		// barY = barY + (16 * elNum);
		// scrollY -= 32;
		// allEl[elNum].classList.add('cl-ci-orange-500');
		// allEl[elNum].classList.add('font-medium');
		// barYoffset = (document.querySelectorAll('.blog-menu')[elNum].offsetHeight - 28) / 2;
		// document.querySelector('.blog_vbar').style.top = barY + barYoffset + 'px';

		// if (document.body.clientWidth < 768) {
		// 	if (width_hline_gap != 0) {
		// 		gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
		// 		barX = barX + (gapWidth * current)
		// 	} else {
		// 		barX = barX + (current * 16);
		// 	}


		// } else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
		// 	if (width_hline_gap != 0) {
		// 		gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
		// 		barX = barX + (gapWidth * current)
		// 	} else {
		// 		barX = barX + (current * 32);
		// 	}

		// }

		// document.querySelector('.blog_hbar').style.width = allEl[current].offsetWidth + 'px';
		// document.querySelector('.blog_hbar').style.left = barX + 'px';

		restartSort()
	}


	function select_all(num) {

		current_btn()

	}

	function toFilterTop() {
		document.querySelector('#blog-info-section').scrollIntoView({
			behavior: 'smooth'
		});


	}

	function scrollCard() {
		let ele = document.getElementsByClassName("cate-blog")
		for (let j = 0; j < ele.length; j++) {
			if (j % 3 == 2) {
				// xconsolex.log(ele[j])
				ele[j].style.transitionDelay = ".25s"
			}
		}
		let h = window.innerHeight
		let offset = 250
		for (let i of ele) {
			let react = i.getBoundingClientRect()
			let point = react.y - h + offset
			if (point < 0) {
				i.dataset.show = 1
			}
		}
	}

	let card_arr_x = []
	function scrollSubCard() {
		// xconsolex.log(num)
		card_arr_x = []
		let h = window.innerHeight
		let cards = document.querySelectorAll('.ani-subcate')
		let offset = 200

		for (let i of cards) {
			let react = i.getBoundingClientRect()
			if (card_arr_x.indexOf(react.x) == -1) {
				card_arr_x.push(react.x)
			}
		}
		card_arr_x = card_arr_x.sort(function (a, b) { return a - b; })
		let index = card_arr_x.indexOf(0);
		if (index !== -1) {
			card_arr_x.splice(index, 1);
		}
		for (let i of cards) {
			let react = i.getBoundingClientRect()
			let point = react.y - h + offset
			i.dataset.x = card_arr_x.indexOf(react.x)
			i.style.setProperty('--x', i.dataset.x)
			if (point < 0) {
				i.dataset.show = 1
			}
		}
	}
	function restartSort() {
		let cards = document.querySelectorAll('.ani-subcate')
		for (let i of cards) {
			i.dataset.show = 0
			i.dataset.x = -1
		}
		let bigcards = document.querySelectorAll('.cate-blog')
		for (let j of bigcards) {
			j.dataset.show = 0
			j.dataset.x = -1
		}
		scrollCard()
		scrollSubCard()
	}
	window.onscroll = () => {
		scrollCard()
		scrollSubCard()
	}
	scrollCard()

</script>