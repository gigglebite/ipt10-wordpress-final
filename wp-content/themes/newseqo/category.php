<?php
   get_header();
   $category = get_category( get_query_var( 'cat' ) );
   $cat_layout = newseqo_cat_layout($category->cat_ID);
   get_template_part( 'template-parts/banner/content', 'banner-blog' );
   $newseqo_layout = newseqo_option('newseqo_blog_layout','left');
   $newseqo_column = $newseqo_layout=="full" || !is_active_sidebar('sidebar-1')? 'col-lg-12' : 'col-lg-8 col-md-12';
?>

<div id="main-content" class="blog main-container" role="main">
	<div class="container">
      <?php if($cat_layout == 'style1'){?>
         <?php if(newseqo_option('newseqo_blog_banner_enable') =='__false'){ ?>
         <div class="category-title-breadcrumb">            
            <?php $show_breadcrumb  = newseqo_option('newseqo_blog_banner_breadcrumb_enable');
            if ($show_breadcrumb === '__true') : ?>
               <?php newseqo_get_breadcrumbs('<i class="xts-icon xts-arrow-right"></i>'); ?>
            <?php endif; ?>

            <?php get_template_part( 'template-parts/blog/category/parts/cat-title'); ?>
            
            <?php if(category_description()){?>
               <div class="category-main-desc">
                  <span><?php echo category_description(); ?></span>
               </div>
            <?php } ?>
         </div>
         <?php } ?>
      <?php } ?>
		<div class="row">
            <?php
               if($newseqo_layout == "left"):
                  get_sidebar();
               endif;
            ?>
         <div class="<?php echo esc_attr($newseqo_column); ?>">

            <?php if ( have_posts() ) : ?>

                  <?php
                     get_template_part( 'template-parts/blog/category/layout', 'layout' );
                     get_template_part( 'template-parts/blog/paginations/pagination', 'style1' );

                  else :
                     get_template_part( 'template-parts/blog/contents/content', 'none' );
                  endif;
            ?>

        </div><!-- #col -->
         <?php 
            if($newseqo_layout == "right"):
				   get_sidebar();
            endif; 
         ?>
     </div><!-- #row -->
	</div><!-- #container -->
</div>

<?php
get_footer();
