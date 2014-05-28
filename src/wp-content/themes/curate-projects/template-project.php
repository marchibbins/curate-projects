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

// Loop like this??
    foreach ($page_children as $child) :
        if ($child->post_status === 'publish') : ?>

            <h2><?php echo $child->post_title; ?></h2>
            <div><?php echo $child->post_content; ?></div>

<?php   endif;
    endforeach; ?>