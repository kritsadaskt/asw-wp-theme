<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
$idea_max = ofsize($content['idea']);
act_template_project_css($opt,$template_name,$layout);
?>

<script>
    function navConcept(k) {
        let v = document.querySelector('#concept')
        let now = parseInt(v.dataset.i)
        let max = parseInt(v.dataset.max)
        let next = now + k


        if (next == max) {
            next = 0;
        }
        if (next < 0) {
            next = max - 1;
        }
        setConcept(next)
    }

    function setConcept(next) {

        let v = document.querySelector('#concept')
        v.dataset.i = next
        v.style.setProperty('--i', next)
        document.querySelector('.concept-nav-dot.-active').classList.remove('-active');
        document.querySelectorAll('.concept-nav-dot')[next].classList.add('-active');
        document.querySelectorAll('.concept-content').forEach((item) => {
            if (item.dataset.i == next) {
                item.dataset.show = '1';
            } else {
                item.dataset.show = '0';
            }
        })
    }
</script>
<section id="concept" class="is-on-nav is-on-nav-mob" data-i="0" data-max="<?= ofsize($content['idea']) ?>"
    style="--max: <?= ofsize($content['idea']) ?>">
    <div class="py-12 relative section-fade">
        <div id="concept-content-wrap" class="cont-pd grid grid-cols-12">
            <div class="col-span-4 col-start-2 relative">
                <?php foreach ($content['idea'] as $key => $value) {
                    ?>
                    <div class="concept-content" data-i="<?= $key ?>" data-show="<?php echo ($key == 0) ? "1" : "0" ?>">
                        <h2 class="concept-title">
                            <?= $value['title'] ?>
                        </h2>
                        <div class="pt-8 sub-menu">
                            <?= $value['description'] ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="concept-space"></div>
                <?php if (ofsize($content['idea']) != 1): ?>
                    <style>
                        .concept-hightlight {
                            padding-top: 3.5rem;
                        }
                    </style>
                    <div class="concept-nav">
                        <div class="concept-nav-arrow-left arrow-hover" onclick="navConcept(-1)">
                        </div>
                        <div class="concept-nav-arrow-right arrow-hover" onclick="navConcept(1)">
                        </div>
                        <?php foreach ($content['idea'] as $key => $value) {
                            ?>
                            <div class="concept-nav-dot <?php echo ($key == 0) ? '-active' : '' ?>" data-i="<?= $key ?>"
                                onclick="setConcept(this.dataset.i)"></div>
                            <?php } ?>
                        </div>
                    <?php endif; ?>
                    <div class="concept-hightlight flex items-center gap-1">
                        <div class="hightlight whitespace-nowrap">
                            <?= $content['under_section_text'] ?>
                        </div>
                        <sp class="concept-line"></sp>
                    </div>
                </div>
                <div class="col-span-7">
                    <div class="concept-wrap">
                        <div class="concept-rail">
                            <?php foreach ($content['idea'] as $key => $value) {
                                ?>
                                <div class="concept-main-picture" style="background-image:url('<?= $value['background_image']['url'] ?>')">
                                    <img src="<?= $value['background_image']['url'] ?>" class="w-full">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="concept-content-wrap-mob">
                <div class="concept-mob-body" data-end="" data-max="<?= $idea_max ?>" data-i="0"
                    style="--max:<?= $idea_max ?>;--i:0;">
                    <div class="-title-wrap">
                        <div class="-title-rail">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div class="-title-body">
                                    <h1 class="cont-pd" style="color: var(--mc-main-3);">
                                        <?= $content['idea'][$i]['title'] ?>
                                    </h1>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
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
                                     <img src="<?=$mob_bg?>" onclick="conceptMobile_change(<?= $i ?>)" class="w-full">
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
                    <?php
                    if (ofsize($content['idea']) > 1):
                        ?>
                        <div class="concept-nav">
                            <?php
                            for ($i = 0; $i < $idea_max; $i++) {
                                ?>
                                <div onclick="conceptMobile_change(<?= $i ?>)" class="concept-nav-dot"></div>
                                <?php
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                    <div class="cont-pd concept-hightlight flex items-center gap-1">
                        <div class="hightlight whitespace-nowrap">
                            <?= $content['under_section_text'] ?>
                        </div>
                        <sp class="concept-line"></sp>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function conceptMobile_change(next) {
            let el = $('.concept-mob-body')
            let pic_items = $$('.concept-mob-body .-pic-item')
            let node_items = $$('.concept-mob-body .-node-item')
            let title_items = $$('.concept-mob-body .-title-item')
            let dot_items = $$('.concept-mob-body .concept-nav-dot')
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

            let title_nowActive = $('.concept-mob-body .-title-item.-active')
            if (title_nowActive != null) {
                title_nowActive.classList.remove('-active')
            }
            node_items[next].classList.add('-active')

            let dot_nowActive = $('.concept-mob-body .concept-nav-dot.-active')
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

    <script type="module">
        import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
        var el = $('.concept-mob-body');
        var hammerTime = new Hammer(el);
        hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
        hammerTime.on("panend", function (ev) {

            let i = el.dataset.i
            let max = el.dataset.max

            i = parseInt(i)
            max = parseInt(max)
            let di = 0;
            if (ev.deltaX > 20) {
                di = -1
            } else if (ev.deltaX < -20) {
                di = +1
            }
            i = (((i + di) % max) + max) % max
            xconsolex.log('newi', i)

            $$('#concept-content-wrap-mob .concept-nav-dot')[i].click()
        })
    </script>