<?php get_header() ?>

<?php
$f = get_fields();
$slider = $f['home_banner'];
?>
<!--=== The Section Boxes : banner ===-->
<section id="banner" class="">
	<div class="">
		<!-- <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" style="" > -->
		<div class="banner blank desktop-only"
		style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>');"></div>
		<!-- <div class="banner-mobile blank" style="background-image:url(/wp-content/uploads/2022/11/Club-Feature-Mobile.png);"></div> -->
		<img src="<?=get_field('banner_mobile')['sizes']['large']?>" class="w-full mobile-only">
	</div>
</section>

<!--=== The Section Boxes : club-news ===-->
<style type="text/css">
	body,
	html {
		overflow: visible;
	}
	h3#txt_20 {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 1;
		-webkit-box-orient: vertical;
	}

	.s-container {
		max-width: 1320px !important;
		padding: 0 1rem !important;
	}

	#banner .banner {
		height: 316px;
		width: 100%;
		background-position: 50% 40%
	}

	#banner .banner-mobile {
		width: 100%;
		height: 243px;
	}

	#club_slides_wrap {
		--max: 4;
		--i: 0;
		position: relative;
	}

	.club-slide--r {
		margin: unset;
		width: 48px;
		top: calc(50% - 30px);
		right: 2px;
		position: absolute;
		cursor: pointer;
		z-index: 1001;
		opacity: 1;
		transition: all 1s cubic-bezier(0.1, 1.02, 0.16, 1.01);
	}

	.club-slide--r:hover {
		opacity: 1;
		transition: all 1s cubic-bezier(0.1, 1.02, 0.16, 1.01);
	}

	.club-slide--r.--l {
		right: unset;
		transform: rotate(180deg);
		opacity: 0.3;
		z-index: 1001;
		left: calc(24% - 4px);
	}

	#club_slides_num {
		display: none;
		position: absolute;
		top: -1em;
		left: 0;
		color: var(--ci-blue-400);
		font-size: 64px;
		line-height: 77px;
		font-style: italic;
	}

	#club_slides_num span {
		font-weight: 300;
	}

	#club_slides {
		display: grid;
		width: calc(var(--max) * 100%);
		grid-template-columns: repeat(var(--max), 1fr);
		grid-column-gap: 32px;
		position: relative;
		z-index: 1000;
		left: calc(var(--i) * -100%);
		will-change: left;
		transition: left 1s;
	}

	#club_slides.sliding {}

	#club_slides_wrap::before {
		content: " ";
		position: absolute;
		background: var(--ci-grey-900);
		width: 100%;
		height: 100%;
		display: flex;
		left: -100%;
		z-index: 1;
	}

	/*#club_slides_wrap::after {
		content: " ";
		position: absolute;
		background: var(--ci-grey-900);
		width: 100%;
		height: 42px;
		display: flex;
		left: -100%;
		bottom: 0;
		z-index: 5;
		}*/
		#club_title {
			position: relative;
			z-index: 10;
		}

		.readmore {
			position: absolute;
			right: 0;
			bottom: 0%;
			background-color: #FFF;
			height: 88px;
			width: 208px;
			color: var(--ci-blue-300);
		}

		.white-block {
			position: absolute;
			width: 30vw;
			height: 346px;
			left: 0px;
			top: 65px;
			z-index: 16;
			background: linear-gradient(90deg, #FFFFFF 0%, rgba(255, 255, 255, 0.509729) 64.11%, rgba(255, 255, 255, 0) 100%);
		}

		#club-menu {
			position: sticky;
			top: calc(.5em + 70px);
		}

		#asw-club {
			overflow: hidden;
		}
	</style>
	<section id="asw-club" class="padding-l-vtc bg-ci-grey-900">
		<div>
			<img class="club-leaf01" src="/wp-content/uploads/2022/11/leaves-shadow-1.png" class="" style="">

		</div>
		<div class="relative">
			<div class="white-block" style="pointer-events: none;"></div>
		</div>
		<div class="cont-pd flex flex-row items-center">
			<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
			<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
			<a href="/<?=pll_current_language()?>/club" class=""><?php pll_e('แอสเซทไวส์คลับ')?></a>
		</div>
		<sp class="hidden lg:block"></sp>
		<sp class="block lg:hidden"></sp>
		<div class="cont-pd">
			<div class="grid grid-flow-row lg:grid-cols-12 gap-4 pl-2 relative">
				<div class="lg:col-span-3 ">
					<section class="" style="z-index: 200;">

						<div class="pt-9 lg:pt-20">
							<h1 class=""><?php pll_e('ไฮไลท์')?></h1>
							<sp class="m"></sp>
							<h6 style="font-weight: 300 !important;" class="xl:pr-8">
								<span class="" style="
								color: var(--ci-grey-400); 
								">
								<?php pll_e('พบกับข่าวสาร กิจกรรม และ สิทธิพิเศษ มากมายที่คัดสรรมา
									ให้ลูกบ้านของแอสเซทไวส์ โดยเฉพาะ
									เพราะคุณนั้นพิเศษ สำหรับเราเสมอ')?>
								</span>
							</h6>
						</div>
					</section>
				</div>
				<?php
				$args = array(
					'post_type' => 'asw_club',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'orderby' => 'date',
					'order' => 'DESC',
				);
				$loop = new WP_Query($args);
				$chk = 0;
				?>
				<div class="lg:col-span-9 overflow-hidden">
					<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="hidden lg:block club-slide--r --l"
					onclick="show_promo_arrow(-1)">
					<div id="club_slides_wrap">
						<div id="club_slides_num">
							<span id="club_slides_num_now">01</span>
							<span>/</span>
							<span>03</span>
						</div>

						<style type="text/css">
							.card-img {
								overflow: hidden;
							}

							.card-img .bg-cover {
								transform: scale(1);
								transition: all .8s;
							}

							.card-img:hover .bg-cover {
								transform: scale(1.05);
								transition: all .8s;
							}

							.card-img .card-body::before {
								content: " ";
								height: 0%;
								width: 4px;
								background: var(--ci-orange-500);
								position: absolute;
								left: 0;
								top: 0;
								opacity: 0;
								transition: all .5s;
							}

							.card-img:hover .card-body::before {
								content: " ";
								height: 100%;
								width: 4px;
								background: var(--ci-orange-500);
								opacity: 1;
								transition: all .5s;

							}

							.txt_2line {}

							@media (max-width: 1023px) {
								.txt_2line {
									overflow: hidden;
									text-overflow: ellipsis;
									display: -webkit-box;
									-webkit-line-clamp: 2;
									-webkit-box-orient: vertical;
								}

								#banner .banner {
									height: 240px;
									background-position: 30% 50%;
								}

								#club_slides_wrap::before {
									background: transparent;

								}

								.white-block {
									top: 45px;
									width: 100vw;
									z-index: 0;
								}

								#club_slides {
									display: grid;
									width: calc(var(--max) * 50%);
									grid-template-columns: repeat(var(--max), calc(11% - 16px));
									grid-column-gap: 32px;
									position: relative;
									left: calc(var(--i) * -50% - (var(--i) * 9.5px));
								}

								.card-img:hover .card-body::before {
									opacity: 0;
								}

								.card-body {
									height: 266px;
								}

								.readmore {
									position: absolute;
									right: 0;
									bottom: 0%;
									background-color: #FFF;
									width: 143px;
									height: 64px;
									color: var(--ci-blue-300);
								}

								@media (max-width: 767px) {
									#asw-club h6 {
										font-size: 26px !important;
									}

									#club_slides {
										display: grid;
										width: calc(var(--max) * 100%);
										grid-template-columns: repeat(var(--max), calc(11% - 8px));
										grid-column-gap: 32px;
										position: relative;
										left: calc(var(--i) * -100% - (var(--i) * 19.5px));
									}

								}
							}
						</style>
						<div id="club_slides" class="py-4 mt-0 lg:mt-14">
							<?php
							$chk = 0;
							foreach ($f['hightlight'] as $key => $value) {
								$cate_name = wp_get_post_terms($value->ID, 'club_type');
								$img = get_the_post_thumbnail_url($value->ID, 'large');

								?>
								<div class="club_slide shadow-md">
									<a href="<?= get_the_permalink($value->ID) ?>" class="">
										<div class="grid grid-cols-12 card-img">
											<div class="col-span-12 lg:col-span-5 bg-cover blank wide" ratio="1:1"
											style="background-image:url('<?= $img ?>'); height: auto;">
										</div>
										<div class="col-span-12 grid grid-rows-7 lg:col-span-7 p-4 lg:p-8 relative card-body"
										style="background: var(--ci-blue-300);">
										<div class="row-span-1">
											<span class="bg-white tag" style="padding: 2px 10px; border-radius: 16px;font-weight: 700; color: var(--ci-orange-500);">
												<?php
												$txt = $cate_name[0]->slug;
												switch ($txt) {
													case 'club-news':
													$txt = "ข่าวสาร";
													break;
													case 'club-benefit':
													$txt = "สิทธิประโยชน์";
													break;
													case 'activity':
													$txt = "กิจกรรม";
													break;
													default:
													break;
												}
												echo $txt;
												?>
											</span>
										</div>
										<sp class="block lg:hidden vs"></sp>
										<h3 id="txt_20" class="" style="color: white;">
											<?php echo $value->post_title ?>
										</h3>
										<span id="txt_hilightPost" class="cl-ci-blue-700 " style="font-weight: 400">
											<p class="txt_2line">
												<?php echo get_the_excerpt($value->ID); ?>
											</p>
										</span>
										<div class="row-span-4"></div>
										<div class="readmore see-more">
											<div class="flex h-full justify-center items-center px-0 lg:px-4">
												<h5 class="" style="font-weight: 500;">
													<?php pll_e('อ่านเพิ่มเติม') ?>
												</h5>
												<img src="/wp-content/uploads/2022/09/arrow-r-main.png"
												class="m-0 pl-1 lg:pl-2" style="width: auto; height: 35px;">
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<?php
						$chk++;
					}

					foreach ($f['hightlight'] as $key => $value) {
						$cate_name = wp_get_post_terms($value->ID, 'club_type');
						$img = get_the_post_thumbnail_url($value->ID, 'large');
						if ($chk == 0) {
							$club_slides_1_url = get_the_permalink();
							$club_slides_1_img = get_the_post_thumbnail_url($post->ID, 'large');
						}
						?>
						<div class="club_slide shadow-md hidden">
							<a href="<?= get_the_permalink($value->ID) ?>" class="">
								<div class="grid grid-cols-12 card-img">
									<div class="col-span-12 lg:col-span-5 bg-cover blank wide" ratio="1:1"
									style="background-image:url('<?= $img ?>'); height: auto;">
								</div>
								<div class="col-span-12 grid grid-rows-7 lg:col-span-7 p-4 lg:p-8 relative card-body"
								style="background: var(--ci-blue-300);">
								<div class="row-span-1">
									<span class="bg-white tag"
									style="padding: 2px 10px; border-radius: 16px;font-weight: 700; color: var(--ci-orange-500);">
									<?php
									$txt = $cate_name[0]->slug;
									switch ($txt) {
										case 'club-news':
										$txt = "ข่าวสาร";
										break;
										case 'club-benefit':
										$txt = "สิทธิประโยชน์";
										break;
										case 'activity':
										$txt = "กิจกรรม";
										break;
										default:
										break;
									}
									echo $txt;
									?>
								</span>
							</div>
							<h3 id="txt_20" class="" style="color: white;">
								<?php echo $value->post_title ?>
							</h3>
							<span id="txt_hilightPost" class="cl-ci-blue-700 " style="font-weight: 400">
								<p class="txt_2line">
									<?php echo $value->post_content; ?>
								</p>
							</span>
							<div class="row-span-4"></div>
							<div class="readmore see-more">
								<div class="flex h-full justify-center items-center px-0 lg:px-4">
									<h5 class="" style="font-weight: 500;">
										<?php pll_e('อ่านเพิ่มเติม')?>
									</h5>
									<img src="/wp-content/uploads/2022/09/arrow-r-main.png"
									class="m-0 pl-1 lg:pl-2" style="width: auto; height: 35px;">
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php
			$chk++;
		}

		foreach ($f['hightlight'] as $key => $value) {
			$cate_name = wp_get_post_terms($value->ID, 'club_type');
			$img = get_the_post_thumbnail_url($value->ID, 'large');
			if ($chk == 0) {
				$club_slides_1_url = get_the_permalink();
				$club_slides_1_img = get_the_post_thumbnail_url($post->ID, 'large');
			}
			?>
			<div class="club_slide shadow-md hidden">
				<a href="<?= get_the_permalink($value->ID) ?>" class="">
					<div class="grid grid-cols-12 card-img">
						<div class="col-span-12 lg:col-span-5 bg-cover blank wide" ratio="1:1"
						style="background-image:url('<?= $img ?>'); height: auto;">
					</div>
					<div class="col-span-12 grid grid-rows-7 lg:col-span-7 p-4 lg:p-8 relative card-body"
					style="background: var(--ci-blue-300);">
					<div class="row-span-1">
						<span class="bg-white tag"
						style="padding: 2px 10px; border-radius: 16px;font-weight: 700; color: var(--ci-orange-500);">
						<?php
						$txt = $cate_name[0]->slug;
						switch ($txt) {
							case 'club-news':
							$txt = "ข่าวสาร";
							break;
							case 'benefit':
							$txt = "สิทธิประโยชน์";
							break;
							case 'activity':
							$txt = "กิจกรรม";
							break;
							default:
							break;
						}
						echo $txt;
						?>
					</span>
				</div>
				<!-- <sp class="block lg:hidden vs"></sp> -->
				<h3 id="txt_20" class="h3 truncate xl:whitespace-normal"
				style="color: white; font-weight: 400;">
				<?php echo $value->post_title ?>
			</h3>
			<span id="txt_hilightPost" class="cl-ci-blue-700 " style="font-weight: 400">
				<p class="txt_2line">
					<?php echo $value->post_content; ?>
				</p>
			</span>
			<div class="row-span-4"></div>
			<div class="readmore see-more">
				<div class="flex h-full justify-center items-center px-0 lg:px-4">
					<h5 class="" style="font-weight: 500;">
						<?php pll_e('อ่านเพิ่มเติม')?>
					</h5>
					<img src="/wp-content/uploads/2022/09/arrow-r-main.png"
					class="m-0 pl-1 lg:pl-2" style="width: auto; height: 35px;">
				</div>
			</div>
		</div>
	</div>
</a>
</div>
<?php
$chk++;
}

