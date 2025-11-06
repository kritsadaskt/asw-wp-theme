<?php
$content = $args[0];
$f = $args[1];

$has_building = 1;
if (is_array($content['building']) == null) {
    $has_building = 0;
}
$facSize = 0;
if (is_array($content['facility'])) {
    $facSize = ofsize($content['facility']);
}
if ($content['hide_b'] == 'hide') {
    $has_building = 0;
}
?>
<style type="text/css">
    #facility_main {
        background-color: var(--bg-color);
        padding-top: 7rem;
        padding-bottom: 7rem;
    }

    .facility_main-content-title {
        font-style: normal;
        display: inline-block;
        background: var(--mc-gd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-fill-color: transparent;
        margin-bottom: 8px;
        /*			padding-top: 25px;*/
        position: relative;
    }

    .facility_main-content-body {
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 28px;
        text-align: center;
        color: #E2FFFC;
    }

    /* Facility title style*/

    /* #facility_main .theme-title .title-a {
        -webkit-text-stroke: 1px var(--mc-tab-text-hover);
        text-shadow: 0px 1px 12px var(--mc-tab-text-hover);
    }

    #facility_main .theme-title .title-b {
        -webkit-text-stroke: 1px var(--mc-tab-text-hover);
    }

    #facility_main .theme-title .title-c {
        -webkit-text-stroke: 1px var(--mc-tab-text-hover);
    } */
    /*-- Mobile Version --*/
    @media (max-width: 1319px) {

        .theme-title .title-a,
        .theme-title .title-b,
        .theme-title .title-c {
            font-size: 38px;
            line-height: 40px;
        }
    }

    #facility_alt {
        background-color: var(--bg-color);
        background-image: var(--bg-img);
        background-size: cover;
        background-position: bottom;
    }

    #facility_alt .-title {
        color: var(--mc-main-3);
        font-style: normal;
        font-weight: 400;
        font-size: 48px;
        line-height: 48px;
    }

    #facility_alt .info-tab .info-tab-txt {
        color: var(--mc-tab-text-color);
    }

    #facility_alt .info-tab.-active .info-tab-txt {
        color: var(--mc-tab-text-hover);
    }

    .facility_alt-text {
        color: var(--text-color);
        font-style: normal;
        font-weight: 500;
        font-size: 22px;
        line-height: 1.2;
    }

    .facility_alt-icon {

        width: auto;
        display: block;
        margin-bottom: 8px;
    }

    .facility_alt-icon img {
        height: 70px;
        width: 100%;
        object-fit: contain;
        object-position: center;
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

    .facility_alt-text {
        max-height: calc(28px * 2);
        max-height: 2lh;
        overflow: hidden;
    }

    .facility_alt-blocks[data-show="1"] {
        display: flex;
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

    #facility_main-gallery {
        --c: 5;
        --i: 1;
        --g: 10;
        width: 100%;
        overflow: hidden;
        margin-top: 1rem;
        position: relative;
    }

    #facility_main {}

    .facility_main-gallery-curve {
        background-color: var(--bg-color);
        width: 100%;
        height: calc(1vw * var(--c));
        border-radius: 100%;
        position: absolute;
        left: 0;
        z-index: 2;
    }

    .facility_main-gallery-curve.-top {
        top: calc(-.5vw * var(--c));
    }

    .facility_main-gallery-curve.-bottom {
        bottom: calc(-.5vw * var(--c));

    }

    .facility_main-gallery-wrap {
        width: 100%;
        overflow: hidden;
        height: 25vw;
    }

    .facility_main-gallery-rail {
        display: flex;
        width: max-content;
        transition: all .5s ease-in-out;
        transform: translateX(calc((var(--i) - 2)*-10%));
        justify-content: center;
        align-items: center;
    }

    .facility_main_gallery-item {
        background-color: linear-gradient(0deg, rgba(0, 47, 87, 0.7), rgba(0, 47, 87, 0.7));
        width: 18.75vw;
        padding: 0 .75vw;
        opacity: 1;
        transition: all .5s ease-in-out;
    }

    .facility_main_gallery-item .-img {
        cursor: pointer;
        background-size: cover;
        background-position: center;
        height: 25vw;
        width: 100%;
        opacity: 0.3;
        transition: all .5s;
    }

    .facility_main_gallery-item[data-active="0"] .-img:hover {
        transform: scale(1.2);
    }

    .facility_main_gallery-item[data-active="1"] {
        width: 25vw;
        opacity: 1;
    }

    .facility_main_gallery-item[data-active="1"] .-img {
        opacity: 1;
    }

    .facility-menu {
        color: var(--mc-tab-text-color);
        position: relative;
        cursor: pointer;
        padding: 0 20px;
        min-width: 120px;
        max-width: 260px;
        text-align: center;
        transition: all .3s;
    }

    .facility-menu>p {
        overflow: hidden;
        white-space: nowrap;
    }

    .facility-menu-nav {
        --fg-i: 0;
        --fg-slot: 0;
        --fg-slot-px: 0;
        --fg-slot-shift: 0px;
    }


    .facility-menu::after {
        border-radius: 50%;
        content: '';
        height: 4px;
        width: 4px;
        background-color: var(--mc-tab-text-color);
        position: absolute;
        left: -2px;
        top: 45%;
    }

    .facility-menu:nth-child(1):after {
        height: 0;
        width: 0;
    }

    .facility-menu.-active,
    .facility-menu:hover {
        color: var(--mc-tab-text-hover) !important;
    }

    .facility-menu-wrap {
        max-width: 880px;
        overflow-x: scroll;
        position: relative;
    }

    .facility-menu-wrap::before,
    .facility-menu-wrap::after {
        content: " ";
        width: 20px;
        height: 100%;
        background: linear-gradient(90deg, var(--bg-color), transparent);
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        pointer-events: none;
    }

    .facility-menu-wrap::after {
        background: linear-gradient(-90deg, var(--bg-color), transparent);
        left: inherit;
        right: 0;
    }

    .facility-menu-rail {
        position: relative;
        left: 0;
        transition: all .5s ease-in-out;
        transform: translateX(calc(var(--fg-slot-px) * -1px));
    }

    .facility-menu-nav[data-end="1"] .facility-menu-rail {
        transform: translateX(calc(var(--fg-slot-px) * -1px + var(--fg-slot-shift)));
    }

    .facility-arrow {
        width: 40px;
        height: 40px;
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

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        #facility_main {
            padding-top: 64px;
            padding-bottom: 80px;
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .facility_main-content {
            padding: 0 .5rem;
        }

        .facility_alt-blocks {
            height: calc(var(--block-h) * 4);
            height: auto;
            margin-bottom: 0;
        }

        .facility_alt-block {
            width: calc(100% / 3);
            margin-bottom: 16px;
        }

        .facility_main-content-body {
            text-align: left;
        }

        .info-tabs-block-wrap {
            padding-left: 20px;
            padding-right: 20px;
        }

        .video-nav {
            margin-top: 28px !important;
        }
    }


    #facility_main:where([data-fact-items="0"], [data-fact-items="1"], [data-fact-items="2"], [data-fact-items="3"]) :where(#facility_main-gallery-loop, .fac-draw, .facility_main-content-tabs) {
        display: none;
    }

    #facility_main:where([data-fact-items="0"], [data-fact-items="1"], [data-fact-items="2"], [data-fact-items="3"]) .theme-title {
        text-align: center;
    }

    .faci-offset-lt4 {
        display: none;
    }

    #facility_main:where([data-fact-items="0"], [data-fact-items="1"], [data-fact-items="2"], [data-fact-items="3"]) .faci-offset-lt4 {
        grid-column: span 4;
        display: block;
    }
    .fac-alt-wrap{
        padding-top: 78px;
    }
    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        .fac-alt-wrap {
            padding: 0 1rem;
            padding: 2rem 1rem;
        }
    }
