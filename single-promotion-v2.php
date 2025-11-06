<?php get_header() ?>

<!--=== The Section Boxes : banner ===-->
<?php $v = get_fields();?>
<style type="text/css">
	.-title{
		font-weight: 500;
		font-size: 30px;
		line-height: 32px;
		display: block;
		height: calc(32px * 1);
		overflow: hidden;

	}
	#txt_20{
		font-size: 22px;
		line-height: 28px;
		font-weight: 400;
		display: block;
		height: calc(28px * 1);
		overflow: hidden;
	}
	#related-promo h5 a, #related-project h5 a{
		color: var(--ci-blue-300);
	}

	#related-promo h5:hover a,#related-project h5:hover a{
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
	.promo-leaf01{
		position: absolute;
		right: 0;
		top: 0;
		width: 9vw;	
	}
	.promo-leaf02{
		position: absolute;
		bottom: 0;
		left: 0;
		width: 7vw;
	}
	@media (max-width: 1023px){
		.back-onlypro{
			height: calc(100% - 1rem);
		}
		.leftline{
			top: 25%;
		}
		.sub-menu-text{
			overflow: hidden;
			display: -webkit-box;
			-webkit-line-clamp: 3;
			-webkit-box-orient: vertical;
			/*min-height: calc(32px * 3);*/
			/*transition: .5s;*/
			/*max-height: calc(32px * 3);*/
		}
		.sub-menu-text:hover{
			/*overflow: visible;*/
			display: block;
			/*display: -webkit-box;*/
			/*max-height: calc(32px * 5);*/
			/*transition: .5s;
			-webkit-box-orient: vertical;
			-webkit-line-clamp: 5;*/
			/*min-height: calc(32px * 5);		*/
		}
		@media (max-width: 767px){
			.sub-menu-text{
				display: block;
			}
			.back-onlypro{
				left: 1rem;
				height: calc(100% + 1rem);
			}
			.leftline{
				top: calc(100vw + 12.5%);
				height: 26%;
			}
		}
	</style>
	<section id="banner" class="">
		<div class="bg-cover blank hidden md:hidden lg:block" ratio="10:4" style="background-image:url(<?=$v['banner']['url']?>)">
		</div>
		<div class="bg-cover blank bg-center block md:block lg:hidden " ratio="1:1" style="background-image:url(<?=$v['banner_mobile']['url']?>)"></div>
	</section>

	<div class="cont-pd py-6 flex flex-row items-center">
		<a href="/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/promotion" class="cl-ci-blue-400"><?php pll_e('โปรโมชั่น')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="#!" class=""><?php the_title() ?></a>
	</div>

	<style type="text/css">
		.entry-content p{
			color: var(--ci-grey-200);
			font-size: 26px !important;
			line-height: 32px !important;
			font-weight: 300 !important;
		}
		.entry-content em{
			color: var(--ci-blue-400);
		}
		@media (max-width: 767px){
			.entry-content em{
				color: var(--ci-grey-200);
				font-style: normal;
				font-weight: 400;
			}
		}
		@media (max-width: 1023px){
			#detail .s-container{
				padding-left: 0;
				padding-right: 0;
			}
		}
	</style>
	<!--=== The Section Boxes : detail ===-->
	<section id="detail" class="main-body" style="background-image: linear-gradient(white, #EDF2F6);">
		<div class="s-container lg:grid grid-cols-12 gap-3">
			<div class="col-span-3"></div>
			<div class="content-area col-span-6">
				<sp class="hidden md:block m"></sp>
				<sp class="block rem-3"></sp>
				<h3 class="text-left md:text-center px-4 md:px-0"><?php the_title() ?></h3>
				<div class="entry-meta">
					<span class="flex flex-row justify-center">
						<p class="cl-ci-grey-400"><?php pll_e('ระยะเวลาโปรโมช่ัน')?></p>&ensp;<p class="cl-ci-orange-500"><?=$v['period']?></p>
					</span>
					<div class="hidden md:block">
						<sp class="xs"></sp>
						<sp class="rem-1"></sp>
					</div>
					<div class="block md:hidden">
						<sp class="vs"></sp>
						<sp class="rm"></sp>
					</div>
					<div class="cl-ci-grey-200 items-center">
						<!-- <div class="bg-contain bg-no-repeat bg-center blank wide hidden md:block" ratio="facebook" style="background-image:url(<?=$v['promotion_image']['url']?>)"></div> -->
						<img src="<?=$v['promotion_image']['url']?>">

						<sp class="h-8 xl:h-12"></sp>
						<div class="entry-content cl-ci-grey-200 md:grid grid-cols-8" style="color: var(--ci-grey-200) !important">
							<div class="col-span-1 block lg:hidden"></div>
							<div class="col-span-6 lg:col-span-8 px-4 md:px-0"><?=$v['detail']?></div>
						</div>
						<sp class=""></sp>
					</div>	
				</div>
			</div>
		</div>
		<sp class="vl"></sp>
	</section>

	<?php 
	$p = get_field('participating-projects');
