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
		'bespoke_slugs' => array( 'home', 'contact-us', 'pricing', 'loyalty-program-receipt-scanning', 'market-research-through-receipt-ocr', 'ocr-expense-management', 'tabscanner-case-studies' ),

		// ---- Editable TEXT ----------------------------------------------------
		'text' => array(
			'groups' => array(

				'home_hero' => array(
					'label'  => 'Homepage — Hero',
					'fields' => array(
						array( 'k' => 'home_topbanner', 'l' => 'Top banner strip', 'ta' => 1, 'd' => '1 BILLION RECEIPTS PROCESSED GLOBALLY IN 9 YEARS' ),
						array( 'k' => 'home_hero_h1',   'l' => 'Hero headline (HTML ok)', 'ta' => 1, 'd' => "Receipt OCR <span class='g'>API</span>" ),
						array( 'k' => 'home_hero_lead', 'l' => 'Hero paragraph', 'ta' => 1, 'd' => "Get 99-99.99%+ accurate receipt data extraction at the industry's lowest cost. Reliable at any scale. Our synchronous, low-latency OCR engine offer immediate real-time structured data. Our demo is the only one with a timer so you can see for yourself our industry leading speed." ),
						array( 'k' => 'home_hero_btn', 'l' => 'Hero button label', 'd' => 'Book a consultation' ),
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

				'home_sections' => array(
					'label'  => 'Homepage — Section headings & CTAs',
					'fields' => array(
						array( 'k' => 'acc_eyebrow', 'l' => 'Accuracy: eyebrow', 'd' => 'Receipt Extraction with Advanced AI-Driven OCR' ),
						array( 'k' => 'acc_h2', 'l' => 'Accuracy: heading', 'ta' => 1, 'd' => 'The Only Receipt Parser API with 99.99% Accuracy' ),
						array( 'k' => 'cmp_eyebrow', 'l' => 'Comparison: eyebrow', 'd' => 'Receipt OCR API Comparisons' ),
						array( 'k' => 'cmp_h2', 'l' => 'Comparison: heading', 'ta' => 1, 'd' => 'Receipt OCR API Comparisons' ),
						array( 'k' => 'cmp_p', 'l' => 'Comparison: sub-line', 'ta' => 1, 'd' => 'The chart above compares speed and accuracy claims by the 4 most visible specialists.' ),
						array( 'k' => 'price_eyebrow', 'l' => 'Pricing: eyebrow', 'd' => 'Ultra Fast Receipt Reader API' ),
						array( 'k' => 'price_h2', 'l' => 'Pricing: heading', 'd' => 'Monthly Plans' ),
						array( 'k' => 'price_sub', 'l' => 'Pricing: sub-line', 'ta' => 1, 'd' => '1 credit = 1 receipt scan. No credit card required for starter plan.' ),
						array( 'k' => 'api_eyebrow', 'l' => 'API section: eyebrow', 'd' => 'Receipt Parsing API' ),
						array( 'k' => 'api_h2', 'l' => 'API section: heading', 'd' => 'Complex AI Simple API' ),
						array( 'k' => 'kf_eyebrow', 'l' => 'Key features: eyebrow', 'd' => 'Why Tabscanner' ),
						array( 'k' => 'kf_h2', 'l' => 'Key features: heading', 'ta' => 1, 'd' => 'Key Features of the Tabscanner Receipt OCR Software' ),
						array( 'k' => 'midcta_h2', 'l' => 'Mid CTA: heading', 'ta' => 1, 'd' => "Ready to power up your software with Tabscanner's Receipt API?" ),
						array( 'k' => 'midcta_h3', 'l' => 'Mid CTA: sub-heading', 'ta' => 1, 'd' => 'Plug into our receipt scanner OCR and get your software up and running with the most advanced IDP API.' ),
						array( 'k' => 'midcta_btn', 'l' => 'Mid CTA: button label', 'd' => 'TEST DRIVE THE UPLOADER' ),
						array( 'k' => 'insights_eyebrow', 'l' => 'Insights: eyebrow', 'd' => 'Advanced AI OCR' ),
						array( 'k' => 'insights_h2', 'l' => 'Insights: heading', 'ta' => 1, 'd' => 'Receipt Scanner API Insights' ),
						array( 'k' => 'insights_p', 'l' => 'Insights: sub-line', 'ta' => 1, 'd' => 'Resources for the Tabscanner API. Delve deeper into our AI OCR development. Layout-aware pipeline and receipt understanding. Plus tutorials for different code languages. How we guarantee real time processing. Why a POS receipts specialist is ideal for supermarket CPG brands.' ),
						array( 'k' => 'reviews_eyebrow', 'l' => 'Testimonials: eyebrow', 'd' => 'Tabscanner Reviews' ),
						array( 'k' => 'reviews_h2', 'l' => 'Testimonials: heading', 'ta' => 1, 'd' => 'What our customers have to say about the Tabscanner API' ),
						array( 'k' => 'contact_eyebrow', 'l' => 'Contact: eyebrow', 'd' => "Let's Chat" ),
						array( 'k' => 'contact_h2', 'l' => 'Contact: heading', 'd' => "Let's Chat" ),
						array( 'k' => 'contact_p', 'l' => 'Contact: paragraph', 'ta' => 1, 'd' => 'Just send a message or call, and we will be happy to set up a meeting to answer any questions or concerns. Our team will get back to you quickly.' ),
						array( 'k' => 'faq_eyebrow', 'l' => 'FAQ: eyebrow', 'd' => 'What Is Receipt OCR' ),
						array( 'k' => 'faq_h2', 'l' => 'FAQ: heading', 'ta' => 1, 'd' => 'WHAT IS RECEIPT OCR (Optical Character Recognition)?' ),
						array( 'k' => 'final_eyebrow', 'l' => 'Final CTA: eyebrow', 'd' => 'Instant Demo' ),
						array( 'k' => 'final_h2', 'l' => 'Final CTA: heading', 'ta' => 1, 'd' => 'Instant Demo of the Tabscanner Receipt OCR API' ),
						array( 'k' => 'final_p', 'l' => 'Final CTA: paragraph', 'ta' => 1, 'd' => 'Free to use now, no credit card required. Start extracting receipt data from day 1.' ),
						array( 'k' => 'final_btn1', 'l' => 'Final CTA: primary button', 'd' => 'RUN LIVE SPEED TEST' ),
						array( 'k' => 'final_btn2', 'l' => 'Final CTA: secondary button', 'd' => 'Schedule A Chat' ),
					),
				),

				'home_about' => array(
					'label'  => 'Homepage — About Tabscanner',
					'fields' => array(
						array( 'k' => 'about_eyebrow', 'l' => 'Eyebrow', 'd' => 'About Tabscanner' ),
						array( 'k' => 'about_h3', 'l' => 'Heading', 'd' => 'About Tabscanner' ),
						array( 'k' => 'about_service_area', 'l' => 'Service Area', 'd' => 'Worldwide' ),
						array( 'k' => 'about_locations', 'l' => 'Business Locations', 'ta' => 1, 'd' => 'HQ in Dubai. Offices in Texas and Tokyo.' ),
						array( 'k' => 'about_founded', 'l' => 'Founded Date', 'd' => '1 December 2016.' ),
						array( 'k' => 'about_specialist', 'l' => 'Specialist in', 'ta' => 1, 'd' => 'AI-powered Receipt OCR to automate expense data extraction and eliminate data entry.' ),
						array( 'k' => 'about_product', 'l' => 'Main Product', 'ta' => 1, 'd' => 'Receipt Parsing API & IDP: Convert receipt images into structured JSON data instantly.' ),
						array( 'k' => 'about_top_uses', 'l' => 'Top Uses', 'ta' => 1, 'd' => 'Loyalty Program Software, Expense Management Software.' ),
						array( 'k' => 'about_requests', 'l' => 'API requests', 'd' => 'Over 1 billion.' ),
						array( 'k' => 'about_accuracy', 'l' => 'Parsing Accuracy', 'd' => '99+% as standard. Upgradeable to 99.99%' ),
						array( 'k' => 'about_speed', 'l' => 'Processing Speed', 'd' => 'Sub-second, 90% under 2 seconds.' ),
						array( 'k' => 'about_founders', 'l' => 'Founders', 'd' => 'Rashad Al-safar and Ben Smith.' ),
						array( 'k' => 'about_categories', 'l' => 'Business categories', 'ta' => 1, 'd' => 'Optical Character Recognition (OCR) Software. Intelligent Document Processing (IDP). Application Programming Interface (API).' ),
					),
				),

				'page_contact' => array(
					'label'  => 'Page — Contact Us',
					'fields' => array(
						array( 'k' => 'contactpg_eyebrow', 'l' => 'Hero eyebrow', 'd' => 'Contact' ),
						array( 'k' => 'contactpg_h1', 'l' => 'Hero headline (HTML ok)', 'ta' => 1, 'd' => "Contact <span class='g'>Tabscanner</span>" ),
						array( 'k' => 'contactpg_lead', 'l' => 'Hero paragraph', 'ta' => 1, 'd' => 'Just send a message or call, and we will be happy to set up a meeting to answer any questions or concerns. Our team will get back to you quickly.' ),
						array( 'k' => 'contactpg_offices_eyebrow', 'l' => 'Offices: eyebrow', 'd' => 'Our Offices' ),
						array( 'k' => 'contactpg_offices_h2', 'l' => 'Offices: heading', 'd' => 'Talk to the team' ),
						array( 'k' => 'contactpg_hq_h4', 'l' => 'HQ: label', 'd' => 'Headquarters — Dubai' ),
						array( 'k' => 'contactpg_hq_p', 'l' => 'HQ: address (HTML ok)', 'ta' => 1, 'd' => 'P316 The Binary Tower, 32 Marasi Drive, Business Bay, Dubai, United Arab Emirates<br>Tel: +971 4 5786 254 — Available 9:00 a.m. – 5:00 p.m. GST' ),
						array( 'k' => 'contactpg_usa_h4', 'l' => 'USA office: label', 'd' => 'USA Office — Austin' ),
						array( 'k' => 'contactpg_usa_p', 'l' => 'USA office: address', 'ta' => 1, 'd' => '3300 Bee Cave Rd, Suite 650 #1202, Austin, TX 78746, United States' ),
					),
				),

				'page_pricing' => array(
					'label'  => 'Page — Pricing',
					'fields' => array(
						array( 'k' => 'pricepg_eyebrow', 'l' => 'Hero eyebrow', 'd' => 'Pricing' ),
						array( 'k' => 'pricepg_h1', 'l' => 'Hero headline (HTML ok)', 'ta' => 1, 'd' => "Simple <span class='g'>Monthly Plans</span>" ),
						array( 'k' => 'pricepg_lead', 'l' => 'Hero paragraph', 'ta' => 1, 'd' => '1 credit = 1 receipt scan. No credit card required for starter plan.' ),
						array( 'k' => 'pricepg_note', 'l' => 'Footnote under plans', 'ta' => 1, 'd' => 'Our enterprise plans are far less expensive than competitors like Amazon and Veryfi, at a fraction of a cent depending on volume.' ),
						array( 'k' => 'pricepg_midcta_h2', 'l' => 'Closing CTA: heading', 'ta' => 1, 'd' => 'Free to use now' ),
						array( 'k' => 'pricepg_midcta_h3', 'l' => 'Closing CTA: sub-heading', 'ta' => 1, 'd' => 'Start extracting receipt data from day 1. No credit card required for the starter plan.' ),
					),
				),

				'page_usecases' => array(
					'label'  => 'Pages — Use Cases (Loyalty / Market Research / Expense / Case Studies)',
					'fields' => array(
						// Loyalty Rewards
						array( 'k' => 'loy_eyebrow', 'l' => 'Loyalty: hero eyebrow', 'd' => 'Loyalty Rewards' ),
						array( 'k' => 'loy_h1', 'l' => 'Loyalty: hero headline (HTML ok)', 'ta' => 1, 'd' => "Receipt Processing API for <span class='g'>Loyalty Rewards</span>" ),
						array( 'k' => 'loy_lead', 'l' => 'Loyalty: hero paragraph', 'ta' => 1, 'd' => 'Add first party data collection to your loyalty program. Existing customers upload a simple image of their receipt for proof of purchase validation. Our receipt processing API is developer-friendly, the most accurate, and reads all formats.' ),
						array( 'k' => 'loy_midcta_h2', 'l' => 'Loyalty: closing CTA heading', 'ta' => 1, 'd' => 'Ready to raise engagement in your loyalty program with Tabscanner?' ),
						array( 'k' => 'loy_midcta_h3', 'l' => 'Loyalty: closing CTA sub-heading', 'ta' => 1, 'd' => 'Plug into our automated receipt clearing API. To get your business software up and running with a faster and more reliable solution. Always secure and scaleable. Proven AI-powered accuracy.' ),
						// Market Research
						array( 'k' => 'mr_eyebrow', 'l' => 'Market Research: hero eyebrow', 'd' => 'Market Research' ),
						array( 'k' => 'mr_h1', 'l' => 'Market Research: hero headline (HTML ok)', 'ta' => 1, 'd' => "Market Research Through <span class='g'>Receipt OCR</span>" ),
						array( 'k' => 'mr_lead', 'l' => 'Market Research: hero paragraph', 'ta' => 1, 'd' => 'A fast and accurate AI trained to understand and extract labelled data from receipt images. Sign up and get 200 credits a month completely free!' ),
						array( 'k' => 'mr_midcta_h2', 'l' => 'Market Research: closing CTA heading', 'ta' => 1, 'd' => 'Ready to start gathering insights with Tabscanner?' ),
						array( 'k' => 'mr_midcta_h3', 'l' => 'Market Research: closing CTA sub-heading', 'ta' => 1, 'd' => 'Plug into our API and get your software up and running with a fast, accurate and reliable solution.' ),
						// Expense Management
						array( 'k' => 'exp_eyebrow', 'l' => 'Expense: hero eyebrow', 'd' => 'Expense Management' ),
						array( 'k' => 'exp_h1', 'l' => 'Expense: hero headline (HTML ok)', 'ta' => 1, 'd' => "Expense Management with <span class='g'>OCR Technology</span>" ),
						array( 'k' => 'exp_lead', 'l' => 'Expense: hero paragraph', 'ta' => 1, 'd' => 'Integrate the most accurate receipt OCR API into your expense management software. Allowing users to upload and extract receipt and invoice data. Supports all languages. Reliable cloud based data extraction in real time.' ),
						array( 'k' => 'exp_midcta_h2', 'l' => 'Expense: closing CTA heading', 'ta' => 1, 'd' => 'Ready to power up your business expense software with Tabscanner?' ),
						array( 'k' => 'exp_midcta_h3', 'l' => 'Expense: closing CTA sub-heading', 'ta' => 1, 'd' => 'Plug into our API and get your accounting software up and running with a fast, accurate and reliable solution.' ),
						// Case Studies
						array( 'k' => 'cs_eyebrow', 'l' => 'Case Studies: hero eyebrow', 'd' => 'Case Studies' ),
						array( 'k' => 'cs_h1', 'l' => 'Case Studies: hero headline (HTML ok)', 'ta' => 1, 'd' => "Tabscanner <span class='g'>Case Studies</span>" ),
						array( 'k' => 'cs_lead', 'l' => 'Case Studies: hero paragraph', 'ta' => 1, 'd' => "Insight into the power of the world's number 1 receipt parsing API. Information extraction from receipts using machine learning and deep learning AI. Faster, more accurate and better value than alternatives." ),
						array( 'k' => 'cs_final_eyebrow', 'l' => 'Case Studies: closing eyebrow', 'd' => 'Get Started' ),
						array( 'k' => 'cs_final_h2', 'l' => 'Case Studies: closing heading', 'ta' => 1, 'd' => 'Power your app with the most accurate Receipt OCR API' ),
						array( 'k' => 'cs_final_p', 'l' => 'Case Studies: closing paragraph', 'ta' => 1, 'd' => 'Sign in with Google or sign up with email. No credit card is needed. It is quick and easy.' ),
					),
				),

			),
			// On-page panel convenience: map each bespoke page slug to its fields.
			'slug_groups'   => array(
				'home'       => 'home_hero',
				'contact-us' => 'page_contact',
				'pricing'    => 'page_pricing',
			),
			'slug_prefixes' => array(
				'loyalty-program-receipt-scanning'    => 'loy_',
				'market-research-through-receipt-ocr' => 'mr_',
				'ocr-expense-management'              => 'exp_',
				'tabscanner-case-studies'             => 'cs_',
			),
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
