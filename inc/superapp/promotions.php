<?php
// =======================================================
// Add REST API for get Promotion Listed
// =======================================================
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotion-listed', array(
    'methods' => 'GET',
    'callback' => 'get_promotion_listed',
    'permission_callback' => '__return_true',
  ));
});

// =======================================================
// Get Promotion Listed
// =======================================================
function get_promotion_listed($request) {

  // Add filter to exclude specific titles
  add_filter('posts_where', function ($where) {
    $exclude_titles = array(
      'thank you',
      'Thank You',
      'Thank you',
      'test',
      'Test',
      'ทดสอบ'
    );

    foreach ($exclude_titles as $title) {
      $where .= " AND post_title NOT LIKE '%" . esc_sql($title) . "%'";
    }

    return $where;
  });

  $args = array(
    'post_type' => 'promotion',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'lang' => 'th',
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
      array(
        'taxonomy' => 'private-project',
        'field' => 'slug',
        'terms' => 'private',
        'operator' => 'NOT IN'
      )
    )
  );

  $query = new WP_Query($args);
  $promotion_listed = array();

  if ($query->have_posts()) {
    while ($query->have_posts()) {

      $query->the_post();
      $item_en = pll_get_post(get_the_ID(), 'en');
      
      if ($banner = get_field('banner_mobile', get_the_ID())) {
        $banner = $banner['url'];
      } else {
        $banner = get_the_post_thumbnail_url(get_the_ID(), 'full');
      }

      $promotion_listed[] = array(
        'th' => array(
          'id' => get_the_ID(),
          'title' => get_the_title(),
          'key' => get_post_field('post_name'),
          'caption' => get_field('card_caption') === null ? '' : get_field('card_caption'),
          'featured_image' => $banner
        ),
        'en' => $item_en ? array(
          'id' => $item_en,
          'title' => get_the_title($item_en),
          'key' => get_post_field('post_name', $item_en),
          'caption' => get_field('card_caption', $item_en) === null ? '' : get_field('card_caption', $item_en),
          'featured_image' => $banner
        ) : [],
      );
    }
  }

  wp_reset_postdata();

  return rest_ensure_response($promotion_listed);
}

// =======================================================
// Add REST API for get Promotion Detail
// =======================================================
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotion-detail/(?P<id>[0-9]+)', array(
    'methods' => 'GET',
    'callback' => 'get_promotion_detail',
    'permission_callback' => '__return_true',
    'args' => array(
      'id' => array(
        'required' => true,
        'validate_callback' => function ($param) {
          return is_numeric($param);
        }
      )
    )
  ));
});

// =======================================================
// Get Promotions Banner
// =======================================================
function get_promotions_banner($request) {
  $p_th = 392;
  $p_en = pll_get_post($p_th, 'en');

  $banner_th = get_field('banner', $p_th);
  $banner_en = get_field('banner', $p_en);

  $promotions_banner = array(
    'th' => process_promotion_banner($banner_th),
    'en' => process_promotion_banner($banner_en)
  );

  wp_reset_postdata();
  
  return rest_ensure_response($promotions_banner);
}

// =======================================================
// Add REST API for return Banner in Promotions Page
// =======================================================
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotions-banner', array(
    'methods' => 'GET',
    'callback' => 'get_promotions_banner',
    'permission_callback' => '__return_true',
  )); 
});
