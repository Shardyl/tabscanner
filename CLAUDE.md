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

## Status: build on the noindexed temp URL; go live later (see HANDOVER.md).
`blog_public=0` enforced for the whole build (§9c). Flip to 1 only at go-live.

## Content port (full URL parity — all ~165 URLs)
Home (front-page.php) + Contact + 4 Use Cases (Loyalty / Expense / Market Research / Case Studies) +
Pricing / About / FAQ are bespoke templates. 8 legal pages + 143 blog posts + category archives are
imported as WP pages/posts at **identical slugs**, rendered via `page.php` / `single.php` / `archive.php`.
2 source URLs 301-redirect + 1 is 410 — preserve those statuses.

## Conventions
No em/en dashes in visible copy. Version bump every ship. Email/SMTP mailbox = `api@tabscanner.com`
(operator pastes the app password into WP Mail SMTP at go-live; never in the repo).
