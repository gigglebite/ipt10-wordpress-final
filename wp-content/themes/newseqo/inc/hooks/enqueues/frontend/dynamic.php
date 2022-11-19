<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
if ( defined( 'DEVM' ) ) {
   function newseqo_dynamic_style(){

      $newseqo_footer_copyright_bg_color = newseqo_option('newseqo_footer_copyright_bg_color','#000');
      $newseqo_footer_copyright_padding  = newseqo_option('newseqo_footer_copyright_padding');
      $newseqo_footer_copyright_padding_bottom  = newseqo_option('newseqo_footer_copyright_padding_bottom');
      $newseqo_footer_copyright_color    = newseqo_option('newseqo_footer_copyright_color','white');
      $newseqo_blog_body_typhography     = newseqo_option('newseqo_blog_body_typhography'); 
      $newseqo_blog_h1_2_typhography     = newseqo_option('newseqo_blog_h1_2_typhography'); 
      $newseqo_blog_h2_typhography     = newseqo_option('newseqo_blog_h2_typhography'); 
      $newseqo_blog_h3_4_typhography     = newseqo_option('newseqo_blog_h3_4_typhography'); 
      $newseqo_blog_h4_typhography     = newseqo_option('newseqo_blog_h4_typhography'); 

      Newseqo_Google_Fonts::add_typography_v2($newseqo_blog_body_typhography);
      $newseqo_blog_body_typhography =  Newseqo_Google_Fonts::newseqo_advanced_font_styles($newseqo_blog_body_typhography);

         Newseqo_Google_Fonts::add_typography_v2($newseqo_blog_h1_2_typhography);
         $newseqo_blog_h1_2_typhography =  Newseqo_Google_Fonts::newseqo_advanced_font_styles($newseqo_blog_h1_2_typhography);

         Newseqo_Google_Fonts::add_typography_v2($newseqo_blog_h2_typhography);
         $newseqo_blog_h2_typhography =  Newseqo_Google_Fonts::newseqo_advanced_font_styles($newseqo_blog_h2_typhography);

         Newseqo_Google_Fonts::add_typography_v2($newseqo_blog_h3_4_typhography);
         $newseqo_blog_h3_4_typhography =  Newseqo_Google_Fonts::newseqo_advanced_font_styles($newseqo_blog_h3_4_typhography);

         Newseqo_Google_Fonts::add_typography_v2($newseqo_blog_h4_typhography);
         $newseqo_blog_h4_typhography =  Newseqo_Google_Fonts::newseqo_advanced_font_styles($newseqo_blog_h4_typhography);

         $newseqo_blog_style_title_color               = newseqo_option('newseqo_blog_style_title_color_section','#1c1c24');
         $newseqo_blog_style_body_bg_color_section     = newseqo_option('newseqo_blog_style_body_bg_color_section','#fff'); 
         $newseqo_blog_style_body_primary_color_section     = newseqo_option('newseqo_blog_style_body_primary_color_section','#eb1c23'); 

         // newsticker color 
         $newseqo_newsticker_color = newseqo_option('newseqo_newsticker_color','#eb1c23');
         $newseqo_newsticker_title_color = newseqo_option('newseqo_newsticker_title_color','#eb1c23');
         $newseqo_newsticker_bg_color = newseqo_option('newseqo_newsticker_bg_color','#eb1c23');

         $newseqo_header_textcolor = get_header_textcolor();
         $header_image 				= esc_url(get_header_image());

         $custom_css="";

         if(!empty($header_image)){
            $custom_css .= ".header-middle-area {background-image:url(" . "{$header_image}".");}";
         }
         if($newseqo_header_textcolor =='blank'){
            $custom_css .="
            .logo-area .site-title a , .logo-area .site-desc{
               display:none;
            }";
         }else{
            $newseqo_header_textcolor ='#'.get_header_textcolor();
            $custom_css .="
            .logo-area .site-title a , .logo-area .site-desc{
               color:#".get_header_textcolor().";
            }";
         }
         $custom_css .= "
            
            .entry-header .entry-title a, .widget-title ,
            .post-title a ,h1,h2,h3,h4,h5,h6 {
               color:$newseqo_blog_style_title_color;
            }
            .tranding-bar .trending-slide .trending-title,
            .tranding-bar .trending-slide .trending-title i{
               color: $newseqo_newsticker_title_color;
            }

            .tranding-bar .trending-slide .post-title a {
                  color: $newseqo_newsticker_color;
               }
               .tranding-bar .trending-slide {
                  background: $newseqo_newsticker_bg_color;
               }
            .entry-header .entry-title a:hover,
            .sidebar ul li a:hover, .xs-footer-section ul li a:hover,
            .btn:hover,
            a:hover,
            .blog-single .post-meta li a:hover,
            .post-navigation h3:hover, .post-navigation span:hover ,
            .header .navbar-light .navbar-nav li.active > a,
            .header .navbar-light .navbar-nav li a:hover,
            .post-title a:hover,
            .category-layout2 .entry-blog-summery .readmore-btn:hover,
            a

            {
               color:  {$newseqo_blog_style_body_primary_color_section};
            } 
            .tag-lists a:hover, .tagcloud a:hover,
            .sticky.post .meta-featured-post,
            .widget-title:before,
            .btn ,
            .block-title.title-border .title-bg,
            .block-title.title-border .title-bg::before ,
            .owl-next, .owl-prev,
            a.post-cat,
            .header.dark-header .header-wrapper .navbar-light .navbar-nav > li.active, .header.dark-header .header-wrapper .navbar-light .navbar-nav > li:hover,
            .sidebar .widget .widget-header .widget-title,
            .wp-block-image figure figcaption, .wp-block-image figcaption,
            .not-found .input-group-btn,
            .header .navbar-light .navbar-nav > li.active > a:before,
            .header.dark-header .header-wrapper .navbar-light .navbar-nav > li.active::before, .header.dark-header .header-wrapper .navbar-light .navbar-nav > li:hover::before,
            .BackTo,
            .header.header-solid .nav-search-area a,
            .xs-footer-section .widget.widget_search .input-group-btn, .sidebar .widget.widget_search .input-group-btn,
            .blog-single .tag-lists span{
               background:{$newseqo_blog_style_body_primary_color_section};
            }
            .tag-lists a:hover, .tagcloud a:hover,
            .sidebar .widget .widget-header,
            .not-found .input-group-btn{
               border-color: {$newseqo_blog_style_body_primary_color_section};
            }
            .block-title.title-border .title-bg::after{
               border-left-color: {$newseqo_blog_style_body_primary_color_section};
            }
            .block-title.title-border{
               border-bottom-color: {$newseqo_blog_style_body_primary_color_section};
            }
            .copyright-area{
                     background: {$newseqo_footer_copyright_bg_color};
                     padding-top: {$newseqo_footer_copyright_padding};
                     padding-bottom: {$newseqo_footer_copyright_padding_bottom};
            }
            .copyright-area{
               color:  {$newseqo_footer_copyright_color};
            }
            
            body{
               background:{$newseqo_blog_style_body_bg_color_section};
            
            } 
            ";
            if($newseqo_blog_body_typhography!='initial'){
            $custom_css.= " body {
               
                     {$newseqo_blog_body_typhography}
                  }
               ";  
            }
            if($newseqo_blog_h1_2_typhography!='initial'){
               $custom_css.= " h1 {
                  {$newseqo_blog_h1_2_typhography}
               }
            ";  
            }
            if($newseqo_blog_h2_typhography!='initial'){
               $custom_css.= " h2 {
                  {$newseqo_blog_h2_typhography}
               }
            ";  
            }

            if($newseqo_blog_h3_4_typhography!='initial'){
               $custom_css.= "  h3 {
                  {$newseqo_blog_h3_4_typhography}
               }
            ";  
            }
            if($newseqo_blog_h4_typhography!='initial'){
               $custom_css.= "  h4 {
                  {$newseqo_blog_h4_typhography}
               }
            ";  
            }
         
            
         wp_add_inline_style( 'newseqo-master', $custom_css );
      }

   add_action( 'wp_enqueue_scripts', 'newseqo_dynamic_style' );
}