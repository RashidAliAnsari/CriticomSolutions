# Criticom Solutions — website and admin build spec

This file is the source of truth for this project. Read it fully before writing code.
If something here conflicts with a general convention you would otherwise follow,
this file wins. If something is genuinely ambiguous, ask rather than invent.

---

## 1. What this is

A marketing website plus a private admin panel for **Criticom Solutions**, an
independent engineering consultancy for mission-critical wireless, based in Lahore,
Pakistan.

The site's single job is **credibility with procurement and technical evaluators** —
people at oil and gas operators, defense procurement bodies, government agencies and
telecom operators who are deciding whether to shortlist a small consultancy. It is not
a lead-generation funnel and it is not a brochure. Every design and copy decision
should be judged against: _does this make a sceptical evaluator more likely to take a
meeting?_

Audience reads carefully, distrusts marketing language, and checks claims.

---

## 2. Non-negotiable content rules

These exist because the company is new and over-claiming is the single biggest risk to
it. Violating any of these is worse than shipping less content.

1. **Never invent facts.** No client names, project values, dates, certifications,
   staff counts, years of experience, statistics, or testimonials that are not in this
   file. If a section needs a fact you do not have, write `[TODO: …]` in the markup and
   leave it visible. Do not write plausible filler.

2. **Past performance attribution.** Work Hassan did as an employee of Redline or Aviat
   belongs to _him_, not to Criticom. It must always be framed as the founder's
   personal record — "our founder led…", "before founding Criticom, Hassan…". Never
   "we delivered", "our projects", or anything implying Criticom held the contract.
   Only the two engagements in §7.1 are Criticom's own.

3. **No mitigation marketing.** Criticom can design and integrate counter-UAS and
   perimeter security systems, including mitigation where lawfully authorised. But the
   public site describes **detection, identification, tracking, command-and-control and
   resilient communications only**. Do not write copy detailing jamming, spoofing,
   protocol takeover, navigation denial, or interception. Where mitigation must be
   referenced, the phrasing is: "mitigation options are scoped only for duly authorised
   end users, under applicable law and licensing." One sentence, no elaboration.

4. **No automation claims.** Criticom does **not** do PLC, DCS, or control-logic
   engineering. The industrial sector is connectivity and data transport, and is named
   "Industrial & transport connectivity" everywhere. Never write "industrial
   automation".

5. **OEM relationships are stated exactly as in §9.** Criticom is not a distributor,
   reseller, or authorised service partner of anyone. Do not upgrade the language.

6. **No fake trust signals.** No stock photos of people, no invented client logos, no
   "trusted by" strips, no counters animating up to numbers. If there is nothing real
   to show, show nothing.

---

## 3. Tech stack and constraints

- **Laravel 13** (released March 2026, requires PHP 8.3+), Blade, **Tailwind CSS v4**
- **Filament v5** for the admin panel (already installed at `/admin`)
- MySQL
- Local dev: Laravel Herd on macOS
- Deployment: **cPanel shared hosting, no SSH.** The developer handles deployment and
  SMTP configuration — do not write deploy scripts, Envoyer configs, or CI pipelines.

What this constrains:

- **No Node runtime in production.** Vite builds locally; compiled assets are committed.
- **Assume `php artisan` is unavailable on the server.** Migrations run through
  phpMyAdmin or a one-off token-protected route. Do not design anything that needs
  scheduled artisan commands, queue workers, or Reverb.
- **Queues:** use `sync` driver. Do not introduce a queued job that needs a worker.
- **Keep the dependency count low.** Every added composer package inflates `vendor/`,
  and shared hosting plans cap file counts. Do not add a package where ~30 lines of
  Laravel would do. Ask before adding anything not already listed here.

---

## 4. Brand tokens

Put these in `resources/css/app.css` as CSS custom properties inside `@theme`.
**This block is the only place colour is defined.** Every component references the
variables. Swapping palette must mean editing this block and nothing else.

