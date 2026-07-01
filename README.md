# Kudu Living — WordPress Theme

A custom, hand-coded WordPress theme for **Kudu Living** (furniture & wood-based interiors). It renders the Kudu brand design — editorial *B&B-Italia-style* layout in the Kudu system (Cormorant Garamond + Avenir Next LT Pro, Comet Navy `#202A44` / Scooter Teal `#35C2D6` / warm-sand palette) with a sticky mega-menu, product & editorial page templates, and a mobile drawer.

The theme is **self-contained** (brand fonts and logos are bundled) and works on the free **Hello Elementor / Elementor** stack or entirely standalone.

---

## What's in the repo (this repo *is* the theme)

```
style.css              Theme header + full design system + @font-face
functions.php          Setup, asset enqueue, helpers (kudu_url, kudu_asset)
header.php             <head>, sticky header + mega-menu, mobile drawer
footer.php             Footer + wp_footer
front-page.php         Homepage
page.php               Generic branded page (fallback)
index.php              Blog/archive/search fallback (Journal styling)
404.php                Branded 404
template-collections.php   "Kudu — Collections"  (products listing)
template-product.php       "Kudu — Product"      (single product)
template-about.php         "Kudu — About"
template-contact.php       "Kudu — Contact"
template-makers.php        "Kudu — Makers"
template-inspiration.php   "Kudu — Inspiration"
assets/
  fonts/               Avenir Next LT Pro (.otf) + Cormorant Garamond (.ttf)
  img/                 Kudu logos (SVG) + brand patterns
  main.js              Header scroll state, reveal-on-scroll, drawer, gallery
screenshot.png         Theme thumbnail (Appearance › Themes)
```

---

## Install on WordPress (Hostinger or any host)

1. **Zip the theme.** Zip the *contents of this repo* so that `style.css` sits at the top level of the zip (name it `kudu-living.zip`).
   - On Hostinger you can also upload the folder directly via **hPanel › File Manager** into `wp-content/themes/kudu-living/`.
2. In WordPress: **Appearance › Themes › Add New › Upload Theme** → choose the zip → **Install** → **Activate**.
3. **Settings › Permalinks** → choose **Post name** → Save (so the pretty page URLs work).

### Create the pages (2 minutes)

The homepage renders automatically from `front-page.php`. For the inner pages, create a Page for each and assign its template under **Page Attributes › Template**:

| Page title  | Slug (Permalink) | Template to assign   |
|-------------|------------------|----------------------|
| Collections | `collections`    | Kudu — Collections   |
| Product     | `product`        | Kudu — Product       |
| About       | `about`          | Kudu — About         |
| Contact     | `contact`        | Kudu — Contact       |
| Makers      | `makers`         | Kudu — Makers        |
| Inspiration | `inspiration`    | Kudu — Inspiration   |

> The navigation links resolve by slug, so once the pages above exist with these slugs, the header, mega-menu and footer links all connect automatically. (Until a page exists, its link falls back to `/{slug}/`.)

Optional: **Settings › Reading › Your homepage displays → A static page** and pick a "Home" page if you prefer an explicit home Page (not required — `front-page.php` already handles the site root).

---

## Fonts

Both brand typefaces are **bundled and self-hosted** via `@font-face` in `style.css` — nothing to configure:

- **Avenir Next LT Pro** — Regular 400, Medium 500, Demi 600, Bold 700 (body, labels, buttons, nav)
- **Cormorant Garamond** — Light 300, Regular 400, Medium 500, SemiBold 600 (all headings)

*(Avenir Next LT Pro is a licensed font — the `.otf` files here are from your brand kit. Keep them within your licensed use.)*

---

## Photography (placeholders)

Per the brand build guide, image areas currently use **brand color-block placeholders** (`.ph--wood`, `.ph--sand`, `.ph--navy`, `.ph--indigo`, `.ph--govbay`, `.ph--pattern`). To use real photography, replace a placeholder `<div class="ph ph--wood"></div>` with an `<img>` (or set a `background-image`) in the relevant template file — or fork these sections in Elementor. Shoot warm, natural, wood-grain images: soft light, clean composition, quiet mood.

---

## Contact form

The contact form in `template-contact.php` is **static markup**. Wire it up with a form plugin (Contact Form 7, WPForms, or Elementor Pro Forms) or point it at your handler — then connect it to your email.

---

## Brand tokens (for reference)

| Role                 | Hex        |
|----------------------|------------|
| Primary (Comet Navy) | `#202A44`  |
| Accent (Scooter Teal)| `#35C2D6`  |
| Japanese Indigo      | `#203E45`  |
| Governor Bay         | `#4552A3`  |
| Warm Sand            | `#C4BFA3`  |
| Soft Sand            | `#E9E6DC`  |
| Hairline             | `#E2E0D8`  |
| Muted text           | `#6A7184`  |
| Paper / background   | `#FFFFFF`  |

All tokens are CSS custom properties in `:root` (`style.css`) — change once, updates everywhere.

---

## Editing in Elementor (optional)

The theme is Elementor-compatible. Activate Hello Elementor's stack alongside it if you want to rebuild specific pages with the Elementor editor — the global colors and fonts above map directly to the tokens in this theme. The coded templates remain the pixel-perfect reference.

---

*Rooted in Nature.*
