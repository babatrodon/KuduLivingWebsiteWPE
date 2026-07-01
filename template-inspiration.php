<?php
/**
 * Template Name: Kudu — Inspiration
 * @package Kudu_Living
 */

get_header();
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero__bg"></div>
  <div class="wrap">
    <p class="crumbs">Home / Inspiration</p>
    <h1 class="reveal">Pieces in<br>their place.</h1>
    <p class="lead mt-2 reveal" style="color:rgba(255,255,255,.82);max-width:54ch">Our furniture lives in homes, hotels, restaurants and workplaces. Here is how designers and clients put Kudu Living to work.</p>
  </div>
</section>

<!-- FILTERS -->
<section class="section wrap" style="padding-bottom:0">
  <div class="filters reveal">
    <span class="chip is-active">All projects</span>
    <span class="chip">Residential</span>
    <span class="chip">Hospitality</span>
    <span class="chip">Workplace</span>
    <span class="chip">Retail</span>
  </div>
</section>

<!-- GALLERY -->
<section class="section wrap" style="padding-top:36px">
  <div class="gallery-grid">
    <a href="#" class="gal big reveal"><div class="ph ph--wood"></div><div class="lab"><div class="t">Cape Villa</div><div class="s">Residential · Full interior</div></div></a>
    <a href="#" class="gal small reveal"><div class="ph ph--indigo"></div><div class="lab"><div class="t">The Oak Room</div><div class="s">Hospitality · Restaurant</div></div></a>
    <a href="#" class="gal tall reveal"><div class="ph ph--navy"></div><div class="lab"><div class="t">Studio Loft</div><div class="s">Workplace</div></div></a>
    <a href="#" class="gal wide reveal"><div class="ph ph--sand"></div><div class="lab"><div class="t">Garden House</div><div class="s">Residential · Kitchen</div></div></a>
    <a href="#" class="gal third reveal"><div class="ph ph--govbay"></div><div class="lab"><div class="t">Harbour Suite</div><div class="s">Hospitality · Hotel</div></div></a>
    <a href="#" class="gal third reveal"><div class="ph ph--pattern"></div><div class="lab"><div class="t">The Reading Room</div><div class="s">Retail</div></div></a>
    <a href="#" class="gal third reveal"><div class="ph ph--wood"></div><div class="lab"><div class="t">Hillside Home</div><div class="s">Residential</div></div></a>
    <a href="#" class="gal wide reveal"><div class="ph ph--indigo"></div><div class="lab"><div class="t">Atelier Café</div><div class="s">Hospitality</div></div></a>
    <a href="#" class="gal small reveal"><div class="ph ph--sand"></div><div class="lab"><div class="t">North Office</div><div class="s">Workplace</div></div></a>
  </div>
  <div class="center mt-3 reveal"><a href="#" class="btn btn--ghost">Load more projects</a></div>
</section>

<!-- QUOTE BAND -->
<section class="band section">
  <div class="wrap">
    <p class="eyebrow reveal">Why designers choose us</p>
    <p class="quote reveal mt-2">A single statement piece or a full fit-out — made to measure, made to last.</p>
  </div>
</section>

<!-- CTA -->
<section class="band--indigo section">
  <div class="wrap center">
    <p class="eyebrow reveal">For trade &amp; designers</p>
    <h2 class="reveal mt-1" style="margin-inline:auto;max-width:22ch">Bring Kudu Living into your next project</h2>
    <div class="mt-3 reveal"><a href="<?php echo kudu_url( 'contact' ); ?>" class="btn btn--light">Talk to our contract team</a></div>
  </div>
</section>

<?php
get_footer();
