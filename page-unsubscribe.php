<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

get_header();
global $pagewidth;
$pagewidth = get_field('pagewidth');
if ($pagewidth === null) {
	$pagewidth = 's-container';
}
?>
<?php while ( have_posts() ) : the_post(); ?>
	<style type="text/css">
		.unsub-btn{
			background: #123F6D;
			border-radius: 8px;
			font-size: 26px;
			line-height: 32px;
			color: #fff;
			padding: 8px 34px;
			display: inline-block;
			cursor: pointer;
		}
		.unsub-input{
			width: 100% !important;
			max-width: 100% !important;
			margin: 0;
			height: 48px;
			background: #FFFFFF;
			border: 1px solid #DFE3E8;
			border-radius: 8px;
			font-size: 22px;
			margin-bottom: .5rem;
		}
		.unsub-img{
			width: 380px;
			margin-bottom: 28px;
			margin-top: 68px;
		}
		body,div#content{
			background-color: #f7f9fb;
		}
		.link-veri{
			color: #11B6B1;
			font-weight: bold;
		}
		.not-found{
			color: #E24646;
			text-align: left;
		}
		form.error input.unsub-input{
			border-color: #E24646;
		}
		.main-unsub {
			max-width: 640px;
			width: 100%;
			margin: auto;
		}
		@media (max-width: 768px) {
			.unsub-btn{
				width: 100%;
			}
		}
	</style>

	<div class="<?=$pagewidth?> main-body">

		<div id="primary" class="content-area">
			<main id="main" class="site-main -hide-title">
				<div class="main-unsub">
					<?php if ($_GET['confirm_action'] != 'true'): ?>
						<img src="https://dev.assetwise.co.th/wp-content/uploads/2023/06/CleanShot-2566-06-06-at-20.04.55@2x.png" class="unsub-img">
						<h2 class="text-center"><?=get_the_title()?></h2>
						<p class="mb-8 text-center font-light"><?php pll_e('ระบบจะทำการยกเลิกข่าวสารที่ท่านสมัครไว้กับทาง แอดแอสเซทไวส์ ต้องขออภัยมา ณ โอกาสนี้ ที่ข่าวสารทางบริษัทไปรบกวนท่านในระยะเวลาที่ผ่านมา')?></p>
						<div class="text-center mb-6 max-w-xl mx-auto">
							<form method="get">
								<input type="email" name="email" class="unsub-input" placeholder="อีเมลของคุณ" value="<?=$_GET['email']?>">
								<input type="hidden" name="confirm_action" value="true">
								<button class="unsub-btn mt-6 mb-10"><?php pll_e('ยกเลิกการสมัครรับข้อมูล')?></button>
							</form>
						</div>
					<?php endif ?>

					<?php if ($_GET['confirm_action'] == 'true'): 
						$found = 0;
						$form_id = 11105;
						$posts = $wpdb->get_results("SELECT * FROM wp_db7_forms WHERE form_post_id = $form_id");
						$t_mail = strtolower($_GET['email']);
						foreach ($posts as $i => $data) {
							$v = maybe_unserialize( $data->form_value );
							$submit_id = $data->form_id;
							if (is_array($v)) {
								$f_mail = strtolower($v['Email']);
								if ($f_mail == $t_mail) {
									$found++;
									$table = 'wp_db7_forms';
									$where = array("form_id"=>$submit_id);
									$update = $wpdb->delete( $table, $where);
								}
							}
						}
						if ($found>0) {
							?>
							<img src="https://dev.assetwise.co.th/wp-content/uploads/2023/06/CleanShot-2566-06-06-at-20.21.37@2x.png" class="unsub-img">
							<h2 class="text-center"><?php pll_e('ขอบคุณค่ะ')?></h2>
							<div class="text-center mb-10">
								<p class="my-2  font-light"><?php pll_e('แอสเซทไวส์ ได้ยกเลิกรับข้อมูลข่าวสารของคุณเรียบร้อยแล้ว')?></p>
								<a href="/<?=pll_current_language()?>/" class="link-veri">
									<?php pll_e('กลับสู่หน้าหลัก')?>
								</a>
							</div>
							<?php
						}else{
							?>
							<img src="https://dev.assetwise.co.th/wp-content/uploads/2023/06/CleanShot-2566-06-06-at-20.04.55@2x.png" class="unsub-img">
							<h2 class="text-center"><?=get_the_title()?></h2>
							<p class="mb-8 text-center font-light"><?php pll_e('ระบบจะทำการยกเลิกข่าวสารที่ท่านสมัครไว้กับทาง แอดแอสเซทไวส์ ต้องขออภัยมา ณ โอกาสนี้ ที่ข่าวสารทางบริษัทไปรบกวนท่านในระยะเวลาที่ผ่านมา')?></p>
							<div class="text-center mb-6 max-w-xl mx-auto">
								<form method="get" class="error">
									<input type="email" name="email" class="unsub-input" placeholder="อีเมลของคุณ" value="<?=$_GET['email']?>">
									<input type="hidden" name="confirm_action" value="true">
									<div class="not-found">
										<img src="https://dev.assetwise.co.th/wp-content/uploads/2023/06/Vector.png" class="w-4 inline-block">
										<span><?php pll_e('ขออภัย! ไม่พบอีเมลนี้ในระบบ กรุณาลองใหม่อีกครั้ง')?></span>
									</div>
									<button class="unsub-btn mt-6 mb-10"><?php pll_e('ยกเลิกการสมัครรับข้อมูล')?></button>
								</form>
							</div>
							<?php
						}
						?>

					<?php endif ?>
				</div>
			</main>
		</div>
	</div>
<?php endwhile; ?>
<?php get_footer(); ?>