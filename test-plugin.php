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

// Define plugin constants
define('PLUGIN_URL', plugin_dir_url(__FILE__));
define('PLUGIN_PATH', plugin_dir_path(__FILE__));

// namespace Inc;
use Inc\base\Test_Plugin_Activator;
use Inc\base\Test_Plugin_Deactivator;
use Inc\base\Test_Plugin;


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_test_plugin()
{
    Test_Plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_test_plugin()
{
    Test_Plugin_Deactivator::deactivate();
}

// Register activation and deactivation hooks
register_activation_hook(__FILE__, 'activate_test_plugin');
register_deactivation_hook(__FILE__, 'deactivate_test_plugin');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_test_plugin()
{
    $plugin = new Test_Plugin();
    return $plugin;
}

run_test_plugin();
