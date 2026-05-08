<?php
do_action('qm/debug', 'API Endpoint Loaded');

// =======================================================
// Get project brand
// =======================================================
function get_project_brand($post_id) {
  $query = get_the_terms($post_id, 'project-type');
  $brand = [];
  $brand_th = '';
  $brand_en = '';
  if ($query) {
      foreach ($query as $term) {
          if ($term->parent != 0) {
            switch ($term->slug) {
              case 'atmozcondo':
                $brand_th = 'แอทโมซ คอนโด';
                $brand_en = 'Atmoz Condo';
                break;
              case 'kave':
                $brand_th = 'เคฟ คอนโด';
                $brand_en = 'Kave Condo';
                break;
              case 'modiz':
                $brand_th = 'โมดิซ คอนโด';
                $brand_en = 'Modiz Condo';
                break;
              case 'kavalon':
                $brand_th = 'เควาลอน';
                $brand_en = 'Kavalon';
                break;
              case 'aquarous-jomtien-pattaya':
                $brand_th = 'อะควาเรียส จอมเทียน พัทยา';
                $brand_en = 'Aquarous Jomtien Pattaya';
                break;
              case 'brown':
                $brand_th = 'บราวน์ คอนโด';
                $brand_en = 'Brown Condo';
                break;
              case 'ivory':
                $brand_th = 'ไอเวอร์รี่';
                $brand_en = 'Ivory';
                break;
              case 'maxxi-prime':
                $brand_th = 'แม็กซ์ซี่ ไพร์ม';
                $brand_en = 'Maxxi Prime';
                break;
              case 'maroonratchada32':
                $brand_th = 'มารูน รัชดา 32';
                $brand_en = 'Maroon Ratchada 32';
                break;
              case 'chann':
                $brand_th = 'ฌาณ';
                $brand_en = 'Chann';
                break;
              case 'baan-puripuri':
                $brand_th = 'บ้านปุริปุริ';
                $brand_en = 'Baan Puripuri';
                break;
              case 'esta':
                $brand_th = 'เอสต้า';
                $brand_en = 'Esta';
                break;
              case 'glam':
                $brand_th = 'แกลม';
                $brand_en = 'Glam';
                break;
              case 'the-arbor':
                $brand_th = 'ดิ อาเบอร์';
                $brand_en = 'The Arbor';
                break;
              case 'the-honor-house':
                $brand_th = 'ดิ ออเนอร์';
                $brand_en = 'The Honor';
              default:
                $brand_th = 'อื่น ๆ';
                $brand_en = 'Other';
                break;
            }
            $brand = array(
                'th' => $brand_th,
                'en' => $brand_en
            );
          }
      }
  }
  return $brand;
}

// =======================================================
// Get project location - EN
// =======================================================
function get_trans_term($term_id) {
  if (pll_get_term($term_id, 'en')) {
      $term = get_term(pll_get_term($term_id, 'en'));
      return $term->name;
  }
  return '';
}

// =======================================================
// Get all locations
// =======================================================
function get_all_locations() {
  $in_bkk = [];
  $up_country = [];

  $terms = get_terms(array(
      'taxonomy' => 'project_location',
      'lang' => 'th',
      'hide_empty' => true,
  ));
  
  foreach ($terms as $term) {
      if ($term->parent == 76) {
          $in_bkk[] = array(
              'name_th' => $term->name,
              'name_en' => get_trans_term($term->term_id),
              'key' => $term->slug
          );
      } else {
          $up_country[] = array(
              'name_th' => $term->name,
              'name_en' => get_trans_term($term->term_id),
              'key' => $term->slug
          );
      }
  }

  if (is_wp_error($terms)) {
      return new WP_Error('no_terms', 'No project types found', array('status' => 404));
  }

  return rest_ensure_response(array(
      'in_bkk' => array(
          'name_th' => 'ในกรุงเทพ',
          'name_en' => 'In Bangkok',
          'locations' => $in_bkk
      ),
      'up_country' => array(
          'name_th' => 'ต่างจังหวัด',
          'name_en' => 'Other Provinces',
          'locations' => $up_country
      )
  ));
}

// =======================================================
// Get project location - TH
// =======================================================
function get_location_by_post_id($post_id) {
  $terms = get_the_terms($post_id, 'project_location');
  $location = [];
  if ($terms) {
      foreach ($terms as $term) {
          if ($term->parent != 0) {
              $location[] = array(
                  'name_th' => $term->name,
                  'name_en' => get_trans_term($term->term_id),
                  'key' => $term->slug
              );
          }
      }
  }
  return $location[0];
}

// =======================================================
// Process Project Coordinates
// =======================================================
function get_project_coordinates($post_id) {
  $coordinates = get_field('coordinates', $post_id);
  if ($coordinates) {
    $latlong = explode(',', $coordinates);
    return array(
      'latitude' => $latlong[0],
      'longitude' => $latlong[1]
    );
  } else {
    return array(
      'latitude' => '13.877243574729327',
      'longitude' => '100.61954961125954'
    );
  }
}

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
      'callback' => 'get_projects',
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

