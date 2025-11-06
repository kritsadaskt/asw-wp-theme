<?php die() ?>
outdate

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?php get_header() ?>
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
		if(localStorage.getItem('asw_cp_slug') != null && localStorage.getItem('asw_cp_slug') != ''){
			let newurl = '/compare/?project='+localStorage.getItem('asw_cp_slug');
			location.href = newurl;
		}
	</script>
	<?php
}
$pj_compare_slug = explode(',', $_GET['project']);
$pj_info_data = array();
$pj_compare = [];
$found_all = true;
$pj_data = [];
$pj_compare_slug_new = [];
foreach ($pj_compare_slug as $key => $slug) {
	$args = array(
		'name' => $slug,
		'post_type' => ['house','condominium'],
		'post_status' => 'publish',
		'numberposts' => 1
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

$top_param = join(",",$pj_compare_slug_new);
$top_param_id = join(",",$pj_compare);
$top_url_param = "/compare/?project=".$top_url_param;
if (!$found_all) {
	?>
	<script type="text/javascript">
		window.history.pushState({path:`<?=$top_url_param?>`},'',`<?=$top_url_param?>`);
	</script>
	<?php
}
// foreach ($pj_compare as $i => $pj_id) {
// 	$data = [];
// 	$args = array(
// 		'post__in' => array($pj_id),
// 		'post_type' => ['house','condominium']
// 	);
// 	$posts = get_posts($args);
// 	$data['post'] = $posts[0];
// 	$data['type'] = $data['post']->post_type;
// 	$data['price'] = get_field('price',$pj_id);
// 	$data['location'] = get_the_terms($pj_id,'project_location')[0]->name;
// 	$data['compare'] = get_field('compare',$pj_id);
// 	$pj_data[$pj_id] = $data;
// }
?>
<script type="text/javascript">
	localStorage.asw_cp_slug = `<?=$top_param?>`;
	localStorage.asw_cp = `<?=$top_param_id?>`;
</script>
<style type="text/css">
	.sticky-estate {
		display: none;
		box-shadow: 0px 4px 12px 0px rgba(0, 0, 0, 0.15);
		background: #ffffff;
		width: 100%;
		position: fixed;
		top: 3em;
		left: 0;
		z-index: 99;
		transition: 0.2s;
	}
	.sticky {
		position: sticky !important;
		position: -webkit-sticky !important;
		width: 100%;
		top: 0px !important;
	}
	.compare {
		padding: 1em;
	}
	.comp-body .-detail .-item {
		min-height: 50px;
		display: flex;
		justify-content: flex-start;
		align-items: flex-start;
	}
	.comp-body .-item[data-col-show="-1"] {
		font-size: 0;
		background: #fff;
	}
	.comp-body.-price .-item[data-col-show="0"],
	.comp-body.-location .-item[data-col-show="0"],
	.comp-body.-type .-item[data-col-show="0"]{
		background: #EDF2F6;
		font-size: 0;
	}
	.comp-body.-info div .-item[data-col-show="0"]{
		background: #EDF2F6;
	}
	.comp-body.-info div .-item[data-col-show="0"] div:nth-child(2){
		font-size: 0;
	}
	.compare .-price{

	}
	.comp-body.-price{

	}
	.comp-body.-info, .comp-body.-price, .comp-body.-location, .comp-body.-type {
		width: 100%;
		display: flex;
		flex-wrap: wrap;
	}
	.comp-body .-title{
		width: 25%;
		border-bottom: 1px solid #EDF2F6;
	}
	.comp-body.-price .-detail{
		width: 75%;
		display: flex;
	}
	.comp-body.-location .-detail{
		width: 75%;
		display: flex;
	}
	.comp-body.-type .-detail{
		width: 75%;
		display: flex;
	}
	.comp-body.-price .-detail .-item{
		width: calc(100%/3);
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 7px;
		color: #3A638E;
		flex-wrap: wrap;
		align-items: center;
	}
	.comp-body.-location .-detail .-item{
		width: calc(100%/3);
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 10px;
	}
	.comp-body.-type .-detail .-item{
		width: calc(100%/3);
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 10px;
	}
	.comp-body.-type .-detail .-item span{
		display: none;
	}
	.comp-body.-type .-detail .-item[data-val="condominium"] span[data-val="condominium"],
	.comp-body.-type .-detail .-item[data-val="house"] span[data-val="house"]{
		display: block;
	}

	.comp-body.-info .-detail{
		width: 75%;
		display: flex;
		flex-wrap: wrap;
		min-height: 50px;
	}
	.comp-body.-info .-detail div .-heading-item{
		display: none;
		width: 100%;
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 0.5em 0.25em;
		gap: 11px;
	}
	.comp-body.-info .-detail div .-heading-item::before {
		content: "•";
	}
	.comp-body.-info .-detail div {
		width: 100%;
		display: flex;
	}
	.comp-body.-info .-detail div[data-info-sum="0"] {
		display: none;
	}
	.comp-body.-info .-detail div .-item{
		width: calc(100%/3);
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 10px;
		flex-direction: column;
	}
	.comp-body.-info .-detail div .-item[data-show="-1"] {
		font-size: 0;
		background: #fff;
	}
	.comp-body.-info .-detail div .-item[data-show="0"] {
		background: #EDF2F6;
	}
	.comp-body.-info .-detail div .-item > div:first-child{
		font-weight: bold;
	}

	.data-blank {
		background-color: #E0ECF8;
	}
	.comp-title{
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 26px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px;
	}
	.comp-fac .-title {
		width: 100%;
		padding: 0.5em 0.25em;
	}

	.comp-fac .-h{
		display: flex;
		align-items: center;
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 400;
		line-height: 28px;
		width: 25%;
		border-bottom: 1px solid #EDF2F6;
		min-height: 50px;
	}
	a-check{
		display: block;
	}

	.comp-fac .-item {
		display: flex;
		width: 100%;
	}
	.comp-fac .-t {
		width: 75%;
		display: flex;
		min-height: 50px;
	}
	.comp-fac .-t .-col-pj {
		width: calc(100%/3);
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		padding: 10px;
		display: flex;
		align-items: center;
		justify-content: center;
		min-height: 46px;
	}
	.comp-fac .-t .-col-pj[data-col-show="-1"] {
		background: #ffffff;
	}
	.comp-fac .-t .-col-pj[data-col-show="-1"] a-check{
		display: none;
	}
	.comp-fac .-t .-col-pj[data-col-show="0"] {
		background: var(--grey-grey-900, #EDF2F6);
	}
	.comp-fac .-t .-col-pj[data-col-show="1"] {
		background: #ffffff;
	}
	.-col-pj[data-select="-1"] a-check {
		display: none;
	}
	/*	*[data-pj-id=""] a-check{
		display: none;
	}*/

	.comp-header {
		display: flex;
		position: relative;
	}
	.comp-header .-title {
		width: 25%;
		border-bottom: 1px solid #EDF2F6;
	}
	.comp-header .-detail {
		display: flex;
		width: 75%;
		align-items: center;
		justify-content: center;
	}
	.comp-header .-detail .-col {
		width: calc(100%/3);
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 16px 10px;
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		height: fit-content;
		min-height: 320px;

		position: sticky;
		top: 0;
	}
	.comp-header .-detail .-col.-estate[data-col-show="0"] .select-estate{
		display: flex;

	}
	.comp-header .-detail .-col.-estate[data-col-show="0"] .show-estate{
		display: none;
	}
	.comp-header .-detail .-col.-estate[data-col-show="1"] .select-estate{
		display: none;
	}
	.comp-header .-detail .-col.-estate[data-col-show="1"] .show-estate{
		display: flex;
	}

	.sticky-top {
		display: flex;
		position: relative;
	}
	.sticky-top .-title {
		width: 25%;
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 1.875rem;
		font-style: normal;
		font-weight: 500;
		line-height: 2rem;
		display: flex;
		align-items: center;
		justify-content: flex-end;
		padding: 0.5em;
	}
	.sticky-top .-detail {
		display: flex;
		width: 75%;
		align-items: center;
		justify-content: center;
	}
	.sticky-top .-detail .-col {
		width: calc(100%/3);
		display: flex;
		justify-content: center;
		align-items: center;
		padding: 16px 10px;
		border-left: 1px solid #EDF2F6;
		border-bottom: 1px solid #EDF2F6;
		height: fit-content;
		min-height: 100px;

		position: sticky;
		top: 0;
	}
	.sticky-top .-detail .-col.-estate[data-col-show="0"] .select-estate-minimal{
		display: flex;
	}
	.sticky-top .-detail .-col.-estate[data-col-show="0"] .show-estate-minimal{
		display: none;
		position: relative;
	}
	.sticky-top .-detail .-col.-estate[data-col-show="1"] .select-estate-minimal{
		display: none;
	}
	.sticky-top .-detail .-col.-estate[data-col-show="1"] .show-estate-minimal{
		display: flex;
		position: relative;
	}

	.show-estate-minimal {
		display: none;
		gap: 10px;
		align-items: center;
		justify-content: center;
		position: relative;
		width: 100%;
	}
	.show-estate-minimal img {
		max-width: 75px;
		margin: 0;
	}
	.show-estate-minimal div {
		display: flex;
		flex-direction: column;
		gap: 2px;
		align-items: flex-start;
		justify-content: flex-start;
		position: relative;
	}
	.show-estate-minimal .btn-close {
		position: absolute;
		top: -5px;
		right: -5px;
		display: inline-flex;
		padding: 4px;
		align-items: center;
		gap: 8px;
		border-radius: 5px;
		background: rgba(0, 0, 0, 0.60);
		cursor: pointer;
		transform: scale(0.75);
	}
	.show-estate-minimal div h2 {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 20px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px; /* 106.667% */
	}
	.show-estate-minimal div h6 {
		font-size: 13px;
		font-style: normal;
		font-weight: 500;
	}
	.select-estate-minimal {
		width: 184px;
		height: 75px;
		border-radius: 8px;
		border: 2px dashed var(--grey-grey-600, #BFC4C8);
		background: var(--blue-blue-900, #F3F9FF);
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 5px;
		cursor: pointer;
	}

	.select-estate {
		width: 184px;
		height: 220px;
		border-radius: 8px;
		border: 2px dashed var(--grey-grey-600, #BFC4C8);
		background: var(--blue-blue-900, #F3F9FF);
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 5px;
		cursor: pointer;
	}
	.show-estate {
		display: none;
		flex-direction: column;
		gap: 10px;
		align-items: center;
		justify-content: center;
		position: relative;
	}
	.show-estate div {
		display: flex;
		flex-direction: column;
		gap: 3px;
		align-items: center;
		justify-content: center;
		position: relative;
	}
	.show-estate .btn-close {
		position: absolute;
		top: -5%;
		right: -10%;
		display: inline-flex;
		padding: 4px;
		align-items: center;
		gap: 8px;
		border-radius: 5px;
		background: rgba(0, 0, 0, 0.60);
		cursor: pointer;
	}
	.show-estate div h2 {
		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 25px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px; /* 106.667% */
	}
	.show-estate div h6 {
		font-size: 18px;
		font-style: normal;
		font-weight: 500;
		line-height: 32px; /* 106.667% */
	}
	.show-estate div .read-more {
		border-radius: 8px;
		border: 1px solid var(--blue-blue-700, #B7CDE4);
		background: var(--White, #FFF);
		padding: 0.25em 0.75em;
	}
	.comp-body.-info .-detail div .-item ul li {
		display: flex;
		gap: 10px;
	}
	.comp-body.-info .-detail div .-item ul li::before {
		content: "•";
	}

	/* comp-modal */
	.comp-bg {
		width: 100vw;
		height: 100vh;
		background-color: #ffffff;
		display: none;
		justify-content: center;
		position: fixed;
		z-index: 10000;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		overflow: hidden;
		padding-top: 1rem;
	}
	.comp-modal {
		max-width: 1200px;
		width: 100%;
		min-height: 500px;
		height: fit-content;
		background: #ffffff;
		border-radius: 10px;
		z-index: 54;
		padding: 1em;
		position: relative;
	}
	.comp-modal h3 {
		color: var(--grey-grey-100, #202831);
		font-size: 40px;
		font-style: normal;
		font-weight: 400;
		line-height: 44px; /* 110% */
		text-align: center;
	}
	.comp-modal .btn-close {
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}

	/* Responsive */
	@media (max-width: 768px) {
		.comp-header {
			flex-direction: column;
		}
		.comp-header .-title {
			width: 100%;
		}
		.comp-header .-detail {
			width: 100%;
/*			flex-direction: column;*/
			gap: 0.5em;
		}
		.comp-header .-detail .-col {
			width: 100%;
			display: flex;
			justify-content: flex-start;
		}
		.comp-fac .-title {
			padding: 0em;
		}
		.comp-title {
			padding: 10px 0px;
		}

		.comp-body .-title{
			width: 100%;
		}
		.comp-body.-price .-detail{
			width: 100%;
		}
		.comp-body.-location .-detail{
			width: 100%;
		}
		.comp-body.-type .-detail{
			width: 100%;
		}

		.comp-body.-info .-detail {
			width: 100%;
		}
		.comp-body.-info .-detail div {
			width: 100%;
			display: flex;
			flex-wrap: wrap;
		}
		.comp-body.-info .-detail div .-heading-item {
			width: 100%;
			display: flex;
			font-weight: bold;
		}
		.comp-body.-info .-detail div .-item > div:first-child{
			display: none;
		}

		.comp-body .-detail div .-item:first-child,
		.comp-body.-info .-detail div .-heading-item{
			border-left: 0;
		}

		.comp-body.-info .-detail div .-item:nth-child(2),
		.comp-body.-info .-detail div .-item:nth-child(6),
		.comp-body.-info .-detail div .-item:nth-child(10),
		.comp-body.-info .-detail div .-item:nth-child(14),
		.comp-body.-info .-detail div .-item:nth-child(18),
		.comp-body.-info .-detail div .-item:nth-child(22),
		.comp-body.-info .-detail div .-item:nth-child(26),
		.comp-body.-info .-detail div .-item:nth-child(30){
			border-left: 0;
		}
		.comp-fac .-h, .comp-fac .-t .-col-pj {
			min-height: 57px;
		}
		.show-estate img {
			border-radius: 8px;
		}
		.comp-header .-detail .-col {
			min-height: fit-content;
		}
		.comp-header .-detail .-col {
			border-left: 0;
		}
		.show-estate .btn-close {
			top: 7px;
			right: 7px;
		}
		.show-estate div {
			display: flex;
			flex-direction: column;
			gap: 2px;
			align-items: center;
			text-align: center;
		}
		.show-estate div .read-more {
			border: 0;
			padding: 0;
			color: var(--delightful-primary, #003952);
			text-decoration-line: underline;
		}
		.select-estate {
			width: 140px;
			height: 140px;
		}
		.comp-modal {
			min-height: 85vh;
		}

		.sticky-top .-title {
			display: none;
		}
		.sticky-top .-detail {
			width: 100%;
		}
		.sticky-top .-detail .-estate .show-estate-minimal img.estate-thumbnail {
			display: none;
		}
		.sticky-top .-detail .-estate .show-estate-minimal div div div h6.-is-type {
			display: none !important;
		}
		.show-estate-minimal div h2 {
			line-height: 25px;
		}
		.show-estate-minimal div {
			text-align: center;
			align-items: center;
		}
		.sticky-estate {
			top: 2.2em;
		}

		.sticky-top .-detail .-col {
			width: calc(100%/2);
		}
		.sticky-top .-detail .-col[data-pj-col="2"] {
			display: none;
		}
		.comp-header .-detail .-col[data-pj-col="2"] {
			display: none;
		}

		.comp-body .-detail .-item:nth-child(3) {
			display: none;
		}
		.comp-body.-price .-detail .-item,
		.comp-body.-location .-detail .-item,
		.comp-body.-type .-detail .-item,
		.comp-body.-info .-detail .-item,
		.comp-fac .-t .-col-pj {
			width: calc(100%/2);
		}

		.comp-fac .-detail .-t .-col-pj:nth-child(3) {
			display: none;
		}

		.comp-header .-detail {
			align-items: flex-start;
		}
	}

	.filter-section {
		display: flex;
		align-items: center;
		justify-content: center;
		gap: 1em;
	}
	.filter-box {
		display: flex;
		justify-content: center;
		border: 1px solid #E0ECF8;
		border-radius: 10px;
		width: fit-content;
	}
	.filter-box div {
		display: flex;
		align-items: center;
		justify-content: space-between;
		gap: 12px;
		padding: 0.75em;
		border-right: 1px solid #E0ECF8;
		cursor: pointer;
	}
	.filter-box div:hover {
		background-color: #F6FFFE;
	}
	.clear-filter {
		cursor: pointer;
	}
	.clear-filter:hover {
		color: #1D9F9B;
	}
	.filter-select {
		transition: .5s;
		border: 1px solid var(--ci-blue-600);
		border-radius: 24px;
		align-items: center;
		margin-top: 10px;
		margin-right: 3px;
		width: fit-content;
		padding: 7px 12px;

		display: flex;
		gap: 5px;
		cursor: pointer;
	}
	.filter-select.active {
		border: 1px solid rgb(29, 159, 155);
		background-color: rgb(246, 255, 254);
		color: #000;
	}

	.filter-toggle {
		position: absolute;
		z-index: 10;
		display: block;
		box-shadow: 0px 4px 12px 0px rgba(0, 0, 0, 0.15);
	}
	.filter-toggle.type {
		width: 350px;
		left: 15%;
	}
	.filter-toggle.location {
		width: 550px;
		left: 30%;
	}
	.filter-toggle.brand {
		width: 400px;
		left: 35%;
	}
	.filter-toggle.price {
		width: 300px;
		left: 60%;
	}

	.filter-lists {
		display: flex;
		flex-wrap: wrap;
	}
	.filter-price-lists {
		display: flex;
		flex-direction: column;
	}
	.filter-price-list {
		width: 100%;
		padding: 0.5em 0.75em;
		cursor: pointer;
	}
	.filter-price-list:hover {
		background-color: rgb(246, 255, 254);
		color: #000;
	}
	.filter-price-list.active {
		background-color: rgb(246, 255, 254);
		color: #000;
	}

	.estate-list {
		width: 100%;
		height: auto;
		max-height: 380px;
		overflow-y: auto;

		display: flex;
		flex-wrap: wrap;
		gap: 1em;
	}
	.estate-card {
		width: calc(100%/3 - 1em);
		height: fit-content;
		border-radius: 8px;
		border: 1px solid var(--White, #FFF);
		background: var(--White, #FFF);
		box-shadow: 0px 4px 12px 0px rgba(0, 0, 0, 0.15);

		display: flex;
		padding: 0.75em;
		position: relative;
	}

	.estate-card.selected {
		background: #F6FFFE;
		border: 1px solid #1D9F9B;
	}
	.estate-card .estate-image {
		width: 40%;
	}
	.estate-card .estate-info .logo{
		width: 105px !important;
	}
	.estate-card .estate-info {
		width: 60%;
		display: flex;
		flex-direction: column;
		justify-content: space-between;
	}
	.estate-card .estate-selected {
		position: absolute;
		top: 10px;
		right: 10px;
		width: fit-content;
		height: fit-content;
		cursor: pointer;
	}

	.rotate180deg {
		transform: rotate(-180deg)
	}
	.project-card-logo {
		width: 100px;
	}

	.compare-bar {
		background: var(--blue-blue-900, #F3F9FF);
		width: 100%;
		min-height: 100px;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 28px 34px;
		border-radius: 0px 0px 7px 7px;

		color: var(--grey-grey-200-emphasize, #323A41);
		font-size: 22px;
		font-style: normal;
		font-weight: 500;
		line-height: 28px; /* 127.273% */
	}
	.compare-btn {
		display: inline-flex;
		padding: 8px 34px;
		justify-content: center;
		align-items: center;
		border-radius: 8px;
		background: var(--grey-grey-700, #CFD4D9);
		color: #ffffff;
		cursor: not-allowed;
	}
	.compare-btn-active {
		display: inline-flex;
		padding: 8px 34px;
		justify-content: center;
		align-items: center;

		border-radius: 8px;
		background: var(--blue-blue-300-main, #123F6D);
		color: #ffffff;
		cursor: pointer;
	}
	.filter-mb-section, .filter-mb-expand{
		display: none;
	}

	@media (max-width: 768px) {
		.estate-card {
			width: 100%;
		}

		.filter-section, .filter-toggle {
			display: none;
		}
		.filter-mb-section {
			display: flex;
			justify-content: space-between;
			align-items: center;
			width: 100%;
			padding: 16px 26px;
			border-radius: 16px;
			border: 1px solid var(--ci-blue-800);
			box-shadow: 0px 0px 30px rgba(98, 137, 177, 0.4);
			margin-bottom: 1em;
		}
		.filter-mb-expand {
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			width: 100dvw;
			height: 100dvh;
			background-color: #ffffff;
			z-index: 99;
			padding: 3em 0.75em 0.75em 0.75em;
			overflow-y: auto;
		}
		.filter-mb-expand .filter-mb-type {
			padding: 1em 0.5em;
		}
		.filter-mb-expand .filter-mb-type .filter-menu{
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.filter-mb-expand .filter-mb-type .filter-menu div{
			display: flex;
			align-items: center;
			gap: 8px;
		}
		.compare-bar {
			position: fixed;
			bottom: 0;
			left: 0;
		}
		.estate-list {
			max-height: 550px;
		}
		.mb-expand-bar {
			width: 100%;
			position: fixed;
			bottom: 0;
			left: 0;
			display: flex;
			align-items: center;
			justify-content: space-around;
			padding: 1em;
		}
		.btn-clear {
			width: 150px;
			background-color: #ffffff;
			color: #123f6d;
			border-radius: 8px;
			padding: 0.5rem 1.5rem;
			opacity: 1;
			transition: all .3s;
		}
		.btn-search {
			width: 150px;
			background-color: #123f6d;
			color: #fff;
			border-radius: 8px;
			padding: 0.5rem 1.5rem;
			opacity: 1;
			transition: all .3s;
		}

		.sticky-top .-detail:nth-child3(3) {
			display: none;
		}
	}

	.notice {
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
	}
	.notice-icon {
		padding: 0.625rem;
		border-radius: 2.25rem;
		background: var(--blue-blue-800, #E0ECF8);
	}
	.notice-close {
		position: absolute;
		top: 0.5em;
		right: 0.5em;
		cursor: pointer;
	}
</style>

<div id="app" class="container mx-auto compare">
	<!-- Notice -->
	<div v-if="showNotice" class="notice">
		<div>
			<div class="notice-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
				  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22473 7.10863C0.980649 6.86455 0.980649 6.46882 1.22473 6.22474L5.2022 2.24727C5.44628 2.00319 5.84201 2.00319 6.08609 2.24727C6.33016 2.49135 6.33016 2.88707 6.08609 3.13115L3.17555 6.04169H18.3333C18.6785 6.04169 18.9583 6.32151 18.9583 6.66669C18.9583 7.01186 18.6785 7.29169 18.3333 7.29169H3.17555L6.08609 10.2022C6.33016 10.4463 6.33016 10.842 6.08609 11.0861C5.84201 11.3302 5.44628 11.3302 5.2022 11.0861L1.22473 7.10863Z" fill="#323A41"/>
				  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7753 15.0253C19.0194 14.7812 19.0194 14.3854 18.7753 14.1414L14.7978 10.1639C14.5537 9.91982 14.158 9.91982 13.9139 10.1639C13.6698 10.408 13.6698 10.8037 13.9139 11.0478L16.8245 13.9583H1.66667C1.32149 13.9583 1.04167 14.2381 1.04167 14.5833C1.04167 14.9285 1.32149 15.2083 1.66667 15.2083H16.8245L13.9139 18.1188C13.6698 18.3629 13.6698 18.7587 13.9139 19.0027C14.158 19.2468 14.5537 19.2468 14.7978 19.0027L18.7753 15.0253Z" fill="#323A41"/>
				</svg>
			</div>
		</div>
		<div>
			<h5>เปรียบเทียบได้สูงสุด 3 โครงการ</h5>
			<p>กรุณาลบโครงการที่เลือกไว้ 1 โครงการ เพื่อเพิ่มโครงการใหม่</p>
		</div>

		<svg class="notice-close" xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none" @click="showNotice = false;">
		  <path d="M2.79276 2.67188L12.3247 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		  <path d="M12.3145 2.67188L2.7826 13.3385" stroke="#323A41" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</svg>
	</div>

	<!-- Modal -->
	<div class="comp-bg">
		<div class="comp-modal">
			<div class="btn-close" onclick="handleFilterModal('none')">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<path d="M4 4L20 20" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M20 4L4 20" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
			<h2 class="text-center mb-5">เลือกโครงการเพื่อเปรียบเทียบ</h2>

			<!-- Mobile -->
			<section class="filter-mb-section" @click="mbExpandToggle()">
				<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
				<span>ค้นหาที่อยู่โครงการในแบบคุณ</span>
				<img src="/wp-content/uploads/2022/11/arrow.png" class="quick-filter-arrow" style="height: 15px">	
			</section>

			<div v-if="mbExpand" class="filter-mb-expand">
				<!-- type -->
				<div class="filter-mb-type">
					<div class="filter-menu" @click="selectToggle('type')">
						<div>
							<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
							<span>ประเภทโครงการ</span>
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
							<span>ทำเลที่คุณสนใจ</span>
						</div>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'location' }" style="height:.5rem;margin: 0;">
					</div>
					<div v-if="state == 'location'" class="filter-data">
						<span class="cl-ci-blue-300" style="font-size: 26px;">ในกรุงเทพฯ</span>
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
						<span class="cl-ci-blue-300" style="font-size: 26px;">ต่างจังหวัด</span>
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
							<span>เลือกแบรนด์</span>
						</div>
						<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'brand' }" style="height:.5rem;margin: 0;">
					</div>
					<div v-if="state == 'brand'" class="filter-data">
						<span class="cl-ci-blue-300" style="font-size: 26px;">คอนโดมิเนียม</span>
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
							<span>่ช่วงราคา</span>
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
					<button class="btn-clear" @click="clearFilter()">ล้างทั้งหมด</button>
					<button class="btn-search" @click="mbExpandToggle()">ค้นหา</button>
				</div>
			</div>

			<!-- Desktop -->

			<section class="filter-section">
				<div class="filter-box">
					<div @click="selectToggle('type')">
						<img src="/wp-content/uploads/2022/10/Icon-in-input.png" class="inline-block" style="height:2rem;">
						<span v-if="filter_type.length <= 0">ประเภทโครงการ</span>
							<span v-else>เลือกแล้ว {{ filter_type.length }} โครงการ</span>
							<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'type' }" style="height:.5rem">
						</div>
						<div @click="selectToggle('location')">
							<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" class="inline-block" style="height:2rem;">
							<span v-if="filter_location.length <= 0">ทำเลที่คุณสนใจ</span>
								<span v-else>เลือกแล้ว {{ filter_location.length }} ทำเล </span>
								<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'location' }" style="height:.5rem">
							</div>
							<div @click="selectToggle('brand')">
								<img src="/wp-content/uploads/2022/10/Icon-in-input-2.png" class="inline-block" style="height:2rem;">
								<span v-if="filter_brand.length <= 0">เลือกแบรนด์</span>
									<span v-else>เลือกแล้ว {{ filter_brand.length }} แบรนด์ </span>
									<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'brand' }" style="height:.5rem">
								</div>
								<div @click="selectToggle('price')">
									<img src="/wp-content/uploads/2022/10/Icon-in-input-3.png" class="inline-block" style="height:2rem;">
									<span v-if="filter_price.label == 'none'">ช่วงราคา</span>
									<span v-else>{{ filter_price.label }}</span>
									<img src="/wp-content/uploads/2022/10/Vector.png" class="quick-filter-arrow" :class="{ 'rotate180deg' : state == 'price' }" style="height:.5rem">
								</div>
							</div>
							<div class="clear-filter" @click="clearFilter()">ล้างทั้งหมด</div>
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
								<span class="cl-ci-blue-300" style="font-size: 26px;">ในกรุงเทพฯ</span>
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
								<span class="cl-ci-blue-300" style="font-size: 26px;">ต่างจังหวัด</span>
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
								<span class="cl-ci-blue-300" style="font-size: 26px;">คอนโดมิเนียม</span>
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

						<h2>โครงการทั้งหมด</h2>
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
									$pj_price = $price;
									if ($pj_price == '') {
										$pj_price = 0;
									}
									$pj_price = $pj_price*100;
									$logo = get_field('logo')['sizes']['large'];

									$brand_arr = array_filter(wp_get_object_terms( $post->ID, 'project-type'), function ($var) {
										return ($var->term_id == 43);
									});
									// pre($cate_brand);
									?>

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
											<img src="<?php echo get_the_post_thumbnail_url($post->ID, '2048x2048') ?>">
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

					<div class="compare-bar">
						<div style="display: flex;">
							<div>
								โครงการที่เลือกไว้
								<br/>
								{{ selectEstate.length }}/3
							</div>
							<!-- <div>
								{{ selectEstate }}
							</div> -->
						</div>
						<div>
							<button v-if="selectEstate.length <= 0" class="compare-btn">เปรียบเทียบ</button>
								<a v-else class="compare-btn-active" @click="compareLocal()" :href="'/compare/?project='+compareURL">เปรียบเทียบ</a>
							</div>
						</div>
					</div>
					<!-- </div> -->
				</section>
				<!-- </div> -->
			</div>

			<div class="sticky-estate" id="v-sticky-estate">
				<section class="sticky-top sticky">
					<div class="-title">
						เปรียบเทียบโครงการ
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

			<!-- Page -->
			<section class="comp-header">
				<div class="-title">
					<h1>เปรียบเทียบโครงการ</h1>

					<small>เลือกโครงการที่ต้องการ เปรียบเทียบโดยคุณสามารถเปรียบเทียบ<br/>ได้มากที่สุด 3 โครงการ</small>
				</div>
				<div class="-detail">
					<div class="-col -estate" data-pj-col="0" data-col-show="0">
						<div class="select-estate" onclick="handleFilterModal('flex')">
							<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="16" cy="16" r="10.25" stroke="#123F6D" stroke-width="1.5"/>
								<path d="M11 16H21" stroke="#123F6D" stroke-width="1.5"/>
								<path d="M16 21L16 11" stroke="#123F6D" stroke-width="1.5"/>
							</svg>
							เพิ่มโครงการ
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
							เพิ่มโครงการ
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
							เพิ่มโครงการ
						</div>
						<div class="show-estate">

						</div>
					</div>
				</div>
			</section>

			<section class="comp-body -price">
				<div class="-title">
					<h3 class="comp-title">ราคา</h3>
				</div>
				<div class="-detail">
					<div class="-item" data-pj-col="0" data-col-show="-1">เริ่มต้น <span class="-value mx-2"></span> ล้านบาท</div>
					<div class="-item" data-pj-col="1" data-col-show="-1">เริ่มต้น <span class="-value mx-2"></span> ล้านบาท</div>
					<div class="-item" data-pj-col="2" data-col-show="-1">เริ่มต้น <span class="-value mx-2"></span> ล้านบาท</div>
				</div>
			</section>

			<section class="comp-body -type">
				<div class="-title">
					<h3 class="comp-title">ประเภทโครงการ</h3>
				</div>
				<div class="-detail">
					<div class="-item" data-pj-col="0" data-col-show="-1" data-val="">
						<span data-val="condominium">คอนโดมีเนียม</span>
						<span data-val="house">บ้านและทาวน์โฮม</span>
					</div>
					<div class="-item" data-pj-col="1" data-col-show="-1" data-val="">
						<span data-val="condominium">คอนโดมีเนียม</span>
						<span data-val="house">บ้านและทาวน์โฮม</span>
					</div>
					<div class="-item" data-pj-col="2" data-col-show="-1" data-val="">
						<span data-val="condominium">คอนโดมีเนียม</span>
						<span data-val="house">บ้านและทาวน์โฮม</span>
					</div>
				</div>
			</section>
			<!-- <hr> -->

			<section class="comp-body -location">
				<div class="-title">
					<h3 class="comp-title">ทำเลที่ตั้ง</h3>
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
					<h3 class="comp-title">ข้อมูลโครงการ</h3>
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
							<div class="-item" data-pj-col="0" data-col-show="-1">
								<div><?=$kv->name?></div>
								<div>
									<?php foreach(array_values($pj_data)[0]['compare']['information'] as $pj => $data){ 
										if($kv->term_id == $data['title']->term_id){
											?>
											<?=$data['text']?>

											<?php if($data['bullet']){ ?>
												<ul>
													<?php foreach($data['bullet'] as $bl){?>
														<li><?=$bl['text']?></li>
													<?php }?>
												</ul>
											<?php } ?>

											<?php array_push($pj_info_data, $kv->term_id);?>
											<?php if($data['text'] || $data['bullet']){ ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="0"]').dataset.colShow = 1;
												</script>
											<?php } else { ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="0"]').dataset.colShow = 0;
												</script>
											<?php } ?>

											<?php
										}	
									} ?>
								</div>
							</div>
							<div class="-item" data-pj-col="1" data-col-show="-1">
								<div><?=$kv->name?></div>
								<div>
									<?php foreach(array_values($pj_data)[1]['compare']['information'] as $pj => $data){ 
										if($kv->term_id == $data['title']->term_id){
											?>
											<?=$data['text']?>

											<?php if($data['bullet']){ ?>
												<ul>
													<?php foreach($data['bullet'] as $bl){?>
														<li><?=$bl['text']?></li>
													<?php }?>
												</ul>
											<?php } ?>

											<?php array_push($pj_info_data, $kv->term_id);?>
											<?php if($data['text'] || $data['bullet']){ ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="1"]').dataset.colShow = 1;
												</script>
											<?php } else { ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="1"]').dataset.colShow = 0;
												</script>
											<?php } ?>

											<?php
										}	
									} ?>
								</div>
							</div>
							<div class="-item" data-pj-col="2" data-col-show="-1">
								<div><?=$kv->name?></div>
								<div>
									<?php foreach(array_values($pj_data)[2]['compare']['information'] as $pj => $data){ 
										if($kv->term_id == $data['title']->term_id){
											?>
											<?=$data['text']?>

											<?php if($data['bullet']){ ?>
												<ul>
													<?php foreach($data['bullet'] as $bl){?>
														<li><?=$bl['text']?></li>
													<?php }?>
												</ul>
											<?php } ?>

											<?php array_push($pj_info_data, $kv->term_id);?>
											<?php if($data['text'] || $data['bullet']){ ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="2"]').dataset.colShow = 1;
												</script>
											<?php } else { ?>
												<script type="text/javascript">
													$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"] .-item[data-pj-col="2"]').dataset.colShow = 0;
												</script>
											<?php } ?>

											<?php
										}	
									} ?>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</section>


			<section class="comp-body comp-fac">
				<div class="-title">
					<h3 class="comp-title">สิ่งอำนวยความสะดวก</h3>
				</div>

				<div class="-detail">
					<?php foreach ($fclt_terms as $fk => $kv): ?>
						<div class="-item" data-fac-id="<?=$kv->term_id?>">
							<div class="-h"><?=$kv->name?></div>
							<div class="-t">
								<?php foreach ($pj_compare as $i => $pj_id): ?>
									<div class="-col-pj -pj-1" data-pj-id="<?=$pj_id?>" data-select="-1" data-col-show="-1">
										<a-check>
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<circle cx="12" cy="12" r="11" stroke="#1D9F9B" stroke-width="2"/>
												<path d="M8 12.6L10.2857 15L16 9" stroke="#1D9F9B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
											</svg>
										</a-check>
									</div>
								<?php endforeach ?>
								<?php for ($k = count($pj_compare) ; $k < 3; $k++){
									echo '<div class="-col-pj -pj-1" data-select="-1" data-col-show="-1"></div>'; 
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
				<img class="estate-thumbnail" src="<?=wp_get_attachment_image_url(get_post_thumbnail_id($data['post']->ID, "2048x2048"))?>" alt="<?=$data['post']->post_title?>">
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
				<img class="estate-thumbnail" src="<?=wp_get_attachment_image_url(get_post_thumbnail_id($data['post']->ID, "2048x2048"))?>" alt="<?=$data['post']->post_title?>">
				<div>
				<div>
				<h2><?=$data['post']->post_title?></h2>
				<div style="display: flex;justify-content: space-between;flex-direction: row;">
				<h6 class="-is-type" style="display: flex;gap: 5px;align-items: center;"><?php 
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




				let newurl = '/compare/?project='+vestate.compareURL;
				window.history.pushState({path:newurl},'',newurl);
			}
		</script>
		<script type="text/javascript">
			<?php
			foreach ($info_terms as $fk => $kv){
				if(array_search($kv->term_id, $pj_info_data)){
					?>
					$('.comp-body.-info .-detail div[data-term-id="<?=$kv->term_id?>"]').dataset.infoSum = 1
					<?php
				}
			}?>

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
			const { createApp, ref } = Vue

			const vestate = createApp({
				setup() {
					const compareURL = ref('<?=$top_param?>');
					const mbExpand = ref(false);

					const state = ref('');
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
					const price_list = ref([
						{ label: "1-2 ล้านบาท", min: 1000000, max: 2000000},
						{ label: "2-4 ล้านบาท", min: 2000001, max: 4000000},
						{ label: "4 ล้านบาทขึ้นไป", min: 4000001, max: 10000000000}
						])

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

					function selectToggle(val) {

						if(this.state == val){
							this.state = ''
						} else{
							this.state = val;
						}
					}

					function add_filter(type, data){
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
						if(selectEstate.value.includes(postId)){
							let index = selectEstate.value.indexOf(postId);
							selectEstate.value.splice(index, 1);
						} else {
							if(selectEstate.value.length >= 3){
								showNotice.value = true;
								setTimeout(() => {
									showNotice.value = false;
								}, 3000)
							} else{
								if(holdingPosition.value.length <= 0 || holdingPosition.value.length >= 3){
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
						compareLocal()
					}


					function clearFilter() {
						this.filter_type = [];
						this.filter_location = [];
						this.filter_brand = [];
						this.filter_price = { label: "none", min: 0, max: 0 };
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
						// localStorage.setItem('asw_cp', selectEstate.value);  
						let estateSlugs = []
						let estateIDs = []
						for(let eid of selectEstate.value){
							estateSlugs.push($(`.estate-card[estate-id="${eid}"]`).getAttribute('estate-slug'))
							estateIDs.push(eid)
						}
						estateSlugsJoin = estateSlugs.join()
						estateIDsJoin = estateIDs.join()
						localStorage.asw_cp_slug = estateSlugsJoin
						localStorage.asw_cp = estateIDsJoin
						this.compareURL = estateSlugsJoin
					}


					return {
						mbExpand,
						state,
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
						compareLocal,
						compareURL,
						showNotice
					}
				}
			}).mount('#app')
		</script>
		<?php get_footer() ?>