<?php
/**
 * Template Name: Kudu — Makers
 * @package Kudu_Living
 */

get_header();
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero__bg"></div>
  <img class="hero__symbol" src="<?php echo kudu_asset( 'img/kudu-symbol-white.svg' ); ?>" alt="" style="opacity:.12">
  <div class="wrap">
    <p class="crumbs">Home / Makers</p>
    <h1 class="reveal">The hands behind<br>the wood.</h1>
    <p class="lead mt-2 reveal" style="color:rgba(255,255,255,.82);max-width:56ch">Kudu Living is a small studio of makers and designers. We work wood the slow way — by hand, with patience, and with respect for the material.</p>
  </div>
</section>

<!-- INTRO -->
<section class="section wrap center">
  <p class="eyebrow reveal">Our studio</p>
  <h2 class="reveal mt-1" style="max-width:20ch;margin-inline:auto">A few people, a lot of care</h2>
  <p class="lead reveal mt-2" style="margin-inline:auto">We keep our team small on purpose. It means every piece passes through hands that know it from the first cut to the final coat of oil.</p>
</section>

<!-- MAKERS GRID -->
<section class="section wrap" style="padding-top:0">
  <div class="makers">
    <div class="maker reveal"><div class="por"><div class="ph ph--wood"></div></div><h3>Thandiwe Mokoena</h3><div class="role">Lead Maker</div><p>Twenty years of joinery. Builds every kitchen frame from first cut to final oil.</p></div>
    <div class="maker reveal"><div class="por"><div class="ph ph--indigo"></div></div><h3>Sebastian Vos</h3><div class="role">Design Director</div><p>Shapes the quiet, modern lines that define each Kudu Living collection.</p></div>
    <div class="maker reveal"><div class="por"><div class="ph ph--sand"></div></div><h3>Amara Okafor</h3><div class="role">Materials &amp; Finishes</div><p>Sources responsibly grown timber and the natural oils we finish by hand.</p></div>
    <div class="maker reveal"><div class="por"><div class="ph ph--govbay"></div></div><h3>Daniel Reyes</h3><div class="role">Upholstery</div><p>Hand-tailors every sofa and chair, from frame webbing to final stitch.</p></div>
    <div class="maker reveal"><div class="por"><div class="ph ph--navy"></div></div><h3>Lerato Dube</h3><div class="role">Workshop Lead</div><p>Keeps the bench moving and the standard high across every order.</p></div>
    <div class="maker reveal"><div class="por"><div class="ph ph--pattern"></div></div><h3>Mia Bianchi</h3><div class="role">Bespoke Projects</div><p>Translates client briefs into pieces made to measure for any space.</p></div>
  </div>
</section>

<!-- PHILOSOPHY SPLIT -->
<section class="split">
  <div class="media"><div class="ph ph--wood" style="height:100%"></div></div>
  <div class="body band">
    <p class="eyebrow reveal">How we work</p>
    <h2 class="reveal mt-1" style="color:#fff">One maker, one piece, start to finish</h2>
    <p class="reveal mt-2" style="color:rgba(255,255,255,.82)">No assembly line. Each piece is built by a single maker who signs their work. It takes longer. It is the only way we know how to make furniture worth keeping.</p>
    <div class="mt-3 reveal"><a href="<?php echo kudu_url( 'collections' ); ?>" class="btn btn--light">See their work</a></div>
  </div>
</section>

<!-- MATERIALS -->
<section class="section wrap">
  <p class="eyebrow reveal center">Materials &amp; finishes</p>
  <h2 class="reveal center mt-1" style="margin-inline:auto;max-width:22ch">Honest materials, finished by hand</h2>
  <div class="values mt-3">
    <div class="value reveal"><div class="n">01</div><h4>Solid Oak</h4><p>European oak, responsibly grown and slow-dried for stability.</p></div>
    <div class="value reveal"><div class="n">02</div><h4>Natural Oils</h4><p>Hand-applied finishes that protect the wood and let it breathe.</p></div>
    <div class="value reveal"><div class="n">03</div><h4>Brushed Brass</h4><p>Warm metal detailing that ages gracefully with use.</p></div>
    <div class="value reveal"><div class="n">04</div><h4>Wool &amp; Linen</h4><p>Natural upholstery fabrics in our brand's warm palette.</p></div>
  </div>
</section>

<!-- CTA -->
<section class="news section">
  <div class="wrap center">
    <p class="eyebrow reveal">Work with us</p>
    <h2 class="reveal mt-1" style="margin-inline:auto;max-width:18ch">Have a piece in mind? Let's make it.</h2>
    <div class="mt-3 reveal"><a href="<?php echo kudu_url( 'contact' ); ?>" class="btn btn--light">Start a bespoke project</a></div>
  </div>
</section>

<?php
get_footer();
