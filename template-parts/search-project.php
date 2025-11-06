<?php 
global $wp_query;
$s_style = $args[0];
$keyword = $_GET['s'];
$kw = explode(' ',$keyword);
$kwSize = sizeof($kw);

$result = [];
$result_count = [];

foreach ($kw as $kwi => $kwv) {
	$loop_result = [];
	$result_1_ids = [];
	$arg = array('s' => $kwv,'post_type' => ['condominium','house'],'posts_per_page'=>100,'post_parent' => 0,'tax_query' => array(
		array(
			'taxonomy'  => 'private-project',
			'field'     => 'slug',
			'terms'     => 'private',
			'operator'  => 'NOT IN')

	),);
	$allsearch = new WP_Query($arg);

	foreach ($allsearch->posts as $ak => $av) {
		if ($private->slug != 'private') {
			array_push($loop_result, $av);
			array_push($result_1_ids,$av->ID);
		}
		
	}


	$termIds = get_terms([
		'name__like' => $kwv,
		'fields' => 'ids'
	]);

	$termAll = get_terms([
		'name__like' => $kwv,
		'fields' => 'all'
	]);
	$tag_search_arg = array( 
		'post_type' => ['condominium','house'],'posts_per_page'=>200,'post_parent' => 0,
		'tax_query' => [
			[
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $termIds,
			]
		]
	);

	$tag_search = get_posts( $tag_search_arg );
	foreach ($tag_search as $ak => $av) {
		if (!in_array($av->ID, $result_1_ids)) {
			// echo ' not found add new';
			array_push($loop_result, $av->ID);
			array_push($result_1_ids,$av->ID);
			array_push($result, $av);
		}else{
			// echo ' dup';
		}
	}

	foreach ($result_1_ids as $rk => $rv) {
		if ($result_count[$rv] == '') {
			$result_count[$rv] = 1;
		}else{
			$result_count[$rv]++;
		}
	}
}
foreach ($loop_result as $lk => $lv) {

	if ($result_count[$lv->ID] == $kwSize) {
		array_push($result, $lv);
	}
}

$post_size = sizeof($result);
?>
<section class="search-section" data-count="<?=$post_size?>">
	<div class="search-section-top">
		<div class="-l">
			<h2 class="search-count-text"><?php pll_e('โครงการ')?> <span class="search-count-top">- <span class="search-count-num"><?=$post_size?></span> <?php pll_e('รายการ')?></span></h2>
		</div>
		<div class="-r">
			<a  class="see-more selected-all f30-28" href="/<?=pll_current_language()?>/?s=<?=$keyword?>&focus=project">
				<h5 class="inline-block cl-ci-blue-300"><?php pll_e('ดูทั้งหมด')?></h5>
				<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block" style="width:30px">
			</a>
		</div>
	</div>
	<?php 
	if ( $post_size>0) : 
		$con = 0;
		echo '<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-8 vst-wrap">';
		// while ( $allsearch_arr->have_posts() AND $con < 3 OR $s_style == 'long' AND $con < $post_size) : $allsearch_arr->the_post();


		// endwhile; 
		foreach ($result as $key => $value) {
			if ($s_style == 'long' OR $con<3) {
				$post = $value;
				$pj = get_postdata($post->ID);
				$logo = get_field('logo',$pj->ID)['sizes']['medium'];
				$price = get_field('price',$pj->ID);
				$line = get_field('line_id',$pj->ID);
				$status = get_the_terms($pj->ID,'project_status')[0]->name;
				$status_slug = get_the_terms($pj->ID,'project_status')[0]->slug;
				$location = get_the_terms($pj->ID,'project_location');
				foreach ($location as $pjt_k => $pjt_v) {
					if ($pjt_v->parent == 0) {
						$location_parent = $pjt_v;
					}else{
						$location_child = $pjt_v;
					}
				}
				$location = $location_child->name;
				$type = $pj['post_type'];
				if ($type == 'condominium') {
					$type_name = pll__('คอนโดมีเนียม');
				}
				else if ($type == 'house') {
					$type_name = pll__('บ้านและทาวน์โฮม');
				}
				$fim =  get_the_post_thumbnail_url($pj->ID, 'large');
				?>
				<div data-compare-selected="0" class="home-project-card -for-search bg-white card-360 -card-360-max" data-aos="fade-up" data-aos-duration="500" data-aos-delay="<?=$con%3?>00" style="--fim:url(<?=$fim?>)" data-status_slug="<?=$status_slug?>" data-type="<?=$type?>">
					<div class="-header">
						<div class="-pj-status"><?=$status?></div>
						<div class="-pj-logo" style="--pj-logo:url(<?=$logo?>)"></div>
					</div>
					<div class="-inner">
						<a  target="_blank" href="<?=get_permalink()?>" class="">
							<div class="-inner-img">
								<div class="-fim"></div>
								<div class="-content">
									<div class="-cont-footer">
										<div class="-l">
											<div class="-type">
												<?=$type_name?>
											</div>
											<div class="-location">
												<?=$location?>
											</div>
										</div>
										<div class="-r">
											<div><?php pll_e('เริ่มต้น')?></div>
											<div class="-price"><?=$price?></div>
											<div><?php pll_e('ล้านบาท')?></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="-pj-cp" data-compare-id="<?=$pj->ID?>" onclick="cp_add_project(`<?=$pj->ID?>`,`<?=$pj->post_name?>`,`<?=$pj->post_title?>`)">
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
			$con++;
		}
		echo '</div>';
	else : 
	endif; 
	?>
	<div>
		<div class="sec-line"></div>
	</div>
</section>
<script type="text/javascript">$(`[data-value="project"]`).dataset.count = <?=$post_size?></script>