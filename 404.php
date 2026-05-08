<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package seed
 */
// $current_slug = add_query_arg(array(), $wp->request);
// $current_slug_ar = explode('/', $current_slug);
// if ($current_slug_ar[0] == 'th') {
//     $new_slug = '';
//     foreach ($current_slug_ar as $key => $value) {
//         if ($key>0) {
//             $new_slug .= '/'.$value;
//         }
//     }
//     header("HTTP/1.1 301 Moved Permanently");
//     header("Location: ".$new_slug);
//     exit();
//     die();
// }
get_header();?>

<style type="text/css">
    a.btn.btn-home{
        background-color: #123F6D;
        padding: 8px 34px;
        font-weight: 400;
    }
</style>
<div class="s-container main-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main text-center pb-16">

            <img src="/wp-content/uploads/2023/05/404-e1684465320138.jpg" >
            <h5 class="mb-2"><?php pll_e('ขออภัย ไม่พบหน้าที่คุณค้นหา?') ?> </h5>
            <div><?php pll_e('กรุณาตรวจสอบความถูกต้องที่อยู่บนเว็บไซต์ หรือลองค้นหาในรูปแบบอื่นๆ เพื่อค้นหาโครงการหรือทำเลที่คุณสนใจ') ?> </div>
            <div class="mt-8">
                <a href="#!" class="btn btn-home">
                 <?php pll_e('กลับสู่หน้าแรก') ?> 
             </a>
         </div>
     </main>
 </div>
</div>

<?php get_footer();?>