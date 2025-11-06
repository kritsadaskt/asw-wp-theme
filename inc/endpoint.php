<?php
do_action('qm/debug', 'API Endpoint Loaded');

add_filter('acf/rest_api/field_objects/prepare_field', function($field) {
  // Ensure field is an array, not an stdClass
  if (is_object($field)) {
      $field = (array) $field;
  }
  return $field;
}, 10, 1);

add_filter( 'acf/settings/rest_api_format', function () {
  return 'standard';
} );

function ws_register_images_field() {
  register_rest_field( 
      'news',
      'featured_media',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
  register_rest_field( 
      'post',
      'featured_media',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
  register_rest_field( 
      'asw_club',
      'featured_media',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
  register_rest_field( 
      'condominium',
      'featured_media',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
  register_rest_field( 
      'house',
      'featured_media',
      array(
          'get_callback'    => 'ws_get_images_urls',
          'update_callback' => null,
          'schema'          => null,
      )
  );
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
  $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object['id'] ), 'medium' );
  $medium_url = $medium['0'];

  $large = wp_get_attachment_image_src( get_post_thumbnail_id( $object['id'] ), 'large' );
  $large_url = $large['0'];

  return array(
      'medium' => $medium_url,
      'large'  => $large_url,
  );
}

add_filter( 'rest_prepare_page', 'add_project_status_to_project_recommended' ); 

function add_project_status_to_project_recommended( $item ) {
  if (isset($item->data['acf']['project_recommended'])) {
    $project_recommended = $item->data['acf']['project_recommended'];
    // Modify the relation field value as needed
    if ( is_array($project_recommended) ) {
      foreach ($project_recommended as $project) {
        $project_status = get_the_terms($project->ID, 'project_status');
        $project_thumb = get_the_post_thumbnail_url($project->ID, 'full');
        
        // Add project status if exists
        if ($project_status && !is_wp_error($project_status) && !empty($project_status)) {
            $project->project_status = $project_status[0]->slug;
        } else {
            $project->project_status = '';
        }
        
        // Add project thumbnail if exists
        $project->project_thumb = $project_thumb ? $project_thumb : '';
      }
    }
  } else {
    $project_recommended = [];
  }

  // Update the item with the modified value
  $item->data['acf']['project_recommended'] = $project_recommended;

  return $item;
}

function add_project_status_to_condominium( $item ) {
  $project_status = get_the_terms($item->ID, 'project_status');
  $item->data['acf']['project_status'] = $project_status[0]->slug;
  return $item;
}

add_filter( 'rest_prepare_condominium', 'add_project_status_to_condominium' );

// Get Fields from Home page

function prepare_home_banner($home_banner) {
  $filtered_banner = array();
  foreach ($home_banner as $item) {
      if(isset($item['acf_fc_layout']) && $item['acf_fc_layout'] === 'mobile_banner'){
          $filtered_banner[] = [
              'image' => $item['image']['url'],
              'link' => $item['url'],
              'type' => $item['banner_type']
          ];
      }
  }
  return $filtered_banner;
}

function get_home_banners($request) {
  // Get ACF fields from page ID 2 : Home Page
  $home_th = 2;
  $home_en = pll_get_post(2, 'en');
  $fields_th = get_fields($home_th);
  $fields_en = get_fields($home_en);
  
  if ($fields_th || $fields_en) {
      $filtered_fields = array(
          'banner_th' => prepare_home_banner($fields_th['home_banner']),
          'banner_en' => prepare_home_banner($fields_en['home_banner']),
      );
      return rest_ensure_response($filtered_fields);
  }

  return new WP_Error('no_fields', 'No ACF fields found', array('status' => 404));
}

// Register REST API endpoint
add_action('rest_api_init', function() {
  register_rest_route('wp/v2', '/home-banners', array(
      'methods' => 'GET',
      'callback' => 'get_home_banners',
      'permission_callback' => function() {
          return true;
      }
  ));
});

// Add custom REST API endpoint for house & condo projects
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/all-projects', array(
      'methods' => 'GET',
      'callback' => 'get_all_projects',
      'permission_callback' => '__return_true',
      'args' => array(
          'per_page' => array(
              'required' => false,
              'default' => -1,
              'validate_callback' => function($param) {
                  return is_numeric($param);
              }
          )
      )
  ));
});

