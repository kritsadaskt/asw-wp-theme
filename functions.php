<?php

/**
 * seed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seed
 */

/**
 * Add S3 URL to upload directory
 */
add_filter( 'upload_dir', function( $uploads ) {
    $s3_url = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads';
    $uploads['baseurl'] = $s3_url;
    $uploads['url'] = $s3_url . $uploads['subdir'];
    return $uploads;
} );

/* LAYOUT */
if (!isset($GLOBALS['s_blog_layout'])) {
    $GLOBALS['s_blog_layout']          = 'full-width';
}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_layout_single'])) {
    $GLOBALS['s_blog_layout_single']   = 'full-width';
}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_blog_columns_m'])) {
    $GLOBALS['s_blog_columns_m']       = '1';
}             // 1,2,3
if (!isset($GLOBALS['s_blog_columns_d'])) {
    $GLOBALS['s_blog_columns_d']       = '3';
}             // 1,2,3,4,5,6
if (!isset($GLOBALS['s_blog_columns_d_style'])) {
    $GLOBALS['s_blog_columns_d_style'] = 'card';
}          // list, card, caption
if (!isset($GLOBALS['s_blog_profile'])) {
    $GLOBALS['s_blog_profile']         = 'enable';
}        // disable, enable
if (!isset($GLOBALS['s_shop_layout'])) {
    $GLOBALS['s_shop_layout']          = 'full-width';
}    // full-width, leftbar, rightbar
if (!isset($GLOBALS['s_shop_pagebuilder'])) {
    $GLOBALS['s_shop_pagebuilder']     = 'disable';
}       // disable, enable
if (!isset($GLOBALS['s_logo_path'])) {
    $GLOBALS['s_logo_path']            = 'none';
}          // theme folder relative path, such as img/logo.svg .
if (!isset($GLOBALS['s_logo_width'])) {
    $GLOBALS['s_logo_width']           = '200';
}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_logo_height'])) {
    $GLOBALS['s_logo_height']          = '100';
}           // any number, use in Custom Logo
if (!isset($GLOBALS['s_thumb_width'])) {
    $GLOBALS['s_thumb_width']          = '350';
}           // any number
if (!isset($GLOBALS['s_thumb_height'])) {
    $GLOBALS['s_thumb_height']         = '184';
}           // any number
if (!isset($GLOBALS['s_thumb_crop'])) {
    $GLOBALS['s_thumb_crop']           = true;
}            // true, false
if (!isset($GLOBALS['s_title_style'])) {
    $GLOBALS['s_title_style']          = 'banner';
}        // minimal, banner

/* ADD-ON */
if (!isset($GLOBALS['s_member_url'])) {
    $GLOBALS['s_member_url']           = 'none';
}          // none, url path such as: /my-account/
if (!isset($GLOBALS['s_member_label'])) {
    $GLOBALS['s_member_label']         = 'Member';
}        // ex: Member, สมาชิก
if (!isset($GLOBALS['s_style_css'])) {
    $GLOBALS['s_style_css']            = 'disable';
}       // disable, enable
if (!isset($GLOBALS['s_jquery'])) {
    $GLOBALS['s_jquery']               = 'disable';
}       // disable, enable
if (!isset($GLOBALS['s_fontawesome'])) {
    $GLOBALS['s_fontawesome']          = 'disable';
}       // disable, enable
if (!isset($GLOBALS['s_flickity'])) {
    $GLOBALS['s_flickity']             = 'enable';
}        // disable, enable
if (!isset($GLOBALS['s_wp_comments'])) {
    $GLOBALS['s_wp_comments']          = 'disable';
}       // disable, enable
if (!isset($GLOBALS['s_admin_bar'])) {
    $GLOBALS['s_admin_bar']            = 'hide';
}          // hide, show

/* CHECK WOOCOMMERCE */
include_once ABSPATH . 'wp-admin/includes/plugin.php';
if (is_plugin_active('woocommerce/woocommerce.php')) {
    $GLOBALS['s_is_woo']       = true;
    $GLOBALS['s_member_url']   = '/my-account/';
} else {
    $GLOBALS['s_is_woo']       = false;
}

/* Admin Bar */
if ($GLOBALS['s_admin_bar'] == 'hide') {
    add_filter('show_admin_bar', '__return_false');
}

/**
 * Setup Theme
 */
