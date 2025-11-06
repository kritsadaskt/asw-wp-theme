<?php get_header() ?>

<!--=== The Section Boxes : banner ===-->
<?php
$v = get_fields(); 
?>
<style type="text/css">
	.form-spin{
		margin-right: 1rem;
	}
	#the_form[data-submit="0"] .form-spin{
		display: none;
	}
	#the_form[data-submit="1"] .-submit{
		opacity: .5;
		pointer-events: none;
	}
	
	h5 .-title {
		font-weight: 500;
		font-size: 30px;
		line-height: 32px;
		display: block;
		height: calc(32px * 1);
		overflow: hidden;

	}

	#txt_20 {
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
		display: block;
		height: calc(28px * 1);
		overflow: hidden;
	}

	#related-promo h5 a,
	#related-project h5 a {
		color: var(--ci-blue-300);
	}

	#related-promo h5:hover a,
	#related-project h5:hover a {
		color: var(--ci-blue-300) !important;
	}

	.project-card-logo {
		width: auto;
		height: 44px;
		margin-right: 10px;
	}

	.back-onlypro {
		width: 95vw;
		height: calc(100% - 1rem);
		z-index: 0;
		left: 6%;
		top: 0;
		background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0.509729) 64.11%, rgba(255, 255, 255, 0) 100%);
	}

	.leftline {
		left: 0;
		top: 30%;
		height: 50%;
		width: 8px;
	}

	.promo-leaf01 {
		position: absolute;
		right: 0;
		top: 0;
		width: 9vw;
	}

	.promo-leaf02 {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 7vw;
	}
	.promotion.entry-content{
		margin-top: 3rem;
	}
	.wpcf7 form .wpcf7-response-output {
		grid-column: 1 / span 2;
		margin: 0;
	}

	@media (max-width: 1023px) {
		.back-onlypro {
			height: calc(100% - 1rem);
		}
		.wpcf7 form .wpcf7-response-output {
			grid-column: 1 / span 1;
		}

		.leftline {
			top: 25%;
		}

		.sub-menu-text {
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			/*min-height: calc(32px * 3);*/
			/*transition: .5s;*/
			/*max-height: calc(32px * 3);*/
		}

		.sub-menu-text:hover {
			/*overflow: visible;*/
			display: block;
			/*display: -webkit-box;*/
			/*max-height: calc(32px * 5);*/
			/*transition: .5s;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 5;*/
			/*min-height: calc(32px * 5);		*/
		}
	}

	@media (max-width: 767px) {
		.sub-menu-text {
			display: block;
		}

		.back-onlypro {
			left: 1rem;
			height: calc(100% + 1rem);
		}

		.leftline {
			top: calc(100vw + 12.5%);
			height: 26%;
		}
	}

	.wpcf7-not-valid-tip::before {
		content: "";
		position: absolute;
		bottom: 6px;
		left: 0;
		background-image: url(/wp-content/uploads/2023/03/invalid.png);
		background-repeat: no-repeat;
		background-size: contain;
		width: 16px;
		height: 16px;
		padding: 0;
	}

	.wpcf7-not-valid-tip {
		color: #e24646;
		padding-left: calc(16px + 8px);
	}
	@media (max-width: 767px) {
		#the_form .wpcf7-form input {
			width: 100%;
			max-width: unset !important;
		}

	}
	html,body{
		overflow: visible;
	}
	.desk-img{
		position: sticky;
		top: 70px;
	}
	#the_form .-inner.img-register-no-img-regsiter {
		grid-template-columns: 1fr;
	}
	input#form_check_ok {
		top: 4px;
	}
</style>
<section id="banner" class="">
	<div class="bg-cover blank hidden  md:block" ratio="10:4" style="background-image:url(<?= $v['banner']['url'] ?>)">
	</div>
	<div class="bg-cover blank bg-center block  md:hidden " ratio="1:1" style="background-image:url(<?= $v['banner_mobile']['url'] ?>)"></div>
</section>

<div class="cont-pd py-6 flex flex-row items-center" style="white-space: nowrap;">
	<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?><?php pll_e('')?></a>
	<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
	<a href="/<?=pll_current_language()?>/promotion" class="cl-ci-blue-400"><?php pll_e('โปรโมชั่น')?></a>
	<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
	<a href="#!" class="truncate"><?php the_title() ?></a>
