<?php
/**
 * Enqueue Tabscanner assets + dequeue Kadence defaults (fully custom design).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'wp_enqueue_scripts', function () {
	$v   = defined( 'TABSCANNER_VERSION' ) ? TABSCANNER_VERSION : '0.1.0';
	$uri = get_stylesheet_directory_uri();

	// Fonts
	wp_enqueue_style(
		'tabscanner-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;450;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap',
		array(),
		null
	);

	// Design system
	wp_enqueue_style( 'tabscanner-app', $uri . '/assets/css/app.css', array(), $v );

	// Interactions (footer)
	wp_enqueue_script( 'tabscanner-app', $uri . '/assets/js/app.js', array(), $v, true );
}, 20 );

// Strip Kadence/Genesis global styles — Tabscanner ships its own complete design.
add_action( 'wp_enqueue_scripts', function () {
	foreach ( array( 'kadence-global', 'kadence-header', 'kadence-content', 'kadence-footer', 'kadence-rtl', 'global-styles' ) as $h ) {
		wp_dequeue_style( $h );
	}
}, 100 );
