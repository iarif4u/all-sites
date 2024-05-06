<?php
/**
* PaperMag functions and definitions
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*
* @package PaperMag
*/

/**
* Define Dir
*/
define( 'PAPERMAG_THEME_DRI', get_template_directory() );
define( 'PAPERMAG_THEME_URI', get_template_directory_uri() );
define( 'PAPERMAG_CSS_PATH', PAPERMAG_THEME_URI . '/assets/css' );
define( 'PAPERMAG_JS_PATH', PAPERMAG_THEME_URI . '/assets/js' );
define( 'PAPERMAG_ICON_PATH', PAPERMAG_THEME_URI . '/assets/fonts/fontawesome/css' );
define( 'PAPERMAG_IMG_PATH', PAPERMAG_THEME_URI . '/assets/images' );
if ( ! function_exists( 'papermag_setup' ) ) :
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/

function papermag_setup() {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on papermag, use a find and replace
		 * to change 'papermag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'papermag', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

        //Custom Image Size
        add_image_size( 'papermag_blog_940_400', 940, 400, true );
        add_image_size( 'papermag_blog_940_560', 940, 560, true );
		
		//remove Widgets Block
		remove_theme_support( 'widgets-block-editor' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'papermag' ),
				'topmenu' => esc_html__( 'Top Nav', 'papermag' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

        // add support for post formats
        add_theme_support('post-formats', [
            'standard', 'image', 'video', 'gallery'
        ]);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'papermag_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'papermag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
    *
    * Priority 0 to make it available to lower priority callbacks.
    *
    * @global int $content_width
    */

    function papermag_content_width() {
        $GLOBALS['content_width'] = apply_filters( 'papermag_content_width', 640 );
    }
    add_action( 'after_setup_theme', 'papermag_content_width', 0 );

    /**
    * Register widget area.
    *
    * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
    */

    function papermag_widgets_init() {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Sidebar', 'papermag' ),
                'id'            => 'sidebar-1',
                'description'   => esc_html__( 'Add widgets here.', 'papermag' ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>',
            )
        );
    }
    add_action( 'widgets_init', 'papermag_widgets_init' );

    if ( ! function_exists( 'papermag_fonts_url' ) ) :
    /**
    * Register Google fonts for Blessing.
    */

    function papermag_fonts_url() {
        $fonts_url = '';
        $font_families     = array();
        $subsets   = 'latin';

        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Roboto: on or off', 'papermag' ) ) {
            $font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
        }

        if ( $font_families ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }
        return esc_url_raw( $fonts_url );
    }
    endif;
    /**
    * Enqueue scripts and styles.
    */

    function papermag_scripts() {
        // Add custom fonts, used in the taffees stylesheet.
        wp_enqueue_style( 'papermag-custom-fonts', papermag_fonts_url(), array(), null );

        //papermag stylesheet load
        wp_enqueue_style( 'bootstrap', PAPERMAG_CSS_PATH . '/bootstrap.min.css' );
        wp_enqueue_style( 'nice-select', PAPERMAG_CSS_PATH . '/nice-select.css' );

        wp_enqueue_style( 'papermag-fontawesome', PAPERMAG_ICON_PATH . '/all.min.css' );

        wp_enqueue_style( 'owl-carousel', PAPERMAG_CSS_PATH . '/owl.carousel.css' );
        wp_enqueue_style( 'magnific-popup', PAPERMAG_CSS_PATH . '/magnific-popup.css' );

        wp_enqueue_style( 'papermag-main', PAPERMAG_CSS_PATH . '/papermag-style.css' );
        if (is_rtl()) {
            wp_enqueue_style( 'papermag-rtl', PAPERMAG_CSS_PATH . '/rtl.css' );
        }
        wp_enqueue_style( 'papermag-responsive', PAPERMAG_CSS_PATH . '/responsive.css' );

        wp_enqueue_style( 'papermag-style', get_stylesheet_uri(), array(), '1.0' );
        wp_enqueue_style( 'papermag-responsive', PAPERMAG_CSS_PATH . '/responsive.css' );

        //papermag Scripts load
        wp_enqueue_script( 'bootstrap',  PAPERMAG_JS_PATH . '/bootstrap.min.js', array( 'jquery' ),  '5.0.2', true );
        wp_enqueue_script( 'owl-carousel',  PAPERMAG_JS_PATH . '/owl.carousel.min.js', array( 'jquery' ),  '5.0.2', true );
        wp_enqueue_script( 'magnific-popup',  PAPERMAG_JS_PATH . '/jquery.magnific-popup.min.js', array( 'jquery' ),  '1.0', true );
        wp_enqueue_script( 'lottie-player',  PAPERMAG_JS_PATH . '/lottie-player.js', array( 'jquery' ),  null, true );
        wp_enqueue_script( 'slicknav',  PAPERMAG_JS_PATH . '/jquery.slicknav.js', array( 'jquery' ),  null, true );
        wp_enqueue_script( 'nice-select',  PAPERMAG_JS_PATH . '/jquery.nice-select.min.js', array( 'jquery' ),  null, true );
        wp_enqueue_script( 'papermag-scripts',  PAPERMAG_JS_PATH . '/papermag-scripts.js', array( 'jquery' ),  '1.0', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'papermag_scripts' );

    /**
     * Implement the Custom Header feature.
     */
    if ( file_exists( PAPERMAG_THEME_DRI.'/inc/cs-framework-functions.php' ) ) {
        require_once  PAPERMAG_THEME_DRI.'/inc/cs-framework-functions.php';
    }

    /**
     *  Bootstrap Navwalker
     */
    require PAPERMAG_THEME_DRI . '/inc/class-wp-bootstrap-navwalker.php';

    /**
    * Implement the Custom Header feature.
    */
    require PAPERMAG_THEME_DRI . '/inc/custom-header.php';

    /**
    * Custom template tags for this theme.
    */
    require PAPERMAG_THEME_DRI . '/inc/template-tags.php';

    /**
    * Custom template tags for this theme.
    */
    require PAPERMAG_THEME_DRI . '/inc/papermag-function.php';

    /**
    * Functions which enhance the theme by hooking into WordPress.
    */
    require PAPERMAG_THEME_DRI . '/inc/template-functions.php';

    /**
    * Customizer additions.
    */
    require PAPERMAG_THEME_DRI . '/inc/customizer.php';

    /**
    * Required Plugin Activation.
    */
    require PAPERMAG_THEME_DRI . '/inc/plugin-activation.php';


    /**
    * One Click Demo Import
    */
    require PAPERMAG_THEME_DRI . '/inc/custom-style.php';

