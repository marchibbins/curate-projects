<?php
/*
Template Name: Project template
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<?php

// Find children of current page
$query = new WP_Query();
$all_pages = $query->query(array('post_type' => 'page'));
$page_children = get_page_children( get_the_ID(), $all_pages );

// Sort
function menu_order_sort($a, $b) {
    return strcmp($a->menu_order, $b->menu_order);
}

usort($page_children, 'menu_order_sort');

// Loop le loop
foreach ($page_children as $partial):
    include(locate_template('templates/content-partial.php'));
endforeach; ?>