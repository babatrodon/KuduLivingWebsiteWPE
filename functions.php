<?php
/**
 * Kudu Living theme functions.
 *
 * @package Kudu_Living
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KUDU_VERSION', '1.0.0' );

if ( ! function_exists( 'kudu_setup' ) ) {
	/**
	 * Theme setup.
	 */
	function kudu_setup() {
		load_theme_textdomain( 'kudu-living', get_template_directory() . '/languages' );

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
		);
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 34,
				'width'       => 160,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'kudu-living' ),
				'footer'  => __( 'Footer Menu', 'kudu-living' ),
			)
		);
	}
}
add_action( 'after_setup_theme', 'kudu_setup' );

/**
 * Enqueue styles and scripts.
 */
function kudu_assets() {
	// Main stylesheet (contains the full design system + @font-face).
	wp_enqueue_style( 'kudu-style', get_stylesheet_uri(), array(), KUDU_VERSION );

	// Front-end interactions (header state, reveal, drawer, gallery thumbs).
	wp_enqueue_script(
		'kudu-main',
		get_template_directory_uri() . '/assets/main.js',
		array(),
		KUDU_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'kudu_assets' );

/**
 * Helper: URL to a theme asset.
 *
 * @param string $path Relative path inside /assets.
 * @return string
 */
function kudu_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/**
 * Helper: resolve an internal page URL by slug, falling back to home.
 * Lets the coded nav link to real pages once they are created.
 *
 * @param string $slug Page slug (e.g. 'collections').
 * @return string
 */
function kudu_url( $slug = '' ) {
	$slug = trim( $slug, '/' );
	if ( '' === $slug ) {
		return esc_url( home_url( '/' ) );
	}
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return esc_url( get_permalink( $page ) );
	}
	// Fallback to a pretty permalink guess so links still resolve after pages exist.
	return esc_url( home_url( '/' . $slug . '/' ) );
}

/**
 * Add a `js` class to <html> as early as possible (drives reveal animations).
 * Mirrors the static reference build.
 */
function kudu_html_js_class() {
	echo "<script>document.documentElement.className+=' js';</script>\n";
}
add_action( 'wp_head', 'kudu_html_js_class', 1 );
