<?php 
$xlang = pll_current_language();
$term_pj_type = asw_get_term_nest('project-type');
?>
<script>
    function $(el) {
        return document.querySelector(el);
    }
    function $$(el) {
        return document.querySelectorAll(el);
    }

    function showUpperimg(txt) {
        document.getElementById("condo-upper-img").style.backgroundImage = "url('" + txt + "')";
    }
    
    function showUpperimg2(txt) {
        document.getElementById("town-upper-img").style.backgroundImage = "url('" + txt + "')";
    }
</script>
<?php
global $masthead;
if (!isset($masthead)) { //ถ้าไม่ได้ตั้งค่า masthead มาตั้งแต่ไฟล์เทมเพลตที่เรียกใช้
    if (get_field('masthead') != null) { //และถ้ามีการตั้งค่าที่ editor
        $masthead = intval(get_field('masthead'));
    } else { //แต่ถ้ายังไม่มีการตั้งค่าที่ editor
        $masthead = 1;
    }
}

if ($masthead == 0) {
} else {
    $display_site_logo = intval(get_field('display_site_logo', 'option'));
    $display_site_name = intval(get_field('display_site_name', 'option'));
    $display_search = intval(get_field('display_search', 'option'));
    $site_logo_max_height = intval(get_field('site_logo_max_height', 'option'));
    $site_logo_margin = intval(get_field('site_logo_margin', 'option'));
    $site_header_space = $site_logo_max_height + $site_logo_margin + $site_logo_margin;
    if ($site_header_space < 70) {
        $site_header_space = 70;
    }
    ?>
    <style type="text/css">
        body {
            min-width: 320px;
            transition: opacity .5s;
        }

        .logo_lang {
            margin-right: 32px;
        }

        .site-nav-d li a {
            padding: 19px 22px;
        }
        /*-- Mobile Version --*/
        @media (max-width: 1440px) {
            .site-nav-d li a {
                padding: 19px 15px;
            }
        }

        .nav-icon {
/*            filter: brightness(0);*/
}

.nav-icon:hover {
/*            filter: brightness(1);*/
}

.tel-icon {
    display: flex;
    flex-direction: row;
    transition: all .5s;
    align-items: center;
    cursor: pointer;
}

.tel-number {
    display: inline-block;
    padding: 0 0px;
    max-width: 0;
    opacity: 0;
    transition: all .5s;
    cursor: pointer;
    color: var(--ci-blue-500);
    overflow: hidden;
}

.tel-icon:hover .tel-number {
    opacity: 1;
    max-width: 5em;
    padding: 0 6px;
}


@media (min-width: 992px) {
    .site-branding img {
        max-height: 20px;
        margin-top:
        <?= $site_logo_margin ?>
        px;
        margin-bottom:
        <?= $site_logo_margin ?>
        px;
    }

    .site-header,
    .site-header-space {
        min-height:
        <?= $site_header_space ?>
        px;
    }
}

@media (max-width: 1320px) {


    .site-header {
        padding-left: 18px;
        padding-right: 18px;
    }

    .site-left-bar {
        position: static;
    }

    .site-right-bar {
        /*                justify-content: end;*/
        padding-left: 0;
    }

    .change-lang {
        display: none;
    }

    .logo_lang {
        margin-right: 0px;
        position: relative;
        left: -70px;

    }

    .logo_lang img {}

    .txt-menu {
        display: none !important;
    }
}

@media (max-width: 991px) {
    .logo_lang {
        position: static;
    }

    .site-header {
        padding-left: 28px;
        padding-right: 28px;
        /*padding-top: 9px;*/
        /*padding-bottom: 9px;*/
    }
}

@media (max-width: 368px) {
    .site-header {
        padding-left: 0px;
        padding-right: 0px;
    }
}

@media (max-width: 1320px) {
    .logo-hide-cont-left {
        margin-left: -20px;
    }
}

.site-branding {
    position: static;
    transform: unset;
}



.change-lang {
    transition: all .5s;
    position: relative;
}

.change-lang:hover {
    color: var(--ci-blue-500);
}
.-h-lang-this-lang img{
    display: inline-block;
    width: 24px !important;
}
.change-lang .-more-lang {
    display: none;
    position: absolute;
    left: -1rem;
    right: 0;
    background: #fff;
    top: calc(100%);
    padding: 0.5rem 1rem;
    width: max-content;
    min-width: calc(100% + 2rem);
    box-shadow: 0 0 0 1px rgba(0, 0, 0, .04), 0 2px 4px 0 rgba(0, 0, 0, .08);
    text-align: left;
}
.change-lang:hover .-more-lang{
    display: grid;
}

.change-lang[data-lang-count="1"] svg,
.change-lang[data-lang-count="0"] svg {
    display: none;
}
.change-lang[data-lang-count="1"] .-more-lang,
.change-lang[data-lang-count="0"] .-more-lang {
    display: none !important;
}
<?php
if (str_contains($_SERVER['REQUEST_URI'], 'condominium')) {
    echo ".menu-desktop-menu-container .menu li:nth-child(1) a{
        color:var(--ci-blue-500);
    }";
} else if (str_contains($_SERVER['REQUEST_URI'], 'house')) {
    echo ".menu-desktop-menu-container .menu li:nth-child(2) a{
        color:var(--ci-blue-500);
    }";
} else if (str_contains($_SERVER['REQUEST_URI'], 'promotion')) {
    echo ".menu-desktop-menu-container .menu li:nth-child(3) a{
        color:var(--ci-blue-500);
    }";
} else if (str_contains($_SERVER['REQUEST_URI'], 'about-us') or str_contains($_SERVER['REQUEST_URI'], 'reward')) {
    echo ".menu-desktop-menu-container .menu li:nth-child(4) a{
        color:var(--ci-blue-500);
    }";
}
?>

