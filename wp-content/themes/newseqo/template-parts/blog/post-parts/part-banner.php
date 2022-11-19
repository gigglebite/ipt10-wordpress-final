<?php
$img_link = '';
$img_id = '';
$overwrite_single_post = newseqo_meta_option(get_the_ID(), 'newseqo_ad_single_post_overwrite', '');
if($overwrite_single_post == 'yes'){
   $img_id = newseqo_meta_option(get_the_ID(), 'newseqo_ad_single_banner_img_overwrite', '');
   $img_link = newseqo_meta_option(get_the_ID(), 'newseqo_ad_single_url_overwrite', '');
} else{
   $newseqo_ad_single_post = newseqo_option('newseqo_ad_single_post','yes');
   if($newseqo_ad_single_post == 'yes'){
      $img_id = newseqo_option('newseqo_ad_single_banner_img');
      $img_link = newseqo_option('newseqo_ad_single_url');
   }   
}
?> 

<?php if($img_id != ''):
  $img_url = wp_get_attachment_image_url($img_id, 'full');
   ?>
      <div class="footer-banner">
         <?php if($img_link != ''){?>
         <a href="<?php echo esc_url($img_link); ?>">
         <?php } ?>
            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr__('Banner image', 'newseqo'); ?>">
         <?php if($img_link != ''){?>
         </a>
         <?php } ?>
      </div> <!-- Author box end -->
<?php endif; ?>