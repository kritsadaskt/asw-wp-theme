<?php
get_header();
global $pagewidth;
$fim = get_the_post_thumbnail_url($post,'full');
$arg = array('post_type' => '360-virtual-tour','posts_per_page'=>-1);
$allsearch = new WP_Query($arg); 
?>
<style type="text/css">
	.subhead{
		background: linear-gradient(to bottom, #EDF2F7 0%, #FFFFFF 103.44%);
		position: relative;
		background-color: #fff;
	}
	.subhead .-img{
		width: 370px;
	}
	.subhead .-title{
		font-style: normal;
		font-weight: 400;
		font-size: 48px;
		line-height: 48px;
		color: #323A41;
	}
	.subhead .-subtitle{
		font-style: normal;
		font-weight: 400;
		font-size: 26px;
		line-height: 32px;
		color: #545E67;
	}
	.-leaf1 {
		background-image: url(/wp-content/uploads/2023/04/image-443.png);
		width: 220px;
		height: 100%;
		position: absolute;
		left: 0;
		top: 0;
		background-repeat: no-repeat;
	}
	.-leaf2{
		background-image: url(/wp-content/uploads/2023/04/image-447.png);
		width: 200px;
		height: 300%;
		position: absolute;
		right: 0;
		background-repeat: no-repeat;
		top: -340px;
	}
	.-body{
		background-color: #EDF2F7;
		padding: 70px 0;
	}
	.vst-wrap{
		margin: 32px 0;
	}

	
	.vst-wrap[data-type="house"] .card-360[data-type="condominium"],
	.vst-wrap[data-type="condominium"] .card-360[data-type="house"]{
		display: none;
	}
	.sticky-menu{
		position: sticky;
		top: calc(0.5em + 70px);
	}
	html{
		overflow: visible;
	}
	.num-count-text{
		font-size: 28px;
	}
	.box-fil-date{
		border: 1px solid var(--ci-grey-800);
		border-radius: 8px;
		background-color: white;
		color: var(--ci-grey-100);
		padding: 10px 16px;
		display: flex;
		flex-direction: row;
		align-items: center;
	}
	.box-fil-date .-arrow{
		height: .5rem;
		margin-left: 40px;
		transition: .5s;
	}
	#sortby-box-wrap[data-toggle="1"] .-arrow{
		rotate: -180deg;
	}
	#sortby-box-wrap[data-toggle="1"] .-choise{
		display: block;
	}
	.box-fil-date .-choise{
		position: absolute;
		top: 52px;
		left: 0;
		z-index: 10;
		width: 100%;
		background-color: white;
		padding: 16px 0px;
		color: var(--ci-grey-100);
		border-radius: 8px;
		border: 1px solid var(--ci-grey-800);
		display: none;
	}
	.box-fil-date .-choise div{
		padding:8px 16px;
	}
	.sortby-box{
		display: none;
	}
	#sortby-box-wrap[data-sorttype="date"][data-sortby="1"] .sortby-box[data-sorttype="date"][data-sortby="1"],
	#sortby-box-wrap[data-sorttype="date"][data-sortby="-1"] .sortby-box[data-sorttype="date"][data-sortby="-1"],
	#sortby-box-wrap[data-sorttype="price"][data-sortby="-1"] .sortby-box[data-sorttype="price"][data-sortby="-1"],
	#sortby-box-wrap[data-sorttype="price"][data-sortby="1"] .sortby-box[data-sorttype="price"][data-sortby="1"]{
		display: block;
	}
	.-arrow-c{
		height: .3rem;
		transform:rotate(-90deg);
		display: inline-block;
	}
	.card-360-sort{
		order: calc(var(--o-i) * var(--o-b));
	}
	.card-360-hover{
		transition: .5s;
	}
	.card-360-hover{
		background-color: #0008;
		width: 100%;
		height: 100%;
		position: absolute;
		opacity: 0;
		transition: .5s;
	}
	.card-360-img-hover{
		width: 100px;
		position: absolute;
		left: 0;
		right: 0;
		top: 0;
		bottom: 0;
		margin: auto;
		transition: .5s;
	}

	.card-360:hover .card-360-hover{
		opacity: 1;
	} 
