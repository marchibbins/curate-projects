
<div class="container">
    <?php
    $query = "
        SELECT $wpdb->posts.*
        FROM $wpdb->posts, $wpdb->postmeta
        WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id
        AND $wpdb->postmeta.meta_key = 'current_project'
        AND $wpdb->postmeta.meta_value = 1
        AND $wpdb->posts.post_status = 'publish'
        AND $wpdb->posts.post_type = 'page'
        AND $wpdb->posts.post_date < '".current_time('mysql')."'
        ORDER BY $wpdb->posts.post_date DESC
        LIMIT 1
     ";

     $current_projects = $wpdb->get_results($query, OBJECT);
    ?>

    <?php if ($current_projects): ?>
        <?php global $post; ?>
        <?php foreach ($current_projects as $post): ?>
            <?php setup_postdata($post); ?>
            <?php get_template_part('templates/content', get_post_format()); ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <hr>
    <?php get_template_part('index'); ?>
</div>