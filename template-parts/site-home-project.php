<style type="text/css">
	#project{
		--cont-w:1312px;
	}
	.home-cards-wrap {
		--cont-m:calc(100% - var(--cont-w));	
		--i: 0;
		--cards:4;
		--cards-slide:4;
		--card-width:calc(
			((100% - (12px * (var(--cards) - 1))) / var(--cards))
		);
		--max:8;
		transition: all .5s ease-in-out;
		will-change: transform;
		display: grid;
		grid-gap: 12px;
		grid-template-columns: repeat(
			var(--max),
			var(--card-width)
		);
		transform: translateX(
			calc(
				var(--cards-slide) * var(--card-width) * var(--i) * -1 + 
				(
					(var(--cards-slide)) * -12px * var(--i)
				)
			));
	}
	/*-- Mobile Version --*/
	@media (min-width: 1441px) {
		.home-cards-wrap {
			--cards:4.1;
		}
	}

	@media (max-width: 1024px) {
		.home-cards-wrap {
			--cards:3.2;
			--cards-slide:1;
		}
	}
	@media (max-width: 768px) {
		.home-cards-wrap {
			--cards:2.2;
			--cards-slide:1;
		}
	}
	@media (max-width: 460px) {
		.home-cards-wrap {
			--cards:1.2;
			--cards-slide:1;
		}
	}

	.home-project-nav {
		display: flex;
		justify-content: center;
		padding-bottom: 2rem;
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
		background-color: var(--ci-blue-700);
		transition: all .3s;
	}

	.home-project-nav .-nav.-active div {
		height: 4px;
		background-color: var(--ci-veri-500);
	}

	.-nav.hid {
		display: none !important;
	}

	#home-pro-arrow-1 {
		top: 51%;
		left: -15px;
		width: 48px;
		transition: .5s;
		opacity: 0;
		z-index: -1;
		transition: .5s all;
	}

	#home-pro-arrow-2 {
		top: 51%;
		right: -8px;
		width: 48px;
		transition: 3s;
		opacity: 0;
		transition: .5s all;
		transition-delay: .5s;
	}

	#home-pro-arrow-1:hover,
	#home-pro-arrow-2:hover {
		opacity: 1:;
		transition: .5s all;
		filter: brightness(200%);
	}

	.home-project-image {
		padding-top: 147% !important;
	}

	@media (max-width: 1024px) {
		.-nav.hid {
			display: flex !important;
		}

		.sec-project {
			padding-top: 0 !important;
			padding-bottom: 0 !important;
		}

		#home-pro-arrow-1,
		#home-pro-arrow-2 {
			display: none;
		}
	}
	/*-- Mobile Version --*/
	@media (min-width: 769px) {
		#project:where([data-item="1"],[data-item="2"],[data-item="3"],[data-item="4"]) :is(#home-pro-arrow-1,#home-pro-arrow-2){
			display: none;
		}
		#project:where([data-item="1"],[data-item="2"],[data-item="3"],[data-item="4"]) .home-project-nav{
			display: none;
		}
	}
	.home-cards-wrap-block{
		overflow: visible;
	}
