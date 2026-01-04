<?php
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           0.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('add_action')) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}

class Test_Plugin
{
    // Constructor to set up hooks
    public function __construct()
    {
        // enqueue hooks: admin and public, loads CSS and js files
        add_action('init', [$this, 'create_custom_post_type']);
        add_action('admin_enqueue_scripts', [$this, 'test_plugin_enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'test_plugin_enqueue_public']);
    }

    // Activation method
    public function activate()
    {
        $this->create_custom_post_type();
        flush_rewrite_rules();
    }

    // Deactivation method
    public function deactivate()
    {
        // Code for deactivation
        flush_rewrite_rules();
    }

    // Create custom post type
    // Custom post type is located in left menu
    public function create_custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
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
    // new Test_Plugin();
    register_activation_hook(__FILE__, array($test_plugin_instance, 'activate')); // we pass methods as array
    register_deactivation_hook(__FILE__, array($test_plugin_instance, 'deactivate'));
}
