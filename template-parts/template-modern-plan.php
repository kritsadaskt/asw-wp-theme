<?php
$content = $args[0];
$f = $args[1];
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
        box-shadow: 0px 60px 40px -40px #0006;
        background: #fff;
    }

    .plan-select-i {
        width: 256px;
        width: 50%;
    }

    .plan-select {
        margin-top: 26px;
        justify-content: center;
    }

    .dynamic-selector-ui-wrap {
        color: #202831;
        background: #fff;
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
        filter: brightness(0);
        width: 16px;
        height: 100%;
        position: absolute;
        background-size: contain;
        right: 1rem;
        top: 0;
        background-repeat: no-repeat;
        background-position: center;
    }

    .info-tab-options {
        position: absolute;
        background: #fff;
        top: 100%;
        left: 0;
        width: 100%;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.35);
        backdrop-filter: none;
        padding: 24px 0;
        /*max-height: 252px;
        overflow-y: auto;*/
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
        background: #9FA5AB;
        border-radius: 8px;
    }

    .info-tab-option {
        background: rgba(<?= $mc_4['r'] ?>, <?= $mc_4['g'] ?>, <?= $mc_4['b'] ?>, 0);
        cursor: pointer;
        padding: 8px 24px;
        transition: all .3s;
    }

    .info-tab-option:hover {
        background: #DFE3E8;
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


    }
</style>

<section id="plan" class="is-on-nav is-on-nav-mob py-8 xl:py-16 bg-cover">
    <div class="-container mx-auto section-fade">
        <div class="plan-menu-content">
            <div class="plan-menu">
                <div class="text-center xl:text-left">
                    <div class="theme-title">
                        <span class="title-c"><?php pll_e('แบบแปลน')?></span>
                        <span class="title-b"><?php pll_e('แบบแปลน')?></span>
                        <h1 class="title-a"><?php pll_e('แบบแปลน')?></h1>
                    </div>
                </div>
                <style>
                    #plan .info-tabs-block-wrap {
                        width: 100%;
                    }

                    #plan .info-tabs-block {
                        justify-content: flex-start;
                    }

                    #plan .info-tab {
                        padding: 0;
                        padding-right: 44px;
                        white-space: nowrap;
                    }

                    #plan .info-tab-txt {
                        padding: 0;
                        font-size: 26px;
                        line-height: 32px;
                        font-weight: 400;
                    }

                    #plan .info-tab.-active .info-tab-txt::after {
                        opacity: 1;
                    }

                    #plan .info-tab-txt::after {
                        content: "•";
                        margin-left: 5px;
                        opacity: 0;
                        transition: .3s;
                    }

                    @media (max-width: 1319px) {
                        #plan .info-tabs-block {
                            justify-content: left;
                        }

                    }
                </style>
                <div class="info-tabs-block-wrap">
                    <div class="info-tabs-block plan-tabs-override">
                        <div class="info-tabs-block-arrow -left"></div>
                        <div class="info-tabs-blocks">
                            <div class="info-tabs-rail">
                                <?php
                                $i = 0;
                                foreach ($content['plan'] as $key => $value) { ?>
                                    <div class="-line <?php if ($key == 0) {
                                        echo 'hidden';
                                    } ?>"></div>
                                    <div class="info-tab" data-i="<?= $i ?>" onclick="plan_tab_change(<?= $i ?>)">
                                        <h6 class="info-tab-txt"><?= $value['tab_name'] ?></h6>
                                    </div>
                                    <?php
                                    $i++;
                                } ?>
                            </div>
                        </div>
                        <div class="info-tabs-block-arrow -right"></div>
                    </div>
                </div>
                <?php
                $i = 0;
                foreach ($content['plan'] as $key => $value) { ?>
                    <div class="plan-select-wrap" data-i="<?= $i ?>" data-showb="0">
                        <div class="plan-select flex gap-4">
                            <div class="plan-select-i col-span-6">
                                <p class="tag" style="padding-bottom: 4px;font-weight:700; color: var(--mc-main-5); "></p>
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
                                                <div style="width: 90%;background-color: #CFD4D9;height: 1px;margin-left: 10px;opacity: 0.5"></div>
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
                                <p class="tag" style="padding-bottom: 4px;font-weight:700; color: var(--mc-main-5);"></p>
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
                                                    <div style="width: 90%;background-color: #CFD4D9;height: 1px;margin-left: 10px;opacity: 0.5"></div>
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
                    </div>
                    <?php $i++;
                } ?>
            </div>
            <div class="plan-content">
                <?php
                $i = 0;
                $pcount = 0;
                foreach ($content['plan'] as $key => $value) { ?>
                    <div class="plan-side-tab-body" data-i="<?= $i ?>" data-showb="0">
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
<style type="text/css">
    #plan .theme-title .title-a {
        color: var(--mc-main-5);
    }

    .plan-menu-content {
        display: grid;
        grid-template-columns: 42% 58%;
        align-items: stretch;
    }

    .plan-menu {
        color: #fff;
        background: var(--mc-main-4);
        padding: 128px 0;
        padding-right: 64px;
        padding-left: var(--cont-mg);
    }

    @media (max-width: 1319px) {
        .plan-menu-content {
            grid-template-columns: 100%;
        }

        .plan-menu {
            padding: 1rem 0;
            padding-top: 43px;
        }
        .plan-menu {
            padding-left: 2rem;
            padding-right: 2rem;
        }
        .plan-pic{
            width: calc(100% - 4rem);
        }
    }

    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        .plan-menu {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        .plan-pic{
            width: calc(100% - 2rem);
        }
    }

    #plan {
        padding: 0;
    }

    .plan-pic {
        margin: 64px auto;
    }

    .info-tabs-block {
        background: transparent;
        border: none;
        border-bottom: 1px solid var(--mc-tab-border-cl);
        border-radius: 0;
    }

    .info-tab.-active {
        color: #fff;
    }

    .info-tab-txt {
        padding-left: 0;
        padding-right: 54px;
    }

    /*-- Mobile Version --*/
    @media (min-width: 1320px) {
        .info-tabs-block-wrap {
            width: 100% !important;
        }
    }
