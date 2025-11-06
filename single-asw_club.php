<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

global $pagewidth;
$pagewidth = get_field('pagewidth');
if ($pagewidth === null) {
	$pagewidth = 's-container';
}
?>
<?php get_header() ?>
<style type="text/css">
	.t-center h1{
		font-size: 40px !important;
		line-height: 44px !important;
	}
	.single-area>.content-area{
		max-width: 1440px;
	}
	#txt_20 {
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: calc(28px * 2);

	}
	#txt_header{
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 2;
		-webkit-box-orient: vertical;
		height: calc(32px * 2);
	}
	@media (max-width: 1023px){
		#txt_header{
			overflow: hidden;
			text-overflow: ellipsis;
			display: -webkit-box;
			-webkit-line-clamp: 1;
			-webkit-box-orient: vertical;
			height: calc(32px * 1);
		}
	}
	.single-fim,.single-header-space,.space-before-content{
		display: none;
	}
</style>
<div style="background: linear-gradient(360deg, #EDF2F7 0%, #FFFFFF 103.44%);">
	<div class="container -bc mx-auto pt-3 xl:pt-4 truncate px-4 xl:px-0 flex flex-row items-center">
		<a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="/<?=pll_current_language()?>/club" class="cl-ci-blue-400"><?php pll_e('แอสเซทไวส์คลับ')?></a>
		<img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
		<a href="#!" class=""><?php the_title() ?></a>
	</div>

	<?php 
	$singleclass ='';
	if ($GLOBALS['s_blog_layout_single'] == 'full-width') {
		$singleclass = 'single-area';
	} 
	?>

	<?php while ( have_posts() ) : the_post(); ?>
		<?php $g = get_post();
		if ($g->post_type=='post') {
			?>
			<div class="bg-grey-2">
				<div class="cont-pd padding-vtc">
					<a href="/<?=pll_current_language()?>/club" class=""><?php pll_e('แอสเซทไวส์บล็อค')?></a> > <?php the_title() ?>
				</div>
			</div>
			<?php
		}
		?>

		<div class="main-body lg:grid grid-cols-12 gap-3 <?php echo($singleclass);?> <?php echo '-'.$GLOBALS['s_blog_layout_single']; ?>">
			<div class="col-span-2"></div>
			<div id="primary" class="content-area col-span-8">
				
				<main id="main" class="site-main -hide-title">

					<?php get_template_part( 'template-parts/content-single', get_post_type() ); ?>

					<?php if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

					<?php wp_reset_postdata(); ?>
				</main>
			</div>
		</div>
	<?php endwhile; ?>

	<?php 
	$v = get_field('gallery');

	if ($v != '') { ?>
		<section id="gallery" class="padding-xl-vtc">
			<div class="">
				<h1 class="container mx-auto px-4 xl:px-0"><?php pll_e('แกลเลอรี')?></h1>
				<sp class="l"></sp>
				<?php
				$chk = 0;
				if (is_array($v)) {
					$chk = sizeof($v);
				}


				if ($chk == 1) { ?>
					<div class="grid grid-cols-2 md:grid-rows-2 md:grid-cols-4 gap-2 container md:mx-auto xl:gap-6">
						<div data-jb-lightbox="d" class="jb-lightbox md:row-start-1 md:col-start-2 md:row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
					</div>
				<?php }
				else if ($chk == 2) { ?>
					<div class="grid grid-rows-2 grid-cols-4 gap-2 container mx-auto  xl:gap-6">
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-3 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['1']['url']?>);cursor: pointer;"></div>
					</div>
				<?php }
				else if ($chk == 3) { ?>
					<div class="grid grid-rows-2 grid-cols-3 gap-2 container mx-auto xl:gap-6">
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-2 col-span-2 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-3 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['1']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-2 col-start-3 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['2']['url']?>);cursor: pointer;"></div>
					</div>
				<?php }
				else if ($chk == 4) { ?>
					<div class="grid grid-rows-2 grid-cols-2 gap-2 container mx-auto xl:gap-6">
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-2 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['1']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-2 col-start-1 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['2']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-2 col-start-2 row-span-1 col-span-1 bg-cover blank" ratio="16:9" style="--img:url(<?= $v['3']['url']?>);cursor: pointer;"></div>
					</div>
				<?php }
				else if($chk > 5 or $chk == 5){ ?>
					<!-- desktop -->
					<div class="hidden lg:grid grid-rows-2 grid-cols-4 gap-2 container mx-auto xl:gap-6">
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['1']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-2 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['2']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 col-start-2 row-span-2 col-span-2 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-1 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['3']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="d" class="jb-lightbox row-start-2 row-span-1 col-span-1 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['4']['url']?>);cursor: pointer;">
							<?php if($chk > 5){ ?>
								<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80" ></div>
								<div class="centered"><h3 class="">+ <?= $chk-5 ?></h3></div>
								<?php 
								for($i=5;$i<$chk;$i++){
									$img = $v[$i]['url'];
									echo "<span data-jb-lightbox='d' class='jb-lightbox' style='--img:url($img)'></span>";
								}
								?>
							<?php } ?>
						</div>
					</div>
					<!-- Mobile && Tablet -->
					<div class="lg:hidden grid grid-rows-6 grid-cols-12 gap-2 container mx-auto">
						<div data-jb-lightbox="m" class="jb-lightbox row-start-1 row-span-4 col-span-8 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['1']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="m" class="jb-lightbox col-start-9 row-span-2 col-span-4 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['2']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="m" class="jb-lightbox col-start-9 row-span-2 col-span-4 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['0']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="m" class="jb-lightbox row-start-5 col-start-1 row-span-3 col-span-6 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['3']['url']?>);cursor: pointer;"></div>
						<div data-jb-lightbox="m" class="jb-lightbox col-start-7 row-span-3 col-span-6 bg-cover blank h-full" ratio="16:9" style="--img:url(<?= $v['4']['url']?>);cursor: pointer;">
							<?php if($chk > 5){ ?>
								<div style="position: absolute;top: 0;width: 100%;height: 100%;background-color: #055E5B80" ></div>
								<div class="centered"><h3 class="">+ <?= $chk-5 ?></h3></div>
								<?php 
								for($i=5;$i<$chk;$i++){
									$img = $v[$i]['url'];
									echo "<span data-jb-lightbox='m' class='jb-lightbox' style='--img:url($img)'></span>";
								}
								?>
							<?php } ?>
						</div>
					</div>
				<?php }
				?>
			</div>
			<style type="text/css">
				.scroll-gal{
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
					height: 150px;
					max-width: 100%;
					padding: 10px;
				}
				.modal-nav-img{
					margin-top: 0;
				}

				@media (max-width: 767px){
					
					.modal-img-content{
						position: relative;
						background-color: rgba(255, 255, 255, 0);
						margin: auto;
						padding: 0;
						top: 0vw;
						width: 100%;
						max-width: 1200px;
					}
					.mySlides{
						height: 450px;
						background-color: rgba(255, 255, 255, 0);
					}
					
				}

			</style>
			<div id="Modal-img" class="modal-img scroll-hid" style="z-index: 10000;">
				<div class="modal-nav" style="">
					<div class="s-container grid grid-cols-12 gap-4 ">
						<div class="col-span-9 lg:col-span-11"></div>
						<div class="col-span-3 lg:col-span-1">
							<div class="modal-nav-img">
								<img src="/wp-content/uploads/2022/11/download_icon.png" class="pointer">
								<img src="/wp-content/uploads/2022/11/exit_icon.png" onclick="closeModal()" class="pointer">
							</div>
						</div>
					</div>
				</div>
				<!-- <span class="close cursor" onclick="closeModal()">&times;</span> -->

				<div class="modal-img-content">
					<?php
					$chk = count($v);
					foreach ($v as $key => $value) { ?>
						<div class="mySlides">
							<!-- <div class="numbertext"><?= $key+1 ?> / <?= $chk ?></div> -->
							<img src="<?= $value['url']?>" style="width:100%">
						</div>
					<?php }

					?>

					<img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="prev hidden md:block" onclick="plusSlides(-1)">
					<img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="next hidden md:block" onclick="plusSlides(1)">

					<?php if ($chk < 5) {
						?>
						<div class="scroll-gal justify-start md:justify-center scroll-hid">
							<?php
						} else {
							?>
							<div class="scroll-gal scroll-hid">
								<?php
							}
							?>
							<?php 
							foreach ($v as $key => $value){ ?>
								<div class="modal-column">
									<img id="img-mo-<?=$key?>" class="demo-modal" src="<?= $value['url']?>" onclick="currentSlide(<?= $key ?>)">
								</div>
							<?php }
							?>
						</div>


					</div>
				</div>

			</section>
			<?php
		} ?>
	</div>
	

	<?php 
	$v = get_field('relationship');

	if ($v != '') { ?> 
		<sp class="xl"></sp>
		<section id="info_asw_club" class="padding-l-vtc">
			<div class="container mx-auto px-4 xl:px-0">
				<div class="grid grid-cols-3">
					<div class="col-span-2">
						<h1 class="">
							<?php
							$t = wp_get_post_terms( $post->ID, 'club_type');
							$txt = $t[0]->slug;
							switch ($txt) {
								case 'club-news': $txt="ข่าวสาร"; break;
								case 'club-benefit': $txt="สิทธิประโยชน์"; break;
								case 'club-activity': $txt="กิจกรรม"; break;
								default: break;
							}
							echo $txt . "อื่น ๆ จากแอสเซทไวส์คลับ";
							?>
						</h1>
					</div>
					<div class="col-span-1 flex items-center justify-end">
						<a  class="see-more selected-all f30-28 cl-ci-blue-300" href="/club" style="overflow: visible !important; color: var(--ci-blue-300); font-weight: 500;"><?php pll_e('ดูทั้งหมด')?>
							<img src="/wp-content/uploads/2022/09/arrow-r-main.png" class="inline-block" style="width:35px">
						</a>
					</div>
				</div>
				<sp class="h-6 xl:h-12"></sp>

				<style type="text/css">
					.club-nav{
						display: none;
						justify-content: center;
					}
					.club-nav .-nav{
						width: 32px;
						height: 32px;
						display: flex;
						align-items: center;
						margin: 0 3px;
						cursor: pointer;
					}
					.club-nav .-nav div{
						width: 100%;
						height: 1px;
						background-color:#828A92;
						transition: all .3s;
					}
					.club-nav .-nav.-active div{
						height: 4px;
						background-color:#3A638E
					}

					#info_asw_club .bg-ci-grey-900 .bg-cover {
						transition: all .8s;
						transform: scale(1);
					}
					#info_asw_club .bg-ci-grey-900:hover .bg-cover {
						transition: all .8s;
						transform: scale(1.05);
					}
					#info_asw_club .bg-ci-grey-900 sp.s {
						transition: all .8s;
					}
					#info_asw_club .bg-ci-grey-900:hover sp.s {
						width: 100% !important;
					}

					.row-span-5 > p {
						display: none;
					}
					@media (max-width: 640px){
						.club-cards-wrap{
							--max: 3;
							--i: 0;
							display: grid;
							grid-template-columns: repeat(var(--max), calc(100%));
							grid-column-gap: 20px;
							position: relative;
							transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
							left: calc(var(--i) * -100% - (var(--i) * 19.5px));
							width: 100%;
						}
						.club-nav{
							display: flex;
						}
					}

				</style>
				<div class="">
					<div class="grid club-cards-wrap sm:grid-cols-3 gap-7">
						<?php
						foreach ($v as $key => $value) {
							$data = get_postdata( $value->ID );
						// pre($value);
							$cate_name = wp_get_post_terms( $value->ID, 'club_type'); ?>
							<div class="col-span-1 ani-club" data-show="0" data-x="null">
								<div class="grid grid-rows-12 bg-ci-grey-900 px-4 py-6">

									<a href="<?=$value->guid?>" class="">
										<div class="<?php if($key%2 == 1){echo 'flex flex-col-reverse';} ?>">
											
											<div class="overflow-hidden">
												<div class="bg-cover blank row-span-6" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'large') ?>')"></div>
											</div>
											<div class="row-span-5">
												<?php if($key%2 != 1){echo '<sp class="" style="height: 18px;"></sp>';} ?>
												<span class="tag cl-ci-orange-500" style="font-weight: 700;">
													<?php
													$txt = $cate_name[0]->slug;
													switch ($txt) {
														case 'club-news': $txt="ข่าวสาร"; break;
														case 'club-benefit': $txt="สิทธิประโยชน์"; break;
														case 'club-activity': $txt="กิจกรรม"; break;
														default: break;
													}
													echo $txt;
													?>
												</span>
												<sp class="vs"></sp>
												<h5 id="txt_header" class=""><?= $data['Title'] ?></h5>
												<sp class=""></sp>
												<span id="txt_20" class="cl-ci-grey-300">
													<?= $data['Content'] ?>
												</span>
												<sp class=""></sp>
												<a href="<?=$value->guid?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
												<sp class=""></sp>
												<sp class="bg-ci-orange-500 s" style="height: 4px; width: 15%"></sp>
												<sp></sp>
											</div>
										</a>
									</div>
									<div class="club-date-sp"></div>
									<?php if($key%2 == 1){echo '<sp class="" style="height: 18px"></sp>';} ?>

									<div class="row-span-1 cl-ci-grey-300 club-date">
										<i class="far fa-clock size-m pr-1"></i>
										<?php
										$date = strtotime($data['Date']);
										$month = gmdate("F", $date);
										switch ($month)
										{
											case "January" : $month="มกราคม"; break;
											case "February" : $month="กุมภาพันธ์"; break;
											case "March" : $month="มีนาคม"; break;
											case "April" : $month="เมษายน"; break;
											case "May" : $month="พฤษภาคม"; break;
											case "June" : $month="มิถุนายน"; break;
											case "July" : $month="กรกฎาคม"; break;
											case "August" : $month="สิงหาคม"; break;
											case "September" : $month="กันยายน"; break;
											case "October" : $month="ตุลาคม"; break;
											case "November" : $month="พฤศจิกายน"; break;
											case "December" : $month="ธันวาคม"; break;
										}
										$year = gmdate("Y", $date);
										$year = (int)$year + 543;
										echo gmdate("d", $date) ." ". $month ." ". $year;
										?>
									</div>
								</div>
							</div>

						<?php }
						?>
					</div>
					<div class="club-nav">
						<?php if($key >= 0){echo '<div class="-nav -active" onclick="clubNav(0,this)"><div></div></div>';}?>
						<?php if($key >= 1){echo '<div class="-nav" onclick="clubNav(1,this)"><div></div></div>';}?>
						<?php if($key == 2){echo '<div class="-nav" onclick="clubNav(2,this)"><div></div></div>';}?>
					</div>
				</div>
				<script type="text/javascript">
					function clubNav(num,el){
						document.querySelector('.club-cards-wrap').style.setProperty("--i",num);
						for (let i of document.querySelectorAll('.club-nav .-nav')) {
							i.classList.remove('-active')
						}
						el.classList.add('-active')
					}
				</script>
			</div>
		</section>

	<sp class="xl"></sp>

	<?php }
	?>

	<?= get_template_part('template-parts/site-share', 'content'); ?>
	
	<?php get_footer(); ?>

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
			ttt[i].innerHTML = txt_shorter(ttt[i].innerHTML, 134);
		}

		</script>