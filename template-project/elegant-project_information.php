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
<!--=== The Section Boxes : project-info ===-->
<section id="info" class="is-on-nav is-on-nav-mob">
    <div class="project-info-inner" style="background-image:url('<?= $content['background_image']['sizes']['1536x1536'] ?>');">
        <div class="container mx-auto section-fade" style="">
            <div class="text-center">
                <h1 class="title-info"><?php pll_e('ข้อมูลโครงการ')?></h1>
            </div>
            <sp style="height: 30px;"></sp>
            <div class="flex items-center justify-center">
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
                                    style="font-weight: 400;font-size: 24px;line-height: 32px; color: var(--project_information--color_swatch--heading_h2)">
                                    <?= $value['title'] ?></p>
                                    <p style="color: var(--project_information--color_swatch--body_text)">
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
                                class="long-hover px-5 text-center py-1 pointer flex flex-row items-center justify-center file-button">
                                <img src="/wp-content/uploads/2023/02/Download.png"
                                style="width: 24px;height: 24px;margin:0;margin-right: 8px;"><?php pll_e('ดาวน์โหลดเพิ่มเติม')?>
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($content['more_condition'] != ''): ?>
                        <a  target="_blank" href=" <?= $content['more_condition'][0]->guid ?>" class="inline-block"
                            target="_blank">
                            <div
                            class="long-hover px-5 text-center py-1 pointer flex flex-row items-center justify-center file-button">
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