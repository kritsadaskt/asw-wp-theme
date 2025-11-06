<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);

$has_building = 1;
if (is_array($content['building']) == null) {
    $has_building = 0;
}
$show_a = true;
if ($content['hide_a'] == 'hide') {
    $show_a = false;
}
$facSize = 0;
if (is_array($content['facility'])) {
    $facSize = ofsize($content['facility']);
}
if ($content['hide_b'] == 'hide') {
    $has_building = 0;
}
?>
<div id="facility" class="is-on-nav is-on-nav-mob">
    <?php if ($show_a): ?>
        <section id="facility_main" data-fact-items="<?= $facSize ?>">

            <div class="section-fade facility-menu-nav" data-fg-slot="0" data-is-side="start" style="--fg-i:0;--fg-slot:0;--fg-slot-px:0">
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
<?php endif ?>
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
                                $falt_over_image = acf_img($value['overall_image']);
                                $falt_over_image_mob = acf_img($value['overall_image_mobile']);
                                if ($falt_over_image_mob == '') {
                                    $falt_over_image_mob = $falt_over_image;
                                }
                                ?>
                                <style>
                                    .facility_alt-blocks {
                                        margin-bottom: 78px;
                                        height: auto;
                                    }
                                </style>
                                <div class="-facility_alt-block">
                                    <img class="hidden xl:block" src="<?= $falt_over_image ?>">
                                    <img class="block xl:hidden" src="<?= $falt_over_image_mob?>">
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