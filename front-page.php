<?php
/**
 * Front page (homepage) — hero carousel, product inspirations, collections,
 * bespoke, contract, newsletter. Re-skin of the reference furniture homepage.
 *
 * @package Kudu_Living
 */

get_header();

// Hero slides: [image, eyebrow, title, cta label, cta url].
$kudu_slides = array(
	array( 'hero/tufty-time.jpg',    'Signature Collection', 'The Savanna Kitchen',            'Discover the piece', kudu_url( 'product' ) ),
	array( 'hero/salone-marble.jpg', 'Rooted in Nature',     'Furniture that becomes the feeling of home.', 'Explore Collections', kudu_url( 'collections' ) ),
	array( 'hero/homepage-1.jpg',    'New This Season',      'Wood becomes atmosphere.',        'View the collection', kudu_url( 'collections' ) ),
	array( 'hero/cortina.jpg',       'Bespoke & Contract',   'Interiors crafted to last.',      'Start a project',    kudu_url( 'contract' ) ),
	array( 'hero/salone-26.jpg',     'The Studio',           'Meet the hands behind the wood.', 'Our story',          kudu_url( 'about' ) ),
);

// Inspiration scenes: image + hotspots [x%, y%, name, category, product image].
$kudu_scenes = array(
	array( 'img' => 'inspirations/scene-01.jpg', 'spots' => array(
		array( 34, 62, 'Kalahari Sofa', 'Sofas', 'products/bebitalia_sofa_Tufty-Time_20_05.jpg' ),
		array( 60, 70, 'Marula Side Table', 'Small Tables', 'products/bebitalia_small-table_Surface_01.jpg' ),
		array( 15, 55, 'Nyala Lounge Chair', 'Chairs', 'products/bebitalia_armchair_Grande-Papilio_01.jpg' ),
	) ),
	array( 'img' => 'inspirations/scene-02.jpg', 'spots' => array(
		array( 40, 60, 'Acacia Dining Table', 'Tables', 'products/bebitalia_table_Alex_01_7.jpg' ),
		array( 62, 64, 'Karoo Chair', 'Chairs', 'products/bebitalia_chair_Jens_01.jpg' ),
		array( 80, 58, 'Baobab Console', 'Storage', 'products/bebitalia_wallsystem_Jack_01.jpg' ),
	) ),
	array( 'img' => 'inspirations/scene-03.jpg', 'spots' => array(
		array( 33, 60, 'Savanna Sofa', 'Sofas', 'products/bebitalia_sofa_Charles-Large_01.jpg' ),
		array( 55, 66, 'Thorn Coffee Table', 'Small Tables', 'products/bebitalia_small-table_Diesis_01.jpg' ),
		array( 74, 62, 'Aloe Side Table', 'Small Tables', 'products/bebitalia_small-table_Frank_01.jpg' ),
	) ),
	array( 'img' => 'inspirations/scene-04.jpg', 'spots' => array(
		array( 36, 62, 'Spool Side Table', 'Small Tables', 'products/bebitalia_small-table_Spool_01.jpg' ),
		array( 58, 58, 'Metropolitan Chair', 'Chairs', 'products/bebitalia_armchair_Metropolitan_Relax_05.jpg' ),
		array( 78, 64, 'Cozy Table', 'Small Tables', 'products/bebitalia_small-table_Cozy_01.jpg' ),
	) ),
	array( 'img' => 'inspirations/scene-05.jpg', 'spots' => array(
		array( 35, 60, 'Charles Sofa', 'Sofas', 'products/bebitalia_sofa_Charles_01.jpg' ),
		array( 60, 64, 'Harbor Chair', 'Chairs', 'products/bebitalia_armchair_Harbor_01.jpg' ),
	) ),
);
?>

<main>

