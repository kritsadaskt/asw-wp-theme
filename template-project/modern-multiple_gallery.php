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

<section id="multiple_gallery" class="section-fade is-on-nav is-on-nav-mob">
	<div class="-container -mx-auto hidden xl:block">
		<div class="gallery-container-wrap">
			<div class="gallery-header">
				<h1 class="text-section-title py-12 px-16 gal-title"><?php pll_e('แกลเลอรี')?></h1>
			</div>
			<div class="gallery-tabs">

				<div class="info-tabs-block-wrap" style="width: max-content;">
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
					$chk = ofsize($mtp_gll_v['gallery']);
					$gll = $mtp_gll_v['gallery'];
					($mtp_gll_k == 0) ? $tab_show = 1:$tab_show = 0;
					?>

					<div class="gallery-container-tab-body" data-gll-tab="<?=$mtp_gll_k?>" data-tab-show="<?=$tab_show?>">
						<?php
						if ($chk == 1) {
							?>
							<style>
							.gallery-pic .-item-1 {
								padding-top: 44.44%;
							}</style>
							<div class="gallery-pic">
								<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
							</div>

							<?php
						} else if ($chk == 2) {
							?>
							<style>
							.gallery-items:nth-child(1) {
								grid-column: span 2;
								/* grid-row: span 2; */
							}

							.gallery-items:nth-child(2) {
								grid-column: span 1;
								/* grid-row: span 2; */
							}

							.gallery-pic .-item-1 {
								padding-top: 66.95%;
							}

							.gallery-pic .-item-2 {
								padding-top: 135.57%;
							}</style>
							<div class="gallery-items-wrap">
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
									</div>
								</div>
							</div>
							<?php
						} else if ($chk == 3) {
							?>
							<style>
							.gallery-pic .-item-1 {
								padding-top: 135.57%;
							}

							.gallery-pic .-item-2 {
								padding-top: 135.57%;
							}

							.gallery-pic .-item-3 {
								padding-top: 135.57%;
							}</style>
							<div class="gallery-items-wrap">
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[2]) ?>)"></div>
									</div>
								</div>
							</div>
							<?php
						} else if ($chk == 4) {
							?><style>
							.gallery-items:nth-child(1) {
								grid-column: span 3;
							}

							.gallery-pic .-item-1 {
								padding-top: 32%;
							}

							.gallery-pic .-item-2 {
								padding-top: 41.34%;
							}

							.gallery-pic .-item-3 {
								padding-top: 41.34%;
							}

							.gallery-pic .-item-4 {
								padding-top: 41.34%;
							}</style>
							<div class="gallery-items-wrap">
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[2]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-4 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[3]) ?>)"></div>
									</div>
								</div>
							</div>
							<?php
						} else if ($chk > 5 or $chk == 5) {
							?>
							<style>
							.gallery-items:nth-child(1) {
								grid-column: span 2;
							}

							.gallery-pic {
								position: relative;
							}

							.gallery-pic .-item-1 {
								padding-top: 45.36%;
							}

							.gallery-pic .-item-2 {
								padding-top: 91.87%;
							}

							.gallery-pic .-item-3 {
								padding-top: 41.34%;
							}

							.gallery-pic .-item-4 {
								padding-top: 41.34%;
							}

							.gallery-pic .-item-5 {
								position: relative;
								padding-top: 41.34%;
							}

							.gallery-pic .-more {
								position: absolute;
								display: flex;
								top: 0;
								left: 0;
								height: 100%;
								width: 100%;
								color: #fff;
								background-color: #202831cc;
								align-items: center;
								justify-content: center;
								pointer-events: none;
							}

							.gallery-pic .-more img {
								height: 46px;
								width: auto;
								margin: 0;
								margin-right: 16px;
							}</style>
							<div class="gallery-items-wrap">
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[2]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-4 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[3]) ?>)"></div>
									</div>
								</div>
								<div class="gallery-items">
									<div class="gallery-pic">
										<div class="-item-5 -hover jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[4]) ?>)"></div>
										<?php if ($chk > 5) : ?>
											<div class="-more">
												<img src="/wp-content/uploads/2023/03/Group-1250.png" alt="">
												<h6>ดูเพิ่มเติม</h6>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php
							if ($chk > 5) {
								for($i = 5;$i<$chk;$i++){
									?>
									<span class="jb-lightbox" data-jb-lightbox="d-<?=$mtp_gll_k?>" style="--img: url(<?= acf_img($gll[$i]) ?>)"></span>
									<?php
								}
							}
						}
						?>
					</div>
					<?php
				}
				?>
			</div>

		</div>
	</div>
	<div class="-container -mx-auto block xl:hidden">
		<div class="gallery-mob-header">
			<h1 class="gal-title">แกลเลอรี</h1>
		</div>
		<div class="gallery-container-mob-wrap">
			<?php
			if ($chk == 1) {
				?>
				<style>
				.gallery-mob-items {
					grid-column: span 2;
				}

				.gallery-mob-pic .-item-1 {
					padding-top: 48.83%;
				}
			</style>
			<div class="gallery-items-mob-wrap">
				<div class="gallery-mob-items">
					<div class="gallery-mob-pic">
						<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
					</div>
				</div>
			</div>
			<?php
		} else if ($chk == 2) {
			?>
			<style>
			.gallery-mob-items {
				grid-column: span 2;
			}

			.gallery-mob-items .-item-1 {
				padding-top: 48.83%;
			}

			.gallery-mob-items .-item-2 {
				padding-top: 48.83%;
			}
		</style>
		<div class="gallery-items-mob-wrap">
			<div class="gallery-mob-items">
				<div class="gallery-mob-pic">
					<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
				</div>
			</div>
			<div class="gallery-mob-items">
				<div class="gallery-mob-pic">
					<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
				</div>
			</div>
		</div>
		<?php
	} else if ($chk > 3 or $chk == 3) {
		?>
		<style>
		.gallery-mob-items:nth-child(1) {
			grid-column: span 2;
		}

		.gallery-mob-pic {
			position: relative;
		}

		.gallery-mob-items .-item-1 {
			padding-top: 48.83%;
		}

		.gallery-mob-items .-item-2 {
			padding-top: 52.38%;
		}

		.gallery-mob-items .-item-3 {
			padding-top: 52.38%;
		}

		.gallery-mob-pic .-more {
			position: absolute;
			display: flex;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			color: #fff;
			background-color: #202831cc;
			align-items: center;
			justify-content: center;
		}

		.gallery-mob-pic .-more img {
			height: 30px;
			width: auto;
			margin: 0;
			margin-right: 8px;
		}
	</style>
	<div class="gallery-items-mob-wrap">
		<div class="gallery-mob-items">
			<div class="gallery-mob-pic">
				<div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[0]) ?>)"></div>
			</div>
		</div>
		<div class="gallery-mob-items">
			<div class="gallery-mob-pic">
				<div class="-item-2 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[1]) ?>)"></div>
			</div>
		</div>
		<div class="gallery-mob-items">
			<div class="gallery-mob-pic">
				<div class="-item-3 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[2]) ?>)">
					<?php if ($chk > 3) : ?>
						<div class="-more">
							<img src="/wp-content/uploads/2023/03/Group-1250.png" alt="">
							<h6>ดูเพิ่มเติม</h6>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
	if ($chk > 3) {
		for($i = 3;$i<$chk;$i++){
			?>
			<span class="jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($gll[$i]) ?>)"></span>
			<?php
		}
	}
}
?>
</div>
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