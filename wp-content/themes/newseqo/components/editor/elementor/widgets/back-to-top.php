<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Newseqo_BackToTop_Widget extends Widget_Base {


  public $base;

    public function get_name() {
        return 'newseqo-back-to-top';
    }

    public function get_title() {
        return esc_html__( 'newseqo back to top', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-spacer';
    }

    public function get_categories() {
        return [ 'newseqo-elements' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('back to top settings', 'newseqo'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'button_style',
			[
				'label' => esc_html__( 'Back to Style', 'newseqo'),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => esc_html__( 'Style 1', 'newseqo'),
					'style2'  => esc_html__( 'Style 2', 'newseqo'),
                ],
                
			]
		);
	
        $this->add_control(
			'backto_button_icon',
			[
				'label' => esc_html__('Select Icon', 'newseqo'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-up',
					'library' => 'solid',
                ],
			]
        );
        
        $this->add_control(
            'backto_button_bg',
            [
                'label' => esc_html__('Scroll bg color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .BackTo' => 'background-color: {{VALUE}};',
                ],
            ]
		);
		
        $this->add_control(
            'backto_button_hov_bg',
            [
                'label' => esc_html__('Scroll Hover bg color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .BackTo:hover, .ts-scroll-box .BackTo-2:hover a i' => 'background-color: {{VALUE}};',
                ],
            ]
		);
		
        $this->add_control(
            'back_to_button_text_color',
            [
                'label' => esc_html__('Back to Top button text color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selector' => [
                    '{{WRAPPER}} .ts-scroll-box .BackTo-2 a span' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_control(
            'backto_button_color',
            [
                'label' => esc_html__('Back to Button Icon color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .BackTo a, .ts-scroll-box .BackTo-2 a i' => 'color: {{VALUE}};',
                ],
            ]
		);
		
        $this->add_control(
            'backto_button_hov_color',
            [
                'label' => esc_html__('Back to Button Icon Hover color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ts-scroll-box .BackTo:hover a' => 'color: {{VALUE}};',
                ],
            ]
        );
		
		$this->add_responsive_control(
			'backto_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-scroll-box .BackTo, .ts-scroll-box .BackTo-2 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
          );
          
		  $this->add_responsive_control(
			'back_to_text_padding',
			[
				'label' => esc_html__( 'Button Text Padding', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-scroll-box .BackTo, .ts-scroll-box .BackTo-2 a span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );

		$this->add_responsive_control(
			'backto_border_padding',
			[
				'label' => esc_html__( 'Button Padding', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ts-scroll-box .BackTo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
      );

		$this->end_controls_section();
     
    }

    protected function render( ) { 
        $settings = $this->get_settings();
    ?>

     <?php if($settings['button_style']=='style1'): ?> 
      <div class="ts-scroll-box">
			<div class="BackTo">
				<a href="#">
                <?php \Elementor\Icons_Manager::render_icon( $settings['backto_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a>
			</div>
      </div>
    <?php endif; ?> 
     <?php if($settings['button_style']=='style2'): ?> 
      <div class="ts-scroll-box">
			<div class="BackTo BackTo-2 text-right">
				<a href="#"> 
                    <span>Back to top</span>
                <?php \Elementor\Icons_Manager::render_icon( $settings['backto_button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</a>
			</div>
      </div>
    <?php endif; ?> 
    <?php  
    }
    protected function content_template() { }
}