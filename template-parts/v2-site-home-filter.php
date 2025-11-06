<?php
// $terms_parent_pj_type = [];
// $terms_parent = get_terms( array(
// 	'taxonomy' => 'project-type',
// 	'hide_empty' => false,
// 	'parent' => 0
// ) );
// foreach ($terms_parent as $key => $value) {
// 	$parent_id = $value->term_id;
// 	$pcheck = get_term($parent_id,'project-type');
// 	$terms_parent_pj_type[$pcheck->slug] = $value;
// }

$term_pj_type = asw_get_term_nest('project-type');
$term_pj_location = asw_get_term_nest('project_location');
?>
<style type="text/css">

	.clear-all{
		transition: .5s;
		height: 49px;
		border-radius: 10px;
		padding: 0 .5rem;
		position: relative;
		left: 9px;
	}
	.clear-all:hover{
		background-color: var(--ci-blue-900);
	}
	.filter-cards-wrap{
		--max: 1;
		--i: 0;
		display: grid;
		grid-template-columns: repeat(var(--max), calc(100% - 0px));
		grid-column-gap: 0px;
		position: relative;
		transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
		left: calc(var(--i) * -100%);
		width: 100%;
	}
	.filter-inner-mini{
		display: flex;
		justify-content: space-between;
		align-items: center;
		width: 80%;
		padding: 1rem 0;
	}
	.mini-filter{
		display: none;
	}
	.mini-filter-arrow{
		height:15px;
	}
	.home-filter-m{
		display: none;
	}
	.quick-filter{
		transition: .2s all;
	}
	.quick-filter:hover {
		transition: .2s all;
		background: var(--ci-blue-900) !important;
	}
/*-- Mobile Version --*/
@media (max-width: 1400px) {
	.home-filter-d{
		display: none;
	}
	.home-filter-m{
		display: block;
	}
	.quick-filter-btn,
	.clear-all{
		width: 100%;
		padding: 0.5rem;
	}
}
@media (max-width: 1116px){
	.big-filter{
		display: none;
	}
	.mini-filter{
		display: flex;
		left: 0 !important;
		padding: 50px 15px !important;
	}
	.filter-cards-wrap{
		width: 100%;
	}
	.filter-inner-mini{
		width: 100%;
		max-width: 420px;
		margin-left: auto;
		margin-right: auto;
	}
	.the-filt{
		position: static !important;
	}
	.filter-inner-mini {
		box-shadow: 0px 0px 30px rgb(98 137 177 / 40%);
		border-radius: 16px;
		padding-left: 1.75rem;
		padding-right: 1.5rem;
	}

}

