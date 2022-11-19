<?php
/**
 * Custom header implementation
 */

function laundry_master_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'laundry_master_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 120,
		'wp-head-callback'       => 'laundry_master_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'laundry_master_custom_header_setup' );

if ( ! function_exists( 'laundry_master_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see laundry_master_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'laundry_master_header_style' );
function laundry_master_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header, #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'laundry-master-basic-style', $custom_css );
	endif;
}
endif; // laundry_master_header_style