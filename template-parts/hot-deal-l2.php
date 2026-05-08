<?php 
$id = get_the_ID();
$fim = get_the_post_thumbnail_url($id,'1536x1536');
$cp = get_post_parent();
$pj_f = get_field('hot_deal_l2');
$pj_content = get_field('content',$pj_f['project'][0]->ID);
$cp_pj_un_arg = array('post_type' => 'hot-deal','posts_per_page'=>-1,'post_parent'=>$id);
$cp_pj_un = new WP_Query($cp_pj_un_arg);
$theme_img = get_site_url().'/wp-content/themes/seed-spring/img';
$pj_gallery = '';
$pj_location = '';
$logo = get_field('logo',$pj_f['project'][0]->ID)['sizes']['large'];

$cp_pj_arg = array('post_type' => 'hot-deal', 'posts_per_page' => -1, 'post_parent' => $cp->ID);
$cp_pj = new WP_Query($cp_pj_arg);
$cp_pj_size = $cp_pj->found_posts;
foreach ($pj_content as $k => $v) {
	if ($v['acf_fc_layout'] == 'gallery') {
		$pj_gallery = $v;
	}else if ($v['acf_fc_layout'] == 'location') {
		$pj_location = $v;
	}
}

?>
<?php 

if ($cp_pj_size<2) {
	get_template_part('template-parts/hot-deal-l1','header',[
		"cp_id" => $cp->ID,
		"cp_title" => $cp->post_title
	]);
	?>
	<div class="hd-l2-1pj-header">
		<div class="cont mx-auto">
			<h1><?=get_the_title()?></h1>
		</div>
	</div>
	<?php
}
?>
<style type="text/css">
	#content{
		--bg-color:#EDF2F6;
	}
	.cp-parent{
		border-radius: 40px;
		border: 1px solid var(--veridian-veridian-600, #47CBC7);
		background: var(--white, #FFF);
		color: var(--veridian-veridian-200, #055E5B);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px; /* 127.273% */
		padding: 2px 12px;
		display: inline-block;
	}
	.cpj-title{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 56px;
		font-style: normal;
		font-weight: 400;
		line-height: 56px; /* 100% */
		margin-top: 26px;
		margin-bottom: 8px;
	}
	#hd-l2-header{
		padding-bottom: 36px;
		background-color: #fff;
	}
	#cpj-units {
		background-color: #EDF2F6;
		padding: 45px 0;
	}
	.pj-unit-wrap{
		margin-top: 1rem;
	}
	.-nav-a-check{
		position: relative;
		top: 10px;
	}
	.nearby-header-wrap {
		display: grid;
		grid-template-columns: 2rem auto 2rem;
		align-items: center;
	}
	.nearby-header-wrap[data-short="1"]{
		grid-template-columns: auto;
	}
	.nearby-header-wrap[data-short="1"] .-arrow{
		display: none;
	}
	.nearby-header-wrap .-arrow{
		cursor: pointer;
	}
	.nearby-header-wrap .-arrow.-r svg{
		transform: rotate(-90deg);
	}
	.nearby-header-wrap .-arrow.-l svg{
		transform: rotate(90deg);
	}
	.nearby-header-wrap .-arrow.-r {
		display: flex;
		justify-content: end;
	}
	.tab-slider{
		transition: all .3s;
		transform: translateX(calc(-5rem * var(--i)));
	}
</style>
<main class="main-pj">
	<?php 
	$hotdealnav = [];
	$hotdealnav['layer'] = 2;
	$hotdealnav['logo'] = $logo;
	get_template_part('template-parts/hot-deal','nav',$hotdealnav);
	?>
	<?php 

	if ($cp_pj_size<2) {
		?>
		<div class="hd-l2-1pj-header-mob">
			<div class="cont mx-auto">
				<h1><?=get_the_title()?></h1>
			</div>
		</div>
		<?php
	}
	?>
	<div class="body-nav">
		<div class="-nav-a-check -nav-unit"></div>
		<section id="hd-l2-header" data-aos="fade-up" data-aos-once="false">
			<div class="cont">
				<h1 class="cpj-title"><?=get_the_title()?></h1>
				<a href="<?=get_permalink($cp->ID)?>" class="cp-parent">
					<?=$cp->post_title?>
				</a>
			</div>
		</section>
		<div class="-nav-a-check -nav-unit-2"></div>
		<section id="cpj-units" class="l2-units">
			<div class="cont">
				<?php pll_e('ยูนิตในโครงการ') ?> - <?=$cp_pj_un->post_count?> <?php pll_e('ยูนิต') ?></h2>
				<div class="pj-unit-wrap">
					<div class="-units">
						<?php foreach ($cp_pj_un->posts as $key => $value) {
							get_template_part('template-parts/hot-deal','unit-card',$value);
						} ?>
					</div>
				</div>
			</div>
		</section>


		<?php 
		$gallSize = ofsize($pj_gallery['gallery']);
		$moreSize = 0;
		if ($gallSize>5) {
			$moreSize = $gallSize-5;
		}
		?>
		<style type="text/css">
			section#gallery {
				background: linear-gradient(0deg, #fff, #EDF2F6);
				margin-top: 1.5rem;
			}
			.pj-detail-gallery{
				display: grid;
				grid-template-columns: repeat(4,1fr);
				grid-auto-rows: 1fr;
				grid-gap: 8px;
				grid-template-areas: 
				"a c c d"
				"b c c e"
				;

			}
			.pj-detail-gallery .--a{grid-area: a;}
			.pj-detail-gallery .--b{grid-area: b;}
			.pj-detail-gallery .--c{grid-area: c;}
			.pj-detail-gallery .--d{grid-area: d;}
			.pj-detail-gallery .--e{grid-area: e;}
			.pj-detail-gallery > div{
				display: flex;
			}
			.pj-detail-gallery > div > .--inner{
				background-color: #999;
				padding-top: 53.47%;
				position: relative;
				width: 100%;
				display: flex;
			}
			.pj-detail-gallery > .--c > .--inner{
				padding-top: 55.89%;
			}

			.pj-detail-gallery .-img{
				position: absolute;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0;
				cursor: pointer;
				background-image: var(--img);
				background-size: cover;
				background-position: center;
			}
			.cpj-subtitle{
				color: var(--grey-grey-200-emphasize, #323A41);
				font-size: 48px;
				font-style: normal;
				font-weight: 400;
				line-height: 48px;
			}
			.pj-detail-gallery .--e .-img::after {
				content: "+<?=$moreSize?>";
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				width: 100%;
				background: #1414149a;
				color: #fff;
				font-size: 56px;
				font-style: normal;
				font-weight: 400;
				line-height: 56px;
				display: flex;
				align-items: center;
				justify-content: center;
				pointer-events: none;
			}
		</style>
		<div class="-nav-a-check -nav-gall"></div>
		<section id="gallery" data-aos="fade-up" data-aos-once="false">
			<div class="cont">
				<h2 class="cpj-subtitle mb-5"><span data-lang="th"><?php pll_e('แกลเลอรี') ?></span></h2>
			</div>
			<div class="pj-detail-gallery" data-max="<?=$gallSize?>">
				<div class="--a">
					<div class="--inner">
						<article class="-img jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][0]['sizes']['large']?>')"></article>
					</div>
				</div>
				<div class="--b">
					<div class="--inner">
						<article class="-img jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][1]['sizes']['large']?>')"></article>
					</div>
				</div>
				<div class="--c">
					<div class="--inner">
						<article class="-img jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][2]['sizes']['large']?>')"></article>
					</div>
				</div>
				<div class="--d">
					<div class="--inner">
						<article class="-img jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][3]['sizes']['large']?>')"></article>
					</div>
				</div>
				<div class="--e">
					<div class="--inner">
						<article class="-img jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][4]['sizes']['large']?>')"></article>
					</div>
				</div>
			</div>
		</section>
		<span class="hidden">
			<?php for ($i=5; $i <  $gallSize; $i++) { 
				?>
				<div class="jb-lightbox" data-jb-lightbox="d" style="--img:url('<?=$pj_gallery['gallery'][$i]['sizes']['large']?>')"></div>
				<?php
			} ?>
		</span>
		<div class="-nav-a-check -nav-info"></div>
		<section id="detail" data-aos="fade-up" data-aos-once="false">

			<style type="text/css">

				#detail {
					background-color: #FFF;
					padding: 45px 0;
				}
				.unit-data-grid{
					display: grid;
					grid-template-columns: 1fr 4fr;
					gap: 20px;
				}
				.unit-data-item{
					display: grid;
					grid-template-columns: 32px auto;
					gap: 8px;
				}
			</style>
			<article class="cont-pd">
				<div class="">
					<h2 class="cpj-subtitle mb-4"><span data-lang="th"><?php pll_e('ข้อมูลโครงการ') ?></span></h2>
					<div class="unit-data-grid">
						<?php foreach ($pj_f['detail'] as $uk => $uv): ?>
							<div  class="unit-data-item">
								<div>
									<img class="-img" src="<?=$uv['icon']['sizes']['medium']?>">
								</div>
								<div>
									<span class="-txt"><?=$uv['text']?></span>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</article>
		</section>

		<style type="text/css">
			.fac-grid{
				display: grid;
				grid-template-columns: repeat(5, 1fr);
				grid-auto-rows: 1fr;
				justify-content: center;
				align-items: center;
			}
			.fac-item {
				display: flex;
				flex-flow: column;
				justify-content: center;
				align-items: center;
				gap: 4px;
				color: var(--grey-grey-200-emphasize, #323A41);
				text-align: center;
				font-size: 22px;
				font-style: normal;
				font-weight: 500;
				line-height: 28px;
			}
			#facility {
				padding: 4rem 0;
			}
		</style>
		<div class="-nav-a-check -nav-fclt"></div>
		<section id="facility" data-aos="fade-up" data-aos-once="false">
			<div class="cont">
				<h2 class="cpj-subtitle mb-11 text-center"><span data-lang="th"><?php pll_e('สิ่งอำนวยความสะดวก') ?></span></h2>
				<div class="fac-grid">
					<?php 
					foreach ($pj_f['facility'] as $k => $v) {
						$icon = get_field('icon','term_'.$v->term_id)['sizes']['large'];
						?>
						<div class="fac-item">
							<div class="-icon">
								<img src="<?=$icon?>">
							</div>
							<div class="-text"><?=$v->name?></div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</section>

		<style type="text/css">
			#location{
				background-color: #fff;
				padding: 4.5rem 0;
			}
			.location-grid{
				display: grid;
				grid-template-columns: 3fr 2fr;
				grid-auto-rows: 1fr;
				gap: 2rem;
			}
			.location-box{
				display: grid;
				grid-template-columns: 1fr;
				grid-template-rows: 5rem calc(100% - 5rem);
			}
			.nearby {
				display: grid;
				grid-template-columns: 1fr;
				grid-template-rows: 56px calc(100% - 56px);
			}
			.tab-item{
				padding: 0 1rem;
				position: relative;
			}
			.tab-item::after{
				content: " ";
				width: 1px;
				height: 8px;
				position: absolute;
				right: -0.5px;
				top: 24px;
				background-color: #CFD4D9;
			}
			.tab-item-btn {
				display: grid;
				grid-template-columns: 24px auto;
				gap: 12px;
				justify-content: center;
				align-items: center;
				color: #323A41;
				font-size: 26px;
				font-style: normal;
				font-weight: 400;
				line-height: 32px;
				cursor: pointer;
				height: 100%;
				box-shadow: 0px 0px 0px #123F6D inset;
				transition: all .3s;
			}
			.tab-item[data-is-select="1"] .tab-item-btn{
				box-shadow: 0px -4px 0px #123F6D inset;
				color: #123F6D;
			}
			.nearby-tab-header{
				width: 100%;
				overflow: hidden;
			}
			.tab-slider {
				display: flex;
				width: max-content;
				gap: 1px;
				height: 100%;
			}
			.tab-item:first-child {
				padding-left: 0;
			}
			.tab-body{
				padding: 1.75rem 0;
				display: flex;
				flex-flow: column;
				gap: 1rem;
				position: absolute;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0;
			}
			.place-item{
				display: grid;
				grid-auto-rows: 1fr;
				grid-template-columns: 24px calc(100% - 24px - 8px);
				gap: 8px;
			}
			.tab-body[data-is-select="-1"] {
				display: none;
			}
			.tab-body-wrap{
				overflow: auto;
				height: 100%;
				position: relative;
				min-height: 290px;
			}
			.place-item .-text{
				color: var(--grey-grey-200-emphasize, #323A41);
				font-size: 22px;
				font-style: normal;
				font-weight: 400;
				line-height: 28px; 
			}
			.place-item .-distance {
				color:#828A92;
			}
			.tab-item-btn .-icon{
				background-color: #123F6D;
				-webkit-mask-image: var(--icon);
				-webkit-mask-size: contain;
				-webkit-mask-repeat: no-repeat;
			}
			.tab-item[data-is-select="-1"] .tab-item-btn .-icon{
				background-color: #545E67;
			}
			.tab-item-btn .-icon img {
				opacity: 0;
			}
		</style>
		<?php 
		$map = $pj_location['maps_image']['sizes']['1536x1536'];
		$nearby_place = $pj_location['nearby_place'];
		?>
		<div class="-nav-a-check -nav-loca"></div>
		<section id="location" data-aos="fade-up" data-aos-once="false">
			<div class="cont">
				<div class="location-grid">
					<div class="p" >
						<div class="jb-lightbox cursor-pointer" data-jb-lightbox="themap" style="--img:url('<?=$map?>')">
							<img src="<?=$map?>" class="w-full">
						</div>

					</div>
					<div class="location-box">
						<h2 class="cpj-subtitle my-4"><span data-lang="th"><?php pll_e('ทำเลที่ตั้ง') ?></span></h2>
						<div class="nearby">
							<div class="nearby-header-wrap" data-short="0" style="--i:0">
								<div class="-arrow -l" onclick="slideTab(-1)">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M5 7.5L10 12.5L15 7.5" stroke="#545E67" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</div>
								<header class="nearby-tab-header hidscroll">
									<div class="tab-slider">
										<?php 
										foreach ($nearby_place as $k => $v) {
											?>
											<div class="tab-item" data-item="<?=$k?>" data-is-select="-1">
												<div class="tab-item-btn" onclick="selectTab(<?=$k?>)">
													<div class="-icon" style="--icon:url('<?=$v['icon']['sizes']['medium']?>')">
														<img src="<?=$v['icon']['sizes']['medium']?>">
													</div>
													<span><?=$v['tab_name']?></span>
												</div>
											</div>
											<?php
										}
										?>
									</div>
								</header>
								<div class="-arrow -r" onclick="slideTab(1)">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path d="M5 7.5L10 12.5L15 7.5" stroke="#545E67" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
									</svg>
								</div>
							</div>
							<div class="tab-body-wrap">
								<?php 
								foreach ($nearby_place as $k => $v) {
									?>
									<article class="tab-body" data-is-select="-1">
										<?php foreach ($v['place'] as $key => $value) {
											?>
											<div class="place-item">
												<div class="-icon">
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
														<path d="M12 13C13.6569 13 15 11.6569 15 10C15 8.34315 13.6569 7 12 7C10.3431 7 9 8.34315 9 10C9 11.6569 10.3431 13 12 13Z" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
														<path d="M12 2C9.87827 2 7.84344 2.84285 6.34315 4.34315C4.84285 5.84344 4 7.87827 4 10C4 11.892 4.402 13.13 5.5 14.5L12 22L18.5 14.5C19.598 13.13 20 11.892 20 10C20 7.87827 19.1571 5.84344 17.6569 4.34315C16.1566 2.84285 14.1217 2 12 2V2Z" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</div>
												<div class="-text">
													<span class="-place_name"><?=$value['place_name']?></span>
													<span class="-distance"> - <?=$value['distance']?></span>
												</div>
											</div>
											<?php
										} ?>
									</article>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript">
			function selectTab(x){
				let el = $$('.tab-item')
				if (el.length>0) {
					for(let i of el){
						i.dataset.isSelect = -1
					}
					el[x].dataset.isSelect = 1

					el = $$('.tab-body')
					for(let i of el){
						i.dataset.isSelect = -1
					}
					el[x].dataset.isSelect = 1
				}
			}
			selectTab(0)
		</script>

		<style type="text/css">
			#virtual-360{
				padding: 60px 0;
			}
			.tour-wrap{
				display: flex;
				width: 100%;
				padding-top: 36.05%;
				position: relative;
			}
			.tour-inner{
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				display: flex;
			}
			.tour-inner iframe{
				width: 100% !important;
				max-width: 100% !important;
				height: 100% !important;
				max-height: 100% !important;
			}
		</style>
		<?php 
		if ($pj_f['tour']['url'] != '') {
			$tour_url = theme_gen_visual_tour($pj_f['tour']['url']);
			if ($tour_url != '') {?>
				<div class="-nav-a-check -nav-tour"></div>
				<section id="virtual-360" data-aos="fade-up" data-aos-once="false">
					<div class="cont">
						<h2 class="cpj-subtitle my-4"><?php pll_e('360 Virtual Tour') ?></h2>
						<div class="tour-wrap">
							<div class="tour-inner">
								<iframe src="<?=$tour_url?>"></iframe>
							</div>
						</div>
					</div>
				</section>
			<?php }
		}
		?>

	</div>
</main>
<script type="text/javascript">
	locatab = [];
	let c = 0;
	for(let i of $$('.tab-item')){
		locatab[c] = i.clientWidth
		c++;
	}
	locatab_parent = $('.nearby-header-wrap').clientWidth;
	locatab_child = $('.tab-slider').clientWidth;
	locatab_inner = $('.nearby-tab-header').clientWidth
	if (locatab_child<(locatab_parent-64)) {
		$('.nearby-header-wrap').dataset.short = 1
	}
	

	function slideTab(d){
		locatab_child = $('.tab-slider').clientWidth;
		locatab_inner = $('.nearby-tab-header').clientWidth
		let maxTab = Math.ceil((locatab_child-locatab_inner)/80)+1;
		xconsolex.log(maxTab)
		let now = parseInt($('.nearby-header-wrap').style.getPropertyValue('--i'))
		let next = (now+d+maxTab)%maxTab
		$('.nearby-header-wrap').style.setProperty('--i',next);
	}
</script>
<?php get_template_part('template-parts/hot-deal','contact',$pj_f['project'][0]) ?>
<?php get_template_part('template-parts/hot-deal','responsive') ?>