</div>
<section id="the_form" <?php if ($v['promotion_form']['is_show'] == 'hidden') : ?>class="hidden" <?php endif ?>>
	<?php
	$pro_form = get_field('promotion_form');
	$promotion_all = get_terms(array(
		'taxonomy' => 'promotion_project',
		'hide_empty' => false,
	));
	$promotion_pj = get_the_terms(get_the_ID(), 'promotion_project');
	$promotion_pj_count = 0;
	if (is_array($promotion_pj)) {
		$promotion_pj_count = sizeof($promotion_pj);
	}
	$promotion_pj_render = [];
	foreach ($promotion_all as $pja_i => $pja_v) {
		$parent = $pja_v->parent;
		$t_id = $pja_v->term_id;
		if ($parent == 0) {
			$pja_v->pj_child = [];
			$promotion_pj_render[$t_id] = $pja_v;
		}
	}
	foreach ($promotion_pj as $pja_i => $pja_v) {
		$parent = $pja_v->parent;
		$t_id = $pja_v->term_id;
		if ($parent != 0) {
			$promotion_pj_render[$parent]->pj_child[$t_id] = $pja_v;
		}
	}
	$has_img_register = 'no-img-regsiter';
	if (is_array($v['register_image']['sizes'])) {
		$has_img_register = '';
	}

	?>
	<div></div>
	<div class="-inner none img-register-<?=$has_img_register?>">
		<div class="-left">
			<div class="w-bg absolute bg-cover bg-no-repeat w-full h-full pointer-events-none" style="opacity: 0.1; top: 0; left: 0;background-image:url('/wp-content/uploads/2022/12/w-bg.png');"></div>
			<div class="-left-inner scroll-hid">
				<h1 class="-title"><?php pll_e('ลงทะเบียนรับสิทธิพิเศษ')?></h1>
				<div class="-from-container">
					<?= $pro_form['form'] ?>
					<h5 class="pt-10" id="checkbox_title"><?php pll_e('เลือกโครงการ')?></h5>
					<p class='text-white opacity-50' id="check_project_warn"><?php pll_e('กรุณาเลือกอย่างน้อย 1 โครงการ')?></p>
					<div class="-all-pj">
						<?php
						foreach ($promotion_pj_render as $pid => $pv) {
							$child = $pv->pj_child;
							$child_size = sizeof($child);
							?>
							<div class="-all-pj-parent mb-4" data-child="<?= $child_size ?>">
								<div class="mb-4 hightlight"><?= $pv->name ?></div>
								<?php foreach ($child as $cid => $cv) : ?>
									<?php
									$cf = get_fields('term_' . $cv->term_id);
									$cf_id = $cf['projects'][0]->ID;
									$url = get_the_permalink($cf_id);
									$pj_id = get_field('project_id',$cf_id);
									if ($pj_id == '') {
										$pj_id = 0;
									}
									?>
									<label class="cursor-pointer -label-pj">
										<input type="checkbox" class="inline-block w-auto" name="the_form_project" data-pj="<?= $cv->name ?>" data-pj-wp-id="<?=$cf_id?>" data-pj-id="<?=$pj_id?>" onchange="set_form_project()">
										<span class="ml-2">
											<?php if ($cf_id != '') : ?>
												<a href="<?= $url ?>" class="">
												<?php endif ?>
												<?= $cv->name ?>
												<?php if ($cf_id != '') : ?>
												</a>
											<?php endif ?>
											<?= $cf['description'] ?>
										</span>
									</label>
								<?php endforeach ?>
							</div>
							<?php
						}
						?>
					</div>
					<style>
						.-from-container .-checkbox {
							margin-top: 60px;
						}

						.-from-container .-checkbox label {
							display: grid;
							grid-template-columns: 24px auto;
							grid-gap: 8px;
						}

						.-from-container .-checkbox input {
							accent-color: var(--ci-veri-600);
							height: 24px;
							width: 24px;
							box-shadow: none !important;
						}

						.-form-container .-checkbox input[type='checkbox']:focus {
							box-shadow: none !important;
						}

						.-checkbox a {
							text-decoration: underline;
						}

						.text-center .-submit {
							padding-top: 24px;
						}
					</style>
					<div class="-checkbox">
						<label>
							<input type="checkbox" id="form_check_ok">
							<span> <?php pll_e('บริษัทฯ จะจัดเก็บข้อมูลของท่าน เพื่อเจ้าหน้าที่ของเราจะรับเรื่องและติดต่อกลับ เพื่อให้ข้อมูลเพิ่มเติม โดยเร็วที่สุดคลิกที่นี่เพื่อดู')?>
							<a href="/<?=pll_current_language()?>/privacy-policy" target="_blank"><?php pll_e('นโยบายความเป็นส่วนตัว')?></a>
						</span>
					</label>
					<p class='text-white opacity-50 mb-4' id="form_check_ok_alert" style="display:none;"><?php pll_e('กรุณาเลือก')?></p>
				</div>
				<div class="text-center">
					<div class="-submit" onclick="send_form_promotion()"><i class="fas fa-circle-notch fa-spin form-spin"></i> <?php pll_e('ลงทะเบียน')?></div>
				</div>
			</div>
		</div>
	</div>
	<div class="-right" style="--img: url(<?= acf_img($v['register_image'], 'large') ?>)">
		<img src="<?= acf_img($v['register_image'], 'large') ?>" class="w-full desk-img">
	</div>
