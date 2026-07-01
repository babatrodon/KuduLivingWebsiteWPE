<?php
/**
 * Generic page template (branded fallback for any WordPress Page
 * that is not assigned one of the "Kudu — …" page templates).
 *
 * @package Kudu_Living
 */

get_header();
?>

<section class="page-hero">
	<div class="page-hero__bg"></div>
	<div class="wrap">
		<p class="crumbs"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;·&nbsp; <?php the_title(); ?></p>
		<h1><?php the_title(); ?></h1>
	</div>
</section>

<section class="section wrap">
	<div class="reveal" style="max-width:80ch">
		<?php
		while ( have_posts() ) :
			the_post();
			the_content();
		endwhile;
		?>
	</div>
</section>

<?php
get_footer();
