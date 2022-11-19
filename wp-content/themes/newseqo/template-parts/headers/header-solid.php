<?php
   $newseqo_class = '';
 
   $newseqo_header_top_info_show = newseqo_option('newseqo_topbar_show'); 
   $newseqo_header_nav_search_section = newseqo_option('newseqo_search_show'); 
   $newseqo_header_nav_sticky = false; 
   $newseqo_header_social_share = newseqo_option('newseqo_header_social_show'); 
?> 
<?php if( $newseqo_header_top_info_show == '__true' ): ?>
<div class="topbar topbar-gray">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-lg-8 text-center text-md-left">
            <ul class="top-info">
               <li>
                  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>  
                  <?php echo date_i18n(get_option('date_format')); ?>

               </li>
            </ul>
            <?php
               if ( has_nav_menu( 'topbarmenu' ) ) {
                  wp_nav_menu( array( 
                     'theme_location' => 'topbarmenu', 
                     'menu_class' => 'top-nav', 
                     'container' => '' 
                  ) );
               }

            ?>
       
         </div>
         <div class="col-md-5 col-lg-4 align-self-center">
         <?php
           
            if($newseqo_header_social_share === '__true'): 
               $newseqo_social_links = json_decode(devm_theme_option('devm_nunu_repeater'));
               
              ?>
              <ul class="social-links text-md-right text-center">
         
                  <?php if(is_array($newseqo_social_links)):   
                     foreach($newseqo_social_links as $newseqo_sl):
                     $newseqo_class = $newseqo_sl->icon_value;
                  ?>
                     <li>
                        <a title="<?php echo esc_attr($newseqo_sl->title); ?>" href="<?php echo esc_url($newseqo_sl->link); ?>">
                        <span class="social-icon">  <i class="fa <?php echo esc_attr($newseqo_class); ?>"></i> </span>
                        </a>
                     </li>
                  <?php endforeach; ?>
               <?php endif; ?>
              </ul>
         <?php endif; ?>  
         </div>
      <!-- end col -->
      </div>      
   <!-- end row -->
   </div>
<!-- end container -->
</div>
<?php endif; ?>

<header id="header" class="header header-solid">
      <div class="header-wrapper <?php echo esc_attr($newseqo_header_nav_sticky ==='__true'?'navbar-sticky':''); ?> ">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
            <div class="logo-area">
              <?php

              if( function_exists( 'the_custom_logo' ) ) : ?>
               <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
               <?php
                  if(has_custom_logo()) :
                     the_custom_logo();
                ?> 
               </a>
               <?php else: ?>  
               <h1 class="site-title">
                  <a rel="home" href=" <?php echo esc_url(home_url('/')); ?> "> <?php bloginfo('name'); ?> </a>   
               </h1>
               
              <?php endif; ?> 
              <?php endif; ?>     

              </div>
              <!-- logo end -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="xts-icon xts-menu"></i></span>
               </button>
                  
               <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
                   
               <?php is_user_logged_in() ?  $newseqo_class='w-75 text-right' : $newseqo_class='w-100 text-right'?>

                  <div class="nav-search-area <?php echo esc_attr($newseqo_class) ;?>">
                     <?php if($newseqo_header_nav_search_section =='__true'): ?>
                        <div class="header-search-icon">
                           <a href="#modal-popup-2" class="navsearch-button nav-search-button xs-modal-popup"><i class="xts-icon xts-search1"></i></a>
                        </div>
                     <?php endif; ?>
                     <!-- xs modal -->
                     <div class="zoom-anim-dialog mfp-hide modal-searchPanel ts-search-form" id="modal-popup-2">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="xs-search-panel">
                                 <?php get_search_form(); ?>
                              </div>
                           </div>
                        </div>
                     </div><!-- End xs modal --><!-- end language switcher strart -->
                  </div>
                  <!-- Site search end-->
              </nav>
         </div><!-- container end-->
      </div>
</header>
<!-- tranding bar -->
<?php 
  get_template_part( 'template-parts/newsticker/news', 'ticker' ); 
 ?>