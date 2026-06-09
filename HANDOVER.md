# Tabscanner — living status

## Where we are — LIVE (cutover 2026-06-08)
- **Live at https://tabscanner.com**, secure + indexable (`blog_public=1`). Theme `tabscanner` v0.5.5.
- **DNS/SSL: stays PROXIED through Cloudflare (operator-locked 2026-06-09).** Cloudflare serves the SSL
  (`CN=tabscanner.com`, Let's Encrypt) and fronts the WPE origin. WP Engine portal permanently shows
  "DNS not pointed" / SSL `-` for tabscanner.com — **expected/cosmetic, not a bug** (see CLAUDE.md →
  "Live / DNS / SSL" for the full rationale + the bypass procedure if ever wanted). DNS managed by Ben (CTO).
- Sensa CMS wired (homepage + 6 inner pages, ~94 fields); WP Mail SMTP delivering; comments disabled;
  demo uploader = full results + processing-only timer; hero CTA = "Book a consultation".
- Full 165-URL parity verified pre-cutover; media + meta fully migrated.

## Done
- [x] Repo scaffold (theme, deploy.yml, docs, .gitignore)
- [x] v4 homepage → `front-page.php` + `app.css` + `app.js`
- [x] Kadence parent installed, `blog_public=0` set
- [x] `WPE_SSH_KEY_B64` secret on `Shardyl/tabscanner`

## Shipped (live on temp URL, noindexed)
- [x] Homepage `front-page.php` (v0.1.0) + theme active
- [x] Mobile overflow fixed (v0.1.2: nav burger drawer, `min-width:0`, overflow-x lock)
- [x] Contact + 4 Use Cases (v0.2.0): `/contact-us/`, `/loyalty-program-receipt-scanning/`,
      `/ocr-expense-management/`, `/market-research-through-receipt-ocr/`, `/tabscanner-case-studies/`
      — all 200, word-for-word, contact form REST endpoint working
- [x] Permalinks `/%postname%/`; pages #5–9

## Shipped (cont.)
- [x] Generic templates (v0.3.0): `single.php`, `page.php`, `archive.php`, `search.php`, `page-news.php`,
      `page-pricing.php` + `.prose` styles
- [x] Pricing + News pages live
- [x] **Content port:** 150 items imported at exact slugs (10 pages + 140 posts) from `_scrape/import.json`
      — 141 posts / 18 pages total; content cleaned (sidebars/chrome/inline-styles stripped),
      dates preserved (future clamped). Default Hello-World / Sample-Page stubs removed.

- [x] **Full URL parity: 165/165** — 5 categories created + assigned (base-less rewrites in
      `inc/categories.php`), 2 old 301-redirects preserved (`inc/redirects.php`)

## Next
- [ ] **Media import** is now the top blocker for go-live (see below)
- [ ] **Media import** — imported post images currently reference absolute `tabscanner.com/...` URLs;
      run `wp media import` + URL rewrite BEFORE go-live (else they break when DNS cuts over)
- [ ] Enhance About / Company Overview / FAQ pages (imported as prose; optional bespoke upgrade)
- [ ] Audit fixes: right-size titles, security headers, lazy-load/WebP
- [ ] Plugins: Rank Math (+ wizard, sitemap), WP Mail SMTP (operator pastes `api@tabscanner.com` app pw)
- [ ] Lighthouse pass; final URL-parity confirm
- [ ] Go-live (operator DNS + flip `blog_public=1` + submit sitemap)

## Operator (you) to-dos
- [ ] At go-live: DNS cutover (web records → WPE, leave email records), set primary in WPE portal, SSL
- [ ] Paste the (regenerated) `api@tabscanner.com` app password into wp-admin → WP Mail SMTP
- [ ] Approve flip to `blog_public=1` + submit sitemap to Google Search Console
