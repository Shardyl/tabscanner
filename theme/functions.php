<?php
/**
 * Tabscanner theme — functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'TABSCANNER_VERSION', '0.3.3' ); // bump every ship

require_once get_stylesheet_directory() . '/inc/enqueue.php';
require_once get_stylesheet_directory() . '/inc/contact-form.php';
require_once get_stylesheet_directory() . '/inc/redirects.php';
require_once get_stylesheet_directory() . '/inc/categories.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => 'Primary Menu' ) );
} );