</div>
<script type="text/javascript">
	let count = 0
	$$('.-all-pj-parent').forEach(el => {
		count += parseInt(el.dataset.child)
	})
	$('.-all-pj').dataset.count = count
	if ($('.-all-pj').dataset.count <= 1) {
		checkbox_title.style.display = "none"
		$('.-all-pj').style.display = "none"
		$('#check_project_warn').style.display = 'none'
		if($('.-all-pj').dataset.count == 1){
			$('[name="the_form_project"]').checked = 1
		}

	}

	function set_form_project() {
		if(count == 1){
			$('[name="the_form_project"]').checked = 1
		}
		let items = $$('[name="the_form_project"]')
		let pj_name = [];
		let pj_id = [];
		let pj_wp_id = [];
		for (let i of items) {
			if (i.checked) {
				pj_name.push(i.dataset.pj)
				pj_id.push(i.dataset.pjId)
				pj_wp_id.push(i.dataset.pjWpId)
			}
		}
		form_meta_track_promotion['project_title'] = []
		form_meta_track_promotion['project_id'] =  []
		form_meta_track_promotion['project_wp_id'] =  []
		for(let pjn in pj_name){
			form_meta_track_promotion['project_title'].push(pj_name[pjn].replace(/"/g, '\\"'))
			form_meta_track_promotion['project_id'].push(pj_id[pjn])
			form_meta_track_promotion['project_wp_id'].push(pj_wp_id[pjn])
		}

		pj_name = pj_name.join()
		pj_id = pj_id.join()
		pj_wp_id = pj_wp_id.join()
		$('#asw-promotion-project').value = pj_name
		$('#asw-promotion-project-id').value = pj_id
		$('#asw-promotion-project-wp-id').value = pj_wp_id
		if (count>1) {
			if (pj_name == '') {
				$('#check_project_warn').style.display = 'block'
			} else {
				$('#check_project_warn').style.display = 'none'
			}
		}

		let form_meta_track = $$('[name="form_meta_track"]');
		for(let fmt of form_meta_track){
			let v = fmt.value
			if (v!='') {
				v = JSON.parse(v)
				v['project_title'] = form_meta_track_promotion['project_title']
				v['project_id'] = form_meta_track_promotion['project_id']
				v['project_wp_id'] = form_meta_track_promotion['project_wp_id']
				console.log(v)
				v = JSON.stringify(v)
			}
			fmt.value = v
		}

	}

	function check_promotion() {
		$('#asw-promotion-check input').click()
	}

	function send_form_promotion() {
		set_form_project()
		let ok = $('#form_check_ok').checked;
		if (ok) {
			console.log('ready')
			$('#form_check_ok_alert').style.display = "none";
			let items = $$('[name="the_form_project"]')
			let is_have_checked = 0
			items.forEach(inp => {
				if (inp.checked) {
					is_have_checked = 1
				}
			})
			if (count == 0) {
				is_have_checked = 1;
			}
			if (is_have_checked) {
				$('#asw_promotion-submit').click()

				$$(".-from-container input[type='checkbox']").forEach((ele, key) => {
					ele.checked = false
				})
			} else {
				checkbox_title.innerHTML += ""
			}
		} else {
			$('#form_check_ok_alert').style.display = "block";
		}
	}
</script>
</section>


<script type="text/javascript">
	function submit() {
		let pass = 0;

		const check = document.getElementById("submit-check").checked;
		const err = document.querySelectorAll(".err");
		const value_input = document.querySelectorAll("#input");

		value_input.forEach((ele, index) => {
			// xconsolex.log(ele.value);
			if (ele.value.length == 0) {
				value_input[index].style.borderColor = "red";
				value_input[index].style.borderWidth = "1.5px";
				err[index].style.color = "red";
			} else {
				value_input[index].style.border = "1px solid #e2e8f0";
				value_input[index].style.borderWidth = "1px";
				err[index].style.color = "white";
				pass = 1;
			}
		});
		if (pass) {
			if (check) {
				xconsolex.log('checked')
				// document.querySelector(".modal-submit").style.display = 'block';
			} else {
				// document.querySelector(".modal-submit-err").style.display = 'block';
			}
		}

	}
</script>
<style type="text/css">
	.entry-content p {
		color: var(--ci-grey-200);
		font-size: 26px !important;
		line-height: 32px !important;
		font-weight: 300 !important;
	}

	.entry-content em {
		color: var(--ci-blue-400);
	}

	@media (max-width: 767px) {
		.entry-content em {
			color: var(--ci-grey-200);
			font-style: normal;
			font-weight: 400;
		}
	}

	@media (max-width: 1023px) {
		#detail .s-container {
			padding-left: 0;
			padding-right: 0;
		}
	}
</style>
<!--=== The Section Boxes : detail ===-->
<?php 
if (get_field('hide_detail') != 'hide') {
	?>
	<section id="detail" class="main-body" style="background-image: linear-gradient(white, #EDF2F6);">
		<div class="s-container lg:grid grid-cols-12 gap-3">
			<div class="col-span-3"></div>
			<div class="content-area col-span-6">
				<!-- <sp class="hidden md:block m"></sp> -->
				<!-- <sp class="block rem-3"></sp> -->
				<!-- <h3 class="text-left md:text-center px-4 md:px-0"><?php the_title() ?></h3> -->
				<div class="entry-meta">
					<!-- <span class="flex flex-row justify-center">
						<p class="cl-ci-grey-400">ระยะเวลาโปรโมช่ัน</p>&ensp;<p class="cl-ci-orange-500"><?= $v['period'] ?></p>
					</span> -->
					<!-- <div class="hidden md:block">
						<sp class="xs"></sp>
						<sp class="rem-1"></sp>
					</div>
					<div class="block md:hidden">
						<sp class="vs"></sp>
						<sp class="rm"></sp>
					</div> -->
					<div class="cl-ci-grey-200 items-center">
						<?php if ($v['promotion_image']['url'] != ''): ?>
							<img src="<?= $v['promotion_image']['url'] ?>" style="margin-top: 3rem;">
						<?php endif ?>
						<div class="promotion entry-content cl-ci-grey-200 md:grid grid-cols-8" style="color: var(--ci-grey-200) !important">
							<div class="col-span-1 block lg:hidden"></div>
							<div class="col-span-6 lg:col-span-8 px-4 md:px-0"><?= $v['detail'] ?></div>
						</div>
						<sp class=""></sp>
					</div>
				</div>
			</div>
		</div>
		<sp class="vl"></sp>
	</section>
	<?php
}
?>

<?php
$p = get_field('participating-projects');

if ($p) {
	?>
	<style>
		#related-project {
			padding-top: 95px;
			padding-bottom: 106px;
		}

		@media (max-width: 767px) {
			#related-project {
				padding-top: 41px;
				padding-bottom: 48px;
			}
		}
	</style>
	<!--=== The Section Boxes : related-project ===-->
	<section id="related-project" style="background-image: linear-gradient(white, #EDF2F6);">
		<?php
		if ($v['participating-projects']) {
			?>
			<div class="s-container">
				<div>
					<img class="promo-leaf01" src="/wp-content/uploads/2022/11/shutterstock_1574382076-1.png">
				</div>
				<h1>โครงการที่เข้าร่วม</h1>
				<sp style="height: 52px;"></sp>
				<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
					<?php
					foreach ($v['participating-projects'] as $key => $value) {

						$info = get_fields($value['project'][0]->ID);
						$stat_name = wp_get_object_terms($value['project'][0]->ID, 'project_status');
						$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
						$img = get_the_post_thumbnail_url($value['project'][0]->ID, 'full');
						if ($value['image']) {
							$img = $value['image']['url'];
						}
						?>
						<div class="hidden">
							<?php pre($value['project'][0]); ?>
							<?php pre($value['project'][0]->ID); ?>
							<?php pre(get_permalink($value['project'][0]->ID)); ?>

						</div>
						<div class="col-span-1 pointer" onclick="location.href='<?= get_permalink($value['project'][0]->ID) ?>'" style="box-shadow:0px 4px 12px rgba(0, 0, 0, 0.15);">
							<div class="grid- grid-rows-4">
								<div class="row-span-1">
									<div class="grid grid-rows-1 md:grid-cols-3 py-5 col-start-2 col-span-1" style="padding-right: 12px;background-color: white;">
										<div class="row-span-1 md:col-span-2 pl-4 flex items-center" style="border-left: 4px solid <?= $info['color_status'] ?>;color: <?= $stat_color ?>;">
											<span class="tag"><?= $stat_name[0]->name ?></span>
										</div>
										<div class="row-span-1 col-start-2 md:col-span-1">
											<img class="project-card-logo" src="<?= $info['logo']['url'] ?>">
										</div>
									</div>
								</div>
								<div class="row-start-2 row-span-3 bg-cover blank" ratio="1:1" style="background-image:url('<?= $img ?>');height: 100%;">
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			<?php } else if ($v['template_project_select'] == 'only') {
				$info = get_fields($v['participating_projects'][0]->ID);
				$stat_name = wp_get_object_terms($v['participating_projects'][0]->ID, 'project_status');
				$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
				$pos = get_postdata($v['project'][0]->ID);
				?>
				<div>
					<img class="promo-leaf01" src="/wp-content/uploads/2022/11/shutterstock_1574382076-1.png">
					<img class="promo-leaf02" src="/wp-content/uploads/2022/11/Group-793.png">
				</div>
				<div class="s-container relative">
					<div class="grid grid-cols-1 md:grid-cols-12 gap-4">
						<div class="col-span-1 hidden md:block"></div>
						<div class="col-span-1 md:col-span-5 px-4 md:px-0" style="z-index: 1; box-shadow:0px 4px 12px rgba(0, 0, 0, 0.15);">
							<div class="grid- grid-rows-5">
								<div class="row-span-1">
									<div class="grid grid-rows-1 md:grid-cols-3 py-4 col-start-2 col-span-1" style="padding-right: 12px;background-color: white;">
										<div class="row-span-1 md:col-span-2 pl-4 flex items-center" style="border-left: 4px solid <?= $info['color_status'] ?>;color: <?= $stat_color ?>;">
											<span class="tag"><?= $stat_name[0]->name ?></span>
										</div>
										<div class="row-span-1 col-start-3 md:col-span-1">
											<img class="project-card-logo" src="<?= $info['logo']['url'] ?>">
										</div>
									</div>
								</div>
								<div class="row-start-2 row-span-4 bg-cover blank" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'full') ?>');height: 100%;">
								</div>
							</div>
						</div>
						<div class="col-span-1 hidden xl:block"></div>
						<div class="col-span-1 md:col-span-6 xl:col-span-5 px-4 pl-6 xl:pt-10" style="z-index: 1;">
							<h1><?= $info['logo']['title'] ?></h1>
							<sp class="h-5"></sp>
							<div class="cl-ci-grey-200 sub-menu sub-menu-text"><?= $v['project_description'] ?></div>
							<sp class="h-8 xl:h-12"></sp>
							<h5 class="inline"><?php pll_e('ราคาเริ่มต้น')?> </h5>
							<h3 class="inline"><?= $info['price'] ?></h3>
							<h5 class="inline"><?php pll_e('ล้านบาท')?></h5>
							<sp class="h-6"></sp>
							<sp class="bg-orange" style="width: 12%; height: 4px;"></sp>
							<sp class="h-12"></sp>
							<h5 class="">
								<a href="<?= $v['project'][0]->guid ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?>
								<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="m-0 pl-2 inline-block" style="width: auto; height: 35px;">
							</a>
						</h5>

					</div>
					<div class="absolute back-onlypro">
						<div class="absolute bg-ci-veri-400 leftline" style=""></div>
					</div>

				</div>
			<?php }
			?>
		</div>
	</section>
