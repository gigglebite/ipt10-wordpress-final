<?php
namespace Elementor; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedNamespaceFound

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Post_block_Slider_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newseqo-post-block-slider';
    }

    public function get_title() {
        return esc_html__( 'Post Block Slider', 'newseqo' );
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
            'default'       => '10',
          ]
        );
        $this->add_control(
          'slide_count',
          [
            'label'         => esc_html__( 'Slide count', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '4',
          ]
        );

   
      
        $this->add_control(
          'post_title_crop',
          [
            'label'         => esc_html__( 'Post title crop', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '5',
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

        $this->add_control(
         'ts_offset_enable',
            [
               'label' => esc_html__('Post skip', 'newseqo'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'newseqo'),
               'label_off' => esc_html__('No', 'newseqo'),
               'default' => 'no',
               
            ]
      );
      
      $this->add_control(
         'ts_offset_item_num',
         [
         'label'         => esc_html__( 'Skip post count', 'newseqo' ),
         'type'          => Controls_Manager::NUMBER,
         'default'       => '1',
         'condition' => [ 'ts_offset_enable' => 'yes' ]

         ]
      );

        $this->end_controls_section();

        $this->start_controls_section('Newseqo_style_block_section',
        [
           'label' => esc_html__( ' Post', 'newseqo' ),
           'tab' => Controls_Manager::TAB_STYLE,
        ]
       );

       $this->add_control(
        'newseqo_slider_autoplay',
            [
            'label' => esc_html__( 'Autoplay', 'newseqo' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'newseqo' ),
            'label_off' => esc_html__( 'No', 'newseqo' ),
            'return_value' => 'yes',
            'default' => 'no'
            ]
        );

     
     $this->add_control(
         'newseqo_slider_dot_nav_show',
             [
             'label' => esc_html__( 'Dot nav', 'newseqo' ),
             'type' => \Elementor\Controls_Manager::SWITCHER,
             'label_on' => esc_html__( 'Yes', 'newseqo' ),
             'label_off' => esc_html__( 'No', 'newseqo' ),
             'return_value' => 'yes',
             'default' => 'yes'
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
              'selector' => '{{WRAPPER}} .post-content .post-title a',
           ]
        );
  
        
        $this->add_control(
           'block_meta_date_color',
           [
              'label' => esc_html__('Footer color', 'newseqo'),
              'type' => Controls_Manager::COLOR,
              'default' => '',
            
              'selectors' => [
                 '{{WRAPPER}} .post-content .post-meta span,{{WRAPPER}} .post-content .post-meta span i' => 'color: {{VALUE}};',
              ],
           ]
        );
  
        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $post_order         = $settings['post_order'];
        $post_sortby        = $settings['post_sortby'];
        $show_cat           = $settings['show_cat'];
        $show_date          = $settings['show_date'];
        $post_format        = $settings['post_format'];
        $post_title_crop    = $settings['post_title_crop'];
        $post_number        = $settings['post_count'];
        $slide_count        = $settings['slide_count'];  
        $slider_autoplay    = $settings['newseqo_slider_autoplay'];
        $dot_show           = $settings['newseqo_slider_dot_nav_show'];
        
        $slide_controls    = [
        
            'dot_nav_show'=>$dot_show, 
            'auto_nav_slide'=> $slider_autoplay, 
            'item_count'=> $slide_count , 
    
          ];
      
        $slide_controls = \json_encode($slide_controls);


        
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
            'category__in' => $settings['post_cats'],

        ];

        if($settings['ts_offset_enable']=='yes'){
         $arg['offset'] = $settings['ts_offset_item_num'];
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


        //$settings['show_author'] = 'no';
        $queryd = new \WP_Query( $arg ); ?>
        
        <?php if ( $queryd->have_posts() ) : ?>
            <div class="block-slider owl-carousel" data-controls="<?php echo esc_attr($slide_controls); ?>">
                <?php while ($queryd->have_posts()) : $queryd->the_post();?>
                    <?php  $cat = get_the_category(); ?>
                    
                        <div class="post-block-style post-float media">
                        
                            <div class="post-thumb d-flex">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            <div class="post-content media-body align-self-center">
                                    <?php if($show_cat == 'yes'): ?> 
                                        <a 
                                            class="post-cat" 
                                            href="<?php echo get_category_link($cat[0]->term_id); ?>" 
                                        >
                                            <?php echo esc_html(get_cat_name($cat[0]->term_id)); ?>    
                                        </a> 
                                    <?php  endif; ?>
                                    <h4 class="post-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,$post_title_crop,'') );  ?></a></h4>
                                    <div class="post-meta">
                                    <?php if($show_date == 'yes') { ?>
                                            <span class="post-date"><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date() ); ?></span>
                                                
                                    <?php } ?>
                                    
                                    </div>
                                    
                            </div><!-- Post content end -->
                        </div><!-- Post block style end -->
                    

                    <?php 
                    endwhile; ?>
                    
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