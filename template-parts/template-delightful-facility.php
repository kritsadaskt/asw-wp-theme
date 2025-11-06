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
?>
<style>
    .facility-ast{
        display: none;
    }
    #facility {
        --i: 1;
        --g: 3;
        --j: calc(((var(--i)) * 3) - 5);
        background-size: cover;
        background-position: center;
        color: var(--text-color);
    }

    #facility .info-tab:hover .info-tab-txt {
        color: var(--mc-tab-text-hover);
    }

    #facility .info-tab:after {
        background-color: var(--mc-tab-border-cl);
    }

    #facility .info-tab .info-tab-txt {
        border-bottom: 4px solid transparent;
        transition: .5s;
    }

    #facility .info-tab.-active .info-tab-txt {
        color: var(--mc-tab-text-hover);
        border-bottom: 4px solid var(--mc-tab-text-hover);
        transition: .5s;
    }

    #facility .info-tab {
        padding: 0 40px;
    }

    #facility-wrap {
        margin-top: 32px;
        overflow: hidden;
    }

    #facility-head-mob,
    #facility-wrap-mob {
        display: none;
    }

    #facility .info-line {
        background-color: var(--mc-tab-border-cl);
    }

    #facility .info-tab-wrap:after {
        background-color: #423C2A;
    }

    #facility-rail {
        display: flex;
        justify-content: center;
        align-items: center;
        width: calc(55vw + ((var(--g) - 1) * 33.5vw));
        position: relative;
        transition: transform .5s;
        will-change: transform;
        /*        left: calc((-11.1vw * (var(--j))));*/
        transform: translate(calc((-11.1vw * (var(--j)))));
        height: 40vw;
    }

    .facility-block {
        /* width: 37.5vw; */
        width: 33.5vw;
        display: inline-block;
        padding: 0 20px;
        transition: width .5s;
    }

    .facility-block.-active {
        width: 55vw;
    }

    .facility-block.-active .facility-content {
        opacity: 1;
        transition: .2s;
    }

    .facility-block.-active .facility-item::before {
        background-color: rgba(0, 0, 0, 0);
        transition: .2s;
    }

    .facility-block .facility-content {
        opacity: 0;
        transition: .2s;
        width: 55vw;
    }


    .facility-item {
        /* background-color: #222; */
        background-size: cover;
        background-position: center;
        overflow: hidden;
        aspect-ratio: 16/10;
        position: relative;
    }

    .facility-item::before {
        background-color: rgba(0, 0, 0, 0.4);
        content: '';
        display: block;
        height: 100%;
        position: absolute;
        width: 100%;
        transition: .2s;
    }

    .facility-nav {
        padding-top: 1rem;
        display: inline-flex;
        /* height: 48px;
        margin-top: 36px; */
        justify-content: center;
        align-items: center;
    }

    .facility-nav-dot {
        width: 8px;
        height: 8px;
        background: var(--text-color);
        box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.25);
        border-radius: 100%;
        margin-right: 12px;
        transition: all .3s;
        cursor: pointer;
    }

    .facility-nav-dot.-active {
        background: var(--mc-main-1) !important;
        width: 20px !important;
        border-radius: 27px !important;
    }

    .facility-arrow-right {
        right: -12px;
        height: 16px;
        width: auto;
        top: 30%;
        cursor: pointer;
        filter: grayscale(1);
        transition: .5s;
    }

    .facility-arrow-left {
        left: -12px;
        width: auto;
        height: 16px;
        top: 30%;
        cursor: pointer;
        transform: rotateY(180deg);
        filter: grayscale(1);
        transition: .5s;
    }

    .facility-arrow-right:hover,
    .facility-arrow-left:hover {
        filter: grayscale(0);
        transition: .5s;
    }

    .facility-title .facility-arrow-right {
        top: 35%;
    }

    .facility-title-menu {
        --i: 0;
        color: #423C2A;
        position: relative;
        transition: .5s;
        left: calc(var(--i) * -100%)
    }

    .facility-title-menu .-active {
        color: var(--mc-tab-text-hover);
    }

    .facility-menu {
        color: var(--mc-tab-text-color);
        position: relative;
        cursor: pointer;
        padding: 0 32px;
        text-align: center;
    }

    .facility-menu:nth-child(1) {
        padding-left: 0;
    }

    .facility-menu:last-child {
        padding-right: 0;
    }

    .facility-menu::after {
        border-radius: 50%;
        content: '';
        height: 4px;
        width: 4px;
        background-color: #423C2A;
        position: absolute;
        left: 0;
        top: 45%;
    }

    .facility-menu:nth-child(1):after {
        height: 0;
        width: 0;
    }

    .facility-menu-wrap {
        max-width: 880px;
        overflow-x: scroll;
        overflow-x: hidden;
        text-align: center;
    }

    .facility-wrap-block {
        padding-top: 52px;
        display: flex;
        justify-content: center;
    }

    .facility-wrap {
        width: 600px;
    }

    .facility_main-content-title {
        padding-top: 23px;
    }

    .facility_main-content-body {
        padding-top: 9px;
    }

    .facility-line {
        background-color: #423C2A;
        height: 0.7px
    }

    .facility_alt-text {
        font-style: normal;
        font-weight: 500;
        font-size: 22px;
        line-height: 1.2;
    }

    .facility_alt-icon {
        height: 70px;
        display: inline-block;
    }
    .facility_alt-icon img{
        object-fit: contain;
        object-position: bottom center;
        width: 100%;
        height: 70px;
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
        margin-bottom: 16px;
    }

    @media (max-width: 767px) {
        .facility_alt-block {
            padding: 0 4px;
        }
    }

    .facility_alt-blocks[data-show='1'] {
        display: flex;
    }

    .facility_alt-blocks::-webkit-scrollbar {
        width: 4px;
    }

    .facility_alt-blocks::-webkit-scrollbar-track {
        background: #FFEFD873;
        border-radius: 8px;
    }


    .facility_alt-blocks::-webkit-scrollbar-thumb {
        background: var(--mc-main-1);
        border-radius: 8px;
    }

    .facility_alt-blocks[data-show='0'] {
        display: none;
    }

    .facility-arrow {
        background-image: var(--mc-arrow-up);
        top: calc(55% - 8rem);
        width: 60px;
        height: 60px;
        z-index: 99;
        background-size: cover;
        position: relative;
        cursor: pointer;
    }

    .facility-arrow.-r {
        position: absolute;
        right: 178px;
        transform: rotate(90deg) scale(1);
    }

    .facility-arrow.-l {
        position: absolute;
        left: 178px;
        transform: rotate(270deg) scale(1);
    }

    #facility .info-mar {
        margin-top: 0;
    }

    .ft-fasi-title {
        padding-top: 48px;
    }

    .facility-menu-nav {
        padding-top: 48px;
    }

    #facility .info-tab-txt {
        padding: 0;
    }

    #facility[data-i="1"] .-l {
        pointer-events: none;
        opacity: 0.5;
    }

    #facility[data-end="1"] .-r {
        pointer-events: none;
        opacity: 0.5;
    }

    @media (max-width: 1319px) {
        #facility .cont-pd h2 {
            font-weight: 400 !important;
            font-size: 38px !important;
            line-height: 40px !important;
        }

        #facility-head-mob,
        #facility-wrap-mob {
            display: block;
        }

        #facility .info-tab {
            padding: 0 16px;
        }

        #facility .info-tabs-block-arrow {
            width: 16px;
        }

        .facility-ast {
            display: none;
        }

        .facility_alt-block {
            width: calc(100% / 3);
        }

        .facility_alt-text {
            padding-top: 8px;
        }

        .facility-menu-nav {
            padding-top: 20px;
        }

        .ft-fasi-title {
            padding-top: 44px;
        }

        #facility .item {
            background-size: cover;
        }

        #facility .facility-content-wrap .facility-rail-content .-desc {
            padding-top: 8px;
        }
    }
