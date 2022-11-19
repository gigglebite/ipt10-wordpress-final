<?php
/**
* Template Name: Full Width Template
*/
 
get_header();
?>

<div id="main-content" class="main-container" role="main">
	<div class="container">
		<div class="row">
        
         <div class="col-lg-12">
               <?php
                  while ( have_posts() ) :
                     the_post();

                     get_template_part( 'template-parts/blog/contents/content', 'page' );

                  endwhile; // End of the loop.
               ?>

          </div><!-- #col -->
   
      </div><!-- #row -->
	</div><!-- #primary -->
</div>

<?php

get_footer();
