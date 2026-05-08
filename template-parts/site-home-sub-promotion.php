<style>
    #sub-promotion {
        background-color: var(--ci-blue-200);
        padding-top: 4rem;
        padding-bottom: 3rem;
        border: none;
        position: relative;
        top: -1px;
    }


    .sub-wrap {
        width: 100%;
        overflow: hidden;
        position: relative;
        z-index: 100;
    }

    #sub-promotion .sub-rail {
        --max: 3;
        --w: calc(var(--cont-w) * var(--max) / (100/65));
        --a: calc(var(--w) / var(--max));
        --i: 0;
        --shift-right:0px;
        position: relative;
        left: 0;
        margin-left: var(--cont-mg);
        width: var(--w);
        display: flex;
        transform: translateX(calc(
            (var(--i) * var(--a) * -1) + 0px
        ));
        transition: .5s ease-in-out;
    }
    #sub-promotion .sub-rail[data-end="1"] {
        transform: translateX(calc(
            (var(--i) * var(--a) * -1) + var(--shift-right)
        ));
    }

    /* sub-nav */
    .sub-nav-arrow {
        margin: unset;
        width: 48px;
        position: absolute;
        cursor: pointer;
        top: calc(50% - (48px /2) - (44px / 2));
    }

    .sub-nav-arrow.--r {
        right: calc(var(--cont-mg));

    }

    .sub-nav-arrow.--l {
        left: calc(var(--cont-mg));
        transform: rotate(180deg);
    }

    .sub-nav {
        margin: 0 var(--cont-mg);
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 12px;
    }

    .sub-nav .-nav {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        margin: 0 3px;
        cursor: pointer;
    }

    .sub-nav .-nav div {
        width: 100%;
        height: 1px;
        background-color: var(--ci-blue-700);
        transition: all .3s;
    }

    .sub-nav .-nav.-active div {
        height: 4px;
        background-color: var(--ci-veri-500);
    }

    /* sub-nav end */
    .sub-group {
        display: inline-block;
        width: 100%;
        padding-right: 24px;
        /* height: 484px; */
    }

    .sub-group-items {
        display: grid;
        grid-template-columns: 35% auto;
        /* grid-template-rows: 1fr 1fr;
        grid-template-columns: 312px 500px; */
        grid-template-rows: 230px 230px;
        gap: 24px;
    }

    .sub-group-items .-item {
        background-color: white;
        cursor: pointer;
        display: flex;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
    }

    .sub-group-items .-item .-img-wrap {
        aspect-ratio: 1/1;
    }

    .sub-group:nth-child(even) .-item:nth-of-type(1) {
        grid-column: span 1;
        grid-row: span 2;
        height: 100%;
        flex-direction: column-reverse;
    }

    .sub-group-items .-item:nth-of-type(1) {
        grid-column: span 1;
        grid-row: span 2;
        height: 100%;
        flex-direction: column;
    }

    .sub-group-items .-item:nth-of-type(2) {}

    .sub-group-items .-item:nth-of-type(3) {
        flex-direction: row-reverse;
    }


    .sub-group-items .-img {
        /* --img: url(/wp-content/uploads/2023/05/image-362.png); */
        background-image: var(--img);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        padding-top: 100%;
        width: 100%;
    }

    .-item .-inner {
        height: inherit;
        padding: 24px 16px;
        padding-top: 28px;
        position: relative;
    }



    .-inner::after {
        content: "";
        width: 0%;
        height: .25rem;
        position: absolute;
        bottom: 0;
        left: 0;
        transition: .9s all;
        opacity: 0.15;
        background: white;
    }

    .-item:hover .-inner::after {
        width: 100%;
        transition: .8s all;
        opacity: 1;
        background: var(--ci-veri-300);
    }

    .-item:nth-of-type(1) .-title {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .-item:nth-of-type(1) .-detail {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 1;
    }

    .-item:nth-of-type(2) .-detail {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
    }

    .-item:nth-of-type(3) .-detail {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 2;
    }



    .-inner h5 {
        color: var(--ci-grey-200);
    }

    .-inner p {
        color: var(--ci-grey-300);
    }

    .-inner .-more {
        color: var(--ci-veri-300);
        position: absolute;
        left: 16px;
        bottom: 24px;
    }

    @media (min-width: 1445px) {
        .sub-nav-arrow.--r {
            right: calc(var(--cont-mg) - (48px / 2));

        }

        .sub-nav-arrow.--l {
            left: calc(var(--cont-mg) - (48px / 2));
            transform: rotate(180deg);
        }
    }

    @media (max-width: 1279px) {
        #sub-promotion {
            --cont-w: 992px;
            --cont-mg: 1rem;
        }

        #sub-promotion .sub-rail {
            --w: calc(var(--cont-w) * var(--max) / (100/85));
        }
    }

    @media (max-width: 1023px) {
        #sub-promotion .sub-rail {
            --w: calc(var(--cont-w) * var(--max) / (100/75));
        }
    }


    /*-- Mobile Version --*/
    @media (min-width: 1162px) {
        #sub-promotion .-nav.-island {
            display: none;
        }
    }

    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        #sub-promotion .sub-nav {
            display: none;
        }
        #sub-promotion .sub-wrap{
            overflow: auto;
        }
        #sub-promotion .sub-wrap::-webkit-scrollbar {
          display: none;
      }
      #sub-promotion .sub-rail {
        --w: calc(var(--cont-w) * var(--max) );
        width: max-content;
        display: flex;
    }
    .sub-group-items {
        grid-template-columns: 1fr 1fr 1fr;
        grid-template-rows: 1fr;
    }
    .sub-group-items .-item {
        width: calc(var(--cont-w));
        grid-column: span 1;
        grid-row: span 2;
        height: 100%;
        flex-direction: column;
    }

    
}
#home_promotion_slides_wrap::before,
    #home_promotion_slides::before{
        background-color: var(--ci-blue-200);
        
    }