</style>
<div id="facility">
    <section id="facility_main" class="is-on-nav is-on-nav-mob" data-fact-items="<?= $facSize ?>">
        <div class="section-fade facility-menu-nav" data-fg-slot="0" data-is-side="start"
        style="--fg-i:0;--fg-slot:0;--fg-slot-px:0">
        <div class="relative container mx-auto">
            <div class="container mx-auto grid grid-cols-12">
                <div class="faci-offset-lt4"></div>
                <div class="theme-title col-span-12 xl:col-span-4 text-center xl:text-left">
                    <span class="title-c"><?php pll_e('สิ่งอำนวยความสะดวก')?></span>
                    <span class="title-b"><?php pll_e('สิ่งอำนวยความสะดวก')?></span>
                    <h2 class="title-a"><?php pll_e('สิ่งอำนวยความสะดวก')?></h2>
                </div>
                <div class="col-span-2"></div>
                <div
                class="fac-draw col-span-12 xl:col-span-6 overflow-hidden flex items-center justify-between gap-2">
                <div onclick="changeFactNavSlot(-1)" class="facility-arrow -left"></div>
                <div class="facility-menu-wrap scroll-hid w-full">
                    <div class="facility-menu-rail inline-flex relative h-full text-white items-center">
                        <?php foreach ($content['facility'] as $key => $value) { ?>
                            <div class="facility-menu <?php echo ($key == 0) ? '-active' : '' ?>"
                                onclick="flkty.select(<?= $key ?>);" data-i="<?= $key ?>">
                                <p>
                                    <?= $value['title'] ?>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div onclick="changeFactNavSlot(1)" class="facility-arrow -right"></div>
            </div>
        </div>
    </div>

    <?php
    if ($facSize <= 3) {
        ?>
        <style type="text/css">
            .faci-lt4-card {
                margin: auto;
                width: 100%;
            }

            #facility_main:where([data-fact-items="0"], [data-fact-items="1"]) .faci-lt4-card {
                max-width: 560px;
            }

            .faci-lt4-card .-img {
                background-size: cover;
                background-position: center;
                padding-top: 100%;
                width: 100%;
            }

            .faci-lt4 {
                --c: 7;
                position: relative;
                overflow: hidden;
            }
        </style>
        <div class="faci-lt4 section-fade">
            <div class="facility_main-gallery-curve -top"></div>
            <div class="facility_main-gallery-curve -bottom"></div>
            <div class="container mx-auto">
                <div class="grid grid-cols-<?= $facSize ?> gap-2 xl:gap-8">
                    <?php foreach ($content['facility'] as $key => $value) { ?>
                        <div class="faci-lt4-card text-center">
                            <div class="-img" style="background-image: url(<?= $value['image']['sizes']['large'] ?>);">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="container mx-auto">
            <div class="grid grid-cols-<?= $facSize ?> gap-2 xl:gap-8">
                <?php foreach ($content['facility'] as $key => $value) { ?>
                    <div class="faci-lt4-card text-center">
                        <h2 class="facility_main-content-title">
                            <?= $value['title'] ?>
                        </h2>
                        <p class="facility_main-content-body">
                            <?= $value['description'] ?>
                        </p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    ?>

    <style type="text/css">
        #facility_main-gallery-loop {
            opacity: 0;
            transition: opacity 1s;
            --c: 7;
            position: relative;
            overflow: hidden;
        }

        #facility_main-gallery-loop[data-ready="1"] {
            opacity: 1;
        }

        .facigal_card {
            width: 22.5vw;
            width: 22vw;

            --shift: 2.75vw;
            position: relative;
            height: 25vw;
            z-index: 10;
            transition: width .4s ease-in-out, transform .4s ease-in-out;
            border-left: 0.75vw solid var(--bg-color);
            border-right: 0.75vw solid var(--bg-color);
            box-sizing: border-box;
            background: var(--bg-color);
            overflow: hidden;
        }

        .facigal_card.is-selected {
            width: 27.5vw;
            transform: translateX(calc(var(--shift) * -1));
            transform-origin: center;
            position: relative;
            z-index: 20;
            opacity: 1;
        }

        .facigal_card .-inner {
            width: 100%;
            height: 100%;
            opacity: .5;
            background-size: cover;
            background-position: center;
            transition: opacity .6s, transform .3s;
            transform: scale(1);
        }

        .facigal_card:hover .-inner {
            transform: scale(1.2);
        }

        .facigal_card.is-selected .-inner {
            opacity: 1;
        }

        .facigal_card[data-fact-opt="l1"] {
            transform: translateX(calc(var(--shift) * -1));
        }

        .facigal_card[data-fact-opt="r1"] {
            transform: translateX(calc(var(--shift) * 1));
        }

        .facigal_card[data-fact-opt="l2"] {
            transform: translateX(calc(var(--shift) * -1));
        }

        .facigal_card[data-fact-opt="r2"] {
            transform: translateX(calc(var(--shift) * 1));
        }

        .fac-draw {
            position: relative;
        }

        .facility-menu-nav[data-fg-slot="0"] .facility-arrow.-left {
            opacity: 0;
            pointer-events: none;
        }

        .facility-menu-nav[data-end="1"] .facility-arrow.-right {
            opacity: 0;
            pointer-events: none;
        }

        /*-- Mobile Version --*/
        @media (max-width: 1319px) {
            .facility_main-gallery-curve {}

            #facility_main-gallery-loop {
                --c: 5;
                margin-top: 28px;
                margin-bottom: 16px;
            }

            .facigal_card {
                width: 100vw;
                height: 56.25vw;
            }

            .facigal_card.is-selected {
                width: 100vw;
                transform: translateX(0);
            }

            .fac-draw {
                margin-top: 12px;
            }

            #facility_main-content {
                padding: 0 2rem;
            }

            .facility_main-content-title {
                font-size: 36px;
                line-height: 40px;
                padding-bottom: 16px;

                font-size: 18px;
                line-height: 1.2;
                padding-bottom: 0;
            }

            #facility_alt .-title {
                font-style: normal;
                font-weight: 400;
                font-size: 38px;
                line-height: 40px;
            }
        }

        /*-- Mobile Version --*/
        @media (max-width: 767px) {
            #facility_main-content {
                padding: 0 1rem;
            }
        }
    </style>
    <div id="facility_main-gallery-loop" data-ready="0">
        <div class="facility_main-gallery-curve -top"></div>
        <div class="facility_main-gallery-curve -bottom"></div>
        <div class="carousel carousel-fac"
        data-flickity='{ "fullscreen": false, "lazyLoad": 2,"wrapAround": true ,"pageDots": false}'>
        <?php foreach ($content['facility'] as $key => $value) { ?>
            <div data-fact-opt="" class="facigal_card">
                <div class="-inner" onclick="flkty.select(<?= $key ?>);"
                    style="background-image:url('<?= $value['image']['url'] ?>')"></div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script type="text/javascript">
        flkty = 0
        document.addEventListener('readystatechange', function (event) {
            if (document.readyState === "complete") {
                flkty = new Flickity('.carousel');
                setFactGl()
                flkty.on('change', () => {
                    setFactGl()
                });


            }
        });

        function changeFactNavSlot(di) {
            let nav = document.querySelector('.facility-menu-nav')
            let rail = document.querySelector('.facility-menu-rail')
            let wrap = document.querySelector('.facility-menu-wrap')
            let items = []
            let breakPoint = []
            breakPoint[0] = {
                i: 0,
                px: 0,
                shift: 0,
            }

            let items_size = document.querySelectorAll('.facility-menu').length
            let slot = parseInt(nav.style.getPropertyValue('--fg-slot'))
            rail_width = rail.clientWidth
            wrap_width = wrap.clientWidth
            xconsolex.log('wrap_width', wrap_width)
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
                        px: temp_px,
                        shift: wrap_width - temp_px
                    })
                    temp_px = items[i].width
                }

            }
            xconsolex.log('temp_px', temp_px)
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
            nav.style.setProperty('--fg-slot', newDi)
            xconsolex.log(breakPoint)
            shift = 0
            shift = wrap_width - temp_px


            nav.style.setProperty('--fg-slot-px', newBreakPoint)
            nav.style.setProperty('--fg-slot-shift', shift + 'px')

            nav.dataset.fgSlot = newDi
            if (newDi == breakPoint.length - 1) {
                nav.dataset.end = 1
            } else {
                nav.dataset.end = 0
            }

        }

        function setFactGl() {
            document.querySelector('#facility_main-gallery-loop').dataset.ready = "1"
            let now = flkty.selectedIndex
            let max = flkty.cells.length - 1
            let el = {
                l2: null,
                l1: null,
                r1: null,
                r2: null
            }
            el.l1 = now - 1
            el.l2 = now - 2
            el.r1 = now + 1
            el.r2 = now + 2
            for (let i in el) {
                if (el[i] == -1) {
                    el[i] = max
                } else if (el[i] == -2) {
                    el[i] = max - 1
                } else if (el[i] == max + 1) {
                    el[i] = 0
                } else if (el[i] == max + 2) {
                    el[i] = 1
                }
            }
            for (let i in flkty.cells) {
                flkty.cells[i].element.dataset.factOpt = ''
            }
            for (let i in el) {
                flkty.cells[el[i]].element.dataset.factOpt = i
            }
            if (document.querySelector('.facility-menu.-active') != null) {
                document.querySelector('.facility-menu.-active').classList.remove('-active')
            }
            document.querySelectorAll('.facility-menu')[now].classList.add('-active')
            if (document.querySelector('.facility_main-content-tabs[data-showb="1"]') != null) {
                document.querySelector('.facility_main-content-tabs[data-showb="1"]').dataset.showb = "0"
            }
            document.querySelectorAll('.facility_main-content-tabs')[now].dataset.showb = "1"

        }
    </script>

    <script type="text/javascript">
        function faci_gallery_change(i) {
            let section = document.querySelector('#facility_main-gallery')
            section.dataset.i = i
            section.style.setProperty('--i', i)
            $('.facility_main_gallery-item[data-active="1"]').dataset.active = 0
            $(`.facility_main_gallery-item[data-i="${i}"]`).dataset.active = 1

            $('.facility-menu.-active').classList.remove('-active')
            $$('.facility-menu')[i].classList.add('-active')

            if ($('.facility_main-content-tabs[data-showb="1"]') != null) {
                $('.facility_main-content-tabs[data-showb="1"]').dataset.showb = 0
            }
            $(`.facility_main-content-tabs[data-i="${i}"]`).dataset.showb = 1

        }
    </script>
    <div class="container mx-auto">
        <?php foreach ($content['facility'] as $key => $value) { ?>
            <div class="facility_main-content-tabs" data-i="<?= $key ?>"
                data-showb="<?= ($key == 0) ? '1' : '0' ?>">
                <div id="facility_main-content" class="text-center">
                    <h2 class="facility_main-content-title">
                        <?= $value['title'] ?>
                    </h2>
                    <p class="facility_main-content-body">
                        <?= $value['description'] ?>
                    </p>
                </div>
                <div id="facility_main-wrap">
                    <div class="grid grid-cols-12" id="facility_main-grid">
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>
<?php if ($has_building): ?>
    <section id="facility_alt">
        <div class="container mx-auto section-fade">
            <div class="text-center text-white fac-alt-wrap">
                <h2 class="-title"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h2>
                <div class="info-tabs-block-wrap">
                    <div class="info-tabs-block facility-tabs-override">
                        <div class="info-tabs-block-arrow -left"></div>
                        <div class="info-tabs-blocks">
                            <div class="info-tabs-rail">
                                <?php foreach ($content['building'] as $key => $value) { ?>
                                    <div onclick="fac_alt_change(this.dataset.i)" data-i="<?= $key ?>" class="info-tab">
                                        <span class="info-tab-txt">
                                            <?= $value['building_name'] ?>
                                        </span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="info-tabs-block-arrow -right"></div>
                    </div>
                </div>
                <div class="text-white" style="max-width: 1120px;text-align: center;margin: auto;">
                    <?php foreach ($content['building'] as $key => $value) { ?>
                        <div class="facility_alt-blocks" data-i="<?= $key ?>">
                            <?php
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
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<script type="text/javascript">
    function fac_alt_change(i) {
        if (document.querySelector('.facility-tabs-override .info-tab.-active') != undefined) {
            document.querySelector('.facility-tabs-override .info-tab.-active').classList.remove('-active')
        }
        if (document.querySelector('.facility_alt-blocks[data-show="1"]')) {
            document.querySelector('.facility_alt-blocks[data-show="1"]').dataset.show = 0
        }
        document.querySelector(`.facility-tabs-override .info-tab[data-i="${i}"]`).classList.add('-active')
        document.querySelector(`.facility_alt-blocks[data-i="${i}"]`).dataset.show = 1
    }
    fac_alt_change(0)
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    var els = $$('.facility_alt-blocks');
    for(let el of els){
        var hammerTime = new Hammer(el);
        hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
        hammerTime.on("panend", function (ev) {

            let i = 0;
            var body = $$('.facility_alt-blocks');
            let max = body.length;
            for(let b of body){
                if (b.dataset.show == '1') {
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
            $$('#facility .info-tab')[i].click()

        })
    }
</script>
<?php theme_overide_style($content) ?>