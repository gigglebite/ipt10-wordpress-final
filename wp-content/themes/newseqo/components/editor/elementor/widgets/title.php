<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;


class Newseqo_Title_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'newseqo-title';
    }

    public function get_title() {
        return esc_html__( 'Title', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'newseqo-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Title settings', 'newseqo'),
            ]
        );
      
        
      $this->add_control(
        'title_style', [
        'label' => esc_html__('Choose title Style', 'newseqo'),
        'type' => Custom_Controls_Manager::SELECT,
        'default' => 'style1',
           'options' => [
              'style1' => esc_html__( 'Style 1', 'newseqo' ),
              'style2' => esc_html__( 'Style 2', 'newseqo' ),
              'style3' => esc_html__( 'Style 3', 'newseqo' ),
              'style4' => esc_html__( 'Style 4', 'newseqo' ),
              'style5' => esc_html__( 'Style 5', 'newseqo' ),
           ],
        ]
     );

     
     $this->add_control(
        'title', [
            'label'			  => esc_html__( 'Heading text', 'newseqo' ),
            'type'			  => Controls_Manager::TEXT,
            'label_block'	  => true,
            'placeholder'    => esc_html__( 'Heading text', 'newseqo' ),
            'default'	     => esc_html__( ' Life Style ', 'newseqo' ),
         ]
    );
    
     $this->add_control(
           'section_icon',
           [
               'label' => esc_html__('Section Icon', 'newseqo'),
               'type' => \Elementor\Controls_Manager::ICONS,
               'default' => [
                   'value' => 'fas fa-star',
                   'library' => 'solid',
           ],
           'condition' => [ 'title_style' => ['style2']], 
           ]
       );
     

     $this->add_responsive_control(
        'section_border_width',
        [
           'label' => esc_html__('Border Width', 'newseqo'),
           'type' => Controls_Manager::SLIDER,
           'size_units' => [ 'px', '%' ],
           'range' => [
              'px' => [
                 'min' => 0,
                 'max' => 1000,
                 'step' => 5,
              ],
              '%' => [
                 'min' => 0,
                 'max' => 100,
              ],
           ],
           'selectors' => [
              '{{WRAPPER}} .section-title.style2::after' => 'width: {{SIZE}}{{UNIT}};',
              '{{WRAPPER}} .style4 .block-title.title-border .title-bg:before' => 'width: {{SIZE}}{{UNIT}};',
              '{{WRAPPER}} .style5 .block-title.title-border .title-bg:before' => 'width: {{SIZE}}{{UNIT}};',
           ],
           'condition' => [ 'title_style' => ['style2','style4', 'style5']], 
        ]
     );

      $this->add_control(
        'heading_type',
        [
            'label' => __( 'Heading type', 'newseqo' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'h2',
            'options' => [
                'h1'  => __( 'H1', 'newseqo' ),
                'h2' => __( 'H2', 'newseqo' ),
                'h3' => __( 'H3', 'newseqo' ),
                'h4' => __( 'H4', 'newseqo' ),
                'h5' => __( 'H5', 'newseqo' ),
                'h6' => __( 'H6', 'newseqo' ),
                'p' => __( 'P', 'newseqo' ),
            ],
        ]
    );

     
        
        $this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'newseqo' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'left'		 => [
                    'title'	 => esc_html__( 'Left', 'newseqo' ),
                    'icon'	 => 'fa fa-align-left',
                ],
                'center'	     => [
                    'title'	 => esc_html__( 'Center', 'newseqo' ),
                    'icon'	 => 'fa fa-align-center',
                ],
				'right'		 => [
                    'title'	 => esc_html__( 'Right', 'newseqo' ),
                    'icon'	 => 'fa fa-align-right',
                ],
				'justify'	 => [
                    'title'	 => esc_html__( 'Justified', 'newseqo' ),
                    'icon'	 => 'fa fa-align-justify',
                  ],
				],
            'default'		 => 'left',
                'selectors' => [
                     '{{WRAPPER}}  .section-heading .block-title' => 'text-align: {{VALUE}};',
                     '{{WRAPPER}}  .section-title' => 'text-align: {{VALUE}};',

				],
			]
        );//Responsive control end
        $this->add_control(
			'show_title_left_border',
			[
				'label' => __( 'Show Title Left Border', 'newseqo' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'newseqo' ),
				'label_off' => __( 'Hide', 'newseqo' ),
				'return_value' => 'yes',
                'default' => 'yes',
			]
        );
  

        $this->end_controls_section();

       
        
        //Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'newseqo' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );
     
      $this->add_control(
         'title_bg_color', [
 
             'label'		 => esc_html__( 'Title Background', 'newseqo' ),
             'type'		 => Controls_Manager::COLOR,
             'selectors'	 => [
                '{{WRAPPER}} .block-title > span.title-bg,
                {{WRAPPER}}  .block-title > span.title-bg:before ' => 'background-color: {{VALUE}};',
                '{{WRAPPER}} .section-title.style2 .block-title' => 'background: {{VALUE}};',
                '{{WRAPPER}} .block-title > span.title-bg:after' => 'border-top-color: {{VALUE}};',
             ],
         ]
 
      );

    $this->add_control(
        'section_icon_background',
        [
            'label' => esc_html__('Icon Background', 'newseqo'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}}  .section-title .title-icon' => 'background: {{VALUE}};',
            ],
            'condition' => [ 'title_style' => ['style2']], 
        ]
    );

    $this->add_control(
        'title_border_color', [

            'label'		 => esc_html__( 'Title border style color', 'newseqo' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
               '{{WRAPPER}} .block-title.title-border' => 'border-bottom: 2px solid {{VALUE}};',
               '{{WRAPPER}} .heading-style2 .block-title.title-border:before' => 'background-color: {{VALUE}};',
               '{{WRAPPER}} .section-title.style2::after' => 'background: {{VALUE}};',
            ],
        ]

      );

    $this->add_control(
        'title_focus_border_color', [

            'label'		 => esc_html__( 'Title Focus border style color', 'newseqo' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
               '{{WRAPPER}} .style4 .block-title.title-border .title-bg:before' => 'background: {{VALUE}};',
               '{{WRAPPER}} .style5 .block-title.title-border .title-bg:before' => 'background: {{VALUE}};',
            ],
        ]

      );
   
      $this->add_responsive_control(
            'title_border_height',
            [
                'label' =>esc_html__( 'Border Height', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 2,
                    'unit' => 'px',
                ],
                'selectors' => [
                    '{{WRAPPER}} .heading-style2 .block-title.title-border:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .block-title.title-border' => 'border-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .section-title.style2::after' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .style4 .block-title.title-border .title-bg:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .style5 .block-title.title-border .title-bg:before' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [ 'title_style' => ['style1','style2','style4', 'style5']], 
            
            ]
    );

           
    $this->add_control(
        'title_color', [
            'label'		 => esc_html__( 'Title color', 'newseqo' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
                '{{WRAPPER}}  .section-heading .block-title' => 'color: {{VALUE}};',
                '{{WRAPPER}}  .section-title .block-title' => 'color: {{VALUE}};',
                '{{WRAPPER}}  .style4 .block-title.title-border .title-bg' => 'color: {{VALUE}};',
                '{{WRAPPER}}  .style5 .block-title.title-border .title-bg' => 'color: {{VALUE}};',
            ],
        ]
    );



        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'newseqo' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .section-heading .block-title,{{WRAPPER}} .block-title',
			]
        );
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Title Text Padding', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
				'selectors' => [
					'{{WRAPPER}} .block-title.title-border .title-bg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
				'selectors' => [
                    '{{WRAPPER}} .block-title.title-border' => 'Margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        
        $this->end_controls_section();

    } //Register control end

    protected function render( ) { 

		$settings = $this->get_settings();
		$title    = $settings['title'];
		$heading_type    = $settings['heading_type'];
		$show_title_left_border    = $settings['show_title_left_border'];
        $title_style            = $settings['title_style'];

      $title_1  = str_replace(['{', '}'], ['<span>', '</span>'], $title); 
      
    ?>
         <?php if($title_style=='style1'): ?>
            <div class="section-heading section-title">
            <<?php echo esc_attr($heading_type); ?> class="block-title title-border <?php echo esc_attr(($show_title_left_border== 'yes')? '': 'no-left-border'); ?>">
                  
                  <span class="title-bg">
                    <?php echo esc_html($title); ?>
                  </span>   
                

            </<?php echo esc_attr($heading_type); ?>>
         </div><!-- Section title -->	
         <?php endif; ?>
         <?php if($title_style=='style2'): ?>
               <div class="section-title style2">
               <<?php echo esc_attr($heading_type); ?> class="block-title">
                     <span class="title-content">
                        <span class="title-icon">
                           <?php \Elementor\Icons_Manager::render_icon( $settings['section_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </span>
                        <span class="title">
                            <?php echo esc_html($title); ?>
                        </span> 
                     </span>  
                  </<?php echo esc_attr($heading_type); ?>>
               </div>
            <?php endif; ?>
         <?php if($title_style=='style3'): ?>
            <div class="section-heading section-title style3">
                <<?php echo esc_attr($heading_type); ?> class="block-title title-border <?php echo esc_attr(($show_title_left_border== 'yes')? '': 'no-left-border'); ?>">
                  
                  <span class="title-bg">
                    <?php echo esc_html($title); ?>
                  </span>   
                

                </<?php echo esc_attr($heading_type); ?>>
            </div><!-- Section title -->	
            <?php endif; ?>

         <?php if($title_style=='style4'): ?>
            <div class="section-heading section-title style4">
                <<?php echo esc_attr($heading_type); ?> class="block-title title-border <?php echo esc_attr(($show_title_left_border== 'yes')? '': 'no-left-border'); ?>">
                    
                    <span class="title-bg">
                        <?php echo esc_html($title); ?>
                    </span>   
                    

                </<?php echo esc_attr($heading_type); ?>>
            </div><!-- Section title -->	
        <?php endif; ?>

         <?php if($title_style=='style5'): ?>
            <div class="section-heading section-title style5">
                <<?php echo esc_attr($heading_type); ?> class="block-title title-border <?php echo esc_attr(($show_title_left_border== 'yes')? '': 'no-left-border'); ?>">
                    
                    <span class="title-bg">
                        <?php echo esc_html($title); ?>
                    </span>   
                    

                </<?php echo esc_attr($heading_type); ?>>
            </div><!-- Section title -->	
        <?php endif; ?>
    <?php  

    }
    
    protected function content_template() { }
}