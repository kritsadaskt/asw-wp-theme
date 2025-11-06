<?php
$content = $args[0];
$f = $args[1];
$template_name = $args[2];
$master = $args[3];
$opt = $args[4];
$layout = $args[5];
$content = aswv2_gen_master($master,$content,$layout);
act_template_project_css($opt,$template_name,$layout);
if (!empty($f['terms_conditions'])) {
    $terms_conditions_page = $f['terms_conditions']->ID;
}
?>
<section id="project-footer" class="footer-line">
    <div id="project-footer-line"></div>
</section>
<section id="project-footer">
    <div class="project-footer-wrap section-fade container mx-auto">
        <div class="project-footer-inner">
            <div class="" id="project-footer-side-1">
                <h5 id="project-footer-title"><?php pll_e('สนใจติดต่อโครงการ')?> <span class="project-footer-title-mobile">
                    <?= get_the_title() ?>
                </span></h5>
                <h2 id="project-footer-name" class="<?= $terms_conditions_page != '' ? 'mb-4' : '' ?>">
                    <?= get_the_title() ?>
                </h2>
                <?php if ($terms_conditions_page != ''): ?>
                    <a href="<?= get_the_permalink($terms_conditions_page) ?>" class="flex items-center gap-1 justify-center md:justify-start" title="ข้อกำหนดและเงื่อนไขเพิ่มเติม" target="_blank">
                        <?php pll_e('ข้อกำหนดและเงื่อนไขเพิ่มเติม') ?>
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Interface / External_Link"> <path id="Vector" d="M10.0002 5H8.2002C7.08009 5 6.51962 5 6.0918 5.21799C5.71547 5.40973 5.40973 5.71547 5.21799 6.0918C5 6.51962 5 7.08009 5 8.2002V15.8002C5 16.9203 5 17.4801 5.21799 17.9079C5.40973 18.2842 5.71547 18.5905 6.0918 18.7822C6.5192 19 7.07899 19 8.19691 19H15.8031C16.921 19 17.48 19 17.9074 18.7822C18.2837 18.5905 18.5905 18.2839 18.7822 17.9076C19 17.4802 19 16.921 19 15.8031V14M20 9V4M20 4H15M20 4L13 11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                    </a>
                <?php endif ?>
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