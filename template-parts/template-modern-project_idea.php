<?php
$content = $args[0];
$f = $args[1];
$concept_max = ofsize($content['idea']);
?>
<style>
    .p-concept {
        padding-top: 119px;
    }

    .p-text-concept-1 {
        padding-top: 46px;
    }

    .p-page-concept {
        padding-top: 74px;
    }

    .bg-number-concept {
        position: absolute;
        top: 0;
        left: -23%;
        font-size: 432px;
        font-weight: 900;
        line-height: calc(432px / 2);
        opacity: 0.06;
    }

    .abs-group-btn {
        position: absolute;
        bottom: 4rem;
        left: -9rem;
    }

    .btn-center {
        position: absolute;
        left: 20.5px;
        top: 16px;
        width: 8.5px;
        height: 17px;
    }

    .btn-concept {
        display: inline-block;
        position: relative;
    }

    .mock-1 {
        position: absolute;
        top: 72px;
        left: 35vw;
    }

    .concept-num-block {
        background: var(--mc-main-4);
    }

    .p-concept {
        color: var(--mc-main-5);
    }

    .p-page-concept {
        color: #fff4;
    }

    .img-shadow {
        box-shadow: 0px 60px 40px -40px #0003;
    }

    /*-- Mobile Version --*/
    @media (max-width: 1280px) {
        .p-text-concept-1 {
            font-size: 28px;
            line-height: 32px;
            font-weight: 500;
        }

        .concept-detail {
            font-size: 22px;
            line-height: 28px;
            font-weight: 400;
        }

        .p-concept {
            padding-top: 43px;
            padding-bottom: 10px;
            font-weight: 400;
            font-size: 38px !important;
            line-height: 40px;
        }

        .p-page-concept {
            padding-top: 25px;
        }

        .concept-content-body {
            color: var(--text-color);
            margin-top: 20px;
            height: calc(26.4px * 8);
/*            height: 5lh;*/
            /*text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;*/
            overflow: visible;
        }
    }

    #concept_parent {
        --mg: calc((100vw - 1280px) / 2);
        --i: 0;
        --max: 1;
        --a-block: calc(100% / var(--max));
    }

    #concept {
        background-size: cover;
        background-position: center;
    }

    .concept-d {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
    }

    .concept-d-content {
        grid-column: span 4;
    }

    .concept-d-images {
        grid-column: span 8;
        overflow: hidden;
        padding-bottom: 72px;
        padding-top: 72px;
    }

    .concept-d .-content-body-wrap {
        position: relative;
        width: 100%;
        height: calc(100% - 56px - 72px);
        padding-top: 72px;
    }

    .concept-d .-content-body {
        width: 100%;
        padding-top: 120px;
        padding-left: var(--mg);
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .5s ease-in-out;
        pointer-events: none;
        padding-right: 1rem;
        max-height: 100%;
        padding-bottom: 1rem;
        overflow: hidden;
    }

    .concept-d .-content-body .-title {
        position: relative;
        color: var(--mc-main-5);
    }

    .concept-d .-content-body .-subtitle {
        padding-top: 46px;
        position: relative;
        color: var(--text-color);
    }

    .concept-d .-content-body .-text {
        padding-top: 16px;
        position: relative;
        color: var(--text-color);
    }

    .concept-d .-cmd-wrap {
        height: 56px;
    }

    .concept-d .-content-body .-num {
        position: absolute;
        font-weight: 900;
        font-size: 432px;
        color: #fff;
        opacity: .06;
        top: 0;
        left: -2rem;
        line-height: .5em;
    }

    .-content-body[data-active="1"] {
        opacity: 1;
    }

    .-d-images-rail {
        display: grid;
        width: calc(75% * var(--max));
        height: 100%;
        grid-template-columns: repeat(var(--max), 1fr);
        transition: all .8s ease-in-out;
        transform: translateX(calc(var(--a-block) * var(--i) * -1));
    }

    .-d-images-item {
        width: 100%;
        height: 100%;
    }

    .-d-images-item-pic {
        width: 100%;
/*        padding-top: 70.78%;*/
        background-color: #0002;
        box-shadow: 0px 60px 40px -40px #0006;
        background-image: var(--img);
        background-size: cover;
        background-position: center;
        position: relative;
        transition: all .5s ease-in-out;
    }

    .-d-images-item-pic::after {
        content: " ";
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: #202831;
        opacity: .7;
        position: absolute;
        transition: all .5s ease-in-out;
    }

    .-d-images-item-pic {
        transform: scale(.75) translateX(-16.75%);
        left: 32px;
        position: relative;
    }

    .-d-images-item[data-active="1"] .-d-images-item-pic {
        transform: scale(1);
        left: 0;
    }

    .-d-images-item[data-active="1"] .-d-images-item-pic::after {
        opacity: 0;
    }

    .concept-mob-body {
        padding-top: 20px;
        --item-n: 70vw;
        --item-a: 90vw;
        position: relative;
    }


    .concept-mob-body .-pic-wrap {
        width: 100%;
        transform: translateX(0);
        will-change: transform;
        transition: transform .5s ease-in-out;
    }

    #concept_parent[data-end="1"] .-pic-wrap {
        transform: translateX(calc(10vw - 16px - 1.5rem));
    }

    .concept-mob-body .-pic-rail {
        --x: calc(var(--i) * -1 * (var(--item-n) - 0.5rem));
        display: flex;
        width: max-content;
        transform: translateX(var(--x));
        will-change: transform;
        transition: transform .4s ease-in-out;
        align-items: center;
        padding-left: 8px;
    }

    .concept-mob-body .-pic-item {
        transition: all .5s ease-in-out;
        width: var(--item-n);
        padding: 0 4px;
    }

    .concept-mob-body .-pic-item.-active {
        width: var(--item-a);
    }



    [data-max="1"] .concept-mob-body .-pic-rail {
        width: 100%;
        transform: translateX(0) !important;
        padding: 0 1rem;
    }
    [data-max="1"] .-title-rail{
        transform: translateX(0) !important;
    }
    [data-max="1"] .-pic-item.-max-h{
        display: none;
    }
    [data-max="1"] .-cmd-num-mob h2 {
        display: none;
    }
    [data-max="1"][data-end="1"] .-pic-wrap{
        transform: translateX(0) !important;
    }
    [data-max="1"] .concept-mob-body .-pic-item.-active{
        width: 100%;
        padding: 0;
    }
    [data-max="1"] .concept-mob-body .-title-wrap{
        padding-left: 1rem;
    }
    [data-max="1"] .-node-rail {
        transform: translateX(0) !important;
    }
    /*-- Mobile Version --*/
    @media (min-width: 451px) {
        [data-max="1"] .concept-mob-body .-pic-rail{
            padding: 0 2rem;
        }
    }



    .concept-mob-body .-p {
/*        aspect-ratio: 16 / 9;*/
width: 100%;
background-size: cover;
overflow: hidden;
cursor: pointer;
}