</style>
<script type="text/javascript">
    function plan_tab_change(i) {
        if (document.querySelector('.plan-tabs-override .info-tab.-active') != undefined) {
            document.querySelector('.plan-tabs-override .info-tab.-active').classList.remove('-active')
        }

        if (document.querySelector('.plan-select-wrap[data-showb="1"]')) {
            document.querySelector('.plan-select-wrap[data-showb="1"]').dataset.showb = 0
        }
        if (document.querySelector('.plan-side-tab-body[data-showb="1"]')) {
            document.querySelector('.plan-side-tab-body[data-showb="1"]').dataset.showb = 0
        }

        document.querySelector(`.plan-tabs-override .info-tab[data-i="${i}"]`).classList.add('-active')
        document.querySelector(`.plan-select-wrap[data-i="${i}"]`).dataset.showb = 1
        document.querySelector(`.plan-side-tab-body[data-i="${i}"]`).dataset.showb = 1


    }
    plan_tab_change(0)

    function plan_change_option(el) {
        let o = parseInt(el.dataset.optionO)
        let type = el.dataset.selectDoubleType
        let i = el.parentElement.parentElement.parentElement.parentElement.parentElement.dataset.i
        xconsolex.log(i, 'i')
        el.parentElement.parentElement.querySelector('.dynamic-selector-ui').dataset.showOptions = -1
        let label = el.querySelector('.info-tab-option-label').innerText
        el.parentElement.parentElement.querySelector('.selected-label').innerText = label
        xconsolex.log(o, 'o')
        el.parentElement.parentElement.querySelector('.dynamic-selector-ui').dataset.select = o
        if (type == 'parent') {
            if (el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-showb="1"]`)) {
                el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-showb="1"]`).dataset.showb = 0
            }
            xconsolex.log(el, 'el')
            el.parentElement.parentElement.parentElement.parentElement.querySelector(`.-floor[data-b="${o}"]`).dataset.showb = 1
        }
        let wrap = el.parentElement.parentElement.parentElement.parentElement.parentElement
        xconsolex.log(wrap.parentElement.parentElement, 'wrap')
        if (wrap.parentElement.parentElement.querySelector(`.plan-side-tab-body[data-i="${i}"] .plan-pic[data-showb="1"]`) != null) {
            wrap.parentElement.parentElement.querySelector(`.plan-side-tab-body[data-i="${i}"] .plan-pic[data-showb="1"]`).dataset.showb = 0
            xconsolex.log('set showb to 0')
        }
        let selectB = wrap.querySelector(`.plan-select-wrap[data-i="${i}"] .dynamic-selector-ui-wrap.-building .dynamic-selector-ui`).dataset.select
        let selectF = wrap.querySelector(`.plan-select-wrap[data-i="${i}"] .dynamic-selector-ui-wrap.-floor[data-b="${selectB}"] .dynamic-selector-ui`).dataset.select

        xconsolex.log(selectB, 'selectB')
        xconsolex.log(selectF, 'selectF')
        xconsolex.log(`.plan-side-tab-body[data-i="${i}"] .plan-pic[data-b="${selectB}"][data-f="${selectF}"]`)
        wrap.parentElement.parentElement.querySelector(`.plan-side-tab-body[data-i="${i}"] .plan-pic[data-b="${selectB}"][data-f="${selectF}"]`).dataset.showb = 1

    }

    function plan_show_options(el) {
        el.dataset.showOptions *= -1
        $('.dynamic-selector-ui-wrap .-arrow')
    }
</script>
<?php theme_overide_style($content) ?>