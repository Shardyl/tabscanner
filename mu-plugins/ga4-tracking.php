<?php
/**
 * Plugin Name: GA4 Tracking (Sensa SEO)
 * Description: Injects the Google Analytics 4 gtag on every front-end page.
 * Version: 1.0.0
 *
 * Deploy as a must-use plugin: copy to the site's mu-plugins/ folder and set GA4_MEASUREMENT_ID.
 * One per site. Survives theme updates. Admins are excluded so internal visits don't skew data.
 */
if (!defined('ABSPATH')) {
    exit;
}

// >>> Set this per site (the property's Web data stream Measurement ID, format G-HF2H4PDB7W) <<<
if (!defined('GA4_MEASUREMENT_ID')) {
    define('GA4_MEASUREMENT_ID', 'G-HF2H4PDB7W');
}

add_action('wp_head', function () {
    $id = GA4_MEASUREMENT_ID;
    if (!$id || strpos($id, 'G-') !== 0) {
        return; // not configured yet
    }
    // Don't track logged-in administrators (keeps internal traffic out of reports).
    if (is_user_logged_in() && current_user_can('manage_options')) {
        return;
    }
    ?>
<!-- Google Analytics 4 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($id); ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', '<?php echo esc_js($id); ?>');
</script>
<!-- End GA4 -->
    <?php
}, 20);
