<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Post_Grid_Block_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newseqo-post-grid-block';
    }

    public function get_title() {
        return esc_html__( 'Posts Grid Block', 'newseqo' );
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
            'style',
            [
                'label'     =>esc_html__( 'Style', 'newseqo' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'style1',
                'options'   => [
                        'style1'      =>esc_html__( 'Style 1', 'newseqo' ),
                        'style2'    =>esc_html__( 'Style 2', 'newseqo' ),
                    ],
            ]
        );   

     $this->add_control(
      'post_title_crop',
      [
        'label'         => esc_html__( 'Post Title limit', 'newseqo' ),
        'type'          => Controls_Manager::NUMBER,
        'default' => '35',
       
      ]
    );
    
    $this->add_control(
        'post_content_crop',
        [
          'label'         => esc_html__( 'Post content crop', 'newseqo' ),
          'type'          => Controls_Manager::NUMBER,
          'default'       => '20',
          'condition' => [ 'style' => ['style1'] ],
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
				'label' =>esc_html__( 'Thumbnail Height', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
                ],
                'condition' => [ 'style' => ['style2'] ],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 430,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .featured-post .item' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
              
			]
      );

        
      $this->add_responsive_control(
			'grid_margin',
			[
				'label' =>esc_html__( 'Post margin', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .grid-item .ts-overlay-style.post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
              'selector' => '{{WRAPPER}} .post-content .post-title',
           ]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'Title Margin', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .post-content .post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                            '{{WRAPPER}} .ts-overlay-style.item, ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .ts-overlay-style::before ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            '{{WRAPPER}} .ts-overlay-style.item, {{WRAPPER}} .post-thumb-bg .post-thumb .sm-bg-img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            
                        ],
                    ]
                );
  
        $this->end_controls_section();        
      
    }

    protected function render( ) { 
        $settings = $this->get_settings();                        

        $style                      = $settings['style'];
        $post_title_crop            = $settings['post_title_crop'];
        $newseqo_post_content_crop  = $settings['post_content_crop'];
        $show_cat                   = $settings['show_cat'];
        $show_author                = $settings['show_author'];
        $show_date                  = $settings['show_date'];
      
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
            'orderby' =>'date'
          
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
        $query = new \WP_Query( $arg );
        
        require NEWSEQO_THEME_DIR . '/components/editor/elementor/widgets/style/post-grid-block/'.$style.'.php';
 
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