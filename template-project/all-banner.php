<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
// act_template_project_css($opt,$template_name,$layout);
?>
<section id="banner" class="section-fade-">
	<img loading="lazy" src="<?= $content['banner']['sizes']['1536x1536'] ?>" class="rocket-lazyload w-full hidden md:block" style="aspect-ratio: 1440/592;">
	<img loading="lazy" src="<?= $content['banner_mobile']['sizes']['1536x1536'] ?>" class="rocket-lazyload w-full md:hidden" style="aspect-ratio: 1/1;">
</section>