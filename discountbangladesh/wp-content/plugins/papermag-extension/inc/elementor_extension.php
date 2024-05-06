<?php 
final class papermag_Elementor_Dependency {
    const VERSION                   = '1.0.0';
    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
    const MINIMUM_PHP_VERSION       = '7.0';
    private static $_instance       = null;
    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
            self::$_instance->papermag_inlcudes_fiels();
        }
        return self::$_instance;
    }
    public function __construct() {
        add_action( 'after_setup_theme', [$this, 'init'] );
    }

    public function init() {
        if ( !did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_missing_main_plugin'] );
            return;
        }
        if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_elementor_version'] );
            return;
        }
        if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
            add_action( 'admin_notices', [$this, 'admin_notice_minimum_php_version'] );
            return;
        }
        add_action( 'elementor/widgets/register', [$this, 'init_widgets'] );
    }

    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" to be installed and activated.', 'elementor-test-extension' ),
            '<strong>' . esc_html__( 'Theme', 'elementor-test-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
            '<strong>' . esc_html__( 'Theme', 'elementor-test-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }

        $message = sprintf(
            esc_html__( '%1$s requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
            '<strong>' . esc_html__( 'exodus Theme', 'elementor-test-extension' ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', 'elementor-test-extension' ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    private function papermag_inlcudes_fiels(){
        include_once PAPERMAG_DIR_PATH . "inc/post-functions.php";
    }
    

    public function init_widgets() {

        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-grid.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-list-item.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-grid-carousel.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/section-title.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-video.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-tab.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-list-tab.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-grid-column.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/contact-info-widget.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-block-left.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-overlay.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/authore-quote.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-list-small.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-grid-column-2.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/politice-post-tab.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-list-left-img.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-grid-politics.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-item-list.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/authore-post-video-popup.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/famouse-column.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-single-video.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/info-box.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/team.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/breadcrumb.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/sports-slider.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/sports-score-item.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-sports-tab.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/recent-add-post.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/sports-upcoming-match.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/post-list-style.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/sports-video-tab.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/recent-view-post.php';
        require_once PAPERMAG_DIR_PATH . '/inc/widgets/category-list.php';

        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_grid() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_list() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \post_grid_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_section_heading() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_video() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_list_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_grid_column() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_contact_info_widget() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_block_left() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_overlay() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_auth_info() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_list_sm() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_grid_column_2() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_politices_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_list_left_img() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_grid_pol() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus__item_post_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_auth_post_video() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_famouse_column() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_post_single_video() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_info_box() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_team() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_breadcrumb() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \pmg_sports_slider() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \papermag_sports_score() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \ppm_post_sports_tabs() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \recent_add_post_carousel() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \exodus_match_tab() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \papermag_post_list_syl() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \video_post_sports_tabs() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \pmg_recent_view_post() );
        \Elementor\Plugin::instance()->widgets_manager->register( new \pmg_cat_list() );
    }
}

papermag_Elementor_Dependency::instance();

//Add Elementor Category
function papermag_elementor_widget_categories( $elements_manager ) {

    $elements_manager->add_category(
        'papermag-category',
        [
            'title' => esc_html__( 'papermag', 'papermag-extension' ),
        ]
    );

}
add_action( 'elementor/elements/categories_registered', 'papermag_elementor_widget_categories' );