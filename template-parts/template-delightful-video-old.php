<?php
$content = $args[0];
$f = $args[1];
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
    padding-top: 68px;
    background-size: cover;
    background-position: top;
    padding-bottom: 66px;
    
}

#video .info-tab-wrap:after {
    background-color: #423C2A;
}

#video .info-line {
    background-color: #423C2A;
}

#video-wrap {
    /* margin-top: 32px; */
    overflow: hidden;
    position: relative;
    --i: 1;
    --g: 3;
    --j: calc(((var(--i) + 0) * 3) - 4.2);
}

.video-block .plyr-slider-wrap {
    opacity: .7;
    transition: all .3s;
}

.video-block.-active .plyr-slider-wrap {
    opacity: 1;
}

#video-rail {
    display: flex;
    justify-content: center;
    align-items: center;
    width: calc(70vw + ((var(--g) - 1) * 37.5vw));
    position: relative;
    transition: left .5s;
    left: calc((-12.5vw * (var(--j))));
    height: 30vw;
}

.video-block {
    width: 37.5vw;
    display: inline-block;
    padding: 0 8px;
    transition: left .5s, width .5s;
}

.video-block.-active {
    width: 55vw;
}

.video-item {
    background-color: #222;
    /* border-radius: 16px; */
    overflow: hidden;
    aspect-ratio: 16/9;
    /*				background-image: linear-gradient(90deg,yellow,yellow 50%,red 50%,red);*/
}

.video-nav {
    display: inline-flex;
    /* height: 48px; */
    margin-top: 32px;
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
}

.video-nav-arrow.-r {
    position: absolute;
    /* margin-left: 24px; */
    right: 177px;
    width: 60px;
    height: 60px;
    z-index: 99;
    top: calc(50% + 1.5rem);
    transform: rotate(90deg) scale(1);
}

.video-nav-arrow.-l {
    position: absolute;
    /* margin-right: 24px; */
    left: 177px;
    width: 60px;
    height: 60px;
    z-index: 99;
    top: calc(50% + 1.5rem);
    transform: rotate(270deg) scale(1);
}

.video-nav-dot {
    width: 8px;
    height: 8px;
    background: var(--text-color);
    box-shadow: inset 0px 1px 4px rgba(0, 0, 0, 0.25);
    border-radius: 100%;
    margin-right: 12px;
    transition: all .3s;
    cursor: pointer;
}

.video-nav-dot.-active {
    background: var(--mc-main-1) !important;
    width: 20px !important;
    border-radius: 20px !important;
}

.video-tab-wrap[data-show="0"] {
    display: none;
}

.video-tab-wrap[data-show="1"] {
    display: block;
}

#video .info-tabs-block {
    box-shadow: 0px -1.7px 0px -1px var(--mc-tab-border-cl) inset;
}

#video .info-tab.-active .info-tab-txt {
    border-bottom: 4px solid var(--mc-tab-text-hover);
    color: var(--mc-tab-text-hover);
    transition: .5s;
}
#video .info-tab .info-tab-txt {
    border-bottom: 4px solid transparent;
    transition: .5s;
}

#video .info-tab:hover {
    color: var(--mc-tab-text-hover);
    transition: all .5s;
}

#video .info-tab:after {
    background-color: var(--mc-tab-border-cl);

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
#video .info-tab {
    padding: 0 40px;
}
#video .info-tab-txt{
    padding: 0;
}
#video-wrap[data-i="1"] ~ div .-l {
    pointer-events: none;
    opacity: 0.5;
}
#video-wrap[data-end="1"] ~ div .-r {
    pointer-events: none;
    opacity: 0.5;
}
@media (max-width: 1319px) {
    #video .title-alt {
        font-weight: 400 !important;
        font-size: 38px !important;
        line-height: 40px !important;
    }

    #video .info-mar {
        margin-top: 0;
    }

    #video #video-rail {
        height: 50vw;
        width: calc(90vw + ((var(--g) - 1) * 50vw));
        left: calc(-50vw * (var(--i) - 1) + 5vw);
    }

    #video .info-tab-wrap {
        padding: 0 8px;
    }

    #video .video-nav-arrow {
        display: none;
    }

    #video .video-block.-active {
        width: 90vw;
    }

    #video .video-block {
        width: 50vw;
    }
    #video{
        padding-top: 48px;
    }
    #video .info-tab {
        padding: 0 16px;
    }
    #video .info-tabs-block{
        border-bottom: none;
        box-shadow: 0px -1.7px 0px -1px var(--mc-tab-border-cl) inset;
    }


}
</style>
<script type="text/javascript">
    function navVideo(k, tab) {
        let v = document.querySelector(`.video-tab-wrap[data-tab='${tab}'] #video-wrap`)
        xconsolex.log(v.parentNode, tab)
        let now = parseInt(v.dataset.i)
        let all = parseInt(v.dataset.g)

        let next = now + k

        if (next == all + 1) {
            next = 1;
        }
        if (next == 0) {
            next = all
        }
        setVideo(next, tab)
    }

    function setVideo(next, tab) {
        let v = document.querySelector(`.video-tab-wrap[data-tab='${tab}'] #video-wrap`)
        v.dataset.i = next
        v.style.setProperty('--i', next)
        let end = parseInt(v.dataset.g)
        if (next == end) {
            v.dataset.end = 1
        }else{
            v.dataset.end = 0
        }
        document.querySelector(`.video-tab-wrap[data-tab='${tab}'] .video-block.-active`).classList.remove('-active')
        document.querySelectorAll(`.video-tab-wrap[data-tab='${tab}'] .video-block`)[next - 1].classList.add('-active')
        document.querySelector(`.video-tab-wrap[data-tab='${tab}'] .video-nav-dot.-active`).classList.remove('-active')
        document.querySelectorAll(`.video-tab-wrap[data-tab='${tab}'] .video-nav-dot`)[next - 1].classList.add('-active')
    }
