<?php
$content = $args[0];
$f = $args[1];

?>
<style>
    #project-footer {
        background-color: #AE4B21;
        color: #FFEED4;
        padding-top: 40px;
        padding-bottom: 32px;
    }

    #project-footer .icon-btn {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .footer-info {
        display: flex;
        justify-content: end;
        align-items: center;
        height: 100%;
    }

    .footer-tel {
        position: relative;
        padding-left: 24px;
        padding-right: 24px;
    }

    .footer-tel>img,
    .icon-btn>img {
        width: 20px;
        height: 20px;

    }

    .footer-tel:after {
        content: '';
        height: 16px;
        width: 0.4px;
        background-color: #FFEED4;
        position: absolute;
        top: 20%;
        right: 0;
    }

    .footer-button {
        display: grid;
        grid-template-columns: auto auto auto;
        text-align: center;
        width: 76%;
        gap: 1.5rem;
        padding-left: 24px;
    }

    .footer-button>a {
        border: #FFEED4 solid 1px;
        padding: 6px 48px;

    }
</style>
<section id="project-footer" class="is-on-nav is-on-nav-mob">
    <div class="cont-pd section-fade">
        <div class="grid grid-cols-12 gap-x-16">
            <div class="col-span-4" id="project-footer-side-1">
                <h5 id="project-footer-title"><?php pll_e('สนใจติดต่อโครงการ')?></h5>
                <h2 id="project-footer-name"><?php pll_e('แอทโมซ พอร์เทรต ศรีสมาน')?></h2>
            </div>
            <div class="col-span-8" id="project-footer-side-2">
                <div class="footer-info">
                    <div class="footer-tel icon-btn">
                        <img src="/wp-content/uploads/2023/02/Call.png" alt="">
                        <?= $content['telephone_number'] ?>
                    </div>
                    <div class="footer-button">
                        <a href="">
                            <div class="icon-btn">
                                <img src="/wp-content/uploads/2023/02/Vector.png" alt=""> facebook
                            </div>
                        </a>
                        <a href="">
                            <div class="icon-btn">
                                <img src="/wp-content/uploads/2023/02/Icon-1.png" alt=""> LINE
                            </div>
                        </a>
                        <a href="">
                            <div class="icon-btn">
                                <img src="/wp-content/uploads/2023/02/Location-1.png" alt=""> Sale Gallery
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php theme_overide_style($content) ?>