if (!function_exists('seed_setup')) {
    function seed_setup()
    {
        load_theme_textdomain('seed', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('custom-logo', array(
            'width'       => $GLOBALS['s_logo_width'],
            'height'      => $GLOBALS['s_logo_height'],
            'flex-width'  => true,
            'flex-height' => true,
        ));
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size($GLOBALS['s_thumb_width'], $GLOBALS['s_thumb_height'], $GLOBALS['s_thumb_crop']);
        register_nav_menus(array(
            'primary' => esc_html__('Main Menu', 'seed'),
            'mobile'  => esc_html__('Mobile Menu', 'seed'),
        ));
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support('custom-background');
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('align-wide');
    }
}
add_action('after_setup_theme', 'seed_setup');

function seed_content_width()
{
    $GLOBALS['content_width'] = apply_filters('seed_content_width', 750);
}
add_action('after_setup_theme', 'seed_content_width', 0);

/**
 * Register widget area.
 */
function seed_widgets_init()
{
    register_sidebar(array(
        'name'          => esc_html__('Right Sidebar', 'seed'),
        'id'            => 'rightbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Left Sidebar', 'seed'),
        'id'            => 'leftbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Shop Sidebar', 'seed'),
        'id'            => 'shopbar',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Home Banner', 'seed'),
        'id'            => 'home_banner',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-title">',
        'after_title'   => '</h1>',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Page Banner', 'seed'),
        'id'            => 'page_banner',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Action', 'seed'),
        'id'            => 'action',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Mobile Menu', 'seed'),
        'id'            => 'mobile_menu',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Headbar Mobile', 'seed'),
        'id'            => 'headbar_m',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="head-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Headbar Desktop', 'seed'),
        'id'            => 'headbar_d',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="head-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<!--',
        'after_title'   => '-->',
    ));
    register_sidebar(array(
        'name'          => esc_html__('Footbar', 'seed'),
        'id'            => 'footbar',
        'description'   => '',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'seed_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function seed_scripts()
{

    wp_enqueue_style('s-mobile', get_theme_file_uri('/css/mobile.css'), array(), filemtime(get_theme_file_path('/css/mobile.css')));
    wp_enqueue_style('s-desktop', get_theme_file_uri('/css/desktop.css'), array(), filemtime(get_theme_file_path('/css/desktop.css')), '(min-width: 992px)');
    wp_enqueue_style('s-ie', get_theme_file_uri('/css/ie.css'), array(), filemtime(get_theme_file_path('/css/ie.css')), '(-ms-high-contrast: none), (-ms-high-contrast: active)');
    wp_enqueue_style('spring-jayss', get_theme_file_uri('/css/jayss2/jayss-wp.css'), array(), filemtime(get_theme_file_path('/css/jayss2/jayss-wp.css')));
    wp_enqueue_style('s-style', get_theme_file_uri('/style.css'), array(), filemtime(get_theme_file_path('/style.css')));

    if ($GLOBALS['s_style_css'] == 'enable') {
        wp_enqueue_style('s-style', get_stylesheet_uri());
    }

    if ($GLOBALS['s_is_woo']) {
        wp_enqueue_style('s-woo', get_theme_file_uri('/css/woo.css'));
    }

    if ($GLOBALS['s_fontawesome'] == 'enable') {
        wp_enqueue_style('s-fa', get_theme_file_uri('/fonts/fontawesome/css/all.min.css'), array(), '5.10.1');
    }

    if ($GLOBALS['s_flickity'] == 'enable') {
        wp_enqueue_script('s-fkt', get_theme_file_uri('/js/flickity.pkgd.min.js'), array(), '2.2.1', true);
    }

    wp_enqueue_script('s-scripts', get_theme_file_uri('/js/scripts.js'), array(), filemtime(get_theme_file_path('/js/scripts.js')), true);
    wp_enqueue_script('s-vanilla', get_theme_file_uri('/js/main-vanilla.js'), array(), filemtime(get_theme_file_path('/js/main-vanilla.js')), true);

    if ($GLOBALS['s_jquery'] == 'enable') {
        wp_enqueue_script('s-jquery', get_theme_file_uri('/js/main-jquery.js'), array('jquery'), filemtime(get_theme_file_path('/js/main-jquery.js')), true);
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'seed_scripts');

/**
 * Add backend styles for Gutenberg.
 */
add_action('enqueue_block_editor_assets', 'seed_add_gutenberg_assets');
function seed_add_gutenberg_assets()
{
    wp_enqueue_style('seed-gutenberg', get_theme_file_uri('/css/wp-gutenberg.css'), false);
}

/**
 * Admin CSS
 */
function seed_admin_style()
{
    wp_enqueue_style('seed-admin-style', get_template_directory_uri() . '/css/wp-admin.css');
}
add_action('admin_enqueue_scripts', 'seed_admin_style');


/**
 * Remove "Category: ", "Tag: ", "Taxonomy: " from archive title
 */
add_filter('get_the_archive_title', 'seed_get_the_archive_title');
function seed_get_the_archive_title($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}

/**
 * Custom WooCommerce Settings
 */
if ($GLOBALS['s_is_woo']) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Shortcode
 */
require get_template_directory() . '/inc/shortcode.php';

/**
 * Redirect after login -  to current page
 */
function seed_redirect_to_request($redirect_to, $request, $user)
{
    return $request;
}
if ($GLOBALS['s_member_url'] != 'none') {
    add_filter('login_redirect', 'seed_redirect_to_request', 10, 3);
}



/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/endpoint.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}



// Jabont

function springtheme_ci()
{
    $ci = [];
    if (have_rows('palette', 'option')) :
        while (have_rows('palette', 'option')) : the_row();
            array_push($ci, get_sub_field('ci'));
        endwhile;
    endif;
    $link_color = get_field('link_color', 'option');
    $link_hover_color = get_field('link_hover_color', 'option');

    $btn_bg = get_field('btn_bg', 'option');
    $btn_hover_bg = get_field('btn_hover_bg', 'option');

    $label_color = get_field('label_color', 'option');
    $label_hover_color = get_field('label_hover_color', 'option');

    $bg_color = get_field('background_color', 'option');
    $font_color = get_field('font_color', 'option');

    $pmr_font = get_field('pmr_font', 'option');
    $txt_font = get_field('txt_font', 'option');
    $footbar_bg = get_field('footbar_bg', 'option');
    $colophon_bg = get_field('colophon_bg', 'option');
    $theCi = '';
    $theClBg = '';
    if ($pmr_font == 'Custom Font') {
        $pmr_font = get_field('pmr_font_custom', 'option');
    }
    if ($txt_font == 'Custom Font') {
        $txt_font = get_field('txt_font_custom', 'option');
    }

    foreach ($ci as $i => $color) {
        $theCi .= "--ci" . ($i + 1) . ":$color;\n";
        $theClBg .= ".cl-ci" . ($i + 1) . "{color:var(--ci" . ($i + 1) . ")}\n";
        $theClBg .= ".bg-ci" . ($i + 1) . "{background-color:var(--ci" . ($i + 1) . ")}\n";
        $theClBg .= ".hover-cl-ci" . ($i + 1) . ":hover{color:var(--ci" . ($i + 1) . ")}\n";
        $theClBg .= ".hover-bg-ci" . ($i + 1) . ":hover{background-color:var(--ci" . ($i + 1) . ")}\n";
    }
    ?>

    <?php if (!empty($theCi)) { ?>
        <pre class="hidden">
            <?php echo $theCi; ?>
        </pre>
    <?php } ?>

    <style type="text/css">
        :root {
            <?php 
            if (!empty($theCi)) echo $theCi;
            echo "--link: {$link_color};";
            echo "--link-hover: {$link_hover_color};";
            echo "--btn-bg: {$btn_bg};";
            echo "--btn-bg-hover: {$btn_hover_bg};";
            echo "--nav-link: {$link_color};";
            echo "--nav-hover: {$link_color};";
            echo "--bg-color: {$bg_color};";
            echo "--text-color: {$font_color};";
            echo "--txt-font: \"{$txt_font}\", -apple-system, BlinkMacSystemFont, sans-serif;";
            echo "--pmr-font: \"{$pmr_font}\", -apple-system, BlinkMacSystemFont, \"HelveticaNeue-Medium\", \"Helvetica Neue Medium\", \"Helvetica Neue\", Helvetica, Arial, sans-serif;";
            echo "--footbar-bg: {$footbar_bg};";
            echo "--colophon-bg: {$colophon_bg};";
            ?>
        }
        <?php if (!empty($theClBg)) echo $theClBg; ?>
    </style>
    <?php
}

function pre($arr)
{
    echo "<pre class='jb-pre'>";
    print_r($arr);
    echo "</pre>";
}

function my_theme_name_load_css()
{
    wp_enqueue_style('dashicons');
}

function acf_oembed_to_youtubeID($field)
{
    $video = $field;

    preg_match('/src="(.+?)"/', $video, $matches_url);
    $src = $matches_url[1];

    preg_match('/embed(.*?)?feature/', $src, $matches_id);
    $id = $matches_id[1];
    $id = str_replace(str_split('?/'), '', $id);

    return $id;
}



function jb_ytplayer($ytid = 'JjH1h6HP0R0', $uid = 'jb_ytplayer', $poster = '')
{
    $html = <<<HTML
    <div id="{$uid}" loops data-plyr-provider="youtube" data-poster="{$poster}" data-plyr-embed-id="{$ytid}"></div>
    <script>
    const plyr__{$uid}  = new Plyr('#{$uid}', {
        loop: {
            active: true
        }
    });
    </script>
    HTML;
    return $html;
}


function asw_tpj_header($f){
    $gd_start = $f['gradient']['start'];
    $gd_stop = $f['gradient']['stop'];
    $gd_deg = $f['gradient']['degree'];
    if ($gd_start == '') {
        $gd_start = $f['color_swatch']['mc_1'];
    }
    if ($gd_stop == '') {
        $gd_stop = $f['color_swatch']['mc_5'];
    }
    if ($gd_deg == '') {
        $gd_deg = 90;
    }
    ?>
    <style type="text/css">
        div#content{
            overflow: hidden;
        }
        html,
        body {
            min-width: 375px;
        }

        :root {
            --plyr-color-main: var(--mc-main-1);
            --mc-main-1: <?= $f['color_swatch']['mc_1'] ?>;
            --mc-main-2: <?= $f['color_swatch']['mc_2'] ?>;
            --mc-main-3: <?= $f['color_swatch']['mc_3'] ?>;
            --mc-main-4: <?= $f['color_swatch']['mc_4'] ?>;
            --mc-main-5: <?= $f['color_swatch']['mc_5'] ?>;
            --mc-main-gd-start: <?= $gd_start ?>;
            --mc-main-gd-stop: <?= $gd_stop ?>;
            --mc-main-gd-deg: <?= $gd_deg ?>deg;
            --mc-gd: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));
            --mc-nav-active: var(--mc-main-4, --mc-main-3);
            --mc-nav-btn-bg-ready: var(--mc-main-1);
            --mc-nav-btn-bg-hover: var(--mc-main-2);
            --mc-nav-btn-txt-ready: var(--mc-main-3);
            --mc-nav-btn-txt-hover: var(--mc-main-3);
            --mc-arrow-up: url('<?= acf_img($f['element']['pagination_arrow'], 'medium') ?>');
            --mc-chevron-up: url('<?= acf_img($f['element']['pagination_chevron'], 'medium') ?>');
            --mc-lightbox-arrow: url('<?= acf_img($f['element']['lightbox_arrow'], 'medium') ?>');
            --mc-pagination-color: <?=$f['element']['pagination_color']?>;
            --mc-main-bg-cl: <?= $f['tab_block']['background_color'] ?>;
            --mc-main-bg-hover: <?= $f['tab_block']['background_hover_color'] ?>;
            --mc-tab-text-color: <?= $f['tab_block']['text_color'] ?>;
            --mc-tab-text-hover: <?= $f['tab_block']['text_hover_color'] ?>;
            --mc-tab-parent-bg: <?= $f['tab_block']['parent_bg'] ?>;
            --mc-tab-border-cl: <?= $f['tab_block']['border_color'] ?>;
            --mc-main-text-cl-ready: <?= $f['tab_block']['text_color'] ?>;
        }

        a:hover {
            color: inherit;
        }

        @media (min-width: 1280px) {
            .container {
                max-width: 1280px !important;
            }
        }

        .master-btn {
            color: var(--mc-nav-btn-txt-ready);
            background-color: var(--mc-nav-btn-bg-ready);
            padding: 6px 24px;
            transition: all .3s;
            font-weight: 400;
        }

        .master-btn:hover {
            color: var(--mc-nav-btn-txt-hover);
            background-color: var(--mc-nav-btn-bg-hover);
        }

        .info-tabs-block {
            background: var(--mc-tab-parent-bg);
            border: 1px solid var(--mc-tab-border-cl);
            border-radius: 56px;
            display: inline-flex;
            margin-top: 18px;
            padding: 4px;
            position: relative;
            width: 100%;
            overflow: hidden;
        }

        .info-tab {
            border-radius: 10em;
            display: inline-block;
            cursor: pointer;
            background: transparent;
            transition: all .5s;
            color: var(--mc-tab-text-color) !important;
        }

        .info-tab:hover {
            color: var(--mc-tab-text-hover) !important;
        }

        .info-tab.-active {
            color: var(--mc-tab-text-hover) !important;
        }

        .info-tab-last {
            border-radius: 10em;
            cursor: pointer;
            background: transparent;
            transition: all .5s;
        }

        .info-tab-txt {
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
            padding: 6px 28px;
            line-height: 28px;
            display: inline-block;
        }

        .info-tab-next {
            font-style: normal;
            font-weight: 400;
            font-size: 22px;
            padding-right: 12px;
            line-height: 28px;
            display: inline-block;
        }

        .info-tabs-blocks {
            display: inline-flex;
        }

        .info-tabs-rail {
            display: inline-flex;
            width: max-content;
            transition: transform .5s;
            transform: translateX(calc(-1px * var(--left)));
        }

        .info-tabs-block-arrow {
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 100%;
            z-index: 5;
            display: none;
            cursor: pointer;
        }

        .info-tabs-block-arrow::after {
            content: " ";
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background-image: var(--mc-chevron-up);
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }

        .info-tabs-block-arrow::before {
            content: " ";
            width: 200%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            pointer-events: none;
        }

        .info-tabs-block-arrow.-right::before {
            left: inherit;
            right: 0;
        }

        /* .info-tabs-block-arrow::after {} */

        .info-tabs-block-arrow.-left::after {
            transform: rotate(-90deg);
        }

        .info-tabs-block-arrow.-right::after {
            transform: rotate(90deg);
        }

        .info-tabs-block {
            --left: 0;
        }

        .info-tabs-block[data-is-overflow="1"] .info-tabs-block-arrow {
            display: block;
        }

        .info-tabs-block[data-is-end="start"] .info-tabs-block-arrow.-left {
            display: none;
        }

        .info-tabs-block-arrow.-right {
            position: absolute;
            left: inherit;
            right: 0;
        }

        .info-tabs-block[data-is-overflow="1"] .info-tabs-blocks {
            overflow: hidden;
            width: calc(100% - 62px);
            position: relative;
            left: 31px;
        }

        .info-tabs-block-wrap {
            margin: auto;
        }

        .info-tab-txt {
            width: max-content;
        }

        .info-tabs-block-arrow {
            opacity: 1;
            transition: all .2s;
        }

        .info-tabs-block[data-slot="0"] .info-tabs-block-arrow.-left {
            opacity: 0;
            pointer-events: none;
        }

        .info-tabs-block[data-end="1"] .info-tabs-block-arrow.-right {
            opacity: 0;
            pointer-events: none;
        }


        /*-- Mobile Version --*/
        @media (max-width: 1319px) {
            .info-tab-txt {
                padding: 4px 28px;
            }
        }
    </style>
    <style type="text/css">
        #header-nav-items {
            display: none;
        }

        .site-header>.s-container,
        .site-header,
        .site-header-space {
            min-height: 48px;
            height: 48px;
        }

        .site-branding img {
            height: 11px;
            width: auto;
            margin: 0;
        }

        .site-branding {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .site-header a {
            margin: 0;
        }

        .site-header .site-left-bar {
            grid-column: 6 / span 2;
        }

        .site-header .site-right-bar {
            grid-column: 11 / span 2;
        }

        .site-lang-txt {
            margin-right: 0;
        }

        body,
        html {
            scroll-behavior: smooth;
        }

        .pj-nav-items {
            display: grid;
            grid-template-columns: 1fr 9fr;
            align-items: center;
        }


        .theme-menu-item {
            position: relative;
            padding: 20px 24px 20px;
            cursor: pointer;
            box-shadow: 0px 0px 0px -4px var(--mc-nav-active) inset;
            transition: all .3s;
            box-sizing: border-box;
        }

        .theme-menu-item.-active,
        .theme-menu-item:hover {
            color: var(--mc-nav-active) !important;
            box-shadow: 0px -8px 0px -4px var(--mc-nav-active) inset;
            padding-bottom: 16px;
        }

        .theme-menu-item::after {
            border-radius: 50%;
            content: '';
            height: 20%;
            width: 1px;
            background-color: #CFD4D9;
            position: absolute;
            left: 0;
            top: 40%;
        }

        .theme-menu-item:nth-child(1):after {
            height: 0;
            width: 0;
        }

        .pj-nav-logo {
            max-height: 50px;
            margin-left: 0;
        }

        .nav-menu-item {
            display: flex;
            justify-content: center;

        }

        .theme-menu-item h6 {
            color: #323A41;
            transition: all .3s;
        }

        .theme-menu-item.-active h6,
        .theme-menu-item:hover h6 {
            color: var(--mc-nav-active);
        }

        .template-nav>.s-container {
            padding-right: 0;
            max-width: 1320px !important;
            padding-left: 1.5rem !important;
        }

        .template-nav {
            background: #fff;
            position: fixed;
            top: 48px;
            z-index: 100;
            width: 100%;
            background-color: #F7F7F7;

        }

        .header_blank {
            height: 72px;
        }

        [data-showb="0"] {
            display: none;
        }

        .section-fade {
            opacity: 0;
            transition: opacity 1s ease-in-out, top .5s ease-in-out;
            position: relative;
            top: 2rem;
        }

        .section-fade[data-show="1"] {
            opacity: 1;
            top: 0;
        }

        .theme-menu-items-float {
            display: none;
        }

        .nav-menu-item-mob {
            display: none;
        }

        #masthead .tel-icon {
            display: none;
        }

        #masthead .change-lang {
            margin: 0 !important;
            height: 48px;
        }

        #masthead img.pointer {
            display: none;
        }




        @media (max-width: 1319px) {
            .nav-menu-item {
                display: none;
            }

            .template-nav {
                padding: 0.75rem 1rem;
            }

            .master-btn {
                padding: 6px 6px;
                margin: 0 !important;
                width: 100%;
            }

            .site-header .site-left-bar {
                grid-column: 1 / span 6;
            }

            .site-header {
                padding-left: 0.75rem;
            }

            .site-branding {
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: flex-start;
                position: static;
                transform: unset;
            }

            .site-header a {
                transition: none;
            }

            .pj-nav-items {
                grid-column: 1 / span 4;
                grid-template-columns: 12fr;
            }

            .nav-menu-item-mob {
                grid-column: 5 / span 5;
                padding-right: 30px;
                text-align: right;
                position: relative;
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                cursor: pointer;
            }

            .nav-menu-item-mob::after {
                content: " ";
                position: absolute;
                background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/arrow-menu.png');
                background-size: contain;
                background-repeat: no-repeat;
                width: 10px;
                height: 10px;
                right: 12px;
                top: calc(50% - 5px);
                background-position: center;
                transition: all .2s;
                transform: rotate(-180deg);
            }

            .nav-menu-item-mob[data-expand="-1"]::after {
                transform: rotate(0deg);
            }

            .nav-menu-items-mob {
                font-size: 22px;
                line-height: 28px;
                font-weight: 400;
            }

            .pj-nav-register {
                grid-column: 10 / span 3;
                display: block;
                text-align: center;
            }

            .pj-nav-items-wrap {
                justify-content: center;
                align-items: center;
                grid-gap: 8px;
            }

            .theme-menu-items-float {
                position: fixed;
                z-index: 20;
                top: 0;
                width: 100%;
                background: #fff;
                padding: 16px 0;
                color: #545e67;
                transition: color .3s;
                border-top: 1px solid #bfc4c8;
                display: block;
            }

            .theme-menu-item-mob {
                padding: 8px 16px;
                cursor: pointer;
            }

            .theme-menu-items-float[data-expand="-1"] {
                display: none;
            }

            .change-lang {
                display: flex;
            }

            .site-header .site-right-bar {
                grid-column: 7 / span 6;
            }

        }
    </style>
    <script type="text/javascript">

        window.addEventListener("load", (event) => {
            if (location.hash != '') {
                document.querySelector(location.hash).scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });

    </script>
    <header class="template-nav">
        <div class="container mx-auto">
            <div class="grid grid-cols-12 pj-nav-items-wrap">
                <div class="pj-nav-items col-span-8 xl:col-span-10">
                    <img class="logo pj-nav-logo cursor-pointer" src="<?= acf_img($f['logo'], 'medium') ?>" alt="logo" onclick="$('.scroll-to-top').scrollIntoView()">
                    <div class="nav-menu-item">
                        <?php
                        $it = 0;
                        $plan_text = pll__('แบบแปลน');
                        if (get_post_type() == 'house') {
                            $plan_text = pll__('แบบบ้าน');
                        }
                        foreach ($f['content'] as $key => $content) {
                            switch ($content['acf_fc_layout']) {
                                case 'project_idea':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('แนวคิด')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;

                                case 'project_information':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('ข้อมูลโครงการ')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;
                                case 'facility':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('สิ่งอำนวยความสะดวก')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;

                                case 'gallery':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('แกลเลอรี')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;

                                case 'video':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('วิดีโอ')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;

                                case 'plan':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?=$plan_text?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;

                                case 'location':
                                if ($content['hide'] == 'show') {
                                    ?>
                                    <div class="theme-menu-item" onclick="navItemsClick(<?= $it ?>)">
                                        <h6><?php pll_e('ทำเลที่ตั้ง')?></h6>
                                    </div>
                                    <?php
                                    $it++;
                                }
                                break;
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="nav-menu-item-mob text-black" data-expand="-1" onclick="navMobClick(1)">
                    <div class="nav-menu-items-mob truncate">
                        <span></span>
                    </div>
                </div>
                <div class="pj-nav-register col-span-4 xl:col-span-2 flex justify-end items-center">
                    <a href="#!" onclick="scrollToEl('#register_form')">
                        <div class="master-btn">
                            <?php pll_e('ลงทะเบียน')?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="theme-menu-items-float" data-expand="-1">
        <?php
        $it = 0;
        foreach ($f['content'] as $key => $content) {
            switch ($content['acf_fc_layout']) {
                case 'project_idea':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('แนวคิด')?>
                    </div>
                    <?php
                    $it++;
                }
                break;

                case 'project_information':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('ข้อมูลโครงการ')?>
                    </div>
                    <?php
                    $it++;
                }
                break;
                case 'facility':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('สิ่งอำนวยความสะดวก')?>
                    </div>
                    <?php
                    $it++;
                }
                break;

                case 'gallery':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('แกลเลอรี')?>
                    </div>
                    <?php
                    $it++;
                }
                break;

                case 'video':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('วิดีโอ')?>
                    </div>
                    <?php
                    $it++;
                }
                break;

                case 'plan':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('แบบแปลน')?>
                    </div>
                    <?php
                    $it++;
                }
                break;

                case 'location':
                if ($content['hide'] == 'show') {
                    ?>
                    <div class="theme-menu-item-mob" onclick="toggleNavMob(<?= $it ?>)">
                        <?php pll_e('ทำเลที่ตั้ง')?>
                    </div>
                    <?php
                    $it++;
                }
                break;
            }
        }
        ?>
    </div>
    <div class="header_blank"></div>
    <style type="text/css">
        #page_contact {
            bottom: 1rem;
            right: 1rem;
            position: fixed;
            z-index: 10000;
            display: flex;
            flex-flow: column;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            pointer-events: none;
        }

        .chaty-widget {
            display: none;
        }

        #page_contact_show {
            width: 56px;
            display: flex;
            flex-direction: column;
            justify-content: end;
            align-items: center;
            background-color: #fff;
            color: #000;
            padding: 8px 0 20px;
            border-radius: 999px;

        }

        #page_contact_hide {
            position: absolute;
        }

        #page_contact_hide {
            bottom: 3rem;
            right: 1.5rem;
        }

        #page_contact_show,
        #page_contact_hide {
            transition: all .3s;
        }

        .contact_btn {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            margin-bottom: 8px;
            transition: all .2s;
        }

        .contact_btn:hover {
            background-color: var(--ci-blue-300);
        }

        #page_contact[data-expand="1"] .is-expand,
        #page_contact[data-expand="-1"] .not-expand {
            opacity: 1;
            pointer-events: auto;

        }

        #page_contact[data-expand="-1"] .is-expand,
        #page_contact[data-expand="1"] .not-expand {
            opacity: 0;
            pointer-events: none;
        }

        #page_contact_hide {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 100%;
            background-color: rgba(29, 159, 155, 1);
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Group-1381.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            right: 8px;
            bottom: 12px;
        }

        #page_contact[data-expand="1"] #page_contact_hide {
            right: 12px;
            bottom: 20px;
            width: 32px;
            height: 32px;
        }

        .contact_fb {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Logo.png');
            background-color: #fff;
            border: 1px solid rgba(84, 94, 103, 1);
            background-size: 10px;
            background-position: center;
            background-repeat: no-repeat;
            transition: all .3s;

        }

        .contact_tel {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Vector-4.png');
            background-color: #fff;
            border: 1px solid rgba(84, 94, 103, 1);
            background-size: 17px;
            background-position: center;
            background-repeat: no-repeat;
            transition: all .3s;

        }

        .contact_ln {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Subtract.png');
            background-color: #fff;
            border: 1px solid rgba(84, 94, 103, 1);
            background-size: 22px;
            background-position: center;
            background-repeat: no-repeat;
            transition: all .3s;

        }

        .contact_fb:hover {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Artboard-2.png')
        }

        .contact_tel:hover {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Artboard-1.png')
        }

        .contact_ln:hover {
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Artboard-3.png')
        }

        .contact_close {
            background-color: rgba(130, 138, 146, 1) !important;
            cursor: pointer;
            width: 32px;
            height: 32px;
            margin-top: 24px;
            margin-bottom: 0;
            background-image: url('https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Group-889.png');
            background-size: 10px;
            background-position: center;
            background-repeat: no-repeat;

        }
        .facility_alt-icon img{
            object-fit: contain;
            object-position: center bottom;
        }
        .plan-pic img {
            cursor: pointer;
        }
    </style>
    <?php  ?>
    <div id="page_contact" data-expand="-1">
        <div id="page_contact_show" class="page_contact_btn is-expand">
            <?php if (get_field('facebook')!=''): ?>
                <a href="<?=get_field('facebook')?>" target="_blank" class=""><div class="contact_btn contact_fb"></div></a>
            <?php endif ?>
            <?php if (get_field('line_id')!=''): ?>
                <a href="<?=get_field('line_id')?>" target="_blank" class=""><div class="contact_btn contact_ln"></div></a>
            <?php endif ?>
            <?php if (get_field('telephone_number')!=''): ?>
                <a href="tel:<?=get_field('telephone_number')?>" class=""><div class="contact_btn contact_tel"></div></a>
            <?php endif ?>
            <div class="contact_btn contact_close" onclick="toggle_contact(-1)"></div>
        </div>
        <div id="page_contact_hide" class="page_contact_btn not-expand" onclick="toggle_contact(1)"></div>
    </div>
    <script type="text/javascript">
        function toggle_contact(v) {
            $('#page_contact').dataset.expand = v
        }
    </script>
    <?php
}


