<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
$concept_max = ofsize($content['idea']);

$bg = acf_img($content['bg_img']);
$has_tour = 0;
if ($content['virtual_file']['ID'] != '') {
    $has_tour = 1;
}
if ($has_tour) {
    $url_360 = theme_gen_visual_tour($content);
}
?>
<script type="text/javascript">
    function navVideo(k, tnum) {
        let v = document.querySelector('.video-wrap.video-t' + tnum)
        let now = parseInt(v.dataset.i)
        let next = now + k
        let end = parseInt(v.dataset.g)
        if (next < 1) {
            next = end
        } else if (next > end) {
            next = 1
        }

        setVideo(next, tnum)
    }

    function setVideo(next, tnum) {
        let v = document.querySelector('.video-wrap.video-t' + tnum)
        let tab_body = $$('.video-tab-body')
        v.dataset.i = next
        tab_body[tnum].dataset.i = next
        let end = parseInt(v.dataset.g)
        if (next == end) {
            tab_body[tnum].dataset.end = 1
        }else{
            tab_body[tnum].dataset.end = 0
        }
        v.style.setProperty('--i', next)
        if (document.querySelector(`.video-t${tnum} .video-block.-active`) != null) {
            document.querySelector(`.video-t${tnum} .video-block.-active`).classList.remove('-active')
        }
        if (document.querySelector(`.video-t${tnum} .video-nav-dot.-active`) != null) {
            document.querySelector(`.video-t${tnum} .video-nav-dot.-active`).classList.remove('-active')
        }
        document.querySelector(`.video-t${tnum} .video-block[data-i="${next}"]`).classList.add('-active')
        document.querySelector(`.video-t${tnum} .video-nav-dot[data-i="${next}"]`).classList.add('-active')
        $$('.video-nav-wrap .-num .-count')[tnum].innerHTML = next.toLocaleString(undefined, {
            minimumIntegerDigits: 2,
            useGrouping: false
        });
    }
    // setVideo(0,0)
</script>
<section id="video" class="is-on-nav is-on-nav-mob">
    <div class="section-fade">
        <div class="mx-auto container text-white">
            <h2 class="text-center video-title"><?php pll_e('วิดีโอ')?></h2>
            <div class="text-center video-tabs-override-parent">
                <div class="video-tabs-override">
                    <div class="info-tabs-block" data-tab="0">
                        <div class="info-tabs-block-arrow -left"></div>
                        <div class="info-tabs-blocks">
                            <div class="info-tabs-rail">
                                <?php
                                foreach ($content['tab'] as $i => $v) {
                                    ?>
                                    <div class="-video info-tab" data-tab="<?= $i ?>" onclick="video_tab_change(<?= $i ?>)">
                                        <span class="info-tab-txt"><?= $v['tab_name'] ?></span>
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
        </div>

        <?php
        foreach ($content['tab'] as $i => $v) {
            $vid_group = 0;
            if ($v['video_or_virtual']=='video' || $v['video_or_virtual']=='') {
                $vid = $v['video'];
                if (is_array($vid)) {
                    $vid_group = ofsize($vid);
                }
            }else{
                $vid = $v['file_360'];
                $vid_group = 1;
            }
            ?>
            <div class="video-tab-body" data-end="0" data-i="1" data-tab="<?= $i ?>" data-showb="0">
                <div class="video-wrap video-t<?= $i ?>" data-i="1" data-g="<?= $vid_group ?>" style="--i:1;--g:<?= $vid_group ?>">
                    <div class="video-rail video-rail-<?=$v['video_or_virtual']?>">

                        <?php
                        if ($v['video_or_virtual']=='video' || $v['video_or_virtual']=='') {
                            foreach ($vid as $vi => $vv) {
                                ?>
                                <div data-i="<?= $vi + 1 ?>" class="video-block <?= ($vi == 0) ? '-active' : '' ?> " onclick="setVideo(<?= $vi + 1 ?>, <?= $i ?>)">
                                    <div class="video-item">
                                        <div class="bg-cover video-item-slider-slide-video" style="background-color:#000;">
                                            <div class="plyr-slider-wrap">
                                                <?= jb_ytplayer($vv['video_url'], 'slide_player_t' . $i . '_' . ($vi + 1), $vv['video_cover_image']['sizes']['large']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }else{
                            if ($vid['url'] != '') {
                                $url_360 = theme_gen_visual_tour($vid['url']);
                                ?>
                            </div>

                            <div class="container mx-auto tour_iframe_wrap">
                                <div class="tour_iframe_inner">
                                    <?php 
                                    if ($vid['url'] != '') {
                                        ?>
                                        <iframe src="<?=$url_360?>" class="tour_iframe"></iframe>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div>
                                <?php
                            }
                        }
                        ?>


                    </div>
                </div>
                <?php if ($vid_group > 1) : ?>
                    <style>
                        #video .video-nav-wrap {
                            padding-top: 24px;
                            display: grid;
                            grid-template-columns: auto 104px;
                            justify-content: end;
                            gap: 48px;
                        }

                        .video-nav-wrap .-num {
                            display: flex;
                            align-items: flex-end;
                        }

                        .video-nav-wrap .-num .-count {
                            color: var(--video--new_tab_block--item_text_hover_active);
                        }

                        .video-nav-wrap .-num .-max {
                            color: var(--video--new_tab_block--item_text);
                        }
                    </style>
                    <div class="container mx-auto">
                        <div class="video-nav-wrap -text-right">
                            <div class="-num">
                                <h1 class="-count">01</h1>
                                <h2 class="-max">/ <?= sprintf('%02d', $vid_group) ?></h2>
                            </div>
                            <div class="video-nav video-t<?= $i ?>">
                                <div class="video-nav-arrow -l" onclick="navVideo(-1,<?= $i ?>)">
                                    <!-- <div class="video-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div> -->
                                </div>
                                <?php
                                foreach ($vid as $vi => $vv) {
                                    ?>
                                    <div onclick="setVideo(<?= $vi + 1 ?>,<?= $i ?>)" data-i="<?= $vi + 1 ?>" class="video-nav-dot <?= ($vi == 0) ? '-active' : '' ?>"></div>
                                    <?php
                                }
                                ?>
                                <div class="video-nav-arrow -r" onclick="navVideo(1,<?= $i ?>)">
                                    <!-- <div class="video-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>

            <?php
        }
        ?>
        <?php
        if ($has_tour) {
            $i++;
            ?>
            <div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
                <div class="container mx-auto tour_iframe_wrap">
                    <div class="tour_iframe_inner">
                        <iframe src="<?= $url_360 ?>" class="tour_iframe"></iframe>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>
<script type="text/javascript">
    function video_tab_change(tab) {
        if ($('.-video.info-tab.-active') != null) {
            $('.-video.info-tab.-active').classList.remove('-active')
        }
        $(`.-video.info-tab[data-tab="${tab}"]`).classList.add('-active')

        if ($('.video-tab-body[data-showb="1"]') != null) {
            $('.video-tab-body[data-showb="1"]').dataset.showb = 0
        }
        $(`.video-tab-body[data-tab="${tab}"]`).dataset.showb = 1

    }
    setTimeout(() => {
        video_tab_change(0)
    }, 100)
</script>
