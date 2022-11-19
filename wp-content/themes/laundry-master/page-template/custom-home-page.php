<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'laundry_master_above_slider' ); ?>

	<?php if( get_theme_mod('laundry_master_slider_hide_show') != ''){ ?>
		<section id="slider">
		  	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $laundry_master_slider_pages = array();
		      	for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'laundry_master_slider' . $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $laundry_master_slider_pages[] = $mod;
			        }
		      	}
		      	if( !empty($laundry_master_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $laundry_master_slider_pages,
			          	'orderby' => 'post__in'
			        );
			        $query = new WP_Query( $args );
			        if ( $query->have_posts() ) :
			          $i = 1;
			    ?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
					          	<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?> "/>
					          	<div class="carousel-caption">
						            <div class="inner_carousel">
						              	<h2><?php the_title();?></h2>
						              	<p><?php $laundry_master_excerpt = get_the_excerpt(); echo esc_html( laundry_master_string_limit_words( $laundry_master_excerpt, esc_attr(get_theme_mod('laundry_master_slider_excerpt_length','20') ) )); ?></p>
						            </div>
						            <div class="read-btn">
					            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','laundry-master'); ?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php esc_html_e('Read More','laundry-master'); ?></span></a>
							       	</div>
					          	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		        <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
		        <span class="screen-reader-text"><?php esc_html_e('Previous','laundry-master'); ?></span>
		      	</a>
		      	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		        <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
		        <span class="screen-reader-text"><?php esc_html_e('Next','laundry-master'); ?></span>
		      	</a>
		  	</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('laundry_master_below_slider'); ?>

	<?php /*--- Contact ---*/ ?>
	<?php if (get_theme_mod('laundry_master_call') != '') {?>
		<div class="contact-us">
			<div class="container">
				<div class="row">
					<div class="offset-lg-8 offset-md-6 col-lg-4 col-md-6">
						<div class="call">
							<p><i class="fas fa-phone"></i><span><?php esc_html_e('Call Us', 'laundry-master'); ?></span> <a href="tel:<?php echo esc_attr(get_theme_mod('laundry_master_call', '')); ?>"><?php echo esc_html(get_theme_mod('laundry_master_call', '')); ?></a></p>
						</div>						
					</div>
				</div>
			</div>
		</div>
	<?php }?>

	<?php /*--- Our services ---*/ ?>

	<section id="our_service">
	    <div class="services"></div>
		<div class="container">
			<div class="row">
		    	<?php $laundry_master_services_pages = array();
		    	for ( $count = 0; $count <= 3; $count++ ) {
			      	$mod = intval( get_theme_mod( 'laundry_master_services_page' . $count ));
			     	if ( 'page-none-selected' != $mod ) {
			        	$laundry_master_services_pages[] = $mod;
			      	}
		    	}
		    	if( !empty($laundry_master_services_pages) ) :
		      	$args = array(
		        	'post_type' => 'page',
		        	'post__in' => $laundry_master_services_pages,
		        	'orderby' => 'post__in'
		      	);
		      	$query = new WP_Query( $args );
		     	if ( $query->have_posts() ) :
			        $count = 0;
			        while ( $query->have_posts() ) : $query->the_post(); ?>        	
			          	<div class="col-lg-3 col-md-6">
				            <div class="services-box">
								<div class="servicesbox-img">
									<?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?>
									<?php } ?>
								</div>
								<div class="service-content">
							      	<h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
							      	<div class="service-btn">
					            		<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','laundry-master'); ?><i class="fas fa-arrow-right"></i><span class="screen-reader-text"><?php esc_html_e('Read More','laundry-master'); ?></span></a>
							       	</div>
						       	</div>
						    </div>
			          	</div>
			        <?php $count++; endwhile; 
			        wp_reset_postdata();?>
		      	<?php else : ?>
		          	<div class="no-postfound"></div>
		      	<?php endif;
		    	endif;?>
	      		<div class="clearfix"></div>
	      	</div>
		</div>
	</section>

	<?php do_action('laundry_master_below_services_section'); ?>

	<div class="container lz-content">
	  	<?php while ( have_posts() ) : the_post(); ?>
	        <?php the_content(); ?>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>