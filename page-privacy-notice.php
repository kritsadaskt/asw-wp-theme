<?php get_header() ?>
<!--=== The Section Boxes : banner ===-->
<style type="text/css">
	body,
	html {
		overflow: visible;
	}

	.about-menu {
		color: var(--ci-grey-400);
		transition: all .2s;
	}

	.cl-ci-orange-500 {
		color: var(--ci-orange-500) !important;
	}

	.about_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	.side-nav-menu,
	.side-nav-menu-about {
		border-left: 0;
	}

	.about-ani:hover .bg-cover,
	.about-ani:hover,
	.about-wrap:hover .about-ani {
		transform: scale(1.07);
		transition: all .8s;
	}

	.about_hline {
		/*width: 100%;*/
	}

	.about_hbar {
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}

	#menu-about {
		transition: all .15s;
	}

	#about-menu {
		position: sticky;
		top: calc(.5em + 70px);
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
			/*width: 95.5vw;*/
			/*width: 100%;*/
		}

		#bg-circle {
			left: -40%;
			top: calc(5% + 25vw);
			width: 100%;
			height: auto;
		}

	}

	@media (max-width: 767px) {

		.side-nav-menu,
		.side-nav-menu-about {
			border-left: 0;
			border-bottom: 0;
		}

		.side-nav-menu-about {
			/*width: 91.5vw;*/
		}

		#bg-circle {
			top: calc(10% + 50vw);
		}

	}
</style>

<?php
$f = get_fields();
//$slider = $f['banner']['home_banner'];
function pad($num)
{
	if ($num > 9) {
		return $num;
	} else {
		return '0' . $num;
	}
}

// Build context for shared privacy tabs partial.
$tabs = isset($f['privacy-notice']) && is_array($f['privacy-notice']) ? $f['privacy-notice'] : array();

$ctx = array(
	'section_id'       => 'about-us',
	'page_title'       => pll__('ประกาศความเป็นส่วนตัว (Privacy Notice)'),
	'breadcrumb_label' => pll__('นโยบายการคุ้มครองข้อมูลส่วนบุคคล'),
	'breadcrumb_url'   => 'about-us',
	'tabs'             => $tabs,
	'content_class'    => 'text-justify',
);

set_query_var('privacy_tabs_context', $ctx);
?>
<script type="text/javascript">
	function pad(num, size) {
		num = num.toString();
		while (num.length < size) num = "0" + num;
		return num;
	}
