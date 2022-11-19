<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Main_Slider_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newseqo-main-slider';
    }

    public function get_title() {
        return esc_html__( 'Post Main Slider', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-nav-menu';
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
          'post_count',
          [
            'label'         => esc_html__( 'Post count', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '5',
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
         'post_content_crop',
         [
           'label'         => esc_html__( 'Post content crop', 'newseqo' ),
           'type'          => Controls_Manager::NUMBER,
           'default'       => '10',
           'condition' => [ 'show_desc' => ['yes'] ]
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
            'show_count',
            [
                'label' => esc_html__('Show Count', 'newseqo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'newseqo'),
                'label_off' => esc_html__('No', 'newseqo'),
                'default' => 'no',
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
					'size' => 480,
				],
				'selectors' => [
                    '{{WRAPPER}} .main-slider .ts-overlay-style.item' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
      );

      $this->add_responsive_control(
        'content_align', [
            'label'          => esc_html__( 'Content Alignment', 'newseqo'  ),
            'type'           => Controls_Manager::CHOOSE,
            'options'        => [

                'left'         => [
                    'title'    => esc_html__( 'Left', 'newseqo'  ),
                    'icon'     => 'fas fa-align-left',
                ],
                'center'     => [
                    'title'    => esc_html__( 'Center', 'newseqo'  ),
                    'icon'     => 'fas fa-align-center',
                ],
                'right'         => [
                    'title'     => esc_html__( 'Right', 'newseqo'  ),
                    'icon'     => 'fas fa-align-right',
                ],
            ],
           'default'         => '',
           'selectors' => [
               '{{WRAPPER}} .post-content' => 'text-align: {{VALUE}};'
           ],
        ]
    );

    $this->add_control(
        'meta_position', [
            'label' => esc_html__('Meta Position', 'newseqo'),
            'type' => Custom_Controls_Manager::SELECT,
            'default' => 'upper_title',
            'options' => [
                 'under_title' => esc_html__( 'After Title', 'newseqo' ),
                 'upper_title' => esc_html__( 'Before Title', 'newseqo' ),
            ],
        ]
    );

    $this->add_control(
        'show_read_time',
        [
            'label' => esc_html__('Show Read Time', 'newseqo'),
            'type' => Controls_Manager::SWITCHER,
            'label_on' => esc_html__('Yes', 'newseqo'),
            'label_off' => esc_html__('No', 'newseqo'),
            'default' => 'no',
        ]
    );
 

        $this->end_controls_section();

        // Start of slider section
        $this->start_controls_section(
            'section_controls',
            [
                'label' => esc_html__( 'Slider Controls', 'newseqo' ),
            ]
        );

        $this->add_control(
            'slider_autoplay',
            [
                'label' => esc_html__( 'Autoplay', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'newseqo' ),
                'label_off' => esc_html__( 'No', 'newseqo' ),
                'return_value' => 'yes',
                'default' => 'yes'
            ]
        );
    
         
         $this->add_control(
            'slider_dot_nav_show',
            [
                 'label' => esc_html__( 'Dot nav', 'newseqo' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => esc_html__( 'Yes', 'newseqo' ),
                 'label_off' => esc_html__( 'No', 'newseqo' ),
                 'return_value' => 'yes',
                 'default' => 'no'
            ]
         );

         $this->add_responsive_control(
            'dots_align', [
                'label'          => esc_html__( 'Dot Alignment', 'newseqo'  ),
                'type'           => Controls_Manager::CHOOSE,
                'condition' => [ 'slider_dot_nav_show' => ['yes']],
                'options'        => [
    
                    'left'         => [
                        'title'    => esc_html__( 'Left', 'newseqo'  ),
                        'icon'     => 'fas fa-align-left',
                    ],
                    'right'         => [
                        'title'     => esc_html__( 'Right', 'newseqo'  ),
                        'icon'     => 'fas fa-align-right',
                    ],
                ],
               'default'         => '',
               'selectors' => [
                   '{{WRAPPER}} .main-slider .owl-dots' => 'text-align: {{VALUE}};'
               ],
            ]
        );
   
         $this->add_control(
            'slider_nav_show',
            [
                 'label' => esc_html__( 'Nav Show', 'newseqo' ),
                 'type' => \Elementor\Controls_Manager::SWITCHER,
                 'label_on' => esc_html__( 'Yes', 'newseqo' ),
                 'label_off' => esc_html__( 'No', 'newseqo' ),
                 'return_value' => 'yes',
                 'default' => 'yes'
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
              'label' => esc_html__('Title color', 'newseqo'),
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
  
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'post_title_typography',
              'label' => esc_html__( 'Typography', 'newseqo' ),
              'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} .main-slider .post-content .post-title',
           ]
        );

        $this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Title margin', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
				'selectors' => [
					'{{WRAPPER}} .main-slider .post-content .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
  
        
        $this->add_control(
           'desc_color',
           [
              'label' => esc_html__('Description color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
              'condition' => [ 'show_desc' => ['yes'] ],
              'selectors' => [
                 '{{WRAPPER}} .main-slider .post-content p' => 'color: {{VALUE}};',
               
              ],
           ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
               'name' => 'post_meta_typography',
               'label' => esc_html__( 'Meta Typography', 'newseqo' ),
               'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
               'selector' => '{{WRAPPER}} .main-slider .post-meta-info li',
            ]
         );

        $this->add_control(
           'block_meta_date_color',
           [
              'label' => esc_html__('meta color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
            
              'selectors' => [
                 '{{WRAPPER}} .post-content .post-meta-info li' => 'color: {{VALUE}};',
                 '{{WRAPPER}} .post-content .post-meta-info li a' => 'color: {{VALUE}};',
                 '{{WRAPPER}} .ts-overlay-style .post-meta-info li.active i' => 'color: {{VALUE}};',
               
              ],
           ]
        );

        $this->add_responsive_control(
            'block_meta_date_margin',
            [
                'label' => esc_html__( 'Margin', 'newseqo' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .post-content .post-meta-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ts-overlay-style.item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ts-overlay-style::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        
  
        $this->end_controls_section();

        $this->start_controls_section(
			'section_slider_con_style', [
				'label'	 => esc_html__( 'Slider Control', 'newseqo' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'slider_con_heading_nav',
			[
				'label' => esc_html__( 'Nav', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->start_controls_tabs('slider_con_tab_style');

        $this->start_controls_tab(
            'slider_con_tab_style_normal',
            [
              'label' => esc_html__('Normal', 'newseqo'),
            ]
        );

        $this->add_control(
            'post_slider_con_color',
            [
               'label' => esc_html__('Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-nav i' => 'color: {{VALUE}};',
               ],
            ]
        );

        $this->add_control(
            'post_slider_con_bg',
            [
               'label' => esc_html__('BG Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .owl-carousel .owl-nav .owl-next, {{WRAPPER}} .owl-carousel .owl-nav .owl-prev' => 'background-color: {{VALUE}};',
               ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_con_tab_style_hover',
            [
              'label' => esc_html__('Hover', 'newseqo'),
            ]
        );

        $this->add_control(
            'post_slider_con_color_hover',
            [
               'label' => esc_html__('Hover Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-nav .owl-prev:hover i, {{WRAPPER}} .main-slider .owl-nav .owl-next:hover i' => 'color: {{VALUE}};',
               ],
            ]
        );

        $this->add_control(
            'post_slider_con_bg_hover',
            [
               'label' => esc_html__('BG Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-prev:hover, {{WRAPPER}} .main-slider .owl-next:hover' => 'background-color: {{VALUE}};',
               ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

         $this->add_responsive_control(
            'slider_con_margin',
            [
                'label' => esc_html__( 'Margin', 'newseqo' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .main-slider .owl-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );


        $this->add_control(
			'slider_con_heading_dots',
			[
				'label' => esc_html__( 'Dots', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->start_controls_tabs('slider_con_tab_style_dots');

        $this->start_controls_tab(
            'slider_con_tab_style_normal_dots',
            [
              'label' => esc_html__('Normal', 'newseqo'),
            ]
        );

        $this->add_control(
            'post_slider_con_color_dots',
            [
               'label' => esc_html__('Border Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-dots .owl-dot span' => 'border-color: {{VALUE}};',
               ],
            ]
        );

        $this->add_control(
            'post_slider_con_color_dots_bg',
            [
               'label' => esc_html__('BG Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-dots .owl-dot span' => 'background-color: {{VALUE}};',
               ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_con_tab_style_hover_dots',
            [
              'label' => esc_html__('Hover', 'newseqo'),
            ]
        );

        $this->add_control(
            'post_slider_con_color_hover_dots',
            [
               'label' => esc_html__('Hover Border Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-dots .owl-dot.active span, {{WRAPPER}} .main-slider .owl-dots .owl-dot:hover span' => 'border-color: {{VALUE}};',
               ],
            ]
        );

        $this->add_control(
            'post_slider_con_color_hover_dots_bg',
            [
               'label' => esc_html__('Hover BG Color', 'newseqo'),
               'type' => Controls_Manager::COLOR,
               'default' => '',
               'selectors' => [
                  '{{WRAPPER}} .main-slider .owl-dots .owl-dot.active span, {{WRAPPER}} .main-slider .owl-dots .owl-dot:hover span' => 'background-color: {{VALUE}};',
               ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

         $this->add_responsive_control(
            'slider_con_margin_dots',
            [
                'label' => esc_html__( 'Margin', 'newseqo' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .main-slider .owl-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
        );  
        
        $this->add_control(
            'show_radius',
            [
                'label' => esc_html__('Show Radius', 'newseqo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'newseqo'),
                'label_off' => esc_html__('No', 'newseqo'),
                'default' => 'no',
            ]
        );

        $this->add_responsive_control(
            'advanced_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'newseqo' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
                'selectors' => [
                    '{{WRAPPER}} .radius.main-slider .ts-overlay-style.item,
                    {{WRAPPER}} .radius.main-slider .ts-overlay-style.item:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [ 'show_radius' => ['yes']],
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $post_order         = $settings['post_order'];
        $post_sortby        = $settings['post_sortby'];
        $post_format        = $settings['post_format'];
        $post_title_crop    = $settings['post_title_crop'];
        $newseqo_post_content_crop  = $settings['post_content_crop'];
        $post_number        = $settings['post_count'];
        $show_count         = $settings['show_count'];
        $meta_position         = $settings['meta_position'];
        $show_read_time = $settings['show_read_time'];


        
        $newseqo_blog_author_show   = (isset($settings['show_author'])) 
						            ? $settings['show_author'] 
						            : newseqo_option( 'blog_author_show', '__true' );

        $newseqo_blog_date_show	    = (isset($settings['show_date'])) 
                                    ? $settings['show_date'] 
                                    : newseqo_option( 'blog_date_show', '__true' );

        $newseqo_blog_cat_show	    = (isset($settings['show_cat'])) 
                                    ? $settings['show_cat'] 
                                    : newseqo_option( 'blog_cat_show', '__true' );

        $newseqo_crop			= (isset($settings['post_title_crop']))
                                ? $settings['post_title_crop']
                                : 20;    
   
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
            'category__in' => $settings['post_cats'],

        ];   
        
        $show_radius = $settings['show_radius'];

        if($show_radius == 'yes'){
            $radius = 'radius';
        }else{
            $radius = 'no-radius';
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

        switch($settings['post_sortby']){
         case 'popularposts':
             $arg['meta_key'] = 'newseqo_post_views_count';
             $arg['orderby'] = 'meta_value_num';
         break;
         case 'mostdiscussed':
             $arg['orderby'] = 'comment_count';
         break;
         default:
             $arg['orderby'] = 'date';
         break;
     }

     $slide_controls    = [        
        'dot_nav_show'=>$settings['slider_dot_nav_show'], 
        'nav_show'=>$settings['slider_nav_show'], 
        'auto_nav_slide'=>$settings['slider_autoplay']  
    ];
  
    $slide_controls = \json_encode($slide_controls); 

        $query = new \WP_Query( $arg ); ?>
        
         <?php if ( $query->have_posts() ) : ?>
                  <div class="main-slider owl-carousel <?php echo esc_attr($radius); ?>" data-controls="<?php echo esc_attr($slide_controls); ?> ">
                     <?php while ($query->have_posts()) : $query->the_post();?>
                     <div class="item ts-overlay-style" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>)">
                        <a href="<?php the_permalink(); ?>" class="img-link"></a>                            
                            <div class="post-content">
                                <div class="grid-category">
                                <?php if($newseqo_blog_cat_show == 'yes'): ?>                                
                                    <?php get_template_part('template-parts/blog/category/parts/cat', 'style');  ?>                                        
                                <?php endif; ?>
                                </div>
                                <?php
                                if($show_read_time == 'yes'){
                                    if (function_exists('newseqo_content_estimated_reading_time')) {
                                        echo newseqo_content_estimated_reading_time(get_the_content());
                                    }
                                }
                                ?>
                                <?php if($meta_position == 'upper_title'){?>
                                <ul class="post-meta-info">
                                    <?php if($newseqo_blog_author_show == 'yes'): ?>
                                        <li class="author">
                                        <i class="fa fa-user"></i>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($newseqo_blog_date_show == 'yes'): ?>
                                        <li>
                                            <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(function_exists('newseqo_get_postview')){ ?>
                                        <?php if($show_count == 'yes'){?>
                                            <li><i class="fa fa-fire"></i> <?php echo newseqo_get_postview(get_the_ID()); ?></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                                <?php }?>
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>">
                                    <?php echo esc_html(wp_trim_words(get_the_title(), $newseqo_crop,'')); ?>
                                    </a>
                                </h3>
                                <?php if($meta_position == 'under_title'){?>
                                <ul class="post-meta-info">
                                    <?php if($newseqo_blog_author_show == 'yes'): ?>
                                        <li class="author">
                                        <i class="fa fa-user"></i>
                                            <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if($newseqo_blog_date_show == 'yes'): ?>
                                        <li>
                                            <i class="fa fa-clock-o"></i><?php echo get_the_date(); ?>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(function_exists('newseqo_get_postview')){ ?>
                                        <?php if($show_count == 'yes'){?>
                                            <li><i class="fa fa-fire"></i> <?php echo newseqo_get_postview(get_the_ID()); ?></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                                <?php }?>
                            </div>                                
                        </div>
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
      ) );

      $cat_list = [];
      foreach($terms as $post) {
      $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
   }
}