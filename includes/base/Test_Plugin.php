<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 * @author     Your Name <email@example.com>
 */

namespace Inc\base;

class Test_Plugin
{
    // Constructor to set up hooks
    public function __construct()
    {
        // enqueue hooks: admin and public, loads CSS and js files
        add_action('init', [Test_Plugin_Post_Types::class, 'register_custom_post_type']);
        add_action('admin_menu', [Test_Plugin_Admin_Pages::class, 'add_admin_pages']);
        add_action('admin_enqueue_scripts', [Test_Plugin_Enqueue_Admin::class, 'test_plugin_enqueue_admin']);
        add_action('wp_enqueue_scripts', [Test_Plugin_Enqueue_Public::class, 'test_plugin_enqueue_public']);
    }
}