</style>

<script>
    function nextTabFacility(plus) {
        let i = document.querySelector('.facility-title-menu')
        let max = document.querySelector('.facility-title-menu').dataset.max
        let next = plus + parseInt(i.dataset.i)

        if (next >= max) {
            next = 0;
        }
        xconsolex.log(plus, 'nexttab func')
        i.dataset.i = next;
        i.style.setProperty('--i', next)


    }

    function navFacility(k) {
        let v = document.querySelector('#facility')
        let now = parseInt(v.dataset.i)
        let all = parseInt(v.dataset.g)
        let next = now + k

        if (next == all + 1) {
            next = 1;
        }
        if (next == 0) {
            next = all
        }

        setFacility(next)
    }

    function setFacility(next) {
        let v = document.querySelector('#facility')
        let rail = document.querySelector('#facility-rail').children
        v.dataset.i = next
        let end = parseInt(v.dataset.g)
        if (next == end) {
            v.dataset.end = 1
        } else {
            v.dataset.end = 0
        }
        v.style.setProperty('--i', next)

        document.querySelector('.facility-block.-active').classList.remove('-active')
        document.querySelectorAll('.facility-block')[next - 1].classList.add('-active')
        document.querySelector('.facility-nav-dot.-active').classList.remove('-active')
        document.querySelectorAll('.facility-nav-dot')[next - 1].classList.add('-active')

        document.querySelector('.facility-menu.-active').classList.remove('-active')
        document.querySelectorAll('.facility-menu')[next - 1].classList.add('-active')

    }


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
        xconsolex.log(breakPoint)
        if (breakPoint.length < 2) {
            $('.facility-menu-nav').style.setProperty('--fg-slot-shift', 0)
        }
    }
