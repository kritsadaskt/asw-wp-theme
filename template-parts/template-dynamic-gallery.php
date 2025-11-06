<?php
$content = $args[0];
$f = $args[1];
?>
<style type="text/css">
    #gallery {
        --g: 4;
        --i: 0;
        --container: 1280px;
        --group-w: calc(var(--container) * 0.75);
        --group-gap: 16px;
        --shift: 0px;
        --mg: calc(((100% - var(--container)) / 2) - var(--group-gap));
        --normal-tx: calc(var(--group-w) * var(--i) * -1);
        background-size: cover;
        background-position: bottom;
        padding-top: 6.75rem;
        padding-bottom: 6.75rem;
        background-color: #001B28;
    }

    #gallery-wrap {
        width: 100%;
        overflow: hidden;
    }

    .gallery-cont {
        padding-left: var(--mg);
        transition: all .5s ease-in-out;
        /*        transform:translateX(var(--shift));*/
        position: relative;
        will-change: transform;
    }

    #gallery-rail {
        position: relative;
        display: flex;
        padding-top: 80px;
        padding-bottom: 30px;
        transition: all .5s ease-in-out;
        will-change: transform;
        transform: translateX(calc(var(--normal-tx) + var(--shift)));
    }

    #gallery[data-mod-3="1"][data-end="1"] .gallery-cont {
        --shift: calc(var(--group-w) * 0.35 - 8px + 320px);
    }

    #gallery[data-mod-3="2"][data-end="1"] .gallery-cont,
    #gallery[data-mod-3="0"][data-end="1"] .gallery-cont {
        --shift: calc(var(--group-w) * 0.35 - 8px);
    }


    .gallery-img {
        width: 100%;
        box-shadow: 0px 4px 32px rgba(255, 255, 255, 0.25);
        border-radius: 16px;
        border: 4px solid #FFFFFF;
        background-size: cover;
        background-position: center;
        aspect-ratio: 577/345;
        overflow: hidden;
        cursor: pointer;
        position: relative;
        z-index: 10;
    }

    .gallery-group {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: 24px 1fr 1fr 24px;
        grid-gap: var(--group-gap);
        width: var(--group-w);
        padding-left: var(--group-gap);
    }

    .gallery-block:nth-child(1) {
        grid-column: 1 / 3;
        grid-row: 1 / 4;
    }

    .gallery-block:nth-child(2) {
        grid-column: 3 / 4;
        grid-row: 2 / 3;
    }

    .gallery-block:nth-child(3) {
        grid-column: 3 / 4;
        grid-row: 3 / 4;
    }

    .gallery-title {
        position: relative;
        margin-bottom: -40px;
    }

    #gallery-nav {
        display: grid;
        margin: auto;
        width: 304px;
        height: 48px;
        grid-template-columns: 48px auto 48px;
        grid-column-gap: 32px;
        margin-top: -30px;
    }

    .gallery-nav-arrow {
        opacity: 1;
        transition: all .2s;
        background-image: var(--mc-arrow-up);
        background-size: cover;
        padding-top: 100%;
        cursor: pointer;
    }

    .gallery-nav-arrow.-r {
        transform: rotate(90deg) scale(1.4);
    }

    .gallery-nav-arrow.-l {
        transform: rotate(-90deg) scale(1.4);
    }

    .gallery-nav-line {
        align-items: center;
        display: flex;
        position: relative;
    }

    .gallery-nav-line-bg {
        height: 2px;
        background: #fff;
        border-radius: 10em;
        width: 100%;
        position: relative;
        z-index: 2;
    }

    .gallery-nav-line-bar {
        transition: left .5s;
        border: 1px solid var(--mc-main-5);
        box-shadow: 0px 1px 12px var(--mc-main-5);
        border-radius: 8px;
        background-color: #fff;
        position: absolute;
        z-index: 1;
        width: calc(100% / var(--g));
        height: 4px;
        left: calc(100% / var(--g) * var(--i));
    }

    .gallery-img-pic {
        width: 100%;
        height: 100%;
        background-image: var(--img);
        background-size: cover;
        background-position: center;
        transition: all 1s;
        transform: scale(1);
        will-change: transform;
        z-index: -10;
    }

    .gallery-img-pic:hover {
        transform: scale(1.2);
    }

    .gallery-hov-glow {
        position: absolute;
        top: 16.5%;
        left: 16.5%;
        opacity: 0;
    }

    .gallery-nav-arrow:hover .gallery-hov-glow {
        opacity: 0.1;
    }

    .demo-modal {
        opacity: 1;
        transition: .4s;
        border: 4px solid #FFFFFF00;
    }

    .active-modal,
    .demo-modal:hover {
        border: 4px solid #FFFFFF;
        box-shadow: 0px 0px 14px 4px rgba(255, 255, 255, 0.25);
        border-radius: 8px;
        transition: .4s;
    }

    .mySlides {
        height: auto;
        aspect-ratio: 16/9;
        background-color: rgba(255, 255, 255, 0);
    }

    .modal-img-content {
        position: relative;
        background-color: rgba(255, 255, 255, 0);
        margin: auto;
        padding: 0;
        top: 4vw;
        width: 70%;
        max-width: 1200px;
    }

    .modal-column {
        width: auto;
        height: 65px;
        padding: 0;
        margin: 12px 8px;
        display: inline-block;
    }

    .next {
        transform: rotate(90deg) scale(1.4);
        filter: brightness(1);
    }

    .next:hover,
    .prev:hover {
        filter: brightness(1.2);
    }

    .prev {
        transform: rotate(-90deg) scale(1.4);
        filter: brightness(1);
    }


    .lightbox-arrow {
        cursor: pointer;
    }

    .lightbox-hov-glow {
        position: absolute;
        opacity: 0;
    }

    .lightbox-arrow:hover .lightbox-hov-glow {
        opacity: 0.1;
    }

    #gallery-norail {
        padding-top: 80px;
        padding-bottom: 80px;
        display: flex;
        justify-content: center;
        gap: 1rem;
    }

    .modal-img .facility-arrow {
        width: 68px;
        height: 68px;
        cursor: pointer;
        transition: .5s;
        background-image: var(--mc-arrow-up);
        background-repeat: no-repeat;
        background-size: contain;
        cursor: pointer;
        transition: .6s ease;
        transform: rotate(90deg);
        top: 50%;
        margin-top: -50px;
        position: absolute;
        right: -9vw;
    }

    .modal-img .facility-arrow:hover {
        filter: brightness(1.2);
    }

    .modal-img .facility-arrow.-left {
        transform: rotate(-90deg);
        left: -9vw;
    }

    #gallery[data-i="0"] .gallery-nav-arrow.-l {
        opacity: .5;
        pointer-events: none;
    }

    #gallery[data-end="1"] .gallery-nav-arrow.-r {
        opacity: .5;
        pointer-events: none;
    }

    /*-- Mobile Version --*/
    @media (max-width:1319px) {
        #gallery-nav {
            display: none;
        }
    }
