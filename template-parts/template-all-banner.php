<?php 
$content = $args[0];
$f = $args[1];
$template = $args[2];
?>
<section id="banner" class="section-fade">
	<img src="<?= $content['banner']['sizes']['1536x1536'] ?>" class="w-full hidden md:block" style="aspect-ratio: 1440/592;">
	<img src="<?= $content['banner_mobile']['sizes']['1536x1536'] ?>" class="w-full md:hidden" style="aspect-ratio: 1/1;">
</section>
<?php theme_overide_style($content) ?>