function asw_tpj_scroll_js()
{
    ?>
    <script type="text/javascript">
        let navItems = []
        let navItemsMob = []
        let infoTabBlockArr = $$('.info-tabs-block');

        function setInfoTab() {
            let j = 0
            for (let i of infoTabBlockArr) {
                if (i.querySelector('.info-tabs-blocks') != null) {
                    let contWidth = i.clientWidth
                    let blocksWidth = i.querySelector('.info-tabs-blocks').clientWidth
                    if (blocksWidth > contWidth) {
                        i.dataset.isOverflow = "1"
                        i.style.setProperty('--left', 0)
                        i.dataset.slot = 0
                        i.dataset.end = 0
                        i.querySelector('.info-tabs-block-arrow.-right').setAttribute('onclick', `tabInfoSlot(${j},1)`)
                        i.querySelector('.info-tabs-block-arrow.-left').setAttribute('onclick', `tabInfoSlot(${j},-1)`)
                    } else {
                        i.parentElement.style.width = "max-content"
                    }
                }
                j++;
            }
        }
        setInfoTab()

        function tabInfoSlot(j, direction) {
            let parent = $$('.info-tabs-block')[j]
            let items = parent.querySelectorAll('.info-tab')
            let slot = [0]
            let contWidth = parent.clientWidth - 80
            let nowSlot = parseInt(parent.dataset.slot)
            let temp = 0;
            let left = 0;
            let shift = 0;
            for (let i of items) {
                let width = i.clientWidth
                if (temp + width < contWidth) {
                    temp += width
                } else {
                    if (slot[slot.length - 1] != left) {
                        slot.push(left)
                    }
                    temp = width
                }
                left += width
            }


            let max = slot.length

            let newSlot = ((nowSlot + direction) % max + max) % max
            shift = contWidth - temp + 18

            parent.dataset.slot = newSlot

            if (newSlot == max - 1) {
                parent.dataset.end = 1
                parent.style.setProperty('--left', slot[newSlot] - shift)
            } else {
                parent.dataset.end = 0
                parent.style.setProperty('--left', slot[newSlot])
            }
        }

        function navItemsClick(i) {
            window.scrollTo(0, navItems[i].top)
        }

        function check_is_on_nav() {
            let masthead = $('#masthead')
            let templateNav = $('.template-nav')
            let headerH = masthead.offsetHeight + templateNav.offsetHeight
            let pageHeight = window.innerHeight;
            navItems = []
            let el = $$('.is-on-nav');
            let c = 0;
            let k = -1;
            for (let i of el) {
                navItems.push({
                    i: c,
                    y: i.getBoundingClientRect().y,
                    top: i.offsetTop - headerH,
                    el: i
                })
                if (i.getBoundingClientRect().y - headerH <= 1) {
                    k++
                }
                c++
            }
            if ($('.theme-menu-item.-active') != null) {
                $('.theme-menu-item.-active').classList.remove('-active')
            }
            if (k >= 0) {
                if ($$('.theme-menu-item')[k] != undefined) {
                    $$('.theme-menu-item')[k].classList.add('-active')
                }
            }
        }

        function check_scroll() {
            check_is_on_nav()
            check_section_fade()
        }


        function check_section_fade() {
            check_is_on_nav()
            const s = $$('.section-fade')
            let pageHeight = window.innerHeight;
            let bottomGap = pageHeight / 20
            for (let i of s) {
                let r = i.getBoundingClientRect();
                let fromTop = r.y
                let sHeight = r.height
                let fromBottom = fromTop - pageHeight
                let lineOfView = fromBottom + bottomGap
                if (lineOfView < 0) {
                    i.dataset.show = 1
                } else {
                    i.dataset.show = 0
                }
            }

        }
        document.addEventListener("scroll", check_scroll);

        function scrollToEl(selector) {
            let masthead = $('#masthead')
            let templateNav = $('.template-nav')
            let headerH = masthead.offsetHeight + templateNav.offsetHeight
            let t = $(selector).offsetTop - headerH
            window.scrollTo(0, t)
        }

        function navMobClick() {
            parent = $('.nav-menu-item-mob')
            parent.dataset.expand *= -1
            $('.theme-menu-items-float').dataset.expand = parent.dataset.expand
        }


        check_section_fade()
        if ($('.theme-menu-item-mob') != null) {
            $('.nav-menu-item-mob span').innerHTML = $('.theme-menu-item-mob').innerText
        }

        $('.theme-menu-items-float').style.top = $('#masthead').offsetHeight + $('.template-nav').offsetHeight + 'px'
        $('.header_blank').style.height = $('.template-nav').offsetHeight + 'px'


        function toggleNavMob(i) {
            navItemsMob = []
            let el = $$('.is-on-nav-mob')
            for (let i of el) {
                navItemsMob.push({
                    el: i,
                    top: i.offsetTop - $('#masthead').offsetHeight - $('.template-nav').offsetHeight
                })
            }
            window.scrollTo(0, navItemsMob[i].top)
            $('.theme-menu-items-float').dataset.expand = -1
            $('.nav-menu-item-mob').dataset.expand = -1
            $('.nav-menu-items-mob span').innerHTML = $$('.theme-menu-item-mob')[i].innerText
        }
    </script>
    <?php
}

