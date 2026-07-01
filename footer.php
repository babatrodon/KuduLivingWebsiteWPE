<?php
/**
 * Footer template.
 *
 * @package Kudu_Living
 */
?>

<!-- FOOTER -->
<footer class="site-footer">
	<div class="wrap">
		<div class="cols">
			<div>
				<img class="logo" src="<?php echo kudu_asset( 'img/kudu-logo-horizontal-white.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<p style="max-width:36ch">Furniture and wood-based interiors, made to bring warmth, comfort and character to every space.</p>
			</div>
			<div>
				<h5>Collections</h5>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Kitchen</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Wardrobe</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Closet</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Sofas</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Chairs</a>
				<a href="<?php echo kudu_url( 'collections' ); ?>">Tables</a>
			</div>
			<div>
				<h5>Company</h5>
				<a href="<?php echo kudu_url( 'about' ); ?>">About</a>
				<a href="<?php echo kudu_url( 'about' ); ?>">Craftsmanship</a>
				<a href="<?php echo kudu_url( 'about' ); ?>">Sustainability</a>
				<a href="<?php echo kudu_url( 'contact' ); ?>">Contact</a>
			</div>
			<div>
				<h5>Visit</h5>
				<a href="<?php echo kudu_url( 'contact' ); ?>">Showroom</a>
				<a href="<?php echo kudu_url( 'contact' ); ?>">Trade enquiries</a>
				<a href="#">Instagram</a>
				<a href="#">Pinterest</a>
			</div>
		</div>
		<div class="bottom">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. All rights reserved.</span>
			<span>Rooted in Nature.</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
