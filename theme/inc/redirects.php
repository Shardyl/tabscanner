<?php
/**
 * 301 redirects preserved from the old site (URLs that 301'd there).
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'template_redirect', function () {
	$map = array(
		'four-pitfalls-to-avoid-when-deploying-robotic-process-automation' => '/scaling-tabscanners-ocr-models-with-multi-gpu-and-tpu-architectures/',
		'how-to-manage-clients-virtually-during-lockdowns-including-using-receipt-reader' => '/artificial-intelligence-breakthrough-in-receipt-line-item-extraction/',
	);
	$path = trim( parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH ), '/' );
	if ( isset( $map[ $path ] ) ) {
		wp_safe_redirect( home_url( $map[ $path ] ), 301 );
		exit;
	}
}, 1 );
