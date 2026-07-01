<?php
/**
 * 404 template.
 *
 * @package Kudu_Living
 */

get_header();
?>

<section class="page-hero" style="min-height:70vh;display:flex;align-items:center">
	<div class="page-hero__bg"></div>
	<div class="wrap">
		<p class="crumbs">Error 404</p>
		<h1>This page has wandered off.</h1>
		<p class="lead mt-2" style="color:rgba(255,255,255,.8)">The page you were looking for isn't here. Let's get you back to something beautiful.</p>
		<div class="mt-3">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--light">Back to home</a>
			<a href="<?php echo kudu_url( 'collections' ); ?>" class="link-arrow" style="margin-left:22px">View collections &rarr;</a>
		</div>
	</div>
</section>

<?php
get_footer();