?>
</div>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	var el = $('#club_slides_wrap');
	var hammerTime = new Hammer(el);
	hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
	hammerTime.on("panend", function (ev) {
		if (el.style.getPropertyValue('--i') == '') {
			el.style.setProperty('--i',0)
		}
		if (el.style.getPropertyValue('--max') == '') {
			el.style.setProperty('--max',3)
		}
		let i = el.style.getPropertyValue('--i')
		let max = el.style.getPropertyValue('--max')

		i = parseInt(i)
		max = parseInt(max)
		max = max/2

		let di = 0;
		if (ev.deltaX > 20) {
			di = -1
		} else if (ev.deltaX < -20) {
			di = +1
		}
		i = (((i+di)%max)+max)%max
		$$('.home-club-title')[i].click()
	})
</script>


</div>
<div id="club_title" class="home-project-nav">
	<?php
	$chk = 0;
	foreach ($f['hightlight'] as $key => $value) {
		?>
		<div class="-nav home-club-title <?php if ($chk == 0) {
			echo '-active';
		} ?>" onclick="show_promo(<?= $chk ?>)">
		<div></div>
	</div>
	<?php $chk++;
}

$title_chk = $chk;
?>

</div>
<sp class="l"></sp>
<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="hidden lg:block club-slide--r"
onclick="show_promo_arrow(1)">
</div>
</div>
</section>

