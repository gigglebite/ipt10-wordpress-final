<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;


class Newseqo_Date_time extends Widget_Base
{

    public $base;

    public function get_name()
    {
        return 'date-time';
    }

    public function get_title()
    {

        return esc_html__('Date and Time', 'newseqo');

    }

    public function get_icon()
    {
        return 'far fa-calendar-alt';
    }

    public function get_categories()
    {
        return ['newseqo-elements'];
    }

    protected function register_controls()
    {


        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Date settings', 'newseqo'),
            ]
        );


        $this->add_control(
            'date_icon',
            [
                'label' => esc_html__('Select Icon', 'newseqo'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-date',
                ]
            ]
        );

        $this->add_control('title_color',
            [
                'label' => esc_html__('Date color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .newseqo-date span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'date_text_align',
            [
                'label' => esc_html__('Alignment', 'newseqo'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [

                    'left' => [
                        'title' => esc_html__('Left', 'newseqo'),
                        'icon' => 'fas fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'newseqo'),
                        'icon' => 'fas fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'newseqo'),
                        'icon' => 'fas fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .newseqo-date' => 'text-align: {{VALUE}};'
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'date_typography',
                'label' => esc_html__('Date Typography', 'newseqo'),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .newseqo-date span',
            ]
        );

        $this->add_responsive_control(
            'date_padding',
            [
                'label' => esc_html__('Date Padding', 'newseqo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .newseqo-date span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $date_icon = $settings['date_icon'];
        ?>
            <div class="qoxag-date">
                <span>
                <?php \Elementor\Icons_Manager::render_icon($settings['date_icon'], ['aria-hidden' => 'true']); ?>
                <?php echo date('l '); ?><?php echo date_i18n(get_option('date_format')); ?>        
                </span>
            </div>
        <?php
    }

    protected function content_template()
    {
    }
}