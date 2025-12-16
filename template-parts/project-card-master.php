<?php
$post = $args['post'];
$project_logo = get_field('logo', $post->ID);
$status = get_the_terms($post->ID, 'project_status');
?>
<style>
  .project-card-master.new_project .card-header span {
    color: #F1683B;
    border-color: #F1683B;
  }
  .project-card-master.ready_project .card-header span {
    color: #1d9f9b;
    border-color: #1d9f9b;
  }
  .project-card-master.sold-out .card-header span {
    color: #8d38e2;
    border-color: #8d38e2;
  }
</style>
<a href="<?php echo get_the_permalink($post->ID); ?>" class="project-card-master shadow-lg bg-white flex flex-col <?php echo $status[0]->slug; ?>">
  <div class="card-header py-4 pr-3 flex justify-between items-center">
    <span class="text-[18px] font-bold leading-[20px] pl-4 py-2 border-l-[4px]"><?php echo $status[0]->name; ?></span>
    <img src="<?php echo $project_logo['url']; ?>" alt="<?php echo $project_logo['alt']; ?>" class="w-[95px] h-auto object-contain mr-2">
  </div>
  <div class="card-body flex-1 w-full aspect-[2/3] bg-cover bg-center flex items-end" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, '2048x2048') ?>);">
    <div class="project-card-master-content p-4 bg-gradient-to-t from-black/50 to-transparent w-full">
      <h3 class="text-[24px] font-bold leading-[28px] text-white"><?php echo get_the_title($post->ID); ?></h3>
    </div>
  </div>
</a>