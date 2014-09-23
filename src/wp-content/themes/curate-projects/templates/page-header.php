<div class="page-header">
    <h1><?php echo roots_title(); ?></h1>

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
    ?>

    <?php if ($children->have_posts()): ?>
        <nav>
            <ul class="nav child-page-nav">
                <?php while ($children->have_posts()): $children->the_post(); ?>
                    <li class="<?= $children->current_post === 0 ? 'active' : ''; ?>">
                        <a role="tab" data-toggle="tab" href="#<?= get_the_ID() ?>"><?= get_the_title(); ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
