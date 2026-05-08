<?php
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

// Add REST API for get Facility
add_action('rest_api_init', function () {
  register_rest_route('asw-api/v1', '/getProjectFacility', array(
    'methods' => 'GET',
    'callback' => 'get_project_facility',
    'permission_callback' => '__return_true',
    'args' => array(
      'url' => array(
        'required' => true,
        'validate_callback' => function($param) {
          return is_string($param);
        }
      )
    )
  ));
});

function get_project_facility($request) {
  $id = url_to_postid($request['url']);
  $fields = get_fields($id);
  if (isset($fields['v2_content']) && is_array($fields['v2_content'])) {
    foreach ($fields['v2_content'] as $content_block) {
      if ($content_block['acf_fc_layout'] === 'facility') {
        $processed_content = $content_block['facility'];
      }
    }
  }
  foreach ($processed_content as $content) {
    $response[] = array(
      'image' => $content['image']['url'],
      'title' => $content['title'],
      'description' => $content['description']
    );
  }
  return rest_ensure_response($response);
}

// Add REST API for get Gallery
add_action('rest_api_init', function () {
  register_rest_route('asw-api/v1', '/getProjectGallery', array(
    'methods' => 'GET',
    'callback' => 'get_project_gallery',
    'permission_callback' => '__return_true',
    'args' => array(
      'url' => array(
        'required' => true,
        'validate_callback' => function($param) {
          return is_string($param);
        }
      )
    )
  ));
});

function get_project_gallery($request) {
  $id = url_to_postid($request['url']);
  $fields = get_fields($id);
  if (isset($fields['v2_content']) && is_array($fields['v2_content'])) {
    foreach ($fields['v2_content'] as $content_block) {
      if ($content_block['acf_fc_layout'] === 'gallery') {
        $processed_content = $content_block['gallery'];
      }
    }
  }
  if (count($processed_content) > 0) {
    foreach ($processed_content as $content) {
      $response[] = array(
        'image' => $content['url'],
        'title' => $content['title'],
        'description' => $content['description']
      );
    }
  } else {
    $response = new WP_Error('no_gallery', 'Gallery not found', array('status' => 404));
  }
  return rest_ensure_response($response);
}

?>