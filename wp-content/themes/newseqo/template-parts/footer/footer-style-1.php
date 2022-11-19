<?php
$newseqo_show_footer_layout = newseqo_option( 'show_footer_widgets');

$newseqo_back_to_top = newseqo_option('newseqo_back_to_top'); 

$newseqo_footer_columns = newseqo_option( 'newseqo_number_of_widgets', 4);

if($newseqo_footer_columns == 1 ) {
    $newseqo_widget_width = 12;
}elseif($newseqo_footer_columns == 2 ) {
    $newseqo_widget_width = 6;
}elseif($newseqo_footer_columns == 3 ) {
    $newseqo_widget_width = 4;
}elseif($newseqo_footer_columns == 4 ) {
    $newseqo_widget_width = 3;
}elseif($newseqo_footer_columns == 5 ) {
    $newseqo_widget_width = 2;
}elseif($newseqo_footer_columns == 6 ) {
    $newseqo_widget_width = 2;
}
?>

        <footer class="xs-footer-section">
            <?php if($newseqo_show_footer_layout == '__true'): ?> 
                <div class="footer--top--area">
                    <div class="container">
                        <div class="row">
                            <?php
                               
                               for ($newseqo_i = 1; $newseqo_i <= $newseqo_footer_columns ;$newseqo_i++):
                                     $newseqo_widget_width = apply_filters( "newseqo_footer_widget_{$newseqo_i}_width", $newseqo_widget_width );
                                ?>
                                    <div class="col-md-<?php echo esc_attr($newseqo_widget_width); ?> footer-widget">
                                        <?php
                                        if(is_active_sidebar('footer-widget-'.$newseqo_i)):
                                            dynamic_sidebar('footer-widget-'.$newseqo_i);
                                        endif;
                                        ?>
                                    </div>
                            <?php endfor; ?>
                        </div><!-- .row END -->
                    </div><!-- .container END -->
                </div><!-- .footer--top--area END -->
            <?php endif ?>
            <div class="copyright-area ">
                <div class="container">
                    <div class="row">
                        <div class="col-8 col-lg-5 align-self-center">
                            <p class="copyright">
                                <?php 
                                    $copyright_content = newseqo_get_theme_mod( 'newseqo_copyright', esc_html__('&copy; Copyright ','newseqo'). date('Y') . esc_html__(' All rights reserved. ', 'newseqo') );
                                    echo wp_kses_post($copyright_content);
                                ?>
                            </p>
                        </div>
                        <div class="col-lg-6 col-lg-5 d-none d-lg-block align-self-center">
                           <?php
                                 if ( has_nav_menu( 'footer_menu' ) ) {
                                 
                                    wp_nav_menu( array( 
                                       'theme_location' => 'footer_menu', 
                                       'menu_class' => 'footer-nav', 
                                       'container' => '' 
                                    ) );
                                 }

                           ?>
                        </div>
                        <div class="col-4 col-lg-1 pt-2">
                        <?php if($newseqo_back_to_top==='__true'):?>
             
                           <div class="BackTo">
                              <a href="#" class="xts-icon xts-up-arrow" aria-hidden="true"></a>
                           </div>

                        <?php endif; ?>
                        </div>   
                    </div>
                </div>
            </div>
            
        </footer>