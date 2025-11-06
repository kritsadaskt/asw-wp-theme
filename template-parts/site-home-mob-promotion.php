
<style type="text/css">
	#hmpro{
		display: none;
	}
	/*-- Mobile Version --*/
	@media (max-width: 768px) {
		
		#desktop_promotion{
			display: none;
		}
		#hmpro{
			display: block;
			background-color: var(--ci-blue-300);
			padding: 40px 15px;
			padding-bottom: 47px;
		}
		#hmpro .-header{
			display: flex;
			justify-content: space-between;
			align-items: flex-end;
		}
		#hmpro .-promo{
			margin-top: 33px;
			display: block;
			position: relative;
			height: 0;
			padding-top: calc(100% + 30px + 32px);
		}
		#hmpro .-promo-i{
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			opacity: 0;
			transition: all .3s;
		}
		#hmpro .-promo-i[data-active="0"]{
			opacity: 1;
		}
		#hmpro .-pic{
			background-color: #0002;
			width: 100%;
			padding-top: 100%;
			margin-bottom: 27px;
			background-size: cover;
			background-position: center;
		}
		#hmpro .-pic-tablet{
			background-color: #0002;
			width: 100%;
			padding-top: 56.25%;
			margin-bottom: 27px;
			background-size: cover;
			background-position: center;
			display: none;
		}
		#hmpro .-title {
			font-weight: 500;
			font-size: 24px;
			line-height: 32px;
			text-align: center;
		}
		#hmpro .-title-span{
			color: var(--ci-orange-700);
		}
		#hmpro .-nav{
			height: 5px;
			display: flex;
			gap: 8px;
			justify-content: center;
			align-items: center;
			margin-top: 40px;
		}
		#hmpro .-nav-i{
			width: 32px;
			height: 1px;
			background: var(--ci-blue-500);
			transition: all .3s;
			z-index: 0;
		}
		#hmpro .-nav-i[data-active="0"]{
			height: 4px;
			background: var(--ci-orange-500);
			z-index: 10;
		}
	}
	.mob-container{
/*		max-width: 600px;*/
/*		margin:auto;*/
}
/*-- Mobile Version --*/
@media (min-width: 768px) {
	#hmpro .-pic-tablet{
		display: block;
	}
	#hmpro .-pic{
		display: none;
	}
	#hmpro .-promo{
		padding-top:calc(56.25% + 30px + 32px);
	}
	#hmpro .-nav{
		margin-top:30px;
	}
}
</style>
<section id="hmpro">
	<!-- <img src="/wp-content/uploads/2022/11/เงากิ่งไม้-1-1.png" class="absolute pointer-events-none leaf01"> -->
	<div class="mob-container">
		<div class="-header">
			<h1 class="text-white"><?php pll_e('โปรโมชั่น')?></h1>
			<h5 class="see-more cl-white"><a href="/<?=pll_current_language()?>/promotion" class="">
				<span class="cl-white"><?php pll_e('ดูทั้งหมด')?></span> <img src="/wp-content/uploads/2022/09/arrow-r.png" class="inline-block" style="width:35px">
			</a></h5>
		</div>
		<div style="display: none;" id="jbtest">
			<?php 
			$f = $args;
			pre($f);
			?>
		</div>
		
		
		<?php
		// $args = array(
		// 	'post_type' => 'promotion',
		// 	'post_status' => 'publish',
		// 	'posts_per_page' => 6, 
		// 	'orderby' => 'date', 
		// 	'order' => 'DESC',
		// 	'tax_query' => array(
		// 		array(
		// 			'taxonomy' => 'promotion_type',
		// 			'operator' => 'EXISTS',
		// 			'category_name' => 'condominium-pro',
		// 		),
		// 	),
		// );
		// $loop = new WP_Query( $args ); 
		?>

		<div class="-promowrap">
			<div class="-promo">
				<?php 
				$data_active = -1;
				foreach ($f['promotion'] as $key => $promo) {
					$pid = $promo->ID;
					$data_active++;
					$fim_mob = get_field('banner_mobile',$pid)['sizes']['large'];
					$fim = get_the_post_thumbnail_url($pid, 'large');
					?>
					<div class="-promo-i" data-active="<?=$data_active?>" data-i="<?=$data_active?>">
						<a href="<?=get_the_permalink($pid)?>" class="">
							<div class="-pic" style="background-image:url('<?=$fim_mob?>')"></div>
							<div class="-pic-tablet" style="background-image:url('<?=$fim?>')"></div>
							<div class="-title">
								<span class="-title-span"><?=get_the_title($pid)?></span>
							</div>
						</a>
					</div>
					<?php
				}

				wp_reset_postdata();
				?>

			</div>
			<div class="-nav">
				<?php 
				$data_active = -1;
				foreach ($f['promotion'] as $key => $promo) {
					$data_active++;
					?>
					<div class="-nav-i cursor-pointer" onclick="hmpro_change_slide_to(this)" data-active="<?=$data_active?>" data-i="<?=$data_active?>"></div>
					<?php
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	function hmpro_change_slide_to(el){
		const d_active = Number(el.dataset.active)
		hmpro_change_slide_change(d_active*-1)
	}
	function hmpro_change_slide_change(plus) {
		const pmi = document.querySelectorAll("#hmpro .-promo-i")
		const pmn = document.querySelectorAll("#hmpro .-nav-i")
		const lim = pmi.length
		for(let i=0;i<lim;i++){
			pmi[i].dataset.active = (Number(pmi[i].dataset.active)+plus)%lim
			pmn[i].dataset.active = (Number(pmn[i].dataset.active)+plus)%lim
		}
	}
	let hmpro_touch_start = 0
	let hmpro_touch_diff = 0
	document.querySelector('#hmpro .-promowrap').ontouchstart = (e)=>{
		hmpro_touch_start = e.changedTouches[0].screenX
	}
	document.querySelector('#hmpro .-promowrap').ontouchend = (e)=>{
		hmpro_touch_start = e.changedTouches[0].screenX
		const pmi = document.querySelectorAll("#hmpro .-promo-i")
		xconsolex.log(hmpro_touch_diff)
		if (hmpro_touch_diff<0) {
			xconsolex.log('a')
			hmpro_change_slide_change(-1)
		}else{
			xconsolex.log('b')
			hmpro_change_slide_change(1)
		}
		for(let i of pmi){
			i.style.opacity = ''
		}

	}
	document.querySelector('#hmpro .-promowrap').ontouchmove = (e)=>{
		const pmi = document.querySelectorAll("#hmpro .-promo-i")
		const lim = pmi.length
		let x = e.changedTouches[0].screenX;
		hmpro_touch_diff = (x-hmpro_touch_start)/300
		xconsolex.log(hmpro_touch_diff)

		document.querySelector('#hmpro .-promo-i[data-active="0"]').style.opacity = 1-Math.abs(hmpro_touch_diff)
		if (document.querySelector('#hmpro .-promo-i[data-active="-1"]') != null) {
			document.querySelector('#hmpro .-promo-i[data-active="-1"]').style.opacity = 0-hmpro_touch_diff
		}else if(document.querySelector(`#hmpro .-promo-i[data-active="${lim-1}"]`) != null) {
			document.querySelector(`#hmpro .-promo-i[data-active="${lim-1}"]`).style.opacity = 0-hmpro_touch_diff
		}

		if (document.querySelector('#hmpro .-promo-i[data-active="1"]') != null) {
			document.querySelector('#hmpro .-promo-i[data-active="1"]').style.opacity = 0+hmpro_touch_diff
		}else if(document.querySelector(`#hmpro .-promo-i[data-active="-${lim-1}"]`) != null) {
			document.querySelector(`#hmpro .-promo-i[data-active="-${lim-1}"]`).style.opacity = 0+hmpro_touch_diff
		}

	}
</script>