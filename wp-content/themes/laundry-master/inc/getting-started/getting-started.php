<?php
//about theme info
add_action( 'admin_menu', 'laundry_master_gettingstarted' );
function laundry_master_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'laundry-master'), esc_html__('About Theme', 'laundry-master'), 'edit_theme_options', 'laundry_master_guide', 'laundry_master_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function laundry_master_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'laundry_master_admin_theme_style');

//guidline for about theme
function laundry_master_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'laundry-master' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Multicolor Business WordPress Theme', 'laundry-master' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'laundry-master' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'laundry-master' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'laundry-master' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'laundry-master' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'laundry-master' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'laundry-master' ); ?> <a href="<?php echo esc_url( LAUNDRY_MASTER_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'laundry-master' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Laundry Master is a modern and multipurpose WordPress theme designed for laundry service providers, dry cleaning shops, washing services, ironing, home care,  corporate cleaning solutions, laundryman, clothes cleaning and any business related to washing and laundry services. This clean and future proof theme is built with HTML5 codes and has wonderful CSS animations that will make your site look stunning. Its professional design lets you frame a powerful website that does not fail to make a statement. The live theme customizer offers you with a lot of personalization options that enable you to obtain the desired look. You will never lose your visitors and potential clients as the codes are highly optimized to deliver fast loading pages. Integrated with social media icons, this theme offers ample space for showing all the details and content. You will be able to gain the trust of potential clients and visitors as this theme has space for showing testimonials of your satisfied clients. Your website can be translated into multiple languages as this theme is translation ready thanks to its WPML and RTL compatibility. Its SEO ready design fetches more traffic for your site. It also comes with comprehensive documentation and awesome support from developers.', 'laundry-master')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Business Theme', 'laundry-master' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'laundry-master'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( LAUNDRY_MASTER_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'laundry-master'); ?></a>
			<a href="<?php echo esc_url( LAUNDRY_MASTER_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'laundry-master'); ?></a>
			<a href="<?php echo esc_url( LAUNDRY_MASTER_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'laundry-master'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/laundry-master.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'laundry-master'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'laundry-master'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'laundry-master'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>