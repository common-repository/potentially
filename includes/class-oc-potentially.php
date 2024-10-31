<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) {
  die("We're sorry, but you can't directly access this file.");
}

// Get access to common functions.
require_once(dirname(__FILE__) . '/oc-potentially-commons.php');

class Oc_Potentially {
  // ID of dashboard plugin.
  const id = 'oc-potentially';
  // Dashboard plugin site title.
  const site_title = 'Potentially';
  // Dashboard admin menu page title
  const menu_title = 'Potentially';
  // Privileges required to access page
  const required_privilege = 'administrator';
  // Visible page title
  const page_title = 'Potentially - Gain New Customers';
  // Upgrade benefits
  const upgrade_benefits = array(
    'AI will work for your website.',
    'Unlimited website audit reports.',
    'Simple keyword suggestions.',
    'Easy to understand progress reports.',
    'Unlimited keyword promotion.',
    'Verifiable keyword tracking.',
    'Backlink building.',
    'Toxic backlink removal.',
    'Priority Email, LiveChat, Phone & VideoChat support.',
    'Much more!'
  );

  // Class properties.
  private $basename;

  // Entry point of dashboard.
  public function __construct($basename) {
    // Properties.
    $this->basename = $basename;

    // Hooks.
    add_action('admin_menu', array($this, 'hook_admin_menu'));
    add_filter('plugin_action_links', array($this, 'hook_plugin_action_links'), 10, 2);
  }

  // Hook to admin_menu to add plugin to admin menu.
  public function hook_admin_menu() {
    add_menu_page(
      self::site_title,
      self::menu_title,
      self::required_privilege,
      self::id,
      array($this, 'add_menu_page_callback'),
      'data:image/svg+xml;base64,PHN2ZyBpZD0iTGF5ZXJfMSIgZGF0YS1uYW1lPSJMYXllciAxIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MS4yOSA1MS4zIj48ZGVmcz48c3R5bGU+LmNscy0xe2ZpbGw6IzllYTNhODt9PC9zdHlsZT48L2RlZnM+PHBhdGggY2xhc3M9ImNscy0xIiBkPSJNMzMsNDhjLTIuNzMsMC00LjYxLTMuODctNC42MS0zLjg3TDIyLjQ2LDI5LjU0LDcuOTEsMjMuNlM0LDIxLjcyLDQsMTlzLjgxLTQuMzksNi4zNy01Ljk0UzQwLjI0LDUuMzEsNDAuMjQsNS4zMXM0LjIyLTEuNSw2LjA5LjM3LjM3LDYuMDkuMzcsNi4wOVM0MC41MSwzNi4wNywzOSw0MS42MSwzNS43NSw0OCwzMyw0OFoiLz48L3N2Zz4='
    );
  }

  // Hook to plugin_action_links_ to add links to installed plugins page.
  public function hook_plugin_action_links($links_array, $plugin_file_name) {
    if(strpos($plugin_file_name, $this->basename)) {
      array_unshift($links_array, '<a href="https://overflowcafe.com/am/aff/go/app">Upgrade</a>');
    }

    return $links_array;
  }

  // Callback for add_menu_page to render plugin dashboard.
  public function add_menu_page_callback() {
    ?>
    <div class="oc-style-wrapper oc-pt-4 oc-pr-md-0 oc-pr-2">
      <h1 class="oc-mb-3"><?php echo self::page_title; ?></h1>
      <div class="oc-dashboard-card oc-potentially-dashboard-widget oc-col-lg-6 oc-col-md-8 oc-col-12">
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
        <ul class="oc-check-list">
          <?php
          foreach (self::upgrade_benefits as $benefit) {
            printf('<li>%s</li>', $benefit);
          }
          ?>
        </ul>
        <a href="https://overflowcafe.com/am/aff/go/app" target="_blank" class="oc-btn oc-btn-primary oc-mt-3">Upgrade</a>
        <a href="https://overflowcafe.com/contact-us/" target="_blank" class="oc-btn">Support</a>
      </div>
    </div>
    <?php
  }
}
