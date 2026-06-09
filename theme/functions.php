<?php
/**
 * Tabscanner theme — functions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'TABSCANNER_VERSION', '0.5.5' ); // bump every ship

require_once get_stylesheet_directory() . '/inc/enqueue.php';
require_once get_stylesheet_directory() . '/inc/contact-form.php';
require_once get_stylesheet_directory() . '/inc/redirects.php';
require_once get_stylesheet_directory() . '/inc/categories.php';
require_once get_stylesheet_directory() . '/inc/demo-uploader.php';
require_once get_stylesheet_directory() . '/inc/cms-config.php';

/**
 * Fallback helpers — if the Sensa CMS plugin is ever inactive, templates still render the
 * original copy (the config defaults) instead of fataling. The plugin loads before the theme,
 * so when it IS active these definitions are skipped and its real helpers are used.
 */
if ( ! function_exists( 'sc_text' ) ) {
	function sc_text( $key ) {
		$cfg = apply_filters( 'sensa_cms_config', array() );
		if ( ! empty( $cfg['text']['groups'] ) ) {
			foreach ( $cfg['text']['groups'] as $g ) {
				if ( empty( $g['fields'] ) ) { continue; }
				foreach ( $g['fields'] as $f ) { if ( isset( $f['k'] ) && $f['k'] === $key ) { return $f['d']; } }
			}
		}
		return '';
	}
}
if ( ! function_exists( 'sc_img' ) ) {
	function sc_img( $key ) {
		$cfg = apply_filters( 'sensa_cms_config', array() );
		if ( ! empty( $cfg['images']['groups'] ) ) {
			foreach ( $cfg['images']['groups'] as $g ) {
				if ( empty( $g['fields'] ) ) { continue; }
				foreach ( $g['fields'] as $f ) { if ( isset( $f['k'] ) && $f['k'] === $key ) { return $f['d']; } }
			}
		}
		return '';
	}
}

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	register_nav_menus( array( 'primary' => 'Primary Menu' ) );
} );
