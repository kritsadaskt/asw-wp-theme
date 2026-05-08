<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);

$bg = acf_img($content['bg_img']);
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
        v.dataset.i = parseInt(next)
        v.style.setProperty('--i', next)
        let end = parseInt(v.dataset.g)
        if (next == end) {
            v.dataset.end = 1
        } else {
            v.dataset.end = 0
        }
        if (document.querySelector(`.video-t${tnum} .video-block.-active`) != null) {
            document.querySelector(`.video-t${tnum} .video-block.-active`).classList.remove('-active')
        }
        if (document.querySelector(`.video-t${tnum} .video-nav-dot.-active`) != null) {
            document.querySelector(`.video-t${tnum} .video-nav-dot.-active`).classList.remove('-active')
        }
        document.querySelector(`.video-t${tnum} .video-block[data-i="${next}"]`).classList.add('-active')
        document.querySelector(`.video-t${tnum} .video-nav-dot[data-i="${next}"]`).classList.add('-active')
    }
</script>
<section id="video" class="is-on-nav is-on-nav-mob">
    <div class="section-fade">
        <div class="mx-auto container text-white">
            <h1 class="title-alt text-center"><?php pll_e('วิดีโอ')?></h1>
            <div class="text-center">
                <div class="video-tabs-override">

                    <div class="info-tabs-block-wrap">
                        <div class="info-tabs-block" data-tab="0">
                            <div class="info-tabs-block-arrow -left"></div>
                            <div class="info-tabs-blocks">
                                <div class="info-tabs-rail">
                                    <?php
                                    foreach ($content['tab'] as $i => $v) {
                                        ?>
                                        <div class="-video info-tab" data-tab="<?= $i ?>"
                                            onclick="video_tab_change(<?= $i ?>)">
                                            <span class="info-tab-txt">
                                                <?= $v['tab_name'] ?>
                                            </span>
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
        </div>

        <?php
        foreach ($content['tab'] as $i => $v) {
            $vid_group = 0;
            if ($v['video_or_virtual'] == 'video' || $v['video_or_virtual'] == '') {
                $vid = $v['video'];
                if (is_array($vid)) {
                    $vid_group = ofsize($vid);
                }
            } else {
                $vid = $v['file_360'];
                $vid_group = 1;
            }
            ?>
            <div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
                <div class="video-wrap video-t<?= $i ?>" data-i="1" data-g="<?= $vid_group ?>"
                    style="--i:1;--g:<?= $vid_group ?>">
                    <div class="video-rail video-rail-<?= $v['video_or_virtual'] ?>">

                        <?php
                        if ($v['video_or_virtual'] == 'video' || $v['video_or_virtual'] == '') {
                            foreach ($vid as $vi => $vv) {
                                ?>
                                <div data-i="<?= $vi + 1 ?>" class="video-block <?= ($vi == 0) ? '-active' : '' ?> ">
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
                        } else {
                            if ($vid['url'] != '') {
                                $url_360 = theme_gen_visual_tour($vid['url']);
                                ?>
                            </div>

                            <div class="container mx-auto tour_iframe_wrap">
                                <div class="tour_iframe_inner">
                                    <?php
                                    if ($vid['url'] != '') {
                                        ?>
                                        <iframe src="<?= $url_360 ?>" class="tour_iframe"></iframe>
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


                <?php if ($vid_group > 1): ?>
                    <div class="text-center">
                        <div class="video-nav video-t<?= $i ?>">
                            <div class="video-nav-arrow -l" onclick="navVideo(-1,<?= $i ?>)">
                                <div class="video-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
                            </div>
                            <?php
                            foreach ($vid as $vi => $vv) {
                                ?>
                                <div onclick="setVideo(<?= $vi + 1 ?>,<?= $i ?>)" data-i="<?= $vi + 1 ?>"
                                    class="video-nav-dot <?= ($vi == 0) ? '-active' : '' ?>"></div>
                                <?php
                            }
                            ?>
                            <div class="video-nav-arrow -r" onclick="navVideo(1,<?= $i ?>)">
                                <div class="video-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
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