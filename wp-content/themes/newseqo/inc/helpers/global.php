<?php 
// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function newseqo_kses( $raw ) {
    $allowed_tags = array(
        'a' => array(
            'class' => array(),
            'href'  => array(),
            'rel'   => array(),
            'title' => array(),
        ),
        'option' => array(
            'value' => array(),

        ),
        'abbr' => array(
            'title' => array(),
        ),
        'b' => array(),
        'blockquote' => array(
            'cite'  => array(),
        ),
        'cite' => array(
            'title' => array(),
        ),
        'code' => array(),
        'del' => array(
            'datetime' => array(),
            'title' => array(),
        ),
        'dd' => array(),
        'div' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'dl' => array(),
        'dt' => array(),
        'em' => array(),
        'h1' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'i' => array(),
        'img' => array(
            'alt'    => array(),
            'class'  => array(),
            'height' => array(),
            'src'    => array(),
            'width'  => array(),
        ),
        'li' => array(
            'class' => array(),
        ),
        'sup'=> array(
            'class' => array(),
        ),
        'ol' => array(
            'class' => array(),
        ),
        'p' => array(
            'class' => array(),
        ),
        'q' => array(
            'cite' => array(),
            'title' => array(),
        ),
        'span' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'i' => array(
            'class' => array(),
            'title' => array(),
            'style' => array(),
        ),
        'strike' => array(),
        'strong' => array(),
        'ul' => array(
            'class' => array(),
        ),
    );


	if ( function_exists( 'wp_kses' ) ) { // WP is here
		$allowed = wp_kses( $raw, $allowed_tags );
	} else {
		$allowed = $raw;
	}

	return $allowed;
}

function newseqo_get_crop_title( $title , $count = 10 ) { 
  
   if(newseqo_option('newseqo_categry_title_lenght')) {
      $count = newseqo_option('newseqo_categry_title_lenght');
   }

   return wp_trim_words($title,$count,'');
}
/*
Excerp limit function 
default 100
*/
function newseqo_get_excerpt($count = 100 ) {
 
   $count = newseqo_desc_limit($count);
  
   $newseqo_blog_read_more_text = newseqo_option('newseqo_blog_readmore_text',esc_html__('readmore','newseqo'));
  
   $excerpt = get_the_excerpt();
   $excerpt = esc_html($excerpt);
   $words   = str_word_count($excerpt, 2);
   $pos     = array_keys($words);
   if(count($words)>$count){
      $excerpt = substr($excerpt, 0, $pos[$count]); 
   }
   $newseqo_blog_read_more = newseqo_option('newseqo_blog_readmore');
   if($newseqo_blog_read_more == '__true'){
      $excerpt = wp_kses_post($excerpt .'<a class="readmore-btn" href="'.esc_url(get_the_permalink()).'">'. $newseqo_blog_read_more_text. '<i class="xts-icon xts-arrow-right"> </i></a>');
   }
  
   return $excerpt;
   }

   function newseqo_desc_limit($default){
      if(!is_single() && !is_page()) {        
         if(newseqo_option('newseqo_categry_post_desc_lenght') ){
            return newseqo_option('newseqo_categry_post_desc_lenght');
         }else{
            return $default;
         }
      }else{
         return $default;
      }
   }

   // newseqo related post by tags
function newseqo_related_posts_by_tags( $post_id = '', $related_count = 4, $feature_image = false ) {
    
   try{
       if($post_id==''){
       $post_id = get_the_ID();
       }
       $tags      = wp_get_post_tags($post_id);
       $term_tags = wp_list_pluck($tags,'term_id');
       $args = array(
 
          'tag__in' => $term_tags,
          'post__not_in' => array($post_id),
          'posts_per_page'=>$related_count,
          'ignore_sticky_posts'=>1,
       );
       if($feature_image){
          $args["meta_query"] = array(
             array(
                'key' => '_thumbnail_id',
                'compare' => 'EXISTS'
             ),
          );
       }
 
       return new WP_Query($args);
 
    } catch(Exception $e) {
 
    return new WP_Query( [] ); 
 
   }
 
 }
    // newseqo feature post by sticky
