<?php
/**
 * Template Name: Kudu — Collections
 *
 * Collections listing page — full-bleed hero with breadcrumb, intro copy,
 * filter bar, and a 4-column product grid. Re-skin of the reference
 * CategoryPage furniture listing, re-branded to Kudu Living.
 *
 * @package Kudu_Living
 */

get_header();

// Container matches the reference: centered, max 1440, responsive gutters.
$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// 12 products — Kudu African/nature-themed names, "Kudu Studio" designer line,
// £ prices. First three carry a "NEW" tag.
$kudu_products = array(
	array( 'name' => 'Kalahari Sofa',       'designer' => 'Kudu Studio', 'price' => '£4,290', 'image' => 'bebitalia_sofa_Tufty-Time_20_05.jpg',       'is_new' => true ),
	array( 'name' => 'Savanna Sofa',        'designer' => 'Kudu Studio', 'price' => '£3,980', 'image' => 'bebitalia_sofa_Charles_01.jpg',            'is_new' => true ),
	array( 'name' => 'Serengeti Sofa',      'designer' => 'Kudu Studio', 'price' => '£4,650', 'image' => 'bebitalia_sofa_Charles-Large_01.jpg',      'is_new' => true ),
	array( 'name' => 'Nyala Lounge Chair',  'designer' => 'Kudu Studio', 'price' => '£1,840', 'image' => 'bebitalia_armchair_Grande-Papilio_01.jpg', 'is_new' => false ),
	array( 'name' => 'Impala Armchair',     'designer' => 'Kudu Studio', 'price' => '£1,620', 'image' => 'bebitalia_armchair_Metropolitan_Relax_05.jpg', 'is_new' => false ),
	array( 'name' => 'Harbour Chair',       'designer' => 'Kudu Studio', 'price' => '£1,490', 'image' => 'bebitalia_armchair_Harbor_01.jpg',         'is_new' => false ),
	array( 'name' => 'Karoo Chair',         'designer' => 'Kudu Studio', 'price' => '£680',   'image' => 'bebitalia_chair_Jens_01.jpg',             'is_new' => false ),
	array( 'name' => 'Acacia Dining Table', 'designer' => 'Kudu Studio', 'price' => '£2,750', 'image' => 'bebitalia_table_Alex_01_7.jpg',            'is_new' => false ),
	array( 'name' => 'Thorn Table',         'designer' => 'Kudu Studio', 'price' => '£1,180', 'image' => 'bebitalia_small-table_Diesis_01.jpg',      'is_new' => false ),
	array( 'name' => 'Aloe Side Table',     'designer' => 'Kudu Studio', 'price' => '£540',   'image' => 'bebitalia_small-table_Surface_01.jpg',    'is_new' => false ),
	array( 'name' => 'Kudu Ottoman',        'designer' => 'Kudu Studio', 'price' => '£720',   'image' => 'bebitalia_ottoman_Hive_01.jpg',           'is_new' => false ),
	array( 'name' => 'Marula Wardrobe',     'designer' => 'Kudu Studio', 'price' => '£3,420', 'image' => 'bebitalia_wallsystem_Jack_01.jpg',        'is_new' => false ),
);

$kudu_product_url = kudu_url( 'product' );
?>

