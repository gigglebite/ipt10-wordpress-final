<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
$newseqo_blog_author_show = (isset($settings['show_author'])) 
						? $settings['show_author'] 
						: newseqo_option( 'blog_author_show', '__true' );

$newseqo_blog_date_show	= (isset($settings['show_date'])) 
						? $settings['show_date'] 
                  : newseqo_option( 'blog_date_show', '__true' );

                  
$newseqo_blog_cat_show	    = (isset($settings['show_cat'])) 
						? $settings['show_cat'] 
						: newseqo_option( 'blog_cat_show', '__true' );

$newseqo_crop					= (isset($settings['feature_post_title_crop']))
						? $settings['feature_post_title_crop']
                  : 20;

$newseqo_loadmore_class = isset($newseqo_loadmore_class)?$newseqo_loadmore_class:'';                                   

?>

   <div class="item ts-overlay-style" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>)">
   <a href="<?php the_permalink(); ?>" class="img-link"></a>

      
         <div class="post-content">
               <div class="grid-category">
               <?php if($newseqo_blog_cat_show == 'yes'): ?> 
               
                  <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>
                     
               <?php endif; ?>
               </div>
               <h3 class="post-title">
                  <a href="<?php the_permalink(); ?>">
                  <?php echo esc_html(wp_trim_words(get_the_title(), $newseqo_crop,'')); ?>
                  </a>
               </h3>
            
               <ul class="post-meta-info">
                  <?php if($newseqo_blog_author_show == 'yes'): ?>
                     <li class="author">
                     <i class="fa fa-user"></i>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                           <?php echo esc_html(get_the_author_meta('display_name')); ?>
                        </a>
                     </li>
                  <?php endif; ?>
                  <?php if($newseqo_blog_date_show == 'yes'): ?>
                     <li>
                        <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
                     </li>
                  <?php endif; ?>
               </ul>
         </div>
         
   </div>

