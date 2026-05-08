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
<section id="register" class="bg-cover section-fade xl:hidden">
    <div class="container mx-auto my-10">
        <div class="register_mobile_form bg-cover gap-20">
            <div class="form-template-modern modern-form-1 px-4">
                <h2 class="form-title cl-ci1 "><?php pll_e('ลงทะเบียน')?></h2>
                <?= do_shortcode('[contact-form-7 id="3919" ]'); ?>
            </div>
            <div class="form-contact">
                <div class="-line"></div>
                <div class="-txt"><?php pll_e('หรือ')?></div>
                <div class="-line"></div>
            </div>
            <div class="grid grid-cols-12 text-white py-6">
                <div class="col-span-6 flex flex-row justify-center items-center">
                    <span class="p-3">
                        <img src="/wp-content/uploads/2023/02/phone-dynamic1.png" alt="">
                    </span>
                    <span>02-168-0000</span>
                </div>
                <div class="col-span-6 flex flex-row justify-center items-center">
                    <span class=" p-3">
                        <img src="/wp-content/uploads/2023/02/line-dynamic1.png" alt="">
                    </span>
                    <span class="underline"><?php pll_e('สอบถามเพิ่มเติม')?></span>
                </div>
            </div>
            <img src="<?=$content['promotion_image']['sizes']['large']?>" class="w-full">
        </div>
    </div>
</section>

<section id="register" class="bg-cover section-fade hidden xl:block">
    <div class="container mx-auto my-14">
        <div class="grid grid-cols-12 bg-cover gap-20">
            <div class="col-span-1"></div>
            <div class="col-span-5">
                <div class="form-template-modern modern-form-1">
                    <h2 class="form-title cl-ci1 "><?php pll_e('ลงทะเบียน')?></h2>
                    <?= do_shortcode('[contact-form-7 id="3919" ]'); ?>
                </div>
            </div>
            <div class="col-span-5">
                <img src="<?=$content['promotion_image']['sizes']['large']?>" class="w-full">
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function setFormLabel() {
        let el = document.querySelectorAll('.form-column-2 label')
        for (let i of el) {
            i.setAttribute('onclick', `moveLabel(this)`);
        }
    }
    setFormLabel()

    function moveLabel(el) {
        el.dataset.filled = "true"
    }
</script>
<?php theme_overide_style($content) ?>