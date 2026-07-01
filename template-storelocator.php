<?php
/**
 * Template Name: Kudu — Store Locator
 *
 * Showroom finder — search field, geolocation link, a "Type of showroom"
 * filter sidebar and a light map placeholder with pin markers. Re-skin of the
 * reference StoreLocatorPage, re-branded to Kudu Living.
 *
 * @package Kudu_Living
 */

get_header();

// Container matches the rest of the theme: centered, max 1440, responsive gutters.
$kudu_container = 'mx-auto w-full max-w-[1440px] px-5 md:px-[68px]';

// Radio filter options for the sidebar.
$kudu_showroom_types = array( 'All showrooms', 'Flagship showrooms', 'Authorised dealers', 'Contract partners' );
?>

<main class="pt-[100px] text-kudu-navy">

	<!-- TOP — title, search, geolocation -->
	<section class="bg-kudu-bg">
		<div class="<?php echo esc_attr( $kudu_container ); ?> py-14">

			<!-- Breadcrumb -->
			<nav class="mb-8 text-[12px] text-kudu-muted" aria-label="Breadcrumb">
				<span>Home</span>
				<span class="mx-2">|</span>
				<span>Find a Kudu Living showroom</span>
			</nav>

			<h1 class="font-serif text-[36px] leading-tight text-kudu-navy">
				Find a Kudu Living showroom
			</h1>

			<p class="mt-4 max-w-[640px] text-[15px] font-medium text-kudu-muted">
				Our network of showrooms and authorised partners spans the country — discover Kudu Living
				pieces in person, meet our design team and feel the craft up close.
			</p>

			<!-- Search field -->
			<div class="mt-8 flex h-[52px] w-full max-w-[500px] items-center border border-kudu-line bg-white">
				<span class="flex h-full w-[52px] shrink-0 items-center justify-center text-kudu-muted">
					<?php echo kudu_icon( 'search', 'width="20" height="20"' ); ?>
				</span>
				<input
					type="text"
					placeholder="Enter a location"
					aria-label="Enter a location"
					class="h-full flex-1 bg-transparent px-1 text-[14px] text-kudu-navy placeholder:text-kudu-muted focus:outline-none"
				>
				<button
					type="button"
					aria-label="Search"
					class="flex h-full w-[52px] shrink-0 items-center justify-center border-l border-kudu-line text-kudu-navy transition-colors hover:bg-kudu-sand-soft"
				>
					<?php echo kudu_icon( 'arrow-right', 'width="20" height="20"' ); ?>
				</button>
			</div>

			<!-- Use my current position -->
			<button type="button" class="mt-5 inline-flex items-center gap-2 text-[13px] text-kudu-navy hover:text-kudu-teal">
				<?php echo kudu_icon( 'pin', 'width="16" height="16"' ); ?>
				<span class="underline underline-offset-[6px]">Use my current position</span>
			</button>

		</div>
	</section>

	<!-- LOWER — filter sidebar + map placeholder -->
	<section class="grid grid-cols-1 md:grid-cols-[300px_1fr]">

		<!-- Sidebar -->
		<aside class="bg-kudu-navy-deep p-6 text-white">
			<h2 class="text-[12px] font-bold uppercase tracking-[0.12em]">Type of showroom</h2>
			<ul class="mt-5 space-y-4">
				<?php foreach ( $kudu_showroom_types as $i => $type ) : ?>
					<li>
						<label class="flex cursor-pointer items-center gap-3 text-[14px]">
							<span class="relative flex h-4 w-4 shrink-0 items-center justify-center rounded-full border border-white/80">
								<?php if ( 0 === $i ) : ?>
									<span class="h-2 w-2 rounded-full bg-white"></span>
								<?php endif; ?>
							</span>
							<input type="radio" name="kudu-showroom-type" class="screen-reader-text" <?php checked( 0, $i ); ?>>
							<span><?php echo esc_html( $type ); ?></span>
						</label>
					</li>
				<?php endforeach; ?>
			</ul>
		</aside>

		<!-- Map placeholder -->
		<div class="relative min-h-[480px] bg-kudu-sand-soft">

			<!-- Map / Satellite toggle -->
			<div class="absolute left-4 top-4 z-10 flex overflow-hidden border border-kudu-line bg-white text-[12px] font-semibold shadow">
				<button type="button" class="bg-white px-3 py-1.5 text-kudu-navy">Map</button>
				<button type="button" class="border-l border-kudu-line bg-white px-3 py-1.5 text-kudu-muted hover:text-kudu-navy">Satellite</button>
			</div>

			<!-- Faint map grid lines -->
			<div
				class="pointer-events-none absolute inset-0 opacity-70"
				style="background-image:linear-gradient(rgba(32,42,68,0.06) 1px, transparent 1px), linear-gradient(90deg, rgba(32,42,68,0.06) 1px, transparent 1px);background-size:64px 64px"
			></div>

			<!-- Centered muted label -->
			<span class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 font-serif text-[22px] text-kudu-muted">Map</span>

			<!-- Pin markers -->
			<span class="absolute left-[28%] top-[32%] text-kudu-teal drop-shadow">
				<?php echo kudu_icon( 'pin', 'width="36" height="36"' ); ?>
			</span>
			<span class="absolute left-[58%] top-[48%] text-kudu-teal drop-shadow">
				<?php echo kudu_icon( 'pin', 'width="36" height="36"' ); ?>
			</span>
			<span class="absolute left-[44%] top-[68%] text-kudu-teal drop-shadow">
				<?php echo kudu_icon( 'pin', 'width="36" height="36"' ); ?>
			</span>

		</div>

	</section>

</main>

<?php
get_footer();
