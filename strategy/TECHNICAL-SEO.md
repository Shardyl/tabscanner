---
doc: technical-seo
site: Tabscanner
owner: Rashad
last-reviewed: 2026-06-09
status: needs-input
---

# Tabscanner — Technical / On-site SEO

Technical SEO **is** on-site SEO. This doc = the site's current technical state, decisions, and
known issues. The standard checklist + methodology live in the `seo-campaign` skill (Step 3);
the Step 5 monitoring loop audits these on a schedule and queues fixes.

## Platform & hosting
WordPress on **WP Engine** (managed; EverCache + CDN). Theme: **Kadence** parent + bespoke child. Deploy: GitHub Actions rsync over the SSH gateway. <!-- confirm CDN/DNS specifics (Q41) -->

## Crawlability & indexing
- **Sitemap:** **Rank Math** XML sitemap. <!-- confirm submitted to Google Search Console (Q42) -->
- **robots.txt:** <!-- NEEDS-INPUT: not blocking CSS/JS/assets? -->
- **Noindex hygiene:** <!-- NEEDS-INPUT: noindex while building; removed at go-live; money pages indexable. -->
- **Canonicals:** <!-- NEEDS-INPUT: self-referencing; no duplicate variants (slash/params/www/http). -->
- **Crawl errors / soft-404s / redirect chains:** <!-- NEEDS-INPUT -->

## Site architecture & internal linking
<!-- NEEDS-INPUT: hierarchy depth, pillar↔cluster links, orphan pages, URL slug conventions. -->

## Page speed & Core Web Vitals
Targets: **LCP < 2.5s · INP < 200ms · CLS < 0.1** (field via CrUX/GSC, lab via PSI/Lighthouse).
- Current scores (mobile): <!-- NEEDS-INPUT: per key template. (Q43) -->

## Performance
<!-- NEEDS-INPUT: image format/sizing/lazy-load, caching/CDN, minify, JS defer, font-display. -->

## Mobile
<!-- NEEDS-INPUT: responsive, tap targets, no horizontal scroll. -->

## Accessibility (a11y)
<!-- NEEDS-INPUT: semantic HTML, heading order, alt text, contrast, focus states, labelled forms. -->

## Security & hygiene
<!-- NEEDS-INPUT: HTTPS everywhere, no mixed content, valid cert, security headers. -->

## Structured data / schema
Via **Rank Math** (Organization etc.); + the shared Sensa editor plugin where installed. <!-- verify types present + valid via Rich Results Test -->

## Redirects & broken links
<!-- NEEDS-INPUT: 301s on URL changes, broken internal links, 404 handling. -->

## Tooling & access
<!-- NEEDS-INPUT: Google Search Console, PageSpeed/CrUX, crawler, Lighthouse — access + who. (Q44) -->

## Known issues / backlog
<!-- NEEDS-INPUT: prioritised technical fixes. -->

---
*Gaps? Run section G of `_QUESTIONNAIRE.md`.*