.ham-lang-mob {
    padding-left: 2.5rem;
    padding-top: 2rem;
    display: flex;
    gap: 33px;
}
.ham-lang-mob a {
    color: var(--White, #FFF);
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: 32px;
    position: relative;
}
.ham-lang-mob a:after {
    content: " ";
    width: 1px;
    height: 8px;
    background-color: #fff;
    display: block;
    position: absolute;
    top: calc(16px - 4px);
    right: -16px;
}
.ham-lang-mob a:last-child:after {
    display: none;
}
/*.compare-icon.nav-icon {
    display: none;
}*/


</style>

<!-- ปิดภาษาจีนหน้าแรก -->

<style type="text/css">

    /*body.home a.-this-lang-cn,*/
    /*.ham-lang-mob a:nth-child(3),*/
    /*.ham-lang-mob a:nth-child(2)::after {*/
    /*    display: none;*/
    /*}*/

</style>
<script>
    if(location.pathname == '/cn/' || location.pathname == '/cn'){
        location.href = '/'
    }
</script> 


<header id="masthead" class="site-header _heading fixed whitespace-nowrap" style="z-index: 9999;">
    <div class="container mx-auto" style="padding-left: 0;padding-right: 0;">
        <div class="grid grid-cols-12 md:gap-4 w-full header-layout">
            <div class="left-header-buffer"></div>
            <div class="col-span-6 xl:col-span-9 flex items-center relative site-left-bar">
                <div class="site-branding">
                    <a href="<?php echo home_url(); ?>" class="logo_lang- logo-hide-cont-left-">
                        <img src="/wp-content/uploads/2023/05/CleanShot-2566-05-08-at-04.57.00@2x.png">
                    </a>
                    <div class="grid grid-flow-col gap-4" id="header-nav-items">
                        <nav id="site-navigation" class="site-nav-d _desktop txt-menu dbfon" style="font-weight: 400;">
                            <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-span-6 xl:col-span-3 text-right flex items-center site-right-bar justify-end -pl-12">
                <div class="site-tools flex flex-row items-center gap-4 xl:gap-5">
                    <div class="flex flex-row items-center change-lang pointer" data-lang-count="1" style="-margin-right: 10px;">
                        <div class="-h-lang-this-lang">
                            <img src="/wp-content/themes/seed-spring/img/th.png" alt="ไทย" />
                            <h6 class="inline-block site-lang-txt">ไทย</h6>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none" class="--more ml-3">
                            <path d="M4 6L8 10L12 6" stroke="#545E67" stroke-width="1.33" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <div class="-more-lang">
                        </div>
                    </div>
                    <?php 
                    $translations = pll_the_languages(array(
                        'raw'=>1,
                        'show_flags'=>1,
                        'hide_if_no_translation'=>1,
                        'hide_if_empty'=>1
                    ));
                    $translations_size = ofsize($translations);
                    $translations_json = addslashes(json_encode($translations,JSON_UNESCAPED_UNICODE));
                    ?>
                    <script type="text/javascript">
                        const page_lang = JSON.parse('<?=$translations_json?>');
                        function setLangSite(){
                            const page_lang_size = <?=$translations_size?>;
                            document.querySelector('.change-lang').dataset.langCount = page_lang_size;
                            let lang_html = ``;
                            for(let lll in page_lang){
                                let thislang = page_lang[lll];
                                xconsolex.log(thislang);
                                if (thislang.current_lang) {
                                    document.querySelector('.-h-lang-this-lang .site-lang-txt').innerText = thislang.name;
                                    document.querySelector('.-h-lang-this-lang img').src = `/wp-content/themes/seed-spring/img/${thislang.slug}.png`;
                                }else{
                                    //ถ้าจะเปิดจีนเหมือนเดิม เอา if ด้านล่างออก
                                    if(lll != 'cn'){
                                        lang_html += `<a href="${thislang.url}" class="-this-lang-${lll}">
                                        <img src="/wp-content/themes/seed-spring/img/${lll}.png" class="inline" style="width: 24px;margin-right: 5px;">
                                        <h6 class="inline-block site-lang-txt">${thislang.name}</h6>
                                        </a>`;
                                    }
                                }
                            }
                            document.querySelector('.-more-lang').innerHTML = lang_html;
                            let mob_html = ``
                            for(let i in page_lang){
                                //ถ้าจะเปิดจีนเหมือนเดิม เอา if ด้านล่างออก
                                if(i != 'cn'){
                                    mob_html += `<a style="" href="${page_lang[i].url}">${page_lang[i].name}</a>`
                                }
                            }
                            
                            // let mob_html = ``
                            // if (page_lang['th'] != undefined) {
                            //     mob_html += `<a style="" href="${page_lang['th'].url}">${page_lang['th'].name}</a>`
                            // }
                            // if (page_lang['en'] != undefined) {
                            //     mob_html += `<a style="" href="${page_lang['en'].url}">${page_lang['en'].name}</a>`
                            // }
                            // if (page_lang['cn'] != undefined) {
                            //     mob_html += `<a style="" href="${page_lang['cn'].url}">${page_lang['cn'].name}</a>`
                            // }

                            document.querySelector('.ham-lang-mob').innerHTML = mob_html
                        }
                        window.addEventListener("load", (event) => {
                            setLangSite()
                        });
                    </script>
                    <div class="compare-icon nav-icon">
                        <a href="/compare" target="_blank" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.46967 8.53035C1.17678 8.23746 1.17678 7.76259 1.46967 7.46969L6.24264 2.69672C6.53553 2.40383 7.01041 2.40383 7.3033 2.69672C7.59619 2.98961 7.59619 3.46449 7.3033 3.75738L3.81066 7.25002H22C22.4142 7.25002 22.75 7.58581 22.75 8.00002C22.75 8.41424 22.4142 8.75002 22 8.75002H3.81066L7.3033 12.2427C7.59619 12.5356 7.59619 13.0104 7.3033 13.3033C7.01041 13.5962 6.53553 13.5962 6.24264 13.3033L1.46967 8.53035Z" fill="#202831"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5303 18.0304C22.8232 17.7375 22.8232 17.2626 22.5303 16.9697L17.7574 12.1967C17.4645 11.9038 16.9896 11.9038 16.6967 12.1967C16.4038 12.4896 16.4038 12.9645 16.6967 13.2574L20.1893 16.75H2C1.58579 16.75 1.25 17.0858 1.25 17.5C1.25 17.9142 1.58579 18.25 2 18.25H20.1893L16.6967 21.7427C16.4038 22.0356 16.4038 22.5104 16.6967 22.8033C16.9896 23.0962 17.4645 23.0962 17.7574 22.8033L22.5303 18.0304Z" fill="#202831"/>
                            </svg>
                            <div class="badge" data-count="0">0</div>
                        </a>
                    </div>
                    <div class="tel-icon nav-icon">
                        <svg class="pointer" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M20.9975 15.9201V18.9201C20.9986 19.1986 20.9416 19.4743 20.83 19.7294C20.7184 19.9846 20.5548 20.2137 20.3496 20.402C20.1443 20.5902 19.9021 20.7336 19.6382 20.8228C19.3744 20.912 19.0949 20.9452 18.8175 20.9201C15.7403 20.5857 12.7845 19.5342 10.1875 17.8501C7.77132 16.3148 5.72283 14.2663 4.18749 11.8501C2.49747 9.2413 1.44573 6.27109 1.11749 3.1801C1.0925 2.90356 1.12537 2.62486 1.21399 2.36172C1.30262 2.09859 1.44506 1.85679 1.63226 1.65172C1.81945 1.44665 2.0473 1.28281 2.30128 1.17062C2.55527 1.05843 2.82983 1.00036 3.10749 1.0001H6.10749C6.5928 0.995321 7.06328 1.16718 7.43125 1.48363C7.79922 1.80008 8.03957 2.23954 8.10749 2.7201C8.23411 3.68016 8.46894 4.62282 8.80749 5.5301C8.94203 5.88802 8.97115 6.27701 8.8914 6.65098C8.81164 7.02494 8.62635 7.36821 8.35749 7.6401L7.08749 8.9101C8.51105 11.4136 10.5839 13.4865 13.0875 14.9101L14.3575 13.6401C14.6294 13.3712 14.9726 13.1859 15.3466 13.1062C15.7206 13.0264 16.1096 13.0556 16.4675 13.1901C17.3748 13.5286 18.3174 13.7635 19.2775 13.8901C19.7633 13.9586 20.2069 14.2033 20.524 14.5776C20.8412 14.9519 21.0097 15.4297 20.9975 15.9201Z" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <a href="tel:02-168-0000" class="pt-1">
                            <h6 class="whitespace-nowrap tel-number pointer-events-none">
                                02-168-0000
                            </h6>
                        </a>
                    </div>
                    <div class="pointer nav-icon" onclick="document.querySelector('#search-popup-wrap').dataset.toggle=1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M18.9984 18.9984L14.6484 14.6484" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="pointer nav-icon" onclick="openMenubur()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                            <path d="M7 8L19 8" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 1H19" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M1 15H19" stroke="#202831" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>


        <?php if (is_active_sidebar('headbar_m')): ?>
            <div id="headbar_m" class="_mobile">
                <?php dynamic_sidebar('headbar_m'); ?>
            </div>
        <?php endif; ?>

        <?php if (is_active_sidebar('headbar_d')): ?>
            <div id="headbar_d" class="_desktop">
                <?php dynamic_sidebar('headbar_d'); ?>
            </div>
        <?php else: ?>

        <?php endif; ?>

        <?php if ($display_search): ?>
                <!-- <a class="site-search s-modal-trigger m-user" onclick="return false;"
                    data-popup-trigger="site-search"><i class="si-search-o"></i></a> -->
                <?php endif ?>

                <?php seed_member_menu() ?>

                <?php if (is_active_sidebar('action')): ?>
                    <div class="site-action _desktop">
                        <?php dynamic_sidebar('action'); ?>
                    </div>
                <?php endif; ?>

            </div>
            <nav id="site-nav-m" class="site-nav-m">
                <div class="container mx-auto">
                    <?php wp_nav_menu(array('theme_location' => 'mobile', 'menu_id' => 'mobile-menu')); ?>
                </div>
            </nav>
        </header>

        <div class="s-modal -full" data-s-modal="site-search">
            <span class="s-modal-close"><i class="si-cross-o"></i></span>
            <?php get_search_form(); ?>
        </div>

        <div class="site-header-space"></div>
        <?php
    }
    ?>
    <style type="text/css">
        #burger-1 {
            z-index: 905;
            transition: .5s;
            width: 35%;
            overflow-y: auto;
            overflow-x: hidden;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #burger-1::-webkit-scrollbar {
            display: none;
        }

        #burger-2 {
            border-left: 5px solid var(--ci-veri-400);
            transition: .5s;
            width: 65%;
            height: 100%;
        }

        #burger-txt {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        #burger-txt::-webkit-scrollbar {
            display: none;
        }

        #sub-service {
            left: 195px;
            overflow: hidden;
            opacity: 0;
            transition: .5s;
            width: 100%;
            max-height: 0;
            position: absolute;
        }

        #sub-business {
            left: 195px;
            overflow: hidden;
            opacity: 0;
            transition: .5s;
            width: 100%;
            max-height: 0;
            position: absolute;
        }

        .tel-fix {
            position: fixed;
            top: 20px;
            right: 9.5vw;
            font-size: 35px;
            transition: .3s;
        }

        .w-bottom {
            bottom: 0;
            -webkit-mask-image: -webkit-gradient(linear, left bottom, left top, from(rgba(0, 0, 0, 1)), to(rgba(0, 0, 0, 0)));
            mask-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
        }

        @media (max-width: 1268px) {

            #sub-service,
            #sub-business {
                position: relative;
                left: 24px;
            }

            .burger-service,
            .burger-co-business {
                flex-direction: column;
            }

            #line-serv,
            #line-busi {
                left: 0 !important;
                top: 0 !important;
            }

            .burger-main-wrap {
                overflow-y: scroll;
                overflow-x: hidden;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .burger-main-wrap::-webkit-scrollbar {
                display: none;
            }
        }

        @media (max-width: 991px) {
            #burger-1 {
                width: 100%;
            }

            #burger-2 {
                width: 0%;
                border-left: 0px solid var(--ci-veri-400);
            }

            #town-burger,
            #condo-burger {
                display: none;
            }

            .txt-2 {
                width: 70%;
            }
        }

        @media (max-width: 768px) {
            #burger-1 {
                width: 100%;
            }

            #burger-2 {
                width: 0%;
            }

            .graylogo {
                outline-width: 2px;
            }

            .close-menu {
                right: 20px;
            }

            .search-fix {
                right: 50px;
            }

            .tel-fix {
                right: 85px;
            }

            .txt-1 {
                width: 275px;
            }

            .txt-2 {
                width: 310px;
            }

            .rookson {
                float: right;
                /* margin-top: 12px; */
            }
        }

        #menu-burger {
            width: 100%;
            height: 100vh;
            z-index: 10000;
            top: 0;
            opacity: 0;
            left: 120%;
            transition: 1s;
            background-color: var(--ci-blue-300);
        }
        [data-pll-<?=$xlang?>="hide"]{
            display: none;
        }
    </style>
    <div id="menu-burger" class="fixed">
        <span class="close-menu cursor hidden" onclick="closeMenubur()" style="z-index: 10001;top: 25px;">&times;</span>
        <img src="/wp-content/uploads/2022/10/Group-517.png"
        style="width: 22px;z-index: 10001;top: 30px;" class="search-fix hidden"
        onclick="document.querySelector('#search-popup-wrap').dataset.toggle=1">
        <a href="tel:02-168-0000"><img src="/wp-content/uploads/2022/10/Vector-9.png"
            style="width: 20px; z-index: 10001;top: 30px;" class="tel-fix hidden"></a>
            <div class="burger-main-wrap inline-flex w-full h-full">
                <div id="burger-1" class="bg-ci-blue-300 container relative">
                    <img src="/wp-content/uploads/2022/11/shutterstock_1574382076-1-1.png"
                    class="absolute pointer-events-none leaf-burger">
                    <img src="/wp-content/themes/seed-spring/img/<?=$xlang?>/logo-asw.png"
                    class="flex items-start mt-6 ml-10"  style="max-width: 188px;">
                    <div class="ham-lang-mob">

                    </div>
                    <!-- <div class="bg-cover" style="width: 270px; height: 40px;background-image: url('/wp-content/uploads/2022/10/Screen-Shot-2565-07-14-at-17.49-1.png');"></div> -->
                    <sp class=""></sp>
                    <div id="burger-txt" class="relative grid grid-rows-2 gap-6 place-content-center pt-4"
                    style="left: 120%;transition: 1s;">
                    <div class="row-span-1 text-white txt-1">
                        <div class="grid grid-flow-rows gap-2 text-3xl lg:text-4xl" style="line-height: 1.1;">
                            <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt default"><a href="/<?=$xlang?>/home" class="menu-txt"><?php pll_e('หน้าแรก')?></a></div>
                            <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt condo-burger"><a href="/<?=$xlang?>/condominium" class="menu-txt"><?php pll_e('คอนโดมิเนียม')?></a>
                                <p style="transition: .5s;opacity: 0;" class="rookson text-3xl inline-block">→</p>
                            </div>
                            <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt town-burger"><a href="/<?=$xlang?>/house" class="menu-txt"><?php pll_e('บ้านและทาวน์โฮม')?></a>
                                <p style="transition: .5s;opacity: 0;" class="rookson text-3xl inline-block">→</p>
                            </div>

                            <?php if ($xlang != 'en'): ?>
                               <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt"><a href="/<?=$xlang?>/promotion" class="menu-txt"><?php pll_e('โปรโมชั่น')?></a></div>     
                           <?php endif ?>

                           <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt"><a href="/<?=$xlang?>/about-us" class="menu-txt"><?php pll_e('รู้จักแอสเซทไวส์')?></a></div>
                           <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt"><a target="_blank" href="https://investor.assetwise.co.th/<?=$xlang?>/home" class="menu-txt"><?php pll_e('นักลงทุนสัมพันธ์')?></a></div>
                           <sp class=""></sp>
                           <div class="bg-ci-blue-400" style="width: 75px;height: 1px;"></div>
                           <sp class=""></sp>
                       </div>
                   </div>
                   <div class="row-span-1 txt-2">
                    <div class="grid grid-flow-rows cl-ci-blue-800 text-2xl pl-8" style="font-weight:300;">
                        <?php if ($xlang != 'en'): ?>
                           <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt" onclick="location.href='/<?=$xlang?>/club';"><?php pll_e('แอสเซทไวส์คลับ')?></div>
                       <?php endif ?>

                       <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt" onclick="location.href='/<?=$xlang?>/news';"><?php pll_e('ข่าวสาร')?></div>
                       <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt" onclick="location.href='/<?=$xlang?>/blog';"><?php pll_e('บล็อก')?></div>
                       <div class="burger-service service menu-txt flex flex-row">
                        <?php pll_e('บริการ')?>
                        <div id="line-serv" class="bg-ci-veri-500 relative"
                        style="left: 1%;top: 45%;max-width: 0;width: 100px;height: 3px;opacity: 0;transition: .5s">
                    </div>
                    <div id="sub-service" class="flex flex-col cl-ci-blue-800">
                        <sp class="s block lg:hidden"></sp>
                        <a href="#!" class="hidden"><?php pll_e('360 Virtual Gallery') ?></a>
                        <a target="_blank" href="https://aswinno.assetwise.co.th/bankmatching?utm_source=Website&utm_medium=HeroBanner&utm_campaign=Home_BankMatching"
                        class=""><?php pll_e('Bank Matching') ?></a>
                        <a href="#!" class="hidden"><?php pll_e('AssetWise Application') ?></a>
                        <a href="#!" class="hidden"><?php pll_e('AssetWise Customer Care') ?></a>
                        <sp class="s"></sp>
                    </div>
                </div>
                <div class="burger-co-business co-business menu-txt flex flex-row">
                    <?php pll_e('สนใจทำธุรกิจกับเรา')?>
                    <div id="line-busi" class="bg-ci-veri-500 relative"
                    style="left: 1%;top: 45%;max-width: 0;width: 20px;height: 3px;opacity: 0;transition: .5s">
                </div>
                <div id="sub-business" class="flex flex-col cl-ci-blue-800">
                    <sp class="s block lg:hidden"></sp>
                    <a data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" target="_blank" href="https://aswland.assetwise.co.th/" class=""><?php pll_e('เสนอขายที่ดิน')?></a>
                    <!-- <a data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" target="_blank" href="https://procurement.assetwise.co.th/" class=""><?php pll_e('เสนอขายสินค้าและบริการ')?></a> -->
                    <a data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" target="_blank" href="https://www.assetaplus.com/" class=""><?php pll_e('ฝากขาย-ฝากเช่า')?></a>
                    <sp class="s"></sp>
                </div>
            </div>
            <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt" onclick="location.href='https://career.assetwise.co.th/';"><?php pll_e('ร่วมงานกับเรา')?></div>
            <div data-pll data-pll-th="show" data-pll-en="show" data-pll-cn="show" class="menu-txt" onclick="location.href='/<?=$xlang?>/contact';"><?php pll_e('ติดต่อเรา')?></div>
        </div>
    </div>
