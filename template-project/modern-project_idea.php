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
?>

<div id="concept_parent" data-end="0" data-i="0" data-max="<?= $concept_max ?>" style="--i:0;--max:<?= $concept_max ?>">
    <section id="concept" class="section-fade is-on-nav-mob xl:hidden concept-num-block">
        <div>
            <div>
                <span class="text-white bg-number-concept">01</span>
                <div class="-px-4">
                    <!-- <h1 class=" p-concept text-center">แนวคิดโครงการ</h1> -->

                    <div class="concept-mob-body">
                        <div class="-title-wrap">
                            <div class="-title-rail">
                                <?php
                                for ($i = 0; $i < $concept_max; $i++) {
                                    ?>
                                    <div data-i="<?= $i ?>" class="-title-item">
                                        <h1 class="container mx-auto" style="color: var(--mc-main-5);">
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
                                for ($i = 0; $i < $concept_max; $i++) {
                                    $mob_bg = $content['idea'][$i]['background_image_mobile']['sizes']['large'];
                                    if ($mob_bg == '') {
                                        $mob_bg = $content['idea'][$i]['background_image']['sizes']['large'];
                                    }
                                    ?>
                                    <div data-i="<?= $i ?>" class="-pic-item">
                                        <!-- <div style="background-image:url('<?= $mob_bg ?>')" class="-p" onclick="conceptMobile_change(<?= $i ?>)"></div> -->
                                        <img src="<?=$mob_bg?>" class="-p" onclick="conceptMobile_change(<?= $i ?>)">
                                    </div>
                                    <?php
                                }
                                ?>
                                <div data-i="<?= $i ?>" class="-pic-item -max-h">
                                    <div class="-p"></div>
                                </div>
                            </div>
                        </div>
                        <script>
                            let el = $('.concept-mob-body')
                            let start
                            let end
                            el.addEventListener('touchstart', (event) => {
                                // xconsolex.log('start : ', event.changedTouches[0].clientX)
                                start = event.changedTouches[0].clientX;
                            })

                            el.addEventListener('touchend', (event) => {

                                // xconsolex.log('end : ', event.changedTouches[0].clientX)
                                end = event.changedTouches[0].clientX;
                                xconsolex.log(start - end)
                                // slide = 'right'
                                if (start - end > 80 && start - end > -80) {
                                    concept_nav(1)
                                } else if (start - end < 80 && start - end < -80) {
                                    concept_nav(-1)
                                }
                                // xconsolex.log(slide)
                            })
                        </script>
                        <div class="-node-wrap">
                            <div class="-node-rail">
                                <?php
                                for ($i = 0; $i < $concept_max; $i++) {
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
                        <div class="-cmd-num-mob">
                            <h2>
                                <span class="-cmd-num-count">
                                    <?= sprintf('%02d', 1) ?>
                                </span>
                                <span class="-cmd-num-max">/
                                    <?= sprintf('%02d', ofsize($content['idea'])) ?>
                                </span>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="concept" class="section-fade hidden xl:block  is-on-nav concept-num-block ">
            <div>

                <div class="concept-d">
                    <div class="concept-d-content">
                        <div class="-content-body-wrap">
                            <?php foreach ($content['idea'] as $key => $value): ?>
                                <div class="-content-body" data-active="<?= ($key == 0) ? '1' : '' ?>">
                                    <div class="-num">
                                        <?= sprintf('%02d', $key + 1) ?>
                                    </div>
                                    <h1 class="-title">
                                        <?= $value['title'] ?>
                                    </h1>
                                    <h2 class="-subtitle">
                                        <?= $value['sub_title'] ?>
                                    </h2>
                                    <div class="-text">
                                        <?= $value['description'] ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <style>
                            .-cmd-wrap {
                                display: grid;
                                grid-template-columns: auto 48px 48px;
                                gap: 8px;
                                padding-left: var(--mg);
                                padding-right: 40px;
                            }

                            .-cmd-num {}

                            .-cmd-num .-cmd-num-count {
                                color: var(--text-color);
                                font-size: 56px;
                                line-height: 56px;
                            }

                            .-cmd-num .-cmd-num-max {
                                color: var(--text-color);
                                font-size: 48px;
                                line-height: 48px;
                                opacity: .4;
                            }

                            .-cmd-arrow {
                                width: 48px;
                                height: 48px;
                                border-radius: 4px;
/*                                background-color: var(--mc-main-1);*/
                                background-image: var(--mc-arrow-up);
/*                                background-size: 17px;*/
                                background-position: center;
                                background-repeat: no-repeat;
                                transform: rotateZ(-90deg);
                                cursor: pointer;
                                transition: .3s;
                                opacity: 1;
                            }

                            .-cmd-arrow:hover {
/*                                background-color: var(--mc-main-2);*/
opacity: .5;
                            }

                            .-cmd-arrow.-right {
                                transform: rotateZ(90deg);
                            }
                        </style>
                        <div class="-cmd-wrap">
                            <div class="-cmd-num">
                                <h2>
                                    <span class="-cmd-num-count">
                                        <?= sprintf('%02d', 1) ?>
                                    </span>
                                    <span class="-cmd-num-max">/
                                        <?= sprintf('%02d', ofsize($content['idea'])) ?>
                                    </span>
                                </h2>
                            </div>
                            <div onclick="concept_nav(-1)" class="-cmd-arrow">
                            </div>
                            <div onclick="concept_nav(1)" class="-cmd-arrow -right">
                            </div>
                        </div>
                    </div>
                    <div class="concept-d-images">
                        <div class="-d-images-rail">
                            <?php foreach ($content['idea'] as $key => $value):
                                ?>
                                <div class="-d-images-item" data-active="<?= ($key == 0) ? '1' : '0' ?>">
                                    <div class="-d-images-item-pic"
                                    style="--img:url('<?= acf_img($value['background_image']) ?>')">
                                    <img src="<?= acf_img($value['background_image']) ?>" class="w-full">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function concept_nav(d) {
        let p = $("#concept_parent")
        let now = parseInt(p.style.getPropertyValue("--i"))
        let max = parseInt(p.style.getPropertyValue("--max"))
        let i = (((now + d) % max) + max) % max
        concept_select(i)
        conceptMobile_change(i)
    }
    concept_select(0)

    function concept_select(i) {
        let p = $("#concept_parent")
        let c = $(".-cmd-num .-cmd-num-count")
        p.style.setProperty('--i', i);
        let img_items = $$('.-d-images-item')
        let txt_items = $$('.concept-d-content .-content-body')
        for (let i of img_items) {
            i.dataset.active = 0
        }
        for (let i of txt_items) {
            i.dataset.active = 0
        }
        img_items[i].dataset.active = 1
        txt_items[i].dataset.active = 1

        i += 1
        c.innerHTML = i.toLocaleString(undefined, {
            minimumIntegerDigits: 2,
            useGrouping: false
        });

    }

    function conceptMobile_change(next) {
        let el = $("#concept_parent")
        let count = $(".bg-number-concept")
        let count_nav = $(".-cmd-num-mob .-cmd-num-count")
        let pic_items = $$('.concept-mob-body .-pic-item')
        let node_items = $$('.concept-mob-body .-node-item')
        let title_items = $$('.concept-mob-body .-title-item')
        // let dot_items = $$('.concept-mob-body .concept-nav-dot')
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
        title_items[next].classList.add('-active')

        if (next == max - 1) {
            el.dataset.end = 1
        } else {
            el.dataset.end = 0
        }
        concept_select(next)
        i = next + 1
        count.innerHTML = i.toLocaleString(undefined, {
            minimumIntegerDigits: 2,
            useGrouping: false
        });

        count_nav.innerHTML = i.toLocaleString(undefined, {
            minimumIntegerDigits: 2,
            useGrouping: false
        });
    }
    conceptMobile_change(0)

    function conceptMobile_nav(di) {
        let el = $("#concept_parent")
        let now = parseInt(el.dataset.i)
        let max = parseInt(el.dataset.max)
        let next = ((now + di) % max + max) % max
        conceptMobile_change(next)
    }
</script>
<?php theme_overide_style($content) ?>