<?php } ?>
<!--=== The Section Boxes : related promo ===-->
<style type="text/css">
	@media (min-width: 768px) {
		.s-container {
			padding-left: 64px;
			padding-right: 64px;
		}
	}

	#form input[type="text"],
	#form input[type="tel"],
	#form input[type="email"] {
		width: 100%;
		height: 48px;
		padding: 0.5rem;
		color: black;
	}

	#form select {
		display: block;
		background-color: white;
		border-radius: 4px;
		border: 1px solid #e2e8f0;
		max-width: 100%;
		width: 100%;
		height: 48px;
	}

	#form input[type="checkbox"] {
		width: auto;
	}

	.check-wrap {
		display: block;
		position: relative;
		padding-left: 35px;
		cursor: pointer;
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
		color: var(--ci-grey-300);
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		margin-bottom: 4px;
	}

	.check-wrap input {
		position: absolute;
		opacity: 0;
		cursor: pointer;
		height: 0;
		width: 0;
	}

	.checkmark {
		transition: .5s;
		position: absolute;
		top: 3px;
		left: 0;
		height: 16px;
		width: 16px;
		border-radius: 4px;
		border: 1px solid var(--ci-blue-600);
		background-color: white;
		margin-left: 7px;
		margin-top: 2px;
	}

	.check-wrap input:checked~.checkmark {
		background-color: var(--ci-veri-400);
	}

	.checkmark:after {
		content: "";
		position: absolute;
		display: none;
	}

	.check-wrap input:checked~.checkmark:after {
		display: block;
	}

	.check-wrap .checkmark:after {
		left: 4.5px;
		top: 2px;
		width: 5px;
		height: 8px;
		border: solid white;
		border-width: 0 2px 2px 0;
		-webkit-transform: rotate(45deg);
		-ms-transform: rotate(45deg);
		transform: rotate(45deg);
	}

	.modal-submit,
	.modal-submit-err {
		display: none;
		position: fixed;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		overflow: auto;
		background-color: rgba(0, 0, 0, 0.85);
		z-index: 10000;
	}

	.modal-content {
		position: relative;
		background-color: rgba(255, 255, 255, 0);
		margin: auto;
		padding: 0;
		top: 45%;
		width: 80%;
		max-width: 1200px;
		z-index: 100000;
	}

	.s-container {
		max-width: 1440px;
	}

	#form .s-container {
		max-width: 1440px;
		padding-left: 64px;
		/*padding-right: 0px;*/
	}

	@media (max-width: 1440px) {
		/*#form .s-container{
			padding-right: 0px !important;
			}*/
		}

		@media (max-width: 1024px) {
			#form .s-container {
				padding-left: 64px;
				padding-right: 64px;
			}

			.w-bg {
				background-size: cover !important;
				background-position: center !important;
			}
		}

		@media (max-width: 767px) {
			#form .s-container {
				padding-right: 16px !important;
				padding-left: 16px !important;
			}
		}
	</style>


	<style type="text/css">
		#the_form {}

		#the_form .-inner {
			display: grid;
			grid-template-columns: 7fr 5fr;
		}

		#the_form .-left {
			color: #FFFFFF;
