<?php
/**
 * Generic page (branded fallback for pages without a "Kudu — …" template).
 *
 * @package Kudu_Living
 */

get_header();
?>
<main>
	<section class="relative overflow-hidden bg-kudu-navy pt-[150px] pb-[70px] text-white">
		<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
			<p class="mb-4 text-[12px] uppercase tracking-[0.14em] text-kudu-teal"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a> &nbsp;|&nbsp; <?php the_title(); ?></p>
			<h1 class="font-serif text-[44px] leading-[1.05]"><?php the_title(); ?></h1>
		</div>
	</section>
	<section class="mx-auto w-full max-w-[1440px] px-5 py-[60px] md:px-[68px]">
		<div class="max-w-[80ch] text-[16px] leading-relaxed text-kudu-navy">
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		</div>
	</section>
</main>
<?php
get_footer();
