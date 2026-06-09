# Tabscanner — build guide

Receipt OCR API marketing site. WordPress on **WP Engine** (install `tabscanner`), rebuilt from the
old `aipt`/WPBakery site. Same technical harness as the Sensa-family sites (see the
`website-management` skill) but **its own brand** — NOT the all-black Sensa system.

## Brand / design
- Locked design = the **v4 demo** (`Desktop/Tabscanner/tabscanner-home-demo-v4.html`): light SaaS body,
  Tabscanner blue `#29B3EB` + violet `#6D5EF6` AI gradient, **Space Grotesk + Inter + JetBrains Mono**,
  dark AI hero (neural canvas), receipt-to-JSON field-detection card, animated counters.
- All design lives in `theme/assets/css/app.css` (+ `app.js`). Generated from the v4 demo; edit there.

## Repo layout
- `theme/` → Kadence child theme `tabscanner` (rsynced to `wp-content/themes/tabscanner/`)
- `mu-plugins/` → site mu-plugins (additive deploy)
- `_scrape/` → **gitignored** working data: raw HTML mirror of all 165 live URLs + `urls.txt` +
  `manifest.tsv` + `home-outline.txt` (verbatim homepage content). Source of truth for the content port.

## Deploy (every ship)
1. Bump `Version:` in `theme/style.css` + `TABSCANNER_VERSION` in `theme/functions.php`.
2. `git push origin main` → `.github/workflows/deploy.yml` rsyncs theme+mu-plugins to `/sites/tabscanner`,
   then `wp cache flush`. Secret: `WPE_SSH_KEY_B64` (shared `gh-actions-deploy-all-sites` key).
3. Verify: `curl -s -A "<chromeUA>" "https://tabscanner.wpenginepowered.com/?cb=1"`.

## Access
- GitHub: `github.com/Shardyl/tabscanner` (personal repo, not the `sensa-productions` org).
- WPE gateway (manual WP-CLI): `ssh tabscanner@tabscanner.ssh.wpengine.net` (key `~/.ssh/id_ed25519`).
- Webroot `/sites/tabscanner`. Temp URL `tabscanner.wpenginepowered.com`.
- Same WP Engine account as the Sensa sites → both account keys already authorise this install.

## Status — LIVE (cutover 2026-06-08)
Live at **https://tabscanner.com**, secure, indexable (`blog_public=1`, homepage emits `index, follow`,
`/sitemap_index.xml` 200). Full URL/meta/media parity verified pre-cutover (165/165). Contact form delivers
via WP Mail SMTP (`api@tabscanner.com` Gmail app password). Comments disabled site-wide. Sensa CMS wired
across the homepage + all 6 inner bespoke pages.

## Live / DNS / SSL — Cloudflare proxy STAYS ON (operator-LOCKED 2026-06-09)
**Decision: leave tabscanner.com PROXIED through Cloudflare. Do NOT bypass / grey-cloud.** This is the
permanent topology.
- **DNS** is at **Cloudflare**, managed by the partner **Ben Smith (CTO)** — NOT Rashad. `tabscanner.com`
  + `www` are **orange-clouded (proxied)**: visitor → Cloudflare → WP Engine origin
  (`tabscanner.wpengine.com` → `35.189.71.92`, Advanced Network). Public DNS resolves to Cloudflare IPs
  (`104.21.x` / `172.67.x`).
