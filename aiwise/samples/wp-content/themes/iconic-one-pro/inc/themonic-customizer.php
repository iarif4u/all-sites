<?php

/** 
 * Adding customizer link under Appearance menu
 */ 
	function iconic_one_pro_customize_button() {
	    $theme_page = add_theme_page(
	        __( 'Iconic One' , 'themonic' ),
	        __( 'Basic Settings' , 'themonic' ),  
	        'edit_theme_options' ,       
	        'customize.php'            
	    );
	} add_action('admin_menu', 'iconic_one_pro_customize_button');


/*
 * Iconic One Customizer - visit Themonic.com
 *
 * @since Iconic One Pro 1.0
 *
 */
function themonic_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
add_action( 'customize_register', 'themonic_customize_register' );

/*
 * Loads Theme Customizer preview changes asynchronously.
 *
 * @since Iconic One Pro 1.0
 */
function themonic_customize_preview_js() {
	wp_enqueue_script( 'themonic-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130527', true );
}
add_action( 'customize_preview_init', 'themonic_customize_preview_js' );
/*
 * Sanitize functions.
 */
function iop_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
function iop_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
function iop_sanitize_select( $input, $setting ) {
  // Ensure input is a slug.
  $input = sanitize_key( $input );
  // Get list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control( $setting->id )->choices;
  // If the input is a valid key, return it; otherwise, return the default.
  return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
//Themonic customizer begins
function themonic_theme_customizer( $wp_customize ) {
     $wp_customize->add_section( 'themonic_logo_section' , array(
    'title'       => __( 'Logo', 'themonic' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themonic_logo' , array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themonicl_logo', array(
    'label'    => __( 'Logo', 'themonic' ),
    'section'  => 'themonic_logo_section',
    'settings' => 'themonic_logo',
) ) );
$wp_customize->add_setting('full_width_header', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('full_width_header', array(
        'type' => 'checkbox',
        'label' => __('I have uploaded 1040px full width header image(removes white space around uploaded image)', 'themonic' ),
        'section' => 'themonic_logo_section',
		'priority'    => 25,
));
$wp_customize->add_setting('show_both_logo_title', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('show_both_logo_title', array(
        'type' => 'checkbox',
        'label' => __('Show Logo image along with Title and Description', 'themonic' ),
        'section' => 'themonic_logo_section',
		'priority'    => 25,
));
$wp_customize->add_setting('heading_one_at_home', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('heading_one_at_home', array(
        'type' => 'checkbox',
        'label' => __('Implement Site title as H1 tag for SEO.', 'themonic' ),
		'description' => __('It hides the site title while keeping h1 in source code for SEO purpose, Only works when the settings above it (logo with title and description) is checked', 'themonic' ),
        'section' => 'themonic_logo_section',
		'priority'    => 25,
));
//Footer text area
class Themonic_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public function render_content() {
?>
<label>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<textarea rows="4" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
</label>
<?php
	}
}

$wp_customize->add_section('content' , array(
	'priority'    => 200,
));
$wp_customize->add_setting('textarea_copy', array('default' => 'Copyright 2015', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Themonic_Textarea_Control($wp_customize, 'textarea_copy', array(
	'label' => 'Footer Copyright',
	'section' => 'content',
	'settings' => 'textarea_copy',
)));
$wp_customize->add_section('content' , array(
	'title' => __('Footer','themonic'),
	'priority'    => 300,
	'panel' => 'iop_control_panel'
));
$wp_customize->add_setting('custom_text_right', array('default' => 'Custom Text Right', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Themonic_Textarea_Control($wp_customize, 'custom_text_right', array(
	'label' => 'Custom Footer Text Right',
	'section' => 'content',
	'settings' => 'custom_text_right',
)));

//social text area
class Social_Textarea_Control extends WP_Customize_Control {
	public $type = 'textarea';
	public function render_content() {
?>
<label>
	<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	<textarea rows="1" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
</label>
<?php
	}
}

$wp_customize->add_setting('iop_social_activate', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('iop_social_activate', array(
        'type' => 'checkbox',
        'label' => __('Display Header Social Icons','themonic'),
		'description' => __('Leave respective fields empty to hide individual icons','themonic'),
        'section' => 'sl_content',
		'priority'    => 1,
));
$wp_customize->add_section('sl_content' , array(
'title' => __('Social','themonic'),
	'priority'    => 40,
	'panel' => 'iop_control_panel'
));

$wp_customize->add_setting('io_search_header', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('io_search_header', array(
	'type' => 'checkbox',
	'label' => 'Search Button/Bar',
	'description' => __('Add Search bar before twitter, if you are enabling this, do not use search widget in sidebar to prevent duplicate HTML IDs','themonic'),
	'section' => 'sl_content',
));

$wp_customize->add_setting('twitter_url', array('default' => 'http://twitter.com/', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'twitter_url', array(
	'label' => 'Twitter url',
	'section' => 'sl_content',
	'settings' => 'twitter_url',
)));

$wp_customize->add_setting('facebook_url', array('default' => 'http://facebook.com/', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'facebook_url', array(
	'label' => 'Facebook url',
	'section' => 'sl_content',
	'settings' => 'facebook_url',
)));

$wp_customize->add_setting('insta_url', array('default' => 'https://instagram.com', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'insta_url', array(
	'label' => 'Instagram url',
	'section' => 'sl_content',
	'settings' => 'insta_url',
)));

$wp_customize->add_setting('rss_url', array('default' => 'http://wordpress.org/', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'rss_url', array(
	'label' => 'RSS url',
	'section' => 'sl_content',
	'settings' => 'rss_url',
	'priority'    => 100,
)));
$wp_customize->add_setting('linkedin_url', array('default' => 'http://linkedin.com', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'linkedin_url', array(
	'label' => 'Linkedin url',
	'section' => 'sl_content',
	'settings' => 'linkedin_url',
)));
$wp_customize->add_setting('youtube_url', array('default' => 'http://youtube.com', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'youtube_url', array(
	'label' => 'YouTube url',
	'section' => 'sl_content',
	'settings' => 'youtube_url',
)));
$wp_customize->add_setting('pinterest_url', array('default' => 'http://pinterest.com', 'sanitize_callback' => 'iop_sanitize_text',));
$wp_customize->add_control(new Social_Textarea_Control($wp_customize, 'pinterest_url', array(
	'label' => 'Pinterest url',
	'section' => 'sl_content',
	'settings' => 'pinterest_url',
)));
$wp_customize->add_setting('iop_social_square', array('default' => '', 'sanitize_callback' => 'iop_sanitize_checkbox',));
$wp_customize->add_control('iop_social_square', array(
        'type' => 'checkbox',
        'label' => __('Square Shape Social Icons','themonic'),
		'description' => __('Square shape social icons in the header','themonic'),
        'section' => 'sl_content',
		'priority'    => 2,
));
//V3 Control Panel begins
	$wp_customize->add_panel('iop_control_panel', array(
      'capabitity' => 'edit_theme_options',
      'description' => __('Theme Options', 'themonic'),
      'priority' => 1,
      'title' => __('V3 Control Panel', 'themonic')
	));
	$wp_customize->add_section('io_pro_control_panel_sec_one', array(
      'priority' => 1,
      'title' => __('Design Settings', 'themonic'),
      'panel' => 'iop_control_panel'
	));
	// add color picker control
	$wp_customize->add_setting( 'pmain_theme_color', array(
	'default' => '#1166b1',
	'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pmain_theme_color', array(
	'label' => __('Main Theme Color','themonic'),
	'description' => __('Edit main theme color', 'themonic'),
	'section' => 'io_pro_control_panel_sec_one',
	'settings' => 'pmain_theme_color',
	) ) );
	$wp_customize->add_setting( 'iop_menu_text_color', array(
	'default' => '#ffffff',
	'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iop_menu_text_color', array(
	'label' => __('Menu text color','themonic'),
	'description' => __('Could be useful if using light color in the main theme color', 'themonic'),
	'section' => 'io_pro_control_panel_sec_one',
	'settings' => 'iop_menu_text_color',
	) ) );
	// Widget title
	$wp_customize->add_setting( 'pwidget_bg_color', array(
	'default' => '#F2F2F2',
	'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pwidget_bg_color', array(
	'label' => 'Widget Title Background Color',
	'description' => __('Widget title background color for sidebar and footer widgets', 'themonic'),
	'section' => 'io_pro_control_panel_sec_one',
	'settings' => 'pwidget_bg_color',
	) ) );
	$wp_customize->add_setting( 'pwidget_color', array(
	'default' => '#333333',
	'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pwidget_color', array(
	'label' => 'Widget Title Color',
	'description' => __('Widget title color for sidebar and footer widgets', 'themonic'),
	'section' => 'io_pro_control_panel_sec_one',
	'settings' => 'pwidget_color',
	) ) );
	$wp_customize->add_setting( 'google_font_setting', array(
	'default' => 'Ubuntu',
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_control( 'google_font_setting', array(
	'label'   => __( 'Google Font Setting', 'themonic' ),
	'type'    => 'select',
	'choices' => customizer_library_get_font_choices(),
	'section' => 'io_pro_control_panel_sec_one',
	'settings'   => 'google_font_setting',
	) ) ;
	$wp_customize->add_setting( 'themonic_font_size', array(
	'default' => '14',
	'type' => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport' => 'refresh',
	'sanitize_callback' => 'themonic_sanitize_number_range',
	));

	$wp_customize->add_control( 'themonic_font_size', array(
    'type' => 'range',
    'priority' => 10,
    'section' => 'io_pro_control_panel_sec_one',
    'label' => __( 'Font Size', 'themonic' ),
	'description' => __('14px-18px, requires refresh after exiting customizer', 'themonic'),
    'input_attrs' => array(
        'min' => 14,
        'max' => 18,
        'step' => 1,
        'class' => 'example-class',
        'style' => 'color: #0099ff;',
    ),
	));
// Add post settings section 
	$wp_customize->add_section('iop_posts_settings', array(
	'title'    => __('Post Settings', 'themonic'),
	'priority' => 50,
	'panel' => 'iop_control_panel'
	));
	$wp_customize->add_setting( 'iop_breadcrumb_selection', array(
	'capability' => 'edit_theme_options',
	'sanitize_callback' => 'iop_sanitize_select',
	'default' => 'value1',
	));
	$wp_customize->add_control( 'iop_breadcrumb_selection', array(
	'type' => 'select',
	'section' => 'iop_posts_settings',
	'label' => __( 'Choose Breadcrumb' ),
	'description' => __( 'Select Advanced if you want Schema support in Breadcrumbs' ),
	'choices' => array(
	'value1' => __( 'Classic' ),
	'value2' => __( 'Advanced - with Schema support' ),
	'value3' => __( 'Disable Breadcrumb' ),
	'value4' => __( 'Yoast Breadcrumb' ),
	),
	));
	$wp_customize->add_setting( 'iconic_one_pro_full_post', array(
	'default' => '1',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('iconic_one_pro_full_post',array(
	'type' => 'checkbox',
	'label' => __('Show Excerpts on Home Page, remove the check to show full posts on home page. Info: Excerpts prevents duplicate content and helps with SEO', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
	$wp_customize->add_setting( 'iconic_one_catg_home', array(
	'default' => '1',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('iconic_one_catg_home',array(
	'type' => 'checkbox',
	'label' => __('Show Categories on Home Page', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
	$wp_customize->add_setting( 'iconic_one_tag_home', array(
	'default' => '1',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('iconic_one_tag_home',array(
	'type' => 'checkbox',
	'label' => __('Show Tags on Home Page', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
	$wp_customize->add_setting( 'iconic_one_pro_updated_date', array(
	'default' => '',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('iconic_one_pro_updated_date',array(
	'type' => 'checkbox',
	'label' =>  __( 'Replace published date with last updated date ( Display Setting of Author/Date bar is available in Control Panel -> Main Settings )', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
	$wp_customize->add_setting( 'iop_header_search_bar', array(
	'default' => '',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('iop_header_search_bar',array(
	'type' => 'checkbox',
	'label' =>  __('Show Search Bar above header when site is visited on a Mobile phone', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
		$wp_customize->add_setting( 'hpw', array(
	'default' => '1',
	'sanitize_callback' => 'iop_sanitize_checkbox',
	));
	$wp_customize->add_control('hpw',array(
	'type' => 'checkbox',
	'label' => __('Show extra two column widgets on Home Page, above main posts lists ', 'themonic' ),
	'section' => 'iop_posts_settings',
	));
}
add_action('customize_register', 'themonic_theme_customizer');
