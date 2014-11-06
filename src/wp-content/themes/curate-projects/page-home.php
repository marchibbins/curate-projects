<?php
$current_project = new WP_Query(array(
  'post_type' => 'page',
  'meta_query' => array(
    array(
      'key' => 'current_project',
      'value' => '1',
      'compare' => '==',
    )
  ))
);
?>

  <?php while($current_project->have_posts()): $current_project->the_post(); ?>
      <?php get_template_part('templates/page', 'gallery-header'); ?>
<div class="container">
      <?php get_template_part('templates/content', 'tease-project'); ?>
  <?php endwhile; ?>
<?php
// Manually query for posts because this is post_type=page.
query_posts('post_type=post&posts_per_page=2'); ?>

    <hr>
    <div class="row">
  <?php while (have_posts()) : the_post(); ?>
      <div class="col-sm-6">
        <?php get_template_part('templates/content', 'tease-'.$post->post_type); ?>
      </div>
  <?php endwhile; ?>
    </div>
    <a href="/news">See all news</a>
</div>
