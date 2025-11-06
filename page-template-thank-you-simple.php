<?php
/* 
Template Name: Thank You Simple
Template Post Type: house, condominium, page, promotion
*/
get_header() ?>
<?php
$f = get_fields();
?>
<style>
    #thank-you {
        max-width: 668px;
    }

    /* #contact-us-wrap:has(.wpcf7-form.sent){ */


    /* 
    #contact-us-wrap {
        display: block;
    } */

    #thank-you .-info-wrap {
        display: flex;
        gap: 40px;
        padding-top: 24px;
        /* justify-content: center; */
    }

    #thank-you .-info-tel,
    #thank-you .-info-more {
        color: var(--ci-veri-500);
        display: grid;
        grid-template-columns: 24px auto;
        align-items: center;
        gap: 8px;
    }

    @media (max-width: 767px) {
        #thank-you {
            background: linear-gradient(180deg, #EDF2F7 -4.71%, #FFFFFF 164.99%);
        }
    }
</style>
<section id="thank-you" class="mx-auto pt-10 pb-20 px-4 md:px-0">
    <div class="flex flex-col items-center text-center">
        <img src="<?= $f['image']['sizes']['large'] ?>" alt="" class="pb-5">
        <h2><?= $f['heading'] ?></h2>
        <div class="sub-menu">
            <?= $f['text_body'] ?>
        </div>
        <div class="-info-wrap">
            <?php 
            if ($f['telephone']) {
                ?>
                <a href="tel:<?= $f['telephone'] ?>" class="-info-tel" target="_blank">
                    <img src="/wp-content/uploads/2023/06/phone-contact-us.png" alt="">
                    <div class="hightlight">
                        <?= $f['telephone'] ?>
                    </div>
                </a>
                <?php
            }
            ?>
            <?php 
            if ($f['line']) {
                ?>
                <a href="<?= $f['line'] ?>" class="-info-more" target="_blank">
                    <img src="/wp-content/uploads/2023/06/line-contact-us.png" alt="">
                    <div class="hightlight">
                        <?php pll_e('สอบถามเพิ่มเติม')?>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>

</section>
<?php get_footer() ?>