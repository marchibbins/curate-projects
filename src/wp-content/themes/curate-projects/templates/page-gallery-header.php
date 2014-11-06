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
                $src = wp_get_attachment_image_src($image->ID, 'large');
                $caption = get_post_field('post_excerpt', $image->ID);
                $ratio = 400/$src[2];
                $width = round($src[1]*$ratio);
            ?>
              <li style="width:<?=$width?>px" class="item">
                  <a href="<?=$src[0]?>" title="<?= $caption?>" rel="lightbox-0">
                    <img src="<?=$src[0] ?>" alt="<?= $caption?>">
                  </a>
                </li>
            <? endforeach ?>
        </ul>
    </div>

<? endif ?>
