<?php

/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header();
global $pagewidth;
$pagewidth = get_field('pagewidth');
if ($pagewidth === null) {
	$pagewidth = 's-container';
}
$pj = get_field('project')[0];
$pjf = get_fields($pj->ID);
$file = get_field('file');

$logo = $pjf['logo']['sizes']['medium'];
$price = $pjf['price'];
$url = get_permalink($pj->ID)."#video";
$line = $pjf['line_id'];

$status = get_the_terms($pj->ID,'project_status')[0]->name;
$location = get_the_terms($pj->ID,'project_location')[0]->name;

$f = get_fields();
$link_type = $f['type_360'];
$link_out = $f['link_out'];
if ($link_type == 'link-out') {
	header( "location: ".$link_out );
	exit(0);
}else{
	header( "location: ".$url );
	exit(0);
}
die();
// $zip_filepath = $file['url'];
// $zip_filepath = explode(site_url() . '/wp-content/uploads', $zip_filepath)[1];
// $zip_filepath_hash = md5($zip_filepath);
// $zif_file_source = __DIR__ . '/../../uploads' . $zip_filepath;
// $dir = __DIR__ . "/../../assetwise-360/" . $zip_filepath_hash . "/index.html";
// $is_done = file_exists($dir);
// $url_360 = "/wp-content/assetwise-360/" . $zip_filepath_hash . "/index.html";
// if (!$is_done) {
// 	$file = $zif_file_source;
// 	$path = __DIR__ . "/../../assetwise-360/" . $zip_filepath_hash;

// 	$zip = new ZipArchive;
// 	$res = $zip->open($file);
// 	if ($res === TRUE) {
// 		$zip->extractTo($path);
// 		$zip->close();
// 	} else {
// 	}
// }
?>
<?php
$singleclass = '';
if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
	$singleclass = 'single-area';
}
?>
<style type="text/css">
	footer#site-footer {
		display: none;
	}
	.t360-iframe{
		border:none;
		width: 100%;
		min-height: 600px;
		height: calc(100vh - 72px - 70px);
	}
	.t360-header{
		background-color: #fff;

		margin: 0 1rem;
		padding: 8px 0;
	}
	.pj-logo{
		height: 56px;
		width: auto;
	}
	.t360-header .-price{
		font-style: normal;
		font-weight: 500;
		font-size: 26px;
		line-height: 32px;
		color: #323A41;
	}
	.t360-single .-btn{
		border-radius: 8px;
		font-style: normal;
		font-weight: 400;
		font-size: 26px;
		line-height: 32px;
		text-align: center;
		background: #fff;
		border: 1px solid #B7CDE4;
		padding: 8px 34px;
		display: inline-block;
		color: #123F6D;
	}
	.t360-single .-btn:hover{
		background: #F3F9FF;
	}
	.t360-header .-hr{
		display: flex;
		gap: 8px;
		justify-content: end;
	}
	.t360-header .-hl {
		display: flex;
		gap: 30px;
		align-items: center;
	}
	.t360-single .-btn.-d{
		color: #FFFFFF;
		background: #123F6D;
	}
	.t360-single .-btn.-d:hover{
		opacity: .8;
	}
	.t360-header-inner{
		display: grid;
		grid-template-columns: 1fr 2fr;
		align-items: center;
	}
	.t360-header .-about{
		font-style: normal;
		font-weight: 400;
		font-size: 22px;
		line-height: 28px;
		color: #202831;
		display: flex;
		align-items: center;
	}
	.t360-header .-about .-status{
		color: #3A638E;
		font-weight: 700;
		font-size: 18px;
		line-height: 20px;
	}
	.t360-header .-about .-location img{
		width: 16px;
		margin-right: 4px;
		display: inline-block;
	}
	.t360-mob-footer{
		display: none;
	}
	@media (max-width: 1023px) {
		.t360-header .-hr{
			display: none;
		}
		.t360-header-inner{
			grid-template-columns:1fr;
		}
		.status-dot{
			display: none;
		}
		.t360-header .-about .-location{
			display: block;
			font-size: 22px;
			line-height: 1;
		}
		.t360-header .-about{
			display: block;
		}
		.t360-header .-price{
			font-size: 22px;
		}
		.t360-header .-about .-status{
			line-height: 1;
		}
		.t360-header .-about .-location img {
			width: 18px;
			top: -2px;
			position: relative;
		}
		.t360-iframe{
			height: calc(100vh - 72px - 70px - 96px);
		}
		.t360-mob-footer{
			height: 96px;
			display: flex;
			align-items: center;
			justify-content: space-around;
		}
		.t360-mob-footer .-btn:not(.-d){
			padding-left: 0;
			padding-right: 0;
			border: none;
			color: #123F6D;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	}
	i.-line{
		background-image: url(/wp-content/uploads/2023/05/Line.png);
		background-size: contain;
		background-repeat: no-repeat;
		width: 24px;
		height: 24px;
		display: inline-block;
		margin-right: .5rem;
	}
</style>
<div class="t360-single">
	<div class="t360-header">
		<div class="container mx-auto t360-header-inner">
			<div class="-hl">
				<div><img src="<?=$logo?>" class="pj-logo"></div>
				<div>
					<h5 class="-about">
						<span class="-status"><?=$status?></span>
						<span class="mx-2 status-dot">•</span>
						<span class="-location"><img src="/wp-content/uploads/2023/04/Icon.png"><?=$location?></span>
					</h5>
					<h5 class="-price"><?php pll_e('เริ่มต้น')?> <?=$price?> <?php pll_e('ล้านบาท')?></h5>
				</div>
			</div>
			<div class="-hr">
				<a  target="_blank" href="<?=$url?>" class="-btn btn-detail-top">
					<?php pll_e('ดูรายละเอียดโครงการ')?>
				</a>
				<a  target="_blank" href="<?=$line?>" class="-btn">
					<img src="/wp-content/uploads/2023/05/Line.png" style="width: 30px;display: inline;padding-right: 3px;">
					<?php pll_e('สอบถามเพิ่มเติม')?>
				</a>
				<a  target="_blank" href="#!" class="-btn -d">
					Booking
				</a>
			</div>
		</div>	
	</div>
	<div class="t360-wrap">
		<iframe src="<?=$url_360?>" class="t360-iframe"></iframe>
	</div>
	<div class="t360-mob-footer">
		<a  target="_blank" href="<?=$url?>" class="-btn btn-detail-top">
			<?php pll_e('ดูรายละเอียด')?>
		</a>
		<a  target="_blank" href="<?=$line?>" class="-btn">
			<i class="-line"></i>
			<?php pll_e('สอบถาม')?>
		</a>
		<a  target="_blank" href="#!" class="-btn -d">
			Booking
		</a>
	</div>
</div>
<?php get_footer(); ?>
