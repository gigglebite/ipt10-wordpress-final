<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function newseqo_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'newseqo'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'newseqo'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="widget-header"><h2 class="widget-title">',
                'after_title' => '<span>.</span></h2></div>',
            )
        );


        $newseqo_show_footer_layout = newseqo_option( 'show_footer_widgets');

        $newseqo_footer_columns = newseqo_option( 'newseqo_number_of_widgets',4);
     
        if($newseqo_show_footer_layout =='__true'){
            for ( $i = 1; $i <= $newseqo_footer_columns; $i++ ) {
                $args_sidebar = array(
                    'name'           => esc_html__( 'Footer Widget ', 'newseqo' ).$i,
                    'id'             => 'footer-widget-'.$i,
                    'description'    => esc_html__( 'Appears on posts and pages.', 'newseqo' ),
                    'before_widget'  => '<div class="footer-widget widget">',
                    'after_widget'   => '</div>',
                    'before_title'   => '<h2 class="widget-title">',
                    'after_title'    => '</h2>',
                );

                register_sidebar( $args_sidebar );
            }
        }
    }
    
}

add_action('widgets_init', 'newseqo_widget_init');