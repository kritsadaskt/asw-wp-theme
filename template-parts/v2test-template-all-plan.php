<?php
$content = $args[0];
$f = $args[1];
$template = $args[2];
$mc_3 = $f['color_swatch']['mc_3'];
$mc_3 = rgb_to_rgb($mc_3);

$mc_4 = $f['color_swatch']['mc_4'];
$mc_4 = rgb_to_rgb($mc_4);

$v2_content = get_field('v2_content');
$content = $v2_content[8];

?>
<style type="text/css">
    #plan {
        position: relative;
        z-index: 2;
    }

    .plan-pic {
        width: 864px;
        margin: 40px auto 0;
        max-width: none;

    }

    .plan-pic img {
        width: auto;
        height: 500px;
        border: 4px solid #FFFFFF;
        box-shadow: 0px 4px 32px 8px rgba(255, 255, 255, 0.25);
        border-radius: 16px;
        background: #fff;
    }

    .plan-select-i {
        width: 256px;
    }

    .plan-select {
        margin-top: 26px;
        justify-content: center;
    }

    .dynamic-selector-ui-wrap {
        padding: 2px;
        border-radius: 24px;
        background-image: linear-gradient(to left, var(--mc-gd-1), var(--mc-gd-2));
        cursor: pointer;
        position: relative;
    }

    .dynamic-selector-ui {
        padding: 6px 16px;
        isolation: isolate;
        border-radius: 24px;
        background: rgba(<?= $mc_3['r'] ?>, <?= $mc_3['g'] ?>, <?= $mc_3['b'] ?>, 0.7);
    }

    .dynamic-selector-ui-wrap .-arrow {
        background-image: var(--mc-chevron-up);
        width: 14px;
        height: 100%;
        position: absolute;
        background-size: contain;
        right: 1em;
        top: 0;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .info-tab-options {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: rgba(<?= $mc_3['r'] ?>, <?= $mc_3['g'] ?>, <?= $mc_3['b'] ?>, 0.8);
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.35);
        backdrop-filter: blur(10px);
        border-radius: 8px;
        padding: 24px 0;
        /*        max-height: 252px;*/
        /*        overflow-y: auto;*/
        z-index: 10;
    }

    .info-tab-options[data-showb="1"] {
        display: block;
    }

    .info-tab-options::-webkit-scrollbar {
        width: 6px;
    }

    .info-tab-options::-webkit-scrollbar-track {
        background: transparent;
    }

    .info-tab-options::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.4);
        border-radius: 8px;
    }

    .info-tab-option {
        background: rgba(<?= $mc_4['r'] ?>, <?= $mc_4['g'] ?>, <?= $mc_4['b'] ?>, 0);
        cursor: pointer;
        padding: 8px 24px;
        transition: all .3s;
    }

    .info-tab-option:hover {
        background: rgba(<?= $mc_4['r'] ?>, <?= $mc_4['g'] ?>, <?= $mc_4['b'] ?>, 0.3);
    }

    .dynamic-selector-ui[data-show-options="-1"]~.info-tab-options {
        display: none;
    }

    .selected-label {
        pointer-events: none;
        display: block;
        width: calc(100% - 2rem);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .dynamic-selector--bg-close {
        position: fixed;
        width: 100%;
        height: 100vh;
        top: 0;
        left: 0;
        z-index: 5;
        cursor: default;
        display: none;
    }

    .dynamic-selector-ui[data-show-options="1"] .dynamic-selector--bg-close {
        display: block;
    }

    .-arrow {
        transition: all .3s;
        transform: rotate(180deg);
    }

    .dynamic-selector-ui[data-show-options="1"]~.-arrow {
        transform: rotate(0deg);
    }

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        .plan-select {
            flex-flow: column wrap;
            padding: 0 1rem;
        }

        #plan .-line {
            display: none;
        }

        .plan-select-i {
            width: 100%;
        }

        .plan-pic {
            width: calc(100% - 2rem);
            box-sizing: border-box;
            margin-top: 32px;
        }

        .plan-pic img {
            width: 100%;
            height: auto;
        }

        #plan .-line {
            height: 8px;
            width: 1px;
            background-color: var(--ci-grey-300);
            position: relative;
            top: 15px;
        }
        .plan-menu-content {
            padding: 0 1rem;
        }

    }

    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        .plan-menu-content{
            padding-left:0 ;
            padding-right:0 ;
        }
    }