.-pic-item.-max-h {
    width: var(--item-a);
    opacity: 0;
}

.-node-wrap {
    width: 100%;
    transform: translateX(0);
    will-change: transform;
    transition: transform .5s ease-in-out;
}

.-node-rail {
    --x: calc(var(--i) * -1 * var(--item-n));
    display: flex;
    width: max-content;
    transform: translateX(var(--x));
    will-change: transform;
    transition: transform .4s ease-in-out;
    align-items: center;
}

.-node-item {
    color: #fff;
    transition: all .5s ease-in-out;
    width: var(--item-n);
    overflow: hidden;
}

.-node-item.-active {
    width: calc(100vw - 32px);
    width: 100vw;
}

.-node-item .concept-content-title {
    font-size: 36px;
    line-height: 40px;
    padding-top: 22px;
    margin-bottom: 12px;
}

.-node-item .concept-content-subtitle {
    color: var(--text-color);
    font-size: 28px;
    line-height: 32px;
}

/* title-rail */

.-title-wrap {
    width: 100%;
    transform: translateX(0);
    will-change: transform;
    transition: transform .5s ease-in-out;
}

.-title-rail {
    --x: calc(var(--i) * -1 * (var(--item-n) - 0.5rem));
    display: flex;
    width: max-content;
    transform: translateX(var(--x));
    will-change: transform;
    transition: transform .5s ease-in-out;
    align-items: center;
}

.-title-item {
    color: #fff;
    transition: all .5s ease-in-out;
    width: var(--item-n);
    overflow: hidden;
}

.-title-item.-active {
    width: calc(100vw - 32px);
    width: 100vw;
}

.concept-mob-body .-title-body {
    width: calc(100vw - 32px);
    margin: auto;
}

/* title-rail */

.concept-mob-body .-nav-wrap {
    display: inline-flex;
    height: 48px;
    margin-top: 0px;
    margin-bottom: 24px;
    justify-content: center;
    align-items: center;
    width: 100%;
    position: relative;
}

.concept-mob-body .-node-body {
    padding-top: 20px;
    width: calc(100vw - 64px);
    margin: auto;
}
/*-- Mobile Version --*/
@media (max-width: 767px) {
    .concept-mob-body .-node-body {
        width: calc(100vw - 32px);
    }
}