<style type="text/css">
	.home-project-nav {
		display: flex;
		justify-content: center;
	}

	.home-project-nav .-nav {
		width: 32px;
		height: 32px;
		display: flex;
		align-items: center;
		margin: 0 3px;
		cursor: pointer;
	}

	.home-project-nav .-nav div {
		width: 100%;
		height: 1px;
		background-color: var(--ci-blue-600);
		transition: all .3s;
	}

	.home-project-nav .-nav.-active div {
		height: 4px;
		background-color: var(--ci-veri-500);

	}

	.-nav.hid {
		display: none !important;
	}

	.club-leaf01 {
		position: absolute;
		z-index: 1000;
		top: 18vw;
		width: 10vw;
		transform: rotate(-1.58deg);
	}

	.club-leaf02 {
		position: absolute;
		right: 0;
		top: 3vw;
		width: 8vw;
	}

	.club-leaf03 {
		display: block;
		position: absolute;
		left: 0;
		top: 5.5vw;
		width: 5vw;
	}

	@media (max-width: 767px) {
		.-nav.hid {
			display: flex !important;
		}

		.club-leaf01 {
			z-index: 1000;
			top: 220vw;
			width: 32vw;
			transform: rotate(-1.58deg);
		}

		.club-leaf02 {
			right: 0;
			top: 180vw;
			width: 30vw;
		}

		.club-leaf03 {
			display: none;
			left: 0;
			top: 1.5%;
			width: 5vw;
		}

	}
