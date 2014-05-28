<?php
/*
Template Name: Project template
*/
?>

<?php get_template_part('templates/page', 'header'); ?>
<?php get_template_part('templates/content', 'page'); ?>

<?php

$query = "
    SELECT $wpdb->posts.*
    FROM $wpdb->posts
    WHERE $wpdb->posts.post_parent = ".get_the_ID()."
    AND $wpdb->posts.post_status = 'publish'
    AND $wpdb->posts.post_type = 'page'
    AND $wpdb->posts.post_date < NOW()
    ORDER BY $wpdb->posts.menu_order ASC
 ";

 $child_pages = $wpdb->get_results($query, OBJECT);
?>

<?php if ($child_pages): ?>
  <?php global $post; ?>
  <?php foreach ($child_pages as $post): ?>
    <?php setup_postdata($post); ?>
    <?php get_template_part('templates/content', 'partial'); ?>
  <?php endforeach; ?>
 <?php endif; ?>