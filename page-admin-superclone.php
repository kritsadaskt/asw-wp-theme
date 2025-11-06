<h1>วิธีโคลน</h1>
<ol>
	<li>สร้าง draft ใหม่</li>
	<li>ตั้ง Template ให้เหมือนต้นฉบับ แต่เลือกเป็น V2</li>
	<li>ตรวจสอบภาษาให้ถูกต้อง</li>
	<li>นำ ID ต้นฉบับและอันใหม่ใส่ด้านล่าง</li>
	<li>กด Clone ระบบจะโคลนข้อมูลให้ *ยกเว้นหน้าที่แปลภาษาเพื่อไม่ให้ไปแปลโดนหน้าเก่า</li>
	<li>กดตรวจสอบทั้งสองลิงค์หลังบ้าน ว่าข้อมูลมาหรือไม่</li>
	<li>ตรวจสอบภาษาอีกครั้ง ทำการเชื่อมภาษาใหม่อีกครั้ง โดยไปยกเลิกการเชื่อมภาษาของหน้าเก่าก่อน</li></ol>
</ol>
<form method="get">
	<input type="number" name="asw_old" placeholder="ID ต้นฉบับ" value="<?=$_GET['asw_old']?>">
	<input type="number" name="asw_new" placeholder="ID อันใหม่" value="<?=$_GET['asw_new']?>">
	<button>Clone</button>
</form>

