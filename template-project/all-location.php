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
                                    <?php foreach ($content['nearby_place'] as $key => $value) {
                                     ?>
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
        <?php if ($template_name == 'elegant'): ?>
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
switch ($template_name) {
    case 'elegant':
    ?>
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