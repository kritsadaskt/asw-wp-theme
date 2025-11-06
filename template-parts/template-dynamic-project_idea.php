<?php
$content = $args[0];
$f = $args[1];
$idea_max = ofsize($content['idea']);
?>
<style type="text/css">
    .info-btn-txt {
        font-style: normal;
        font-weight: 500;
        font-size: 22px;
        line-height: 28px;
        text-align: center;
        color: var(--mc-main-3);

    }

    #info-btn-group {
        text-align: center;
        margin-top: 12px;
    }



    .location-tab-txt {
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        padding: 6px 21px;
        line-height: 28px;
        display: flex;
        align-items: center;
    }



    /*-- Mobile Version --*/
    @media (max-width: 1319px) {

        .theme-title .title-a,
        .theme-title .title-b,
        .theme-title .title-c {
            font-size: 38px;
            line-height: 40px;
        }

        .info-tab-txt {
            padding: 4px 28px;
        }
    }

    #concept-idea-picture-wrap {
        margin-top: 41px;
        position: relative;
    }

    .concept-idea-picture {
        box-shadow: 0px 12px 28px 16px rgb(0 0 0 / 35%);
        border-radius: 16px;
        background-size: cover;
        background-position: center;
        aspect-ratio: 640/344;
        z-index: 2;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        transition: all .5s ease-in-out;
        transform: rotate(0deg);
        transform-origin: -100% 50%;
    }

    .concept-idea-picture[data-show="top"] {
        transform: rotate(-90deg);
    }

    .concept-idea-picture[data-show="bottom"] {
        transform: rotate(90deg);
    }

    .concept-idea-picture[data-show="center"] {
        transform: rotate(0deg);
    }

    #concept-inner {
        margin-top: 96px;
    }

    #concept {
        background-color: var(--mc-main-3);
        padding-bottom: 3rem;
        background-size: cover;
        background-position: top center;
        overflow: hidden;
    }

    #concept-content-wrap {
        width: 100%;
        display: grid;
        grid-template-columns: 48px auto 48px;
        grid-column-gap: 48px;
    }

    #concept-nav {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        margin-top: 5em;
    }

    #concept-nav-wrap-arrow {}

    .concept-nav-arrow {
        background-image: var(--mc-arrow-up);
        width: 150%;
        padding-top: 150%;
        background-size: cover;
        position: relative;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .concept-nav-arrow.arrow-down {
        transform: rotate(180deg);
        margin-bottom: 0px;
        margin-top: 20px;
    }

    .concept-nav-dot {
        width: 8px;
        height: 8px;
        background-color: #fff;
        border-radius: 100%;
        margin: 16px auto;
        transition: all .3s;
        cursor: pointer;
    }

    .concept-nav-dot.-active {
        border: 1px solid var(--mc-main-1);
        box-shadow: 0px 1px 12px var(--mc-main-5);
        width: 12px;
        height: 12px;
    }

    .concept-content-title {
        font-style: normal;
        font-weight: 400;
        font-size: 48px;
        line-height: 48px;
        display: inline-block;
        background: var(--mc-gd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 8px;
        padding-top: 85px;
        position: relative;
    }

    .concept-content-subtitle {
        font-style: normal;
        font-weight: 500;
        font-size: 30px;
        line-height: 32px;
        position: relative;
    }

    .concept-content-body {
        padding-top: 30px;
        padding-left: 80px;
        padding-bottom: 80px;
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 28px;
        position: relative;
    }

    #concept-content {
        position: relative;
        height: 38rem;
    }

    #concept-content-glass {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        width: 100vw;
        position: absolute;
        height: 100%;
        backdrop-filter: blur(6px);
        left: -152px;
        height: calc(100% - 7.5rem);
    }


    .concept-node {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        transition: all .5s;
    }

    .concept-node[data-show="1"] {
        opacity: 1;
    }


    .hov-glow {
        position: absolute;
        top: 19.5%;
        left: 19.5%;
        opacity: 0;
    }

    .concept-nav-arrow:hover .hov-glow {
        opacity: 0.1;
    }

    .pr-25px {
        padding-right: 25px;
    }

    .pl-25px {
        padding-left: 25px;
    }

    .concept-content-wrap-mob {
        display: none;
    }

    @media (max-width: 1319px) {
        div#concept-nav {
            display: none;
        }

        div#concept-content-wrap {
            display: none;
        }

        .concept-content-wrap-mob {
            display: block;
        }
    }

    .concept-mob-body {
        --item-n: 80vw;
        --item-a: 90vw;
        position: relative;
    }

    .concept-mob-body-glass {
        background-color: #fff1;
        position: absolute;
        width: 100%;
        height: calc(100% - 38vw);
        border-radius: 16px;
        backdrop-filter: blur(6px);
        bottom: 0;
    }

    .concept-mob-body .-pic-wrap {
        width: 100%;
        transform: translateX(0);
        will-change: transform;
        transition: transform .5s ease-in-out;
    }

    .concept-mob-body[data-end="1"] .-pic-wrap {
        transform: translateX(calc(10vw - 16px));
    }

    .concept-mob-body .-pic-rail {
        --x: calc(var(--i) * -1 * var(--item-n));
        display: flex;
        width: max-content;
        transform: translateX(var(--x));
        will-change: transform;
        transition: transform .5s ease-in-out;
        align-items: center;
        padding-left: 8px;
    }

    .concept-mob-body .-pic-item {
        transition: all .5s ease-in-out;
        width: var(--item-n);
        padding: 0 8px;
    }

    .concept-mob-body .-pic-item.-active {
        width: var(--item-a);
    }

    .concept-mob-body .-p {
/*        aspect-ratio: 16 / 9;*/
width: 100%;
background-size: cover;
background-position: center;
border-radius: 16px;
overflow: hidden;
box-shadow: 0 12px 28px 16px rgba(0, 0, 0, 0.35);
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
    transition: transform .5s ease-in-out;
    align-items: center;
}

