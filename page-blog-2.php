
<?php get_header() ?>

<!--=== The Section Boxes : banner ===-->
<section id="banner" class="">
	<div class="">
		<?php echo do_shortcode('[smartslider3 slider="1"]'); ?>
	</div>
</section>


<div class="cont-pd py-8">
	<a href="/home" class="cl-ci-blue-400">หน้าแรก</a>&ensp; > &ensp;<a href="/blog" class="">บล็อก</a>
</div>

<div class="cont-pd">
	<div class="grid grid-flow-row md:grid-cols-12 gap-3">
		<div class="md:col-span-3">
			<div id="cate-menu" class="col-span-3 pl-2">
				<h1 class="text-5xl">บล็อก</h1>
				<div class="flex flex-row md:flex-col side-nav-menu-blog" style="">
					<div onclick="show_info(0)" class="padding blog-menu cl-orange b-select">
						ทั้งหมด
					</div>
					<div onclick="show_info(1)" class="padding blog-menu">
						Art & Decorator
					</div>
					<div onclick="show_info(2)" class="padding blog-menu">
						Growgreen
					</div>
					<div onclick="show_info(3)" class="padding blog-menu">
						Lifestyle Seeker
					</div>
					<div onclick="show_info(4)" class="padding blog-menu">
						Money Maker
					</div>
					<div onclick="show_info(5)" class="padding blog-menu">
						Storyteller
					</div>
					<div onclick="show_info(6)" class="padding blog-menu">
						Tech Lover
					</div>
				</div>
			</div>
		</div>
		<div class="md:col-start-4 md:col-span-9 pl-3">
			
			<div id="show-all">
				
				<!--=== The Section Boxes : asw-art ===-->
				<section id="asw-art" class="padding-l-vtc">
					<div class="cont-pd">
						<div class="grid grid-cols-2">
							<div class="col-span-1 text-4xl">Art & Decorator</div>
							<div class="col-start-2 col-span-1 text-right"><a  onclick="select_all(1)"class="selected-all">ดูทั้งหมด</a></div>
						</div>
						<sp class=""></sp>
						<div class="grid grid-rows-2 md:grid-rows-none md:grid-cols-2 gap-4">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'art',
								'post_status' => 'publish',
								'posts_per_page' => 3, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							$chk = 0;
							while ( $loop->have_posts() ) : $loop->the_post(); 
								$featured_img = wp_get_attachment_image_src( $post->ID );
								if ($chk == 1) { ?>
									<div class="row-start-2 row-span-1 md:row-start-1 md:col-start-2 md:col-span-1">
										<div class="grid grid-rows-2 gap-4">
										<?php }
										if($chk == 0){ ?>
											<div class="row-span-1 md:col-span-1 overflow-hidden">
												<a href="<?=get_permalink();?>" class="relative blog-ani">
													<div class="col-span-6 bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
													</div>
													<div class="padding bottom-left">
														<span class="btn cl-orange bg-white round size-s">Art & Decorator</span>
														<br>
														<span class="b7"><?php the_title() ?></span>
														<br>
														<?php the_excerpt() ?>
														<sp class=""></sp>
													</div>
												</a>
											</div>
										<?php }
										else{ ?>
											<div class="row-span-1 <?php if($chk ==2){echo 'row-start-2';} ?>">
												<div class="grid grid-flow-row grid-cols-12 gap-3 bg-ci-grey-900 p-3 blog-wrap">
													<div class="col-span-4 overflow-hidden">
														<a href="<?=get_permalink();?>" class="">
															<div class="bg-cover blank center blog-ani" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
															</div>
															<!-- <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" style="height: 100%;width: 100%;object-fit: cover;" > -->
														</a>
													</div>
													<div class="col-start-5 col-span-8">
														<div class="">
															<a href="<?=get_permalink();?>" class="">
																<span class="cl-orange size-m">Art & Decorator</span>
																<br>
																<span class="size-l b7"><?php the_title() ?></span>

																<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
				</section>


				<!--=== The Section Boxes : grow-and-life ===-->
				<section id="grow-and-life" class="padding-l-vtc">
					<div class="cont-pd">
						<div class="grid md:grid-cols-2">
							<div id="asw-growgreen" class="col-span-1 py-6 md:pr-6 border-01">
								<div class="grid grid-cols-2">
									<div class="col-span-1 text-4xl">Growgreen</div>
									<div class="col-start-2 col-span-1 text-right"><a  class="selected-all">ดูทั้งหมด</a></div>
								</div>
								<sp class=""></sp>
								
								<div class="grid grid-flow-row gap-6">
									<?php 
									$args = array(  
										'post_type' => 'post',
										'category_name' => 'growgreen',
										'post_status' => 'publish',
										'posts_per_page' => 3, 
										'orderby' => 'date',
										'order'    => 'DESC',
									);

									$loop = new WP_Query( $args );
									$chk = 0;
									while ( $loop->have_posts() ) : $loop->the_post(); 
										$featured_img = wp_get_attachment_image_src( $post->ID );
										if($chk == 0){ ?>
											<div class="row-span-2">
												<a href="<?=get_permalink();?>" class="">
													<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
														<div class="padding bottom-left">
															<span class="btn cl-orange bg-white round size-s">Growgreen</span>
															<br>
															<span class="b7"><?php the_title() ?></span>
															<br>
															<?php the_excerpt() ?>
															<sp class=""></sp>
														</div>
													</div>
												</a>
											</div>
										<?php }
										else { ?>
											<div class="row-span-1">
												<div class="grid grid-cols-12 gap-3 bg-ci-grey-900 p-3">
													<div class="col-span-5">
														<a href="<?=get_permalink();?>" class="">
															<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
															</div>
														</a>
													</div>
													<div class="col-start-6 col-span-7">
														<div class="">
															<a href="<?=get_permalink();?>" class="">
																<span class="cl-orange size-m">Growgreen</span>
																<br>
																<span class="size-l b7"><?php the_title() ?></span>

																<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
							<div id="asw-lifestyle" class="col-span-1 md:col-start-2 py-6 md:pl-6 border-02">
								<div class="grid grid-cols-2">
									<div class="col-span-1 text-4xl">Lifestyle Seeker</div>
									<div class="col-start-2 col-span-1 text-right"><a href="/lifestyle" class="selected-all">ดูทั้งหมด</a></div>
								</div>
								<sp class=""></sp>
								<div class="grid grid-flow-row gap-6">
									<?php 
									$args = array(  
										'post_type' => 'post',
										'category_name' => 'lifestyle',
										'post_status' => 'publish',
										'posts_per_page' => 3, 
										'orderby' => 'date',
										'order'    => 'DESC',
									);

									$loop = new WP_Query( $args );
									$chk = 0;
									while ( $loop->have_posts() ) : $loop->the_post(); 
										$featured_img = wp_get_attachment_image_src( $post->ID );
										if($chk == 0){ ?>
											<div class="row-span-2 row-start-1 md:row-start-3">
												<a href="<?=get_permalink();?>" class="">
													<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
														<div class="padding bottom-left">
															<span class="btn cl-orange bg-white round size-s">Lifestyle Seeker</span>
															<br>
															<span class="b7"><?php the_title() ?></span>
															<br>
															<?php the_excerpt() ?>
															<sp class=""></sp>
														</div>
													</div>
												</a>
											</div>

										<?php }
										else{ ?>
											<div class="row-span-1">
												<div class="grid grid-cols-12 gap-3 bg-ci-grey-900 p-3">
													<div class="col-span-4">
														<a href="<?=get_permalink();?>" class="">
															<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
															</div>
														</a>

													</div>
													<div class="col-start-5 col-span-8">
														<div class="">
															<a href="<?=get_permalink();?>" class="">
																<span class="cl-orange size-m">Lifestyle Seeker</span>
																<br>
																<span class="size-l b7"><?php the_title() ?></span>

																<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
					</div>
				</section>


				<!--=== The Section Boxes : asw-money ===-->
				<section id="asw-money" class="padding-l-vtc">
					<div class="cont-pd">
						<div class="grid grid-cols-2">
							<div class="col-span-1 text-4xl">Money Maker</div>
							<div class="col-start-2 col-span-1 text-right"><a href="/money" class="selected-all">ดูทั้งหมด</a></div>
						</div>
						<sp class=""></sp>
						<div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 gap-4">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'money',
								'post_status' => 'publish',
								'posts_per_page' => 3, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							$chk = 0;
							while ( $loop->have_posts() ) : $loop->the_post(); 
								$featured_img = wp_get_attachment_image_src( $post->ID );
								if ($chk == 1) { ?>
									<div class="row-start-3 md:row-start-1 md:col-start-1 col-span-1">
										<div class="grid grid-flow-row gap-4">
										<?php }
										if($chk == 0){ ?>
											<div class="row-start-1 row-span-2 md:row-span-1 md:col-start-2 md:col-span-1">
												<a href="<?=get_permalink();?>" class="">
													<div class="col-span-6 bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
														<div class="padding bottom-left">
															<span class="btn cl-orange bg-white round size-s">Art & Decorator</span>
															<br>
															<span class="b7"><?php the_title() ?></span>
															<br>
															<?php the_excerpt() ?>
															<sp class=""></sp>
														</div>
													</div>
												</a>
											</div>
										<?php }
										else{ ?>
											<div class="row-span-1 <?php if($chk ==2){echo 'row-start-2';} ?>">
												<div class="grid grid-flow-row grid-cols-12 gap-3 bg-ci-grey-900 p-3">
													<div class="col-span-4">
														<a href="<?=get_permalink();?>" class="">
															<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
															</div>
															<!-- <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" style="height: 100%;width: 100%;object-fit: cover;" > -->
														</a>
													</div>
													<div class="col-start-5 col-span-8">
														<div class="">
															<a href="<?=get_permalink();?>" class="">
																<span class="cl-orange size-m">Art & Decorator</span>
																<br>
																<span class="size-l b7"><?php the_title() ?></span>

																<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
				</section>
				
				<!--=== The Section Boxes : story-and-tech ===-->
				<section id="story-and-tech" class="padding-l-vtc">
					<div class="cont-pd">
						<div class="grid md:grid-cols-2">
							<div id="asw-growgreen" class="col-span-1 py-6 md:pr-6 border-01">
								<div class="grid grid-cols-2">
									<div class="col-span-1 text-4xl">Storyteller</div>
									<div class="col-start-2 col-span-1 text-right"><a href="/storyteller" class="selected-all">ดูทั้งหมด</a></div>
								</div>
								<sp class=""></sp>
								
								<div class="grid grid-flow-row gap-4">
									<?php 
									$args = array(  
										'post_type' => 'post',
										'category_name' => 'storyteller',
										'post_status' => 'publish',
										'posts_per_page' => 3, 
										'orderby' => 'date',
										'order'    => 'DESC',
									);

									$loop = new WP_Query( $args );
									$chk = 0;
									while ( $loop->have_posts() ) : $loop->the_post(); 
										$featured_img = wp_get_attachment_image_src( $post->ID );
										if($chk == 0){ ?>
											<div class="row-span-3">
												<a href="<?=get_permalink();?>" class="">
													<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
														<div class="padding bottom-left">
															<span class="btn cl-orange bg-white round size-s">Storyteller</span>
															<br>
															<span class="b7"><?php the_title() ?></span>
															<br>
															<?php the_excerpt() ?>
															<sp class=""></sp>
														</div>
													</div>
												</a>
											</div>
										<?php }
										else { ?>
											<div class="row-span-1">
												<div class="grid grid-cols-12 gap-3 bg-ci-grey-900 p-3">
													<div class="col-span-5">
														<a href="<?=get_permalink();?>" class="">
															<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
															</div>
														</a>
													</div>
													<div class="col-start-6 col-span-7">
														<div class="">
															<a href="<?=get_permalink();?>" class="">
																<span class="cl-orange size-m">Storyteller</span>
																<br>
																<span class="size-l b7"><?php the_title() ?></span>

																<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
							<div id="asw-lifestyle" class="col-span-1 md:col-start-2 py-6 md:pl-6 border-02">
								<div class="grid grid-cols-2">
									<div class="col-span-1 text-4xl">Tech Lover</div>
									<div class="col-start-2 col-span-1 text-right"><a href="/teach" class="">ดูทั้งหมด</a></div>
								</div>
								<sp class=""></sp>
								<div class="grid grid-flow-row">
									<div class="flex flex-col md:flex-col-reverse gap-4">
										<?php 
										$args = array(  
											'post_type' => 'post',
											'category_name' => 'teach',
											'post_status' => 'publish',
											'posts_per_page' => 3, 
											'orderby' => 'date',
											'order'    => 'DESC',
										);

										$loop = new WP_Query( $args );
										$chk = 0;
										while ( $loop->have_posts() ) : $loop->the_post(); 
											$featured_img = wp_get_attachment_image_src( $post->ID );
											if($chk == 0){ ?>
												<div class="row-span-3">
													<a href="<?=get_permalink();?>" class="">
														<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');box-shadow: 0px -140px 70px -25px rgba(0, 0, 0, 0.7) inset;" ratio="1:1">
															<div class="padding bottom-left">
																<span class="btn cl-orange bg-white round size-s">Tech Lover</span>
																<br>
																<span class="b7"><?php the_title() ?></span>
																<br>
																<?php the_excerpt() ?>
																<sp class=""></sp>
															</div>
														</div>
													</a>
												</div>

											<?php }
											else{ ?>
												<div class="row-span-1">
													<div class="grid grid-cols-12 gap-3 bg-ci-grey-900 p-3">
														<div class="col-span-4">
															<a href="<?=get_permalink();?>" class="">
																<div class="bg-cover blank center" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID) ?>');" ratio="1:1">
																</div>
															</a>
															
														</div>
														<div class="col-start-5 col-span-8">
															<div class="">
																<a href="<?=get_permalink();?>" class="">
																	<span class="cl-orange size-m">Tech Lover</span>
																	<br>
																	<span class="size-l b7"><?php the_title() ?></span>

																	<div id="txt_20" class="txt-ex"><?php the_excerpt() ?></div>
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
						</div>
					</div>
				</section>

			</div>

			<div id="show-art">
				<!--=== The Section Boxes : art ===-->
				<section id="art" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Art & Decorator</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'art',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Art & Decorator</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

			<div id="show-growgreen">
				<!--=== The Section Boxes : growgreen ===-->
				<section id="growgreen" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Growgreen</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'growgreen',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Growgreen</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

			<div id="show-lifestyle">
				<!--=== The Section Boxes : lifestyle ===-->
				<section id="lifestyle" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Lifestyle Seeker</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'lifestyle',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Lifestyle Seeker</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

			<div id="show-money">
				<!--=== The Section Boxes : money ===-->
				<section id="money" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Money Maker</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'money',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Money Maker</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

			<div id="show-storyteller">
				<!--=== The Section Boxes : storyteller ===-->
				<section id="storyteller" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Storyteller</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'storyteller',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Storyteller</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

			<div id="show-teach">
				<!--=== The Section Boxes : teach ===-->
				<section id="teach" class="padding-l-vtc">
					<div class="cont-pd">
						<h3 class="text-4xl">Tech Lover</h3>
						<sp class=""></sp>
						<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
							<?php 
							$args = array(  
								'post_type' => 'post',
								'category_name' => 'teach',
								'post_status' => 'publish',
								'posts_per_page' => -1, 
								'orderby' => 'date',
								'order'    => 'DESC',
							);

							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="col-span-1 bg-ci-grey-900 pointer" onclick="location.href='<?= get_permalink()?>';">
									<div class="grid grid-rows-12">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID) ?>')"></div>
										<div class="row-span-6 p-4">
											<sp class=""></sp>
											<span class="cl-orange">Tech Lover</span>
											<sp class=""></sp>
											<span class="cl-ci-grey-200 text-2xl"><?php the_title() ?></span>
											<sp class=""></sp>
											<span id="txt_md" class="cl-ci-grey-300 text-xl">
												<?php the_excerpt() ?>
											</span>
											<sp class=""></sp>
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

		</div>
		<sp class="l"></sp>
	</div>
</div>




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
	var ttt = document.querySelectorAll("#txt_20");
	for (let i = 0; i < ttt.length; i++) {
		ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 30);
	}
	var tmd = document.querySelectorAll("#txt_md");
	for (let i = 0; i < tmd.length; i++) {
		tmd[i].innerHTML = txt_shorter(tmd[i].innerHTML, 70);
	}

	const blog = [];
	blog[0] = document.getElementById("show-all");
	blog[1] = document.getElementById("show-art");
	blog[2] = document.getElementById("show-growgreen");
	blog[3] = document.getElementById("show-lifestyle");
	blog[4] = document.getElementById("show-money");
	blog[5] = document.getElementById("show-storyteller");
	blog[6] = document.getElementById("show-teach");

	function show_info(num){
		for(let i = 0; i < blog.length; i++){
			if(i == num)
				blog[i].style.display = "block";
			else
				blog[i].style.display = "none";
		}
	}

	// Add active class to the current button (highlight it)
	var btns = document.getElementsByClassName("blog-menu");
	for (var i = 0; i < btns.length; i++) {
		btns[i].addEventListener("click", function() {
			var current = document.getElementsByClassName(" cl-orange b-select");
			current[0].className = current[0].className.replace(" cl-orange b-select", "");
			this.className += " cl-orange b-select";
		});
	}

	// var cate_menu = document.getElementsByClassName("side-nav-menu-blog");
	var selectedAll = document.getElementsByClassName("selected-all");
	for (var i = 0; i < selectedAll.length; i++) {
		selectedAll[i].addEventListener("click", function() {
			var current = document.getElementsByClassName("blog-menu cl-orange b-select");
			current[0].className = current[0].className.replace(" cl-orange b-select", "");
			// btns[0].className += " cl-orange b-select";
		});
	}

	function current_btn(){
		xconsolex.log('xxx')
	}
	function select_all(num){
		
		current_btn()

	}

	
</script>


