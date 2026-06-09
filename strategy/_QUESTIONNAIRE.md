# Strategy Pack Questionnaire — Tabscanner

Purpose: fill the `NEEDS-INPUT` gaps across this site's strategy pack. Claude runs the
relevant section(s) with the operator whenever a doc is `status: needs-input`, then writes the
answers back into the matching doc, flips its `status`, removes the markers, and commits.
**Ask only what's still missing; group questions; keep it conversational.** One question bank,
organised by the doc each answer feeds.

> **How to deliver (operator preference):** present these through the **interactive question
> UI** — tappable **multiple-choice options** where sensible (recommended option first when you
> have a view) plus the built-in **"Other" / free-text** path so the operator can just talk and
> add detail. Batch a few at a time (~4 per call), not a wall of text. Prose answers are fine
> too. Write answers back into the matching doc as you go.

---

## A. WEBSITE-PHILOSOPHY.md
1. In one line, what is this website **for** (its primary job)? Any secondary jobs?
2. Who is it for (primary + secondary audiences)?
3. What single action should a visitor take (primary conversion)? Secondary actions?
4. What does **success** look like in 12 months (concrete: leads/sales/signups/brand)?
5. What must this site **never** be or do (anti-goals, pet hates)?
6. 2-3 sites you admire (yours or others) and *why*?
7. UX priorities in order: speed, visual impact, accessibility, simplicity, depth?

## B. POSITIONING.md
8. One sentence: **what is [company], what does it do, for whom, and where?** (the *entity claim*)
9. The USP: why should someone choose you over the alternatives? What do you do that they can't/don't?
10. Top 3-5 competitors. For each, how are you *different/better*?
11. Target personas: who buys, their core pain, and what triggers them to look?
12. Proof points: awards, notable clients, results/numbers, credentials, press.
13. Price positioning: premium / mid / value? Why is that justified?
14. Top objections prospects raise, and your answer to each.

## C. BRAND-GUIDELINES.md
15. Logo: files + variants (which exist), and any clear-space / min-size / don'ts?
16. Colours: primary accent + full palette (hex). (Family sites: confirm the accent.)
17. Typography: heading + body typefaces (and weights)?
18. Imagery style: photography / illustration / AI-generated? Mood, do's and don'ts?
19. Motion / video style (if used)?
20. Is there an existing brand doc/source to link rather than re-author?

## D. CONTENT-STYLE-GUIDE.md
21. Brand **voice** in 3-5 adjectives?
22. **Tone** by context (homepage vs blog vs support vs sales)?
23. Reading level + formality (plain & punchy / professional / technical)?
24. Vocabulary: must-use terms (e.g. FilmSpoke "creatives"), and banned words/phrases?
25. POV (we/you), UK vs US spelling, Oxford comma? (House rule: no em/en dashes — confirm.)
26. Give one on-brand sentence and one off-brand sentence as a calibration example.

## E. SEO-STRATEGY.md
27. Primary market/geography + language(s)?
28. The **pillar** term + any keywords you already know matter?
29. Who do you see ranking/winning for those terms now?
30. Existing assets: current rankings, Google Search Console / Analytics access?
31. Which services/products should become priority pages?
32. The real **questions** customers ask (feeds AEO + FAQs)?
33. Any terms/associations to **avoid**?

## F. DIGITAL-MARKETING-STRATEGY.md
34. Channels in use or planned: organic SEO, Google Ads, Meta, LinkedIn, email, other?
35. Paid budget (monthly) — and is there a **Google Ads account** already (for keyword/Search-Terms data)?
36. Analytics/tracking in place: GA4, Search Console, Tag Manager, pixels?
37. Lead capture + CRM: how do enquiries arrive and where do they go?
38. The funnel: how does a stranger become a customer (steps)?
39. KPIs / targets (leads, CPL, ROAS, signups)?
40. Sales cycle length + average deal value (for ROI math)?

## G. TECHNICAL-SEO.md
41. Platform: CMS/theme, host, CDN, build/deploy method?
42. Is there an XML sitemap, and is it submitted to **Google Search Console**? GSC access?
43. Known **page speed / Core Web Vitals** scores or problems (mobile especially)?
44. Which tools/access exist: Search Console (and can we get API access?), PageSpeed/CrUX, a
    crawler, analytics? Any known technical issues (broken links, indexing, redirects, schema)?
45. **Agent-readiness (agentic web):** is this an API/SaaS product where AI agents could use it
    directly (→ worth an MCP server / Agent Skills), or a brochure site (→ just robots.txt +
    llms.txt hygiene)? Anything already in place (llms.txt, MCP, agent-friendly content)?

## H. OFF-SITE-SEO.md
45. Current backlink/authority picture? Any tools (Ahrefs, GSC links report)?
46. Newsworthy angles / PR assets: data, founder story, awards, standout case studies?
47. Target outlets, journalists, podcasts, or directories in your space?
48. **Local business?** Is Google Business Profile set up + optimised? Is NAP (name/address/
    phone) consistent across directories? Which directories matter in your niche?
49. Existing reviews/reputation + social/YouTube presence?
50. Relationships or partners (clients, suppliers, collaborators) who could link or feature you?

---
*After answering: Claude updates the matching doc(s), sets `status:` accordingly, and commits.*
