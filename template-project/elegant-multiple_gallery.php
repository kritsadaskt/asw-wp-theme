<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
// pre($content);
$mtp_gll = $content['multiple_gallery'];
?>
<section id="gallery" class="is-on-nav section-fade is-on-nav-mob">
	<div>
		<h1 class="text-center py-10 pb-6 title-gal"><?php pll_e('แกลเลอรี')?></h1>
		<div class="gallery-tabs">

			<div class="info-tabs-block-wrap pb-8" style="width: max-content;">
				<div class="info-tabs-block mtl_gll-tabs-override">
					<div class="info-tabs-block-arrow -left"></div>
					<div class="info-tabs-blocks">
						<div class="info-tabs-rail">
							<?php 
							foreach ($mtp_gll as $mtp_gll_k => $mtp_gll_v) {
								($mtp_gll_k == 0) ? $active = '-active':$active = '';
								($mtp_gll_k == 0) ? $line_class = 'hidden':$line_class = '';
								?>
								<div class="-line <?=$line_class?>"></div>
								<div class="info-tab <?=$active?>" data-i="<?=$mtp_gll_k?>" onclick="mtp_tab_change(<?=$mtp_gll_k?>)">
									<h6 class="info-tab-txt"><?=$mtp_gll_v['tab_name']?></h6>
								</div>

								<?php
							}
							?>
						</div>
					</div>
					<div class="info-tabs-block-arrow -right"></div>
				</div>
			</div>
		</div>
		<div class="gallery-container">
			<?php 
			foreach ($mtp_gll as $mtp_gll_k => $mtp_gll_v) {
				$gll = $mtp_gll_v['gallery'];
				$chk = ofsize($gll);
				($mtp_gll_k == 0) ? $tab_show = 1:$tab_show = 0;
				?>
				<div class="gallery-container-tab-body" data-gll-tab="<?=$mtp_gll_k?>" data-tab-show="<?=$tab_show?>">
					<div class="gallery-desktop">
						<?php
						if ($chk == 1) { ?>
							<div class="grid grid-cols-2 md:grid-rows-2 md:grid-cols-2 md:gap-6 gap-2 container md:mx-auto">
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox md:row-start-1 md:col-start-1 md:row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk == 2) { ?>
							<div class="grid grid-rows-2 grid-cols-4 md:gap-6 gap-2">
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-3 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk == 3) { ?>
							<div class="grid grid-rows-2 grid-cols-3 md:gap-2.5 gap-2">
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-2 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[2]['sizes']['1536x1536'] ?>);cursor: pointer;height: 100%" onclick="openModal();currentSlide(2)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk == 4) { ?>
							<div class="grid grid-rows-3 grid-cols-4 md:gap-2 gap-2 container mx-auto">
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-3 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[2]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-start-2 row-span-3 col-span-3 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[3]['sizes']['1536x1536'] ?>);cursor: pointer;height: 100%;" onclick="openModal();currentSlide(3)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php }
						if ($chk > 5 or $chk == 5) { ?>
							<div class="grid grid-flow-col grid-cols-12 grid-rows-2 gap-2">
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $gll[1]['sizes']['1536x1536'] ?>);">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $gll[2]['sizes']['1536x1536'] ?>);">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox row-span-2 col-span-6 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $gll[0]['sizes']['1536x1536'] ?>);">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $gll[3]['sizes']['1536x1536'] ?>);">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $gll[4]['sizes']['1536x1536'] ?>);">
									<?php if ($chk == 5) { ?>
										<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
									<?php } ?>
									<?php if ($chk > 5) { ?>
										<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #141414;opacity: 0.6;"></div>
										<div class="centered">
											<h3 class="text-white">+ <?= $chk - 5 ?></h3>
										</div>
										<?php for ($i = 5; $i < $chk; $i++) { ?>
											<div data-jb-lightbox="d-<?=$mtp_gll_k?>" class="jb-lightbox" style="--img: url(<?= $gll[$i]['sizes']['1536x1536'] ?>);"></div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						<?php }
						?>
					</div>
					<div class="gallery-mobile">
						<?php
						if ($chk == 1) { ?>
							<div class="grid grid-cols-12 md:grid-rows-2 md:grid-cols-12 md:gap-6 gap-2 md:mx-auto">
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox md:row-start-1 md:col-start-1 md:row-span-2 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk == 2) { ?>
							<div class="grid grid-rows-2 grid-cols-12 md:gap-6 gap-2">
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk == 3) { ?>
							<div class="grid grid-rows-2 grid-cols-12 md:gap-2 gap-2 container mx-auto">
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 row-span-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[2]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
							</div>
						<?php } else if ($chk >= 3) { ?>
							<div class="grid grid-cols-12 md:gap-2 gap-2 container mx-auto">
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-1 row-span-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[0]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[1]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
									<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
								</div>
								<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $gll[2]['sizes']['1536x1536'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
									<?php if ($chk == 3) { ?>
										<div class="view-img">
											<img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
										</div>
									<?php } ?>
									<?php if ($chk > 3) { ?>
										<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #141414;opacity: 0.6;"></div>
										<div class="centered">
											<h3 class="text-white">+ <?= $chk - 3 ?></h3>
										</div>
										<?php for ($i = 3; $i < $chk; $i++) { ?>
											<div data-jb-lightbox="m-<?=$mtp_gll_k?>" class="jb-lightbox" style="--img: url(<?= $gll[$i]['sizes']['1536x1536'] ?>);"></div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						<?php }
						?>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<div class="py-10 pad-bot"></div>
		<div class="pad-53"></div>
	</div>
</section>

<script type="text/javascript">
	function mtp_tab_change(i){
		let tbody = $$('.gallery-container-tab-body')
		for(let k of tbody){
			k.dataset.tabShow = 0
		}
		$(`.gallery-container-tab-body[data-gll-tab="${i}"`).dataset.tabShow = 1
		let tactive = $(`#multiple_gallery .info-tab.-active`)
		if (tactive != null) {
			tactive.classList.remove('-active')
		}
		$(`#multiple_gallery .info-tab[data-i="${i}"`).classList.add('-active')

	}
</script>