/*			display: flex;*/
justify-content: center;
align-items: center;
background-color: var(--ci-blue-300);
position: relative;
}

#the_form .-left::before {
	content: ' ';
	position: absolute;
	width: 100%;
	height: 64px;
	background: linear-gradient(180deg, #123F6D, #123F6D00);
	top: 0;
	left: 0;
	z-index: 9;
}

#the_form .-left::after {
	content: ' ';
	position: absolute;
	width: 100%;
	height: 64px;
	background: linear-gradient(0deg, #123F6D, #123F6D00);
	bottom: 0;
	left: 0;
	pointer-events: none;
	z-index: 9;
}

#the_form .-right {
	/* background-color: yellow; */
/*			background-image: var(--img);*/
background-size: cover;
background-position: center;
/*			width: 100%;*/
/*			padding-top: 129.05%;*/
}

#the_form .-right .-pic {
		/* background-image: var(--img);
		background-size: cover;
		background-position: center;
		width: 100%;
		padding-top: 129.05%; */
	}

	#the_form .-left .-title {
		color: white;
		text-align: center;
		padding: 0 1rem;
		width: 100%;
	}

	#the_form .-from-container {
		padding-top: 32px;
		max-width: 528px;
		width: 100%;
		margin: auto;
	}

	#the_form .-from-container input[type="checkbox"] {
		height: 20px;
		width: 20px;
		position: relative;
