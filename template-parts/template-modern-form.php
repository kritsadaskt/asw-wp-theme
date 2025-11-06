<?php
$content = $args[0];
$f = $args[1];
pre($content['promotion_image']['sizes']['large']);
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
<style type="text/css">
#register {
    background-position: center;
    background-color: #001B28;
    background-image: url('<?=$content['background_image']['sizes']['1536x1536']?>');
}

.form-template-modern {
    max-width: 533px;
    display: block;
    margin: auto;
    margin-top: 52px;
    color: #202831;
}

.form-template-modern label span {
    font-weight: 400;
    font-size: 22px;
    line-height: 28px;
}

.form-template-modern .wpcf7-text {
    padding: 6px 16px;
    transition: all .3s;
    height: 40px;
    font-weight: 400;
    font-size: 22px;
    line-height: 28px;
    width: 100%;
    box-sizing: border-box;
    width: 233px;
    height: 40px;
    background: #FFFFFF;
    border: 0.5px solid #545E67;
    border-radius: 0;
    color: #202831;
}

.form-template-modern .wpcf7-text:hover {
    background: rgba(255, 255, 255, 0.3);
}

#consent_label {
    margin-top: 14px;
}

#consent_label a {
    color: #E1674F;
    text-decoration: underline;
}

.wpcf7 form.invalid .wpcf7-response-output {
    display: none;
}

.form-template-modern .wpcf7-list-item label span {
    font-size: 22px;
    font-weight: 400;
}

.wpcf7-spinner {
    margin: em auto;
    background: #E1674F88;
    display: block;
}

.form-template-modern .wpcf7-submit {
    padding: 6px 65px;
    display: inline-block;
    background: #E1674F;
    color: #fff;
    border: none;
    height: auto;
    line-height: 28px;
    font-size: 22px;
    font-weight: 500;
    box-sizing: border-box;
    width: auto;
    display: block;
    margin: auto;
    cursor: pointer;
    margin-top: 28px;
    transition: all 0.5s;
    border-radius: 4px;
}

.wpcf7-submit:hover {
    background: #E1674F;
}

.wpcf7-not-valid-tip {
    display: inline-block;
    margin-right: 0.5em;
}

.form-template-modern .wpcf7-list-item {
    display: inline-block;
    margin: 0;
}

.form-template-modern .wpcf7-list-item input[type=checkbox] {
    display: inline-block;
    width: auto;
    margin-right: 0.2em;
    accent-color: #2F6861;
}

.wpcf7-list-item label {
    display: inline-block;
    margin: 0;
}

.form-template-modern .wpcf7-text:focus {
    border: 2px solid #E1674F;
    height: 40px;
}

.form-title {
    font-style: normal;
    font-weight: 400;
    font-size: 56px;
    line-height: 56px;
    color: #2F6861;
    text-align: center;
}

.form-template-modern .form-column-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 22px 16px;
}

/*-- Mobile Version --*/
@media (max-width: 1319px) {
    .form-template-modern{
        margin-top: 43px;
    }
    .form-template-modern .form-column-2 {
        grid-template-columns: 1fr;
        grid-gap: 16px;
    }

    .form-template-modern .wpcf7-text {
        width: 100%;
    }

    .form-column-2 label {
        width: 100%;
    }
}

.form-column-2 label {
    position: relative;
}

.form-column-2 label>span {
    position: absolute;
    top: 0;
    left: 0;
}

.form-column-2 label>span.wpcf7-form-control-wrap {
    position: static;
}

.form-column-2 label>span {
    position: absolute;
    top: 2.15rem;
    left: 1rem;
    color: #828A92;
    transition: all .3s;
}

.form-column-2 label[data-filled="true"]>span {
    top: 0;
    left: 0;
    color: #202831;
}

.form-contact {
    display: flex;
    color: black;
    justify-content: center;
    align-items: center;
}

.form-contact .-txt {
    width: 3em;
    text-align: center;
}

.form-contact .-line {
    height: 1px;
    background: rgba(255, 255, 255, 0.3);
    width: calc(40% - 2em);
}
</style>
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