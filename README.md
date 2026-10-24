# Kudu Living — website

The Kudu Living site, built with **Astro 7** and deployed to **Cloudflare Workers**.
All pages are prerendered static HTML; the only server code is the contact-form endpoint, which sends enquiries through **Resend**.

This replaces the former WordPress theme (last WordPress version: commit `d9090d6`). The markup, class names, compiled CSS and front-end script were carried over unchanged, so the pages render identically.

## Commands

```bash
npm install        # once
npm run dev        # local dev server on http://localhost:4321
npm run build      # build to dist/
npm run preview    # build + run the production Worker locally
npm run deploy     # build + deploy to Cloudflare
npm run check      # type-check
```

Requires Node 22+.

## Editing content

| What | Where |
|---|---|
| Products (Collections grid + `/product/<slug>/` pages) | `src/data/products.json` |
| Projects (Inspiration, Contract, `/project/<slug>/` pages) | `src/data/projects.json` |
| Page copy | the matching file in `src/pages/` (e.g. `about.astro`, `contact.astro`) |
| Header menus / footer | `src/components/Header.astro`, `src/components/Footer.astro` |
| Images | `public/assets/img/site/…` (reference them as `/assets/img/site/…`) |

**Products** — each entry: `slug` (URL), `title`, `designer`, `price`, `category`, `isNew` (shows the "New" badge), `image`, `description` (blank line = new paragraph).
The order in the file is the order on the Collections page, and the **first product** is the one the homepage "Discover the piece" and hotspot links open.

**Projects** — each entry: `slug`, `title`, `location`, `category` (Residential / Hospitality / Workplace), `image`, `description`.
Inspiration shows the first 6, Contract the first 8.

To add a product: copy an entry, give it a unique `slug`, drop its photo into `public/assets/img/site/products/`, point `image` at it, then commit + push (or `npm run deploy`).

## Contact form (Resend)

`src/pages/api/contact.ts` validates the form and emails it via the Resend API (with the visitor's address as reply-to). A hidden honeypot field filters basic bots.

Configuration:

- `CONTACT_TO` / `CONTACT_FROM` — in `wrangler.jsonc` → `vars`. `CONTACT_FROM` must use a domain verified in Resend (add the DNS records Resend shows for `kuduliving.com`).
- `RESEND_API_KEY` — a secret, never committed:
  ```bash
  npx wrangler secret put RESEND_API_KEY
  ```
  For local testing put `RESEND_API_KEY=...` in a `.dev.vars` file (git-ignored).

Until the key is set the form shows "Sorry, your message could not be sent. Please email hello@kuduliving.com."

## Styling

`public/assets/css/theme.css` is the compiled Tailwind 4 stylesheet; brand tokens and fonts live in `tailwind/kudu.css`.
If you use a utility class that isn't in the stylesheet yet, rebuild it:

```bash
npm run build:css
```

Brand: Comet Navy `#202A44`, Scooter Teal `#35C2D6`, Japanese Indigo `#203E45`, Warm Sand `#C4BFA3`, Soft Sand `#E9E6DC`. Headings Cormorant Garamond, body Avenir Next LT Pro (self-hosted in `public/assets/fonts/`).

## Deployment

`npm run deploy` publishes the Worker `kudu-living` (static assets + `/api/contact/`) to `https://kudu-living.<account>.workers.dev`.
To deploy automatically on every push, connect this repo under **Cloudflare dashboard → Workers & Pages → kudu-living → Settings → Builds** (build command `npm run build`, deploy command `npx wrangler deploy`).
To serve it on `kuduliving.com`, add a custom domain on the same Worker (Settings → Domains & Routes) once the domain's DNS is on Cloudflare.

## Imagery note

The furniture photography in `public/assets/img/site/` is placeholder imagery from the B&B Italia reference design. Replace it with Kudu's own photos before the site goes public.

*Rooted in Nature.*