.-cmd-num-mob {
    text-align: right;
    padding: 22px 16px;
    padding-bottom: 60px;

}

.-cmd-num-mob .-cmd-num-count {
    color: var(--text-color);
    font-size: 38px;
    line-height: 40px;
}

.-cmd-num-mob .-cmd-num-max {
    color: var(--text-color);
    font-size: 36px;
    line-height: 40px;
}
.concept-mob-body .-title-wrap{
    padding-left: 2rem;
    padding-right: 1rem;
}

[data-max="1"] .-cmd-wrap {
    display: none;
}
</style>
<div id="concept_parent" data-end="0" data-i="0" data-max="<?= $concept_max ?>" style="--i:0;--max:<?= $concept_max ?>">
    <section id="concept" class="section-fade is-on-nav-mob xl:hidden concept-num-block">
        <div>
            <div>
                <span class="text-white bg-number-concept">01</span>
                <div class="-px-4">
                    <!-- <h1 class=" p-concept text-center">แนวคิดโครงการ</h1> -->

                    <div class="concept-mob-body">
                        <div class="-title-wrap">
                            <div class="-title-rail">
                                <?php
                                for ($i = 0; $i < $concept_max; $i++) {
                                    ?>
                                    <div data-i="<?= $i ?>" class="-title-item">
                                        <h1 class="container mx-auto" style="color: var(--mc-main-5);">
                                            <?= $content['idea'][$i]['title'] ?>
                                        </h1>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="-pic-wrap">
                            <div class="-pic-rail">
                                <?php
                                for ($i = 0; $i < $concept_max; $i++) {
                                    $mob_bg = $content['idea'][$i]['background_image_mobile']['sizes']['large'];
                                    if ($mob_bg == '') {
                                        $mob_bg = $content['idea'][$i]['background_image']['sizes']['large'];
                                    }
                                    ?>
                                    <div data-i="<?= $i ?>" class="-pic-item">
                                        <!-- <div style="background-image:url('<?= $mob_bg ?>')" class="-p" onclick="conceptMobile_change(<?= $i ?>)"></div> -->
                                        <img src="<?=$mob_bg?>" class="-p" onclick="conceptMobile_change(<?= $i ?>)">
                                    </div>
                                    <?php
                                }
                                ?>
                                <div data-i="<?= $i ?>" class="-pic-item -max-h">
                                    <div class="-p"></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let el = $('.concept-mob-body')
                            let start
                            let end
                            el.addEventListener('touchstart', (event) => {
                                // xconsolex.log('start : ', event.changedTouches[0].clientX)
                                start = event.changedTouches[0].clientX;
                            })

                            el.addEventListener('touchend', (event) => {

                                // xconsolex.log('end : ', event.changedTouches[0].clientX)
                                end = event.changedTouches[0].clientX;
                                xconsolex.log(start - end)
                                // slide = 'right'
                                if (start - end > 80 && start - end > -80) {
                                    concept_nav(1)
                                } else if (start - end < 80 && start - end < -80) {
                                    concept_nav(-1)
                                }
                                // xconsolex.log(slide)
                            })
                        </script>
                        <div class="-node-wrap">
                            <div class="-node-rail">
                                <?php
                                for ($i = 0; $i < $concept_max; $i++) {
                                    ?>
                                    <div data-i="<?= $i ?>" class="-node-item">
                                        <div class="-node-body">
                                            <h5 class="concept-content-subtitle">
                                                <?= $content['idea'][$i]['sub_title'] ?>
                                            </h5>
                                            <p class="concept-content-body">
                                                <?= $content['idea'][$i]['description'] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="-cmd-num-mob">
                            <h2>
                                <span class="-cmd-num-count">
                                    <?= sprintf('%02d', 1) ?>
                                </span>
                                <span class="-cmd-num-max">/
                                    <?= sprintf('%02d', ofsize($content['idea'])) ?>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="concept" class="section-fade hidden xl:block  is-on-nav concept-num-block ">
            <div>

                <div class="concept-d">
                    <div class="concept-d-content">
                        <div class="-content-body-wrap">
                            <?php foreach ($content['idea'] as $key => $value): ?>
                                <div class="-content-body" data-active="<?= ($key == 0) ? '1' : '' ?>">
                                    <div class="-num">
                                        <?= sprintf('%02d', $key + 1) ?>
                                    </div>
                                    <h1 class="-title">
                                        <?= $value['title'] ?>
                                    </h1>
                                    <h2 class="-subtitle">
                                        <?= $value['sub_title'] ?>
                                    </h2>
                                    <div class="-text">
                                        <?= $value['description'] ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <style>
                            .-cmd-wrap {
                                display: grid;
                                grid-template-columns: auto 48px 48px;
                                gap: 8px;
                                padding-left: var(--mg);
                                padding-right: 40px;
                            }

                            .-cmd-num {}

                            .-cmd-num .-cmd-num-count {
                                color: var(--text-color);
                                font-size: 56px;
                                line-height: 56px;
                            }

                            .-cmd-num .-cmd-num-max {
                                color: var(--mc-main-3);
                                font-size: 48px;
                                line-height: 48px;
                            }

                            .-cmd-arrow {
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

                            .-cmd-arrow:hover {
                                background-color: var(--mc-main-2);
                            }

                            .-cmd-arrow.-right {
                                transform: rotateZ(90deg);
                            }
                        </style>
                        <div class="-cmd-wrap">
                            <div class="-cmd-num">
                                <h2>
                                    <span class="-cmd-num-count">
                                        <?= sprintf('%02d', 1) ?>
                                    </span>
                                    <span class="-cmd-num-max">/
                                        <?= sprintf('%02d', ofsize($content['idea'])) ?>
                                    </span>
                                </h2>
                            </div>
                            <div onclick="concept_nav(-1)" class="-cmd-arrow">
                            </div>
                            <div onclick="concept_nav(1)" class="-cmd-arrow -right">
                            </div>
                        </div>
                    </div>
                    <div class="concept-d-images">
                        <div class="-d-images-rail">
                            <?php foreach ($content['idea'] as $key => $value):
                                ?>
                                <div class="-d-images-item" data-active="<?= ($key == 0) ? '1' : '0' ?>">
                                    <div class="-d-images-item-pic"
                                    style="--img:url('<?= acf_img($value['background_image']) ?>')">
                                        <img src="<?= acf_img($value['background_image']) ?>" class="w-full">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function concept_nav(d) {
            let p = $("#concept_parent")
            let now = parseInt(p.style.getPropertyValue("--i"))
            let max = parseInt(p.style.getPropertyValue("--max"))
            let i = (((now + d) % max) + max) % max
            concept_select(i)
            conceptMobile_change(i)
        }
        concept_select(0)

        function concept_select(i) {
            let p = $("#concept_parent")
            let c = $(".-cmd-num .-cmd-num-count")
            p.style.setProperty('--i', i);
            let img_items = $$('.-d-images-item')
            let txt_items = $$('.concept-d-content .-content-body')
            for (let i of img_items) {
                i.dataset.active = 0
            }
            for (let i of txt_items) {
                i.dataset.active = 0
            }
            img_items[i].dataset.active = 1
            txt_items[i].dataset.active = 1

            i += 1
            c.innerHTML = i.toLocaleString(undefined, {
                minimumIntegerDigits: 2,
                useGrouping: false
            });

        }

        function conceptMobile_change(next) {
            let el = $("#concept_parent")
            let count = $(".bg-number-concept")
            let count_nav = $(".-cmd-num-mob .-cmd-num-count")
            let pic_items = $$('.concept-mob-body .-pic-item')
            let node_items = $$('.concept-mob-body .-node-item')
            let title_items = $$('.concept-mob-body .-title-item')
        // let dot_items = $$('.concept-mob-body .concept-nav-dot')
            let max = parseInt(el.dataset.max)
            el.dataset.i = next
            el.style.setProperty('--i', next)

            let pic_nowActive = $('.concept-mob-body .-pic-item.-active')
            if (pic_nowActive != null) {
                pic_nowActive.classList.remove('-active')
            }
            pic_items[next].classList.add('-active')

            let node_nowActive = $('.concept-mob-body .-node-item.-active')
            if (node_nowActive != null) {
                node_nowActive.classList.remove('-active')
            }
            node_items[next].classList.add('-active')

            let title_nowActive = $('.concept-mob-body .-title-item.-active')
            if (title_nowActive != null) {
                title_nowActive.classList.remove('-active')
            }
            title_items[next].classList.add('-active')

            if (next == max - 1) {
                el.dataset.end = 1
            } else {
                el.dataset.end = 0
            }
            concept_select(next)
            i = next + 1
            count.innerHTML = i.toLocaleString(undefined, {
                minimumIntegerDigits: 2,
                useGrouping: false
            });

            count_nav.innerHTML = i.toLocaleString(undefined, {
                minimumIntegerDigits: 2,
                useGrouping: false
            });
        }
        conceptMobile_change(0)

        function conceptMobile_nav(di) {
            let el = $("#concept_parent")
            let now = parseInt(el.dataset.i)
            let max = parseInt(el.dataset.max)
            let next = ((now + di) % max + max) % max
            conceptMobile_change(next)
        }
    </script>
    <?php theme_overide_style($content) ?>