// pre($v);
// pre($v['participating-projects']);
	if($p){
		?>
		<!--=== The Section Boxes : related-project ===-->
		<section id="related-project" style="background-image: linear-gradient(white, #EDF2F6);padding-top: 95px;padding-bottom: 106px;">
			<?php
			if($v['participating-projects']){ 
				?>
				<div class="s-container">
					<div>
						<img class="promo-leaf01" src="/wp-content/uploads/2022/11/shutterstock_1574382076-1.png">
					</div>
					<h1>โครงการที่เข้าร่วม</h1>
					<sp style="height: 52px;" ></sp>
					<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
						<?php
					// pre($v['participating-projects']);
						foreach ($v['participating-projects'] as $key => $value) {

						// pre($value);
						// pre(count($v['participating_projects']));

							$info = get_fields( $value['project'][0]->ID );

					// pre($info);
					// pre($value);
							$stat_name = wp_get_object_terms( $value['project'][0]->ID, 'project_status');
							$stat_color = get_field('color','project_status' . '_' . $stat_name[0]->term_id);
							$img = get_the_post_thumbnail_url($value['project'][0]->ID, 'full');
							if($value['promotion_image']){
								$img = $value['promotion_image']['url'];
							}
					// pre($stat_name);
							?>
							<div class="col-span-1 pointer" onclick="location.href='<?= $value['project'][0]->guid ?>'" style="filter: drop-shadow(0px 4px 12px rgba(0, 0, 0, 0.15));">
								<div class="grid- grid-rows-4">
									<div class="row-span-1">
										<div class="grid grid-rows-1 md:grid-cols-3 py-5 col-start-2 col-span-1" style="padding-right: 12px;background-color: white;">
											<div class="row-span-1 md:col-span-2 pl-4 flex items-center" style="border-left: 4px solid <?=$info['color_status']?>;color: <?=$stat_color?>;">
												<span class="tag"><?=$stat_name[0]->name?></span>
											</div>
											<div class="row-span-1 col-start-2 md:col-span-1">
												<img class="project-card-logo" src="<?= $info['logo']['url'] ?>">
											</div>
										</div>
									</div>
									<div class="row-start-2 row-span-3 bg-cover blank" ratio="1:1" style="background-image:url('<?= $img?>');height: 100%;">
									</div>
								</div>
							</div>
							<?php 
						}
						?>
					</div>
				<?php }
				else if($v['template_project_select'] == 'only'){
			// pre($v['project'][0]->ID);
					$info = get_fields( $v['participating_projects'][0]->ID );
					$stat_name = wp_get_object_terms( $v['participating_projects'][0]->ID, 'project_status');
					$stat_color = get_field('color','project_status' . '_' . $stat_name[0]->term_id);
					$pos = get_postdata( $v['project'][0]->ID );
			// pre($v['project']); 
			// pre($v['project_description']);
					?>
					<div >
						<img class="promo-leaf01" src="/wp-content/uploads/2022/11/shutterstock_1574382076-1.png">
						<img class="promo-leaf02" src="/wp-content/uploads/2022/11/Group-793.png">
					</div>
					<div class="s-container relative">
						<div class="grid grid-cols-1 md:grid-cols-12 gap-4">
							<div class="col-span-1 hidden md:block"></div>
							<div class="col-span-1 md:col-span-5 px-4 md:px-0" style="z-index: 1; filter: drop-shadow(0px 4px 12px rgba(0, 0, 0, 0.15));">
								<div class="grid- grid-rows-5">
									<div class="row-span-1">
										<div class="grid grid-rows-1 md:grid-cols-3 py-4 col-start-2 col-span-1" style="padding-right: 12px;background-color: white;">
											<div class="row-span-1 md:col-span-2 pl-4 flex items-center" style="border-left: 4px solid <?=$info['color_status']?>;color: <?=$stat_color?>;">
												<span class="tag"><?=$stat_name[0]->name?></span>
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
		<?php }?>
		<!--=== The Section Boxes : related promo ===-->
		<style type="text/css">
			@media (min-width: 768px){
				.s-container {
					padding-left: 64px;
					padding-right: 64px;
				}
			}
			#form input[type="text"], #form input[type="tel"], #form input[type="email"]{
				width: 100%;
				height: 48px;
				padding: 0.5rem;
				color: black;
			}
			#form select{
				display: block;
				background-color: white;
				border-radius: 4px;
				border: 1px solid #e2e8f0;
				max-width: 100%;
				width: 100%;
				height: 48px;
			}
			#form input[type="checkbox"]{
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
				border:1px solid var(--ci-blue-600);
				background-color: white;
				margin-left: 7px;
				margin-top: 2px;
			}
			.check-wrap input:checked ~ .checkmark {
				background-color: var(--ci-veri-400);
			}
			.checkmark:after {
				content: "";
				position: absolute;
				display: none;
			}
			.check-wrap input:checked ~ .checkmark:after {
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
			.modal-submit, .modal-submit-err{
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
			.modal-content{
				position: relative;
				background-color: rgba(255, 255, 255, 0);
				margin: auto;
				padding: 0;
				top: 45%;
				width: 80%;
				max-width: 1200px;
				z-index: 100000;
			}
			.s-container{
				max-width: 1440px;
			}
			#form .s-container{
				max-width: 1440px;
				padding-left: 64px;
				/*padding-right: 0px;*/
			}

			@media (max-width: 1440px){
		/*#form .s-container{
			padding-right: 0px !important;
		}*/
	}
	@media (max-width: 1024px){
		#form .s-container{
			padding-left: 64px;
			padding-right: 64px;
		}
		.w-bg{
			background-size: cover !important;
			background-position: center !important;
		}
	}
	@media (max-width: 767px){
		#form .s-container{
			padding-right: 16px !important;
			padding-left: 16px !important;
		}
	}
