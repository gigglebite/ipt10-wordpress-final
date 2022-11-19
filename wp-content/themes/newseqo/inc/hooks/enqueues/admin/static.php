<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */
function newseqo_admin_scripts(){
   wp_enqueue_style('icofonts', NEWSEQO_CSS . '/icofont.css', null, NEWSEQO_VERSION);
   wp_enqueue_style('newseqo-admin', NEWSEQO_CSS . '/newseqo-admin.css', null, NEWSEQO_VERSION);
   // wp_enqueue_script('newseqo-admin', NEWSEQO_JS . '/newseqo-admin.js', array('jquery'), NEWSEQO_VERSION, true);
}
add_action( 'admin_enqueue_scripts', 'newseqo_admin_scripts' );
