---
doc: brand-guidelines
site: Tabscanner
owner: Rashad
last-reviewed: 2026-06-15
status: complete (derived from the live site — theme/assets/css/app.css)
---

# Tabscanner — Brand Guidelines (visual identity)

Visual identity only; verbal identity lives in `CONTENT-STYLE-GUIDE.md`. Everything below is taken from
the live website's design system (`theme/assets/css/app.css`, generated from the v4 demo). That CSS is
the single source of truth; this document describes it.

**Brand in one line:** a clean, light, technical SaaS identity for a receipt-OCR / data-extraction API —
credible and accuracy-first, with a signature blue-to-violet "AI" gradient and a developer/mono accent.
It is its OWN brand, NOT the Sensa all-black family system.

## Logo
- **Primary (on light):** `tabscanner-logo.png` — use on white / light SaaS backgrounds.
- **Reversed (on dark):** `tabscanner-logo-white.png` — use on the dark hero and dark sections.
- **Clear space:** keep clear space around the logo of at least the height of the logo's mark on all sides.
- **Minimum size:** don't render below ~120px wide (web) / 24px tall; below that, legibility breaks.
- **Don'ts:** don't recolour it, add effects/shadows, stretch or skew it, rotate it, place the light logo on
  a busy/low-contrast background, or box it in. Always use the reversed (white) version on dark.
- **TODO (tidy-up):** only PNGs exist today. Produce official **SVG** dark + light logos (crisp at any size)
  and a square app/favicon mark, and store them in the company asset folder.

## Colour
Light SaaS palette (white-led), with a blue + violet brand pair and a teal success.

**Brand**
- Primary blue `#29B3EB`  ·  darker shades `#1E9BD7`, `#1689CC` (hover / depth)
- Violet `#6D5EF6` (the AI/secondary accent)
- **Signature gradient** `linear-gradient(112deg, #29B3EB 0%, #6D5EF6 100%)` — the brand's hero/AI device.
  Also a soft version `linear-gradient(135deg, rgba(41,179,235,.10), rgba(109,94,246,.10))` for tints.

**Text / ink**
- Headlines `#0A1828` (ink) · deeper `#16293D`
- Body `#4C5C70` · muted / secondary `#8494A6`

**Surfaces**
- Background `#FFFFFF` · subtle blue-tinted `#F6FAFE`, `#EDF4FC`
- Dark sections (hero) `#081522` · `#0D2032`
- Hairlines / borders `#E7EFF7` · `#D7E5F1`

**Accents**
- Success / positive `#13C2A3` (teal)
- Highlight orange `#F26526` (use sparingly — data callouts, "live", emphasis)

**Usage:** white-dominant layouts; blue for primary actions/links; the blue→violet gradient reserved for the
hero and signature "AI" moments (don't over-use it); violet as a secondary accent; orange only for small
high-energy highlights; teal for success states.

## Typography
Three typefaces, loaded from Google Fonts:
- **Display / headings — Space Grotesk** (400, 500, 600, 700). Geometric, technical, confident. Used for H1–H3,
  eyebrows, big numbers/counters.
- **Body — Inter** (400, 450, 500, 600, 700). Clean, neutral, highly legible. Paragraphs, UI, most copy.
- **Mono / technical — JetBrains Mono** (400, 500). Code, API snippets, field names, JSON, technical labels,
  metrics — the "developer product" signal. Use deliberately, not for body copy.

Lead with the answer; short paragraphs; sentence case for UI. No em/en dashes in visible copy (house rule).

## Shape, space & elevation
- **Corner radius:** standard `18px` (`--r`), small `11px` (`--r-sm`), large `24px` (`--r-lg`). Soft, modern.
- **Container width:** `1200px` (`--wrap`); generous whitespace.
- **Shadows:** soft, blue-tinted, never harsh — `0 6px 22px -8px rgba(20,60,100,.16)` (small),
  `0 24px 60px -22px rgba(20,60,100,.24)` (card). Signature **blue glow** `0 20px 50px -16px rgba(41,179,235,.5)`
  for the primary CTA / hero accent.

## Components (as built)
- **Buttons:** primary = blue (or the gradient on hero) with the blue glow; rounded `--r`. Secondary = outline
  on `--line`. Generous padding, Inter/Space-Grotesk label.
- **Cards:** white, `--r` radius, hairline `--line` border, soft shadow; blue-tinted backgrounds (`--bg-2/3`)
  for alternating sections.
- **Dark AI hero:** `#081522` background with an animated neural canvas, the blue→violet gradient, the white
  logo, and the receipt-to-JSON field-detection card. Animated counters for stats.
- **Technical motifs:** JSON / field-name callouts in JetBrains Mono; receipt → structured-data visualisations.

## Imagery & motion
- **Imagery:** clean, product-led — real UI, receipt-to-JSON visualisations, structured-data callouts, partner
  logos (e.g. Subway, Fandango). Light, precise, trustworthy. Avoid stocky/generic business photography.
- **Motion:** restrained and purposeful — the neural-canvas hero, animated stat counters, subtle hovers.
  Motion should read as "precise/technical", never flashy.

## Voice (pointer)
Technical, credible, accuracy-first, B2B; concrete and specific, never hypey; no unqualified financial/tax
(YMYL) advice; no vague claims without proof. Full verbal identity in `CONTENT-STYLE-GUIDE.md`.

## Source of truth
Own brand (NOT Sensa family). **Design source of truth: `theme/assets/css/app.css` (+ `app.js`)**, generated
from the v4 demo (`tabscanner-home-demo-v4.html`). Edit there; this document follows it.