.-node-item {
    color: #fff;
    transition: all .5s ease-in-out;
    width: var(--item-n);
    height: 380px;
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

.-node-item .concept-content-body {
    padding-left: 0;
    padding-top: 20px;
    padding-bottom: 20px;
}

.-node-item .concept-content-subtitle {
    font-size: 28px;
    line-height: 32px;
}

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
    width: calc(100vw - 64px);
    margin: auto;
}

/*-- Mobile Version --*/
@media (max-width: 767px) {
    .concept-mob-body .-node-body {
        width: calc(100vw - 32px);
    }
}

.concept-mob-body .-dot {
    background-color: #fff;
    width: 8px;
    height: 8px;
    border-radius: 100%;
    margin: 0 12px;
    transition: all .3s;
    border: 0px solid var(--mc-main-1);
    box-shadow: 0px 0px 0px var(--mc-main-5);
    cursor: pointer;
}

.concept-mob-body .-dot.-active {
    width: 12px;
    height: 12px;
    border: 1px solid var(--mc-main-1);
    box-shadow: 0px 1px 12px var(--mc-main-5);
}
</style>
<script type="text/javascript">
    function concept_change(i) {
        let section = document.querySelector('#concept')
        section.dataset.i = i
        let max = parseInt(section.dataset.max)
        if (document.querySelector(`.concept-node[data-show="1"]`) != undefined) {
            document.querySelector(`.concept-node[data-show="1"]`).dataset.show = 0
            document.querySelector(`.concept-nav-dot.-active`).classList.remove('-active')
        }
        document.querySelector(`.concept-node[data-i="${i}"]`).dataset.show = 1
        document.querySelector(`.concept-nav-dot[data-i="${i}"]`).classList.add('-active')
        let pic = document.querySelectorAll(`.concept-idea-picture`)
        for (let j = 0; j < max; j++) {
            if (j < i) {
                pic[j].dataset.show = 'top'
            } else if (j == i) {
                pic[j].dataset.show = 'center'
            } else {
                pic[j].dataset.show = 'bottom'
            }
        }
    }

    function concept_change_arrow(plus) {
        let section = document.querySelector('#concept')
        let now = parseInt(section.dataset.i)
        let end = parseInt(section.dataset.max) - 1
        let next = now + plus
        if (next < 0) {
            next = end
        } else if (next > end) {
            next = 0
        }
        concept_change(next)
    }
