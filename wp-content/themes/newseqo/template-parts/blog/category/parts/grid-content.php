<div class="post-block-style">
   <?php if(has_post_thumbnail()): ?>
      <div class="post-thumb">
         <a href="<?php echo esc_url(get_the_permalink()); ?>">           
            <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title_attribute(); ?>">
         </a>
         <div class="categories-sec"><?php newseqo_category_meta(); ?></div>
      </div>
   <?php endif; ?>
   <div class="post-content">
      <div class="entry-blog-header">       
         <h3 class="post-title md">
            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(newseqo_get_crop_title(get_the_title()) ); ?></a>
         </h3>      
      </div>
      <div class="post-meta">
         <?php newseqo_category_post_meta(); ?>  
      </div>
      <?php $desc_show = newseqo_option('newseqo_blog_post_desc_show', 'yes'); ?>
      <?php if($desc_show == 'yes'){?>
         <div class="entry-blog-summery">
            <p><?php echo wp_kses_post(newseqo_get_excerpt() ); ?></p>
         </div>
      <?php } ?>
   </div>
</div>




