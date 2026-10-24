/* Contact form endpoint — validates the enquiry and emails it to the studio via Resend.
   Config (wrangler.jsonc vars / secrets): RESEND_API_KEY (secret), CONTACT_TO, CONTACT_FROM. */
import type { APIRoute } from "astro";
import { env } from "cloudflare:workers";

export const prerender = false;

const MAX_LENGTH = 5000;
const EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

const field = (data: FormData, key: string) => String(data.get(key) ?? "").trim().slice(0, MAX_LENGTH);

export const POST: APIRoute = async ({ request }) => {
  const wantsJson = (request.headers.get("accept") ?? "").includes("application/json");
  const reply = (status: number, message: string) =>
    wantsJson
      ? Response.json({ message }, { status })
      : new Response(null, { status: 303, headers: { Location: "/contact/" } });

  let data: FormData;
  try {
    data = await request.formData();
  } catch {
    return reply(400, "Please fill in the form and try again.");
  }

  // Bots fill the hidden "company" field; pretend success so they move on.
  if (field(data, "company")) return reply(200, "Thank you — we will be in touch soon.");

  const firstName = field(data, "first_name");
  const lastName = field(data, "last_name");
  const email = field(data, "email");
  const interest = field(data, "interest") || "General enquiry";
  const message = field(data, "message");

  if (!firstName || !message || !EMAIL_PATTERN.test(email)) {
    return reply(400, "Please add your first name, a valid email and a message.");
  }

  const { RESEND_API_KEY, CONTACT_TO, CONTACT_FROM } = env;
  if (!RESEND_API_KEY || !CONTACT_TO || !CONTACT_FROM) {
    console.error("Contact form is not configured: set RESEND_API_KEY, CONTACT_TO and CONTACT_FROM.");
    return reply(500, "Sorry, your message could not be sent. Please email hello@kuduliving.com.");
  }

  const name = [firstName, lastName].filter(Boolean).join(" ");
  const res = await fetch("https://api.resend.com/emails", {
    method: "POST",
    headers: { Authorization: `Bearer ${RESEND_API_KEY}`, "Content-Type": "application/json" },
    body: JSON.stringify({
      from: CONTACT_FROM,
      to: CONTACT_TO.split(",").map((addr) => addr.trim()),
      reply_to: email,
      subject: `Website enquiry: ${interest} — ${name}`,
      text: `Name: ${name}\nEmail: ${email}\nInterested in: ${interest}\n\n${message}`,
    }),
  });

  if (!res.ok) {
    console.error("Resend rejected the contact email", res.status, await res.text());
    return reply(502, "Sorry, your message could not be sent. Please email hello@kuduliving.com.");
  }

  return reply(200, "Thank you — we will be in touch soon.");
};
