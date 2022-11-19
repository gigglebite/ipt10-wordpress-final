<?php
   $newseqo_blog_author = newseqo_option('newseqo_blog_post_author'); 
  
?> 

<?php if($newseqo_blog_author === '__true'): ?>
         <div class="author-box solid-bg">
            <div class="author-img pull-left">
               <?php echo get_avatar(get_the_ID());  ?>
            </div>
            <div class="author-info">
               <h3><?php echo get_the_author(); ?></h3>
               <p class="author-url">
                     <a href="#">
                     <?php echo esc_html(get_the_author_meta('user_url')); ?>
                     </a>
               </p>
                  <p> 
                     <?php echo esc_html(get_the_author_meta('user_description')); ?>
                  </p>
            </div>
         </div> <!-- Author box end -->
<?php endif; ?>