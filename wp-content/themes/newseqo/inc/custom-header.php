<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package newseqo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newseqo_header_style()
 */
function newseqo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'newseqo_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'newseqo_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'newseqo_custom_header_setup' );

if ( ! function_exists( 'newseqo_header_style' ) ) :
	
	function newseqo_header_style() {
		$header_text_color = get_header_textcolor();
	
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}
	
	}
endif;