```css
@theme {
    --color-ink: #101b26; /* deepest — dark section backgrounds, headings on paper */
    --color-deep: #22303e; /* mid-dark — cards and panels sitting on ink */
    --color-body: #3e464f; /* body copy on paper. Text only, never a surface */
    --color-accent: #1c6fb4; /* links and active states on light backgrounds */
    --color-accent-2: #6fb8e8; /* accent on dark backgrounds only */
    --color-paper: #f2f3f4; /* page background */
    --color-line: #cbd1d4; /* hairlines and dividers */

    --color-defense: #3e6b54; /* defense sector page only */
    --color-defense-dark: #1e3a2c; /* defense sector page only */
    --color-defense-accent-2: #88baa0; /* defense sector page only — accent-2 on dark */
}
```

### Colour usage rules

Blue is the system colour and carries the entire site. Green appears on the
`/sectors/defense` page only — nowhere in the header, footer, home page, other sector
pages, or the admin panel.

`--color-accent` never appears on a dark background and `--color-accent-2` never appears
on paper; each fails contrast in the other direction. When unsure which surface an
element sits on, use `--color-ink` on paper and `--color-paper` on dark.

`--color-body` is text only. It is close in value to `--color-deep` and must never sit
adjacent to it as a surface.

On the defense page, `--color-defense-dark` substitutes for `--color-ink` on dark
sections, `--color-defense` substitutes for `--color-accent` on light, and
`--color-defense-accent-2` substitutes for `--color-accent-2` on dark (buttons, mono
labels, links that would otherwise render in system blue against the green sections).
Nothing else changes — same layout, same components, same type. The swap is done with a
body class (`sector-defense`) overriding those three variables, not with duplicated
components.

### Typography

- Display / headings: **Archivo** (600, 700), tight tracking, sentence case
- Body: **Archivo** (400, 500)
- Data, labels, eyebrows, spec lines: **IBM Plex Mono** (400, 500), uppercase,
  letter-spacing `0.12em`, size 11–12px

Self-host both via `public/fonts/` with `@font-face` and `font-display: swap`.
Do **not** hotlink Google Fonts — the site will be opened from networks where that is
slow or blocked, including inside government buildings.

Type scale: 12 / 14 / 16 / 19 / 24 / 32 / 44 / 64px. Body 16px, line-height 1.65.

### Visual direction

Engineering documentation, not SaaS marketing. Specifically:

- Flat. No gradients, no glassmorphism, no drop shadows except focus rings.
- Hairline rules at 1px `--color-line` do the structural work.
- Generous whitespace; wide measure is fine for prose (max 68ch).
- Monospace labels above section headings carry real information, not decoration.
- **One motion moment only:** the hero path-profile figure draws its line-of-sight on
  load. Everything else is static. Respect `prefers-reduced-motion`.
- Sentence case everywhere except mono labels.

### Hero figure

The homepage hero includes an inline SVG **microwave path profile**: terrain silhouette,
two towers, a line-of-sight line and a first Fresnel zone ellipse. Build it as a Blade
component `<x-path-profile />`, full-bleed, with `role="img"` and a description. Caption
it `Path profile with first Fresnel zone clearance — illustrative.` The word
illustrative is required; it is not real link data.

Figure colours: terrain fill in `--color-accent` at 20% opacity with a 1.5px solid edge;
towers and dish outlines in `--color-paper`; line-of-sight in `--color-accent-2`; Fresnel
ellipse in `--color-accent-2` at 12% fill; grid lines in `--color-deep`. The figure sits
on `--color-ink`.

This is the signature element. Do not add other decorative graphics anywhere on the site.

---

## 5. Company facts

| Field                  | Value                                                    |
| ---------------------- | -------------------------------------------------------- |
| Trading and legal name | Criticom Solutions                                       |
| Structure              | Sole proprietorship, registered with SECP                |
| Location               | Lahore, Pakistan                                         |
| Registration number    | `[TODO: SECP registration number]`                       |
| NTN                    | `[TODO]`                                                 |
| Office address         | `[TODO]`                                                 |
| Email                  | support@criticom.net                                     |
| Phone / WhatsApp       | +92 305 3555 440                                         |
| PPRA                   | Registered — Lahore, telecom systems integrator category |
| ISO                    | In progress `[TODO: which standard, expected date]`      |

