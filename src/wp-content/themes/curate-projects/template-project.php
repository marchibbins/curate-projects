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
    AND $wpdb->posts.post_date < '".current_time('mysql')."'
    ORDER BY $wpdb->posts.menu_order ASC
 ";

 $child_pages = $wpdb->get_results($query, OBJECT);
?>

<?php if ($child_pages): ?>

  <ul class="nav nav-pills">
    <?php foreach ($child_pages as $key => $post): ?>
      <li class="<?= first($child_pages, $key) ? 'active' : ''; ?>">
        <a href="#<?= $post->post_name ?>" data-toggle="tab"><?= $post->post_title; ?></a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php global $post; ?>
  <div class="tab-content">
    <?php foreach ($child_pages as $key => $post): ?>
      <?php setup_postdata($post); ?>
      <div class="tab-pane <?= first($child_pages, $key) ? 'active' : ''; ?>" id="<?= $post->post_name ?>">
        <?php get_template_part('templates/content', 'partial'); ?>
      </div>
    <?php endforeach; ?>
  </div>
 <?php endif; ?>