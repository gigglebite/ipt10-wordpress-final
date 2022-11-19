<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>
   
<article <?php post_class('post');?>>
   <?php if(has_post_thumbnail()): ?>
      <div class="post-media">
         <?php newseqo_post_thumbnail(); ?>
      </div><!-- Post Media end -->
   <?php endif; ?>
	<div class="post-body">
		<div class="entry-header">
		   <div class="post-meta">
            <?php 
               if(newseqo_option('newseqo_blog_author') === '__true'):
                  printf(
                     '<span class="post-author"><i class="xts-icon xts-user"></i> <a href="%2$s">%3$s</a></span>',
                     get_avatar( get_the_author_meta( 'ID' ), 55 ), 
                     esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                     get_the_author()
                  );
               endif;

               if(newseqo_option('newseqo_blog_date') === '__true'):
                  if ( get_post_type() === 'post' ) {
                     echo '<span class="post-meta-date">
                        <i class="xts-icon xts-clock"></i>
                           '. get_the_date() . 
                        '</span>';
                  } 
               endif;

               if(newseqo_option('newseqo_blog_category') == '__true'):
               $newseqo_category_list = get_the_category_list( ', ' );
                  if ( $newseqo_category_list ) {
                     echo '<span class="meta-categories post-cat">
                        <i class="xts-icon xts-folder"></i>
                           '. wp_kses_post($newseqo_category_list) .' 
                        </span>';
                  }
               endif;
            ?>	
         </div>
			<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php newseqo_title_limit(get_the_title()) ; ?></a>
				<?php if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'newseqo' ) . ' </sup>';
				} ?>
			</h2>
			<div class="entry-content">
             <?php 
                  $newseqo_text_limit =  (newseqo_option('newseqo_blog_post_char_limit_length') !='') ? newseqo_option('newseqo_blog_post_char_limit_length') : '20';
             ?>
				<?php newseqo_excerpt( $newseqo_text_limit, null ); ?>
   		</div>
         <?php  if(newseqo_option('newseqo_blog_readmore') =='__true'): ?>
			<div class="post-footer">
				<a class="btn-readmore" href="<?php the_permalink(); ?>">
					<?php echo esc_html(newseqo_option('newseqo_blog_readmore_text',esc_html__('readmore','newseqo'))); ?>
					<i class="xts-icon xts-arrow-right"></i>
				</a>
         </div>
         <?php endif; ?> 
		</div><!-- Entry header end -->
	</div><!-- Post body end -->
</article>