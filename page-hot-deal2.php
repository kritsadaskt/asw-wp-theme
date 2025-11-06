<?php 
// pre($post);
$arg = array('post_type' => 'hot-deal', 'posts_per_page' => 1,'post_parent'=>0);
$qr = new WP_Query($arg);
$url = get_the_permalink( $qr->posts[0]);
// pre($qr);
pre($url);
// header( "location: $url" );
// exit(0);
?>