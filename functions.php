<?php
/**
 * EFCA District Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EFCA_District_Theme
 */

if ( ! function_exists( 'efca_district_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function efca_district_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EFCA District Theme, use a find and replace
	 * to change 'efca-district' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'efca-district', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'efca-district' ),
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
	add_theme_support( 'custom-background', apply_filters( 'efca_district_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'efca_district_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function efca_district_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'efca_district_content_width', 640 );
}
add_action( 'after_setup_theme', 'efca_district_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function efca_district_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'efca-district' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'efca-district' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'efca_district_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function efca_district_scripts() {
	wp_enqueue_style( 'efca-district-style', get_stylesheet_uri() );

	wp_enqueue_script( 'efca-district-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'efca-district-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), true);

	wp_enqueue_script('efca-today-js', get_template_directory_uri() . '/js/efca-today.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'efca_district_scripts' );

/**
** Options Page
**/

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

/**
* Clean Custom Menu  to replace wp_nav_menu()
*/
function clean_custom_menu( $theme_location ) {
    if ( ($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location]) ) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items($menu->term_id);
 
        $menu_list .= '<ul class="first_level_menu  menu  flex  min-menu">' ."\n";
 
        $count = 0;
        $submenu = false;
         
        foreach( $menu_items as $menu_item ) {
             
            $link = $menu_item->url;
            $title = $menu_item->title;
             
            if ( !$menu_item->menu_item_parent ) {
                $parent_id = $menu_item->ID;
                 
                $menu_list .= '<li class="first">' ."\n";
                $menu_list .= '<span>'.$title.'</span>' ."\n";
            }
 
            if ( $parent_id == $menu_item->menu_item_parent ) {
 
                if ( !$submenu ) {
                    $submenu = true;
                    $menu_list .= '<ul class="menu  flex  submenu">' ."\n";
                }
 
                $menu_list .= '<li>' ."\n";
                $menu_list .= '<a href="'.$link.'" class="title">'.$title.'</a>' ."\n";
                $menu_list .= '</li>' ."\n";
                     
 
                if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){
                    $menu_list .= '</ul>' ."\n";
                    $submenu = false;
                }
 
            }
 
            if ( $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
                $menu_list .= '</li>' ."\n";      
                $submenu = false;
            }
 
            $count++;
        }
         
        $menu_list .= '</ul>' ."\n";
 
    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }
    echo $menu_list;
}

/**
 * Add excerpts to pages
 */
add_action( 'init', 'add_excerpts_to_pages' );
function add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

class efca_job {

  function __construct() {
    add_action('init',array($this,'create_post_type'));
	}

	function create_post_type() {
	  $labels = array(
	    'name'               => 'Employment',
	    'singular_name'      => 'Job',
	    'menu_name'          => 'Jobs',
	    'name_admin_bar'     => 'Employment',
	    'add_new'            => 'New Job Posting',
	    'add_new_item'       => 'Add New Job Posting',
	    'new_item'           => 'New Job Posting',
	    'edit_item'          => 'Edit Job Posting',
	    'view_item'          => 'View Job Posting',
	    'all_items'          => 'All Jobs',
	    'search_items'       => 'Search Job Postings',
	    'not_found'          => 'No Jobs Found',
	    'not_found_in_trash' => 'No Jobs Found in Trash'
	  );

	  $args = array(
	    'labels'              => $labels,
	    'public'              => true,
	    'exclude_from_search' => false,
	    'publicly_queryable'  => true,
	    'show_ui'             => true,
	    'show_in_nav_menus'   => true,
	    'show_in_menu'        => true,
	    'show_in_admin_bar'   => true,
	    'menu_position'       => 5,
	    'menu_icon'           => 'dashicons-admin-appearance',
	    'capability_type'     => 'post',
	    'hierarchical'        => false,
	    'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	    'has_archive'         => true,
	    'rewrite'             => array( 'slug' => 'jobs' ),
	    'query_var'           => true
	  );

	  register_post_type( 'efca_job', $args );
	}
}

new efca_job();

/**
 * TypeKit Fonts
 *
 * @since Theme 1.0
 */

function theme_typekit() {
    wp_enqueue_script( 'theme_typekit', '//use.typekit.net/dqv7adf.js');
}
add_action( 'wp_enqueue_scripts', 'theme_typekit' );

function theme_typekit_inline() {
  if ( wp_script_is( 'theme_typekit', 'done' ) ) { ?>
  	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php }
}
add_action( 'wp_head', 'theme_typekit_inline' );

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
