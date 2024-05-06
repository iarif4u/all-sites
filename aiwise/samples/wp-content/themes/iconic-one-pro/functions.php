<?php
/*
 * Iconic One Theme's Functions file, this is the heart of theme, modification directly is not recommended.
 * Iconic One Supports Child Themes, it is the way to go.
 * If you want to change design use custom.css, details at themonic.com/iconic-one/
 * Use a child theme for customization (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes).
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 * © 2013 Shashank Singh, Themonic.com
 */

/*
 * Primary content width according to the design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 665;

/*
 * Iconic One supported features and Registering defaults
 */
function themonic_setup() {
	/*
	 * Making Iconic One ready for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'themonic', get_template_directory() . '/languages' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	
	// Let WordPress manage the title
	add_theme_support( 'title-tag' );

	// Woocommerce support
	add_theme_support( 'woocommerce' );
	
	// Adds support for Navigation menu, Iconic One uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'themonic' ) );
	
	// Iconic One supports custom background color and image using default wordpress funtions.
	add_theme_support( 'custom-background', array(
		'default-color' => 'e8e8e8',
	) );

	// Uncomment the following two lines to add support for post thumbnails - for classic blog layout
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 665, 9999 ); // Unlimited height, soft crop
	
}
add_action( 'after_setup_theme', 'themonic_setup' );

add_image_size('excerpt-thumbnail', 200, 140, true); // Sets Index Page Thumbnails
add_image_size( 'themonic-thumbnail', 60, 42, true); // Sets Related and Recent Posts Thumbnails
add_image_size( 'ioslider-thumbnail', 658, 300, true); // Sets Slider Thumbnails


include("inc/io-customization.php");

 /*
 * Loads the Themonic Customizer for live customization, to learn more visit Themonic.com
 */
 require_once( get_template_directory() . '/inc/themonic-customizer.php' );
 
/*
 * Enqueueing scripts and styles for front-end of the Themonic Framework.
 * @since Iconic One Pro 1.0
 */ 
 
function themonic_excerpt_length( $length ) {
	return 58;
}
add_filter( 'excerpt_length', 'themonic_excerpt_length', 999 );

// Remove the ... from excerpt and change the text
// Changing excerpt more
   function themonic_excerpt_more($more) {
   global $post;
   return '… <span class="read-more"><a href="'. get_permalink($post->ID) . '">' . __( 'Read More', 'themonic' ) . ' &raquo;</a></span>';
   }
  add_filter('excerpt_more', 'themonic_excerpt_more'); 
 
function themonic_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

 /*
	 * Adds Selectnav.js JavaScript for handling the navigation menu and creating a select based navigation for responsive layout.
 */
   wp_enqueue_script('themonic-mobile-navigation', get_template_directory_uri() . '/js/selectnav.js', array('jquery'), '', true );
/*
     * Loads the awesome readable ubuntu font CSS file for Iconic One.
*/


	/*
	 * Loads Themonic's main stylesheet and the custom stylesheet.*/
	wp_enqueue_style( 'themonic-style', get_stylesheet_uri(), array(), '3.5.1', 'all' );
	wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/custom.css' );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'themonic-ie', get_template_directory_uri() . '/css/ie.css', array( 'themonic-style' ), '20130305' );
	$wp_styles->add_data( 'themonic-ie', 'conditional', 'lt IE 9' );
	
	 /*
	 Adds respond.js JavaScript for handling the navigation menu responsiveness on IE 8 and below.
	 */
		wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js');
}
add_action( 'wp_enqueue_scripts', 'themonic_scripts_styles' );

/*
 * Default Nav Menu fallback to Pages menu, 
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 * @since Iconic One Pro 1.0
 */
function themonic_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'themonic_page_menu_args' );

/**
 * Enqueue Google Fonts Example
 */
function iop_custom_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'google_font_setting', customizer_library_get_default( 'google_font_setting' ) ),

	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'iop_custom_fonts', $font_uri, array(), null, 'screen' );

}
add_action( 'wp_enqueue_scripts', 'iop_custom_fonts' );

/**
 * Registers the main widgetized sidebar and footer area.
 *
 * @since Iconic O-n-e PRO, Footer widgets since 1.1.2
 */
