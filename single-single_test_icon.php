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
$f = get_field('location_row');
?>
<style type="text/css">
	.therow{
		background: -webkit-linear-gradient(#3F51B5, #F44336);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
	}
</style>
<div class="cont-pd my-4">
	<?php foreach ($f as $key => $v): 
		$icon_slug = $v['icon'][0]->post_name;
		$text = $v['text'];
		?>
		<h4 class="font-bold therow"><i class="asw-icon <?=$icon_slug?>"></i> <span><?=$text?></span></h4>
	<?php endforeach ?>
</div>
<?php get_footer(); ?>

