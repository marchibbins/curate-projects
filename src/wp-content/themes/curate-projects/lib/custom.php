<?php
/**
 * Custom functions
 */

function first(&$array, $key) {
    reset($array);
    return $key === key($array);
}

function last(&$array, $key) {
    end($array);
    return $key === key($array);
}