<?php 
if ($_GET['asw_old'] != '' && $_GET['asw_new'] != '') {
	$id_old = $_GET['asw_old'];
	$id_new = $_GET['asw_new'];
	if ( get_post_status( $id_old ) ) {
		if ( !get_post_status( $id_new ) ) {
			echo 'Error ไม่พบ ID อันใหม่<br>';
			die();
		}
	}else{
		echo 'Error ไม่พบ ID ต้นฉบับ<br>';
		die();
	}
	$post_type = get_post_type($id_old);
	$taxonomies = get_object_taxonomies($post_type);   
	if (($key = array_search('post_translations', $taxonomies)) !== false) {
		unset($taxonomies[$key]);
	}
	if (($key = array_search('language', $taxonomies)) !== false) {
		unset($taxonomies[$key]);
	}
	$terms_old = wp_get_post_terms($id_old,$taxonomies);
	?>
	<h2>Cloned</h2>
	<ul>
		<li>Old : <a target="_blank" href="https://dev.assetwise.co.th/wp-admin/post.php?post=<?=$id_old?>&action=edit" class="">[<?=$id_old?>] <b><?=get_the_title($id_old)?></b></a></li>
		<li>New : <a target="_blank" href="https://dev.assetwise.co.th/wp-admin/post.php?post=<?=$id_new?>&action=edit" class="">[<?=$id_new?>] <b><?=get_the_title($id_new)?></b></a></li>
	</ul>
	<h3>Taxonomy</h3>
	<ul>
		<?php
		foreach ($terms_old as $k => $v) {
			wp_set_post_terms($id_new,$v->term_id,$v->taxonomy);
			?>
			<li><?=$v->taxonomy?> → <?=$v->name?></li>
			<?php
		}
		?>
	</ul>
	<?php
	$f = get_fields($id_old);
	$pagination_arrow = $f['element']['pagination_arrow'];
	$pagination_chevron = $f['element']['pagination_chevron'];
	$lightbox_arrow = $f['element']['lightbox_arrow'];
	$template_master = array(
		'element'=>array(
			'pagination_arrow' => $pagination_arrow,
			'pagination_chevron' => $pagination_chevron,
			'lightbox_arrow' => $lightbox_arrow,
			'pagination_color' => '#ffffff',
		),
		'color_swatch' =>array(
			'menu_text' =>$f['color_swatch']['mc_5'],
			'heading_h1' =>$f['color_swatch']['mc_1'],
			'heading_h2' =>$f['color_swatch']['mc_1'],
			'heading_h3' =>$f['color_swatch']['mc_2'],
			'body_text' =>'rgba(0,0,0,1)',
			'border_color_h2' =>$f['color_swatch']['mc_5'],
		),
		'color_gradient' =>array(
			'color_start' =>$f['color_swatch']['mc_1'],
			'color_end' =>$f['color_swatch']['mc_2'],
			'degree' => 90,
		),
		'new_tab_block' =>array(
			'item_text' =>'rgba(255,255,255,0.5)',
			'item_text_hover_active' =>'rgba(255,255,255,1)',
			'border_color' =>$f['color_swatch']['mc_1'],
			'bg_color' =>$f['color_swatch']['mc_2'],
			'item_bg_hover_active_dynamic' =>$f['color_swatch']['mc_1'],
		),
		'tab_line_color' =>array(
			'color_start' =>$f['color_swatch']['mc_1'],
			'color_end' =>$f['color_swatch']['mc_2'],
			'degree' => 90,
		),
		'text_color' => array(
			'text_link' => $f['color_swatch']['mc_1'],
			'text_link_hover' => $f['color_swatch']['mc_2'],
		),
		'button_color' => array(
			'text_color' => $f['color_swatch']['mc_3'],
			'button_color' => $f['color_swatch']['mc_1'],
			'button_color_hover' => $f['color_swatch']['mc_2'],
		),
		'text_form_color' => array(
			'label_color' => $f['color_swatch']['mc_1'],
			'label_color_focus' => $f['color_swatch']['mc_1'],
			'value_color' => 'rgba(0,0,0,1)',
		),
		'form_color' => array(
			'bg_field' => 'rgba(255,255,255,0.5)',
			'bg_field_focus' => 'rgba(255,255,255,1)',
			'border_field' => $f['color_swatch']['mc_1'],
			'border_field_focus' => $f['color_swatch']['mc_2'],
		),
		'new_progress_color' => array(
			'progress_color_overall' => $f['color_swatch']['mc_2'],
			'progress_color_by_topic' => $f['color_swatch']['mc_1'],
			'number_color' => $f['color_swatch']['mc_4'],
		)
	);
	update_field('template_master',$template_master,$id_new);

	$content = $f['content'];
	$f_new = get_fields($id_new);
	$f_v2 = $f_new['v2_content'];
	pre($content);
	foreach ($content as $k => $v) {
		$c_text_color = $v['text_color'];
		$c_bg_color = $v['bg_color'];
		$c_bg_img = $v['bg_img'];
		$c_bg_img_mobile = $v['bg_img_mobile'];
		$c_css = $v['css'];
		$content[$k]['background'] = $c_bg_color;
		$content[$k]['background_image'] = $c_bg_img;
		$content[$k]['background_image_mobile'] = $c_bg_img_mobile;
		$content[$k]['css'] = $c_css;
		$content[$k]['color_swatch']['body_text'] = $c_text_color;
		$content[$k]['text_color'] = '';
		$content[$k]['bg_color'] = '';
		$content[$k]['bg_img'] = '';
		$content[$k]['bg_img_mobile'] = '';
		$content[$k]['css'] = '';
	}
	update_field('v2_content',$content,$id_new);

	

	
	$thumb_id = get_post_thumbnail_id($id_old);
	set_post_thumbnail($id_new,$thumb_id);
	$f_logo = $f['logo'];
	$f_price = $f['price'];
	$f_telephone_number = $f['telephone_number'];
	$f_line_id = $f['line_id'];
	$f_facebook = $f['facebook'];
	$f_sales_gallery = $f['sales_gallery'];
	$f_project_id = $f['project_id'];
	$f_header_code = $f['header_code'];
	$f_body_code = $f['body_code'];
	$f_footer_code = $f['footer_code'];
	$f_project_code = $f['project_code'];
	$f_compare = $f['compare'];

	update_field('logo',$f_logo,$id_new);
	update_field('price',$f_price,$id_new);
	update_field('telephone_number',$f_telephone_number,$id_new);
	update_field('line_id',$f_line_id,$id_new);
	update_field('facebook',$f_facebook,$id_new);
	update_field('sales_gallery',$f_sales_gallery,$id_new);
	update_field('project_id',$f_project_id,$id_new);
	update_field('header_code',$f_header_code,$id_new);
	update_field('body_code',$f_body_code,$id_new);
	update_field('footer_code',$f_footer_code,$id_new);
	update_field('project_code',$f_project_code,$id_new);
	update_field('compare',$f_compare,$id_new);
	
}
?>