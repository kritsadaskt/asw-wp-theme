<?php
// =======================================================
// Get project brand
// =======================================================
function get_project_brand($post_id) {
  $query = get_the_terms($post_id, 'project-type');
  $brand = [];
  $brand_th = '';
  $brand_en = '';
  $brand_icon = '';
  if ($query) {
    foreach ($query as $term) {
      if ($term->parent != 0) {
        $brand_icon = get_field('project_logo', $term->taxonomy . '_' . $term->term_id);
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
          'en' => $brand_en,
          'icon' => $brand_icon['url']
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
  if ($terms && is_array($terms) && count($terms) > 0) {
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
  return $location[0] ?? [];
}

// =======================================================
// Process Project Coordinates
// =======================================================
function get_project_coordinates($post_id, $google_maps) {
  $coordinates = get_field('coordinates', $post_id);
  if ($coordinates !== '' && $google_maps !== '') {
    $latlong = explode(',', str_replace(' ', '', $coordinates));
    // Check if both latitude and longitude exist in array
    if (isset($latlong[0]) && isset($latlong[1])) {
      return array(
        'latitude' => $latlong[0],
        'longitude' => $latlong[1],
        'mapUrl' => $google_maps
      );
    }
  }
  
  // Return default coordinates if validation fails
  return array(
    'latitude' => '13.7563',
    'longitude' => '100.5018',
    'mapUrl' => $google_maps !== '' ? $google_maps : ''
  );
}

// =======================================================
// Convert URL to ID
// =======================================================

function convert_url_to_id($url) {
  if (strpos($url, 'assetwise.co.th') !== false || strpos($url, 'assetwise.test') !== false) {
    $id = url_to_postid($url);
    return $id;
  }
  return $url;
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
  // Strategy: Use REST API filter to modify response instead of overriding field
  // This preserves WordPress editor functionality while providing custom format for API consumers
  
  // Hook into REST API response to modify featured_media field for external API consumers
  add_filter('rest_prepare_news', 'ws_modify_featured_media_response', 10, 2);
  add_filter('rest_prepare_post', 'ws_modify_featured_media_response', 10, 2);
  add_filter('rest_prepare_asw_club', 'ws_modify_featured_media_response', 10, 2);
  add_filter('rest_prepare_condominium', 'ws_modify_featured_media_response', 10, 2);
  add_filter('rest_prepare_house', 'ws_modify_featured_media_response', 10, 2);
}

add_action( 'rest_api_init', 'ws_register_images_field' );

function ws_get_images_urls( $object, $field_name, $request ) {
  $medium = wp_get_attachment_image_src( get_post_thumbnail_id( $object['id'] ), 'medium' );
  $medium_url = $medium ? $medium[0] : '';

  $large = wp_get_attachment_image_src( get_post_thumbnail_id( $object['id'] ), 'large' );
  $large_url = $large ? $large[0] : '';

  return array(
      'medium' => $medium_url,
      'large'  => $large_url,
  );
}

// Modify REST API response to provide custom featured_media format
// This approach preserves WordPress editor functionality while customizing API output
function ws_modify_featured_media_response( $response, $post ) {
  // Only modify for external API consumers, not WordPress editor
  // Skip modification if this is an editor request
  if ( ws_is_editor_request() ) {
    return $response;
  }
  
  // Apply custom format for external API consumers
  if ( isset( $response->data['featured_media'] ) ) {
    // Get the custom format using our existing function
    $custom_media = ws_get_images_urls( array( 'id' => $post->ID ), 'featured_media', null );
    
    // Replace the featured_media field with custom format
    $response->data['featured_media'] = $custom_media;
  }
  
  return $response;
}

// Helper function to detect if request is from WordPress editor
function ws_is_editor_request() {
  // Check for WordPress admin/editor indicators in global variables
  
  // WordPress editor often includes these indicators:
  // 1. _embed parameter for embedding media data
  // 2. context=edit parameter
  // 3. Referer from wp-admin
  
  if ( isset( $_GET['_embed'] ) ) {
    return true;
  }
  
  if ( isset( $_GET['context'] ) && $_GET['context'] === 'edit' ) {
    return true;
  }
  
  // Check referer header for admin requests
  if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
    $referer = $_SERVER['HTTP_REFERER'];
    if ( strpos( $referer, '/wp-admin/' ) !== false ) {
      return true;
    }
  }
  
  // Check if we're in admin context
  if ( is_admin() ) {
    return true;
  }
  
  return false;
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
              'id' => $item['image']['id'],
              'referral_id' => $item['related_post'] ? $item['related_post'] : 0,
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

function process_participant_project_tabs($tabs) {
  $project_ids = array();
  
  // Loop through each tab
  foreach ($tabs as $tab) {
    // Check if projects_group exists
    if (isset($tab['projects_group']) && is_array($tab['projects_group'])) {
      // Loop through each group
      foreach ($tab['projects_group'] as $group) {
        // Check if projects exists
        if (isset($group['projects']) && is_array($group['projects'])) {
          // Loop through each project and extract the project ID
          foreach ($group['projects'] as $project_data) {
            if (isset($project_data['project'])) {
              $project_ids[] = $project_data['project'];
            }
          }
        }
      }
    }
  }

  foreach ($project_ids as $project_id) {
    $processed_content[] = array(
      'id' => $project_id,
      'title' => get_the_title($project_id),
      'image' => get_the_post_thumbnail_url($project_id, 'full'),
      'cis_id' => (int)get_field('project_id', $project_id),
      'project_code' => get_field('project_code', $project_id)
    );
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

      $template = get_page_template_slug(get_the_ID());

      if ($template != '' && $template === 'page-campaign.php') {
        $banner = get_field('hero_banner', get_the_ID());
        $app_banner = $banner[0]['mobile_banner']['url'];
        $page_setting = get_field('page_setting', get_the_ID());
        $display_type = $page_setting['display_type'];

        // Prepare Project Listed
        if ($display_type === 'group') {
          $project_listed = process_participant_project(get_field('participating-projects', get_the_ID()));
        } elseif ($display_type === 'tabs') {
          $project_listed = process_participant_project_tabs(get_field('project_selector_tabs', get_the_ID()));
        } else {
          $project_listed = array();
        }

        //Prepare TH object
        $th = array(
          'id' => get_the_ID(),
          'title' => get_the_title(),
          'key' => get_post_field('post_name'),
          'caption' => get_field('card_caption') === null ? '' : get_field('card_caption'),
          'banner' => $app_banner,
          'content' => get_field('detail'),
          'participant_project' => $project_listed,
          'related_promotions' => process_related_promotion(get_field('related_promotion')),
          'utm_source' => 'asw-app_register'
        );

        //Prepare EN object
        if ($en_id !== 0) {
          $en = array(
            'id' => $en_id,
            'title' => get_the_title($en_id),
            'key' => get_post_field('post_name', $en_id),
            'caption' => get_field('card_caption', $en_id) === null ? '' : get_field('card_caption', $en_id),
            'banner' => $app_banner,
            'content' => get_field('detail', $en_id),
            'participant_project' => $project_listed,
            'related_promotions' => process_related_promotion(get_field('related_promotion', $en_id)),
            'utm_source' => 'asw-app_register'
          );
        } else {
          $en = array();
        }

        $promotion_detail = array(
          'th' => $th,
          'en' => $en,
        );
      } else {
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
            'utm_source' => 'asw-app_register'
          ) : array()
        );
      }
  }

  wp_reset_postdata();
  
  return rest_ensure_response($promotion_detail);
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

?>