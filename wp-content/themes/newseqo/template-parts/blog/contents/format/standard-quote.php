<?php
$post_layout_overwrite = newseqo_meta_option(get_the_ID(), 'post_layout_overwrite', '');
   
if($post_layout_overwrite == 'yes'){
   $post_layout = newseqo_meta_option(get_the_ID(), 'newseqo_single_post_layout', '');
}else{
   $post_layout = newseqo_option('newseqo_custizer_single_post_layout','');
}

if($post_layout == 'style2'){
  ?>
  <header class="entry-header clearfix post-header-style2" style="background: url('<?php echo esc_url(get_the_post_thumbnail_url()); ?>');">
   <?php if(newseqo_option('newseqo_blog_banner_enable') =='__false'): ?> 
        <div class="entry-header-content">
            <h2 class="post-title lg">
                  <?php  the_title(); ?>
               </h2>
            <?php endif; ?>
            <?php newseqo_post_meta(); ?>
        </div>
   </header><!-- header end -->
  <?php
}else{
  if(has_post_thumbnail() && !post_password_required()){ ?>   
    <div class="post-media post-image">
        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title_attribute(); ?>">
        <?php 
          if ( is_sticky() ) {
            echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'newseqo' ) . ' </sup>';
          }
        ?>      
    </div>
  <?php }
}