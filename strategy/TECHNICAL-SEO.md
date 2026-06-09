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
<!-- NEEDS-INPUT: CMS/theme, host, CDN, build/deploy. (Q41) -->

## Crawlability & indexing
- **Sitemap:** <!-- NEEDS-INPUT: URL + submitted to GSC? (Q42) -->
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
<!-- NEEDS-INPUT: which types live + how injected (Rank Math / Sensa plugin / hand-JSON-LD); valid? -->

## Redirects & broken links
<!-- NEEDS-INPUT: 301s on URL changes, broken internal links, 404 handling. -->

## Tooling & access
<!-- NEEDS-INPUT: Google Search Console (+ API access?), PageSpeed/CrUX, crawler, Lighthouse — access + who. (Q44) -->

## Agent-readiness (agentic web)
How ready the site is for AI agents (the layer beyond being cited in AI answers). Score via
`isitagentready.com` (Discoverability, Content Accessibility, Bot Access Control, Protocol
Discovery, Commerce). See the seo-campaign AEO agent-readiness layer.
- **robots.txt for AI/agent crawlers:** <!-- NEEDS-INPUT: explicit, sane handling. (Q45) -->
- **llms.txt + clean Markdown / content negotiation:** <!-- NEEDS-INPUT: present? -->
- **MCP server / Agent Skills:** ELEVATED for Tabscanner (a receipt-OCR API): an MCP server + Agent Skills lets AI agents call the OCR API directly = a real growth channel, not just SEO. <!-- scope via Q45. STRATEGIC for API/SaaS products (e.g. an
     OCR API) — agents call the product directly. Most brochure sites: emerging/low priority. (Q45) -->
- **OAuth for agent access / agentic commerce:** <!-- NEEDS-INPUT: only if the site transacts. -->
- **Current agent-readiness score:** <!-- NEEDS-INPUT -->

## Known issues / backlog
<!-- NEEDS-INPUT: prioritised technical fixes. -->

---
*Gaps? Run section G of `_QUESTIONNAIRE.md`.*