</script>
<style type="text/css">
	.txt_120 {
		display: block;
		height: calc(28px * 2);
		overflow: hidden;
	}

	#txt_20 {
		height: calc(28px * 2);
		overflow: hidden;
	}

	#home-slider {
		width: 100%;
		padding-top: 41.111%;
		/*padding-top: 56.25%;*/
		position: relative;
		display: flex;
	}

	#home-slider-inner {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: #000;
	}

	#home-slider-arrow {
		display: grid;
		grid-template-columns: 48px 48px;
		grid-column-gap: 8px;
		position: absolute;
		left: 24px;
		bottom: 64px;
		z-index: 10;
	}

	#home-slider-arrow img {
		display: inline-block;
		border-radius: 100%;
		cursor: pointer;
		transition: all .2s;
		opacity: .7;
	}

	#home-slider-arrow img:hover {
		opacity: 1;
	}

	#home-slider-slides {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}

	.home-slider-slide {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		transition: all .4s;
	}

	#home-slider-count {
		--i: 0;
		--z: 5;
		width: 240px;
		height: 30px;
		left: -200px;
		top: 48px;
		z-index: 10;
		position: absolute;
		align-items: center;
		display: flex;
		color: #fff;
		transform: rotate(-90deg);
		transform-origin: center right;
	}

	#home-slider-count .-num-bar {
		height: 2px;
		width: 93px;
		margin: 0 12px;
		background-color: #fff4;
		position: relative;
		display: flex;
	}

	#home-slider-count .-num-bar div {
		background-color: #fff;
		height: 100%;
		width: 0;
	}

	#home-slider-count .-num-bar div.go {
		width: 100%;
		transition: all 4.9s linear;
	}

	.home-slider-slide-video .plyr--video {
		max-height: 100% !important;
	}

	.home-news-date {
		position: absolute;
		bottom: 1.2rem;
		left: 1rem;
	}

	.home-news-date-sp {
		width: 100%;
		height: 30px;
	}

	#home-slider-count h3 {
		font-size: 40px;
	}

	#home-slider-count p {
		font-size: 26px;
		position: relative;
		top: 4px;
		padding-left: 4px;
		color: #EDF2F7;
	}

	.plyr-slider-wrap {
		position: absolute;
		display: flex;
		width: 100%;
		height: 200%;
		/*background-color: yellow;*/
		left: 0;
		top: -50%;
	}

	.plyr__video-embed iframe {
		transform: scale(.75);
	}

	.home-slider-slide-video {
		overflow: hidden;
	}

	.promotion_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	#middle-news-pic {
		position: relative;
		width: calc(100% + 8px);
		padding-right: 8px;
		padding-bottom: 8px;
	}

	#middle-news-pic::before {
		content: " ";
		position: absolute;
		background-color: var(--ci-veri-500);
		width: 30%;
		height: 30%;
		right: 0;
		bottom: 0;
	}

	.home-blog-inner {
		position: relative;
	}

	.home-blog-inner::before {
		content: " ";
		position: absolute;
		left: 0;
		top: 0;
		background: var(--ci-orange-500);
		width: 4px;
		transition: all .8s;
		height: 0%;
	}

	.home-blog-card:hover .home-blog-inner::before {
		height: 100%;
	}

	#home-slider-inner-mob {
		display: none;
	}

	.home-slider-shadow {
		width: 200px;
		height: 100%;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		background: linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(255, 255, 255, 0) 100%);
	}

	@media (max-width: 768px) {
		.home-blog-inner {
			display: flex;
			align-items: center;
		}
	}

	#home-slide-cmd-mob {
		display: none;
	}

	@media (max-width: 768px) {
		#home-slider-inner {
			display: none;
		}
	}

	.about-mini-section {
		transition: all 2s cubic-bezier(0, 0, 0, 1.5)
	}

	.about-mini-section[data-show="0"] {
		opacity: 0;
		transform: translateY(100px);

	}

	.about-mini-section[data-show="1"] {
		opacity: 1;
		transform: translateY(0px);
	}
</style>

</div>
<style type="text/css">
	#about-us {
		background: url(https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/12/circle.png);
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-position: left 8rem;
	}

	@media (max-width: 767px) {
		#about-us {
			background-position: -7rem 2rem;
			background-size: contain;
		}
	}
</style>
<style type="text/css">
	.arrow-l {
		height: 48px;
		top: 47%;
		left: 1%;
		opacity: 1;
		transition: .5s;
	}

	.arrow-r {
		height: 48px;
		top: 47%;
		right: 1%;
		opacity: 1;
		transition: .5s;
	}

	.arrow-l:hover,
	.arrow-r:hover {
		filter: brightness(200%);
	}

	.about-year {
		transform: rotate(-90deg);
		top: 16px;
		z-index: 999;
	}

	@media (max-width: 767px) {
		.modal-img-content {
			width: 100%;
			/*height: 100%;*/
			top: 0;
		}

		.mySlides {
			height: 100% !important;
			align-items: unset !important;
		}

		.mySlides img {
			height: auto !important;
			width: 100% !important;
		}
	}

	.reward-year {
		color: var(--ci-grey-100);
		transition: .8s all;
	}

	.reward-hover:hover .reward-hovered {
		left: 0%;
		transition: .8s all;
	}

	.reward-hover:hover .reward-img {
		transform: scale(1.08);
		transition: .8s all;
	}

	.reward-hover:hover .reward-year {
		transition: .8s all;
		color: white;
	}

	.reward-year,
	.reward-img {
		transition: .8s all;
	}

	.reward-hovered {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: -100%;
		background-color: rgba(18, 63, 109, 0.7);
		transition: .8s all;
	}
</style>
<?php
// Render the shared Privacy tabs section (handles tab_slug + hash behavior).
get_template_part('template-parts/partials/privacy', 'tabs');
?>

<?php get_footer() ?>