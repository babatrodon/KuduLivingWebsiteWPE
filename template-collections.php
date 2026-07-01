<?php
/**
 * Template Name: Kudu — Collections
 * @package Kudu_Living
 */

get_header();
?>

<!-- PAGE HERO -->
<section class="page-hero">
  <div class="page-hero__bg"></div>
  <div class="wrap">
    <p class="crumbs">Home / Collections</p>
    <h1 class="reveal">The Collections</h1>
    <p class="lead mt-2 reveal" style="color:rgba(255,255,255,.82);max-width:54ch">Six families of furniture, all built on the same belief — natural materials, refined detail and lasting comfort.</p>
  </div>
</section>

<!-- LISTING -->
<section class="section wrap">
  <div class="filters reveal">
    <span class="chip is-active">All</span>
    <span class="chip">Kitchen</span>
    <span class="chip">Wardrobe</span>
    <span class="chip">Closet</span>
    <span class="chip">Sofas</span>
    <span class="chip">Chairs</span>
    <span class="chip">Tables</span>
  </div>

  <div class="grid cols-4">
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><span class="tag">New</span><div class="ph ph--wood"></div></div><div class="info"><div class="name">Savanna Kitchen</div><div class="line"><span class="cat">Kitchen</span><span class="price">From £9,500</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--navy"></div></div><div class="info"><div class="name">Marula Wardrobe</div><div class="line"><span class="cat">Wardrobe</span><span class="price">£3,200</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--indigo"></div></div><div class="info"><div class="name">Bushveld Closet</div><div class="line"><span class="cat">Closet</span><span class="price">£2,750</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><span class="tag">New</span><div class="ph ph--sand"></div></div><div class="info"><div class="name">Kalahari Sofa</div><div class="line"><span class="cat">Sofas</span><span class="price">£2,400</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--govbay"></div></div><div class="info"><div class="name">Nyala Lounge Chair</div><div class="line"><span class="cat">Chairs</span><span class="price">£780</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--wood"></div></div><div class="info"><div class="name">Acacia Dining Table</div><div class="line"><span class="cat">Tables</span><span class="price">£1,850</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--pattern"></div></div><div class="info"><div class="name">Thornwood Island</div><div class="line"><span class="cat">Kitchen</span><span class="price">£4,100</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--sand"></div></div><div class="info"><div class="name">Drift Armchair</div><div class="line"><span class="cat">Chairs</span><span class="price">£640</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><span class="tag">Bespoke</span><div class="ph ph--indigo"></div></div><div class="info"><div class="name">Riverbend Wardrobe</div><div class="line"><span class="cat">Wardrobe</span><span class="price">From £3,900</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--navy"></div></div><div class="info"><div class="name">Plains Coffee Table</div><div class="line"><span class="cat">Tables</span><span class="price">£560</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--govbay"></div></div><div class="info"><div class="name">Horizon Sofa</div><div class="line"><span class="cat">Sofas</span><span class="price">£2,980</span></div></div></a>
    <a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--wood"></div></div><div class="info"><div class="name">Walk-in Closet System</div><div class="line"><span class="cat">Closet</span><span class="price">From £5,200</span></div></div></a>
  </div>

  <div class="center mt-3 reveal"><a href="#" class="btn btn--ghost">Load more</a></div>
</section>

<!-- CTA BAND -->
<section class="band--indigo section">
  <div class="wrap center">
    <p class="eyebrow reveal">Can't find the exact piece?</p>
    <h2 class="reveal mt-1" style="margin-inline:auto;max-width:20ch">Every Kudu Living piece can be made bespoke.</h2>
    <div class="mt-3 reveal"><a href="<?php echo kudu_url( 'contact' ); ?>" class="btn btn--light">Talk to our makers</a></div>
  </div>
</section>

<?php
get_footer();
