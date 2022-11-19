<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Newseqo_Admin_Settings' ) ) {

	/**
	 * Newseqo Admin Settings
	 */
	class Newseqo_Admin_Settings {

		private $has_pro;
		/**
		 * Menu page title
		 *
		 * @since 1.0
		 * @var array $menu_page_title
		 */
		public static $menu_page_title;

		/**
		 * Page title
		 *
		 * @since 1.0
		 * @var array $page_title
		 */
		public static $page_title = 'Newseqo';

		/**
		 * Plugin slug
		 *
		 * @since 1.0
		 * @var array $plugin_slug
		 */
		public static $plugin_slug = 'newseqo';

		/**
		 * Default Menu position
		 *
		 * @since 1.0
		 * @var array $default_menu_position
		 */
		public static $default_menu_position = 60;

		/**
		 * Parent Page Slug
		 *
		 * @since 1.0
		 * @var array $parent_page_slug
		 */
		public static $parent_page_slug = 'general';

		/**
		 * Current Slug
		 *
		 * @since 1.0
		 * @var array $current_slug
		 */
		public static $current_slug = 'general';

	
		/**
		 * Constructor
		 */
		public function __construct() {

			if ( ! is_admin() ) {
				return;
			}
			$this->has_pro = defined('NEWSEQO_PRO_ACTIVE');

			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
			
			$this->handle_get_help_menu();
		}

		/**
		 * Admin settings init
		 */
		public static function init_admin_settings() {
			self::$menu_page_title = apply_filters( 'newseqo_menu_page_title', __( 'Newseqo', 'newseqo' ) );
			self::$page_title      = apply_filters( 'newseqo_page_title', __( 'Newseqo', 'newseqo' ) );
			$requested_page = isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : '';// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( strpos( $requested_page, self::$plugin_slug ) !== false ) {
				do_action( 'newseqo_admin_settings_scripts' );
			}
			add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 61 );
			add_action( 'newseqo_header_right_section', __CLASS__ . '::top_header_right_section' );
			add_action( 'newseqo_notice_before_markup', __CLASS__ . '::notice_assets' );
		}

		public function handle_get_help_menu(){
			require_once get_template_directory() . '/inc/libs/utils/pro-awareness/pro-awareness.php';

			// init pro menu class
			\Wpmet\Libs\Pro_Awareness::init();

			/**
             * Show go Premium menu
             */
            \Wpmet\Libs\Pro_Awareness::instance('newseqo')
			->set_parent_menu_slug('newseqo')
			->set_parent_menu_text( esc_html__("Newseqo"), "newseqo" )
            ->set_default_grid_thumbnail( get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/support.png' )
            ->set_default_grid_link('http://support.themewinter.com/support-center/login')
            ->set_default_grid_desc('Feel free to contact us 24/7 for any technical issues')
            ->set_page_grid([
                'url' => 'https://www.facebook.com/groups/1319571704894531',
                'title' => 'Join the Community',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/community.png',
				'description' => esc_html__('Join our Facebook Group to learn and share Newseqo related info','newseqo'),
            ])
            ->set_page_grid([
                'url' => 'https://www.youtube.com/watch?v=lge5FOXOZvk&t=5s',
                'title' => 'Video Tutorials',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/video_tutorial.png',
				'description' => esc_html__('Explore our YouTube Channel to learn more about Newseqo theme','newseqo'),

            ])
            ->set_page_grid([
                'url' => '#',
                'title' => 'Feature Request',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/feature_request.png',
				'description' => esc_html__('Missing any feature you badly need? Submit a feature request now','newseqo'),

            ])
            ->set_page_grid([
                'url' => 'https://support.themewinter.com/docs/themes/docs-category/newseqo/',
                'title' => 'Documentation',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/documentation.png',
				'description' => esc_html__('Learn everything you need to know about Newseqo theme','newseqo'),

            ])
            ->set_page_grid([
                'url' => admin_url('customize.php'),
                'title' => 'Customizer',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/customizer.png',
				'description' => esc_html__('Customize any section of the Newseqo theme effortlessly','newseqo'),

            ])
            ->set_page_grid([
                'url' => admin_url('themes.php?page=pt-one-click-demo-import'),
                'title' => 'Demo Contents',
				'thumbnail' => get_template_directory_uri(  ) . '/inc/libs/utils/pro-awareness/assets/demo_content.png',
				'description' => esc_html__('Choose the demo content you need for your WordPress website','newseqo'),

            ])
            ->call();
		}

		/**
		 * Add main menu
		 *
		 * @since 1.0
		 */
		public static function add_admin_menu() {

			$position    = self::$default_menu_position;
			$page_title     = self::$menu_page_title;
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';
			$icon_url   = 'dashicons-admin-generic';  

			add_menu_page(  $page_title,  $page_title, $capability, 'newseqo_get_help', $page_menu_func,$icon_url, $position);

		}

		/**
		 * Menu callback
		 *
		 * @since 1.0
		 */
		public static function menu_callback() {

			$current_slug = isset( $_GET['action'] ) ? sanitize_text_field( wp_unslash( $_GET['action'] ) ) : self::$current_slug; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

			$active_tab   = str_replace( '_', '-', $current_slug );
			$current_slug = str_replace( '-', '_', $current_slug );

			$newseqo_icon           = apply_filters( 'newseqo_page_top_icon', true );
			$newseqo_visit_site_url = apply_filters( 'newseqo_site_url', 'https://themewinter.com/newseqo/' );
			$newseqo_wrapper_class  = apply_filters( 'newseqo_welcome_wrapper_class', array( $current_slug ) );

			?>
			<div class="newseqo-menu-page-wrapper wrap newseqo-clear <?php echo esc_attr( implode( ' ', $newseqo_wrapper_class ) ); ?>">
				<div class="newseqo-theme-page-header">
					<div class="newseqo-container newseqo-flex">
						<div class="newseqo-theme-title">
							<a href="<?php echo esc_url( $newseqo_visit_site_url ); ?>" target="_blank" rel="noopener" >
							<?php if ( $newseqo_icon ) { ?>
								<!-- <img src="<?php echo esc_url( NEWSEQO_IMG . '/banner.png' ); ?>" class="newseqo-admin-banner" alt="<?php echo esc_attr( self::$page_title ); ?> " > -->
								<div class="banner-logo-area" style="background-image: url(<?php echo esc_url( NEWSEQO_IMG . '/banner.png' ) ?>);">
									<img src="<?php echo esc_url( NEWSEQO_IMG . '/logo/logo-dark.png' ); ?>" class="newseqo-theme-icon" alt="<?php echo esc_attr( self::$page_title ); ?> " >
									<span class="newseqo-theme-version"><?php echo esc_html( NEWSEQO_VERSION ); ?></span>
									<p><?php echo esc_html('News & magazine WordPress Theme') ?></p>
								</div>
							<?php } ?>
							</a>
						</div>


					</div>
				</div>

				<?php do_action( 'newseqo_menu_' . esc_attr( $current_slug ) . '_action' ); ?>
			</div>
			<?php
		}

		public static function top_header_right_section() {

			do_action("newseqo/dashboard/after_content");
		}
	
	}

	new Newseqo_Admin_Settings();
}
