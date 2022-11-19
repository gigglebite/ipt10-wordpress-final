<?php

namespace Elementor;

if (!defined('ABSPATH')) exit;


class Newseqo_News_Ticker extends Widget_Base
{


    public $base;

    public function get_name()
    {
        return 'news-ticker';
    }

    public function get_title()
    {

        return esc_html__('News Ticker', 'newseqo');

    }

    public function get_icon()
    {
        return 'eicon-image';
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
                'label' => esc_html__('News Ticket Content', 'newseqo'),
            ]
        );

        $this->add_control(
            'slide_arrows',
            [
                'label' => esc_html__('Show Navigation', 'newseqo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'newseqo'),
                'label_off' => esc_html__('No', 'newseqo'),
                'default' => 'no',

            ]
        );

        $this->add_control(
            'slide_dots',
            [
                'label' => esc_html__('Show Dots', 'newseqo'),
                'type' => \Elementor\Controls_Manager::HIDDEN,
                'default' => 'no',

            ]
        );

        $this->add_control(
            'title', [
                'label' => esc_html__('Title', 'newseqo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__('News ticker title', 'newseqo'),
                'default' => esc_html__('Trending', 'newseqo'),

            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Posts Select By', 'newseqo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => esc_html__('Date', 'newseqo'),
                    'ID' => esc_html__('ID', 'newseqo'),
                    'title' => esc_html__('Title', 'newseqo'),
                    'comment_count' => esc_html__('Comment Count', 'newseqo'),
                    'name' => esc_html__('Name', 'newseqo'),
                    'rand' => esc_html__('Random', 'newseqo'),
                    'menu_order' => esc_html__('Menu Order', 'newseqo'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => esc_html__('Post Order', 'newseqo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'DESC' => esc_html__('Descending', 'newseqo'),
                    'ASC' => esc_html__('Ascending', 'newseqo'),
                ],
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => esc_html__('Post Count', 'newseqo'),
                'type' => Controls_Manager::NUMBER,
                'default' => '5',
            ]
        );

        $this->add_control(
            'post_cats',
            [
                'label' => esc_html__('Select Categories', 'newseqo'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->post_category(),
                'label_block' => true,
                'multiple' => true,
            ]
        );

        $this->add_control('title_crop',
        [
            'label' => esc_html__('Title Word Limit', 'newseqo'),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 100,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 35,
            ],
        ]);

        $this->add_responsive_control(
            'text_align', [
                'label' => esc_html__('Alignment', 'newseqo'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [

                    'left' => [
                        'title' => esc_html__('Left', 'newseqo'),
                        'ts-icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'newseqo'),
                        'ts-icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'newseqo'),
                        'ts-icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .tranding-bg-white' => 'text-align: {{VALUE}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'ticker_padding',
            [
                'label' => esc_html__('Padding', 'newseqo'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tranding-bg-white' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section('newseqo_style_block_section',
            [
                'label' => esc_html__(' Post', 'newseqo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Title color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tranding-bar .trending-slide .trending-title, .tranding-bar .trending-slide .trending-title i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'post_title_typography',
                'label' => esc_html__('Title Typography', 'newseqo'),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tranding-bar .trending-slide .trending-title',
            ]
        );

        $this->add_control(
            'news_color',
            [
                'label' => esc_html__('News Color', 'newseqo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tranding-bar .swiper-slide .post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'news_title_typography',
                'label' => esc_html__('News Typography', 'newseqo'),
                'scheme' => Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .tranding-bar .swiper-slide .post-title a',
            ]
        );

        $this->end_controls_section();

        /*
           Slider Navigation Style
        */
        // $this->slider_navigation_style_controls();


    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $title = $settings['title'];
        $newsticker_nav_enable = $settings['slide_arrows'];
        $post_title_crop = isset($settings['title_crop']) ? $settings['title_crop']['size'] : '35';


        $args = array(
            'orderby' => $settings['orderby'],
            'order' => $settings['order'],
            'posts_per_page' => $settings['posts_per_page'],
        );

        if (!empty($settings['post_cats'])) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $settings['post_cats']
                )
            );
        }

        $posts = get_posts($args);

        ?>
        <?php if ($posts) : ?>
            <div class="newseqo-news-ticker">
                <div class="tranding-bg-white">
                    <div class="tranding-bar">
                        <div id="tredingcarousel" class="trending-slide trending-slide-bg">
                            <?php if ($title != '') { ?>
                                <p class="trending-title"><i class="xts-icon xts-rss"></i> <?php echo esc_html($title); ?></p>
                            <?php } ?>
                            <div class="slider-container">
                                <div class="swiper-container ">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($posts as $post): ?>
                                            <div class="swiper-slide">
                                                <div class="post-content">
                                                    <p class="post-title title-small">
                                                        <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                                            <?php
                                                            echo esc_html(wp_trim_words(get_the_title($post->ID), $post_title_crop, ''));?>
                                                        </a>
                                                    </p>
                                                </div><!--/.post-content -->
                                            </div><!--/.swiper-slide -->
                                        <?php
                                        endforeach;
                                        wp_reset_postdata();
                                        ?>
                                    </div> <!--/.swiper-wrapper-->

                                    <?php if ($newsticker_nav_enable == 'yes'): ?>
                                        <div class="swiper-navigation-wrapper">
                                            <div class="swiper-button-prev">
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <div class="swiper-button-next">
                                                <i class="fa fa-chevron-right"></i>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div><!--/.swiper-container-->
                            </div> <!-- slider container -->
                        </div>
                    </div> <!--/.tranding-bar-->
                </div>
            </div>
        <?php endif; ?>
        <?php
    }

    protected function content_template()
    {
    }

    public function post_category()
    {

        $terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'posts_per_page' => -1,
        ));

        $cat_list = [];
        if(!empty($terms)){
            foreach ($terms as $post) {
                $cat_list[$post->term_id] = [$post->name];
            }
        }
        return $cat_list;
    }
}