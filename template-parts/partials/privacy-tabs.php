<?php
/**
 * Shared tabbed layout for Privacy Notice and Privacy Policy pages.
 * Expects: set_query_var( 'privacy_tabs_context', $context )
 * Context: section_id (string), page_title (string), breadcrumb_label (string),
 *          breadcrumb_url (string), tabs (array of tab_name, content), content_class (string, optional).
 */
$ctx = get_query_var( 'privacy_tabs_context', null );
if ( ! $ctx || empty( $ctx['section_id'] ) || ! isset( $ctx['tabs'] ) || ! is_array( $ctx['tabs'] ) ) {
	return;
}
$section_id   = $ctx['section_id'];
$page_title   = $ctx['page_title'];
$breadcrumb   = $ctx['breadcrumb_label'];
$breadcrumb_url = $ctx['breadcrumb_url'];
$tabs         = $ctx['tabs'];
$content_class = isset( $ctx['content_class'] ) ? $ctx['content_class'] : '';
$tab_count    = count( $tabs );
?>
<style>
	/* Shared: Privacy Notice / Privacy Policy / About tabbed layout */
.about-menu {
	transition: all 0.2s;
}
.side-nav-menu,
.side-nav-menu-about {
	border-left: 0;
}
.about_vbar {
	width: 4px;
	height: 28px;
	position: absolute;
	left: -1.5px;
	top: 0;
	background-color: #F1683B;
	transition: all 0.2s;
}
.about_hbar {
	width: 28px;
	height: 4px;
	position: absolute;
	left: 0;
	top: -0.7px;
	background-color: #F1683B;
	transition: all 0.2s;
}
#menu-about {
	transition: all 0.15s;
	max-width: 100%;
}
.wp-block-table {
	margin-bottom: 32px;
}
#about-menu {
	position: sticky;
	top: calc(0.5em + 70px);
}
div#about-info-section {
	position: absolute;
	width: 10px;
	height: 10px;
	top: -70px;
}
@media (max-width: 1023px) {
	.side-nav-menu-about {
		overflow: auto;
		white-space: nowrap;
		scroll-behavior: smooth;
		overflow-y: hidden;
	}
}
@media (max-width: 767px) {
	.side-nav-menu,
	.side-nav-menu-about {
		border-left: 0;
		border-bottom: 0;
	}
}
.privacy-policy-tab[data-active="0"] {
	display: none;
}
</style>
<div class="mx-auto cont-pd py-6 px-4">
	<div class="flex flex-row items-center">
		<a href="/<?php echo esc_attr( pll_current_language() ); ?>/home" class="cl-ci-blue-400"><?php pll_e( 'หน้าแรก' ); ?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;" alt="">
		<a href="/<?php echo esc_attr( pll_current_language() ); ?>/<?php echo esc_attr( $breadcrumb_url ); ?>" class=""><?php echo esc_html( $breadcrumb ); ?></a>
	</div>
</div>

