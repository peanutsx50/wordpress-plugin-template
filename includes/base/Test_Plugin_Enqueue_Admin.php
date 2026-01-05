<?php

namespace Inc\base;

class Test_Plugin_Enqueue_Admin
{
    // Enqueue admin styles
    public static function test_plugin_enqueue_admin()
    {
        wp_enqueue_style(
            'test-plugin-admin-style',
            PLUGIN_URL . 'admin/test-plugin-admin.css'
        );
    }
}
