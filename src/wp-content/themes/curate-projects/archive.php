<div class="container">
    <div class="row">
    <?php while (have_posts()) : the_post(); ?>
      <div class="col-sm-6">
        <?php get_template_part('templates/content', 'tease-'.$post->post_type); ?>
      </div>
    <?php endwhile; ?>
    </div>

    <?php if ($wp_query->max_num_pages > 1) : ?>
        <nav class="post-nav">
            <ul class="pager">
                <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
                <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
