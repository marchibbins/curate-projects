<?php
/**
 * Custom functions
 */

// Array tools
function first(&$array, $key) {
    reset($array);
    return $key === key($array);
}

function last(&$array, $key) {
    end($array);
    return $key === key($array);
}

function get_child_pages($wpdb, $id) {
    $query = "
        SELECT $wpdb->posts.*
        FROM $wpdb->posts
        WHERE $wpdb->posts.post_parent = " . $id . "
        AND $wpdb->posts.post_status = 'publish'
        AND $wpdb->posts.post_type = 'page'
        AND $wpdb->posts.post_date < '" . current_time('mysql') . "'
        ORDER BY $wpdb->posts.menu_order ASC
    ";
    return $wpdb->get_results($query, OBJECT);
}

add_filter('show_admin_bar', '__return_false');
