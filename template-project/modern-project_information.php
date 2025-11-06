<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
?>

<section id="info" class="section-fade is-on-nav is-on-nav-mob" data-active="">
    <div>
        <div class="container mx-auto">
            <div class="text-center">
                <h2 class=""><?php pll_e('ข้อมูลโครงการ')?></h2>
            </div>
            <sp style="height: 10px;"></sp>

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
            <div class="center w-full info-tabs-line-block" style=""></div>
            <div class="info-inner">
                <div id="info-block" class="" data-active="0">
                    <div class="">
                        <img src="<?= acf_img($content['information_image']) ?>" class="info-img">
                    </div>
                    <div class="">
                        <div id="info-detail-wrap">
                            <div>
                                <div id="info-detail">
                                    <div style="display: none;"><?php  pre($content); ?></div>

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
                    <div id="info-progress" class="">
                        <div class="progress-title-wrap">
                            <div class="">
                                <div class="main-progress"></div>
                            </div>
                            <div class="progress-title">
                                <h3><?php pll_e('ภาพรวม')?></h3>
                                <h6 class=""><?= $content['overall'] ?></h6>
                            </div>
                        </div>
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