</style>

<section id="plan" class="is-on-nav is-on-nav-mob py-8 xl:py-16 bg-cover" style="background-image:url('<?= $content['bg_img']['sizes']['1536x1536'] ?>')">
    <div class="container mx-auto section-fade">
        <div class="plan-menu-content">
            <div class="plan-menu">
                <div class="text-center">
                    <div class="theme-title">
                        <?php 
                        if (get_post_type()=='condominium') {
                            ?>
                            <span class="title-c">แบบแปลน</span>
                            <span class="title-b">แบบแปลน</span>
                            <h2 class="title-a">แบบแปลน</h2>
                            <?php
                        }else{
                            ?>
                            <span class="title-c">แบบบ้าน</span>
                            <span class="title-b">แบบบ้าน</span>
                            <h2 class="title-a">แบบบ้าน</h2>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="info-tabs-block-wrap">
                    <div class="info-tabs-block plan-tabs-override">
                        <div class="info-tabs-block-arrow -left"></div>
                        <div class="info-tabs-blocks">
                            <div class="info-tabs-rail">
                                <?php
                                $i = 0;
                                foreach ($content['plan'] as $key => $value) {
                                    if ($key == 0) {
                                        ?>
                                        <div class="info-tab" data-i="<?= $i ?>" onclick="plan_tab_change(<?= $i ?>)">
                                            <span class="info-tab-txt"><?= $value['tab_name'] ?></span>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="-line"></div>
                                        <div class="info-tab" data-i="<?= $i ?>" onclick="plan_tab_change(<?= $i ?>)">
                                            <span class="info-tab-txt"><?= $value['tab_name'] ?></span>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    $i++;
                                } ?>
                            </div>
                        </div>
                        <div class="info-tabs-block-arrow -right"></div>
                    </div>
                </div>
            </div>
            <div class="plan-content">
                <?php
                $i = 0;
                $pcount = 0;
                foreach ($content['plan'] as $key => $value) { ?>
                    <div class="plan-side-tab-body" data-i="<?= $i ?>" data-showb="0">
                        <div class="plan-select flex gap-4">
                            <div class="plan-select-i col-span-6">
                                <p class="tag" style="padding-bottom: 4px;font-weight:700;"></p>
                                <div class="dynamic-selector-ui-wrap -building">
                                    <div class="dynamic-selector-ui" onclick="plan_show_options(this)" data-show-options="-1" data-select="0">
                                        <div class="dynamic-selector--bg-close"></div>
                                        <span class="selected-label">
                                            <?= $value['building']['0']['building_name'] ?>
                                        </span>
                                    </div>
                                    <div class="-arrow" onclick="plan_show_options($('.dynamic-selector-ui'))">
                                    </div>
                                    <div class="info-tab-options">
                                        <?php
                                        $b = 0;
                                        foreach ($value['building'] as $bk => $bv) { ?>
                                            <?php if ($bk == 0) {
                                            } else {
                                                ?>
                                                <div style="width: 90%;background-color: #FFFFFF;height: 1px;margin-left: 10px;opacity: .1"></div>
                                                <?php
                                            } ?>
                                            <div class="info-tab-option" onclick="plan_change_option(this)" data-option-o="<?= $b ?>" data-select-double-type="parent">
                                                <span class="info-tab-option-label"><?= $bv['building_name'] ?></span>
                                            </div>
                                            <?php
                                            $b++;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="plan-select-i col-span-6">
                                <p class="tag" style="padding-bottom: 4px;font-weight:700;"></p>
                                <?php
                                $b = 0;
                                foreach ($value['building'] as $bk => $bv) { ?>
                                    <div class="dynamic-selector-ui-wrap -floor" data-showb="<?= ($bk == 0) ? '1' : '0' ?>" data-b="<?= $bk ?>">
                                        <div class="dynamic-selector-ui" onclick="plan_show_options(this)" data-show-options="-1" data-select="0">
                                            <div class="dynamic-selector--bg-close"></div>
                                            <span class="selected-label">
                                                <?= $bv['floor'][0]['floor_name'] ?>
                                            </span>
                                        </div>
                                        <div class="-arrow">
                                        </div>
                                        <div class="info-tab-options">
                                            <?php
                                            $fl = 0;
                                            foreach ($bv['floor'] as $flk => $flv) { ?>
                                                <?php if ($flk == 0) {
                                                } else {
                                                    ?>
                                                    <div style="width: 90%;background-color: #FFFFFF;height: 1px;margin-left: 10px;opacity: .1"></div>
                                                    <?php
                                                } ?>
                                                <div class="info-tab-option" onclick="plan_change_option(this)" data-option-o="<?= $flk ?>" data-select-double-type="child">
                                                    <span class="info-tab-option-label"><?= $flv['floor_name'] ?></span>
                                                </div>
                                                <?php
                                                $fl++;
                                            } ?>
                                        </div>
                                    </div>
                                    <?php
                                    $b++;
                                } ?>

                            </div>
                        </div>
                        <?php
                        foreach ($value['building'] as $bk => $bv) {
                            foreach ($bv['floor'] as $flk => $flv) {
                                $pcount++;
                                ?>
                                <div class="plan-pic" data-showb="<?= ($bk == 0 && $flk == 0) ? '1' : '0' ?>" data-b="<?= $bk ?>" data-f="<?= $flk ?>">
                                    <img src="<?= $flv['floor_image']['sizes']['1536x1536'] ?>" class="jb-lightbox" data-jb-lightbox="plan-<?=$pcount?>" style="--img:url(<?= $flv['floor_image']['sizes']['1536x1536'] ?>)" >
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php $i++;
                } ?>

            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    function plan_tab_change(i) {
        if (document.querySelector('.plan-tabs-override .info-tab.-active') != undefined) {
            document.querySelector('.plan-tabs-override .info-tab.-active').classList.remove('-active')
        }
        if (document.querySelector('.plan-side-tab-body[data-showb="1"]')) {
            document.querySelector('.plan-side-tab-body[data-showb="1"]').dataset.showb = 0
        }
        document.querySelector(`.plan-tabs-override .info-tab[data-i="${i}"]`).classList.add('-active')
        document.querySelector(`.plan-side-tab-body[data-i="${i}"]`).dataset.showb = 1

        let info_tab_txt_length = document.querySelectorAll('.info-tab-txt').length

        <?php if ($template == 'elegant') : ?>
            if (i == 0) {
                document.querySelector('.plan-tab-slider').style.setProperty('--w', document.querySelectorAll('#plan .info-tab-txt')[i].clientWidth)
                document.querySelector('.plan-tab-slider').style.setProperty('--l', 0)
            } else if (i == 1) {
                document.querySelector('.plan-tab-slider').style.setProperty('--w', document.querySelectorAll('#plan .info-tab-txt')[i].clientWidth)
                document.querySelector('.plan-tab-slider').style.setProperty('--l', document.querySelectorAll('#plan .info-tab-txt')[i - 1].clientWidth)
            } else if (i > 1) {
                document.querySelector('.plan-tab-slider').style.setProperty('--w', document.querySelectorAll('#plan .info-tab-txt')[i].clientWidth)
                let sumWidth = 0
                for (let j = 0; j < i; j++) {
                    sumWidth += document.querySelectorAll('#plan .info-tab-txt')[j].clientWidth
                }
                document.querySelector('.plan-tab-slider').style.setProperty('--l', sumWidth)
            }
        <?php endif ?>


    }
    plan_tab_change(0)

    function plan_change_option(el) {
        let o = parseInt(el.dataset.optionO)
        let type = el.dataset.selectDoubleType
        el.parentElement.parentElement.querySelector('.dynamic-selector-ui').dataset.showOptions = -1
        let label = el.querySelector('.info-tab-option-label').innerText
        el.parentElement.parentElement.querySelector('.selected-label').innerText = label
        xconsolex.log(o)
        el.parentElement.parentElement.querySelector('.dynamic-selector-ui').dataset.select = o
        if (type == 'parent') {
            if (el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-showb="1"]`)) {
                el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-showb="1"]`).dataset.showb = 0
            }
            el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-b="${o}"]`).dataset.showb = 1
        }
        let wrap = el.parentElement.parentElement.parentElement.parentElement
        xconsolex.log(wrap)
        if (wrap.parentElement.querySelector('.plan-pic[data-showb="1"]') != null) {
            wrap.parentElement.querySelector('.plan-pic[data-showb="1"]').dataset.showb = 0
        }
        let selectB = wrap.querySelector('.dynamic-selector-ui-wrap.-building .dynamic-selector-ui').dataset.select
        let selectF = wrap.querySelector(`.dynamic-selector-ui-wrap.-floor[data-b="${selectB}"] .dynamic-selector-ui`).dataset.select

        xconsolex.log(selectB)
        xconsolex.log(selectF)
        wrap.parentElement.querySelector(`.plan-pic[data-b="${selectB}"][data-f="${selectF}"]`).dataset.showb = 1



    }

    function plan_show_options(el) {
        el.dataset.showOptions *= -1
        $('.dynamic-selector-ui-wrap .-arrow')
    }
</script>
<?php theme_overide_style($content) ?>
<?php
switch ($template) {
    case 'modern':
    ?>
    <style type="text/css">
        #plan .theme-title .title-a {
            color: #fff;
        }

        .plan-menu-content {
            display: grid;
            grid-template-columns: 50% 50%;
            align-items: stretch;
        }

        .plan-menu {
            color: #fff;
            background: var(--mc-main-4);
            padding: 64px 0;
            padding-right: 64px;
        }

        @media (max-width: 1319px) {
            .plan-menu-content {
                grid-template-columns: 100%;
            }

            .plan-menu {
                padding: 1rem;
            }

            #plan .theme-title .title-a {
                font-size: 38px;
                line-height: 40px;
                font-weight: 400;
            }

            .info-tabs-block-wrap {
                width: 100% !important;
            }
        }

        #plan {
            padding: 0;
        }

        .plan-pic img {
            border-radius: 0;
        }

        .plan-pic {
            margin: 64px auto;
        }

        .info-tabs-block {
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--mc-tab-border-cl) !important;
            border-radius: 0;
        }

        .info-tab.-active {
            color: #fff;
        }

        .info-tab-txt {
            padding-left: 0;
            padding-right: 54px;
        }


        #plan .info-tabs-block-arrow.-right::before {
            background-image: linear-gradient(to right, transparent, var(--mc-main-4), var(--mc-main-4));
        }

        #plan .info-tabs-block-arrow.-left::before {
            background-image: linear-gradient(to left, transparent, var(--mc-main-4), var(--mc-main-4))
        }
    </style>
    <?php
    break;





    case 'dynamic':
    ?>
    <style type="text/css">
        #plan {
            padding-top: 5.625rem;
            padding-bottom: 5rem;
            padding-top: 4rem;
            padding-bottom: 4rem;
        }

        .dynamic-selector-ui-wrap .-arrow {
            width: 22px;
        }

        .dynamic-selector-ui-wrap {
            background-image: linear-gradient(to left, var(--mc-main-gd-start), var(--mc-main-gd-stop));
        }

        .dynamic-selector-ui {
            background-color: var(--mc-tab-parent-bg);
        }

        .plan-select p {
            color: var(--text-color);
        }

        .plan-select .selected-label {
            color: var(--text-color);
        }
        <?php 
        $parent_bg = $content['tab_block']['parent_bg'];
        $parent_bg = rgb_to_rgb($content['tab_block']['parent_bg']);
        ?>
        .info-tab-options {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: rgba(<?= $parent_bg['r'] ?>, <?= $parent_bg['g'] ?>, <?= $parent_bg['b'] ?>, 0.8) !important;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(10px);
            border-radius: 8px;
            padding: 24px 0;
            /*max-height: 252px;
            overflow-y: auto;*/
            z-index: 10;
        }

        @media (max-width: 1319px) {
            #plan {
                padding-top: 70px;
            }
        }
    </style>
    <?php
    break;




    case 'elegant':
    ?>
    <style type="text/css">
        .dynamic-selector-ui {
            color: #202831 !important;
        }

        .plan-select {
            margin-top: 40px;
        }

        .info-tab-txt {
            font-size: 22px;
            line-height: 28px;
        }

        .info-tabs-block {
            padding: 0;
            border-radius: 0;
            border: none;
            border-bottom: 1px solid #CFD4D9;
        }

        #plan {
            --mc-chevron-up: url('/wp-content/uploads/2023/03/chevron-up-dark-e1678091797243.png');
        }

        #plan .tag {
            color: var(--mc-main-3);
        }

        .dynamic-selector-ui {
            border-radius: 0;
            border-bottom: 1px solid #C6BCBC;
            color: #9FA5AB;
            background-color: #8B8B8B0c;
        }

        .info-tabs-block-arrow::after {
            background-size: 14px;
        }

        .theme-title .title-a {
            color: var(--mc-main-3);
        }

        .plan-pic img {
            border-radius: 0;
        }

        .info-tab-option {
            color: rgba(32, 40, 49, 1);
        }

        .info-tab-option:hover {
            background-color: var(--mc-main-1);
            color: var(--mc-main-3);
        }

        .info-tab-options {
            border-radius: 0px;
            background-color: white;
            backdrop-filter: blur(0px);
        }

        .info-tab-options::-webkit-scrollbar {
            width: 6px;
            padding-right: 10px !important;
        }

        .info-tab-options::-webkit-scrollbar-thumb {
            background: #8B8B8B;
            border-radius: 8px;
        }

        .title-c,
        .title-b {
            display: none;
        }

        /*-- Mobile Version --*/
        @media (max-width: 1319px) {
            .info-tabs-block {
                padding: 0px;
            }

            #plan {
                padding-top: 0px;
            }

            .title-c,
            .title-b {
                display: none;
            }

            .title-a {
                font-size: 38px;
                line-height: 40px;
                padding-top: 43px;
            }

            #plan .-line {
                display: block;
            }
        }
    </style>
    <script type="text/javascript">
        function render_plan_slide() {
            let node = document.createElement("div")
            let width = document.querySelector('#plan .info-tab').offsetWidth
            node.classList.add('-absolute')
            node.classList.add('plan-tab-slider')
            node.style.setProperty('--l', 0)
            node.style.setProperty('--w', width)
            document.querySelector('#plan .info-tabs-blocks .info-tabs-rail').appendChild(node)
        }
        render_plan_slide()
    </script>
    <?php
    break;




    case 'delight':
    ?>
    <style type="text/css">
        #plan .theme-title .title-c,
        #plan .theme-title .title-b {
            display: none;
        }

        #plan .info-tab.-active .info-tab-txt {
            color: var(--mc-tab-text-hover);
            border-bottom: 4px solid var(--mc-tab-text-hover);
        }

        #plan .info-tabs-block {
            box-shadow: 0px -1.7px 0px -1px var(--mc-tab-border-cl) inset;
        }

        #plan .info-tab:after {
            background-color: var(--mc-tab-text-color);
        }

        #plan .info-tab:hover .info-tab-txt {
            color: var(--mc-tab-text-hover);
        }

        #plan .info-tab .info-tab-txt {
            transition: .5s;
            color: var(--mc-tab-text-color);
            border-bottom: 4px solid transparent;
        }

        .theme-title {
            color: var(--mc-main-5);
        }

        .dynamic-selector-ui {
            color: var(--text-color);
            border-radius: 0;
            border-bottom: 0.7px solid var(--text-color);
            background: transparent;
        }

        .plan-select-i p {
            color: var(--text-color);
        }

        .info-tab-options {
            background: #fff;
            border-radius: 0;
        }

        .info-tab-option {
            color: var(--text-color);
        }

        .info-tab-option:hover {
            background-color: var(--mc-main-1);
            color: #F9F9F9;
        }

        .dynamic-selector-ui-wrap .-arrow {
            background-image: var(--mc-chevron-up);
            transform: rotateZ(180deg);
            filter: grayscale(1);
        }

        .info-tab-options::-webkit-scrollbar {
            width: 6px;
        }

        .info-tab-options::-webkit-scrollbar-track {
            background: transparent;
        }

        .info-tab-options::-webkit-scrollbar-thumb {
            background: #746C59;
            border-radius: 8px;
        }

        #plan .info-tabs-block-wrap {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
        }

        #plan .info-tabs-block {
            grid-column: 10 / 12;
            grid-column-start: 2;
        }

        #plan .plan-pic img {
            border-radius: 0;
        }

        @media (max-width: 1319px) {
            #plan h2.title-a {
                font-weight: 400 !important;
                font-size: 38px !important;
                line-height: 40px !important;
            }

            #plan .info-tab-txt {
                font-size: 22px;
                line-height: 28px;
            }

            #plan .info-tabs-block-wrap {
                display: block;
                margin: auto;
            }

            #plan .info-tab {
                padding: 0;
            }
        }
    </style>
    <?php
    break;
}
?>