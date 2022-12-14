<?php
/**
 * Template part for displaying section of banner content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @subpackage Gymnaz
 * @since 1.0.0
 */

$gymnaz_enable_banner_section = get_theme_mod( 'gymnaz_enable_banner_section', true );
$gymnaz_banner_image = get_theme_mod( 'gymnaz_banner_image', esc_url(  get_template_directory_uri() . '/assets/images/banner.jpg' ) );

if($gymnaz_enable_banner_section == true ) {

$gymnaz_banner_title = get_theme_mod( 'gymnaz_banner_title','');
$gymnaz_banner_content = get_theme_mod( 'gymnaz_banner_content','');
$gymnaz_banner_button_label1 = get_theme_mod( 'gymnaz_banner_button_label1','');
$gymnaz_banner_button_link1 = get_theme_mod( 'gymnaz_banner_button_link1','');


?>

<section class="main-slider">
	<div class="slide-item">
		<img src="<?php echo esc_url( $gymnaz_banner_image ); 	?>">
		  <div class="slide-overlay">
			 <div class="slide-table">
				<div class="slide-table-cell">
					<div class="container">
						<div class="slide-content">
							<h2><?php echo esc_html( $gymnaz_banner_title ); ?></h2>
							<p class="my-5"><?php echo esc_html( $gymnaz_banner_content ); ?></p>
							<?php if(!empty($gymnaz_banner_button_link1) && ($gymnaz_banner_button_label1)) { ?>
								<a href="<?php echo esc_url( $gymnaz_banner_button_link1 ); ?>" class="btn btn-dark mr-3"><?php echo esc_html( $gymnaz_banner_button_label1 ); ?></a>
						    <?php } ?>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>