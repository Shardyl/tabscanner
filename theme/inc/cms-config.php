<?php
/**
 * Sensa CMS — per-site config for the Tabscanner theme.
 *
 * Declares which copy/images are editable from wp-admin (Sensa CMS -> Page Text / Images),
 * read by the sensa-cms plugin via the `sensa_cms_config` filter. Defaults below ARE the
 * current live copy, so the site looks identical until an operator edits a field; clearing
 * a field in the editor restores the default. Templates call sc_text('key') / sc_img('key').
 *
 * @package tabscanner
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

add_filter( 'sensa_cms_config', function () {

	return array(

		// Bespoke (code-template) pages: clean classic editor + on-page Text/Images panels.
		// The front page also gets all fields on the central Sensa CMS -> Page Text screen.
		'bespoke_slugs' => array( 'home', 'contact-us', 'pricing' ),

		// ---- Editable TEXT ----------------------------------------------------
		'text' => array(
			'groups' => array(

				'home_hero' => array(
					'label'  => 'Homepage — Hero',
					'fields' => array(
						array( 'k' => 'home_topbanner', 'l' => 'Top banner strip', 'ta' => 1, 'd' => '1 BILLION RECEIPTS PROCESSED GLOBALLY IN 9 YEARS' ),
						array( 'k' => 'home_hero_h1',   'l' => 'Hero headline (HTML ok)', 'ta' => 1, 'd' => "Receipt OCR <span class='g'>API</span>" ),
						array( 'k' => 'home_hero_lead', 'l' => 'Hero paragraph', 'ta' => 1, 'd' => "Get 99-99.99%+ accurate receipt data extraction at the industry's lowest cost. Reliable at any scale. Our synchronous, low-latency OCR engine offer immediate real-time structured data. Our demo is the only one with a timer so you can see for yourself our industry leading speed." ),
					),
				),

				'home_cta' => array(
					'label'  => 'Homepage — Accuracy CTA band',
					'fields' => array(
						array( 'k' => 'home_cta_eyebrow', 'l' => 'Eyebrow', 'd' => 'Receipt OCR · For teams already at scale' ),
						array( 'k' => 'home_cta_h', 'l' => 'Headline (HTML ok)', 'ta' => 1, 'd' => "Processing receipts at volume,<br><span class='g'>but accuracy is holding you back?</span>" ),
						array( 'k' => 'home_cta_p', 'l' => 'Paragraph', 'ta' => 1, 'd' => "You already have the receipt volume. What's costing you is the accuracy gap nobody else will close: the misreads that pile up at scale, drive manual review, and quietly erode trust in your product. Our team has tuned extraction across more than a billion receipts. Let's get yours to the next level." ),
						array( 'k' => 'home_cta_btn1', 'l' => 'Primary button label', 'd' => 'Book a consultation' ),
						array( 'k' => 'home_cta_btn2', 'l' => 'Secondary button label', 'd' => 'See it on your receipts' ),
					),
				),

				'home_intro' => array(
					'label'  => 'Homepage — Intro section',
					'fields' => array(
						array( 'k' => 'home_intro_eyebrow', 'l' => 'Eyebrow', 'd' => 'Real-Time Receipt OCR' ),
						array( 'k' => 'home_intro_h2', 'l' => 'Heading', 'ta' => 1, 'd' => 'Real-Time Receipt OCR API Engineered to Understand Every Format and Language' ),
						array( 'k' => 'home_intro_p1', 'l' => 'Paragraph 1 (HTML ok)', 'ta' => 1, 'd' => "Extract receipt data from images with <strong>unbeatable security</strong>. Optimizing your budget at a <strong>fraction of the cost</strong>. Trusted by major global enterprises and developers. Tabscanner offers seamless integration, no downtime, plus automated receipt parsing you can truly rely on anywhere in the world." ),
						array( 'k' => 'home_intro_p2', 'l' => 'Paragraph 2 (HTML ok)', 'ta' => 1, 'd' => "Launch loyalty program software and apps backed by our <strong>dedicated customer service team</strong>, committed to your success. Now you can capture all buyer data with the best chance of customer retention. Plus expense management software free from privacy concerns. Built-in <strong>advanced fraud and tamper detection</strong>." ),
					),
				),

				'home_usecases' => array(
					'label'  => 'Homepage — Use Cases section',
					'fields' => array(
						array( 'k' => 'home_uc_eyebrow', 'l' => 'Eyebrow', 'd' => 'Use Cases' ),
						array( 'k' => 'home_uc_h2', 'l' => 'Heading', 'ta' => 1, 'd' => 'From expense management to loyalty rewards' ),
						array( 'k' => 'home_uc_p', 'l' => 'Paragraph', 'ta' => 1, 'd' => 'Tabscanner API led the way with early adoption of concepts like document understanding through AI and contextual field validation. Common use cases include OCR for accounting software, expense management, loyalty programs, delivery, retail and many more. Get in touch if you would like a chat to learn how we can help with your next project.' ),
					),
				),

			),
			// Map the front-page slug to the hero group (on-page panel convenience).
			'slug_groups'   => array( 'home' => 'home_hero' ),
			'slug_prefixes' => array(),
		),

		// ---- Editable IMAGES --------------------------------------------------
		// The homepage hero is a generated neural canvas (no swappable raster image),
		// and section icons are inline SVG, so there are no single-image fields here yet.
		'images' => array(
			'groups'      => array(),
			'slug_groups' => array(),
		),

		// ---- GALLERIES --------------------------------------------------------
		'galleries' => array(
			'video' => array(),
			'photo' => array(),
		),
	);
} );
