<?php
/**
 * Plugin Name: Tabscanner — 410 Gone (removed posts)
 * Description: Returns HTTP 410 Gone for intentionally-removed blog posts so search engines drop them from the index fast (instead of a soft 404). Slugs are the canonical list of deleted URLs.
 * Version: 1.0.0
 * Author: Sensa Productions
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'template_redirect', function () {
	// Intentionally removed YMYL / outdated posts (deleted 2026-06-22, operator-approved).
	$gone = array(
		'accounting-firms-in-the-uae-are-seeing-a-boom-thanks-to-the-introduction-of-vat',
		'it-pays-to-track-all-your-business-expenses-the-way-to-maximize-profitability',
		'are-you-mtd-ready-heres-four-steps-to-making-tax-digital-including-receipt-capture',
		'claiming-expenses-when-working-from-home-with-a-receipt-parser',
		'considering-starting-a-business-in-dubai-learn-the-three-things-that-no-one-tells-you',
		'using-receipt-scanning-api',
	);

	$path = isset( $_SERVER['REQUEST_URI'] ) ? wp_parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) : '';
	$slug = trim( (string) $path, '/' );

	if ( $slug !== '' && in_array( $slug, $gone, true ) ) {
		status_header( 410 );
		nocache_headers();
		header( 'X-Robots-Tag: noindex', true );
		header( 'Content-Type: text/html; charset=utf-8' );
		echo '<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="robots" content="noindex">'
			. '<title>410 Gone</title></head><body style="font-family:system-ui,Arial,sans-serif;max-width:640px;margin:12vh auto;padding:0 20px;text-align:center">'
			. '<h1 style="font-size:1.6rem">410 &mdash; Gone</h1>'
			. '<p style="color:#555">This article has been permanently removed. Visit the <a href="' . esc_url( home_url( '/' ) ) . '">Tabscanner homepage</a> or the <a href="' . esc_url( home_url( '/news/' ) ) . '">latest articles</a>.</p>'
			. '</body></html>';
		exit;
	}
}, 0 );