function newseqo_related_posts_by_sticky(  ) {
    if(!is_category()){
      return new WP_Query( [] ); 
    }
   try{
      
       $term = get_queried_object();
       $args = [
      
            'post_type'           => 'post',
            'post__in'            => get_option( 'sticky_posts' ),
            'posts_per_page'      => 10,
            'ignore_sticky_posts' => 1,
            'tax_query' => array(
               array (
                  'taxonomy' => 'category',
                  'field' => 'slug',
                  'terms' => $term->slug,
               )
         ),

       ];
   
 
       return new WP_Query($args);
 
    } catch(Exception $e) {
 
    return new WP_Query( [] ); 
 
   }
 
 }

 function newseqo_src($key='',$default=''){
       
     if($key=='' || !newseqo_option($key)){
        return $default;
     }

     return newseqo_option($key);
 }
/*
 theme_mod alter function
 check json value
 */
//  function newseqo_option($key='',$default=''){
       
//    if($key=='' || !get_theme_mod($key)){
//       return $default;
//    }
   
//    $option = get_theme_mod($key,$default);
//    if(newseqo_isJson($option)){
//      return json_decode($option);
//    } 
//    return $option;
// }


function newseqo_option( $key, $default_value = '', $method = 'customizer' ) {
	if ( defined( 'DEVM' ) ) {
		switch ( $method ) {
			case 'customizer':
				$value = devm_theme_option( $key );
				break;
			default:
				$value = '';
				break;
		}
		return (!isset($value) || $value == '') ? $default_value :  $value;
	}
	return $default_value;
}



function newseqo_isJson($string) {
   json_decode($string);
   return (json_last_error() == JSON_ERROR_NONE);
}
/*
Advertisement area function 
settings come from customizer
*/
function newseqo_ad($key='',$default=''){
   if(newseqo_option('newseqo_ad_show') === '__false' || $key==''){
      return;
   }
   
   $img_id = newseqo_option($key);
   $img_link = '';
   if (filter_var($img_id, FILTER_VALIDATE_URL)) { 
      $img_link = $img_id;
   
    }else{
      $img_link  = wp_get_attachment_image_url($img_id,'large');
      if($default =='' && $img_link==''){
         return;
      }
      if(!$img_link){
        $img_link = NEWSEQO_IMG.$default;  
      }
    }

   
   ?>  
 
      <a href="<?php echo esc_url(newseqo_option('newseqo_ad_url')); ?>">
         <img class="img-fluid" src="<?php echo esc_url($img_link); ?>" alt="<?php echo esc_attr__('Newseqo ads', 'newseqo'); ?>">
      </a>

   <?php
	
}

// meta option
function newseqo_meta_option( $postid, $key, $default_value = '' ) {
	if ( defined( 'DEVM' ) ) {
      $value = devm_meta_option($postid, $key, $default_value);
	}
	return (!isset($value) || $value == '') ? $default_value :  $value;
}

//terms options
function newseqo_cat_style( $termid,$key,$css='color') {    
   $style = '';
   $prefix    = 'devmonsta_';
   $key = $prefix . $key;
   if ( defined( 'DEVM' ) ) {
      $value = devm_taxonomy($termid, $key, true);
      if($value != ''){
         if($css == 'color'){
            $style = 'color:'.$value.';';
         }else{
            $style = 'background-color:' . $value.';';           
         }
      }       
   }
   return $style; 
}

//category layout
function newseqo_cat_layout($termid,$default='style2') {    
   $cat_layout = $default;
   $prefix    = 'devmonsta_';
   if ( defined( 'DEVM' ) ) {
      $overwrite = devm_taxonomy($termid, $prefix.'category_layout_overwrite', true);
      if($overwrite == 'yes'){
         $cat_layout = devm_taxonomy($termid, $prefix.'newseqo_single_category_layout', true);
      } else{
         $cat_layout = newseqo_option('newseqo_blog_category_layout','style2');
      }       
   }
   return $cat_layout; 
}