</script>
<style type="text/css">
    div[data-fasishow='hide'] {
        display: none;
    }

    .ft-faci {
        padding-bottom: 2rem;
    }
</style>
<section id="facility" class="is-on-nav is-on-nav-mob" data-i="1" data-g="<?php echo ofsize($content['facility']) ?>"
    style="--g:<?php echo ofsize($content['facility']) ?>;">
    <div class="-cont-pd section-fade facility-main-wrap">
        <div class="ft-faci" data-fasishow="<?= $content['hide_a'] ?>">
            <div class="cont-pd facility-title grid grid-cols-12">
                <div class="col-span-12 xl:col-start-2 xl:col-span-10">
                    <div class="grid grid-cols-12">
                        <h2 class="col-span-12 xl:col-span-6 text-center xl:text-left ft-fasi-title">
                            <?php pll_e('สิ่งอำนวยความสะดวก')?>
                        </h2>
                        <style>
                            .fac-arrow {
                                width: 24px;
                                height: 24px;
                                cursor: pointer;
                                transition: .5s;
                                background-image: var(--mc-chevron-up);
                                background-repeat: no-repeat;
                                background-size: contain;
                                cursor: pointer;
                                transition: .5s;
                                transform: rotate(90deg);
                                z-index: 9;
                                filter: grayscale(1);
                            }

                            .fac-arrow:hover {
                                filter: grayscale(0);
                            }

                            .fac-arrow.-left {
                                transform: rotate(-90deg);
                            }

                            .facility-menu-rail {
                                position: relative;
                                white-space: nowrap;
                                left: 0;
                                transition: all .5s ease-in-out;
                                transform: translateX(calc(var(--fg-slot-px) * -1px));
                            }

                            .facility-menu-nav[data-end="1"] .facility-menu-rail {
                                transform: translateX(calc(var(--fg-slot-px) * -1px + var(--fg-slot-shift)));
                            }

                            .facility-menu-nav[data-fg-slot="0"] .fac-arrow.-left {
                                opacity: 0;
                                pointer-events: none;
                            }

                            .facility-menu-nav[data-end="1"] .fac-arrow.-right {
                                opacity: 0;
                                pointer-events: none;
                            }


                            .facility-menu.-active {
                                color: var(--mc-tab-text-hover);
                                transition: .5s;
                            }

                            .facility-menu:hover {
                                color: var(--mc-tab-text-hover);
                                transition: .5s;
                            }

                            .facility-menu-nav {
                                position: relative;
                            }
                        </style>
                        <div class="col-span-12 xl:col-span-6">
                            <div class="facility-menu-nav col-span-12 xl:col-span-6 overflow-hidden flex items-center justify-between gap-2 h-full"
                            style="--fg-i:0;--fg-slot:0;--fg-slot-px:0" data-fg-slot="0">
                            <div onclick="changeFactNavSlot(-1)" class="fac-arrow -left"></div>
                            <div class="facility-menu-wrap scroll-hid w-full">
                                <div class="facility-menu-rail inline-flex relative h-full items-center ">
                                    <?php foreach ($content['facility'] as $key => $value) {
                                        ?>
                                        <div class="facility-menu <?= ($key == 0) ? '-active' : '' ?>"
                                            onclick="setFacility(<?= $key + 1 ?>)">
                                            <h6>
                                                <?= $value['title'] ?>
                                            </h6>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <div onclick="changeFactNavSlot(1)" class="fac-arrow -right"></div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .facility-ast {
                    position: absolute;
                    bottom: -310%;
                    right: 5rem;
                }

                .facility-ast img {
                    height: 110px;
                    width: auto;
                }
            }
        </style>
        <div class="facility-ast">
            <img src="/wp-content/uploads/2023/03/strutture..png" alt="">
        </div>
    </div>
    <div id="facility-wrap" class="relative">
        <div class="facility-arrow -r" onclick="navFacility(1)"></div>
        <div class="facility-arrow -l" onclick="navFacility(-1)"></div>
        <div id="facility-rail">
            <?php foreach ($content['facility'] as $key => $value) {
                ?>
                <div class="facility-block <?php echo ($key == 0) ? '-active' : '' ?>">
                    <div class="facility-item " style="background-image: url(<?= $value['image']['url'] ?>);">
                    </div>
                    <!-- <div class="facility-content" style="opacity : <?php echo ($key == 1) ? '1' : '0' ?>"> -->
                        <div class="facility-content">
                            <h3 class="facility_main-content-title">
                                <?= $value['title'] ?>
                            </h3>
                            <p class="facility_main-content-body">
                                <?= $value['description'] ?>
                            </p>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
            <div class="text-center">
                <div class="facility-nav">
                    <?php foreach ($content['facility'] as $key => $value) {
                        ?>
                        <div class="facility-nav-dot <?php echo ($key == 0) ? '-active' : '' ?>"
                            onclick="setFacility(<?= $key + 1 ?>)"></div>

                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <?php $data_max = ofsize($content['facility']) ?>
            <style>
                @media (max-width: 1319px) {
                    #facility-wrap {
                        display: none;
                    }
                }

                #facility-wrap-mob {
                    --width-default: 100vw;
                    --x: calc(-1 * var(--i) * var(--width-default) + var(--width-default));
                }

                .facility-wrap-mob {
                    width: 100%;
                    overflow: hidden;

                }

                .facility-rail-mob {
                    display: flex;
                    transition: .5s;
                    transform: translateX(var(--x));
                    padding-top: 24px;
                }

                .facility-item-mob {
                    /* padding: 0 8px; */
                    /* height: 250px; */
                    width: var(--width-default);
                }

                .facility-item-mob>.item {
                    /* background-color: #0fff08; */
                    width: var(--width-default);
                    aspect-ratio: 375/240;
                    /* aspect-ratio: 16/9; */
                }

                .facility-rail-content {
                    display: flex;
                    width: max-content;
                    transition: .5s;
                    transform: translateX(var(--x));
                }

                .facility-content-wrap {
                    width: 100%;
                    overflow: hidden;
                }

                .facility-body-mob {
                    padding: 2rem 2rem;
                    height: 160px;
                    width: var(--width-default);
                }

                .facility-body-mob h3.-txt {
                    font-weight: 400;
                    font-size: 40px;
                    line-height: 44px;
                }

                @media (max-width: 767px) {
                    .facility-body-mob {
                        padding: 2rem 1rem;
                    }
                }
            </style>
            <div id="facility-wrap-mob" data-max="<?= $data_max ?>" style="--max: <?= $data_max ?>;">
                <div class="facility-wrap-mob">
                    <div class="facility-rail-mob">
                        <?php foreach ($content['facility'] as $key => $value): ?>
                            <div data-i="<?= $key + 1 ?>" class="facility-item-mob">
                                <div class="item" style="background-image: url(<?= $value['image']['url'] ?>);"></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="facility-content-wrap">
                    <div class="facility-rail-content">
                        <?php foreach ($content['facility'] as $key => $value): ?>
                            <div data-i="<?= $key + 1 ?>" class="facility-body-mob">
                                <h3 class="-txt">
                                    <?= $value['title'] ?>
                                </h3>
                                <p class="-desc">
                                    <?= $value['description'] ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media (max-width: 767px) {
                #facility .info-tabs-block {
/*                    justify-content: left;*/
                }

                #facility .facility_alt-blocks {
                    overflow: visible;
                    height: auto;
                }

                #facility .facility_alt-block {
                    height: auto;
                }
            }
        </style>
        <div class="cont-pd grid grid-cols-12 pt-12 fasi-bd" data-fasishow="<?= $content['hide_b'] ?>">
            <?php if ($has_building): ?>
                <div class="col-span-12 col-start-1 xl:col-span-10 xl:col-start-2">
                    <h2 class="-title text-center"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h2>
                    <div class="text-center">
                        <div class="relative info-mar">
                            <div class="info-line"></div>
                            <div class="info-tabs-block -location-tabs-override">
                                <div class="info-tabs-block-arrow -left"></div>
                                <div class="info-tabs-blocks">
                                    <div class="info-tabs-rail">
                                        <?php
                                        foreach ($content['building'] as $key => $value) {
                                            ?>
                                            <div class="info-tab" data-tab="<?= $key + 1 ?>"
                                                onclick="fac_alt_change(this.dataset.tab)">
                                                <h6 class="info-tab-txt">
                                                    <?= $value['building_name'] ?>
                                                </h6>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="info-tabs-block-arrow -right"></div>
                            </div>
                        </div>
                    </div>
                    <div class="facility_alt-wrap">
                        <?php foreach ($content['building'] as $key => $value) {

                            ?>
                            <div class="facility_alt-blocks" data-tab="<?= $key + 1 ?>" data-show="0">
                                <?php
                                // pre($content['building']);

                                switch ($value['type']) {
                                    case 'text':
                                    foreach ($value['image_and_text'] as $key => $value):
                                        ?>
                                        <?php
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
                                            max-height: none;
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
            <?php endif; ?>
        </div>
    </div>
</section>
<script>

    function fac_alt_change(i) {
        // parseInt(i);
        if (document.querySelector('#facility .info-tabs-rail .info-tab.-active') != null) {
            document.querySelector('#facility .info-tabs-rail .info-tab.-active').classList.remove('-active')
        }
        if (document.querySelector('.facility_alt-blocks[data-show="1"]') != null) {
            document.querySelector('.facility_alt-blocks[data-show="1"]').dataset.show = '0';
        }
        document.querySelector(`#facility .info-tabs-rail .info-tab[data-tab="${i}"]`).classList.add('-active');
        document.querySelector(`.facility_alt-blocks[data-tab="${i}"]`).dataset.show = '1';
        xconsolex.log('fac_alt_change', i, typeof (i))
    }
    setTimeout(() => {
        fac_alt_change(1)
    }, 500)

    function faciCheckWidth() {
        let rail = document.querySelector('.facility-menu-rail')
        let wrap = document.querySelector('.facility-menu-wrap')
        rail_width = rail.clientWidth
        wrap_width = wrap.clientWidth
        if (rail_width < wrap_width) {
            $('.fac-arrow.-right').style.opacity = 0
        } else {
            $('.fac-arrow.-right').style.opacity = 1
        }
    }
    faciCheckWidth()
    window.addEventListener("resize", faciCheckWidth);
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    var el = $('#facility');
    var hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {
        if (el.dataset.i == undefined) {
            el.dataset.i = 0    
        }
        if (el.dataset.max == undefined) {
            el.dataset.max = $$('.facility-item-mob').length
        }
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
        i += di
        if (i>max) {
            i = 1
        }else if(i<1){
            i = max
        }
        $$('.facility-menu')[i-1].click()
    })
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