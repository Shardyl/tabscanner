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

	// Live hero uploader — homepage + localised landing pages. Talks to the server-side proxy.
	$is_fr = is_page( 'fr' );
	$is_de = is_page( 'de' );
	if ( is_front_page() || $is_fr || $is_de ) {
		wp_enqueue_script( 'tabscanner-uploader', $uri . '/assets/js/uploader.js', array(), $v, true );
		$loc = array(
			'base'     => esc_url_raw( rest_url( 'tabscanner/v1/' ) ),
			'register' => 'https://dashboard.tabscanner.com/register',
		);
		if ( $is_fr ) {
			$loc['t'] = array(
				'optimising' => "Optimisation de l'image…",
				'uploading'  => 'Envoi…',
				'reading'    => 'Lecture du ticket par IA…',
				'parsed'     => 'Analysé',
				'err_upload' => "Échec de l'envoi.",
				'err_read'   => 'Lecture impossible. Essayez une photo plus nette et bien cadrée.',
				'err_slow'   => 'Ce ticket prend un temps inhabituel. Réessayez ou contactez-nous.',
				'err_generic'=> 'Une erreur est survenue.',
				'err_filetype'=> 'Veuillez choisir un fichier JPG ou PNG.',
				't_upload'   => 'Envoi',
				't_proc'     => 'Traitement',
				'sending'    => 'Envoi…',
				'sent'       => 'Merci, votre message a bien été envoyé. Nous vous recontactons rapidement.',
				'send_err'   => 'Désolé, une erreur est survenue. Écrivez-nous à api@tabscanner.com.',
			);
		}
	}
}, 20 );

// Strip Kadence/Genesis global styles — Tabscanner ships its own complete design.
add_action( 'wp_enqueue_scripts', function () {
	foreach ( array( 'kadence-global', 'kadence-header', 'kadence-content', 'kadence-footer', 'kadence-rtl', 'global-styles' ) as $h ) {
		wp_dequeue_style( $h );
	}
}, 100 );
