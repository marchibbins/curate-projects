<div class="page-header">
    <h1><?php echo roots_title(); ?></h1>

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
        <nav>
            <ul class="nav nav-pills child-page-nav">
                <?php foreach ($child_pages as $key => $child_page): ?>
                    <li class="<?= first($child_pages, $key) ? 'active' : ''; ?>">
                        <a href="<?= get_permalink() . $child_page->post_name ?>"><?= $child_page->post_title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>
