<?php

/*
* The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 * 
 * 
 * @link              http://example.com
 * @since             1.0.0
 * @package           Test_Plugin
 * 
 * 
 * Plugin Name:       Test Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Doe
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       test-plugin
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

require_once plugin_dir_path(__FILE__) . 'includes/class-test-plugin-post-types.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-test-plugin-admin-pages.php';

class Test_Plugin
{
    // Constructor to set up hooks
    public function __construct()
    {
        // enqueue hooks: admin and public, loads CSS and js files
        add_action('init', ['Test_Plugin_Post_Types', 'register_custom_post_type']);
        add_action('admin_menu', ['Test_Plugin_Admin_Pages', 'add_admin_pages']);
        add_action('admin_enqueue_scripts', [$this, 'test_plugin_enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'test_plugin_enqueue_public']);
    }

    // Enqueue admin styles
    public function test_plugin_enqueue_admin()
    {
        wp_enqueue_style(
            'test-plugin-admin-style',
            plugin_dir_url(__FILE__) . 'admin/test-plugin-admin.css'
        );
    }

    // Enqueue public styles
    public function test_plugin_enqueue_public()
    {
        wp_enqueue_style(
            'test-plugin-public-style',
            plugin_dir_url(__FILE__) . 'public/test-plugin-public.css'
        );
    }
}

if (class_exists('Test_Plugin')) {
    $test_plugin_instance = new Test_Plugin();
    
}

// Include the activation and deactivation classes
require_once plugin_dir_path(__FILE__) . 'includes/class-test-plugin-activator.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-test-plugin-deactivator.php';

// Register activation and deactivation hooks
register_activation_hook(__FILE__, ['Test_Plugin_Activator', 'activate']);
register_deactivation_hook(__FILE__, ['Test_Plugin_Deactivator', 'deactivate']);