<section id="<?php echo esc_attr( $section_id ); ?>" class="js-privacy-tabs-section" data-max="<?php echo (int) $tab_count; ?>">
	<div class="cont-pd lg:pt-10 -pb-10">
		<div id="about-info-section"></div>
		<div class="grid grid-flow-row lg:grid-cols-12 gap-4">
			<div class="lg:col-span-4">
				<section id="about-menu" class="lg:pl-6 lg:pb-10 pt-4">
					<h1><?php echo esc_html( $page_title ); ?></h1>
					<div id="menu-about" class="flex flex-row lg:flex-col side-nav-menu-about relative pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8">
						<?php foreach ( $tabs as $key => $value ) :
							$slug = ! empty( $value['tab_slug'] ) ? $value['tab_slug'] : sanitize_title( $value['tab_name'] );
							?>
							<div
								role="button"
								tabindex="0"
								onclick="window.privacyTabsShowInfo(<?php echo (int) $key; ?>)"
								class="about-menu px-0 lg:px-4 <?php echo $key === 0 ? 'cl-ci-orange-500 font-medium' : ''; ?>"
								data-slug="<?php echo esc_attr( $slug ); ?>"
							>
								<?php echo esc_html( $value['tab_name'] ); ?>
							</div>
							<span class="hidden lg:block" style="height: 1rem;"></span>
						<?php endforeach; ?>
						<span class="hidden lg:block" style="height: 1rem;"></span>
						<div class="hidden lg:block absolute bg-ci-grey-900" style="width: 1px;height: 100%;left: 0px;z-index: 1;">
							<div class="about_vbar"></div>
						</div>
						<div class="block lg:hidden absolute bg-ci-grey-900 about_hline" style="height: 2.5px;bottom: 1.15px;z-index: 1;">
							<div class="about_hbar"></div>
						</div>
					</div>
				</section>
			</div>
			<?php foreach ( $tabs as $key => $value ) :
				$slug = ! empty( $value['tab_slug'] ) ? $value['tab_slug'] : sanitize_title( $value['tab_name'] );
				?>
				<div
					id="privacy-policy-<?php echo (int) ( $key + 1 ); ?>"
					data-tab="<?php echo (int) ( $key + 1 ); ?>"
					data-active="<?php echo $key === 0 ? '1' : '0'; ?>"
					data-slug="<?php echo esc_attr( $slug ); ?>"
					class="privacy-policy-tab lg:col-span-8 pt-8 md:pt-0 xl:pt-4 xl:pr-24 pb-20 md:pr-0 <?php echo esc_attr( $content_class ); ?>"
				>
					<div class="entry-content">
						<?php echo $value['content']; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<script type="text/javascript">
