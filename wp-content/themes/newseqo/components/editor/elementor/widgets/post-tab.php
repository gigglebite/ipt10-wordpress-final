<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_post_tab_widget extends Widget_Base {

	public function get_name() {
		return 'newseqo-post-tab';
	}

	public function get_title() {
		return __( 'Post tab', 'newseqo' );
	}

	public function get_icon() {
		return 'eicon-gallery-group';
	}

	public function get_categories() {
		return [ 'newseqo-elements' ];
	}

	protected function register_controls() {
      $this->start_controls_section(
         'section_tab',
         [
             'label' => esc_html__('Post', 'newseqo'),
         ]
     );
   


   $this->add_control(
      'block_title_text',
      [
            'label' => esc_html__('Block title', 'newseqo'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'Post Slider', 'newseqo' ),
      ]
   );

  

   $this->add_control(
      'post_count',
      [
      'label'         => esc_html__( 'Post count', 'newseqo' ),
      'type'          => Controls_Manager::NUMBER,
      'default'       => '8',
      ]
   );
   
   $this->add_control(
       'post_title_crop',
       [
         'label'         => esc_html__( 'Post title crop', 'newseqo' ),
         'type'          => Controls_Manager::NUMBER,
         'default'       => '50',
       ]
   );
   $this->add_control(
      'post_content_crop',
      [
        'label'         => esc_html__( 'Post content crop', 'newseqo' ),
        'type'          => Controls_Manager::NUMBER,
        'default'       => '10',
      ]
  );
      $this->add_control(
            'post_format',
            [
               'label' =>esc_html__('Select Post Format', 'newseqo'),
               'type'      => Custom_Controls_Manager::SELECT2,
               'options' => [
                  'standard'  =>esc_html__( 'Standard', 'newseqo' ),
                  'video' =>esc_html__( 'Video', 'newseqo' ),
            ],
            'default' => [],
               'label_block' => true,
               'multiple'  => true,
            ]
      );
      $this->add_control(
         'show_author',
         [
             'label' => esc_html__('Show Author', 'newseqo'),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__('Yes', 'newseqo'),
             'label_off' => esc_html__('No', 'newseqo'),
             'default' => 'no',
         ]
     );
     $this->add_control(
         'show_date',
         [
             'label' => esc_html__('Show Date', 'newseqo'),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__('Yes', 'newseqo'),
             'label_off' => esc_html__('No', 'newseqo'),
             'default' => 'yes',
         ]
     );

     $this->add_control(
         'show_cat',
         [
             'label' => esc_html__('Show Category', 'newseqo'),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__('Yes', 'newseqo'),
             'label_off' => esc_html__('No', 'newseqo'),
             'default' => 'yes',
         ]
     );
     $this->add_control(
         'post_sortby',
         [
             'label'     =>esc_html__( 'Post sort by', 'newseqo' ),
             'type'      => Controls_Manager::SELECT,
             'default'   => 'latestpost',
             'options'   => [
                     'latestpost'      =>esc_html__( 'Latest posts', 'newseqo' ),
                     'popularposts'    =>esc_html__( 'Popular posts', 'newseqo' ),
                     'mostdiscussed'    =>esc_html__( 'Most discussed', 'newseqo' ),
                 ],
         ]
     );
     $this->add_control(
         'post_order',
         [
             'label'     =>esc_html__( 'Post order', 'newseqo' ),
             'type'      => Controls_Manager::SELECT,
             'default'   => 'DESC',
             'options'   => [
                     'DESC'      =>esc_html__( 'Descending', 'newseqo' ),
                     'ASC'       =>esc_html__( 'Ascending', 'newseqo' ),
                 ],
         ]
     );

     $repeater = new \Elementor\Repeater();

     
		$repeater->add_control(
			'post_cats', [
            'label' =>esc_html__('Select Categories', 'newseqo'),
            'type'      => Controls_Manager::SELECT2,
            'options'   => $this->post_category(),
            'label_block' => true,
            'multiple'  => true,
			]
		);
	
     
		$repeater->add_control(
			'tab_title', [
            'label'         => esc_html__( 'Tab title', 'newseqo' ),
            'type'          => Controls_Manager::TEXT,
            'default'       => esc_html__( 'Add Label', 'newseqo' ),
			]
		);

	

      $this->add_control(
			'tabs',
			[
				'label' => esc_html__('Tabs', 'newseqo'),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'tab_title' => esc_html__( 'Add Label', 'newseqo' ),
					],
				],
				'title_field' => '{{{ tab_title }}}',
			]
		);

     $this->end_controls_section();


     $this->start_controls_section('newseqo_style_section',
      [
         'label' => esc_html__( 'Post Title', 'newseqo' ),
         'tab' => Controls_Manager::TAB_STYLE,
      ]
     );

     $this->add_control(
      'post_title_color',
      [
         'label' => esc_html__('Post  color', 'newseqo'),
         'type' => Controls_Manager::COLOR,
         'default' => '',
         'selectors' => [
            '{{WRAPPER}} .featured-tab .post-content .post-title a' => 'color: {{VALUE}};',
         ],
      ]
     ); 
     $this->add_control(
      'post_title_color_hv',
      [
         'label' => esc_html__('Post hover', 'newseqo'),
         'type' => Controls_Manager::COLOR,
         'default' => '',
         'selectors' => [
            '{{WRAPPER}} .featured-tab .post-content .post-title:hover a' => 'color: {{VALUE}};',
         ],
      ]
      );

     
     $this->end_controls_section();

     $this->start_controls_section('newseqo_style_pcontent_section',
     [
        'label' => esc_html__( 'Post content', 'newseqo' ),
        'tab' => Controls_Manager::TAB_STYLE,
     ]
    );

    $this->add_control(
      'post_meta_color',
      [
         'label' => esc_html__('Author and date color', 'newseqo'),
         'type' => Controls_Manager::COLOR,
         'default' => '',
         'selectors' => [
            '{{WRAPPER}} .featured-tab .post-content .post-meta .post-author a , .featured-tab .post-content .post-meta .post-date' => 'color: {{VALUE}};',
         ],
      ]
      ); 
    $this->add_control(
     'post_content_color',
     [
        'label' => esc_html__('Color', 'newseqo'),
        'type' => Controls_Manager::COLOR,
        'default' => '',
        'selectors' => [
           '{{WRAPPER}} .featured-tab .post-content  p' => 'color: {{VALUE}};',
        ],
     ]
     ); 

     $this->add_responsive_control(
      'cat_border_radius',
          [
              'label' => esc_html__( 'Category Border Radius', 'newseqo' ),
              'type' => Controls_Manager::DIMENSIONS,
              'size_units' => [ 'px','%'],
              'selectors' => [
                  '{{WRAPPER}} a.post-cat' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
              ],
          ]
      );

      $this->add_responsive_control(
         'post_border_radius',
             [
                 'label' => esc_html__( 'Post Border Radius', 'newseqo' ),
                 'type' => Controls_Manager::DIMENSIONS,
                 'size_units' => [ 'px','%'],
                 'selectors' => [
                     '{{WRAPPER}} .post-block-style .post-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                 ],
             ]
         );

    $this->end_controls_section();
	}

	protected function render( ) {

      $settings           = $this->get_settings();
      $post_order         = $settings['post_order'];
      $post_sortby        = $settings['post_sortby'];
      $show_cat           = $settings['show_cat'];
      $show_date          = $settings['show_date'];
      $post_format        = $settings['post_format'];
      $post_title_crop    = $settings['post_title_crop'];
      $newseqo_post_content_crop  = $settings['post_content_crop'];
      $post_number        = $settings['post_count'];
      $block_title_text        = $settings['block_title_text'];

      $show_author        = $settings['show_author'];     
      $tabs               = $settings['tabs'];
      $post_count         = count($tabs);
     
	?>

    
      <div class="featured-tab-item">
            <div class="post-block-element featured-tab">
                     <h3 class="block-title title-border">
                           
                           <span class="title-bg">
                           <?php echo esc_html($block_title_text); ?>
                           </span>   
                     </h3>
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        
                        foreach ( $tabs as $tab_key=>$value ) {
                                   
                              if( $tab_key == 0 ){
                                    echo '<li class="nav-item"><a class="nav-link active" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><h3 class="tab-head"><span class="tab-text-title">'.$value['tab_title'].'</span></h3></a></li>';
                              } else {
                                    echo '<li class="nav-item"><a class="nav-link" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><h3 class="tab-head"><span class="tab-text-title">'.$value['tab_title'].'</span></h3></a></li>';
                              }
                            
                            }
                        ?>
                    </ul>

                    <div class="tab-content">

                     <?php
                     
                     foreach ($tabs as $content_key=>$value) {
                      
                        if( $content_key == 0){
                           echo '<div role="tabpanel" class="tab-pane fade active show" id="'.$this->get_id().$value['_id'].'">';
                        } else {
                           echo '<div role="tabpanel" class="tab-pane fade" id="'.$this->get_id().$value['_id'].'">';
                        }
                        
                        $arg = array(
                           'post_type'   =>  'post',
                           'post_status' => 'publish',
                           'posts_per_page' => $post_number,
                           'order' => $post_order,
                           'orderby' => 'publish_date',
                           'category__in' => $value['post_cats'],
                        );

                        if($post_sortby=='popularposts'){
                         
                           $arg['meta_key'] = 'newseqo_post_views_count';
                           $arg['orderby'] = 'meta_value_num';
                        }

                        if($post_sortby=='mostdiscussed'){
                           $arg['orderby'] = 'comment_count';
                        }
                        
                       if(in_array('video',$post_format) && !in_array('standard',$post_format)) {

                           $arg['tax_query'] = array(
                                    array(
                                    'taxonomy' => 'post_format',
                                    'field' => 'slug',
                                    'terms' => array('post-format-video'),
                                    'operator' => 'IN'
                                 ) 
                             );

                       } 
                       
                   
                     $queryd = new \WP_Query( $arg );
                     ?>


                     <?php if ( $queryd->have_posts() ) : ?>
                        <div class="block-tab-item">
                              <div class="row">
                                 <?php while ($queryd->have_posts()) : $queryd->the_post();?>
                                    <?php if ( $queryd->current_post == 0 ): ?>
                                       <div class="col-md-6 col-sm-6">
                                             <div class="post-block-style big-block">
                                                <?php if (  (has_post_thumbnail())  ) { 
                                                 
                                                   ?>
                                                     
                                                   <div class="post-thumb ts-resize">
                                                         <?php if(get_post_format()=='video'): ?>
                                                         <?php $video = newseqo_meta_option($queryd->posts[0]->ID,'featured_video','#');  
                                                        
                                                         ?>
                                                               <div class="post-video-content">
                                                                  <a href="<?php echo esc_url($video); ?>" class="ts-play-btn">
                                                                     <i class="fa fa-play" aria-hidden="true"></i>
                                                                  </a>
                                                               </div> 
                                                         <?php endif; ?> 
                                                  
                                                         <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full'); ?></a>
                                                   </div>
                                                <?php } else { ?>
                                                   <div class="post-thumb block6img-blank"></div>
                                                <?php } ?>
                                                <div class="post-content">
                                                     <?php if($show_cat == 'yes'):  ?> 
                                                        <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>
                                                        
                                                     <?php  endif; ?>
                                                         <h4 class="post-title md"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo wp_trim_words( get_the_title() ,$post_title_crop,''); ?></a></h4>
                                               
                                                   <div class="post-meta">
                                                         <?php if( $show_author == 'yes') { ?>
                                                            <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                                                               <span class="post-author">
                                                             <i class="fa fa-user"></i>  
                                                               <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                                                            <?php } else { ?>
                                                                
                                                               <span class="post-author">  <i class="fa fa-user"></i> 
                                                               <?php the_author_posts_link() ?>
                                                            </span>
                                                            <?php }?>
                                                         <?php } ?>
                                                         <?php if($show_date == 'yes') { ?>
                                                            <span class="post-date">
                                                            <i class="fa fa-clock-o"></i>
                                                            <?php echo get_the_date(); ?>
                                                         </span>
                                                         <?php } ?>
                                                   </div>
                                                   <p><?php echo esc_html( wp_trim_words(get_the_excerpt(),$newseqo_post_content_crop,'') );?></p>
                                                  
                                                </div><!-- Post content end -->
                                             </div><!-- Post Block style end -->
                                       </div><!-- Col end -->
                                    <?php else: ?>
                                       <?php if ( $queryd->current_post == 1 ): ?>
                                          <div class="col-md-6 col-sm-6 second">
                                             <div class="post-block-list">
                                                <ul class="list-post">
                                       <?php endif; ?>    
                                                <li>
                                                      <div class="post-block-style post-float media">
                                                         <div class="post-thumb d-flex">
                                                            <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                                                         </div>
                                                         <div class="post-content media-body">
                                                                 <?php if($show_cat == 'yes'):  ?> 
                                                                         <?php require NEWSEQO_THEME_DIR . '/template-parts/blog/category/parts/cat-style.php'; ?>
                                                                  <?php  endif; ?>
                                                          
                                                                  <h4 class="post-title title-small"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,$post_title_crop,'') );  ?></a></h4>
                                                          
                                                            <?php if($show_date == 'yes') { ?>
                                                                  <div class="post-meta">
                                                                     <span class="post-date"> <i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date() ); ?></span>
                                                                  </div>
                                                                
                                                            <?php } ?>
                                                         </div><!-- Post content end -->
                                                      </div><!-- Post block style end -->
                                                </li><!-- Li 4 end -->
                                       <?php if (($queryd->current_post + 1) == ($queryd->post_count)) {?>
                                             </ul><!-- List post end -->
                                          </div><!-- List post block end -->
                                       </div><!-- List post Col end -->
                                       <?php } ?> 
                                    <?php endif ?>

                                    <?php 
                                    endwhile; ?>
                              </div><!-- Tab pane Row 1 end -->
                           </div><!-- block-item6 -->
                        <?php wp_reset_postdata(); ?>
                     <?php endif; ?>
                     </div><!-- Tab pane 1 end -->
                     <?php } ?>
                </div><!-- Tab content-->
          </div><!--/.post-block6-element-->
      </div><!--/.post-block6-warp-->

	<?php }
   protected function content_template() { 

   }
   public function post_category() {

      $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
            'posts_per_page' => -1, 
      ) );

      $cat_list = [];
      foreach($terms as $post) {
      $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
   }
}