/*		top: 6px;*/
}
#the_form .-all-pj input[type="checkbox"] {
	top: 6px;
}

#the_form .-from-container input[type="checkbox"]:checked {
	background-color: gray;
	background-color: var(--ci-veri-600);
}

#the_form .-left-inner {
	padding: 64px 0;
	width: 100%;
/*		max-height: 774px;*/
/*		overflow: auto;*/
}

input#asw-promotion-api {
	display: none;
}

#the_form .-submit {
	cursor: pointer;
	background-color: white;
	border-radius: 8px;
	color: var(--ci-grey-200);
	padding: 11px 0;
	max-width: 150px;
	margin: auto;
	margin-top: 36px;
	display: flex;
	align-items: center;
	justify-content: center;
}


#the_form .-all-pj-parent[data-child="0"] {
	display: none;
}

#the_form .-all-pj {
	padding-top: 1rem;
}


#the_form .wpcf7-form {
	display: grid;
	grid-template-columns: 50% 50%;
	column-gap: 32px;
	row-gap: 20px;

}

#the_form aside.span-full {
	grid-column: 1 / span 2;
}

#the_form aside>p>label {
	width: 100%;
}

#the_form .wpcf7-form span {
	font-size: 22px;
	line-height: 28px;
	font-weight: 400;
}

