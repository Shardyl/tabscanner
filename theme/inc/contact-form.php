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

if ( ! function_exists( 'tabscanner_client_ip' ) ) {
	function tabscanner_client_ip() {
		foreach ( array( 'HTTP_TRUE_CLIENT_IP', 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR' ) as $h ) {
			if ( ! empty( $_SERVER[ $h ] ) ) { return trim( explode( ',', $_SERVER[ $h ] )[0] ); }
		}
		return $_SERVER['REMOTE_ADDR'] ?? '0';
	}
}

// Backstop: max 6 enquiries per IP per hour.
function tabscanner_enquiry_under_limit() {
	$k = 'ts_enq_rl_' . md5( tabscanner_client_ip() );
	$n = (int) get_transient( $k );
	if ( $n >= 6 ) { return false; }
	set_transient( $k, $n + 1, HOUR_IN_SECONDS );
	return true;
}

// Cloudflare Turnstile — only enforced once a secret key is set in Settings → Tabscanner.
function tabscanner_enquiry_turnstile_ok( $token ) {
	$secret = trim( (string) get_option( 'tabscanner_turnstile_secret', '' ) );
	if ( '' === $secret ) { return true; }   // not configured → skip
	if ( '' === $token )  { return false; }
	$r = wp_remote_post( 'https://challenges.cloudflare.com/turnstile/v0/siteverify', array(
		'timeout' => 10,
		'body'    => array( 'secret' => $secret, 'response' => $token, 'remoteip' => tabscanner_client_ip() ),
	) );
	if ( is_wp_error( $r ) ) { return true; }  // network hiccup → don't block real users
	$d = json_decode( wp_remote_retrieve_body( $r ), true );
	return ! empty( $d['success'] );
}

function tabscanner_handle_enquiry( WP_REST_Request $req ) {
	$p = $req->get_json_params();

	// Honeypot — bots fill hidden "website" field. Silently "succeed" so they don't probe.
	if ( ! empty( $p['website'] ) ) {
		return new WP_REST_Response( array( 'ok' => true ), 200 );
	}

	// Proof the page's JS ran and this wasn't an instant/direct bot POST (also silent).
	$js = isset( $p['js'] ) ? (string) $p['js'] : '';
	$et = isset( $p['et'] ) ? (int) $p['et'] : 0;
	if ( 'ts1' !== $js || $et < 2500 ) {
		return new WP_REST_Response( array( 'ok' => true ), 200 );
	}

	// Per-IP flood limit.
	if ( ! tabscanner_enquiry_under_limit() ) {
		return new WP_REST_Response( array( 'ok' => false, 'error' => 'Too many messages from your network just now. Please email api@tabscanner.com.' ), 429 );
	}

	// Cloudflare Turnstile (dormant until keys are configured).
	if ( ! tabscanner_enquiry_turnstile_ok( isset( $p['turnstile'] ) ? (string) $p['turnstile'] : '' ) ) {
		return new WP_REST_Response( array( 'ok' => false, 'error' => 'Spam check failed — please try again.' ), 403 );
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
