<?php

add_action('init', 'cptui_register_my_cpt_project');

function cptui_register_my_cpt_project() {

  register_post_type('project', array(
    'label' => 'Projects',
    'description' => '',
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'capability_type' => 'post',
    'map_meta_cap' => true,
    'hierarchical' => false,
    'rewrite' => array('slug' => 'project', 'with_front' => true),
    'query_var' => true,
    'has_archive' => true,
    'supports' => array('title'),
    'taxonomies' => array('category'),
    'labels' => array (
      'name' => 'Projects',
      'singular_name' => 'Project',
      'menu_name' => 'Projects',
      'add_new' => 'Add Project',
      'add_new_item' => 'Add New Project',
      'edit' => 'Edit',
      'edit_item' => 'Edit Project',
      'new_item' => 'New Project',
      'view' => 'View Project',
      'view_item' => 'View Project',
      'search_items' => 'Search Projects',
      'not_found' => 'No Projects Found',
      'not_found_in_trash' => 'No Projects Found in Trash',
      'parent' => 'Parent Project',
    )

  ) ); }
