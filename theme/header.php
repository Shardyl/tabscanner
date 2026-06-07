<?php
/**
 * Theme header — Tabscanner
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect x='7' y='4' width='18' height='24' rx='3' fill='%2329B3EB'/%3E%3Cg stroke='white' stroke-width='2' stroke-linecap='round'%3E%3Cline x1='11' y1='10' x2='21' y2='10'/%3E%3Cline x1='11' y1='15' x2='21' y2='15'/%3E%3Cline x1='11' y1='20' x2='17' y2='20'/%3E%3C/g%3E%3C/svg%3E">
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
