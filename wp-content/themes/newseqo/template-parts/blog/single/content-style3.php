 <?php get_template_part( 'template-parts/blog/contents/format/standard', get_post_format()); ?>

   <!-- Article header -->
   <header class="entry-header clearfix post-header">
   
   <?php 
      
   if(newseqo_option('newseqo_blog_banner_enable') =='__false'): ?> 
         <h2 class="post-title lg">
            <?php  the_title(); ?>
         </h2>
      <?php endif; ?>
   <div class="post-meta">
       <?php newseqo_post_meta(); ?>
   </div>
   </header><!-- header end -->
   <div class="bdr"></div>
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
