<?php
function newseqo_body_classes($classes)
{

   if (!is_singular()) {
      $classes[] = 'hfeed';
   }

   if (is_active_sidebar('sidebar-1')) {
      $classes[] = 'sidebar-active';
   } else {
      $classes[] = 'sidebar-inactive no-sidebar';
   }


   return $classes;
}
add_filter('body_class', 'newseqo_body_classes');

function newseqo_pingback_header()
{
   if (is_singular() && pings_open()) {
      printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
   }
}
add_action('wp_head', 'newseqo_pingback_header');




function newseqo_child_category_meta()
{

   $newseqo_cat_term = get_queried_object();
   $newseqo_cat_children = get_terms($newseqo_cat_term->taxonomy, array(
      'parent'    => $newseqo_cat_term->term_id,
      'hide_empty' => false
   ));

   if (!$newseqo_cat_children) {
      return;
   }

   if ($newseqo_cat_children) {
      echo '<div class="sub-category-list">';
      foreach ($newseqo_cat_children as $newseqo_subcat) {
         echo '<a class="post-cat" href="' . esc_url(get_term_link($newseqo_subcat, esc_html($newseqo_subcat->taxonomy))) . '" >' .
            esc_html($newseqo_subcat->name) .
            '</a>';
      }
      echo '</div>';
   }
}

function newseqo_category_meta()
{

   $blog_cat_show = newseqo_option('newseqo_blog_category');
   $blog_cat_single = newseqo_option('newseqo_blog_category_single');
   if ($blog_cat_show != '__true') {
      return;
   }
   $cat = get_the_category();
   if ($blog_cat_single == '__true') {

      shuffle($cat);
      if (isset($cat[0])) {
         if(function_exists('newseqo_cat_style')){
            $styles = 'style="'.esc_attr(newseqo_cat_style($cat[0]->term_id, 'category_bg_color', 'bg')). esc_attr(newseqo_cat_style($cat[0]->term_id, 'category_color', 'color')).'"';
         }
         echo '<a class="post-cat" href="' . esc_url(get_category_link($cat[0]->term_id)) . '" '.$styles.'><span class="before"></span>' .esc_html(get_cat_name($cat[0]->term_id)) .'<span class="after"></span></a>';
      }
      return;
   }

   if ($cat) {
      foreach ($cat as $value) :
         if(function_exists('newseqo_cat_style')){
            $styles = 'style="'.esc_attr(newseqo_cat_style($value->term_id, 'category_bg_color', 'bg')). esc_attr(newseqo_cat_style($value->term_id, 'category_color', 'color')).'"';
         }
         echo '<a class="post-cat " href="' . esc_url(get_category_link($value->term_id)) . '" '.$styles.'>' . esc_html(get_cat_name($value->term_id)) . '</a>';
      endforeach;
   }
}

function newseqo_category_post_meta()
{
?>

   <?php

   $blog_author_show = newseqo_option('newseqo_blog_author');

   if ($blog_author_show === '__true') {

      printf(
         '<span class="post-author">' . '<i class="xts-icon xts-user"></i>' . '<a href="%2$s">%3$s</a></span>',
         get_avatar(get_the_author_meta('ID'), 55),
         esc_url(get_author_posts_url(get_the_author_meta('ID'))),
         get_the_author()
      );
   }

   $blog_date_show = newseqo_option('newseqo_blog_date');

   if (get_post_type() === 'post' && $blog_date_show === '__true') {
      echo '<span class="post-meta-date">
                  <i class="xts-icon xts-calendar"></i>
                     ' . get_the_date() .
         '</span>';
   }
   
   if(function_exists('newseqo_get_postview')){
      $newseqo_blog_count = newseqo_option('newseqo_blog_count');
      if ($newseqo_blog_count === '__true') {
      ?>
         <span class="post-meta-count"><i class="fa fa-fire"></i> <?php echo newseqo_get_postview(get_the_ID()); ?></span>
      <?php
      }
   }  ?>

<?php }