<!-- HERO CAROUSEL -->
<section data-kudu-carousel class="relative h-[70vh] min-h-[480px] w-full overflow-hidden bg-kudu-navy md:h-[771px]">
	<?php foreach ( $kudu_slides as $i => $s ) : ?>
		<div data-slide class="absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-700" style="background-image:url('<?php echo kudu_img( $s[0] ); ?>')">
			<div class="absolute inset-0 bg-gradient-to-t from-black/55 via-black/10 to-transparent"></div>
			<div class="absolute bottom-[90px] left-0 w-full md:bottom-[130px]">
				<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
					<p class="mb-3 text-[12px] font-bold uppercase tracking-[0.18em] text-kudu-teal"><?php echo esc_html( $s[1] ); ?></p>
					<h2 class="max-w-[18ch] font-serif text-[38px] leading-[1.05] text-white md:text-[56px]"><?php echo esc_html( $s[2] ); ?></h2>
					<a href="<?php echo esc_url( $s[4] ); ?>" class="mt-7 inline-flex h-[50px] items-center rounded-none bg-kudu-teal px-9 text-[12px] font-bold uppercase tracking-[1px] text-kudu-navy transition-colors hover:bg-white"><?php echo esc_html( $s[3] ); ?></a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="absolute bottom-[46px] left-0 z-20 w-full">
		<div class="mx-auto flex w-full max-w-[1440px] gap-3 px-5 md:px-[68px]">
			<?php foreach ( $kudu_slides as $i => $s ) : ?>
				<button data-dot type="button" class="h-2 w-2 rounded-full bg-white/50 transition-colors" aria-label="<?php echo esc_attr( 'Slide ' . ( $i + 1 ) ); ?>"></button>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- NEWSLETTER STRIP -->
<a href="<?php echo kudu_url( 'contact' ); ?>" class="flex h-[60px] items-center justify-center gap-2 bg-kudu-navy-deep text-[13px] font-bold uppercase tracking-[1.5px] text-white transition-opacity hover:opacity-80">
	Subscribe to our newsletter <?php echo kudu_icon( 'arrow-right', 'width="16" height="16"' ); ?>
</a>

<!-- PRODUCT INSPIRATIONS -->
<section data-kudu-inspo class="relative h-[60vh] min-h-[440px] w-full overflow-hidden bg-kudu-navy md:h-[738px]">
	<?php foreach ( $kudu_scenes as $si => $scene ) : ?>
		<div data-scene class="absolute inset-0 opacity-0 transition-opacity duration-500">
			<img src="<?php echo kudu_img( $scene['img'] ); ?>" alt="Kudu Living interior" class="h-full w-full object-cover">
			<?php foreach ( $scene['spots'] as $sp ) : ?>
				<div class="absolute" style="left:<?php echo (int) $sp[0]; ?>%;top:<?php echo (int) $sp[1]; ?>%">
					<button data-hotspot type="button" class="flex h-[30px] w-[30px] items-center justify-center rounded-full bg-white/85 text-kudu-navy shadow animate-[bb-hotspot-pulse_2.5s_ease-out_infinite] md:h-[34px] md:w-[34px]" aria-label="<?php echo esc_attr( $sp[2] ); ?>"><?php echo kudu_icon( 'plus', 'width="18" height="18"' ); ?></button>
					<div data-popup class="absolute left-1/2 top-[40px] hidden w-[180px] max-w-[70vw] -translate-x-1/2 bg-white text-left shadow-xl sm:w-[240px]">
						<img src="<?php echo kudu_img( $sp[4] ); ?>" alt="<?php echo esc_attr( $sp[2] ); ?>" class="h-[110px] w-full object-cover sm:h-[140px]">
						<div class="p-4">
							<div class="text-[11px] uppercase tracking-[1px] text-kudu-muted"><?php echo esc_html( $sp[3] ); ?></div>
							<div class="font-serif text-[18px] text-kudu-navy"><?php echo esc_html( $sp[2] ); ?></div>
							<a href="<?php echo kudu_url( 'product' ); ?>" class="mt-2 inline-flex items-center gap-1 text-[11px] font-bold uppercase tracking-[1px] text-kudu-navy hover:text-kudu-teal">Discover <?php echo kudu_icon( 'arrow-right', 'width="14" height="14"' ); ?></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>
	<div class="pointer-events-none absolute inset-x-0 top-0 z-20 bg-gradient-to-b from-black/40 to-transparent pb-16 pt-16">
		<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
			<h2 class="font-serif text-[24px] text-white md:text-[40px]">Pieces in their place</h2>
		</div>
	</div>
	<button data-inspo-prev type="button" class="absolute left-3 top-1/2 z-20 flex h-[44px] w-[44px] -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-kudu-navy shadow hover:bg-white md:left-6 md:h-[56px] md:w-[56px]" aria-label="Previous"><?php echo kudu_icon( 'chevron-left', 'width="22" height="22"' ); ?></button>
	<button data-inspo-next type="button" class="absolute right-3 top-1/2 z-20 flex h-[44px] w-[44px] -translate-y-1/2 items-center justify-center rounded-full bg-white/90 text-kudu-navy shadow hover:bg-white md:right-6 md:h-[56px] md:w-[56px]" aria-label="Next"><?php echo kudu_icon( 'chevron-right', 'width="22" height="22"' ); ?></button>
</section>

