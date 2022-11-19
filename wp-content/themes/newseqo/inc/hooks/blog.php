<?php if (!defined('ABSPATH')) die('Direct access forbidden.');

function newseqo_excerpt( $words = 20, $more = 'BUTTON' ) {
	if($more == 'BUTTON'){
		$more = '<a class="btn btn-primary">'.esc_html__('read more', 'newseqo').'</a>';
	}
	$excerpt		 = get_the_excerpt();
	$trimmed_content = wp_trim_words( $excerpt, $words, $more );
	echo wp_kses_post( $trimmed_content );
}


function newseqo_add_submit_button_attr_class( $arg ) {
 
   $arg['class_submit'] = 'submit btn-commennewseqo btn btn-primary';
   return $arg;
}

add_filter( 'comment_form_defaults', 'newseqo_add_submit_button_attr_class' );



function newseqo_post_nav() {

      $next_post	 = get_next_post();
      $pre_post	 = get_previous_post();
      if ( !$next_post && !$pre_post ) {
         return;
      }
   ?>
      <nav class="post-navigation clearfix">
         <div class="post-previous">
            <?php if ( !empty( $pre_post ) ): ?>
               <a href="<?php echo esc_url(get_the_permalink( $pre_post->ID )); ?>">
                  <h3><?php echo esc_html(get_the_title( $pre_post->ID )) ?></h3>
                  <span><i class="xts-icon xts-arrow-left"></i><?php esc_html_e( 'Previous post', 'newseqo' ) ?></span>
               </a>
            <?php endif; ?>
         </div>
         <div class="post-next">
            <?php if ( !empty( $next_post ) ): ?>
               <a href="<?php echo esc_url(get_the_permalink( $next_post->ID )); ?>">
                  <h3><?php echo esc_html(get_the_title( $next_post->ID )) ?></h3>
   
                  <span><?php esc_html_e( 'Next post', 'newseqo' ) ?> <i class="xts-icon xts-arrow-right"></i></span>
               </a>
            <?php endif; ?>
         </div>
      </nav>
   <?php }

  
function newseqo_footer_widget($footer_columns = 4) {
	if($footer_columns == 1 ) {
		$widget_width = 12;
	}elseif($footer_columns == 2 ) {
		$widget_width = 6;
	}elseif($footer_columns == 3 ) {
		$widget_width = 4;
	}elseif($footer_columns == 4 ) {
		$widget_width = 3;
	}elseif($footer_columns == 5 ) {
		$widget_width = 2;
	}elseif($footer_columns == 6 ) {
		$widget_width = 2;
	}else{
		$widget_width = 1;
	}

	return $widget_width;
}


function newseqo_get_options($option, $default_value = null){
	$value = json_decode(get_theme_mod($option)) ;
	return (!isset($value) || $value == '') ? $default_value :  $value;
}
function newseqo_get_theme_mod($option, $default_value = null){
	$value = get_theme_mod($option) ;
	return (!isset($value) || $value == '') ? $default_value :  $value;
} 

function newseqo_search_form( $form ) {
   $form = '
       <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="newszone-serach xs-search-group">
           <div class="input-group">
               <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search', 'newseqo' ) . '" value="' . get_search_query() . '">
               <button class="input-group-btn search-button"><i class="xts-icon xts-search1"></i></button>
           </div>
       </form>';
  return $form;
}
add_filter( 'get_search_form', 'newseqo_search_form' );







/**
 * Display upgrade notice on customizer page
 */
if ( !class_exists('Newseqo\Bootstrap') ) {
   function newseqo_upsell_notice() {

      // Enqueue the script
      wp_enqueue_script(
         'newseqo-customizer-upsell',
         get_template_directory_uri() . '/assets/js/upsell.js',
         array(), '1.0.0',
         true
      );

      // Localize the script
      wp_localize_script(
         'newseqo-customizer-upsell',
         'newseqoL10n',
         array(
            'newseqoURL'	=> esc_url( 'http://themewinter.com/newseqo' ),
            'newseqoLabel'	=> __( 'Upgrade Newseqo', 'newseqo' ),
         )
      );

   }
   add_action( 'customize_controls_enqueue_scripts', 'newseqo_upsell_notice' );
}

