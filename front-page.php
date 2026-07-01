<?php
/**
 * Front page (homepage).
 *
 * @package Kudu_Living
 */

get_header();
?>

<!-- HERO -->
<section class="hero">
	<div class="hero__bg"></div>
	<img class="hero__symbol" src="<?php echo kudu_asset( 'img/kudu-symbol-white.svg' ); ?>" alt="">
	<div class="wrap hero__inner">
		<p class="eyebrow reveal">Rooted in Nature</p>
		<h1 class="display reveal">Furniture that becomes<br>the feeling of home.</h1>
		<p class="lead mt-2 reveal" style="color:rgba(255,255,255,.85)">We design and craft pieces where natural beauty, practical function and lasting quality come together — for homes, offices and spaces that deserve character.</p>
		<div class="mt-3 reveal">
			<a href="<?php echo kudu_url( 'collections' ); ?>" class="btn btn--light">Explore Collections</a>
			<a href="<?php echo kudu_url( 'about' ); ?>" class="link-arrow" style="margin-left:22px">Our Story &rarr;</a>
		</div>
	</div>
	<span class="hero__scroll">Scroll</span>
</section>

<!-- INTRO STRIP -->
<section class="section wrap center">
	<p class="eyebrow reveal">Kudu Living</p>
	<h2 class="reveal mt-1" style="max-width:18ch;margin-inline:auto">Wood becomes furniture. Furniture becomes atmosphere.</h2>
	<p class="lead reveal mt-2" style="margin-inline:auto">From homes and offices to hotels, restaurants and commercial interiors, our goal is always the same — to bring comfort and natural elegance into every space.</p>
</section>

<!-- CATEGORY GRID -->
<section class="bleed" style="padding-bottom:var(--section)">
	<div class="grid cols-3">
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--wood"></div><div class="cap"><div><span class="meta">01</span><h3>Kitchen</h3></div><span class="meta">View &rarr;</span></div></a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--navy"></div><div class="cap"><div><span class="meta">02</span><h3>Wardrobe</h3></div><span class="meta">View &rarr;</span></div></a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--indigo"></div><div class="cap"><div><span class="meta">03</span><h3>Closet</h3></div><span class="meta">View &rarr;</span></div></a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--sand"></div><div class="cap"><div><span class="meta">04</span><h3>Sofas</h3></div><span class="meta">View &rarr;</span></div></a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--govbay"></div><div class="cap"><div><span class="meta">05</span><h3>Chairs</h3></div><span class="meta">View &rarr;</span></div></a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="cat-card reveal"><div class="ph ph--pattern"></div><div class="cap"><div><span class="meta">06</span><h3>Tables</h3></div><span class="meta">View &rarr;</span></div></a>
	</div>
</section>

<!-- SPLIT FEATURE -->
<section class="split">
	<div class="media"><div class="ph ph--wood" style="height:100%"></div></div>
	<div class="body band--sand">
		<p class="eyebrow reveal">Signature Piece</p>
		<h2 class="reveal mt-1">The Savanna Kitchen</h2>
		<p class="reveal mt-2">Solid oak, hand-finished surfaces and quiet, considered detailing. A kitchen built around how people really live — to cook, gather and slow down.</p>
		<div class="mt-3 reveal"><a href="<?php echo kudu_url( 'product' ); ?>" class="btn">Discover the piece</a></div>
	</div>
</section>

<!-- EDITORIAL QUOTE BAND -->
<section class="band section">
	<div class="wrap">
		<p class="eyebrow reveal">Our Belief</p>
		<p class="quote reveal mt-2">Furniture shapes how people live, feel, work and connect with the spaces around them.</p>
	</div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="section wrap">
	<div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:42px" class="reveal">
		<div><p class="eyebrow">New This Season</p><h2 class="mt-1">Featured pieces</h2></div>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="link-arrow">All products &rarr;</a>
	</div>
	<div class="grid cols-4">
		<a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><span class="tag">New</span><div class="ph ph--sand"></div></div><div class="info"><div class="name">Kalahari Sofa</div><div class="line"><span class="cat">Sofas</span><span class="price">£2,400</span></div></div></a>
		<a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--wood"></div></div><div class="info"><div class="name">Acacia Dining Table</div><div class="line"><span class="cat">Tables</span><span class="price">£1,850</span></div></div></a>
		<a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><div class="ph ph--navy"></div></div><div class="info"><div class="name">Nyala Lounge Chair</div><div class="line"><span class="cat">Chairs</span><span class="price">£780</span></div></div></a>
		<a href="<?php echo kudu_url( 'product' ); ?>" class="product reveal"><div class="frame"><span class="tag">Bespoke</span><div class="ph ph--indigo"></div></div><div class="info"><div class="name">Marula Wardrobe</div><div class="line"><span class="cat">Wardrobe</span><span class="price">£3,200</span></div></div></a>
	</div>
</section>

