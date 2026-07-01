<?php
/**
 * Template Name: Kudu — Inspiration
 *
 * Inspiration page — re-skin of the reference "Be Inspired" editorial page:
 * dark quote hero (under the fixed 100px header), static filter chips, and a
 * two-column editorial grid of Kudu project cards.
 *
 * @package Kudu_Living
 */

get_header();

// Filter chips — static, styled; first one active.
$kudu_filters = array( 'ALL', 'RESIDENTIAL', 'HOSPITALITY', 'WORKPLACE' );

// Editorial cards fallback: [image, category label, title].
$kudu_projects_fallback = array(
	array( 'inspirations/scene-01.jpg', 'RESIDENTIAL',  'Cape Villa' ),
	array( 'inspirations/scene-02.jpg', 'HOSPITALITY',  'The Oak Room' ),
	array( 'inspirations/scene-03.jpg', 'WORKPLACE',    'Studio Loft' ),
	array( 'sections/contract.jpg',     'RESIDENTIAL',  'Garden House' ),
	array( 'inspirations/scene-05.jpg', 'HOSPITALITY',  'Harbour Suite' ),
	array( 'categories/outdoor.jpg',    'RESIDENTIAL',  'Savanna House' ),
);
?>

<main class="bg-kudu-bg text-kudu-navy">

	<!-- DARK QUOTE HERO -->
	<section class="relative flex h-[430px] w-full items-center justify-center overflow-hidden bg-kudu-navy text-white">
		<!-- Breadcrumb top-left (content sits under the fixed 100px header) -->
		<div class="absolute left-0 top-0 w-full">
			<div class="mx-auto w-full max-w-[1440px] px-5 pt-[110px] md:px-[68px]">
				<p class="text-[13px] text-white/70">Home | Inspiration</p>
			</div>
		</div>

		<!-- Centered quote -->
		<div class="px-5 text-center">
			<p class="font-serif text-[40px] font-bold leading-tight text-white/90">
				Furniture shapes how people
				<br />
				live, feel and connect.
			</p>
			<p class="mt-6 text-[22px] font-serif text-white/70">
				Kudu Living
			</p>
		</div>

		<!-- Bottom-left overlay -->
		<div class="absolute bottom-0 left-0 w-full">
			<div class="mx-auto w-full max-w-[1440px] px-5 pb-10 md:px-[68px]">
				<p class="text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-teal">
					Inspiration
				</p>
				<h2 class="mt-3 font-serif text-[30px] font-bold text-white">
					Pieces in their place
				</h2>
				<a
					href="<?php echo kudu_url( 'inspiration' ); ?>"
					class="mt-5 inline-flex h-[50px] items-center rounded-none border border-white/90 bg-transparent px-9 text-[12px] font-bold uppercase tracking-[1px] text-white transition-colors hover:bg-white hover:text-kudu-navy"
				>
					Discover Now
				</a>
			</div>
		</div>
	</section>

	<!-- FILTER TABS (static chips, first active) -->
	<div class="border-b border-kudu-navy/10 bg-kudu-bg py-[24px]">
		<div class="flex items-center justify-center gap-10">
			<?php foreach ( $kudu_filters as $i => $filter ) : ?>
				<span
					class="<?php echo 0 === $i
						? 'border-b-2 border-kudu-navy pb-1 font-bold text-kudu-navy'
						: 'font-normal text-kudu-muted transition-colors hover:text-kudu-navy'; ?> text-[14px] uppercase tracking-[0.5px]"
				>
					<?php echo esc_html( $filter ); ?>
				</span>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- EDITORIAL GRID (2-col) -->
	<div class="mx-auto w-full max-w-[1440px] px-5 py-[40px] md:px-[68px]">
		<div class="grid grid-cols-1 gap-6 md:grid-cols-2">
			<?php
			$kudu_projects = new WP_Query( array( 'post_type' => 'project', 'posts_per_page' => 6, 'no_found_rows' => true ) );
			if ( $kudu_projects->have_posts() ) :
				while ( $kudu_projects->have_posts() ) : $kudu_projects->the_post();
					$cat = get_post_meta( get_the_ID(), '_kudu_category', true );
					?>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="group block cursor-pointer">
						<div class="overflow-hidden">
							<img
								src="<?php echo esc_url( kudu_project_image() ); ?>"
								alt="<?php echo esc_attr( get_the_title() ); ?>"
								class="aspect-[16/10] w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
							>
						</div>
						<p class="mt-4 text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-muted">
							<?php echo esc_html( $cat ); ?>
						</p>
						<h3 class="mt-2 font-serif text-[22px] font-bold text-kudu-navy">
							<?php echo esc_html( get_the_title() ); ?>
						</h3>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				foreach ( $kudu_projects_fallback as $p ) :
					?>
					<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="group block cursor-pointer">
						<div class="overflow-hidden">
							<img
								src="<?php echo kudu_img( $p[0] ); ?>"
								alt="<?php echo esc_attr( $p[2] ); ?>"
								class="aspect-[16/10] w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
							>
						</div>
						<p class="mt-4 text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-muted">
							<?php echo esc_html( $p[1] ); ?>
						</p>
						<h3 class="mt-2 font-serif text-[22px] font-bold text-kudu-navy">
							<?php echo esc_html( $p[2] ); ?>
						</h3>
					</a>
					<?php
				endforeach;
			endif;
			?>
		</div>
	</div>

</main>

<?php
get_footer();
