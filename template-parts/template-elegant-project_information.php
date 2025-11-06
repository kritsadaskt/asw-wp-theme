<?php
$content = $args[0];
$f = $args[1];
// pre($content);
?>

<!-- For Project Info section -->
<style type="text/css">
    .pro-info-topic .-text {
        color: var(--mc-tab-text-color);
        transition: .5s;
        cursor: pointer;
    }

    .pro-info-topic .-text:hover {
        color: var(--mc-tab-text-hover);
    }

    .long-hover {
        transition: .5s;
    }

    .long-hover:hover {
        filter: brightness(150%);
    }

    .pro-info-topic .-text.-active {
        color: var(--mc-tab-text-hover);
    }

    .project-info-section[data-show="1"] {
        display: grid;
        align-items: start;

    }

    .pj-info-tab-1 {
        margin: auto;
        grid-gap: 32px;
    }

    .project-info-section[data-show="0"] {
        display: none;
    }

    .alt-items {
        display: grid;
        grid-template-columns: 32px auto;
        grid-gap: 10px;
    }

    .info-detail-wrapper {
        /*height: 351px;
        overflow-y: auto;
        overflow-x: hidden;*/
    }

    #info .container {

        padding-top: 64px;

    }

    .project-info-inner {
      padding-bottom: 40px;
      background-size: cover;
      background-position: top;
  }

  .list-disc li::before {
    content: "";
    background-image: url("/wp-content/uploads/2023/03/list_checked.png");
    width: 15px;
    height: 15px;
    display: inline-flex;
    background-size: cover;
    margin-right: 8px;
}

.info-btn-wraper {
    margin-top: 24px;
}

.info-progress-show::-webkit-scrollbar {
    width: 8px;
}

.info-progress-show::-webkit-scrollbar-thumb {
    background-color: #323A41;
    border-radius: 8px;
    height: 10px;
}

.info-detail-wrapper::-webkit-scrollbar {
    width: 8px;
}

.info-detail-wrapper::-webkit-scrollbar-thumb {
    background: #323A41;
    border-radius: 8px;
}
</style>

