<?php 
global $masthead;
$f_header = get_field('header_code');
$f_body = get_field('body_code');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript">
        let xconsolex = {}
        xconsolex['log'] = (x)=>{
            // return xconsolex.log(x)
        }
    </script>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <script src="//instant.page/5.1.1" type="module" integrity="sha384-MWfCL6g1OTGsbSwfuMHc8+8J2u71/LA8dzlIN3ycajckxuZZmF+DNjdm7O6H3PSq"></script>
    <script src="https://cdn.plyr.io/3.6.12/plyr.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.12/plyr.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script type="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?=get_template_directory_uri() ?>/css/asw.css?t=<?=time()?>" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- SABLE Script -->
    <script src="https://cdn.sable.asia/tracking-672b8dd9c38c6d2ad2a8bbdd.js" data-cfasync="false"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1) #consent > div > div:nth-child(2)
            var div2 = document.querySelector("#consent > div > div:nth-child(2)");
            if (div2) {
            div2.style.setProperty("margin-top", "-20px");
            div2.style.setProperty("padding-left", "1.5rem");
            div2.style.setProperty("padding-right", "1.5rem");
            div2.style.setProperty("padding-bottom", "16px");
            }

            // 2) #consent > div > div:nth-child(2) > a > img
            var div2img = document.querySelector("#consent > div > div:nth-child(2) > a > img");
            if (div2img) {
            div2img.style.setProperty("margin", "0", "important"); 
            div2img.style.setProperty("width", "100px");
            div2img.style.setProperty("height", "auto");
            }
        });
    </script>
    <!-- End SABLE Script -->
    
    <?php if ($_SERVER['HTTP_HOST'] == "https://dev.assetwise.co.th"): ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-T273MSV');</script>
    <!-- End Google Tag Manager -->

<?php endif ?>
<?=$f_header?>
</head>
<?php 
if (!is_user_logged_in() AND 0) {
    ?>
    <img src="<?=get_site_url()?><?= get_template_directory_uri() ?>/img/under-construction.jpg" class=""> 
    <?php
    die();
}
?>
<?php $bodyClass = ''; if (is_active_sidebar( 'headbar_d' )) { $bodyClass = 'headbar-d'; } if (is_active_sidebar( 'headbar_m' )) { $bodyClass .= ' headbar-m'; } ?>

<body <?php body_class($bodyClass); ?>>
    <?=$f_body?>
    <?php if ($_SERVER['HTTP_HOST'] == "https://dev.assetwise.co.th"): ?>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T273MSV"
            height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->
        <?php endif ?>
        <style type="text/css">
            #loadscreen {
                position: fixed;
                left: 0;
                top: 0;
                bottom: 0;
                right: 0;
                background-color: #fff;
                z-index: 100000;
                display: flex;
                justify-content: center;
                align-items: center;
                position: 0;
                transition: all .3s;
            }
            #loadscreen .load-img{
                width: 128px;
            }
            #loadscreen[data-loaded="1"]{
                opacity: 0;
                pointer-events: none;
            }
            #loadscreen img {
                width: 150px;
                display: block;
                margin-top: 1rem;
            }
            #loadscreen .-inner{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-flow: column;
            }

        </style>
        <div id="loadscreen" data-loaded="0">
         <div class="-inner">
            <lottie-player class="load-img" src="/wp-content/themes/assetwise/css/load.json" background="transparent"  speed="1"  loop autoplay></lottie-player>
            <img src="https://asw-mainweb-medias.s3.ap-southeast-1.amazonaws.com/uploads/2023/05/CleanShot-2566-05-08-at-04.57.00@2x.png">
        </div>
    </div>
    <div class="scroll-to-top"></div>
    <script type="text/javascript">
        // document.body.style.opacity = 0
        window.addEventListener("load", (event) => {
          loaded_fonts()
      });
       //  document.fonts.ready.then(function () {
       //     loaded_fonts()
       // });
        function loaded_fonts(){
            loadscreen.dataset.loaded = 1
        }
    </script>
    <?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } ?>
    <a  class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
    <div id="page" class="site">
        <?php get_template_part( 'template-parts/site', 'header' ) ?>
        <?php 
        if (is_front_page()) {
           if (is_active_sidebar( 'home_banner' )) {
            echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
        } 
    } else {
       if (is_active_sidebar( 'page_banner' )) {
        echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
    }
}
?>

<div id="content" class="site-content">