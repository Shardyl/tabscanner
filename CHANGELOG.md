# Changelog

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
