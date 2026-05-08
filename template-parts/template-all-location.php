<?php
$content = $args[0];
$f = $args[1];
$template = $args[2];
// pre($content);
?>
<style type="text/css">
    #location {
        background-size: cover;
        background-image: var(--bg-img);
        background-color: var(--bg-color);
        background-size: cover;
        background-position: top;
    }

    .location-tabs-txt-name {
        width: max-content;
    }

    .info-btn-gg {
        padding: 6px 24px;
        background-color: var(--mc-nav-btn-bg-ready);
        color: var(--mc-nav-btn-txt-ready);
        border-radius: 10em;
        display: inline-block;
        margin-bottom: 7px;
        font-weight: 500;
    }

    .info-btn-gg:hover {
        background-color: var(--mc-nav-btn-bg-hover);
        color: var(--mc-nav-btn-txt-hover);
    }


    .location-body {
        font-style: normal;
        font-weight: 300;
        font-size: 26px;
        line-height: 32px;
        color: var(--text-color);
    }

    .location-pin {
        /* width: 24px; */
        width: auto !important;
        display: inline-block;
    }

    #location-wrap {
        display: grid;
        grid-template-columns: repeat(24, 1fr);
        grid-auto-rows: auto auto auto;

    }

    #location-side-left {
        grid-column: 1/13;
        grid-row: 1/2;
        position: relative;
        padding-top: 90px;
        padding-bottom: 90px;
    }

    #location-side-left-bg {
        background-color: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(6px);
        border-radius: 0 16px 16px 0;
        width: 60vw;
        position: absolute;
        right: 0;
        height: 100%;
        top: 0;
    }

    #location-side-left-content {
        position: relative;
        z-index: 2;
    }

    #location-side-left-content {
        display: grid;
        grid-template-rows: auto auto auto;
        grid-template-columns: repeat(12, 1fr);
        grid-row-gap: 26px;
    }

    #location-side-left-content-title {
        grid-column: 3 / 13;
    }

    #location-side-left-content-body {
        grid-column: 3 / 10;
    }

    #location-side-left-content-button {
        grid-column: 3 / 11;
    }

    #location-side-right {
        grid-column: 12/24;
        grid-row: 1/2;
        height: 100%;
        padding-top: 50px;
        position: relative;
        z-index: 1;

    }

    .location-map {
        width: 100%;
        border: 4px solid #FFFFFF;
        box-shadow: 0px 12px 28px 16px rgba(0, 0, 0, 0.35);
        border-radius: 16px;
    }

    #location-side-tab-head {
        grid-column: 1 / span 24;
        grid-row: 2 / span 1;
        padding-top: 72px;
    }

    .location-side-tab-body {
        /* grid-column: 5 / span 18;
        padding: 0 1rem;
        grid-row: 3 / 4;
        padding-top: 36px;
        grid-template-columns: 1fr 1fr;
        display: block;
        grid-gap: 24px;
        grid-gap: 16px;
        display: none;
        color: #fff;
        overflow: auto;
        height: 214px;
        grid-template-rows: max-content;
        column-count: 2;
        column-gap: 16px;*/

        /*grid-column: 5 / span 20;
        grid-row: 3 / 4;
        padding-top: 36px;
        display: none;
        color: #fff;
        grid-template-rows: max-content;
        justify-content: left;
        align-items: start;
        flex-flow: column wrap;*/
        display: none;
        margin-bottom: 32px;
        grid-column: 5 / span 20;
        grid-row: 3 / 4;
        grid-template-columns: repeat(20, 1fr);
        /*overflow-y: auto;
        overflow-x: hidden;
        height: 208px;*/
    }

    .location-side-tab-body[data-show="1"] {
        display: grid;
    }

    .location-side-tab-body-inner {
        padding: 32px 0;
        grid-column: 1 / span 16;
        column-count: 2;
    }

    .location-side-tab-body .location-pin {
        width: 28px;
        height: 28px;
        background-size: cover;
        background-position: center;
        display: inline-block;
        margin-right: 12px;
        margin-top: 6px;
    }

    .location-side-tab-body .location-pin-p {
        font-style: normal;
        font-weight: 400;
        font-size: 22px;
        line-height: 28px;
        display: grid;
        align-items: start;
        grid-template-columns: 40px auto;
        height: max-content;
        margin-bottom: 16px;
        /*        width: 443px;*/
        padding-right: 16px;
        display: -webkit-inline-box;
        width: 100%;
    }

    .location-text {
        font-size: 26px;
        line-height: 32px;
    }

    .location-text p {
        font-size: 26px;
        line-height: 32px;
        font-weight: 400;
    }

    .location-pin-p .-dist {
        color: var(--text-color);
        opacity: .5;
        margin-left: .25em;
        display: inline-block;
    }


    .location-tabs-icon {
        margin-right: 8px;
        /* margin-left: 8px; */
    }

    .location-text>p {
        display: inline-block;
        display: inline;
    }

    .location-arrow {
        width: 40px;
        height: auto;
        cursor: pointer;
        transition: .5s;
        position: absolute;
        right: 0;
    }

    #location .info-tab .location-tab-txt {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 8px;
    }

    #location span.info-btn-txt {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    #location .info-btn-gg .location-pin {
        margin: 0;
    }

    #location .location-text .-title {
        color: var(--text-color) !important;
    }

    @media (max-width: 1024px) {
        #location {
            padding-bottom: 0px !important;
        }

        .location-body {
            font-size: 22px;
            font-weight: 400;
            line-height: 28px;
        }

        #location-wrap {
            display: block;
        }

        #location-side-left {
            position: static;
            padding: 2rem;
        }

        #location-side-left-bg {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(6px);
            border-radius: 16px;
            width: 100vw;
            position: absolute;
            right: 0;
            height: 50%;
            top: 0;
        }

        #location-side-left-content {
            /* display: block; */
        }

        #location-side-left-content-title {
            text-align: center;
            grid-column: 1 / 13;
        }

        #location-side-left-content-button {
            text-align: center;
            grid-column: 2 / 12;
        }

        #location-side-left-content-body {
            grid-column: 1 / 13;
        }

        #location-side-right {
            padding: 0 1rem;
            padding: 0 2rem;
        }

        #location-side-tab-head,
        .location-side-tab-body {
            padding: 0 2rem;
        }

        #location .info-tabs-block {
            justify-content: flex-start;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
        }

        .location-side-tab-body {
            grid-template-columns: 1fr;
            overflow: visible;
            height: 100%;
        }
        .location-side-tab-body::-webkit-scrollbar {
          display: none;
      }

      #location {
        padding-top: 27px;
    }

    .location-text>p {
        font-size: 22px;
        line-height: 28px;
    }
}