<main>

	<!-- HERO -->
	<section class="relative h-[480px] w-full bg-cover bg-center" style="background-image:url('<?php echo kudu_img( 'pages/sofas-hero.jpg' ); ?>')">
		<div class="absolute inset-0 bg-black/15"></div>
		<div class="<?php echo esc_attr( $kudu_container ); ?> relative flex h-full flex-col justify-between pt-[118px] pb-10">
			<nav class="text-[12px] font-medium tracking-[0.04em] text-bb-white">
				Home <span class="px-1 opacity-70">|</span> Collections
			</nav>
			<h1 class="font-serif text-[40px] font-bold leading-tight text-bb-white">Collections</h1>
		</div>
	</section>

	<!-- INTRO -->
	<section class="bg-bb-bg">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-[50px]">
			<p class="max-w-[820px] text-[16px] leading-relaxed text-bb-ink">
				Be inspired by Kudu Living furniture — pieces rooted in the natural forms and materials of southern Africa.
			</p>
			<h2 class="mt-6 font-serif text-[28px] font-bold text-kudu-navy">
				Furniture rooted in nature
			</h2>
			<p class="mt-5 max-w-[820px] text-[15px] leading-relaxed text-bb-ink">
				Every Kudu Living collection begins with the land — the grain of hard-wearing timber, the weight of stone,
				the honesty of woven fibre. Each piece is the result of an ongoing dialogue between our makers and the
				materials they work, combining natural textures, quiet craft and timeless proportion. The collection brings
				together enduring signatures and new introductions, conceived to furnish homes and considered spaces with
				the same uncompromising standards of comfort and craft.
			</p>
			<a href="<?php echo esc_url( $kudu_product_url ); ?>" class="mt-7 inline-block text-[12px] font-bold uppercase tracking-[0.12em] text-bb-ink hover:text-bb-red">
				Read more about COLLECTIONS &mdash;
			</a>
		</div>
	</section>

	<!-- FILTER BAR -->
	<div class="border-y border-bb-ink/15 bg-bb-white">
		<div class="<?php echo esc_attr( $kudu_container ); ?> flex flex-wrap items-center justify-between gap-y-3 py-4">
			<div class="flex flex-wrap items-center gap-x-6 gap-y-3 divide-x divide-bb-ink/15">
				<button type="button" class="flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-bb-ink">
					<span class="text-bb-grey">Room:</span>
					<span>ALL</span>
					<svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-3 w-3"><path d="m4 6 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
				</button>
				<div class="pl-6">
					<button type="button" class="flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-bb-ink">
						<span class="text-bb-grey">Category:</span>
						<span>ALL</span>
						<svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-3 w-3"><path d="m4 6 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
					</button>
				</div>
				<div class="pl-6">
					<button type="button" class="flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-bb-ink">
						<span class="text-bb-grey">Material:</span>
						<span>All</span>
						<svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-3 w-3"><path d="m4 6 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
					</button>
				</div>
			</div>
			<button type="button" class="flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-bb-ink">
				<span class="text-bb-grey">Sort By:</span>
				<span>Highlights</span>
				<svg viewBox="0 0 16 16" fill="none" aria-hidden="true" class="h-3 w-3"><path d="m4 6 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
			</button>
		</div>
	</div>

	<!-- PRODUCT GRID -->
	<section class="bg-bb-white">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-[40px]">
			<div class="grid grid-cols-2 gap-x-5 gap-y-10 md:grid-cols-3 lg:grid-cols-4">
				<?php foreach ( $kudu_products as $product ) : ?>
					<a href="<?php echo esc_url( $kudu_product_url ); ?>" class="group relative block bg-bb-white">
						<?php if ( ! empty( $product['is_new'] ) ) : ?>
							<span class="absolute left-0 top-0 z-10 bg-bb-ink px-2 py-1 text-[10px] font-bold uppercase tracking-[0.1em] text-bb-white">New</span>
						<?php endif; ?>
						<div class="flex items-center justify-center">
							<img src="<?php echo kudu_img( 'products/' . $product['image'] ); ?>" alt="<?php echo esc_attr( $product['name'] ); ?>" class="h-[220px] w-full object-contain transition-transform duration-300 group-hover:scale-[1.02]">
						</div>
						<h3 class="mt-4 font-serif text-[18px] font-bold text-bb-ink"><?php echo esc_html( $product['name'] ); ?></h3>
						<p class="mt-1 text-[14px] text-bb-grey"><?php echo esc_html( $product['designer'] ); ?></p>
						<p class="mt-3 text-[13px] uppercase tracking-[0.06em] text-bb-grey"><?php echo esc_html( $product['price'] ); ?></p>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
