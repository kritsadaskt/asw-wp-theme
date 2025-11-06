<?php 
$search_project = get_field('search_project', 'option');
$search_popular = get_field('search_popular', 'option');
?>
<style type="text/css">

	#search-popup-wrap{
		--mgl:calc((100% - 1280px ) / 2);
		width: 100%;
		height: 100vh;
		z-index: 10000;
		top: 0;
		left: 0;
		position: fixed;
		background-color: #fff;
		overflow: auto;
	}
	html:has(#search-popup-wrap[data-toggle="1"]){
		overflow: hidden;
	}
	#search-popup-wrap[data-toggle="0"]{
		display: none;
	}
	#search-popup-wrap header{
		border-bottom: 1px solid #DFE3E8;
		box-shadow: 0px 4px 20px rgba(92, 92, 92, 0.15);
		position: sticky;
		top: 0;
		z-index: 1000;
	}
	#search-popup-wrap header > .-inner{
		display: grid;
		grid-template-columns: var(--mgl) 32px auto 72px;
		grid-template-rows: 70px;
		align-items: center;
		background-color: #fff;
	}
	/*-- Mobile Version --*/
	@media (max-width: 1359px) {
		
		#search-popup-wrap header > .-inner{
			--mgl: 4px;
		}
	}
	#search-popup-wrap .-close{
		background-color: #323A41;
		cursor: pointer;
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	#search-popup-wrap .-close img{
		width: 16px;	
	}
	#search_btn{
		background: #123F6D;
		border-radius: 8px;
		font-size: 26px;
		line-height: 32px;
		color: #fff;
		padding: 8px 34px;
		display: inline-block;
		position: absolute;
		top: 12px;
		right: 84px;
		cursor: pointer;

	}
	#search-input {
		width: 100%;
		height: 100%;
		border: 0;
		padding-left: 10px;
		font-size: 26px;
		--tw-ring-color: transparent;
		position: relative;
	}
	.search-popular{
		padding-top: 40px;
	}
	.search-popular-tag{
		margin-top: 6px;
		display: flex;
		flex-flow: row wrap;
	}
	.search-popular-tag .-tag{
		background: #F6FFFE;
		border: 1px solid #47CBC7;
		border-radius: 40px;
		font-weight: 400;
		font-size: 22px;
		line-height: 28px;
		color: #055E5B;
		display: inline-block;
		padding: 4px 16px ;
		margin: 4px;
		cursor: pointer;
	}
	.search-popular-tag .-tag:first-child{
		margin-left: 0;
	}
	.search-popular .-line{
		margin-top: 32px;
		border-bottom: 1px solid #DFE3E8;
		width: 100%;
	}
	.search-project-suggestion{
		margin-top: 45px;
		padding-bottom: 74px;
	}

	/*-- Mobile Version --*/
	@media (max-width: 991px) {
		#search-popup-wrap header > .-inner{
			grid-template-rows:50px;
			grid-template-columns: var(--mgl) 26px auto 50px;
		}
		#search_btn {
			top: 5px;
			padding: 4px 10px;
			right: 56px;
		}
		.search-datalist{
			top: 50px !important;
		}
		.search-datalist-item{
			padding-left: 0px !important;
		}
	}

	.search-datalist {
		display: none;
		position: absolute;
		width: 100%;
		background: #fff;
		top: 70px;
		border-top: 1px solid #DFE3E8;
		padding-bottom: 22px;
		left: 0;
		box-shadow: 0px 10px 20px rgba(92, 92, 92, 0.15);
		border-bottom: 1px solid #EDF2F7;
		z-index: 10;
	}
	.search-datalist-item {
		padding: 7px;
		font-size: 26px;
		border-bottom: 1px solid #EDF2F7;
		padding-left: 44px;
		cursor: pointer;
	}
	#search-input:focus ~ .search-datalist,
	.search-datalist:hover{
		display: block;
	}
	.search-datalist[data-count="0"] {
		display: none !important;
	}