function theme_overide_style($c)
{   
    // pre($c);
    $section = $c['acf_fc_layout'];
    switch ($section) {
        case 'contact':
        $section = "project-footer";
        break;
        case 'project_idea':
        $section = "concept";
        break;
        case 'project_information':
        $section = "info";
        break;
    }
    isset($c['bg_img']) ? $bg_img = acf_img($c['bg_img']) : $bg_img = '';
    isset($c['bg_img_mobile']) ? $bg_img_mobile = acf_img($c['bg_img_mobile']) : $bg_img_mobile = '';
    isset($c['bg_color']) ? $bg_color = $c['bg_color'] : $bg_color = '';
    isset($c['text_color']) ? $text_color = $c['text_color'] : $text_color = '';

    isset($c['color_swatch']) ? $swatch = $c['color_swatch'] : $swatch = '';
    isset($c['element']) ? $element =  $c['element'] : $element = '';

    $css = $c['css'];
    isset($c['gradient']['start']) ? $gd_start = ($c['gradient']['start'] != '') ? $c['gradient']['start'] : $swatch['mc_1'] : $gd_start = '';
    isset($c['gradient']['stop']) ? $gd_stop = ($c['gradient']['stop'] != '') ? $c['gradient']['stop'] : $swatch['mc_5'] : $gd_stop = '';
    isset($c['gradient']['deg']) ? $gd_deg = ($c['gradient']['deg'] != '') ? $c['gradient']['deg'] : 90 : $gd_deg = 90;
    
    
    isset($c['tab_block']['background_color']) ? $main_bg_color = $c['tab_block']['background_color'] : $main_bg_color = '';
    isset($c['tab_block']['background_hover_color']) ? $main_bg_hover = $c['tab_block']['background_hover_color'] : $main_bg_hover = '';

    isset($c['tab_block']['text_color']) ? $tab_color = $c['tab_block']['text_color'] : $tab_color = '';
    isset($c['tab_block']['text_hover_color']) ? $tab_color_hover = $c['tab_block']['text_hover_color'] : $tab_color_hover = '';

    isset($c['tab_block']['border_color']) ? $border_color = $c['tab_block']['border_color'] : $border_color = '';
    isset($c['tab_block']['parent_bg']) ? $parent_bg = $c['tab_block']['parent_bg'] : $parent_bg = '';


    ?>
    <style type="text/css">
        #<?= $section ?> {
            <?= $swatch['mc_1'] != '' ? "--mc-main-1:{$swatch['mc_1']};" : '';  ?>
            <?= $swatch['mc_2'] != '' ? "--mc-main-2:{$swatch['mc_2']};" : '';  ?>
            <?= $swatch['mc_3'] != '' ? "--mc-main-3:{$swatch['mc_3']};" : '';  ?>
            <?= $swatch['mc_4'] != '' ? "--mc-main-4:{$swatch['mc_4']};" : '';  ?>
            <?= $swatch['mc_5'] != '' ? "--mc-main-5:{$swatch['mc_5']};" : '';  ?>
            <?= $gd_start != '' ? "--mc-main-gd-start:{$gd_start};" : '';  ?>
            <?= $gd_stop != '' ? "--mc-main-gd-stop:{$gd_stop};" : '';  ?>
            <?= $gd_deg != '' ? "--mc-main-gd-deg:{$gd_deg}deg;" : '';  ?>
            --mc-gd: linear-gradient(var(--mc-main-gd-deg), var(--mc-main-gd-start), var(--mc-main-gd-stop));

            <?= $text_color != '' ? "--text-color:{$text_color};" : '';  ?>
            <?= $bg_color != '' ? "--bg-color:{$bg_color};" : '';  ?>
            <?= $bg_img != '' ? "--bg-img:url({$bg_img});" : '';  ?>
            <?= $text_color != '' ? "color:{$text_color};" : '';  ?>
            <?= $bg_color != '' ? "background-color:{$bg_color};" : '';  ?>
            <?= $bg_img != '' ? "background-image:url({$bg_img});" : '';  ?>

            /* --mc-main-bg-cl: rgb(254,231,52);
            --mc-main-bg-hover: rgba(254,231,52,0.55); */
            <?= $main_bg_color != '' ? "--mc-main-bg-cl:{$main_bg_color};" : "" ?>
            <?= $main_bg_hover != '' ? "--mc-main-bg-hover:{$main_bg_hover};" : "" ?>

            <?= $tab_color != '' ? "--mc-tab-text-color:{$tab_color};" : ''; ?>
            <?= $tab_color_hover != '' ? "--mc-tab-text-hover:{$tab_color_hover};" : ''; ?>
            <?= $border_color != '' ? "--mc-tab-border-cl:{$border_color};" : ""; ?>
            <?= $parent_bg != '' ? "--mc-tab-parent-bg:{$parent_bg};" : "" ?>

            <?= $element['pagination_arrow'] != '' ? "--mc-arrow-up: url(" . acf_img($element['pagination_arrow'], 'medium') . ");" : '' ?>
            <?= $element['pagination_chevron'] != '' ? "--mc-chevron-up: url(" . acf_img($element['pagination_chevron'], 'medium') . ");" : '' ?>
            <?= $element['lightbox_arrow'] != '' ? "--mc-lightbox-arrow: url(" . acf_img($element['lightbox_arrow'], 'medium') . ");" : '' ?>

        }

        @media (max-width: 1319px) {
            #<?= $section ?> {
                <?= $bg_img_mobile != '' ? "--bg-img:url({$bg_img_mobile});" : '';  ?>
                <?= $bg_img_mobile != '' ? "background-image:url({$bg_img_mobile});" : '';  ?>
                
            }
        }
    </style>
    <?php
    if ($css != '') {
        echo "<style type=\"text/css\">{$css}</style>";
    }
}

