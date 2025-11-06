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

<section id="info" class="is-on-nav is-on-nav-mob">
    <div class="cont-pd py-16 section-fade">
        <div class="info-inner">
            <h2 class="text-center"><?php pll_e('ข้อมูลโครงการ')?></h2>
            <div class="text-center grid grid-cols-12">
                <div class="relative info-mar col-span-12 xl:col-span-10 col-start-1 xl:col-start-2">
                    <div class="info-line"></div>
                    <div class="info-tabs-block">

                        <div class="info-tab-wrap" data-i='0' onclick="info_tabs_change(0)">
                            <div class="info-tab">
                                <h6 class="info-tab-txt"><?php pll_e('รายละเอียด')?></h6>
                            </div>
                        </div>
                        <?php 

                        if ($content['hide-progress']=='show') {
                            ?>
                            <div class="info-tab-wrap" data-i='1' onclick="info_tabs_change(1)">
                                <div class="info-tab">
                                    <h6 class="info-tab-txt"><?php pll_e('ความคืบหน้า')?></h6>
                                </div>
                            </div>
                            <?php
                        }                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="info-wrap grid grid-cols-12">
                <div id="info-detail" data-tab="0" data-show="0" class="col-start-1 xl:col-start-2 col-span-12 xl:col-span-10 ">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 xl:col-span-7">
                            <h5><?= $f['project_name'] ?></h5>
                            <div class="info-detail grid grid-cols-1 xl:grid-cols-2 pt-6 gap-y-4">
                                <?php
                                foreach ($content['details'] as $key => $value) {
                                    ?>
                                    <div class="col-span-1">
                                        <p class="tag" style="font-weight: 300; "><?= $value['title'] ?></p>
                                        <p class="hightlight" style="padding-top: 2px;"><?= $value['text'] ?></p>
                                        <ul class="list-disc">
                                            <?php
                                            foreach ($value['bullet'] as $key => $v) {
                                                ?>
                                                <li class="hightlight"><?= $v['text'] ?></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="hidden xl:block pt-10">
                                <?php if ($content['more_information']['url'] != '') : ?>
                                    <a  target="_blank" href="<?= $content['more_information']['url'] ?>" class="info-btn">
                                        <div>
                                            <img src="/wp-content/uploads/2023/03/Download.png" alt="">
                                            <p><?php pll_e('ดาวน์โหลดเพิ่มเติม')?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php if ($content['more_condition'] != '') : ?>
                                    <a  target="_blank" href="<?= $content['more_condition'][0]->guid ?>" class="pl-4 info-btn">
                                        <div>
                                            <img src="/wp-content/uploads/2023/03/Information.png" alt="">
                                            <p><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-span-12 xl:col-span-5">
                            <div class="info-img-wrap">
                                <!-- <img class="info-img" src="<?= $content['information_image']['url'] ?>" alt="<?= $f['information_image']['title'] ?>"> -->
                                <div class="info-img" style="background-image: url(<?= $content['information_image']['url'] ?>);"></div>
                            </div>
                            <div class="xl:hidden pt-10">
                                <?php if ($content['more_information']['url'] != '') : ?>
                                    <a href="<?= $content['more_information']['url'] ?>" class="info-btn">
                                        <div class="">
                                            <img src="/wp-content/uploads/2023/03/Download.png" alt="">
                                            <p><?php pll_e('ดาวน์โหลดเพิ่มเติม')?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php if ($content['more_condition'] != '') : ?>
                                    <a href="<?= $content['more_condition'][0]->guid ?>" class="info-btn pt-2">
                                        <div class="">
                                            <img src="/wp-content/uploads/2023/03/Information.png" alt="">
                                            <p><?php pll_e('ข้อมูลเงื่อนไขเพิ่มเติม')?></p>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 

                $pro_check = 0;
                if (!is_array($content['image'])) {
                    $pro_check = 0;
                }else{
                    $pro_check = ofsize($content['image']);
                }
                ?>
                <div id="info-detail" data-tab="1" data-show="0" class="col-start-2 col-span-12 ">
                    <div class="grid grid-cols-12 xl:grid-cols-11">
                        <div class="col-span-12 xl:col-span-6">
                            <div class="detail-rail-wrap">
                                <div class=" detail-rail" data-i="0" data-max="<?= $pro_check ?>" data-end="0" style=" --i: 0; --max:<?= $pro_check ?>">
                                    <?php foreach ($content['image'] as $key => $value) : ?>
                                        <div class="detail-img jb-lightbox" data-jb-lightbox="progress" style="background-image: url(<?= $value['url'] ?>);--img: url(<?= $value['url'] ?>)"></div>
                                    <?php endforeach ?>
                                </div>
                                
                                <div class="detail-nav-wrap">
                                    <div class="detail-nav">
                                        <?php foreach ($content['image'] as $key => $value) : ?>
                                            <div onclick="setDetail(<?= $key ?>)" class="detail-nav-dot <?= ($key == 0) ? '-active' : '' ?>"></div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <script>
                                    function setDetail(next) {
                                        let rail = document.querySelector('.detail-rail')
                                        let now = parseInt(rail.dataset.i)
                                        let max = parseInt(rail.dataset.max)

                                        rail.dataset.i = next
                                        rail.style.setProperty('--i', next);

                                        document.querySelector('.detail-nav-dot.-active').classList.remove('-active')
                                        document.querySelectorAll('.detail-nav-dot')[next].classList.add('-active')
                                        xconsolex.log(next == max - 1)
                                        xconsolex.log(rail.dataset);

                                        if (next == max - 1) {
                                            rail.dataset.end = 1
                                        } else {
                                            rail.dataset.end = 0
                                        }

                                    }
                                </script>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-5 progress-wrap">
                            <div class="progress-title-wrap">
                                <div class="">
                                    <div class="main-progress"></div>
                                </div>
                                <div class="progress-title">
                                    <h3><?php pll_e('ภาพรวม')?></h3>
                                    <?php 
                                    if ($content['overall']) {
                                        ?>
                                        <h6 class=""><?= $content['overall'] ?></h6>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            
                            <?php 
                            if ($content['progress_list']) {
                                ?>
                                <div class="progress-show grid <?= (ofsize($content['progress_list']) > 3) ? 'grid-cols-2' :  'grid-cols-1' ?> gap-x-8 gap-y-8">
                                    <?php foreach ($content['progress_list'] as $key => $value) : ?>
                                        <div class="progress-item">
                                            <label><?= $value['name'] ?></label>
                                            <div class="progress-bar">
                                                <span class="-bar" data-percent="<?= $value['percent'] ?>" style="--pc:0"><span class="-bar-inner"></span></span>
                                                <span class="-percent"><?= $value['percent'] ?>%</span>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


</section>

<script>
    const cp = new CircleProgress('.main-progress', {
        max: 100,
        value: 0,
        textFormat: 'percent',
        animation: 'easeInOutCubic',
        animationDuration: 1200,
    });

    function info_tabs_change(i) {
        let section = document.querySelector('#info')
        let active = parseInt(section.dataset.active)
        if (!isNaN(active)) {
            document.querySelector('#info .info-tab-wrap.-active').classList.remove('-active')
            document.querySelector(`#info-detail[data-show="1"]`).dataset.show = 0
        }
        section.dataset.active = i
        document.querySelector(`#info .info-tab-wrap[data-i="${i}"]`).classList.add('-active')
        document.querySelector(`#info-detail[data-tab="${i}"]`).dataset.show = 1
        let bars = document.querySelectorAll('.progress-bar .-bar')
        // let progress = document.querySelector('.main-progress')
        if (i == 0) {
            cp.value = 0
        }
        if (i == 1) {
            cp.value = parseInt(<?= $content['percent'] ?>)
        }
        for (let bar of bars) {
            // xconsolex.log(bar)
            if (i == 1) {
                setTimeout(() => {
                    bar.style.setProperty('--pc', bar.dataset.percent)
                }, 100)

            } else {
                setTimeout(() => {
                    bar.style.setProperty('--pc', 0)
                }, 100)
            }

        }

    }
    info_tabs_change(0)
</script>
<script type="text/javascript">
    function openInfoModal() {
        var modal = document.querySelector("#info #Modal-img");
        modal.style.display = "block";
    }

    function closeInfoModal() {
        document.querySelector("#info #Modal-img").style.display = "none";
    }
    var slideIndex = 0;

    function plusInfoSlides(n) {
        showInfoSlides(slideIndex += n);
    }

    function currentInfoSlide(n) {
        showInfoSlides(slideIndex = n);
    }

    function showInfoSlides(n) {
        openInfoModal()
        var i;
        var slides = document.querySelectorAll("#info .mySlides");
        var dots = document.querySelectorAll("#info .demo-modal");
        if (n > slides.length - 1) {
            slideIndex = 0
        }
        if (n < 0) {
            slideIndex = slides.length - 1
        };
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-modal", "");
        }
        slides[slideIndex].style.display = "block";
        dots[slideIndex].className += " active-modal";
    }
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    var el = $('.detail-rail');
    var hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = el.dataset.i
        let max = el.dataset.max

        i = parseInt(i)
        max = parseInt(max)
        let di = 0;
        if (ev.deltaX>20) {
            di = -1
        }else if(ev.deltaX<-20){
            di = +1
        }
        i = (((i+di)%max)+max)%max
        xconsolex.log('newi',i)

        $$('.detail-nav-dot')[i].click()
    })
</script>