<?php
/*
Partial post/page available as $partial
*/
if ($partial->post_status === 'publish'): ?>

<section>
  <header>
    <h2 class="entry-title"><?php echo $partial->post_title; ?></h2>
  </header>
  <div class="entry-summary">
    <?php echo $partial->post_content; ?>
  </div>
</section>

<?php endif; ?>