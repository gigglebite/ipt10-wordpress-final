<?php
   get_header();
   get_template_part( 'template-parts/banner/content', 'banner-blog' );
   
   $newseqo_layout = newseqo_option('newseqo_blog_single_layout','right');
   $newseqo_column = $newseqo_layout=="full" || !is_active_sidebar('sidebar-1')? 'col-lg-8 mx-auto' : 'col-lg-8 col-md-12';
   $related_post_position = newseqo_option('newseqo_blog_related_post_position','aftercomment');
   $overwrite_single_post = newseqo_meta_option(get_the_ID(), 'newseqo_ad_single_post_overwrite', '');
   if($overwrite_single_post == 'yes'){
      $banner_show = $overwrite_single_post;
   }else{
      $banner_show = newseqo_option('newseqo_ad_single_post','yes');
   }
   
   $post_layout_overwrite = newseqo_meta_option(get_the_ID(), 'post_layout_overwrite', '');
   
   if($post_layout_overwrite == 'yes'){
      $post_layout = newseqo_meta_option(get_the_ID(), 'newseqo_single_post_layout', '');
   }else{
      $post_layout = newseqo_option('newseqo_custizer_single_post_layout','');
   }   
   
?>
<?php if(newseqo_option('newseqo_blog_banner_enable') =='__false'){ ?>
   <div class="blog-breadcrumb">            
      <div class="container">
         <div class="row">
            <div class="col-12">
            <?php $show_breadcrumb  = newseqo_option('newseqo_blog_banner_breadcrumb_enable');
            if ($show_breadcrumb === '__true') : ?>
               <?php newseqo_get_breadcrumbs('<i class="xts-icon xts-arrow-right"></i>'); ?>
            <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
<?php } ?>
<div id="main-content" class="blog-single main-container" role="main">
	<div class="container">
		<div class="row">
            <?php
               if($newseqo_layout == "left"):
                  get_sidebar();
               endif;
            ?>
          <div class="<?php echo esc_attr($newseqo_column); ?>">
               <?php
                     while ( have_posts() ) :
                        the_post();

                        get_template_part( 'template-parts/blog/single/content', $post_layout ); 
                     
                     if(newseqo_option('newseqo_single_blog_post_nav')==='__true'):  
                           newseqo_post_nav();
                        endif;  
                        get_template_part( 'template-parts/blog/post-parts/part', 'author' );

                        if( $banner_show == 'yes'){
                           get_template_part( 'template-parts/blog/post-parts/part', 'banner' );
                        }

                        if( $related_post_position == 'beforecomment'){
                           get_template_part( 'template-parts/blog/post-parts/part', 'related-post' );
                        }

                        if(newseqo_option('newseqo_blog_post_comment_open') === '__true'):  
                           if ( comments_open() || get_comments_number() ) :
                              comments_template();
                           endif;
                        endif; 

                        if( $related_post_position == 'aftercomment'){
                           get_template_part( 'template-parts/blog/post-parts/part', 'related-post' );
                        }
                        
                     endwhile; // End of the loop.
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
