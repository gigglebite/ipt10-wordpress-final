<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Post_block_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newseqo-post-block';
    }

    public function get_title() {
        return esc_html__( 'Post Block ', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return [ 'newseqo-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Post', 'newseqo'),
            ]
        );
        $this->add_control(

         'block_style', [
             'label' => esc_html__('Choose Style', 'newseqo'),
             'type' => Custom_Controls_Manager::IMAGECHOOSE,
             'default' => 'style1',

         ]
     ); 

        $this->add_control(
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '5',
          ]
        );

        $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Feature image height', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 120,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
            ],
            'default' => [
					'unit' => 'px',
					'size' => 192,
				],
				'selectors' => [
					'{{WRAPPER}} .post-block-style .post-thumb .item, {{WRAPPER}} .ts-overlay-style' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
      );
      
        $this->add_control(
          'post_title_crop',
          [
            'label'         => esc_html__( 'Post title crop', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
        $this->add_control(
            'show_desc',
               [
                  'label' => esc_html__('Show post description', 'newseqo'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => esc_html__('Yes', 'newseqo'),
                  'label_off' => esc_html__('No', 'newseqo'),
                  'default' => 'yes',
                  'condition' => [ 'block_style' => ['style3', 'style6', 'style5','style8','style9','style10'] ]
               ]
        );


        $this->add_control(
            'post_format',
            [
                'label' =>esc_html__('Select Post Format', 'newseqo'),
                'type'      => Controls_Manager::SELECT2,
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
            'show_rating',
               [
                  'label' => esc_html__('Show Rating', 'newseqo'),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => esc_html__('Yes', 'newseqo'),
                  'label_off' => esc_html__('No', 'newseqo'),
                  'default' => 'no',
                  
               ]
         ); 
    

        $this->add_control(
            'post_cats',
            [
                'label' =>esc_html__('Select Categories', 'newseqo'),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $this->post_category(),
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
             'default' => 'yes',
         ]
       );

       $this->add_control(
        'show_author_avator',
           [
              'label' => esc_html__('Show Author image', 'newseqo'),
              'type' => Controls_Manager::SWITCHER,
              'label_on'  => esc_html__('Yes', 'newseqo'),
              'label_off' => esc_html__('No', 'newseqo'),
              'default' => 'no',
           ]
       );
      
       $this->add_responsive_control(
        'author_avator_custom_dimension',
        [
           'label' =>esc_html__( 'Avatar image size', 'newseqo' ),
               'type' => \Elementor\Controls_Manager::SLIDER,
           'range' => [
              'px' => [
                 'min' => 0,
                 'max' => 100,
              ],
           ],
           'condition' => [ 'show_author_avator' => ['yes'] ],
           'devices' => [ 'desktop', 'tablet', 'mobile' ],
           'desktop_default' => [
              'size' => 45,
              'unit' => 'px',
           ],
           'tablet_default' => [
              'size' => 45,
              'unit' => 'px',
           ],
           'mobile_default' => [
              'size' => 45,
              'unit' => 'px',
           ],
           'default' => [
              'unit' => 'px',
              'size' => 45,
           ],
           'selectors' => [
              '{{WRAPPER}} .ts-author-avatar img' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
             
           ],
        ]
     );

    
     $this->add_control(
            'show_view_count',
            [
               'label' => esc_html__('Show view Count', 'newseqo'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'newseqo'),
               'label_off' => esc_html__('No', 'newseqo'),
               'default' => 'yes',
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
            'small_show_cat',
            [
                'label' => esc_html__('Show small post Category', 'newseqo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'newseqo'),
                'label_off' => esc_html__('No', 'newseqo'),
                'default' => 'yes',
                'condition' => [ 'block_style' => ['style4', 'style3'] ]
            ]
        );
        $this->add_control(
         'post_readmore',
         [
            'label' => esc_html__('Read more', 'newseqo'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__( 'read more', 'newseqo' ),
            'condition' => [ 'block_style' => ['style1','style3','style8','style10','style11'] ]
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
                        'title'       =>esc_html__( 'Title', 'newseqo' ),
                        'name'       =>esc_html__( 'Name', 'newseqo' ),
                        'rand'       =>esc_html__( 'Random', 'newseqo' ),
                        'ID'       =>esc_html__( 'ID', 'newseqo' ),
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

        $this->add_control(
         'ts_offset_enable',
            [
               'label' => esc_html__('Post skip', 'newseqo'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'newseqo'),
               'label_off' => esc_html__('No', 'newseqo'),
               'default' => 'no',
               
            ]
      );
      
      $this->add_control(
         'ts_offset_item_num',
         [
         'label'         => esc_html__( 'Skip post count', 'newseqo' ),
         'type'          => Controls_Manager::NUMBER,
         'default'       => '1',
         'condition' => [ 'ts_offset_enable' => 'yes' ]

         ]
      );

        $this->add_control(
         'reverse_col',
         [
             'label' => esc_html__('Reverse Column', 'newseqo'),
             'type' => Controls_Manager::SWITCHER,
             'label_on' => esc_html__('Yes', 'newseqo'),
             'label_off' => esc_html__('No', 'newseqo'),
             'default' => 'no',
             'condition' => [ 'block_style' => ['style2','style3','style5'] ]
         ]
       );

        $this->end_controls_section();

        $this->start_controls_section('newseqo_style_block_section',
        [
           'label' => esc_html__( ' Post', 'newseqo' ),
           'tab' => Controls_Manager::TAB_STYLE,
        ]
       );
  
       $this->add_control(
           'block_title_color',
           [
              'label' => esc_html__('Feature Title color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
            
              'selectors' => [
                 '{{WRAPPER}} .post-content .post-title a' => 'color: {{VALUE}};',
              ],
           ]
        );
  
        $this->add_control(
           'block_title_hv_color',
           [
              'label' => esc_html__('Title hover color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
            
              'selectors' => [
                 '{{WRAPPER}} .post-content .post-title:hover a' => 'color: {{VALUE}};',
              ],
           ]
        );
        $this->add_control(
            'description_color',
            [
               'label' => esc_html__('Descrition Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
                'condition' => ['block_style' => 'style3','style11'],
               'selectors' => [
                  '{{WRAPPER}} .post-content p' => 'color: {{VALUE}};',
               ],
            ]
         );
        $this->add_control(
			'feature_post_title_head',
			[
				'label' => esc_html__( 'Feature title', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        $this->add_control(
			'post_title_typography_haed',
			[
				'label' => esc_html__( 'Small Title', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
  
        $this->end_controls_section();

        $this->start_controls_section('newseqo_style_advance_section',
        [
           'label' => esc_html__( ' Advance', 'newseqo' ),
           'tab' => Controls_Manager::TAB_STYLE,
        ]
       );

        $this->end_controls_section();
    }

    protected function render( ) { 

        $settings = $this->get_settings();
        $post_order         = $settings['post_order'];
        $post_sortby        = $settings['post_sortby'];
        $show_cat           = $settings['show_cat'];
        $small_show_cat     = $settings['small_show_cat'];
        $show_date          = $settings['show_date'];
        $show_desc          = $settings['show_desc'];
        $post_format        = $settings['post_format'];
        $post_title_crop    = $settings['post_title_crop'];
        $post_number        = $settings['post_count'];
        $readmore           = $settings['post_readmore'];      
        $show_author        = $settings['show_author'];      
        $show_view_count    = $settings['show_view_count'];    
        $show_author_avator = isset($settings['show_author_avator'])?
                                $settings['show_author_avator'] 
                                :'no';   
 

        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
            'category__in' => $settings['post_cats'],
            'suppress_filters' => false,

        ];
        
        if($settings['ts_offset_enable']=='yes'){
         $arg['offset'] = $settings['ts_offset_item_num'];
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

        $query = new \WP_Query( $arg ); ?>
        
         <?php if ( $query->have_posts() ) : ?>
            
<div class="block-item-post style1">
   <?php 
   $ts_image_size	= (isset($settings['ts_image_size']))
                     ? $settings['ts_image_size']
                     : 'full';  
   $show_author_avator = isset($settings['show_author_avator'])?
                         $settings['show_author_avator'] 
                         :'no';
   ?>                     
   <?php while ($query->have_posts()) : $query->the_post();?>
         <?php  $cat = get_the_category(); if ( $query->current_post == 0 ): ?>
         <div class="row">
            <div class="col-md-6 col-sm-6">
                  <div class="post-block-style post-thumb-bg">
                     <?php if (  (has_post_thumbnail())  ) { ?>
                           
                        <div class="post-thumb ts-resize post-thumb-full post-thumb-low-padding">
                              <?php if(get_post_format()=='video'): ?>
                              <?php $video = newseqo_meta_option($query->posts[0]->ID,'featured_video','#');  
                              
                              ?>
                                    <div class="post-video-content">
                                       <a href="<?php echo esc_url($video); ?>" class="ts-play-btn">
                                          <i class="fa fa-play" aria-hidden="true"></i>
                                       </a>
                                    </div> 
                              <?php endif; ?> 
                              <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span class="newseqo-sm-bg-img" style="background-image: url(<?php echo esc_url(newseqo_post_thumbnail(get_the_ID(), null, null, 'newseqo-medium')); ?></span></a>
                        </div>
                     <?php } else { ?>
                        <div class="post-thumb block6img-blank"></div>
                     <?php } ?>
                  
                  </div><!-- Post Block style end -->
            </div><!-- Col end -->
            <div class="col-md-6">
               <div class="post-content feature-contents">
                  <?php if($show_cat == 'yes'): ?> 
                  <?php  endif; ?>
                        
                  <h4 class="post-title md"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_title() ,$post_title_crop,''); ?></a></h4>
               
                  <div class="post-meta <?php echo esc_attr($show_author_avator == 'yes'?'ts-avatar-container':''); ?>">
                  <?php if($show_author_avator=='yes'): ?>
                        <?php printf('<span class="ts-author-avatar">%1$s<a href="%2$s">%3$s</a></span>',
                              get_avatar( get_the_author_meta( 'ID' ), 45 ), 
                              esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
                              get_the_author()
                           ); ?>
                        <?php endif; ?>  
                        <?php if( $show_author == 'yes') { ?>
                           <?php if ( get_the_author_meta('first_name') != "" || get_the_author_meta('last_name') != "" ) { ?>
                              <span class="post-author"><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('first_name');?> <?php echo get_the_author_meta('last_name');?></a></span>
                           <?php } else { ?>
                              <span class="post-author"> <i class="fa fa-user"></i> <?php the_author_posts_link() ?></span>
                           <?php }?>
                        <?php } ?>
                        <?php if($show_date == 'yes') { ?>
                           <span class="post-date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(get_option('date_format')); ?></span>
                        <?php } ?>
                        <?php if($show_view_count == 'yes'){ ?>
                           <span class="post-view">
                           <i class="xts-icon xts-eye"></i>
                           </span>   
                        <?php } ?>
                        
                  </div>
                  <?php if($readmore != '') { ?>
                     <a class="post-readmore" href="<?php echo esc_url( get_permalink()); ?>" > <?php echo esc_html($readmore); ?> <i class="xts-icon xts-right-arrow"></i> </a>
                  <?php } ?>
                  
               </div><!-- Post content end -->
            </div>   
         </div><!-- row end -->
         <?php else: ?>
            <?php if (($query->current_post + 1) == ($query->post_count)) {?>
                  
            </div><!-- List post Col end -->
            <?php } ?> 
         <?php endif ?>
   <?php endwhile; ?>
                        
 </div><!-- block-item6 -->
             <?php wp_reset_postdata(); ?>
         <?php endif; ?>

      <?php  
    }
    protected function content_template() { }

    public function post_category() {

        $terms = get_terms( array(
                'taxonomy'    => 'category',
                'hide_empty'  => false,
                'posts_per_page' => -1, 
            ) 
        );

      $cat_list = [];
      foreach($terms as $post) {
      $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
   }
}