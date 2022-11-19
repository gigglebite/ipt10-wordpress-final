<?php
use Devmonsta\Libs\Posts;

class Post extends Posts {

    public function register_controls() {

        $this->add_box( [
            'id'        => 'newseqo_post_settings',
            'post_type' => 'post',
            'title'     => esc_html__('Newseqo Post Settings', 'newseqo'),
        ] );

        /**
         * control for text input
         */
        $this->add_control( [
            'box_id' => 'newseqo_post_settings',
            'type'   => 'url',
            'name'   => 'format_video_url',
            'value'  => '',
            'desc'   => esc_html__('Enter your video URL', 'newseqo'),
            'label'  => esc_html__( 'Video URL(Only for video post format)', 'newseqo' ),
        ] );

        $this->add_control( [
            'box_id' => 'newseqo_post_settings',
            'type'   => 'url',
            'name'   => 'format_audio_url',
            'value'  => '',
            'desc'   => esc_html__('Enter your audio URL', 'newseqo'),
            'label'  => esc_html__( 'Audio URL(Only for audio post format)', 'newseqo' ),
        ] );

        // newseqo pro
        if ( class_exists('Newseqo\Bootstrap') ) {
            $this->add_control([
                'box_id'       => 'newseqo_post_settings',
                'name'         => 'post_layout_overwrite',
                'type'         => 'switcher',
                'value'        => 'no',
                'label'        => esc_html__( 'Overwrite Post Layout', 'newseqo' ),
                'desc'         => esc_html__( 'It will orvewrite the customizer post layout settings', 'newseqo' ),
                'left-choice'  => [
                    'no' => esc_html__( 'No', 'newseqo' ),
                ],
                'right-choice' => [
                    'yes' => esc_html__( 'Yes', 'newseqo' ),
                ],
            ]);

            $this->add_control( [
                'box_id'    => 'newseqo_post_settings',
                'name'      => 'newseqo_single_post_layout',
                'type'    => 'image-picker',
                'value'   => 'style2',
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
                'conditions' => [
                    [
                        'control_name' => 'post_layout_overwrite',
                        'operator'     => '==',
                        'value'        => 'yes',

                    ],
                ],
            ] );
         
        $this->add_control([
            'box_id'    => 'newseqo_post_settings',
            'name'      => 'newseqo_ad_single_post_overwrite',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Overwrite Single Post Ads', 'newseqo'),
            'left-choice'  => [
                'no' => esc_html__('No', 'newseqo'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'newseqo'),
            ],
        ]);

        $this->add_control([
            'box_id'        => 'newseqo_post_settings',
            'name'          => 'newseqo_ad_single_banner_img_overwrite',
            'type'          => 'upload',
            'label'         => esc_html__('Single Post Ads', 'newseqo'),
            'conditions' => [
                [
                    'control_name' => 'newseqo_ad_single_post_overwrite',
                    'operator'     => '==',
                    'value'        => 'yes',

                ],
            ],
        ]);
        $this->add_control([
            'box_id'    => 'newseqo_post_settings',
            'name'          => 'newseqo_ad_single_url_overwrite',
            'type'        => 'text',
            'label'       => esc_html__('Single Post Ads URL', 'newseqo'),
            'conditions' => [
                [
                    'control_name' => 'newseqo_ad_single_post_overwrite',
                    'operator'     => '==',
                    'value'        => 'yes',

                ],
            ],
        ]);
        }
    }
}