- **SSL is served by Cloudflare** (Universal SSL, `CN=tabscanner.com`, Let's Encrypt, auto-renew). Valid,
  no action needed. WP Engine holds only its default `*.wpengine.com` backstop cert behind the proxy.
- **⚠️ The WP Engine portal PERMANENTLY shows `tabscanner.com` = "DNS not pointed" + SSL `-`. This is
  EXPECTED and cosmetic, NOT a bug and NOT pending.** WPE's checker sees Cloudflare's IPs, not its own, so
  it reports "not pointed". Those columns only go green if you grey-cloud (which we are NOT doing). Ignore them.
- **WPE will NOT issue its own LE cert while proxied.** WPE support confirmed (2026-06-09) they require
  DNS-pointed-first, then auto-issue — there is **no pre-provision / cert-first path**. So a future bypass
  CANNOT be zero-downtime.
- **If a bypass is ever wanted** (only real benefit: removes Cloudflare bot-protection friction on the demo
  upload API): grey-cloud both records → DNS points direct → WPE auto-issues its cert in minutes-to-~1h,
  during which `https://` shows a cert-name-mismatch warning. Mitigate: lower CF TTL to 60s first, flip at
  low traffic, hit WPE "re-check DNS" + support to expedite. **Instant rollback = re-enable the orange proxy**
  (Cloudflare's cert returns in seconds). Verify readiness with
  `openssl s_client -servername tabscanner.com -connect 35.189.71.92:443 | openssl x509 -noout -subject`
  (CN flips `*.wpengine.com` → `tabscanner.com` once WPE has issued).
- **Caching:** Cloudflare serves the HTML **DYNAMIC** (does NOT edge-cache it) → content/CMS edits show
  through immediately, no Cloudflare purge needed. **WPE's own EverCache still caches pages**, so after any
  WP-CLI/DB change purge it via `WpeCommon::purge_varnish_cache_all()` + `WpeCommon::clear_cdn_cache()`
  (base64 `eval-file`); `wp cache flush` alone leaves the full-page layer stale.
- **Cloudflare bot protection blocks non-browser multipart POSTs** to `/wp-json/tabscanner/v1/demo-process`
  (curl/datacenter → HTTP 000/403). Real browsers (with the `cf_clearance` cookie) upload fine. So the live
  receipt-upload demo can only be tested in a real browser, not via curl.
- **Never touch** `api.` / `dashboard.` / `docs.` subdomains or MX/SPF/DKIM/DMARC (Ben's product infra + email).
  Operator (Rashad) owns the WPE install; **DNS-record changes go to Ben.**

## Post-launch wiring (done)
- **Sensa CMS** (`sensa-cms` plugin, active) wired via `theme/inc/cms-config.php` → ~94 `sc_text()` fields
  across homepage (hero, CTA band, intro, all section headings/eyebrows/CTAs, About grid) + Contact / Pricing
  / 4 use-case pages. Edit in wp-admin → **Sensa CMS → Page Text**. Defaults = original copy; clearing a field
  restores it. Theme has `sc_text/sc_img` fallback shims so it never fatals if the plugin is off.
- **Hero CTA** = single "Book a consultation" button (`js-contact-open` → contact modal); Google/Email
  sign-in removed from the hero.
- **Demo uploader** (`theme/inc/demo-uploader.php` + `assets/js/uploader.js`): result gating REMOVED (returns
  + renders the full line-item breakdown); timing split into upload-then-processing, **final headline = processing
  time only** (poll cadence 500ms). API key in `tabscanner_demo_api_key` option (Settings → Tabscanner Demo).
- **privacy-policy slug fix:** WP's default Privacy Policy draft squatted `privacy-policy` → deleted it, moved
  the real page back to `/privacy-policy/`, re-applied its Rank Math meta (see skill §9d gotcha).

## Content port (full URL parity — all ~165 URLs)
Home (front-page.php) + Contact + 4 Use Cases (Loyalty / Expense / Market Research / Case Studies) +
Pricing / About / FAQ are bespoke templates. 8 legal pages + 143 blog posts + category archives are
imported as WP pages/posts at **identical slugs**, rendered via `page.php` / `single.php` / `archive.php`.
2 source URLs 301-redirect + 1 is 410 — preserve those statuses.

## Conventions
No em/en dashes in visible copy. Version bump every ship. Email/SMTP mailbox = `api@tabscanner.com`
(operator pastes the app password into WP Mail SMTP at go-live; never in the repo).
