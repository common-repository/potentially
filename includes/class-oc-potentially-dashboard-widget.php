<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  die("We're sorry, but you can't directly access this file.");
}

// Get access to common functions.
require_once(dirname(__FILE__) . '/oc-potentially-commons.php');

class Oc_Potentially_Dashboard_Widget {
  // ID of widget.
  const id = 'oc-potentially-dashboard-widget';
  // Visible title of widget.
  const widget_title = 'Potentially';
  // Visible description of widget.
  const widget_description = 'Artificial Intelligence figures out how many new paying customers you could be getting monthly. Upgrade and we will help you get them. If you find this plugin interesting, <a href="https://wordpress.org/support/plugin/potentially/reviews/#new-post" target="_blank">please leave a review.</a>';

  // Entry point of widget.
  public function __construct() {
    add_action('wp_dashboard_setup', array($this, 'wp_dashboard_setup_callback'));
  }

  // Callback for wp_dashboard_setup to add widget.
  public function wp_dashboard_setup_callback() {
    // Register the widget.
    wp_add_dashboard_widget(
      self::id,                                         // Unique ID of widget.
      self::widget_title,                               // Visible title of widget.
      array($this, 'wp_add_dashboard_widget_callback') // Callback to display widget content.
    );
  }

  // Callback for wp_add_dashboard_widget to render widget.
  public function wp_add_dashboard_widget_callback() {
    ?>
    <div class="oc-style-wrapper oc-potentially-dashboard-widget">
      <div class="oc-center">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 485">
            <path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path>
          </svg>
          <span class="oc-data oc-ml-2"><?php echo oc_potentially_get_potential(); ?></span>
        </div>
        <p class="oc-description">Potential New Customers Monthly</p>
      </div>
      <hr class="oc-my-2" />
      <p><?php echo self::widget_description; ?></p>
      <a href="https://overflowcafe.com/am/aff/go/app" target="_blank" class="oc-btn oc-btn-primary oc-mt-3">Upgrade</a>
      <a href="https://overflowcafe.com/contact-us/" target="_blank" class="oc-btn">Support</a>
    </div>
    <?php
  }
}
