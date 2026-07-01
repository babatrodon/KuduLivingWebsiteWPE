<?php
/**
 * Kudu Living theme functions.
 *
 * @package Kudu_Living
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KUDU_VERSION', '2.0.0' );

if ( ! function_exists( 'kudu_setup' ) ) {
	function kudu_setup() {
		load_theme_textdomain( 'kudu-living', get_template_directory() . '/languages' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
		add_theme_support( 'custom-logo', array( 'height' => 40, 'width' => 180, 'flex-height' => true, 'flex-width' => true ) );
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'kudu-living' ),
			'footer'  => __( 'Footer Menu', 'kudu-living' ),
		) );
	}
}
add_action( 'after_setup_theme', 'kudu_setup' );

/**
 * Enqueue compiled styles + interactions.
 */
function kudu_assets() {
	wp_enqueue_style( 'kudu-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), KUDU_VERSION );
	// Keep style.css (theme header) loaded too so child themes/overrides work.
	wp_enqueue_style( 'kudu-style', get_stylesheet_uri(), array( 'kudu-theme' ), KUDU_VERSION );
	wp_enqueue_script( 'kudu-main', get_template_directory_uri() . '/assets/js/main.js', array(), KUDU_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'kudu_assets' );

/** URL to a theme asset under /assets. */
function kudu_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/** URL to a bundled site image under /assets/img/site. */
function kudu_img( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/img/site/' . ltrim( $path, '/' ) );
}

/** Resolve an internal page URL by slug, falling back to a pretty permalink. */
function kudu_url( $slug = '' ) {
	$slug = trim( $slug, '/' );
	if ( '' === $slug ) {
		return esc_url( home_url( '/' ) );
	}
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return esc_url( get_permalink( $page ) );
	}
	return esc_url( home_url( '/' . $slug . '/' ) );
}

/**
 * Inline SVG icon set (mirrors the reference build's icons.tsx).
 * Echoes the SVG. Pass extra attributes via $attr (e.g. 'width="22" height="22"').
 */
function kudu_icon( $name, $attr = '' ) {
	$open = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" ' . $attr . '>';
	$icons = array(
		'search'      => '<circle cx="11" cy="11" r="7"/><line x1="16.5" y1="16.5" x2="21" y2="21" stroke-linecap="round"/>',
		'pin'         => '<path d="M12 21s7-6.3 7-11a7 7 0 1 0-14 0c0 4.7 7 11 7 11Z" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.5"/>',
		'plus'        => '<line x1="12" y1="6" x2="12" y2="18" stroke-linecap="round"/><line x1="6" y1="12" x2="18" y2="12" stroke-linecap="round"/>',
		'chevron-left'  => '<polyline points="15 5 8 12 15 19" stroke-linecap="round" stroke-linejoin="round"/>',
		'chevron-right' => '<polyline points="9 5 16 12 9 19" stroke-linecap="round" stroke-linejoin="round"/>',
		'chevron-up'    => '<polyline points="5 15 12 8 19 15" stroke-linecap="round" stroke-linejoin="round"/>',
		'arrow-right'   => '<line x1="3" y1="12" x2="20" y2="12" stroke-linecap="round"/><polyline points="14 6 20 12 14 18" stroke-linecap="round" stroke-linejoin="round"/>',
		'question'    => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.8.4-1 .9-1 1.7" stroke-linecap="round"/><circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none"/>',
		'chat'        => '<path d="M4 5h16v11H9l-4 3v-3H4Z" stroke-linejoin="round"/>',
		'instagram'   => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17" cy="7" r="1" fill="currentColor" stroke="none"/>',
		'pinterest'   => '<circle cx="12" cy="12" r="9"/><path d="M12 7c-2.2 0-3.6 1.5-3.6 3.3 0 .9.4 1.8 1.2 2.1.1 0 .2 0 .2-.1l.2-.7c0-.1 0-.2-.1-.3-.3-.3-.4-.7-.4-1.1 0-1.4 1-2.4 2.6-2.4 1.4 0 2.2.9 2.2 2 0 1.5-.7 2.8-1.6 2.8-.5 0-.9-.4-.8-1l.4-1.6c.1-.5-.1-.9-.5-.9-.5 0-.9.5-.9 1.2l.2.9-.8 3.3c-.1.6-.1 1.3 0 1.9 0 .1.1.1.2.1.7-.9 1-1.6 1.2-2.2.2.4.8.8 1.5.8 1.9 0 3.2-1.7 3.2-4 0-1.8-1.5-3.4-3.9-3.4Z" fill="currentColor" stroke="none"/>',
		'facebook'    => '<path d="M14 8.5V7c0-.7.3-1 1-1h1.5V3H14c-2 0-3 1.2-3 3v2.5H9V11h2v10h3V11h2l.5-2.5H14Z" fill="currentColor" stroke="none"/>',
		'youtube'     => '<rect x="3" y="6" width="18" height="12" rx="3"/><path d="M11 9.5v5l4-2.5Z" fill="currentColor" stroke="none"/>',
		'linkedin'    => '<rect x="3" y="3" width="18" height="18" rx="2"/><line x1="7" y1="10" x2="7" y2="17" stroke-linecap="round"/><circle cx="7" cy="6.8" r="0.8" fill="currentColor" stroke="none"/><path d="M11 17v-4a2 2 0 0 1 4 0v4M11 10v7" stroke-linecap="round"/>',
	);
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return $open . $icons[ $name ] . '</svg>';
}

/** Add a `js` class to <html> early (drives reveal + interactions). */
function kudu_html_js_class() {
	echo "<script>document.documentElement.className+=' js';</script>\n";
}
add_action( 'wp_head', 'kudu_html_js_class', 1 );
