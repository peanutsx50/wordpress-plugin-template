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

// Exit if accessed directly
if (! defined('ABSPATH')) {
    exit; 
}

// Autoload dependencies using Composer
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// namespace Inc;
use Inc\Test_Plugin_Activator;
use Inc\Test_Plugin_Deactivator;
use Inc\Test_Plugin_Post_Types;
use Inc\Test_Plugin_Admin_Pages;

class Test_Plugin
{
    // Constructor to set up hooks
    public function __construct()
    {
        // enqueue hooks: admin and public, loads CSS and js files
        add_action('init', [Test_Plugin_Post_Types::class, 'register_custom_post_type']);
        add_action('admin_menu', [Test_Plugin_Admin_Pages::class, 'add_admin_pages']);
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

// Register activation and deactivation hooks
register_activation_hook(__FILE__, [Test_Plugin_Activator::class, 'activate']);
register_deactivation_hook(__FILE__, [Test_Plugin_Deactivator::class, 'deactivate']); 