<?php
$content = $args[0];
$f = $args[1];

$has_building = 1;
if (is_array($content['building']) == null) {
    $has_building = 0;
}
if ($content['hide_b'] == 'hide') {
    $has_building = 0;
}

$facSize = ofsize($content['facility']);

?>

<style>
#facility {
    --mg: calc((100vw - 1280px) / 2);
    --i: 0;
}

.p-facility {
    color:
    <?= $content['facility_title_color'] ?>
    ;
    line-height: 56px;
    font-size: 56px;
    font-weight: 400;
}

.p-page-facility {
    line-height: 48px;
    font-size: 48px;
    font-weight: 400;
    color: var(--text-color);
}

.bg-number-facility {
    position: absolute;
    top: 317px;
    left: -38px;
    font-size: 432px;
    font-weight: 900;
    line-height: 518px;
    opacity: 0.06;
}

.mock-2 {
    position: absolute;
    width: 640px;
    height: 456px;
    left: 31vw;
    top: 160px;
}
</style>

<style type="text/css">
#facility .info-tabs-block {
    background: transparent;
    border: none;
    border-bottom: 1px solid var(--text-color);
    border-radius: 0;
}

.facility_alt-blocks[data-show="1"] {
    display: flex;
}

.facility_alt-blocks {
    --block-h: 128px;
    flex-flow: row wrap;
    margin-top: 48px;
    margin-bottom: 78px;
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    display: none;
        /*height: calc(var(--block-h) * 2);
        overflow: auto;*/
        justify-content: center;
    }

    .facility_alt-block {
        width: calc(100% / 6);
        height: 128px;
        text-align: center;
        padding: 0 16px;
    }

    @media (max-width: 767px) {
        .facility_alt-block {
            padding: 0 4px;
        }
    }

    .facility_alt-text {
        color: var(--text-color);
        font-style: normal;
        font-weight: 500;
        font-size: 22px;
        line-height: 1.2;
    }

    .facility_alt-icon {
        height: 70px;
        width: auto;
        display: block;
        margin-bottom: 8px;
    }

    .facility_alt-icon img {
        object-fit: contain;
        object-position: center bottom;
        height: 70px;
        width: 100%;
    }


    .fac-tab {
        cursor: pointer;
        color: rgba(156, 197, 192, 1);
    }

    .fac-tab-item {
        margin: 0 16px;
    }

    .fac-tab-item:hover,
    .fac-tab-item.-active {
        color: var(--mc-main-3);

    }

    .text-facility-title {
        line-height: 48px;
        font-size: 48px;
        font-weight: 400;
        color: var(--text-color);
    }

    .text-facility-desc {
        line-height: 28px;
        font-size: 22px;
        font-weight: 400;
        color: var(--text-color);
    }

    .facility-content[data-show="1"] {
        opacity: 1;
        transition: all .5s;
    }

    .facility-content[data-show="0"] {
        opacity: 0;
        transition: all .5s;
    }

    .facility-text-counter {
        line-height: 56px;
        font-size: 56px;
        font-weight: 400;
    }

    .facility-content-wrap,
    .p-page-facility,
    .facility-content {
        transition: all 1s;
    }

    .p-facility {
        color: var(--mc-tab-text-hover);
    }

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        .facility-img {
            background-image: url('/wp-content/uploads/2023/02/image-463.png');
            display: block;
            background-size: cover;
            height: 100%;
        }

        #carousel-concept {
            height: 185px;
            width: 100%;
        }

        .p-facility {
            padding-top: 43px;
        }

        .text-facility-title {
            font-size: 36px;
            line-height: 40px;
        }

        .facility_alt-blocks {
            padding: 0 8px;
            height: calc(var(--block-h) * 4);
            height: auto;
        }

        .facility_alt-block {
            width: calc(100% / 3);
            margin-bottom: 16px;
        }
    }
</style>

