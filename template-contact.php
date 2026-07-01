<?php
/**
 * Template Name: Kudu — Contact
 * @package Kudu_Living
 */

get_header();
?>

<section class="page-hero">
  <div class="page-hero__bg"></div>
  <div class="wrap">
    <p class="crumbs">Home / Contact</p>
    <h1 class="reveal">Let's create something<br>made to last.</h1>
    <p class="lead mt-2 reveal" style="color:rgba(255,255,255,.82);max-width:52ch">Tell us about your space or project. Our makers and designers will be in touch within two working days.</p>
  </div>
</section>

<!-- CONTACT -->
<section class="section wrap">
  <div class="grid cols-2" style="gap:clamp(32px,6vw,90px);align-items:start">
    <!-- form -->
    <form class="reveal" onsubmit="return false">
      <p class="eyebrow">Send a message</p>
      <h2 class="mt-1" style="margin-bottom:28px">Start the conversation</h2>
      <div class="grid cols-2" style="gap:18px">
        <div class="field"><label>First name</label><input type="text" placeholder="Jane"></div>
        <div class="field"><label>Last name</label><input type="text" placeholder="Doe"></div>
      </div>
      <div class="field"><label>Email</label><input type="email" placeholder="jane@email.com"></div>
      <div class="field"><label>I'm interested in</label>
        <select><option>Kitchen</option><option>Wardrobe</option><option>Closet</option><option>Sofas</option><option>Chairs</option><option>Tables</option><option>Bespoke / contract project</option></select>
      </div>
      <div class="field"><label>Message</label><textarea rows="5" placeholder="Tell us about your space, timeline and ideas..."></textarea></div>
      <button class="btn" type="submit">Send enquiry</button>
    </form>

    <!-- info -->
    <div class="reveal">
      <p class="eyebrow">Visit &amp; reach us</p>
      <h2 class="mt-1" style="margin-bottom:28px">Showroom &amp; studio</h2>
      <div class="info-list">
        <div><div class="k">Showroom</div><p>123 Craft Lane<br>London, EC1 2AB<br>United Kingdom</p></div>
        <div><div class="k">Opening hours</div><p>Monday – Friday, 9:00 – 18:00<br>Saturday, 10:00 – 16:00</p></div>
        <div><div class="k">Email</div><p>hello@kuduliving.com</p></div>
        <div><div class="k">Phone</div><p>+44 (0)20 1234 5678</p></div>
        <div><div class="k">Trade &amp; contract</div><p>trade@kuduliving.com</p></div>
      </div>
      <div style="margin-top:30px;aspect-ratio:16/9;overflow:hidden"><div class="ph ph--pattern" style="height:100%"></div></div>
    </div>
  </div>
</section>

<!-- BAND -->
<section class="band--indigo section">
  <div class="wrap center">
    <p class="eyebrow reveal">Rooted in Nature</p>
    <p class="quote reveal mt-2" style="margin-inline:auto">Every great space starts with a conversation.</p>
  </div>
</section>

<?php
get_footer();
