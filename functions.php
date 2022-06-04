<?php
/**
 * adnets functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adnets
 */

require_once('inc/theme-options/codestar-framework.php');
// require_once('inc/theme-options/samples/admin-options.php');
require_once('inc/theme-options/options.php');
// require_once('inc/theme-options/samples/metabox-options.php');
require_once('inc/navwalker.php');
require_once('inc/custom-widgets/top-network.php');
require_once('inc/custom-widgets/top-10-networks.php');
require_once('inc/custom-widgets/newsletter.php');
require_once('inc/custom-widgets/featured-networks.php');
require_once('inc/custom-widgets/recent-reviews.php');
require_once('inc/custom-widgets/image-ad.php');
require_once('inc/custom-widgets/featured-gif.php');

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adnets_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on adnets, use a find and replace
		* to change 'adnets' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'adnets', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in more than one location.
	register_nav_menus(
		array(
			'adnets-main-menu' => esc_html__( 'Primary', 'adnets' ),
			'adnets-category-menu' => esc_html__( 'Categories', 'adnets' ),
			'adnets-footer-left-1' => esc_html__( 'Footer Left 1', 'adnets' ),
			'adnets-footer-left-2' => esc_html__( 'Footer Left 2', 'adnets' ),
			'adnets-footer-middle-1' => esc_html__( 'Footer Middle 1', 'adnets' ),
			'adnets-footer-middle-2' => esc_html__( 'Footer Middle 2', 'adnets' ),
			'adnets-footer-menu' => esc_html__( 'Footer', 'adnets' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'adnets_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true
		)
	);

}
add_action( 'after_setup_theme', 'adnets_setup' );