</div>
</div>
<div id="burger-2" class="bg-white relative">
    <img src="/wp-content/uploads/2022/11/image-74.png"
    class="absolute pointer-events-none w-bottom">
    <div id="default" class="flex items-center h-full pl-16 pr-16" style="width: 95%;padding-bottom: 140px;">
        <?php
        $ttt = get_fields(2);
                // pre($ttt['ham_image']['url']);
        ?>
        <div class="bg-cover blank bg-grey" ratio="facebook"
        style="background-image:url('<?= $ttt['ham_image']['url'] ?>')">
    </div>
</div>
<style type="text/css">
    .burger-cards-wrap {
        --max: 99;
        --i: 0;
        display: grid;
        grid-template-columns: repeat(var(--max), calc(100% - 0px));
        grid-column-gap: 0px;
        position: relative;
        transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
        left: calc(var(--i) * -100%);
        width: 100%;
    }

    .burger-town-cards-wrap {
        --max: 99;
        --j: 0;
        display: grid;
        grid-template-columns: repeat(var(--max), calc(100% - 0px));
        grid-column-gap: 0px;
        position: relative;
        transition: all .5s cubic-bezier(0, 0, 0.3, 1.07);
        left: calc(var(--j) * -100%);
        width: 100%;
    }

    .burger-project-nav,
    .burger-town-project-nav {
        display: flex;
        justify-content: center;
    }

    .burger-project-nav .-nav,
    .burger-town-project-nav .-nav {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        margin: 0 3px;
        cursor: pointer;
    }

    .burger-project-nav .-nav div,
    .burger-town-project-nav .-nav div {
        width: 100%;
        height: 1px;
        background-color: #828A92;
        transition: all .3s;
    }

    .burger-project-nav .-nav.-active div,
    .burger-town-project-nav .-nav.-active div {
        height: 4px;
        background-color: #3A638E
    }

    .burger-arrow img {
        z-index: 902;
        top: 50px;
        transition: .2s;
        cursor: pointer;
        opacity: 0.7;
    }

    .burger-arrow img:hover {
        opacity: 1;
    }

    .burger-card {
        opacity: 0;
        transition: .5s ease;
    }

    .back-burger {
        transform: rotate(180deg);
        position: absolute;
        top: 20px;
        left: 20px;
        width: 22px;
        cursor: pointer;
    }

    .condo-burger-mini {}

    li a[href="/en/promotion"],
    li a[href="https://dev.assetwise.co.th/en/promotion/"]{
        display: none;
    }