</style>
<!--=== The Section Boxes : filter ===-->
<section id="filter" class="">
	<div class="padding-xs-hzt pst -top -left wide the-filt mob-no-pd" style="z-index: 1000;">
		<div class="cont-pd mob-no-pd">

			<theboxes class="big-filter middle right t-center- -clip round" style="margin-top: -30px;z-index: 10;border-radius: 8px;margin-bottom: 5px;height: 80px">
				<box col="2.5"><inner id="filter_0" class="padding quick-filter v-middle-wrap cursor-pointer" onclick="filter_pop(0, this)">
					<div class="quick-filter-inner">
						<span class="wide">
							<div class="grid grid-cols-5">
								<div class="col-span-1 flex items-center">
									<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
								</div>
								<div class="col-span-4">
									<h6 class="" id="type_pro">
										<?php pll_e('ประเภทโครงการ')?>
									</h6>
								</div>
							</div>
						</span>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
					</div>
				</inner></box>
				<box col="2.5"><inner id="filter_1" class="padding quick-filter v-middle-wrap cursor-pointer" onclick="filter_pop(1, this)">
					<div class="quick-filter-inner">
						<span class="wide">
							<div class="grid grid-cols-5">
								<div class="col-span-1 flex items-center">
									<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem">
								</div>
								<div class="col-span-4">
									<h6 class="dbfont" id="lo_pro">
										<?php pll_e('ทำเล')?>
									</h6>
								</div>
							</div>
						</span>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
					</div>
				</inner></box>
				<box col="2.5"><inner id="filter_2" class="padding quick-filter v-middle-wrap cursor-pointer" onclick="filter_pop(2, this)">
					<div class="quick-filter-inner cursor-pointer">
						<span class="wide">
							<div class="grid grid-cols-5">
								<div class="col-span-1 flex items-center">
									<img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem">
								</div>
								<div class="col-span-4">
									<h6 class="" id="brand_pro">
										<?php pll_e('แบรนด์')?>
									</h6>
								</div>
							</div>
						</span>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
					</div>
				</inner></box>
				<box col="2.5"><inner id="filter_3" class="padding quick-filter v-middle-wrap cursor-pointer" onclick="filter_pop_price()" data-open="-1" data-price-min="0" data-price-max="">
					<!-- <div class="filter-price-blackdrop-1"></div> -->
					<div class="quick-filter-inner cursor-pointer">
						<span class="wide">
							<div class="grid grid-cols-5">
								<div class="col-span-1 flex items-center">
									<img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem">
								</div>
								<div class="col-span-4">
									<h6 class="" id="price_pro">
										<?php pll_e('ช่วงราคา')?>
									</h6>
								</div>
							</div>
						</span>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" style="height:.5rem">
					</div>
				</inner></box>

				<box col="1"><inner class="quick-filter-btn-box v-middle-wrap pointer cl-ci-blue-300" onclick="filter_pop(999, this);check_chk('clear', 999)">
					<div class="clear-all flex items-center justify-center">
						<h6>
							<span class="home-filter-d"><?php pll_e('ล้างทั้งหมด')?></span>
							<span class="home-filter-m"><i class="fas fa-trash text-sm"></i></span>
						</h6>
					</div>
				</inner></box>
				<box col="1"><inner class="quick-filter-btn-box v-middle-wrap">
					<button class="quick-filter-btn" onclick="filter_pop(999, this);filterSearch()">
						<h6>
							<span class="home-filter-d"><?php pll_e('ค้นหา')?></span>
							<span class="home-filter-m"><?php pll_e('ค้นหา')?></span>
							
						</h6>
					</button>
				</inner></box>
			</theboxes>

			<style type="text/css">
				.input-width{
					width: 30px;
					margin-left: 5px;
					margin-right: 5px;
				}
				.check-wrap {
					display: block;
					position: relative;
					padding-left: 35px;
					cursor: pointer;
					font-size: 22px;
					line-height: 28px;
					font-weight: 400;
					color: var(--ci-grey-300);
					-webkit-user-select: none;
					-moz-user-select: none;
					-ms-user-select: none;
					user-select: none;
					padding-right: 12px;
					margin-bottom: 4px;
					white-space: nowrap;
				}
				.check-wrap input {
					position: absolute;
					opacity: 0;
					cursor: pointer;
					height: 0;
					width: 0;
				}
				.checkmark {
					transition: .5s;
					position: absolute;
					top: 3px;
					left: 0;
					height: 16px;
					width: 16px;
					border-radius: 4px;
					border:1px solid var(--ci-blue-600);
					background-color: white;
					margin-left: 7px;
					margin-top: 2px;
				}
				.check-wrap input:checked ~ .checkmark {
					background-color: var(--ci-veri-400);
				}
				.checkmark:after {
					content: "";
					position: absolute;
					display: none;
				}
				.check-wrap input:checked ~ .checkmark:after {
					display: block;
				}
				.check-wrap .checkmark:after {
					left: 4.5px;
					top: 2px;
					width: 5px;
					height: 8px;
					border: solid white;
					border-width: 0 2px 2px 0;
					-webkit-transform: rotate(45deg);
					-ms-transform: rotate(45deg);
					transform: rotate(45deg);
				}
				.popup-filter{
					transition: .5s;
					border: 1px solid var(--ci-blue-600);
					border-radius: 24px;
					padding: 0.75rem;
					padding-bottom: 0;
					align-items: center;
					margin-top: 10px;
					margin-right: 3px;
					width: fit-content;
					padding-top: 4px;
				}
				.popup-filter:hover{
					border:1px solid var(--ci-veri-400);
					background-color: var(--ci-veri-900);
				}
				.popup-filter-price{
					font-size: 22px;
					line-height: 28px;
					font-weight: 400;
					color: var(--ci-grey-300);
					transition: .5s;
				}
				.popup-filter-price:hover{
					background-color: var(--ci-blue-900);
				}
				.popup-filter-price:hover.-mini{
					background-color: unset;
				}
				.popup-filter-price label{
					margin-bottom: 0;
				}
			</style>
			<div id="filter_type" class="quick-filter-toggle-1">
				<div class="bg-white round" style="padding:32px 24px;padding-top: 22px;">
					<?php
					foreach ($term_pj_type as $key => $value) {
						?>
						<div class="flex inline popup-filter" onclick="check_chk(this, 0)">
							<label class="check-wrap" num="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
							<input type="checkbox" name="<?=$value->name?>">
							<span class="checkmark"></span>
						</label></div>
						<?php 
					}
					?>
				</div>
			</div>
			<div id="filter_location" class="quick-filter-toggle-2">
				<div class="bg-white round" style="padding:45px 24px;padding-top: 30px;">
					<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ในกรุงเทพฯ')?></span>
					<sp style="height: 8px;" ></sp>
					<?php
					foreach ($term_pj_location['in-bangkok']->child as $key => $value) { 
						?>
						<div class="flex inline-flex popup-filter" onclick="check_chk(this, 1)">
							<label class="check-wrap" num="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
							<input type="checkbox" name="<?=$value->name?>"/>
							<span class="checkmark"></span></label>
						</div>
						<?php 
					}
					?>
					<div style="padding-top: 42px;padding-bottom: 22px;">
						<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
					</div>
					<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด')?></span>
					<sp style="height: 8px;" ></sp>
					<?php
					foreach ($term_pj_location['upcountry']->child as $key => $value) { 
						?>
						<div class="flex inline-flex popup-filter" onclick="check_chk(this, 1)">
							<label class="check-wrap" num="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
							<input type="checkbox" name="<?=$value->name?>">
							<span class="checkmark"></span>
						</label>
					</div>
					<?php 
				}
				?>
			</div>
		</div>
		<div id="filter_project" class="quick-filter-toggle-3">
			<div class="bg-white round" style="padding:48px 32px;padding-top: 30px;">
				<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม')?></span>
				<sp style="height: 8px;" ></sp>
				<?php
				foreach ($term_pj_type['condominium']->child as $key => $value) {
					$iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); 
					$is_show = get_field('is_show',$value->taxonomy . '_' . $value->term_id);
					if ($is_show != 'hide') {?>
						<div class="flex inline-flex popup-filter" onclick="check_chk(this, 2)">
							<label class="check-wrap" num="<?=$value->term_id?>" name="<?= $value->name ?>">
								<input type="checkbox" name="<?= $value->name ?>">
								<img src="<?=$iconic['url']?>" style="width: auto;height: 30px;margin-right: 5px;" >

								<span class="checkmark" style="margin-top: 4px;"></span>
							</label>
						</div>
					<?php }
					
				}
				?>
				<div style="padding-top: 40px;padding-bottom: 22px;">
					<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
				</div>
				<span class="cl-ci-blue-300" style="font-size: 26px;white-space: nowrap;"><?php pll_e('บ้านและทาวน์โฮม')?></span>
				<sp style="height: 8px;" ></sp>
				<?php
				foreach ($term_pj_type['house']->child as $key => $value) {
					$iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); 
					$is_show = get_field('is_show',$value->taxonomy . '_' . $value->term_id);
					if ($is_show != 'hide') {?>
						<div class="flex inline-flex popup-filter" onclick="check_chk(this, 2)">
							<label class="check-wrap" num="<?=$value->term_id?>" name="<?= $value->name ?>">
								<input type="checkbox" name="<?= $value->name ?>">
								<img src="<?=$iconic['url']?>" style="width: auto;height: 30px;margin-right: 5px;" >

								<span class="checkmark" style="margin-top: 4px;"></span>
							</label>
						</div>
					<?php }
				}
				?>
			</div>
		</div>

		<?php 
		if (pll_current_language()=='en') {
			$filter_price = get_field('filter_price_range',pll_get_post(2,'en'));
		}else if(pll_current_language()=='cn') {
			$filter_price = get_field('filter_price_range',pll_get_post(2,'cn'));
		}else{
			$filter_price = get_field('filter_price_range',2);
		}
		?>
		<style type="text/css">
			#filter_cost[data-open="-1"]{
				display: none;
			}
			#filter_cost[data-open="1"]{
				display: block !important;
			}
			#filter_3[data-open="1"] .quick-filter-arrow{
				transform: rotate(-180deg) !important;
			}
		</style>

		<div id="filter_cost" class="quick-filter-toggle-4 home-toggle-price" data-open="-1">
			<div class="bg-white round py-4">
				<?php 
				foreach ($filter_price as $key => $value) {
					?>
					<div class="flex inline popup-filter-price p-2 pointer pl-6" onclick="filter_price_check(this)" data-max="<?=$value['max']?>" data-min="<?=$value['min']?>">
						<label class="pointer" for="type_condo" ><?=$value['label']?></label>
						<div class="ratio-box" style="display:none;">
							<div class="ratio-box-inner-x"></div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function filter_pop_price(){
		filter_pop(999, 'clear')
		setTimeout(()=>{
			let el = document.querySelector('#filter_cost')
			document.querySelector('#filter_cost').dataset.open *= -1
			document.querySelector('#filter_3').dataset.open = document.querySelector('#filter_cost').dataset.open
		},10)
	}
	function filter_price_check(el){
		let min = parseInt(el.dataset.min)
		let max = parseInt(el.dataset.max)
		document.querySelector('#filter_3').dataset.priceMin = min
		document.querySelector('#filter_3').dataset.priceMax = max
		document.querySelector('#price_pro').innerText = el.innerText
		$('#cost_pro_mini').innerHTML = el.innerText
		filter_pop_price()
	}
</script>
<section id="filter-mini" class="">
	<div class="bg-white">
		<div class="flex items-center justify-center mini-filter relative mob-no-pd">
			<div class="filter-cards-wrap">
				<div class="filter-inner-mini pointer bg-white" onclick="openPopFilter()">
					<span class="wide">
						<div class="grid grid-cols-5 gap-0 flex items-center">
							<div class="col-span-1 flex items-center">
								<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2.5rem;margin:0;">
							</div>
							<div class="col-span-4">
								<h6 class="filter-select" id="">
									<div class="grid-rows-2 flex flex-col">
										<div class="row-span-1" style="font-size: 24px;line-height: 26px;font-weight: 500;"><?php pll_e('ค้นหา')?></div>
										<div class="row-span-1" style="font-size: 24px;line-height: 26px;font-weight: 400;"><?php pll_e('ที่อยู่โครงการในแบบคุณ')?></div>
									</div>
								</h6>
							</div>
						</div>
					</span>
					<img src="/wp-content/uploads/2022/11/arrow.png" style="height: 15px;">
				</div>	
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.mini-filter-popup{
		position: fixed;
		right: 120%;
		opacity: 0;
		top: 0;
		width: 100%;
		/*min-height: 100%;*/
		z-index: 10000;
		background: linear-gradient(360deg, #EDF2F7 0%, #FDFDFE 13.24%, #FFFFFF 103.44%);
		transition: .5s;

		height: calc(100%);
		/*overflow: scroll;*/
	}
	.close-filter {
		color: var(--ci-grey-100);
		position: fixed;
		top: 27.5px;
		right: 16px;
		font-size: 45px;
		transition: .3s;
		display: none;
		cursor: pointer;
	}
	.popup-filter-inner{
		display: block;
		cursor: pointer;
	}
	.clear-wrap-mini{
		background-color: #f5f7fa;
		position: fixed;
		width: calc(100% - 32px);
		bottom: 10px;
	}
	.sp-mini{
		height: 40px;
	}
	.quick-filter-arrow-mini{
		transition: .5s;
		height: 0.5rem;
		margin-right: 0;
	}
	.ratio-box{
		display: flex;
		justify-content: center;
		align-items: center;
		width: 22px;
		height: 22px;
		background-color: white;
		border:1px solid var(--ci-grey-600);
		border-radius: 25px;
	}
	.ratio-box-inner{
		width: 12px;
		height: 12px;
		background-color: var(--ci-veri-500);
		border-radius: 25px;
		opacity: 0;
		transition: .25s;
	}
</style>
<div class="mini-filter-popup">
	<div class="cont-pd" style="height: calc(100% - 60px);
	overflow: scroll;">
	<span class="close-filter" onclick="closePopFilter()" style="">&times;</span>
	<h3 style="color: #374151;font-size: 30px;line-height: 36px;font-weight: 400;margin-top: 27.5px;"><?php pll_e('ค้นหาคอนโดมิเนียมในแบบคุณ')?></h3>
	<sp class="" style="height: 32px;" ></sp>
	<div class="popup-filter-inner" onclick="filter_pop_mini(4)">
		<div class="grid grid-cols-12">
			<div class="col-span-1 flex items-center">
				<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;margin:0;">
			</div>
			<div class="col-span-10 pl-3">
				<h6 class="" id="type_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
					<?php pll_e('ประเภทโครงการ')?>
				</h6>
			</div>
			<div class="col-span-1 flex items-center">
				<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
			</div>
		</div>
	</div>
	<sp class="sp-mini"></sp>
	<div id="filter_type_mini" class="mini-filter-toggle-5">
		<div class="bg-white">
			<?php
			$terms = get_terms( array(
				'taxonomy' => 'project-type',
				'hide_empty' => false,
			) );
			foreach ($terms as $key => $value) {
				if ($value->parent == 0) { ?>
					<div class="flex inline-flex popup-filter" slug="<?=$value->name?>" num="5" onclick="check_chk(this, 0);">
						<label class="check-wrap" num="<?=$value->term_id?>" name="<?= $value->name ?>"><?=$value->name?>
						<input type="checkbox" name="<?= $value->name ?>">
						<span class="checkmark" style="margin-top: 4px;"></span>
					</label>
				</div>
			<?php }
		}
		?>
	</div>
	<sp style="height: 20px;"></sp>
	<hr style="color: var(--cl-ci-grey-900);width: 100%;">
</div>
<div class="popup-filter-inner" onclick="filter_pop_mini(0)">
	<div class="grid grid-cols-12">
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem;margin:0;">
		</div>
		<div class="col-span-10 pl-3">
			<h6 class="" id="loca_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
				ทำเล
			</h6>
		</div>
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
		</div>
	</div>
</div>
<sp class="sp-mini"></sp>
<div id="filter_loca_mini" class="mini-filter-toggle-1">
	<div class="bg-white">
		<span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ในกรุงเทพฯ')?></span>
		<br>
		<?php
		foreach ($term_pj_location['in-bangkok']->child as $key => $value) { 
			?>
			<div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);">
				<label class="check-wrap" num="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
				<input type="checkbox" name="<?=$value->name?>">
				<span class="checkmark"></span>
			</label>
		</div>
		<?php 
	}
	?>
	<sp style="height: 20px;"></sp>
	<span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด')?></span>
	<br>
	<?php
	foreach ($term_pj_location['upcountry']->child as $key => $value) { 
		?>
		<div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="1" onclick="check_chk(this, 1);">
			<label class="check-wrap" num="<?=$value->term_id?>" name="<?=$value->name?>"><?=$value->name?>
			<input type="checkbox" name="<?=$value->name?>">
			<span class="checkmark"></span>
		</label>
	</div>
	<?php
}
?>
</div>
<sp style="height: 20px;"></sp>
<hr style="color: var(--cl-ci-grey-900);width: 100%;">
</div>
<div class="popup-filter-inner" onclick="filter_pop_mini(1)">
	<div class="grid grid-cols-12">
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem;margin:0;">
		</div>
		<div class="col-span-10 pl-3">
			<h6 class="" id="brand_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
				<?php pll_e('แบรนด์')?>
			</h6>
		</div>
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
		</div>
	</div>
</div>
<sp class="sp-mini"></sp>
<div id="filter_brand_mini" class="mini-filter-toggle-2">
	<div class="bg-white">
		<span class="pl-3 cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม')?></span>
		<br>
		<?php
		foreach ($term_pj_type['condominium']->child as $key => $value) {
			$iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); ?>
			<div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="2" onclick="check_chk(this, 2);">
				<label class="check-wrap" num="<?=$value->term_id?>" name="<?= $value->name ?>">
					<input type="checkbox" name="<?= $value->name ?>">
					<img src="<?=$iconic['url']?>" style="width: auto;height: 30px;margin-right: 5px;" >

					<span class="checkmark" style="margin-top: 4px;"></span>
				</label>
			</div>
			<?php 
		}
		?>
		<sp class="" style="height: 20px;" ></sp>
		<span class="pl-3 cl-ci-blue-300" style="font-size: 26px;white-space: nowrap;">บ้านและทาวน์โฮม</span>
		<br>
		<?php
		foreach ($term_pj_type['house']->child as $key => $value) {
			$iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); ?>
			<div class="flex inline-flex popup-filter" slug="<?=$value->slug?>" num="2" onclick="check_chk(this, 2);">
				<label class="check-wrap" num="<?=$value->term_id?>" name="<?= $value->name ?>">
					<input type="checkbox" name="<?= $value->name ?>">
					<img src="<?=$iconic['url']?>" style="width: auto;height: 30px;margin-right: 5px;" >

					<span class="checkmark" style="margin-top: 4px;"></span>
				</label>
			</div>
			<?php 
		}
		?>
	</div>
	<sp style="height: 20px;"></sp>
	<hr style="color: var(--cl-ci-grey-900);width: 100%;">
