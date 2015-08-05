<?php

require_once 'custom-fields/project-studio.php';
require_once 'custom-post-type/project.php';
require_once 'custom-post-type/studio-visit.php';

if ( ! class_exists( 'Timber' ) ) {
  function admin_notices() {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
  }
	add_action( 'admin_notices', admin_notices );
	return;
}

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
    add_filter( 'nav_menu_css_class', array($this, 'archive_nav_class'), 10, 2 );
		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu('Primary Navigation');
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}

  function archive_nav_class( $classes, $item ) {

    if ( $item->type = 'post_type_archive' && is_post_type_archive($item->object)) {
      $item->current = true;
    }

    return $classes;

  }


}

new StarterSite();

function myfoo( $text ) {
	$text .= ' bar!';
	return $text;
}

add_filter('show_admin_bar', '__return_false');