</style>

<section id="gallery" class="is-on-nav is-on-nav-mob" data-i="0" data-max="<?= ceil(ofsize($content['gallery']) / 3) ?>"
    style="--i:0; --g: <?= ceil(ofsize($content['gallery']) / 3) ?>;"
    data-mod-3="<?= ceil(ofsize($content['gallery']) % 3) ?>" data-mod-6="<?= ceil(ofsize($content['gallery']) % 6) ?>">
    <div class="container mx-auto section-fade">
        <div class="text-center text-white gallery-title">
            <div class="theme-title">
                <span class="title-c"><?php pll_e('แกลเลอรี')?></span>
                <span class="title-b"><?php pll_e('แกลเลอรี')?></span>
                <h2 class="title-a"><?php pll_e('แกลเลอรี')?></h2>
            </div>
        </div>
    </div>
    <div id="gallery-wrap" class="section-fade">
        <?php switch (ofsize($content['gallery'])):
            case 1:
            ?>
            <style>
                .gallery-group {
                    display: block;
                    width: 784px;
                    padding-left: 0;
                }
            </style>
            <div id="gallery-norail" class="cont-pd">
                <div class="gallery-group">
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][0]['url'] ?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            break;





            case 2: ?>
            <style>
                .gallery-group {
                    grid-template-rows: 74px 1fr 1fr;
                    padding-left: 0;
                }

                #gallery-norail {
                    gap: 2rem;
                }

                .gallery-group:nth-child(1) .gallery-block {
                    grid-column: 1 / 4;
                    grid-row: 1 / 4;
                    grid-row-start: 1;
                }

                .gallery-group:nth-child(2) .gallery-block {
                    grid-column: 1 / 4;
                    grid-row: 1 / 4;
                    grid-row-start: 2;
                }

                /*-- Mobile Version --*/
                @media (max-width: 1319px) {
                    #gallery-norail {
                        flex-flow: row wrap;
                        gap: 8px;
                        padding-top: 60px;
                    }

                    .gallery-group {
                        display: block;
                    }
                }
            </style>
            <div id="gallery-norail" class="cont-pd flex gallery-2 gap-8">
                <div class="gallery-group">
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][0]['url'] ?>)"></div>
                        </div>
                    </div>
                </div>
                <div class="gallery-group">
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][1]['url'] ?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break;





            case 3:
            ?>
            <style type="text/css">
                .gallery-group {
                    padding-left: 0;
                    --group-w: 1144px;
                }

                /*-- Mobile Version --*/
                @media (max-width: 1319px) {
                    .gallery-group {
                        --group-gap: 8px;
                        padding-left: 0;
                        --group-w: 1144px;
                        grid-template-rows: auto auto;
                        grid-template-columns: 1fr 1fr;
                    }

                    .gallery-block:nth-child(1) {
                        grid-column: 1 / span 2;
                        grid-row: 1 / span 1;
                    }

                    .gallery-block:nth-child(2) {
                        grid-column: 1 / span 1;
                        grid-row: 2 / span 1;
                    }

                    .gallery-block:nth-child(3) {
                        grid-column: 2 / span 1;
                        grid-row: 2 / span 1;
                    }
                }
            </style>
            <div id="gallery-norail" class="cont-pd flex justify-center gap-8">
                <div class="gallery-group">
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][0]['url'] ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][1]['url'] ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][2]['url'] ?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break;





            case 4:
            ?>
            <style>
                .gallery-group {
                    --group-w: 752px;
                    padding-left: 0;
                    grid-template-columns: repeat(4, 1fr);
                    grid-template-rows: 24px 1fr 24px 1fr 24px;
                }

                .gallery-block:nth-child(1) {
                    grid-column: 1 / 3;
                    grid-row: 1 / 3;
                }

                .gallery-block:nth-child(2) {
                    grid-column: 1 / 3;
                    grid-row: 3 / 6;
                }

                .gallery-block:nth-child(3) {
                    grid-column: 3 / 5;
                    grid-row: 2 / 4;
                }

                .gallery-block:nth-child(4) {
                    grid-column: 3 / 5;
                    grid-row: 4 / 6;
                }

                /*-- Mobile Version --*/
                @media (max-width: 1319px) {
                    .gallery-group {
                        --group-gap: 8px;
                        padding-left: 0;
                        --group-w: 1144px;
                    }
                }
            </style>
            <div id="gallery-norail" class="cont-pd flex justify-center gap-8">
                <div class="gallery-group">
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][0]['url'] ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][1]['url'] ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][2]['url'] ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-block">
                        <div class="gallery-img">
                            <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                            style="--img:url(<?= $content["gallery"][3]['url'] ?>)"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php break;





            default: ?>
            <style type="text/css">
                .gallery-group-round {
                    display: grid;
                    grid-template-columns: repeat(var(--round_group), var(--group-w));
                }

                @media (max-width: 1319px) {
                    #gallery {
                        padding-top: 64px;
                        padding-top: 4rem;
                        padding-bottom: 4rem;
                        --shift: 0px;
                        --group-w: calc(21em);
                    }

                    #gallery-wrap {}

                    #gallery-rail {
                        font-size: 4.266vw;
                        --group-gap: 0.5rem;
                        padding-bottom: 65px;
                        padding-left: var(--group-gap);
                    }

                    .gallery-group {
                        grid-template-rows: 11.5em 5.6em 0.625em;
                        grid-template-columns: 1fr 1fr;
                        width: var(--group-w);

                    }

                    .gallery-img {
                        width: 100%;
                        height: 100%;
                    }

                    .gallery-block:nth-child(1) {
                        grid-row: 1 / span 1;
                        grid-column: 1 / span 2;

                    }

                    .gallery-block:nth-child(2) {
                        grid-row: 2 / span 1;
                        grid-column: 1 / span 1;

                    }

                    .gallery-block:nth-child(3) {
                        grid-row: 2 / span 1;
                        grid-column: 2 / span 1;
                    }

                    .gallery-group:nth-child(even) {
                        grid-template-rows: 0.625em 5.6em 11.5em;
                    }

                    .gallery-group:nth-child(even) .gallery-block:nth-child(1) {
                        grid-row: 3 / span 1;
                    }

                    #gallery[data-end="1"] .gallery-cont {
                        --shift: calc(8vw - 1rem) !important;
                    }

                    #gallery[data-mod-6="2"][data-end="1"] .gallery-cont,
                    #gallery[data-mod-6="4"][data-end="1"] .gallery-cont {
                        --shift: calc(8vw - 1rem) !important;
                    }


                }
            </style>
            <div class="gallery-cont">
                <div id="gallery-rail" data-max="<?= ofsize($content['gallery']) ?>">
                    <div class="gallery-group-round">
                        <?php
                        $round = 0;
                        foreach ($content['gallery'] as $key => $value) {
                            $round += 1;
                            ?>
                            <?php if ($round == 1) { ?>
                                <div class="gallery-group">
                                <?php } ?>
                                <div class="gallery-block" data-i="<?= $round ?>">
                                    <div class="gallery-img">
                                        <div class="gallery-img-pic jb-lightbox" data-jb-lightbox="desktop"
                                        style="--img:url(<?= $content["gallery"][$key]['url'] ?>)"></div>
                                    </div>
                                </div>
                                <?php if ($round % 3 == 0 && $round != 0 && $round != ofsize($content['gallery'])) { ?>
                                </div>
                                <div class="gallery-group">
                                <?php }
                                if ($round == ofsize($content['gallery'])) { ?>
                                </div>
                            <?php } ?>
                        <?php }
                        $round_group = intval($round / 3);
                        $round_items = $round - ($round_group * 3);
                        if ($round_items > 0) {
                            $round_group++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            #gallery-wrap {
                --round_group:
                <?= $round_group ?>
                ;
                --round_items:
                <?= $round_items ?>
                ;
            }
        </style>
        <div id="gallery-nav">
            <div class="gallery-nav-arrow -l" onclick="gallery_arrow(-1)">
                <div class="gallery-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
            </div>
            <div class="gallery-nav-line">
                <div class="gallery-nav-line-bg"></div>
                <div class="gallery-nav-line-bar"></div>
            </div>
            <div class="gallery-nav-arrow -r" onclick="gallery_arrow(1)">
                <div class="gallery-hov-glow w-8 h-8 rounded-full bg-white opacity-100"></div>
            </div>
        </div>
        <style type="text/css">
            #gallery-nav-m {
                display: none;
            }

            /*-- Mobile Version --*/
            @media (max-width: 1319px) {
                #gallery-nav-m {
                    display: block;
                    padding: 0 1rem;
                }

                .gallery-2-nav-dots {
                    display: inline-flex;
                    justify-content: center;
                    align-items: center;
                    padding: 0 1rem;
                    width: 100%;
                }

                .gallery-2-nav-dot.-active {
                    border: 1px solid var(--mc-main-1);
                    box-shadow: 0px 1px 12px var(--mc-main-5);
                    width: 12px;
                    height: 12px;
                }

                .gallery-2-nav-dot {
                    margin: 0 15px;
                    width: 8px;
                    height: 8px;
                    background-color: #fff;
                    border-radius: 100%;
                    transition: all .3s;
                    cursor: pointer;
                }
            }
        </style>
        <div id="gallery-nav-m">
            <div class="gallery-2-nav-dots">
                <?php foreach ($content['gallery'] as $i => $v): ?>
                    <?php if ($i % 3 == 0): ?>
                        <div onclick="gallery_select(this.dataset.i)" data-i="<?= $i / 3 ?>" class="gallery-2-nav-dot "></div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <?php
        break;
    endswitch; ?>

