<?php
/**
 * Header: <head>, fixed site header with mega-menu, mobile drawer.
 *
 * @package Kudu_Living
 */

$kudu_indoor = array(
	'Kitchen' => 'indoor-sofas.jpg', 'Wardrobe' => 'indoor-armchairs.jpg', 'Closet' => 'indoor-chairs.jpg',
	'Sofas' => 'indoor-beds.jpg', 'Chairs' => 'indoor-tables.jpg', 'Tables' => 'indoor-small-tables.jpg',
	'Small Tables' => 'indoor-pouf.jpg', 'Storage' => 'indoor-living-storage-units.jpg',
	'Beds' => 'indoor-night-storage-units.jpg', 'Complements' => 'indoor-complements.jpg',
);
$kudu_outdoor = array(
	'Outdoor Sofas' => 'outdoor-sofas.jpg', 'Outdoor Chairs' => 'outdoor-armchairs.jpg', 'Loungers' => 'outdoor-chairs.jpg',
	'Sunbeds' => 'outdoor-sunbeds.jpg', 'Outdoor Tables' => 'outdoor-tables.jpg', 'Side Tables' => 'outdoor-small-tables.jpg',
	'Ottomans' => 'outdoor-ottomans.jpg', 'Accessories' => 'outdoor-complements.jpg', 'Objects' => 'outdoor-objects.jpg',
);
$kudu_about = array(
	'Our Story' => 'about-history.jpg', 'Craftsmanship' => 'about-identity.jpg', 'Makers' => 'about-designers.jpg',
	'Sustainability' => 'about-sustainability.jpg', 'Showrooms' => 'about-network.jpg',
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-kudu-navy' ); ?>>
<?php wp_body_open(); ?>

<header id="site-header" data-kudu-header class="kudu-fixed-top fixed left-0 right-0 top-0 z-50 h-[100px] bg-[#1a2238]/92 text-white backdrop-blur-sm transition-transform duration-300 ease-out">
	<div class="mx-auto flex h-full w-full max-w-[1440px] items-center justify-between px-5 md:px-[68px]">
		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> — home">
			<img src="<?php echo kudu_asset( 'img/kudu-logo-horizontal-white.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="h-[38px] w-auto">
		</a>

		<!-- Desktop nav -->
		<nav class="hidden items-center gap-9 lg:flex" aria-label="<?php esc_attr_e( 'Primary', 'kudu-living' ); ?>">
			<div class="kudu-navitem" data-mega="about">
				<button type="button" class="text-[14px] font-semibold uppercase tracking-[0.08em] text-white transition-opacity hover:opacity-70">About</button>
			</div>
			<div class="kudu-navitem" data-mega="products">
				<button type="button" class="text-[14px] font-semibold uppercase tracking-[0.08em] text-white transition-opacity hover:opacity-70">Collections</button>
			</div>
			<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="text-[14px] font-semibold uppercase tracking-[0.08em] text-white transition-opacity hover:opacity-70">Inspiration</a>
			<a href="<?php echo kudu_url( 'contract' ); ?>" class="text-[14px] font-semibold uppercase tracking-[0.08em] text-white transition-opacity hover:opacity-70">Contract</a>
		</nav>

		<!-- Right tools -->
		<div class="flex items-center gap-5">
			<a href="<?php echo kudu_url( 'contact' ); ?>" class="hidden h-[44px] items-center rounded-none bg-kudu-teal px-6 text-[12px] font-bold uppercase tracking-[1px] text-kudu-navy transition-colors hover:bg-[#2aa9bd] md:inline-flex">Trade Area</a>
			<button type="button" class="text-white transition-opacity hover:opacity-70" aria-label="<?php esc_attr_e( 'Search', 'kudu-living' ); ?>"><?php echo kudu_icon( 'search', 'width="22" height="22"' ); ?></button>
			<a href="<?php echo kudu_url( 'contact' ); ?>" class="text-white transition-opacity hover:opacity-70" aria-label="<?php esc_attr_e( 'Showrooms', 'kudu-living' ); ?>"><?php echo kudu_icon( 'pin', 'width="22" height="22"' ); ?></a>
			<button type="button" data-kudu-drawer-open class="text-white lg:hidden" aria-label="<?php esc_attr_e( 'Menu', 'kudu-living' ); ?>">
				<span class="block h-[2px] w-6 bg-white"></span>
				<span class="mt-[5px] block h-[2px] w-6 bg-white"></span>
				<span class="mt-[5px] block h-[2px] w-6 bg-white"></span>
			</button>
		</div>
	</div>

	<!-- MEGA: About -->
	<div data-mega-panel="about" class="kudu-mega absolute left-0 top-full hidden w-full bg-white text-kudu-navy shadow-2xl">
		<div class="mx-auto grid w-full max-w-[1440px] grid-cols-2 gap-6 px-5 py-10 md:grid-cols-5 md:px-[68px]">
			<?php foreach ( $kudu_about as $label => $img ) : ?>
				<a href="<?php echo kudu_url( 'about' ); ?>" class="group block">
					<div class="aspect-[3/4] w-full overflow-hidden bg-kudu-sand-soft">
						<img src="<?php echo kudu_img( 'menu/' . $img ); ?>" alt="<?php echo esc_attr( $label ); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
					</div>
					<span class="mt-3 block font-serif text-[18px] text-kudu-navy"><?php echo esc_html( $label ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>

	<!-- MEGA: Collections -->
	<div data-mega-panel="products" class="kudu-mega absolute left-0 top-full hidden w-full bg-white text-kudu-navy shadow-2xl">
		<div class="mx-auto grid w-full max-w-[1440px] gap-10 px-5 py-10 md:grid-cols-2 md:px-[68px]">
			<div>
				<h6 class="mb-4 text-[12px] font-bold uppercase tracking-[0.16em] text-kudu-muted">Indoor</h6>
				<div class="grid grid-cols-3 gap-4 sm:grid-cols-5">
					<?php foreach ( $kudu_indoor as $label => $img ) : ?>
						<a href="<?php echo kudu_url( 'collections' ); ?>" class="group block">
							<div class="aspect-[3/4] w-full overflow-hidden bg-kudu-sand-soft">
								<img src="<?php echo kudu_img( 'menu/' . $img ); ?>" alt="<?php echo esc_attr( $label ); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
							</div>
							<span class="mt-2 block text-[13px] text-kudu-navy"><?php echo esc_html( $label ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<div>
				<h6 class="mb-4 text-[12px] font-bold uppercase tracking-[0.16em] text-kudu-muted">Outdoor</h6>
				<div class="grid grid-cols-3 gap-4 sm:grid-cols-5">
					<?php foreach ( $kudu_outdoor as $label => $img ) : ?>
						<a href="<?php echo kudu_url( 'collections' ); ?>" class="group block">
							<div class="aspect-[3/4] w-full overflow-hidden bg-kudu-sand-soft">
								<img src="<?php echo kudu_img( 'menu/' . $img ); ?>" alt="<?php echo esc_attr( $label ); ?>" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
							</div>
							<span class="mt-2 block text-[13px] text-kudu-navy"><?php echo esc_html( $label ); ?></span>
						</a>
					<?php endforeach; ?>
				</div>
				<a href="<?php echo kudu_url( 'collections' ); ?>" class="mt-6 inline-flex items-center gap-2 text-[12px] font-bold uppercase tracking-[0.12em] text-kudu-navy hover:text-kudu-teal">All collections <?php echo kudu_icon( 'arrow-right', 'width="16" height="16"' ); ?></a>
			</div>
		</div>
	</div>
</header>

<!-- Mobile drawer -->
<div data-kudu-drawer class="fixed inset-0 z-[200] translate-x-full overflow-auto bg-kudu-navy px-6 py-24 text-white transition-transform duration-300 ease-out">
	<button type="button" data-kudu-drawer-close class="absolute right-6 top-6 text-3xl leading-none text-white" aria-label="<?php esc_attr_e( 'Close', 'kudu-living' ); ?>">&times;</button>
	<nav class="flex flex-col">
		<a href="<?php echo kudu_url( 'about' ); ?>" class="border-b border-white/10 py-3 font-serif text-2xl">About</a>
		<a href="<?php echo kudu_url( 'collections' ); ?>" class="border-b border-white/10 py-3 font-serif text-2xl">Collections</a>
		<a href="<?php echo kudu_url( 'inspiration' ); ?>" class="border-b border-white/10 py-3 font-serif text-2xl">Inspiration</a>
		<a href="<?php echo kudu_url( 'contract' ); ?>" class="border-b border-white/10 py-3 font-serif text-2xl">Contract</a>
		<a href="<?php echo kudu_url( 'contact' ); ?>" class="border-b border-white/10 py-3 font-serif text-2xl">Trade Area</a>
	</nav>
</div>