</style>
<section id="form" class="bg-ci-blue-300 text-white">
	<div class="relative">
		<div class="grid grid-cols-12">
			<div class="col-span-12 md:col-span-12 lg:col-span-7 pt-20 pb-24 s-container">
				<!-- <img src="/wp-content/uploads/2022/12/w-bg.png" class="absolute" style="top: 0; left: 0;opacity: 0.1;"> -->
				<div class="w-bg absolute bg-contain bg-no-repeat w-full h-full pointer-events-none" style="opacity: 0.1; top: 0; left: 0;background-image:url('/wp-content/uploads/2022/12/w-bg.png');"></div>
				<h1 class=""><?php pll_e('ลงทะเบียนรับสิทธิพิเศษ')?></h1>
				<sp class="h-4 md:h-16"></sp>
				<div class="grid grid-cols-2 gap-4 px-0 xl:px-24">
					<div class="col-span-2 md:col-span-1">
						<label><?php pll_e('ชื่อ')?><span class="err">*</span></label>
						<input id="input" type="text" name="name" placeholder="ชื่อ">
					</div>
					<div class="col-span-2 md:col-span-1">
						<label><?php pll_e('นามสกุล')?><span class="err">*</span></label>
						<input id="input" type="text" name="surname" placeholder="นามสกุล">
					</div>
					<div class="col-span-2 md:col-span-1">
						<label><?php pll_e('เบอร์โทร')?><span class="err">*</span></label>
						<input id="input" type="tel" name="tel" placeholder="เบอร์โทร">
					</div>
					<div class="col-span-2 md:col-span-1">
						<label><?php pll_e('อีเมล')?><span class="err">*</span></label>
						<input id="input" type="email" name="email" placeholder="อีเมล">
					</div>
					<div class="col-span-2">
						<label><?php pll_e('เลือกโครงการที่คุณสนใจ (เลือกได้มากกว่า 1')?><span class="err">*</span></label>
						<select id="input" class="p-2 text-black" >
							<optgroup class="">
								<option value="" disabled selected><?php pll_e('เลือกโครงการ')?></option>
								<option value="a">a</option>
								<option value="b">b</option>
								<option value="c">c</option>
								<option value="d">d</option>
							</optgroup>
						</select>
					</div>
					<div class="col-span-2 flex items-start">
						<!-- <input id="submit-check-" type="checkbox" class="mt-2" name=""> -->
						<label class="check-wrap" name="">
							<input id="submit-check" class="mt-2" type="checkbox" name="">
							<span class="checkmark"></span>
						</label>

						<div class="inline">
							<?php pll_e('บริษัทฯ จะจัดเก็บข้อมูลของท่าน เพื่อการติดต่อแจ้งข้อมูลข่าวสารที่เกี่ยวข้อง กับผลิตภัณฑ์ บริการของบริษัทฯ และนำเสนอโครงการที่น่าสนใจ คลิกที่นี่เพื่อดู')?> <div class="underline pointer inline"><?php pll_e('นโยบายความเป็นส่วนตัว')?></div> <?php pll_e('และ')?> <div class="underline pointer inline"><?php pll_e('ข้อกำหนดและเงื่อนไข')?></div>
						</div>
					</div>
				</div>
				<sp class="h-6"></sp>
				<div class="flex justify-center">
					<button onclick="submit()" value="1" class="bg-white text-black py-2 px-10 rounded-lg">
						<h6>
							<?php pll_e('ลงทะเบียน')?>
						</h6>
					</button>
				</div>
			</div>
			<div class="col-span-5 hidden md:hidden lg:block">
				<div class="bg-cover blank h-full" ratio="1:1" style="background-image:url(<?=$v['register_image']['url']?>)">
				</div>
			</div>
		</div>
	</div>
	<div class="modal-submit" onclick="this.style.display = 'none' ">
		<div class="modal-content">
			<h1 class="text-center"><?php pll_e('ขอบคุณที่ลงทะเบียน')?></h1>
		</div>
		
	</div>

	<div class="modal-submit-err" onclick="this.style.display = 'none' ">
		<div class="modal-content">
			<h1 class="text-center"><?php pll_e('กรุณากดยืนยันก่อนลงทะเบียน')?></h1>
		</div>
	</div>

