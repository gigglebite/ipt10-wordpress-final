<?php
/**
 * The header for our theme
 *
 * @subpackage Laundry Master
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'laundry-master' ); ?></a>

<div class="header-box">
	<div id="header">
		<div class="row m-0">
			<div class="offset-lg-1 offset-md-1 col-lg-3 col-md-5 col-8">
				<div class="logo">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('laundry_master_show_site_title',true)) {?>
              			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('laundry_master_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
			    </div>
			</div>
			<?php if (has_nav_menu('primary')){ ?>
				<div class="col-lg-8 col-md-6 col-4 p-0">
					<div class="header-clip">
						<div class="menu-section">
							<div class="container">
								<div class="toggle-menu responsive-menu">
						            <button onclick="laundry_master_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','laundry-master'); ?></span></button>
						        </div>
								<div id="sidelong-menu" class="nav sidenav">
					                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'laundry-master' ); ?>">
					                  	<?php
						                    wp_nav_menu( array( 
												'theme_location' => 'primary',
												'container_class' => 'main-menu-navigation clearfix' ,
												'menu_class' => 'clearfix',
												'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
												'fallback_cb' => 'wp_page_menu',
						                    ) ); 
					                  	?>
					                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="laundry_master_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','laundry-master'); ?></span></a>
					                </nav>
					            </div>
					        </div>
				        </div>
				    </div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="hex center">
			<div class="hex odd first one"></div>
			<div class="hex odd first three"></div>
			<div class="hex odd first five"></div>
			<div class="hex odd first seven"></div>
			<div class="hex odd first nine"></div> 
			<div class="hex odd first eleven"></div>
		</div>
	    <div class='header-content'>
		    <div class="container">	
		    	<div class="row">
		    		<div class="col-lg-6 col-md-6 align-self-start">
		    			<div class="max-box">
					      	<h1><?php single_post_title(); ?></h1>
						</div>
		    		</div>
		    		<div class="col-lg-6 col-md-6 align-self-center">
				      	<div class="theme-breadcrumb text-md-right">
							<?php laundry_master_breadcrumb(); ?>
						</div>
		    		</div>
		    	</div>
		    </div>
		</div>
	</div>
<?php } ?>