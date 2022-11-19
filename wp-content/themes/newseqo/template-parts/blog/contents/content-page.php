<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

   <?php if(newseqo_option('newseqo_page_banner_enable') =='__false'): ?> 
      <div class="post-header"> 
         <h3> <?php the_title(); ?> </h3>
      </div>
   <?php endif; ?>   
   
   <?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="entry-thumbnail post-media post-image">
			<?php 
                the_post_thumbnail( 'full' );
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
					wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages', 'newseqo').':',
					'after'  => '</div>',
					) );
				}
			?>
		</div> <!-- end entry-content -->
    </div> <!-- end post-body -->
</article>