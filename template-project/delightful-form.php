<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
?>

<section id="register" style="background-image: url(<?= $content['background_image']['url'] ?>);" class="is-on-nav is-on-nav-mob">
    <div class="register-hightlight flex items-center">
        <div class="hightlight w-full whitespace-nowrap ci-cl1">
            <?php pll_e('คอนโดหรู อิตาเลียนสไตล์
            แห่งเดียวบนศรีสมาน')?>
        </div>
        <sp class="register-line ci-cl1"></sp>
    </div>
    <div class="-cont-pd section-fade">
        <div class="relative">
            <div class="grid grid-cols-12">
                <div class="col-span-6 relative grid grid-cols-10 p-register-side-img">
                    <div class="register-img-wrap col-span-6 col-start-3 ml-7">
                        <div class="register-img" style="background-image: url();">
                            <img src="<?= $content['promotion_image']['url'] ?>" alt="">

                        </div>
                    </div>
                </div>
                <div class="col-span-6 py-16 px-10">
                    <div class="cont-pd">
                        <div class="form-template-delightful delightful-form-1">
                            <h1 class="text-center ci-cl1" style="padding-bottom: 23px"><?php pll_e('ลงทะเบียน')?></h1>
                            <?= $content['form'] ?>
                            <div class="form-contact">
                                <div class="-line"></div>
                                <div class="-txt"><?php pll_e('หรือ')?></div>
                                <div class="-line"></div>
                            </div>
                            <div class="grid grid-cols-12 text-black pt-6" style="padding-bottom:70px;">
                                <div class="col-span-6 flex flex-row justify-end items-center pr-25px">
                                    <span class=" p-3">
                                        <img src="/wp-content/uploads/2023/03/Vector-1.png" alt="">
                                    </span>
                                    <span>02-168-0000</span>
                                </div>
                                <div class="col-span-6 flex flex-row items-center pl-25px">
                                    <span class=" p-3">
                                        <img src="/wp-content/uploads/2023/03/Vector-2.png" alt="">
                                    </span>
                                    <span class="underline pointer"><?php pll_e('สอบถามเพิ่มเติม')?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