function acf_img($obj, $size = '1536x1536')
{
    return $obj['sizes'][$size];
}


function hex_to_rgb($hex)
{
    list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    $rgb = [];
    $rgb['r'] = $r;
    $rgb['g'] = $g;
    $rgb['b'] = $b;
    return $rgb;
}

function rgb_to_rgb($str)
{
    $str = explode('(', $str);
    $str[1] = explode(')', $str[1])[0];
    $str[1] = explode(',', $str[1]);
    $rgba = [];
    $rgba['r'] = $str[1][0];
    $rgba['g'] = $str[1][1];
    $rgba['b'] = $str[1][2];
    $rgba['a'] = $str[1][3];
    if ($rgba['a'] == '') {
        $rgba['a'] = 1;
    }
    return $rgba;
}

function theme_gen_visual_tour($zip_filepath)
{
    // $zip_filepath = $content['virtual_file']['url'];
    $zip_filepath = explode(site_url() . 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads', $zip_filepath)[1];
    $zip_filepath_hash = md5($zip_filepath);
    $zif_file_source = __DIR__ . '/../../uploads' . $zip_filepath;
    $dir = __DIR__ . "/../../assetwise-360/" . $zip_filepath_hash . "/index.html";
    $is_done = file_exists($dir);
    $url_360 = "/wp-content/assetwise-360/" . $zip_filepath_hash . "/index.html";
    if (!$is_done) {
        $file = $zif_file_source;
        $path = __DIR__ . "/../../assetwise-360/" . $zip_filepath_hash;

        $zip = new ZipArchive;
        $res = $zip->open($file);
        if ($res === TRUE) {
            $zip->extractTo($path);
            $zip->close();
        } else {
        }
    }
    return $url_360;
}




add_filter('acfe/flexible/thumbnail/layout=banner', 'acf_pj_banner', 10, 3);
function acf_pj_banner($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_banner_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_banner_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2022/08/Hero-Banner-Elegant.jpg';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/02/banner-delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/01/banner-kaveava.jpg';
    }
    return $img;
}

