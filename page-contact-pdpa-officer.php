<?php
get_header();
?>
<?php
$v = get_fields();
// pre($v);
?>

<style>
    html,
    body {
        overflow: visible;
    }
</style>
<section id="banner-form" style="--img: url(<?= acf_img($v['background_image']) ?>)">
    <div class="-shadow">
        <img class="shadow-1" src="/wp-content/uploads/2023/04/เงากิ่งไม้-3.png" alt="">
        <img class="shadow-2" src="/wp-content/uploads/2023/04/leaves-shadow-1.png" alt="">
    </div>
    <div class="-background">
        <div class="-l"></div>
        <div class="-r" style="--img: url(<?= acf_img($v['background_image']) ?>)"></div>
    </div>
    <div class="-inner">
        <div class="-img" style="--img: url(<?= acf_img($v['banner']) ?>)">
        </div>
        <div class="-body-wrap">
            <div class="-title">
                <h2><?php pll_e('ติดต่อเรา')?></h2>
            </div>
            <div class="-body">
                <div class="-detail">
                    <div class="-wrap">
                        <img src="/wp-content/uploads/2023/04/Group-1138.png" alt="">
                        <div class="-desc">
                            <h6><?= $v['company_name'] ?></h6>
                            <p><?= $v['location_detail'] ?></p>
                            <a href="<?= $v['map_link'] ?>">
                                <img src="/wp-content/uploads/2023/04/Vector-1.png" alt="">
                                <?php pll_e('ดูแผนที่')?>
                            </a>
                        </div>
                    </div>
                    <div class="-wrap">
                        <img src="/wp-content/uploads/2023/04/Vector-21.png" alt="">
                        <div class="-desc">
                            <h6><?= $v['telephone'] ?></h6>
                            <p><?= $v['time_available'] ?></p>
                        </div>
                    </div>
                    <div class="-wrap">
                        <img src="/wp-content/uploads/2023/04/Group-1140.png" alt="">
                        <div class="-desc">
                            <h6><?= $v['fax'] ?></h6>
                        </div>
                    </div>
                    <div class="-wrap">
                        <img src="/wp-content/uploads/2023/04/Group-1139.png" alt="">
                        <div class="-desc">
                            <h6><?= $v['email'] ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact-pdpa">
    <style>
        .contact-menu a {
            display: flex;
            gap: 10px;
            color: var(--ci-grey-400);
            transition: all .2s;
            white-space: nowrap;
            width: max-content;
        }

        .contact-menu a>img {
            width: auto;
            height: 26px;
            margin: 0;
        }

        .contact-menu a:hover {
            color: var(--ci-grey-400);
            transition: all .2s;
        }

        .contact-menu.cl-ci-orange-500 a {
            color: var(--ci-orange-500) !important;
        }

        .contact_vbar {
            width: 4px;
            height: 28px;
            position: absolute;
            left: -1.5px;
            top: 0;
            background-color: #F1683B;
            transition: all .2s;
        }

        .side-nav-menu,
        .side-nav-menu-contact {
            border-left: 0;
        }

        .contact-ani:hover .bg-cover,
        .contact-ani:hover,
        .contact-wrap:hover .contact-ani {
            transform: scale(1.07);
            transition: all .8s;
        }

        .contact_hline {
            /*width: 100%;*/
        }

        .contact_hbar {
            width: 28px;
            height: 4px;
            position: absolute;
            left: 0;
            top: -0.7px;
            background-color: #F1683B;
            transition: all .2s;
        }

        #menu-contact {
            transition: all .15s;
            white-space: nowrap;
            overflow: auto;
        }

        #contact-menu {
            position: sticky;
            top: calc(.5em + 70px);
        }

        div#contact-info-section {
            position: absolute;
            width: 10px;
            height: 10px;
            top: -70px;
        }
    </style>

    <div class="lg:container mx-auto pt-0 lg:pt-10 px-4">
        <div class="grid grid-flow-row lg:grid-cols-12 gap-4 xl:px-0">
            <div class="lg:col-span-3">
                <!--=== The Section Boxes : contact-menu ===-->
                <section id="contact-menu" class="lg:pl-6 lg:pb-10 pt-4 xl:px-0">
                    <h1><?php pll_e('แบบฟอร์ม')?></h1>
                    <style>
                        #contact-menu .contact-menu.cl-ci-orange-500 .-icon {
                            background: var(--ci-orange-500);
                            width: 1.5rem;
                            height: 1.5rem;
                            -webkit-mask-image: var(--icon);
                            -webkit-mask-size: contain;
                            -webkit-mask-repeat: no-repeat;
                        }

                        #contact-menu .contact-menu .-icon {
                            background: var(--ci-grey-400);
                            width: 1.5rem;
                            height: 1.5rem;
                            -webkit-mask-image: var(--icon);
                            -webkit-mask-size: contain;
                            -webkit-mask-repeat: no-repeat;
                        }
                    </style>
                    <div id="menu-contact" class="flex flex-row lg:flex-col side-nav-menu-contact relative pt-9 pb-2.5 lg:py-0 scroll-hid lg:mt-8" style="">
                        <!-- <div class="contact-menu px-0 lg:px-4">
                            <a href="/<?=pll_current_language()?>/customer-care" class=""><span class="inline-block -icon" style="--icon: url(/wp-content/uploads/2023/04/Vector-17.png)"></span> AssetWise Customer Care</a>
                        </div> 
                        <sp class="hidden lg:block" style="height: 1rem;"></sp> -->

                        <div class="contact-menu px-0 lg:px-4">
                            <a href="/<?=pll_current_language()?>/appeal-form" class=""><span class="inline-block -icon" style="--icon: url(/wp-content/uploads/2023/04/Vector-18.png)"> </span><?php pll_e('ร้องเรียนธรรมาภิบาล')?></a>
                        </div>
                        <sp class="hidden lg:block" style="height: 1rem;"></sp>

                        <div class="contact-menu px-0 lg:px-4 cl-ci-orange-500 font-medium">
                            <a href="/<?=pll_current_language()?>/contact-pdpa-officer" class=""><span class="inline-block -icon" style="--icon: url(/wp-content/uploads/2023/04/Vector-19.png)"></span> <?php pll_e('ติดต่อผู้คุ้มครองข้อมูลส่วนบุคคล')?></a>
                        </div>
                        <sp class="hidden lg:block" style="height: 1rem;"></sp>

                        <div class="contact-menu px-0 lg:px-4">
                             <a target="_blank" href="https://services.assetwise.co.th/DSRM/DSRForm" class=""><img src="/wp-content/uploads/2023/04/Vector-20.png" alt=""> <?php pll_e('พ.ร.บ. คุ้มครองข้อมูลส่วนบุคคล')?></a>
                        </div>
                        <sp class="hidden lg:block" style="height: 1rem;"></sp>

                        <div class="hidden lg:block absolute bg-ci-grey-900" style="width: 1px;height: 100%;left: 0px;z-index: 1;">
                            <div class="contact_vbar"></div>
                        </div>
                        <div class="block lg:hidden absolute bg-ci-grey-900 contact_hline" style="height: 2.5px;bottom: 1.15px;z-index: 1;">
                            <div class="contact_hbar" style="width: 286px;"></div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="-blank"></div>
            <div id="contact-form" class="lg:col-span-6 lg:mx-8 pt-8 md:pt-0 xl:pt-4">
                <div class="-wrap">
                    <div class="-title-wrap">
                        <h2 class="-title"><?php pll_e('ติดต่อผู้คุ้มครองข้อมูลส่วนบุคคล')?></h2>
                    </div>
                    <style>

                    </style>
                    <div class="-body">
                        <style>
                            #contact-form .codedropz-upload-handler::after {
                                content: "<?php pll_e('ไฟล์ขนาดไม่เกิน 10 MB (PDF/JPG/PNG)') ?>";
                                color: var(--ci-grey-400);
                                position: relative;
                                bottom: calc(-6px + -28px);
                                font-size: 20px;
                            }
                        </style>
                        <?php echo get_field('form_embed') ?>
                        <div class="-checkbox">
                            <label onchange="check_contactpdpa()">
                                <input type="checkbox" id="form_check_ok">
                                <span> <?php pll_e('บริษัทฯ จะจัดเก็บข้อมูลของท่าน เพื่อเจ้าหน้าที่ของเราจะรับเรื่องและติดต่อกลับ เพื่อให้ข้อมูลเพิ่มเติม โดยเร็วที่สุดคลิกที่นี่เพื่อดู')?>
                                    <a href="/<?=pll_current_language()?>/privacy-policy"><?php pll_e('นโยบายความเป็นส่วนตัว')?></a>
                                </span>
                            </label>
                            <p class='mb-4' id="form_check_ok_alert" style="display:none;"><?php pll_e('กรุณาเลือก')?></p>
                        </div>
                        <div class="-button" onclick="send_contactpdpa()">
                            <?php pll_e('ส่งแบบฟอร์ม')?>
                        </div>
                    </div>
                    <script>
                        function send_contactpdpa() {
                            let ok = $('#form_check_ok').checked;
                            if (ok) {
                                $('#form_check_ok_alert').style.display = "none";
                            } else {
                                $('#form_check_ok_alert').style.display = "block";
                            }
                            $('#asw_contactpdpa-submit').click()
                        }

                        function check_contactpdpa() {
                            $('#asw_contactpdpa-check input').click()
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    window.addEventListener("resize", () => {
        setTimeout(() => {
            setWidthMenu();
        }, 500)
    });
    let current = 1;
    let width_hline_gap;

    function setWidthMenu() {
        const elAll = document.querySelectorAll('.contact-menu');
        const menu = document.querySelector('#menu-contact');
        const hline = document.querySelector('.contact_hline');
        const hbar = document.querySelector('.contact_hbar');

        let width_hline = 0;
        let left_hline = 0;
        let iCount = 0;

        elAll.forEach((el, index) => {
            width_hline += el.offsetWidth;
            xconsolex.log(el.offsetWidth, index);
        })
        // xconsolex.log('elALl',elAll);
        for (let i of elAll) {
            if (iCount < current) {
                if (document.body.clientWidth < 1024) {
                    left_hline += i.offsetWidth;
                    // xconsolex.log(iCount + 1);
                } else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
                    left_hline += i.offsetWidth;
                }
            }
            iCount++
        }
        if (document.body.clientWidth < 1024) {
            width_hline_gap = width_hline;
            width_hline_gap += ((elAll.length - 1) * 16); // 32px
            menu.style.width = 'calc(100vw - 32px)';

            if (width_hline_gap < menu.offsetWidth) { // flex
                // menu.style.width = 100+'%';
                menu.style.justifyContent = 'space-between';
                gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
                left_hline = left_hline + (gapWidth * current)
                hbar.style.left = left_hline + 'px';
                hline.style.width = 100 + '%';
            } else {
                // menu.style.width = 'calc(100vw - 32px)';
                width_hline_gap = 0;
                width_hline += ((elAll.length - 1) * 16); // 16px
                menu.style.columnGap = 16 + "px";
                left_hline = left_hline + (current * 16);

                hbar.style.left = left_hline + 'px';
                hline.style.width = width_hline + 'px';
            }

        } else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
            width_hline_gap = width_hline;
            menu.style.width = 'calc(100vw - 32px)';

            if (width_hline_gap < menu.offsetWidth) { //flex
                // menu.style.width = 100+'%';
                menu.style.width = '';
                menu.style.justifyContent = 'space-between';
                gapWidth = (menu.offsetWidth - width_hline) / (elAll.length - 1)
                left_hline = left_hline + (gapWidth * current)
                hbar.style.left = left_hline + 'px';
                hline.style.width = 100 + '%';
                xconsolex.log(menu.offsetWidth - width_hline)
            } else {
                // menu.style.width = 'calc(100vw - 32px)';
                menu.style.width = '';
                width_hline_gap = 0;
                width_hline_gap += ((elAll.length - 1) * 32); // 32px
                menu.style.columnGap = 32 + "px";
                left_hline = left_hline + (current * 32);
                hbar.style.left = left_hline + 'px';
                hline.style.width = width_hline + 'px';

            }
        }

        // xconsolex.log('width_div',width_hline, 'menu-promo_width', menu.offsetWidth);


        // xconsolex.log(width_hline_gap);
        hbar.style.width = elAll[current].offsetWidth + 'px';
    }


    setTimeout(() => {
        setWidthMenu();
    }, 200);

    function show_info(num) {
        // toFilterTop()
        current = num;
        const elNum = num;
        const allEl = document.querySelectorAll(".contact-menu");
        const menu = document.querySelector('#menu-contact');

        let scrollY = 0;
        let iCount = 0;
        let barY = 0;

        let barX = 0;
        let width_hline = 0;
        allEl.forEach((el, index) => {
            width_hline += el.offsetWidth;
        })

        for (let i of allEl) {

            i.classList.remove('cl-ci-orange-500')
            i.classList.remove('font-medium')
            if (iCount < elNum) {
                scrollY += i.offsetHeight;
                barY += i.offsetHeight;

                barX += i.offsetWidth;
            }
            iCount++

        }
        scrollY = scrollY + (16 * elNum);
        barY = barY + (16 * elNum);
        scrollY -= 32;
        allEl[elNum].classList.add('cl-ci-orange-500');
        allEl[elNum].classList.add('font-medium');
        barYoffset = (document.querySelectorAll('.contact-menu')[elNum].offsetHeight - 28) / 2;
        document.querySelector('.contact_vbar').style.top = barY + barYoffset + 'px';


        if (document.body.clientWidth < 1024) {
            if (width_hline_gap != 0) {
                gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
                barX = barX + (gapWidth * current)
            } else {
                barX = barX + (current * 16);
            }


        } else if (document.body.clientWidth >= 768 && document.body.clientWidth < 1024) {
            xconsolex.log(width_hline_gap);
            if (width_hline_gap != 0) {
                gapWidth = (menu.offsetWidth - width_hline) / (allEl.length - 1)
                barX = barX + (gapWidth * current)
            } else {
                barX = barX + (current * 32);
            }

        }


        document.querySelector('.contact_hbar').style.width = allEl[current].offsetWidth + 'px';
        document.querySelector('.contact_hbar').style.left = barX + 'px';
    }
    show_info(1)
</script>

<style type="text/css">
    #contact-form .form-spin{
        display: none;
    }
    .wpcf7-response-output {
        display: none !important;
    }
    #contact-form .-body .-button[data-submit="1"]{
        background-color: #ccc;
        pointer-events: none;
    }
    #contact-form .-body .-button[data-submit="1"] .form-spin{
        display: inline-block;
    }
</style>
<script type="text/javascript">
    function createSpining(){
        let html = `<i class="fas fa-circle-notch fa-spin form-spin"></i>`+$('#contact-form .-body .-button').innerText;
        $('#contact-form .-body .-button').innerHTML = html
    }
    createSpining()
</script>
<script type="text/javascript">
    setInterval(()=>{
        if ($('.wpcf7-form').dataset.status == `submitting` || $('.wpcf7-form').dataset.status == `sent` || $('.wpcf7-form').dataset.status == `resetting`) {
          $('#contact-form .-body .-button').dataset.submit = 1
      }else{
        $('#contact-form .-body .-button').dataset.submit = 0
    }
},20)
</script>
<?php
get_footer();
?>