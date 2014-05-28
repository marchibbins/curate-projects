<?php get_template_part('index'); ?>

<?php
$querystr = "
    SELECT $wpdb->posts.* 
    FROM $wpdb->posts, $wpdb->postmeta
    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
    AND $wpdb->postmeta.meta_key = 'current_project' 
    AND $wpdb->postmeta.meta_value = 'true' 
    AND $wpdb->posts.post_status = 'publish' 
    AND $wpdb->posts.post_type = 'page'
    AND $wpdb->posts.post_date < NOW()
    ORDER BY $wpdb->posts.post_date DESC
 ";

 $pageposts = $wpdb->get_results($querystr, OBJECT);
?>

<?php if ($pageposts): ?>
  <?php global $post; ?>
  <?php foreach ($pageposts as $post): ?>
    <?php setup_postdata($post); ?>
    <?php get_template_part('templates/content', get_post_format()); ?>
  <?php endforeach; ?>
 <?php endif; ?>