<!--=== The Section Boxes : project-info ===-->
<section id="info" class="is-on-nav is-on-nav-mob">
    <div class="project-info-inner" style="background-image:url('<?= $content['bg_img']['sizes']['1536x1536'] ?>');">
        <div class="container mx-auto section-fade" style="">
            <div class="text-center">
                <h1 class="title-info"><?php pll_e('ข้อมูลโครงการ')?></h1>
            </div>
            <sp style="height: 30px;"></sp>
            <div class="flex items-center justify-center">
                <style>
                    #info .pro-info-topic {
                        /* padding: 0px 32px; */
                        display: flex;
                        align-items: center;
                        padding-bottom: 6px;
                        border-bottom: 1px solid var(--ci-grey-300);
                    }

                    #info .project-info-nav {
                        padding: 0 32px;
                    }
                </style>
                <div id="project-info-nav-wrap" class="pro-info-topic relative">
                    <div class="-text -active project-info-nav" onclick="change_another_projectInfo(0, this)">
                        <?php pll_e('รายละเอียด')?>
                    </div>
                    <?php 
                    if ($content['hide-progress']=='show') {
                        ?>
                        <div class="-line" style="top: 0;"></div>
                        <div class="-text project-info-nav" onclick="change_another_projectInfo(1, this)">
                            <?php pll_e('ความคืบหน้า')?>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="project-detail-underline" class="absolute"
                    style="bottom: -1px;left: 0;width: 0px;height: 2px;background: var(--mc-gd);"></div>
                </div>
            </div>
            <div class="grid grid-cols-12 py-10 project-info-section pj-info-tab-1" data-show="1">
                <div class="col-span-12">
                    <div class="info-mob-img">
                        <img src="<?= $content['information_image']['sizes']['1536x1536'] ?>">
                    </div>
                </div>
                <div class="col-span-6 info-alt-items">
                    <div class="grid grid-cols-12 info-detail-wrapper">
                        <?php
                        foreach ($content['details'] as $key => $value) {
                            ?>
                            <div class="col-span-6 pb-10 alt-items ">
                                <div>
                                    <img class="alt-items-img" src="<?= $value['icon']['url'] ?>"
                                    style="width: auto;height: 32px;">
                                </div>
                                <div>
                                    <p class=""
                                    style="font-weight: 400;font-size: 24px;line-height: 32px; color: var(--mc-main-3)">
                                    <?= $value['title'] ?></p>
                                    <p style="color: var(--text-color)">
                                        <?= $value['text'] ?>
                                    </p>
                                    <ul class="list-disc">
                                        <?php
                                        foreach ($value['bullet'] as $key => $v) {
                                            ?>
                                            <li style="color: var(--text-color)">
                                                <?= $v['text'] ?>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="info-btn-wraper">
                        <?php if ($content['more_information']['url'] != ''): ?>
                            <a  target="_blank" href="<?= $content['more_information']['url'] ?>"
                                class="inline-block xl:mr-1" target="_blank">
                                <div
                                class="long-hover px-5 text-white text-center py-1 pointer flex flex-row items-center justify-center file-button">
                                <img src="/wp-content/uploads/2023/02/Download.png"
                                style="width: 24px;height: 24px;margin:0;margin-right: 8px;">ดาวน์โหลดเพิ่มเติม
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($content['more_condition'] != ''): ?>
                        <a  target="_blank" href=" <?= $content['more_condition'][0]->guid ?>" class="inline-block"
                            target="_blank">
                            <div
                            class="long-hover px-5 text-white text-center py-1 pointer flex flex-row items-center justify-center file-button">
                            <img src="/wp-content/uploads/2023/02/Information.png"
                            style="width: 24px;height: 24px;margin:0;margin-right: 8px;">
                            <?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?>
                        </div>
                    </a>
                <?php endif ?>
            </div>
        </div>
        <div class="col-span-6 info-1-img">
            <img src="<?= $content['information_image']['sizes']['1536x1536'] ?>">
        </div>
    </div>
    <style type="text/css">
        /*Progress*/
        .progress-wrap {
            padding-left: 80px;
            max-height: 377px;
            overflow: auto;
        }

        .file-button {
            background-color: var(--mc-main-1);
            width: auto;
        }

        .progress-title-wrap {
            display: flex;
            justify-items: center;
            gap: 35px;
        }

        .progress-title {
            width: 100%;
        }

        .progress-show {
            padding-top: 52px;
        }

        .circle-progress-value {
            stroke-width: 6px;
            stroke: var(--mc-main-2);
        }

        .circle-progress-circle {
            stroke-width: 6px;
            stroke: #FFEFD82d;
        }

        .circle-progress-text {
            fill: var(--mc-main-3);
            font-size: 30px;
            font-weight: 500;
            line-height: 32px;
        }

        .info-mob-img {
            display: none;
        }

        .info-progress-show {
            height: 420px;
            overflow-y: scroll;
            align-items: center;
            margin-right: 50px
        }

        /*-- Mobile Version --*/
        @media (max-width: 1024px) {
            .info-1-img {
                display: none;
            }

            .info-alt-items {
                grid-column: 1 / span 12;
                padding: 0px 1rem 0;
            }

            .project-info-section {
                padding-top: 0;
            }

            .info-btn-wraper {
                text-align: center;
            }

            .info-mob-img {
                display: block;
                padding-top: 20px;
            }

            .info-progress-show {
                height: auto;
                overflow-y: hidden;
            }

        }
        @media (max-width: 1024px) {
            .project-info-section {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }
    </style>
    <style>
        .progress-bar .-bar {
            height: 4px;
            width: 100%;
            background: #323A41;
            display: block;
        }

        .pj-info-tab-2 {
            padding-bottom: 130px;
            padding-top: 40px;
        }

        .progress-bar .-bar-inner {
            height: 4px;
            width: calc(var(--pc)*1%);
            background: var(--mc-gd);
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

        .project-info-section {
            grid-template-columns: repeat(12, minmax(0, 1fr));
        }

        #project-detail-underline {
            transition: all .3s;
        }

        .title-info {
            color: var(--mc-main-3);
        }

        /*-- Mobile Version --*/
        @media (max-width: 1024px) {
            .project-info-section {
                padding: 0 2rem;
            }

            .facility-main-wrap {
                padding-top: 0 !important;
            }

            .pj-info-tab-2 {
                color: #fff;
                padding-bottom: 82px;
            }

            .progress-sum-subtitle {
                color: var(--text-color);
            }

            .-pg-img {
                width: 100%;
                padding-top: 65.25%;
                background-size: cover;
                background-position: center;
            }

            .file-button {
               width: 15rem; 
               margin-bottom: 8px;
           }

           .title-info {
            font-size: 38px !important;
            line-height: 40px;
            padding-top: 43px;
        }

        #info .container {
            padding-top: 0;
        }
    }
</style>
<div class="project-info-section pj-info-tab-2" data-show="0">
    <div class="info-progress-show col-span-6 grid gap-x-8 gap-y-10 grid-cols-12">
        <div class="info-progress-summary-chart col-span-2">
            <div class="main-progress"></div>
        </div>
        <div class="info-progress-summary-body col-span-10 mx-2">
            <h3 class="progress-sum-title"><?php pll_e('ภาพรวม')?></h3>
            <h6 class="progress-sum-subtitle">
                <?= $content['overall'] ?>
            </h6>
        </div>
        <?php
        $progress_size = 0;
        if (is_array($content['progress_list'])) {
            $progress_size = ofsize($content['progress_list']);
        }
        if ($progress_size > 3) {
            foreach ($content['progress_list'] as $key => $value) {
                ?>
                <div class="progress-item col-span-6">
                    <label>
                        <?= $value['name'] ?>
                    </label>
                    <div class="progress-bar">
                        <span class="-bar" data-percent="<?= $value['percent'] ?>" style="--pc:0"><span
                            class="-bar-inner"></span></span>
                            <span class="-percent">
                                <?= $value['percent'] ?>%
                            </span>
                        </div>
                    </div>
                    <?php
                }
            }
            if ($progress_size <= 3) {
                foreach ($content['progress_list'] as $key => $value) {
                    ?>
                    <div class="progress-item col-span-12">
                        <label>
                            <?= $value['name'] ?>
                        </label>
                        <div class="progress-bar">
                            <span class="-bar" data-percent="<?= $value['percent'] ?>" style="--pc:0"><span
                                class="-bar-inner"></span></span>
                                <span class="-percent">
                                    <?= $value['percent'] ?>%
                                </span>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
            <style type="text/css">
                .pg-slide-wrap {
                    width: 100%;
                    overflow: hidden;
                    position: relative;
                }

                .pg-slide-rail {
                    display: flex;
                    width: max-content;
                }

                .pg-slide-rail {
                    display: flex;
                    width: calc(var(--max) * 100%);
                    transition: all .5s ease-in-out;
                    transform: translateX(calc(var(--i) * (-100% / var(--max))));
                }

                .-pg-img-box {
                    width: 100%;
                }

                .pg-slide-arrow {
                    width: 100%;
                    height: 100%;
                    position: absolute;
                    top: 0;
                    left: 0;
                }

                .pg-slide-box {
                    position: relative;
                }

                .pg-slide-arrow>div {
                    width: 48px;
                    height: 48px;
                    background-color: #0005;
                    position: absolute;
                    top: calc(50% - 24px - 16px);
                    border-radius: 100%;
                    background-image: var(--mc-arrow-up);
                    background-size: contain;
                    background-position: center;
                    background-repeat: no-repeat;
                    cursor: pointer;
                }

                .pg-slide-arrow .-l {
                    left: -24px;
                    transform: rotate(-90deg);
                }

                .pg-slide-arrow .-r {
                    right: -24px;
                    transform: rotate(90deg);
                }

                #info .-pg-img {
                    aspect-ratio: 16/9;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }

                #info .progress-sum-title,
                #info .progress-item {
                    color: var(--mc-main-3);
                }

                #info .progress-sum-subtitle {
                    color: var(--text-color);
                }

                .project-info-section .-nav-wrap {
                    display: inline-flex;
                    justify-content: end;
                    align-items: center;
                    width: 100%;
                    margin-top: 30px;
                    position: relative;
                }

                .project-info-section .-nav-wrap .-nav {
                    width: 40px;
                    height: 16px;
                    display: flex;
                    align-items: center;
                    margin: 0 3px;
                    cursor: pointer;
                    transition: .75s;
                }

                .project-info-section .-nav-wrap .-nav div {
                    width: 100%;
                    height: 2px;
                    background: linear-gradient(121.54deg, var(--ci-grey-600) -8.39%, var(--ci-grey-600) 70.92%);
                    transition: .75s;
                }

                .project-info-section .-nav-wrap .-nav.-active div {
                    height: 4px;
                    background: var(--mc-gd);
                    transition: .75s;
                }

                #info .pg-slide-box[data-i="0"] .pg-slide-arrow .-l {
                    opacity: 0.5;
                    pointer-events: none;
                }

                #info .pg-slide-box[data-end="1"] .pg-slide-arrow .-r {
                    opacity: 0.5;
                    pointer-events: none;
                }

                /*-- Mobile Version --*/
                @media (max-width: 1024px) {
                    .info-detail-wrapper {
                        height: auto;
                    }

                    .alt-items {
                        display: block
                    }

                    .alt-items-img {
                        margin-left: 0;
                        margin-bottom: 12px;
                    }

                    .pj-info-tab-2 {
                        padding-top: 20px;
                    }

                    .info-progress-show {
                        grid-column: 1 / span 12;
                        padding: 0 1rem;
                    }

                    .info-progress-summary-chart {
                        grid-column: span 4 / span 4;
                    }

                    .info-progress-summary-body {
                        grid-column: 5 / span 8;
                        margin: 0;
                    }

                    .main-progress svg {
                        width: 100%;
                    }

                    .pg-slide-box {
                        position: relative;
                        grid-column: span 12 / span 12;
                        padding: 0;
                        /*padding: ;*/
                    }

                    .pg-slide-arrow {
                        width: calc(100% - 4rem);
                        left: 2rem;
                        display: none;
                    }

                    .info-detail-wrapper::-webkit-scrollbar {
                        width: 0px;
                    }

                    .project-info-section {
                        grid-template-rows: auto auto;
                        grid-row-gap: 56px;
                    }

                    .info-progress-show {
                        grid-row: 2 / span 1;
                        margin: 0 1rem;
                        padding: 0;
                        overflow: hidden;
                    }

                    .progress-item {
                        grid-column: 1 / span 12;
                    }

                    .pg-slide-rail {
                        width: calc(var(--max) * 90%);
                        margin-left: 1rem;
                    }

                    .-pg-img-box {
                        padding-right: 8px;
                    }

                    .project-info-section .-nav-wrap {
                        justify-content: center;
                    }
                    .progress-bar .-percent {
                        text-align: right;
                    }

                }
                /*-- Mobile Version --*/
                @media (max-width: 767px) {
                    .project-info-section{
                        padding-left:1rem ;
                        padding-right:1rem ;
                    }
                }
            </style>
            <?php
            if (is_array($content['image'])) {
                $slide_max = ofsize($content['image']);
            } else {
                $slide_max = 0;
            }
            ?>
            <div class="col-span-6 pg-slide-box">
                <div class="pg-slide-wrap">
                    <div class="pg-slide-rail" style="--max:<?= $slide_max ?>;--i:0">
                        <?php
                        foreach ($content['image'] as $key => $v) {
                            ?>
                            <div class="-pg-img-box">
                                <div class="-pg-img" style="background-image:url('<?= acf_img($v) ?>')"></div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="pg-slide-arrow">
                    <div class="-l" onclick="pg_slide_nav(-1)"></div>
                    <div class="-r" onclick="pg_slide_nav(1)"></div>
                </div>
                <div class="-nav-wrap">
                    <?php
                    foreach ($content['image'] as $key => $v) {
                        ?>
                        <div class="idea-nav -nav <?= ($key == 0) ? '-active' : '' ?> "
                            onclick="pg_slide_to(<?= $key ?>)">
                            <div></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <script type="text/javascript">
                function pg_slide_to(i) {
                    $('.pg-slide-rail').style.setProperty('--i', i)

                    if ($('.project-info-section .idea-nav.-nav.-active') != null) {
                        $('.project-info-section .idea-nav.-nav.-active').classList.remove('-active')
                    }
                    $$('.project-info-section .idea-nav.-nav')[i].classList.add('-active')
                }

                function pg_slide_nav(d) {
                    let now = parseInt($('.pg-slide-rail').style.getPropertyValue('--i'))
                    let max = parseInt($('.pg-slide-rail').style.getPropertyValue('--max'))
                    let i = (((now + d) % max) + max) % max
                    $('.pg-slide-box').dataset.i = i
                    xconsolex.log(max)
                    xconsolex.log(i)
                    if (i == max - 1) {
                        $('.pg-slide-box').dataset.end = '1'
                    } else {
                        $('.pg-slide-box').dataset.end = '0'
                    }
                    pg_slide_to(i)
                }
                pg_slide_nav(0)
            </script>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
    const cp = new CircleProgress('.main-progress', {
        max: 100,
        value: 0,
        textFormat: 'percent',
        animation: 'easeInOutCubic',
        animationDuration: 1200,
    });

    function change_another_projectInfo(num, ele) {
        xconsolex.log('ele', ele.clientWidth)
        for (let e of document.getElementsByClassName('project-info-nav')) {
            e.classList.remove("-active")
        }
        ele.classList.add("-active")
        let projects_info = document.getElementsByClassName('project-info-section')
        for (let project of projects_info) {
            project.dataset.show = 0
        }
        projects_info[num].dataset.show = 1
        if (num == 1) {
            document.getElementById('project-detail-underline').style.left = $$('#info .project-info-nav')[num - 1]
            .clientWidth + 2 + 'px'
            document.getElementById('project-detail-underline').style.width = ele.clientWidth + 'px'

        } else {
            document.getElementById('project-detail-underline').style.left = 0 + 'px'
            document.getElementById('project-detail-underline').style.width = ele.clientWidth + 'px'
        }
        let bars = document.querySelectorAll('.progress-bar .-bar')
        if (num == 0) {
            cp.value = 0
        }
        if (num == 1) {
            cp.value = parseInt(<?= $content['percent'] ?>)
        }
        for (let bar of bars) {
            xconsolex.log(bar)
            if (num == 1) {
                setTimeout(() => {
                    bar.style.setProperty('--pc', bar.dataset.percent)
                }, 100)

            } else {
                setTimeout(() => {
                    bar.style.setProperty('--pc', 0)
                }, 100)
            }

        }
        // let fac_block = document.getElementsByClassName("facility_alt-blocks")
        // for (let i = 0; i < fac_block.length; i++) {
        // 	fac_block[i].style.display = "none"
        // }
        // fac_block[num].style.display = "grid"
    }
    $$('#info .project-info-nav')[0].click();
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    let el = $('.pg-slide-rail')
    let hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = 0;
        var nav = $$('.pg-slide-box .idea-nav');
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
        i = (((i+di)%max)+max)%max
        xconsolex.log('new i',i)
        nav[i].click()

    })
</script>
<?php theme_overide_style($content) ?>