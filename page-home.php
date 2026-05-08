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
global $masthead;
?>
<?php
get_header();
?>
<?php 
if ($_GET['dev'] == 2) {
    get_template_part( 'template-parts/site','home-2');
}else{
    get_template_part( 'template-parts/site','home');
}


?>
<?php get_footer() ?>