// display meta information for a specific post
// ----------------------------------------------------------------------------------------
function newseqo_post_meta()
{
?>
   <ul class="post-meta">

      <?php

      if ((newseqo_option('newseqo_blog_author') === '__true') && is_single()) :
         printf(
            '<li class="post-author">%1$s<a href="%2$s">%3$s</a></li>',
            get_avatar(get_the_author_meta('ID'), 55),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            get_the_author()
         );

      else :
         if (newseqo_option('newseqo_blog_author') === '__true') {
            printf(
               '<li class="post-author"> <i class="xts-icon xts-user"></i> <a href="%1$s">%2$s</a></li>',
               esc_url(get_author_posts_url(get_the_author_meta('ID'))),
               get_the_author()
            );
         }

      endif;
      if (newseqo_option('newseqo_blog_category') == '__true') : ?>
         <li class="post-category">
            <?php newseqo_category_meta(); ?>
         </li>
      <?php

      endif;
      if (get_post_type() === 'post' && newseqo_option('newseqo_blog_date') === '__true') {
         echo '<li class="post-meta-date">
                  <i class="fa fa-calendar"></i>
                     ' . get_the_date() .
            '</li>';
      }

      if (is_category() && newseqo_option('newseqo_blog_comment') === '__true') {
         printf(
            ' <li class="post-comment"><i class="xts-icon xts-comments"></i><a href="#" class="comments-link">%1$s</a></li>',
            esc_html(get_comments_number(get_the_ID()))
         );
      }


      if (is_single()) :

         if (newseqo_option('newseqo_blog_post_comment_open') === '__true') :
            printf(
               ' <li class="post-comment"><i class="fa fa-comments"></i><a href="#" class="comments-link">%1$s </a></li>',
               esc_html(get_comments_number(get_the_ID()))
            );
         endif;

         if (newseqo_option('newseqo_blog_read_time') === '__true') {

            echo  '<li class="read-time">' . wp_kses_post(newseqo_content_estimated_reading_time(get_the_content())) . '</li>';
         }

      endif;

      ?>
   </ul>
<?php }

if (!function_exists('newseqo_content_estimated_reading_time')) {

   function newseqo_content_estimated_reading_time($content = '', $wpm = 200)
   {
      $clean_content = esc_html($content);
      $word_count = str_word_count($clean_content);
      $time = ceil($word_count / $wpm);
      if ($time <= 1) {
         $time .= esc_html__(' min read', 'newseqo');
      } else {
         $time .= esc_html__(' min read', 'newseqo');
      }
      $output = '<span class="post-read-time">';
      $output .= '<i class="fa fa-eye"></i>';
      $output .= '<span class="read-time">' . $time . '</span>' . ' ';
      $output .= '</span>';
      return $output;
   }
}

function newseqo_link_pages()
{
   $args = array(
      'before'          => '<div class="page-links"><span class="page-link-text">' . esc_html__('More pages: ', 'newseqo') . '</span>',
      'after'             => '</div>',
      'link_before'       => '<span class="page-link">',
      'link_after'       => '</span>',
      'next_or_number'    => 'number',
      'separator'          => '  ',
      'nextpagelink'       => esc_html__('Next ', 'newseqo') . '<I class="fa fa-angle-right"></i>',
      'previouspagelink'    => '<I class="fa fa-angle-left"></i>' . esc_html__(' Previous', 'newseqo'),
   );
   wp_link_pages($args);
}

function newseqo_title_limit($title)
{
   $limit = newseqo_option('newseqo_blog_post_title_char_limit_length', 20);
   if (newseqo_option('newseqo_blog_listing_title_length') == '__true') {
      $title  =  wp_trim_words($title, $limit, '');
   }
   echo esc_html($title);
}

