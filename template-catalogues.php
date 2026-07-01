<?php
/**
 * Template Name: Kudu — Catalogues
 *
 * Catalogue library — a responsive grid of downloadable catalogue covers.
 * Re-skin of the reference CataloguesPage, re-branded to Kudu Living.
 *
 * @package Kudu_Living
 */

get_header();

// Container matches the rest of the theme: centered, max 1440, responsive gutters.
$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// Catalogue covers — portrait covers pulled from the theme image library.
$kudu_catalogues = array(
	array( 'title' => 'Indoor 2026',         'cover' => 'categories/indoor.jpg' ),
	array( 'title' => 'Outdoor 2026',        'cover' => 'categories/outdoor.jpg' ),
	array( 'title' => 'Savanna Collection',  'cover' => 'inspirations/scene-01.jpg' ),
	array( 'title' => 'Living & Day Systems','cover' => 'inspirations/scene-02.jpg' ),
	array( 'title' => 'Beds & Bedroom',      'cover' => 'inspirations/scene-03.jpg' ),
	array( 'title' => 'Tables & Storage',    'cover' => 'inspirations/scene-04.jpg' ),
	array( 'title' => 'Accessories & Light', 'cover' => 'inspirations/scene-05.jpg' ),
	array( 'title' => 'Contract Projects',   'cover' => 'sections/contract.jpg' ),
);
?>

<main class="bg-white pt-[100px] text-kudu-navy">
	<div class="<?php echo esc_attr( $kudu_container ); ?> py-[50px]">

		<h1 class="font-serif text-[36px] leading-tight text-kudu-navy">Catalogues</h1>
		<p class="mt-3 max-w-[640px] text-[16px] text-kudu-muted">
			Browse and download the latest Kudu Living catalogues — collections, contract work
			and inspiration, ready to keep.
		</p>

		<div class="mt-10 grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4">
			<?php foreach ( $kudu_catalogues as $catalogue ) : ?>
				<div class="flex flex-col">
					<div class="aspect-[3/4] w-full overflow-hidden bg-kudu-sand-soft">
						<img
							src="<?php echo kudu_img( $catalogue['cover'] ); ?>"
							alt="<?php echo esc_attr( $catalogue['title'] ); ?>"
							class="h-full w-full object-cover"
						>
					</div>
					<h2 class="mt-4 font-serif text-[18px] leading-snug text-kudu-navy">
						<?php echo esc_html( $catalogue['title'] ); ?>
					</h2>
					<a
						href="#"
						class="mt-2 inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-kudu-teal hover:text-kudu-navy"
					>
						Download PDF
						<?php echo kudu_icon( 'arrow-right', 'width="14" height="14"' ); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</main>

<?php
get_footer();
