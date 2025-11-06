<?php 
global $wp_query;
$s_style = $args[0];
$keyword = $_GET['s'];
$arg = array('s' => $keyword,'post_type' => 'promotion','posts_per_page'=>-1,'post_parent'=>0,'tax_query' => array(
	array(
		'taxonomy'  => 'private-project',
		'field'     => 'slug',
		'terms'     => 'private',
		'operator'  => 'NOT IN'
	)
),);
$allsearch = new WP_Query($arg); 
?>
<section class="search-section" data-count="<?=$allsearch->post_count?>">
	<div class="search-section-top">
		<div class="-l">
			<h2 class="search-count-text"><?php pll_e('โปรโมชัน')?> <span class="search-count-top">- <span class="search-count-num"><?=$allsearch->post_count?></span> <?php pll_e('รายการ')?></span></h2>
		</div>
		<div class="-r">
			<a  class="see-more selected-all f30-28" href="/<?=pll_current_language()?>/?s=<?=$keyword?>&focus=promotion">
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
			$featured_img = get_field('banner_mobile',$post->ID)['sizes']['medium-large-thumb'];
			if ($featured_img == '') {
				$featured_img = get_the_post_thumbnail_url($post->ID,'medium-large-thumb');
			}
			$cate_name = wp_get_post_categories($post->ID, ['fields' => 'all']);
			$detail = get_field('card_caption');
			?>
			<div data-aos="fade-up" data-aos-duration="500" data-aos-delay="<?=$con%3?>00" class="home-blog-card pointer box-blog box-blog-<?=$con?>" style="z-index: 3;">
				<div class="home-blog-card-x grid grid-cols-12 md:grid-cols-1  bg-white shadow">
					<a href="<?= get_permalink() ?>" target="_blank" class="">
						<div class="bg-cover blank col-span-5 md:col-span-1 md:row-span-6 blog-mini-pic" ratio="1:1" style="background-image:url('<?=$featured_img ?>')"></div>
					</a>

					<div class="home-blog-inner col-span-7 md:col-span-1 md:row-span-5  md:px-4 p-3">
						<div class="home-blog-inner-info">
							<span class="blog-txt-shorter">
								<p class="blog-title f30-24 line-clamp-1"><?php the_title() ?></p>
							</span>
							<sp class="hidden"></sp>
							<span id="txt_20" class="hidden md:block mt-3 cl-ci-grey-300">
								<div class="line-clamp-1"><?=$detail ?></div>
							</span>
							<sp class=""></sp>
							<div>
								<a href="<?= get_permalink() ?>" class="cl-ci-veri-300"><?php pll_e('อ่านเพิ่มเติม')?></a>
							</div>
						</div>
					</div>
				</div>
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
<script type="text/javascript">$(`[data-value="promotion"]`).dataset.count = <?=$allsearch->post_count?></script>