<!-- Desktop -->
<section id="facility" class="section-fade -hidden -xl:block is-on-nav is-on-nav-mob"
style="--i: 0; --max: <?= $facSize ?>">
<?php if ($content['hide_a'] != 'hide'): ?>
    <div>
        <style lang="">
        #d-fac {
            padding-top: 87px;
        }

        #facility-content {
            padding-left: var(--mg);
        }

        #facility-content .facility-content-wrap {
            padding-right: 32px;
            padding-top: 48px;
        }

        #facility-content .facility-contents {
            position: relative;
        }

        #facility-content .bg-number-facility,
        #facility-content .facility-contents {
            pointer-events: none;
        }

        #facility-content .facility-content {
            color: var(--text-color);
            position: absolute;
            top: 0;
            left: 0;

        }
    </style>
    <div id="d-fac" class="grid-cols-12 hidden xl:grid facility-menu-nav" data-is-side="start"
    style="--fg-i:0;--fg-slot:0;--fg-slot-px:0">
    <div id="facility-content" class="col-span-4">
        <div class="text-white bg-number-facility">01</div>
        <div class="-px-16">
            <h2 class="p-facility"><?php pll_e('สิ่งอำนวย')?><br><?php pll_e('ความสะดวก')?></h2>
            <div class="facility-content-wrap">
                <h2 class="p-page-facility">
                    <span class="facility-text-counter">01</span><span style="color: var(--mc-main-3)">/
                        <?php echo (ofsize($content['facility'])) < 10 ? '0' . ofsize($content['facility']) : ofsize($content['facility']) ?>
                    </span>
                </h2>
                <div class="facility-contents">
                    <?php
                    foreach ($content['facility'] as $i => $fac) {
                        ?>
                        <div class="facility-content" data-i="<?= $i ?>"
                            data-show="<?php echo ($i == 0) ? 1 : 0; ?>">
                            <h2 class="text-facility-title">
                                <?= $fac['title'] ?>
                            </h2>
                            <p class="pt-4 text-facility-desc">
                                <?= $fac['description'] ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <style>
        #carousel-fac {
            --wd: calc(100% / var(--max));
            height: calc(100% - 28px);
            max-height: calc(100% - 28px);
            padding-top: 36px;
            padding-bottom: 64px;
            overflow: hidden;
            transition: .5s ease-in-out;
        }

        #carousel-fac .-d-fac-rail {
            width: calc(75% * var(--max));
            transform: translateX(calc(-1 * var(--i) * (var(--wd))));
            display: flex;
            transition: .5s ease-in-out;
        }

        .-d-fac-item {
            width: 100%;
            height: 100%;
            transition: .5s ease-in-out;
        }

        .-d-fac-item[data-active="1"] .-d-fac-item-pic {
            transform: scale(1);
            left: 0;
        }

        .-d-fac-item-pic {
            width: 100%;
            padding-top: 71.25%;
            background-color: white;
            background-image: var(--img);
            background-size: cover;
            transform: scale(.75) translateX(-16.75%) translateY(-16.75%);
            left: 32px;
            position: relative;
            transition: .5s ease-in-out;
            box-shadow: 0px 60px 40px -40px #0006;
        }

        .-d-fac-item .-d-fac-block {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            opacity: 1;
            background-color: #20283177;
            transition: .5s ease-in-out;
            cursor: pointer;
        }

        .-d-fac-item[data-active="1"] .-d-fac-block {
            opacity: 0;
            cursor: default;
        }

        .-d-fac-inner {
            padding: 21px 32px;
            color: #fff;
        }
    </style>
    <div id="fac-images" class="col-span-8">
        <style>
        .facility-menu {
            position: relative;
            cursor: pointer;
            font-size: 26px;
            line-height: 32px;
            margin: 0 20px;
            min-width: 120px;
            max-width: 260px;
            text-align: center;
            transition: all .3s;
            color: var(--mc-main-3);
            border-bottom: 2px solid transparent;
            transition: .5s ease-in-out;
            white-space: nowrap;
        }

        .facility-menu>p {
            overflow: hidden;
            white-space: nowrap;
        }

        .facility-menu-nav {
            --fg-i: 0;
            --fg-slot: 0;
            --fg-slot-px: 0;
        }

        .facility-menu:nth-child(1):after {
            height: 0;
            width: 0;
        }

        .facility-menu.-active {
            color: #fff !important;
            border-bottom: 2px solid #fff;
        }

        .facility-menu:hover {
            color: #fff !important;
        }

        .facility-menu-wrap {
            max-width: 880px;
            overflow-x: scroll;
            position: relative;
        }

        .facility-menu-rail {
            position: relative;
            left: 0;
            transition: all .5s ease-in-out;
            transform: translateX(calc(var(--fg-slot-px) * -1px));
        }

        .facility-arrow {
            width: 32px;
            height: 32px;
            cursor: pointer;
            transition: .5s;
            background-image: var(--mc-chevron-up);
            background-repeat: no-repeat;
            background-size: contain;
            cursor: pointer;
            transition: .5s;
            transform: rotate(90deg);
        }

        .facility-arrow.-left {
            transform: rotate(-90deg);
        }

        .bg-gallery-item {
            background: var(--bg-color);
            opacity: 1;
            height: 350px;
            overflow: hidden;
        }

        #d-fac .facility-wrap {
            padding-right: var(--mg);
            display: grid;
            grid-template-columns: auto 550px;
            justify-content: end;
        }

        #d-fac .info-tabs-block-wrap {
            grid-column-start: 2;
        }

        #d-fac .info-tabs-block {
            /* justify-content: flex-end; */
            border: none;
        }

        #d-fac .info-tab .info-tab-txt {
            color: var(--mc-tab-text-color);
            border-bottom: solid 2px transparent;
            transition: .5s ease-in-out;
        }

        #d-fac .info-tab:hover .info-tab-txt {
            color: var(--mc-tab-text-hover);
        }

        #d-fac .info-tab.-active .info-tab-txt {
            color: var(--mc-tab-text-hover);
            border-bottom: solid 2px var(--mc-tab-text-hover);
        }

        #d-fac .info-tab-txt {
            white-space: nowrap;
            font-size: 26px;
            line-height: 32px;
            font-weight: 400;
            padding: 0;
            margin: 0 16px;
        }
    </style>
    <div class="facility-wrap">
        <div class="info-tabs-block-wrap" style="width: max-content;">
            <div class="info-tabs-block">
                <div class="info-tabs-block-arrow -left"></div>
                <div class="info-tabs-blocks">
                    <div class="info-tabs-rail">
                        <?php foreach ($content['facility'] as $i => $fac) {
                            ?>
                            <div class="info-tab <?php if ($i == 0):
                            echo "-active" ?><?php endif ?>" onclick="change_fac(<?= $i ?>)">
                            <h6 class="info-tab-txt">
                                <?= $fac['title'] ?>
                            </h6>
                        </div>
                        <?php
                    } ?>
                </div>
            </div>
            <div class="info-tabs-block-arrow -right"></div>
        </div>
    </div>
