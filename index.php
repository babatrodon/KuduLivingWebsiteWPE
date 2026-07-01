<?php
/**
 * Main fallback template (used for the blog index, archives and search).
 *
 * @package Kudu_Living
 */

get_header();
?>

<section class="page-hero">
	<div class="page-hero__bg"></div>
	<div class="wrap">
		<p class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;·&nbsp; Journal</p>
		<h1>
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

<section class="section wrap">
	<?php if ( have_posts() ) : ?>
		<div class="journal">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<a href="<?php the_permalink(); ?>" class="story reveal">
					<div class="img">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large' ); ?>
						<?php else : ?>
							<div class="ph ph--wood"></div>
						<?php endif; ?>
					</div>
					<div class="k"><?php echo esc_html( get_the_date() ); ?></div>
					<h3><?php the_title(); ?></h3>
					<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
				</a>
				<?php
			endwhile;
			?>
		</div>
		<div class="center mt-3"><?php posts_nav_link(); ?></div>
	<?php else : ?>
		<p class="lead">Nothing here yet — please check back soon.</p>
	<?php endif; ?>
</section>

<?php
get_footer();
