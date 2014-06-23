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

  <?php foreach ($child_pages as $key => $post): ?>
    <button class="btn btn-primary" data-toggle="modal" data-target="#<?= $post->post_name; ?>"><?= $post->post_title; ?></button>
  <?php endforeach; ?>

  <?php global $post; ?>
  <?php foreach ($child_pages as $key => $post): ?>
    <?php setup_postdata($post); ?>
    <div class="modal sub-page" id="<?= $post->post_name; ?>" tabindex="-1" role="dialog" aria-labelledby="<?= $post->post_name; ?>-label" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <?php get_template_part('templates/content', 'partial'); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
 <?php endif; ?>