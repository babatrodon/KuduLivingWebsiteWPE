<?php
/**
 * Footer.
 *
 * @package Kudu_Living
 */
?>

<footer class="bg-kudu-navy-deep pt-[60px] text-white/80">
	<div class="mx-auto w-full max-w-[1440px] px-5 md:px-[68px]">
		<div class="grid grid-cols-1 gap-10 pb-14 md:grid-cols-[1.6fr_1fr_1fr_1fr]">
			<div>
				<img src="<?php echo kudu_asset( 'img/kudu-logo-horizontal-white.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="mb-6 h-[42px] w-auto">
				<p class="max-w-[36ch] text-[14px] leading-relaxed">Furniture and wood-based interiors, made to bring warmth, comfort and character to every space.</p>
			</div>
			<div>
				<h5 class="mb-4 text-[13px] font-semibold uppercase tracking-[0.16em] text-white">Collections</h5>
				<?php foreach ( array( 'Kitchen', 'Wardrobe', 'Closet', 'Sofas', 'Chairs', 'Tables' ) as $c ) : ?>
					<a href="<?php echo kudu_url( 'collections' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal"><?php echo esc_html( $c ); ?></a>
				<?php endforeach; ?>
			</div>
			<div>
				<h5 class="mb-4 text-[13px] font-semibold uppercase tracking-[0.16em] text-white">Company</h5>
				<a href="<?php echo kudu_url( 'about' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">About</a>
				<a href="<?php echo kudu_url( 'about' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">Craftsmanship</a>
				<a href="<?php echo kudu_url( 'about' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">Sustainability</a>
				<a href="<?php echo kudu_url( 'contact' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">Contact</a>
			</div>
			<div>
				<h5 class="mb-4 text-[13px] font-semibold uppercase tracking-[0.16em] text-white">Visit</h5>
				<a href="<?php echo kudu_url( 'contact' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">Showroom</a>
				<a href="<?php echo kudu_url( 'contact' ); ?>" class="block py-1.5 text-[14px] transition-colors hover:text-kudu-teal">Trade enquiries</a>
				<div class="mt-4 flex items-center gap-[18px]">
					<?php foreach ( array( 'instagram', 'pinterest', 'facebook', 'youtube', 'linkedin' ) as $s ) : ?>
						<a href="#" aria-label="<?php echo esc_attr( $s ); ?>" class="text-white transition-opacity hover:opacity-70"><?php echo kudu_icon( $s, 'width="20" height="20"' ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="flex flex-col gap-3 border-t border-white/12 py-6 text-[13px] md:flex-row md:items-center md:justify-between">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.</span>
			<span class="text-kudu-teal">Rooted in Nature.</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
