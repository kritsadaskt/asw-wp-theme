
<?php get_header() ?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js" async></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/seed-spring/css/compare.css">
<?php 
if (pll_current_language()=='en') {
	$filter_price = get_field('filter_price_range',39867);
}else if(pll_current_language()=='cn') {
	$filter_price = get_field('filter_price_range',39868);
}else{
	$filter_price = get_field('filter_price_range',2);
}

?>
<div class="cont-pd py-4 flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/compare" class=""><?php pll_e('เปรียบเทียบโครงการ')?></a>
	</div>
<?php 
$fclt_terms = get_terms([
	'taxonomy' => 'project-facility',
	'hide_empty' => false,
]);

$info_terms = get_terms([
	'taxonomy' => 'project-information',
	'hide_empty' => false,
]);

if ($_GET['project'] == '') {
	?>
	<script type="text/javascript">
		if(localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug') != null && localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug') != ''){
			let newurl = '/<?=pll_current_language()?>/compare/?project='+localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug');
			location.href = newurl;
		}
	</script>
	<?php
}else{
?><script type="text/javascript">
	function checkViewport(){
		const w = document.body.clientWidth;
		if (w<=768) {
			if(localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug') != null && localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug') != ''){
				let newSlug = localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug').split(',')
				if (newSlug.length == 3) {
					newSlugUrl = newSlug[0]+','+newSlug[1]
					localStorage['asw_<?=pll_current_language()?>_cp_slug'] = newSlugUrl
					let newurl = '/<?=pll_current_language()?>/compare/?project='+localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug');
					location.href = newurl;
				}
			}
		}
	}
	checkViewport()
	addEventListener("resize", (event) => {checkViewport()});
	</script><?php
}
$pj_compare_slug = explode(',', $_GET['project']);
$pj_info_data = array();
$pj_compare = [];
$found_all = true;
$pj_data = [];
$pj_compare_slug_new = [];
if ($pj_compare_slug>0) {
	if ($pj_compare_slug[0] != '') {
		foreach ($pj_compare_slug as $key => $slug) {
			$args = array(
				'name' => $slug,
				'post_type' => ['house','condominium'],
				'post_status' => 'publish',
				'numberposts' => 1,
				'post_parent' => 0
			);
			$posts = get_posts($args);
			if ($posts[0]->ID != '') {
				$pj_id = $posts[0]->ID;
				array_push($pj_compare,strval($pj_id));
				array_push($pj_compare_slug_new,$slug);
				$data = [];
				$data['post'] = $posts[0];
				$data['type'] = $data['post']->post_type;
				$data['price'] = get_field('price',$pj_id);
				$data['location'] = get_the_terms($pj_id,'project_location')[0]->name;
				$data['compare'] = get_field('compare',$pj_id);
				$pj_data[$pj_id] = $data;
			}else{
				$found_all = false;
			}
		}
	}
}


$top_param = join(",",$pj_compare_slug_new);
$top_param_id = join(",",$pj_compare);
$top_url_param = "/".pll_current_language()."/compare/?project=".$top_url_param;
if (!$found_all) {
	?>
	<script type="text/javascript">
		window.history.pushState({path:`<?=$top_url_param?>`},'',`<?=$top_url_param?>`);
	</script>
	<?php
}
?>
<script type="text/javascript">
	localStorage.asw_<?=pll_current_language()?>_cp_slug = `<?=$top_param?>`;
	localStorage.asw_<?=pll_current_language()?>_cp = `<?=$top_param_id?>`;
