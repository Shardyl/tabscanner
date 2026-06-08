<?php
/**
 * Live receipt-OCR demo — server-side proxy to the Tabscanner API.
 * The API key is stored in the WP option `tabscanner_demo_api_key` (set via WP-CLI, never in the repo)
 * and is NEVER exposed to the browser. Includes per-IP rate limiting + result gating.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

const TABSCANNER_DEMO_RATE  = 8;   // scans per IP per hour
const TABSCANNER_DEMO_MAXMB = 8;   // max upload size (MB)
const TABSCANNER_DEMO_UA    = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0 Safari/537.36';

function tabscanner_demo_key() { return trim( (string) get_option( 'tabscanner_demo_api_key', '' ) ); }

function tabscanner_demo_ip() {
	foreach ( array( 'HTTP_TRUE_CLIENT_IP', 'HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR' ) as $h ) {
		if ( ! empty( $_SERVER[ $h ] ) ) { $ip = explode( ',', $_SERVER[ $h ] )[0]; return trim( $ip ); }
	}
	return $_SERVER['REMOTE_ADDR'] ?? '0';
}

function tabscanner_demo_under_limit() {
	$k = 'ts_demo_rl_' . md5( tabscanner_demo_ip() );
	$n = (int) get_transient( $k );
	if ( $n >= TABSCANNER_DEMO_RATE ) { return false; }
	set_transient( $k, $n + 1, HOUR_IN_SECONDS );
	return true;
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'tabscanner/v1', '/demo-process', array(
		'methods' => 'POST', 'callback' => 'tabscanner_demo_process', 'permission_callback' => '__return_true',
	) );
	register_rest_route( 'tabscanner/v1', '/demo-result/(?P<token>[A-Za-z0-9]+)', array(
		'methods' => 'GET', 'callback' => 'tabscanner_demo_result', 'permission_callback' => '__return_true',
	) );
} );

// Never let WP Engine / Cloudflare cache the demo endpoints — poll responses must always be fresh.
add_filter( 'rest_post_dispatch', function ( $response, $server, $request ) {
	if ( strpos( (string) $request->get_route(), '/tabscanner/v1/demo' ) === 0 && $response instanceof WP_REST_Response ) {
		$response->header( 'Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0' );
		$response->header( 'Pragma', 'no-cache' );
		$response->header( 'X-Accel-Expires', '0' );
	}
	return $response;
}, 10, 3 );

function tabscanner_demo_process( WP_REST_Request $req ) {
	if ( ! tabscanner_demo_key() ) { return new WP_REST_Response( array( 'success' => false, 'message' => 'Demo is not configured yet.' ), 200 ); }
	if ( ! tabscanner_demo_under_limit() ) { return new WP_REST_Response( array( 'success' => false, 'limited' => true, 'message' => "You've reached the live-demo limit. Create a free account to keep scanning." ), 200 ); }

	if ( empty( $_FILES['file'] ) || ! is_uploaded_file( $_FILES['file']['tmp_name'] ) ) {
		return new WP_REST_Response( array( 'success' => false, 'message' => 'No file received.' ), 200 );
	}
	$f = $_FILES['file'];
	if ( $f['size'] > TABSCANNER_DEMO_MAXMB * 1024 * 1024 ) { return new WP_REST_Response( array( 'success' => false, 'message' => 'File too large (max ' . TABSCANNER_DEMO_MAXMB . 'MB).' ), 200 ); }
	$type = function_exists( 'mime_content_type' ) ? mime_content_type( $f['tmp_name'] ) : $f['type'];
	if ( ! in_array( $type, array( 'image/jpeg', 'image/png' ), true ) ) { return new WP_REST_Response( array( 'success' => false, 'message' => 'Please upload a JPG or PNG.' ), 200 ); }

	$ext  = $type === 'image/png' ? '.png' : '.jpg';
	$file = new CURLFile( $f['tmp_name'], $type, 'receipt' . $ext );
	$ch   = curl_init( 'https://api.tabscanner.com/api/2/process' );
	curl_setopt_array( $ch, array(
		CURLOPT_POST           => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER     => array( 'apikey: ' . tabscanner_demo_key(), 'User-Agent: ' . TABSCANNER_DEMO_UA ),
		CURLOPT_POSTFIELDS     => array( 'file' => $file, 'documentType' => 'receipt' ),
		CURLOPT_TIMEOUT        => 60,
	) );
	$resp = curl_exec( $ch ); $err = curl_error( $ch ); curl_close( $ch );
	if ( $resp === false ) { return new WP_REST_Response( array( 'success' => false, 'message' => 'Upload failed: ' . $err ), 200 ); }
	$data = json_decode( $resp, true );
	return new WP_REST_Response( is_array( $data ) ? $data : array( 'success' => false, 'message' => 'Unexpected response.' ), 200 );
}

function tabscanner_demo_result( WP_REST_Request $req ) {
	if ( ! tabscanner_demo_key() ) { return new WP_REST_Response( array( 'status' => 'failed' ), 200 ); }
	$token = preg_replace( '/[^A-Za-z0-9]/', '', $req['token'] );
	$ch    = curl_init( 'https://api.tabscanner.com/api/result/' . $token );
	curl_setopt_array( $ch, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER     => array( 'apikey: ' . tabscanner_demo_key(), 'User-Agent: ' . TABSCANNER_DEMO_UA ),
		CURLOPT_TIMEOUT        => 60,
	) );
	$resp = curl_exec( $ch ); curl_close( $ch );
	$data = json_decode( $resp, true );
	if ( ! is_array( $data ) ) { return new WP_REST_Response( array( 'status' => 'failed' ), 200 ); }

	if ( ( $data['status'] ?? '' ) === 'done' && ! empty( $data['result'] ) ) {
		$r     = $data['result'];
		$items = isset( $r['lineItems'] ) && is_array( $r['lineItems'] ) ? $r['lineItems'] : array();
		$shown = array();
		foreach ( array_slice( $items, 0, 2 ) as $li ) {
			$shown[] = array( 'descClean' => $li['descClean'] ?? ( $li['desc'] ?? 'Item' ), 'lineTotal' => $li['lineTotal'] ?? null );
		}
		// GATED payload — full breakdown is behind signup
		$out = array(
			'establishment'   => $r['establishment'] ?? null,
			'date'            => $r['date'] ?? null,
			'currency'        => $r['currency'] ?? null,
			'total'           => $r['total'] ?? null,
			'subTotal'        => $r['subTotal'] ?? null,
			'tax'             => $r['tax'] ?? null,
			'totalConfidence' => $r['totalConfidence'] ?? null,
			'lineItems'       => $shown,
			'lineItemCount'   => count( $items ),
			'gated'           => count( $items ) > count( $shown ),
		);
		return new WP_REST_Response( array( 'status' => 'done', 'result' => $out ), 200 );
	}
	return new WP_REST_Response( array( 'status' => $data['status'] ?? 'pending' ), 200 );
}

/* -------- Admin: Settings → Tabscanner Demo (rotate the API key) -------- */
add_action( 'admin_init', function () {
	register_setting( 'tabscanner_demo', 'tabscanner_demo_api_key', array(
		'type'              => 'string',
		'show_in_rest'      => false,
		'sanitize_callback' => function ( $v ) {
			$v = sanitize_text_field( $v );
			return $v !== '' ? $v : (string) get_option( 'tabscanner_demo_api_key', '' ); // empty = keep current
		},
	) );
} );

