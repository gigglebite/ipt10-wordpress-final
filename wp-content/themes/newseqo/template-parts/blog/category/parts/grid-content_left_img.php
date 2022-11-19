<div class="post-block-style row">
 
   <?php if(has_post_thumbnail()): ?>
      <div class="col-md-6">
         <div class="post-media post-image">
            <a href="<?php echo esc_url(get_the_permalink()); ?>">
                 <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title_attribute(); ?>">
            </a>
         </div>
      </div>
   <?php endif; ?>
   <div class="<?php echo esc_attr(has_post_thumbnail()?"col-md-6":"col-md-12"); ?> ">
      <div class="post-content">
         <div class="entry-blog-header">
            <?php newseqo_category_meta(); ?>
          
               <h2 class="post-title md">
                  <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(newseqo_get_crop_title(get_the_title())); ?></a>
               </h2>
 
         </div>
         <div class="post-meta">
            <?php newseqo_category_post_meta(); ?>  
         </div>
         <div class="entry-blog-summery">
            <p><?php echo wp_kses_post(newseqo_get_excerpt()); ?></p>
         </div>
      </div>
   </div>
</div>




