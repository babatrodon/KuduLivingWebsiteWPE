# Kudu Living — WordPress Theme

A hand-coded WordPress theme that re-skins a rich, **B&B-Italia-style editorial furniture layout** into the **Kudu Living** brand — Cormorant Garamond + Avenir Next LT Pro, Comet Navy / Scooter Teal / warm-sand palette, kudu logo. It ships with a **hero carousel**, a **product-inspiration hotspot section**, a **mega-menu**, editable **Products** and **Projects**, and product + editorial templates.

Fonts and logos are bundled and the utility CSS is pre-compiled, so **no build step is required on the server**.

---

## One-click setup (client-ready)

1. **Zip the theme** so `style.css` is at the top level (name it `kudu-living.zip`). On Hostinger you can instead upload the folder to `wp-content/themes/kudu-living/` via **hPanel › File Manager**. (You don't need `node_modules/` or `build/`.)
2. **Appearance › Themes › Add New › Upload Theme** → Install → **Activate**.
   - **On activation the theme auto-creates everything**: 12 sample **Products**, 8 **Projects**, the collection categories, and the pages (About, Inspiration, Contract, Contact, Find a Store, Catalogues, Library) with their templates already assigned.
3. **Settings › Permalinks → Post name → Save** (this flushes the URLs so `/collections`, `/product/…`, etc. work).

That's it — the homepage, Collections listing, product pages, and every menu link work immediately with real, editable content.

---

## Editing content (in wp-admin)

- **Products** (left menu → *Products*): title, description (main editor), **Designer / Price / Category / "New" flag** (in the *Product details* box), and a **Featured Image**. The Collections grid at `/collections` and each `/product/…` page are generated from these.
- **Projects** (*Projects*): title, description, **Location / Category** (Residential · Hospitality · Workplace), and a Featured Image. These feed the **Inspiration** and **Contract** pages.
- **Images:** set a **Featured Image** on any product/project to replace its bundled placeholder photo. (Until you do, the demo image is used.)
- **Pages:** edit copy on About / Contact / etc. like any WordPress page. The homepage is `front-page.php`.
- **Menus / logo / colors:** the header nav is coded for the mega-menu; brand colors and fonts are tokens in `build/kudu.css` (see *Re-compiling* below).

---

## Imagery note

The furniture photography in `/assets/img/site/` is **placeholder imagery** used with permission while the site is built — **swap it for Kudu's own product/interior photos** before or after launch by setting Featured Images on the Products/Projects (or replacing the files in `/assets/img/site/…`, keeping the same names).

---

## What's in the theme

```
style.css                 WordPress theme header (metadata)
functions.php             Setup, enqueue, icon helper, Products/Projects CPTs,
                          editable fields, and the one-time content seeder
header.php / footer.php   Fixed navy header + mega-menu + drawer / footer
front-page.php            Homepage: hero carousel, product hotspots, collections
                          tiles, design service, contract banner, newsletter
archive-product.php       Collections listing (/collections) — from Products
single-product.php        Single product page — gallery, tabs, accordion, buy-bar
template-about.php        About / Our Story
template-inspiration.php  Inspiration — from Projects (demo fallback)
template-contract.php     Contract — from Projects (demo fallback)
template-contact.php      Contact (form + info)
template-storelocator.php · template-catalogues.php · template-library.php
page.php · index.php · 404.php   Branded fallbacks
assets/
  css/theme.css           Compiled Tailwind (Kudu-skinned)  ← loaded by the theme
  js/main.js              Carousel, hotspots, gallery, tabs, mega-menu, drawer
  fonts/                  Avenir Next LT Pro + Cormorant Garamond
  img/                    kudu logos (SVG) + site/ (placeholder photography)
build/kudu.css · package.json    Tailwind source + build scripts (dev only)
```

---

## Brand tokens

| Role                 | Hex        |
|----------------------|------------|
| Primary (Comet Navy) | `#202A44`  |
| Accent (Scooter Teal)| `#35C2D6`  |
| Japanese Indigo      | `#203E45`  |
| Warm Sand            | `#C4BFA3`  |
| Soft Sand            | `#E9E6DC`  |
| Deep Navy (footer)   | `#1A2238`  |
| Muted text           | `#6A7184`  |

Headings use **Cormorant Garamond**; body/nav/labels/buttons use **Avenir Next LT Pro** (both self-hosted).

---

## Re-compiling the CSS (only if you change classes or brand tokens)

```bash
npm install        # one-time
npm run build:css  # rebuild assets/css/theme.css   (or: npm run watch:css)
```

Edit brand colors/fonts in `build/kudu.css` and rebuild — every class re-skins from those values.

---

## Contact form

The contact form is static markup — connect it with a form plugin (Contact Form 7, WPForms, or Elementor Pro Forms).

*Rooted in Nature.*