</div>
<div class="popup-filter-inner" onclick="filter_pop_mini(2)">
	<div class="grid grid-cols-12">
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem;margin:0;">
		</div>
		<div class="col-span-10 pl-3">
			<h6 class="" id="cost_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
				<?php pll_e('ช่วงราคา')?>
			</h6>
		</div>
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
		</div>
	</div>
</div>
<sp class="sp-mini"></sp>
<div id="filter_cost_mini" class="mini-filter-toggle-3">
	<div class="bg-white pl-5">
		<?php 
		foreach ($filter_price as $key => $value) {
			?>
			<div class="flex inline popup-filter-price -mini p-2 pointer justify-between pr-0" onclick="filter_price_select(this)" data-price-max="<?=$value['max']?>" data-price-min="<?=$value['min']?>">
				<label class="pointer" for="type_condo"><?=$value['label']?></label>
				<div class="ratio-box">
					<div class="ratio-box-inner"></div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>
<div class="popup-filter-inner" onclick="filter_pop_mini(3)" style="display: none;">
	<div class="grid grid-cols-12">
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/11/Group-908.png" class="inline-block" style="height:2rem;margin:0;">
		</div>
		<div class="col-span-10 pl-3">
			<h6 class="" id="stat_pro_mini" style="font-size: 24px;line-height: 32px;font-weight: 400;">
				<?php pll_e('สถานะโครงการ')?>
			</h6>
		</div>
		<div class="col-span-1 flex items-center">
			<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow-mini">
		</div>
	</div>
</div>
<sp class="sp-mini"></sp>
<div id="filter_stat_mini" class="mini-filter-toggle-4">
	<div class="bg-white">
		<?php
		$terms = get_terms( array(
			'taxonomy' => 'project_status',
			'hide_empty' => false,
		) );
		foreach ($terms as $key => $value){
			$stat_label = get_field('label',$value->taxonomy . '_' . $value->term_id); ?>
			<div class="flex inline-flex popup-filter" num="0" onclick="check_chk(this, 0);">
				<label class="check-wrap" name="<?=$stat_label?>" num="<?=$value->term_id?>"><?=$stat_label?>
				<input type="checkbox" name="<?=$stat_label?>">
				<span class="checkmark"></span>
			</label>
		</div>
	<?php }
	?>
</div>
</div>
<div class="grid grid-cols-2 gap-4 clear-wrap-mini">
	<div class="col-span-1 cl-ci-blue-300 flex items-center justify-center">
		<div class="clear-all-mini flex items-center justify-center" onclick="filter_pop(999, this);check_chk('clear', 999)">
			<h6 style="font-size: 24px;line-height: 32px;font-weight: 400;"><?php pll_e('ล้างทั้งหมด')?></h6>
		</div>
	</div>
	<div class="col-span-1 flex items-center justify-center">
		<button class="quick-filter-btn" style="width: 100%;" onclick="filterSearch()">
			<h6 style="font-size: 24px;line-height: 32px;font-weight: 400;"><?php pll_e('ค้นหา')?></h6>
		</button>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	const popup = document.getElementsByClassName("mini-filter-popup")[0];
	function openPopFilter(){
		popup.style.opacity = "1";
		popup.style.right = "0";
		document.getElementsByClassName("close-filter")[0].style.display = "block";
	}
	function closePopFilter(){
		popup.style.opacity = "0";
		popup.style.right = "120%";
		document.getElementsByClassName("close-filter")[0].style.display = "none";
	}
	var recent_pop_mini = -1;
	function filter_pop_mini(num){
		let sp = document.getElementsByClassName("sp-mini");
		let arrow = document.getElementsByClassName("quick-filter-arrow-mini");
		for(let i of sp){
			i.style.height = "40px";
		}
		for(i of arrow){
			i.style.transform = "rotate(0deg)";
		}
		filter_stat_mini.style.display='none';
		filter_loca_mini.style.display='none';
		filter_brand_mini.style.display='none';
		filter_cost_mini.style.display='none';
		filter_type_mini.style.display='none';
		if(num != recent_pop_mini){
			switch (num) {
			case 0:
				filter_loca_mini.style.display='block';
				sp[1].style.height = "20px";
				arrow[1].style.transform = "rotate(-180deg)";
				break;
			case 1:
				filter_brand_mini.style.display='block';
				sp[2].style.height = "20px";
				arrow[2].style.transform = "rotate(-180deg)";
				break;
			case 2:
				filter_cost_mini.style.display='block';
				sp[3].style.height = "20px";
				arrow[3].style.transform = "rotate(-180deg)";
				break;
			case 3:
				filter_stat_mini.style.display='block';
				sp[4].style.height = "20px";
				arrow[4].style.transform = "rotate(-180deg)";
				break;
			case 4:
				filter_type_mini.style.display='block';
				sp[0].style.height = "20px";
				arrow[0].style.transform = "rotate(-180deg)";
				break;
			}
			recent_pop_mini = num;
		}
		else{
			recent_pop_mini = -1;
		}
	}
</script>


<script type="text/javascript">
	var recent_pop = -1;
	var blue900 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-blue-900')
	function close_price_pop(){
		$('#filter_3').dataset.open = -1
		$('#filter_cost').dataset.open = -1
	}
	function filter_pop(num, ele){
		close_price_pop()
		filter_type.style.display='none';
		filter_location.style.display='none';
		filter_project.style.display='none';
		filter_cost.style.display='none';

		let arrw = document.getElementsByClassName("quick-filter-arrow");
		for(let i of arrw){
			i.style.transform = "rotate(0deg)";
		}
		let bgc = document.getElementsByClassName("quick-filter");
		for(let j of bgc){
			j.style.backgroundColor = "white";
		}
		if(num != recent_pop && num != 999){
			switch (num) {
			case 0:
				filter_type.style.display='block';
				break;
			case 1:
				filter_location.style.display='block';
				break;
			case 2:
				filter_project.style.display='block';
				break;
			case 3:
				filter_cost.style.display='block';
				break;
			}
			ele.style.backgroundColor = blue900;
			ele.children[0].children[1].style.transform = "rotate(-180deg)"
			recent_pop = num;
		}
		else{
			recent_pop = -1;
			$('#filter_3').dataset.open = -1
			$('#filter_cost').dataset.open = -1
		}
	}
	document.addEventListener("click", (evt) => {

		let targetEl = evt.target;  
		xconsolex.log(targetEl)
		
		do {
			if(targetEl == filter_type || targetEl == filter_location || targetEl == filter_project || targetEl == filter_cost || targetEl == filter_0 || targetEl == filter_1 || targetEl == filter_2 || targetEl == filter_3) {
				return;
			}

			targetEl = targetEl.parentNode;
		} while (targetEl);
		filter_pop(999, 'clear')
	});

	var ver400 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-400')
	var ver900 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-veri-900')
	var blue800 = getComputedStyle(document.querySelector(':root')).getPropertyValue('--ci-blue-600')

	var pro_type = new Set()
	var pro_loca = new Set()
	var pro_pro = new Set()

	var filt_type = new Set()
	var filt_loca = new Set()
	var filt_pro = new Set()

	var txt_type = "<?php pll_e('ประเภทโครงการ') ?>"
	var txt_loca = "<?php pll_e('ทำเล') ?>"
	var txt_brand = "<?php pll_e('แบรนด์') ?>"
	var txt_price = "<?php pll_e('ช่วงราคา') ?>"

	var txtt_type = ""
	var txtt_loca = ""
	var txtt_brand = ""
	var txtt_price = ""

	var num_type = 0
	var num_loca = 0
	var num_brand = 0

	var numm_type = 0
	var numm_loca = 0
	var numm_brand = 0

	var clearAll = ""

	function check_chk(ele, num){
		if(ele == "clear"){
			pro_type.clear()
			pro_loca.clear()
			pro_pro.clear()

			filt_type.clear()
			filt_loca.clear()
			filt_pro.clear()

			txt_type = "ประเภทโครงการ"
			txt_loca = "ทำเล"
			txt_brand = "แบรนด์"
			txt_price = "ช่วงราคา"

			txtt_type = ""
			txtt_loca = ""
			txtt_brand = ""
			txtt_price = ""

			clearAll = document.getElementsByClassName("popup-filter")
			for (var i of clearAll) {
				i.children[0].children[0].checked = false;
				check_chk(i, 999);
			}
			let rati = document.getElementsByClassName("ratio-box-inner");
			for(let z of rati){
				z.style.opacity = 0;
			}
			clearAll = ""
		}
		else if(num == 3){
			txt_price = ele.children[0].getAttribute("name")
			txtt_price = txt_price
		}
		else if(ele.children[0].children[0].checked == true){
			let allEle = document.getElementsByClassName("popup-filter")
			for(let j of allEle){
				if (j.children[0].getAttribute("name") == ele.children[0].getAttribute("name")) {
					j.style.border = "1px solid "+ver400
					j.style.backgroundColor = ver900
					j.children[0].children[0].checked = true
				}
			}
			switch (num) {
			case 0:
				pro_type.add(ele.children[0].getAttribute("name"))
				filt_type.add(ele.children[0].getAttribute("num"))
				break;
			case 1:
				pro_loca.add(ele.children[0].getAttribute("name"))
				filt_loca.add(ele.children[0].getAttribute("num"))
				break;
			case 2:
				pro_pro.add(ele.children[0].getAttribute("name"))
				filt_pro.add(ele.children[0].getAttribute("num"))
				break;
			}
		}
		else{
			let allEle = document.getElementsByClassName("popup-filter")
			for(let j of allEle){
				if (j.children[0].getAttribute("name") == ele.children[0].getAttribute("name")) {
					j.style.border = "1px solid "+blue800
					j.style.backgroundColor = "white"
					j.children[0].children[0].checked = false
				}
			}
			switch (num) {
			case 0:
				pro_type.delete(ele.children[0].getAttribute("name"))
				filt_type.delete(ele.children[0].getAttribute("num"))
				break;
			case 1:
				pro_loca.delete(ele.children[0].getAttribute("name"))
				filt_loca.delete(ele.children[0].getAttribute("num"))
				break;
			case 2:
				pro_pro.delete(ele.children[0].getAttribute("name"))
				filt_pro.delete(ele.children[0].getAttribute("name"))
				break;
			}
		}
		if(ele != "clear"){
			txt_type = ""
			txt_loca = ""
			txt_brand = ""

			txtt_type = ""
			txtt_loca = ""
			txtt_brand = ""

			num_type = 0
			num_loca = 0
			num_brand = 0

			numm_type = 0
			numm_loca = 0
			numm_brand = 0

			pro_type.forEach (function(value) {
				if(num_type == 0){
					txt_type += value;
				}
				else{
					txt_type += ", " + value;
				}
				num_type++;
			})
			pro_loca.forEach (function(value) {
				if(num_loca == 0){
					txt_loca += value;
				}
				else{
					txt_loca += ", " + value;
				}
				num_loca++;
			})
			pro_pro.forEach (function(value) {
				if(num_brand == 0){
					txt_brand += value;
				}
				else{
					txt_brand += ", " + value;
				}
				num_brand++;
			})

			filt_type.forEach (function(value) {
				if(numm_type == 0){
					txtt_type += value;
				}
				else{
					txtt_type += "," + value;
				}
				numm_type++;
			})
			filt_loca.forEach (function(value) {
				if(numm_loca == 0){
					txtt_loca += value;
				}
				else{
					txtt_loca += "," + value;
				}
				numm_loca++;
			})
			filt_pro.forEach (function(value) {
				if(numm_brand == 0){
					txtt_brand += value;
				}
				else{
					txtt_brand += "," + value;
				}
				numm_brand++;
			})
			if (txt_type == "") {txt_type = "<?php pll_e('ประเภทโครงการ') ?>";}
			else{
				txt_type = protxt_shorter(txt_type, 15);
				txt_type = `
				<div class="grid grid-rows-2">
				<div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
				<?php pll_e('เลือกแล้ว') ?> `+ pro_type.size +` <?php pll_e('ประเภท') ?>
				</div>
				<div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">`
				+ txt_type +
				`</div>
				</div>
				`
			}
			if (txt_loca == "") {txt_loca = "<?php pll_e('ทำเล') ?>";}
			else{
				txt_loca = protxt_shorter(txt_loca, 15);
				txt_loca = `
				<div class="grid grid-rows-2">
				<div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
				<?php pll_e('เลือกแล้ว') ?> `+ pro_loca.size +` <?php pll_e('ทำเล') ?>
				</div>
				<div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">`
				+ txt_loca +
				`</div>
				</div>
				`
			}
			if (txt_brand == "") {txt_brand = "<?php pll_e('แบรนด์') ?>";}
			else{
				txt_brand = protxt_shorter(txt_brand, 14);
				txt_brand = `
				<div class="grid grid-rows-2">
				<div class="row-span-1" style="font-weight:700;font-size:18px;line-height:20px">
				<?php pll_e('เลือกแล้ว') ?> `+ pro_pro.size +` <?php pll_e('แบรนด์') ?>
				</div>
				<div class="row-span-1" style="font-weight:400;font-size:26px;line-height:22px">`
				+ txt_brand +
				`</div>
				</div>
				`
			}
			if(num == 3){
				txt_price = ele.children[0].getAttribute("name")
				txtt_price = txt_price
				let rati = document.getElementsByClassName("ratio-box-inner");
				for(let z of rati){
					z.style.opacity = 0;
				}
				ele.children[1].children[0].style.opacity = 1;
			}
		}
		document.getElementById("type_pro").innerHTML = txt_type;
		document.getElementById("lo_pro").innerHTML = txt_loca;
		document.getElementById("brand_pro").innerHTML = txt_brand;
		document.getElementById("price_pro").innerHTML = txt_price;

		document.getElementById("type_pro_mini").innerHTML = txt_type;
		document.getElementById("loca_pro_mini").innerHTML = txt_loca;
		document.getElementById("brand_pro_mini").innerHTML = txt_brand;
		document.getElementById("cost_pro_mini").innerHTML = txt_price;

	}
	function protxt_shorter(text, chars_limit){
		if (text.length > chars_limit){
			new_text = text.substring(0, chars_limit);
			new_text = new_text.trim();
			return new_text.concat("...")
		}
		else {
			return text
		}
	}
	function filterSearch(){
		price_min = document.querySelector('#filter_3').dataset.priceMin
		price_max = document.querySelector('#filter_3').dataset.priceMax
		window.location.href='/<?=pll_current_language()?>/project-search?type='+txtt_type+'&location='+txtt_loca+'&brand='+txtt_brand+'&price_min='+price_min+'&price_max='+price_max

	}
</script>
</section>

<script type="text/javascript">
	function filter_price_select(el){
		let min = el.dataset.priceMin
		let max = el.dataset.priceMax
		$('#filter_cost').dataset.priceMin = min
		$('#filter_cost').dataset.priceMax = max
		$('#cost_pro_mini').innerHTML = el.innerText
		for(let i of $$('.ratio-box-inner')){
			if (i.parentElement.parentElement.dataset.priceMax == max && i.parentElement.parentElement.dataset.priceMin == min) {
				i.style.opacity = 1
			}else{
				i.style.opacity = 0
			}

		}
		document.querySelector('#filter_3').dataset.priceMin = min
		document.querySelector('#filter_3').dataset.priceMax = max
		document.querySelector('#price_pro').innerText = el.innerText
	}
</script>