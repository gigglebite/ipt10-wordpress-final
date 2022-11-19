<?php 
if(newseqo_option('newseqo_blog_post_tag') === '__true') {
   $newseqo_tag_list = get_the_tag_list( '', ' ' );

   if ( $newseqo_tag_list ) {
      echo '<div class="post-tag-container">';
            echo '<div class="tag-lists">';
               echo '<span>' . esc_html__( 'Tags: ', 'newseqo' ) . '</span>';
               echo wp_kses_post( $newseqo_tag_list );
            echo '</div>';
      echo '</div>';
   }
}
   