function themonic_widgets_init() {
	   // Define Main Sidebar Widget Area
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'themonic' ),
		'id' => 'themonic-sidebar',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'themonic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<p class="widget-title">',
		'after_title' => '</p>',
	) );
	
	   // Define Footer Widget Area
    register_sidebar(array(
        'name' => __('Footer Widget One', 'themonic'),
        'description' => __('Footer widget one, Enable this area from Control Panel >> Main Settings', 'themonic'),
        'id' => 'footer-one',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	   register_sidebar(array(
        'name' => __('Footer Widget Two', 'themonic'),
        'description' => __('Footer widget two', 'themonic'),
        'id' => 'footer-two',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	   register_sidebar(array(
        'name' => __('Footer Widget Three', 'themonic'),
        'description' => __('Footer widget three', 'themonic'),
        'id' => 'footer-three',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
		   // Define Footer Widget Area
    register_sidebar(array(
        'name' => __('Home Page Widget One', 'themonic'),
        'description' => __('Home Page Widget One, Enable this area from Customizer -> V3 Control Panel >> Layout Settings. Do not use sticky posts if activating this.', 'themonic'),
        'id' => 'hpw-one',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
	   register_sidebar(array(
        'name' => __('Home Page Widget Two, Enable this area from Customizer -> V3 Control Panel >> Layout Settings', 'themonic'),
        'description' => __('Home Page Widget Two', 'themonic'),
        'id' => 'hpw-two',
        'before_widget' => '<div id="%1$s" class=" widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<p class="widget-title">',
        'after_title' => '</p>'
    ));
}
add_action( 'widgets_init', 'themonic_widgets_init' );

if ( ! function_exists( 'themonic_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<div class="assistive-text"><?php _e( 'Post navigation', 'themonic' ); ?></div>
			<div class="nav-previous alignleft"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themonic' ) ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themonic' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'themonic_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own themonic_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'themonic' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'themonic' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 30 );
					printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						// Adds Post Author to comments posted by the article writer
						( $comment->user_id === $post->post_author ) ? '<span> ' . __( 'Post author', 'themonic' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date */
						sprintf( __( '%1$s', 'themonic' ), get_comment_date() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'themonic' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'themonic' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'themonic' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'themonic_entry_meta' ) ) :
/**
 * For Meta information for categories, tags, permalink, author, and date.
 *
 * Create your own themonic_entry_meta() to override in a child theme.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'themonic' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'themonic' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'themonic' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'themonic' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'themonic' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'themonic' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/*
 * WP Body Class Extention :
 * 1. Using 2 No.s of full-width layout one with comments and one without.
 * 2. White or empty background color.
 * 3. Custom fonts enabled.
 * 4. Single or multiple authors.
 *
 * @since Iconic One Pro 1.0, last changed in v1.2
 */
function themonic_body_class( $classes ) {
	$background_color = get_background_color();

	if ( is_page_template( 'page-templates/full-width.php' ) || is_page_template( 'page-templates/no-title-full-width.php' ) || is_page_template( 'page-templates/page-date-bar-fullwidth.php' ) || is_page_template( 'page-templates/full-width-with-author.php' ) )
		$classes[] = 'full-width';
		
	if ( is_page_template( 'page-templates/no-header.php' ) )
		$classes[] = 'no-header';	

	if ( empty( $background_color ) )
		$classes[] = 'custom-background-empty';
	elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
		$classes[] = 'custom-background-white';

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'themonic-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';
	
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'themonic_body_class' );

/*
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'themonic-sidebar' ) ) {
		global $content_width;
		$content_width = 1040;
	}
}
add_action( 'template_redirect', 'themonic_content_width' );

/* I-c-o-n-i-c O-n-e welcome text */
if ( is_admin() && isset($_GET['activated'] ) && $pagenow ==	"themes.php" )
	wp_redirect( 'themes.php?page=iconic_one_pro_options');

/** Registers an editor stylesheet for the theme. */
function iop_block_editor_styles() {
    wp_enqueue_style( 'iop-editor-styles', get_theme_file_uri( '/css/iop-block-editor-style.css' ), false, '1.0', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'iop_block_editor_styles' );
function iop_jq_admin_script( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_script( 'jquery' );
}
add_action( 'admin_enqueue_scripts', 'iop_jq_admin_script' );

/* For backwards compatibility with versions of WordPress older than 5.2. */

if ( ! function_exists( 'wp_body_open' ) ) {

	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
} 
/*
* Include helper functions
*/
add_theme_support( 'yoast-seo-breadcrumbs' );
require_once('themonic/themonic-options.php');
require_once( get_template_directory() . '/inc/io-pro-functions.php' );
require_once( get_template_directory() . '/inc/extra-functions.php' );
require_once( get_template_directory() . '/inc/widget-recent-thumbnail.php' );
require_once( get_template_directory() . '/inc/widget-popular-posts.php' );
require_once( get_template_directory() . '/inc/widget-feed-subscribe.php' );