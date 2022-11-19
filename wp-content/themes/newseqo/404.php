<?php
/*
404 page 
*/
get_header();
get_template_part( 'template-parts/banner/content', 'banner-blog' );
?>

<div id="main-content" class="blog main-container" role="main">
	<div class="container">
		<div class="row">
        <div class="col-lg-6 mx-auto">
                  <div class="error-page text-center">
                    <?php	get_search_form(); ?>
                     <div class="error-code">
                        <strong><?php esc_html_e('404', 'newseqo'); ?></strong>
                     </div>
                     <div class="error-message">
                        <h3><?php esc_html_e('Oops... Page Not Found!', 'newseqo'); ?></h3>
                     </div>
                     <div class="error-body">
                        <?php esc_html_e('Try using the button below to go to main page of the site', 'newseqo'); ?> <br>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php esc_html_e('Back to Home Page', 'newseqo'); ?></a>
                     </div>
                  </div>
               </div>
         </div><!-- #col -->
  	</div><!-- #container -->
</div>
>

<?php
get_footer();
