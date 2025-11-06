<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
<?php 
global $masthead;
if (!isset($masthead)) {//ถ้าไม่ได้ตั้งค่า masthead มาตั้งแต่ไฟล์เทมเพลตที่เรียกใช้
    if (get_field('masthead') != null) {//และถ้ามีการตั้งค่าที่ editor
        $masthead = intval(get_field('masthead'));
    }else{//แต่ถ้ายังไม่มีการตั้งค่าที่ editor
        $masthead = 1;
    }
}

if ($masthead == 0) {
}
else{
    $display_site_logo = intval(get_field('display_site_logo', 'option'));
    $display_site_name = intval(get_field('display_site_name', 'option'));
    $display_search = intval(get_field('display_search', 'option'));
    $site_logo_max_height = intval(get_field('site_logo_max_height', 'option'));
    $site_logo_margin = intval(get_field('site_logo_margin', 'option'));
    $site_header_space = $site_logo_max_height+$site_logo_margin+$site_logo_margin;
    if ($site_header_space < 70) {
        $site_header_space = 70;
    }
    ?>
    <style type="text/css">
        .logo_lang{
            margin-right: 32px;
        }
        .site-nav-d li a{
            padding: 10px 22px;
        }
        .tel-icon{
            display: flex;
            flex-direction: row;
            transition: .5s;
        }
        .tel-number{
            max-width: 0;
            opacity: 0;
            transition: all .5s;
            cursor: pointer;
            color:var(--ci-blue-500);
            z-index: -1;
        }
        .tel-icon:hover .tel-number{
            opacity: 1;
            max-width: 999px;
            margin-left: 6px;
            margin-right: 6px;
        }
        .tel-icon:hover{
            padding-left: 4px;
            padding-right: 4px;
        }
        @media (min-width: 992px) {
         .site-branding img {
             max-height: <?=$site_logo_max_height?>px;
             margin-top: <?=$site_logo_margin?>px;
             margin-bottom: <?=$site_logo_margin?>px;
         } 
         .site-header, .site-header-space {
             min-height: <?=$site_header_space?>px;
         }
     }
     @media (max-width: 1320px) {
         .site-branding{
            left: 70px;
        }
        .site-header{
            padding-left: 18px;
            padding-right: 18px;
        }
        .site-left-bar{
            position: static;
        }
        .site-right-bar{
            justify-content: end;
            padding-left: 0;
        }
        .change-lang{
            display: none;
        }
        .logo_lang{
            margin-right: 0px;
            position: relative;
            left: -70px;a
        }
        .logo_lang img{
            height: 19px;
            width: 175px;
        }
        .txt-menu{
            display: none !important;
        }
    }
    @media (max-width: 991px){
        .logo_lang{
            position: static;
        }
        .site-header{
            padding-left: 28px;
            padding-right: 28px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
    }
    @media (max-width: 368px){
        .site-header{
            padding-left: 0px;
        }
    }
    @media (max-width: 1320px) {
        .logo-hide-cont-left{
            margin-left: -20px;
        }
    }
    <?php
    if (str_contains($_SERVER['REQUEST_URI'], 'condominium')) {
        echo "#menu-item-260 a{
            color:var(--ci-blue-500);
        }";
    }
    else if(str_contains($_SERVER['REQUEST_URI'], 'townhome')){
        echo "#menu-item-261 a{
            color:var(--ci-blue-500);
        }";
    }
    else if(str_contains($_SERVER['REQUEST_URI'], 'promotion')){
        echo "#menu-item-522 a{
            color:var(--ci-blue-500);
        }";
    }
    else if(str_contains($_SERVER['REQUEST_URI'], 'about-us')){
        echo "#menu-item-521 a{
            color:var(--ci-blue-500);
        }";
    }
//     else if(str_contains($_SERVER['REQUEST_URI'], 'townhome')){
//         echo "#menu-item-265 a{
//             color:var(--ci-blue-500);
//         }";
//     }
    ?>
</style>