// Register Post type
function adnets_networks() {
   	// Network post type.
	register_post_type('network', array(
		'labels'	=>	array(
			'name'	=>	esc_html__('Networks', 'adnets'),
			'all_items'             => __( 'All Networks', 'adnets' ),
			'add_new'	=>	esc_html__('Add New', 'adnets'),
			'add_new_item'	=>	esc_html__('Add New Network', 'adnets')
		),
		'public'		=>		true,
		'supports'	=>	array('title', 'thumbnail', 'editor', 'comments')
	));

	// Register Taxonomy Category

	$labels = array(
		'name'              => _x( 'Network categories', 'taxonomy general name', 'adnets' ),
		'singular_name'     => _x( 'Network category', 'taxonomy singular name', 'adnets' ),
		'search_items'      => __( 'Search Categories', 'adnets' ),
		'all_items'         => __( 'All Categories', 'adnets' ),
		'parent_item'       => __( 'Parent Category', 'adnets' ),
		'parent_item_colon' => __( 'Parent Category:', 'adnets' ),
		'edit_item'         => __( 'Edit Category', 'adnets' ),
		'update_item'       => __( 'Update Category', 'adnets' ),
		'add_new_item'      => __( 'Add New Category', 'adnets' ),
		'new_item_name'     => __( 'New Category Name', 'adnets' ),
		'menu_name'         => __( 'Network categories', 'adnets' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'adnets' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'network-category', array('network'), $args );


	// Offers post type.
	register_post_type('offers', array(
		'labels'	=>	array(
			'name'	=>	esc_html__('Offers', 'adnets'),
			'all_items'             => __( 'All Offers', 'adnets' ),
			'add_new'	=>	esc_html__('Add New Offer', 'adnets'),
			'add_new_item'	=>	esc_html__('Add New Offer', 'adnets')
		),
		'public'		=>		true,
		'supports'	=>	array('title', 'thumbnail', 'editor', 'comments')
	));


	// Register Taxonomy type of offers

	$labels = array(
		'name'              => _x( 'Offer types', 'taxonomy general name', 'adnets' ),
		'singular_name'     => _x( 'Offer type', 'taxonomy singular name', 'adnets' ),
		'search_items'      => __( 'Search Types', 'adnets' ),
		'all_items'         => __( 'All Types', 'adnets' ),
		'parent_item'       => __( 'Parent Type', 'adnets' ),
		'parent_item_colon' => __( 'Parent Type:', 'adnets' ),
		'edit_item'         => __( 'Edit Type', 'adnets' ),
		'update_item'       => __( 'Update Type', 'adnets' ),
		'add_new_item'      => __( 'Add New Type', 'adnets' ),
		'new_item_name'     => __( 'New Type Name', 'adnets' ),
		'menu_name'         => __( 'Offer types', 'adnets' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'adnets' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'offer-type', array('offers'), $args );

	//refresh parmalinks, functions, 
	flush_rewrite_rules();
}
add_action( 'init', 'adnets_networks' );


// custom post type register



// Anchor tag class
function add_link_atts($atts) {
	$atts['class'] = "link me-3 mp-link";
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_link_atts');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adnets_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adnets_content_width', 640 );
}
add_action( 'after_setup_theme', 'adnets_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adnets_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Right Sidebar', 'adnets' ),
			'id'            => 'right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'adnets' )
		)
	);
}
add_action( 'widgets_init', 'adnets_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adnets_scripts() {
	wp_enqueue_style( 'adnets-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'adnets-animate', get_template_directory_uri(). '/assets/css/animate.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-bootstrap-min', get_template_directory_uri(). '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-magnifig-popup', get_template_directory_uri(). '/assets/css/magnific-popup.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-slick', get_template_directory_uri(). '/assets/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-nicc-select', get_template_directory_uri(). '/assets/css/nice-select.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-progressbar', get_template_directory_uri(). '/assets/css/jQuery-plugin-progressbar.css', array(), _S_VERSION );
	wp_enqueue_style( 'adnets-main-style', get_template_directory_uri(). '/assets/css/style.css', array(), _S_VERSION );
	

	wp_style_add_data( 'adnets-style', 'rtl', 'replace' );


	wp_enqueue_script( 'adnets-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/vendor/slick.js', array('bootstrap'), _S_VERSION, true );

	wp_enqueue_script( 'popup', get_template_directory_uri() . '/assets/js/vendor/jquery.magnific-popup.min.js', array('slick'), _S_VERSION, true );

	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/vendor/waypoints.min.js', array('popup'), _S_VERSION, true );

	wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/vendor/easing.min.js', array('waypoints'), _S_VERSION, true );

	wp_enqueue_script( 'adnets-jquery-ui', get_template_directory_uri() . '/assets/js/vendor/jquery-ui.js', array('easing'), _S_VERSION, true );

	wp_enqueue_script( 'apexcharts', 'https://cdn.jsdelivr.net/npm/apexcharts', array(), _S_VERSION, true );

	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/vendor/wow.min.js', array('apexcharts'), _S_VERSION, true );

	wp_enqueue_script( 'adnets-nice-select-min', get_template_directory_uri() . '/assets/js/vendor/jquery.nice-select.min.js', array('wow'), _S_VERSION, true );

	wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/assets/js/vendor/jQuery-plugin-progressbar.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'adnets-main', get_template_directory_uri() . '/assets/js/main.js', array('progressbar'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adnets_scripts' );

// admin stylesheet
function load_admin_style() {
    wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if(file_exists(get_template_directory() . '/custom-cfw-menu.php')){

	require get_template_directory() . '/custom-cfw-menu.php';
}


if(file_exists(get_template_directory() . '/nav_walker_category_menu.php')){

	require get_template_directory() . '/nav_walker_category_menu.php';
}






// custom class add to post thumbnail

function new_class_to_post_thumbnail($attr) {
  remove_filter('wp_get_attachment_image_attributes','new_class_to_post_thumbnail');
  $attr['class'] .= ' slider-img';
  return $attr;
}
add_filter('wp_get_attachment_image_attributes','new_class_to_post_thumbnail'); 


// Custom pagination start

function adnets_pagination() {

if( is_singular() )
    return;

global $wp_query;

/** Stop execution if there's only 1 page */
if( $wp_query->max_num_pages <= 1 )
    return;

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$max   = intval( $wp_query->max_num_pages );

/** Add current page to the array */
if ( $paged >= 1 )
    $links[] = $paged;

/** Add the pages around the current page to the array */
if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
}

if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
}

echo '<ul class="pagination custom-pagination justify-content-start px-4">' . "\n";

/** Previous Post Link */
if ( get_previous_posts_link() )
    printf( '<li class="page-item"><a class="page-link" href="%s"><spanclass"prev-class">Previous</span></a></li>' . "\n", get_previous_posts_page_link() );

/** Link to first page, plus ellipses if necessary */
if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li class="page-item"%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
        echo '<li class="page-item">…</li>';
}

/** Link to current page, plus 2 pages in either direction if necessary */
sort( $links );
foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li class="page-item"%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
}

/** Link to last page, plus ellipses if necessary */
if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
        echo '<li class="page-item">…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li class="page-item"%s><a class="page-link" href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
}

/** Next Post Link */
if ( get_next_posts_link() )
    printf( '<li class="page-item"><a class="page-link" href="%s"><span class="next-class">Next</span></a></li>' . "\n", get_next_posts_page_link() );

echo '</ul>' . "\n";
}


// custom search for networks 

function template_search($template)   
{    
  global $wp_query;   
  $post_type = get_query_var('post_type');   
  if( $wp_query->is_search && $post_type == 'network' )   
  {
    return locate_template('network-search.php');  //  redirect to archive-search.php
  }   
  return $template;   
}
add_filter('template_include', 'template_search');  