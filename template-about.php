<?php
/**
 * Template Name: Kudu — About
 * @package Kudu_Living
 */

get_header();
?>

<section class="page-hero">
	<div class="page-hero__bg"></div>
	<img class="hero__symbol" src="<?php echo kudu_asset( 'img/kudu-symbol-white.svg' ); ?>" alt="" style="opacity:.12">
	<div class="wrap">
		<p class="crumbs">Home / About</p>
		<h1 class="reveal">Rooted in nature,<br>built for living.</h1>
		<p class="lead mt-2 reveal" style="color:rgba(255,255,255,.82);max-width:56ch">Kudu Living is a furniture and wood industry company dedicated to creating spaces that feel warm, elegant and truly livable.</p>
	</div>
</section>

<!-- STORY -->
<section class="section wrap">
	<div class="grid cols-2" style="align-items:center;gap:clamp(28px,5vw,72px)">
		<div class="reveal">
			<p class="eyebrow">Our story</p>
			<h2 class="mt-1">Furniture that shapes how people live</h2>
		</div>
		<div class="reveal">
			<p>We design and produce furniture that combines natural beauty, practical function and long-lasting quality. Inspired by modern living and timeless craftsmanship, we bring together selected materials, precise production and refined design to create pieces defined by detail, comfort and lasting visual appeal.</p>
			<p class="mt-2">From homes and offices to hotels, restaurants and commercial interiors, our goal is always the same — to bring character, comfort and natural elegance into every space.</p>
		</div>
	</div>
</section>

<!-- IMAGE BAND -->
<section class="split">
	<div class="media"><div class="ph ph--wood" style="height:100%"></div></div>
	<div class="body band">
		<p class="eyebrow reveal">Our mission</p>
		<h2 class="reveal mt-1" style="color:#fff">Quality furniture, more meaningful spaces</h2>
		<p class="reveal mt-2" style="color:rgba(255,255,255,.82)">We create furniture and wood-based interiors that bring warmth, comfort and character to everyday spaces — helping people experience their homes, workplaces and surroundings in a more meaningful way.</p>
	</div>
</section>

<!-- VALUES -->
<section class="section wrap">
	<p class="eyebrow reveal center">What we stand for</p>
	<h2 class="reveal center mt-1" style="margin-inline:auto;max-width:20ch">Four values in every piece we make</h2>
	<div class="values mt-3">
		<div class="value reveal"><div class="n">01</div><h4>Craftsmanship</h4><p>Precise production and refined design in every joint and surface.</p></div>
		<div class="value reveal"><div class="n">02</div><h4>Authenticity</h4><p>Natural materials, honest construction, timeless form.</p></div>
		<div class="value reveal"><div class="n">03</div><h4>Sustainability</h4><p>Responsibly sourced wood and pieces built to last generations.</p></div>
		<div class="value reveal"><div class="n">04</div><h4>Comfort</h4><p>Furniture designed around the way people truly live.</p></div>
	</div>
</section>

<!-- VISION QUOTE -->
<section class="band--sand section">
	<div class="wrap center">
		<p class="eyebrow reveal">Our vision</p>
		<p class="quote reveal mt-2" style="margin-inline:auto;color:var(--navy)">A brand that goes beyond production — one that inspires people to see furniture as part of a larger lifestyle.</p>
	</div>
</section>

<!-- CTA -->
<section class="news section">
	<div class="wrap center">
		<p class="eyebrow reveal">Come and see</p>
		<h2 class="reveal mt-1" style="margin-inline:auto;max-width:18ch">Visit our showroom or start a project</h2>
		<div class="mt-3 reveal"><a href="<?php echo kudu_url( 'contact' ); ?>" class="btn btn--light">Get in touch</a></div>
	</div>
</section>

<?php
get_footer();
