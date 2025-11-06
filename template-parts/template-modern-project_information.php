<?php
$content = $args[0];
$f = $args[1];
?>

<style type="text/css">
    #info {
        background-position: center;

    }

    #info .container.mx-auto {
        padding-top: 71px;
    }

    #info[data-active="1"] {
        background-image: url(<?= acf_img($content['progress_background']) ?>);
        background-position: center;
        background-size: cover;
    }

    .info-img {
        box-shadow: 0px 0px 10% 10% #0008;
    }

    #info-btn-group {
        display: grid;
        grid-template-columns: auto auto 1fr;
        gap: 16px;
    }

    #info-btn-group .info-btn {
        display: flex;
        gap: 8px;
        align-items: center;
        padding: 6px 24px;
        background: var(--mc-nav-btn-bg-ready);
        color: var(--mc-nav-btn-txt-ready);
        border-radius: 4px;
        width: 100%;
        height: 100%;
    }

    #info-btn-group .info-btn:hover {
        background-color: var(--mc-nav-btn-bg-hover);
        color: var(--mc-nav-btn-txt-hover);
    }

    #info-btn-group .info-btn img {
        height: 24px;
        width: auto;
    }

    #info-detail-wrap {
        /*height: 400px;
        overflow-y: auto;*/
        margin-bottom: 20px;
    }

    .info-detail-title {
        font-style: normal;
        font-weight: 400;
        font-size: 26px;
        line-height: 32px;
        color: var(--mc-main-4);
    }

    .info-detail-body {
        font-weight: 400;
        font-size: 22px;
        line-height: 28px;
        color: var(--mc-main-3);
    }

    #info-detail {
        margin-top: 32px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-column-gap: 40px;
        grid-row-gap: 50px;
    }

    .info-detail-block {
        display: grid;
        grid-template-columns: 40px auto;
        grid-column-gap: 16px;
        padding-left: 24px;
        position: relative;
    }

    .info-img {
        box-shadow: 0px 60px 40px -40px #0006;
        display: block;
    }

    .info-detail-block::before {
        content: " ";
        position: absolute;
        left: 0;
        top: 0;
        background: var(--mc-main-4);
        width: 4px;
        height: 40px;
    }

    .info-detail-icon img {
        height: 35px;
        width: auto;
    }

    .progress-show {
        display: grid;
        padding-top: 52px;
        gap: 32px;
    }

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        #info .container.mx-auto {
            padding-left: 2rem;
            padding-right: 2rem;
            padding-top: 43px;
        }

        #info-detail {
            grid-column-gap: 16px;
            grid-row-gap: 42px;
        }

        #info-btn-group {
            display: none;
        }

        #info .text-center h2 {
            font-weight: 400;
            font-size: 38px !important;
            line-height: 40px;
        }

        .info-detail-block {
            padding-left: 0;
            padding-top: 4px;
            display: flex;
            gap: 16px;
            flex-direction: column;
            position: relative;
            align-items: flex-start;
        }

        .info-detail-icon img {
            height: 30px;
            margin-left: 16px;
        }

        #info-detail-wrap {
            padding-top: 32px;
            height: 100%;
            overflow-y: visible;
            margin-bottom: 0;
        }

        #info-progress {
            height: 100% !important;
            overflow: visible !important;
        }

        .info-btn {
            width: 50%;
        }

        .detail-box::before {
            content: " ";
            position: absolute;
            left: 0;
            top: 0;
            background: #2F6861;
            width: 4px;
            height: 40px;
        }

        .progress-show .progress-item {
            grid-column: 2 span;
        }
    }
    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        #info .container.mx-auto {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>

