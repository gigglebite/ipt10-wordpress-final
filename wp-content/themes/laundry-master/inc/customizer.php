<?php
/**
 * Laundry Master: Customizer
 *
 * @subpackage Laundry Master
 * @since 1.0
 */

use WPTRT\Customize\Section\Laundry_Master_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Laundry_Master_Button::class );

	$manager->add_section(
		new Laundry_Master_Button( $manager, 'laundry_master_pro', [
			'title'       => __( 'Laundry Master Pro', 'laundry-master' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'laundry-master' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/laundry-wordpress-theme/', 'laundry-master')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'laundry-master-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'laundry-master-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function laundry_master_customize_register( $wp_customize ) {

	$wp_customize->add_setting('laundry_master_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('laundry_master_logo_padding',array(
		'label' => __('Logo Padding','laundry-master'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('laundry_master_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','laundry-master'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('laundry_master_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','laundry-master'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('laundry_master_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','laundry-master'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('laundry_master_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','laundry-master'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('laundry_master_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'laundry_master_sanitize_checkbox'
 	));
 	$wp_customize->add_control('laundry_master_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','laundry-master'),
		'section' => 'title_tagline'
 	));

	$wp_customize->add_setting('laundry_master_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','laundry-master'),
		'section' => 'title_tagline',
	));

 	$wp_customize->add_setting('laundry_master_show_tagline',array(
    	'default' => true,
    	'sanitize_callback'	=> 'laundry_master_sanitize_checkbox'
 	));
 	$wp_customize->add_control('laundry_master_show_tagline',array(
    	'type' => 'checkbox',
    	'label' => __('Show / Hide Site Tagline','laundry-master'),
    	'section' => 'title_tagline'
 	));

	$wp_customize->add_setting('laundry_master_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','laundry-master'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'laundry_master_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'laundry-master' ),
	    'description' => __( 'Description of what this panel does.', 'laundry-master' ),
	) );

	$wp_customize->add_section( 'laundry_master_theme_options_section', array(
    	'title'      => __( 'General Settings', 'laundry-master' ),
		'priority'   => 30,
		'panel' => 'laundry_master_panel_id'
	) );
	$wp_customize->add_setting('laundry_master_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'laundry_master_sanitize_choices'	        
	));
	$wp_customize->add_control('laundry_master_theme_options',array(
		'type' => 'radio',
		'label' => __('Sidebar Option','laundry-master'),
		'section' => 'laundry_master_theme_options_section',
		'choices' => array(
		   'Left Sidebar' => __('Left Sidebar','laundry-master'),
		   'Right Sidebar' => __('Right Sidebar','laundry-master'),
		   'One Column' => __('One Column','laundry-master'),
		   'Three Columns' => __('Three Columns','laundry-master'),
		   'Four Columns' => __('Four Columns','laundry-master'),
		   'Grid Layout' => __('Grid Layout','laundry-master')
		),
	));

	//Topbar section
	$wp_customize->add_section( 'laundry_master_contact' , array(
    	'title'      => __( 'Contact Us', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'laundry_master_sanitize_phone_number'
	));	
	$wp_customize->add_control('laundry_master_call',array(
		'label'	=> __('Phone No.','laundry-master'),
		'section'	=> 'laundry_master_contact',
		'type'		=> 'text'
	));

	//home page slider
	$wp_customize->add_section( 'laundry_master_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'laundry_master_sanitize_checkbox'
	));
	$wp_customize->add_control('laundry_master_slider_hide_show',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide slider','laundry-master'),
   	'section' => 'laundry_master_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'laundry_master_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'laundry_master_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'laundry_master_slider' . $count, array(
			'label' => __( 'Select Slide Image Page', 'laundry-master' ),
			'section' => 'laundry_master_slider_section',
			'type' => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('laundry_master_slider_excerpt_length',array(
		'default' => '15',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
	));
	$wp_customize->add_control('laundry_master_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','laundry-master'),
		'section' => 'laundry_master_slider_section',
	));

	// Our Expertise 
	$wp_customize->add_section('laundry_master_services_section',array(
		'title'	=> __('Services Section','laundry-master'),
		'description'=> __('This section will appear below the Slider section.','laundry-master'),
		'panel' => 'laundry_master_panel_id',
	));
	
	for ( $count = 0; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'laundry_master_services_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'laundry_master_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'laundry_master_services_page' . $count, array(
			'label'    => __( 'Select Service Page', 'laundry-master' ),
			'description' => __('Image size (255px x 300px)', 'laundry-master'),
			'section'  => 'laundry_master_services_section',
			'type'     => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('laundry_master_service_section_padding',array(
      'default' => '',
      'sanitize_callback'	=> 'laundry_master_sanitize_float'
   ));
   $wp_customize->add_control('laundry_master_service_section_padding',array(
      'type' => 'number',
      'label' => __('Section Top Bottom Padding','laundry-master'),
      'section' => 'laundry_master_services_section',
   ));

	//Footer
    $wp_customize->add_section( 'laundry_master_footer', array(
    	'title'      => __( 'Footer Text', 'laundry-master' ),
		'priority'   => null,
		'panel' => 'laundry_master_panel_id'
	) );

	$wp_customize->add_setting('laundry_master_show_back_totop',array(
 		'default' => true,
   	'sanitize_callback'	=> 'laundry_master_sanitize_checkbox'
	));
	$wp_customize->add_control('laundry_master_show_back_totop',array(
   	'type' => 'checkbox',
   	'label' => __('Show / Hide Back to Top','laundry-master'),
   	'section' => 'laundry_master_footer'
	));

    $wp_customize->add_setting('laundry_master_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('laundry_master_footer_copy',array(
		'label'	=> __('Footer Text','laundry-master'),
		'section'	=> 'laundry_master_footer',
		'setting'	=> 'laundry_master_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('laundry_master_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'laundry_master_sanitize_float'
 	));
 	$wp_customize->add_control('laundry_master_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','laundry-master'),
		'section' => 'laundry_master_footer',
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'laundry_master_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'laundry_master_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'laundry_master_customize_register' );

function laundry_master_customize_partial_blogname() {
	bloginfo( 'name' );
}

function laundry_master_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function laundry_master_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function laundry_master_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}