#location-side-left-bg {
    display: none;
}

#location-side-left-content {
    padding: 0 2rem;
}


@media (max-width: 767px) {
    .location-side-tab-body-inner {
        column-count: 1;
    }

    .location-side-tab-body .location-pin-p {
        width: 100%;
        padding-right: 0;
    }

    #location-side-left,
    #location-side-right,
    #location-side-tab-head,
    .location-side-tab-body {
        padding-right: 1rem;
        padding-left: 1rem;
    }

    .info-tabs-block-wrap {
        padding-left: 0;
        padding-right: 0;
    }

    #location-side-left-content {
        padding: 0 0rem;
    }
}

.safari-wrapping-fix {
    display: inline-block;
    white-space: nowrap;
}
</style>

<section id="location" class="is-on-nav is-on-nav-mob">
    <div class="mx-auto container">
        <div id="location-wrap" class="section-fade">
            <div id="location-side-left">
                <div id="location-side-left-bg"></div>
                <div id="location-side-left-content">
                    <div id="location-side-left-content-title" class="theme-title">
                        <span class="title-c"><?php pll_e('ทำเลที่ตั้ง')?></span>
                        <span class="title-b"><?php pll_e('ทำเลที่ตั้ง')?></span>
                        <h2 class="title-a"><?php pll_e('ทำเลที่ตั้ง')?></h2>
                    </div>
                    <div id="location-side-left-content-body">
                        <p class="location-body">
                            <?= $content['description'] ?>
                        </p>
                    </div>
                    <div id="location-side-left-content-button">
                        <a href="<?= $content['google_maps'] ?>" class="info-btn-gg" target="_blank">
                            <span class="info-btn-txt" style="font-weight: 400;align-items: center;">
                                <img src="<?= $content['google_maps_icon']['sizes']['medium'] ?>" class="location-pin"
                                style="width: 18px;height: 24px;">
                                <?php pll_e('Google Maps โครงการ')?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div id="location-side-right">
                <style type="text/css">
                    .-jbl-gll-pic {
                        position: relative;
                        background-image:
                        <?= $content['maps_image']['url'] ?>
                        ;
                        transition: background-image .2s;
                        grid-column: 2 / span 1;
                        grid-row: 1 / span 1;
                        background-size: contain;
                        background-position: center;
                        background-repeat: no-repeat;
                        background-color: #0000;
                    }
                </style>
                <img src="<?= $content['maps_image']['url'] ?>" class="location-map jb-lightbox pointer "
                style="--img:url(<?= $content['maps_image']['url'] ?>)">
            </div>
            <div id="location-side-tab-head" class="px-4 xl:px-0" data-tab="1">
                <?php if ($content['nearby_place']): ?>
                    <div class="info-tabs-block-wrap">
                        <div class="info-tabs-block location-tabs-override">
                            <div class="info-tabs-block-arrow -left"></div>
                            <div class="info-tabs-blocks">
                                <div class="info-tabs-rail">
                                    <?php foreach ($content['nearby_place'] as $key => $value) { ?>
                                        <div onclick="location_tab_chang(this.dataset.i)" data-i="<?= $key ?>" class="info-tab">
                                            <span class="location-tab-txt">
                                                <span class="inline-block location-tabs-icon"
                                                style="--icon:url(<?= $value['icon']['url'] ?>)">
                                                <img class="w-5" src="<?= $value['icon']['url'] ?>">
                                            </span>
                                            <span class="location-tabs-txt-name">
                                                <?= $value['tab_name'] ?>
                                            </span>
                                        </span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="info-tabs-block-arrow -right"></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <?php
        foreach ($content['nearby_place'] as $key => $value) { ?>

            <div data-i="<?= $key ?>" class="location-side-tab-body scroll-hid- px-4 xl:px-0">
                <div class="location-side-tab-body-inner">
                    <?php foreach ($value['place'] as $keyy => $item) { ?>

                        <div class="location-pin-p">
                            <!-- <div class="location-pin" style="background-image: url(<?= $content['place_icon']['sizes']['medium'] ?>);"></div> -->
                            <img src="<?= $content['place_icon']['sizes']['medium'] ?>" class="location-pin"
                            style="width: 18px;height: 24px;">
                            <div class="location-text">
                                <p class="-title">
                                    <?= $item['place_name'] ?>
                                </p>
                                <?php
                                if ($item['distance']):
                                    ?>
                                    <p class="-dist">-
                                        <?= $item['distance'] ?>
                                    </p>
                                    <?php
                                endif;
                                ?>
                            </div>
                            <span class="safari-wrapping-fix"></span>
                        </div>

                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
</section>

<script type="text/javascript">
    function location_tab_chang(i) {
        if (document.querySelector('#location .location-tabs-override .info-tab.-active') != undefined) {
            document.querySelector('#location .location-tabs-override .info-tab.-active').classList.remove('-active')
        }
        if (document.querySelector('#location .location-side-tab-body[data-show="1"]')) {
            document.querySelector('#location .location-side-tab-body[data-show="1"]').dataset.show = 0
        }
        document.querySelector(`#location .location-tabs-override .info-tab[data-i="${i}"]`).classList.add('-active')
        document.querySelector(`#location .location-side-tab-body[data-i="${i}"]`).dataset.show = 1
        check_section_fade()
        <?php if ($template == 'elegant'): ?>
            if (i == 0) {
                document.querySelector('.location-tab-slider').style.setProperty('--w', document.querySelectorAll('#location .location-tab-txt')[i].offsetWidth)
                document.querySelector('.location-tab-slider').style.setProperty('--l', 0)
            } else if (i == 1) {
                document.querySelector('.location-tab-slider').style.setProperty('--w', document.querySelectorAll('#location .location-tab-txt')[i].offsetWidth)
                document.querySelector('.location-tab-slider').style.setProperty('--l', document.querySelectorAll('#location .location-tab-txt')[i - 1].offsetWidth)
            } else if (i > 1) {
                document.querySelector('.location-tab-slider').style.setProperty('--w', document.querySelectorAll('#location .location-tab-txt')[i].offsetWidth)
                let sumWidth = 0
                for (let j = 0; j < i; j++) {
                    sumWidth += document.querySelectorAll('#location .location-tab-txt')[j].offsetWidth
                }
                document.querySelector('.location-tab-slider').style.setProperty('--l', sumWidth)
            }
        <?php endif ?>

    }
    setTimeout(() => {
        location_tab_chang(0)
    }, 500);
</script>
<?php
switch ($template) {
    case 'modern':
    ?>
    <style type="text/css">
        .title-c,
        .title-b {
            display: none;
        }

        #location-side-left {
            grid-column: 14/24;
        }

        #location .info-tabs-block {
            background-color: transparent;
        }

        #location-side-right {
            grid-column: 3/15;
        }

        #location-side-right .location-map {
            box-shadow: 0px 24px 18px 0px rgba(0, 0, 0, 0.3);
            border: none;
            border-radius: 0;
        }

        #location-side-left {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #location-side-left-content {
            grid-template-columns: repeat(10, 1fr);
        }

        #location-side-left #location-side-left-content-body {
            grid-column: 3/10;
            color: var(--text-color);
        }

        #location-side-left .location-body {
            color: var(--text-color);
        }

        #location-side-left-content-button {
            grid-column: 3 / 11;
        }

        #location-side-left-content-button .info-btn-gg {
            border-radius: 4px;
        }

        #location .location-pin {
            width: auto !important;
        }

        #location-side-tab-head {
            grid-column: 1 / span 24;
            padding-top: 124px;
        }

        #location .info-tabs-block-wrap {
            width: 100% !important;
            max-width: 100%
        }

        #location .info-tabs-block {
            border: 0;
            border-bottom: 1px solid #9FA5AB;
            border-radius: 0;
            justify-content: center;
            padding-bottom: 10px;
        }

        #location .info-tab .location-tab-txt {
            font-size: 26px;
            line-height: 32px;
            font-weight: 400;
            padding: 0 16px;
        }

        #location .info-tab .location-tabs-txt-name::after {
            content: "•";
            margin-left: 5px;
            opacity: 0;
            transition: .1s;
        }

        #location .info-tab {
            color: #545E67;
        }

        #location .info-tab.-active .location-tabs-txt-name::after {
            opacity: 1;
            transition: .1s;
        }

        #location .info-tab .location-tabs-icon {
            --icon: url(/wp-content/uploads/2022/08/6Other.png);
            background: #545E67;
            width: 1.5rem;
            height: 1.5rem;
            -webkit-mask-image: var(--icon);
            -webkit-mask-size: contain;
            -webkit-mask-repeat: no-repeat;
            transition: .3s;
        }

        #location .info-tab.-active .location-tabs-icon,
        #location .info-tab:hover .location-tabs-icon {
            background: var(--mc-main-4) !important;
        }


        #location .info-tab img {
            display: none;
        }

        #location .location-text .-dist {
            color: #828A92;
        }

        #location .location-side-tab-body {
            grid-column: 7 / span 20;
        }

        #location .location-side-tab-body::-webkit-scrollbar {
            width: 8px;
        }

        #location .location-side-tab-body::-webkit-scrollbar-track {
            background: #BFC4C8;
            border-radius: 10em;
        }

        #location .location-side-tab-body::-webkit-scrollbar-thumb {
            background: #828A92;
            border-radius: 10em;
            height: 4rem;
        }

        #location-side-left-content-title .title-a {
            color: var(--mc-main-5);
        }

        @media (max-width: 1024px) {
            #location {
                padding-top: 9px;
            }

            #location-side-left-content-title .title-a {
                text-align: center;
                font-size: 38px;
                line-height: 40px;
                font-weight: 400;
            }

            #location-side-left #location-side-left-content-body {
                grid-column: 1/10;
                color: #202831;
            }

            #location-side-left-content-button {
                grid-column: 2 / 10;
            }

            #location .info-btn-gg {
                width: 100%;
            }

            #location .info-tab .location-tab-txt {
                padding: 0;
                padding-right: 32px;
            }

            #location .info-tabs-block {
                justify-content: left;
                padding-bottom: 6px;
            }


            #location .location-tab-txt {
                display: flex;
                align-items: center;
                padding: 10px 16px;
            }

            #location #location-side-tab-head {
                padding-top: 70px;
            }

            #location-side-left-content {
                padding: 0;
            }

            #location .info-tabs-block-arrow::after {
                filter: brightness(0.2);
            }
        }
    </style>
    <?php
    break;





    case 'dynamic':
    ?>
    <style type="text/css">
        #location-side-left-bg {
            display: block;
        }

        #location .info-tab .location-tab-txt {
            padding: 6px 28px;
        }

        #location .location-side-tab-body::-webkit-scrollbar {
            width: 8px;
        }

        #location .location-side-tab-body::-webkit-scrollbar-track {
            background: #03112180;
            border-radius: 8px;
        }

        #location .location-side-tab-body::-webkit-scrollbar-thumb {
            background: #FFFFFF;
            border: 1px solid #20E3E3;
            box-shadow: 0px 1px 12px #00FFFF;
            border-radius: 8px;
        }

        #location .location-tabs-icon {
            height: 22px;
            width: 22px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media (max-width: 1024px) {
            #location #location-side-left-content {
                padding-top: 28px !important;
            }
        }
    </style>
    <?php
    break;




    case 'elegant':
    ?>
    <style type="text/css">
        #location-side-tab-head {
            grid-column: 1 / span 24;
        }

        #location-side-left-content {
            padding: 0 0rem;
        }

        #location-side-tab-head .info-tabs-block-wrap {
            max-width: unset;
        }

        #location {
            padding-top: 0px;
            padding-bottom: 45px;
        }

        #location #location-side-left {
            padding-top: 65px;
        }

        #location #location-side-right {
            padding-top: 40px;
        }

        #location .location-tabs-icon {
            margin-left: 0;
            margin-right: 12px;
        }

        #location .title-c,
        .title-b {
            display: none;
        }

        #location .theme-title .title-a {
            color: var(--mc-main-3);
        }

        .location-map {
            border: 0;
            border-radius: 0;
        }

        .info-btn-gg {
            border-radius: 0;
        }

        .btn-sale {
            border-radius: 0;
        }

        #location .info-tab.-active .location-tab-txt {
            color: var(--mc-tab-text-hover);
        }

        #location .info-tab .location-tab-txt {
            color: var(--mc-tab-text-color);
            padding: 6px 32px;

        }

        #location #location-side-tab-body {
            max-height: 230px;
        }

        #location .info-tab .location-tab-txt:hover {
            color: var(--mc-tab-text-hover);
        }

        #location .info-tabs-block {
            /* padding-bottom: 7px; */
            padding: 0;
            border-bottom: 1px solid #545e6766;
        }

        #location .info-tab {
            position: relative;
        }

        #location .info-tab img {
            display: none;
        }

        #location .info-tab::after {
            content: " ";
            background: #545e67;
            position: absolute;
            left: unset;
            right: 0;
            width: 1px;
            height: 8px;
            top: calc(50% - 4px);
        }

        #location .info-tab:nth-last-child(2):after {
            height: 0;
        }

        .location-tabs-icon {
            --icon: url(/wp-content/uploads/2022/08/6Other.png);
            background: white;
            width: 1.5rem;
            height: 1.5rem;
            -webkit-mask-image: var(--icon);
            -webkit-mask-size: contain;
            -webkit-mask-repeat: no-repeat;
        }

        .location-tabs-txt-name,
        .location-tabs-icon {
            transition: all .3s;
        }

        #location .info-tab.-active .location-tabs-icon {
            background-color: var(--mc-main-1);
        }

        #location .info-tab .location-tabs-icon {
            margin-right: 10px;
        }

        .location-side-tab-body::-webkit-scrollbar {
            width: 8px;
        }

        .location-side-tab-body::-webkit-scrollbar-track {
            background: #323A4100;
            border-radius: 8px;
        }


        .location-side-tab-body::-webkit-scrollbar-thumb {
            background: #323A41;
            border-radius: 8px;
        }


        @media (max-width: 1024px) {
            #location .theme-title .title-a {
                text-align: left;
            }

            #location #location-side-left {
                padding-top: 0px;
            }

            #location-side-left {
                padding: 0rem 28px;
                padding: 0rem 1rem;
            }

            #location #location-side-right {
                padding-inline: 1rem;
            }

            #location-side-left-content-button {
                grid-column: 1/13;
            }

            #location .info-tabs-block {
                padding-bottom: 0;
            }

            .info-btn-gg {
                width: 100%;
            }

            .location-text>p {
                font-size: 22px;
                font-weight: 400;
                line-height: 28px;
            }

            .title-a {
                font-size: 38px;
                line-height: 40px;
                padding-top: 43px;
            }

            #location .info-tab .location-tab-txt {
                color: var(--mc-main-3);
                padding: 6px 16px;

            }
        }

        #location .info-tab.-active .location-tabs-icon,
        #location .info-tab:hover .location-tabs-icon {
            background: var(--mc-main-4) !important;
        }
    </style>
    <script>
        function render_video_slider() {
            let node = document.createElement("div")
            let width = document.querySelector('#location .info-tab').offsetWidth
            node.classList.add('-absolute')
            node.classList.add('location-tab-slider')
            node.style.setProperty('--l', 0)
            node.style.setProperty('--w', width)
            document.querySelector('#location .info-tabs-blocks .info-tabs-rail').appendChild(node)
        }
        render_video_slider()
    </script>
    <?php
    break;




    case 'delight':
    ?>
    <style type="text/css">
        #location {
            padding-top: 48px;
            color: var(--text-color);
        }

        #location .info-tabs-block-wrap {
            max-width: unset;
        }

        #location {
            padding-bottom: 48px;
        }

        #location .location-tab-txt {
            transition: .5s;
        }

        #location .location-tab-txt:hover {
            transition: .5s;
        }

        .location-pin-p {
            color: var(--mc-main-3);
        }

        #location .title-a,
        .location-body {
            color: var(--text-color);
        }

        .title-c,
        .title-b {
            display: none;
        }

        #location .info-tab {
            padding: 0 20px;
            transition: .05s !important;
        }

        #location .info-tab:hover {
            transition: .05s !important;
        }

        #location .location-tab-txt {
            font-size: 26px;
            line-height: 32px;
        }

        #location .location-tabs-icon {
            --icon: url(/wp-content/uploads/2022/08/6Other.png);
            background: var(--mc-tab-text-color);
            width: 1.5rem;
            height: 1.5rem;
            -webkit-mask-image: var(--icon);
            -webkit-mask-size: contain;
            -webkit-mask-repeat: no-repeat;
            transition: .5s;
        }

        #location .info-tab.-active .location-tab-txt {
            color: var(--mc-tab-text-hover);
            border-bottom: 4px solid var(--mc-tab-text-hover);
            transition: .5s;
        }

        #location .info-tab.-active .location-tabs-icon {
            background-color: var(--mc-tab-text-hover);
        }

        #location .info-tab:hover .location-tabs-icon {
            background-color: var(--mc-tab-text-hover);
        }

        #location-side-left {
            padding-top: 0;
        }

        #location-side-right {
            padding-top: 24px;
        }

        #location .info-tab img {
            display: none;
        }

        #location-side-left-contFent-title>span {
            display: none;
        }

        #location-side-left-bg {
            display: none;
        }

        #location-side-left-content-body {
            grid-column: 3/10;
        }

        #location-side-left-content-button {
            grid-column: 3/11;
        }

        #location .info-tab {
            border-bottom: 0;
        }

        #location .location-tab-txt {
            display: flex;
            align-items: center;
            padding: 10px 8px;
            border-bottom: 4px solid transparent;
        }

        #location .location-map {
            width: 100%;
            border: 0;
            box-shadow: none;
            border-radius: 0;
        }

        #location-side-tab-head {
            grid-column: 3 / span 20;
            grid-row: 2 / span 1;
            padding-top: 48px;
        }

        #location .info-btn-gg {
            border-radius: 0;
        }

        #location .info-tabs-block {
            border: 0;
            /*            border-bottom: 0.7px solid #FFEFD8;*/
            border-radius: 0;
            box-shadow: 0px -1.7px 0px -1px var(--mc-tab-border-cl) inset
        }

        #location .info-tab:after {
            content: '';
            height: 16px;
            width: 0.7px;
            background-color: var(--mc-tab-text-color);
            position: absolute;
            left: 0;
            top: 30%;
        }

        #location .info-tab:nth-child(1):after {
            height: 0;
            width: 0;
        }

        #location .info-tabs-block-wrap {
            max-width: 100%;
        }

        #location .info-tab {
            padding: 0 40px;
        }

        #location .location-tab-txt {
            padding: 0 !important;
        }

        #location-side-tab-head {
            grid-column: 1 / span 24;
        }

        @media (max-width: 1024px) {
            #location .theme-title .title-a {
                font-weight: 400 !important;
                font-size: 38px !important;
                line-height: 40px !important;
            }

            #location-side-left-content-body {
                grid-column: 1 / 13;
            }

            #location-side-left-content-button {
                text-align: center;
                grid-column: 1 / 13;
            }

            #location .info-btn-gg {
                width: 100%;
            }

            #location .location-tab-txt {
                display: flex;
                align-items: center;
                padding: 10px 16px;
            }

            #location-side-left-content-title {
                text-align: left;
            }


            #location .info-btn-gg {
                font-weight: 400;
            }

            #location #location-side-right {
                padding: 24px 0;
            }

            #location .theme-title {
                padding-top: unset;
            }

            #location {
                padding-top: 43px;
                padding-bottom: 0;
            }

            #location .info-tab {
                padding: 0 16px;
            }

            #location #location-side-tab-head {
                padding-top: 30px;
            }
        }

        .location-side-tab-body::-webkit-scrollbar {
            width: 8px;
        }

        .location-side-tab-body::-webkit-scrollbar-track {
            background: #FFEFD800;
            border-radius: 8px;
        }


        .location-side-tab-body::-webkit-scrollbar-thumb {
            background: #FFEFD873;
            border-radius: 8px;
        }
    </style>
    <?php
    break;
}
?>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    var els = $$('.location-side-tab-body');
    for(let el of els){
        var hammerTime = new Hammer(el);
        hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
        hammerTime.on("panend", function (ev) {

            let i = 0;
            var body = $$('.location-side-tab-body');
            let max = body.length;
            for(let b of body){
                if (b.dataset.show == '1') {
                    break;
                }else{
                    i++;
                }
            }
            xconsolex.log(i)
            xconsolex.log(max)

            let di = 0;
            if (ev.deltaX > 20) {
                di = -1;
            } else if (ev.deltaX < -20) {
                di = +1;
            }
            i = (((i+di)%max)+max)%max
            xconsolex.log('new i',i)
            $$('#location-wrap .info-tab')[i].click()

        })
    }
</script>
<?php theme_overide_style($content) ?>