</style>

<style type="text/css">
	.side-nav-menu {}

	.side-nav-menu .padding {
		/*padding: 0.5rem 1rem 0.5rem 1rem !important;*/
		line-height: 32px;
	}

	.side-nav-menu .b-select {
		transition: 0.3s;
		border-left: 5px solid var(--ci-orange-500);
		z-index: 2;
	}
</style>

<!--=== The Section Boxes : club-info ===-->

<style type="text/css">
	.ani-club {
		position: relative;
		will-change: transform, opacity;
		transition: transform .5s calc(var(--x) * .2s), opacity .5s calc(var(--x) * .2s);
		transform: translateY(100px);
		opacity: .0;
	}

	.ani-club[data-x="-1"] {
		transition: none;
	}

	.ani-club[data-show="1"] {
		opacity: 1;
		transform: translateY(0px);
	}

	#club-info .col-span-1 .bg-cover {
		transition: all .8s;
		transform: scale(1);
	}

	#club-info .col-span-1:hover .bg-cover {
		transition: all .8s;
		transform: scale(1.05);
	}

	#club-info .col-span-1 sp.s {
		transition: all .8s;
	}

	#club-info .col-span-1:hover sp.s {

		width: 100% !important;
	}

	.side-nav-menu,
	.side-nav-menu-blog {
		border: 0;
	}

	.club-menu {
		color: var(--ci-grey-400);
		transition: all .8s;
	}

	.cl-ci-orange-500 {
		color: var(--ci-orange-500) !important;
	}

	#txt_header {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: calc(32px * 2);
	}

	#txt_slideheader {
		display: block;
		height: calc(44px * 2);
		overflow: hidden;
	}

	div#club-info-section {
		position: absolute;
		width: 10px;
		height: 10px;
		top: -70px;
	}

	#club-menu-left h1 {
		font-size: 56px;
	}

	.club-date-sp {
		width: 100%;
		height: 16px;
	}

	.club-date {
		position: absolute;
		bottom: 1.2rem;
		left: 1rem;
	}
