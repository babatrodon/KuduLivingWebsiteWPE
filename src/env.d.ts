// Secrets are set with `wrangler secret put`, so `wrangler types` cannot see them; declare them here.
declare namespace Cloudflare {
  interface Env {
    RESEND_API_KEY?: string;
  }
}
