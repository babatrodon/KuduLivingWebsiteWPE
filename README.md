# Kudu Living — WordPress Theme

A hand-coded WordPress theme that re-skins a rich, **B&B-Italia-style editorial furniture layout** into the **Kudu Living** brand system — Cormorant Garamond + Avenir Next LT Pro, Comet Navy / Scooter Teal / warm-sand palette, kudu logo. It ships with a **hero carousel**, a **product-inspiration hotspot section**, a **mega-menu**, and product + editorial page templates.

Fonts and logos are bundled; the utility CSS is pre-compiled to `assets/css/theme.css`, so **no build step is required on the server** — it's a normal theme you upload and activate.

---

## ⚠️ Placeholder imagery — replace before going live

The furniture photography bundled in `/assets/img/site/` is **placeholder imagery only** (sourced while prototyping the layout). It is **not licensed for Kudu Living's use** and must be **replaced with Kudu's own product/interior photography** before the site is published. Swap the files in `/assets/img/site/…` (keep the same filenames) or edit the image paths in the templates. The logos, fonts, colors, and copy are all Kudu.

---

## Install on WordPress (Hostinger or any host)

1. **Zip the theme** so `style.css` is at the top level of the zip (name it `kudu-living.zip`). On Hostinger you can instead upload the folder to `wp-content/themes/kudu-living/` via **hPanel › File Manager**.
   - You do **not** need to include `node_modules/` or `build/` — only the theme files. (They're git-ignored anyway.)
2. **Appearance › Themes › Add New › Upload Theme** → choose the zip → **Install** → **Activate**.
3. **Settings › Permalinks → Post name** → Save.

### Create the pages (2 minutes)

The homepage renders automatically from `front-page.php`. For the inner pages, create a Page for each and assign its template under **Page Attributes › Template**:

| Page title  | Slug          | Template            |
|-------------|---------------|---------------------|
| Collections | `collections` | Kudu — Collections  |
| Product     | `product`     | Kudu — Product      |
| About       | `about`       | Kudu — About        |
| Inspiration | `inspiration` | Kudu — Inspiration  |
| Contract    | `contract`    | Kudu — Contract     |
| Contact     | `contact`     | Kudu — Contact      |

The header, mega-menu and footer links resolve by slug, so once those pages exist the navigation connects automatically. (Until a page exists, its link falls back to `/{slug}/`.)

---

## What's in the theme

```
style.css                 WordPress theme header (metadata)
functions.php             Setup, asset enqueue, kudu_icon() SVG helper, kudu_url()/kudu_img()
header.php                Fixed navy header, mega-menu (About / Collections), mobile drawer
footer.php                Footer
front-page.php            Homepage: hero carousel, newsletter strip, product hotspots,
                          collections tiles, design service, contract banner, newsletter CTA
template-collections.php  Collections listing (hero, filters, product grid)
template-product.php      Product detail (gallery, sticky tabs, accordion, sticky buy-bar)
template-about.php        About / Our Story (timeline)
template-inspiration.php  Inspiration (quote hero, filters, project grid)
template-contract.php     Contract (hero, projects grid, CTA)
template-contact.php      Contact (form + info)
page.php · index.php · 404.php   Branded fallbacks
assets/
  css/theme.css           Compiled Tailwind (Kudu-skinned)  ← loaded by the theme
  js/main.js              Carousel, hotspots, gallery, tabs, mega-menu, header, drawer
  fonts/                  Avenir Next LT Pro + Cormorant Garamond
  img/                    kudu logos (SVG) + site/ (placeholder photography)
build/kudu.css            Tailwind source (only needed to re-compile the CSS)
package.json              Build scripts (dev only)
```

---

## Brand tokens

| Role                 | Hex        |
|----------------------|------------|
| Primary (Comet Navy) | `#202A44`  |
| Accent (Scooter Teal)| `#35C2D6`  |
| Japanese Indigo      | `#203E45`  |
| Governor Bay         | `#4552A3`  |
| Warm Sand            | `#C4BFA3`  |
| Soft Sand            | `#E9E6DC`  |
| Deep Navy (footer)   | `#1A2238`  |
| Muted text           | `#6A7184`  |

Headings use **Cormorant Garamond**; body, nav, labels and buttons use **Avenir Next LT Pro**. Both are self-hosted (`@font-face`).

---

## Re-compiling the CSS (only if you change templates/classes)

The visual styling is compiled from `build/kudu.css` (Tailwind v4) to `assets/css/theme.css`. If you add new utility classes in the PHP templates, rebuild it:

```bash
npm install        # one-time (installs Tailwind CLI locally)
npm run build:css  # regenerates assets/css/theme.css
# or: npm run watch:css   (rebuild on save)
```

To change brand colors or fonts, edit the tokens in `build/kudu.css` and rebuild — every class re-skins from those values.

---

## Contact form

The contact form is **static markup**. Wire it to a form plugin (Contact Form 7, WPForms, or Elementor Pro Forms) and connect it to your email.

---

*Rooted in Nature.*
