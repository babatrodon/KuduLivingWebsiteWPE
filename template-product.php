<?php
/**
 * Template Name: Kudu — Product
 * @package Kudu_Living
 */
$GLOBALS['kudu_solid_header'] = true;
get_header();
?>

<!-- PRODUCT -->
<section class="section wrap" style="padding-top:clamp(120px,16vw,180px)">
  <p class="crumbs" style="color:var(--muted);margin-bottom:26px">Home / Collections / Kitchen / Savanna Kitchen</p>
  <div class="pd">
    <!-- gallery -->
    <div class="gallery reveal">
      <div class="main"><div class="ph ph--wood"></div></div>
      <div class="thumbs">
        <div class="t"><div class="ph ph--wood"></div></div>
        <div class="t"><div class="ph ph--navy"></div></div>
        <div class="t"><div class="ph ph--sand"></div></div>
        <div class="t"><div class="ph ph--indigo"></div></div>
      </div>
    </div>
    <!-- meta -->
    <div class="meta reveal">
      <p class="eyebrow">Kitchen Collection</p>
      <h1 class="mt-1">Savanna Kitchen</h1>
      <div class="price">From £9,500</div>
      <p>Built around how people really live — to cook, gather and slow down. Solid oak frames, hand-finished surfaces and brushed-brass detailing, made to order in our workshop.</p>

      <p class="eyebrow mt-3" style="color:var(--muted)">Finish</p>
      <div class="swatches">
        <span class="swatch" style="background:#6b4f37" title="Natural Oak"></span>
        <span class="swatch" style="background:#202a44" title="Comet Navy"></span>
        <span class="swatch" style="background:#203e45" title="Japanese Indigo"></span>
        <span class="swatch" style="background:#c4bfa3" title="Warm Sand"></span>
      </div>

      <div class="mt-2" style="display:flex;gap:14px;flex-wrap:wrap">
        <a href="<?php echo kudu_url('contact'); ?>" class="btn">Request a quote</a>
        <a href="<?php echo kudu_url('contact'); ?>" class="btn btn--ghost">Book a consultation</a>
      </div>

      <table class="spec">
        <tr><td>Materials</td><td>Solid European oak, brushed brass</td></tr>
        <tr><td>Finish</td><td>Hand-oiled, four colourways</td></tr>
        <tr><td>Lead time</td><td>8–10 weeks, made to order</td></tr>
        <tr><td>Origin</td><td>Designed &amp; crafted in-house</td></tr>
      </table>

      <div class="accordion">
        <details open><summary>Craftsmanship <span>+</span></summary><p>Each kitchen is built by a single maker from frame to finish, with traditional joinery and precise, modern production.</p></details>
        <details><summary>Care <span>+</span></summary><p>Wipe with a soft, damp cloth. Re-oil surfaces once a year to keep the grain rich and protected.</p></details>
        <details><summary>Delivery &amp; installation <span>+</span></summary><p>White-glove delivery and full installation by our team, included on all kitchen projects.</p></details>
      </div>
    </div>
  </div>
</section>

<!-- DETAIL STORY -->
<section class="band section">
  <div class="wrap">
    <p class="eyebrow reveal">The detail</p>
    <p class="quote reveal mt-2">Wood becomes furniture. Furniture becomes atmosphere. And atmosphere becomes the feeling of home.</p>
  </div>
</section>

<!-- RELATED -->
<section class="section wrap">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:42px" class="reveal">
    <h2>You may also like</h2>
    <a href="<?php echo kudu_url('collections'); ?>" class="link-arrow">All products &rarr;</a>
  </div>
  <div class="grid cols-4">
    <a href="<?php echo kudu_url('product'); ?>" class="product reveal"><div class="frame"><div class="ph ph--pattern"></div></div><div class="info"><div class="name">Thornwood Island</div><div class="line"><span class="cat">Kitchen</span><span class="price">£4,100</span></div></div></a>
    <a href="<?php echo kudu_url('product'); ?>" class="product reveal"><div class="frame"><div class="ph ph--wood"></div></div><div class="info"><div class="name">Acacia Dining Table</div><div class="line"><span class="cat">Tables</span><span class="price">£1,850</span></div></div></a>
    <a href="<?php echo kudu_url('product'); ?>" class="product reveal"><div class="frame"><div class="ph ph--navy"></div></div><div class="info"><div class="name">Nyala Lounge Chair</div><div class="line"><span class="cat">Chairs</span><span class="price">£780</span></div></div></a>
    <a href="<?php echo kudu_url('product'); ?>" class="product reveal"><div class="frame"><div class="ph ph--sand"></div></div><div class="info"><div class="name">Kalahari Sofa</div><div class="line"><span class="cat">Sofas</span><span class="price">£2,400</span></div></div></a>
  </div>
</section>

<?php get_footer();