<!-- VALUES -->
<section class="band--sand section">
	<div class="wrap">
		<p class="eyebrow reveal center">What we stand for</p>
		<div class="values mt-3">
			<div class="value reveal"><div class="n">01</div><h4>Craftsmanship</h4><p>Precise production and refined design in every joint and surface.</p></div>
			<div class="value reveal"><div class="n">02</div><h4>Authenticity</h4><p>Natural materials, honest construction, timeless form.</p></div>
			<div class="value reveal"><div class="n">03</div><h4>Sustainability</h4><p>Responsibly sourced wood and pieces built to last generations.</p></div>
			<div class="value reveal"><div class="n">04</div><h4>Comfort</h4><p>Furniture designed around the way people truly live.</p></div>
		</div>
	</div>
</section>

<!-- SPLIT REVERSE -->
<section class="split split--reverse">
	<div class="media"><div class="ph ph--pattern" style="height:100%"></div></div>
	<div class="body">
		<p class="eyebrow reveal">Bespoke &amp; Contract</p>
		<h2 class="reveal mt-1">Interiors for homes, hotels &amp; workplaces</h2>
		<p class="reveal mt-2">We partner with designers, architects and brands to deliver wood-based interiors at any scale — from a single statement piece to a full commercial fit-out.</p>
		<div class="mt-3 reveal"><a href="<?php echo kudu_url( 'contact' ); ?>" class="btn btn--ghost">Start a project</a></div>
	</div>
</section>

<!-- MAKERS -->
<section class="section wrap">
	<div class="center" style="max-width:60ch;margin-inline:auto">
		<p class="eyebrow reveal">The hands behind the wood</p>
		<h2 class="reveal mt-1">Meet our makers &amp; designers</h2>
		<p class="lead reveal mt-2" style="margin-inline:auto">Every Kudu Living piece is shaped by people who care about grain, joint and finish. A small studio of makers and designers working wood the slow way.</p>
	</div>
	<div class="makers mt-3">
		<div class="maker reveal"><div class="por"><div class="ph ph--wood"></div></div><h3>Thandiwe Mokoena</h3><div class="role">Lead Maker</div><p>Twenty years of joinery, from frame to final oil.</p></div>
		<div class="maker reveal"><div class="por"><div class="ph ph--indigo"></div></div><h3>Sebastian Vos</h3><div class="role">Design Director</div><p>Shapes the quiet, modern lines of every collection.</p></div>
		<div class="maker reveal"><div class="por"><div class="ph ph--sand"></div></div><h3>Amara Okafor</h3><div class="role">Materials &amp; Finishes</div><p>Sources responsibly grown timber and natural oils.</p></div>
	</div>
	<div class="center mt-3 reveal"><a href="<?php echo kudu_url( 'makers' ); ?>" class="btn btn--ghost">Meet the studio</a></div>
</section>

<!-- INSPIRATION -->
<section class="band--sand section">
	<div class="wrap">
		<div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:36px" class="reveal">
			<div><p class="eyebrow">Inspiration</p><h2 class="mt-1">Pieces in their place</h2></div>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="link-arrow">View all projects &rarr;</a>
		</div>
		<div class="gallery-grid">
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="gal big reveal"><div class="ph ph--wood"></div><div class="lab"><div class="t">Cape Villa</div><div class="s">Residential · Full interior</div></div></a>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="gal small reveal"><div class="ph ph--indigo"></div><div class="lab"><div class="t">The Oak Room</div><div class="s">Hospitality</div></div></a>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="gal third reveal"><div class="ph ph--navy"></div><div class="lab"><div class="t">Studio Loft</div><div class="s">Workplace</div></div></a>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="gal third reveal"><div class="ph ph--govbay"></div><div class="lab"><div class="t">Garden House</div><div class="s">Residential</div></div></a>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="gal third reveal"><div class="ph ph--pattern"></div><div class="lab"><div class="t">Harbour Suite</div><div class="s">Hospitality</div></div></a>
		</div>
	</div>
</section>

<!-- JOURNAL -->
<section class="section wrap">
	<div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:42px" class="reveal">
		<div><p class="eyebrow">Journal</p><h2 class="mt-1">Stories of craft</h2></div>
		<a href="#" class="link-arrow">Read the journal &rarr;</a>
	</div>
	<div class="journal">
		<a href="#" class="story reveal"><div class="img"><div class="ph ph--wood"></div></div><div class="k">Craft · 4 min</div><h3>Why we still oil by hand</h3><p>The slow finish that lets wood breathe and age beautifully.</p></a>
		<a href="#" class="story reveal"><div class="img"><div class="ph ph--indigo"></div></div><div class="k">Sustainability · 6 min</div><h3>Where our timber comes from</h3><p>Tracing every plank back to a responsibly managed forest.</p></a>
		<a href="#" class="story reveal"><div class="img"><div class="ph ph--sand"></div></div><div class="k">Design · 5 min</div><h3>Designing the Savanna Kitchen</h3><p>How a single brief became our most-loved collection.</p></a>
	</div>
</section>

<!-- NEWSLETTER -->
<section class="news section">
	<div class="wrap">
		<p class="eyebrow reveal">Stay close</p>
		<h2 class="reveal mt-1" style="max-width:16ch">Join the Kudu Living world</h2>
		<p class="reveal mt-2">New collections, stories of craft and showroom invitations — straight to your inbox.</p>
		<form class="row reveal" onsubmit="return false">
			<input type="email" placeholder="Your email address" aria-label="Email">
			<button class="btn btn--light" type="submit">Subscribe</button>
		</form>
	</div>
</section>

<?php
get_footer();
