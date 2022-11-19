<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * hooks for adding google fonts for frontend
 */

class Newseqo_Google_Fonts {

	static private $data = array(
		'subset' => array(),
		'family' => array(),
	);

	public static function add_typography_v2( $value ) {
	
		$data_value = [];
		if (is_string($value)) {
			$data_value = json_decode($value, true);
		} else {
			$data_value = $value;
		}

		if ( in_array( isset( $data_value[ 'family' ] ), array( true, 'true' ), true ) ) {
		  	self::$data[ 'family' ][ $data_value[ 'family' ] ][ 'weight' ]	 = true;			
		}
		if ( in_array( isset( $data_value[ 'style' ] ), array( true, 'true' ), true ) ) {
			self::$data[ 'subset' ][ $data_value[ 'style' ] ]= true;
		}
		// var_dump(self::$data);
		return (array)self::$data;
	}

	public static function clear() {
		self::$data = array();
	}

	
	public static function generate_url() {
		/**
		 * Example:
		 *
		 * <link href="
		 * https://fonts.googleapis.com/css?
		 * family={Family}|{Family}:{variant},{variant}
		 * &amp;
		 * subset=cyrillic-ext,greek,vietnamese
		 * " rel="stylesheet">
		 */
		if ( empty( self::$data[ 'family' ] ) ) {
			return false;
		}

		$query = array(
			'family' => array(),
			'subset' => implode( ',', array_keys( self::$data[ 'subset' ] ) ),
		);

		foreach ( self::$data[ 'family' ] as $family => $family_data ) {
			if ( !empty( $family ) ) {
				$family_data[ 'variants' ][900] = $family_data[ 'variants' ][700] = $family_data[ 'variants' ][400] = 1;
				$query[ 'family' ][] = $family . ':' . implode( ',', array_keys( $family_data[ 'variants' ] ) );
			}
		}
		$query[ 'family' ] = implode( '|', $query[ 'family' ] );
		return add_query_arg( 'family', urlencode( $query[ 'family' ] ), "https://fonts.googleapis.com/css" );

	}

	public static function output_url() {
      if ( $url = self::generate_url() ):
         wp_enqueue_style( 'google-fonts', esc_url($url) );
         ?>
      
         <?php
		endif;
	}


	/*
  google font style transform function
*/
	public static function  newseqo_advanced_font_styles( $data ) {
	
		$style = [];

		if (is_string($data)) {
			$style = json_decode($data, true);
		} else {
			$style = $data;
			
		}
		// var_dump($style);
		$font_styles = '';
		
		$font_styles .= (isset( $style[ 'weight' ] ) && $style[ 'weight' ]) ? 'font-weight:' . esc_attr( $style[ 'weight' ] ) . ';' : '';

		$font_styles .= isset( $style[ 'family' ] )  && !empty( $style[ 'family' ] ) ? 'font-family:"' . $style[ 'family' ] . '";' : '';

		$font_styles .= isset( $style[ 'line_height' ] ) && !empty( $style[ 'line_height' ] ) ? 'line-height:' . esc_attr( $style[ 'line_height' ] ) . ';' : '';
		$font_styles .= isset( $style[ 'letter_spacing' ] ) && !empty( $style[ 'letter_spacing' ] ) ? 'letter-spacing:' . esc_attr( $style[ 'letter_spacing' ] ) . ';' : '';
		$font_styles .= isset( $style[ 'size' ] ) && !empty( $style[ 'size' ] ) ? 'font-size:' . esc_attr( $style[ 'size' ] ) . 'px;' : '';

		$font_styles .= !empty( $font_weight ) ? $font_weight : '';

		return !empty( $font_styles ) ? $font_styles : '';
	}


//Extra function for guntenberg block editor
	public static function newseqo_google_fonts_url($font_families	 = []) {
		$fonts_url		 = '';
		/*
        Translators: If there are characters in your language that are not supported
        by chosen font(s), translate this to 'off'. Do not translate into your own language.
        */
		if ( $font_families && 'off' !== _x( 'on', 'Google font: on or off', 'newseqo' ) ) {
			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) )
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fonts_url );
	}


}
add_action( 'wp_enqueue_scripts', array( 'Newseqo_Google_Fonts', 'output_url' ), 999 );
