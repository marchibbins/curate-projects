<?php while (have_posts()) : the_post(); ?>

<div class="tab-content">
<?php 
    $id = get_the_ID();
    $args = array(
      'post_type'      => 'page',
      'posts_per_page' => -1,
      'post_parent'    => $id,
      'order'          => 'ASC',
      'orderby'        => 'menu_order'
    );
    $children = new WP_Query( $args );
    while($children->have_posts()): $children->the_post();
?>
  <div class="tab-pane <?= $children->current_post === 0 ? 'active' : ''; ?>" id="<?= get_the_ID() ?>"><? the_content() ?></div>
<?php endwhile; // end child pages 
wp_reset_postdata();
?>
</div><!--end child page tabs -->

  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>
