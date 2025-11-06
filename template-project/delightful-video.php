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
                    <h2 class="title-alt text-center"><?php pll_e('วิดีโอ')?></h2>
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
                $video_size = 0;
                if ($value['video_or_virtual']=='video' || $value['video_or_virtual']=='') {
                    $vid = $value['video'];
                    if (is_array($vid)) {
                        $video_size = ofsize($vid);
                    }
                }else{
                    $vid = $value['file_360'];
                    $video_size = 1;
                }
                ?>
                <div class="video-tab-wrap" class="relative" data-tab="<?= $key + 1 ?>" data-show="<?php echo ($key == 0) ? '1' : '0' ?>">
                    <div id="video-wrap" data-i="1" data-g="<?= $video_size ?>" style="--i:1;--g:<?= $video_size ?>">
                        <?php 
                        if ($value['video_or_virtual']=='video' || $value['video_or_virtual']=='') {
                            ?>
                            
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
                            <?php 
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