<?php

/**
 * Handles custom post types for Test Plugin
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Test_Plugin
 * @subpackage Test_Plugin/includes
 */

namespace Inc\base;

class Test_Plugin_Post_Types
{
    public static function register_custom_post_type()
    {
        register_post_type('book', ['public' => true, 'label' => 'Books']);
    }
}