</style>
<div id="condo-burger" class="flex items-center relative h-full pl-16 pr-16 pb-15 hidden"
style="width: 95%;">
<div class="w-full">
    <div>
        <div id="condo-upper-img" class="bg-cover blank bg-grey" ratio="facebook"
        style="background-image:url('/wp-content/uploads/2022/11/Rectangle-235-1.jpg');transition: .3s linear !important;">
    </div>
</div>
<div class="">
    <div class="burger-arrow flex flex-row">
        <img src="/wp-content/uploads/2022/09/slide-arrow-l.png"
        class="relative w-10 h-10" onclick="burgerProjectArrow(-1)" style="margin-left: -30px;">
        <img src="/wp-content/uploads/2022/09/slide-arrow-r.png"
        class="relative w-10 h-10" onclick="burgerProjectArrow(1)" style="margin-right: -30px;">
    </div>
    <div style="overflow: hidden;height: 68px;padding-top: 1px;">
        <div class="burger-cards-wrap">
            <?php
            $chk_con = 0;
            foreach ($term_pj_type['condominium']->child as $key => $value) {
                $is_show = get_field('is_show',$value->taxonomy . '_' . $value->term_id);
                if ($is_show != 'hide') {

                    $iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id);
                    $pimg = get_field('project_image', $value->taxonomy . '_' . $value->term_id);
                    $h_condo_link = get_term_link($value->term_id);
                    if ($chk_con == 0) { ?>
                        <script type="text/javascript">
                            showUpperimg('<?= $pimg['url'] ?>')
                        </script>
                        <div class="burger-card grid grid-cols-3 gap-4 px-8"
                        style="opacity: 1;transition: .5s ease;">
                    <?php }
                    if ($chk_con % 3 == 0 && $chk_con != 0) { 
                        ?>
                    </div>
                    <div class="burger-card grid grid-cols-3 gap-4 px-8">
                    <?php } ?>
                    <div onmouseover="showUpperimg('<?= $pimg['url'] ?>')"
                        class="burger-cards rounded-lg py-2 flex items-center pointer graylogo"
                        onclick="location.href='<?=$h_condo_link?>'">
                        <img src="<?= $iconic['url'] ?>" style="height: 50px;">
                    </div>
                    <?php
                    $chk_con++;

                }
            }
            echo "</div>";
            ?>

        </div>
    </div>