</style> 
<?php while ( have_posts() ) : the_post(); ?>
	<img src="<?=$fim?>" class="w-full">
	<div class="subhead">
		<div class="-leaf1"></div>
		<div class="-leaf2"></div>
		<div class="cont-pd pt-6 flex flex-row items-center">
			<a href="/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
			<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
			<a href="/condominium" class="">360 Visual Gallery</a>
		</div>
		<div class="mx-auto max-w-4xl grid grid-cols-12 gap-8 pb-9 items-center">
			<div class="col-span-12 md:col-span-5">
				<img src="<?=get_field('360_img')['sizes']['large']?>" class="-img">
			</div>
			<div class="col-span-12 md:col-span-7 px-4 md:px-0">
				<h3 class="-title"><?=get_field('360_title')?></h3>
				<h4 class="-subtitle"><?=get_field('360_subtitle')?></h4>
			</div>
		</div>
	</div>
	<div class="main-body -body">

		<div id="primary" class="content-area">
			<main id="main" class="site-main -hide-title">

				<div class="cont-pd">
					<div class="-body-w-side">
						<div class="vst-side">
							<div class="sticky-menu">
								<h1 class="mb-8"><?php pll_e('ประเภท')?><sp class="px hidden lg:block"></sp><?php pll_e('โครงการ')?></h1>
								<aside class="dynamic-side-nav" data-selected="0">
									<ul class="">
										<li><div data-value="all" onclick="filter_pj(this)"><?php pll_e('โครงการทั้งหมด')?></div></li>
										<li><div data-value="condominium" onclick="filter_pj(this)"><?php pll_e('คอนโดมีเนียม')?></div></li>
										<li><div data-value="house" onclick="filter_pj(this)"><?php pll_e('บ้านและทาวน์โฮม')?></div></li>
									</ul>
									<div class="-runner"></div>
								</aside>
							</div>
						</div>
						<div>
							<div class="grid grid-rows-2 md:grid-rows-1 md:grid-cols-2 flex items-center">
								<div class="row-span-1 md:col-span-1">
									<h1><span class="filter_txt"><?php pll_e('โครงการทั้งหมด')?> </span><span class="num-count-text">- <span class="num-count"><?=$allsearch->post_count?></span> <?php pll_e('รายการ')?></span></h1>
								</div>
								<div class="row-span-1 md:col-span-1 flex justify-end">
									<div id="sortby-box-wrap" class="box-fil-date pointer relative" data-sortby="-1" data-sorttype="date" onclick="turnon_sorting()" data-toggle="-1">
										<span class="sortby-box" data-sortby="-1" data-sorttype="date">
											<?php pll_e('เรียงตามโครงการใหม่')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('เก่า')?>
										</span>
										<span class="sortby-box" data-sortby="1" data-sorttype="date">
											<?php pll_e('เรียงตามโครงการเก่า')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('ใหม่')?>
										</span>
										<span class="sortby-box" data-sortby="-1" data-sorttype="price">
											<?php pll_e('เรียงตามราคาเริ่มต้นสูง')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('ต่ำ')?>
										</span>
										<span class="sortby-box" data-sortby="1" data-sorttype="price">
											<?php pll_e('เรียงตามราคาเริ่มต้นต่ำ')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('สูง')?>
										</span>
										<img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow">
										<div class="-choise">
											<div class="-choise-1" onclick="sorting_pp('date',-1)">
												<?php pll_e('เรียงตามโครงการใหม่')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('เก่า')?>
											</div>

											<div class="-choise-2" onclick="sorting_pp('date',1)">
												<?php pll_e('เรียงตามโครงการเก่า')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('ใหม่')?>
											</div>

											<div class="-choise-3" onclick="sorting_pp('price',-1)">
												<?php pll_e('เรียงตามราคาเริ่มต้นสูง')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('ต่ำ')?>
											</div>

											<div class="-choise-4" onclick="sorting_pp('price',1)">
												<?php pll_e('เรียงตามราคาเริ่มต้นต่ำ')?> <img src="/wp-content/uploads/2022/10/Vector.png" class="-arrow-c"> <?php pll_e('สูง')?>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="grid md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8 vst-wrap" data-filter="all">
								<?php 
								if ( $allsearch->have_posts() ) : 
									while ( $allsearch->have_posts()) : $allsearch->the_post();
										$f = get_fields();
										$pj = get_field('project')[0];
										$pjf = get_fields($pj->ID);
										$logo = $pjf['logo']['sizes']['medium'];
										$price = $pjf['price'];
										if ($price == 0) {
											$price_sort = 0;
										}else{
											$price_sort = $price*100;
										}
										$line = $pjf['line_id'];
										$status = get_the_terms($pj->ID,'project_status')[0]->name;
										$status_slug = get_the_terms($pj->ID,'project_status')[0]->slug;
										$location = get_the_terms($pj->ID,'project_location')[0]->name;
										$type = $pj->post_type;
										if ($type == 'condominium') {
											$type_name = 'คอนโดมีเนียม';
										}
										else if ($type == 'house') {
											$type_name = 'บ้านและทาวน์โฮม';
										}
										$fim =  get_the_post_thumbnail_url($pj->ID, 'large');
										$date_sort = get_post_timestamp($pj);
										$linkto = '';
										if ($f['type_360'] == 'link-out') {
											$linkto = $f['link_out'];
										}else{
											$linkto = get_permalink($pj->ID)."#video";
										}
										?>
										<div class="bg-white card-360 card-360-sort" data-price="<?=$price_sort?>"
											data-date="<?=$date_sort?>"
											style="--fim:url(<?=$fim?>);--o-i:<?=$date_sort?>;--o-b:-1;" data-status_slug="<?=$status_slug?>" data-type="<?=$type?>">
											<div class="-header">
												<div class="-pj-status"><?=$status?></div>
												<div class="-pj-logo" style="--pj-logo:url(<?=$logo?>)"></div>
											</div>
											<div class="-inner">
												<a href="<?=$linkto?>" >
													<div class="-inner-img">
														<div class="-fim"></div>
														<div class="card-360-hover">
															<img id="360-img-hover" class="card-360-img-hover" src="/wp-content/uploads/2023/05/icon-360.png">
														</div>
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
											<style>
												.no-360-file{
													grid-template-columns: 1fr !important;
													padding-top: 1rem;
												</style>
												<?php
												$class = ""; 
												if (!$file) {
													$class = "no-360-file";
												}
												?>
												<div id="book_project" class="-footer <?=$class?>">
													<a class="-contact hover:bg-ci-blue-800" href="<?=$line?>" target="_blank">
														<i class="-line"></i>
														<span class=""><?php pll_e('สอบถาม')?></span>
													</a>
													<div class="-booking-box">
														<a href="<?=$linkto?>" class="-booking">
															<img class="img-text" src="/wp-content/uploads/2023/05/360-vector.png" style="text-align: center">
														</a>
													</div>
												</div>
											</div>
											<?php
										endwhile; 
									else : 
									endif; 
									?>
								</div>
							</div>
						</div>
					</div>

				</main>
			</div>
		</div>
	<?php endwhile; ?>
	<script type="text/javascript">
		function filter_pj(el){
			let val = el.dataset.value
			let txt = el.innerText
			$('.filter_txt').innerText = txt+' ';
			$('.vst-wrap').dataset.type = val
			let c = $$(`.card-360-sort`).length
			if (val != 'all') {
				c = $$(`.card-360-sort[data-type="${val}"]`).length
			}
			$('.num-count').innerText = c

		}
	</script>

	<script type="text/javascript">
		function turnon_sorting() {
			$('#sortby-box-wrap').dataset.toggle *= -1
		}
		function sorting_pp(d,p){
			$('#sortby-box-wrap').dataset.sortby = p
			$('#sortby-box-wrap').dataset.sorttype = d
			reOrder()
		}
		function reOrder(){
			el = $$('.card-360-sort')
			for(let i of el){
				i.style.setProperty('--o-b',$('#sortby-box-wrap').dataset.sortby)
				let otype = $('#sortby-box-wrap').dataset.sorttype
				i.style.setProperty('--o-i',i.dataset[otype])
			}
		}
	</script>
	<?php get_footer(); ?>