function get_all_projects($request) {
  $per_page = $request['per_page'];
  // Add filter to exclude specific titles
  add_filter('posts_where', function($where) {
      $exclude_titles = array(
          'thank you',
          'Thank You',
          'Thank you',
          'Test',
          'test',
          'ทดสอบ',
          'ซ่อน',
          'clone',
          'Clone',
          'fgf',
          'FGF',
          'Master',
          'EasyLife',
          'Easylife'
      );
      
      foreach ($exclude_titles as $title) {
          $where .= " AND post_title NOT LIKE '%" . esc_sql($title) . "%'";
      }
      
      return $where;
  });

  $args = array(
      'post_type' => array('house', 'condominium'),
      'posts_per_page' => $per_page,
      'post_status' => 'publish',
      'lang' => 'th',
      'tax_query' => array(
          array(
              'taxonomy' => 'category',
              'field'    => 'slug',
              'terms'    => 'thank-you',
              'operator' => 'NOT IN',
          ),
      )
  );

  $query = new WP_Query($args);
  $posts = array();

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          $post_id = get_the_ID();

          $fields = get_fields($post_id);
          $status_all = get_the_terms($post_id, 'project_status');
          if (isset($status_all[0])) {
              $status = $status_all[0]->slug;
          }else{
              $status = null;
          }
          
          // Define fields
          $logo = $fields['logo']['url'];
          
          $posts[] = array(
              'id' => $post_id,
              'title' => get_the_title(),
              'slug' => get_post_field('post_name'),
              'featured_image' => get_the_post_thumbnail_url($post_id, 'full'),
              'post_type' => get_post_type(),
              'permalink' => get_permalink(),
              'project_logo' => $logo,
              'status' => $status,
              'utm_source' => 'asw-app_register',
              'project_code' => (int)$fields['project_id']
          );
      }
  }
  wp_reset_postdata();

  // Remove the filter after query is done
  remove_filter('posts_where', function(){});
  
  return rest_ensure_response($posts);
}


// Add custom REST API endpoint for specific project
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/project/(?P<id>[0-9]+)', array(
      'methods' => 'GET',
      'callback' => 'get_specific_project',
      'permission_callback' => '__return_true',
      'args' => array(
          'id' => array(
              'required' => true,
              'validate_callback' => function($param) {
                  return is_numeric($param);
              }
          )
      )
  ));
});

function process_progress_gallery($content) {
  $processed_content = array();
  if (isset($content) && count($content) > 0) {
      foreach ($content as $image) {
          $processed_content[] = $image['url'];
      }
  }
  return $processed_content;
}

function process_gallery_fields($content) {
  $processed_content = array();
  if (isset($content['gallery']) && count($content['gallery']) > 0) {
      foreach ($content['gallery'] as $image) {
          $processed_content[] = $image['url'];
      }
  }
  return $processed_content;
}

function process_plan_fields($content) {
  $processed_content = array();

  if (isset($content['plan']) && count($content['plan']) > 0) {
      foreach ($content['plan'] as $tab) {
          if ($tab['tab_name'] && (stripos($tab['tab_name'], 'unit') !== false || stripos($tab['tab_name'], 'ห้อง') !== false)) {
              $building = $tab['building'][0];
              foreach ($building['floor'] as $floor) {
                  array_push($processed_content, array(
                      'unit_name' => $floor['floor_name'],
                      'unit_image' => $floor['floor_image']['url']
                  ));
              }
          }
      }
  }
  return $processed_content;
}

function process_house_plan_fields($content) {
  $processed_content = array();
  foreach ($content['plan'] as $tab) {
      $type = array(
          'type' => $tab['tab_name'],
          'plan_listed' => array()
      );
      foreach ($tab['building'][0]['floor'] as $floor) {
          array_push($type['plan_listed'], array(
              'plan_name' => $floor['floor_name'],
              'plan_image' => $floor['floor_image']['url']
          ));
      }
      array_push($processed_content, $type);
  }
  return $processed_content;
}

