<?php
$id = get_the_ID();
$cp_field = get_field('hot_deal_l1');
$cp_pj_arg = array('post_type' => 'hot-deal', 'posts_per_page' => -1, 'post_parent' => $id);
$cp_pj = new WP_Query($cp_pj_arg);
$cp_pj_size = $cp_pj->found_posts;
$theme_img = get_site_url() . '/wp-content/themes/seed-spring/img';
if ($cp_pj_size==1) {
	$cp_url = get_permalink($cp_pj->posts[0]->ID);
	?>
	<script type="text/javascript">location.href="<?=$cp_url?>"</script>
	<?php
}
?>

<?php get_template_part('template-parts/hot-deal-l1','header',[
	"cp_id" => $id,
	"cp_title" => get_the_title()
]) ?>
<div class="cp-pj-wrap" data-aos="fade-up" data-aos-once="false">
	<h2 class="cp-pj-title"><?php pll_e('โครงการที่เข้าร่วมแคมเปญ') ?></h2>
</div>
<style type="text/css">
	.pj-filter {
		border-radius: 8px;
		cursor: pointer;
		border: 1px solid var(--blue-blue-800, #E0ECF8);
		background: var(--white, #FFF);
		width: 406px;
		padding-left: 0px;
		align-items: center;
		height: 82px;
		display: grid;
		grid-template-columns: 56px calc(100% - 22px - 56px) 22px;
		margin: auto;
		margin-top: 18px;
		margin-bottom: 24px;
		padding: 0 8px;
		position: relative;
		z-index: 10;
	}

	.pj-filter[data-selecting="0"] .-txt-all {
		display: none;
	}

	.pj-filter:not([data-selecting="0"]) .-txt-df {
		display: none;
	}

	.result-title .-df {
		display: none;
	}

	.result-title[data-selecting="0"] .-select {
		display: none;
	}

	.result-title[data-selecting="0"] .-df {
		display: block;
	}

	.pj-filter .-txt-all {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		margin-top: 6px;
	}

	.pj-filter-dropdown {
		width: 800px;
		position: absolute;
		top: calc(100% + 4px);
		left: 0;
		max-height: 360px;
		border-radius: 8px;
		border: 1px solid var(--blue-blue-800, #E0ECF8);
		background: var(--white, #FFF);
		padding: 24px;
		padding-top: 30px;
		overflow: auto;
		cursor: default;
		z-index: 2000;
	}

	.filter-title {
		color: var(--blue-blue-400, #3A638E);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		margin-bottom: 18px;
	}

	.pj-filter-dropdown .--line {
		width: 80px;
		height: 1px;
		background-color: #EDF2F6;
		margin-top: 40px;
		margin-bottom: 20px;
	}

	.pj-filter-dropdown .-f-item {
		display: inline-flex;
		padding: 4px 24px 4px 16px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		border-radius: 24px;
		border: 1px solid var(--blue-blue-600, #87AACE);
		background: var(--white, #FFF);
		cursor: pointer;
		user-select: none;
	}

	.pj-filter-dropdown .-f-item[data-checked="1"] {
		border-radius: 24px;
		border: 1px solid var(--veridian-veridian-400-main, #1D9F9B);
		background: var(--veridian-veridian-900, #F6FFFE);
	}

	.pj-filter-dropdown .-f-item[data-checked="1"] .svg-box rect {
		stroke: #1D9F9B !important;
		fill: #1D9F9B !important;
	}

	.pj-filter-dropdown .-box {
		position: relative;
	}

	.pj-filter[data-toggle="-1"] .pj-filter-dropdown {
		display: none;
	}

	.hd-pj-card[data-show="-1"] {
		display: none;
	}

	.pj-filter .-backdrop {
		width: 100%;
		position: fixed;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		z-index: 10;
		cursor: default;
	}

	.pj-filter[data-toggle="-1"] .-backdrop {
		display: none;
	}

	.pj-filter-dropdown .-group {
		display: flex;
		gap: 1rem;
	}

	.pj-filter .-txt-df {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		margin-top: 5px;
	}

	.-txt-all .-title {
		color: var(--black, #000);
		font-size: 18px;
		font-style: normal;
		font-weight: 700;
		line-height: 20px;
		/* 111.111% */
	}

	.-txt-all .-select {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		/* 123.077% */
		text-overflow: ellipsis;
		white-space: nowrap;
		overflow: hidden;
	}
	.pj-filter-backdrop {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		z-index: 10;
	}
	.pj-filter-backdrop[data-toggle="-1"]{
		display: none;
	}
	.toggle-cursos{
		transition: all .3s;
		transform: rotate(0deg);
	}
	.pj-filter[data-toggle="-1"] .toggle-cursos{
		transform: rotate(-180deg);
	}
</style>


<?php
$pj_filter = [];
$pj_filter['house'] = [];
$pj_filter['condominium'] = [];
foreach ($cp_pj->posts as $ck => $cv) {
	$post_pj = get_field('hot_deal_l2', $cv->ID)['project'][0];
	$pj_filter[$post_pj->post_type][$cv->ID] = [];
	$pj_filter[$post_pj->post_type][$cv->ID]['hd_id'] = $cv->ID;
	$pj_filter[$post_pj->post_type][$cv->ID]['pj_id'] = $post_pj->ID;
	$pj_filter[$post_pj->post_type][$cv->ID]['post'] = $post_pj;
}
?>
<div class="pj-filter-backdrop" data-toggle="-1" onclick="toggleClose()"></div>
<div class="cont">
	<div class="pj-filter" data-selecting="0" data-toggle="-1" onclick="toggleFilterParent(event)" data-aos="fade-up" data-aos-once="false">
		<div class="pointer-events-none">
			<img src="<?= $theme_img ?>/hotdeal/building-filter.svg">
		</div>
		<div class="pointer-events-none">
			<div class="-txt-df"><?php pll_e('โครงการ') ?></div>
			<div class="-txt-all">
				<div class="-title"><?php pll_e('โครงการ') ?></div>
				<div class="-select"></div>

			</div>
		</div>
		<div class="-backdrop"></div>
		<div class="pointer-events-none -toggle-list cursor-pointer toggle-cursos">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				<path d="M5 7.5L10 12.5L15 7.5" stroke="#545E67" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</div>
		<div class="pj-filter-dropdown">

			<?php if (ofsize($pj_filter['condominium']) > 0) : ?>
				<div>
					<h5 class="filter-title"><?php pll_e('คอนโดมีเนียม') ?></h5>
					<div class="-group">
						<?php foreach ($pj_filter['condominium'] as $pk => $pv) : ?>
							<div class="-f-item" data-checked="-1" data-hd_id="<?= $pk ?>" onclick="f_toggle(this)">
								<div class="-box">
									<svg class="svg-box" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
										<rect x="0.5" y="0.5" width="15" height="15" rx="3.5" fill="white" stroke="#87AACE" />
										<path d="M4 8.33334L6.1667 10.5L11.6667 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									</svg>
								</div>
								<span><?= $pv['post']->post_title ?></span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			<?php endif ?>

			<?php if (ofsize($pj_filter['house']) > 0 and ofsize($pj_filter['condominium']) > 0) : ?>
			<div class="--line"></div>
		<?php endif ?>

		<?php if (ofsize($pj_filter['house']) > 0) : ?>
			<div>
				<h5 class="filter-title"><?php pll_e('บ้านและทาวน์โฮม') ?></h5>
				<div class="-group">
					<?php foreach ($pj_filter['house'] as $pk => $pv) : ?>
						<div class="-f-item" data-checked="-1" data-hd_id="<?= $pk ?>" onclick="f_toggle(this)">
							<div class="-box">
								<svg class="svg-box" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
									<rect x="0.5" y="0.5" width="15" height="15" rx="3.5" fill="white" stroke="#87AACE" />
									<path d="M4 8.33334L6.1667 10.5L11.6667 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</div>
							<span><?= $pv['post']->post_title ?></span>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		<?php endif ?>

	</div>
</div>
</div>

<script type="text/javascript">
	
	function toggleClose(){
		$('.pj-filter-backdrop').dataset.toggle = -1
		$('.pj-filter').dataset.toggle = -1
	}
	function f_toggle(el) {
		el.dataset.checked *= -1
		reRenderCard()
	}

	function reRenderCard() {
		let card = $$('.hd-pj-card')
		let item = $$('.-f-item')
		let selected = []
		let selected_title = [];
		let selected_title_txt = '';
		let must_filter = false;
		let html = ``

		for (let i of item) {
			if (i.dataset.checked == 1) {
				selected.push(i.dataset.hd_id)
			}
		}
		if (selected.length > 0) {
			must_filter = true
			$('.filter-bar').style.display = 'block'
		} else {
			$('.filter-bar').style.display = 'none'
		}

		for (let i of card) {
			let hd_id = i.dataset.hd_id
			if (selected.indexOf(hd_id) > -1) {
				i.dataset.show = 1
				selected_title.push(i.dataset.title)
				html += `<div data-hd_id="${hd_id}" class="-i">${i.dataset.title}<asw-x onclick="removeSelect(${hd_id})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none"> <path d="M12 4L4 12" stroke="#055E5B" stroke-linecap="round" stroke-linejoin="round"/> <path d="M4 4L12 12" stroke="#055E5B" stroke-linecap="round" stroke-linejoin="round"/> </svg></asw-x></div>`
			} else {
				if (must_filter) {
					i.dataset.show = -1
				} else {
					i.dataset.show = 1
				}
			}
		}
		$('.filter-bar-inner .-select').innerHTML = html
		$('.pj-filter').dataset.selecting = selected.length
		$('.result-title').dataset.selecting = selected.length
		$('.-select-count').innerHTML = selected.length
		selected_title_txt = selected_title.join(', ')
		$('.-txt-all .-select').innerHTML = selected_title_txt
		animatedRefreshProject()
	}

	function toggleFilterParent(e) {
		if (e.target.classList[0] == 'pj-filter' || e.target.classList[0] == '-backdrop') {
			$('.pj-filter').dataset.toggle *= -1
		}
		$('.pj-filter-backdrop').dataset.toggle = $('.pj-filter').dataset.toggle
	}


	function removeSelect(hid) {
		$(`.-f-item[data-hd_id="${hid}"]`).click()
	}

	function clearSelect() {
		let el = $$('.-f-item')
		for (let i of el) {
			i.dataset.checked = -1
		}
		reRenderCard()
	}
</script>

<style type="text/css">
	.filter-bar {
		border: 1px solid var(--blue-blue-800, #E0ECF8);
		background: var(--white, #FFF);
		padding: 1rem 0;
		margin-bottom: 30px;
		display: none;
	}

	.filter-bar-inner .-reset {
		display: flex;
		padding: 8px 16px;
		justify-content: center;
		align-items: center;
		gap: 4px;
		color: var(--orange-orange-500-main, #F1683B);
		text-align: center;
		font-size: 26px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		/* 123.077% */
		cursor: pointer;
		white-space: nowrap;
	}

	.filter-bar-inner .-l {
		color: var(--veridian-veridian-200, #055E5B);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px;
		display: flex;
		gap: 1rem;
		align-items: center;
	}

	.filter-bar-inner .-r {}

	.filter-bar-inner {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 1rem;
	}

	.filter-bar-inner .-i {
		border-radius: 40px;
		border: 1px solid var(--veridian-veridian-600, #47CBC7);
		background: var(--veridian-veridian-900, #F6FFFE);
		display: inline-flex;
		padding: 4px 12px 4px 16px;
		justify-content: center;
		align-items: center;
		gap: 8px;
	}

	.filter-bar-inner .-select {
		display: flex;
		gap: 0.5rem;
	}

	asw-x {
		cursor: pointer;
	}

	.-list-num {
		color: var(--grey-grey-400, #828A92);
		font-size: 30px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
</style>
<section class="filter-bar">
	<div class="cont">
		<div class="filter-bar-inner">
			<div class="-l">
				<div class="-title"><?php pll_e('โครงการ') ?>:</div>
				<div class="-select"></div>
			</div>
			<div class="-r">
				<div class="-reset">
					<img src="<?= $theme_img ?>/hotdeal/reset.svg?1">
					<span><?php pll_e('ล้างทั้งหมด') ?></span>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="hd-pj-cards-section">
	<div class="cont">
		<div data-selecting="0" class="result-title">
			<h5 class="-df mb-5"><?php pll_e('โครงการทั้งหมด') ?> <span class="-list-num">- <?= $cp_pj->post_count ?> <?php pll_e('รายการ') ?></span></h5>
			<h5 class="-select mb-5"><?php pll_e('ผลการค้นหา') ?> <span class="-list-num">- <span class="-select-count">0</span> <?php pll_e('รายการ') ?></span></h5>

		</div>
		<?php foreach ($cp_pj->posts as $pj_k => $pj_v) {
			$url = get_permalink($pj_v->ID);
			$f = get_field('hot_deal_l2', $pj_v->ID);
			$this_pj = $f['project'][0];
			$pj_id = $this_pj->ID;
			$pj_title = $this_pj->post_title;
			$pj_type = $this_pj->post_type;
			$pj_logo = get_field('logo', $pj_id)['sizes']['1536x1536'];
			$stat_name = wp_get_object_terms($pj_id, 'project_status');
			$location_term = wp_get_object_terms($pj_id, 'project_location');
			$location = '';
			foreach ($location_term as $lk => $lv) {
				if ($lv->parent != 0) {
					$location = $lv->name;
				}
			}
			$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
			$stat_label = get_field('label', 'project_status' . '_' . $stat_name[0]->term_id);
			$cp_pj_un_arg = array('post_type' => 'hot-deal', 'posts_per_page' => 3, 'post_parent' => $pj_v->ID);
			$cp_pj_un = new WP_Query($cp_pj_un_arg);
			$url = get_permalink($pj_v->ID);
			?>
			<article class="hd-pj-card" data-title="<?= $pj_title ?>" data-hd_id="<?= $pj_v->ID ?>" data-show="1" data-aos="fade-up" data-aos-once="false">
				<div class="-about">
					<img src="<?= $pj_logo ?>" class="-img">
					<span class="-pj-status" style="color:<?= $stat_color ?>"><?= $stat_label ?></span>
					<div class="pj-about-term">
						<div class="-a">
							<img src="<?= $theme_img ?>/hotdeal/condominium.svg">
							<span><?php pll_e('คอนโดมิเนียม') ?></span>
						</div>
						<div class="-b">
							<img src="<?= $theme_img ?>/hotdeal/location.svg">
							<span><?= $location ?></span>
						</div>
					</div>
					<a href="<?= $url ?>" class="-btn" target="_blank">
						<span><?php pll_e('ดูรายละเอียดและยูนิตทั้งหมด') ?></span>
						<span>
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M19 23L25 16L19 9" stroke="#123F6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M7 16L24 16" stroke="#123F6D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
					</a>
				</div>
				<?php 
				get_template_part('template-parts/hot-deal', 'units', [$pj_k, $cp_pj_un->posts, "container"]); 
				?>
			</article>
		<?php } ?>
	</div>
</section>

<script type="text/javascript">
	function animatedRefreshProject() {
		AOS.refresh()
	}
</script>

<?php get_template_part('template-parts/hot-deal', 'responsive') ?>