</div>
</section>

<script type="text/javascript">
    function gallery_change() {
        let section = document.querySelector('#gallery')
        section.style.setProperty('--i', section.dataset.i)
        let max = parseInt(section.dataset.max)
        let i = parseInt(section.dataset.i)
        xconsolex.log(max)
        if (i == max - 1) {
            section.dataset.end = 1
        } else {
            section.dataset.end = 0
        }
        if ($('.gallery-2-nav-dot.-active') != null) {
            $('.gallery-2-nav-dot.-active').classList.remove('-active')
        }
        $$('.gallery-2-nav-dot')[i].classList.add('-active')

    }

    function gallery_arrow(plus) {
        let section = document.querySelector('#gallery')
        let end = parseInt(section.dataset.max) - 1
        let now = parseInt(section.dataset.i)
        let next = now + plus
        xconsolex.log('next a', next)
        gallery.dataset.i = next
        if (next < 0) {
            next = end
        } else if (next > end) {
            next = 0
        }
        xconsolex.log('next b', next)
        section.dataset.i = next
        gallery_change()
    }
    function gallery_select(i) {
        let section = document.querySelector('#gallery')
        section.dataset.i = i
        gallery_change()
    }
    $('.gallery-2-nav-dot').classList.add('-active')
</script>

<script type="module">
    import hammerjs from "https://cdn.skypack.dev/hammerjs@2.0.8";
    let el = $('.gallery-group-round')
    let hammerTime = new Hammer(el);
    hammerTime.get('pan').set({ direction: Hammer.DIRECTION_HORIZONTAL });
    hammerTime.on("panend", function (ev) {

        let i = 0;
        var nav = $$('.gallery-2-nav-dot');
        let max = nav.length;
        for(let b of nav){
            if (b.classList.contains('-active')) {
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
        nav[i].click()

    })
</script>
<?php theme_overide_style($content) ?>