</style>
<div id="sub-promotion">
    <div class="cont-pd pb-6">
        <h1 class="cl-white" id="sub-promotion-container"><?php pll_e('โปรโมชั่น')?></h1>
    </div>
    <?php
    $args = array(
        'post_type' => 'promotion',
        'post_status' => 'attachment',
        // 'post_status' => 'publish',
        // 'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'promotion_type',
                'operator' => 'EXISTS',
                'category_name' => 'condominium-pro',
            ),
        ),
    );
    $loop = new WP_Query($args);

    // pre($loop);
    $post_count = $loop->post_count;
    $group_size = ceil($post_count / 3);
    $groups_has_island = 0;
    if ($post_count%3 == 1) {
        $groups_has_island = 1;
    }
    $round = 0;
    ?>
    <div class="sub-wrap">
        <div class="sub-rail" data-i="0" data-posts="<?=$post_count?>" data-max="<?= $group_size ?>" data-end="0"
            style="--i: 0; --max: <?= $group_size ?>;--island:<?=$groups_has_island?>" data-island="<?=$groups_has_island?>">
            <div class="sub-group">
                <div class="sub-group-items">
                    <?php
                    while ($loop->have_posts()):
                        $loop->the_post(); {
                            $cate_name = wp_get_post_terms($post->ID, 'promotion_type');

                            $v = get_fields();
                            $featured_img = get_field('banner_mobile', $post->ID)['sizes']['medium-large-thumb'];
                            if ($featured_img == '') {
                                $featured_img = get_the_post_thumbnail_url($post->ID, 'large');
                            }
                            // pre($v);
                            ?>
                            <a href="<?= get_permalink() ?>" class="-item">
                                <div class="-img-wrap">
                                    <div class="-img" style="--img: url(<?= $featured_img ?>)">
                                    </div>
                                </div>
                                <div class="-inner">
                                    <h5 class="-title">
                                        <?= the_title() ?>
                                    </h5>
                                    <div class="-detail">
                                        <?= $v['card_caption'] ?>
                                    </div>
                                    <div class="-more">
                                        <?php pll_e('อ่านเพิ่มเติม')?>
                                    </div>
                                </div>
                            </a>
                            <?php
                            if ($round == $post_count - 1) {
                                echo "</div>";
                                echo "</div>";
                            } else if (($round % 3) == 2) {
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='sub-group'>";
                                echo "<div class='sub-group-items'>";
                            }
                            $round++;
                            ?>
                            <?php
                        }
                    endwhile;
                    wp_reset_postdata();
                    ?>


                </div>
                <div class="sub-nav">
                    <?php
                    $group_size_show = $group_size - $groups_has_island;
                    for ($i = 0; $i < $group_size_show; $i++) {
                        ?>
                        <div class="-nav" onclick="sub_select(<?= $i ?>)">
                            <div></div>
                        </div>
                        <?php
                    }
                    if ($groups_has_island) {
                        ?>
                        <div class="-nav -island" onclick="sub_select(<?= $i ?>)">
                            <div></div>
                        </div>
                        <?php
                    }
                    // for ($i = 0; $i < $group_size_show; $i++) {
                    ?>
                    <div class="-nav -nav-mob" onclick="sub_select(<?= $i ?>)">
                        <div></div>
                    </div>
                    <?php
                    // }
                    ?>
                    <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="sub-nav-arrow --r"
                    onclick="sub_arrow(1)">
                    <img src="/wp-content/uploads/2022/09/slide-arrow-r.png" class="sub-nav-arrow --l"
                    onclick="sub_arrow(-1)">
                </div>
            </div>
        </div>
        

        <style>
            .line-clamp-1 {
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
                -webkit-line-clamp: 1;
            }

            .line-clamp-2 {
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
                -webkit-line-clamp: 2;
            }
            /*-- Mobile Version --*/
            @media (max-width: 768px) {
                .sub-nav .-nav.-nav-mob {
                    display: none;
                }
            }
        </style>

        <script>

            function sub_arrow(d) {
                let p = $(".sub-rail")
                let now = parseInt(p.style.getPropertyValue("--i"))

                let max_xl = <?=$group_size_show?>;
                let max_l = <?=$group_size?>;
                let max = 0
                let shift_right = 0

                let body_w = window.document.body.clientWidth;
                if (body_w < 1162) {
                    max = max_l
                }else{
                    max = max_xl
                }

                let i = (((now + d) % max) + max) % max
                sub_select(i);
            }
            sub_arrow(0)

            function sub_select(i) {
                let p = $('.sub-rail')
                let max_xl = <?=$group_size_show?>;
                let max_l = <?=$group_size?>;
                let is_island = parseInt($('#sub-promotion .sub-rail').dataset.island)
                let max = 0
                let shift_right = 0

                let body_w = window.document.body.clientWidth;
                if (body_w < 1162) {
                    max = max_l
                }else{
                    max = max_xl
                }

                if (i == max - 1) {
                    p.dataset.end = '1'
                } else if (i == 0) {
                    p.dataset.end = 'start'
                } else {
                    p.dataset.end = '0'
                }

                if ($(`.sub-nav .-active`) != null) {
                    $(`.sub-nav .-active`).classList.remove('-active');
                }
                $$(`.sub-nav .-nav`)[i].classList.add('-active');

                p.style.setProperty('--i', i)

                if (body_w >= 1162) {
                    shift_left = $('#sub-promotion .sub-group-items').clientWidth
                    if (is_island) {
                     shift_left += $('#sub-promotion .sub-group-items a').clientWidth + 24
                 }
                 shift_right = $(`#sub-promotion-container`).clientWidth  - shift_left;
             }else if(body_w < 1162 && body >= 768){
                shift_left = $('#sub-promotion .sub-group').clientWidth - 24;
                if (is_island) {
                    shift_left = $('#sub-promotion .sub-group-items a').clientWidth;
                }
                shift_right = $(`#sub-promotion-container`).clientWidth  - shift_left;
            }else if(body < 768){
                shift_right = 0
            }

            $('#sub-promotion .sub-rail').style.setProperty('--shift-right',`${shift_right}px`);
        }

    </script>