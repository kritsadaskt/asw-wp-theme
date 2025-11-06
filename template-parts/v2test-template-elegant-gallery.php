<?php
$content = $args[0];
$f = $args[1];
$v2_content = get_field('v2_content');
$content = $v2_content[5];
?>


<!-- For Gallery section -->
<style type="text/css">
	#gallery .bg-cover {
		background-image: var(--img);
	}

	.scroll-gal {
		display: flex;
		flex-wrap: nowrap;
		flex-direction: row;
		background-color: rgba(255, 255, 255, 0);
		overflow-x: auto;
		scroll-behavior: smooth;
	}

	.modal-column {
		flex: 0 0 auto;
		width: auto;
		height: 92px;
		max-width: 100%;
		padding: 10px;
	}

	.modal-nav-img {
		margin-top: 0;
	}

	.mySlides img {
		width: 100%;
		height: 100%;
		object-fit: contain;
	}

	.gallery-mobile,
	.pad-53 {
		display: none;
	}

	.pad-bot {
		display: block;
	}

	@media (max-width: 767px) {
		.gallery-desktop {
			display: none;
		}

		.gallery-mobile {
			display: block;
			height: 335px;
			padding-bottom: 53px;
		}

		.modal-img-content {
			position: relative;
			background-color: rgba(255, 255, 255, 0);
			margin: auto;
			padding: 0;
			top: 0vw;
			width: 100%;
			max-width: 1200px;
		}

		.mySlides {
			height: 450px;
			background-color: rgba(255, 255, 255, 0);
		}

	}

	.-jbl-gll-draw-rail-i {
		box-shadow: 0px 0px 0px 0px var(--mc-main-1) inset !important;
	}

	.-jbl-gll-draw-rail-i[data-active="1"] {
		box-shadow: 0px 0px 0px 3px var(--mc-main-1) inset !important;
	}

	#gallery .view-img {
		display: flex;
		opacity: 0;
		background-color: #141414;
		/*opacity: 0.6;*/
		top: 0;
		width: 100%;
		height: 100%;
		position: absolute;
		color: white;
		font-size: 26px;
		font-weight: 300;
		line-height: 32px;
		align-items: center;
		text-align: center;
		justify-content: center;
		margin: auto;
		transition: all .5s;
	}

	#gallery .jb-lightbox:hover .view-img {
		opacity: 0.6;
	}

	#gallery .view-img img {
		margin: 0rem;
		margin-right: 11px;
		display: inline;
	}

	.title-gal {
		color: var(--mc-main-3);
	}
	/*-- Mobile Version --*/
	@media (max-width: 1319px) {
		.title-gal {
			font-size: 38px !important;
			line-height: 40px;
			padding-top: 43px;
			padding-bottom: 13px;
		}

		.pad-bot {
			display: none;
		}

		.pad-53 {
			padding-bottom: 43px;
			display: block;
		}
	}
</style>

<section id="gallery" class="is-on-nav section-fade is-on-nav-mob">
	<div>
		<h1 class="text-center py-10 pb-6 title-gal">แกลเลอรี</h1>
		<?php
		$chk = ofsize($content['gallery']);
		?>
		<div class="gallery-desktop">
			<?php
			if ($chk == 1) { ?>
				<div class="grid grid-cols-2 md:grid-rows-2 md:grid-cols-2 md:gap-6 gap-2 container md:mx-auto">
					<div data-jb-lightbox="d" class="jb-lightbox md:row-start-1 md:col-start-1 md:row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery'][0]['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk == 2) { ?>
				<div class="grid grid-rows-2 grid-cols-4 md:gap-6 gap-2">
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-3 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk == 3) { ?>
				<div class="grid grid-rows-2 grid-cols-3 md:gap-2.5 gap-2">
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-2 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['2']['url'] ?>);cursor: pointer;height: 100%" onclick="openModal();currentSlide(2)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk == 4) { ?>
				<div class="grid grid-rows-3 grid-cols-4 md:gap-2 gap-2 container mx-auto">
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-3 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-2 row-span-3 col-span-3 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['3']['url'] ?>);cursor: pointer;height: 100%;" onclick="openModal();currentSlide(3)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php }
			if ($chk > 5 or $chk == 5) { ?>
				<div class="grid grid-flow-col grid-cols-12 grid-rows-2 gap-2">
					<div data-jb-lightbox="d" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $content['gallery'][1]['url'] ?>);">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $content['gallery'][2]['url'] ?>);">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox row-span-2 col-span-6 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $content['gallery'][0]['url'] ?>);">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $content['gallery'][3]['url'] ?>);">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="d" class="jb-lightbox col-span-3 bg-cover blank h-full pointer" ratio="16:10" style="--img: url(<?= $content['gallery'][4]['url'] ?>);">
						<?php if ($chk == 5) { ?>
							<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
						<?php } ?>
						<?php if ($chk > 5) { ?>
							<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #141414;opacity: 0.6;"></div>
							<div class="centered">
								<h3 class="">+ <?= $chk - 5 ?></h3>
							</div>
							<?php for ($i = 5; $i < $chk; $i++) { ?>
								<div data-jb-lightbox="d" class="jb-lightbox" style="--img: url(<?= $content['gallery'][$i]['url'] ?>);"></div>
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
					<div data-jb-lightbox="m" class="jb-lightbox md:row-start-1 md:col-start-1 md:row-span-2 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery'][0]['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk == 2) { ?>
				<div class="grid grid-rows-2 grid-cols-12 md:gap-6 gap-2">
					<div data-jb-lightbox="m" class="jb-lightbox row-start-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="m" class="jb-lightbox row-start-2 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk == 3) { ?>
				<div class="grid grid-rows-2 grid-cols-12 md:gap-2 gap-2 container mx-auto">
					<div data-jb-lightbox="m" class="jb-lightbox row-start-1 row-span-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="m" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="m" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				</div>
			<?php } else if ($chk >= 3) { ?>
				<div class="grid grid-rows-2 grid-cols-12 md:gap-2 gap-2 container mx-auto">
					<div data-jb-lightbox="m" class="jb-lightbox row-start-1 row-span-1 col-span-12 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['0']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(0)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="m" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['1']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(1)">
						<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
					<div data-jb-lightbox="m" class="jb-lightbox row-start-2 col-span-6 bg-cover blank" ratio="16:9" style="--img:url(<?= $content['gallery']['2']['url'] ?>);cursor: pointer;" onclick="openModal();currentSlide(2)">
						<?php if ($chk == 3) { ?>
							<div class="view-img"><img src="/wp-content/uploads/2023/03/Group-1048.png">View Image</div>
					</div>
				<?php } ?>
				<?php if ($chk > 3) { ?>
					<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #141414;opacity: 0.6;"></div>
					<div class="centered">
						<h3 class="">+ <?= $chk - 3 ?></h3>
					</div>
					<?php for ($i = 3; $i < $chk; $i++) { ?>
						<div data-jb-lightbox="m" class="jb-lightbox" style="--img: url(<?= $content['gallery'][$i]['url'] ?>);"></div>
					<?php } ?>
				<?php } ?>

				</div>
		</div>
	<?php }
	?>
	</div>
	<div class="py-10 pad-bot"></div>
	<div class="pad-53"></div>
	</div>

</section>
<?php theme_overide_style($content) ?>