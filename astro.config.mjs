// @ts-check
import { defineConfig } from "astro/config";
import cloudflare from "@astrojs/cloudflare";

// Pages are prerendered to static HTML; only /api/contact runs on the Worker.
export default defineConfig({
  site: "https://kuduliving.com",
  output: "static",
  trailingSlash: "always",
  build: { format: "directory" },
  // No sessions needed; stops the adapter auto-provisioning a KV namespace.
  session: false,
  // Keep source whitespace between inline elements (e.g. breadcrumb separators), as the original theme rendered it.
  compressHTML: false,
  adapter: cloudflare({ imageService: "passthrough" }),
});
