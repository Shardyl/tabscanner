# Tabscanner — living status

## Where we are
- WP Engine install `tabscanner` live on temp URL `tabscanner.wpenginepowered.com`, **noindexed**
  (`blog_public=0`). Kadence parent installed.
- Theme `tabscanner` (v4 design) scaffolded; first deploy = homepage.
- Full 165-URL scrape captured in `_scrape/` (162×200, 2×301, 1×410).

## Done
- [x] Repo scaffold (theme, deploy.yml, docs, .gitignore)
- [x] v4 homepage → `front-page.php` + `app.css` + `app.js`
- [x] Kadence parent installed, `blog_public=0` set
- [x] `WPE_SSH_KEY_B64` secret on `Shardyl/tabscanner`

## Next
- [ ] Push → deploy → `wp theme activate tabscanner` → verify homepage on temp URL
- [ ] Contact page (form → `wp_mail` REST endpoint) + 4 Use Case templates
- [ ] Pricing / About / Company Overview / FAQ / News (blog index)
- [ ] page.php / single.php / archive.php
- [ ] Import 8 legal pages + 143 posts + categories at identical slugs (WP-CLI from `_scrape/`), import media
- [ ] Audit fixes: right-size titles, security headers, lazy-load/WebP
- [ ] Plugins: Rank Math (+ wizard), WP Mail SMTP (operator pastes app password for `api@tabscanner.com`)
- [ ] URL-parity check (all 165 → 200), Lighthouse pass

## Operator (you) to-dos
- [ ] At go-live: DNS cutover (web records → WPE, leave email records), set primary in WPE portal, SSL
- [ ] Paste the (regenerated) `api@tabscanner.com` app password into wp-admin → WP Mail SMTP
- [ ] Approve flip to `blog_public=1` + submit sitemap to Google Search Console
