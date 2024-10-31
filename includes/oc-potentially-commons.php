<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  die("We're sorry, but you can't directly access this file.");
}

function oc_potentially_get_potential() {
  // Potential API URL.
  $potential_api_url = 'https://overflowcafe.com/app/potentially.php';

  // Get WP
  $response = wp_remote_get($potential_api_url . '?url=' . site_url());
  $body = wp_remote_retrieve_body($response);

  // Parse JSON.
  $json_response = json_decode($body, TRUE);

  // Return potential figure.
  return $json_response['potential'];
}