</div>
<div class="burger-project-nav">
    <?php
    $chk_con = ceil($chk_con / 3) - 1;
    for ($i = 0; $i < $chk_con + 1; $i++) { ?>
        <div class="-nav <?php if ($i == 0) {
            echo '-active';
        } ?>" onclick="burgerProjectNav(<?= $i ?>,this)">
        <div></div>
    </div>
<?php }
?>
</div>
</div>
<script type="text/javascript">
    function burgerProjectNav(num, el) {
        document.querySelector('.burger-cards-wrap').style.setProperty("--i", num);
        for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
            i.classList.remove('-active')
        }
        el.classList.add('-active')
        let ara = document.getElementsByClassName("burger-card")
        for (var j = 0; j < ara.length; j++) {
            if (j == num) {
                ara[j].style.opacity = "1"
            } else {
                ara[j].style.opacity = "0"
            }
        }
    }

    function burgerProjectArrow(num) {
        let rs = getComputedStyle(document.querySelector('.burger-cards-wrap'))
        var prop = parseFloat(rs.getPropertyValue('--i'))
        let totnav = <?= $chk_con ?>;
        let sed = 0,
        chk = 0,
        chk1 = 0
        if (prop + num < 0) {
            sed = totnav
        } else if (prop + num > totnav) {
            sed = 0
        } else {
            sed = prop + num
        }
        for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
            if (i.classList.contains("-active")) {
                chk = chk1
            }
            chk1++
        }
        chk += num
        chk = (chk < 0) ? chk1 - 1 : chk;
        chk = (chk > chk1 - 1) ? 0 : chk;
        chk1 = 0
        for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
            if (chk == chk1) {
                chk = i
            }
            chk1++
        }
        burgerProjectNav(sed, chk)
    }

