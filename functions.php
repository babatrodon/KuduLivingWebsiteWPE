<?php
/**
 * Kudu Living theme functions.
 *
 * @package Kudu_Living
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'KUDU_VERSION', '2.1.0' );

/* ============================================================
 * 1. Theme setup + assets
 * ============================================================ */

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

function kudu_assets() {
	wp_enqueue_style( 'kudu-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), KUDU_VERSION );
	wp_enqueue_style( 'kudu-style', get_stylesheet_uri(), array( 'kudu-theme' ), KUDU_VERSION );
	wp_enqueue_script( 'kudu-main', get_template_directory_uri() . '/assets/js/main.js', array(), KUDU_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'kudu_assets' );

/* ============================================================
 * 2. Helpers
 * ============================================================ */

/** URL to a theme asset under /assets. */
function kudu_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/** URL to a bundled site image under /assets/img/site. */
function kudu_img( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/img/site/' . ltrim( $path, '/' ) );
}

/** Raw (unescaped) URL to a bundled site image — for use in style attributes. */
function kudu_img_raw( $path ) {
	return get_template_directory_uri() . '/assets/img/site/' . ltrim( $path, '/' );
}

/**
 * Resolve an internal URL by logical slug.
 * Maps collections/product to the CPT archive/singles; everything else to a Page.
 */
function kudu_url( $slug = '' ) {
	$slug = trim( $slug, '/' );
	if ( '' === $slug ) {
		return esc_url( home_url( '/' ) );
	}
	if ( 'collections' === $slug ) {
		$archive = get_post_type_archive_link( 'product' );
		return esc_url( $archive ? $archive : home_url( '/collections/' ) );
	}
	if ( 'product' === $slug ) {
		$latest = get_posts( array( 'post_type' => 'product', 'numberposts' => 1, 'fields' => 'ids' ) );
		if ( ! empty( $latest ) ) {
			return esc_url( get_permalink( $latest[0] ) );
		}
		$archive = get_post_type_archive_link( 'product' );
		return esc_url( $archive ? $archive : home_url( '/collections/' ) );
	}
	$aliases = array( 'stores' => 'find-a-store' );
	if ( isset( $aliases[ $slug ] ) ) {
		$slug = $aliases[ $slug ];
	}
	$page = get_page_by_path( $slug );
	if ( $page ) {
		return esc_url( get_permalink( $page ) );
	}
	return esc_url( home_url( '/' . $slug . '/' ) );
}

/** Product display image (featured image, else demo meta, else fallback). */
function kudu_product_image( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	if ( has_post_thumbnail( $post_id ) ) {
		return esc_url( get_the_post_thumbnail_url( $post_id, 'large' ) );
	}
	$demo = get_post_meta( $post_id, '_kudu_demo_image', true );
	return $demo ? kudu_img( $demo ) : kudu_img( 'products/bebitalia_sofa_Charles_01.jpg' );
}

/** Project display image (featured image, else demo meta, else fallback). */
function kudu_project_image( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	if ( has_post_thumbnail( $post_id ) ) {
		return esc_url( get_the_post_thumbnail_url( $post_id, 'large' ) );
	}
	$demo = get_post_meta( $post_id, '_kudu_demo_image', true );
	return $demo ? kudu_img( $demo ) : kudu_img( 'sections/contract.jpg' );
}

/** Inline SVG icon set. */
function kudu_icon( $name, $attr = '' ) {
	$open  = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" ' . $attr . '>';
	$icons = array(
		'search'        => '<circle cx="11" cy="11" r="7"/><line x1="16.5" y1="16.5" x2="21" y2="21" stroke-linecap="round"/>',
		'pin'           => '<path d="M12 21s7-6.3 7-11a7 7 0 1 0-14 0c0 4.7 7 11 7 11Z" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.5"/>',
		'plus'          => '<line x1="12" y1="6" x2="12" y2="18" stroke-linecap="round"/><line x1="6" y1="12" x2="18" y2="12" stroke-linecap="round"/>',
		'chevron-left'  => '<polyline points="15 5 8 12 15 19" stroke-linecap="round" stroke-linejoin="round"/>',
		'chevron-right' => '<polyline points="9 5 16 12 9 19" stroke-linecap="round" stroke-linejoin="round"/>',
		'chevron-up'    => '<polyline points="5 15 12 8 19 15" stroke-linecap="round" stroke-linejoin="round"/>',
		'arrow-right'   => '<line x1="3" y1="12" x2="20" y2="12" stroke-linecap="round"/><polyline points="14 6 20 12 14 18" stroke-linecap="round" stroke-linejoin="round"/>',
		'question'      => '<circle cx="12" cy="12" r="9"/><path d="M9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.8.4-1 .9-1 1.7" stroke-linecap="round"/><circle cx="12" cy="17" r="0.6" fill="currentColor" stroke="none"/>',
		'chat'          => '<path d="M4 5h16v11H9l-4 3v-3H4Z" stroke-linejoin="round"/>',
		'instagram'     => '<rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17" cy="7" r="1" fill="currentColor" stroke="none"/>',
		'pinterest'     => '<circle cx="12" cy="12" r="9"/><path d="M12 7c-2.2 0-3.6 1.5-3.6 3.3 0 .9.4 1.8 1.2 2.1.1 0 .2 0 .2-.1l.2-.7c0-.1 0-.2-.1-.3-.3-.3-.4-.7-.4-1.1 0-1.4 1-2.4 2.6-2.4 1.4 0 2.2.9 2.2 2 0 1.5-.7 2.8-1.6 2.8-.5 0-.9-.4-.8-1l.4-1.6c.1-.5-.1-.9-.5-.9-.5 0-.9.5-.9 1.2l.2.9-.8 3.3c-.1.6-.1 1.3 0 1.9 0 .1.1.1.2.1.7-.9 1-1.6 1.2-2.2.2.4.8.8 1.5.8 1.9 0 3.2-1.7 3.2-4 0-1.8-1.5-3.4-3.9-3.4Z" fill="currentColor" stroke="none"/>',
		'facebook'      => '<path d="M14 8.5V7c0-.7.3-1 1-1h1.5V3H14c-2 0-3 1.2-3 3v2.5H9V11h2v10h3V11h2l.5-2.5H14Z" fill="currentColor" stroke="none"/>',
		'youtube'       => '<rect x="3" y="6" width="18" height="12" rx="3"/><path d="M11 9.5v5l4-2.5Z" fill="currentColor" stroke="none"/>',
		'linkedin'      => '<rect x="3" y="3" width="18" height="18" rx="2"/><line x1="7" y1="10" x2="7" y2="17" stroke-linecap="round"/><circle cx="7" cy="6.8" r="0.8" fill="currentColor" stroke="none"/><path d="M11 17v-4a2 2 0 0 1 4 0v4M11 10v7" stroke-linecap="round"/>',
	);
	if ( ! isset( $icons[ $name ] ) ) {
		return '';
	}
	return $open . $icons[ $name ] . '</svg>';
}

function kudu_html_js_class() {
	echo "<script>document.documentElement.className+=' js';</script>\n";
}
add_action( 'wp_head', 'kudu_html_js_class', 1 );

/** Whether a post of the given type already exists with this exact title (non-deprecated). */
function kudu_title_exists( $title, $post_type ) {
	$found = get_posts( array(
		'post_type'        => $post_type,
		'title'            => $title,
		'post_status'      => 'any',
		'posts_per_page'   => 1,
		'fields'           => 'ids',
		'no_found_rows'    => true,
		'suppress_filters' => false,
	) );
	return ! empty( $found );
}

/* ============================================================
 * 3. Custom post types + taxonomies
 * ============================================================ */

function kudu_register_content() {
	// Products — archive at /collections, singles at /product/{slug}.
	register_post_type( 'product', array(
		'labels'       => array(
			'name'          => __( 'Products', 'kudu-living' ),
			'singular_name' => __( 'Product', 'kudu-living' ),
			'add_new_item'  => __( 'Add New Product', 'kudu-living' ),
			'edit_item'     => __( 'Edit Product', 'kudu-living' ),
			'menu_name'     => __( 'Products', 'kudu-living' ),
		),
		'public'       => true,
		'has_archive'  => 'collections',
		'menu_icon'    => 'dashicons-store',
		'rewrite'      => array( 'slug' => 'product', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'show_in_rest' => true,
	) );

	register_taxonomy( 'product_cat', 'product', array(
		'labels'       => array(
			'name'          => __( 'Collections', 'kudu-living' ),
			'singular_name' => __( 'Collection', 'kudu-living' ),
			'menu_name'     => __( 'Collections', 'kudu-living' ),
		),
		'public'       => true,
		'hierarchical' => true,
		'rewrite'      => array( 'slug' => 'collections/category', 'with_front' => false ),
		'show_in_rest' => true,
	) );

	// Projects — used by Inspiration + Contract.
	register_post_type( 'project', array(
		'labels'       => array(
			'name'          => __( 'Projects', 'kudu-living' ),
			'singular_name' => __( 'Project', 'kudu-living' ),
			'add_new_item'  => __( 'Add New Project', 'kudu-living' ),
			'menu_name'     => __( 'Projects', 'kudu-living' ),
		),
		'public'       => true,
		'has_archive'  => 'projects',
		'menu_icon'    => 'dashicons-format-gallery',
		'rewrite'      => array( 'slug' => 'project', 'with_front' => false ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest' => true,
	) );

	register_taxonomy( 'project_type', 'project', array(
		'labels'       => array( 'name' => __( 'Project Types', 'kudu-living' ), 'singular_name' => __( 'Project Type', 'kudu-living' ) ),
		'public'       => true,
		'hierarchical' => false,
		'rewrite'      => array( 'slug' => 'project-type', 'with_front' => false ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'kudu_register_content' );

/* ============================================================
 * 4. Editable fields (meta boxes)
 * ============================================================ */

function kudu_add_meta_boxes() {
	add_meta_box( 'kudu_product_details', __( 'Product details', 'kudu-living' ), 'kudu_product_meta_box', 'product', 'side', 'high' );
	add_meta_box( 'kudu_project_details', __( 'Project details', 'kudu-living' ), 'kudu_project_meta_box', 'project', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'kudu_add_meta_boxes' );

function kudu_text_field( $post_id, $key, $label, $placeholder = '' ) {
	$val = esc_attr( get_post_meta( $post_id, $key, true ) );
	echo '<p><label style="display:block;font-weight:600;margin-bottom:4px" for="' . esc_attr( $key ) . '">' . esc_html( $label ) . '</label>';
	echo '<input style="width:100%" type="text" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . $val . '" placeholder="' . esc_attr( $placeholder ) . '"></p>';
}

function kudu_product_meta_box( $post ) {
	wp_nonce_field( 'kudu_save_meta', 'kudu_meta_nonce' );
	kudu_text_field( $post->ID, '_kudu_designer', __( 'Designer', 'kudu-living' ), 'Kudu Studio' );
	kudu_text_field( $post->ID, '_kudu_price', __( 'Price', 'kudu-living' ), '£1,200' );
	kudu_text_field( $post->ID, '_kudu_category', __( 'Category label', 'kudu-living' ), 'Sofas' );
	$is_new = get_post_meta( $post->ID, '_kudu_is_new', true );
	echo '<p><label><input type="checkbox" name="_kudu_is_new" value="1" ' . checked( $is_new, '1', false ) . '> ' . esc_html__( 'Mark as “New”', 'kudu-living' ) . '</label></p>';
	kudu_text_field( $post->ID, '_kudu_demo_image', __( 'Demo image (path under /assets/img/site/)', 'kudu-living' ), 'products/xxx.jpg' );
	echo '<p style="color:#666;font-size:11px">Set a Featured Image to override the demo image.</p>';
}

function kudu_project_meta_box( $post ) {
	wp_nonce_field( 'kudu_save_meta', 'kudu_meta_nonce' );
	kudu_text_field( $post->ID, '_kudu_location', __( 'Location', 'kudu-living' ), 'Cape Town' );
	kudu_text_field( $post->ID, '_kudu_category', __( 'Category (Residential / Hospitality / Workplace)', 'kudu-living' ), 'Hospitality' );
	kudu_text_field( $post->ID, '_kudu_demo_image', __( 'Demo image (path under /assets/img/site/)', 'kudu-living' ), 'inspirations/scene-01.jpg' );
	echo '<p style="color:#666;font-size:11px">Set a Featured Image to override the demo image.</p>';
}

function kudu_save_meta( $post_id ) {
	if ( ! isset( $_POST['kudu_meta_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['kudu_meta_nonce'] ), 'kudu_save_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	foreach ( array( '_kudu_designer', '_kudu_price', '_kudu_category', '_kudu_location', '_kudu_demo_image' ) as $key ) {
		if ( isset( $_POST[ $key ] ) ) {
			update_post_meta( $post_id, $key, sanitize_text_field( wp_unslash( $_POST[ $key ] ) ) );
		}
	}
	update_post_meta( $post_id, '_kudu_is_new', isset( $_POST['_kudu_is_new'] ) ? '1' : '' );
}
add_action( 'save_post', 'kudu_save_meta' );

/* ============================================================
 * 5. One-time content seeder (runs on theme activation)
 * ============================================================ */

function kudu_seed_content() {
	kudu_register_content();

	if ( ! get_option( 'kudu_seeded' ) ) {

		// --- Pages + assigned templates ---
		$pages = array(
			'about'        => array( 'About',        'template-about.php' ),
			'inspiration'  => array( 'Inspiration',  'template-inspiration.php' ),
			'contract'     => array( 'Contract',     'template-contract.php' ),
			'contact'      => array( 'Contact',      'template-contact.php' ),
			'find-a-store' => array( 'Find a Store', 'template-storelocator.php' ),
			'catalogues'   => array( 'Catalogues',   'template-catalogues.php' ),
			'library'      => array( 'Library',      'template-library.php' ),
		);
		foreach ( $pages as $slug => $data ) {
			if ( ! get_page_by_path( $slug ) ) {
				$pid = wp_insert_post( array(
					'post_title'   => $data[0],
					'post_name'    => $slug,
					'post_status'  => 'publish',
					'post_type'    => 'page',
					'post_content' => '',
				) );
				if ( $pid && ! is_wp_error( $pid ) ) {
					update_post_meta( $pid, '_wp_page_template', $data[1] );
				}
			}
		}

		// --- Collection terms ---
		foreach ( array( 'Kitchen', 'Wardrobe', 'Closet', 'Sofas', 'Chairs', 'Tables', 'Small Tables', 'Complements' ) as $term ) {
			if ( ! term_exists( $term, 'product_cat' ) ) {
				wp_insert_term( $term, 'product_cat' );
			}
		}

		// --- Sample products ---
		$products = array(
			array( 'Kalahari Sofa', 'Kudu Studio', '£4,290', 'Sofas', '1', 'products/bebitalia_sofa_Tufty-Time_20_05.jpg' ),
			array( 'Savanna Sofa', 'Kudu Studio', '£3,980', 'Sofas', '1', 'products/bebitalia_sofa_Charles_01.jpg' ),
			array( 'Serengeti Sofa', 'Kudu Studio', '£4,650', 'Sofas', '1', 'products/bebitalia_sofa_Charles-Large_01.jpg' ),
			array( 'Nyala Lounge Chair', 'Kudu Studio', '£1,840', 'Chairs', '', 'products/bebitalia_armchair_Grande-Papilio_01.jpg' ),
			array( 'Impala Armchair', 'Kudu Studio', '£1,620', 'Chairs', '', 'products/bebitalia_armchair_Metropolitan_Relax_05.jpg' ),
			array( 'Harbour Chair', 'Kudu Studio', '£1,490', 'Chairs', '', 'products/bebitalia_armchair_Harbor_01.jpg' ),
			array( 'Karoo Chair', 'Kudu Studio', '£680', 'Chairs', '', 'products/bebitalia_chair_Jens_01.jpg' ),
			array( 'Acacia Dining Table', 'Kudu Studio', '£2,750', 'Tables', '', 'products/bebitalia_table_Alex_01_7.jpg' ),
			array( 'Thorn Coffee Table', 'Kudu Studio', '£1,180', 'Small Tables', '', 'products/bebitalia_small-table_Diesis_01.jpg' ),
			array( 'Aloe Side Table', 'Kudu Studio', '£540', 'Small Tables', '', 'products/bebitalia_small-table_Surface_01.jpg' ),
			array( 'Kudu Ottoman', 'Kudu Studio', '£720', 'Complements', '', 'products/bebitalia_ottoman_Hive_01.jpg' ),
			array( 'Marula Wardrobe', 'Kudu Studio', '£3,420', 'Wardrobe', '', 'products/bebitalia_wallsystem_Jack_01.jpg' ),
		);
		$desc = 'Built around how people really live — solid oak, hand-finished surfaces and natural, tactile materials. A quiet, considered piece designed to be used every day and to age beautifully over the years.';
		foreach ( $products as $p ) {
			if ( kudu_title_exists( $p[0], 'product' ) ) {
				continue;
			}
			$pid = wp_insert_post( array(
				'post_title'   => $p[0],
				'post_status'  => 'publish',
				'post_type'    => 'product',
				'post_content' => $desc,
			) );
			if ( $pid && ! is_wp_error( $pid ) ) {
				update_post_meta( $pid, '_kudu_designer', $p[1] );
				update_post_meta( $pid, '_kudu_price', $p[2] );
				update_post_meta( $pid, '_kudu_category', $p[3] );
				update_post_meta( $pid, '_kudu_is_new', $p[4] );
				update_post_meta( $pid, '_kudu_demo_image', $p[5] );
				wp_set_object_terms( $pid, $p[3], 'product_cat' );
			}
		}

		// --- Sample projects ---
		$projects = array(
			array( 'Safari Lodge', 'Cape Town', 'Hospitality', 'sections/contract.jpg' ),
			array( 'The Oak Room', 'London', 'Hospitality', 'inspirations/scene-01.jpg' ),
			array( 'Studio Loft', 'Berlin', 'Workplace', 'inspirations/scene-02.jpg' ),
			array( 'Garden House', 'Franschhoek', 'Residential', 'inspirations/scene-03.jpg' ),
			array( 'Harbour Suite', 'Cape Town', 'Hospitality', 'inspirations/scene-04.jpg' ),
			array( 'Savanna House', 'Stellenbosch', 'Residential', 'inspirations/scene-05.jpg' ),
			array( 'Corporate HQ', 'New York', 'Workplace', 'categories/indoor.jpg' ),
			array( 'Wine Estate', 'Constantia', 'Hospitality', 'categories/outdoor.jpg' ),
		);
		foreach ( $projects as $pr ) {
			if ( kudu_title_exists( $pr[0], 'project' ) ) {
				continue;
			}
			$prid = wp_insert_post( array(
				'post_title'   => $pr[0],
				'post_status'  => 'publish',
				'post_type'    => 'project',
				'post_content' => 'A Kudu Living interior — furniture and wood-based detailing crafted for the space.',
			) );
			if ( $prid && ! is_wp_error( $prid ) ) {
				update_post_meta( $prid, '_kudu_location', $pr[1] );
				update_post_meta( $prid, '_kudu_category', $pr[2] );
				update_post_meta( $prid, '_kudu_demo_image', $pr[3] );
				wp_set_object_terms( $prid, $pr[2], 'project_type' );
			}
		}

		update_option( 'kudu_seeded', 1 );
	}

	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'kudu_seed_content' );
