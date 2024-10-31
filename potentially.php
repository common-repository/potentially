<?php
/**
 * Plugin Name: Potentially
 * Plugin URI: https://overflowcafe.com
 * Description: How many new paying customers can you gain this month?
 * Author: Overflow Cafe
 * Author URI: https://overflowcafe.com
 * Version: 1.0.0
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  die("We're sorry, but you can't directly access this file.");
}

// Import class files.
require_once(dirname(__FILE__) . '/includes/class-oc-potentially.php');
require_once(dirname(__FILE__) . '/includes/class-oc-potentially-dashboard-widget.php');

// Initialize our plugin.
new Oc_Potentially(basename(__FILE__));

// Initialize dashboard widget.
new Oc_Potentially_Dashboard_Widget();

function oc_potentially_admin_enqueue_scripts_hook() {
    wp_register_style('oc-potentially', plugins_url('styles/oc-potentially.css', __FILE__));
    wp_enqueue_style('oc-potentially');
    wp_register_style('oc-potentially-dashboard-widget', plugins_url('styles/oc-potentially-dashboard-widget.css', __FILE__));
    wp_enqueue_style('oc-potentially-dashboard-widget');
}

add_action('admin_enqueue_scripts', 'oc_potentially_admin_enqueue_scripts_hook');