<?php
/**
 * Clean up gallery_shortcode()
 *
 * Re-create the [gallery] shortcode and use thumbnails styling from Bootstrap
 * The number of columns must be a factor of 12.
 *
 * @link http://getbootstrap.com/components/#thumbnails
 */
function roots_gallery($attr) {
  $post = get_post();

  static $instance = 0;
  $instance++;

  if (!empty($attr['ids'])) {
    if (empty($attr['orderby'])) {
      $attr['orderby'] = 'post__in';
    }
    $attr['include'] = $attr['ids'];
  }

  $output = apply_filters('post_gallery', '', $attr);

  if ($output != '') {
    return $output;
  }

  if (isset($attr['orderby'])) {
    $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
    if (!$attr['orderby']) {
      unset($attr['orderby']);
    }
  }

  extract(shortcode_atts(array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => '',
    'icontag'    => '',
    'captiontag' => '',
    'columns'    => 4,
    'size'       => '',
    'include'    => '',
    'exclude'    => '',
    'link'       => ''
  ), $attr));

  $id = intval($id);
  $columns = (12 % $columns == 0) ? $columns: 4;
  $grid = sprintf('col-sm-%1$s col-lg-%1$s', 12/$columns);

  if ($order === 'RAND') {
    $orderby = 'none';
  }

  if (!empty($include)) {
    $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

    $attachments = array();
    foreach ($_attachments as $key => $val) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif (!empty($exclude)) {
    $attachments = get_children(array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  } else {
    $attachments = get_children(array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));
  }

  if (empty($attachments)) {
    return '';
  }

  if (is_feed()) {
    $output = "\n";
    foreach ($attachments as $att_id => $attachment) {
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    }
    return $output;
  }

  $unique = (get_query_var('page')) ? $instance . '-p' . get_query_var('page'): $instance;
  $output = '<div id="carousel-' . $id . '" class="gallery gallery-' . $id . '-' . $unique . ' carousel slide" data-ride="carousel">';

  $output .= '<ol class="carousel-indicators">';
  $i = 0;
  foreach ($attachments as $aid => $attachment) {
    $output .= '<li class="' . ($i === 0 ? 'active': '') . '" data-target="#carousel-' . $id . '" data-slide-to="' . $i . '"></li>';
    $i++;
  }
  $output .= '</ol>';

  $output .= '<div class="carousel-inner">';
  $i = 0;
  foreach ($attachments as $aid => $attachment) {
    switch($link) {
      case 'file':
        $image = wp_get_attachment_link($aid, $size, false, false);
        break;
      case 'none':
        $image = wp_get_attachment_image($aid, $size, false, array('class' => ''));
        break;
      default:
        $image = wp_get_attachment_link($aid, $size, true, false);
        break;
    }

    $output .= '<div class="item' . ($i === 0 ? ' active': '') . '">' . $image;

    $materials = get_field('materials', $aid);
    $dimensions = get_field('dimensions', $aid);

    if (trim($attachment->post_title) || trim($attachment->post_excerpt) || trim($attachment->post_content) || trim($materials) || trim($dimensions)) {
      $output .= '<div class="carousel-caption">';
      if (trim($attachment->post_title)) {
        $output .= '<h3>' . wptexturize($attachment->post_title) . '</h3>';
      }
      if (trim($attachment->post_excerpt)) {
        $output .= '<p>' . wptexturize($attachment->post_excerpt) . '</p>';
      }
      if (trim($attachment->post_content)) {
        $output .= '<p>' . wptexturize($attachment->post_content) . '</p>';
      }
      if (trim($materials)) {
        $output .= '<p>' . wptexturize($materials) . '</p>';
      }
      if (trim($dimensions)) {
        $output .= '<p>' . wptexturize($dimensions) . '</p>';
      }
      $output .= '</div>';
    }

    $output .= '</div>';
    $i++;
  }
  $output .= '</div>';

  $output .= '<a class="left carousel-control" href="#carousel-' . $id . '" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>';
  $output .= '<a class="right carousel-control" href="#carousel-' . $id . '" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>';

  $output .= '</div>';

  return $output;
}
if (current_theme_supports('bootstrap-gallery')) {
  remove_shortcode('gallery');
  add_shortcode('gallery', 'roots_gallery');
  add_filter('use_default_gallery_style', '__return_null');
}

/**
 * Add class="thumbnail img-thumbnail" to attachment items
 */
function roots_attachment_link_class($html) {
  $postid = get_the_ID();
  $html = str_replace('<a', '<a class="thumbnail img-thumbnail"', $html);
  return $html;
}
add_filter('wp_get_attachment_link', 'roots_attachment_link_class', 10, 1);
