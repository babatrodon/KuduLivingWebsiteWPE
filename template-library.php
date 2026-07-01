<?php
/**
 * Template Name: Kudu — Library
 *
 * Resource library — a grid of downloadable technical resources for
 * professionals. Re-skin of the reference LibraryPage, re-branded to Kudu
 * Living.
 *
 * @package Kudu_Living
 */

get_header();

// Container matches the rest of the theme: centered, max 1440, responsive gutters.
$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// Resource cards.
$kudu_resources = array(
	array(
		'title'       => 'Product datasheets',
		'description' => 'Detailed technical specifications for every piece in the collection.',
	),
	array(
		'title'       => '2D / 3D files',
		'description' => 'CAD drawings and 3D models ready to drop straight into your project.',
	),
	array(
		'title'       => 'Care & maintenance',
		'description' => 'Guidance on cleaning, upkeep and preserving each material over time.',
	),
	array(
		'title'       => 'Certifications',
		'description' => 'Fire, environmental and quality certifications for contract use.',
	),
	array(
		'title'       => 'Material samples',
		'description' => 'Request fabric, leather and timber swatches delivered to your studio.',
	),
	array(
		'title'       => 'BIM objects',
		'description' => 'Parametric BIM components for Revit and ArchiCAD workflows.',
	),
);
?>

<main class="bg-white pt-[100px] text-kudu-navy">
	<div class="<?php echo esc_attr( $kudu_container ); ?> py-[50px]">

		<h1 class="font-serif text-[36px] leading-tight text-kudu-navy">Library</h1>
		<p class="mt-3 max-w-[640px] text-[16px] text-kudu-muted">
			Technical resources, certifications and 3D models for architects, designers and
			specifiers working with Kudu Living.
		</p>

		<div class="mt-10 grid grid-cols-1 gap-6 md:grid-cols-3">
			<?php foreach ( $kudu_resources as $resource ) : ?>
				<div class="flex flex-col border border-kudu-line bg-white p-8 shadow">
					<h2 class="font-serif text-[18px] leading-snug text-kudu-navy">
						<?php echo esc_html( $resource['title'] ); ?>
					</h2>
					<p class="mt-3 flex-1 text-[14px] leading-relaxed text-kudu-muted">
						<?php echo esc_html( $resource['description'] ); ?>
					</p>
					<a
						href="#"
						class="mt-6 inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.08em] text-kudu-teal hover:text-kudu-navy"
					>
						Download
						<?php echo kudu_icon( 'arrow-right', 'width="14" height="14"' ); ?>
					</a>
				</div>
			<?php endforeach; ?>
		</div>

	</div>
</main>

<?php
get_footer();
