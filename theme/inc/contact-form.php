<?php
/**
 * Contact enquiry REST endpoint → wp_mail (api@tabscanner.com).
 * Delivery activates once WP Mail SMTP is configured at go-live.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_action( 'rest_api_init', function () {
	register_rest_route( 'tabscanner/v1', '/enquiry', array(
		'methods'             => 'POST',
		'callback'            => 'tabscanner_handle_enquiry',
		'permission_callback' => '__return_true',
	) );
} );

function tabscanner_handle_enquiry( WP_REST_Request $req ) {
	$p = $req->get_json_params();

	// Honeypot — bots fill hidden "website" field.
	if ( ! empty( $p['website'] ) ) {
		return new WP_REST_Response( array( 'ok' => true ), 200 );
	}

	$name  = sanitize_text_field( $p['name'] ?? '' );
	$email = sanitize_email( $p['email'] ?? '' );
	$msg   = sanitize_textarea_field( $p['message'] ?? '' );

	if ( ! $name || ! $email || ! is_email( $email ) || ! $msg ) {
		return new WP_REST_Response( array( 'ok' => false, 'error' => 'Please complete all fields with a valid email address.' ), 422 );
	}

	$to      = apply_filters( 'tabscanner_enquiry_to', 'api@tabscanner.com' );
	$subject = 'New enquiry from ' . $name . ' — tabscanner.com';
	$body    = "Name: {$name}\nEmail: {$email}\n\n{$msg}";
	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	return new WP_REST_Response( array( 'ok' => (bool) $sent ), $sent ? 200 : 500 );
}
