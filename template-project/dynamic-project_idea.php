<?php 
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
$idea_max = ofsize($content['idea']);
?>
<script type="text/javascript">
    function concept_change(i) {
        let section = document.querySelector('#concept')
        section.dataset.i = i
        let max = parseInt(section.dataset.max)
        if (document.querySelector(`.concept-node[data-show="1"]`) != undefined) {
            document.querySelector(`.concept-node[data-show="1"]`).dataset.show = 0
            document.querySelector(`.concept-nav-dot.-active`).classList.remove('-active')
        }
        document.querySelector(`.concept-node[data-i="${i}"]`).dataset.show = 1
        document.querySelector(`.concept-nav-dot[data-i="${i}"]`).classList.add('-active')
        let pic = document.querySelectorAll(`.concept-idea-picture`)
        for (let j = 0; j < max; j++) {
            if (j < i) {
                pic[j].dataset.show = 'top'
            } else if (j == i) {
                pic[j].dataset.show = 'center'
            } else {
                pic[j].dataset.show = 'bottom'
            }
        }
    }

    function concept_change_arrow(plus) {
        let section = document.querySelector('#concept')
        let now = parseInt(section.dataset.i)
        let end = parseInt(section.dataset.max) - 1
        let next = now + plus
        if (next < 0) {
            next = end
        } else if (next > end) {
            next = 0
        }
        concept_change(next)
    }
</script>
<section id="concept" class="is-on-nav is-on-nav-mob" data-i="0" data-max="<?= $idea_max ?>">
    <div class="container mx-auto section-fade">

        <div id="concept-content-wrap">
            <div id="concept-nav">
                <div class="concept-nav-arrow" onclick="concept_change_arrow(-1)">
                    <div class="hov-glow w-11 h-11 rounded-full bg-white"></div>
                </div>
                <?php
                for ($i = 0; $i < $idea_max; $i++) {
                    echo '<div onclick="concept_change(' . ($i) . ')" data-i="' . ($i) . '" class="concept-nav-dot"></div>';
                }
                ?>
                <div class="concept-nav-arrow arrow-down" onclick="concept_change_arrow(1)">
                    <div class="hov-glow w-11 h-11 rounded-full bg-white"></div>
                </div>

            </div>
            <div id="concept-content">
                <div class="grid grid-cols-12 gap-x-16" id="concept-inner">
                    <div class="col-span-7">
                        <div class="theme-title" style="position: relative;z-index: 10;">
                            <span class="title-c"><?php pll_e('แนวคิดโครงการ')?></span>
                            <span class="title-b"><?php pll_e('แนวคิดโครงการ')?></span>
                            <h2 class="title-a"><?php pll_e('แนวคิดโครงการ')?></h2>
                        </div>
                        <div id="concept-idea-picture-wrap">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div data-i="<?= $i ?>"
                                    style="background-image:url('<?= $content['idea'][$i]['background_image']['sizes']['large'] ?>')"
                                    class="concept-idea-picture" data-show="bottom">
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-span-5 text-white" id="concept-content">
                        <div id="concept-content-glass"></div>
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            ?>
                            <div data-i="<?= $i ?>" class="concept-node" data-show="0">
                                <h2 class="concept-content-title">
                                    <?= $content['idea'][$i]['title'] ?>
                                </h2>
                                <h5 class="concept-content-subtitle">
                                    <?= $content['idea'][$i]['sub_title'] ?>
                                </h5>
                                <p class="concept-content-body">
                                    <?= $content['idea'][$i]['description'] ?>
                                </p>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="concept-content-wrap-mob">
            <div class="xl:px-4 xl:py-12 px-4 pt-16 pb-6">
                <div class="theme-title" style="position: relative;z-index: 10;">
                    <span class="title-c"><?php pll_e('แนวคิดโครงการ')?></span>
                    <span class="title-b"><?php pll_e('แนวคิดโครงการ')?></span>
                    <h2 class="title-a"><?php pll_e('แนวคิดโครงการ')?></h2>
                </div>
            </div>
            <div class="concept-mob-body" data-end="" data-max="<?= $idea_max ?>" data-i="0"
                style="--max:<?= $idea_max ?>;--i:0;">
                <div class="concept-mob-body-glass"></div>
                <div class="-pic-wrap">
                    <div class="-pic-rail">
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            $mob_bg = $content['idea'][$i]['background_image_mobile']['sizes']['large'];
                            if ($mob_bg == '') {
                                $mob_bg = $content['idea'][$i]['background_image']['sizes']['large'];
                            }
                            ?>
                            <div data-i="<?= $i ?>" class="-pic-item">
                                <!-- <div style="background-image:url('<?= $mob_bg ?>')" class="-p" onclick="conceptMobile_change(<?= $i ?>)"></div> -->
                                <img src="<?=$mob_bg?>" onclick="conceptMobile_change(<?= $i ?>)" class="-p w-full">
                            </div>
                            <?php
                        }
                        ?>
                        <div data-i="<?= $i ?>" class="-pic-item -max-h">
                            <div class="-p"></div>
                        </div>
                    </div>
                </div>
                <div class="-node-wrap">
                    <div class="-node-rail">
                        <?php
                        for ($i = 0; $i < $idea_max; $i++) {
                            ?>
                            <div data-i="<?= $i ?>" class="-node-item">
                                <div class="-node-body">
                                    <h2 class="concept-content-title">
                                        <?= $content['idea'][$i]['title'] ?>
                                    </h2>
                                    <h5 class="concept-content-subtitle">
                                        <?= $content['idea'][$i]['sub_title'] ?>
                                    </h5>
                                    <p class="concept-content-body">
                                        <?= $content['idea'][$i]['description'] ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="-nav-wrap">
                    <?php
                    for ($i = 0; $i < $idea_max; $i++) {
                        ?>

                        <div onclick="conceptMobile_change(<?= $i ?>)" class="-dot "></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        concept_change(0)
    </script>

    <script type="text/javascript">
        function conceptMobile_change(next) {
            let el = $('.concept-mob-body')
            let pic_items = $$('.concept-mob-body .-pic-item')
            let node_items = $$('.concept-mob-body .-node-item')
            let dot_items = $$('.concept-mob-body .-dot')
            let max = parseInt(el.dataset.max)
            el.dataset.i = next
            el.style.setProperty('--i', next)

            let pic_nowActive = $('.concept-mob-body .-pic-item.-active')
            if (pic_nowActive != null) {
                pic_nowActive.classList.remove('-active')
            }
            pic_items[next].classList.add('-active')

            let node_nowActive = $('.concept-mob-body .-node-item.-active')
            if (node_nowActive != null) {
                node_nowActive.classList.remove('-active')
            }
            node_items[next].classList.add('-active')

            let dot_nowActive = $('.concept-mob-body .-dot.-active')
            if (dot_nowActive != null) {
                dot_nowActive.classList.remove('-active')
            }
            dot_items[next].classList.add('-active')

            if (next == max - 1) {
                el.dataset.end = 1
            } else {
                el.dataset.end = 0
            }

        }
        conceptMobile_change(0)

        function conceptMobile_nav(di) {
            let el = $('.concept-mob-body')
            let now = parseInt(el.dataset.i)
            let max = parseInt(el.dataset.max)
            let next = ((now + di) % max + max) % max
            conceptMobile_change(next)
        }
    </script>