function process_content_by_layout($content, $post_type) {
  if (!isset($content['acf_fc_layout'])) {
      return $content;
  }

  $processed_content = array();
  
  // Base content fields that all layouts share
  $processed_content['layout'] = $content['acf_fc_layout'];
  //$processed_content['is_show'] = isset($content['is_show']) ? $content['is_show'] : null;

  // Process specific layout types
  switch ($content['acf_fc_layout']) {
      case 'banner':
          $processed_content['banner_fields'] = array(
              'desktop' => isset($content['banner']) ? $content['banner']['url'] : null,
              'mobile' => isset($content['banner_mobile']) ? $content['banner_mobile']['url'] : null,
          );
          break;
      case 'project_information':
          if ($content['hide-progress'] !== 'hide') {
              $processed_content['project_information_fields'] = array(
                  'e-brochure' => $content['more_information']['url'] !== '' ? $content['more_information']['url'] : null,
                  'overall_text' => isset($content['overall']) ? $content['overall'] : '',
                  'percent' => isset($content['percent']) ? $content['percent'] : '',
                  'progress_listed' => isset($content['progress_list']) ? $content['progress_list'] : [],
                  'progress_gallery' => isset($content['image']) && count($content['image']) > 0 ? process_progress_gallery($content['image']) : [],
              );
          } else {
              $processed_content['project_information_fields'] = null;
          }
          break;
      case 'gallery':
          $processed_content['gallery_fields'] = process_gallery_fields($content);
          break;
      case 'plan':
          if ($post_type === 'condominium') {
              $processed_content['unit_plan_fields'] = array(
                  'type' => $post_type,
                  'plan_listed' => process_plan_fields($content)
              );
          } else {
              $processed_content['unit_plan_fields'] = array(
                  'type' => $post_type,
                  'plan_listed' => process_house_plan_fields($content)
              );
          }
          break;
      case 'location':
          $processed_content['location_fields'] = array(
              'google_map' => isset($content['google_maps']) ? $content['google_maps'] : null,
          );
          break;
      default:
          break;
  }

  return $processed_content;
}

function get_specific_project($request) {
  $post_id = $request['id'];
  
  $args = array(
      'post_type' => array('house', 'condominium'),
      'p' => $post_id,
      'post_status' => 'publish',
      'posts_per_page' => 1
  );

  $query = new WP_Query($args);
  
  if ($query->have_posts()) {
      $query->the_post();
      
      // Get ACF fields
      $fields = get_fields($post_id);
      $post_type = get_post_type($post_id);
      $status_terms = get_the_terms($post_id, 'project_status');
      $status = $status_terms ? $status_terms[0]->slug : null;

      // Process content layouts
      $processed_content = array();
      if (isset($fields['v2_content']) && is_array($fields['v2_content'])) {
          $sections = ['banner', 'project_information', 'location', 'gallery', 'plan'];
          foreach ($fields['v2_content'] as $content_block) {
              if (in_array($content_block['acf_fc_layout'], $sections)) {
                  $processed_content[] = process_content_by_layout($content_block, $post_type);
              }
          }
      }

      // Build response
      $project = array(
          'id' => (int)$post_id,
          'title' => get_the_title(),
          'slug' => get_post_field('post_name'),
          'excerpt' => get_the_excerpt(),
          'featured_image' => get_the_post_thumbnail_url($post_id, 'full'),
          'post_type' => get_post_type(),
          'permalink' => get_permalink(),
          'logo' => $fields['logo']['url'],
          'project_status' => $status,
          'utm_source' => 'asw-app_register',
          'project_code' => (int)$fields['project_id'],
          'contents' => $processed_content
      );
      
      wp_reset_postdata();
      return rest_ensure_response($project);
  }
  
  return new WP_Error('no_project', 'Project not found', array('status' => 404));
}

// Add REST API for get Promotion Listed
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotion-listed', array(
      'methods' => 'GET',
      'callback' => 'get_promotion_listed',
      'permission_callback' => '__return_true',
  ));
});

