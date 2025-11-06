<?php
$content = $args[0];
$f = $args[1];
$chk = ofsize($content['gallery']);
$gll = $content['gallery'];

?>
<style type="text/css">
    #gallery {
        --mg: calc((100vw - 1280px) / 2);
    }

    .gallery-header {
        width: 288px;
        height: 152px;
        background: #2C2E34;
    }

    .gallery-pic {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .gallery-pic>div {
        width: 100%;
        background-image: var(--img);
        background-position: center;
        background-size: cover;
        transition: .5s ease-in-out;
        cursor: pointer;
    }

    .gallery-pic:hover>.-hover {
        transform: scale(1.07);
    }
    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        .gal-title{
            font-weight: 400;
            font-size: 38px !important;
            line-height: 40px;
        }
    }
</style>

<section id="gallery" class="section-fade is-on-nav is-on-nav-mob">
    <div class="-container -mx-auto hidden xl:block">
        <style>
            .gallery-container-wrap {
                display: grid;
                grid-template-columns: auto 1fr 1fr 1fr var(--mg);
                grid-template-rows: auto 1fr;
                padding-bottom: 72px;
            }

            .gallery-container {
                grid-column: 2/5;
                grid-row: 2/3;
            }

            .gallery-items-wrap {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }
        </style>
        <div class="gallery-container-wrap">
            <div class="gallery-header">
                <h1 class="text-white py-12 px-16 gal-title"><?php pll_e('แกลเลอรี')?></h1>
            </div>
            <div class="gallery-container">
                <?php
                if ($chk == 1) {
                    ?>
                    <style>
                        .gallery-pic .-item-1 {
                            padding-top: 44.44%;
                        }
                    </style>
                    <div class="gallery-pic">
                        <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                    </div>

                    <?php
                } else if ($chk == 2) {
                    ?>
                    <style>
                        .gallery-items:nth-child(1) {
                            grid-column: span 2;
                            /* grid-row: span 2; */
                        }

                        .gallery-items:nth-child(2) {
                            grid-column: span 1;
                            /* grid-row: span 2; */
                        }

                        .gallery-pic .-item-1 {
                            padding-top: 66.95%;
                        }

                        .gallery-pic .-item-2 {
                            padding-top: 135.57%;
                        }
                    </style>
                    <div class="gallery-items-wrap">
                        <div class="gallery-items">
                            <div class="gallery-pic">
                                <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                            </div>
                        </div>
                        <div class="gallery-items">
                            <div class="gallery-pic">
                                <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else if ($chk == 3) {
                    ?>
                    <style>
                        .gallery-pic .-item-1 {
                            padding-top: 135.57%;
                        }

                        .gallery-pic .-item-2 {
                            padding-top: 135.57%;
                        }

                        .gallery-pic .-item-3 {
                            padding-top: 135.57%;
                        }
                    </style>
                    <div class="gallery-items-wrap">
                        <div class="gallery-items">
                            <div class="gallery-pic">
                                <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                            </div>
                        </div>
                        <div class="gallery-items">
                            <div class="gallery-pic">
                                <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                            </div>
                        </div>
                        <div class="gallery-items">
                            <div class="gallery-pic">
                                <div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][2]) ?>)"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                } else if ($chk == 4) {
                ?><style>
                    .gallery-items:nth-child(1) {
                        grid-column: span 3;
                    }

                    .gallery-pic .-item-1 {
                        padding-top: 32%;
                    }

                    .gallery-pic .-item-2 {
                        padding-top: 41.34%;
                    }

                    .gallery-pic .-item-3 {
                        padding-top: 41.34%;
                    }

                    .gallery-pic .-item-4 {
                        padding-top: 41.34%;
                    }
                </style>
                <div class="gallery-items-wrap">
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][2]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-4 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][3]) ?>)"></div>
                        </div>
                    </div>
                </div>
                <?php
            } else if ($chk > 5 or $chk == 5) {
                ?>
                <style>
                    .gallery-items:nth-child(1) {
                        grid-column: span 2;
                    }

                    .gallery-pic {
                        position: relative;
                    }

                    .gallery-pic .-item-1 {
                        padding-top: 45.36%;
                    }

                    .gallery-pic .-item-2 {
                        padding-top: 91.87%;
                    }

                    .gallery-pic .-item-3 {
                        padding-top: 41.34%;
                    }

                    .gallery-pic .-item-4 {
                        padding-top: 41.34%;
                    }

                    .gallery-pic .-item-5 {
                        position: relative;
                        padding-top: 41.34%;
                    }

                    .gallery-pic .-more {
                        position: absolute;
                        display: flex;
                        top: 0;
                        left: 0;
                        height: 100%;
                        width: 100%;
                        color: #fff;
                        background-color: #202831cc;
                        align-items: center;
                        justify-content: center;
                        pointer-events: none;
                    }

                    .gallery-pic .-more img {
                        height: 46px;
                        width: auto;
                        margin: 0;
                        margin-right: 16px;
                    }
                </style>
                <div class="gallery-items-wrap">
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-3 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][2]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-4 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][3]) ?>)"></div>
                        </div>
                    </div>
                    <div class="gallery-items">
                        <div class="gallery-pic">
                            <div class="-item-5 -hover jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][4]) ?>)"></div>
                            <?php if ($chk > 5) : ?>
                                <div class="-more">
                                    <img src="/wp-content/uploads/2023/03/Group-1250.png" alt="">
                                    <h6>ดูเพิ่มเติม</h6>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                if ($chk > 5) {
                   for($i = 5;$i<$chk;$i++){
                    ?>
                    <span class="jb-lightbox" data-jb-lightbox="d" style="--img: url(<?= acf_img($content['gallery'][$i]) ?>)"></span>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
</div>
<div class="-container -mx-auto block xl:hidden">
    <style>
        .gallery-mob-header {
            background: #2C2E34;
            color: white;
            padding: 8px 16px;
            display: inline-block;
        }

        .gallery-container-mob-wrap {
            padding: 0 2rem;
            padding-top: 32px;
            padding-bottom: 56px;
        }
        /*-- Mobile Version --*/
        @media (max-width: 767px) {
            .gallery-container-mob-wrap {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        .gallery-items-mob-wrap {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }

        .gallery-mob-pic {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .gallery-mob-pic>div {
            width: 100%;
            background-image: var(--img);
            background-position: center;
            background-size: cover;
            transition: .5s ease-in-out;
            cursor: pointer;
        }

        .gallery-mob-pic:hover>.-hover {
            transform: scale(1.07);
        }
    </style>
    <div class="gallery-mob-header">
        <h1 class="gal-title">แกลเลอรี</h1>
    </div>
    <div class="gallery-container-mob-wrap">
        <?php
        if ($chk == 1) {
            ?>
            <style>
                .gallery-mob-items {
                    grid-column: span 2;
                }

                .gallery-mob-pic .-item-1 {
                    padding-top: 48.83%;
                }
            </style>
            <div class="gallery-items-mob-wrap">
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                    </div>
                </div>
            </div>
            <?php
        } else if ($chk == 2) {
            ?>
            <style>
                .gallery-mob-items {
                    grid-column: span 2;
                }

                .gallery-mob-items .-item-1 {
                    padding-top: 48.83%;
                }

                .gallery-mob-items .-item-2 {
                    padding-top: 48.83%;
                }
            </style>
            <div class="gallery-items-mob-wrap">
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                    </div>
                </div>
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                    </div>
                </div>
            </div>
            <?php
        } else if ($chk > 3 or $chk == 3) {
            ?>
            <style>
                .gallery-mob-items:nth-child(1) {
                    grid-column: span 2;
                }

                .gallery-mob-pic {
                    position: relative;
                }

                .gallery-mob-items .-item-1 {
                    padding-top: 48.83%;
                }

                .gallery-mob-items .-item-2 {
                    padding-top: 52.38%;
                }

                .gallery-mob-items .-item-3 {
                    padding-top: 52.38%;
                }

                .gallery-mob-pic .-more {
                    position: absolute;
                    display: flex;
                    top: 0;
                    left: 0;
                    height: 100%;
                    width: 100%;
                    color: #fff;
                    background-color: #202831cc;
                    align-items: center;
                    justify-content: center;
                }

                .gallery-mob-pic .-more img {
                    height: 30px;
                    width: auto;
                    margin: 0;
                    margin-right: 8px;
                }
            </style>
            <div class="gallery-items-mob-wrap">
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-1 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][0]) ?>)"></div>
                    </div>
                </div>
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-2 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][1]) ?>)"></div>
                    </div>
                </div>
                <div class="gallery-mob-items">
                    <div class="gallery-mob-pic">
                        <div class="-item-3 -hover jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][2]) ?>)">
                            <?php if ($chk > 3) : ?>
                                <div class="-more">
                                    <img src="/wp-content/uploads/2023/03/Group-1250.png" alt="">
                                    <h6>ดูเพิ่มเติม</h6>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ($chk > 3) {
               for($i = 3;$i<$chk;$i++){
                ?>
                <span class="jb-lightbox" data-jb-lightbox="mob" style="--img: url(<?= acf_img($content['gallery'][$i]) ?>)"></span>
                <?php
            }
        }
    }
    ?>
</div>
</div>
</section>

<?php theme_overide_style($content) ?>