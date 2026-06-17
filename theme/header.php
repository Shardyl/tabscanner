<?php
/**
 * Theme header — Tabscanner
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php /* Favicon is the WordPress Site Icon (attachment set in wp-admin) — emits crawlable <link rel=icon> tags + a real /favicon.ico that Google Search can fetch. Do NOT re-add an inline data: URI here; Google ignores data-URI favicons. */ ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="nav">
  <div class="wrap nav-in">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/tabscanner-logo.png" alt="Tabscanner"></a>
    <div class="nav-menu">
      <nav class="nav-links">
        <a href="<?php echo esc_url(home_url('/tabscanner-case-studies/')); ?>">Use Cases</a>
        <a href="<?php echo esc_url(home_url('/pricing/')); ?>">Pricing</a>
        <a href="<?php echo esc_url(home_url('/')); ?>#demo">Demo</a>
        <a href="<?php echo esc_url(home_url('/contact-us/')); ?>">Contact Us</a>
      </nav>
      <div class="nav-cta">
        <a class="login" href="https://dashboard.tabscanner.com/login">LOGIN</a>
        <a class="btn btn-primary" href="https://dashboard.tabscanner.com/register">Get Started <span class="arr">→</span></a>
      </div>
    </div>
    <button class="burger" aria-label="Menu" aria-expanded="false"><span></span><span></span><span></span></button>
  </div>
</header>
