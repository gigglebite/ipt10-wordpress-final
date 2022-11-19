<?php 

	$laundry_master_custom_style = '';

	// Logo Size
	$laundry_master_logo_top_padding = get_theme_mod('laundry_master_logo_top_padding');
	$laundry_master_logo_bottom_padding = get_theme_mod('laundry_master_logo_bottom_padding');
	$laundry_master_logo_left_padding = get_theme_mod('laundry_master_logo_left_padding');
	$laundry_master_logo_right_padding = get_theme_mod('laundry_master_logo_right_padding');

	if( $laundry_master_logo_top_padding != '' || $laundry_master_logo_bottom_padding != '' || $laundry_master_logo_left_padding != '' || $laundry_master_logo_right_padding != ''){
		$laundry_master_custom_style .=' .logo {';
			$laundry_master_custom_style .=' padding-top: '.esc_attr($laundry_master_logo_top_padding).'px; padding-bottom: '.esc_attr($laundry_master_logo_bottom_padding).'px; padding-left: '.esc_attr($laundry_master_logo_left_padding).'px; padding-right: '.esc_attr($laundry_master_logo_right_padding).'px;';
		$laundry_master_custom_style .=' }';
	}

	// service section padding
	$laundry_master_service_section_padding = get_theme_mod('laundry_master_service_section_padding');

	if( $laundry_master_service_section_padding != ''){
		$laundry_master_custom_style .=' #our_service {';
			$laundry_master_custom_style .=' padding-top: '.esc_attr($laundry_master_service_section_padding).'px; padding-bottom: '.esc_attr($laundry_master_service_section_padding).'px;';
		$laundry_master_custom_style .=' }';
	}

	// Site Title Font Size
	$laundry_master_site_title_font_size = get_theme_mod('laundry_master_site_title_font_size');
	if( $laundry_master_site_title_font_size != ''){
		$laundry_master_custom_style .=' .logo h1.site-title, .logo p.site-title {';
			$laundry_master_custom_style .=' font-size: '.esc_attr($laundry_master_site_title_font_size).'px;';
		$laundry_master_custom_style .=' }';
	}

	// Site Tagline Font Size
	$laundry_master_site_tagline_font_size = get_theme_mod('laundry_master_site_tagline_font_size');
	if( $laundry_master_site_tagline_font_size != ''){
		$laundry_master_custom_style .=' .logo p.site-description {';
			$laundry_master_custom_style .=' font-size: '.esc_attr($laundry_master_site_tagline_font_size).'px;';
		$laundry_master_custom_style .=' }';
	}

	// Copyright padding
	$laundry_master_copyright_padding = get_theme_mod('laundry_master_copyright_padding');

	if( $laundry_master_copyright_padding != ''){
		$laundry_master_custom_style .=' .site-info {';
			$laundry_master_custom_style .=' padding-top: '.esc_attr($laundry_master_copyright_padding).'px; padding-bottom: '.esc_attr($laundry_master_copyright_padding).'px;';
		$laundry_master_custom_style .=' }';
	}

	// slider CSS
	$laundry_master_slider_hide_show = get_theme_mod('laundry_master_slider_hide_show',false);
	if( $laundry_master_slider_hide_show == true){
		$laundry_master_custom_style .=' .page-template-custom-home-page #inner-pages-header {';
			$laundry_master_custom_style .=' display:none;';
		$laundry_master_custom_style .=' }';
	} else {
		$laundry_master_custom_style .=' .page-template-custom-home-page #header {';
			$laundry_master_custom_style .=' position:static; background: #7989f8;';
		$laundry_master_custom_style .=' }';
	}