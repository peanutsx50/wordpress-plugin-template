<?php

namespace Inc\base;

class Test_Plugin_Enqueue_Public
{
    // Enqueue public styles and scripts
    public static function test_plugin_enqueue_public()
    {
        wp_enqueue_style(
            'test-plugin-public-style',
            PLUGIN_URL . 'public/test-plugin-public.css'
        );
    }
}
