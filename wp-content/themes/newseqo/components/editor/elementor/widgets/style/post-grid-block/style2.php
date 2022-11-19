<?php
if ( $query->have_posts() ) : ?>
<div class="block-tab-item post-grid-block">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post();?>
                <?php if ( $query->current_post == 0 ): ?>
                    <div class="col-md-6 col-sm-6">
                    <div class="grid-item">
                    <div <?php post_class("ts-overlay-style featured-post"); ?>>
                        <div class="item item-before" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>)">
                            <a class="img-link" href="<?php the_permalink(); ?>"></a>
                    
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <ul class="post-meta-info">
                                    <?php if($show_cat == 'yes'): ?> 
                                        <li class="grid-category cat-item">
                                        <?php get_template_part('template-parts/blog/category/parts/cat', 'style');  ?>
                                        </li>
                                    <?php endif; ?>
                                    
                                    <?php if($show_author == 'yes'): ?>
                                        <li class="author">
                                        <i class="fa fa-user"></i>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($show_date == 'yes'): ?>
                                        <li>
                                            <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
                                        </li>
                                    <?php endif; ?>

                                    </ul>

                                    <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html(wp_trim_words(get_the_title(), $post_title_crop,'')); ?>
                                    </a>
                                    </h3>           
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                </div><!-- Col end -->
            <?php else: ?>                
                <?php if ( $query->current_post == 1 ): ?>
               <div class="col-sm-6">
                  <div class="row">    
            <?php endif; ?> 
                      <div class="col-6">
                        
                        <div class="post-block-style post-float clearfix style2-block post-thumb-bg">
                                                     
                           <div class="post-thumb post-thumb-full">
                              <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                              <span class="sm-bg-img" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'newseqo_two_column')); ?>);"></span>
                              </a>
                              <?php if($show_cat == 'yes'): ?> 
                                    <div class="grid-cat">
                                      <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>
                                    </div>
                                 <?php endif; ?>
                           </div>
                           <div class="post-content">                                 
                                    <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,$post_title_crop,'') );  ?></a></h4>
                                    <div class="post-meta">
                                          
                                    <?php if( $show_date == 'yes' ) { ?>
                                          <span class="post-date"> 
                                             <i class="fa fa-clock-o"> </i> 
                                             <?php echo get_the_date(get_option('date_format')); ?>
                                          </span>
                                          
                                    <?php } ?>
                                     
                                    </div>
                              
                           </div><!-- Post content end -->
                        </div><!-- Post block style end -->
                      </div>   
                 <?php if (($query->current_post + 1) == ($query->post_count)) {?>
                   </div>
               </div><!-- List post Col end -->
                  <?php } ?>               
                <?php endif; ?>

            <?php 
            endwhile; ?>
        </div><!-- Tab pane Row 1 end -->
    </div><!-- block-item6 -->
<?php wp_reset_postdata(); ?>
<?php endif; ?>

