<?php
/**
 * The template for displaying all pages
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newseqo
 */
get_header();
get_template_part( 'template-parts/banner/content', 'banner-page' );

$newseqo_layout = newseqo_option('newseqo_blog_layout','left');
$newseqo_column = $newseqo_layout == "full" || !is_active_sidebar('sidebar-1')? 'col-lg-12' : 'col-lg-8 col-md-12';

?>

<div id="main-content" class="main-container" role="main">
	<div class="container">
		<div class="row">
         <?php
            if($newseqo_layout == "left"):
               get_sidebar();
            endif;
         ?>
         <div class="<?php echo esc_attr($newseqo_column); ?>">
               <?php
                  while ( have_posts() ) :
                     the_post();

                     get_template_part( 'template-parts/blog/contents/content', 'page' );

                     // If comments are open or we have at least one comment, load up the comment template.
                     if ( comments_open() || get_comments_number() ) :
                        comments_template();
                     endif;

                  endwhile; // End of the loop.
               ?>

          </div><!-- #col -->
      <?php
         if($newseqo_layout == "right"):
            get_sidebar();
         endif;
      ?>
      </div><!-- #row -->
	</div><!-- #primary -->
</div>

<?php

get_footer();
