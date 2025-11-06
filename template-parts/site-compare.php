<style type="text/css">

	.site-compare-popup-wrap,
	.site-compare-remove-wrap{
		--nav-h:70px;
		opacity: 1;
		transition: all .2s;
		pointer-events: auto;
		z-index: 50;
		position: fixed;
		top: calc(.5rem + var(--nav-h));
		left: calc(var(--dl) - 130px);
	}
	.site-compare-popup-wrap[data-active="0"],
	.site-compare-remove-wrap[data-active="0"]{
		opacity: 0;
		pointer-events: none;
		transition: all .5s;
	}

	/*-- Mobile Version --*/
	@media (max-width: 1024px) {
		.site-compare-popup-wrap,
		.site-compare-remove-wrap{
			--nav-h:50px;
			z-index: 1000;
		}
	}
	.site-compare-popup,
	.site-compare-remove {
		position: absolute;
		top: 1rem;
		left: 0;
		right: 0;
		bottom: 0;
		padding: 1rem;
	}
	.site-compare-popup .-count,
	.site-compare-remove .-count{
		color: var(--veridian-veridian-400-main, #1D9F9B);
		font-size: 40px;
		font-style: normal;
		font-weight: 400;
		line-height: 44px;
	}
	.site-compare-popup .-txt,
	.site-compare-remove .-txt{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
	}
	.site-compare-popup .-pj,
	.site-compare-remove .-pj{
		color: var(--veridian-veridian-400-main, #1D9F9B);

	}
	.site-compare-popup .-btn{
		display: flex;
		width: 248px;
		padding: 8px 34px;
		justify-content: center;
		align-items: center;
		gap: 8px;
		margin-top: 12px;
		border-radius: 8px;
		background: var(--blue-blue-300-main, #123F6D);
		color: #fff;
	}
	.site-compare-notice {
		position: fixed;
		top: 5rem;
		right: 1rem;
		padding: 1rem 1.5rem;
		display: flex;
		max-width: 23rem;
		gap: 0.5em;
		border-radius: 0.25rem;
		border-left: 2px solid var(--blue-blue-700, #B7CDE4);
		background: var(--White, #FFF);
		box-shadow: 0px 4px 16px 0px rgba(0, 0, 0, 0.15);
		z-index: 10002;
		transition: all .2s;
	}
	.site-compare-notice[data-active="0"]{
		opacity: 0;
		pointer-events: none;
		transition: all .5s;
	}
	.site-compare-notice  .notice-icon {
		padding: 0.625rem;
		border-radius: 2.25rem;
		background: var(--blue-blue-800, #E0ECF8);
	}
	.site-compare-notice .notice-close {
		position: absolute;
		top: 0.5em;
		right: 0.5em;
		cursor: pointer;
	}
</style>
<div class="site-compare-popup-wrap" data-active="0">
	<svg width="282" height="201" viewBox="0 0 282 201" fill="none" xmlns="http://www.w3.org/2000/svg">
		<mask id="path-1-outside-1_12443_49939" maskUnits="userSpaceOnUse" x="0" y="0" width="282" height="201" fill="black">
			<rect fill="white" width="282" height="201"/>
			<path fill-rule="evenodd" clip-rule="evenodd" d="M125.687 11.3425C127.809 11.3425 129.843 10.4997 131.344 8.99939L138.172 2.17157C139.734 0.609477 142.266 0.609475 143.828 2.17157L150.656 8.99939C152.157 10.4997 154.191 11.3425 156.313 11.3425H273C277.418 11.3425 281 14.9243 281 19.3425V191.343C281 195.761 277.418 199.343 273 199.343H9C4.58172 199.343 1 195.761 1 191.343V19.3425C1 14.9243 4.58172 11.3425 9 11.3425H125.687Z"/>
		</mask>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M125.687 11.3425C127.809 11.3425 129.843 10.4997 131.344 8.99939L138.172 2.17157C139.734 0.609477 142.266 0.609475 143.828 2.17157L150.656 8.99939C152.157 10.4997 154.191 11.3425 156.313 11.3425H273C277.418 11.3425 281 14.9243 281 19.3425V191.343C281 195.761 277.418 199.343 273 199.343H9C4.58172 199.343 1 195.761 1 191.343V19.3425C1 14.9243 4.58172 11.3425 9 11.3425H125.687Z" fill="white"/>
		<path d="M138.172 2.17157L137.464 1.46447V1.46447L138.172 2.17157ZM143.828 2.17157L144.536 1.46447V1.46446L143.828 2.17157ZM150.656 8.99939L151.363 8.29229L150.656 8.99939ZM131.344 8.99939L130.637 8.29229L131.344 8.99939ZM137.464 1.46447L130.637 8.29229L132.051 9.7065L138.879 2.87868L137.464 1.46447ZM144.536 1.46446C142.583 -0.488156 139.417 -0.488153 137.464 1.46447L138.879 2.87868C140.05 1.70711 141.95 1.70711 143.121 2.87868L144.536 1.46446ZM151.363 8.29229L144.536 1.46447L143.121 2.87868L149.949 9.7065L151.363 8.29229ZM156.313 12.3425H273V10.3425H156.313V12.3425ZM273 12.3425C276.866 12.3425 280 15.4765 280 19.3425H282C282 14.372 277.971 10.3425 273 10.3425V12.3425ZM280 19.3425V191.343H282V19.3425H280ZM280 191.343C280 195.209 276.866 198.343 273 198.343V200.343C277.971 200.343 282 196.313 282 191.343H280ZM273 198.343H9V200.343H273V198.343ZM9 198.343C5.13401 198.343 2 195.209 2 191.343H0C0 196.313 4.02944 200.343 9 200.343V198.343ZM2 191.343V19.3425H0V191.343H2ZM2 19.3425C2 15.4765 5.13401 12.3425 9 12.3425V10.3425C4.02944 10.3425 0 14.372 0 19.3425H2ZM9 12.3425H125.687V10.3425H9V12.3425ZM149.949 9.7065C151.637 11.3943 153.926 12.3425 156.313 12.3425V10.3425C154.457 10.3425 152.676 9.60504 151.363 8.29229L149.949 9.7065ZM130.637 8.29229C129.324 9.60504 127.543 10.3425 125.687 10.3425V12.3425C128.074 12.3425 130.363 11.3943 132.051 9.7065L130.637 8.29229Z" fill="#E0ECF8" mask="url(#path-1-outside-1_12443_49939)"/>
	</svg>
	<div class="site-compare-popup">
		<div class="-count"><span class="-now">1</span>/<span class="-max">3</span></div>
		<div class="-txt"><?php pll_e('เพิ่ม') ?> <span class="-pj">Kave AVA</span> <?php pll_e('ในรายการเปรียบเทียบ แล้ว') ?></div>
		<a href="/<?=pll_current_language()?>/compare" class="-btn" target="_blank"><?php pll_e('เปรียบเทียบ') ?></a>
	</div>
</div>

<div class="site-compare-remove-wrap" data-active="0">
	<svg xmlns="http://www.w3.org/2000/svg" width="282" height="145" viewBox="0 0 282 145" fill="none">
		<mask id="path-1-outside-1_12443_50094" maskUnits="userSpaceOnUse" x="0" y="0" width="282" height="145" fill="black">
			<rect fill="white" width="282" height="145"/>
			<path fill-rule="evenodd" clip-rule="evenodd" d="M125.687 11.3425C127.809 11.3425 129.843 10.4997 131.344 8.99939L138.172 2.17157C139.734 0.609477 142.266 0.609475 143.828 2.17157L150.656 8.99939C152.157 10.4997 154.191 11.3425 156.313 11.3425H273C277.418 11.3425 281 14.9243 281 19.3425V135.343C281 139.761 277.418 143.343 273 143.343H9C4.58172 143.343 1 139.761 1 135.343V19.3425C1 14.9243 4.58172 11.3425 9 11.3425H125.687Z"/>
		</mask>
		<path fill-rule="evenodd" clip-rule="evenodd" d="M125.687 11.3425C127.809 11.3425 129.843 10.4997 131.344 8.99939L138.172 2.17157C139.734 0.609477 142.266 0.609475 143.828 2.17157L150.656 8.99939C152.157 10.4997 154.191 11.3425 156.313 11.3425H273C277.418 11.3425 281 14.9243 281 19.3425V135.343C281 139.761 277.418 143.343 273 143.343H9C4.58172 143.343 1 139.761 1 135.343V19.3425C1 14.9243 4.58172 11.3425 9 11.3425H125.687Z" fill="white"/>
		<path d="M138.172 2.17157L137.464 1.46447V1.46447L138.172 2.17157ZM143.828 2.17157L144.536 1.46447V1.46446L143.828 2.17157ZM150.656 8.99939L151.363 8.29229L150.656 8.99939ZM131.344 8.99939L130.637 8.29229L131.344 8.99939ZM137.464 1.46447L130.637 8.29229L132.051 9.7065L138.879 2.87868L137.464 1.46447ZM144.536 1.46446C142.583 -0.488156 139.417 -0.488153 137.464 1.46447L138.879 2.87868C140.05 1.70711 141.95 1.70711 143.121 2.87868L144.536 1.46446ZM151.363 8.29229L144.536 1.46447L143.121 2.87868L149.949 9.7065L151.363 8.29229ZM156.313 12.3425H273V10.3425H156.313V12.3425ZM273 12.3425C276.866 12.3425 280 15.4765 280 19.3425H282C282 14.372 277.971 10.3425 273 10.3425V12.3425ZM280 19.3425V135.343H282V19.3425H280ZM280 135.343C280 139.209 276.866 142.343 273 142.343V144.343C277.971 144.343 282 140.313 282 135.343H280ZM273 142.343H9V144.343H273V142.343ZM9 142.343C5.13401 142.343 2 139.209 2 135.343H0C0 140.313 4.02944 144.343 9 144.343V142.343ZM2 135.343V19.3425H0V135.343H2ZM2 19.3425C2 15.4765 5.13401 12.3425 9 12.3425V10.3425C4.02944 10.3425 0 14.372 0 19.3425H2ZM9 12.3425H125.687V10.3425H9V12.3425ZM149.949 9.7065C151.637 11.3943 153.926 12.3425 156.313 12.3425V10.3425C154.457 10.3425 152.676 9.60504 151.363 8.29229L149.949 9.7065ZM130.637 8.29229C129.324 9.60504 127.543 10.3425 125.687 10.3425V12.3425C128.074 12.3425 130.363 11.3943 132.051 9.7065L130.637 8.29229Z" fill="#E0ECF8" mask="url(#path-1-outside-1_12443_50094)"/>
	</svg>
	<div class="site-compare-remove">
		<div class="-count"><span class="-now">1</span>/<span class="-max">3</span></div>
		<div class="-txt"><?php pll_e('นำ') ?> <span class="-pj">Kave AVA</span> <?php pll_e('ออกจากรายการ เปรียบเทียบแล้ว') ?></div>
	</div>
</div>
<div class="site-compare-notice" data-active="0"><div><div class="notice-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.22473 7.10863C0.980649 6.86455 0.980649 6.46882 1.22473 6.22474L5.2022 2.24727C5.44628 2.00319 5.84201 2.00319 6.08609 2.24727C6.33016 2.49135 6.33016 2.88707 6.08609 3.13115L3.17555 6.04169H18.3333C18.6785 6.04169 18.9583 6.32151 18.9583 6.66669C18.9583 7.01186 18.6785 7.29169 18.3333 7.29169H3.17555L6.08609 10.2022C6.33016 10.4463 6.33016 10.842 6.08609 11.0861C5.84201 11.3302 5.44628 11.3302 5.2022 11.0861L1.22473 7.10863Z" fill="#323A41"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M18.7753 15.0253C19.0194 14.7812 19.0194 14.3854 18.7753 14.1414L14.7978 10.1639C14.5537 9.91982 14.158 9.91982 13.9139 10.1639C13.6698 10.408 13.6698 10.8037 13.9139 11.0478L16.8245 13.9583H1.66667C1.32149 13.9583 1.04167 14.2381 1.04167 14.5833C1.04167 14.9285 1.32149 15.2083 1.66667 15.2083H16.8245L13.9139 18.1188C13.6698 18.3629 13.6698 18.7587 13.9139 19.0027C14.158 19.2468 14.5537 19.2468 14.7978 19.0027L18.7753 15.0253Z" fill="#323A41"></path></svg></div></div><div><h5>เปรียบเทียบได้สูงสุด <span class="hidden md:inline">3</span><span class="md:hidden">2</span> โครงการ</h5><p>กรุณาลบโครงการที่เลือกไว้ 1 โครงการ เพื่อเพิ่มโครงการใหม่</p></div><svg class="notice-close" xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none"><path d="M2.79276 2.67188L12.3247 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12.3145 2.67188L2.7826 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
<script type="text/javascript">
	if (localStorage.asw_<?=pll_current_language()?>_cp == undefined) {
		localStorage.asw_<?=pll_current_language()?>_cp = ''
		localStorage.asw_<?=pll_current_language()?>_cp_slug = ''
	}
	function renderComparePopup(){
		if ($('.compare-icon.nav-icon') != undefined) {
			$('.site-compare-popup-wrap').style.setProperty('--dl',$('.compare-icon.nav-icon').offsetLeft+'px')
			$('.site-compare-remove-wrap').style.setProperty('--dl',$('.compare-icon.nav-icon').offsetLeft+'px')
		}
	}
	renderComparePopup()
	function renderCompareBadge(){
		renderComparePopup()
		if (localStorage.asw_<?=pll_current_language()?>_cp != undefined) {
			if (localStorage.asw_<?=pll_current_language()?>_cp != '') {
				$('.compare-icon .badge').innerText = localStorage.asw_<?=pll_current_language()?>_cp.split(',').length
				$('.compare-icon .badge').dataset.count = localStorage.asw_<?=pll_current_language()?>_cp.split(',').length
			}else{
				$('.compare-icon .badge').innerText = 0
				$('.compare-icon .badge').dataset.count = 0
			}
		}
		let el = $$(`[data-compare-selected="1"]`)
		for(let l of el){
			l.dataset.compareSelected = 0
		}
		for(let i of localStorage.asw_<?=pll_current_language()?>_cp.split(',')){
			let el = $$(`[data-compare-id="${i}"]`)
			for(let l of el){
				l.dataset.compareSelected = 1
			}
		}
		let max = 3;
		const w = document.body.clientWidth;
		if (w<=768) {
			max = 2;
		}

		$('.site-compare-popup .-max').innerText = max
		$('.site-compare-popup .-now').innerText = $('.compare-icon .badge').dataset.count

		$('.site-compare-remove .-max').innerText = max
		$('.site-compare-remove .-now').innerText = $('.compare-icon .badge').dataset.count

	}
	renderCompareBadge()
	// let intervalCompareBadge = setInterval(()=>{
	// 	renderCompareBadge()
	// },1000)
</script>

<script type="text/javascript">
	let cp_timeout_popup = null;
	let cp_timeout_remove = null;
	let cp_timeout_notice = null;
	function cp_add_project(id,slug,pj_title){
		$('.site-compare-popup-wrap').dataset.active = 0
		$('.site-compare-remove-wrap').dataset.active = 0
		$('.site-compare-notice').dataset.active = 0
		if (cp_timeout_popup != null) {
			clearTimeout(cp_timeout_popup)
		}
		if (cp_timeout_remove != null) {
			clearTimeout(cp_timeout_remove)
		}
		if (cp_timeout_notice != null) {
			clearTimeout(cp_timeout_notice)
		}
		let now = 0
		if (localStorage.asw_<?=pll_current_language()?>_cp != '') {
			now = localStorage.asw_<?=pll_current_language()?>_cp.split(',').length
		}
		let max = 3;
		const w = document.body.clientWidth;
		if (w<=768) {
			max = 2;
		}
		console.log(now<=max)
		if (now<=max) {
			if (now == 0) {
				if (now<max) {
					localStorage.asw_<?=pll_current_language()?>_cp = id
					localStorage.asw_<?=pll_current_language()?>_cp_slug = slug
					$('.site-compare-popup-wrap').dataset.active = 1
					$('.site-compare-popup .-pj').innerText = pj_title;
					cp_timeout_popup = setTimeout(()=>{
						$('.site-compare-popup-wrap').dataset.active = 0
					},2000)
				}
			}else if(now>0){
				let canFill = true
				for(let i of localStorage.asw_<?=pll_current_language()?>_cp.split(',')){
					if (i == id) {
						canFill = false
					}
				}
				if (canFill) {
					if (now<max) {
						localStorage.asw_<?=pll_current_language()?>_cp += ','+id
						localStorage.asw_<?=pll_current_language()?>_cp_slug += ','+slug
						$('.site-compare-popup-wrap').dataset.active = 1
						$('.site-compare-popup .-pj').innerText = pj_title;
						cp_timeout_popup = setTimeout(()=>{
							$('.site-compare-popup-wrap').dataset.active = 0
						},2000)
					}else{
						if (now==max) {
							$('.site-compare-notice').dataset.active = 1
							cp_timeout_notice = setTimeout(()=>{
								$('.site-compare-notice').dataset.active = 0
							},2000)
						}
					}
				}else{
					let pj_slug = localStorage.asw_<?=pll_current_language()?>_cp_slug.split(',')
					let pj_id = localStorage.asw_<?=pll_current_language()?>_cp.split(',')
					let ido = pj_id.indexOf(id)
					pj_slug.splice(ido, 1);
					pj_id.splice(ido, 1);
					localStorage.asw_<?=pll_current_language()?>_cp_slug = pj_slug.join()
					localStorage.asw_<?=pll_current_language()?>_cp = pj_id.join()
					$('.site-compare-remove-wrap').dataset.active = 1
					$('.site-compare-remove .-pj').innerText = pj_title;
					cp_timeout_remove = setTimeout(()=>{
						$('.site-compare-remove-wrap').dataset.active = 0
					},2000)
				}
			}
			console.log(localStorage.asw_<?=pll_current_language()?>_cp)
			console.log(localStorage.asw_<?=pll_current_language()?>_cp_slug)
			
		}
		renderCompareBadge()
	}
</script>