</style>
<!--=== The Section Boxes : project ===-->
<?php $p = get_field('project_recommended'); ?>
<section id="project" class="padding-vl-vtc sec-project" data-item="<?=ofsize($p)?>">
	<img src="/wp-content/uploads/2022/10/เงากิ่งไม้-3.png" class="absolute pointer-events-none leaf02">
	<div class="">
		<div class="absolute w-full top-1/2">
			<div class=" cont-pd">
				<img id="home-pro-arrow-1" src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="absolute pointer  <?php if ($count_pro <= 4) {
					echo '';
				} ?>" onclick="homeProjectArrow(-1)">
				<img id="home-pro-arrow-2" src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="absolute pointer  <?php if ($count_pro <= 4) {
					echo '';
				} ?>" onclick="homeProjectArrow(1)" style="z-index: 1;">
			</div>
		</div>
		<div class="cont-pd cont-hide">
			<sp class="xl"></sp>
			<div class="grid grid-cols-12">
				<div class="col-span-8 text-left">
					<h1 class=""><?php pll_e('โครงการแนะนำ')?></h1>
				</div>
				<div class="col-span-4 flex items-center justify-end">
					<a href="/<?=pll_current_language()?>/project-search" class="">
						<h5 class="see-more cl-ci-blue-300">
							<span class="f30-24"><?php pll_e('ดูทั้งหมด')?></span>
							<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block" style="width:30px">
						</h5>
					</a>
				</div>
			</div>
			<sp class="rem-1"></sp>
			
			<div class="home-cards-wrap-block cards-project relative" style="--max:<?=ofsize($p)?>">
				<div class="home-cards-wrap my-4" style="--i:0">
					<?php
					$count_up = 0;
					foreach ($p as $key => $project) {
						
						$count_up++;
						$field = get_fields($project->ID);
						$cate_name = wp_get_object_terms( $project->ID, 'project-type');
						foreach ($cate_name as $pjt_k => $pjt_v) {
							if ($pjt_v->parent == 0) {
								$cate_parent = $pjt_v;
							}else{
								$cate_brand = $pjt_v;
							}
						}
						$stat_name = wp_get_object_terms($project->ID, 'project_status');
						$loca_name = wp_get_object_terms($project->ID, 'project_location');
						foreach ($loca_name as $pjt_k => $pjt_v) {
							if ($pjt_v->parent == 0) {
								$loca_parent = $pjt_v;
							}else{
								$loca_child = $pjt_v;
							}
						}
						$cate_icon = get_field('icon', 'project-type' . '_' . $cate_name[1]->term_id);
						$stat_color = get_field('color', 'project_status' . '_' . $stat_name[0]->term_id);
						$stat_label = get_field('label', 'project_status' . '_' . $stat_name[0]->term_id);

						$link = get_the_permalink($project->ID);
						?>
						<div data-compare-id="<?=$project->ID?>" data-compare-selected="0" class="home-project-card -for-search ani-pro- hover:scale-110-" data-aos="fade-left" data-aos-delay="<?=$count_up*250?>" data-aos-duration="600">
							<a href="<?= $link ?>" class="" target="_blank">
								<div class="py-4" style="padding-right: 12px;">
									<div class="grid grid-cols-2">
										<div class="col-span-1 pl-4 flex items-center" style="color: <?= $stat_color ?>;border-left: 3px solid <?= $stat_color ?>;">
											<span class="" style="font-weight: 700;font-size: 18px;line-height: 20px;"><?= $stat_name[0]->name ?></span>
										</div>
										<div class="col-start-2 col-span-1">
											<img src="<?= $field['logo']['url'] ?>" style="width: auto;max-height:50px;margin-right: 10px;">
										</div>
									</div>
								</div>
								<div class="bg-cover blank home-project-image" ratio="2:3" style="background-image:linear-gradient(0deg, #000c,#0008,#0001, transparent,transparent,transparent),url('<?php echo get_the_post_thumbnail_url($project->ID, '2048x2048') ?>');">
									<div class="bottom-left">
										<div class="flex flex-row items-center" style="line-height: 28px;">
											<?php if ($cate_parent->slug == 'condominium') { ?>
												<img src="/wp-content/uploads/2022/09/Vector.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?php pll_e('คอนโดมิเนียม')?>
											<?php } else if ($cate_parent->slug == 'house') { ?>
												<img src="/wp-content/uploads/2022/10/Icon-in-input.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?php pll_e('บ้านและทาวน์โฮม')?>
											<?php } ?>
										</div>
										<div class="flex flex-row items-center" style="line-height: 28px;margin-top: 6px;">
											<img src="/wp-content/uploads/2022/10/Icon-in-input-1.png" style="filter: brightness(0) invert(1);height:1rem;margin:0;margin-right: 5px;"><?= $loca_child->name ?>
										</div>
									</div>
									<div class="bottom-right cl-white" style="text-align: right;font-weight: 400;font-size: 17px;line-height: 20px;">
										<?php pll_e('เริ่มต้น') ?> 
										<div style="font-size: 32px;"><?= $field['price'] ?></div>
										<?php pll_e('ล้านบาท') ?> 
									</div>
								</div>
							</a>
							<div class="-pj-cp" onclick="cp_add_project(`<?=$project->ID?>`,`<?=$project->post_name?>`,`<?=$project->post_title?>`)">
								<div class="-s0">
									<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 7.10838C0.980973 6.86431 0.980973 6.46858 1.22505 6.2245L5.20253 2.24702C5.4466 2.00295 5.84233 2.00295 6.08641 2.24702C6.33049 2.4911 6.33049 2.88683 6.08641 3.13091L3.17588 6.04144H18.3337C18.6788 6.04144 18.9587 6.32126 18.9587 6.66644C18.9587 7.01162 18.6788 7.29144 18.3337 7.29144H3.17588L6.08641 10.202C6.33049 10.4461 6.33049 10.8418 6.08641 11.0859C5.84233 11.3299 5.4466 11.3299 5.20253 11.0859L1.22505 7.10838Z" fill="white"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 15.0254C19.019 14.7813 19.019 14.3856 18.7749 14.1415L14.7975 10.164C14.5534 9.91994 14.1577 9.91994 13.9136 10.164C13.6695 10.4081 13.6695 10.8038 13.9136 11.0479L16.8241 13.9584H1.66634C1.32116 13.9584 1.04134 14.2383 1.04134 14.5834C1.04134 14.9286 1.32116 15.2084 1.66634 15.2084H16.8241L13.9136 18.119C13.6695 18.363 13.6695 18.7588 13.9136 19.0029C14.1577 19.2469 14.5534 19.2469 14.7975 19.0029L18.7749 15.0254Z" fill="white"/>
									</svg>
								</div>
								<div class="-s1">
									
									<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M1.22505 11.1084C0.980973 10.8643 0.980973 10.4686 1.22505 10.2245L5.20253 6.24702C5.4466 6.00295 5.84233 6.00295 6.08641 6.24702C6.33049 6.4911 6.33049 6.88683 6.08641 7.13091L3.17588 10.0414H18.3337C18.6788 10.0414 18.9587 10.3213 18.9587 10.6664C18.9587 11.0116 18.6788 11.2914 18.3337 11.2914H3.17588L6.08641 14.202C6.33049 14.4461 6.33049 14.8418 6.08641 15.0859C5.84233 15.3299 5.4466 15.3299 5.20253 15.0859L1.22505 11.1084Z" fill="white"/>
										<path fill-rule="evenodd" clip-rule="evenodd" d="M18.7749 19.0254C19.019 18.7813 19.019 18.3856 18.7749 18.1415L14.7975 14.164C14.5534 13.9199 14.1577 13.9199 13.9136 14.164C13.6695 14.4081 13.6695 14.8038 13.9136 15.0479L16.8241 17.9584H1.66634C1.32116 17.9584 1.04134 18.2383 1.04134 18.5834C1.04134 18.9286 1.32116 19.2084 1.66634 19.2084H16.8241L13.9136 22.119C13.6695 22.363 13.6695 22.7588 13.9136 23.0029C14.1577 23.2469 14.5534 23.2469 14.7975 23.0029L18.7749 19.0254Z" fill="white"/>
										<ellipse cx="18.3337" cy="7.33317" rx="6.66667" ry="6.66667" fill="#1D9F9B"/>
										<path d="M15.833 7.33317L17.4997 8.99984L20.833 5.6665" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>

								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<sp class="l"></sp>
	<div class="home-project-nav">
		<?php
		$count_pro = ofsize($p);
		for ($i = 0; $i < $count_pro; $i++) {
			if ($i == 0) { ?>
				<div class="-nav -active" onclick="homeProjectNav(0,this)">
					<div></div>
				</div>
			<?php } elseif ($i == 1) { ?>
				<div class="-nav <?php if ($count_pro <= 3) {
					echo 'hid';
				} ?>" onclick="homeProjectNav(1,this)">
				<div></div>
			</div>
		<?php } else { ?>
			<div class="-nav hid" onclick="homeProjectNav(<?= $i ?>,this)">
				<div></div>
			</div>
		<?php }
	}
	?>
