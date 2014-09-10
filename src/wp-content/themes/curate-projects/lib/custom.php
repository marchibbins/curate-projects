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

add_filter('show_admin_bar', '__return_false');
