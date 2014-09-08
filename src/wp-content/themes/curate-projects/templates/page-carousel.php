<?php
$media = get_attached_media( 'image' );
?>

<? if($media):?>
<div class="owl-carousel-container">
  <ul class="owl-carousel">
  <? foreach ( $media as $image ):
  $src = wp_get_attachment_image_src($image->ID, 'medium'); 
  $caption = get_post_field('post_excerpt', $image->ID); 
?>
    <li class="item" >
      <img src="<?=$src[0] ?>" />
      <? if(!empty($caption)):?>
      <span class="caption"><?= $caption?></span>
      <? endif ?>
    </li>
  <? endforeach ?>
<? endif ?>
  </ul>
</div>