</script>
</div>
<div id="condo-burger-mini" class="pt-20 px-8 hidden">
    <img src="/wp-content/uploads/2022/11/arrow.png"
    class="back-burger" onclick="back_burger()">
    <div id="show-condo-mini">
        <span class="flex flex-row items-center justify-center">
            <h6 class=""><?php pll_e('คอนโดมิเนียม') ?> </h6>
        </span>
        <sp class="l"></sp>
        <div class="grid grid-cols-2 grid-flow-row gap-6 px-1 md:px-40">
            <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer justify-center"
            onclick="location.href='/<?=$xlang?>/condominium';" style="outline-width: 1px;">
            <?php pll_e('ดูทั้งหมด') ?>  <p></p>
        </div>
        <?php
        foreach ($term_pj_type['condominium']->child as $key => $value) {
            $h_condo_link = get_term_link($value->term_id);
            $iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id); ?>
            <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer"
            onclick="location.href='<?=$h_condo_link?>';">
            <img src="<?= $iconic['url'] ?>">
        </div>
        <?php 
    }
    ?>
</div>
</div>
</div>

<div id="town-burger" class="flex items-center relative h-full pl-16 pr-16 pb-15 hidden"
style="width: 95%;">
<div class="w-full">
    <div id="town-upper-img" class="bg-cover blank bg-grey" ratio="facebook"
    style="background-image:url('/wp-content/uploads/2022/11/Rectangle-235-2.jpg');transition: .3s linear !important;">
</div>
<div class="burger-arrow flex flex-row">
    <img src="/wp-content/uploads/2022/09/slide-arrow-l.png"
    class="relative w-10 h-10" onclick="burgerTownArrow(-1)" style="margin-left: -30px;">
    <img src="/wp-content/uploads/2022/09/slide-arrow-r.png"
    class="relative w-10 h-10" onclick="burgerTownArrow(1)" style="margin-right: -30px;">
</div>
<div style="overflow: hidden;height: 68px;padding-top: 1px;">
    <div class="burger-town-cards-wrap">

        <?php

        $chk_town = 0;
        foreach ($term_pj_type['house']->child as $key => $value) {
            $is_show = get_field('is_show',$value->taxonomy . '_' . $value->term_id);
            if ($is_show != 'hide') {

                $iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id);
                $pimg = get_field('project_image', $value->taxonomy . '_' . $value->term_id);
                $h_house_link = get_term_link($value->term_id);
                if ($chk_town == 0) { 
                    ?>
                    <div class="burger-town-card grid grid-cols-3 gap-4 px-8"
                    style="opacity: 1;transition: .5s ease;">
                    <script type="text/javascript">
                        showUpperimg2('<?= $pimg['url'] ?>')
                    </script>
                    <?php
                }

                if ($chk_town % 3 == 0 && $chk_town != 0) { ?>
                </div>
                <div class="burger-town-card grid grid-cols-3 gap-4 px-8">
                <?php }
                ?>
                <div onmouseover="showUpperimg2('<?= $pimg['url'] ?>')"
                    class="burger-town-cards rounded-lg py-2 flex items-center pointer graylogo"
                    onclick="location.href='<?=$h_house_link?>'">
                    <img src="<?= $iconic['url'] ?>" style="height: 50px;">
                </div>
                <?php
                $chk_town++;
                
            }
        }
        echo "</div>";
        ?>

    </div>
</div>
<!-- </div> -->
<div class="burger-town-project-nav">
    <?php
    $chk_town = ceil($chk_town / 3) - 1;
    for ($i = 0; $i < $chk_town + 1; $i++) { ?>
        <div class="-nav <?php if ($i == 0) {
            echo '-active';
        } ?>" onclick="burgerTownNav(<?= $i ?>,this)">
        <div></div>
    </div>
<?php }
?>
</div>
</div>
</div>
<script type="text/javascript">
    function burgerTownNav(num, el) {
        document.querySelector('.burger-town-cards-wrap').style.setProperty("--j", num);
        for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
            i.classList.remove('-active')
        }
        el.classList.add('-active')
    }

    function burgerTownArrow(num) {
        let rs = getComputedStyle(document.querySelector('.burger-town-cards-wrap'))
        var prop = parseFloat(rs.getPropertyValue('--j'))
        let totnav = <?= $chk_town ?>;
        let sed = 0,
        chk = 0,
        chk1 = 0
        if (prop + num < 0) {
            sed = totnav
        } else if (prop + num > totnav) {
            sed = 0
        } else {
            sed = prop + num
        }
        for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
            if (i.classList.contains("-active")) {
                chk = chk1
            }
            chk1++
        }
        chk += num
        chk = (chk < 0) ? chk1 - 1 : chk;
        chk = (chk > chk1 - 1) ? 0 : chk;
        chk1 = 0
        for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
            if (chk == chk1) {
                chk = i
            }
            chk1++
        }
        burgerTownNav(sed, chk)
    }

