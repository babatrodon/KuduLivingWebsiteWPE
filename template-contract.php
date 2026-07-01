<?php
/**
 * Template Name: Kudu — Contract
 *
 * Contract page — re-skin of the reference furniture "Contract" page:
 * full-bleed hero (under the fixed 100px header), intro paragraph, a
 * responsive grid of Kudu project cards, and a closing CTA band.
 *
 * @package Kudu_Living
 */

get_header();

// Project cards: [image, title].
$kudu_projects = array(
	array( 'sections/contract.jpg',     'Safari Lodge, Cape Town' ),
	array( 'inspirations/scene-01.jpg', 'Harbour Hotel' ),
	array( 'inspirations/scene-02.jpg', 'Corporate HQ, London' ),
	array( 'inspirations/scene-03.jpg', 'Private Villa, Franschhoek' ),
	array( 'inspirations/scene-04.jpg', 'Boutique Hotel' ),
	array( 'inspirations/scene-05.jpg', 'Wine Estate' ),
	array( 'categories/indoor.jpg',     'Penthouse, NYC' ),
	array( 'categories/outdoor.jpg',    'Resort & Spa' ),
);

$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';
?>

<main>

	<!-- HERO (full-bleed, under the fixed 100px header) -->
	<section
		class="relative h-[480px] w-full bg-cover bg-center"
		style="background-image:url('<?php echo kudu_img( 'pages/contract-hero.jpg' ); ?>')"
	>
		<div class="absolute inset-0 bg-black/15"></div>
		<div class="<?php echo esc_attr( $kudu_container ); ?> relative flex h-full flex-col justify-between pt-[118px] pb-10">
			<nav class="text-[12px] font-medium tracking-[0.04em] text-white">
				Home <span class="px-1 opacity-70">|</span> Contract
			</nav>
			<h1 class="font-serif text-[40px] font-bold leading-tight text-white">Contract</h1>
		</div>
	</section>

	<!-- INTRO -->
	<section class="bg-kudu-bg">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-[50px]">
			<p class="max-w-[1100px] text-[16px] leading-relaxed text-kudu-navy">
				Kudu Living supplies furniture and wood interiors to hospitality, workplace and
				residential projects worldwide. From boutique hotels and lodges to corporate
				headquarters and private residences, our contract team delivers considered,
				natural pieces at any scale. Every project is supported directly by our studio,
				from a single bespoke commission through to a complete fit-out.
			</p>
		</div>
	</section>

	<!-- PROJECTS GRID -->
	<section class="bg-white">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-[20px]">
			<div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
				<?php
				$kudu_projects_query = new WP_Query(
					array(
						'post_type'      => 'project',
						'posts_per_page' => 8,
						'no_found_rows'  => true,
					)
				);
				if ( $kudu_projects_query->have_posts() ) :
					while ( $kudu_projects_query->have_posts() ) :
						$kudu_projects_query->the_post();
						$loc = get_post_meta( get_the_ID(), '_kudu_location', true );
						?>
						<a href="<?php echo esc_url( get_permalink() ); ?>" class="group block">
							<div class="overflow-hidden">
								<img
									src="<?php echo kudu_project_image(); ?>"
									alt="<?php echo esc_attr( get_the_title() ); ?>"
									class="aspect-[4/3] w-full object-cover transition-transform duration-300 group-hover:scale-105"
								>
							</div>
							<p class="mt-3 text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-muted">
								<?php echo esc_html( $loc ? $loc : 'Project' ); ?>
							</p>
							<h3 class="mt-1 font-serif text-[18px] font-bold text-kudu-navy"><?php echo esc_html( get_the_title() ); ?></h3>
						</a>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					foreach ( $kudu_projects as $project ) :
						?>
						<a href="<?php echo kudu_url( 'contract' ); ?>" class="group block">
							<div class="overflow-hidden">
								<img
									src="<?php echo kudu_img( $project[0] ); ?>"
									alt="<?php echo esc_attr( $project[1] ); ?>"
									class="aspect-[4/3] w-full object-cover transition-transform duration-300 group-hover:scale-105"
								>
							</div>
							<p class="mt-3 text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-muted">
								Project
							</p>
							<h3 class="mt-1 text-[18px] font-bold text-kudu-navy"><?php echo esc_html( $project[1] ); ?></h3>
						</a>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</section>

	<!-- CLOSING CTA BAND -->
	<section class="bg-kudu-navy">
		<div class="<?php echo esc_attr( $kudu_container ); ?> flex flex-col items-start gap-6 py-[60px] text-white md:flex-row md:items-center md:justify-between">
			<h2 class="max-w-[700px] font-serif text-[28px] font-bold leading-tight text-white">
				Work with our contract team
			</h2>
			<a
				href="<?php echo kudu_url( 'contact' ); ?>"
				class="inline-flex h-[50px] items-center justify-center rounded-none bg-kudu-teal px-9 text-[12px] font-bold uppercase tracking-[1px] text-kudu-navy transition-colors hover:bg-white"
			>
				Get in Touch
			</a>
		</div>
	</section>

</main>

<?php
get_footer();
