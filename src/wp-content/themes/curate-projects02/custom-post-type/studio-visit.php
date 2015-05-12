<?php

add_action('init', 'cptui_register_cpt_studio_visit');

function cptui_register_cpt_studio_visit() {

  register_post_type('studio-visit', array(
    'label' => 'Studio',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'visits', 'with_front' => true),
    'query_var' => true,
    'has_archive' => true,
    'supports' => array('title'),
    'taxonomies' => array('category'),
    'labels' => array (
      'name' => 'Studio visits',
      'singular_name' => 'Studio visit',
      'menu_name' => 'Studio visits',
      'add_new' => 'Add Studio visit',
      'add_new_item' => 'Add New Studio visit',
      'edit' => 'Edit',
      'edit_item' => 'Edit Studio visit',
      'new_item' => 'New Studio visit',
      'view' => 'View Studio visit',
      'view_item' => 'View Studio visit',
      'search_items' => 'Search Studio visits',
      'not_found' => 'No Studio visits Found',
      'not_found_in_trash' => 'No Studio visits Found in Trash',
      'parent' => 'Parent Studio visit',
    )

  ) ); }
