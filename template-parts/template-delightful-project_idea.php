<?php
$content = $args[0];
$f = $args[1];
$idea_max = ofsize($content['idea']);
?>
<style type="text/css">
    #concept {
        color: var(--text-color);
        background-size: cover;
        --i: 0;
    }

    .concept-nav {
        padding-top: 2.5rem;
        display: flex;
    }

    .concept-nav-dot {
        width: 8px;
        height: 8px;
        background: var(--text-color);
        box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.25);
        border-radius: 100%;
        margin-right: 12px;
        transition: all .3s;
        cursor: pointer;
    }

    #concept-content-wrap-mob {
        display: none;
    }

    #concept #concept-content-wrap .-active,
    .concept-nav .-active {
        background: var(--mc-main-1) !important;
        width: 20px !important;
        border-radius: 27px !important;
    }

    .concept-hightlight {
        padding-top: 6.5rem;
    }

    .concept-line {
        background-color: var(--text-color);
        height: 0.7px;
        width: calc(60% - 2rem);
    }

    .concept-nav-arrow-left {
        top: 35%;
        left: -112px;
        transform: rotate(-90deg);
        background-image: var(--mc-arrow-up);
        background-size: cover;
        position: absolute;
        cursor: pointer;
        width: 60px;
        height: 60px;
    }

    .concept-nav-arrow-right {
        top: 35%;
        right: -57px;
        transform: rotate(90deg);
        background-image: var(--mc-arrow-up);
        background-size: cover;
        position: absolute;
        cursor: pointer;
        width: 60px;
        height: 60px;
    }

    .concept-main-picture {
        background-size: cover;
        background-position: center;
        /* aspect-ratio: 671/379; */
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 2;
    }
    .concept-main-picture img{
        visibility: hidden;
    }

    #concept .sub-menu {
        width: 90%;
    }

    .concept-content {
        position: absolute;
        transition: all 1s;
        opacity: 1;
    }

    .concept-content[data-show='0'] {
        z-index: -1;
        transition: all 1s;
        opacity: 0;
    }

    .concept-space {
        min-height: 272px;
    }

    .concept-wrap {
        padding-top: 1rem;
        margin-left: 82px;
        position: relative;
        overflow: hidden;
    }

    .concept-rail {
        display: flex;
        /* aspect-ratio: 670/379; */
        width: calc(var(--max) * 671px);
        position: relative;
        left: calc(-1px * (var(--i) * 671));
        transition: left .5s;
    }

    @media (max-width: 1319px) {
        #concept-content-wrap-mob>h1 {
            font-weight: 400 !important;
            font-size: 38px !important;
            line-height: 40px !important;
        }

        #concept-content-wrap {
            display: none;
        }

        #concept-content-wrap-mob {
            display: block;
        }

        .concept-nav {
            padding-top: 2rem;
            display: flex;
            justify-content: center;
        }

        .concept-hightlight {
            padding-top: 2rem;
        }
    }

    .concept-mob-body {
        padding-top: 20px;
        --item-n: 90vw;
        --item-a: 90vw;
        position: relative;
    }

    @media (max-width: 1319px) {
        .concept-mob-body {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
    @media (max-width: 767px) {
        .concept-mob-body {
            padding-left: 0rem;
            padding-right: 0rem;
        }
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
        transition: transform .5s ease-in-out;
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

    /* title-rail */

    .-title-wrap {
        width: 100%;
        transform: translateX(0);
        will-change: transform;
        transition: transform .5s ease-in-out;
    }

    .-title-rail {
        --x: calc(var(--i) * -1 * var(--item-n));
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
        width: calc(100vw - 32px);
        height: calc(27px * 6);
        height: 6lh;
        margin: auto;
    }

    .concept-content-body {
        color: var(--text-color);
    }
    #concept-content-wrap{
        padding: 0 12px;
    }
</style>
<script>
    function navConcept(k) {
        let v = document.querySelector('#concept')
        let now = parseInt(v.dataset.i)
        let max = parseInt(v.dataset.max)
        let next = now + k


        if (next == max) {
            next = 0;
        }
        if (next < 0) {
            next = max - 1;
        }
        setConcept(next)
    }

    function setConcept(next) {

        let v = document.querySelector('#concept')
        v.dataset.i = next
        v.style.setProperty('--i', next)
        document.querySelector('.concept-nav-dot.-active').classList.remove('-active');
        document.querySelectorAll('.concept-nav-dot')[next].classList.add('-active');
        document.querySelectorAll('.concept-content').forEach((item) => {
            if (item.dataset.i == next) {
                item.dataset.show = '1';
            } else {
                item.dataset.show = '0';
            }
        })
    }
</script>
<section id="concept" class="is-on-nav is-on-nav-mob" data-i="0" data-max="<?= ofsize($content['idea']) ?>"
    style="--max: <?= ofsize($content['idea']) ?>">
    <div class="py-12 relative section-fade">
        <div id="concept-content-wrap" class="cont-pd grid grid-cols-12">
            <div class="col-span-4 col-start-2 relative">
                <?php foreach ($content['idea'] as $key => $value) {
                    ?>
                    <div class="concept-content" data-i="<?= $key ?>" data-show="<?php echo ($key == 0) ? "1" : "0" ?>">
                        <h2 style="color: var(--mc-main-3)">
                            <?= $value['title'] ?>
                        </h2>
                        <div class="pt-8 sub-menu">
                            <?= $value['description'] ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="concept-space"></div>
                <?php if (ofsize($content['idea']) != 1): ?>
                    <style>
                        .concept-hightlight {
                            padding-top: 3.5rem;
                        }
                    </style>
                    <div class="concept-nav">
                        <div class="concept-nav-arrow-left arrow-hover" onclick="navConcept(-1)">
                        </div>
                        <div class="concept-nav-arrow-right arrow-hover" onclick="navConcept(1)">
                        </div>
                        <?php foreach ($content['idea'] as $key => $value) {
                            ?>
                            <div class="concept-nav-dot <?php echo ($key == 0) ? '-active' : '' ?>" data-i="<?= $key ?>"
                                onclick="setConcept(this.dataset.i)"></div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                    <div class="concept-hightlight flex items-center gap-1">
                        <div class="hightlight whitespace-nowrap">
                            <?= $content['under_section_text'] ?>
                        </div>
                        <sp class="concept-line"></sp>
                    </div>
                </div>
                <div class="col-span-7">
                    <div class="concept-wrap">
                        <div class="concept-rail">
                            <?php foreach ($content['idea'] as $key => $value) {
                                ?>
                                <div class="concept-main-picture" style="background-image:url('<?= $value['background_image']['url'] ?>')">
                                    <img src="<?= $value['background_image']['url'] ?>" class="w-full">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="concept-content-wrap-mob">
                <div class="concept-mob-body" data-end="" data-max="<?= $idea_max ?>" data-i="0"
                    style="--max:<?= $idea_max ?>;--i:0;">
                    <div class="-title-wrap">
                        <div class="-title-rail">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div class="-title-body">
                                    <h1 class="cont-pd" style="color: var(--mc-main-3);">
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
                            for ($i = 0; $i < $idea_max; $i++) {
                                $mob_bg = $content['idea'][$i]['background_image_mobile']['sizes']['large'];
                                if ($mob_bg == '') {
                                    $mob_bg = $content['idea'][$i]['background_image']['sizes']['large'];
                                }
                                ?>
                                <div data-i="<?= $i ?>" class="-pic-item">
                                     <img src="<?=$mob_bg?>" onclick="conceptMobile_change(<?= $i ?>)" class="w-full">
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
                    <?php
                    if (ofsize($content['idea']) > 1):
                        ?>
                        <div class="concept-nav">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div onclick="conceptMobile_change(<?= $i ?>)" class="concept-nav-dot"></div>
                                <?php
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="cont-pd concept-hightlight flex items-center gap-1">
                        <div class="hightlight whitespace-nowrap">
                            <?= $content['under_section_text'] ?>
                        </div>
                        <sp class="concept-line"></sp>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function conceptMobile_change(next) {
            let el = $('.concept-mob-body')
            let pic_items = $$('.concept-mob-body .-pic-item')
            let node_items = $$('.concept-mob-body .-node-item')
            let title_items = $$('.concept-mob-body .-title-item')
            let dot_items = $$('.concept-mob-body .concept-nav-dot')
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
            node_items[next].classList.add('-active')

            let dot_nowActive = $('.concept-mob-body .concept-nav-dot.-active')
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

    <script type="module">
        import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
        var el = $('.concept-mob-body');
        var hammerTime = new Hammer(el);
        hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
        hammerTime.on("panend", function (ev) {

            let i = el.dataset.i
            let max = el.dataset.max

            i = parseInt(i)
            max = parseInt(max)
            let di = 0;
            if (ev.deltaX > 20) {
                di = -1
            } else if (ev.deltaX < -20) {
                di = +1
            }
            i = (((i + di) % max) + max) % max
            xconsolex.log('newi', i)

            $$('#concept-content-wrap-mob .concept-nav-dot')[i].click()
        })
    </script>
    <?php theme_overide_style($content) ?>