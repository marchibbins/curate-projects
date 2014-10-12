<?php
/*
Template Name: Visits page
*/
?>

<?php get_template_part('templates/page', 'gallery-header'); ?>

<div class="container">
    <?php get_template_part('templates/page', 'header'); ?>
    <?php get_template_part('templates/content', 'page'); ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <?php
                $args = array('post_type' => 'studio-visit', 'posts_per_page' => 4);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    get_template_part('templates/content', get_post_format());
                endwhile;
            ?>
        </div>
        <div class="col-sm-6">
            <?php
                $args = array('post_type' => 'warehouse-visit', 'posts_per_page' => 4);
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    get_template_part('templates/content', get_post_format());
                endwhile;
            ?>
        </div>
    </div>
</div>