</section>
<script type="text/javascript">
	function submit(){
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
			}else{
				value_input[index].style.border = "1px solid #e2e8f0";
				value_input[index].style.borderWidth = "1px";
				err[index].style.color = "white";
				pass = 1;
			}
		});
		if(pass){
			if (check) {
				xconsolex.log('checked')
				document.querySelector(".modal-submit").style.display = 'block';
			}else {
				document.querySelector(".modal-submit-err").style.display = 'block';
			}
		}
		
	}
</script>

<!--=== The Section Boxes : related promo ===-->
<?php if ($v['related_promotion']) { ?>
	<style type="text/css">
		.promotion-card {
			filter: drop-shadow(0px 4px 12px rgba(0, 0, 0, 0.15));
		}
		.promotion-card .promotion-card-line{
			width: 0%;
			position: absolute;
			bottom: 0rem;
			left: 0;
			transition: .9s all;
			opacity: 0.15;
			background: white;
		}
		.promotion-card:hover .promotion-card-line{
			width: 100%;
			transition: .8s all;
			opacity: 1;
			background: var(--ci-veri-300);
		}
		.promo-ani {
			transform: scale(1);
			transition: .8s all;
		}
		.promotion-card:hover .promo-ani{
			transform: scale(1.08);
			transition: .8s all;
		}
	</style>
	<section id="related-promo" style="padding:94px 0px;">
		<div class="s-container">
			<div class="grid grid-cols-5">
				<div class="col-span-3">
					<h1><?php pll_e('โปรโมชั่นอื่น ๆ จากแอสเซทไวส์ ')?></h1>
				</div>
				<h5 class="col-span-2 text-right pt-3">
					<a href="/promotion" class=""><?php pll_e('ดูทั้งหมด')?>
						<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="m-0 pl-2 inline-block" style="width: auto; height: 35px;"></a>
					</h5>
				</div>
				<sp style="height: 48px;"></sp>
				<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-5">
					<?php
					foreach ($v['related_promotion'] as $key => $value) {
						$v = get_fields($value->ID); 
				// pre($v);
						?>
						<div class="col-span-1 cursor-pointer bg-white promotion-card" onclick="location.href='<?= $value->guid ?>'">
							<div class="grid grid-rows-12">
								<div class="row-span-6 overflow-hidden">
									<div class="bg-cover blank promo-ani" ratio="1:1" style="background-image:url('<?=$v['banner_mobile']['url']?>')"></div>
								</div>
								<div class="row-span-6 p-4">
									<sp class=""></sp>
									<h5 class="cl-ci-grey-200 -title"><?= $value->post_title ?></h5>
									<sp class="h-2"></sp>
									<span id="txt_20" class="cl-ci-grey-300">
										<?= $v['detail'] ?>
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

	<script type="text/javascript">
		function txt_shorter(text, chars_limit){
			if (text.length > chars_limit){
				new_text = text.substring(0, chars_limit);
				new_text = new_text.trim();
				return new_text.concat("...")
			}
			else {
				return text
			}
		}
		var ttt = document.querySelectorAll("#txt_20");
		for (let i = 0; i < ttt.length; i++) {
			ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 40);

		}

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