</script>
<section id="video" class="is-on-nav is-on-nav-mob">
    <div class="section-fade">
        <div class="cont-pd">
            <div class="grid grid-cols-12">
                <div class="col-span-12 xl:col-start-2 xl:col-span-10">
                    <h2 class="title-alt text-center">วิดีโอ</h2>
                    <div class="text-center">
                        <div class="relative info-mar">
                            <div class="info-tabs-block -location-tabs-override">
                                <div class="info-tabs-block-arrow -left"></div>
                                <div class="info-tabs-blocks">
                                    <div class="info-tabs-rail">
                                        <?php
                                        foreach ($content['tab'] as $key => $value) {
                                            ?>
                                            <div class="info-tab" data-tab="<?= $key + 1 ?>" onclick="vdo_change(this.dataset.tab)">
                                                <h6 class="info-tab-txt">
                                                    <?= $value['tab_name'] ?></h6>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <?php
                                            if ($has_tour) {
                                                $key++;
                                                ?>
                                                <div class="info-tab" data-tab="<?= $key + 1 ?>" onclick="vdo_change(<?= $key + 1 ?>)">
                                                    <h6 class="info-tab-txt">
                                                        <?= $content['virtual_title'] ?>
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
                    </div>
                </div>
            </div>
            <?php foreach ($content['tab'] as $key => $value) {
                $vid = $value['video'];

                if (is_array($vid)) {
                    $vid_group2 = ofsize($vid);
                } else {
                    $vid_group2 = 0;
                }
                $video_size = $vid_group2;
                ?>
                <div class="video-tab-wrap" class="relative" data-tab="<?= $key + 1 ?>" data-show="<?php echo ($key == 0) ? '1' : '0' ?>">
                    <div id="video-wrap" data-i="1" data-g="<?= $video_size ?>" style="--i:1;--g:<?= $video_size ?>">
                        <div id="video-rail">
                            <?php foreach ($value['video'] as $keyy => $video) { ?>
                                <div class="video-block <?php echo ($keyy == 0) ? '-active' : '' ?>">
                                    <div class="video-item">
                                        <div class="bg-cover video-item-slider-slide-video" style="background-color:#000;">
                                            <div class="plyr-slider-wrap">
                                                <?= jb_ytplayer($video['video_url'], 'slide_player_' . $key . '_' . ($keyy + 1), $video['video_cover_image']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($video_size > 1) : ?>
                        <div class="text-center">
                            <div class="video-nav video-nav-tab-<?= $key + 1 ?>">
                                <div class=" video-nav-arrow -l" onclick="navVideo(-1, <?= $key + 1 ?>)"></div>
                                <div class="video-nav-arrow -r" onclick="navVideo(1, <?= $key + 1 ?>)"></div>
                                <?php foreach ($value['video'] as $keyy => $video) { ?>
                                    <div onclick="setVideo(<?= $keyy + 1 ?>, <?= $key + 1 ?>)" class="video-nav-dot <?php echo ($keyy == 0) ? '-active' : '' ?>"></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php } ?>
            <?php
            if ($has_tour) {
                $key++;
                ?>
                <div class="video-tab-wrap" class="relative" data-tab="<?= $key + 1 ?>" data-show="<?php echo ($key == 0) ? '1' : '0' ?>">
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
    <script>
        function vdo_change(i) {
            if (document.querySelector('#video .info-tabs-block .info-tab.-active') != undefined) {
                document.querySelector('#video .info-tabs-block .info-tab.-active').classList.remove('-active')
            }
            if (document.querySelector('.video-tab-wrap[data-show="1"]')) {
                document.querySelector('.video-tab-wrap[data-show="1"]').dataset.show = 0
            }
            document.querySelector(`#video .info-tabs-block .info-tab[data-tab='${i}']`).classList.add('-active');
            document.querySelector(`.video-tab-wrap[data-tab='${i}']`).dataset.show = '1';
            xconsolex.log(i)
        }
        vdo_change(1)
    </script>
    <?php theme_overide_style($content) ?>