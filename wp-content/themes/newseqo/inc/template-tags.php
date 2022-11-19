<?php
function newseqo_get_post_category($tax = 'category')
{

   static $list = null;
   if (!is_array($list)) {
      $categories = get_terms($tax, array(
         'orderby'       => 'name',
         'order'         => 'DESC',
         'hide_empty'    => false,
         'number'        => 200

      ));

      foreach ($categories as $category) {
         $list[$category->term_id] = $category->name;
      }
   }

   return $list;
}