add_filter('acfe/flexible/thumbnail/layout=form', 'acf_pj_form', 10, 3);
function acf_pj_form($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_form_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_form_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/CleanShot_2566-03-19_at_11.19.212x.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_form_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_form_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=project_idea', 'acf_pj_project_idea', 10, 3);
function acf_pj_project_idea($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_concept_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_concept_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/project-idea.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_concept_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_concept_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=project_information', 'acf_pj_project_information', 10, 3);
function acf_pj_project_information($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_project_information_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_project_information_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/project-infornation.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_project_information_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_project_information_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=facility', 'acf_pj_facility', 10, 3);
function acf_pj_facility($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_facility_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_facility_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/facility.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_facility_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_facility_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=gallery', 'acf_pj_gallery', 10, 3);
function acf_pj_gallery($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_gallery_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_gallery_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/gallery.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_gallerry_deligghtful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_gallerry_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=video', 'acf_pj_video', 10, 3);
function acf_pj_video($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_video_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_video_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Video.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_video_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_video_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=plan', 'acf_pj_plan', 10, 3);
function acf_pj_plan($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_plan_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_plan_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Section-Plan.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_plan_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_plan_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=location', 'acf_pj_location', 10, 3);
function acf_pj_location($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_location_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_location_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Section-Location.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_location_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_location_dynamic.png';
    }
    return $img;
}
add_filter('acfe/flexible/thumbnail/layout=contact', 'acf_pj_contact', 10, 3);
function acf_pj_contact($thumbnail, $field, $layout)
{
    $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_contact_modern.png';
    if (get_page_template_slug() == 'single-template-modern.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_contact_modern.png';
    } elseif (get_page_template_slug() == 'single-template-elegant.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/05/Contact.png';
    } elseif (get_page_template_slug() == 'single-template-delightful.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_contact_delightful.png';
    } elseif (get_page_template_slug() == 'single-template-dynamic.php') {
        $img = 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/acf_contact_dynamic.png';
    }
    return $img;
}
// pre(get_page_template_slug());
add_filter('acfe/flexible/thumbnail/layout=related_location', 'acf_pj_related_location', 10, 3);
function acf_pj_related_location($thumbnail, $field, $layout)
{
    return 'https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/03/Related-Project.png';
}


add_action('admin_head', 'hide_description_row');

function hide_description_row()
{
    ?>
    <style type="text/css">
        .taxonomy-promotion_project form-field.term-description-wrap,
        .taxonomy-promotion_project .term-description-wrap {
            display: none;
        }
        #adminmenu li#menu-posts .wp-menu-name {
            font-size: 0;
        }
        #adminmenu li#menu-posts .wp-menu-name::after {
            content: "Blogs";
            font-size: 14px;
        }
        #adminmenu li#menu-posts .wp-submenu .wp-first-item > a{
            font-size: 0;
        }
        #adminmenu li#menu-posts .wp-submenu .wp-first-item > a::after{
            content: "All Blogs";
            font-size: 14px;
        }
    </style>
    <?php
}


// For Digital Agency

add_action( 'load-edit.php', 'wpse14230_load_edit' );
function wpse14230_load_edit()
{
    add_action( 'request', 'wpse14230_request' );
}

function wpse14230_request( $query_vars )
{
    if ( ! current_user_can( $GLOBALS['post_type_object']->cap->edit_others_posts ) ) {
        $query_vars['author'] = get_current_user_id();
    }
    return $query_vars;
}

add_filter( 'views_edit-post', 'wpse14230_views_edit_post' );
// add_filter( 'views_edit-post', 'fix_post_counts' );
function wpse14230_views_edit_post( $views )
{
    return array();
}

function my_get_current_user_roles() {
    if( is_user_logged_in() ) {
        $user = wp_get_current_user();
        $roles = ( array ) $user->roles;
        return $roles;
    } else {
        return array();
    }
}

add_action('admin_head', 'admin_css_agency'); 
function admin_css_agency() {
    $role = my_get_current_user_roles();
    if (in_array('digital-agency', $role)) {
        ?>
        <style>
            .row-actions .dpp,
            .update-nag.notice.notice-warning.inline,
            li#wp-admin-bar-new-content,
            body:not(.ac-wp-media) .wrap .wp-heading-inline+.page-title-action {
                display: none;
            }
        </style>
        <?php
    }
}

function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

add_action('admin_footer', 'admin_cf7_footer'); 
function admin_cf7_footer() {
    ?>
    <style type="text/css">
        body.taxonomy-project-type tr.form-field.term-description-wrap,
        body.taxonomy-project-type .term-description-wrap {
            display: none;
        }
    </style>
    <?php
    if (current_user_can('administrator')) {
        $is_cf7 = false;
        ?>
        <script type="text/javascript">
            if (document.querySelector('#page_template') != null) {
                document.body.dataset.useTemplate = document.querySelector('#page_template').value
                document.querySelector('#page_template').addEventListener("change", (event) =>{
                    xconsolex.log(document.querySelector('#page_template').value)
                    document.body.dataset.useTemplate = document.querySelector('#page_template').value
                });
            }
        </script>
        <style type="text/css">
            /* body[data-use-template="single-template-dynamic.php"]{

            } */
            body[data-use-template="single-template-dynamic.php"] a[data-layout="banner"] .acfe-flexible-layout-thumbnail.acfe-flexible-layout-thumbnail-no-modal {
                background-image:url(https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/01/banner-kaveava.jpg) !important;
            }
        </style>
        <?php
        if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'wpcf7') {
            $is_cf7 == true;
            $cf7_id = $_REQUEST['post'];
            if ($cf7_id != '') {
                $cf7_api_id = '';
                $group_ID = 'group_64744d6b8165f';
                $acf_fields = acf_get_fields( $group_ID );
                $the_slug = 'cf7api_'.$cf7_id;
                $args = array(
                    'name'        => $the_slug,
                    'post_type'   => 'cf7_api',
                    'numberposts' => 1
                );
                $my_posts = get_posts($args);
                if (!$my_posts) {
                    $my_new_post = array(
                        'post_title'    => $the_slug,
                        'post_status'   => 'publish',
                        'post_type'   => 'cf7_api',
                    );
                    $new_post = wp_insert_post( $my_new_post );
                    $args = array(
                        'name'        => $the_slug,
                        'post_type'   => 'cf7_api',
                        'numberposts' => 1
                    );
                    $my_posts = get_posts($args);
                }
                $cf7_api_id = $my_posts[0]->ID;
                $f = get_fields($cf7_api_id);

                ?>
                <style type="text/css">
                    span#tag-generator-list :is(:nth-child(10),:nth-child(11),:nth-child(12),:nth-child(14)) {
                        display: none;
                    }
                    #jb_cf7_api {
                        padding: 1rem;
                        margin-top: 1rem;
                        border: 1px solid #aaaaaa;
                        display: none;
                    }
                    #jb_cf7_api .-field-block{
                        padding-bottom: 1rem;
                    }

                    #jb_cf7_api .-label{
                        margin-bottom: 8px;
                        display: block;
                    }
                    #jb_cf7_api .-input-text{
                        box-shadow: 0 0 0 transparent;
                        border-radius: 4px;
                        border: 1px solid #8c8f94;
                        background-color: #fff;
                        color: #2c3338;
                        padding: 0 8px;
                        line-height: 2;
                        min-height: 30px;
                        width: 100%;
                    }
                    #jb_cf7_api[data-saving="1"] .-submit{
                        display: none;
                    }
                    #jb_cf7_api .-submit {
                        background: #2271b1;
                        border-color: #2271b1;
                        color: #fff;
                        text-shadow: none;
                        display: inline-block;
                        text-decoration: none;
                        font-size: 13px;
                        line-height: 2.15384615;
                        min-height: 30px;
                        margin: 0;
                        padding: 0 10px;
                        cursor: pointer;
                        border-width: 1px;
                        border-style: solid;
                        appearance: none;
                        -webkit-appearance: none;
                        border-radius: 3px;
                        white-space: nowrap;
                        box-sizing: border-box;
                    }
                    #jb_cf7_api .-saved{
                        display: none;
                    }
                    #jb_cf7_api[data-saving="done"] .-saved{
                        display: block;
                        margin-bottom: 1rem;
                    }
                    #jb_cf7_api .-text-area{
                        width: 100%;
                    }
                </style>
                <script type="text/javascript">
                    if (document.querySelector('#contact-form-editor-tabs') != null) {
                        let html = `<li id="form-panel-tab" role="tab" tabindex="-1" class="ui-tabs-tab ui-corner-top ui-state-default ui-tab" aria-controls="form-panel" aria-labelledby="ui-id-1" aria-selected="false" aria-expanded="false"><a href="#form-panel" onclick="window.open('/wp-admin/post.php?post=<?=$cf7_api_id?>&action=edit')" tabindex="-1" class="ui-tabs-anchor" id="ui-id-1">AssetWise API, Email, SMS</a></li>`
                        document.querySelector('#contact-form-editor-tabs').innerHTML += html

                    }
                    if (document.querySelector('#mail-panel-tab a') != null) {
                        document.querySelector('#mail-panel-tab a').innerText += ` (ตัวเก่า)`
                    }
                    if (document.querySelector('#contact-form-editor') != null) {
                        let html = `<div>หากพบปัญหาการเซฟ <a  target='_blank' href='/wp-admin/post.php?post=<?=$cf7_api_id?>&action=edit'>คลิกที่</a> เพื่อเข้าหน้าบันทึก API อีกครั้ง<br><br></div>`
                        <?php foreach ($acf_fields as $kk => $kv):
                            $label = $kv['label'];
                            $name = $kv['name'];
                            $type = $kv['type'];
                            $value = $f[$kv['name']];
                            echo "html += `<div class='-field-block'><b class='-label'>$label</b>`;";
                            if ($type == 'text' || $type == 'number') {
                                if (is_array($value)) {
                                   $value = '';
                               }
                               echo "html += `<input class='-input-text' type='$type' value='$value' name='$name'>`;";
                           }else if($type == 'select'){
                            $choices = $kv['choices'];
                            echo "html += `<select class='-input-select' name='$name'>`;";
                            foreach ($choices as $ck => $cv) {
                                $sl = '';
                                if ($value == $ck) {
                                    $sl = 'selected';
                                }
                                echo "html += `<option value='$ck' $sl>$cv</option>`;";
                            }
                            echo "html += `</select>`;";
                        }else if($type == 'textarea'){
                            echo "html += `<textarea class='-text-area' rows='6' name='$name'>$value</textarea>`;";
                        }
                        echo "html += `</div>`;";
                        ?>
                    <?php endforeach ?>
                    let el = document.createElement("div");
                    el.id = 'jb_cf7_api'
                    el.dataset.saving = 0
                    html += `<div class='-saved'>Saved.</div><div class='-submit' onclick='cf7_api_save()'>Save Options Form</div>`
                    el.innerHTML = html
                    document.querySelector('#postbox-container-2').appendChild(el)
                }
            </script>
            <script type="text/javascript">
                function cf7_api_save(){
                    document.querySelector('#jb_cf7_api').dataset.saving = 1
                    payload = {}
                    let input = document.querySelectorAll('#jb_cf7_api :where(input,select,textarea)')
                    for(let i of input){
                        payload[i.name] = i.value
                    }
                    var data = new FormData();
                    data.append( "json", JSON.stringify( payload ) );
                    fetch("/api-internal-save?cf7_api_id=<?=$cf7_api_id?>&t=<?=time()?>",
                    {
                        method: "POST",
                        cache: "no-cache", 
                        credentials: "same-origin", 
                        body: data
                    })
                    .then(function(res){ return res.json(); })
                    .then(function(json){
                        if (json.status == 200) {
                            document.querySelector('#jb_cf7_api').dataset.saving = 'done'
                        }else{
                            document.querySelector('#jb_cf7_api').dataset.saving = '0'
                        }
                    })
                }
            </script>
            <?php
        }
    }
}
}

function jpx_getPost(){
    $json = $_POST;
    if ($json['json'] != '') {
        $data = json_decode(stripslashes($json['json']), true); 
        return $data;
    }else{
        return false;
    }
}


