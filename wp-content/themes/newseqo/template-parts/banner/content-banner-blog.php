<?php
$banner_image             = newseqo_option('newseqo_blog_banner_img');
$banner_title             = newseqo_option('newseqo_blog_banner_title', '') != '' ? newseqo_option('newseqo_blog_banner_title') : get_bloginfo('name');
$show                     = newseqo_option('newseqo_blog_banner_enable');
$show_breadcrumb          = newseqo_option('newseqo_blog_banner_breadcrumb_enable');

$banner_img_url = '';
if (filter_var($banner_image, FILTER_VALIDATE_URL)) { 
   $banner_img_url = 'style="background-image:url(' . esc_url($banner_image) . ');"';

 }else{
   $banner_image = wp_get_attachment_image_url($banner_image, 'full');
   if (isset($banner_image) && $banner_image != '') {
      $banner_img_url = 'style="background-image:url(' . esc_url($banner_image) . ');"';
   }
 }

?>

<?php if ($show == '__true') : ?>
   <div class="container" <?php echo wp_kses_post($banner_img_url); ?>>
      <div class=" text-center banner-area <?php echo esc_attr($banner_img_url == '' ? 'banner-solid' : 'banner-bg'); ?>">
         <h2 class="banner-title">
            <?php
            if (is_archive()) {
               the_archive_title();
            } elseif (is_single()) {
               the_title();
            } else {
               $newseqo_title = str_replace(['{', '}'], ['<span>', '</span>'], $banner_title);
               echo wp_kses_post($newseqo_title);
            }
            ?>
         </h2>
         <?php if ($show_breadcrumb === '__true') : ?>

            <?php newseqo_get_breadcrumbs(' / '); ?>
         <?php endif; ?>
      </div>
   </div>
<?php endif; ?>