add_action( 'admin_menu', function () {
	add_options_page( 'Tabscanner Demo', 'Tabscanner Demo', 'manage_options', 'tabscanner-demo', 'tabscanner_demo_settings_page' );
} );

function tabscanner_demo_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) { return; }
	$key    = trim( (string) get_option( 'tabscanner_demo_api_key', '' ) );
	$masked = $key ? ( str_repeat( '•', max( 0, strlen( $key ) - 4 ) ) . substr( $key, -4 ) ) : '— not set —';
	?>
	<div class="wrap">
		<h1>Tabscanner Demo</h1>
		<p>API key for the homepage live receipt-OCR uploader. Stored server-side only — it is never sent to the browser or committed to the repo.</p>
		<p><strong>Current key:</strong> <code><?php echo esc_html( $masked ); ?></code></p>
		<form method="post" action="options.php">
			<?php settings_fields( 'tabscanner_demo' ); ?>
			<table class="form-table"><tr>
				<th scope="row"><label for="ts_demo_key">New API key</label></th>
				<td>
					<input type="password" id="ts_demo_key" name="tabscanner_demo_api_key" value="" class="regular-text" autocomplete="off" placeholder="Paste a new key to rotate">
					<p class="description">Paste a new key to replace the current one. Leave blank to keep the existing key. Rotate this whenever you regenerate the key in your Tabscanner dashboard.</p>
				</td>
			</tr></table>
			<?php submit_button( 'Save key' ); ?>
		</form>
	</div>
	<?php
}