</script>
<div id="town-burger-mini" class="pt-20 px-8 hidden">
    <img src="/wp-content/uploads/2022/11/arrow.png"
    class="back-burger" onclick="back_burger()">
    <div id="show-townhome-mini">
        <span class="flex flex-row items-center justify-center">
            <h6 class=""><?php pll_e('บ้านและทาวน์โฮม')?></h6>
        </span>
        <sp class="l"></sp>
        <div class="grid grid-cols-2 grid-flow-row gap-6 px-1 md:px-40">
            <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer justify-center"
            onclick="location.href='/<?=$xlang?>/house';" style="outline-width: 1px;">
            <?php pll_e('ดูทั้งหมด') ?>  <p></p>
        </div>
        <?php
        $ccc = 1;
        foreach ($term_pj_type['house']->child as $key => $value) {

            $ccc++;
            $iconic = get_field('project_logo', $value->taxonomy . '_' . $value->term_id);
            $h_house_link = get_term_link($value->term_id);
            ?>
            <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer"
            onclick="location.href='<?=$h_house_link?>';">
            <img src="<?= $iconic['url'] ?>">
        </div>
        <?php 
    }
    ?>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
    const menubur = document.getElementById("menu-burger");

    function openMenubur() {
        menubur.style.opacity = "1";
        menubur.style.left = "0";
        document.getElementById("burger-txt").style.left = "10vw";
        document.getElementsByClassName("close-menu")[0].style.display = "block";
        document.getElementsByClassName("search-fix")[0].style.display = "block";
        if (window.innerWidth < 992) {
            document.getElementsByClassName("tel-fix")[0].style.display = "block";
            document.getElementsByClassName("close-menu")[0].style.filter = "invert(1)";
            document.getElementsByClassName("search-fix")[0].style.filter = "invert(1)";
            document.getElementsByClassName("tel-fix")[0].style.filter = "invert(1)";
        }
        document.getElementsByClassName("burger-cards-wrap")[0].style.display = "grid";
        document.getElementsByClassName("burger-town-cards-wrap")[0].style.display = "grid";
    }

    function closeMenubur() {
        menubur.style.opacity = "0";
        menubur.style.left = "120%";
        document.getElementById("burger-txt").style.left = "120%";
        document.getElementsByClassName("close-menu")[0].style.display = "none";
        document.getElementsByClassName("search-fix")[0].style.display = "none";
        document.getElementsByClassName("tel-fix")[0].style.display = "none";
        document.getElementsByClassName("burger-cards-wrap")[0].style.display = "none";
        document.getElementsByClassName("burger-town-cards-wrap")[0].style.display = "none";
    }

    function onMouseOver(event) {
        this.style.outlineWidth = "2px"
        this.children[0].style.filter = "grayscale(0%)"
    }

    function onMouseOut(event) {
        this.style.outlineWidth = "1px"
        this.children[0].style.filter = "grayscale(100%)"
    }
    for (let e of document.getElementsByClassName('graylogo')) {
        e.addEventListener('mouseover', onMouseOver, true);
        e.addEventListener('mouseout', onMouseOut, true);
    }

    repoBurger();
    window.addEventListener("resize", repoBurger);

    function repoBurger() {
        if (window.innerWidth < 992) {
            document.getElementById("burger-1").style.width = "100%";
            document.getElementById("burger-2").style.width = "0%";
            document.getElementsByClassName("close-menu")[0].style.filter = "invert(1)";
            document.getElementsByClassName("search-fix")[0].style.filter = "invert(1)";
            document.getElementsByClassName("tel-fix")[0].style.filter = "invert(1)";
            document.getElementsByClassName("tel-fix")[0].style.display = "block";
            document.getElementById("condo-burger-mini").style.display = "none";
            document.getElementById("town-burger-mini").style.display = "none";
            document.getElementById("default").style.display = "none";
            document.getElementById("condo-burger").style.display = "none";
            document.getElementById("town-burger").style.display = "none";
            document.getElementById("burger-txt").style.display = "block";
            document.getElementsByClassName("rookson")[0].style.opacity = "1"
            document.getElementsByClassName("rookson")[1].style.opacity = "1"
        } else {
            document.getElementById("burger-1").style.width = "35%";
            document.getElementById("burger-2").style.width = "65%";
            document.getElementsByClassName("close-menu")[0].style.filter = "invert(0)";
            document.getElementsByClassName("search-fix")[0].style.filter = "invert(0)";
            document.getElementsByClassName("tel-fix")[0].style.filter = "invert(0)";
            document.getElementsByClassName("tel-fix")[0].style.display = "none";
            document.getElementById("condo-burger-mini").style.display = "none";
            document.getElementById("town-burger-mini").style.display = "none";
            document.getElementById("default").style.display = "flex";
            document.getElementById("condo-burger").style.display = "none";
            document.getElementById("town-burger").style.display = "none";
            document.getElementById("burger-txt").style.display = "block";
            document.getElementsByClassName("rookson")[0].style.opacity = "0"
            document.getElementsByClassName("rookson")[1].style.opacity = "0"
        }
    }

    var btns = document.getElementsByClassName("menu-txt");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("mouseover", function () {
            var current = document.getElementsByClassName(" mt-active");
            if (current.length != 0) {
                current[0].className = current[0].className.replace(" mt-active", "");
            }
            this.className += " mt-active";
            if (this.className.includes("service") && this.className.includes("mt-active")) {
                document.getElementById("line-serv").style.maxWidth = "15vw";
                document.getElementById("line-serv").style.opacity = "1";
                document.getElementById("sub-service").style.opacity = "1";
                document.getElementById("sub-service").style.maxHeight = "900px";
                document.getElementById("line-busi").style.maxWidth = "0";
                document.getElementById("line-busi").style.opacity = "0";
                document.getElementById("sub-business").style.opacity = "0";
                document.getElementById("sub-business").style.maxHeight = "0";
                document.getElementsByClassName("rookson")[0].style.opacity = "0"
                document.getElementsByClassName("rookson")[1].style.opacity = "0"
                if (window.innerWidth > 992) {
                    document.getElementById("burger-1").style.width = "42%";
                    document.getElementById("burger-2").style.width = "58%";
                } else {
                    document.getElementById("burger-1").style.width = "100%";
                    document.getElementById("burger-2").style.width = "0%";
                    document.getElementById("line-serv").style.width = "22vw";
                }
                if (window.innerWidth > 1268) {
                    document.getElementById("line-serv").style.width = "100px";
                } else {
                    document.getElementById("line-serv").style.maxWidth = "80px";
                    document.getElementById("line-serv").style.width = "50px";
                }
            } else if (this.className.includes("co-business") && this.className.includes("mt-active")) {
                document.getElementById("line-serv").style.maxWidth = "0";
                document.getElementById("line-serv").style.opacity = "0";
                document.getElementById("sub-service").style.opacity = "0";
                document.getElementById("sub-service").style.maxHeight = "0";
                document.getElementById("line-busi").style.maxWidth = "999px";
                document.getElementById("line-busi").style.opacity = "1";
                document.getElementById("sub-business").style.opacity = "1";
                document.getElementById("sub-business").style.maxHeight = "900px";
                document.getElementsByClassName("rookson")[0].style.opacity = "0"
                document.getElementsByClassName("rookson")[1].style.opacity = "0"
                if (window.innerWidth > 992) {
                    document.getElementById("burger-1").style.width = "42%";
                    document.getElementById("burger-2").style.width = "58%";
                } else {
                    document.getElementById("burger-1").style.width = "100%";
                    document.getElementById("burger-2").style.width = "0%";
                }
                if (window.innerWidth > 1268) {
                    document.getElementById("line-busi").style.width = "20px";
                } else {
                    document.getElementById("line-busi").style.width = "140px";
                }
            } else {
                document.getElementById("line-serv").style.maxWidth = "0";
                document.getElementById("line-serv").style.opacity = "0";
                document.getElementById("sub-service").style.opacity = "0";
                document.getElementById("sub-service").style.maxHeight = "0";
                document.getElementById("line-busi").style.maxWidth = "0";
                document.getElementById("line-busi").style.opacity = "0";
                document.getElementById("sub-business").style.opacity = "0";
                document.getElementById("sub-business").style.maxHeight = "0";
                document.getElementById("burger-1").style.width = "35%";
                document.getElementById("burger-2").style.width = "65%";
                if (window.innerWidth > 992) {
                    document.getElementById("burger-1").style.width = "35%";
                    document.getElementById("burger-2").style.width = "65%";
                } else {
                    document.getElementById("burger-1").style.width = "100%";
                    document.getElementById("burger-2").style.width = "0%";
                }
            }
            if (this.className.includes("condo-burger") && this.className.includes("mt-active")) {
                if (window.innerWidth <= 992) {
                    document.getElementById("burger-1").style.width = "0%";
                    document.getElementById("burger-2").style.width = "100%";
                    document.getElementById("burger-txt").style.display = "none";
                    document.getElementById("default").style.display = "none"
                    document.getElementById("condo-burger").style.display = "none"
                    document.getElementById("town-burger").style.display = "none"
                    document.getElementById("condo-burger-mini").style.display = "block";
                    document.getElementById("town-burger-mini").style.display = "none";
                    document.getElementsByClassName("close-menu")[0].style.filter = "invert(0)";
                    document.getElementsByClassName("search-fix")[0].style.filter = "invert(0)";
                    document.getElementsByClassName("tel-fix")[0].style.filter = "invert(0)";
                } else {
                    document.getElementById("default").style.display = "none"
                    document.getElementById("condo-burger").style.display = "flex"
                    document.getElementById("town-burger").style.display = "none"
                    document.getElementsByClassName("rookson")[0].style.opacity = "1"
                    document.getElementsByClassName("rookson")[1].style.opacity = "0"
                    document.getElementById("condo-burger-mini").style.display = "none";
                    document.getElementById("town-burger-mini").style.display = "none";
                }
            } else if (this.className.includes("town-burger") && this.className.includes("mt-active")) {
                if (window.innerWidth <= 992) {
                    document.getElementById("burger-1").style.width = "0%";
                    document.getElementById("burger-2").style.width = "100%";
                    document.getElementById("burger-txt").style.display = "none";
                    document.getElementById("default").style.display = "none"
                    document.getElementById("condo-burger").style.display = "none"
                    document.getElementById("town-burger").style.display = "none"
                    document.getElementById("condo-burger-mini").style.display = "none";
                    document.getElementById("town-burger-mini").style.display = "block";
                    document.getElementsByClassName("close-menu")[0].style.filter = "invert(0)";
                    document.getElementsByClassName("search-fix")[0].style.filter = "invert(0)";
                    document.getElementsByClassName("tel-fix")[0].style.filter = "invert(0)";
                } else {
                    document.getElementById("default").style.display = "none"
                    document.getElementById("condo-burger").style.display = "none"
                    document.getElementById("town-burger").style.display = "flex"
                    document.getElementsByClassName("rookson")[0].style.opacity = "0"
                    document.getElementsByClassName("rookson")[1].style.opacity = "1"
                    document.getElementById("condo-burger-mini").style.display = "none";
                    document.getElementById("town-burger-mini").style.display = "none";
                }
            } else {
                if (window.innerWidth <= 992) {

                } else {
                    document.getElementById("default").style.display = "flex"
                    document.getElementById("condo-burger").style.display = "none"
                    document.getElementById("town-burger").style.display = "none"
                    document.getElementsByClassName("rookson")[0].style.opacity = "0"
                    document.getElementsByClassName("rookson")[1].style.opacity = "0"
                    document.getElementById("condo-burger-mini").style.display = "none";
                    document.getElementById("town-burger-mini").style.display = "none";
                }
            }
        });
}

function back_burger() {
    document.getElementById("burger-1").style.width = "100%";
    document.getElementById("burger-2").style.width = "0%";
    document.getElementsByClassName("close-menu")[0].style.filter = "invert(1)";
    document.getElementsByClassName("search-fix")[0].style.filter = "invert(1)";
    document.getElementsByClassName("tel-fix")[0].style.filter = "invert(1)";
    document.getElementById("condo-burger-mini").style.display = "none";
    document.getElementById("town-burger-mini").style.display = "none";
    document.getElementById("burger-txt").style.display = "block";
}
</script>