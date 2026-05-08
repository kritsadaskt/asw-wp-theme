<?php
$content = $args[0];
$f = $args[1];
?>
<style>
    #register {
        /* min-height: 639px; */
        background-size: cover;
        color: #423C2A;
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
        color: black;
    }

    .form-contact .-line {
        height: 1px;
        background: black;
        width: calc(40% - 2em);
    }
    #register .register-img {
        /* margin-top: 5%; */
        aspect-ratio: 423/308;
        background-repeat: no-repeat;
        background-position: center;
        position: relative;
    }

    .register-img::after {
        content: '';
        border-top-left-radius: 50%;
        border-top-right-radius: 50%;
        position: absolute;
        top: 0%;
        left: 0;
        width: 98%;
        height: 100%;
        transform: translate(18px, 8px) scaleX(1) scaleY(1);
        /* width: 102%; */
        /* height: 92%; */
        /* transform: translate(7px, 20px) scaleX(0.6) scaleY(1); */
        border: 1px #423C2A solid;

        pointer-events: none;

    }

    .register-line {
        background-color: #423C2A;
        height: 0.7px
    }

    .register-hightlight {
        position: absolute;
        left: 49.2%;
        bottom: 5%;
        transform: rotateZ(-90deg);
        transform-origin: top left;
        /* width: 26.5%; */
        width: 33%;
        max-width: 648px;
        gap: 0.25rem;
    }

    .p-register-side-img {
        padding-top: 62px;
        padding-bottom: 77px;
    }

    .form-template-delightful {
        max-width: 533px;
        display: block;
        margin: auto;
        margin-top: 52px;
        color: #423C2A;
    }

    .form-template-delightful label span {
        font-weight: 700;
        font-size: 18px;
        line-height: 20px;
    }

    .form-template-delightful .wpcf7-text:placeholder {
        /*				color: red;*/
    }

    .form-template-delightful .wpcf7-text {
        padding: 6px 0;
        background: transparent;
        transition: all .3s;
        height: 40px;
        font-weight: 400;
        font-size: 22px;
        line-height: 28px;
        width: 100%;
        border: none;
        border-bottom: 1px solid;
        border-radius: 0;
        color: #003952;
    }

    .form-template-delightful .wpcf7-text:hover {
        /*				background: rgba(255, 255, 255, 0.3);*/
    }

    #consent_label {
        margin-top: 14px;
    }

    #consent_label a {
        color: #003952;
        text-decoration: underline;
    }

    .wpcf7 form.invalid .wpcf7-response-output {
        display: none;
    }

    .form-template-delightful .wpcf7-list-item label span {
        font-size: 22px;
        font-weight: 400;
    }

    .wpcf7-spinner {
        margin: em auto;
        background: #09264788;
        display: block;
    }

    .form-template-delightful .wpcf7-submit {
        padding: 6px 32px;
        display: inline-block;
        background: #003952;
        border-radius: 0;
        color: #FFEED4;
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
    }

    .wpcf7-submit:hover {
        background: hsla(180, 78%, 70%, 1);
    }

    .wpcf7-not-valid-tip {
        display: inline-block;
        margin-right: 0.5em;
    }

    .form-template-delightful .wpcf7-list-item {
        display: inline-block;
        margin: 0;
    }

    .form-template-delightful .wpcf7-list-item input[type=checkbox] {
        display: inline-block;
        width: auto;
        margin-right: 0.2em;
        opacity: .5;
    }

    .wpcf7-list-item label {
        display: inline-block;
        margin: 0;
    }

    .form-template-delightful .wpcf7-text:focus {}

    .form-template-delightful .form-column-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 22px 16px;
    }
</style>
<section id="register" style="background-image: url(<?= $content['background_image']['url'] ?>);" class="is-on-nav is-on-nav-mob">
    <div class="register-hightlight flex items-center">
        <div class="hightlight w-full whitespace-nowrap ci-cl1">
            คอนโดหรู อิตาเลียนสไตล์
            แห่งเดียวบนศรีสมาน
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
<?php theme_overide_style($content) ?>