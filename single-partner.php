<?php

$redirect_url = get_field('redirect_url', get_the_ID());
$utm_source = get_field('utm_source', get_the_ID());
$default_url = 'https://assetwise.co.th/promotion';

if ($redirect_url) {
  wp_redirect($redirect_url . '?utm_source=' . $utm_source);
  exit;
} else {
  wp_redirect($default_url);
  exit;
}

get_header();

get_footer();

?>