<article <?php post_class('news-tease'); ?>>
  <header>
    <div class="row">
      <time class="col-xs-2 date" datetime="<?=get_the_time('c'); ?>"><span class="date__day"><?= get_the_date('j'); ?><sup><?= get_the_date('S'); ?></sup></span> <span class="date__month"><?= get_the_date('M'); ?></span></time>
      <h3 class="news-tease__title col-xs-10 entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
