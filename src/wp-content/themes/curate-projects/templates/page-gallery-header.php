<?php
    $featured = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
    $media = get_attached_media( 'image' );
?>

<? if (!empty($featured)): ?>

    <div class="gallery-header" style="background-image:url('<?= $featured[0] ?>')"></div>

<? elseif ($media): ?>

    <div class="owl-carousel-container">
        <ul class="owl-carousel">
            <? foreach ( $media as $image ):
                $src = wp_get_attachment_image_src($image->ID, 'medium');
                $caption = get_post_field('post_excerpt', $image->ID);
            ?>
                <li class="item" >
                    <img src="<?=$src[0] ?>">
                    <? if (!empty($caption)): ?>
                        <span class="caption"><?= $caption ?></span>
                    <? endif ?>
                </li>
            <? endforeach ?>
        </ul>
    </div>

<? endif ?>
