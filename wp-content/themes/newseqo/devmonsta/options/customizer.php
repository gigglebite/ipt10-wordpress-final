<?php
class Customizer extends \Devmonsta\Libs\Customizer
{

    public function register_controls()
    {


        $this->add_panel([
            'id'             => 'xs_theme_option_panel',
            'priority'       => 0,
            'theme_supports' => '',
            'title'          => esc_html__('Newseqo Settings', 'newseqo'),
            'description'    => esc_html__('Newseqo Theme Options Panel', 'newseqo'),
        ]);
        
    
        /**
         * ================================================
         * General settings here
         * ===============================================
         */
        $this->add_section([
            'id'       => 'general_settings_section',
            'title'    => esc_html__('General Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 20,
        ]);

        $this->add_control([
            'id'          => 'custom_logo',
            'type'        => 'media',
            'section'     => 'general_settings_section',
            'label'       => esc_html__('Main Logo', 'newseqo'),
            'description' => esc_html__('This is default logo. Our most of the menu built with elemnetsKit header builder. Go to header settings->Header builder enable->  and click "edit header content" to change the logo', 'newseqo'),
        ]);

        /**
         * ================================================
         * Style settings here
         * ===============================================
         */
        $this->add_section([
            'id'       => 'style_settings_section',
            'title'    => esc_html__('Style Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 20,
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_style_body_bg_color_section',
            'label'   => esc_html__('Body Background', 'newseqo'),
            'type'    => 'color-picker',
            'section' => 'style_settings_section',
            'default' => '#FFFFFF',
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_style_body_primary_color_section',
            'label'   => esc_html__('Primary Color', 'newseqo'),
            'type'    => 'color-picker',
            'section' => 'style_settings_section',
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_style_body_primary_color_section',
            'label'   => esc_html__('Primary Color', 'newseqo'),
            'type'    => 'color-picker',
            'section' => 'style_settings_section',
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_style_title_color_section',
            'label'   => esc_html__('Title Color', 'newseqo'),
            'type'    => 'color-picker',
            'section' => 'style_settings_section',
            'default' => '#101010',

        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'newseqo_blog_body_typhography',
            'section'    => 'style_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Rubik',
                'weight'         => 400,
                'size'           => '',
                'line_height'    => '',
                'color'          => '#666',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Body Typhography', 'newseqo'),
        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'newseqo_blog_h1_2_typhography',
            'section'    => 'style_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Roboto',
                'weight'         => '',
                'size'           => '',
                'line_height'    => '',
                'color'          => '',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading One ', 'newseqo'),
        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'newseqo_blog_h2_typhography',
            'section'    => 'style_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Roboto',
                'weight'         => '',
                'size'           => '',
                'line_height'    => '',
                'color'          => '',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading Two ', 'newseqo'),
        ]);
        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'newseqo_blog_h3_4_typhography',
            'section'    => 'style_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Roboto',
                'weight'         => '',
                'size'           => '',
                'line_height'    => '',
                'color'          => '',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading Three ', 'newseqo'),
        ]);
        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'newseqo_blog_h4_typhography',
            'section'    => 'style_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Roboto',
                'weight'         => '',
                'size'           => '',
                'line_height'    => '',
                'color'          => '',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading Four ', 'newseqo'),
        ]);

        /**
         * ===============================================================
         * Header Settings start 
         * ===============================================================
         */
        $this->add_section([
            'id'       => 'header_settings_section',
            'title'    => esc_html__('Header Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 60,
        ]);
        $this->add_section([
            'id'       => 'devm_repeater_section',
            'title'    => esc_html__('Social Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 60,
        ]);

        /**
         * Header style control
         * */
        $this->add_control([
            'id'      => 'newseqo_header_style',
            'type'    => 'select',
            'default'   => 'standard',
            'label'   => esc_html__('Header Style', 'newseqo'),
            'section' => 'header_settings_section',
            'choices' => [
                'standard' => esc_html__('Standard', 'newseqo'),
                'solid' => esc_html__('Solid', 'newseqo'),
                'dark' => esc_html__('Dark', 'newseqo'),
            ],
        ]);

        /**
         * Header Search show/hide control
         * */
        $this->add_control([
            'id'      => 'newseqo_search_show',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Search', 'newseqo'),
            'section' => 'header_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        /**
         * Header topbar show/hide control
         * */
        $this->add_control([
            'id'      => 'newseqo_topbar_show',
            'type'    => 'switcher',
            'label'   => esc_html__('Show Topbar', 'newseqo'),
            'default' => '__true',
            'section' => 'header_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        /**
         * Header social show/hide control
         * */
        $this->add_control([
            'id'      => 'newseqo_header_social_show',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Social', 'newseqo'),
            'section' => 'header_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);


        /**
         * Header newsticket show/hide control
         * */
        $this->add_control([
            'id'      => 'newseqo_newsticker_show',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show News Ticker', 'newseqo'),
            'section' => 'header_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        /**
         * Header newsticket show/hide control
         * */
        $this->add_control([
            'id'      => 'newseqo_newsticker_title',
            'type'    => 'text',
            'label'   => esc_html__('News Ticker Title', 'newseqo'),
            'section' => 'header_settings_section',
        ]);

        /**
         * post sort by control
         * */
        $this->add_control([
            'id'      => 'newseqo_newsticker_source',
            'type'    => 'select',
            'default'   => 'latest',
            'label'   => esc_html__('Post Select by', 'newseqo'),
            'section' => 'header_settings_section',
            'choices' => [
                'latest' => esc_html__('Latest', 'newseqo'),
                'sticky' => esc_html__('Sticky', 'newseqo'),
                'category' => esc_html__('Category', 'newseqo'),
            ],
        ]);
        /**
         * post sort by control
         * */
        $this->add_control([
            'id'      => 'newseqo_newsticker_source_category',
            'type'    => 'multiselect',
            'default'   => '',
            'label'   => esc_html__('Select Category', 'newseqo'),
            'section' => 'header_settings_section',
            'choices' => $this->newseqo_get_post_category(),
        ]);

        /**
         * post sort by control
         * */
        $this->add_control([
            'id'      => 'newseqo_newsticker_count',
            'type'    => 'number',
            'default'   => 5,
            'label'   => esc_html__('News Ticker Count', 'newseqo'),
            'section' => 'header_settings_section'
        ]);

        $this->add_control([
            'id'       => 'newseqo_newsticker_color',
            'label'    => esc_html__('Newsticker Text color', 'newseqo'),
            'type'     => 'color-picker',
            'section'  => 'header_settings_section',
            'default'   => '#ffffff'
        ]);

        $this->add_control([
            'id'       => 'newseqo_newsticker_title_color',
            'label'    => esc_html__('Newsticker Title color', 'newseqo'),
            'type'     => 'color-picker',
            'section'  => 'header_settings_section',
            'default'   => '#eb1c23' 
        ]);

        $this->add_control([
            'id'       => 'newseqo_newsticker_bg_color',
            'label'    => esc_html__('Newsticker BG color', 'newseqo'),
            'type'     => 'color-picker',
            'section'  => 'header_settings_section',
            'default'   => '#eb1c23'      
        ]);

        // header settings end
        /**
         * ====================================================
         * Ads Banner Settings here
         * ====================================================
         */
        $this->add_section([
            'id'       => 'ads_settings_section',
            'title'    => esc_html__('Ads Banner Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 60,
        ]);

        /**
         * Show header ads control
         * */
        $this->add_control([
            'id'      => 'newseqo_ad_show',
            'type'    => 'switcher',
            'label'   => esc_html__('Show Header Ads', 'newseqo'),
            'section' => 'ads_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'          => 'newseqo_ad_banner_img',
            'type'        => 'media',
            'section'     => 'ads_settings_section',
            'label'       => esc_html__('Header Ads', 'newseqo'),
        ]);
        $this->add_control([
            'id'          => 'newseqo_ad_url',
            'type'        => 'text',
            'section'     => 'ads_settings_section',
            'label'       => esc_html__('Header Ads URL', 'newseqo'),
        ]);

        // newseqo pro
        if ( class_exists('Newseqo\Bootstrap') ) {
            $this->add_control([
                'id'      => 'newseqo_ad_single_post',
                'type'    => 'switcher',
                'default' => 'yes',
                'label'   => esc_html__('Show Single Post Ads', 'newseqo'),
                'section' => 'ads_settings_section',
                'left-choice'  => [
                    'no' => esc_html__('No', 'newseqo'),
                ],
                'right-choice' => [
                    'yes' => esc_html__('Yes', 'newseqo'),
                ],
            ]);

            $this->add_control([
                'id'          => 'newseqo_ad_single_banner_img',
                'type'        => 'media',
                'section'     => 'ads_settings_section',
                'label'       => esc_html__('Single Post Ads', 'newseqo'),
                'conditions' => [
                    [
                        'control_name' => 'newseqo_ad_single_post',
                        'operator'     => '==',
                        'value'        => 'yes',

                    ],
                ],
            ]);
            $this->add_control([
                'id'          => 'newseqo_ad_single_url',
                'type'        => 'text',
                'section'     => 'ads_settings_section',
                'label'       => esc_html__('Single Post Ads URL', 'newseqo'),
                'conditions' => [
                    [
                        'control_name' => 'newseqo_ad_single_post',
                        'operator'     => '==',
                        'value'        => 'yes',

                    ],
                ],
            ]);
        }

        /**
         * ====================================================
         * Banner Settings here
         * ====================================================
         */
        $this->add_panel([
            'id'             => 'xs_theme_banner_panel',
            'priority'       => 20,
            'panel'          => 'xs_theme_option_panel',
            'theme_supports' => '',
            'title'          => esc_html__('Banner Settings', 'newseqo'),
            'description'    => esc_html__('Theme Banner Panel', 'newseqo'),
        ]);


        // blog banner settings
        $this->add_section([
            'id'       => 'blog_banner_settings_section',
            'title'    => esc_html__('Blog Banner Settings', 'newseqo'),
            'panel'    => 'xs_theme_banner_panel',
            'priority' => 30,
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_banner_enable',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Banner?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the banner', 'newseqo'),
            'section' => 'blog_banner_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_banner_breadcrumb_enable',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Breadcrumb?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'newseqo'),
            'section' => 'blog_banner_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'    => 'newseqo_blog_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'newseqo'),
            'section' => 'blog_banner_settings_section',
        ]);



        $this->add_control([
            'id'      => 'newseqo_blog_banner_img',
            'type'    => 'media',
            'section' => 'blog_banner_settings_section',
            'label'   => esc_html__('Blog Banner Image', 'newseqo'),
        ]);


        /**
         *   Page banner settings
         */
        $this->add_section([
            'id'       => 'page_banner_settings_section',
            'title'    => esc_html__('Page Banner Settings', 'newseqo'),
            'panel'    => 'xs_theme_banner_panel',
            'priority' => 0,
        ]);

        $this->add_control([
            'id'      => 'newseqo_page_banner_enable',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Banner?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the banner', 'newseqo'),
            'section' => 'page_banner_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_page_banner_breadcrumb_enable',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Breadcrumb?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'newseqo'),
            'section' => 'page_banner_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'    => 'newseqo_page_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'newseqo'),
            'section' => 'page_banner_settings_section',
        ]);
        $this->add_control([
            'id'      => 'newseqo_page_banner_img',
            'type'    => 'media',
            'section' => 'page_banner_settings_section',
            'label'   => esc_html__('Banner Image', 'newseqo'),
        ]);

        /**
         * ====================================================
         * Blog Settings here
         * ====================================================
         */
        $this->add_panel([
            'id'             => 'xs_theme_blog_panel',
            'priority'       => 20,
            'panel'          => 'xs_theme_option_panel',
            'theme_supports' => '',
            'title'          => esc_html__('Blog Settings', 'newseqo'),
            'description'    => esc_html__('Theme blog Panel', 'newseqo'),
        ]);

        /**
         * 
         * Blog Listing Settings here
         * 
         */
        $this->add_section([
            'id'       => 'blog_settings_section',
            'title'    => esc_html__('Blog List Settings', 'newseqo'),
            'panel'    => 'xs_theme_blog_panel',
            'priority' => 0,
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_layout',
            'type'    => 'select',
            'default'   => 'right',
            'label'   => esc_html__('Blog Layout', 'newseqo'),
            'section' => 'blog_settings_section',
            'choices' => [
                'left' => esc_html__('Left Sidebar', 'newseqo'),
                'full' => esc_html__('Full Width', 'newseqo'),
                'right' => esc_html__('Right Sidebar', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_author',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Author?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the author', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_count',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show View Count?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the view count', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_comment',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Comments?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the Comment', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_date',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Date?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the Comment', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_category',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Category?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the category', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_listing_title_length',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Blog Title Length?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the title length', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_post_title_char_limit_length',
            'type'    => 'number',
            'default' => 20,
            'label'   => esc_html__('Blog Title Length', 'newseqo'),
            'section' => 'blog_settings_section',
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_post_char_limit_length',
            'type'    => 'number',
            'default' => 20,
            'label'   => esc_html__('Blog Desc Length', 'newseqo'),
            'section' => 'blog_settings_section',
        ]);


        $this->add_control([
            'id'      => 'newseqo_blog_readmore',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Blog Read more?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog readmore', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_readmore_text',
            'type'    => 'text',
            'default' => esc_html__('Read More', 'newseqo'),
            'label'   => esc_html__('Read More text', 'newseqo'),
            'section' => 'blog_settings_section',
        ]);

        $this->add_control([
            'id'      => 'newseqo_categry_title_lenght',
            'type'    => 'number',
            'default' => 20,
            'label'   => esc_html__('Title Length (Archive Page)', 'newseqo'),
            'desc'    => esc_html__('You can limit post title in category and tag page', 'newseqo'),

            'section' => 'blog_settings_section',
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_post_desc_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show Description?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the description', 'newseqo'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_categry_post_desc_lenght',
            'type'    => 'number',
            'default' => 20,
            'label'   => esc_html__('Description Length (Archive page)', 'newseqo'),
            'desc'    => esc_html__('You can limit post desc in category and tag page', 'newseqo'),
            'section' => 'blog_settings_section',
            'conditions' => [
                [
                    'control_name' => 'newseqo_blog_post_desc_show',
                    'operator'     => '==',
                    'value'        => 'yes',

                ],
            ],
        ]);


        /**
         *   blog details settings
         */
        $this->add_section([
            'id'       => 'blog_details_settings_section',
            'title'    => esc_html__('Blog Details Settings', 'newseqo'),
            'panel'    => 'xs_theme_blog_panel',
            'priority' => 0,
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_single_layout',
            'type'    => 'select',
            'default'   => 'right',
            'label'   => esc_html__('Blog Details Layout', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'choices' => [
                'left' => esc_html__('Left Sidebar', 'newseqo'),
                'full' => esc_html__('Full Width', 'newseqo'),
                'right' => esc_html__('Right Sidebar', 'newseqo'),
            ],
        ]);
        if ( class_exists('Newseqo\Bootstrap') ) {
            $this->add_control( [
                'id'      => 'newseqo_custizer_single_post_layout',
                'name'      => 'newseqo_custizer_single_post_layout',
                'section' => 'blog_details_settings_section',
                'type'    => 'image-picker',
                'value'   => 'style1',
                'attr'    => [
                    'class'    => 'custom-class',
                    'data-foo' => 'bar',
                ],
                'label'   => esc_html__( 'Post Layout', 'newseqo' ),
                'desc'    => esc_html__( 'Select post layout', 'newseqo' ),
                'choices' => [
                    'style1' => [
                        'small' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style1.png',
                        'large' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style1.png',
                    ],
                    'style2' => [
                        'small' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style7.png',
                        'large' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style7.png',
                    ],
                    'style3' => [
                        'small' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style7.png',
                        'large' => get_template_directory_uri() . '/assets/images/admin/customizer/post-header-layout/style7.png',
                    ],
                ],
            ] );
        }
        $this->add_control([
            'id'      => 'newseqo_blog_read_time',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Blog Read Time?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog read time', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_post_comment_open',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Comments?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog details comments', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_feature_image',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Post Feature?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog details Feature Image', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_related_post',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Related Post?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog Related Post', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_blog_related_post_position',
            'type'    => 'select',
            'default'   => 'aftercomment',
            'section' => 'blog_details_settings_section',
            'label'     => esc_html__('Related Post position', 'newseqo'),
            'choices'   => [
                'aftercomment'   => esc_html__('After Comment', 'newseqo'),
                'beforecomment'  => esc_html__('Before Comment', 'newseqo'),
            ]
        ]);


        $this->add_control([
            'id'      => 'newseqo_blog_post_author',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Show Author Section?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog author section', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);
        $this->add_control([
            'id'      => 'newseqo_blog_post_tag',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Tags Section?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog Tags section', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'id'      => 'newseqo_single_blog_post_nav',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Post Navigation?', 'newseqo'),
            'desc'    => esc_html__('Show or hide the blog details navigation section', 'newseqo'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        /**
         *   Category settings
         */
        if ( class_exists('Newseqo\Bootstrap') ) {
            $this->add_section([
                'id'       => 'category_details_settings_section',
                'title'    => esc_html__('Category Settings', 'newseqo'),
                'panel'    => 'xs_theme_blog_panel',
                'priority' => 0,
            ]);

            $this->add_control( [
                'name'    => 'newseqo_blog_category_layout',
                'id'      => 'newseqo_blog_category_layout',
                'section' => 'category_details_settings_section',
                'type'    => 'image-picker',
                'value'   => 'style2',
                'attr'    => [
                    'class'    => 'custom-class',
                    'data-foo' => 'bar',
                ],
                'label'   => esc_html__( 'Category Layout', 'newseqo' ),
                'desc'    => esc_html__( 'Select category layout', 'newseqo' ),
                'choices' => [
                    'style1' => [
                        'small' => get_template_directory_uri() . '/assets/images/admin/customizer/category/category_min1.png',
                        'large' => get_template_directory_uri() . '/assets/images/admin/customizer/category/category_min1.png',
                    ],
                    'style2' => [
                        'small' => get_template_directory_uri() . '/assets/images/admin/customizer/category/category_min2.png',
                        'large' => get_template_directory_uri() . '/assets/images/admin/customizer/category/category_min2.png',
                    ],
                ],
            ] );
        }
            
        /**
         * ====================================================
         * Footer Settings here
         * ====================================================
         */
        $this->add_section([
            'id'       => 'footer_settings_section',
            'title'    => esc_html__('Footer Settings', 'newseqo'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 60,
        ]);

        /**
         * show footer widget control
         * */
        $this->add_control([
            'id'      => 'show_footer_widgets',
            'type'    => 'switcher',
            'default' => '__true',
            'label'   => esc_html__('Show Footer Widget', 'newseqo'),
            'section' => 'footer_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        /**
         * Footer number of widget control
         * */
        $this->add_control([
            'id'       => 'newseqo_number_of_widgets',
            'label'    => esc_html__('Number Of Widget', 'newseqo'),
            'type'     => 'slider',
            'section'  => 'footer_settings_section',
            'default'  => 4,
            'properties' => array(
                'min' => 1,
                'max' => 6,
                'step' => 1,
            ),
        ]);


        /**
         * color control
         * */
        $this->add_control([
            'id'       => 'newseqo_footer_copyright_color',
            'label'    => esc_html__('Copyright color', 'newseqo'),
            'type'     => 'color-picker',
            'section'  => 'footer_settings_section',
            'default' => '#fff',
        ]);
        /**
         * color control
         * */
        $this->add_control([
            'id'       => 'newseqo_footer_copyright_bg_color',
            'label'    => esc_html__('Copyright BG color', 'newseqo'),
            'type'     => 'color-picker',
            'section'  => 'footer_settings_section',
            'default' => '#000',
        ]);

        /**
         * Footer copyright text control
         * */
        $this->add_control([
            'id'          => 'newseqo_copyright',
            'type'        => 'wp-editor',
            'section'     => 'footer_settings_section',
            'label'       => esc_html__('Copyright Text', 'newseqo'),
            'description' => esc_html__('This text will be shown at the footer of all pages.', 'newseqo'),
        ]);
        /**
         * diemention control
         * */
        $this->add_control([
            'id'       => 'newseqo_footer_copyright_padding',
            'label'    => esc_html__('Copyright Padding top', 'newseqo'),
            'type'     => 'text',
            'value'    => '20px',
            'section'  => 'footer_settings_section',
        ]);
        /**
         * diemention control
         * */
        $this->add_control([
            'id'       => 'newseqo_footer_copyright_padding_bottom',
            'label'    => esc_html__('Copyright Padding bottom', 'newseqo'),
            'type'     => 'text',
            'default'    => '20px',
            'section'  => 'footer_settings_section',
        ]);
        /**
         * Footer back to top control
         * */
        $this->add_control([
            'id'      => 'newseqo_back_to_top',
            'type'    => 'switcher',
            'default' => '__false',
            'label'   => esc_html__('Back to top', 'newseqo'),
            'section' => 'footer_settings_section',
            'left-choice'  => [
                '__false' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                '__true' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        
    }

   public function newseqo_get_post_category($tax = 'category')
    {

    static $list = null;
    if (!is_array($list)) {
        $categories = get_terms($tax, array(
            'orderby'       => 'name',
            'order'         => 'DESC',
            'hide_empty'    => false,
            'number'        => 200

        ));

        foreach ($categories as $category) {
            $list[$category->term_id] = $category->name;
        }
    }

    return $list;
    }
}