Use "Criticom" in body copy and headings. Use "Criticom Solutions" in the footer,
the credentials page, and anywhere the legal entity is being stated. **Never mention
any other entity name on this site.**

---

## 6. Positioning

Master positioning statement (adapt, don't quote verbatim into every page):

> Criticom Solutions is an independent engineering consultancy for mission-critical
> wireless. We plan, specify, supply and integrate RF, spectrum and communications
> systems for energy, defense, industrial and telecom clients — with no OEM allegiance,
> and with eight years of experience inside the vendors we evaluate.

The core differentiator, which should be visible on the homepage and stated plainly on
the founder page: **Hassan spent eight years on the OEM side** (Redline Communications,
then Aviat Networks after acquisition), latterly in technical sales. He knows how
vendors scope, price and where proposals are padded. He now works for the customer.
That is a position competitors cannot copy.

Sector-neutral at the top of the site. Sector-specific language only on sector pages.

---

## 7. Past performance

### 7.1 Criticom Solutions engagements

These two are the company's own, and may be described as "our work".

- **North African government border surveillance programme** — engineering consultancy.
  Do **not** name the country or client; the phrasing above is the maximum detail
  permitted.
- **BW Energy, Gabon** — offshore communications. Fail-safe architecture linking an
  FPSO and a drilling barge using redundant point-to-point wireless. May be named.

### 7.2 Founder's record (attribute to Hassan, never to Criticom)

- **Petroleum Development Oman** — nationwide broadband wireless supporting field
  communications and SCADA transport across 8,800+ wellheads and 250+ drilling rigs.
- **Occidental Oman, "Digital Canopy"** — field-wide wireless across 3,000+ wellheads
  and 15+ rigs, Farah and Mukhaizna fields.
- **ZADCO, Upper Zakum offshore** — contributed to deployment of 77 wireless links in a
  challenging offshore RF environment.
- **Brunei Shell Petroleum** — five years as Resident Engineer supporting mission-critical
  wireless across offshore and onshore operations, including connectivity for vessels,
  barges and drilling rigs.
- **ADCO / ADNOC Onshore** — wireless for Bu Hasa and Bin Hashim fields.
- **Omantel** — B2B and specialised wireless backhaul; rural 4G/5G expansion support.
- **Ministry of Defence, Oman** — secure wide-area wireless backhaul.
- **Hytera, Morocco** — RF optimisation and interference removal.

---

## 8. Founder

**Hassan Muhammad Mushtaq**, Founder and Principal Consultant.

- 17+ years across telecom and ICT, spanning customer, systems integrator and OEM sides
- BSc Telecommunication Engineering, FAST-NUCES, 2009
- **Aviat Networks** — Technical Sales Consultant, Access Products (2022–2025).
  Strategic oil & gas, government and defense accounts across APAC and South Asia,
  including Shell Brunei, PTTEP Thailand, Singapore Police Force, PetroVietnam, OGDCL,
  Pakistan Navy, Pakistan Army, Morocco Army.
- **Redline Communications** (acquired by Aviat) — Technical Sales Manager and Resident
  Engineer, Shell Brunei; earlier Project Engineer across Oman, UAE and Brunei.
- **Oman Holdings International** — Business Development Manager, Telecom & ICT.
- **Augere Pakistan (Qubee WiMAX)** — NOC and IP Core Engineer. PTA spectrum
  interference coordination.

Certifications: PMP (in progress), OPITO BOSIET, HUET, offshore HSE (PDO, Shell Brunei,
Occidental, ADCO, ZADCO), RCSP, RCSA, JNCIA (Junos, ER, EX), CCNA, Huawei technical
training.

Planning tools: Pathloss, ATOLL, Radio Mobile, CelPlan.

Markets: Oman, UAE, Brunei, Morocco, Gabon, Vietnam, Thailand, Singapore, Pakistan.

> **Note for the CV timeline section:** the source CV has overlapping employment dates.
> Do not render a visual timeline or date-range component that would expose this. Present
> roles as an unordered list of positions with employer and title only, no date ranges,
> until the developer supplies corrected dates. Add `[TODO: confirm employment dates]`
> as an HTML comment.

---

## 9. OEM relationships

State exactly this, no stronger:

- **Aviat Networks** — Criticom is a registered consultant vendor with Aviat's Singapore
  office.
- **KingSat** (kingsat-tech.com) — vendor registration permitting Criticom to take
  customer requirements and have them resolved into a technical proposal by KingSat.
  KingSat's M-series is a 3-axis mechanically stabilised tracking parabolic for
  coast-to-vessel (50–60 km) and vessel-to-vessel (40 km) links — directly relevant to
  offshore mobile-asset connectivity.

Criticom is **vendor-agnostic**. Frame these as routes to supply, not endorsements.
Never write "partner", "authorised distributor", "reseller", or "certified".

---

## 10. Services

Six service lines. Each gets a card on the services page and a detail section.

1. **RF survey, path and link planning** — path profiling, LOS verification, link
   budgets, coverage prediction, frequency planning, PTA/regulator coordination support.
2. **Spectrum monitoring and interference resolution** — occupancy surveys, interference
   hunting, emitter characterisation, regulatory case support.
3. **Independent technical assurance** — vendor proposal review, bid evaluation, design
   validation, acceptance testing witness, second-opinion engineering for clients
   procuring from OEMs.
4. **Wireless architecture for harsh and remote environments** — offshore and mobile-asset
   connectivity, redundant path design, SCADA and telemetry transport, private LTE/5G.
5. **Security and surveillance system design** — layered site security architecture for
   critical infrastructure, borders, airports and remote posts. Detection, identification,
   tracking, C2 integration and resilient backhaul. (See rule 3, §2.)
6. **Supply, integration and commissioning** — vendor-agnostic equipment selection,
   procurement routing, staging, installation supervision, FAT/SAT, handover
   documentation and training.

Service 3 is the differentiator. Give it visual prominence on the services page.

---

## 11. Sectors

Five pages, identical template, different content.

| Slug                      | Title                                 | Focus                                                                                             |
| ------------------------- | ------------------------------------- | ------------------------------------------------------------------------------------------------- |
| `energy-offshore`         | Energy and offshore                   | Oil and gas fields, offshore platforms, FPSOs, SCADA transport, remote wellhead connectivity      |
| `defense`                 | Defense and national security         | Secure wide-area backhaul, deployable communications, spectrum awareness, PNT resilience          |
| `critical-infrastructure` | Critical infrastructure protection    | Airports, border crossings, remote check posts, government sites — layered security design        |
| `industrial-transport`    | Industrial and transport connectivity | Industrial IoT gateways, remote monitoring, public transport and metro systems, edge connectivity |
| `telecom-spectrum`        | Telecom operators and regulators      | Backhaul planning, interference resolution, spectrum management, network assurance                |

Each sector page: hero statement → the problem in that sector → which of the six services
apply → relevant past performance (correctly attributed) → CTA.

The defense page applies the `sector-defense` body class described in §4. All other sector
pages use the system palette unchanged. Check for stray green on the other four.

---

## 12. Site map

```
/                        Home
/services                Services overview + six detail sections
/sectors/{slug}          Five sector pages
/founder                 Hassan's background — the credibility page
/credentials             Legal entity, registrations, compliance, HSE, documentation
/contact                 Form + direct channels
/privacy                 Privacy notice (required for the contact form)
/admin                   Filament panel (already installed)
```

Header: logo, five nav items, one CTA button ("Request a consultation").
Footer: legal entity name, registration `[TODO]`, address `[TODO]`, contact, sector links,
privacy link.

### Home page structure

1. Hero — positioning statement, two CTAs
2. Path-profile figure (full bleed)
3. Four data cells: 17+ years / OEM-side experience / vendor-agnostic / registered entity
4. The differentiator — a short prose block on why ex-OEM matters for the customer
5. Services — six cards
6. Sectors — five links
7. Selected work — the two Criticom engagements, briefly
8. Contact CTA

---

## 13. Admin panel (Filament v5)

Private. Two features only. Do not build a CMS — page content is in Blade, not the database.

### 13.1 Enquiries

Model `Enquiry`. Captures contact form submissions.

Fields: `name`, `company`, `email`, `phone`, `sector` (enum matching §11), `message`,
`status` (enum: new, read, replied, archived — default new), `notes` (text, internal),
`ip_address`, `created_at`.

Filament resource: table listing with status filter, default sort newest first, status
badge column, view page showing the full message, quick actions to mark read/replied/
archived, and an internal-notes field. No create action — enquiries only arrive via the
form. Dashboard widget showing count of new enquiries.

On submission: send a notification email to `support@criticom.net` using the `sync`
queue driver, plus an autoresponder to the enquirer. Both as Mailables with plain-text
alternatives. Wrap the send in a try/catch — a mail failure must never lose the database
record or show the user an error. Log failures.

### 13.2 Notes

Model `Note`. Hassan's private working space for ideas and opportunities.

Fields: `title`, `body` (long text, markdown), `type` (enum: idea, opportunity, contact,
reference), `tags` (JSON array), `status` (enum: active, parked, done), `value` (nullable
decimal — for opportunities), `next_action` (nullable string), `next_action_date`
(nullable date), `created_at`, `updated_at`.

Filament resource: full CRUD, filter by type and status, search across title and body,
markdown editor for body, tags input. Dashboard widget listing notes whose
`next_action_date` is within seven days.

### 13.3 Admin security

Required, not optional:

- Panel path is **not** `/admin` in production — use an unguessable segment set via
  `.env` (`FILAMENT_PATH`). Default it in config, never hardcode.
- Rate-limit the login route: 5 attempts per minute per IP.
- Force HTTPS in production via middleware.
- Set `SESSION_SECURE_COOKIE=true` and `SESSION_SAME_SITE=lax` in production config.
- Single admin user; no self-registration, no password reset route exposed publicly.
- Security headers middleware: `X-Frame-Options: DENY`, `X-Content-Type-Options: nosniff`,
  `Referrer-Policy: strict-origin-when-cross-origin`, and a Content-Security-Policy.
- Add a `robots.txt` disallowing the admin path, and `noindex` on admin responses.

> Add a visible one-line warning in the Notes create form: content is stored on shared
> hosting and should not include material under NDA or covered by client confidentiality.

---

## 14. Contact form

Fields: name (required), company, email (required, validated), phone, sector (select),
message (required, min 20 chars).

- Server-side validation with a Form Request. Show errors inline, preserve old input.
- **Honeypot field** plus a minimum-time-to-submit check. Do not add a CAPTCHA —
  it adds a third-party dependency and blocks some government networks.
- Rate-limit: 3 submissions per hour per IP.
- CSRF via the standard `@csrf` directive.
- On success, redirect back with a session flash. Do not use JS-only submission —
  the form must work without JavaScript.

---

## 15. Quality floor

Not optional, and not to be announced in comments:

- Responsive from 320px up. Test at 320, 768, 1024, 1440.
- Semantic HTML. One `h1` per page, correct heading order.
- Visible `:focus-visible` styles on every interactive element.
- All images have meaningful `alt`; decorative SVG gets `aria-hidden`.
- Colour contrast meets WCAG AA against the tokens in §4.
- `prefers-reduced-motion` respected.
- Per-page `<title>` and meta description; Open Graph tags; `Organization` JSON-LD on
  the home page using only facts from §5.
- `sitemap.xml` and `robots.txt`.
- No `console.log` in shipped JS. Minimal JS overall — this site should work almost
  entirely without it.

---

## 16. Build order

Work in this sequence and stop for review after each numbered step.

1. [x] Tailwind theme with §4 tokens, self-hosted fonts, base layout, header, footer
2. [x] Blade components: button, section heading, mono label, card, data cell, path-profile SVG
3. [x] Home page
4. [x] Services page
5. [x] Sector page template + the five sector pages
6. [x] Founder page
7. [x] Credentials page
8. [x] Contact page, form request, mailables, `Enquiry` model and migration
9. [x] Filament `EnquiryResource` + dashboard widget
10. [x] `Note` model, migration, `NoteResource` + dashboard widget
11. [x] Security middleware, headers, rate limiting, robots, sitemap
12. [ ] Accessibility and responsive pass — includes fixing the mobile hamburger menu (broken as of step 3)

After each step, list any `[TODO:]` markers you left so the developer can collect them.
