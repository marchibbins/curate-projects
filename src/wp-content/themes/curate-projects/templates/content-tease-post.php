<article <?php post_class('news-tease'); ?>>
  <header>
    <time datetime="<?=get_the_time('c'); ?>"><?= get_the_date('F jS Y'); ?></time>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
