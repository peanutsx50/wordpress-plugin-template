<?php

// if uninstall.php is not called by WordPress, die
if (! defined('WP_UNINSTALL_PLUGIN')) {
    exit; // Exit if accessed directly
}

// Remove custom post type on uninstall
$books = get_posts(array(
    'post_type' => 'book',
    'numberposts' => -1,
    'post_status' => 'any'
));
    
foreach ($books as $book) {
    wp_delete_post($book->ID, true); // get ID and delete permanently
}

// use wpdb to remove any custom tables if created
// global $wpdb;
// $table_name = $wpdb->prefix . 'your_custom_table';
// $wpdb->query("DROP TABLE IF EXISTS $table_name");