function cptui_register_my_cpts_promotion() {

    /**
     * Post Type: Promotion.
     */

    $labels = [
        "name" => esc_html__( "Promotion Origin", "spring" ),
        "singular_name" => esc_html__( "Promotion", "spring" ),
        "parent" => esc_html__( "Parent Promotion:", "spring" ),
        "parent_item_colon" => esc_html__( "Parent Promotion:", "spring" ),
    ];

    $args = [
        "label" => esc_html__( "Promotion", "spring" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => [ "slug" => "promotion", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 6,
        "menu_icon" => "dashicons-format-aside",
        "supports" => [ "title", "thumbnail", "page-attributes" ],
        "taxonomies" => [ "promotion_type","promotion_project" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "promotion", $args );
}

// add_action( 'init', 'cptui_register_my_cpts_promotion' );

function cptui_register_my_cpts_promotions() {

    /**
     * Post Type: Promotion Tes.
     */

    $labels = [
        "name" => esc_html__( "Promotions", "spring" ),
        "singular_name" => esc_html__( "Promotion", "spring" ),
    ];

    $args = [
        "label" => esc_html__( "Promotion", "spring" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => true,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "can_export" => false,
        "rewrite" => [ "slug" => "promotion/%promotion_type%", "with_front" => true ],
        "query_var" => true,
        "menu_position" =>6,
        "menu_icon" => "dashicons-format-aside",
        "supports" => [ "title", "thumbnail", "page-attributes" ],
        "taxonomies" => [ "promotion_type","promotion_project" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "promotion", $args );
}

add_action( 'init', 'cptui_register_my_cpts_promotions' );

function wpa_promotion_post_link( $post_link, $id = 0 ){
    $post = get_post($id);  
    if ( is_object( $post ) ){
        $terms = wp_get_object_terms( $post->ID, 'promotion_type' );
        if( $terms ){
            return str_replace( '%promotion_type%' , $terms[0]->slug , $post_link );
        }else{
            $parent = get_post_parent($post);
            if ($parent) {
                $parent_ID = $parent->ID;
                $parent_terms = wp_get_object_terms( $parent_ID, 'promotion_type' );
                if (count($parent_terms) > 0) {
                    return str_replace( '%promotion_type%' , $parent_terms[0]->slug , $post_link );
                } else {
                    return $post_link;
                }
            }
        }
    }
    return $post_link;  
}
add_filter( 'post_type_link', 'wpa_promotion_post_link', 1, 3 );



function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=condominium', // Condominium
        'edit.php?post_type=house', // house
        'edit.php?post_type=other', // other
        'edit.php?post_type=promotion', // promotion
        'edit.php?post_type=hot-deal', // hot deal
        'edit.php', // Posts
        'edit.php?post_type=asw_club', // asw_club
        'edit.php?post_type=news', // news
        'edit.php?post_type=360-virtual-tour', // 360-virtual-tour
        'edit.php?post_type=terms-and-conditions', // terms-and-conditions
        'wpcf7', // Contact
        'edit.php?post_type=cf7_api', // cf7_api
        'edit.php?post_type=form_api_log', // form_api_log
        'cfdb7-list.php',// Contacts Form
        'upload.php', // Media
        'edit.php?post_type=asw_iocn', // asw_iocn
        'njt-fs-filemanager', // File Manager
        'users.php', // Users
        'wpseo_dashboard', //SEO

        'separator2', // Second separator
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );


function ofsize($thing){
    $thingSize = 0;
    if (is_array($thing)) {
        $thingSize = sizeof($thing);
    }
    return $thingSize;
}
add_filter( 'wp_unique_post_slug', 'wpse17916_unique_post_slug', 10, 6 );
function wpse17916_unique_post_slug( $slug, $post_ID, $post_status, $post_type, $post_parent, $original_slug ) {
  if ( 'attachment' == $post_type )
    $slug = $original_slug . uniqid( '-' );
return $slug;
}

// function excerpt_br_tug87a( $excerpt ) {
//     if ( is_admin() ) {
//         return $excerpt;
//     }
//     $excerpt = str_replace( array('.'), '.<br />', $excerpt );
//     return $excerpt;
// }
// add_filter( 'get_the_excerpt', 'excerpt_br_tug87a', 999 );

function my_wpcf7_form_elements($html) {
    //wp_send_json($html );
    $text = 'Select Option';
    $html = str_replace('— กรุณาเลือก —',  $text, $html);

    return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_form_elements');

function setComma($num){
    if (is_numeric($num)) {
        return number_format($num);
    }else{
        return 0;
    }
}

function aswv2_gen_master($master_style,$content,$layout){
    $mix_content = $content;
    foreach ($master_style as $key => $value) {
        if (is_array($value)) {
            // pre('---'.$key.'-- is arr');
            if (isset($content[$key])) {
                // pre('---'.$key.'-- maybe overdie');
                $content_style = $content[$key];
                foreach ($content_style as $csk => $csv) {
                    // pre($csk);
                    // pre('from');
                    //pre($csv);
                    if ($csv == '') {
                        // pre('--- '.$csv.' blank so use master');
                        // pre('x----x----x' . $mix_content[$key][$csk]);
                        // pre('x----x----x' . $master_style[$key][$csk]);
                        if ($mix_content[$key][$csk] === '') {
                            $mix_content[$key][$csk] = $master_style[$key][$csk];
                        }
                    }
                    // pre('to');
                    // pre($mix_content[$key][$csk]);
                }
            }
        }
    }
    $style_group = ['color_swatch','color_gradient','text_color','button_color','new_tab_block','tab_line_color','text_form_color','form_color','new_progress_color'];
    $img_group = ['element','background_image','background_image_mobile'];

    echo '<style>:root{';

    foreach ($mix_content as $key => $value) {
        if (in_array($key, $style_group)) {
            foreach ($value as $sk => $sv) {
                $css_var = '--'.$layout.'--'.$key.'--'.$sk;
                echo "$css_var:$sv;";
            }
        }else if($key == 'element'){
            foreach ($value as $vk => $vv) {
                if ($vk == 'pagination_arrow_slide') {
                    $vk = 'pagination_arrow';
                }
                $css_var = '--'.$layout.'--'.$key.'--'.$vk;
                if ($vk == 'pagination_color') {
                    echo "$css_var:$vv;";   
                }else{
                    $vvv = $vv['sizes']['medium'];    
                    if ($vvv!='') {
                        echo "$css_var:url($vvv);";   
                    }else{
                        echo $css_var.":var(--all--".$key."--".$vk.");";
                    }
                }
            }
        }
    }
    echo "--$layout--tab_line_color_gd: linear-gradient(calc(1deg*var(--$layout--tab_line_color--degree)), var(--$layout--tab_line_color--color_start), var(--$layout--tab_line_color--color_end));";
    echo "--$layout--color_gradient: linear-gradient(calc(1deg*var(--$layout--color_gradient--degree,var(--all--color_gradient--degree))), var(--$layout--color_gradient--color_start,var(--all--color_gradient--color_start)), var(--$layout--color_gradient--color_end,var(--all--color_gradient--color_end)));";
    if ($mix_content['background_image']['sizes']['1536x1536'] != '') {
        echo '--'.$layout.'--background_image:url('.$mix_content['background_image']['sizes']['1536x1536'].');';// code...
    }
    if ($mix_content['background_image_mobile']['sizes']['large'] != '') {
        echo '--'.$layout.'--background_image_mobile:url('.$mix_content['background_image_mobile']['sizes']['large'].');';
    }
    if ($mix_content['background_color'] != '') {
        echo '--'.$layout.'--background_color:'.$mix_content['background_color'].';';
    }
    if ($mix_content['background'] != '') {
        echo '--'.$layout.'--background_color:'.$mix_content['background'].';';
    }

    
    if ($content['acf_fc_layout'] == 'facility') {
        if ($content['background_slide']['color_start'] != '') {
            echo '--'.$layout.'--background_slide--color_start:'.$content['background_slide']['color_start'].';';
        }
        if ($content['background_slide']['color_end'] != '') {
            echo '--'.$layout.'--background_slide--color_end:'.$content['background_slide']['color_end'].';';
        }
        if ($content['background_slide']['degree'] != '') {
            echo '--'.$layout.'--background_slide--degree:'.$content['background_slide']['degree'].'deg;';
        }

    }
    
    echo '}</style>';
    // pre($mix_content);
    return $mix_content;
}
function asw_project_render_theme($template_name,$common_layout){
    get_header();
    ?>
    <!-- ~~~~~~~~~~ Start Template V2 ~~~~~~~~~~ -->
    <!-- =====👇👇👇👇👇 Start Template V2 Header 👇👇👇👇👇===== -->
    <script src="<?= get_template_directory_uri() ?>/js/circle-progress.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/template-css/all.css?t=<?=time()?>">
    
    <?php
    
    $v2_master = get_field('template_master');
    $v2_content = get_field('v2_content');
    $style_group = ['color_swatch','color_gradient','text_color','button_color','new_tab_block','tab_line_color','text_form_color','form_color','new_progress_color'];

    echo "<style>:root{";
    foreach ($v2_master as $key => $value) {
        if (in_array($key, $style_group)) {
            foreach ($value as $sk => $sv) {
                $css_var = '--all--'.$key.'--'.$sk;
                echo "$css_var:$sv;";
            }
        }else if($key == 'element'){
            foreach ($value as $vk => $vv) {
                $css_var = '--all--'.$key.'--'.$vk;
                if ($vk == 'pagination_color') {
                    echo "$css_var:$vv;";   
                }else{
                    $vvv = $vv['sizes']['medium'];    
                    if ($vvv!='') {
                        echo "$css_var:url($vvv);";   
                    }
                }
            }
        }
    }
    echo "--all--tab_line_color_gd: linear-gradient(calc(1deg*var(--all--tab_line_color--degree)), var(--all--tab_line_color--color_start), var(--all--tab_line_color--color_end));";
    echo "--all--color_gradient: linear-gradient(calc(1deg*var(--all--color_gradient--degree)), var(--all--color_gradient--color_start), var(--all--color_gradient--color_end));";
    echo "}</style>";
    ?>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/template-css/default-<?=$template_name?>-style.css?t=<?=time()?>">
    <!-- =====🔺🔺🔺🔺🔺 End Template V2 Header 🔺🔺🔺🔺🔺===== -->
    <!-- =====👇👇👇👇👇 Start Template V2 Nav 👇👇👇👇👇===== -->
    <?php
    get_template_part("template-project/nav",'',[$template_name,$v2_content]);
    ?>
    
    <!-- =====🔺🔺🔺🔺🔺 End Template V2 Nav 🔺🔺🔺🔺🔺===== -->
    <!-- =====👇👇👇👇👇 Start Template V2 Loop 👇👇👇👇👇===== -->
    <?php
    foreach ($v2_content as $key => $content) {
        $layout = $content['acf_fc_layout'];
        // pre($layout);
        $show = $content['is_show'];
        // pre($show);
        if ($show != 'hide') {
            $opt = $template_name;
            $trash = [];
            $f = [];
            $master = get_field('template_master');
            if ($layout == 'contact') {
                $f['telephone_number'] = get_field('telephone_number');
                $f['line_id'] = get_field('line_id');
                $f['facebook'] = get_field('facebook');
                $f['sales_gallery'] = get_field('sales_gallery');
            }
            $f['terms_conditions'] = get_field('terms_conditions');
            if (in_array($layout, $common_layout)) {
                $opt = 'all';
            }
            if (!in_array($layout, $trash)) {
                get_template_part('template-project/'.$opt, $layout,[$content, $f, $template_name,$master,$opt,$layout]);
            }
            ?>
            <style type="text/css">
                <?=$content['css']?>
            </style>
            <?php
        }
    }
    ?>
    <!-- =====🔺🔺🔺🔺🔺 End Template V2 Loop 🔺🔺🔺🔺🔺===== -->
    <!-- =====👇👇👇👇👇 Start Template V2 Scroll JS 👇👇👇👇👇===== -->
    <?php
    asw_tpj_scroll_js();
    ?>
    <!-- =====🔺🔺🔺🔺🔺 End Template V2 Scroll JS 🔺🔺🔺🔺🔺===== -->
    <!-- ~~~~~~~~~~ End Template V2 ~~~~~~~~~~ -->
    <?php
    if (in_array(get_the_ID(), [119385, 51128])) {
      include(get_template_directory().'/template-parts/loan-calculator.php');
    }
    get_footer();
}

function act_template_project_css($opt,$template_name,$layout){
    if ($opt == 'all') {
        ?><link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/template-css/all-<?=$layout?>.css?t=<?=time()?>"><?php
    }
    ?><link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/template-css/<?=$template_name?>-<?=$layout?>.css?t=<?=time()?>"><?php
}
add_filter( 'pll_get_post_types', 'add_cpt_to_pll', 10, 2 );

function add_cpt_to_pll( $post_types, $is_settings ) {
    if ( $is_settings ) {
        // hides 'my_cpt' from the list of custom post types in Polylang settings
        unset( $post_types['my_cpt'] );
    } else {
        // enables language and translation management for 'my_cpt'
        $post_types['my_cpt'] = 'my_cpt';
    }
    return $post_types;
}

add_filter( 'pll_get_taxonomies', 'add_tax_to_pll', 10, 2 );

function add_tax_to_pll( $taxonomies, $is_settings ) {
    if ( $is_settings ) {
        unset( $taxonomies['my_tax'] );
    } else {
        $taxonomies['my_tax'] = 'my_tax';
    }
    return $taxonomies;
}

function asw_get_term_nest($taxonomy){
    $terms_nest = [];
    $map_parent = [];
    $terms = get_terms( array(
        'taxonomy' => $taxonomy,
        'hide_empty' => false
    ));
    foreach ($terms as $key => $value) {
        $id = $value->term_id;
        if ($value->parent == 0) {
            $parent = get_term($id,$taxonomy);
            $terms_nest[$parent->slug] = $value;
            $terms_nest[$parent->slug]->child = [];
            $map_parent[$id] = $parent->slug;
        }
    }
    foreach ($terms as $key => $value) {
        $id = $value->term_id;
        if ($value->parent != 0) {
            $parent_slug = $map_parent[$value->parent];
            array_push($terms_nest[$parent_slug]->child,$value);
        }
    }
    return $terms_nest;
}

function custom_excerpt_length( $length ) {
    return 100;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function asw_date_format($strdate){
    $timedate = strtotime($strdate);
    $lang = pll_current_language();
    $date = gmdate("j", $timedate);
    $month = gmdate("n", $timedate)-1;
    $year = gmdate("Y", $timedate);

    $m_array = [
        "th" => ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"],
        "en" => ["January","February","March","April","May","June","July","August","September","October","November","December"],
        "cn" => ["January","February","March","April","May","June","July","August","September","October","November","December"],
    ];
    $n_d = $date;
    $n_m = $m_array[$lang][$month];
    $n_y = $year;
    if ($lang == 'th') {
        $n_y += 543;
    }
    
    return "<i class='far fa-clock size-m'></i>&nbsp; $n_d $n_m $n_y";
}

function asw_hot_deal_book($v_App,$v_OrderTypePayment,$v_ProjectID,$v_UnitCode,$v_Amount){
    $endpoint = get_field('hot_deal_endpoint', 'option');
    if ($v_ProjectID != '' && $v_UnitCode != '' && $v_Amount > 0 && $endpoint != '') {
        $pram = "$v_App:$v_OrderTypePayment:$v_ProjectID:$v_UnitCode:$v_Amount";
        $password = 'wisepay@2023';
        $method = 'aes-256-cbc';
        $key = substr(hash('sha256', $password, true), 0, 32);
        $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
        $encrypted = base64_encode(openssl_encrypt($pram, $method, $key, OPENSSL_RAW_DATA, $iv));
        $hash = urlencode($encrypted);
        $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $key, OPENSSL_RAW_DATA, $iv);
        $book_url = $endpoint.$hash;
    }else{
        $book_url = '#!';
    }
    return $book_url;

}


if(isset($_GET['temp_send_mail_promotion'])){
    pre('test');
    die();
}

function custom_login_logo() {
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url("https://assetwise.co.thhttps://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2024/11/asw_logo1x1-e1731487149678.png");
            background-size: contain;
            height: 95px;
            width: 140px;
        }
    </style>';
}

add_action('login_enqueue_scripts', 'custom_login_logo');

function asw_front_page_scripts() {
    if (is_front_page()) {
        ?>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Fetching jobs data...');
                // Add your front page specific JavaScript code here
                const myHeaders = new Headers();
                myHeaders.append("Content-Type", "application/json");
                myHeaders.append("Authorization", "Bearer TcSUiv0UDb31Oyiy/9w+tyDcyYCwbIjhFCSufmpjFZAR9qLGXxADP3dK17ult9Ur56mHHsnooRRERRYX40bR+RUCpTPRUyhVTj0XYHVz0ZNR6KK/wI8uQQKx+hvDdf4cm9wLoglDQ92itnpc9wHiNFxGrbsssfHJPrzxxNDe5y8IOwIzOOqifFTGoESCQSTRXkdO7Tj+woTkLQYkMW2bdxK0McokHO6ZcVZAPPsDqLiriCkWS+ps4nGc0xJpjE9SVAxUkV+pNmAcUgmPXMTXtQ==");

                const raw = JSON.stringify({
                "companyID": "00000000-0000-0000-0000-000000000000",
                "bConnectionID": "7B93F134-D373-4227-B5A6-6B619FF0E355",
                "departmentName": "",
                "jobPosition": "",
                "perPage": 10,
                "page": 1,
                "total": 10,
                "searchStr": "",
                "urgently": true,
                "announce": true,
                "published": true
                });

                const requestOptions = {
                method: "POST",
                headers: myHeaders,
                body: raw,
                redirect: "follow"
                };

                fetch("https://aswservice.com/wrsapi/JobAnnouncement/JobAnnouncementsByPage", requestOptions)
                .then((response) => response.json())
                .then((result) => {
                    //console.log(result.jobs);
                    const jobsListElement = document.getElementById('wrs_jobs_list');
                    jobsListElement.innerHTML = result.jobs.map(job => `<li><a href="https://careers.assetwise.co.th/jobs/?id=${job.jobID}" class="text-neutral-500 hover:text-neutral-900 cursor-pointer">${job.jobPosition}</a></li>`).join('');
                })
                .catch((error) => console.error(error));
            });
        </script>
        <?php
    }
}

//add_action('wp_footer', 'asw_front_page_scripts');


class Footer_P_Walker extends Walker_Nav_Menu {
    
    // Override start_el to define the opening tag and the link
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        
        // 1. Get the URL and Title
        $url   = esc_url( $item->url );
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        // 2. Build your custom HTML string
        // We output the whole block here: <p><a href="...">Text</a></p>
        $item_output = sprintf(
            '<p class="w-400 py-1"><a href="%s" class="link-footer">%s</a></p>',
            $url,
            $title
        );

        // 3. Append to the output
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    // Override end_el to do nothing (prevents default </li>)
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        // We already closed the </p> in start_el, so we leave this empty
        // to prevent WordPress from outputting a closing </li>
    }
}