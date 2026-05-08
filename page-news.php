<?php get_header() ?>
<style type="text/css">
    h1 {
        font-size: 56px !important;
    }

    h5 {
        font-size: 30px;
        line-height: 32px;
        font-weight: 500;
    }

    .line04 {
        position: absolute;
        top: -8px;
        right: -8px;
        background-color: var(--ci-orange-500);
        width: 30%;
        height: 0;
        z-index: 0;
        padding-top: 30%;
    }

    .news-item-0 .line04 {
        left: -8px;
        right: unset;
    }

    #middle-news-pic {
        position: relative;
        width: calc(100% + 8px);
        padding-right: 8px;
        padding-bottom: 8px;
        margin-bottom: 10px;
    }

    #middle-news-pic::before {
        content: " ";
        position: absolute;
        background-color: var(--ci-veri-500);
        width: 30%;
        height: 30%;
        right: 0;
        bottom: 0;
    }

    .home-news-date {
        position: absolute;
        bottom: 1.2rem;
        left: 1rem;
    }

    .home-news-date-sp {
        width: 100%;
        height: 30px;
    }

    .ani-news {
        position: relative;
        transition: .5s;
        transform: translateY(100px);
        opacity: 0;
    }

    .ani-news[data-show="1"] {
        opacity: 1;
        transform: translateY(0px);
    }

    #txt_title {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    /*-- Mobile Version --*/
    @media (max-width: 768px) {
        #txt_title {
            width: calc(100vw - 4rem);
        }
    }
</style>
<section id="banner" class="">
    <?= get_template_part('template-parts/site-project', 'condo-banner'); ?>
</section>

<div class="cont-pd py-6 flex flex-row items-center">
    <a href="/<?=pll_current_language()?>/home" class="cl-ci-blue-400"><?php pll_e('หน้าแรก')?></a>
    <img src="/wp-content/uploads/2023/01/Vector-84-1.png" style="margin:0px 12px;width: 5px;">
    <a href="/<?=pll_current_language()?>/news" class=""><?php pll_e('ข่าวสาร')?></a>
</div>