</style>
<section id="club-info" class="padding-l-vtc">
	<div id="club-info-section"></div>
	<div>
		<img src="/wp-content/uploads/2022/11/shutterstock_1574382076-1.png" class=" club-leaf02" style="">
		<img src="/wp-content/uploads/2022/11/Group-793.png" class=" club-leaf03" style="">

	</div>
	<sp class="m"></sp>
	<div class="cont-pd">
		<div id="club-info-height" class="grid grid-flow-row lg:grid-cols-12 gap-4">
			<div class="lg:col-span-3">
				<!--=== The Section Boxes : club-menu ===-->
				<section id="club-menu" class="col-span-3 lg:pl-6 lg:pb-10 pt-4">
					<div class="">
						<div id="club-menu-left">
							<h1 class=""><?php pll_e('แอสเซทไวส์')?><br class="hidden lg:block"><?php pll_e('คลับ')?></h1>
							<sp class="l"></sp>
							<div id="menu"
							class="flex flex-row justify-between md:justify-start md:gap-4 lg:flex-col lg:gap-0 side-nav-menu relative pb-2.5 lg:pb-0"
							style="">
							<div class="hidden lg:block absolute bg-ci-grey-900"
							style="width: 1px;height: 100%;left: 0px;z-index: 1;">
							<div class="club_vbar"></div>
						</div>
						<div class="block lg:hidden absolute bg-ci-grey-900"
						style="width: 100%;height: 2.5;bottom: 1.15px;z-index: 1;">
						<div class="club_hbar"></div>
					</div>
					<?php 
					$club_type = get_terms( array(
						'taxonomy'   => 'club_type',
						'hide_empty' => false,
					) );
					?>
					<h6 onclick="show_info(0)" class=" px-0 lg:px-4 club-menu cl-ci-orange-500 font-medium">
						<span><?php pll_e('ทั้งหมด')?></span>
					</h6>
					<sp class="hidden lg:block" style="height: 1rem;"></sp>
					<?php $i = 0;
					foreach ($club_type as $ck => $cv): 
						$i++;
						?>
						<h6 onclick="show_info(<?=$i?>)" class=" px-0 lg:px-4 club-menu">
							<span><?=$cv->name?></span>
						</h6>
						<sp class="hidden lg:block" style="height: 1rem;"></sp>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</section>

</div>
<div class="lg:col-span-9 -overflow-auto -scroll-hid">

	<div id="club-all" class="py-6 club-wrap">
		<h2 class="hidden lg:block"><?php pll_e('ทั้งหมด')?></h2>
		<sp class="l hidden lg:block"></sp>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-flow-row gap-4 md:gap-7">
			<?php
			$args = array(
				'post_type' => 'asw_club',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'DESC',
			);
			$loop = new WP_Query($args);
			$chk = 0;
			while ($loop->have_posts()):
				$loop->the_post(); {
					$cate_name = wp_get_post_terms($post->ID, 'club_type');
					$v = get_postdata($post->ID);
					?>
					<div class="col-span-1 ani-club bg-ci-grey-900" data-show="0" data-x="null">
						<div class="grid grid-rows-12- px-4 py-6">
							<a href="<?= get_the_permalink() ?>" class="">
								<div class="<?php if ($chk % 2 == 1) {
									echo 'flex flex-col-reverse';
								} ?>">

								<div class="overflow-hidden">
									<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
									</div>
								</div>
								<div class="row-span-5">
									<?php if ($chk % 2 != 1) {
										echo '<sp class="" style="height: 18px;"></sp>';
									} ?>
									<span class="tag cl-ci-orange-500" style="font-weight: 700;">
										<?php
										$txt = $cate_name[0]->slug;
										switch ($txt) {
											case 'club-news':
											$txt = "ข่าวสาร";
											break;
											case 'benefit':
											$txt = "สิทธิประโยชน์";
											break;
											case 'activity':
											$txt = "กิจกรรม";
											break;
											default:
											break;
										}
										echo $txt;
										?>
									</span>
									<sp class="vs"></sp>
									<h5 id="txt_header" class="">
										<?= get_the_title() ?>
									</h5>
									<sp class=""></sp>
									<span id="txt_20" class="cl-ci-grey-300">
										<?= the_excerpt() ?>
									</span>
									<sp class=""></sp>
									<a href="<?= get_the_permalink() ?>" class=""><?php pll_e('อ่านเพิ่มเติม') ?></a>
									<sp class=""></sp>
									<sp class="bg-ci-orange-500 s" style="height: 4px; width: 15%"></sp>
									<sp></sp>
								</div>
							</a>
						</div>
						<div class="club-date-sp"></div>
						<?php if ($chk % 2 == 1) {
							echo '<sp class="" style="height: 18px"></sp>';
						} ?>

						<div class="row-span-1 cl-ci-grey-300 club-date">
							<?=asw_date_format($v['Date'])?>
						</div>
					</div>
				</div>
				<?php $chk++;
			}
		endwhile;

		wp_reset_postdata();
		?>

	</div>
