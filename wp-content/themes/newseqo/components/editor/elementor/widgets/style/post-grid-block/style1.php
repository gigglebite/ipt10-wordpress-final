<?php if ( $query->have_posts() ) : ?>
            <div class="block-tab-item post-grid-block">
                    <div class="row">
                        <?php while ($query->have_posts()) : $query->the_post();?>
                        <?php if ( $query->current_post == 0 ): ?>
                            <div class="col-md-6 col-sm-6">
                                <div class="post-block-style big-block post-thumb-bg">
                                    <?php if (  (has_post_thumbnail())  ) {
                                        
                                        ?>                                            
                                        <div class="post-thumb ts-resize post-thumb-full">                                        
                                                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                <span class="sm-bg-img" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);"></span></a>

                                                <?php if($show_cat == 'yes'):  ?> 
                                                <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>                                            
                                                <?php  endif; ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="post-thumb block6img-blank"></div>
                                    <?php } ?>
                                    <div class="post-content">                                            
                                                <h4 class="post-title md"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo wp_trim_words( get_the_title() ,$post_title_crop,''); ?></a></h4>
                                    
                                        <div class="post-meta">
                                                <?php if( $show_author == 'yes') { ?>
                                                <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                                                    <span class="post-author">
                                                    <i class="fa fa-user"></i>  
                                                    <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                                                <?php } else { ?>
                                                    
                                                    <span class="post-author">  <i class="fa fa-user"></i> 
                                                    <?php the_author_posts_link() ?>
                                                </span>
                                                <?php }?>
                                                <?php } ?>
                                                <?php if($show_date == 'yes') { ?>
                                                <span class="post-date">
                                                <i class="fa fa-clock-o"></i>
                                                <?php echo get_the_date(); ?>
                                                </span>
                                                <?php } ?>
                                        </div>
                                        <p><?php echo esc_html( wp_trim_words(get_the_excerpt(),$newseqo_post_content_crop,'') );?></p>
                                        
                                    </div><!-- Post content end -->
                                    </div><!-- Post Block style end -->
                            </div><!-- Col end -->
                        <?php else: ?>
                            <?php if ( $query->current_post == 1 ): ?>
                                <div class="col-md-6 col-sm-6 second">
                                    <div class="post-block-list">
                                    <ul class="list-post">
                            <?php endif; ?>    
                                    <li>
                                            <div class="post-block-style post-float media post-thumb-bg">
                                                <div class="post-thumb d-flex">
                                                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                                                <span class="sm-bg-img" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'newseqo_two_column')); ?>);"></span></a>
                                                </div>
                                                <div class="post-content media-body align-self-center">
                                                        <?php if($show_cat == 'yes'):  ?> 
                                                                <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>
                                                        <?php  endif; ?>
                                                
                                                        <h4 class="post-title title-small"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,$post_title_crop,'') );  ?></a></h4>
                                                
                                                <?php if($show_date == 'yes') { ?>
                                                        <div class="post-meta">
                                                            <span class="post-date"> <i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date() ); ?></span>
                                                        </div>
                                                    
                                                <?php } ?>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                    </li><!-- Li 4 end -->
                            <?php if (($query->current_post + 1) == ($query->post_count)) {?>
                                    </ul><!-- List post end -->
                                </div><!-- List post block end -->
                            </div><!-- List post Col end -->
                            <?php } ?> 
                        <?php endif ?>

                        <?php 
                        endwhile; ?>
                    </div><!-- Tab pane Row 1 end -->
                </div><!-- block-item6 -->
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>