#the_form .wpcf7-form input,
#the_form .wpcf7-form textarea {
	padding: 9px 16px;
}
#the_form .wpcf7-form select,
#the_form .wpcf7-form input,
#the_form .wpcf7-form textarea {
	color: var(--ci-grey-200);
	font-size: 22px;
	height: 44px;
}

#the_form .wpcf7-list-item {
	margin: 0;
}

#the_form .wpcf7-list-item label {
	display: flex;
	align-items: flex-start;
	gap: 8px;
	align-items: center;
}

#the_form .wpcf7-list-item label input[type="checkbox"] {
/*	margin-top: 8px;*/
padding: 0 !important;
}

	/* #the_form .wpcf7-not-valid-tip {
		position: absolute;
		bottom: -1.25em;
	} */

	#the_form .wpcf7-form-control-wrap {
		display: block;
	}
	#the_form .wpcf7-form-control.wpcf7-checkbox {
		display: flex;
		align-items: center;
		gap: 0em 1rem;
		flex-flow: row wrap;
	}
	#the_form .-all-pj-parent .-label-pj a {
		color: var(--ci-veri-600);
		text-decoration: underline;
		padding-right: 4px;
	}

	#the_form .-all-pj-parent .-label-pj {
		padding-left: 12px;
	}

	#the_form input[type="checkbox"]:checked {
		accent-color: var(--ci-veri-600);
	}


	/*#the_form .wpcf7-form.invalid .wpcf7-response-output {
		display: none;
	}

	#the_form .wpcf7-form.sent .wpcf7-response-output {
		margin: 0;
		position: fixed;
		left: calc(50% - 640px / 2);
		top: calc(50% - 274px / 2);
		width: 100%;
		height: 224px;
		padding-top: 130px;
		max-width: 640px;
		background: white;
		border-radius: 8px;
		border-color: transparent;
		z-index: 10;
		color: var(--ci-grey-400);
		text-align: center;
		font-size: 26px;
		line-height: 32px;
		font-weight: 300;
		pointer-events: none;
	}

	@media (max-width: 676px) {
		#the_form .wpcf7-form.sent .wpcf7-response-output {
			width: calc(100% - 32px);
			margin: 16px;
			left: 0;
		}
	}

	#the_form .wpcf7-form.sent .wpcf7-response-output::before {
		content: "";
		position: absolute;
		bottom: calc(100% - 50px);
		left: calc(50% - 100px / 2);
		background-image: url(/wp-content/uploads/2023/04/Group-996.png);
		background-repeat: no-repeat;
		background-size: contain;
		width: 100px;
		height: 100px;
		padding: 0;
	}

	#the_form .wpcf7-form.sent .wpcf7-response-output::after {
		content: "ส่งข้อความเรียบร้อย";
		color: var(--ci-grey-200);
		font-size: 48px;
		line-height: 48px;
		font-weight: 400;
		position: absolute;
		top: 70px;
		left: 0;
		width: 100%;
	}

	#the_form .wpcf7-form.sent .wpcf7-response-output {
		animation-duration: 1.5s;
		animation-delay: 2s;
		animation-fill-mode: forwards;
		animation-name: fade;
		animation-iteration-count: 1;
	}
*/

	/*@keyframes fade {
		to {
			opacity: 0;
		}
	}*/

	#the_form .-all-pj-parent .-label-pj {
		padding-left: 12px;
		display: grid;
		grid-template-columns: 24px auto;
		align-items: center;
		align-items: start;
	}

	@media (max-width: 1023px) {
		#the_form .-inner {
			display: block;
		}

		#the_form .-inner .-right {
			display: none;
		}

		#the_form .-left-inner {
			max-height: 100%;
		}
	}


	@media (max-width: 767px) {
		#the_form .-inner .-title {
			text-align: left !important;
			padding: 0 16px;
		}

		#the_form .-from-container {
			padding: 0 16px;
			padding-top: 18px;
			margin-left: var(--cont-mg);
			margin-right: var(--cont-mg);
			max-width: var(--cont-w);
		}

		#the_form .wpcf7-form {
			grid-template-columns: 1fr;
		}
		#the_form aside.span-full{
			grid-column: 1 / span 1;
		}
	}
	#the_form .wpcf7 form.sent .wpcf7-response-output {
		display: none;
	}
	.wpcf7 form.failed .wpcf7-response-output {
		grid-column: 1 / span 2;
	}