</div>
<div id="carousel-fac">
    <div class="-d-fac-rail">
        <?php foreach ($content['facility'] as $key => $value):
            ?>
            <div class="-d-fac-item" data-active="<?= $key == 0 ? '1' : '0' ?>">
                <div onclick="change_fac(<?= $key ?>)" class="-d-fac-item-pic"
                    style="--img: url(<?= acf_img($value['image']) ?>)">
                    <div class="-d-fac-block">
                        <div class="-d-fac-inner">
                            <h2>
                                <?= sprintf('%02d', $key + 1) ?>
                            </h2>
                            <h6>
                                <?= $value['title'] ?>
                            </h6>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
</div>
</div>
<?php endif ?>
<style lang="">
.m-facility {
    padding-top: 44px;
    padding-bottom: 10px;
    color: var(--mc-main-5);
    text-align: center;
    font-weight: 400;
    font-size: 38px;
    line-height: 40px;
}

#mob-fac .facility-wrap {
    /* padding: 0 16px; */
}

#mob-fac .facility-wrap {
                /* padding-right: var(--mg);
                display: grid;
                grid-template-columns: auto 550px;
                justify-content: end; */
            }

            #mob-fac .info-tabs-block-wrap {
                grid-column-start: 2;
            }

            #mob-fac .info-tabs-block {
                /* justify-content: flex-end; */
                border: none;
            }

            #mob-fac .info-tab .info-tab-txt {
                border-bottom: solid 2px transparent;
                transition: .5s ease-in-out;
            }

            #mob-fac .info-tab:hover .info-tab-txt {
                color: var(--mc-tab-text-hover);
            }

            #mob-fac .info-tab.-active .info-tab-txt {
                color: var(--mc-tab-text-hover);
                border-bottom: solid 2px var(--mc-tab-text-hover);
            }

            #mob-fac .info-tab-txt {
                white-space: nowrap;
                font-size: 26px;
                line-height: 32px;
                font-weight: 400;
                padding: 0;
                margin-right: 32px;
            }

            #mob-fac .info-tabs-block-wrap {
                max-width: 100% !important;
            }

            #mob-fac .info-tabs-block[data-is-overflow="1"] .info-tabs-blocks {
                overflow: hidden;
                width: calc(100% - 80px);
                position: relative;
                left: 40px;
            }
        </style>
        <?php if ($content['hide_a'] != 'hide'){ ?>
            <div id="mob-fac" class="xl:hidden">
                <div>
                    <h2 class="m-facility"><?php pll_e('สิ่งอำนวยความสะดวก')?></h2>
                    <div class="facility-wrap">
                        <div class="info-tabs-block-wrap" style="width: max-content;">
                            <div class="info-tabs-block">
                                <div class="info-tabs-block-arrow -left"></div>
                                <div class="info-tabs-blocks">
                                    <div class="info-tabs-rail">
                                        <?php foreach ($content['facility'] as $i => $fac) {
                                            ?>
                                            <div class="info-tab <?php if ($i == 0):
                                            echo "-active" ?><?php endif ?>" onclick="change_fac(<?= $i ?>)">
                                            <h6 class="info-tab-txt">
                                                <?= $fac['title'] ?>
                                            </h6>
                                        </div>
                                        <?php
                                    } ?>
                                </div>
                            </div>
                            <div class="info-tabs-block-arrow -right"></div>
                        </div>
                    </div>
                </div>
                <style>
                #-mob-carousel-fac {
                    padding-top: 24px;
                    padding-bottom: 20px;
                }

                #-mob-carousel-fac .-mob-fac-rail {
                    --m-block: 100%;
                    display: flex;
                    width: calc(var(--m-block)* var(--max));
                    transform: translateX(calc(-1 * var(--i) * (var(--m-block) / var(--max))));
                    transition: .5s ease-in-out;
                }

                #-mob-carousel-fac .-mob-fac-item {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                    box-shadow: 0px 84px 32px -64px rgba(0, 0, 0, 0.4);
                }
                #-mob-carousel-fac .-mob-fac-item,
                #mob-fac .facility-content-mob-wrap{
                    padding: 0 2rem;
                }
                @media (max-width: 767px) {
                    #-mob-carousel-fac .-mob-fac-item,
                    #mob-fac .facility-content-mob-wrap{
                        padding: 0 1rem;
                    }
                }

                .-mob-fac-item .-mob-fac-item-pic {
                    /* position: relative; */
                    background-image: var(--img);
                    background-position: center;
                    background-size: cover;
                    padding-top: 72%;
                    width: 100%;
                }
            </style>
            <div id="-mob-carousel-fac">
                <div class="-mob-fac-rail">
                    <?php foreach ($content['facility'] as $i => $fac): ?>
                        <div class="-mob-fac-item">
                            <div class="-mob-fac-item-pic" style="--img: url(<?= acf_img($fac['image']) ?>)"></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="facility-content-mob-wrap">
                <span class="text-white facility-text-counter">01</span>
                <span class="facility-text-max">/
                    <?php echo (ofsize($content['facility'])) < 10 ? '0' . ofsize($content['facility']) : ofsize($content['facility']) ?>
                </span>
                <style>


                .facility-content-mob-wrap .facility-text-counter {
                    font-size: 38px;
                    line-height: 40px;
                    font-weight: 400;
                }

                .facility-content-mob-wrap .facility-text-max {
                    font-size: 36px;
                    line-height: 40px;
                    font-weight: 400;
                    color: var(--mc-main-3)
                }

                #mob-fac .facility-mob-contents {
                    position: relative;
                }

                #mob-fac .facility-content[data-show="0"] {
                    height: 0;
                    opacity: 0;
                }

                #mob-fac .facility-content[data-show="1"] {
                    height: auto;
                    opacity: 1;
                }
            </style>
            <div class="facility-mob-contents">
                <?php
                foreach ($content['facility'] as $i => $fac) {
                    ?>
                    <div class="facility-content" data-i="<?= $i ?>" data-show="<?php echo ($i == 0) ? 1 : 0; ?>">
                        <h2 class="text-facility-title">
                            <?= $fac['title'] ?>
                        </h2>
                        <p class="pt-4 text-facility-desc">
                            <?= $fac['description'] ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<style>
.facility_alt-blocks[data-show="0"] {
    display: none;
}
</style>

<div id="facility_alt" class="container mx-auto" style="padding-top:71px;">
    <?php if ($has_building): ?>
        <div class="text-center">
            <h1 class="p-facility another-facility"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h1>
        </div>
        <sp style="height: 20px;"></sp>
        <style>
        #facility_alt .info-tabs-block-wrap {
            max-width: 100% !important;
        }

        #facility_alt .info-tabs-block {
            justify-content: center;
        }

        #facility_alt .info-tab {
            padding: 0 22px;
            white-space: nowrap;
        }

        #facility_alt .info-tab-txt {
            padding: 0;
            font-size: 26px;
            line-height: 32px;
            font-weight: 400;
        }

        #facility_alt .info-tab.-active .info-tab-txt::after {
            opacity: 1;
        }

        #facility_alt .info-tab-txt::after {
            content: "•";
            margin-left: 5px;
            opacity: 0;
            transition: .3s;
        }

        #facility_alt .facility_alt-blocks::-webkit-scrollbar {
            width: 8px;
        }

        #facility_alt .facility_alt-blocks::-webkit-scrollbar-track {
            background: #BFC4C8;
            border-radius: 10em;
        }

        #facility_alt .facility_alt-blocks::-webkit-scrollbar-thumb {
            background: #828A92;
            border-radius: 10em;
            height: 4rem;
        }

        .another-facility {
            line-height: 48px;
            font-size: 48px;
            font-weight: 400;
        }

        @media (max-width: 1319px) {
            .another-facility {
                font-weight: 400;
                font-size: 38px !important;
                line-height: 40px;
            }

            #facility_alt {
                padding: 0 1rem;
            }

            #facility_alt .info-tabs-block {
                justify-content: left;
            }

            #facility_alt .facility-menu {
                margin: 0;
                margin-right: 32px;
            }

            #facility_alt .info-tab {
                padding: 0;
                padding-right: 44px;
                white-space: nowrap;
            }
        }
    </style>
    <div class="info-tabs-block-wrap">
        <div class="info-tabs-block">
            <div class="info-tabs-block-arrow -left"></div>
            <div class="info-tabs-blocks">
                <div class="info-tabs-rail">
                    <?php foreach ($content['building'] as $key => $value): ?>
                        <div onclick="change_anotherfac(<?= $key ?>, this)" class="info-tab">
                            <h6 class="info-tab-txt">
                                <?= $value['building_name'] ?>
                            </h6>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="info-tabs-block-arrow -right"></div>
        </div>
    </div>
    <div class="">

        <?php foreach ($content['building'] as $key => $value): ?>
            <div class="facility_alt-blocks" data-i="<?= $key ?>" data-show="0">
                <!-- <?= $value['type']; ?> -->
                <?php
                            // pre($content['building']);

                switch ($value['type']) {
                    case 'text':
                    foreach ($value['image_and_text'] as $key => $value):
                        ?>
                        <div class="facility_alt-block">
                            <div class="facility_alt-icon">
                                <img src="<?= acf_img($value['icon']) ?>">
                            </div>
                            <p class="facility_alt-text">
                                <?= $value['text'] ?>
                            </p>
                        </div>
                        <?php
                    endforeach;
                    break;
                    case 'image':
                    ?>
                    <style>
                    .facility_alt-blocks {
                        --block-h: 150px;
                    }

                    .facility_alt-block {
                        height: 150px;
                    }

                    .facility_alt-block>img {
                        height: 135px;
                        width: auto;
                        object-fit: contain;
                    }
                </style>
                <?php
                foreach ($value['image_by_image'] as $key => $value):
                    ?>
                    <div class="facility_alt-block">
                        <img src="<?= acf_img($value['image']) ?>">
                    </div>
                    <?php
                endforeach;
                break;
                case 'over_image':
                ?>
                <style>
                .facility_alt-blocks {
                    margin-bottom: 78px;
                    height: auto;
                }
            </style>
            <div class="-facility_alt-block">
                <img class="hidden xl:block" src="<?= acf_img($value['overall_image']) ?>">
                <img class="block xl:hidden" src="<?= acf_img($value['overall_image_mobile']) ?>">
            </div>
            <?php
        }
        ?>
    </div>
