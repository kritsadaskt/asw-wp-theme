<?php 
global $wp_query;
$s_style = $args[0];
$keyword = $_GET['s'];
$arg = array('s' => $keyword,'post_type' => 'news','posts_per_page'=>-1);
$allsearch = new WP_Query($arg); 
?>
<section class="search-section" data-count="<?=$allsearch->post_count?>">
	<div class="search-section-top">
		<div class="-l">
			<h2 class="search-count-text"><?php pll_e('ข่าวสาร')?> <span class="search-count-top">- <span class="search-count-num"><?=$allsearch->post_count?></span> <?php pll_e('รายการ')?></span></h2>
		</div>
		<div class="-r">
			<a  class="see-more selected-all f30-28" href="/<?=pll_current_language()?>/?s=<?=$keyword?>&focus=news">
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
			$cl = 'orange';
			if ($con%3 == 1) {
				$cl = 'veri';
			}
			$featured_img = get_the_post_thumbnail_url($value->ID, 'medium-large-thumb');
			$v = get_postdata($post->ID);
			?>
			<div class="col-span-1 news-item-0 relative" data-aos="fade-up" data-aos-duration="500" data-aos-delay="<?=$con%3?>00">
				<div class="line05"></div>
				<div class="bg-ci-grey-900 h-full px-4 py-6 relative pointer" onclick="location.href='<?= get_permalink() ?>'">
					<?php if ($con%3!=1): ?>
						<div class="row-span-6 relative">
							<div class="line04-sq -con<?=$con?> bg-ci-<?=$cl?>-500"></div>
							<div style="overflow: hidden;">
								<div class="bg-cover blank" ratio="1:1" style="background-image:url('<?=$featured_img?>');">
								</div>
							</div>
						</div>
						<sp class="rm"></sp>
					<?php endif ?>
					<div class="row-span-5"><h5 class="b5 news-title line-clamp-2"><?= get_the_title() ?></h5>
						<sp class=""></sp>
						<span id="" class="txt_120 cl-ci-grey-300 line-clamp-2">
							<p><?= the_excerpt() ?></p>
						</span>
						<sp class="rem-2"></sp>
						<a href="<?= get_the_permalink() ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
						<sp class=""></sp>
						<sp class="s  bg-ci-<?=$cl?>-500" style="height: 4px;width: 15%"></sp>
						<sp class=""></sp>
					</div>
					<div class="home-news-date-sp"></div>
					<?php if ($con%3==1): ?>
						<div class="row-span-6 relative">
							<div class="line04-sq -con<?=$con%3?>  bg-ci-<?=$cl?>-500"></div>
							<div style="overflow: hidden;">
								<div class="bg-cover blank" ratio="1:1" style="background-image:url('<?=$featured_img?>');">
								</div>
							</div>
							<sp class="rm"></sp>
						</div>
					<?php endif ?>
					<div class="row-span-1 cl-ci-grey-300 home-news-date">
						<?=asw_date_format($v['Date'])?>
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
<script type="text/javascript">$(`[data-value="news"]`).dataset.count = <?=$allsearch->post_count?></script>