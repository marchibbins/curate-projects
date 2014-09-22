<div class="page-header">
    <h1><?php echo roots_title(); ?></h1>

    <?php
        $id = $post->post_parent ? $post->post_parent : get_the_ID();
        $child_pages = get_child_pages($wpdb, $id);
    ?>

    <?php if ($child_pages): ?>
        <nav>
            <ul class="nav nav-pills child-page-nav">
                <?php foreach ($child_pages as $key => $child_page): ?>
                    <li class="<?= get_the_ID() == $child_page->ID ? 'active' : ''; ?>">
                        <a href="<?= get_permalink($child_page->post_parent) . $child_page->post_name ?>"><?= $child_page->post_title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
