<?php 
		$newseqo_newsticker_enable  = newseqo_option('newseqo_newsticker_show');
		$newseqo_category_list = '';
		

		if($newseqo_newsticker_enable =='__false' ){
			return;
		}
		
		$newseqo_newsticker_nav_enable = '__true';
		$newseqo_newsticker_post_order_by = newseqo_option('newseqo_newsticker_source','sticky');
		$newseqo_count   = newseqo_option('newseqo_newsticker_count');
		if( $newseqo_newsticker_post_order_by =='category' ) {
			$newseqo_category_list  = explode(',',newseqo_option('newseqo_newsticker_source_category'));
			
		}
		
		$newseqo_query_arg = array(
			'post_type' => 'post',
			'posts_per_page' => esc_attr($newseqo_count),
			'orderby'=>'date',
			'order' => 'DESC',
			'post_status' => 'publish',
			'ignore_sticky_posts'=>1	
		);
		
		if ($newseqo_newsticker_post_order_by == 'sticky') {
			$newseqo_query_arg['post__in'] = get_option( 'sticky_posts' );
		}  

		if($newseqo_newsticker_post_order_by == 'category'){
			$newseqo_query_arg['tax_query'] = array(

				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $newseqo_category_list,
				),

			);
		}
	    $newseqo_news_ticker_post = new WP_Query($newseqo_query_arg);

   if( $newseqo_news_ticker_post->have_posts() ) { 
   ?>
		<div class="tranding-bar">
			<div class="container clearfix">
					<div id="tredingcarousel" class="trending-slide carousel slide trending-slide-bg" data-ride="carousel">
						<?php  if(newseqo_option('newseqo_newsticker_title')!='') { ?>
							<h3 class="trending-title"><i class="fa fa-bolt"></i> <?php echo esc_html(newseqo_option('newseqo_newsticker_title'));?></h3>
						<?php } ?>
						<div class="carousel-inner">
							<?php
							$newseqo_k = 1;
							while ($newseqo_news_ticker_post->have_posts()) : $newseqo_news_ticker_post->the_post();?>
								<?php if( $newseqo_k == 1 ){ ?>
								<div class="carousel-item active">
								<?php } else { ?>
								<div class="carousel-item">
								<?php } ?>
									<div class="post-content">
										<h3 class="post-title title-small"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>
									</div><!--/.most-view-item-content -->
								</div><!--/.carousel-item -->
							<?php
							$newseqo_k++;
							endwhile;
							wp_reset_postdata(); ?>
						</div> <!--/.carousel-inner-->
						<?php if( $newseqo_newsticker_nav_enable === '__true' ) { ?>
							<div class="tp-control">
								<a class="tp-control-prev" href="#tredingcarousel" role="button" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								</a>
								<a class="tp-control-next" href="#tredingcarousel" role="button" data-slide="next">
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						<?php } ?>
					</div> <!--/.trending-slide-->
				</div> <!--/.container-->
		</div> <!--/.trending-bar-->
   <?php
   }





   