function get_promotion_listed($request) {
  $args = array(
    'post_type' => 'promotion',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'lang' => 'th',
  );

  $query = new WP_Query($args);
  $promotion_listed = array();

  if ($query->have_posts()) {
      while ($query->have_posts()) {
          $query->the_post();
          $item_en = pll_get_post(get_the_ID(), 'en');
          $promotion_listed[] = array(
              'th' => array(
                  'id' => get_the_ID(),
                  'title' => get_the_title(),
                  'key' => get_post_field('post_name'),
                  'caption' => get_field('card_caption') === null ? '' : get_field('card_caption'),
                  'featured_image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
              ),
              'en' => $item_en ? array(
                  'id' => $item_en,
                  'title' => get_the_title($item_en),
                  'key' => get_post_field('post_name', $item_en),
                  'caption' => get_field('card_caption', $item_en) === null ? '' : get_field('card_caption', $item_en),
                  'featured_image' => get_the_post_thumbnail_url($item_en, 'full'),
              ) : null,
          );
      }
  }

  wp_reset_postdata();
  
  return rest_ensure_response($promotion_listed);
}

// Add REST API for get Promotion Detail
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotion-detail/(?P<id>[0-9]+)', array(
      'methods' => 'GET',
      'callback' => 'get_promotion_detail',
      'permission_callback' => '__return_true',
      'args' => array(
          'id' => array(
              'required' => true,
              'validate_callback' => function($param) {
                  return is_numeric($param);
              }
          )
      )
  ));
});

function process_participant_project($projects) {
  $processed_content = array();
  if (isset($projects) && is_array($projects) && count($projects) > 0) {
    foreach ($projects as $project) {
      $processed_content[] = array(
        'id' => $project['project'][0]->ID,
        'title' => $project['project'][0]->post_title,
        'image' => $project['image']['url']
      );
    }
  }
  return $processed_content;
}

function process_related_promotion($items) {
  $processed_content = array();
  if (isset($items) && is_array($items) && count($items) > 0) {
    foreach ($items as $item) {
      $processed_content[] = array(
        'id' => $item->ID,
        'title' => $item->post_title,
        'key' => $item->post_name,
        'featured_image' => get_the_post_thumbnail_url($item->ID, 'full')
      );
    }
  }
  return $processed_content;
}

function get_promotion_detail($request) {
  $id = $request['id'];

  $args = array(
    'post_type' => 'promotion',
    'p' => $id,
    'post_status' => 'publish',
  );

  $query = new WP_Query($args);
  $promotion_detail = array();

  if ($query->have_posts()) {
      $query->the_post();
      $en_id = pll_get_post(get_the_ID(), 'en');
      $promotion_detail[] = array(
        'th' => array(
          'id' => get_the_ID(),
          'title' => get_the_title(),
          'key' => get_post_field('post_name'),
          'caption' => get_field('card_caption') === null ? '' : get_field('card_caption'),
          'banner' => get_field('banner_mobile')['url'],
          'content' => get_field('detail'),
          'participant_project' => process_participant_project(get_field('participating-projects')),
          'related_promotions' => process_related_promotion(get_field('related_promotion')),
          'utm_source' => 'asw-app_register'
        ),
        'en' => $en_id ? array(
          'id' => $en_id,
          'title' => get_the_title($en_id),
          'key' => get_post_field('post_name', $en_id),
        ) : null
      );
  }

  wp_reset_postdata();
  
  return rest_ensure_response($promotion_detail);
}

// Add REST API for return Banner in Promotions Page
add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/promotions-banner', array(
    'methods' => 'GET',
    'callback' => 'get_promotions_banner',
    'permission_callback' => '__return_true',
  )); 
});

// Convert URL to ID
function convert_url_to_id($url) {
  if (strpos($url, 'assetwise.co.th') !== false || strpos($url, 'assetwise.test') !== false) {
    $id = url_to_postid($url);
    return $id;
  }
  return $url;
}

function process_promotion_banner($request) {
  $banners = $request['home_banner'];
  $processed_content = array();
  foreach ($banners as $banner) {
    if ($banner['acf_fc_layout'] === 'mobile_banner') {
      $processed_content[] = array(
        'id' => convert_url_to_id($banner['url']),
        'image' => $banner['image']['url'],
        'url' => $banner['url'],
        'type' => $banner['banner_type']
      );
    }
  }

  return $processed_content;
}

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

?>