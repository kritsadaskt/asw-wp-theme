<?php
do_action('qm/debug', 'API Endpoint Loaded');

include('superapp/utils.php');
include('superapp/all-projects.php');
include('superapp/single-project.php');
include('superapp/promotions.php');

// ==========================================
// TEST FUNCTION
// ==========================================

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

?>