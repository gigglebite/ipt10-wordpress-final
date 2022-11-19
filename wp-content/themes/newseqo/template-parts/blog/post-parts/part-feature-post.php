<?php
 $newseqo_blog_category_feature_post_show = get_theme_mod('newseqo_blog_category_feature_post_show',true); 


?>
<?php if($newseqo_blog_category_feature_post_show): ?>
<?php

  $newseqo_feature_post = newseqo_related_posts_by_sticky(); 

  

?>
   <div class="ts-feature-post"> 
      <?php if( $newseqo_feature_post->post_count ) { ?>
         <div class="section-heading">
           <h2 class="block-title title-border">
               <span class="title-bg">
                  <?php echo esc_html__('Feature post','newseqo'); ?>
               </span>
            </h2>
         </div>
      <?php } ?>   
          <div data-count="<?php echo esc_attr($newseqo_feature_post->post_count); ?>" class="feature-post-slider owl-carousel">
         <?php 
           
            if( $newseqo_feature_post->have_posts() ) {
               while ($newseqo_feature_post->have_posts()) : $newseqo_feature_post->the_post(); ?>
              <div class="item">
                  <div class="ts-post-thumb">
                     <a href="<?php the_permalink(); ?>">
                        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                     </a>
                  </div>
                  <div class="post-content">
                    <?php  get_template_part('template-parts/blog/category/parts/cat-style'); ?>
                     <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,'7','...') );  ?></a>
                        
                     </h3>
                     <span class="post-date-info">
                        <i class="fa fa-clock-o"></i>
                        <?php echo get_the_date(); ?>
                     </span>
                  </div>
              </div>
         
         <?php endwhile;
         }
           
         wp_reset_postdata();
      ?>
      </div>
   </div> 
<?php endif; ?>
