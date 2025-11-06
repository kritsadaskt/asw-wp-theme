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
if ($content['hide_b'] == 'hide') {
    $has_building = 0;
}

$facSize = ofsize($content['facility']);

?>

<!-- Desktop -->
<section id="facility" class="section-fade -hidden -xl:block is-on-nav is-on-nav-mob"
style="--i: 0; --max: <?= $facSize ?>">
<?php if ($content['hide_a'] != 'hide'): ?>
    <div>
        <div id="d-fac" class="grid-cols-12 hidden xl:grid facility-menu-nav" data-is-side="start"
        style="--fg-i:0;--fg-slot:0;--fg-slot-px:0">
        <div id="facility-content" class="col-span-4">
            <div class="text-white- bg-number-facility">01</div>
            <div class="-px-16">
                <h2 class="p-facility"><?php pll_e('สิ่งอำนวย')?><br><?php pll_e('ความสะดวก')?></h2>
                <div class="facility-content-wrap">
                    <h2 class="p-page-facility">
                        <span class="facility-text-counter">01</span><span class="facility-text-number">/
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
            <div id="fac-images" class="col-span-8">
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

<div id="facility_alt" class="container mx-auto" style="padding-top:71px;">
    <?php if ($has_building): ?>
        <div class="text-center">
            <h1 class="p-facility another-facility"><?php pll_e('สิ่งอำนวยความสะดวกอื่นๆ')?></h1>
        </div>
        <sp style="height: 20px;"></sp>
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