<section id="club-news" class="pt-0 xl:pt-9 pb-12 md:pb-14">
    <img src="/wp-content/uploads/2022/12/Group-793-1.png" class="absolute pointer-events-none leaf15">
    <img src="/wp-content/uploads/2022/12/shutterstock_1574382076-1-2.png" class="absolute pointer-events-none leaf16">
    <div class="cont-pd">
        <h1><?php pll_e('ข่าวสาร')?></h1>
        <sp class="l"></sp>
        <div class="grid home-news-cards-wrap md:grid-cols-3 items-stretch gap-4 md:gap-8">
            <?php
            $args = array(
                'post_type' => 'news',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
            );


            $loop = new WP_Query($args);
            $chk = 0;
            while ($loop->have_posts()) : $loop->the_post();
                $featured_img = wp_get_attachment_image_src($post->ID);
                $v = get_postdata($post->ID);
                if ($chk % 2 == 1) {
                    ?>

                    <div class="col-span-1 ani-news news-item-<?= $chk ?> relative" data-show="0">
                        <div class="-flex -flex-col -justify-between bg-ci-grey-900 h-full p-4 py-6 relative pointer" onclick="location.href='<?= get_permalink() ?>'">
                            <div class="h-full flex flex-col">
                                <div class="h-full flex flex-col-reverse justify-between" style="display: flex;">
                                    <?php

                                    ?>
                                    <div id="middle-news-pic">
                                        <div style="overflow: hidden;">
                                            <div class="bg-cover blank" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, '1536x1536') ?>');">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 id="txt_title"><?= get_the_title() ?></h5>
                                        <sp class=""></sp>
                                        <span id="txt_title" class="cl-ci-grey-300">
                                            <?= the_excerpt() ?>
                                        </span>
                                        <sp class=""></sp>
                                        <a href="<?= get_the_permalink() ?>" class=""><?php pll_e('อ่านเพิ่มเติม') ?></a>
                                        <sp class=""></sp>
                                        <sp class="s <?php if ($chk % 2 == 1) {
                                            echo 'bg-ci-veri-500';
                                        } else {
                                            echo 'bg-orange';
                                        } ?>" style="width: 15%; height: 4px;"></sp>
                                        <sp class=""></sp>
                                    </div>
                                </div>
                                <div class="home-news-date-sp"></div>
                            </div>
                            <div class="row-span-1 cl-ci-grey-300 home-news-date">
                                <?=asw_date_format($v['Date'])?>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-span-1 ani-news news-item-<?= $chk ?> relative" data-show="0">
                        <div class="-flex flex-col justify-between bg-ci-grey-900 h-full p-4 py-6 relative pointer" onclick="location.href='<?= get_permalink() ?>'">
                            <div class="h-full flex flex-col">
                                <div class="h-full flex flex-col-reverse justify-end" style="display: flex;">
                                    <div>
                                        <?php if ($chk != 1) {
                                            echo '<sp class="l"></sp>';
                                        } ?>
                                        <h5 id="txt_title"><?= get_the_title() ?></h5>
                                        <sp class=""></sp>
                                        <span id="txt_title" class="cl-ci-grey-300">
                                            <?= str_replace('#', ' #', get_the_excerpt()); ?>
                                        </span>
                                        <sp class=""></sp>
                                        <a href="<?= get_the_permalink() ?>" class=""><?php pll_e('อ่านเพิ่มเติม')?></a>
                                        <sp class=""></sp>
                                        <sp class="s bg-ci-orange-500" style="width: 15%; height: 4px"></sp>
                                        <sp class=""></sp>
                                    </div>
                                    <div class="relative">
                                        <div class="line04"></div>
                                        <div style="overflow: hidden;">
                                            <div class="bg-cover blank" ratio="1:1" style="background-image:url('<?php echo get_the_post_thumbnail_url($value->ID, 'large') ?>');">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="home-news-date-sp"></div>
                            </div>
                            <div class="row-span-1 cl-ci-grey-300 home-news-date">
                                <?=asw_date_format($v['Date'])?>
                            </div>
                        </div>
                    </div>
                <?php }
                $chk++;
                $chk = $chk % 6;
            endwhile;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    function homeNewsNav(num, el) {
        document.querySelector('.home-news-cards-wrap').style.setProperty("--i", num);
        for (let i of document.querySelectorAll('.home-news-nav .-nav')) {
            i.classList.remove('-active')
        }
        el.classList.add('-active')
    }

    styleLine04();
    window.addEventListener("resize", styleLine04);

    function styleLine04() {
        let chk = 0;
        let ele = document.getElementsByClassName("line04");
        if (window.innerWidth < 768) {
            for (let i of ele) {
                i.style.right = "unset";
                i.style.left = "-8px";
            }
        } else {
            for (let i of ele) {
                i.style.right = "-8px";
                i.style.left = "unset";
                if (chk == 0) {
                    i.style.right = "unset";
                    i.style.left = "-8px";
                }
                chk++;
                chk = chk % 3;
            }
        }
    }

    function scrollCard() {
        // xconsolex.log(num)
        let h = window.innerHeight
        let cards = document.querySelectorAll('.ani-news')
        let offset = 200
        let delay = 0
        let chktop = 0

        for (let i of cards) {
            let react = i.getBoundingClientRect()
            xconsolex.log(react.y)
            if (chktop != react.y) {
                chktop = react.y
                delay = 0
            }
            i.style.transitionDelay = delay + "s"

            delay += 0.25

            let point = react.y - h + offset
            if (point < 0) {
                i.dataset.show = 1
            }
        }
    }
    window.onscroll = () => {
        scrollCard()
    }
    scrollCard()
</script>

<?php get_footer() ?>