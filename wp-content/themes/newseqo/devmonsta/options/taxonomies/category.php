<?php
use Devmonsta\Libs\Taxonomies;

if ( class_exists('Newseqo\Bootstrap') ) {
class Category extends Taxonomies
{

    public function register_controls()
    {

        $this->add_control( [
            'name'     => 'category_color',
            'type'     => 'color-picker',
            'label'    => esc_html__( 'Text Color', 'newseqo' ),
            'desc'     => esc_html__( 'Text color of this category', 'newseqo' ),
            'value'    => '#FFFFFF',
            'palettes' => ['#ba4e4e', '#0ce9ed', '#941940'],
        ] );

        $this->add_control( [
            'name'     => 'category_bg_color',
            'type'     => 'color-picker',
            'label'    => esc_html__( 'Background Color', 'newseqo' ),
            'desc'     => esc_html__( 'Background color of this category', 'newseqo' ),
            'value'    => '#eb1c23',
            'palettes' => ['#ba4e4e', '#0ce9ed', '#941940'],
        ] );

        $this->add_control( [
            'type'         => 'switcher',
            'name'         => 'category_layout_overwrite',
            'value'        => 'no',
            'label'        => esc_html__( 'Overwrite Layout', 'newseqo' ),
            'desc'         => esc_html__( 'It will orvewrite the customize settings category layout', 'newseqo' ),
            'left-choice'  => [
                'no' => esc_html__( 'No', 'newseqo' ),
            ],
            'right-choice' => [
                'yes' => esc_html__( 'Yes', 'newseqo' ),
            ],
        ] );

        $this->add_control( [
            'name'    => 'newseqo_single_category_layout',
            'id'      => 'newseqo_single_category_layout',
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
            'conditions' => [
                [
                    'control_name' => 'category_layout_overwrite',
                    'operator'     => '==',
                    'value'        => 'yes',

                ],
            ],
        ] );
    }
}
}else{
    class Category extends Taxonomies
    {

        public function register_controls()
            {

                $this->add_control( [
                    'name'     => 'category_color',
                    'type'     => 'color-picker',
                    'label'    => esc_html__( 'Text Color', 'newseqo' ),
                    'desc'     => esc_html__( 'Text color of this category', 'newseqo' ),
                    'value'    => '#FFFFFF',
                    'palettes' => ['#ba4e4e', '#0ce9ed', '#941940'],
                ] );

                $this->add_control( [
                    'name'     => 'category_bg_color',
                    'type'     => 'color-picker',
                    'label'    => esc_html__( 'Background Color', 'newseqo' ),
                    'desc'     => esc_html__( 'Background color of this category', 'newseqo' ),
                    'value'    => '#eb1c23',
                    'palettes' => ['#ba4e4e', '#0ce9ed', '#941940'],
                ] );

            }
    }
}