(function() {
	var section = document.querySelector('.js-privacy-tabs-section');
	if (!section) return;
	var menu = section.querySelector('#menu-about');
	var hline = section.querySelector('.about_hline');
	var hbar = section.querySelector('.about_hbar');
	var infoSection = section.querySelector('#about-info-section');
	var elAll = section.querySelectorAll('.about-menu');
	var tabPanels = section.querySelectorAll('.privacy-policy-tab');
	var current = 0;
	var width_hline_gap;

	function getIndexFromHash() {
		if (!window.location.hash || window.location.hash === '#') return -1;
		var hash = window.location.hash.substring(1); // remove leading #
		if (!hash) return -1;
		for (var i = 0; i < tabPanels.length; i++) {
			if (tabPanels[i].dataset && tabPanels[i].dataset.slug === hash) {
				return i;
			}
		}
		return -1;
	}

	function setWidthMenu() {
		if (!menu || !hline || !hbar || !elAll.length) return;
		var width_hline = 0;
		var left_hline = 0;
		var iCount = 0;
		elAll.forEach(function(el) { width_hline += el.offsetWidth; });
		for (var i = 0; i < elAll.length; i++) {
			if (iCount < current && (document.body.clientWidth < 768 || (document.body.clientWidth >= 768 && document.body.clientWidth < 1024))) {
				left_hline += elAll[i].offsetWidth;
			}
			iCount++;
		}
		if (document.body.clientWidth < 768) {
			width_hline_gap = width_hline + (elAll.length - 1) * 16;
			menu.style.width = 'calc(100vw - 32px)';
			if (width_hline_gap < menu.offsetWidth) {
				menu.style.justifyContent = 'space-between';
				var gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1);
				left_hline += gapWidth * current;
				hbar.style.left = left_hline + 'px';
				hline.style.width = '100%';
			} else {
				width_hline_gap = 0;
				width_hline += (elAll.length - 1) * 16;
				menu.style.columnGap = '16px';
				left_hline += current * 16;
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';
			}
		} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
			width_hline_gap = width_hline;
			menu.style.width = 'calc(100vw - 32px)';
			if (width_hline_gap < menu.offsetWidth) {
				menu.style.width = '';
				menu.style.justifyContent = 'space-between';
				var gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1);
				left_hline += gapWidth * current;
				hbar.style.left = left_hline + 'px';
				hline.style.width = '100%';
			} else {
				menu.style.width = '';
				width_hline_gap = 0;
				width_hline += (elAll.length - 1) * 32;
				menu.style.columnGap = '32px';
				left_hline += current * 32;
				hbar.style.left = left_hline + 'px';
				hline.style.width = width_hline + 'px';
			}
		}
		hbar.style.width = elAll[current].offsetWidth + 'px';
	}

	window.privacyTabsShowInfo = function(num) {
		if (!infoSection) return;
		infoSection.scrollIntoView({ behavior: 'smooth' });
		var activeTab = section.querySelector('.privacy-policy-tab[data-active="1"]');
		if (activeTab) activeTab.setAttribute('data-active', '0');
		if (tabPanels[num]) tabPanels[num].setAttribute('data-active', '1');
		current = num;
		var elNum = num;
		var allEl = section.querySelectorAll('.about-menu');
		if (!allEl.length || !menu || !hbar) return;
		var barY = 0;
		var barX = 0;
		var width_hline = 0;
		allEl.forEach(function(el) { width_hline += el.offsetWidth; });
		for (var i = 0; i < allEl.length; i++) {
			allEl[i].classList.remove('cl-ci-orange-500', 'font-medium');
			if (i < elNum) {
				barY += allEl[i].offsetHeight;
				barX += allEl[i].offsetWidth;
			}
		}
		barY += 16 * elNum;
		allEl[elNum].classList.add('cl-ci-orange-500', 'font-medium');
		var barYoffset = (allEl[elNum].offsetHeight - 28) / 2;
		var vbar = section.querySelector('.about_vbar');
		if (vbar) vbar.style.top = (barY + barYoffset) + 'px';
		if (document.body.clientWidth < 768) {
			barX += width_hline_gap !== 0 ? ((menu.offsetWidth - width_hline) / (allEl.length - 1)) * current : current * 16;
		} else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
			barX += width_hline_gap !== 0 ? ((menu.offsetWidth - width_hline) / (allEl.length - 1)) * current : current * 32;
		}
		hbar.style.width = allEl[current].offsetWidth + 'px';
		hbar.style.left = barX + 'px';

		// sync URL hash with active tab slug
		var panel = tabPanels[num];
		if (panel && panel.dataset && panel.dataset.slug) {
			var base = window.location.href.split('#')[0];
			try {
				if (window.history && window.history.replaceState) {
					window.history.replaceState(null, '', base + '#' + panel.dataset.slug);
				} else {
					window.location.hash = panel.dataset.slug;
				}
			} catch (e) {
				// fail silently if history API is not available
			}
		}
	};

	window.addEventListener('resize', function() {
		setTimeout(setWidthMenu, 200);
	});
	setTimeout(setWidthMenu, 200);

	// On initial load, if there is a hash and it matches a tab slug, activate that tab.
	var initialIndex = getIndexFromHash();
	if (initialIndex >= 0) {
		// ensure current index is in sync before drawing underline
		current = initialIndex;
		window.privacyTabsShowInfo(initialIndex);
	}

	var masthead = document.querySelector('#masthead');
	var miniSec = document.querySelectorAll('.about-mini-section');
	function checkWaveScroll() {
		if (!masthead) return;
		var headerHeight = masthead.offsetHeight;
		var windowHeight = window.innerHeight;
		for (var i = 0; i < miniSec.length; i++) {
			var rect = miniSec[i].getBoundingClientRect();
			miniSec[i].dataset.play = rect.y < headerHeight ? '0' : '1';
			if (rect.y <= windowHeight - 100) miniSec[i].dataset.show = '1';
		}
	}
	window.addEventListener('scroll', checkWaveScroll);
	checkWaveScroll();
})();
</script>
