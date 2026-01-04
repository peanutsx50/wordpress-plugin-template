<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 */

class Test_Plugin_Activator {

    /**
     * Activation logic here
     *
     * @since    1.0.0
     */
    public static function activate() {
        // Activation code goes here.
        Test_Plugin_Post_Types::register_custom_post_type();
        flush_rewrite_rules();
    }
}