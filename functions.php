<?php
/**
 */

if ( ! function_exists( 'barking_dog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function barking_dog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Barking Dog, use a find and replace
	 * to change 'barking-dog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'barking-dog', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'barking-dog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'barking_dog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Add support for quote post format
    add_theme_support( 'post-formats', array( 'quote' ) );
}
endif;
add_action( 'after_setup_theme', 'barking_dog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function barking_dog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'barking_dog_content_width', 640 );
}
add_action( 'after_setup_theme', 'barking_dog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function barking_dog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'barking-dog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'barking-dog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'barking_dog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function barking_dog_scripts() {
	wp_enqueue_style( 'barking-dog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'barking-dog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'barking-dog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'barking_dog_typekit', '//use.typekit.net/siv0zhs.js');

}
add_action( 'wp_enqueue_scripts', 'barking_dog_scripts' );

function barking_dog_typekit_inline() {
    if ( wp_script_is( 'barking_dog_typekit', 'done' ) ) { ?>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
    <?php }
}
add_action( 'wp_head', 'barking_dog_typekit_inline' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Remove edit link from posts
add_filter( 'edit_post_link', '__return_false' );

// Register my custom skin for The Grid plugin (files in barking-dog/the-grid/masonry)
// add_filter('tg_register_item_skin', function($skins) {

    // just push your skin slugs (file name) inside the registered skin array
    // $skins = array_merge($skins,
    //     array(
    //         'tg-barking' => array(
    //             'filter'   => 'My Filter', // filter name used in slider skin preview
    //             'name'     => 'BarkingCoded', // Skin name used in skin preview label
    //             'col'      => 1, // col number in preview skin mode
    //             'row'      => 1  // row number in preview skin mode
    //         )
    //     )
    // );

    // return all skins + the new one we added (tg-barking)
//     return $skins;

// });

// Register my custom skin for The Grid plugin (files in barking-dog/the-grid/masonry)
add_filter('tg_add_item_skin', function($skins) {

    $PATH = get_stylesheet_directory();

    // register a skin and add it to the main skins array
    $skins['tg-barking'] = array(
        'type'   => 'masonry',
        'filter' => 'barking-dog',
        'slug'   => 'tg-barking',
        'name'   => 'Barking',
        'php'    => $PATH . '/the-grid/masonry/tg-barking/tg-barking.php',
        'css'    => $PATH . '/the-grid/masonry/tg-barking/tg-barking.css',
        'col'    => 1, // col number in preview skin mode
        'row'    => 1  // row number in preview skin mode
    );

    // register a skin and add it to the main skins array
    $skins['tg-barking-testimonial'] = array(
        'type'   => 'masonry',
        'filter' => 'barking-dog',
        'slug'   => 'tg-barking-testimonial',
        'name'   => 'BarkingTestimonial',
        'php'    => $PATH . '/the-grid/masonry/tg-barking/tg-barking-testimonial.php',
        'css'    => $PATH . '/the-grid/masonry/tg-barking/tg-barking.css',
        'col'    => 1, // col number in preview skin mode
        'row'    => 1  // row number in preview skin mode
    );

    // return the skins array + the new one you added (in this example 2 new skins was added)
    return $skins;

});

//Adding the Open Graph in the Language Attributes ala WPBeginner
function add_opengraph_doctype( $output ) {
        return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
    }
add_filter('language_attributes', 'add_opengraph_doctype');

//Lets add Open Graph Meta Info

function insert_fb_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page, ditch
        return;
        // echo '<meta property="fb:admins" content="YOUR USER ID"/>';
        echo '<meta property="og:title" content="Barking Dog Web"/>';
        echo '<meta property="fb:app_id" content="1538943909468098" />';
        echo '<meta property="og:type" content="website"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="Barking Dog Web"/>';
        echo '<meta property="og:image" content="https://barkingdogweb.com/wp-content/themes/barking-dog/images/barkingdog_og.png" />';
        echo '<meta property="og:description" content="Lisa Wells, web developer (with an eye for design), a puzzle solver who loves nothing better than finding an elegant solution to a sticky problem." />';
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
