<?php
$content = $args[0];
$f = $args[1];
$bg = acf_img($content['bg_img']);
$has_tour = 0;
if ($content['virtual_file']['ID'] != '') {
    $has_tour = 1;
}
if ($has_tour) {
    $url_360 = theme_gen_visual_tour($content);
}
?>
<style type="text/css">
    #video {
        background-size: cover;
        background-image: url('<?= $bg ?>');
        padding-top: 68px;
        background-color: #001B28;
        background-size: cover;
        background-position: top;
        padding-bottom: 66px;
    }

    .title-alt {
        font-weight: 400;
        font-size: 56px;
        line-height: 56px;
        color: #FFFFFF;
        -webkit-text-stroke: 1px var(--mc-main-1);
        text-shadow: 0px 1px 12px var(--mc-main-5);
    }

    .video-wrap {
        margin-top: 32px;
        overflow: hidden;
        --i: 1;
        --g: 3;
        --j: calc(((var(--i) + 0)*3) - 5);
    }

    .video-rail {
        display: flex;
        justify-content: center;
        align-items: center;
        /*gap: 16px;*/
        width: calc(50vw + ((var(--g) - 1) * 37.5vw));
        position: relative;
        transition: left 1s cubic-bezier(0.01, 0.85, 0.15, 1.24);
        transition: left .5s ease-in-out;
        /*left: calc((-12.5vw * (var(--i) + 1)) + (-25vw * var(--i)));*/
        left: calc((-12.5vw * (var(--j))));
        height: 28vw;
    }

    .video-block {
        width: 37.5vw;
        display: inline-block;
        padding: 0 8px;
        transition: left .5s ease-in-out, width .5s ease-in-out;
    }

    .video-block.-active {
        width: 50vw;
    }

    .video-item {
        background-color: #222;
        border-radius: 16px;
        overflow: hidden;
        aspect-ratio: 16/9;
    }

    .video-nav {
        display: inline-flex;
        height: 48px;
        margin-top: 36px;
        justify-content: center;
        align-items: center;
    }

    .video-nav-arrow {
        background-image: var(--mc-arrow-up);
        width: 48px;
        height: 100%;
        background-size: cover;
        position: relative;
        cursor: pointer;
        transition: all .2s;
    }

    .video-nav-arrow.-r {
        margin-left: 24px;
        transform: rotate(90deg) scale(1.4);
    }

    .video-nav-arrow.-l {
        margin-right: 24px;
        transform: rotate(-90deg) scale(1.4);
    }

    .video-nav-dot {
        background-color: #fff;
        width: 8px;
        height: 8px;
        border-radius: 100%;
        margin: 0 18px;
        transition: all .3s;
        border: 0px solid var(--mc-main-1);
        box-shadow: 0px 0px 0px var(--mc-main-5);
        cursor: pointer;
    }

    .video-nav-dot.-active {
        width: 12px;
        height: 12px;
        border: 1px solid var(--mc-main-1);
        box-shadow: 0px 1px 12px var(--mc-main-5);
    }

    .video-hov-glow {
        position: absolute;
        top: 16.5%;
        left: 16.5%;
        opacity: 0;
    }

    .video-nav-arrow:hover .video-hov-glow {
        opacity: 0.1;
    }

    .plyr__poster {
        background-size: cover !important;
    }
    .video-tabs-override {
        /*        max-width: 800px;*/
        /*        width: max-content;*/
        /*        margin: auto;*/
    }
    .tour_iframe_wrap{
        max-width: 900px !important;
        margin-top: 32px;
    }
    .tour_iframe_inner{

        padding-top: 56.25%;
        position: relative;
        border-radius: 16px;
        overflow: hidden;
    }
    .tour_iframe{
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
        height: 100%;
        aspect-ratio: 4 / 3;
    }
    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        #video {
            padding-top: 32px;
            padding-bottom: 32px;
        }
        .video-nav-arrow {
            display: none;
        }
        .video-block.-active {
            width: 90vw;
        }
        .video-rail {
            height: 50vw;
            width: calc(90vw + ((var(--g) - 1) * 50vw));
            left: calc(-50vw * (var(--i) - 1) + 5vw);
        }
        .video-block {
            width: 50vw;
        }
        .title-alt {
            font-weight: 400;
            font-size: 40px;
            line-height: 40px;
            color: #FFFFFF;
            -webkit-text-stroke: 1px #E81E57;
            text-shadow: 0px 1px 12px #f84577;
        }
    }

    .video-wrap[data-i="1"] ~ div .-l {
        opacity: .5;
        pointer-events: none;
    }
    .video-wrap[data-end="1"] ~ div .-r {
        opacity: .5;
        pointer-events: none;
    }
</style>
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
        }else{
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
            <h1 class="title-alt text-center">วิดีโอ</h1>
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
                                        <div class="-video info-tab" data-tab="<?= $i ?>" onclick="video_tab_change(<?= $i ?>)">
                                            <span class="info-tab-txt"><?= $v['tab_name'] ?></span>
                                        </div>
                                        <?php
                                    }
                                    if ($has_tour) {
                                        $i++;
                                        ?>
                                        <div class="-video info-tab" data-tab="<?= $i ?>" onclick="video_tab_change(<?= $i ?>)">
                                            <span class="info-tab-txt"><?= $content['virtual_title'] ?></span>
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
            if ($v['video_or_virtual']=='video') {
                $vid = $v['video'];
            }else{
                $vid = $v['virtual'];
            }
            $vid_group = 0;
            if (is_array($vid)) {
                $vid_group = sizeof($vid);
            }
            ?>
            <div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
                <div class="video-wrap video-t<?= $i ?>" data-i="1" data-g="<?= $vid_group ?>" style="--i:1;--g:<?= $vid_group ?>">
                    <div class="video-rail">

                        <?php
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
                        ?>
                    </div>
                </div>
                <?php if ($vid_group > 1) : ?>
                    <div class="text-center">
                        <div class="video-nav video-t<?= $i ?>">
                            <div class="video-nav-arrow -l" onclick="navVideo(-1,<?= $i ?>)">
                                <div class="video-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
                            </div>
                            <?php
                            foreach ($vid as $vi => $vv) {
                                ?>
                                <div onclick="setVideo(<?= $vi + 1 ?>,<?= $i ?>)" data-i="<?= $vi + 1 ?>" class="video-nav-dot <?= ($vi == 0) ? '-active' : '' ?>"></div>
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
        if ($has_tour) {
            $i++;
            ?>
            <div class="video-tab-body" data-tab="<?= $i ?>" data-showb="0">
                <div class="container mx-auto tour_iframe_wrap">
                    <div class="tour_iframe_inner">
                        <iframe src="<?=$url_360?>" class="tour_iframe"></iframe>
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