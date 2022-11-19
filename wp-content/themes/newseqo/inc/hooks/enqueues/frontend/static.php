<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */

 function newseqo_scripts(){
      // stylesheets
      // ----------------------------------------------------------------------------------------
      if ( !is_admin() ) {
         // wp_enqueue_style() $handle, $src, $deps, $version

         // 3rd party css
         
         wp_enqueue_style( 'bootstrap', NEWSEQO_CSS . '/bootstrap.min.css', null, NEWSEQO_VERSION );
         wp_enqueue_style( 'font-awesome', NEWSEQO_CSS . '/font-awesome.css', null, NEWSEQO_VERSION );
         wp_enqueue_style( 'icofont', NEWSEQO_CSS . '/icofont.css', null, NEWSEQO_VERSION );
         wp_enqueue_style( 'owl-carousel-min',  NEWSEQO_CSS . '/owl.carousel.min.css', null,  NEWSEQO_VERSION );
         wp_enqueue_style( 'owl-theme-default',  NEWSEQO_CSS . '/owl.theme.default.min.css', null,  NEWSEQO_VERSION );
         wp_enqueue_style( 'magnific-popup',  NEWSEQO_CSS . '/magnific-popup.css', null,  NEWSEQO_VERSION );
         wp_enqueue_style( 'mCustomScrollbar',  NEWSEQO_CSS . '/jquery.mCustomScrollbar.css', null,  NEWSEQO_VERSION );
         wp_enqueue_style( 'newseqo-gutenberg-styles', NEWSEQO_CSS . '/gutenberg-custom.css', null, NEWSEQO_VERSION );
                 // theme css
         wp_enqueue_style( 'newseqo-master', NEWSEQO_CSS . '/master.css', null, NEWSEQO_VERSION );

      }

      // javascripts
      // ----------------------------------------------------------------------------------------
      if ( !is_admin() ) {

         // 3rd party scripts
         wp_enqueue_script( 'bootstrap', NEWSEQO_JS . '/bootstrap.min.js', array( 'jquery' ), NEWSEQO_VERSION, true );
         wp_enqueue_script( 'newseqo-navigation', NEWSEQO_JS . '/navigation.js', array( 'jquery' ), NEWSEQO_VERSION, true );
         wp_enqueue_script( 'newseqo-skip-link-focus-fix', NEWSEQO_JS . '/skip-link-focus-fix.js', array( ), NEWSEQO_VERSION, true );
         wp_enqueue_script( 'owl-carousel-min',  NEWSEQO_JS . '/owl.carousel.min.js', array( 'jquery' ),  NEWSEQO_VERSION, true );
         wp_enqueue_script( 'jquery-magnific-popup',  NEWSEQO_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  NEWSEQO_VERSION, true );
         wp_enqueue_script( 'jquery-mCustomScrollbar',  NEWSEQO_JS . '/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ),  NEWSEQO_VERSION, true );

         // theme scripts
         wp_enqueue_script( 'newseqo-script', NEWSEQO_JS . '/script.js', array( 'jquery' ), NEWSEQO_VERSION, true );
        
         // Load WordPress Comment js
         if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
         }

         
      }
 }
add_action( 'wp_enqueue_scripts', 'newseqo_scripts' );