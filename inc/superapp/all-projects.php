<?php
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
          'Loan',
          'Agent'
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

      //print_r($fields['v2_content'][0]);

      foreach($fields['v2_content'] as $content){
        if($content['acf_fc_layout'] === 'location'){
          $google_maps = $content['google_maps'];
        }
      }
      
      // Define fields
      $logo = $fields['logo']['url'];

      if(isset($fields['project_address'])){
        $address = array(
          'th' => $fields['project_address'],
          'en' => get_trans_term($fields['project_address'], 'en') ?? ''
        );
      }else{
        $address = array(
          'th' => '',
          'en' => ''
        );
      }

      $brand = get_project_brand($post_id);
      
      $posts[] = array(
        'id' => $post_id,
        'title' => get_the_title(),
        'key' => get_post_field('post_name'),
        'profileImage' => get_the_post_thumbnail_url($post_id, 'full'),
        'type' => get_post_type(),
        'webLink' => get_permalink(),
        'brand_icon' => count($brand) > 0 ? $brand['icon'] : $logo,
        'status' => $status,
        'utm_source' => 'asw-app_register',
        'project_code' => $fields['project_code'],
        'cis_project_id' => (int)$fields['project_id'],
        'brand_name' => array(
          'th' => count($brand) > 0 ? $brand['th'] : '',
          'en' => count($brand) > 0 ? $brand['en'] : ''
        ),
        'location' => get_location_by_post_id($post_id),
        'price' => $fields['price'],
        'coordinates' => get_project_coordinates($post_id, $google_maps),
        //'google_maps' => $google_maps,
        'address' => $address
      );
    }
  }
  wp_reset_postdata();

  // Remove the filter after query is done
  remove_filter('posts_where', function(){});
  
  return rest_ensure_response($posts);
  //return 'test';
}
?>