<?php
/**
 * Archive: Product (Collections)
 *
 * Collections listing page for the `product` custom post type — served
 * automatically by WordPress at the product archive (/collections). Mirrors
 * template-collections.php's layout (full-bleed hero with breadcrumb, intro
 * copy, filter bar, 4-column product grid), but drives the grid from the main
 * WordPress loop over the product CPT instead of a hardcoded array.
 *
 * @package Kudu_Living
 */

get_header();

// Container matches the reference: centered, max 1440, responsive gutters.
$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

$kudu_collections_url = kudu_url( 'collections' );
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
			<a href="<?php echo esc_url( $kudu_collections_url ); ?>" class="mt-7 inline-block text-[12px] font-bold uppercase tracking-[0.12em] text-bb-ink hover:text-bb-red">
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
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();

						$kudu_designer = get_post_meta( get_the_ID(), '_kudu_designer', true );
						$kudu_price    = get_post_meta( get_the_ID(), '_kudu_price', true );
						$kudu_category = get_post_meta( get_the_ID(), '_kudu_category', true );
						$kudu_is_new   = get_post_meta( get_the_ID(), '_kudu_is_new', true );
						?>
						<a href="<?php the_permalink(); ?>" class="group relative block bg-bb-white">
							<?php if ( $kudu_is_new ) : ?>
								<span class="absolute left-0 top-0 z-10 bg-bb-ink px-2 py-1 text-[10px] font-bold uppercase tracking-[0.1em] text-bb-white">New</span>
							<?php endif; ?>
							<div class="flex items-center justify-center">
								<img src="<?php echo kudu_product_image(); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="h-[220px] w-full object-contain transition-transform duration-300 group-hover:scale-[1.02]">
							</div>
							<h3 class="mt-4 font-serif text-[18px] font-bold text-bb-ink"><?php the_title(); ?></h3>
							<p class="mt-1 text-[14px] text-bb-grey"><?php echo esc_html( $kudu_designer ); ?></p>
							<?php if ( $kudu_category ) : ?>
								<p class="mt-1 text-[12px] uppercase tracking-[0.08em] text-bb-grey"><?php echo esc_html( $kudu_category ); ?></p>
							<?php endif; ?>
							<p class="mt-3 text-[13px] uppercase tracking-[0.06em] text-bb-grey"><?php echo esc_html( $kudu_price ); ?></p>
						</a>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
