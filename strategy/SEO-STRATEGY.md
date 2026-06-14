---
doc: seo-strategy
site: Tabscanner
owner: Rashad
last-reviewed: 2026-06-09
status: needs-input
---

# Tabscanner — SEO & AEO Strategy

Owned by the `seo-campaign` skill. The keyword/cluster map here drives the content factory;
`web-page-builder` reads it before building any page. Classic SEO + AEO/GEO on one page —
**brand voice and the entity claim lead; keywords are anchored in structural slots, never
stuffed** (see the skill's "Brand positioning and SEO are the same project" principle).

## Market & intent
**Global B2B.** Tabscanner is a receipt-OCR **API** for businesses/developers worldwide; the
product is language-agnostic (OCRs receipts in any language). Primary buyer = the B2B/developer who
needs structured receipt data — **NOT** the consumer "receipt scanner app" user. Currently
English-only.

## Entity claim (mirror of POSITIONING.md)
> Tabscanner is a **receipt OCR API** (tabscanner.com) that turns photos/scans of receipts into
> structured, line-item data, used by businesses for expense management, loyalty, and market research.

## International / Multilingual — FLAGSHIP INITIATIVE (operator-locked 2026-06-13)
The biggest growth lever, surfaced by the analytics. Tabscanner already earns organic impressions in
non-English markets on its **English** pages (GSC: "receipt ocr api" → Indonesia 126, Germany 29,
Brazil, India; "receipt ocr" → Germany 58, UK 54, USA 206) but ranks **page-2+** there because the
content is English in a local-language SERP. Plan: localized versions that rank locally.
- **Audience: B2B native-language buyers** (operate in their own language, can use the API). NOT consumer.
- **Prioritise by GSC proven demand** (German, Portuguese/BR, Indonesian first; then French, Japanese).
  NOT raw Keyword-Planner volume — it skews consumer + needs native seeds (the AI-guessed multilingual
  pass returned false zeros for FR/ID; redo with **native B2B seeds**).
- **Structure:** subdirectories `/de/ /pt/ /id/ /fr/ /ja/` (inherit tabscanner.com authority) +
  **hreflang** (by language; `x-default`). NOT separate domains.
- **Content:** localise (not literal-translate) + **native QA on money pages = the quality gate,
  regardless of which model translates.** Pluggable, best-tool-per-job engine (API key in vault, never
  committed): **DeepL / Google Cloud Translation** for raw translation (purpose-built MT usually beats
  general LLMs, incl. GPT and Claude); **OpenAI (ChatGPT) or Claude** for localisation/transcreation +
  local SEO phrasing (pick whichever tests better per language); **Keyword Planner + natives** for the
  actual local terms. Operator flagged OpenAI may localise better — wire it as the LLM option and A/B per
  language. Avoid mass machine-translated thin pages (Google scaled-content penalty).
- **Product parity:** the localized homepage uploader must work + return localized output.
- **Phase 1:** core pages (home + uploader + key use-case/pricing) × top 2-3 languages → prove ranking →
  expand to blog + more languages. WP multilingual via Polylang/WPML (URL structure + hreflang);
  subdirectories avoid DNS (DNS changes go via CTO Ben).
See the `seo-campaign` skill "International / Multilingual SEO" playbook.

## Keyword / cluster map
<!-- NEEDS-INPUT: build via skill Step 1 (live SERP + autocomplete; volume once available). (Q28-29) -->
```
PILLAR (money term)              → /url/
  Secondary head terms
  Commercial long-tail
  Emerging / low-comp
  Use-case / industry cluster
  Informational cluster (AEO)    how X is made · X vs Y · how much X costs
```

## AEO question-set (the questions assistants/users ask)
<!-- NEEDS-INPUT: real customer questions → question-headings + FAQ + AI-answer tracking. (Q32) -->

## Content plan / page inventory
<!-- NEEDS-INPUT: which cluster rows map to which pages + status (planned/hidden/live). -->

## Technical / schema decisions
<!-- NEEDS-INPUT: schema types, sitemap, internal-linking rules, CWV notes. -->

## Links / digital PR targets (human)
<!-- NEEDS-INPUT: roundups/directories/press to pursue (incl. AEO citation sources). -->

## Monitoring baselines
<!-- NEEDS-INPUT: starting ranks + AI-answer presence; updated by the monitoring loop. -->

## Terms to avoid
<!-- NEEDS-INPUT: (Q33) -->

---
*Gaps? Run section E of `_QUESTIONNAIRE.md`.*
