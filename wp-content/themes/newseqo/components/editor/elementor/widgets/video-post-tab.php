<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Newseqo_Video_Post_Tab_Widget extends Widget_Base {

  public $base;

    public function get_name() {
        return 'newszone-video-post-tab';
    }

    public function get_title() {
        return esc_html__( 'Video Post Tab', 'newseqo' );
    }

    public function get_icon() { 
        return 'eicon-thumbnails-right';
    }

    public function get_categories() {
       return [ 'newseqo-elements' ];
    }

    protected function _register_controls() {

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
            'default'       => '8',
          ]
        );
        $this->add_control(
          'post_title_crop',
          [
            'label'         => esc_html__( 'Post title crop', 'newseqo' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '8',
          ]
        );

        $this->add_responsive_control(
			'thumbnail_height',
			[
				'label' => esc_html__( 'Image height', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .video-item.ts-overlay-style' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
       );

       $this->add_responsive_control(
			'video_list_height',
			[
				'label' =>esc_html__( 'Video list height', 'newseqo' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .newseqo-video-post .video-tab-list' => 'height: {{SIZE}}{{UNIT}};',
				],
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
            'post_tags',
            [
               'label' =>esc_html__('Select tags', 'newseqo'),
               'type'      => Controls_Manager::SELECT2,
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
            'show_view_count',
            [
                'label' => esc_html__('Show View Count', 'newseqo'),
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

     //Title Style Section
		$this->start_controls_section(
			'section_v_list_style', [
				'label'	 => esc_html__( 'Video list', 'newseqo' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );
     
      
      $this->add_control(
			'title_color', [

				'label'		 => esc_html__( 'Title color', 'newseqo' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .post-tab-list .post-content .post-title' => 'color: {{VALUE}};',
				],
			]
      );
 
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'title', 'newseqo' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .post-tab-list .post-content .post-title',
			]
        );
         
        $this->end_controls_section();

        //Video detail Section
		$this->start_controls_section(
			'section_video_d_style', [
				'label'	 => esc_html__( 'Video details', 'newseqo' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );
        
      $this->add_control(
			'video_title_color', [

				'label'		 => esc_html__( 'Title color', 'newseqo' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .video-item .post-content .post-title a' => 'color: {{VALUE}};',
				],
			]
      );

      $this->add_control(
			'video_title_hv_color', [

				'label'		 => esc_html__( 'Title hover color ', 'newseqo' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .video-item .post-content .post-title:hover a' => 'color: {{VALUE}};',
				],
			]
      );

      $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'video_title_typography',
				'label' => esc_html__( 'title', 'newseqo' ),
				'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .video-item .post-content .post-title',
			]
      );

      $this->add_control(
			'video_footer_color', [

				'label'		 => esc_html__( 'Footer color', 'newseqo' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .video-item .post-content .post-meta-info li,{{WRAPPER}} .video-item .post-content .post-meta-info li i' => 'color: {{VALUE}};',
				],
			]
      );
      
      $this->add_responsive_control(
			'video_content_padding',
			[
				'label' => __( 'Video content Padding', 'newseqo' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px','%'],
				'selectors' => [
					'{{WRAPPER}} .newseqo-video-post .ts-overlay-style .post-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

        $this->end_controls_section();
    }

    protected function render( ) { 
        $settings = $this->get_settings();
        $thumb 					= [600, 398];
        $post_title_crop =   $settings['post_title_crop'];
       
        $arg = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_order'],
            'posts_per_page' => $settings['post_count'],
            'category__in' => $settings['post_cats'],
            'tag__in' => $settings['post_tags'],
            'suppress_filters' => false,
            'tax_query' => [
                [
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => 'post-format-video'
                ]
            ]
        ];

        if($settings['ts_offset_enable']=='yes') {

         $arg['offset'] = $settings['ts_offset_item_num'];
         
       }

        switch($settings['post_sortby']){
         case 'popularposts':
             $arg['meta_key'] = 'newszone_post_views_count';
             $arg['orderby'] = 'meta_value_num';
         break;
         case 'mostdiscussed':
             $arg['orderby'] = 'comment_count';
         break;
         default:
             $arg['orderby'] = 'date';
         break;
     }
        $settings['show_author'] = 'no';
        $query = new \WP_Query( $arg ); ?>
        
        <?php if ( $query->have_posts() ) : ?>
            
            <div class="row newseqo-video-post">
            <div class="col-lg-4 pr-0">
                    <div class="video-tab-list-title">
                        <div class="post-video">
                            <div class="ts-play-btn">
                                <i class="fa fa-play" aria-hidden="true"></i>
                            </div>
                        </div> 
                        <div class="video-tab-list-title-content">
                            <h3><?php echo esc_html__('Video Playlist','newseqo'); ?></h3>
                            <p><span class="video-index"><?php echo esc_html__('1','newseqo'); ?></span> / <span><?php echo esc_html($query->post_count); ?></span> <?php echo esc_html__('videos','newseqo'); ?></p>
                        </div>
                    </div>
                    <div class="video-tab-list bg-dark-item video-tab-scrollbar" id="video-tab-scrollbar">
                        <ul class="nav nav-pills post-tab-list post-thumb-bg post-tab-bg">
                            <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++; ?>
                                <li data-index="<?php echo esc_attr($i); ?>" class="<?php echo esc_attr(($i == 1) ? 'active' : ''); ?>">
                                    <a href="#video-tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($i); ?>" data-toggle="tab">
                                        <div class="post-content media">
                                            <div class="post-thumb">
                                                <div class="bg-wrap">
                                                    <span class="sm-bg-img" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);"></span>
                                                </div>
                                            </div>
                                           <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                <?php echo wp_trim_words(get_the_title(),$post_title_crop,''); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-8 pl-0">
                    <div class="tab-content clearfix">
                        <?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++; ?>
                            <div class="tab-pane fade <?php echo esc_attr(($i == 1) ? 'in show active' : ''); ?>" id="video-tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($i); ?>">
                                <div class="video-item ts-overlay-style" style="background-image:url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail'))); ?>)">
                                <?php $video_url = newseqo_meta_option( get_the_ID(), 'format_video_url' );?>
                                <a href="<?php echo esc_url($video_url);?>" class="ts-play-btn">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </a>


                                </div>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();?>
                    </div>
                </div>
                
                
            </div>
        <?php endif; ?>

      <?php  
    }
    protected function content_template() { }

    public function post_category() {

      $terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => false,
            'posts_per_page' => -1, 
            'suppress_filters' => false,
      ) );

      $cat_list = [];
      foreach($terms as $post) {
      $cat_list[$post->term_id]  = [$post->name];
      }
      return $cat_list;
   }
}