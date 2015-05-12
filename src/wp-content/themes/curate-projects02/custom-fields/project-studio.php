<?php

if( function_exists('register_field_group') ):

register_field_group(array (
  'key' => 'group_55153e4da3d5b',
  'title' => 'Project',
  'fields' => array (
    array (
      'key' => 'field_55153e5eaa2b9',
      'label' => 'Gallery',
      'name' => 'gallery',
      'prefix' => '',
      'type' => 'gallery',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'preview_size' => 'thumbnail',
      'library' => 'all',
      'min_width' => '',
      'min_height' => '',
      'min_size' => '',
      'max_width' => '',
      'max_height' => '',
      'max_size' => '',
      'mime_types' => '',
    ),
    array (
      'key' => 'field_55153ed8daa61',
      'label' => 'Sub Pages',
      'name' => 'sub_pages',
      'prefix' => '',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array (
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'min' => '',
      'max' => '',
      'layout' => 'table',
      'button_label' => 'Add Sub Page',
      'sub_fields' => array (
        array (
          'key' => 'field_55153ee3daa62',
          'label' => 'Title',
          'name' => 'sub_page_title',
          'prefix' => '',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
          'readonly' => 0,
          'disabled' => 0,
        ),
        array (
          'key' => 'field_55153ef0daa63',
          'label' => 'Content',
          'name' => 'sub_page_content',
          'prefix' => '',
          'type' => 'wysiwyg',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array (
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'tabs' => 'all',
          'toolbar' => 'full',
          'media_upload' => 1,
        ),
      ),
    ),
  ),
  'location' => array (
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'project',
      ),
    ),
    array (
      array (
        'param' => 'post_type',
        'operator' => '==',
        'value' => 'studio-visit',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'seamless',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
));

endif;