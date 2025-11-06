<?php
/* 
Template Name: Thank You Project/Promotion
Template Post Type: house, condominium, page, promotion
*/
get_header() ?>
<?php
$f = get_fields();
?>
<style>
	#thank_you {
		background: var(--ci-blue-900);
	}
	#thank_you .container {
		width: 75%;
	}
	#thank_you .-banner {
		background-image: var(--img);
		width: 100%;
		aspect-ratio: 1/1;
		background-position: center;
		background-size: cover;
		background-repeat: no-repeat;
	}

	#thank_you .-detail {
		display: flex;
		align-items: center;
	}

	#thank_you .-block {
		padding-block: 29px;
		padding-left: 1rem;
		padding-right: 1rem;
		text-align: center;
		background: white;
		margin: -32px;
		width: 80%;
	}

	#thank_you .-logo {
		height: 60px;
		width: auto;
		margin-bottom: 16px;
	}

	#thank_you .-info-wrap {
		display: flex;
		gap: 40px;
		padding-top: 24px;
		justify-content: center;
	}

	#thank_you .-info-tel,
	#thank_you .-info-more {
		color: var(--ci-veri-500);
		display: grid;
		grid-template-columns: 24px auto;
		align-items: center;
		gap: 8px;
	}

	@media (max-width: 1023px) {
		#thank_you .container {
			width: 100%;
		}
		#thank_you .-detail {
			justify-content: center;
			margin-top: -16px;
			margin-bottom: 32px;
			padding-inline: 16px;
		}

		#thank_you .-block {
			margin: 0;
			padding-inline: 26px;
			width: 100%;
		}

		#thank_you .-info-wrap {
			gap: 16px;
		}
	}
</style>
<section id="thank_you">
	<div class="container mx-auto ">
		<div class="grid grid-cols-1 lg:grid-cols-2">
			<div class="-banner" style="--img: url(<?= acf_img($f['image']) ?>)">
			</div>
			<div class="-detail">
				<div class="-block">
					<?php if ($f['brand_logo']): ?>
						<img src="<?= acf_img($f['brand_logo']) ?>" alt="brand_logo" class="-logo">
					<?php endif ?>
					<h3>
						<?= $f['heading'] ?>
					</h3>
					<div class="sub-menu">
						<?= $f['text_body'] ?>
					</div>
					<div class="-info-wrap">
						<?php 
						if ($f['telephone']) {
							?>
							<a  href="tel:<?= $f['telephone'] ?>" class="-info-tel">
								<img src="/wp-content/uploads/2023/06/phone-contact-us.png" alt="">
								<div class="hightlight">
									<?= $f['telephone'] ?>
								</div>
							</a>
							<?php
						}
						?>
						<?php 
						if ($f['line']) {
							?>
							<a href="<?= $f['line'] ?>" class="-info-more" target="_blank">
								<img src="/wp-content/uploads/2023/06/line-contact-us.png" alt="">
								<div class="hightlight">
									<?php pll_e('สอบถามเพิ่มเติม')?>
								</div>
							</a>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
</section>
<?php get_footer() ?>