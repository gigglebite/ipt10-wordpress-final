<?php $cat = get_the_category(); ?>
<?php foreach ($cat as $key => $category) : ?>
   <?php
   if ($key == 2) :
      break;
   endif;                                
  
      if (isset($cat)) {
         if(function_exists('newseqo_cat_style')){
            $styles = 'style="'.esc_attr(newseqo_cat_style($category->term_id, 'category_bg_color', 'bg')). esc_attr(newseqo_cat_style($category->term_id, 'category_color', 'color')).'"';
         }
         echo '<a class="post-cat" href="' . esc_url(get_category_link($category->term_id)) . '" '.$styles.'><span class="before"></span>' .esc_html(get_cat_name($category->term_id)) .'<span class="after"></span></a>';
      }
   endforeach;
?>