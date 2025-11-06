<?php 
$hotdealnav = $args;
$logo = $hotdealnav['logo'];
$cpj = $hotdealnav['cpj'];
$layer = $hotdealnav['layer'];
$has_visual = 0;
$has_unit_info = 0;
if ($layer == 3) {
	$unit_f = get_field('hot_deal_l3');
	$gallery = $unit_f['gallery'];
	$gallerySize = ofsize($gallery);
	
	if ($unit_f['tour']['url'] != '') {
		$tour_url = theme_gen_visual_tour($unit_f['tour']['url']);
		if ($tour_url != '') {
			$has_tour = 1;
		}
	}

	if ($has_tour == 1 OR $gallerySize > 0) {
		$has_visual = 1;
	}

	if (ofsize($unit_f['unit-data'])>0) {
		$has_unit_info = 1;
	}

	$cpj = get_post_parent();
	$pj = get_field('hot_deal_l2', $cpj->ID)['project'][0];

	$v_App = 'HotDeal';
	$v_OrderTypePayment = 6;
	$v_ProjectID = get_field('project_code',$pj->ID);
	$v_UnitCode = $unit_f['unit_code'];
	$v_Amount = $unit_f['book_price'];
	$book_url = asw_hot_deal_book($v_App,$v_OrderTypePayment,$v_ProjectID,$v_UnitCode,$v_Amount);

}

$pj_f = $pj_f = get_field('hot_deal_l2');

?>
<section id="header-nav" onclick="expandMbNav()" data-expand="-1">
	<div class="cont-pd xl:px-0">
		<div class="header-nav-inner">
			<div class="-logo">
				<a href="<?=get_permalink($cpj->ID)?>" class="">
					<img src="<?=$logo?>" class="w-full">
				</a>
			</div>
			<div class="-nav">
				<?php if ($layer == 2): ?>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-unit" data-active="1"><?php pll_e('ยูนิตในโครงการ') ?></div>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-gall" data-active="-1"><span data-lang="th"><?php pll_e('แกลเลอรี') ?></span></div>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-info" data-active="-1"><span data-lang="th"><?php pll_e('ข้อมูลโครงการ') ?></span></div>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-fclt" data-active="-1"><span data-lang="th"><?php pll_e('สิ่งอำนวยความสะดวก') ?></span></div>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-loca" data-active="-1"><span data-lang="th"><?php pll_e('ทำเลที่ตั้ง') ?></span></div>
					<?php if ($pj_f['tour']['url'] != '') {
						?><div class="-item" onclick="navToSec(this)" data-nav="nav-tour" data-active="-1"><?php pll_e('Virtual tour 360') ?></div><?php	
					} ?>
					
				<?php endif ?>
				<?php if ($layer == 3): ?>
					<div class="-item" onclick="navToSec(this)" data-nav="nav-unit" data-active="1"><?php pll_e('แปลน') ?></div>
					<?php if ($has_unit_info): ?>
						<div class="-item" onclick="navToSec(this)" data-nav="nav-info" data-active="-1"><?php pll_e('ข้อมูลยูนิต') ?></div>
					<?php endif ?>
					<?php if ($has_visual): ?>
						<div class="-item" onclick="navToSec(this)" data-nav="nav-room" data-active="-1"><?php pll_e('บรรยากาศภายในห้อง') ?></div>
					<?php endif ?>
				<?php endif ?>
			</div>
			<div class="-nav-mob">
				<?php if ($layer == 2): ?>
					<div class="-display" data-nav="nav-unit" data-active="1"><?php pll_e('ยูนิตในโครงการ') ?></div>
					<div class="-display" data-nav="nav-gall" data-active="-1"><span data-lang="th"><?php pll_e('แกลเลอรี') ?></span></div>
					<div class="-display" data-nav="nav-info" data-active="-1"><span data-lang="th"><?php pll_e('ข้อมูลโครงการ') ?></span></div>
					<div class="-display" data-nav="nav-fclt" data-active="-1"><span data-lang="th"><?php pll_e('สิ่งอำนวยความสะดวก') ?></span></div>
					<div class="-display" data-nav="nav-loca" data-active="-1"><span data-lang="th"><?php pll_e('ทำเลที่ตั้ง') ?></span></div>
					
					<?php if ($pj_f['tour']['url'] != '') {
						?><div class="-display" data-nav="nav-tour" data-active="-1"><?php pll_e('Virtual tour 360') ?></div><?php	
					} ?>
				<?php endif ?>
				<?php if ($layer == 3): ?>
					<div class="-display" data-nav="nav-unit" data-active="1"><?php pll_e('แปลน') ?></div>
					<?php if ($has_unit_info): ?>
						<div class="-display" data-nav="nav-info" data-active="-1"><?php pll_e('ข้อมูลยูนิต') ?></div>
					<?php endif ?>
					<?php if ($has_visual): ?>
						<div class="-display" data-nav="nav-room" data-active="-1"><?php pll_e('บรรยากาศภายในห้อง') ?></div>
					<?php endif ?>
				<?php endif ?>

				<div class="-nav-chevron">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M7 10L12 15L17 10" stroke="#1D1B1A"/>
					</svg>
				</div>
			</div>
			<div class="-nav-mob-expand" data-toggle="-1">
				<?php if ($layer == 2): ?>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-unit" data-active="1"><?php pll_e('ยูนิตในโครงการ') ?></div>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-gall" data-active="-1"><span data-lang="th"><?php pll_e('แกลเลอรี') ?></span></div>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-info" data-active="-1"><span data-lang="th"><?php pll_e('ข้อมูลโครงการ') ?></span></div>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-fclt" data-active="-1"><span data-lang="th"><?php pll_e('สิ่งอำนวยความสะดวก') ?></span></div>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-loca" data-active="-1"><span data-lang="th"><?php pll_e('ทำเลที่ตั้ง') ?></span></div>
					<?php if ($pj_f['tour']['url'] != '') {
						?><div class="-list" onclick="navToSec(this)" data-nav="nav-tour" data-active="-1"><?php pll_e('Virtual tour 360') ?></div><?php	
					} ?>
					<div class="-l2-cta-btn">
						<a href="#!" onclick="navToSec(this)" data-nav="nav-unit-2" class="-btn">
							<?php pll_e('จองยูนิต') ?>
						</a>
					</div>
				<?php endif ?>
				<?php if ($layer == 3): ?>
					<div class="-list" onclick="navToSec(this)" data-nav="nav-unit" data-active="1"><?php pll_e('แปลน') ?></div>
					<?php if ($has_unit_info): ?>
						<div class="-list" onclick="navToSec(this)" data-nav="nav-info" data-active="-1"><?php pll_e('ข้อมูลยูนิต') ?></div>
					<?php endif ?>
					<?php if ($has_visual): ?>
						<div class="-list" onclick="navToSec(this)" data-nav="nav-room" data-active="-1"><?php pll_e('บรรยากาศภายในห้อง') ?></div>
					<?php endif ?>
					<a href="<?=$book_url?>" class="-pmr-btn">
						จองเลย
					</a>
				<?php endif ?>
			</div>
			<div class="-action">
				<?php if ($layer == 2): ?>
					<div class="-l2-cta-btn">
						<a href="#!" onclick="navToSec(this)" data-nav="nav-unit-2" class="-btn">
							<?php pll_e('จองยูนิต') ?>
						</a>
					</div>
				<?php endif ?>
				<?php if ($layer == 3): ?>
					<a href="<?=$book_url?>" class="-pmr-btn">
						<?php pll_e('จองเลย') ?>
					</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</section>

