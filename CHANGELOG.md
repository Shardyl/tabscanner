# Changelog

## 0.6.7 — 2026-08-14
- Author box site-wide (Mat's list): `post_author` → Ben (user 4) on all 137 published posts (was 0 on
  134 — migration artifact that also broke the Rank Math Person schema). Headshot meta → gravatar
  (`1.gravatar.com/avatar/c944f942…?s=160`). Done via SQL/WP-CLI so no modified dates moved.
- `single.php`: byline shows "Updated <date>" when modified >48h after publish (visible date only —
  Rank Math already emits `dateModified` schema, no second schema source added); LinkedIn/GitHub
  author links removed from the author box (meta values kept).
- Content cleanup across 135 posts via direct-`$wpdb` eval-file (post_modified untouched, verified
  byte-identical): stale in-content "Last Updated on …" lines (133), embedded end-of-post author
  img+blurb in 4 variants incl. escaped sab boxes + empty tokyoben social anchors (6 posts) and the
  Cortex-styled author cards on 636/648 (byline de-linked to plain text), old
  "CLICK HERE TO START USING TABSCANNER API" CTAs (134, incl. `/#Uploader` + bare-anchor variants).
- Full pre-change snapshot: `cortex:/opt/cortex-knowledge/backups/tabscanner-posts-pre-authorbox-2026-08-14.json`.

## 0.2.0 — 2026-06-07
- Build Contact + 4 Use Case pages (Loyalty, Expense Management, Market Research, Case Studies) in the
  v4 style, word-for-word from the scrape. Templates: `page-{slug}.php` (auto-matched to page slugs).
- Add interior page hero (`.phero`) + contact form REST endpoint (`tabscanner/v1/enquiry` → wp_mail
  to api@tabscanner.com, honeypot + validation).
- Wire footer links to the real use-case / contact / case-study URLs.

## 0.1.2 — 2026-06-07
- Fix the real mobile-overflow root cause: `min-width:0` on hero/dev/compare/contact grid items
  and the scanner card children, so the `.json` block's intrinsic width no longer forces the grid
  column (and the H1) wider than the viewport. Verified: scrollWidth == viewport at 375px.

## 0.1.1 — 2026-06-07
- Fix mobile horizontal overflow: nav collapses Login + Get Started into the burger drawer
  (`.nav-menu` display:contents → drawer), lock `html/body` overflow-x, shrink hero H1 on mobile.

## 0.1.0 — 2026-06-07
- Initial scaffold: Kadence child theme `tabscanner` carrying the locked v4 design.
- Homepage (`front-page.php`) built word-for-word from the live site, redesigned (AI/SaaS, Tabscanner blue).
- Design system in `assets/css/app.css` + `assets/js/app.js` (neural hero, detection card, counters, tabs, FAQ).
- GitHub Actions rsync deploy to WP Engine install `tabscanner`.
- mu-plugins placeholder; legal/blog/use-case pages to follow.

## 0.4.0 — 2026-06-07
- Live receipt-OCR uploader embedded in the hero (replaces the static scan card). Real Tabscanner API
  via a server-side REST proxy (`tabscanner/v1/demo-process` + `demo-result/{token}`); API key stored
  in the `tabscanner_demo_api_key` WP option (never in repo / never sent to the browser). Per-IP rate
  limit (8/hr), file validation, and result gating (total + 2 line-items, full breakdown behind signup).