</div>

<?php foreach ($club_type as $ck => $cv): 
	?>
	<div id="club-<?=$cv->slug?>" class="py-6 club-wrap" style="display: none;">
		<h2 class="hidden lg:block"><?=$cv->name?></h2>
		<sp class="l hidden lg:block"></sp>
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 grid-flow-row gap-7">
			<?php
			$args = array(
				'post_type' => 'asw_club',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'DESC',
				'tax_query' => array(
					array (
						'taxonomy' => 'club_type',
						'field' => 'slug',
						'terms' => $cv->slug,
					)
				),
			);
			$loop = new WP_Query($args);
			$chk = 0;
			while ($loop->have_posts()):
				$loop->the_post(); {
					?>
					<div class="col-span-1 ani-club bg-ci-grey-900" data-show="0" data-x="null">
						<a href="<?= get_the_permalink() ?>" class="">
							<div class="grid grid-rows-12- px-4 py-6">
								<div class="<?php if ($chk % 2 == 1) {echo 'flex flex-col-reverse'; } ?>">

									<div class="overflow-hidden">
										<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')">
										</div>
									</div>
									<div class="row-span-5">
										<?php if ($chk % 2 != 1) {
											echo '<sp class="" style="height: 18px;"></sp>';
										} ?>
										<span class="tag cl-ci-orange-500"><?=$cv->name?></span>
										<sp class="vs"></sp>
										<h5 id="txt_header" class="">
											<?= get_the_title() ?>
										</h5>
										<sp class=""></sp>
										<span id="txt_20" class="cl-ci-grey-300">
											<?= the_excerpt() ?>
										</span>
										<sp class=""></sp>
										<a href="<?= get_the_permalink() ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
										<sp class=""></sp>
										<sp class="bg-ci-orange-500 s" style="height: 4px; width: 15%"></sp>
										<sp></sp>
									</div>
								</div>
								<div class="club-date-sp"></div>
								<?php if ($chk % 2 == 1) {
									echo '<sp class="" style="height: 18px"></sp>';
								} ?>

								<div class="row-span-1 cl-ci-grey-300 club-date">
									<?=asw_date_format($v['Date'])?>
								</div>
							</div>
						</a>
					</div>
					<?php $chk++;
				}
			endwhile;
			wp_reset_postdata();
			?>

		</div>
	</div>
<?php endforeach ?>

</div>
</div>
</div>
</section>


<style type="text/css">
	.club_vbar {
		width: 4px;
		height: 28px;
		position: absolute;
		left: -1.5px;
		top: 0;
		background-color: #F1683B;
		transition: all .2s;
	}

	.club_Hbar {
		width: 28px;
		height: 4px;
		position: absolute;
		left: 0;
		top: -0.7px;
		background-color: #F1683B;
		transition: all .2s;
	}