<header id="masthead" class="site-header _heading fixed" style="z-index: 9999;">
    <div class="s-container" style="padding-left: 0;padding-right: 0;">
        <div class="grid grid-cols-12 md:gap-4 w-full">
            <div class="col-span-9 flex items-center relative site-left-bar">
                <div class="site-branding">
                    <a href="<?php echo home_url(); ?>" class="logo_lang logo-hide-cont-left">
                        <img src="/wp-content/uploads/2022/09/ASW_new_logo_horizon-e1613543557177-1.png">
                    </a>
                    <div class="grid grid-flow-col gap-4">
                        <nav id="site-navigation" class="site-nav-d _desktop txt-menu dbfon" style="font-weight: 400;">
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) );?>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-span-3 text-right flex items-center site-right-bar justify-end pl-12">
                <div class="site-tools flex flex-row items-center gap-4">
                    <div class="flex flex-row items-center change-lang" style="margin-right: 10px;">
                        <img src="/wp-content/uploads/2022/09/630635.png" class="inline" style="width: 24px;margin-right: 5px;">
                        <h6 class="inline-block" style="margin-right: 8px;margin-left: 8px;font-weight: 400;font-size: 26px;line-height: 32px;">ไทย</h6>
                        <i class="fas fa-chevron-down size-s"></i>
                    </div>
                    <div class="tel-icon">
                        <img src="/wp-content/uploads/2022/10/Vector-9.png" class="pointer" style="width: 22px;">
                        <div class="whitespace-nowrap tel-number">
                            02-168-0000
                        </div>
                    </div>
                    <img src="/wp-content/uploads/2022/10/Group-517.png" class="pointer" style="width: 22px;">
                    <img src="/wp-content/uploads/2022/10/Group-778.png" style="width: 22px;height: 18px;" class="pointer" onclick="openMenubur()">
                </div>
            </div>
        </div>


        <?php if (is_active_sidebar( 'headbar_m' )): ?>
            <div id="headbar_m" class="_mobile"><?php dynamic_sidebar( 'headbar_m' ); ?></div>
        <?php endif; ?>

        <?php if (is_active_sidebar( 'headbar_d' )): ?>
            <div id="headbar_d" class="_desktop"><?php dynamic_sidebar( 'headbar_d' ); ?></div>
            <?php else: ?>

            <?php endif; ?>

            <?php if ($display_search): ?>
            <!-- <a  class="site-search s-modal-trigger m-user" onclick="return false;"
                data-popup-trigger="site-search"><i class="si-search-o"></i></a> -->
            <?php endif ?>

            <?php seed_member_menu() ?>

            <?php if (is_active_sidebar( 'action' )) : ?>
                <div class="site-action _desktop"><?php dynamic_sidebar( 'action' ); ?></div>
            <?php endif; ?>

        </div>
        <nav id="site-nav-m" class="site-nav-m">
            <div class="s-container">
                <?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
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
    #burger-1{
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
  #burger-2{
    border-left: 5px solid var(--ci-veri-400);
    transition: .5s;
    width: 65%;
    height: 100%;
}
#burger-txt{
    -ms-overflow-style: none;
    scrollbar-width: none;
}
#burger-txt::-webkit-scrollbar {
  display: none;
}
#sub-service{
    left: 195px;
    overflow: hidden;
    opacity: 0;
    transition: .5s;
    width: 100%;
    max-height: 0;
    position: absolute;
}
#sub-business{
    left: 195px;
    overflow: hidden;
    opacity: 0;
    transition: .5s;
    width: 100%;
    max-height: 0;
    position: absolute;
}
.tel-fix{
    position: fixed;
    top: 20px;
    right: 9.5vw;
    font-size: 35px;
    transition: .3s;
}
.w-bottom{
    bottom: 0;
    -webkit-mask-image:-webkit-gradient(linear, left bottom, left top, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)));
    mask-image: linear-gradient(to top, rgba(0,0,0,1), rgba(0,0,0,0));
}
@media (max-width: 1268px) {
    #sub-service, #sub-business{
        position: relative;
        left: 24px;
    }
    .burger-service, .burger-co-business{
        flex-direction: column;
    }
    #line-serv, #line-busi{
        left: 0 !important;
        top: 0 !important;
    }
    .burger-main-wrap{
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
    #burger-1{
        width: 100%;
    }
    #burger-2{
        width: 0%;
        border-left: 0px solid var(--ci-veri-400);
    }
    #town-burger, #condo-burger{
        display: none;
    }
    .txt-2{
        width: 70%;
    }
}
@media (max-width: 768px) {
    #burger-1{
        width: 100%;
    }
    #burger-2{
        width: 0%;
    }
    .graylogo{
        outline-width: 2px;
    }
    .close-menu{
        right: 20px;
    }
    .search-fix{
        right: 50px;
    }
    .tel-fix{
        right: 85px;
    }
    .txt-1{
        width: 275px;
    }
    .txt-2{
        width: 310px;
    }
    .rookson{
        float: right;
        margin-top: 12px;
    }
}
#menu-burger{
    width: 100%;
    height: 100vh;
    z-index: 10000;
    top: 0;
    opacity: 0;
    left: 120%;
    transition: 1s;
    background-color: var(--ci-blue-300);
}
</style>
<div id="menu-burger" class="fixed">
    <span class="close-menu cursor hidden" onclick="closeMenubur()" style="z-index: 10001;top: 25px;">&times;</span>
    <img src="/wp-content/uploads/2022/10/Group-517.png" style="width: 22px;z-index: 10001;top: 30px;" class="search-fix hidden">
    <img src="/wp-content/uploads/2022/10/Vector-9.png" style="width: 20px; z-index: 10001;top: 30px;" class="tel-fix hidden">
    <div class="burger-main-wrap inline-flex w-full h-full">
        <div id="burger-1" class="bg-ci-blue-300 container relative">
            <img src="/wp-content/uploads/2022/11/shutterstock_1574382076-1-1.png" class="absolute pointer-events-none leaf-burger">
            <img src="/wp-content/uploads/2022/10/Group-853.png" class="flex items-start mt-6 ml-10">
            <!-- <div class="bg-cover" style="width: 270px; height: 40px;background-image: url('/wp-content/uploads/2022/10/Screen-Shot-2565-07-14-at-17.49-1.png');"></div> -->
            <sp class=""></sp>
            <div id="burger-txt" class="relative grid grid-rows-2 gap-6 place-content-center pt-4" style="left: 120%;transition: 1s;">
                <div class="row-span-1 text-white txt-1">
                    <div class="grid grid-flow-rows text-5xl" style="line-height: 1.1;">
                        <div class="menu-txt default" onclick="window.location.href='/home';">หน้าแรก</div>
                        <div class="menu-txt condo-burger">คอนโดมิเนียม <p style="transition: .5s;opacity: 0;" class="rookson text-3xl inline-block">→</p></div>
                        <div class="menu-txt town-burger">บ้านและทาวน์โฮม <p style="transition: .5s;opacity: 0;" class="rookson text-3xl inline-block">→</p></div>
                        <div class="menu-txt" onclick="window.location.href='/promotion';">โปรโมชั่น</div>
                        <div class="menu-txt" onclick="window.location.href='/about-us';">รู้จักแอสเซทไวส์</div>
                        <div class="menu-txt" onclick="window.location.href='/#';">นักลงทุนสัมพันธ์</div>
                        <sp class=""></sp>
                        <div class="bg-ci-blue-400" style="width: 75px;height: 1px;"></div>
                        <sp class=""></sp>
                    </div>
                </div>
                <div class="row-span-1 txt-2">
                    <div class="grid grid-flow-rows cl-ci-blue-800 text-2xl pl-8">
                        <div class="menu-txt" onclick="window.location.href='/club';">แอสเซทไวส์คลับ</div>
                        <div class="menu-txt" onclick="window.location.href='/news-archive';">ข่าวสาร</div>
                        <div class="menu-txt" onclick="window.location.href='/blog';">บล็อก</div>
                        <div class="burger-service service menu-txt flex flex-row">
                            บริการ
                            <div id="line-serv" class="bg-ci-veri-500 relative" style="left: 1%;top: 45%;max-width: 0;width: 100px;height: 3px;opacity: 0;transition: .5s"></div>
                            <div id="sub-service" class="flex flex-col cl-ci-blue-800">
                                <sp class="s block lg:hidden"></sp>
                                <a href="#!" class="">360 Virtual Gallery​</a>
                                <a href="#!" class="">FIN Plus​</a>
                                <a href="#!" class="">AssetWise Application​</a>
                                <a href="#!" class="">AssetWise Customer Care​</a>
                                <sp class="s"></sp>
                            </div>
                        </div>
                        <div class="burger-co-business co-business menu-txt flex flex-row">
                            สนใจทำธุรกิจกับเรา
                            <div id="line-busi" class="bg-ci-veri-500 relative" style="left: 1%;top: 45%;max-width: 0;width: 20px;height: 3px;opacity: 0;transition: .5s"></div>
                            <div id="sub-business" class="flex flex-col cl-ci-blue-800">
                                <sp class="s block lg:hidden"></sp>
                                <a href="#!" class="">เสนอขายที่ดิน​</a>
                                <a href="#!" class="">เสนอขายสินค้าและบริการ​</a>
                                <a href="#!" class="">ฝากขาย-ฝากเช่า</a>
                                <sp class="s"></sp>
                            </div>
                        </div>
                        <div class="menu-txt" onclick="window.location.href='/#';">ร่วมงานกับเรา</div>
                        <div class="menu-txt" onclick="window.location.href='/#';">ติดต่อเรา</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="burger-2" class="bg-white relative">
            <img src="/wp-content/uploads/2022/11/image-74.png" class="absolute pointer-events-none w-bottom">
            <div id="default" class="flex items-center h-full pl-16 pr-16 pb-20" style="width: 85%;">
                <div class="bg-cover blank bg-grey" ratio="16:10" style="background-image:url('/wp-content/uploads/2022/11/Rectangle-235.jpg')">
                </div>
            </div>
            <style type="text/css">
                .burger-cards-wrap{
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
                .burger-town-cards-wrap{
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
                .burger-project-nav, .burger-town-project-nav{
                    display: flex;
                    justify-content: center;
                }
                .burger-project-nav .-nav, .burger-town-project-nav .-nav{
                    width: 32px;
                    height: 32px;
                    display: flex;
                    align-items: center;
                    margin: 0 3px;
                    cursor: pointer;
                }
                .burger-project-nav .-nav div, .burger-town-project-nav .-nav div{
                    width: 100%;
                    height: 1px;
                    background-color:#828A92;
                    transition: all .3s;
                }
                .burger-project-nav .-nav.-active div, .burger-town-project-nav .-nav.-active div{
                    height: 4px;
                    background-color:#3A638E
                }
                .burger-arrow img{
                    z-index: 902;
                    top: 50px;
                    transition: .2s;
                    cursor: pointer;
                    opacity: 0.7;
                }
                .burger-arrow img:hover{
                    opacity: 1;
                }
                .burger-card{
                    opacity: 0;
                    transition: .5s ease;
                }
                .back-burger{
                    transform: rotate(180deg);
                    position: absolute;
                    top: 20px;
                    left: 20px;
                    width: 22px;
                    cursor: pointer;
                }
                .condo-burger-mini{

                }
            </style>
            <div id="condo-burger" class="flex items-center relative h-full pl-16 pr-16 pb-15 hidden" style="width: 95%;">
                <div class="w-full">
                    <div>
                        <div id="condo-upper-img" class="bg-cover blank bg-grey" ratio="facebook" style="background-image:url('/wp-content/uploads/2022/11/Rectangle-235-1.jpg');transition: .3s linear !important;">
                        </div>
                    </div>
                    <div class="">
                        <div class="burger-arrow flex flex-row">
                            <img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="relative w-10 h-10" onclick="burgerProjectArrow(-1)" style="margin-left: -30px;">
                            <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="relative w-10 h-10" onclick="burgerProjectArrow(1)" style="margin-right: -30px;">
                        </div>
                        <div style="overflow: hidden;height: 68px;padding-top: 1px;">
                            <div class="burger-cards-wrap">
                                <?php 
                                $terms = get_terms( array(
                                    'taxonomy' => 'project-type',
                                    'hide_empty' => false,
                                ) );
                                $chk_con = 0;
                                foreach ($terms as $key => $value) {
                                    if ($value->parent == 35) {
                                        if ($chk_con == 0) { ?>
                                            <div class="burger-card grid grid-cols-3 gap-4 px-8" style="opacity: 1;transition: .5s ease;">
                                            <?php }
                                            $iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id);
                                            $pimg = get_field('project_image',$value->taxonomy . '_' . $value->term_id); 
                                            if($chk_con % 3 == 0 && $chk_con != 0){ ?>
                                            </div><div class="burger-card grid grid-cols-3 gap-4 px-8">
                                            <?php }?>
                                            <div onmouseover="showUpperimg('<?=$pimg['url']?>')" class="burger-cards rounded-lg py-2 flex items-center pointer graylogo" onclick="window.location.href='/condominium';">
                                                <img src="<?=$iconic['url']?>" style="height: 50px;" >
                                            </div>
                                            <?php $chk_con++; }
                                        }
                                        echo "</div>";
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <div class="burger-project-nav">
                                <?php
                                $chk_con = ceil($chk_con/3)-1;
                                for ($i=0; $i < $chk_con+1; $i++) { ?>
                                    <div class="-nav <?php if($i==0){echo '-active';} ?>" onclick="burgerProjectNav(<?=$i?>,this)"><div></div></div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <script type="text/javascript">
                            function burgerProjectNav(num,el){
                                document.querySelector('.burger-cards-wrap').style.setProperty("--i",num);
                                for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
                                    i.classList.remove('-active')
                                }
                                el.classList.add('-active')
                                let ara = document.getElementsByClassName("burger-card")
                                for (var j = 0; j < ara.length; j++) {
                                    if(j == num){
                                        ara[j].style.opacity = "1"
                                    }
                                    else{
                                        ara[j].style.opacity = "0"
                                    }
                                }
                            }
                            function burgerProjectArrow(num){
                                let rs = getComputedStyle(document.querySelector('.burger-cards-wrap'))
                                var prop = parseFloat(rs.getPropertyValue('--i'))
                                let totnav = <?= $chk_con ?>;
                                let sed = 0, chk = 0, chk1 = 0
                                if(prop + num < 0){
                                    sed = totnav
                                }
                                else if(prop + num > totnav){
                                    sed = 0
                                }
                                else{
                                    sed = prop + num
                                }
                                for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
                                    if(i.classList.contains("-active")){
                                        chk = chk1
                                    }
                                    chk1++
                                }
                                chk += num
                                chk = (chk < 0) ? chk1-1 : chk;
                                chk = (chk > chk1-1) ? 0 : chk;
                                chk1 = 0
                                for (let i of document.querySelectorAll('.burger-project-nav .-nav')) {
                                    if(chk == chk1){
                                        chk = i
                                    }
                                    chk1++
                                }
                                burgerProjectNav(sed, chk)
                            }
                            function showUpperimg(txt){
                                document.getElementById("condo-upper-img").style.backgroundImage = "url('"+txt+"')";
                            }
                        </script>
                    </div>
                    <div id="condo-burger-mini" class="pt-20 px-8 hidden">
                        <img src="/wp-content/uploads/2022/11/arrow.png" class="back-burger" onclick="back_burger()">
                        <div id="show-condo-mini">
                            <span class="flex flex-row items-center justify-center">
                                <h6 class="">คอนโดมิเนียม</h6>
                            </span>
                            <sp class="l"></sp>
                            <div class="grid grid-cols-2 grid-flow-row gap-6 px-1 md:px-40">
                                <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer justify-center" onclick="window.location.href='/condominium';" style="outline-width: 1px;">
                                    ดูทั้งหมด <p></p>
                                </div>
                                <?php
                                foreach ($terms as $key => $value) {
                                    if ($value->parent == 35) {
                                        $iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); ?>
                                        <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer" onclick="window.location.href='/condominium';">
                                            <img src="<?=$iconic['url']?>">
                                        </div>
                                    <?php }
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div id="town-burger" class="flex items-center relative h-full pl-16 pr-16 pb-15 hidden" style="width: 95%;">
                        <div class="w-full">
                            <div id="town-upper-img" class="bg-cover blank bg-grey" ratio="facebook" style="background-image:url('/wp-content/uploads/2022/11/Rectangle-235-2.jpg');transition: .3s linear !important;">
                            </div>
                            <div class="burger-arrow flex flex-row">
                                <img src="/wp-content/uploads/2022/09/slide-arrow-l.png" class="relative w-10 h-10" onclick="burgerTownArrow(-1)" style="margin-left: -30px;">
                                <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="relative w-10 h-10" onclick="burgerTownArrow(1)" style="margin-right: -30px;">
                            </div>
                            <div style="overflow: hidden;height: 68px;padding-top: 1px;">
                                <div class="burger-town-cards-wrap">

                                    <?php 
                                    $terms = get_terms( array(
                                        'taxonomy' => 'project-type',
                                        'hide_empty' => false,
                                    ) );
                                    $chk_town = 0;
                                    foreach ($terms as $key => $value) {
                                        if ($value->parent == 46) {
                                            if ($chk_town == 0) { ?>
                                                <div class="burger-town-card grid grid-cols-3 gap-4 px-8" style="opacity: 1;transition: .5s ease;">
                                                <?php }
                                                $iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id);
                                                $pimg = get_field('project_image',$value->taxonomy . '_' . $value->term_id); 
                                                if ($chk_town % 3 == 0 && $chk_town != 0) { ?>
                                                </div><div class="burger-town-card grid grid-cols-3 gap-4 px-8">
                                                <?php }
                                                ?>
                                                <div onmouseover="showUpperimg2('<?=$pimg['url']?>')" class="burger-town-cards rounded-lg py-2 flex items-center pointer graylogo" onclick="window.location.href='/townhome';">
                                                    <img src="<?=$iconic['url']?>" style="height: 50px;" >
                                                </div>
                                                <?php $chk_town++; }
                                            }
                                            echo "</div>";
                                            ?>

                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <div class="burger-town-project-nav">
                                        <?php
                                        $chk_town = ceil($chk_town/3)-1;
                                        for ($i=0; $i < $chk_town+1; $i++) { ?>
                                            <div class="-nav <?php if($i==0){echo '-active';} ?>" onclick="burgerTownNav(<?=$i?>,this)"><div></div></div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                function burgerTownNav(num,el){
                                    document.querySelector('.burger-town-cards-wrap').style.setProperty("--j",num);
                                    for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
                                        i.classList.remove('-active')
                                    }
                                    el.classList.add('-active')
                                }
                                function burgerTownArrow(num){
                                    let rs = getComputedStyle(document.querySelector('.burger-town-cards-wrap'))
                                    var prop = parseFloat(rs.getPropertyValue('--j'))
                                    let totnav = <?= $chk_town ?>;
                                    let sed = 0, chk = 0, chk1 = 0
                                    if(prop + num < 0){
                                        sed = totnav
                                    }
                                    else if(prop + num > totnav){
                                        sed = 0
                                    }
                                    else{
                                        sed = prop + num
                                    }
                                    for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
                                        if(i.classList.contains("-active")){
                                            chk = chk1
                                        }
                                        chk1++
                                    }
                                    chk += num
                                    chk = (chk < 0) ? chk1-1 : chk;
                                    chk = (chk > chk1-1) ? 0 : chk;
                                    chk1 = 0
                                    for (let i of document.querySelectorAll('.burger-town-project-nav .-nav')) {
                                        if(chk == chk1){
                                            chk = i
                                        }
                                        chk1++
                                    }
                                    burgerTownNav(sed, chk)
                                }
                                function showUpperimg2(txt){
                                    document.getElementById("town-upper-img").style.backgroundImage = "url('"+txt+"')";
                                }
                            </script>
                            <div id="town-burger-mini" class="pt-20 px-8 hidden">
                                <img src="/wp-content/uploads/2022/11/arrow.png" class="back-burger" onclick="back_burger()">
                                <div id="show-townhome-mini">
                                    <span class="flex flex-row items-center justify-center">
                                        <h6 class="">บ้านและทาวน์โฮม</h6>
                                    </span>
                                    <sp class="l"></sp>
                                    <div class="grid grid-cols-2 grid-flow-row gap-6 px-1 md:px-40">
                                        <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer justify-center" onclick="window.location.href='/townhome';" style="outline-width: 1px;">
                                            ดูทั้งหมด <p></p>
                                        </div>
                                        <?php
                                        $ccc = 1;
                                        foreach ($terms as $key => $value) {
                                            if ($value->parent == 46) {
                                                $ccc++;
                                                $iconic = get_field('project_logo',$value->taxonomy . '_' . $value->term_id); ?>
                                                <div class="graylogo col-span-1 rounded-lg px-2 py-2 flex items-center pointer" onclick="window.location.href='/townhome';">
                                                    <img src="<?=$iconic['url']?>">
                                                </div>
                                            <?php }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    document.querySelector('.condo-burger').onmouseenter = (e)=>{e.target.click()}
                    document.querySelector('.town-burger').onmouseenter = (e)=>{e.target.click()}
                    document.querySelector('.burger-service').onmouseenter = (e)=>{e.target.click()}
                    document.querySelector('.burger-co-business').onmouseenter = (e)=>{e.target.click()}

                </script>
                <script type="text/javascript">
                    const menubur = document.getElementById("menu-burger");
                    function openMenubur(){
                        menubur.style.opacity = "1";
                        menubur.style.left = "0";
                        document.getElementById("burger-txt").style.left = "10vw"; 
                        document.getElementsByClassName("close-menu")[0].style.display = "block";
                        document.getElementsByClassName("search-fix")[0].style.display = "block";
                        if(window.innerWidth < 992){
                            document.getElementsByClassName("tel-fix")[0].style.display = "block";
                            document.getElementsByClassName("close-menu")[0].style.filter = "invert(1)";
                            document.getElementsByClassName("search-fix")[0].style.filter = "invert(1)";
                            document.getElementsByClassName("tel-fix")[0].style.filter = "invert(1)";
                        }
                        document.getElementsByClassName("burger-cards-wrap")[0].style.display = "grid";
                        document.getElementsByClassName("burger-town-cards-wrap")[0].style.display = "grid";
                    }
                    function closeMenubur(){
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
                        e.addEventListener('mouseover',onMouseOver,true);
                        e.addEventListener('mouseout',onMouseOut,true);
                    }

                    repoBurger();
                    window.addEventListener("resize", repoBurger);
                    function repoBurger(){
                        if (window.innerWidth < 992){
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
                        }
                        else{
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
                        btns[i].addEventListener("click", function() {
                            var current = document.getElementsByClassName(" mt-active");
                            if(current.length != 0){
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
                                if (window.innerWidth > 992){
                                    document.getElementById("burger-1").style.width = "42%";
                                    document.getElementById("burger-2").style.width = "58%";
                                }
                                else{
                                    document.getElementById("burger-1").style.width = "100%";
                                    document.getElementById("burger-2").style.width = "0%";
                                    document.getElementById("line-serv").style.width = "22vw";
                                }
                                if(window.innerWidth > 1268){
                                    document.getElementById("line-serv").style.width = "100px";
                                }
                                else{
                                    document.getElementById("line-serv").style.maxWidth = "80px";
                                    document.getElementById("line-serv").style.width = "50px";
                                }
                            }
                            else if(this.className.includes("co-business") && this.className.includes("mt-active")){
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
                                if (window.innerWidth > 992){
                                    document.getElementById("burger-1").style.width = "42%";
                                    document.getElementById("burger-2").style.width = "58%";
                                }
                                else{
                                    document.getElementById("burger-1").style.width = "100%";
                                    document.getElementById("burger-2").style.width = "0%";
                                }
                                if(window.innerWidth > 1268){
                                    document.getElementById("line-busi").style.width = "20px";
                                }
                                else{
                                    document.getElementById("line-busi").style.width = "140px";
                                }
                            }
                            else{
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
                                if (window.innerWidth > 992){
                                    document.getElementById("burger-1").style.width = "35%";
                                    document.getElementById("burger-2").style.width = "65%";
                                }
                                else{
                                    document.getElementById("burger-1").style.width = "100%";
                                    document.getElementById("burger-2").style.width = "0%";
                                }
                            }
                            if (this.className.includes("condo-burger") && this.className.includes("mt-active")){
                                if (window.innerWidth <= 992){
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
                                }
                                else{
                                    document.getElementById("default").style.display = "none"
                                    document.getElementById("condo-burger").style.display = "flex"
                                    document.getElementById("town-burger").style.display = "none"
                                    document.getElementsByClassName("rookson")[0].style.opacity = "1"
                                    document.getElementsByClassName("rookson")[1].style.opacity = "0"
                                    document.getElementById("condo-burger-mini").style.display = "none";
                                    document.getElementById("town-burger-mini").style.display = "none";
                                }
                            }
                            else if (this.className.includes("town-burger") && this.className.includes("mt-active")){
                                if (window.innerWidth <= 992){
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
                                }
                                else{
                                    document.getElementById("default").style.display = "none"
                                    document.getElementById("condo-burger").style.display = "none"
                                    document.getElementById("town-burger").style.display = "flex"
                                    document.getElementsByClassName("rookson")[0].style.opacity = "0"
                                    document.getElementsByClassName("rookson")[1].style.opacity = "1"
                                    document.getElementById("condo-burger-mini").style.display = "none";
                                    document.getElementById("town-burger-mini").style.display = "none";
                                }
                            }
                        });
}
function back_burger(){
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