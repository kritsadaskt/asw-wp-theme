<?php 
/* 
Template Name: Project By Location
Template Post Type: page
*/

get_header();

$fields = get_fields(get_the_ID());

if ($fields['hero_banner']) {
  $hero_banner = $fields['hero_banner'];
  $hero_banner_title = $hero_banner['title'];
  $hero_banner_subtitle = $hero_banner['sub_title'];
  $hero_banner_image = $hero_banner['background_image']['url'];
}

if ($fields['contents']) {
  $contents = $fields['contents'];
}

function project_card($post) {
  $card = "<div class='home-project-card card-project relative pointer grid grid-cols-2 md:block'>";
  $card .= "<div class='py-4 pr-4'>";
  $card .= "<span class='text-[18px] font-bold'>" . $post->post_title . "</span>";
  $card .= "</div>";
  $card .= "<div class='bg-cover blank project-card-image' ratio='2:3' style='background-image:linear-gradient(0deg, #000c,#0008,#0001, transparent,transparent,transparent),url(" . get_the_post_thumbnail_url($post->ID, '2048x2048') . ");'></div>";
  $card .= "</div>";

  return $card;
}

?>

<style>
  .pbl-banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    opacity: 0.5;
    z-index: 1;
  }
</style>

<div id="project_by_location">
  <div class="pbl-banner min-h-[250px] xl:min-h-[300px] bg-cover bg-center flex items-center justify-center relative" style="background-image: url(<?php echo $hero_banner_image; ?>);">
    <div class="pbl-banner-content text-center relative z-10 w-11/12 mx-auto">
      <h3 class="text-white font-medium">ASSETWISE</h3>
      <h1 class="pbl-banner-title text-white lg:!text-5xl font-medium"><?php echo $hero_banner_title; ?></h1>
      <p class="pbl-banner-subtitle text-white text-[18px] md:text-[20px]"><?php echo $hero_banner_subtitle; ?></p>
    </div>
  </div>

  <div class="pbl-content">
    <?php $count = 0; ?>
    <?php foreach ($contents as $content) { ?>
      <?php if ($content['acf_fc_layout'] === 'text_layout') { ?>
        <div id="content-layout-<?= $count; ?>" class="text-layout py-12">
          <div class="container mx-auto">
            <div class="w-11/12 lg:w-4/5 mx-auto">
              <?php echo $content['text_content']; ?>
            </div>
          </div>
        </div>
      <?php } else if ($content['acf_fc_layout'] === 'text_image_layout') { ?>
        <div id="content-layout-<?= $count; ?>" class="text-image-layout pb-12 lg:py-12" style="background: linear-gradient(45deg, <?= $content['block_style']['color_1'] ? $content['block_style']['color_1'] : '' ?>, <?= $content['block_style']['color_2'] ? $content['block_style']['color_2'] : '' ?>);">
          <div class="pbl-image-layout flex flex-col <?= $content['image_location'] === 'right' ? 'lg:flex-row-reverse' : 'lg:flex-row'; ?> gap-10">
            <div class="lg:w-1/2 min-h-[400px] bg-cover bg-center" style="background-image: url(<?php echo $content['image']['url']; ?>);">
            </div>
            <div class="lg:w-1/2 px-7 flex flex-col justify-center" style="<?= $content['block_style']['text_color'] ? 'color: ' . $content['block_style']['text_color'] : ''; ?>">
              <h3 class="font-medium"><?= $content['title']; ?></h3>
              <hr class="mt-5 mb-7 w-2/5 border-[<?= $content['block_style']['text_color'] ? $content['block_style']['text_color'] : '#333' ?>]">
              <p class=""><?= $content['description']; ?></p>
            </div>
          </div>
        </div>
      <?php } else if ($content['acf_fc_layout'] === 'projects_listed_layout') { ?>
        <div id="content-layout-<?= $count; ?>" class="projects-listed-layout py-12 bg-gradient-to-b from-[#EDF2F7] to-[#fff]">
          <div class="container px-5 lg:px-0 mx-auto">
            <?php
            $loc = [];
            foreach ($content['location'] as $location) {
              array_push($loc, $location->term_id);
            }
            $args = array(
              'post_type' => 'condominium',
              'tax_query' => array(
                array(
                  'taxonomy' => 'project_location',
                  'field' => 'term_id',
                  'terms' => $loc,
                ),
                array(
                  'taxonomy' => 'project_status',
                  'field' => 'slug',
                  'terms' => ['new_project', 'ready_project'],
                ),
              ),
              'posts_per_page' => -1,
            );
            $projects = new WP_Query($args);
            ?>
            <h2 class="text-[42px] mb-5 text-center font-medium"><?= $content['title']; ?></h2>
            <div class="project-cards grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
              <?php foreach ($projects->posts as $project) { ?>
                <?= get_template_part('template-parts/project-card-master', null, array('post' => $project)); ?>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php $count++; ?>
    <?php } ?>
  </div>
</div>

<?php
get_footer();