</style>
<?php get_footer() ?>

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


	var hhh = document.querySelectorAll("#txt_header");
	for (let i = 0; i < hhh.length; i++) {
		// xconsolex.log(txt_shorter(hhh[i].innerHTML, 68));
		hhh[i].innerHTML = txt_shorter(hhh[i].innerHTML, 68);
	}

	var ttt = document.querySelectorAll("#txt_20");
	for (let i = 0; i < ttt.length; i++) {
		ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 70);
	}

	var hilightPost = document.querySelectorAll("#txt_hilightPost");
	for (let i = 0; i < hilightPost.length; i++) {
		hilightPost[i].innerHTML = txt_shorter(hilightPost[i].innerHTML, 140);
	}


	// var btns = document.getElementsByClassName("club-menu");
	// for (var i = 0; i < btns.length; i++) {
	// 	btns[i].addEventListener("click", function() {
	// 		var current = document.getElementsByClassName(" cl-ci-orange-500 b-select");
	// 		current[0].className = current[0].className.replace(" cl-orange b-select", "");
	// 		this.className += " cl-orange b-select";
	// 	});
	// }

	// let blog = [];
	let blog = $$('.club-wrap');
	// blog[0] = document.getElementById("club-all");
	// blog[1] = document.getElementById("club-news");
	// blog[2] = document.getElementById("club-activity");
	// blog[3] = document.getElementById("club-benefit");



	window.addEventListener("resize", setWidthMenu);
	let widthDiv = 0;
	let current = 0;
	// function setClientWidth(){
	// 	let width = document.body.clientWidth;
	// 	let height = document.body.clientHeight;

	// 	xconsolex.log(document.body.clientWidth, document.body.clientHeight)
	// 	if (width < 768 && width < height){
	// 		widthDiv = width;

	// 		xconsolex.log('I');
	// 	}else if (width < 1024 && width > height){
	// 		widthDiv = width;
	// 		xconsolex.log('=');
	// 	}else if (width < height && height >= 768){
	// 		widthDiv = width;
	// 		xconsolex.log('I ipad');
	// 	}else if (width > height && width >= 768){
	// 		widthDiv = width;
	// 	}

	// 	setTimeout(() => {
	// 		setWidthMenu();
	// 	}, 100);

	// }

	// setClientWidth()
	function setWidthMenu() {
		widthDiv = document.body.clientWidth;
		let menuWidthEl = [];
		let menuEl = document.querySelectorAll("#club-menu span");
		const allEl = document.getElementsByClassName("club-menu");
		let widthOffset = 0;
		let gap = 0;
		for (let i = 0; i < menuEl.length; i++) {

			menuWidthEl[i] = menuEl[i].offsetWidth;

			// xconsolex.log(menuEl[i].offsetWidth, i);
		}


		// let gap = (widthDiv - (16 * 2)  - menuWidthEl.reduce((a, b) => a + b, 0))/3;

		// document.querySelector('.club_hbar').style.width = menuWidthEl[0] + "px";
		if (widthDiv < 768) {
			for (let i = 0; i < current; i++) {
				widthOffset += menuEl[i].offsetWidth;
				gap += ((widthDiv - (16 * 2) - menuWidthEl.reduce((a, b) => a + b, 0)) / 3);
			}
			document.querySelector('.club_hbar').style.left = widthOffset + gap + "px";
			document.querySelector('.club_hbar').style.width = menuEl[current].offsetWidth + "px";

		} else if (widthDiv < 1024) {
			xconsolex.log('===');
			for (let i = 0; i < current + 1; i++) {
				widthOffset += menuEl[i].offsetWidth;
				gap += ((widthDiv - (16 * 2) - menuWidthEl.reduce((a, b) => a + b, 0)) / 5);
				xconsolex.log(i)
				// xconsolex.log('menuEl[i]',menuEl[i], menuEl[current]);
			}
			document.querySelector('.club_hbar').style.left = (widthOffset) - menuEl[current].offsetWidth + "px";
			document.querySelector('.club_hbar').style.width = menuEl[current].offsetWidth + "px";

			// document.querySelector('.club_hbar').style.left =  ((widthDiv - (16 * 2)  - menuWidthEl.reduce((a, b) => a + b, 0))/5) + "px";

		}

	}
	setTimeout(() => {
		setWidthMenu();
	}, 200);

	function show_info(num) {
		toFilterTop()
		let blogOffSet = document.getElementById('club-info-height');
		for (let i = 0; i < blog.length; i++) {
			if (i == num) {
				blog[i].style.display = "block";
			} else {
				blog[i].style.display = "none";
			}
		}
		current = num;
		const elNum = num;
		const allEl = document.getElementsByClassName("club-menu");
		const menuEl = document.querySelectorAll("#club-menu span");

		let scrollY = 0;
		let iCount = 0;
		let barY = 0;

		let scrollX = 0;
		let widthAllElement = 0;
		let widthElement = [];

		let barX = 0;
		let gapWidth = 0;

		for (let i = 0; i < allEl.length; i++) {
			widthElement[i] = allEl[i].offsetWidth;
		}

		for (let i of allEl) {
			widthAllElement += widthElement[iCount];

			i.classList.remove('cl-ci-orange-500')
			i.classList.remove('font-medium')
			if (iCount < elNum) {
				scrollY += i.offsetHeight;
				barY += i.offsetHeight;

				scrollX += i.offsetWidth;
				barX += i.offsetWidth;

			}
			iCount++

		}


		scrollY = scrollY + (16 * elNum); // 16 is Gap
		barY = barY + (16 * elNum);
		scrollY -= 32; // 32 is height of Element
		allEl[elNum].classList.add('cl-ci-orange-500');
		allEl[elNum].classList.add('font-medium');
		barYoffset = (document.querySelectorAll('.club-menu')[elNum].offsetHeight - 28) / 2;
		document.querySelector('.club_vbar').style.top = barY + barYoffset + 'px';

		if (widthDiv < 768) {

			gapWidth += (document.querySelector('#club-menu').offsetWidth - widthAllElement) / 3;
			barX = barX + (gapWidth * (elNum));
			barXoffset = (document.querySelectorAll('.club-menu')[elNum].offsetWidth) / 2;
			xconsolex.log('widthDiv < 768', widthDiv);

		} else if (widthDiv >= 768 || widthDiv < 1024) {
			gapWidth += 16;
			barX = barX + (gapWidth * (elNum));
			barXoffset = (document.querySelectorAll('.club-menu')[elNum].offsetWidth) / 2;


		}
		xconsolex.log(widthDiv - (16 * 2), widthAllElement, 'barX', barX);
		document.querySelector('.club_hbar').style.width = widthElement[elNum];
		document.querySelector('.club_hbar').style.left = barX + 'px';

		restartSort()
	}


	// hilight slider
	function pad(num, size) {
		num = num.toString();
		while (num.length < size) num = "0" + num;
		return num;
	}

	document.querySelector('#club_slides_wrap').style.setProperty('--max', <?= $title_chk ?> * 3)
	let waitingPromotionLoop = null

	function show_promo_arrow(plus) {
		let nowNum = parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--i'))
		const max = parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--max')) / 3
		if (isNaN(nowNum)) {
			nowNum = 0
		}
		nowNum += plus;
		xconsolex.log(nowNum, plus, 'max', max);
		if (nowNum < 1) {
			nowNum = 0;
			document.querySelector(".club-slide--r.--l").style.opacity = 0.3;
		} else if (nowNum > max - 1) {
			nowNum = max - 1;
		} else if (nowNum >= 1) {
			document.querySelector(".club-slide--r.--l").style.opacity = 1;

		}
		show_promo(nowNum)

	}

	function show_promo(num) {
		let elNum = num
		const allEl = document.querySelectorAll('.home-club-title')
		const max = parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--max')) / 3
		elNum = elNum % max
		let nowNum = parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--i'))
		xconsolex.log('nowNum', nowNum, 'elNum', elNum, 'max', max);
		// xconsolex.log(Math.ceil(max/2));
		if (isNaN(nowNum)) {
			nowNum = 0
		}
		if (elNum == 0) {
			document.querySelector(".club-slide--r.--l").style.opacity = 0.3;
			document.querySelectorAll(".club-slide--r")[1].style.opacity = 1;
		} else if (elNum > 0 && elNum < max - 1) {
			document.querySelector(".club-slide--r.--l").style.opacity = 1;
			document.querySelectorAll(".club-slide--r")[1].style.opacity = 1;
		} else if (elNum >= max - 1) {
			document.querySelectorAll(".club-slide--r")[1].style.opacity = 0.3;
			document.querySelector(".club-slide--r.--l").style.opacity = 1;
		}
		// if (nowNum>num) {
		// 	num = num+max
		// }
		document.querySelector('#club_slides_wrap').style.setProperty('--i', num)
		document.querySelector('#club_slides').classList.add('sliding')
		for (let i of allEl) {
			// i.classList.remove('cl-ci-orange-500')
			// i.classList.remove('b-select')
			i.classList.remove('-active')

		}
		// allEl[elNum].classList.add('cl-ci-orange-500')
		// allEl[elNum].classList.add('b-select')
		allEl[elNum].classList.add('-active')
		clearTimeout(waitingPromotionLoop)
		// waitingPromotionLoop = setTimeout(()=>{
		// 	document.querySelector('#club_slides').classList.remove('sliding')
		// 	if (parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--i')) > max-1) {
		// 		xconsolex.log('back')
		// 		document.querySelector('#club_slides_wrap').style.setProperty('--i',elNum)
		// 	}
		// },1400)
		waitingPromotionLoop = setTimeout(() => {
			document.querySelector('#club_slides').classList.remove('sliding')
			if (parseInt(document.querySelector('#club_slides_wrap').style.getPropertyValue('--i')) > max - 1) {
				xconsolex.log('back')
				document.querySelector('#club_slides_wrap').style.setProperty('--i', max - 1)
			}
		}, 700)
	}

	function homeProjectNav(num, el) {
		document.querySelector('.home-cards-wrap').style.setProperty("--i", num);
		for (let i of document.querySelectorAll('.home-project-nav .-nav')) {
			i.classList.remove('-active')
		}
		el.classList.add('-active')
	}
