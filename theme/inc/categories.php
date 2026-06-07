<?php
/**
 * Base-less category archives — the old site served categories at /{slug}/ (no /category/ base).
 * Safe: only the 5 known category slugs get root rewrite rules (not a greedy catch-all).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function tabscanner_root_categories() {
	return array( 'articles', 'technical', 'receipt-ocr-api-answers', 'receipt-ocr-loyalty-rewards', 'case-studies' );
}

add_action( 'init', function () {
	foreach ( tabscanner_root_categories() as $s ) {
		add_rewrite_rule( '^' . $s . '/?$', 'index.php?category_name=' . $s, 'top' );
		add_rewrite_rule( '^' . $s . '/page/([0-9]+)/?$', 'index.php?category_name=' . $s . '&paged=$matches[1]', 'top' );
	}
} );

add_filter( 'category_link', function ( $link, $term_id ) {
	$t = get_term( $term_id, 'category' );
	if ( $t && ! is_wp_error( $t ) && in_array( $t->slug, tabscanner_root_categories(), true ) ) {
		return home_url( '/' . $t->slug . '/' );
	}
	return $link;
}, 10, 2 );
