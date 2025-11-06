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
<section id="plan" class="is-on-nav is-on-nav-mob py-8 xl:py-16 bg-cover" style="background-image:url('<?= $content['background_image']['sizes']['1536x1536'] ?>')">
    <div class="container mx-auto section-fade">
        <div class="plan-menu-content">
            <div class="plan-menu">
                <div class="text-center">
                    <div class="theme-title">
                        <?php 
                        if (get_post_type()=='condominium') {
                            ?>
                            <span class="title-c"><?php pll_e('แบบแปลน')?></span>
                            <span class="title-b"><?php pll_e('แบบแปลน')?></span>
                            <h2 class="title-a"><?php pll_e('แบบแปลน')?></h2>
                            <?php
                        }else{
                            ?>
                            <span class="title-c"><?php pll_e('แบบบ้าน')?></span>
                            <span class="title-b"><?php pll_e('แบบบ้าน')?></span>
                            <h2 class="title-a"><?php pll_e('แบบบ้าน')?></h2>
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

        <?php if ($template_name == 'elegant') : ?>
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

<?php
switch ($template_name) {
    case 'elegant':
    ?>
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
}
?>