<section id="info" class="section-fade is-on-nav is-on-nav-mob" data-active="">
    <div>
        <div class="container mx-auto">
            <div class="text-center">
                <h2 class=""><?php pll_e('ข้อมูลโครงการ')?></h2>
            </div>
            <sp style="height: 10px;"></sp>
            <style>
                #info .text-center h2 {
                    color: var(--mc-main-4);
                }

                #info .info-topic-tab {
                    color: var(--mc-tab-text-color);
                    cursor: pointer;
                    transition: .5s ease-in-out;
                }

                #info .info-topic-tab:hover {
                    color: var(--mc-tab-text-hover);
                    transition: .5s ease-in-out;
                }

                #info .info-topic-tab.-active {
                    color: var(--mc-tab-text-hover);
                    transition: .5s ease-in-out;
                }

                #info .info-topic-tab:after {
                    content: "•";
                    margin-left: 5px;
                    opacity: 0;
                    transition: .3s ease-in-out;
                }

                #info .info-topic-tab.-active:after {
                    content: "•";
                    opacity: 1;
                }

                #info #info-block[data-active="0"] {
                    display: none;
                }
            </style>
            <div class="flex items-center justify-center">
                <div class="info-topic flex flex-row gap-8 items-center text-center place-content-center relative py-3">
                    <h6 onclick="info_topic(0)" class="info-topic-tab">
                        <?php pll_e('รายละเอียด')?>
                    </h6>
                    <?php 
                    if ($content['hide-progress']=='show') {
                        ?>
                        <h6 onclick="info_topic(1)" class="info-topic-tab">
                            <?php pll_e('ความคืบหน้า')?>
                        </h6>
                        <?php
                    }
                    ?>
                </div>

            </div>
            <div class="center w-full" style="border-bottom: 1px solid #9FA5AB;"></div>
            <div class="info-inner">
                <style>
                    #info-block {
                        display: grid;
                        grid-template-columns: repeat(12, 1fr);
                        grid-template-rows: auto auto;
                        gap: 32px;
                        padding-top: 32px;
                        padding-bottom: 64px;

                    }

                    #info-block>div {
                        grid-column: 6 span;
                    }

                    #info-block #info-progress {
                        grid-column: 6 span;
                    }

                    #info-block #info-progress-images {
                        grid-column: 6 span;
                    }

                    #info-detail-block .info-detail-text {
                        color: #828A92;
                    }

                    @media (max-width : 1319px) {
                        #info-block {
                            display: grid;
                            grid-template-columns: repeat(6, 1fr);
                            gap: 4px;
                            padding-top: 16px;
                            padding-bottom: 56px;
                        }

                        #info-block #info-progress {
                            grid-row: 2/2;
                            grid-column: 6 span;
                        }

                        #info-block #info-progress-images {
                            grid-row: 1/2;
                            grid-column: 6 span;
                        }
                    }
                </style>
                <div id="info-block" class="" data-active="0">
                    <div class="">
                        <img src="<?= acf_img($content['information_image']) ?>" class="info-img">
                    </div>
                    <div class="">
                        <div id="info-detail-wrap">
                            <div>
                                <style>
                                    #info #info-detail-wrap::-webkit-scrollbar,
                                    #info #info-progress::-webkit-scrollbar {
                                        width: 8px;
                                    }

                                    #info #info-detail-wrap::-webkit-scrollbar-track,
                                    #info #info-progress::-webkit-scrollbar-track {
                                        background: #BFC4C8;
                                        border-radius: 10em;
                                    }

                                    #info #info-detail-wrap::-webkit-scrollbar-thumb,
                                    #info #info-progress::-webkit-scrollbar-thumb {
                                        background: #828A92;
                                        border-radius: 10em;
                                        height: 4rem;
                                    }
                                </style>
                                <div id="info-detail">
                                    <?php
                                    foreach ($content['details'] as $key => $value) {
                                        ?>
                                        <div class="info-detail-block">
                                            <div class="info-detail-icon">
                                                <img src="<?= acf_img($value['icon']) ?>">
                                            </div>
                                            <div class="info-detail-text">
                                                <h6 class="info-detail-title">
                                                    <?= $value['title'] ?>
                                                </h6>
                                                <div class="info-detail-body">
                                                    <?= $value['text'] ?>
                                                    <ul class="ml-6">
                                                        <?php
                                                        foreach ($value['bullet'] as $key => $v) {
                                                            ?>
                                                            <li class="list-disc"><?= $v['text'] ?></li>
                                                            <?php
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <style>
                                #info-btn-group-mob {
                                    padding-top: 40px;
                                    display: none;
                                    flex-direction: column;
                                    gap: 8px;
                                    align-items: center;
                                }

                                #info-btn-group-mob .info-btn {
                                    display: flex;
                                    gap: 8px;
                                    align-items: center;
                                    justify-content: center;
                                    padding: 6px 24px;
                                    background: var(--mc-nav-btn-bg-ready);
                                    color: var(--mc-nav-btn-txt-ready);
                                    border-radius: 4px;
                                    width: 75%;
                                    height: 100%;
                                }

                                @media (max-width: 1319px) {
                                    #info-btn-group-mob {
                                        display: flex;
                                    }
                                }
                            </style>
                            <div id="info-btn-group-mob" class="">
                                <?php if ($content['more_information']['url'] != '') : ?>
                                    <a  target="_blank" href="<?= $content['more_information']['url'] ?>" class="info-btn" target="_blank">
                                        <div>
                                            <img src="/wp-content/uploads/2023/03/Vector-3.png" alt="">
                                        </div>
                                        <div>
                                            <span><?php pll_e('ดาวน์โหลดโบรชัวร์')?></span>
                                        </div>
                                    </a>
                                <?php endif ?>
                                <?php if ($content['more_condition'] != '') : ?>
                                    <a  target="_blank" href="<?= $content['more_condition'][0]->guid ?>" target="_blank" class="info-btn">
                                        <div>
                                            <img src="/wp-content/uploads/2023/03/Information-1.png" alt="">
                                        </div>
                                        <div>
                                            <span><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></span>
                                        </div>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                        <style>

                        </style>
                        <div id="info-btn-group">
                            <?php if ($content['more_information']['url'] != '') : ?>
                                <a href="<?= $content['more_information']['url'] ?>" target="_blank" class="info-btn">
                                    <div>
                                        <img src="/wp-content/uploads/2023/03/Vector-3.png" alt="">
                                    </div>
                                    <div>
                                        <span><?php pll_e('ดาวน์โหลดโบรชัวร์')?></span>
                                    </div>
                                </a>
                            <?php endif ?>
                            <?php if ($content['more_condition'] != '') : ?>
                                <a href="<?= $content['more_condition'][0]->guid ?>" target="_blank" class="info-btn">
                                    <div>
                                        <img src="/wp-content/uploads/2023/03/Information-1.png" alt="">
                                    </div>
                                    <div>
                                        <span><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></span>
                                    </div>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div id="info-block" class="" data-active="0">
                    <style>
                        #info-progress {
                            height: 450px;
                            overflow: auto;

                        }

                        .progress-wrap {
                            padding-left: 80px;
                            max-height: 377px;
                            overflow: auto;
                        }

                        .progress-title-wrap {
                            display: flex;
                            justify-items: center;
                            align-items: center;
                            gap: 35px;
                        }

                        .progress-title {
                            width: 100%;
                        }

                        .progress-title h3 {
                            color: var(--mc-main-4);
                        }
                    </style>
                    <div id="info-progress" class="">
                        <div class="progress-title-wrap">
                            <div class="">
                                <style>
                                    .circle-progress {
                                        width: 168px;
                                        height: auto;
                                        stroke-linecap: round;
                                    }

                                    .circle-progress-value {
                                        stroke-width: 8px;
                                        stroke: var(--mc-main-4);
                                    }

                                    .circle-progress-circle {
                                        stroke-width: 5px;
                                        stroke: #D7D7D7;
                                    }

                                    .circle-progress-text {
                                        fill: var(--mc-main-4);
                                        font-size: 42px;
                                        font-weight: 400;
                                        line-height: 42px;
                                    }

                                    @media (max-width: 1319px) {
                                        .progress-title-wrap {
                                            gap: 12px;
                                        }

                                        .circle-progress {
                                            width: 108px;
                                        }
                                    }
                                </style>
                                <div class="main-progress"></div>
                            </div>
                            <div class="progress-title">
                                <h3><?php pll_e('ภาพรวม')?></h3>
                                <h6 class=""><?= $content['overall'] ?></h6>
                            </div>
                        </div>
                        <style type="text/css">
                            .progress-bar .-bar {
                                height: 8px;
                                width: 100%;
                                border-radius: 10em;
                                background: #D7D7D7;
                                display: block;
                            }

                            .progress-bar .-bar-inner {
                                height: 12px;
                                position: relative;
                                top: -2px;
                                width: calc(var(--pc)*1%);
                                background-color: var(--mc-main-4);
                                border-radius: 10em;
                                display: block;
                                transition: all 1s cubic-bezier(0.44, 0.67, 0.07, 0.91);
                            }

                            .progress-bar {
                                display: grid;
                                grid-template-columns: 10fr 2fr;
                                grid-column-gap: 0.5rem;
                                justify-content: center;
                                align-items: center;
                                line-height: 1rem;
                            }

                            .progress-bar .-percent {
                                color: #828A92;
                            }
                            .progress-bar .-percent{
                                text-align: right;
                            }
                        </style>
                        <?php 
                        $progress_size = 0;
                        if (is_array($content['progress_list'])) {
                            $progress_size = ofsize($content['progress_list']);
                        }
                        $img_size = 0;
                        if (is_array($content['image'])) {
                            $img_size = ofsize($content['image']);
                        }
                        ?>
                        <div class="progress-show <?= ($progress_size > 3) ? 'grid-cols-2' :  'grid-cols-1' ?>">
                            <?php foreach ($content['progress_list'] as $key => $value) : ?>
                                <div class="progress-item">
                                    <label><?= $value['name'] ?></label>
                                    <div class="progress-bar">
                                        <span class="-bar" data-percent="<?= $value['percent'] ?>" style="--pc:0"><span class="-bar-inner"></span></span>
                                        <span class="-percent"><?= $value['percent'] ?>%</span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <style>
                        #info-progress-images {
                            --i: 0;
                            --max: 3;
                        }

                        #info-progress-images .rail-images-wrap {
                            /* aspect-ratio: 640/392; */
                            overflow: hidden;
                            height: calc(100% - 48px);
                        }

                        #info-progress-images .rail-images {
                            display: flex;
                            height: 100%;
                            width: calc(100% * var(--max));
                            transform: translateX(calc(var(--i) * 100% / var(--max) * -1));
                            padding: 24px 0;
                            transition: .5s;
                        }

                        #info-progress-images .images-nav {
                            height: 48px;
                            display: grid;
                            grid-template-columns: auto auto 48px 48px;
                            gap: 8px;
                        }

                        #info-progress-images .images-nav .-counts {
                            text-align: right;
                            padding-right: 24px;
                        }

                        #info-progress-images .images-nav .-counts .-num-count {
                            font-size: 56px;
                            line-height: 56px;
                            color: var(--mc-main-4);
                        }

                        #info-progress-images .images-nav .-counts .-num-max {
                            font-size: 48px;
                            line-height: 48px;
                            color: #BFC4C8;
                        }

                        #info-progress-images .image-item {
                            width: 100%;
                            height: 100%;
                        }

                        #info-progress-images .image-item::after {
                            position: relative;
                            background-color: #0003;
                            background-position: center;
                            background-size: cover;
                            width: 100%;
                            height: 100%;
                        }

                        #info-progress-images .image-item-pic {
                            background-image: var(--img);
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            padding-top: 61.5%;
                        }

                        #info-progress-images .images-nav .-progress-arr {
                            width: 48px;
                            height: 48px;
                            border-radius: 4px;
                            background-color: var(--mc-main-1);
                            background-image: var(--mc-arrow-up);
                            background-size: 17px;
                            background-position: center;
                            background-repeat: no-repeat;
                            transform: rotateZ(-90deg);
                            cursor: pointer;
                            transition: .5s ease-in-out;
                        }

                        #info-progress-images .images-nav .-progress-arr:hover {

                            background-color: var(--mc-main-2);
                        }

                        #info-progress-images .images-nav .-progress-arr.-right {
                            transform: rotateZ(90deg);
                        }

                        #info-progress-images[data-end="1"] .images-nav .-progress-arr.-right {
                            opacity: 0.5;
                            pointer-events: none;
                        }

                        #info-progress-images[data-end="start"] .images-nav .-progress-arr.-left {
                            opacity: 0.5;
                            pointer-events: none;
                        }

                        @media (max-width: 1319px) {
                            #info-progress-images .rail-images {
                                padding: 0;
                                padding-bottom: 44px;
                            }

                            #info-progress-images .images-nav {
                                display: none;
                            }

                        }
                    </style>
                    <div id="info-progress-images" class="" style="--i:0; --max: <?= $img_size ?>">
                        <div class="rail-images-wrap">
                            <div class="rail-images">
                                <?php foreach ($content['image'] as $key => $value) : ?>
                                    <div class="image-item">
                                        <div class="image-item-pic" style="--img: url(<?= acf_img($value) ?>);"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="images-nav">
                            <div></div>
                            <div class="-counts">
                                <h2>
                                    <span class="-num-count"><?= sprintf('%02d', 1) ?></span>
                                    <span class=" -num-max">/<?= sprintf('%02d', $img_size) ?></span>
                                </h2>
                            </div>
                            <div onclick="info_images_nav(-1)" class="-progress-arr -left"></div>
                            <div onclick="info_images_nav(1)" class="-progress-arr -right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const cp = new CircleProgress('.main-progress', {
        max: 100,
        value: 0,
        textFormat: 'percent',
        animation: 'easeInOutCubic',
        animationDuration: 1200,
    });

    function info_topic(num) {
        let section = $('#info')
        let topic = $$('.info-topic-tab');
        let block = $$('#info-block')


        if ($('.info-topic-tab.-active') != null) {
            $('.info-topic-tab.-active').classList.remove('-active');
        }
        if ($('#info-block[data-active="1"]') != null) {
            $('#info-block[data-active="1"]').dataset.active = 0;
        }
        topic[num].classList.add('-active');
        block[num].dataset.active = 1;
        section.dataset.active = num;
        let bars = document.querySelectorAll('.progress-bar .-bar')
        if (num == 0) {
            cp.value = 0
        }
        if (num == 1) {
            cp.value = parseInt(<?= $content['percent'] ?>)
        }
        for (let bar of bars) {
            if (num == 1) {
                setTimeout(() => {
                    bar.style.setProperty('--pc', bar.dataset.percent)
                }, 100)
            } else {
                setTimeout(() => {
                    bar.style.setProperty('--pc', 0)
                }, 100)


                // if ($('.main-progress').hasChildNodes()) {
                //     $('.main-progress').removeChild($('.main-progress').lastChild)
                // }
                // $('.main-progress').removeChild($('.main-progress').firstElementChild)
            }

        }

    }
    info_topic(0);

    function info_images_nav(d) {
        let p = $("#info-progress-images")
        let now = parseInt(p.style.getPropertyValue("--i"))
        let max = parseInt(p.style.getPropertyValue("--max"))
        let i = (((now + d) % max) + max) % max
        if (i == max - 1) {
            p.dataset.end = '1'
        } else if (i == 0) {
            p.dataset.end = 'start'
        } else {
            p.dataset.end = '0'
        }
        info_images_select(i)
    }
    info_images_nav(0)

    function info_images_select(i) {
        let p = $('#info-progress-images')
        let c = $('.-counts .-num-count')
        p.style.setProperty('--i', i)

        i += 1
        c.innerHTML = i.toLocaleString(undefined, {
            minimumIntegerDigits: 2,
            useGrouping: false
        });
    }
</script>
<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    let el = $('#info .rail-images-wrap')
    let hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = 0;
        var nav = $$('.gallery-2-nav-dot');
        let max = nav.length;
        for(let b of nav){
            if (b.classList.contains('-active')) {
                break;
            }else{
                i++;
            }
        }
        xconsolex.log(i)
        xconsolex.log(max)

        let di = 0;
        if (ev.deltaX > 20) {
            di = -1;
        } else if (ev.deltaX < -20) {
            di = +1;
        }
        info_images_nav(di)

    })
</script>


<?php theme_overide_style($content) ?>