</div>
<!-- <sp class=""></sp> -->
<script type="text/javascript">

	$('.home-project-nav .-nav').click()
	function homeProjectNav(num, el) {
		document.querySelector('.home-cards-wrap').style.setProperty("--i", num);
		for (let i of document.querySelectorAll('.home-project-nav .-nav')) {
			i.classList.remove('-active')
		}
		el.classList.add('-active')
		homeProjectArrow(0)
	}

	function homeProjectArrow(num) {
		let rs = getComputedStyle(document.querySelector('.home-cards-wrap'))
		var prop = parseFloat(rs.getPropertyValue('--i'))
		let totnav = 1;
		let sed = 0,
		chk = 0,
		chk1 = 0
		if (prop + num < 0) {
			sed = totnav
		} else if (prop + num > totnav) {
			sed = 0
		} else {
			sed = prop + num
		}
		for (let i of document.querySelectorAll('.home-project-nav .-nav')) {
			if (i.classList.contains("-active")) {
				chk = chk1
			}
			chk1++
		}
		chk += num
		if (chk < 0) {
			chk = 1
		};
		if (chk > 1) {
			chk = 0
		};

		chk1 = 0
		for (let i of document.querySelectorAll('.home-project-nav .-nav')) {
			if (chk == chk1) {
				chk = i
			}
			chk1++
		}
		if (num != 0) {
			homeProjectNav(sed, chk)
		}
		if (sed == 1) {
			document.getElementById("home-pro-arrow-1").style.opacity = "1"
			document.getElementById("home-pro-arrow-1").style.zIndex = "9"
			document.getElementById("home-pro-arrow-2").style.opacity = "0"
			document.getElementById("home-pro-arrow-2").style.zIndex = "-1"
		} else {
			document.getElementById("home-pro-arrow-2").style.opacity = "1"
			document.getElementById("home-pro-arrow-2").style.zIndex = "9"
			document.getElementById("home-pro-arrow-1").style.opacity = "0"
			document.getElementById("home-pro-arrow-1").style.zIndex = "-1"
		}
	}
	reproFunction()
	window.addEventListener("resize", reproFunction);
	var chkscreen = 0

	function reproFunction() {
		if (window.innerWidth <= 768) {
			if (window.innerWidth > 600) {
				document.querySelector('.home-cards-wrap').style.setProperty("--pernum", 60);
				document.querySelector('.home-cards-wrap').style.setProperty("--chk", 0.6);
			} else {
				document.querySelector('.home-cards-wrap').style.setProperty("--pernum", 70);
				document.querySelector('.home-cards-wrap').style.setProperty("--chk", 0.7);
			}
			chkscreen = 1
		} else {
			document.querySelector('.home-cards-wrap').style.setProperty("--pernum", 25);
			if (chkscreen == 1) {
				chkscreen = 0
				let chk = document.querySelectorAll('.home-project-nav .-nav')[0]
				homeProjectNav(0, chk)
					// document.querySelectorAll('.burger-project-nav .-nav')[0].classList.add('-active')
				xconsolex.log(chk)
			}
		}
	}
</script>
</section>

<script type="module">
	import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
	var el = document.querySelector(".home-cards-wrap");
	var hammerTime = new Hammer(el);
	xconsolex.log(hammerTime)
	hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
	hammerTime.on("panend", function (ev) {
		let i = document.querySelector(".home-cards-wrap").style.getPropertyValue('--i')
		let max = document.querySelector(".home-cards-wrap-block").style.getPropertyValue('--max')

		i = parseInt(i)
		max = parseInt(max)
		let di = 0;
		if (ev.deltaX>20) {
			di = -1
		}else if(ev.deltaX<-20){
			di = +1
		}
		i = (((i+di)%max)+max)%max

		$$('.home-project-nav .-nav')[i].click()
	})
</script>