<?php 
$template_name = $args[0];
$v2_content = $args[1];
?>
<script type="text/javascript">

	window.addEventListener("load", (event) => {
		if (location.hash != '') {
			document.querySelector(location.hash).scrollIntoView({
				behavior: 'smooth'
			});
		}
	});

</script>
<header class="template-nav">
	<div class="container mx-auto">
		<div class="grid grid-cols-12 pj-nav-items-wrap">
			<div class="pj-nav-items col-span-8 xl:col-span-10">
				<img class="logo pj-nav-logo cursor-pointer" src="<?= acf_img(get_field('logo'), 'medium') ?>" alt="logo" onclick="$('.scroll-to-top').scrollIntoView()">
				<div class="nav-menu-item">
					<?php
					$it = 0;
					$plan_text = pll__('แบบแปลน');
					if (get_post_type() == 'house') {
						$plan_text = pll__('แบบบ้าน');
					}
					foreach ($v2_content as $key => $content) {
						switch ($content['acf_fc_layout']) {
							case 'project_idea':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('แนวคิด')?></h6>
								</div>
								<?php
								$it++;
							}
							break;

							case 'project_information':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('ข้อมูลโครงการ')?></h6>
								</div>
								<?php
								$it++;
							}
							break;
							case 'facility':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('สิ่งอำนวยความสะดวก')?></h6>
								</div>
								<?php
								$it++;
							}
							break;

							case 'gallery':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('แกลเลอรี')?></h6>
								</div>
								<?php
								$it++;
							}
							break;

							case 'video':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('วิดีโอ')?></h6>
								</div>
								<?php
								$it++;
							}
							break;

							case 'plan':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?=$plan_text?></h6>
								</div>
								<?php
								$it++;
							}
							break;

							case 'location':
							if ($content['is_show'] == 'show') {
								?>
								<div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
									<h6><?php pll_e('ทำเลที่ตั้ง')?></h6>
								</div>
								<?php
								$it++;
							}
							break;
						}
					}
					?>
				</div>
			</div>
			<div class="nav-menu-item-mob text-black" data-expand="-1" onclick="navMobClick(1)">
				<div class="nav-menu-items-mob truncate">
					<span></span>
				</div>
			</div>
			<div class="pj-nav-register col-span-4 xl:col-span-2 flex justify-end items-center">
				<a href="#!" onclick="scrollToEl('#register_form')">
					<div class="master-btn">
						<?php pll_e('ลงทะเบียน')?>
					</div>
				</a>
			</div>
		</div>
	</div>
</header>
<div class="theme-menu-items-float" data-expand="-1">
	<?php
	$it = 0;
	foreach ($v2_content as $key => $content) {
		switch ($content['acf_fc_layout']) {
			case 'project_idea':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('แนวคิด')?>
				</div>
				<?php
				$it++;
			}
			break;

			case 'project_information':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('ข้อมูลโครงการ')?>
				</div>
				<?php
				$it++;
			}
			break;
			case 'facility':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('สิ่งอำนวยความสะดวก')?>
				</div>
				<?php
				$it++;
			}
			break;

			case 'gallery':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('แกลเลอรี')?>
				</div>
				<?php
				$it++;
			}
			break;

			case 'video':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('วิดีโอ')?>
				</div>
				<?php
				$it++;
			}
			break;

			case 'plan':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('แบบแปลน')?>
				</div>
				<?php
				$it++;
			}
			break;

			case 'location':
			if ($content['is_show'] == 'show') {
				?>
				<div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
					<?php pll_e('ทำเลที่ตั้ง')?>
				</div>
				<?php
				$it++;
			}
			break;
		}
	}
	?>
</div>
<div class="header_blank"></div>
<div id="page_contact" data-expand="-1">
	<div id="page_contact_show" class="page_contact_btn is-expand">
		<?php if (get_field('facebook')!=''): ?>
			<a href="<?=get_field('facebook')?>" target="_blank" class=""><div class="contact_btn contact_fb"></div></a>
		<?php endif ?>
		<?php if (get_field('line_id')!=''): ?>
			<a href="<?=get_field('line_id')?>" target="_blank" class=""><div class="contact_btn contact_ln"></div></a>
		<?php endif ?>
		<?php if (get_field('telephone_number')!=''): ?>
			<a href="tel:<?=get_field('telephone_number')?>" class=""><div class="contact_btn contact_tel"></div></a>
		<?php endif ?>
		<div class="contact_btn contact_close" onclick="toggle_contact(-1)"></div>
	</div>
	<div id="page_contact_hide" class="page_contact_btn not-expand" onclick="toggle_contact(1)"></div>
</div>
<script type="text/javascript">
	function toggle_contact(v) {
		$('#page_contact').dataset.expand = v
	}
</script>