<?php endforeach; ?>
<script>
    function change_anotherfac(num, ele) {
        for (let e of $$('#facility_alt .info-tab')) {
            e.classList.remove("-active")
        }
        ele.classList.add("-active")
        let fac_block = $$("#facility_alt .facility_alt-blocks")
        for (let i = 0; i < fac_block.length; i++) {
            fac_block[i].dataset.show = 0
        }
        fac_block[num].dataset.show = 1
    }
    $('#facility_alt .info-tab').click()
</script>
</div>
<?php endif; ?>
</div>

</div>
</section>
<script type="text/javascript">
    function changeFactNavSlot(di) {
        let nav = document.querySelector('.facility-menu-nav')
        let rail = document.querySelector('.facility-menu-rail')
        let wrap = document.querySelector('.facility-menu-wrap')
        let items = []
        let breakPoint = []
        breakPoint[0] = {
            i: 0,
            px: 0
        }
        let items_size = document.querySelectorAll('.facility-menu').length
        let slot = parseInt(nav.style.getPropertyValue('--fg-slot'))
        rail_width = rail.clientWidth
        wrap_width = wrap.clientWidth
        let temp_i = 0
        let temp_px = 0

        for (let i = 0; i < items_size; i++) {
            items.push({
                i,
                el: document.querySelectorAll('.facility-menu')[i],
                width: document.querySelectorAll('.facility-menu')[i].clientWidth
            })
            if (temp_px + items[i].width < wrap_width) {
                temp_px += items[i].width
            } else {
                breakPoint.push({
                    i,
                    px: temp_px
                })
                temp_px = items[i].width
            }

        }
        let newDi = slot + di
        if (newDi < 0) {
            newDi = breakPoint.length - 1
        } else if (newDi > breakPoint.length - 1) {
            newDi = 0
        }

        let newBreakPoint = 0;
        for (let i = 0; i <= newDi; i++) {
            newBreakPoint += breakPoint[i].px
        }
        xconsolex.log(newBreakPoint)
        nav.style.setProperty('--fg-slot', newDi)
        nav.style.setProperty('--fg-slot-px', newBreakPoint)
    }

    function change_fac(i) {
        let section = $('#facility')
        let tab = $$('#d-fac .info-tab')
        let tab_mob = $$('#mob-fac .info-tab')

        if ($('#d-fac .info-tab.-active') != null) {
            $('#d-fac .info-tab.-active').classList.remove('-active');
        }
        if ($('#mob-fac .info-tab.-active') != null) {
            $('#mob-fac .info-tab.-active').classList.remove('-active');
        }
        tab[i].classList.add('-active')
        tab_mob[i].classList.add('-active')

        for (let i of $$('.facility-content')) {
            i.dataset.show = 0;
        }
        for (let i_m of $$('.facility-mob-contents .facility-content')) {
            i_m.dataset.show = 0;
        }
        $$('.facility-content')[i].dataset.show = 1;
        $$('.facility-mob-contents .facility-content')[i].dataset.show = 1;

        for (let k of $$('.-d-fac-item')) {
            k.dataset.active = 0;
        }
        $$('.-d-fac-item')[i].dataset.active = 1;

        section.style.setProperty('--i', i)
        if (i >= 9) {
            $('.facility-text-counter').innerText = i + 1
            $('.facility-content-mob-wrap .facility-text-counter').innerText = i + 1

            $('.bg-number-facility').innerText = i + 1
        } else {
            $('.facility-text-counter').innerText = '0' + (i + 1)
            $('.facility-content-mob-wrap .facility-text-counter').innerText = '0' + (i + 1)
            $('.bg-number-facility').innerText = '0' + (i + 1)
        }

    }
    change_fac(0)
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    let el = $('#mob-fac .-mob-fac-rail')
    let hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = 0;
        var nav = $$('#mob-fac .info-tab');
        let max = nav.length;
        for(let b of nav){
            if (b.classList.contains('-active')) {
                break;
            }else{
                i++;
            }
        }
        

        let di = 0;
        if (ev.deltaX > 20) {
            di = -1;
        } else if (ev.deltaX < -20) {
            di = +1;
        }
        i = (((i+di)%max)+max)%max
        nav[i].click()

    })
</script>
<?php theme_overide_style($content) ?>