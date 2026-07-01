<?php
/**
 * Header template: <head>, site header (with mega-menu) and mobile drawer.
 *
 * Templates that open on a light background (e.g. single product) can force the
 * solid header state by setting $GLOBALS['kudu_solid_header'] = true; before get_header().
 *
 * @package Kudu_Living
 */

$kudu_solid = ! empty( $GLOBALS['kudu_solid_header'] );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- HEADER -->
<header class="site-header<?php echo $kudu_solid ? ' solid' : ''; ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — home">
		<img class="on-dark" src="<?php echo kudu_asset( 'img/kudu-logo-horizontal-white.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" height="34">
		<img class="on-light" src="<?php echo kudu_asset( 'img/kudu-logo-horizontal.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" height="34">
	</a>

	<nav class="nav" aria-label="<?php esc_attr_e( 'Primary', 'kudu-living' ); ?>">
		<div class="nav-item has-mega">
			<a href="<?php echo kudu_url( 'collections' ); ?>">Collections</a>
			<div class="mega">
				<div class="mega-inner">
					<div>
						<h6>By category</h6>
						<div class="mlinks">
							<a href="<?php echo kudu_url( 'collections' ); ?>">Kitchen</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Wardrobe</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Closet</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Sofas</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Chairs</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Tables</a>
						</div>
					</div>
					<div>
						<h6>Explore</h6>
						<div class="mlinks">
							<a href="<?php echo kudu_url( 'collections' ); ?>">New Arrivals</a>
							<a href="<?php echo kudu_url( 'collections' ); ?>">Best Sellers</a>
							<a href="<?php echo kudu_url( 'contact' ); ?>">Bespoke &amp; Contract</a>
							<a href="<?php echo kudu_url( 'makers' ); ?>">Materials &amp; Finishes</a>
						</div>
					</div>
					<div>
						<h6>Featured</h6>
						<div class="feature">
							<a href="<?php echo kudu_url( 'product' ); ?>"><div class="fimg"><div class="ph ph--wood"></div></div><div class="cap"><b>Savanna Kitchen</b>Kitchen collection</div></a>
							<a href="<?php echo kudu_url( 'product' ); ?>"><div class="fimg"><div class="ph ph--sand"></div></div><div class="cap"><b>Kalahari Sofa</b>Living collection</div></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a href="<?php echo kudu_url( 'makers' ); ?>">Makers</a>
		<a href="<?php echo kudu_url( 'inspiration' ); ?>">Inspiration</a>
		<a href="<?php echo kudu_url( 'about' ); ?>">About</a>
		<a href="<?php echo kudu_url( 'contact' ); ?>">Contact</a>
	</nav>

	<div class="nav-tools">
		<a href="<?php echo kudu_url( 'contact' ); ?>" class="icon-btn">Showroom</a>
		<a href="<?php echo kudu_url( 'contact' ); ?>" class="icon-btn">Search</a>
		<button class="burger" aria-label="<?php esc_attr_e( 'Menu', 'kudu-living' ); ?>" data-drawer>&#9776;</button>
	</div>
</header>

<!-- MOBILE DRAWER -->
<div class="drawer" id="drawer">
	<button class="close" aria-label="<?php esc_attr_e( 'Close', 'kudu-living' ); ?>" data-drawer-close>&times;</button>
	<div class="seclabel">Collections</div>
	<a href="<?php echo kudu_url( 'collections' ); ?>">All Collections</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Kitchen</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Wardrobe</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Closet</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Sofas</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Chairs</a>
	<a href="<?php echo kudu_url( 'collections' ); ?>">Tables</a>
	<div class="seclabel">Explore</div>
	<a href="<?php echo kudu_url( 'makers' ); ?>">Makers</a>
	<a href="<?php echo kudu_url( 'inspiration' ); ?>">Inspiration</a>
	<a href="<?php echo kudu_url( 'about' ); ?>">About</a>
	<a href="<?php echo kudu_url( 'contact' ); ?>">Contact</a>
</div>