function get_projects($request) {
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
          'Easylife',
          'Loan'
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
        'key' => get_post_field('post_name'),
        'profileImage' => get_the_post_thumbnail_url($post_id, 'full'),
        'type' => get_post_type(),
        'webLink' => get_permalink(),
        'brand_icon' => $logo,
        'status' => $status,
        'utm_source' => 'asw-app_register',
        'project_code' => $fields['project_code'],
        'cis_project_id' => (int)$fields['project_id'],
        'brand_name' => get_project_brand($post_id),
        'location' => get_location_by_post_id($post_id),
        'price' => $fields['price'],
        'coordinates' => get_project_coordinates($post_id),
        'address' => array(
          'th' => $fields['project_address'],
          'en' => get_trans_term($fields['project_address'], 'en')
        )
      );
    }
  }
  wp_reset_postdata();

  // Remove the filter after query is done
  remove_filter('posts_where', function(){});
  
  return rest_ensure_response($posts);
  //return 'test';
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

add_action('rest_api_init', function () {
  register_rest_route('wp/v2', '/project-test/(?P<id>[0-9]+)', array(
      'methods' => 'GET',
      'callback' => 'get_specific_project_test',
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
  if (is_array($content)) {
    if (isset($content) && count($content) > 0) {
      foreach ($content as $image) {
        $processed_content[] = $image['url'];
      }
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


function processed_project_contents($fields, $content_layout_key, $post_type) {
  // Get content fields
  $all_fields = [];
  $processed_project_content = [];

  if (isset($fields[$content_layout_key]) && is_array($fields[$content_layout_key])) {
    $all_fields = $fields[$content_layout_key];
  }

  $processed_project_content['progress'] = [];
  $processed_project_content['brochure'] = '';
  $processed_project_content['nearbyPlaces'] = [];
  $processed_project_content['google_maps'] = '';
  $processed_project_content['gallery'] = [];
  $processed_project_content['plans'] = [];
  $processed_project_content['videos'] = [];

  foreach ($all_fields as $section) {
    switch ($section['acf_fc_layout']) {
      case 'project_information':

        if ($section['more_information'] !== false) {
          $processed_project_content['brochure'] = $section['more_information']['url'];
        }

        if((int)$section['percent'] > 0 && $section['hide-progress'] !== 'hide') {
          $processed_project_content['progress'] = array(
            'updatedDate' => date('Y-m-d\TH:i:s', strtotime('first day of this month')),
            'overall' => (int)$section['percent'] ?? 0,
            'progressListed' => $section['progress_list'] ?? [],
            'progressImages' => process_progress_gallery($section['image']) ?? [],
          );
        }
        break;

      case 'location':
        if (isset($section['nearby_place']) && is_array($section['nearby_place'])) {
          foreach ($section['nearby_place'] as $tab) {
            $tabname = $tab['tab_name'];
            foreach ($tab['place'] as $place) {
              $processed_project_content['nearbyPlaces'][] = array(
                'group' => $tabname,
                'name' => $place['place_name'],
                'distance' => $place['distance']
              );
            }
          }
        }
        $processed_project_content['google_maps'] = $section['google_maps'];
        break;

      case 'gallery':
        if (count($section['gallery']) > 0) {
          foreach ($section['gallery'] as $image) {
            array_push($processed_project_content['gallery'], $image['url']);
          }
        }
        break;

      case 'plan':
        if ($post_type === 'condominium') {
          foreach ($section['plan'] as $tab) {
            if ($tab['tab_name'] && (stripos($tab['tab_name'], 'unit') !== false || stripos($tab['tab_name'], 'ห้อง') !== false)) {
              foreach ($tab['building'] as $building) {
              foreach ($building['floor'] as $floor) {
                array_push($processed_project_content['plans'], array(
                  'name' => $floor['floor_name'],
                  'image' => $floor['floor_image']['url']
                  ));
                }
              }
            }
          }
        } else {
          $processed_project_content['plans'] = process_house_plan_fields($section);
        }
        break;
      case 'video':
        foreach ($section['tab'] as $tab) {
          if ($tab['video']) {
            $url = explode('/', $tab['video'][0]['video_url'])[count(explode('/', $tab['video'][0]['video_url'])) - 1];
            if (!strpos($url, 'youtube')) {
              $url = 'https://www.youtube.com/embed/' . $url;
            }
            array_push($processed_project_content['videos'], array(
              'title' => $tab['tab_name'],
              'url' => $url
            ));
          }
        }
        break;
    }
  }

  return $processed_project_content;
}

function get_specific_project($request) {
  $id = (int)$request['id'];
  $lang = pll_get_post_language($id);
  $content_layout_key = 'v2_content';

  $fields = get_fields($id);

  // Get Project Coordinates
  if (isset($fields['coordinates']) && count(explode(',', $fields['coordinates'])) > 1) {
    $coordinates = explode(',', str_replace(' ', '', $fields['coordinates']));
  } else {
    $coordinates = ['13.877243574729327', '100.61954961125954'];
  }

  // Get Project Address
  if (isset($fields['project_address']) && $fields['project_address'] !== '') {
    $address = $fields['project_address'];
  } else {
    $address = '9 Ram Intra 5 Alley, Lane 23, Anusawari, Bang Khen, Bangkok 10220';
  }

  $processed_project_content = processed_project_contents($fields, $content_layout_key, get_post_type($id));

  $project_data = array(
    'profileImage' => get_the_post_thumbnail_url($id, 'full'),
    'name' => get_the_title($id),
    'description' => $fields['project_short_description'] ?? 'AssetWise | High-Quality Homes and Condominiums',
    'progress' => $processed_project_content['progress'],
    'location' => array(
      'latitude' => $coordinates[0],
      'longitude' => $coordinates[1],
      'address' => $address,
      'mapUrl' => $processed_project_content['google_maps']
    ),
    'nearbyLocations' => $processed_project_content['nearbyPlaces'] ?? [],
    'plans' => $processed_project_content['plans'] ?? [],
    'gallery' => $processed_project_content['gallery'],
    'brochure' => $processed_project_content['brochure'] ?? '',
    'videos' => $processed_project_content['videos'] ?? [],
    'webLink' => get_permalink($id),
    'utm_source' => 'asw-app_register'
  );

  return rest_ensure_response($project_data);
  
  return new WP_Error('no_project', 'Project not found', array('status' => 404));
}

function get_specific_project_test($request) {
  $id = (int)$request['id'];
  $lang = pll_get_post_language($id);
  $content_layout_key = 'v2_content';

  $fields = get_fields($id);

  // Get Project Coordinates
  if (isset($fields['coordinates']) && count(explode(',', $fields['coordinates'])) > 1) {
    $coordinates = explode(',', str_replace(' ', '', $fields['coordinates']));
  } else {
    $coordinates = ['13.877243574729327', '100.61954961125954'];
  }

  // Get Project Address
  if (isset($fields['project_address']) && $fields['project_address'] !== '') {
    $address = $fields['project_address'];
  } else {
    $address = '9 Ram Intra 5 Alley, Lane 23, Anusawari, Bang Khen, Bangkok 10220';
  }

  $processed_project_content = processed_project_contents($fields, $content_layout_key, get_post_type($id));

  $project_data = array(
    'profileImage' => get_the_post_thumbnail_url($id, 'full'),
    'name' => get_the_title($id),
    'description' => $fields['project_short_description'] ?? 'AssetWise | High-Quality Homes and Condominiums',
    'progress' => $processed_project_content['progress'],
    'location' => array(
      'latitude' => $coordinates[0],
      'longitude' => $coordinates[1],
      'address' => $address,
      'mapUrl' => $processed_project_content['google_maps']
    ),
    'nearbyLocations' => $processed_project_content['nearbyPlaces'] ?? [],
    'plans' => $processed_project_content['plans'] ?? [],
    'gallery' => $processed_project_content['gallery'],
    'brochure' => $processed_project_content['brochure'] ?? '',
    'videos' => $processed_project_content['videos'] ?? [],
    'webLink' => get_permalink($id)
  );

  return rest_ensure_response($project_data);
  
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

  // Add filter to exclude specific titles
  add_filter('posts_where', function($where) {
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
    'order' => 'DESC'
  );

  $query = new WP_Query($args);
  $promotion_listed = array();

  if ($query->have_posts()) {
      while ($query->have_posts()) {

          $query->the_post();
          $item_en = pll_get_post(get_the_ID(), 'en');
          $banner = get_field('banner_mobile', get_the_ID());

          $promotion_listed[] = array(
              'th' => array(
                  'id' => get_the_ID(),
                  'title' => get_the_title(),
                  'key' => get_post_field('post_name'),
                  'caption' => get_field('card_caption') === null ? '' : get_field('card_caption'),
                  'featured_image' => $banner['url']
              ),
              'en' => $item_en ? array(
                  'id' => $item_en,
                  'title' => get_the_title($item_en),
                  'key' => get_post_field('post_name', $item_en),
                  'caption' => get_field('card_caption', $item_en) === null ? '' : get_field('card_caption', $item_en),
                  'featured_image' => $banner['url']
              ) : [],
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
      $cis_id = get_field('project_id', $project['project'][0]->ID);
      $processed_content[] = array(
        'id' => $project['project'][0]->ID,
        'title' => $project['project'][0]->post_title,
        'image' => $project['image']['url'],
        'cis_id' => (int)$cis_id,
        'project_code' => get_field('project_code', $project['project'][0]->ID)
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
      $promotion_detail = array(
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
          'caption' => get_field('card_caption', $en_id) === null ? '' : get_field('card_caption', $en_id),
          'banner' => get_field('banner_mobile', $en_id)['url'],
          'content' => get_field('detail', $en_id),
          'participant_project' => process_participant_project(get_field('participating-projects', $en_id)),
          'related_promotions' => process_related_promotion(get_field('related_promotion', $en_id)),
        ) : array()
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