</style>
<section id="search-popup-wrap" data-toggle="0">
	<header>
		<div class="-inner">
			<div></div>
			<div><img src="/wp-content/uploads/2023/05/search.png" class="w-full"></div>
			<div class="full-h">
				<input type="text" id="search-input" placeholder="<?php pll_e('ค้นหาเนื้อหาภายในเว็บไซต์')?>" onkeyup="search_event_key(event);findInDataListSearch()" value="<?=$_GET['s']?>">
				<div class="search-datalist" data-count="0">
					<div class="cont-pd search-datalist-list"></div>
				</div>
				<div id="search_btn" onclick="searchEnter()">ค้นหา</div>
			</div>
			<div class="-close" onclick="document.querySelector('#search-popup-wrap').dataset.toggle=0"><img src="/wp-content/uploads/2023/05/menu.png" class="w-full"></div>
		</div>
	</header>
	<div class="cont-pd search-body-popup">
		<section class="search-popular">
			<h2><?php pll_e('คำค้นหายอดนิยม')?></h2>
			<div class="search-popular-tag">
				<?php foreach ($search_popular as $key => $value): ?>
					<span class="-tag" onclick="search_tag_auto(this.innerText)"><?=$value['text']?></span>
				<?php endforeach ?>
			</div>
			<div class="-line"></div>
		</section>
		<section class="search-project-suggestion">
			<h2><?php pll_e('โครงการที่คุณอาจสนใจ')?></h2>
			<div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-8 vst-wrap">
				<?php foreach ($search_project as $key => $pj): 
					$pjf = get_fields($pj->ID);
					$logo = $pjf['logo']['sizes']['medium'];
					$price = $pjf['price'];
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
					?>

					<div data-compare-selected="0" class="home-project-card -for-search bg-white card-360 -card-360-max" style="--fim:url(<?=$fim?>)" data-status_slug="<?=$status_slug?>" data-type="<?=$type?>">
						<div class="-header">
							<div class="-pj-status"><?=$status?></div>
							<div class="-pj-logo" style="--pj-logo:url(<?=$logo?>)"></div>
						</div>
						<div class="-inner">
							<a  target="_blank" href="<?=get_permalink($pj->ID)?>" class="">
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
				<?php endforeach ?>
			</div>
		</section>
	</div>
</section>

<script type="text/javascript">
	function search_tag_auto(text){
		document.querySelector('#search-input').value = text
	}
	function search_event_key(event){
		if (event.code == 'Enter') {
			searchEnter()
		}
	}
	function searchEnter(){
		<?php 
		if (pll_current_language() != 'th') {
			?>location.href = '/<?=pll_current_language()?>/?s='+document.querySelector('#search-input').value<?php
		}else{
			?>location.href = '/?s='+document.querySelector('#search-input').value<?php
		}
		?>
		
	}
</script>
<?php 
$kw_terms = $terms = get_terms( array(
	'taxonomy'   => 'search_keyword',
	'hide_empty' => false,
) );
?>
<script type="text/javascript">
	let s_kw_all = []
	let s_kw_found = []
	<?php foreach ($kw_terms as $key => $k): ?>
		s_kw_all.push(`<?=$k->name?>`)
	<?php endforeach ?>
	function renderDataListSearch(){
		let html = ``
		let c = 0;
		for(let i = 0;i<5;i++){
			if (s_kw_found[i] != undefined) {
				c++;
				html += `<div class="search-datalist-item" onclick="search_tag_auto(this.innerText)">${s_kw_found[i]}</div>`
			}
		}
		$('.search-datalist').dataset.count = c
		$('.search-datalist-list').innerHTML = html
	}
	function findInDataListSearch(){
		let val = $('#search-input').value.toLowerCase();
		s_kw_found = []
		if (val != '') {
			for(let i of s_kw_all){
				let k = i.toLowerCase();
				if (k.search(val) != -1) {
					s_kw_found.push(i)
				}
			}
		}
		renderDataListSearch()
	}
	findInDataListSearch()
</script>