</script>

<script type="text/javascript">
	function toFilterTop() {
		document.querySelector('#club-info-section').scrollIntoView({
			behavior: 'smooth'
		});
	}
	let card_arr_x = []

	function scrollCard() {
		// xconsolex.log(num)
		card_arr_x = []
		let h = window.innerHeight
		let cards = document.querySelectorAll('.ani-club')
		let offset = 200

		for (let i of cards) {
			let react = i.getBoundingClientRect()
			if (card_arr_x.indexOf(react.x) == -1) {
				card_arr_x.push(react.x)
			}
		}
		card_arr_x = card_arr_x.sort(function (a, b) {
			return a - b;
		})
		let index = card_arr_x.indexOf(0);
		if (index !== -1) {
			card_arr_x.splice(index, 1);
		}
		for (let i of cards) {
			let react = i.getBoundingClientRect()
			let point = react.y - h + offset
			i.dataset.x = card_arr_x.indexOf(react.x)
			i.style.setProperty('--x', i.dataset.x)
			if (point < 0) {
				i.dataset.show = 1
			}
		}
	}

	function restartSort() {
		let cards = document.querySelectorAll('.ani-club')
		for (let i of cards) {
			i.dataset.show = 0
			i.dataset.x = -1
		}
		scrollCard()
	}
	window.onscroll = () => {
		scrollCard()
	}
	scrollCard()
</script>

<script>
	function showClubCate(slug){
		toFilterTop()
		let box = $$('.club-wrap')
		for(let b of box){
			b.style.display = 'none'
		}
	}
</script> 