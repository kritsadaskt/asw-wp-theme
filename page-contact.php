<?php
get_header();
?>
<?php
$v = get_fields();
?>

<style>
    html,
    body {
        overflow: visible;
    }
</style>
<div id="contact-us-wrap">
    <section id="contact-us-page">
        <section id="banner-form">
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
                <div class="bg-white w-full col-span-3 lg:hidden">
                    <div class="lg:container mx-auto py-6  px-4 ">
                        <div class="flex flex-row items-center">
                            <a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
                            <img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
                            <a href="/<?=pll_current_language()?>/!#"><?php pll_e('ติดต่อเรา')?></a>
                        </div>
                    </div>
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
                                    <h6>
                                        <?= $v['company_name'] ?>
                                    </h6>
                                    <p>
                                        <?= $v['location_detail'] ?>
                                    </p>
                                    <a href="<?= $v['map_link'] ?>">
                                        <img src="/wp-content/uploads/2023/04/Vector-1.png" alt="">
                                        <?php pll_e('ดูแผนที่')?>
                                    </a>
                                </div>
                            </div>
                            <div class="-wrap">
                                <img src="/wp-content/uploads/2023/04/Vector-21.png" alt="">
                                <div class="-desc">
                                    <h6>
                                        <?= $v['telephone'] ?>
                                    </h6>
                                    <p>
                                        <?= $v['time_available'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="-wrap">
                                <img src="/wp-content/uploads/2023/04/Group-1140.png" alt="">
                                <div class="-desc">
                                    <h6>
                                        <?= $v['fax'] ?>
                                    </h6>
                                </div>
                            </div>
                            <div class="-wrap">
                                <img src="/wp-content/uploads/2023/04/Group-1139.png" alt="">
                                <div class="-desc">
                                    <h6>
                                        <?= $v['email'] ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="lg:container mx-auto py-6  px-4 hidden lg:block">
            <div class="flex flex-row items-center">
                <a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
                <img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
                <a href="/<?=pll_current_language()?>/!#"><?php pll_e('ติดต่อเรา')?></a>
            </div>
        </div>
        <style>
            #contact-us {
                max-width: 640px;
                margin-left: auto;
                margin-right: auto;
                color: var(--ci-grey-200);
            }

            #contact-form .-body {
                padding-top: 20px;
            }
        </style>
        <section id="contact-us" class="">
            <div id="contact-form" class="lg:col-span-8 pt-8 px-4 md:px-0 md:pt-8 xl:pt-4">
                <div class="-wrap">
                    <div class="-title-wrap">
                        <h2 class="-title"><?php pll_e('ติดต่อแอสเซทไวส์')?></h2>
                    </div>
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
                        <!-- 11215 -->
                        <?php echo get_field('form_embed') ?>
                        <div class="-checkbox">
                            <label onchange="check_customercare()">
                                <input type="checkbox" id="form_check_ok">
                                <span> <?php pll_e('บริษัทฯ จะจัดเก็บข้อมูลของท่าน เพื่อเจ้าหน้าที่ของเราจะรับเรื่องและติดต่อกลับ เพื่อให้ข้อมูลเพิ่มเติม โดยเร็วที่สุดคลิกที่นี่เพื่อดู')?>
                                    <a href="/<?=pll_current_language()?>/privacy-policy"><?php pll_e('นโยบายความเป็นส่วนตัว')?></a>
                                </span>
                            </label>
                            <p class='mb-4' id="form_check_ok_alert" style="display:none;"><?php pll_e('กรุณาเลือก')?></p>
                        </div>
                        <div class="-button" onclick="send_customercare()">
                            <?php pll_e('ส่งแบบฟอร์ม')?>
                        </div>
                    </div>
                    <script>
                        function send_customercare() {
                            let ok = $('#form_check_ok').checked;
                            if (ok) {
                                $('#form_check_ok_alert').style.display = "none";
                                $('#asw_contact-us-submit').click()
                                // setTimeout(function () {
                                //     if ($('.wpcf7-form.sent') != null) {
                                //         window.scrollTo({ top: 0, behavior: 'smooth' });
                                //     } else {
                                //         xconsolex.log($('.wpcf7-form'))
                                //     }
                                // }, 2000)
                            } else {
                                $('#form_check_ok_alert').style.display = "block";
                            }
                            // window.scrollTo({ top: 0, behavior: 'smooth' });
                        }

                        function check_customercare() {
                            $('#asw_contact-us input').click()
                        }
                    </script>
                </div>
            </div>
        </section>
    </section>
    <style>
        #thank-you {
            display: none !important;
            max-width: 668px;
        }

        /* #contact-us-wrap:has(.wpcf7-form.sent){ */


        /* 
    #contact-us-wrap {
        display: block;
    } */

    #thank-you .-info-wrap {
        display: flex;
        gap: 40px;
        padding-top: 24px;
        /* justify-content: center; */
    }

    #thank-you .-info-tel,
    #thank-you .-info-more {
        color: var(--ci-veri-500);
        display: grid;
        grid-template-columns: 24px auto;
        align-items: center;
        gap: 8px;
    }

    #contact-us-wrap:has(.wpcf7-form.sent) #contact-us-page {
/*            display: none;*/
}

#contact-us-wrap:has(.wpcf7-form.sent) #thank-you {
    display: block;
}

@media (max-width: 767px) {
    #thank-you {
        background: linear-gradient(180deg, #EDF2F7 -4.71%, #FFFFFF 164.99%);
    }
}
</style>
    <!-- <section id="thank-you" class="mx-auto pt-10 pb-20 px-4 md:px-0">
        <div class="flex flex-col items-center text-center">
            <img src="/wp-content/uploads/2023/05/thankyou-contact-us.png" alt="">
            <h2>ขอขอบคุณ</h2>
            <div class="sub-menu">
                แอสเซทไวส์ ได้รับข้อมูลคุณเรียบร้อยแล้ว จะรีบติดต่อกลับไปให้เร็วที่สุด ขอบคุณค่ะ
            </div>
            <div class="-info-wrap">
                <a href="tel:<?= $v['telephone'] ?>" class="-info-tel">
                    <img src="/wp-content/uploads/2023/05/phone-contact-us.png" alt="">
                    <div class="hightlight">
                        <?= $v['telephone'] ?>
                    </div>
                </a>
                <a href="#!" class="-info-more">
                    <img src="/wp-content/uploads/2023/05/line-contact-us.png" alt="">
                    <div class="hightlight">
                        สอบถามเพิ่มเติม
                    </div>
                </a>
            </div>
        </div>

    </section> -->
</div>
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