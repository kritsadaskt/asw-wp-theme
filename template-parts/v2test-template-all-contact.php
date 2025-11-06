<?php
$content = $args[0];
$f = $args[1];
$template = $args[2];
$master = $args[3];
$content = aswv2_gen_master($master,$content);
?>
<style type="text/css">
    
    #project-footer {
        --text-color: #fff;
        background-color: var(--mc-main-4);
        background-size: cover;
        background-position: center;
        color: var(--text-color);
    }

    .project-footer-wrap {
        max-width: calc(1280px/12*8 + 2rem);
        min-width: 320px;
        margin: auto;
        padding-top: 30px;
        padding-bottom: 24px;
    }

    /*-- Mobile Version --*/
    @media (max-width: 1319px) {
        .project-footer-wrap {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    @media (max-width: 767px) {
        .project-footer-wrap {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    .project-footer-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    #project-footer-title {
        font-style: normal;
        font-weight: 500;
        font-size: 30px;
        line-height: 32px;
    }

    #project-footer-name {
        font-style: normal;
        font-weight: 400;
        font-size: 48px;
        line-height: 48px;
    }

    #project-footer-side-1 {
        display: grid;
        justify-content: start;
        align-items: center;
    }

    #project-footer-side-2 {
        display: flex;
        flex-flow: row;
        align-items: center;
        justify-content: end;
    }

    #project-footer-line {
        display: none;
        height: 8px;
        background: var(--text-color);
        border: 1px solid var(--mc-main-1);
        box-shadow: 0px 1px 12px var(--mc-main-5);
        position: relative;
        z-index: 10;
    }

    .footer-info {
        color: var(--mc-main-4);
        ;
        display: flex;
        justify-content: end;
        align-items: center;
        height: 100%;
    }

    .footer-tel {
        display: flex;
        align-items: center;
        gap: 10px;
        color: var(--text-color);
        position: relative;
    }

    .footer-tel span {
        width: 6em;
    }

    .footer-tel:after {
        content: '';
        height: 16px;
        width: 0.4px;
        background-color: var(--text-color);
        position: absolute;
        top: 20%;
        right: 0;
    }

    .footer-button {
        display: flex;
        justify-content: center;
        text-align: center;
        gap: 16px;
        padding-left: 24px;
        align-items: center;
    }


    .btn-line,
    .btn-facebook {
        width: 40px;
        height: 40px;
        padding-top: 10px;
    }

    .btn-sale {
        display: flex;
        gap: 6px;
        padding: 6px 24px;
        align-items: center;
        width: 168px;
        box-sizing: border-box;
    }

    .btn-sale>img {
        width: 18px;
        height: 22px;
    }

    .btn-line,
    .btn-facebook,
    .btn-sale {
        background-color: var(--mc-nav-btn-bg-ready);
        border-radius: 24px;
        transition: all 0.5s;
        color: var(--mc-nav-btn-txt-ready);
        font-weight: 500;
    }

    .btn-line img,
    .btn-facebook img,
    .btn-sale img {
        height: 22px;
    }

    <?php
    if ($content['tab_block']['background_hover_color'] != '') {
        ?>
        .btn-line:hover,
        .btn-facebook:hover,
        .btn-sale:hover {
            background-color:
            <?= $content['tab_block']['background_hover_color'] ?>
            ;
        }

        <?php
    } else { ?>
        .btn-line:hover,
        .btn-facebook:hover,
        .btn-sale:hover {
            background-color: var(--mc-nav-btn-bg-hover);
        }

        <?php
    }
    ?>
    .btn-sale-mobile {
        display: none;
    }

    .project-footer-title-mobile {
        display: none;
    }

    .footer-tel img {
        height: 22px;
    }

    .footer-button-delight {
        display: none;
    }


    @media (max-width: 1319px) {
        .project-footer-wrap {
            padding-top: 2rem;
            padding-bottom: 2.5rem;
        }

        .project-footer-inner {
            grid-template-columns: 1fr;
        }

        #project-footer-title-mobile {
            display: inline-block;
        }

        #project-footer-side-1 {
            justify-content: center;
            text-align: center;
            width: 100%;
        }

        #project-footer-side-2 {
            flex-direction: column;
        }

        .footer-info {
            display: block;
        }

        .footer-tel {
            display: block;
            margin-top: 10px;
            margin-bottom: 22px;
            text-align: center;
        }

        .footer-tel img {
            display: inline-block;
            margin-right: 12px;
        }

        .footer-tel span {}

        .footer-tel:after {
            display: none;
        }

        .btn-sale {
            width: max-content;
            margin: auto;
            /*padding: 0 2em;*/
            height: 40px;
        }

        .footer-button {
            justify-content: center;
            margin-bottom: 22px;
            padding: 0;
        }

        .btn-sale-desktop {
            display: none;
        }

        .btn-sale-mobile {
            display: block;
        }

        .project-footer-name {
            display: none;
        }

        #project-footer-side-1 {
            display: inline-block;
        }

        #project-footer-title {
            display: inline;
        }

        #project-footer-name {
            font-size: 30px !important;
            display: inline;
        }
    }

    @media (max-width: 768px) {
        .project-footer-wrap {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    /*-- Mobile Version --*/
    @media (max-width: 767px) {
        .project-footer-wrap {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }
</style>
<link rel="stylesheet" type="text/css" href="<?=get_site_url()?>wp-content/themes/template-css/elegant-contact.css">
<style type="text/css">
    /*-- Mobile Version --*/
    @media (max-width: 1023px) and (min-width:451px) {
        .btn-sale-mobile {
            width: auto;
        }

        .footer-button-delight {
            width: auto;
        }
    }
</style>

<section id="project-footer" class="footer-line">
    <div id="project-footer-line"></div>
</section>
<section id="project-footer">
    <div class="project-footer-wrap section-fade container mx-auto">
        <div class="project-footer-inner">
            <div class="" id="project-footer-side-1">
                <h5 id="project-footer-title">สนใจติดต่อโครงการ <span class="project-footer-title-mobile">
                    <?= get_the_title() ?>
                </span></h5>
                <h2 id="project-footer-name">
                    <?= get_the_title() ?>
                </h2>
            </div>
            <div class="" id="project-footer-side-2">
                <?php if ($f['telephone_number'] != ''): ?>
                    <a href="tel:<?= $f['telephone_number'] ?>" class="">
                        <div class="footer-tel">
                            <img src="<?= acf_img($content['telephone_icon'], 'medium') ?>" alt="">
                            <span>
                                <?= $f['telephone_number'] ?>
                            </span>
                        </div>
                    </a>
                <?php endif ?>

                <div class="footer-button-delight">
                    <?php if ($f['line_id'] != ''): ?>
                        <a href="<?= $f['line_id'] ?>">
                            <div class="icon-btn">
                                <img src="<?= acf_img($content['line_icon'], 'medium') ?>" alt="">
                                Line
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($f['facebook'] != ''): ?>
                        <a href="<?= $f['facebook'] ?>">
                            <div class="icon-btn">
                                <img src="<?= acf_img($content['facebook_icon'], 'medium') ?>" alt="">
                                Facebook
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($f['sales_gallery'] != ''): ?>
                        <a href="<?= $f['sales_gallery'] ?>">
                            <div class="icon-btn">
                                <img src="<?= acf_img($content['sales_icon'], 'medium') ?>" alt="">
                                Sale Gallery
                            </div>
                        </a>
                    <?php endif ?>
                </div>

                <div class="footer-button">
                    <?php if ($f['line_id'] != ''): ?>
                        <a href="<?= $f['line_id'] ?>" target="_blank">
                            <div class="btn-line">
                                <img src="<?= acf_img($content['line_icon'], 'medium') ?>" alt="">
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($f['facebook'] != ''): ?>
                        <a href="<?= $f['facebook'] ?>" target="_blank">
                            <div class="btn-facebook">
                                <img src="<?= acf_img($content['facebook_icon'], 'medium') ?>" alt="">
                            </div>
                        </a>
                    <?php endif ?>
                    <?php if ($f['sales_gallery'] != ''): ?>
                        <div class="btn-sale-desktop">
                            <a href="<?= $f['sales_gallery'] ?>" target="_blank">
                                <div class="btn-sale">
                                    <img src="<?= acf_img($content['sales_icon'], 'medium') ?>" alt="">
                                    <span class="hightlight">Sales Gallery</span>
                                </div>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
                <?php if ($f['sales_gallery'] != ''): ?>
                    <div class="btn-sale-mobile">
                        <a href="<?= $f['sales_gallery'] ?>" target="_blank">
                            <div class="btn-sale">
                                <img src="<?= acf_img($content['sales_icon'], 'medium') ?>" alt="">
                                <span class="hightlight">Sales Gallery</span>
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
</section>