<script type="text/javascript">
	let nowNav = -1
	let elSelector = []
	let navH = $('#header-nav').offsetHeight+$('#masthead').offsetHeight;
	let scrollY = 0;

	let expand = false;

	<?php if ($layer == 3) {
		?>let elSelectorAll = ['unit','info','room'];<?php
	} ?>
	<?php if ($layer == 2) {
		?>let elSelectorAll = ['unit','gall','info','fclt','loca','tour'];<?php
	} ?>
	function checkMenuTop(){
		navH = $('#header-nav').offsetHeight+$('#masthead').offsetHeight;
		let y = window.scrollY;
		scrollY = y;
		let topEl = []
		let newNav = 0;

		elSelector = []
		for(let i of elSelectorAll){
			let className = '.body-nav .-nav-'+i
			let el = $(className)
			if (el != undefined) {
				elY = el.getBoundingClientRect().y - navH
				if (elY<=0) {
					elSelector.push(i)
					topEl.push(elY)
				}
				
			}
		}
		newNav = topEl.length-1
		if (newNav != nowNav) {
			nowNav = newNav
			changeMenuTop()
		}
	}
	function changeMenuTop(){
		let el = $$('.header-nav-inner .-item')
		for(let i of el){
			i.dataset.active = -1
		}
		$(`.-item[data-nav="nav-${elSelector[elSelector.length-1]}"]`).dataset.active = 1

		let el_list = $$('.header-nav-inner .-list')
		for(let i of el_list){
			i.dataset.active = -1
		}
		$(`.-list[data-nav="nav-${elSelector[elSelector.length-1]}"]`).dataset.active = 1

		let el_display = $$('.header-nav-inner .-display')
		for(let i of el_display){
			i.dataset.active = -1
		}
		$(`.-display[data-nav="nav-${elSelector[elSelector.length-1]}"]`).dataset.active = 1
	}

	window.onscroll = ()=>{
		checkMenuTop()
	}

	function navToSec(el){
		let className = `.body-nav .-${el.dataset.nav}`
		let sec = $(className)
		let elY = sec.getBoundingClientRect().y+scrollY
		window.scrollTo({
			top: elY-navH+10,
			left: 0,
			behavior: "smooth",
		});
	}
	function expandMbNav() {
		$("#header-nav").dataset.expand*=-1
	}
</script>

<style type="text/css">
	/*-- Mobile Version --*/
	@media (max-width: 1320px) {
		.header-nav-inner {
			grid-template-columns: 120px auto;
		}
		#header-nav .-action{
			display: none;
		}
		#header-nav .-nav{
			display: none;
		}
	}
</style>