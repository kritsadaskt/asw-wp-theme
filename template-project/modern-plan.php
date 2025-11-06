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
                                <p class="plan_select_label"><?php pll_e('อาคาร') ?></p>
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
                                <p class="plan_select_label"><?php pll_e('ชั้น') ?></p>
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