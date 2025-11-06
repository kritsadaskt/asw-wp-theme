<?php 
$content = $args[0];
$f = $args[1];
$template = $args[2];
$v2_content = get_fields();
foreach ($v2_content['content'] as $key => $value) {
	if ($value['acf_fc_layout']=='banner') {
		?>
		<section id="banner" class="section-fade">
			<img src="<?= $value['banner']['sizes']['1536x1536'] ?>" class="w-full hidden md:block" style="aspect-ratio: 1440/592;">
			<img src="<?= $value['banner_mobile']['sizes']['1536x1536'] ?>" class="w-full md:hidden" style="aspect-ratio: 1/1;">
		</section>
		<?php
	}
}
?>