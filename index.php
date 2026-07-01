<?php
/**
 * Fallback template (blog index, archives, search).
 *
 * @package Kudu_Living
 */

get_header();
?>
<main>
	<section class="bg-kudu-navy pt-[150px] pb-[70px] text-white">
		<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
			<p class="mb-4 text-[12px] uppercase tracking-[0.14em] text-kudu-teal"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;|&nbsp; Journal</p>
			<h1 class="font-serif text-[44px] leading-[1.05]">
				<?php
				if ( is_search() ) {
					printf( 'Search: %s', esc_html( get_search_query() ) );
				} elseif ( is_archive() ) {
					the_archive_title();
				} else {
					echo esc_html( get_bloginfo( 'name' ) );
				}
				?>
			</h1>
		</div>
	</section>
	<section class="mx-auto w-full max-w-[1440px] px-5 py-[60px] md:px-[68px]">
		<?php if ( have_posts() ) : ?>
			<div class="grid grid-cols-1 gap-10 md:grid-cols-3">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<a href="<?php the_permalink(); ?>" class="group block">
						<div class="aspect-[3/2] overflow-hidden bg-kudu-sand-soft">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large', array( 'class' => 'h-full w-full object-cover transition-transform duration-500 group-hover:scale-105' ) ); ?>
							<?php endif; ?>
						</div>
						<div class="mt-4 text-[12px] uppercase tracking-[0.12em] text-kudu-teal"><?php echo esc_html( get_the_date() ); ?></div>
						<h3 class="mt-2 font-serif text-[22px] text-kudu-navy"><?php the_title(); ?></h3>
						<p class="mt-2 text-[15px] text-kudu-muted"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
					</a>
					<?php
				endwhile;
				?>
			</div>
			<div class="mt-12 text-center"><?php posts_nav_link(); ?></div>
		<?php else : ?>
			<p class="text-[16px] text-kudu-muted">Nothing here yet — please check back soon.</p>
		<?php endif; ?>
	</section>
</main>
<?php
get_footer();
