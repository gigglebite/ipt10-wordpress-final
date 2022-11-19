   <!-- Article header -->
   <header class="entry-header clearfix">
   <?php newseqo_post_meta(); ?>
   
   <?php
   if(newseqo_option('newseqo_blog_banner_enable') =='__false'): ?> 
         <h2 class="post-title lg">
            <?php  the_title(); ?>
         </h2>
      <?php endif; ?>
   
   </header><!-- header end -->
<?php if ( newseqo_option('newseqo_blog_feature_image') == '__true' && has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="post-media post-image">
    
		     <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title_attribute(); ?>">
           <?php 
             $newseqo_caption = get_the_post_thumbnail_caption();
            if($newseqo_caption !=''):
               ?>
               <p class="img-caption-text"><?php the_post_thumbnail_caption(); ?></p>

             <?php endif; ?>
 
      </div>
    
	<?php endif; ?>
	<div class="post-body clearfix">

		<!-- Article content -->
		<div class="entry-content clearfix">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content();
				newseqo_link_pages();
			}
			?>
         <div class="post-footer clearfix">
            <?php get_template_part( 'template-parts/blog/post-parts/part', 'tags' ); ?>
         </div> <!-- .entry-footer -->
			
         <?php
            if ( is_user_logged_in() && is_single() ) {
         ?>

            <p style="float:left;margin-top:20px; ">
                  <?php
                  edit_post_link( 
                     esc_html__( 'Edit', 'newseqo' ), 
                     '<span class="meta-edit">', 
                     '</span>'
                  );
                  ?>
            
           </p>
         <?php
            }
         ?>
		</div> <!-- end entry-content -->
   </div> <!-- end post-body -->
