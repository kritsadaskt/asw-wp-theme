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
        background-color: #2F6861;
        background-size: cover;
        background-position: top;
        padding-bottom: 66px;
    }

    h2.text-center {
        color: var(--mc-main-5);
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
        transition: left .5s ease-in-out, width .5s ease-in-out, opacity .5s;
        opacity: .5;
    }

    .video-block.-active {
        width: 50vw;
        opacity: 1;
    }

    .video-item {
        background-color: #222;
        /* border-radius: 16px; */
        overflow: hidden;
        aspect-ratio: 16/9;
    }

    .video-nav {
        display: inline-flex;
        height: 48px;
        /* margin-top: 36px; */
        justify-content: center;
        align-items: center;
    }

    .video-nav-arrow {
        background-image: var(--mc-arrow-up);
        background-color: var(--mc-main-1);
        width: 48px;
        height: 48px;
        border-radius: 4px;
        background-size: 17px;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        cursor: pointer;
        transition: .5s ease-in-out;
    }

    .video-nav-arrow:hover {
        background-color: var(--mc-main-2);
    }

    .video-nav-arrow.-r {
        margin-left: 4px;
        transform: rotate(90deg);
    }

    .video-nav-arrow.-l {
        margin-right: 4px;
        transform: rotate(-90deg);
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
        max-width: 800px;
        width: max-content;
        margin: auto;
    }

    .tour_iframe_wrap {
        max-width: 900px !important;
        margin-top: 32px;
    }

    .tour_iframe_inner {

        padding-top: 56.25%;
        position: relative;
    }

    .tour_iframe {
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
        height: 100%;
        aspect-ratio: 4 / 3;
    }
    #video .video-tab-body[data-i="1"] .container .video-nav .-l {
        opacity: 0.5;
        pointer-events: none;
    }
    #video .video-tab-body[data-end="1"] .container .video-nav .-r {
        opacity: 0.5;
        pointer-events: none;
    }

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        .video-title{
            font-weight: 400;
            font-size: 38px !important;
            line-height: 40px;
        }
        #video {
            padding-top: 32px;
            padding-bottom: 32px;
        }

        #video .mx-auto.container.text-white {
            padding: 0 1rem;
        }

        .video-tabs-override {
            max-width: 100%;
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

        #video .video-nav-wrap {
            padding-right: 16px;
            grid-template-columns: auto !important;
        }

        .video-nav-wrap .video-nav {
            display: none;
        }

    }

    #video .info-tabs-block {
        background-color: transparent;
        border: 0;
        border-radius: 0;
    }

    .video-nav-dot {
        display: none;
    }

    .video-tabs-override-parent {
        border-bottom: 1px solid var(--mc-tab-border-cl);
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
            <h2 class="text-center video-title">วิดีโอ</h2>
            <div class="text-center video-tabs-override-parent">
                <style>
                    #video .info-tabs-block-wrap {
                        width: 100%;
                    }

                    #video .info-tabs-block {
                        justify-content: center;
                    }

                    #video .info-tab {
                        padding: 0 22px;
                        white-space: nowrap;
                    }

                    #video .info-tab-txt {
                        padding: 0;
                        font-size: 26px;
                        line-height: 32px;
                        font-weight: 400;
                    }

                    #video .info-tab.-active .info-tab-txt::after {
                        opacity: 1;
                    }

                    #video .info-tab-txt::after {
                        content: "•";
                        margin-left: 5px;
                        opacity: 0;
                        transition: .3s;
                    }

                    @media (max-width: 1319px) {
                        #video .info-tabs-block {
                            justify-content: left;
                        }

                    }
                </style>
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
                                <?php
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

        <?php
        foreach ($content['tab'] as $i => $v) {
            if ($v['video_or_virtual']=='video') {
                $vid = $v['video'];
            }else{
                $vid = $v['virtual'];
            }
            if (is_array($vid)) {
                $vid_group = ofsize($vid);
            } else {
                $vid_group = 0;
            }
            ?>
            <div class="video-tab-body" data-end="0" data-i="1" data-tab="<?= $i ?>" data-showb="0">
                <div class="video-wrap video-t<?= $i ?>" data-i="1" data-g="<?= $vid_group ?>" style="--i:1;--g:<?= $vid_group ?>">
                    <div class="video-rail">

                        <?php
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
                            color: var(--text-color);
                        }

                        .video-nav-wrap .-num .-max {
                            color: var(--mc-main-3);
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
<?php theme_overide_style($content) ?>