<!-- COLLECTIONS (Indoor / Outdoor tiles) -->
<section class="bg-kudu-sand-soft py-[60px]">
	<div class="mx-auto grid w-full max-w-[1440px] grid-cols-1 gap-5 px-5 md:grid-cols-2 md:px-[68px]">
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="group relative block aspect-[4/5] overflow-hidden">
			<img src="<?php echo kudu_img( 'categories/indoor.jpg' ); ?>" alt="Indoor" class="absolute inset-0 h-full w-full object-cover transition-transform duration-[600ms] group-hover:scale-105">
			<div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent"></div>
			<div class="absolute bottom-9 left-9 text-white">
				<div class="font-serif text-[40px] leading-none">Indoor</div>
				<div class="mt-3 inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[1px]">Discover indoor <?php echo kudu_icon( 'arrow-right', 'width="16" height="16"' ); ?></div>
			</div>
		</a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="group relative block aspect-[4/5] overflow-hidden">
			<img src="<?php echo kudu_img( 'categories/outdoor.jpg' ); ?>" alt="Outdoor" class="absolute inset-0 h-full w-full object-cover transition-transform duration-[600ms] group-hover:scale-105">
			<div class="absolute inset-0 bg-gradient-to-t from-black/45 to-transparent"></div>
			<div class="absolute bottom-9 left-9 text-white">
				<div class="font-serif text-[40px] leading-none">Outdoor</div>
				<div class="mt-3 inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[1px]">Discover outdoor <?php echo kudu_icon( 'arrow-right', 'width="16" height="16"' ); ?></div>
			</div>
		</a>
	</div>
</section>

<!-- BESPOKE / DESIGN SERVICE -->
<section class="bg-kudu-bg py-[40px]">
	<div class="mx-auto grid w-full max-w-[1440px] grid-cols-1 items-center gap-10 px-5 md:px-[68px] lg:grid-cols-2">
		<div>
			<p class="text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-teal">Design Service</p>
			<h2 class="mt-5 font-serif text-[34px] leading-[1.1] text-kudu-navy">Ready to redefine the way you live?</h2>
			<p class="mt-6 max-w-[52ch] text-[15px] leading-relaxed text-kudu-muted">Our design team helps you shape spaces with natural materials and quiet, considered detailing — a bespoke, one-to-one consultation, in the showroom or at your project, from a single piece to a full interior.</p>
			<a href="<?php echo kudu_url( 'contact' ); ?>" class="mt-8 inline-flex h-[50px] items-center rounded-none bg-kudu-navy px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-kudu-navy-deep">Book an appointment</a>
		</div>
		<div>
			<img src="<?php echo kudu_img( 'sections/design-service.jpg' ); ?>" alt="Kudu Living design service" class="h-auto w-full object-contain">
		</div>
	</div>
</section>

<!-- CONTRACT BANNER -->
<section class="relative h-[592px] min-h-[420px] w-full overflow-hidden">
	<img src="<?php echo kudu_img( 'sections/contract.jpg' ); ?>" alt="Kudu Living contract project" class="absolute inset-0 h-full w-full object-cover">
	<div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent"></div>
	<div class="absolute bottom-[110px] left-0 w-full">
		<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
			<p class="mb-3 text-[12px] font-bold uppercase tracking-[0.12em] text-white">Projects</p>
			<h2 class="max-w-[16ch] font-serif text-[38px] leading-[1.1] text-white md:text-[46px]">Interiors for homes, hotels &amp; workplaces</h2>
			<a href="<?php echo kudu_url( 'contract' ); ?>" class="mt-7 inline-flex h-[50px] items-center rounded-none border border-white/90 px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-white hover:text-kudu-navy">Explore contract</a>
		</div>
	</div>
</section>

<!-- NEWSLETTER CTA -->
<section class="bg-kudu-indigo py-[46px] text-white">
	<div class="mx-auto flex w-full max-w-[1440px] flex-col gap-6 px-5 md:flex-row md:items-center md:justify-between md:px-[68px]">
		<div>
			<h3 class="font-serif text-[30px] leading-tight text-white">Join the Kudu Living world</h3>
			<p class="mt-2 max-w-[46ch] text-[14px] text-white/85">New collections, stories of craft and showroom invitations — straight to your inbox.</p>
		</div>
		<a href="<?php echo kudu_url( 'contact' ); ?>" class="inline-flex h-[50px] w-max items-center rounded-none bg-kudu-teal px-9 text-[12px] font-bold uppercase tracking-[1px] text-kudu-navy transition-colors hover:bg-white">Subscribe now</a>
	</div>
</section>

</main>

<?php
get_footer();
