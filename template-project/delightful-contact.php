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
