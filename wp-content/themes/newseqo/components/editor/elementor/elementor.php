<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if(defined('ELEMENTOR_VERSION')):

include_once NEWSEQO_EDITOR . '/elementor/manager/controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

class Newseqo_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){

		add_action( 'elementor/init', array($this, '_elementor_init'));
        add_action( 'elementor/controls/controls_registered', array( $this, '_icon_pack' ), 11 );
        add_action( 'elementor/controls/controls_registered', array( $this, 'control_image_choose' ), 11 );
        add_action( 'elementor/controls/controls_registered', array( $this, '_ajax_select2' ), 11 );
        add_action( 'elementor/widgets/widgets_registered', array($this, '_shortcode_elements'));
        // add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
        // elemntor icon load
        $this ->elementor_icon_pack(); 
	}


    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
         wp_enqueue_script( 'newseqo-main-elementor', NEWSEQO_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), NEWSEQO_VERSION, true );
    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function _elementor_init(){
    
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'newseqo-elements',
            [
                'title' =>esc_html__( 'Newseqo', 'newseqo' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */ 

    public function _icon_pack( $controls_manager ) {

        require_once NEWSEQO_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'Newseqo_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }

    
    // elementor icon fonts loaded
    public function elementor_icon_pack(  ) {

		$this->__generate_font();
		
        add_filter( 'elementor/icons_manager/additional_tabs', [ $this, '__add_font']);
		
    }
    
    public function __add_font( $font){
        $font_new['icon-newseqo'] = [
            'name' => 'icon-newseqo',
            'label' => esc_html__( 'Newseqo Icon', 'newseqo' ),
            'url' => NEWSEQO_CSS . '/icofont.css',
            'enqueue' => [ NEWSEQO_CSS . '/icofont.css' ],
            'prefix' => 'xts-',
            'displayPrefix' => 'xts-icon',
            'labelIcon' => 'xts-icon xts-layers',
            'ver' => '1.0.1',
            'fetchJson' => NEWSEQO_JS . '/icofont.js',
            'native' => true,
        ];
        return  array_merge($font, $font_new);
    }

    public function __generate_font(){
        global $wp_filesystem;

        require_once ( ABSPATH . '/wp-admin/includes/file.php' );
        WP_Filesystem();
        $css_file =  NEWSEQO_CSS_DIR . '/icofont.css';
    
        if ( $wp_filesystem->exists( $css_file ) ) {
            $css_source = $wp_filesystem->get_contents( $css_file );
        } // End If Statement
        
        preg_match_all( "/\.(xts-.*?):\w*?\s*?{/", $css_source, $matches, PREG_SET_ORDER, 0 );
        $iconList = []; 
        
        foreach ( $matches as $match ) {
            $new_icons[$match[1] ] = str_replace('xts-', '', $match[1]);
            $iconList[] = str_replace('xts-', '', $match[1]);
        }

        $icons = new \stdClass();
        $icons->icons = $iconList;
        $icon_data = json_encode($icons);
        
        $file = NEWSEQO_THEME_DIR . '/assets/js/icofont.js';
        
            global $wp_filesystem;
            require_once ( ABSPATH . '/wp-admin/includes/file.php' );
            WP_Filesystem();
            if ( $wp_filesystem->exists( $file ) ) {
                $content =  $wp_filesystem->put_contents( $file, $icon_data) ;
            } 
        
    }

    // registering ajax select 2 control
    public function _ajax_select2( $controls_manager ) {
        require_once NEWSEQO_EDITOR_ELEMENTOR. '/controls/select2.php';
        $controls_manager->register_control( 'ajaxselect2', new \Newseqo_Control_Ajax_Select2() );
    }
    
    // registering image choose
    public function control_image_choose( $controls_manager ) {
        require_once NEWSEQO_EDITOR_ELEMENTOR. '/controls/choose.php';
        $controls_manager->register_control( 'imagechooses', new \Newseqo_Control_Image_Choose() );
    }

    public function _shortcode_elements($widgets_manager){
           
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/title.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Title_Widget());

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/main-slider.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Main_Slider_Widget());

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-grid.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_Grid_Widget());

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-grid-slider.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_Grid_Slider_Widget());

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-tab.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_post_tab_widget());   

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-block-slider.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_block_Slider_Widget());
            
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-grid-block.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_Grid_Block_Widget());

            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/posts-recent.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Posts_Recent_Widget());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/back-to-top.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_BackToTop_Widget());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/date-time.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Date_time());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/news-ticker.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_News_Ticker());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-block.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_block_Widget());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/video-post-tab.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Video_Post_Tab_Widget());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/posts-list.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_List_Widget());
    
            require_once NEWSEQO_EDITOR_ELEMENTOR.'/widgets/post-tab-light.php';
            $widgets_manager->register_widget_type(new Elementor\Newseqo_Post_tab_light_Widget());

    
        }
    
	
        public static function _get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Newseqo_Shortcode();
        }
        return self::$_instance;
    }

}
$Newseqo_Shortcode = Newseqo_Shortcode::_get_instance();

endif;