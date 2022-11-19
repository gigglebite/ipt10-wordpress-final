<?php
/*
* archive page 
*/
   get_header();
   get_template_part( 'template-parts/banner/content', 'banner-blog' );
   $newseqo_layout = newseqo_option('newseqo_blog_layout','left');
   $newseqo_column = $newseqo_layout=="full" || !is_active_sidebar('sidebar-1')? 'col-lg-12' : 'col-lg-8 col-md-12';
?>

<div id="main-content" class="blog main-container" role="main">
	<div class="container">
		<div class="row">
         <?php
            if($newseqo_layout == "left"):
               get_sidebar();
            endif;
         ?>
         <div class="<?php echo esc_attr($newseqo_column); ?>">

               <?php if ( have_posts() ) : ?>
                     
                     <?php
                        get_template_part( 'template-parts/blog/category/layout', 'layout' );
                        get_template_part( 'template-parts/blog/paginations/pagination', 'style1' );

                     else :
                        get_template_part( 'template-parts/blog/contents/content', 'none' );
                     endif;
               ?>

        </div><!-- #col -->
         <?php 
            if($newseqo_layout == "right"):
				   get_sidebar();
            endif; 
         ?>
     </div><!-- #row -->
	</div><!-- #container -->
</div>

<?php
get_footer();
