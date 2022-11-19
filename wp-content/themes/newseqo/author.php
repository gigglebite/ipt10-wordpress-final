<?php
   get_header();
   get_template_part( 'template-parts/banner/content', 'banner-blog' );
   $newseqo_layout = newseqo_option('newseqo_blog_layout','left');
   $newseqo_column = $newseqo_layout=="full" || !is_active_sidebar('sidebar-1')? 'col-lg-12' : 'col-lg-8 col-md-12';

?>

<div id="main-content" class="blog main-container" role="main">
	<div class="container">
      <div class="row">
			<div class="col-lg-12">
					<div class="author-item">
              
						<?php get_template_part( 'template-parts/blog/post-parts/part', 'author' ); ?>
					</div>
			</div>
		</div>
		<div class="row">
         <?php
            if($newseqo_layout == "left"):
               get_sidebar();
            endif;
         ?>
         <div class="<?php echo esc_attr($newseqo_column); ?>">
               <?php
               if ( have_posts() ) :

                  if ( is_home() && ! is_front_page() ) :
                     ?>
                     <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                     </header>
                     <?php
                  endif;

                  /* Start the Loop */
                  while ( have_posts() ) :
                     the_post();
                    
                     get_template_part( 'template-parts/blog/contents/content', get_post_format() ); 

                  endwhile;
                     get_template_part( 'template-parts/blog/paginations/pagination', 'style1' );

               else :

                     get_template_part( 'template-parts/content', 'none' );

               endif;
               ?>
           </div><!-- #col -->
         <?php 

           if($newseqo_layout == "right"):
			   	get_sidebar();
            endif;
            
         ?>
      </div><!-- #row -->
	</div><!-- #primary -->
</div>
<?php

get_footer();