function newseqo_comment_style($comment, $args, $depth)
{
   if ('div' === $args['style']) {
      $tag       = 'div';
      $add_below    = 'comment';
   } else {
      $tag       = 'li ';
      $add_below    = 'div-comment';
   }
?>
   <?php
   if ($args['avatar_size'] != 0) {
      echo get_avatar($comment, $args['avatar_size'], '', '', array('class' => 'comment-avatar pull-left'));
   }
   ?>
   <<?php
      echo wp_kses_post($tag);
      comment_class(empty($args['has_children']) ? '' : 'parent');
      ?> id="comment-<?php comment_ID() ?>"><?php if ('div' != $args['style']) { ?>
         <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
                                                                           ?>
         <div class="meta-data">

            <div class="pull-right reply"><?php
                                          comment_reply_link(
                                             array_merge(
                                                $args,
                                                array(
                                                   'add_below'    => $add_below,
                                                   'depth'       => $depth,
                                                   'max_depth'    => $args['max_depth']
                                                )
                                             )
                                          );
                                          ?>
            </div>


            <span class="comment-author vcard">
               <?php
               printf(wp_kses_post('<cite class="fn">%s</cite> <span class="says">%s</span>', 'newseqo'), get_comment_author_link(), esc_html__('says:', 'newseqo'));
               ?>
            </span>
            <?php if ($comment->comment_approved == '0') { ?>
               <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'newseqo'); ?></em><br /><?php }
                                                                                                                                          ?>

            <div class="comment-meta commentmetadata comment-date">
               <?php

               printf(esc_html__('%1$s at %2$s', 'newseqo'), esc_html(get_comment_date()), esc_html(get_comment_time())); // phpcs:ignore WordPress.WP.I18n.MissingTranslatorsComment
               ?>
               <?php edit_comment_link(esc_html__('(Edit)', 'newseqo'), '  ', ''); ?>
            </div>
         </div>
         <div class="comment-content">
            <?php comment_text(); ?>
         </div>
         <?php if ('div' != $args['style']) : ?>
         </div>
         <?php
         endif;
      }



      // post thumbnail
      if (!function_exists('newseqo_post_thumbnail')) :

         function newseqo_post_thumbnail()
         {
            if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
               return;
            }

            if (is_singular()) :
         ?>

            <div class="post-thumbnail">
               <?php the_post_thumbnail(); ?>
            </div>

         <?php else : ?>

            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
               <?php
               the_post_thumbnail('post-thumbnail', array(
                  'alt' => the_title_attribute(array(
                     'echo' => false,
                  )),
               ));
               ?>
            </a>

   <?php
            endif;
         }
      endif;
      if (!function_exists('newseqo_return')) :

         function newseqo_return($arg)
         {

            return $arg;
         }

      endif;


      // newseqo breadcrumbs
      function newseqo_get_breadcrumbs($seperator = '/', $word = '')
      {
         $word = newseqo_option('newseqo_breadcrumb_lenght', 20);

         echo '<ol class="breadcrumb">';
         if (!is_home()) {

            echo sprintf('<li><a href=%s>', esc_url(get_home_url('/')));
            echo esc_html__('Home', 'newseqo');
            echo "</a></li> " . wp_kses_post($seperator);

            if (is_category() || is_single()) {
               echo '<li>';
               $category    = get_the_category();
               $post       = get_queried_object();
               $postType    = get_post_type_object(get_post_type($post));
               if (!empty($category)) {
                  echo esc_html($category[0]->cat_name) . '</li>';
               } else if ($postType) {
                  echo esc_html($postType->labels->singular_name) . '</li>';
               }

               if (is_single()) {
                  echo wp_kses_post($seperator) . "  <li>";
                  echo esc_html($word) != '' ? esc_html(wp_trim_words(get_the_title(), $word)) : esc_html(get_the_title());
                  echo '</li>';
               }
            } elseif (is_page()) {
               echo '<li>';
               echo esc_html($word) != '' ? esc_html(wp_trim_words(get_the_title(), $word)) : esc_html(get_the_title());
               echo '</li>';
            }
         }
         if (is_tag()) {
            single_tag_title();
         } elseif (is_day()) {
            echo "<li>" . esc_html__('Blogs for', 'newseqo') . " ";
            the_time( get_option( 'date_format' ));
            echo '</li>';
         } elseif (is_month()) {
            echo "<li>" . esc_html__('Blogs for', 'newseqo') . " ";
            the_time( get_option( 'date_format' ));
            echo '</li>';
         } elseif (is_year()) {
            echo "<li>" . esc_html__('Blogs for', 'newseqo') . " ";
            the_time( get_option( 'date_format' ));
            echo '</li>';
         } elseif (is_author()) {
            echo "<li>" . esc_html__('Author Blogs', 'newseqo');
            echo '</li>';
         } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
            echo "<li>" . esc_html__('Blogs', 'newseqo');
            echo '</li>';
         } elseif (is_search()) {
            echo "<li>" . esc_html__('Search Result', 'newseqo');
            echo '</li>';
         } elseif (is_404()) {
            echo "<li>" . esc_html__('404 Not Found', 'newseqo');
            echo '</li>';
         }
   echo '</ol>';
}
