<?php
/**
 * theme's main functions and globally usable variables, contants etc
 * added: v2.1.1 
 * textdomain: newseqo , class: Newseqo, var: $newseqo_, constants: NEWSEQO_, function: newseqo_
 */

 // shorthand contants
// ------------------------------------------------------------------------
define('NEWSEQO_THEME', 'Newseqo Magazine WordPress Theme');
define('NEWSEQO_VERSION', '2.1.1');
define('NEWSEQO_MINWP_VERSION', '5.2');

// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('NEWSEQO_THEME_URI', get_template_directory_uri());
define('NEWSEQO_IMG', NEWSEQO_THEME_URI . '/assets/images');
define('NEWSEQO_CSS', NEWSEQO_THEME_URI . '/assets/css');
define('NEWSEQO_JS', NEWSEQO_THEME_URI . '/assets/js');

// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('NEWSEQO_THEME_DIR', get_template_directory());
define('NEWSEQO_IMG_DIR', NEWSEQO_THEME_DIR . '/assets/images');
define('NEWSEQO_CSS_DIR', NEWSEQO_THEME_DIR . '/assets/css');
define('NEWSEQO_JS_DIR', NEWSEQO_THEME_DIR . '/assets/js');

define('NEWSEQO_INC', NEWSEQO_THEME_DIR . '/inc');
define('NEWSEQO_CORE', NEWSEQO_THEME_DIR . '/core');
define('NEWSEQO_COMPONENTS', NEWSEQO_THEME_DIR . '/components');
define('NEWSEQO_EDITOR', NEWSEQO_COMPONENTS . '/editor');
define('NEWSEQO_EDITOR_ELEMENTOR', NEWSEQO_EDITOR . '/elementor');
define('NEWSEQO_REMOTE_CONTENT', esc_url('https://demo.themewinter.com/wpsite/demo-content/newseqo'));
define('NEWSEQO_LIVE_URL', esc_url('https://demo.themewinter.com/wpsite/newseqo/'));
define('NEWSEQO_LIVE_URL_PRO', esc_url('https://demo.themewinter.com/wpsite/newseqo-pro/'));

if ( ! function_exists( 'newseqo_setup' ) ) :
	
	function newseqo_setup() {
	
	  load_theme_textdomain( 'newseqo', get_template_directory() . '/languages' );
      add_theme_support( 'automatic-feed-links' );
      add_theme_support( 'title-tag' );

      add_theme_support( 'post-thumbnails' );
      add_theme_support('post-formats', [
         'standard', 'image', 'video', 'audio','gallery'
     ]);
      
      set_post_thumbnail_size(750, 465, ['center', 'center']);
      add_image_size( 'newseqo_two_column', 350, 228, [ 'center', 'center' ] );
      add_image_size( 'newseqo_one_column', 730, 475, [ 'center', 'center' ] );
      add_image_size( 'newseqo_sidebar_img', 70, 70, true );

		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'newseqo' ),
			'topbarmenu' => esc_html__( 'Top nav', 'newseqo' ),
			'footer_menu' => esc_html__( 'Footer nav', 'newseqo' ),
		) );
	
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
      ) );
      add_editor_style();

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'newseqo_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );
    	add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
      ) );
    
	}
endif;
add_action( 'after_setup_theme', 'newseqo_setup' );

function newseqo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'newseqo_content_width', 800 ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}
add_action( 'after_setup_theme', 'newseqo_content_width', 0 );

add_action('enqueue_block_editor_assets', 'newseqo_action_enqueue_block_editor_assets' );
function newseqo_action_enqueue_block_editor_assets() {
    // google fonts for block editor only 
	wp_enqueue_style( 'newseqo-fonts', Newseqo_Google_Fonts::newseqo_google_fonts_url(['Poppins:300,400,500,600,700,800,900', 'Roboto:300,400,500,700,900']), null,  NEWSEQO_VERSION );
    wp_enqueue_style( 'newseqo-gutenberg-editor-font-awesome-styles', NEWSEQO_CSS . '/font-awesome.css', null, NEWSEQO_VERSION );
    wp_enqueue_style( 'newseqo-gutenberg-editor-customizer-styles', NEWSEQO_CSS . '/gutenberg-editor-custom.css', null, NEWSEQO_VERSION );

    wp_enqueue_style( 'newseqo-gutenberg-blog-styles', NEWSEQO_CSS . '/blog.css', null, NEWSEQO_VERSION );
}

/**
 * Implement global function.
 */

require get_template_directory() . '/inc/helpers/global.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';
/**
 * widgets for this theme.
 */
require get_template_directory() . '/inc/hooks/widget-areas.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require_once( NEWSEQO_COMPONENTS . '/editor/elementor/elementor.php');

/**
 * tagmpa.
 */
require get_template_directory() . '/inc/libs/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/hooks/installation-fragments/tgmpa-plugins.php';
require get_template_directory() . '/inc/hooks/installation-fragments/demos.php';

/**
 * helpers.
 */
require get_template_directory() . '/inc/helpers/newseqo-google-fonts.php';
require get_template_directory() . '/inc/hooks/blog.php';
require get_template_directory() . '/inc/hooks/menus.php';

/**
 * assets enqueues.
 */
require get_template_directory() . '/inc/hooks/enqueues/admin/static.php';
require get_template_directory() . '/inc/hooks/enqueues/frontend/static.php';
require get_template_directory() . '/inc/hooks/enqueues/frontend/dynamic.php';
require get_template_directory() . '/customizer-repeater/init.php';

if(is_admin()){
	require get_template_directory() . '/inc/class-newseqo-admin-settings.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() { // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedFunctionFound
		do_action( 'wp_body_open' ); // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedHooknameFound
	}
}


function newseqo_js_css_admin(){
	wp_enqueue_script( 'newseqo', get_template_directory_uri(  ) . '/assets/js/newseqo-admin.js', ['jquery'], NEWSEQO_VERSION, false );
}
add_action( 'admin_enqueue_scripts', 'newseqo_js_css_admin' );