</script>
<div id="app" class="container mx-auto compare">

	<!-- Notice -->
	<div v-show="showNotice" class="notice">
		<div>
			<div class="notice-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M1.22473 7.10863C0.980649 6.86455 0.980649 6.46882 1.22473 6.22474L5.2022 2.24727C5.44628 2.00319 5.84201 2.00319 6.08609 2.24727C6.33016 2.49135 6.33016 2.88707 6.08609 3.13115L3.17555 6.04169H18.3333C18.6785 6.04169 18.9583 6.32151 18.9583 6.66669C18.9583 7.01186 18.6785 7.29169 18.3333 7.29169H3.17555L6.08609 10.2022C6.33016 10.4463 6.33016 10.842 6.08609 11.0861C5.84201 11.3302 5.44628 11.3302 5.2022 11.0861L1.22473 7.10863Z" fill="#323A41"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M18.7753 15.0253C19.0194 14.7812 19.0194 14.3854 18.7753 14.1414L14.7978 10.1639C14.5537 9.91982 14.158 9.91982 13.9139 10.1639C13.6698 10.408 13.6698 10.8037 13.9139 11.0478L16.8245 13.9583H1.66667C1.32149 13.9583 1.04167 14.2381 1.04167 14.5833C1.04167 14.9285 1.32149 15.2083 1.66667 15.2083H16.8245L13.9139 18.1188C13.6698 18.3629 13.6698 18.7587 13.9139 19.0027C14.158 19.2468 14.5537 19.2468 14.7978 19.0027L18.7753 15.0253Z" fill="#323A41"/>
				</svg>
			</div>
		</div>
		<div>
			<h5><?php pll_e('เปรียบเทียบได้สูงสุด') ?> <span class="hidden md:inline">3</span><span class="md:hidden">2</span> <?php pll_e('โครงการ') ?></h5>
			<p><?php pll_e('กรุณาลบโครงการที่เลือกไว้ 1 โครงการ เพื่อเพิ่มโครงการใหม่') ?></p>
		</div>

		<svg class="notice-close" xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none" @click="showNotice = false;">
			<path d="M2.79276 2.67188L12.3247 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			<path d="M12.3145 2.67188L2.7826 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</div>

	<!-- Modal -->
	<div class="comp-bg">
		<div class="comp-modal" data-filter-toggle="-1" @click="checkIfFilterToggle">
			<div class="btn-close" onclick="handleFilterModal('none')">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M4 4L20 20" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M20 4L4 20" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<div class="-inner">
				<h2 class="text-center mb-5 mt-4"><?php pll_e('เลือกโครงการเพื่อเปรียบเทียบ') ?></h2>

				<!-- Mobile -->
				<section class="filter-mb-section" @click="mbExpandToggle()">
					<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
					<span><?php pll_e('ค้นหาที่อยู่โครงการในแบบคุณ') ?></span>
					<img src="/wp-content/uploads/2022/11/arrow.png" class="quick-filter-arrow" style="height: 15px">	
				</section>

				<div v-if="mbExpand" class="filter-mb-expand">
					<!-- type -->
					<div class="filter-mb-type">
						<div class="filter-menu" @click="selectToggle('type')">
							<div>
								<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
								<span><?php pll_e('ประเภทโครงการ') ?></span>
							</div>
							<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'type' }" style="height:.5rem;margin: 0;">
						</div>
						<div v-if="state == 'type'" class="filter-data">
							<div v-for="type in type_list" :key="type.term_id">
								<div class="filter-select" :class="{ active : filter_type.includes(type.name) }" @click="add_filter('type', type.name)">
									<!-- select -->
									<span v-if="filter_type.includes(type.name)">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
											<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<!-- not select -->
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
										</svg>
									</span>
									<span>{{ type.name }}</span>
								</div>
							</div>
						</div>
					</div>
					<!-- locale -->
					<div class="filter-mb-type">
						<div class="filter-menu" @click="selectToggle('location')">
							<div>
								<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem;">
								<span><?php pll_e('ทำเลที่คุณสนใจ') ?></span>
							</div>
							<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'location' }" style="height:.5rem;margin: 0;">
						</div>
						<div v-if="state == 'location'" class="filter-data"><?php pll_e('ในกรุงเทพฯ') ?></span>
							<sp style="height: 8px;" ></sp>
							<div class="filter-lists">
								<div v-for="location in location_list_bkk" :key="location.term_id" class="filter-select" :class="{ active : filter_location.includes(location.name) }" @click="add_filter('location', location.name)">
									<!-- select -->
									<span v-if="filter_location.includes(location.name)">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
											<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<!-- not select -->
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
										</svg>
									</span>
									<span>{{ location.name }}</span>
								</div>
							</div>

							<div style="padding-top: 42px;padding-bottom: 22px;">
								<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
							</div>
							<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด') ?></span>
							<sp style="height: 8px;" ></sp>
							<div class="filter-lists">
								<div v-for="location in location_list_upcountry" :key="location.term_id" class="filter-select" :class="{ active : filter_location.includes(location.name) }" @click="add_filter('location', location.name)">
									<!-- select -->
									<span v-if="filter_location.includes(location.name)">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
											<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<!-- not select -->
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
										</svg>
									</span>
									<span>{{ location.name }}</span>
								</div>
							</div>
						</div>
					</div>
					<!-- brand -->
					<div class="filter-mb-type">
						<div class="filter-menu" @click="selectToggle('brand')">
							<div>
								<img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem;">
								<span><?php pll_e('เลือกแบรนด์') ?></span>
							</div>
							<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'brand' }" style="height:.5rem;margin: 0;">
						</div>
						<div v-if="state == 'brand'" class="filter-data">
							<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม') ?></span>
							<sp style="height: 8px;" ></sp>
							<div class="filter-lists">
								<div v-for="brand in brand_list_condo" :key="brand.slug" class="filter-select" :class="{ active : filter_brand.find(el => el.slug == brand.slug) }" @click="add_filter('brand', { name: brand.name, slug: brand.slug})">
									<!-- select -->
									<span v-if="filter_brand.find(el => el.slug == brand.slug)">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
											<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<!-- not select -->
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
										</svg>
									</span>
									<span>{{ brand.name }}</span>
								</div>
							</div>

							<div style="padding-top: 40px;padding-bottom: 22px;">
								<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
							</div>
							<span class="cl-ci-blue-300" style="font-size: 26px;white-space: nowrap;">บ้านและทาวน์โฮม</span>
							<sp style="height: 8px;" ></sp>
							<div class="filter-lists">
								<div v-for="brand in brand_list_house" :key="brand.slug" class="filter-select" :class="{ active : filter_brand.find(el => el.slug == brand.slug) }" @click="add_filter('brand', { name: brand.name, slug: brand.slug})">
									<!-- select -->
									<span v-if="filter_brand.find(el => el.slug == brand.slug)">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
											<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<!-- not select -->
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
										</svg>
									</span>
									<span>{{ brand.name }}</span>
								</div>
							</div>
						</div>
					</div>

					<!-- price -->
					<div class="filter-mb-type">
						<div class="filter-menu" @click="selectToggle('price')">
							<div>
								<img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem;">
								<span><?php pll_e('>่ช่วงราคา') ?></span>
							</div>
							<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'price' }" style="height:.5rem;margin: 0;">
						</div>
						<div v-if="state == 'price'" class="filter-data">
							<div class="filter-price-lists">
								<div v-for="price in price_list" :key="price.min" class="filter-price-list" :class="{ active : filter_price == price }" @click="add_filter('price', price)">
									{{ price.label }}
								</div>
							</div>
						</div>
					</div>

					<div class="mb-expand-bar">
						<button class="btn-clear" @click="clearFilter()"><?php pll_e('ล้างทั้งหมด') ?></button>
						<button class="btn-search" @click="mbExpandToggle()"><?php pll_e('ค้นหา') ?></button>
					</div>
				</div>


				<!-- Desktop -->

				<section class="filter-section">
					<div class="filter-box">
						<div @click="selectToggle('type')">
							<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
							<span v-if="filter_type.length <= 0"><?php pll_e('ประเภทโครงการ') ?></span>
								<span v-else><?php pll_e('เลือกแล้ว') ?> {{ filter_type.length }} <?php pll_e('โครงการ') ?></span>
								<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'type' }" style="height:.5rem">
							</div>
							<div @click="selectToggle('location')">
								<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem;">
								<span v-if="filter_location.length <= 0"><?php pll_e('ทำเลที่คุณสนใจ') ?></span>
									<span v-else><?php pll_e('เลือกแล้ว') ?> {{ filter_location.length }} <?php pll_e('ทำเล') ?> </span>
									<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'location' }" style="height:.5rem">
								</div>
								<div @click="selectToggle('brand')">
									<img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem;">
									<span v-if="filter_brand.length <= 0"><?php pll_e('เลือกแบรนด์') ?></span>
										<span v-else><?php pll_e('เลือกแล้ว') ?> {{ filter_brand.length }} <?php pll_e('แบรนด์') ?> </span>
										<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'brand' }" style="height:.5rem">
									</div>
									<div @click="selectToggle('price')">
										<img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem;">
										<span v-if="filter_price.label == 'none'"><?php pll_e('ช่วงราคา') ?></span>
										<span v-else>{{ filter_price.label }}</span>
										<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'price' }" style="height:.5rem">
									</div>
								</div>
								<div class="clear-filter" @click="clearFilter()"><?php pll_e('ล้างทั้งหมด') ?></div>
							</section>

							<!-- Filter Type -->
							<div v-if="state == 'type'" id="filter_type" class="filter-toggle type">
								<div class="bg-white round" style="padding:45px 24px;padding-top: 30px;">
									<div v-for="type in type_list" :key="type.term_id">
										<div class="filter-select" :class="{ active : filter_type.includes(type.name) }" @click="add_filter('type', type.name)">
											<!-- select -->
											<span v-if="filter_type.includes(type.name)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
													<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											<!-- not select -->
											<span v-else>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
												</svg>
											</span>
											<span>{{ type.name }}</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Filter Location -->
							<div v-if="state == 'location'" id="filter_location" class="filter-toggle location">
								<div class="bg-white round" style="padding:45px 24px;padding-top: 30px;">
									<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ในกรุงเทพฯ') ?></span>
									<sp style="height: 8px;" ></sp>
									<div class="filter-lists">
										<div v-for="location in location_list_bkk" :key="location.term_id" class="filter-select" :class="{ active : filter_location.includes(location.name) }" @click="add_filter('location', location.name)">
											<!-- select -->
											<span v-if="filter_location.includes(location.name)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
													<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											<!-- not select -->
											<span v-else>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
												</svg>
											</span>
											<span>{{ location.name }}</span>
										</div>
									</div>

									<div style="padding-top: 42px;padding-bottom: 22px;">
										<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
									</div>
									<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('ต่างจังหวัด') ?></span>
									<sp style="height: 8px;" ></sp>
									<div class="filter-lists">
										<div v-for="location in location_list_upcountry" :key="location.term_id" class="filter-select" :class="{ active : filter_location.includes(location.name) }" @click="add_filter('location', location.name)">
											<!-- select -->
											<span v-if="filter_location.includes(location.name)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
													<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											<!-- not select -->
											<span v-else>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
												</svg>
											</span>
											<span>{{ location.name }}</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Filter Brand -->
							<div v-if="state == 'brand'" id="filter_location" class="filter-toggle brand">
								<div class="bg-white round" style="padding:48px 32px;padding-top: 30px;">
									<span class="cl-ci-blue-300" style="font-size: 26px;"><?php pll_e('คอนโดมิเนียม') ?></span>
									<sp style="height: 8px;" ></sp>
									<div class="filter-lists">
										<div v-for="brand in brand_list_condo" :key="brand.slug" class="filter-select" :class="{ active : filter_brand.find(el => el.slug == brand.slug) }" @click="add_filter('brand', { name: brand.name, slug: brand.slug})">
											<!-- select -->
											<span v-if="filter_brand.find(el => el.slug == brand.slug)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
													<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											<!-- not select -->
											<span v-else>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
												</svg>
											</span>
											<span>{{ brand.name }}</span>
										</div>
									</div>

									<div style="padding-top: 40px;padding-bottom: 22px;">
										<hr style="width: 80px;background-color: var(--cl-ci-grey-900);">
									</div>
									<span class="cl-ci-blue-300" style="font-size: 26px;white-space: nowrap;">บ้านและทาวน์โฮม</span>
									<sp style="height: 8px;" ></sp>
									<div class="filter-lists">
										<div v-for="brand in brand_list_house" :key="brand.term_id" class="filter-select" :class="{ active : filter_brand.find(el => el.slug == brand.slug) }" @click="add_filter('brand', { name: brand.name, slug: brand.slug})">
											<!-- select -->
											<span v-if="filter_brand.find(el => el.slug == brand.slug)">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
													<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</span>
											<!-- not select -->
											<span v-else>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
												</svg>
											</span>
											<span>{{ brand.name }}</span>
										</div>
									</div>
								</div>
							</div>

							<!-- Filter Price -->
							<div v-if="state == 'price'" id="filter_type" class="filter-toggle price">
								<div class="bg-white round" style="padding:45px 24px;padding-top: 30px;">
									<div class="filter-price-lists">
										<div v-for="price in price_list" :key="price.min" class="filter-price-list" :class="{ active : filter_price == price }" @click="add_filter('price', price)">
											{{ price.label }}
										</div>
									</div>
								</div>
							</div>



							<!-- ----------------------- -->

							<h2><?php pll_e('โครงการทั้งหมด') ?></h2>
							<br/>

							<div class="estate-list" the="<?=$cate_parent->name?>" cate="<?=$cate_brand->name?>">

								<?php
								$args = array(
									'post_type' => ['condominium','house'],
									'post_status' => 'publish',
									'posts_per_page' => 100, 
									'orderby' => 'date', 
									'order' => 'DESC',
									'post_parent' => 0,
								);
								$loop = new WP_Query( $args );

								$order = 0;
								while ( $loop->have_posts() ) : $loop->the_post(); {

									if ($post->post_name != 'en') {
										$featured_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
										$cate_name = wp_get_object_terms( $post->ID, 'project-type');
										foreach ($cate_name as $pjt_k => $pjt_v) {
											if ($pjt_v->parent == 0) {
												$cate_parent = $pjt_v;
											} else{
												$cate_brand = $pjt_v;
											}
										}
										$loca_name = wp_get_object_terms( $post->ID, 'project_location');
										foreach ($loca_name as $pjt_k => $pjt_v) {
											if ($pjt_v->parent == 0) {
												$loca_parent = $pjt_v;
											} else{
												$loca_child = $pjt_v;
											}
										}

										$stat_name = wp_get_object_terms( $post->ID, 'project_status');
										$cate_icon = get_field('icon','project-type' . '_' . $cate_parent->term_id);
										$stat_color = get_field('color','project_status' . '_' . $stat_name[0]->term_id);
										$stat_label = get_field('label','project_status' . '_' . $stat_name[0]->term_id);
										$price = get_field('price');
										$order++;
										$pj_price = 0;
										$float_value = (float) $price;
										if (strval($float_value) == $price) {
											$pj_price = floatval($price)*100;
										}
										$logo = get_field('logo')['sizes']['large'];

										$brand_arr = array_filter(wp_get_object_terms( $post->ID, 'project-type'), function ($var) {
											return ($var->term_id == 43);
										});
										?>

										{{ storeData('<?=$post->ID?>', '<?=$cate_parent->name?>', '<?=$loca_child->name?>', '<?=$post->post_title?>') }}
										<div v-show="onShow('<?=$cate_parent->name?>', '<?=$loca_child->name?>', '<?=$cate_brand->slug?>', '<?=$price?>')" class="estate-card" :class="{ selected : selectEstate.includes('<?=$post->ID?>')}" estate-id="<?=$post->ID?>" estate-slug="<?=$post->post_name?>" estate-brand="<?=$cate_brand->slug?>" estate-title="<?=$post->post_title?>">
											<div class="estate-selected" @click.prevent="selectCompare('<?=$post->ID?>')">
												<!-- select -->
												<span v-if="selectEstate.includes('<?=$post->ID?>')">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="#1D9F9B" stroke="#1D9F9B" stroke-width="1.5"/>
														<path d="M6 12.5L9.25005 15.75L17.5 7.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
													</svg>
												</span>
												<!-- not select -->
												<span v-else>
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect x="0.75" y="0.75" width="22.5" height="22.5" rx="5.25" fill="white" stroke="#87AACE" stroke-width="1.5"/>
													</svg>
												</span>
											</div>
											<div class="estate-image">
												<img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large') ?>">
											</div>
											<div class="estate-info">
												<img class="logo ml-4" src="<?= $logo?>" />
												<div>
													<div class="row-span-1 md:col-span-1 pl-4 flex items-center" style="color: <?= $stat_color ?>;border-left: 4px solid <?= $stat_color ?>;">
														<span class="" style="font-weight: 700;font-size: 18px;line-height: 20px;"><?=$stat_name[0]->name?></span>
													</div>
												</div>
												<div>
													<div class="flex ml-4">
														<span>
															<?php if($cate_parent->name == 'บ้านและทาวน์โฮม'){?>
																<img src="/wp-content/themes/seed-spring/img/minimal-icon/minimal-icon-house.png">
															<?php }else{?>
																<img src="/wp-content/themes/seed-spring/img/minimal-icon/minimal-icon-condo.png">
															<?php }?>
														</span>
														<?=$cate_parent->name?>
													</div>
													<div class="flex ml-4">
														<span>
															<img src="/wp-content/themes/seed-spring/img/minimal-icon/minimal-icon-map.png" class="project-card-icon -loca">
														</span>
														<?=$loca_child->name?>
													</div>
												</div>
												<div class="flex ml-4">
													<div>เริ่มต้น</div>
													<span class="txt-price" style="margin-left: 6px;margin-right: 6px;"><?=$price?></span>ล้านบาท
												</div>
											</div>
										</div>

										<?php
									}
								}
							endwhile;

							wp_reset_postdata();
							?>
						</div>
						<!-- </div> -->
					</section>
				</div>

				<div class="compare-bar">
					<div v-if="selectEstate.length > 0" class="compare-mobile-short-container">
						<div v-for="estate in selectEstate" :key="'cp_pc' + estate" class="compare-mobile-short">
							<div class="name">{{ findEstateData(estate).name }}</div>
							<div class="detail-set">
								<div>
									<span v-if="findEstateData(estate).type == 'condominium'">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
											<path d="M1.33594 14H3.09032M14.6693 14H12.9149M12.9149 14V2H3.09032V14M12.9149 14H9.40611M3.09032 14H6.5991M9.40611 14V10H6.5991V14M9.40611 14H6.5991M5.54646 7.33333H6.94997M5.54646 4.66667H6.94997M9.05524 7.33333H10.4587M9.05524 4.66667H10.4587" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<span v-else>
										<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
											<path d="M1 5.2L6 1L11 5.2V11.8C11 12.1183 10.8829 12.4235 10.6746 12.6485C10.4662 12.8736 10.1836 13 9.88889 13H2.11111C1.81643 13 1.53381 12.8736 1.32544 12.6485C1.11706 12.4235 1 12.1183 1 11.8V5.2Z" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M4.33203 13V7H7.66537V13" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<span>{{ findEstateData(estate).type }}</span>
								</div>
								<div>
									<span>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
											<path d="M8.0026 8.5599C8.92308 8.5599 9.66927 7.8137 9.66927 6.89323C9.66927 5.97275 8.92308 5.22656 8.0026 5.22656C7.08213 5.22656 6.33594 5.97275 6.33594 6.89323C6.33594 7.8137 7.08213 8.5599 8.0026 8.5599Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
											<path d="M13 6.89062C13 10.7795 8 14.1128 8 14.1128C8 14.1128 3 10.7795 3 6.89062C3 5.56454 3.52678 4.29277 4.46447 3.35509C5.40215 2.41741 6.67392 1.89062 8 1.89062C9.32608 1.89063 10.5979 2.41741 11.5355 3.35509C12.4732 4.29277 13 5.56454 13 6.89062Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
										</svg>
									</span>
									<span>{{ findEstateData(estate).location }}</span>
								</div>
							</div>
							<div class="btn-close" @click="removeProjectVueTemp(estate);">
								<img src="/wp-content/themes/seed-spring/img/icon-close.svg">
							</div>
						</div>
					</div>
					<div class="compare-line">
						<div class="hidden md:block" style="padding-right: 12px;">
							<?php pll_e('โครงการที่เลือกไว้') ?>
							<br/>
							<span class="hidden md:block">{{ selectEstate.length }}/3</span>
							<span class="md:hidden">{{ selectEstate.length }}/2</span>
						</div>
						<div class="md:hidden"><?php pll_e('โครงการที่เลือกไว้') ?> {{ selectEstate.length }}/2</div>
						<div class="btn-compare-mobile">
							<button v-if="selectEstate.length <= 0" class="compare-btn"><?php pll_e('เปรียบเทียบ') ?></button>
								<a v-else class="compare-btn-active" @click="compareLocal()" :href="'/<?=pll_current_language()?>/compare/?project='+compareURL"><?php pll_e('เปรียบเทียบ') ?></a>
							</div>
							<div v-for="estate in selectEstate" :key="'cp_pc' + estate" class="compare-pc-short">
								<div class="name">{{ findEstateData(estate).name }}</div>
								<div class="detail-set">
									<div>
										<span v-if="findEstateData(estate).type == 'condominium'">
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
												<path d="M1.33594 14H3.09032M14.6693 14H12.9149M12.9149 14V2H3.09032V14M12.9149 14H9.40611M3.09032 14H6.5991M9.40611 14V10H6.5991V14M9.40611 14H6.5991M5.54646 7.33333H6.94997M5.54646 4.66667H6.94997M9.05524 7.33333H10.4587M9.05524 4.66667H10.4587" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
										<span v-else>
											<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
												<path d="M1 5.2L6 1L11 5.2V11.8C11 12.1183 10.8829 12.4235 10.6746 12.6485C10.4662 12.8736 10.1836 13 9.88889 13H2.11111C1.81643 13 1.53381 12.8736 1.32544 12.6485C1.11706 12.4235 1 12.1183 1 11.8V5.2Z" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M4.33203 13V7H7.66537V13" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
										<span>{{ findEstateData(estate).type }}</span>
									</div>
									<div>
										<span>
											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
												<path d="M8.0026 8.5599C8.92308 8.5599 9.66927 7.8137 9.66927 6.89323C9.66927 5.97275 8.92308 5.22656 8.0026 5.22656C7.08213 5.22656 6.33594 5.97275 6.33594 6.89323C6.33594 7.8137 7.08213 8.5599 8.0026 8.5599Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
												<path d="M13 6.89062C13 10.7795 8 14.1128 8 14.1128C8 14.1128 3 10.7795 3 6.89062C3 5.56454 3.52678 4.29277 4.46447 3.35509C5.40215 2.41741 6.67392 1.89062 8 1.89062C9.32608 1.89063 10.5979 2.41741 11.5355 3.35509C12.4732 4.29277 13 5.56454 13 6.89062Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</span>
										<span>{{ findEstateData(estate).location }}</span>
									</div>
								</div>
								<div class="btn-close" @click="removeProjectVueTemp(estate);">
									<img src="/wp-content/themes/seed-spring/img/icon-close.svg">
								</div>
							</div>
						</div>
						<div class="hidden md:block">
							<button v-if="selectEstate.length <= 0" class="compare-btn"><?php pll_e('เปรียบเทียบ') ?></button>
								<a v-else class="compare-btn-active" @click="compareLocal()" :href="'/<?=pll_current_language()?>/compare/?project='+compareURL"><?php pll_e('เปรียบเทียบ') ?></a>
							</div>
						</div>
					</div>
					<!-- </div> -->
				</div>

				<div class="sticky-estate" id="v-sticky-estate">
					<div class="sticky-top-inner container mx-auto">
						<section class="sticky-top sticky">

							<div class="-title">
								<?php pll_e('เปรียบเทียบโครงการ') ?>
							</div>
							<div class="-detail">
								<div class="-col -estate" data-pj-col="0" data-col-show="0">
									<div class="select-estate-minimal" onclick="handleFilterModal('flex')">
										<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
										</svg>

									</div>
									<div class="show-estate-minimal">

									</div>
								</div>
								<div class="-col -estate" data-pj-col="1" data-col-show="0">
									<div class="select-estate-minimal" onclick="handleFilterModal('flex')">
										<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
										</svg>

									</div>
									<div class="show-estate-minimal">

									</div>
								</div>
								<div class="-col -estate" data-pj-col="2" data-col-show="0">
									<div class="select-estate-minimal" onclick="handleFilterModal('flex')">
										<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
											<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
										</svg>

									</div>
									<div class="show-estate-minimal">

									</div>
								</div>
							</div>

						</section>
					</div>
				</div>

				<!-- Page -->
				<section class="comp-header">
					<div class="-title">
						<h1><?php pll_e('เปรียบเทียบโครงการ') ?></h1>

						<div class="-info"><?php pll_e('เปรียบเทียบได้มากที่สุด') ?> 
							<span class="inline md:hidden"><?php pll_e('2 โครงการ') ?></span>
							<span class="hidden md:block"><?php pll_e('3 โครงการ') ?></span>

						</div>
					</div>
					<div class="-detail">
						<div class="-col -estate" data-pj-col="0" data-col-show="0">
							<div class="select-estate" onclick="handleFilterModal('flex')">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
								</svg>
								<?php pll_e('เพิ่มโครงการ') ?>
							</div>
							<div class="show-estate">

							</div>
						</div>
						<div class="-col -estate" data-pj-col="1" data-col-show="0">
							<div class="select-estate" onclick="handleFilterModal('flex')">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
								</svg>
								<?php pll_e('เพิ่มโครงการ') ?>
							</div>
							<div class="show-estate">

							</div>
						</div>
						<div class="-col -estate" data-pj-col="2" data-col-show="0">
							<div class="select-estate" onclick="handleFilterModal('flex')">
								<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
									<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
								</svg>
								<?php pll_e('เพิ่มโครงการ') ?>
							</div>
							<div class="show-estate">

							</div>
						</div>
					</div>
				</section>

				<section class="comp-body -price">
					<div class="-title">
						<h3 class="comp-title"><?php pll_e('ราคา') ?></h3>
					</div>
					<div class="-detail">
						<div class="-item" data-pj-col="0" data-col-show="-1"><?php pll_e('เริ่มต้น') ?> <span class="-value mx-2"></span> <?php pll_e('ล้านบาท') ?></div>
						<div class="-item" data-pj-col="1" data-col-show="-1"><?php pll_e('เริ่มต้น') ?> <span class="-value mx-2"></span> <?php pll_e('ล้านบาท') ?></div>
						<div class="-item" data-pj-col="2" data-col-show="-1"><?php pll_e('เริ่มต้น') ?> <span class="-value mx-2"></span> <?php pll_e('ล้านบาท') ?></div>
					</div>
				</section>

				<section class="comp-body -type">
					<div class="-title">
						<h3 class="comp-title"><?php pll_e('ประเภทโครงการ') ?></h3>
					</div>
					<div class="-detail">
						<div class="-item" data-pj-col="0" data-col-show="-1" data-val="">
							<span data-val="condominium"><?php pll_e('คอนโดมีเนียม') ?></span>
							<span data-val="house"><?php pll_e('บ้านและทาวน์โฮม') ?></span>
						</div>
						<div class="-item" data-pj-col="1" data-col-show="-1" data-val="">
							<span data-val="condominium"><?php pll_e('คอนโดมีเนียม') ?></span>
							<span data-val="house"><?php pll_e('บ้านและทาวน์โฮม') ?></span>
						</div>
						<div class="-item" data-pj-col="2" data-col-show="-1" data-val="">
							<span data-val="condominium"><?php pll_e('คอนโดมีเนียม') ?></span>
							<span data-val="house"><?php pll_e('บ้านและทาวน์โฮม') ?></span>
						</div>
					</div>
				</section>
				<!-- <hr> -->

				<section class="comp-body -location">
					<div class="-title">
						<h3 class="comp-title"><?php pll_e('ทำเลที่ตั้ง') ?></h3>
					</div>
					<div class="-detail">
						<div class="-item" data-pj-col="0" data-col-show="-1"></div>
						<div class="-item" data-pj-col="1" data-col-show="-1"></div>
						<div class="-item" data-pj-col="2" data-col-show="-1"></div>
					</div>
				</section>
				<!-- <hr> -->

				<script type="text/javascript">

					<?php 
					foreach ($pj_compare as $i => $pj_id) {
						?>
						pj_col = $$('.comp-body .-item[data-pj-col="<?=$i?>"]')
						pj_col.forEach((i)=>{
							i.dataset.colShow = 0;
							i.dataset.pjId = <?=$pj_id?>
						})

						pj_sticky = $$('.sticky-top .-detail .-col.-estate[data-pj-col="<?=$i?>"]')
						pj_sticky.forEach((j)=>{
							j.dataset.colShow = 0;
							j.dataset.pjId = <?=$pj_id?>
						})

						pj_info = $$('.comp-header .-detail .-col.-estate[data-pj-col="<?=$i?>"]')
						pj_info.forEach((k)=>{
							k.dataset.colShow = 0
							k.dataset.pjId = <?=$pj_id?>
						})

						<?php
					}
					?>
				</script>

				<section class="comp-body -info">
					<div class="-title">
						<h3 class="comp-title"><?php pll_e('ข้อมูลโครงการ') ?></h3>
					</div>
					<div class="-detail">
						<div data-term-id="000" data-info-sum="1">
							<div class="-item"></div>
							<div class="-item"></div>
							<div class="-item"></div>
						</div>

						<?php foreach ($info_terms as $fk => $kv): ?>
							<div data-term-id="<?=$kv->term_id?>" data-info-sum="0">
								<div class="-heading-item"><?=$kv->name?></div>

								<?php for($x=0;$x<3;$x++){
									?>
									<div class="-item" data-pj-col="<?=$x?>" data-col-show="-1">
										<div><?=$kv->name?></div>
										<div><?php foreach(array_values($pj_data)[$x]['compare']['information'] as $pj => $data){ 
											if($kv->term_id == $data['title']->term_id){
												if ($data['type']=='text') {
													echo $data['text'];
												}else{
													?>
													<ul>
														<?php foreach($data['bullet'] as $bl){?>
															<li><?=$bl['text']?></li>
														<?php }?>
													</ul>
													<?php
												}
												?>

												<?php array_push($pj_info_data, $kv->term_id);?>
												<?php if($data['text'] || $data['bullet']){ ?>
													<script type="text/javascript">
														$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="<?=$x?>"]').dataset.colShow = 1;
													</script>
												<?php } else { ?>
													<script type="text/javascript">
														$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="<?=$x?>"]').dataset.colShow = 0;
													</script>
												<?php } ?>

												<?php
											}	
										} ?></div>
									</div>
									<?php
								} ?>
							</div>
						<?php endforeach ?>
					</div>
				</section>


				<section class="comp-body comp-fac">
					<div class="-title">
						<h3 class="comp-title"><?php pll_e('สิ่งอำนวยความสะดวก') ?></h3>
					</div>

					<div class="-detail">
						<?php foreach ($fclt_terms as $fk => $kv): ?>
							<div class="-item" data-fac-id="<?=$kv->term_id?>">
								<div class="-h"><?=$kv->name?></div>
								<div class="-t">
									<?php foreach ($pj_compare as $i => $pj_id): ?>
										<div class="-col-pj -pj-<?=($i+1)?>" data-pj-id="<?=$pj_id?>" data-select="-1" data-col-show="-1">
											<a-check>
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<circle cx="12" cy="12" r="11" stroke="#1D9F9B" stroke-width="2"/>
													<path d="M8 12.6L10.2857 15L16 9" stroke="#1D9F9B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
												</svg>
											</a-check>
										</div>
									<?php endforeach ?>
									<?php for ($k = count($pj_compare) ; $k < 3; $k++){
										echo '<div class="-col-pj -pj-'.($k+1).'" data-select="-1" data-col-show="-1"></div>'; 
									}?>
								</div>				
							</div>
						<?php endforeach ?>
					</div>
				</section>
			</div>

			<script type="text/javascript">
				function handleFilterModal(el){
					$(".comp-bg").style.display = el;
				}
			</script>


			<script type="text/javascript">
				<?php 
				foreach ($pj_data as $pj_id => $data) {

					$stat_name = wp_get_object_terms($pj_id, 'project_status');
					$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
					?>


					$(`.comp-header .-detail .-col.-estate[data-pj-id="<?=$pj_id?>"] .show-estate`).innerHTML += `
					<button class="btn-close" @click="removeProjectVue(<?=$pj_id?>);" onclick="removeProject(<?=$pj_id?>);">
					<img src="/wp-content/themes/seed-spring/img/icon-close.svg">
					</button>
					<img class="estate-thumbnail" src="<?=get_the_post_thumbnail_url($data['post']->ID,"medium")?>" alt="<?=$data['post']->post_title?>">
					<div><h2><?=$data['post']->post_title?></h2>
					<h6><span class="" style="color: <?= $stat_color ?>;font-weight: 700;font-size: 18px;line-height: 20px;"><?= $stat_name[0]->name ?></span></h6>
					<a class="read-more" href="<?=$data['post']->guid?>" target="_blank">ดูรายละเอียด</a></div>
					`
					$(`.comp-header .-detail .-col.-estate[data-pj-id="<?=$pj_id?>"]`).dataset.colShow = 1

					if ('<?=$data['price']?>' != '') {
						$(`.comp-body.-price .-detail .-item[data-pj-id="<?=$pj_id?>"] .-value`).innerText = '<?=$data['price']?>'
						$(`.comp-body.-price .-detail .-item[data-pj-id="<?=$pj_id?>"]`).dataset.colShow = 1
					}
					if ('<?=$data['type']?>' != '') {
						$(`.comp-body.-type .-detail .-item[data-pj-id="<?=$pj_id?>"]`).dataset.val = '<?=$data['type']?>'
						$(`.comp-body.-type .-detail .-item[data-pj-id="<?=$pj_id?>"]`).dataset.colShow = 1
					}
					if ('<?=$data['location']?>' != '') {
						$(`.comp-body.-location .-detail .-item[data-pj-id="<?=$pj_id?>"]`).innerText = '<?=$data['location']?>'
						$(`.comp-body.-location .-detail .-item[data-pj-id="<?=$pj_id?>"]`).dataset.colShow = 1
					}

					$(`.sticky-top .-detail .-col.-estate[data-pj-id="<?=$pj_id?>"] .show-estate-minimal`).innerHTML += `
					<button class="btn-close" @click="removeProjectVue(<?=$pj_id?>);" onclick="removeProject(<?=$pj_id?>);">
					<img src="/wp-content/themes/seed-spring/img/icon-close.svg">
					</button>
					<img class="estate-thumbnail" src="<?=wp_get_attachment_image_url(get_post_thumbnail_id($data['post']->ID, "large"))?>" alt="<?=$data['post']->post_title?>">
					<div>
					<div>
					<h2><?=$data['post']->post_title?></h2>
					<div class="sticky-detail-set">
					<h6 class="-is-type"><?php 
					if($data['type'] == 'condominium'){
						echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
						<path d="M1.33594 14H3.09032M14.6693 14H12.9149M12.9149 14V2H3.09032V14M12.9149 14H9.40611M3.09032 14H6.5991M9.40611 14V10H6.5991V14M9.40611 14H6.5991M5.54646 7.33333H6.94997M5.54646 4.66667H6.94997M9.05524 7.33333H10.4587M9.05524 4.66667H10.4587" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>คอนโดมีเนียม';
					} else { 
						echo '<svg xmlns="http://www.w3.org/2000/svg" width="12" height="14" viewBox="0 0 12 14" fill="none">
						<path d="M1 5.2L6 1L11 5.2V11.8C11 12.1183 10.8829 12.4235 10.6746 12.6485C10.4662 12.8736 10.1836 13 9.88889 13H2.11111C1.81643 13 1.53381 12.8736 1.32544 12.6485C1.11706 12.4235 1 12.1183 1 11.8V5.2Z" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M4.33203 13V7H7.66537V13" stroke="#323A41" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>บ้านและทาวน์โฮม';
					}
					?></h6>
					<h6 class="-is-location" style="display: flex;gap: 5px;align-items: center;">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
					<path d="M8.0026 8.5599C8.92308 8.5599 9.66927 7.8137 9.66927 6.89323C9.66927 5.97275 8.92308 5.22656 8.0026 5.22656C7.08213 5.22656 6.33594 5.97275 6.33594 6.89323C6.33594 7.8137 7.08213 8.5599 8.0026 8.5599Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M13 6.89062C13 10.7795 8 14.1128 8 14.1128C8 14.1128 3 10.7795 3 6.89062C3 5.56454 3.52678 4.29277 4.46447 3.35509C5.40215 2.41741 6.67392 1.89062 8 1.89062C9.32608 1.89063 10.5979 2.41741 11.5355 3.35509C12.4732 4.29277 13 5.56454 13 6.89062Z" stroke="#323A41" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<?=$data['location']?>
					</h6>
					</div>
					`
					$(`.sticky-top .-detail .-col.-estate[data-pj-id="<?=$pj_id?>"]`).dataset.colShow = 1

					<?php
				}
				?>
			</script>
			<script type="text/javascript">
				<?php 
				foreach ($pj_compare as $i => $pj_id) {
					?>
					pj_col = $$('.comp-body .-item[data-pj-col="<?=$i?>"]')
					pj_col.forEach((i)=>{
						if(i.dataset.colShow == -1){
							i.dataset.colShow = 0
						}
						i.dataset.pjId = <?=$pj_id?>
					})

					pj_fac = $$('.comp-fac .-detail .-item .-t .-col-pj.-pj-1')
					pj_fac.forEach((i)=>{
						if(i.dataset.colShow == -1 && i.dataset.pjId == <?=$pj_id?>){
							i.dataset.colShow = 0
						}
					})

					<?php
				}
				?>
			</script>
			<script type="text/javascript">
				<?php
				foreach ($pj_data as $pj_id => $pj_value): 
					?>
					<?php foreach ($pj_value['compare']['facility'] as $fac_i => $fac_id): ?>
						$('.comp-fac .-item[data-fac-id="<?=$fac_id?>"] [data-pj-id="<?=$pj_id?>"]').dataset.select = 1
						$('.comp-fac .-item[data-fac-id="<?=$fac_id?>"] [data-pj-id="<?=$pj_id?>"]').dataset.colShow = 1
					<?php endforeach ?>
					<?php 
				endforeach ?>

				async function removeProject(projectId){
					await Array.from($$(`[data-pj-id='${projectId}']`)).forEach(function(val) {
						val.dataset.colShow = -1;
					});

					const params = await new URLSearchParams(window.location.search);
					const projectStr = await params.get('project');
					const projectArr = await projectStr.split(',');

					const projectIdAfterRemove = await projectArr.filter(e => e != projectId);




					let newurl = '/<?=pll_current_language()?>/compare/?project='+localStorage.getItem('asw_<?=pll_current_language()?>_cp_slug');
					window.history.pushState({path:newurl},'',newurl);
					renderCompareBadge()
				}
			</script>
			<script type="text/javascript">
				let pj_detail_list = $$('.comp-body.-info .-detail > div')
				for(let i of pj_detail_list){
					let kk = i.getElementsByClassName('-item')
					let sum = 0;
					for(let k of kk){
						let show = k.dataset.colShow;
						show = parseInt(show)
						sum += show;
					}
					if (!isNaN(sum)) {
						i.dataset.infoSum = sum
					}
				}
			</script>
			<script type="text/javascript">
				<?php if(count($pj_info_data) > 0) { ?>
					$('.comp-body.-info .-detail div[data-term-id="000"]').dataset.infoSum = 0
				<?php } ?>
			</script>

			<script type="text/javascript">
				var myScrollFunc = function () {
					var y = window.scrollY;
					if (y >= 200) {
						document.querySelector(".sticky-estate").style.display = "flex";
					} else {
						document.querySelector(".sticky-estate").style.display = "none";
					}
				};

				window.addEventListener("scroll", myScrollFunc);
			</script>

			<script>
				theSelectedEstate = <?=json_encode($pj_compare)?>;
				const { createApp, ref } = Vue;

				const vestate = createApp({
					setup() {
						const compareURL = ref('<?=$top_param?>');
						const mbExpand = ref(false);

						const allEstateStore = ref([]);

						const state = ref('');
						const state_toggle = ref(false);
						const showNotice = ref(false);

						const realSelectEstate = ref(<?=json_encode($pj_compare)?>.filter(elm => elm))
						const holdingPosition = ref([])
						const selectEstate = ref(<?=json_encode($pj_compare)?>.filter(elm => elm))

						const type_list = ref(<?php echo json_encode(get_terms(array(
							'taxonomy' => 'project-type',
							'hide_empty' => false,
							)))?>.filter((data) => data.parent == 0))
						const location_list_bkk = ref(<?php echo json_encode(get_terms(array(
							'taxonomy' => 'project_location',
							'hide_empty' => false,
							)))?>.filter((data) => data.parent == 76))
						const location_list_upcountry = ref(<?php echo json_encode(get_terms(array(
							'taxonomy' => 'project_location',
							'hide_empty' => false,
							)))?>.filter((data) => data.parent == 77))
						const brand_list_condo = ref(<?php echo json_encode(get_terms(array(
							'taxonomy' => 'project-type',
							'hide_empty' => false,
							)))?>.filter((data) => data.parent == 35))					
						const brand_list_house = ref(<?php echo json_encode(get_terms(array(
							'taxonomy' => 'project-type',
							'hide_empty' => false,
							)))?>.filter((data) => data.parent == 46))
						const price_list = ref(<?=json_encode($filter_price,JSON_UNESCAPED_UNICODE)?>)

						const filter_type = ref([])
						const filter_location = ref([])
						const filter_brand = ref([])
						const filter_price = ref({ label: "none", min: 0, max: 0 })

						async function removeProjectVue(id){
							let temp_index = await realSelectEstate.value.findIndex(el => el == id);

							if(holdingPosition.value.length >= 2) {
								holdingPosition.value = []
							} else {
								holdingPosition.value.push(temp_index);
							}

							selectEstate.value = await selectEstate.value.filter(elm => elm != id)

							compareLocal()
						}

						async function removeProjectVueTemp(id){
							let temp_index = await realSelectEstate.value.findIndex(el => el == id);

							if(holdingPosition.value.length >= 2) {
								holdingPosition.value = []
							} else {
								holdingPosition.value.push(temp_index);
							}

							selectEstate.value = await selectEstate.value.filter(elm => elm != id)
						}


						function add_filter(type, data){
							vestate.state_toggle = true
							if(type == 'type'){
								if(this.filter_type.includes(data)){
									let index = this.filter_type.indexOf(data);
									this.filter_type.splice(index, 1);
								} else {
									this.filter_type.push(data);
								}
							}

							else if(type == 'location'){
								if(this.filter_location.includes(data)){
									let index = this.filter_location.indexOf(data);
									this.filter_location.splice(index, 1);
								} else {
									this.filter_location.push(data);
								}
							}

							else if(type == 'brand'){
								if(this.filter_brand.find(el => el.slug == data.slug)){
									let index = this.filter_brand.indexOf(this.filter_brand.find(el => el.slug == data.slug));
									this.filter_brand.splice(index, 1);
								} else {
									this.filter_brand.push(data);
								}
							}

							else if(type == 'price'){
								this.filter_price = data;
							}
						}

						function onFilter(type){
							if(this.filter_type.length <= 0) {
								return true
							} else {
								if(this.filter_type.includes(type)) {
									return true
								}
							}
						}


						function selectCompare(postId) {
							let maxEstateCanSelect = 3;
							const w = document.body.clientWidth;
							if (w<=768) {
								maxEstateCanSelect = 2;
							}
							if(selectEstate.value.includes(postId)){
								let index = selectEstate.value.indexOf(postId);
								selectEstate.value.splice(index, 1);
							} else {
								if(selectEstate.value.length >= maxEstateCanSelect){
									showNotice.value = true;
									setTimeout(() => {
										showNotice.value = false;
									}, 3000)
								} else{
									if(holdingPosition.value.length <= 0 || holdingPosition.value.length >= maxEstateCanSelect){
										selectEstate.value.push(postId);
									} else {
										if(holdingPosition.value[0] == 0) {
											selectEstate.value = [postId].concat(selectEstate.value)
											holdingPosition.value.shift();
										}  else if(holdingPosition.value[0] == 1) {
											selectEstate.value = [...selectEstate.value.slice(0, 1), postId, ...selectEstate.value.slice(1, 2)]
											holdingPosition.value.shift();
										}  else {
											selectEstate.value.push(postId);
											holdingPosition.value.shift();
										}
									}
								}
							}
						// compareLocal()
						}


						function clearFilter() {
							this.filter_type = [];
							this.filter_location = [];
							this.filter_brand = [];
							this.filter_price = { label: "none", min: 0, max: 0 };
						}

						function storeData(id, type, location, name) {
							allEstateStore.value.push({
								id, name, type, location
							});
						}

						function findEstateData(id, showType) {
							return allEstateStore.value.find(el => {
								if(el.id == id) {
									return el;
								}
							});
						}

						function onShow(type, location, brand, price){
							let check_type = true;
							let check_location = true;
							let check_brand = true;
							let check_price = true;

							if(this.filter_type.length > 0){
								if(this.filter_type.includes(type)){
									check_type = true;
								} else {
									check_type = false;
								}
							}

							if(this.filter_location.length > 0){
								if(this.filter_location.includes(location)){
									check_location = true;
								} else {
									check_location = false;
								}
							}


							if(this.filter_brand.length > 0){
								if(this.filter_brand.find(el => el.slug == brand)){
									check_brand = true;
								} else {
									check_brand = false;
								}
							}

							if(this.filter_price.label != 'none'){
								if(price*1000000 >= this.filter_price.min  && price*1000000 <= this.filter_price.max){
									check_price = true;
								} else {
									check_price = false;
								}
							}

							return check_type && check_location && check_brand && check_price;
						}

						function mbExpandToggle(){
							if(this.mbExpand){
								this.mbExpand = false;
							} else {
								this.mbExpand = true;
							}
						}

						function compareLocal() {
						// localStorage.setItem('asw_<?=pll_current_language()?>_cp', selectEstate.value);  
							let estateSlugs = []
							let estateIDs = []
							for(let eid of selectEstate.value){
								estateSlugs.push($(`.estate-card[estate-id="${eid}"]`).getAttribute('estate-slug'))
								estateIDs.push(eid)
							}
							estateSlugsJoin = estateSlugs.join()
							estateIDsJoin = estateIDs.join()
							localStorage.asw_<?=pll_current_language()?>_cp_slug = estateSlugsJoin
							localStorage.asw_<?=pll_current_language()?>_cp = estateIDsJoin
							this.compareURL = estateSlugsJoin
						}

						function selectToggle(val) {
							vestate.state_toggle = true
							if(this.state == val){
								this.state = ''
							} else{
								this.state = val;
							}
						}
						function checkIfFilterToggle(){
							setTimeout(()=>{vestate.state_toggle = false},10)
							if (!vestate.state_toggle) {
								vestate.state = ''
							}
						}


						return {
							mbExpand,
							state,
							state_toggle,
							selectEstate,
							type_list,
							location_list_bkk,
							location_list_upcountry,
							brand_list_condo,
							brand_list_house,
							price_list,
							filter_type,
							filter_location,
							filter_brand,
							filter_price,
							selectToggle,
							add_filter,
							selectCompare,
							clearFilter,
							onShow,
							mbExpandToggle,
							removeProjectVue,
							removeProjectVueTemp,
							compareLocal,
							compareURL,
							showNotice,
							checkIfFilterToggle,
							storeData,
							allEstateStore,
							findEstateData
						}
					}
				}).mount('#app')
			</script>
			<?php get_footer() ?>