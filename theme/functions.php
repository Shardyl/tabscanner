<?php
/**
 * Tabscanner theme — functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'TABSCANNER_VERSION', '0.1.0' ); // bump every ship

require_once get_stylesheet_directory() . '/inc/enqueue.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => 'Primary Menu' ) );
} );