</script>
<section id="concept" class="is-on-nav is-on-nav-mob" data-i="0" data-max="<?= $idea_max ?>">
    <div class="container mx-auto section-fade">

        <div id="concept-content-wrap">
            <div id="concept-nav">
                <div class="concept-nav-arrow" onclick="concept_change_arrow(-1)">
                    <div class="hov-glow w-11 h-11 rounded-full bg-white"></div>
                </div>
                <?php
                for ($i = 0; $i < $idea_max; $i++) {
                    echo '<div onclick="concept_change(' . ($i) . ')" data-i="' . ($i) . '" class="concept-nav-dot"></div>';
                }
                ?>
                <div class="concept-nav-arrow arrow-down" onclick="concept_change_arrow(1)">
                    <div class="hov-glow w-11 h-11 rounded-full bg-white"></div>
                </div>

            </div>
            <div id="concept-content">
                <div class="grid grid-cols-12 gap-x-16" id="concept-inner">
                    <div class="col-span-7">
                        <div class="theme-title" style="position: relative;z-index: 10;">
                            <span class="title-c"><?php pll_e('แนวคิดโครงการ')?></span>
                            <span class="title-b"><?php pll_e('แนวคิดโครงการ')?></span>
                            <h2 class="title-a"><?php pll_e('แนวคิดโครงการ')?></h2>
                        </div>
                        <div id="concept-idea-picture-wrap">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div data-i="<?= $i ?>"
                                    style="background-image:url('<?= $content['idea'][$i]['background_image']['sizes']['large'] ?>')"
                                    class="concept-idea-picture" data-show="bottom">
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-span-5 text-white" id="concept-content">
                        <div id="concept-content-glass"></div>
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            ?>
                            <div data-i="<?= $i ?>" class="concept-node" data-show="0">
                                <h2 class="concept-content-title">
                                    <?= $content['idea'][$i]['title'] ?>
                                </h2>
                                <h5 class="concept-content-subtitle">
                                    <?= $content['idea'][$i]['sub_title'] ?>
                                </h5>
                                <p class="concept-content-body">
                                    <?= $content['idea'][$i]['description'] ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="concept-content-wrap-mob">
            <div class="xl:px-4 xl:py-12 px-4 pt-16 pb-6">
                <div class="theme-title" style="position: relative;z-index: 10;">
                    <span class="title-c"><?php pll_e('แนวคิดโครงการ')?></span>
                    <span class="title-b"><?php pll_e('แนวคิดโครงการ')?></span>
                    <h2 class="title-a"><?php pll_e('แนวคิดโครงการ')?></h2>
                </div>
            </div>
            <div class="concept-mob-body" data-end="" data-max="<?= $idea_max ?>" data-i="0"
                style="--max:<?= $idea_max ?>;--i:0;">
                <div class="concept-mob-body-glass"></div>
                <div class="-pic-wrap">
                    <div class="-pic-rail">
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            $mob_bg = $content['idea'][$i]['background_image_mobile']['sizes']['large'];
                            if ($mob_bg == '') {
                                $mob_bg = $content['idea'][$i]['background_image']['sizes']['large'];
                            }
                            ?>
                            <div data-i="<?= $i ?>" class="-pic-item">
                                <!-- <div style="background-image:url('<?= $mob_bg ?>')" class="-p" onclick="conceptMobile_change(<?= $i ?>)"></div> -->
                                     <img src="<?=$mob_bg?>" onclick="conceptMobile_change(<?= $i ?>)" class="-p w-full">
                                </div>
                                <?php
                            }
                            ?>
                            <div data-i="<?= $i ?>" class="-pic-item -max-h">
                                <div class="-p"></div>
                            </div>
                        </div>
                    </div>
                    <div class="-node-wrap">
                        <div class="-node-rail">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div data-i="<?= $i ?>" class="-node-item">
                                    <div class="-node-body">
                                        <h2 class="concept-content-title">
                                            <?= $content['idea'][$i]['title'] ?>
                                        </h2>
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
                    <div class="-nav-wrap">
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            ?>

                            <div onclick="conceptMobile_change(<?= $i ?>)" class="-dot "></div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        <script type="text/javascript">
            concept_change(0)
        </script>

        <script type="text/javascript">
            function conceptMobile_change(next) {
                let el = $('.concept-mob-body')
                let pic_items = $$('.concept-mob-body .-pic-item')
                let node_items = $$('.concept-mob-body .-node-item')
                let dot_items = $$('.concept-mob-body .-dot')
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

                let dot_nowActive = $('.concept-mob-body .-dot.-active')
                if (dot_nowActive != null) {
                    dot_nowActive.classList.remove('-active')
                }
                dot_items[next].classList.add('-active')

                if (next == max - 1) {
                    el.dataset.end = 1
                } else {
                    el.dataset.end = 0
                }

            }
            conceptMobile_change(0)

            function conceptMobile_nav(di) {
                let el = $('.concept-mob-body')
                let now = parseInt(el.dataset.i)
                let max = parseInt(el.dataset.max)
                let next = ((now + di) % max + max) % max
                conceptMobile_change(next)
            }
        </script>
        <?php theme_overide_style($content) ?>