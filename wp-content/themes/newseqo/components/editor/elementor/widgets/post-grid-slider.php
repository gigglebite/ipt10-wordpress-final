<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Post_Grid_Slider_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newseqo-post-grid-slider';
    }

    public function get_title() {
        return esc_html__( 'Posts Grid Slider', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-posts-grid';
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
         'post_gradient',
             [
             'label' => esc_html__( 'Gradient Color', 'newseqo' ),
             'type' => \Elementor\Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'newseqo' ),
             'label_off' => esc_html__( 'No', 'newseqo' ),
             'return_value' => 'yes',
             'default' => 'yes'
             ]
         );
     
      $this->add_control(
        'post_count',
        [
          'label'         => esc_html__( 'Post count', 'newseqo' ),
          'type'          => Controls_Manager::NUMBER,
          'default'       => '9',

        ]
      );

      $this->add_control(
         'post_count_slider',
         [
           'label'         => esc_html__( 'Slider Post count', 'newseqo' ),
           'type'          => Controls_Manager::NUMBER,
           'default'       => '4',

         ]
       );

     $this->add_control(
      'post_title_crop',
      [
        'label'         => esc_html__( 'Post Title limit', 'newseqo' ),
        'type'          => Controls_Manager::NUMBER,
        'default' => '6',
       
      ]
    );  

    $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Thumbnail Height', 'newseqo' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'default' => [
					'unit' => 'px',
					'size' => 310,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .featured-post .item' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            
			]
      );
     
        $this->add_control(
         'post_cats',
         [
             'label' =>esc_html__('Select Categories', 'newseqo'),
             'type'      => Custom_Controls_Manager::SELECT2,
             'options'   =>$this->post_category(),
             'label_block' => true,
             'multiple'  => true,
            
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
            'slider_dot_show',
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
                'condition' => [ 'slider_dot_show' => ['yes']],
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
                    '{{WRAPPER}} .weekend-top .owl-dots' => 'text-align: {{VALUE}};'
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
                 '{{WRAPPER}} .ts-overlay-style.featured-post .post-content .post-title a' => 'color: {{VALUE}};',
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
                 '{{WRAPPER}} .ts-overlay-style.featured-post .post-content .post-title:hover a' => 'color: {{VALUE}};',
              ],
           ]
        );
  
        $this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'post_title_typography',
              'label' => esc_html__( 'Typography', 'newseqo' ),
              'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} .ts-overlay-style.featured-post .post-content .post-title a',
           ]
        );
  
        
        $this->add_control(
           'block_meta_date_color',
           [
              'label' => esc_html__('Footer content color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
            
              'selectors' => [
                 '{{WRAPPER}} .ts-overlay-style.featured-post .post-content .post-meta-info li a,{{WRAPPER}} .ts-overlay-style.featured-post .post-content .post-meta-info li ' => 'color: {{VALUE}};',
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
                            '{{WRAPPER}} .ts-overlay-style .item, {{WRAPPER}} .ts-overlay-style::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            
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
                    '{{WRAPPER}} .radius.weekend-top .ts-overlay-style .item,
                    {{WRAPPER}} .radius.weekend-top .ts-overlay-style:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [ 'show_radius' => ['yes']],
            ]
        );

  
        $this->end_controls_section();
        
       
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $post_gradient = $settings['post_gradient'];
        $newseqo_blog_author_show = (isset($settings['show_author'])) 
						? $settings['show_author'] 
						: newseqo_option( 'blog_author_show', '__false' );						

        $newseqo_blog_date_show	= (isset($settings['show_date'])) 
                                ? $settings['show_date'] 
                        : newseqo_option( 'blog_date_show', '__true' );

        $newseqo_blog_cat_show	= (isset($settings['show_cat'])) 
                                ? $settings['show_cat'] 
                                : newseqo_option( 'blog_cat_show', '__true' );

        $newseqo_crop		= (isset($settings['post_title_crop']))
                            ? $settings['post_title_crop']
                            : 20;
     
        $slide_controls    = [
        
         'item_count'=>$settings['post_count_slider'],
         'nav_show'=>$settings['slider_nav_show'],
         'dot_nav_show'=>$settings['slider_dot_show'],

       ];

   
     $slide_controls = \json_encode($slide_controls); 
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
          
        ];   

        if(!empty($settings['post_cats'])){
         $arg['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'terms'    => $settings['post_cats'],
                'field' => 'id',
                'include_children' => true,
                'operator' => 'IN'
                 ),
               );
        }

        
       $show_radius = $settings['show_radius'];

       if($show_radius == 'yes'){
           $radius = 'radius';
       }else{
           $radius = 'no-radius';
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


        $query = new \WP_Query( $arg ); ?>      
        
        <?php if ( $query->have_posts() ) : ?>
            <div data-controls="<?php echo esc_attr($slide_controls); ?>" class="weekend-top owl-carousel owl-theme <?php echo esc_attr($radius); ?> <?php echo esc_attr(($post_gradient=='yes') ? 'post-gradient': ''); ?>">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div <?php post_class("ts-overlay-style featured-post"); ?>>
                    <div class="item item-before" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>)">
                        <a class="img-link" href="<?php the_permalink(); ?>"></a>
                        
                        <div class="overlay-post-content">
                            <div class="post-content">
                                <div class="grid-category">
                                <?php if($newseqo_blog_cat_show == 'yes'): ?> 
                                    <?php get_template_part('template-parts/blog/category/parts/cat', 'style');  ?>
                                <?php endif; ?>
                                </div>
                                <h3 class="post-title">
                                <a href="<?php the_permalink(); ?>">
                                <?php echo esc_html(wp_trim_words(get_the_title(), $newseqo_crop,'')); ?>
                                </a>
                                </h3>
                            
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

                                </ul>
                            </div>
                        </div>
                    </div>
                    </div>   
                <?php endwhile; ?>
            </div>
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