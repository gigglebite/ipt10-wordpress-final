<?php
function newseqo_import_files() {
    $demo_content_installer	 = NEWSEQO_REMOTE_CONTENT;
	$demos = array(
	  array(
		'import_file_name'           => 'Home Default',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/newseqo-lite/main/main.xml',
        'import_customizer_file_url' => $demo_content_installer . '/newseqo-lite/main/customizer.dat',
        'import_widget_file_url'     => $demo_content_installer . '/newseqo-lite/main/widgets.wie',
		'import_preview_image_url'   => $demo_content_installer . '/newseqo-lite/main/screenshot.png',
		'preview_url'                => NEWSEQO_LIVE_URL,
      ),
	  array(
		'import_file_name'           => 'Home Lite 1',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/newseqo-lite/home-1/home-1.xml',
        'import_customizer_file_url' => $demo_content_installer . '/newseqo-lite/home-1/home-1.dat',
        'import_widget_file_url'     => $demo_content_installer . '/newseqo-lite/home-1/home-1.wie',
		'import_preview_image_url'   => $demo_content_installer . '/newseqo-lite/home-1/screenshot-1.png',
		'preview_url'                => NEWSEQO_LIVE_URL,
      ),
      array(
		'import_file_name'           => 'Home Lite 2',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/newseqo-lite/home-2/home-2.xml',
        'import_customizer_file_url' => $demo_content_installer . '/newseqo-lite/home-2/home-2.dat',
        'import_widget_file_url'     => $demo_content_installer . '/newseqo-lite/home-2/home-2.wie',
		'import_preview_image_url'   => $demo_content_installer . '/newseqo-lite/home-2/screenshot-2.png',
		'preview_url'                => NEWSEQO_LIVE_URL,
      ),
      array(
		'import_file_name'           => 'Home Gutenberg Lite',
		'categories'                 => array( 'Multipage' ),
		'import_file_url'            => $demo_content_installer . '/newseqo-lite/home-gutenberg/gutenberg.xml',
        'import_customizer_file_url' => $demo_content_installer . '/newseqo-lite/home-gutenberg/gutenberg.dat',
        'import_widget_file_url'     => $demo_content_installer . '/newseqo-lite/home-gutenberg/gutenberg.wie',
		'import_preview_image_url'   => $demo_content_installer . '/newseqo-lite/home-gutenberg/screenshot.png',
		'preview_url'                => NEWSEQO_LIVE_URL,
      ),
    );
    
	$all_demos = apply_filters('pro_demo_opt', $demos);

    return $all_demos;
}
add_filter( 'pt-ocdi/import_files', 'newseqo_import_files' );

function newseqo_after_import( $selected_import ) {

	$slider_array = array(
		"Home Default" => [
			"slug" => "home",
        ],
		"Home Lite 1" => [
			"slug" => "home",
        ],
        "Home Lite 2" => [
			"slug" => "home",
        ],
        "Home Gutenberg Lite" => [
			"slug" => "home",
        ],
        "Home Pro" => [
			"slug" => "home",
		],
	);
	if( is_array( $slider_array ) ){
		foreach ($slider_array as $i => $values) {
			if ( $i === $selected_import['import_file_name'] ) {
				foreach ($values as $key => $value) {
					//Set Front page
					$page = get_page_by_title( $values['slug'] );
					if ( isset( $page->ID ) ) {
						update_option( 'page_on_front', $page->ID );
						update_option( 'show_on_front', 'page' );
					}
				}
			}
		}
	}
}
add_action( 'pt-ocdi/after_import', 'newseqo_after_import' );

function pro_demos( $demo_array ){
    $demo_content_installer	 = NEWSEQO_REMOTE_CONTENT;
    $new_demo = array(
          'import_file_name'           => 'Home Pro',
          'categories'                 => array( 'Multipage' ),
          'import_file_url'            => $demo_content_installer . '/newseqo-pro/default.xml',
          'import_customizer_file_url' => $demo_content_installer . '/newseqo-pro/default.dat',
          'import_widget_file_url'     => $demo_content_installer . '/newseqo-pro/default.wie',
          'import_preview_image_url'   => $demo_content_installer . '/newseqo-pro/screenshot.png',
          'preview_url'                => NEWSEQO_LIVE_URL_PRO,
        
      );
    array_push( $demo_array, $new_demo );
    return $demo_array;
}

if ( class_exists('Newseqo\Bootstrap') ) {
    add_filter('pro_demo_opt', 'pro_demos');
}