<?php

/**
 * Handles admin pages for Test Plugin
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 */

class Test_Plugin_Admin_Pages{
    public static function add_admin_pages(){
        add_menu_page('Test Plugin', 'Test Plugin', 'manage_options', 'test_plugin', [self::class, 'admin_index'], 'dashicons-admin-generic', 110);
    }
    
    public static function admin_index(){
        // Admin page content goes here
        echo '<h1>Welcome to the Test Plugin Admin Page</h1>';
    }
}