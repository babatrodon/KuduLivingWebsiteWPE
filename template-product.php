<?php
/**
 * Template Name: Kudu — Product
 * @package Kudu_Living
 */
get_header();

$kudu_gallery = array(
	'hero/tufty-time.jpg',
	'products/bebitalia_sofa_Tufty-Time_20_05.jpg',
	'inspirations/scene-01.jpg',
	'inspirations/scene-03.jpg',
);
?>

<main class="pt-[100px]">
	<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
		<!-- Breadcrumb -->
		<nav class="pt-6 text-[13px] text-kudu-muted">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> <span class="px-1">|</span>
			<a href="<?php echo kudu_url( 'collections' ); ?>">Collections</a> <span class="px-1">|</span>
			Sofas <span class="px-1">|</span> Savanna Sofa
		</nav>

		<!-- Title + meta -->
		<div class="relative mt-6 text-center">
			<h1 class="font-serif text-[36px] text-kudu-navy">Savanna Sofa</h1>
			<div class="mt-2 text-[15px] leading-7 text-kudu-muted">Kudu Studio<br>2026<br>Sofas</div>
		</div>
	</div>

	<!-- Gallery -->
	<section data-kudu-gallery class="mx-auto mt-6 w-full max-w-[1440px] px-5 md:px-[68px]">
		<div class="flex h-[460px] items-center justify-center overflow-hidden bg-white">
			<img data-gallery-main src="<?php echo kudu_img( $kudu_gallery[0] ); ?>" alt="Savanna Sofa" class="h-full w-full object-contain">
		</div>
		<div class="mt-4 grid grid-cols-4 gap-4">
			<?php foreach ( $kudu_gallery as $k => $g ) : ?>
				<button data-thumb data-img="<?php echo kudu_img( $g ); ?>" type="button" class="aspect-square overflow-hidden bg-kudu-sand-soft <?php echo 0 === $k ? 'ring-2 ring-kudu-navy' : ''; ?>">
					<img src="<?php echo kudu_img( $g ); ?>" alt="View <?php echo (int) ( $k + 1 ); ?>" class="h-full w-full object-cover">
				</button>
			<?php endforeach; ?>
		</div>
	</section>

	<!-- Sticky tab nav -->
	<nav data-kudu-tabs class="sticky top-[100px] z-30 mt-12 hidden border-y border-kudu-line bg-white md:block">
		<div class="mx-auto flex w-full max-w-[1440px] justify-between px-5 py-4 text-[13px] uppercase tracking-[0.5px] md:px-[68px]">
			<button data-tab="description" type="button" class="text-kudu-navy">Description</button>
			<button data-tab="inspiration" type="button" class="text-kudu-muted">Inspiration</button>
			<button data-tab="dimensions" type="button" class="text-kudu-muted">Dimensions</button>
			<button data-tab="materials" type="button" class="text-kudu-muted">Materials &amp; finishes</button>
			<button data-tab="designer" type="button" class="text-kudu-muted">Designer</button>
		</div>
	</nav>

	<!-- Description + Technical -->
	<section class="mx-auto w-full max-w-[1440px] px-5 py-[50px] md:px-[68px]">
		<div class="grid gap-12 lg:grid-cols-2">
			<div data-tabpanel="description">
				<h2 class="font-serif text-[28px] text-kudu-navy">Description</h2>
				<p class="mt-5 max-w-[56ch] text-[15px] leading-relaxed text-kudu-muted">The Savanna Sofa is built around how people really live — solid oak frame, hand-finished surfaces and deep, generous seating in natural, tactile fabrics. A quiet, modular piece designed to cook, gather and slow down around, and to age beautifully over the years.</p>
			</div>
			<div class="border-t border-kudu-line" data-tabpanel="dimensions">
				<details class="border-b border-kudu-line" open>
					<summary class="flex cursor-pointer list-none items-center justify-between py-[18px] font-semibold text-kudu-navy">Technical information <span>+</span></summary>
					<div class="pb-5 text-[14px] text-kudu-muted">
						<div class="flex justify-between border-b border-kudu-line py-3"><span>Designer</span><span>Kudu Studio</span></div>
						<div class="flex justify-between border-b border-kudu-line py-3"><span>Year</span><span>2026</span></div>
						<div class="flex justify-between border-b border-kudu-line py-3"><span>Typology</span><span>Sofas</span></div>
						<div class="flex justify-between py-3"><span>Frame</span><span>Solid oak</span></div>
					</div>
				</details>
				<details class="border-b border-kudu-line" data-tabpanel="materials">
					<summary class="flex cursor-pointer list-none items-center justify-between py-[18px] font-semibold text-kudu-navy">Materials &amp; finishes <span>+</span></summary>
					<p class="pb-5 text-[14px] text-kudu-muted">Solid oak, natural oils, wool and linen upholstery. Responsibly sourced timber, finished by hand.</p>
				</details>
				<details class="border-b border-kudu-line" data-tabpanel="designer">
					<summary class="flex cursor-pointer list-none items-center justify-between py-[18px] font-semibold text-kudu-navy">Care &amp; delivery <span>+</span></summary>
					<p class="pb-5 text-[14px] text-kudu-muted">Delivered and installed by our team. Wipe with a soft, dry cloth; re-oil surfaces yearly to keep the wood breathing.</p>
				</details>
			</div>
		</div>
	</section>
</main>

<!-- Sticky bottom bar -->
<div class="fixed bottom-0 left-0 right-0 z-40 border-t border-kudu-line bg-white">
	<div class="mx-auto flex w-full max-w-[1440px] items-center justify-between px-5 py-3 md:px-[68px]">
		<div class="flex items-center gap-3">
			<img src="<?php echo kudu_img( 'products/bebitalia_sofa_Tufty-Time_20_05.jpg' ); ?>" alt="Savanna Sofa" class="h-12 w-12 object-cover">
			<div>
				<div class="font-serif text-[16px] font-semibold text-kudu-navy">Savanna Sofa</div>
				<div class="text-[13px] text-kudu-muted">Sofas</div>
			</div>
		</div>
		<a href="<?php echo kudu_url( 'contact' ); ?>" class="inline-flex h-[50px] items-center rounded-none bg-kudu-navy px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-kudu-navy-deep">Find the nearest showroom</a>
	</div>
</div>

<?php
get_footer();
