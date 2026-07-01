<?php
/**
 * 404 template.
 *
 * @package Kudu_Living
 */

get_header();
?>
<main>
	<section class="flex min-h-[70vh] items-center bg-kudu-navy pt-[100px] text-white">
		<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
			<p class="mb-4 text-[12px] uppercase tracking-[0.14em] text-kudu-teal">Error 404</p>
			<h1 class="font-serif text-[46px] leading-[1.05]">This page has wandered off.</h1>
			<p class="mt-4 max-w-[48ch] text-[16px] text-white/80">The page you were looking for isn't here. Let's get you back to something beautiful.</p>
			<div class="mt-8 flex flex-wrap items-center gap-6">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex h-[50px] items-center rounded-none bg-kudu-teal px-9 text-[12px] font-bold uppercase tracking-[1px] text-kudu-navy transition-colors hover:bg-white">Back to home</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>" class="inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[1px] text-white hover:text-kudu-teal">View collections <?php echo kudu_icon( 'arrow-right', 'width="16" height="16"' ); ?></a>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();
