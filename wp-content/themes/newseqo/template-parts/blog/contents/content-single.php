<article id="post-<?php the_ID(); ?>" <?php post_class( ' post-details' ); ?>>

	<!-- Article header -->
	<header class="entry-header text-center clearfix">
      <?php if(newseqo_option('newseqo_blog_banner_enable') == '__false'): ?> 
         <h2 class="entry-title">
            <?php  the_title(); ?>
         </h2>
      <?php endif; ?>
      <div class="post-meta">
         <?php 
        
         printf(
            '<span class="post-author"><i class="xts-icon xts-user"></i> <a href="%2$s">%3$s</a></span>',
            get_avatar( get_the_author_meta( 'ID' ), 55 ), 
            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
            get_the_author()
         );
         
         if ( get_post_type() === 'post' ) {
            echo '<span class="post-meta-date">
               <i class="xts-icon xts-clock"></i>
                  '. get_the_date() . 
               '</span>';
         } 
         
         $newseqo_category_list = get_the_category_list( ', ' );
         if ( $newseqo_category_list ) {
            echo '<span class="meta-categories post-cat">
               <i class="xts-icon xts-folder"></i>
                  '. wp_kses_post($newseqo_category_list) .' 
               </span>';
         }

         ?>	
      </div>
	</header><!-- header end -->

	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="entry-thumbnail post-media post-image text-center">
         <?php 
          newseqo_post_thumbnail(); 
			?>
		</div>
	<?php endif; ?>

	<div class="post-body clearfix">
		<!-- Article content -->
		<div class="entry-content clearfix">
			<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
           
            the_content( esc_html__( 'Continue reading &rarr;', 'newseqo' ) );
            
			}
			?>
		</div> <!-- end entry-content -->
    </div> <!-- end post-body -->
</article>

<footer class="entry-footer clearfix"> 
      <?php   get_template_part( 'template-parts/blog/post-parts/part', 'tags' ); ?>
</footer>
       <?php 
         wp_link_pages( array(
               'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newseqo' ),
               'after'  => '</div>',
            ) );
       ?>      

