<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function newseqo_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Devmonsta', 'newseqo' ),
			'slug'		 => 'devmonsta',
			'required'	 => true,
		), 
		array(
			'name'		 => esc_html__( 'Elementor', 'newseqo' ),
			'slug'		 => 'elementor',
			'required'	 => false,
		),
		array(
			'name'		 => esc_html__( 'Wp Social', 'newseqo' ),
			'slug'		 => 'wp-social',
			'required'	 => false,
		),

		array(
			'name'		 => esc_html__( 'One Click Demo Import', 'newseqo' ),
			'slug'		 => 'one-click-demo-import',
			'required'	 => true,
		),

		array(
			'name'		 => esc_html__( 'PostX', 'newseqo' ),
			'slug'		 => 'ultimate-post',
			'required'	 => false,
		),

		array(
			'name'		 => esc_html__( 'Elementskit Lite', 'newseqo' ),
			'slug'		 => 'elementskit-lite',
			'required'	 => false,
		),
		
	);

	$new_demo =  [
		'name'		 => esc_html__( 'Elementskit Lite', 'newseqo' ),
		'slug'		 => 'elementskit-lite',
		'required'	 => true,
	];
	
	
	if ( class_exists('Newseqo\Bootstrap') ) {
		array_push( $plugins, $new_demo );
	}

	$config = array(
		'id'			 => 'newseqo', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'newseqo-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'newseqo_register_required_plugins' );