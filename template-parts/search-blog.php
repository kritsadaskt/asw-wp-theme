<?php 
global $wp_query;
$s_style = $args[0];
$keyword = $_GET['s'];
$arg = array('s' => $keyword,'post_type' => 'post','posts_per_page'=>-1);
$allsearch = new WP_Query($arg); 
?>
<section class="search-section" data-count="<?=$allsearch->post_count?>">
	<div class="search-section-top">
		<div class="-l">
			<h2 class="search-count-text"><?php pll_e('บล็อก')?> <span class="search-count-top">- <span class="search-count-num"><?=$allsearch->post_count?></span> <?php pll_e('รายการ')?></span></h2>
		</div>
		<div class="-r">
			<a  class="see-more selected-all f30-28" href="/<?=pll_current_language()?>/?s=<?=$keyword?>&focus=blog">
				<h5 class="inline-block cl-ci-blue-300"><?php pll_e('ดูทั้งหมด')?></h5>
				<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block" style="width:30px">
			</a>
		</div>
	</div>
	<?php 
	if ( $allsearch->have_posts() ) : 
		$con = 0;
		echo '<div class="grid home-news-cards-wrap md:grid-cols-3 items-stretch gap-7">';
		while ( $allsearch->have_posts() AND $con < 3 OR $s_style == 'long' AND $con < $allsearch->post_count) : $allsearch->the_post();
			$v = get_postdata($post->ID);
			$featured_img = get_the_post_thumbnail_url($post->ID, 'medium-large-thumb');
			$cate_name = wp_get_post_categories($post->ID, ['fields' => 'all']);
			?>
			<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="<?=$con%3?>00" class="bg-ci-grey-900 home-blog-card pointer box-blog box-blog-<?=$con?>" style="z-index: 3;">
				<a href="<?= get_permalink() ?>" class="">
					<div class="home-blog-card-x grid grid-cols-12 md:grid-cols-1 md:grid-rows-12">
						<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6 blog-mini-pic" ratio="1:1" style="background-image:url('<?=$featured_img ?>')"></div>

						<div class="home-blog-inner col-span-7 md:col-span-1 md:row-span-5  md:px-4 p-3">
							<div class="home-blog-inner-info">
								<span class="b7 cl-ci-orange-500 size-s" onclick="location.href='/<?= $cate_name[0]->slug; ?>'" style="line-height: 20px;font-size: 18px;">
									<?php
									echo $cate_name[0]->name;
									?>
								</span>
								<sp class="xs"></sp>
								<span class="blog-txt-shorter">
									<p class="blog-title f30-24"><?php the_title() ?></p>
								</span>
								<sp class="hidden"></sp>
								<span id="txt_20" class="hidden md:block mt-3 cl-ci-grey-300">
									<div class="line-clamp-2"><?php the_excerpt() ?></div>
								</span>
							</div>
						</div>
					</div>
				</a>
			</div>
			
			<?php
			$con++;
		endwhile; 
		echo '</div>';
	else : 
	endif; 
	?>
	<div>
		<div class="sec-line"></div>
	</div>
</section>
<script type="text/javascript">$(`[data-value="blog"]`).dataset.count = <?=$allsearch->post_count?></script>