</style>


<!--=== The Section Boxes : related promo ===-->
<?php if ($v['related_promotion']) { ?>
	<style type="text/css">
		.promotion-card {
			box-shadow:0px 4px 12px rgba(0, 0, 0, 0.15);
			position: relative;
		}

		.promotion-card .promotion-card-line {
			width: 0%;
			position: absolute;
			bottom: 0rem;
			left: 0;
			transition: .9s all;
			opacity: 0.15;
			background: white;
		}

		.promotion-card:hover .promotion-card-line {
			width: 100%;
			transition: .8s all;
			opacity: 1;
			background: var(--ci-veri-300);
		}

		.promo-ani {
			transform: scale(1);
			transition: .8s all;
		}

		.promotion-card:hover .promo-ani {
			transform: scale(1.08);
			transition: .8s all;
		}

		#related-promo {
			padding: 94px 0px;
		}

		@media (max-width: 767px) {
			#related-promo {
				padding: 41px 0px;
			}
		}
	</style>
	<section id="related-promo">
		<div class="s-container">
			<div class="grid grid-cols-5">
				<div class="col-span-3">
					<h1><?php pll_e('โปรโมชั่นอื่น ๆ จากแอสเซทไวส์')?></h1>
				</div>
				<h5 class="col-span-2 text-right pt-3">
					<a href="/<?=pll_current_language()?>/promotion" class=""><?php pll_e('ดูทั้งหมด')?>
					<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="m-0 pl-2 inline-block" style="width: auto; height: 35px;"></a>
				</h5>
			</div>
			<sp style="height: 48px;"></sp>
			<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
				<?php
				foreach ($v['related_promotion'] as $key => $value) {
					$v = get_fields($value->ID);
					?>
					<div class="col-span-1 cursor-pointer bg-white promotion-card" onclick="location.href='<?= $value->guid ?>'">
						<div class="grid grid-rows-12">
							<div class="row-span-6 overflow-hidden">
								<div class="bg-cover blank promo-ani" ratio="1:1" style="background-image:url('<?= $v['banner_mobile']['url'] ?>')"></div>
							</div>
							<div class="row-span-6 p-4">
								<sp class=""></sp>
								<h5 class="cl-ci-grey-200 -title"><?= $value->post_title ?></h5>
								<sp class="h-2"></sp>
								<span id="txt_20" class="cl-ci-grey-300">
									<?= $v['card_caption'] ?>
								</span>
								<sp class="h-6"></sp>
								<a href="<?= $value->guid ?>" class="cl-ci-veri-300"><?php pll_e('อ่านเพิ่มเติม')?></a>
							</div>
						</div>
						<sp class="promotion-card-line h-1"></sp>
					</div>
				<?php }
				?>
			</div>
		</div>
	</section>

<?php } ?>


<?php get_footer() ?>
<style type="text/css">
	form.wpcf7-form footer{
/*			display: block;*/
}
</style>

<script type="text/javascript">
	function txt_shorter(text, chars_limit) {
		if (text.length > chars_limit) {
			new_text = text.substring(0, chars_limit);
			new_text = new_text.trim();
			return new_text.concat("...")
		} else {
			return text
		}
	}
	var ttt = document.querySelectorAll("#txt_20");
	for (let i = 0; i < ttt.length; i++) {
		ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 40);

	}
	set_form_project()

	// window.onscroll = function() {scrollFunction()};
	// function scrollFunction(){
	// 	const anip = document.getElementsByClassName("ani-pro");
	// 	if(window.innerWidth > 769 && document.documentElement.scrollTop > 1750){
	// 		for (var i = 0; i< anip.length; i++) {
	// 			anip[i].style.right = "0"; 
	// 		}
	// 	}
	// 	else if(window.innerWidth <= 769 && document.documentElement.scrollTop > 1750){
	// 		document.getElementById("web-design").style.left = "0";
	// 	}
	// 	xconsolex.log(document.documentElement.scrollTop)
	// 	xconsolex.log(window.innerWidth);
	// }
</script>

<script type="text/javascript">
	setInterval(()=>{
		if ($('.wpcf7-form').dataset.status == `submitting` || $('.wpcf7-form').dataset.status == `sent` || $('.wpcf7-form').dataset.status == `resetting`) {
			$('#the_form').dataset.submit = 1
		}else{
			$('#the_form').dataset.submit = 0
		}
	},20)
</script>