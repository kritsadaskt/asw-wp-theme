<?php
/**
 * Loop Name: Content Post Detail
 */
?>
<style type="text/css">
    .entry-content p{
        font-size: 26px !important;
        line-height: 32px;
        font-weight: 300;
        /*grid-column: span 8 / span 8;*/
    }
    .entry-content figure{
        /*grid-column: span 8 / span 8;*/
    }
    .entry-content a{
        color: var(--ci-blue-400);
    }
    .entry-header h3{
        line-height: 44px;
    }
    .entry-content p{
        color: var(--ci-grey-200);
        font-size: 26px !important;
        line-height: 32px !important;
        font-weight: 300 !important;
    }
    .entry-content em{
        color: var(--ci-blue-400);
    }
    @media (max-width: 767px){

    }
    @media (max-width: 767px){
        .entry-meta{
            margin: 16px 0 21px
        }
        .entry-header h3{
            line-height: 44px;
            font-size: 40px;
        }
        .entry-content em{
            color: var(--ci-grey-200);
            font-style: normal;
            font-weight: 400;
        }
    }
</style>
<?php 

// pre(get_the_terms( $post->ID, 'category'));
// pre(get_the_category($post->ID));
// pre(get_post());

?>
<article id="post-<?php the_ID();  ?>" <?php post_class('content-single'); ?>>
    <header class="entry-header">
        <sp class="hidden md:block m"></sp>
        <sp class="hidden md:block  rem-2"></sp>
        <sp class="rem-1"></sp>
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="text-left md:text-center cont-pd">
            <h3 class=""><?php the_title(); ?></h3>
        </div>
        <div class="entry-meta">
            <?php 
            

            $featured_img_url = get_the_post_thumbnail_url();
            

            if (get_post_type() == 'asw_club') : 
                $cate_name = get_the_terms( $post->ID, 'club_type');
                $txt = $cate_name[0]->name;
                $cate_club = [];
                
                for ($i=0; $i < 3; $i++) {
                    if ($cate_name[$i]->name != '') {
                        array_push($cate_club, "<a  class='cl-ci-orange-500' style='color: var(--ci-orange-500) !important;' href='/club'>".$cate_name[$i]->name."</a>");
                    }
                }
                $cate_club = join(', ',$cate_club);
                ?>
                <p class="cl-ci-grey-400 cont-pd" style="font-size: 22px;">
                    <?=$cate_club?>
                    <span class="px-2">|</span> <?=asw_date_format($post->post_date)?> <span class="px-2">|</span> <?php pll_e('โดย')?> 
                    <span class="cl-ci-blue-300"><?php the_author() ?></span>
                </p>

            <?php elseif (get_post_type() == 'post') : 
                $cate_name=get_the_category($post->ID);
                ?>
                <p class="cl-ci-grey-400 cont-pd" style="font-size: 22px;">
                  <a  class='cl-ci-orange-500' style='color: var(--ci-orange-500) !important;' href='/<?= $cate_name[0]->slug?>'> <?= $cate_name[0]->name?></a>
                  <span class="px-2">|</span> <?=asw_date_format($post->post_date)?> <span class="px-2">|</span> โดย 
                  <span class="cl-ci-blue-300"><?php the_author() ?></span>
              </p>

          <?php elseif (get_post_type() == 'news') : ?>
            <p class="cl-ci-grey-400 cont-pd text-center" style="font-size: 22px;">
                <?=asw_date_format($post->post_date)?>
            </p>
        <?php endif ?>

    <!-- <div class="hidden md:block single-header-space">
       <sp class="xs"></sp>
       <sp class="rem-1"></sp>
   </div>
   <div class="block md:hidden single-header-space mb-single-header-space">
       <sp class="vs"></sp>
       <sp class="rm"></sp>
   </div>
   <img class="single-fim" src="<?=get_the_post_thumbnail_url($post->ID, 'full');?>"/> -->
</div>

</header>
<!-- <div class="space-before-content">
    <sp class="h-8 xl:h-12"></sp>
</div> -->

<div class="entry-content cl-ci-grey-200 md:grid grid-cols-8" style="color: var(--ci-grey-200) !important">
    <div class="col-span-1 "></div>
    <div class="col-span-6 px-4 md:px-0">
        <?php the_content(); ?>
        <?php wp_link_pages( array('before' => '<div class="page-links">' . esc_html__( 'Pages:', 'seed' ),'after'  => '</div>') ); ?>
    </div>
</div>

<footer class="entry-footer">
    <?php seed_entry_footer(); ?>
</footer>
</article>
