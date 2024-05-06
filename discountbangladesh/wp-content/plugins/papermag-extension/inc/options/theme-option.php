<?php
/*
 * Theme Options
 * @package papermag
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {


    //
    // Set a unique slug-like ID
    $prefix = 'papermag';

    //
    // Create options
    CSF::createOptions( $prefix . '_theme_options', array(
        'menu_title'         => 'Papermag Option',
        'menu_slug'          => 'papermag-theme-option',
        'menu_type'          => 'menu',
        'enqueue_webfont'    => true,
        'show_in_customizer' => true,
        'framework_title'    => wp_kses_post( 'PaperMag Options <small>by Raziul <br/> Version: 1.0</small> ' ),
    ) );

    // Create a top-tab
    CSF::createSection( $prefix . '_theme_options', array(
        'id'    => 'header_opts', // Set a unique slug-like ID
        'title' => 'Header',
    ) );

    /*-------------------------------------------------------
     ** Header  Top
    --------------------------------------------------------*/

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Header Top', 'papermag-extension' ),
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Top Infos', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'enable_top_bar',
                'title'   => esc_html__( 'Do You want to Show Header Top Bar', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Header Top Bar', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'      => 'enable_social_profile',
                'title'   => esc_html__( 'Do You want to Show Header Social Icon', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Header Social Icon', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'          => 'top_bar_style',
                'type'        => 'select',
                'title'       => esc_html__('Top Bar Choose', 'papermag-extension'),
                'options'     => array(
                  '1'  => 'Header One Top Bar',
                  '2'  => 'Header Two Top Bar',
                  '3'  => 'Header Three Top Bar',
                ),
                'default'     => '1'
              ),

            array(
                'id'         => 'papermag_social_opt',
                'type'       => 'group',
                'title'      => 'Add Social Icon',
                'dependency' => array( 
                    'enable_top_bar',    '==', 'true',
                ),
                'fields'     => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__( 'Pick Up Social Icon', 'papermag-extension' ),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__( 'Type Social Profile URL', 'papermag-extension' ),
                    )
                )
            ),
            array(
                'id'      => 'enable_header_search',
                'title'   => esc_html__( 'Do You want to Show Header Search', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Header Search', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'      => 'enable_darkmode',
                'title'   => esc_html__( 'Do You want to Show Dark Mode', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Header Dark Mode', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'         => 'ticket_link',
                'type'       => 'link',
                'title'      => esc_html__( 'Get Ticket', 'papermag-extension' ),
                'default'  => array(
                    'url'    => '#',
                    'text'   => 'Get Tickets',
                    'target' => '_blank'
                  ),
                'dependency'  => [
                    'top_bar_style', '==', '3',
                ],
            ),
            array(
                'id'         => 'network_link',
                'type'       => 'link',
                'title'      => esc_html__( 'Network', 'papermag-extension' ),
                'default'  => array(
                    'url'    => '#',
                    'text'   => 'NFL Intercom Network',
                    'target' => '_blank'
                  ),
                'dependency'  => [
                    'top_bar_style', '==', '3',
                ],
            ),

        ),
    ) );
    /*-------------------------------------------------------
     ** Header  Options
    --------------------------------------------------------*/

    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Header', 'papermag-extension' ),
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Site Logo', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'      => 'theme_logo',
                'title'   => esc_html__( 'Main Logo', 'papermag-extension' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Static Logo Image on Header Static', 'papermag-extension' ),
            ),
            array(
                'id'      => 'theme_light_logo',
                'title'   => esc_html__( 'Light Logo', 'papermag-extension' ),
                'type'    => 'media',
                'library' => 'image',
                'desc'    => esc_html__( 'Upload Your Light Logo of your Dark Theme', 'papermag-extension' ),
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Layout', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'      => 'global_nav_menu',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Header Style', 'papermag-extension' ),
                'options' => array(
                    'header-style-one' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-1.png',
                    'header-style-two' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-2.png',
                    'header-style-three' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-3.png',
                ),
                'default' => 'header-style-one',
            ),

            array(
                'id'      => 'theme_header_sticky',
                'title'   => esc_html__( 'Sticky Header', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable Sticky Header', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Header Two Options', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'          => 'choose_date_style',
                'type'        => 'select',
                'title'       => esc_html__('Date Format', 'text-domain'),
                'chosen'      => true,
                'placeholder' => esc_html__('Choose Date Format', 'text-domain'),
                'options'     => array(
                    'date'        => 'Date',
                    'date_time'   => 'Date & Time',
                    'time'        => 'Time',
                ),
                'default'     => 'date'
              ),
            array(
                'id'         => 'mailText',
                'type'       => 'text',
                'title'      => esc_html__( 'Enter Your Email Text', 'papermag-extension' ),
            ),
            array(
                'id'         => 'head_top_mail',
                'type'       => 'text',
                'title'      => esc_html__( 'Enter Your Email', 'papermag-extension' ),
            ),
            array(
                'id'         => 'search_text',
                'type'       => 'text',
                'title'      => esc_html__( 'Header Search Text', 'papermag-extension' ),
            ),
            array(
                'id'         => 'potcast_text',
                'type'       => 'text',
                'title'      => esc_html__( 'Header Podcast Text', 'papermag-extension' ),
            ),
            array(
                'id'         => 'potcast_url',
                'type'       => 'text',
                'title'      => esc_html__( 'Header Podcast URL', 'papermag-extension' ),
            ),
            array(
                'id'         => 'video_text',
                'type'       => 'text',
                'title'      => esc_html__( 'Header Video Text', 'papermag-extension' ),
            ),
            array(
                'id'         => 'video_url',
                'type'       => 'text',
                'title'      => esc_html__( 'Header Video URL', 'papermag-extension' ),
            ),

        ),
    ) );

    // Preloader section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Site Preloader',
        'parent'     => 'header_opts',
        'icon'   => 'fa fa-wrench',
        'fields' => array(

            array(
                'id'      => 'preloader_enable',
                'title'   => esc_html__( 'Enable Preloader', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable or Disable Preloader', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'          => 'preloader-background',
                'type'        => 'color',
                'title'       => esc_html__( 'Preloader background', 'papermag-extension' ),
                'output'      => '.papermag-preloader',
                'output_mode' => 'background-color',
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ),
            array(
                'id' => 'loader_height',
                'type' => 'slider',
                'title' => 'Loader Height',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '.papermag-preloader lottie-player',
                'output_mode' => 'height',
                'default' => 200,
                'desc' => esc_html__('Set Loader Spinign Height 200px.', 'papermag-extension') ,
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ) ,
            array(
                'id' => 'loader_width',
                'type' => 'slider',
                'title' => 'Loader Width',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '.papermag-preloader lottie-player',
                'output_mode' => 'width',
                'default' => 200,
                'desc' => esc_html__('Set Loader Spinign Width 200px.', 'papermag-extension') ,
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ) ,
            array(
                'id'      => 'loader_speed',
                'type'    => 'text',
                'title'   => 'Preloader Animation Speed',
                'default' => '1.5',
                'desc'    => 'Type Preloader Animation Speed eg:1.5',
                'dependency'  => [
                    'preloader_enable', '==', 'true',
                ],
            ),
            

        ),
    ) );
    // Preloader section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Manu',
        'icon'   => 'fa fa-caret-square-o-down',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Menu Typography', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'     => 'menu-typography',
                'type'   => 'typography',
                'output' => '.primary-menu ul>li>a',
            ),
            array(
                'id'          => 'menu-hover-color',
                'type'        => 'color',
                'title'       => esc_html__( 'Menu Hover/active Color', 'papermag-extension' ),
                'output'      => '.primary-menu ul>li>a:hover',
                'output_mode' => 'color',
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Dropdown Menu Typography', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'     => 'menudropdown-typography',
                'type'   => 'typography',
                'output' => '.primary-menu ul#primary-menu li ul li a',
            ),
            array(
                'id'          => 'menu-dropdown-bg',
                'type'        => 'color',
                'title'       => esc_html__( 'Dropdown BG Color', 'papermag-extension' ),
                'output'      => '.primary-menu ul#primary-menu li ul',
                'output_mode' => 'background-color',
            ),
            array(
                'id' => 'dropdown_width',
                'type' => 'slider',
                'title' => 'Dropdown Menu Height',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '.primary-menu ul#primary-menu li ul',
                'output_mode' => 'width',
                'default' => 215,
                'desc' => esc_html__('Set Dropdown Menu Width in px. Default Height 215px.', 'papermag-extension') ,
            ) ,

        ),
    ) );
    /*-------------------------------------
     ** Typography Options
    -------------------------------------*/
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Typography', 'papermag-extension' ),
        'id'     => 'typography_options',
        'icon'   => 'fa fa-font',
        'fields' => array(

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Body', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'     => 'body-typography',
                'type'   => 'typography',
                'output' => 'body',

            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Heading', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'     => 'heading-one-typo',
                'type'   => 'typography',
                'output' => 'h1, h2, h3, h4, h5, h6',
            ),

        ),
    ) );

    // Preloader section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Color Plates',
        'icon'   => 'fa fa-snowflake-o',
        'fields' => array(
            array(
                'id'        => 'theme_gradiend_color',
                'type'      => 'color_group',
                'title'     => 'Theme Gradient Color',
                'options'   => array(
                  'color-1' => 'First Color',
                  'color-2' => 'Second Color',
                )
              ),

        ),
    ) );

    /*-------------------------------------------------------
     ** Pages and Template
    --------------------------------------------------------*/

    // blog optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Blog', 'papermag-extension' ),
        'id'     => 'blog_page',
        'icon'   => 'fa fa-bookmark',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Blog Layout', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'papermag_news_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Blog Layout', 'papermag-extension' ),
                'options' => array(
                    '1' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/left-sidebar.jpg',
                    '2' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/no-sidebar.jpg',
                    '3' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/right-sidebar.jpg',
                ),
                'default' => '3',
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Blog Options', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'          => 'page-spacing-blog',
                'type'        => 'spacing',
                'title'       => 'Blog Page Spacing',
                'output'      => '.papermag-blog-main-content',
                'output_mode' => 'padding', // or margin, relative
            ),

            array(
                'id'      => 'theme_blog_author',
                'title'   => esc_html__( 'Show Author', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Author', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'blog_it_cate',
                'title'   => esc_html__( 'Show Category', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Category', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'blog_cmt',
                'title'   => esc_html__( 'Show Comment Count', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Comment Count', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'      => 'blog_post_view',
                'title'   => esc_html__( 'Show View', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show View', 'papermag-extension' ),
                'default' => true,
            ),
            
            array(
                'id'      => 'blog_btn_text',
                'type'    => 'text',
                'title'   => esc_html__( 'Blog Read More Button', 'papermag-extension' ),
                'default' => esc_html__( 'Read More', 'papermag-extension' ),
                'desc'    => esc_html__( 'Type Blog Read More Button Text Here', 'papermag-extension' ),
            ),

        ),
    ) );
    // Category optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Category', 'papermag-extension' ),
        'id'     => 'category_opt',
        'icon'   => 'fa fa-tags',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Category Layout', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'papermag_blog_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Blog Layout', 'papermag-extension' ),
                'options' => array(
                    '1' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/left-sidebar.jpg',
                    '2' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/no-sidebar.jpg',
                    '3' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/right-sidebar.jpg',
                ),
                'default' => '3',
            ),
            array(
                'id'          => 'choose-colm',
                'type'        => 'select',
                'title'       => esc_html__('Choose Category Column', 'papermag-extension'),
                'placeholder' => 'Choose Column',
                'options'     => array(
                  '1'  => '2 Column',
                  '2'  => '3 Column',
                  '3'  => '4 Column',
                ),
                'default'     => '2'
              ),

            array(
                'id'      => 'cate_breadcrumb_on',
                'title'   => esc_html__( 'Breadcrumb ON/OFF', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Control Your Category Breadcrumb ON/OFF', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id' => 'cat_im_height',
                'type' => 'slider',
                'title' => 'Catgeory Image Height',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '.papermag-category-page .post-colum-item .post-grid-thumb img',
                'output_mode' => 'height',
                'default' => 200,
                'desc' => esc_html__('Set Category Post Image Height in px. Default Height 200px.', 'papermag-extension') ,
            ) ,
            array(
                'id' => 'cat_im_width',
                'type' => 'slider',
                'title' => 'Catgeory Image Width',
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'unit' => 'px',
                'output' => '.papermag-category-page .post-colum-item .post-grid-thumb img',
                'output_mode' => 'width',
                'desc' => esc_html__('Set Category Post Image Height in px.', 'papermag-extension') ,
            ) ,

            array(
                'id'          => 'cate-img-round',
                'type'        => 'spacing',
                'title'       => 'Category Image Round',
                'output'      => '.papermag-category-page .post-colum-item .post-grid-thumb img',
                'output_mode' => 'border-radius', // or margin, relative
            ),
            array(
                'id'          => 'page-spacing-blog',
                'type'        => 'spacing',
                'title'       => 'Blog Page Spacing',
                'output'      => '.papermag-blog-main-content.papermag-category-page',
                'output_mode' => 'padding', // or margin, relative
            ),

            array(
                'id'      => 'blog_cate',
                'title'   => esc_html__( 'Show Category', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Category', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'cate_view',
                'title'   => esc_html__( 'Show Post View', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Post View', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'cate_cmt',
                'title'   => esc_html__( 'Show Comment', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Comment', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'      => 'title_length',
                'type'    => 'text',
                'title'   => esc_html__( 'Category Title Length', 'papermag-extension' ),
                'default' => esc_html__( '10', 'papermag-extension' ),
            ),
            array(
                'id'      => 'excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__( 'Category Excerpt Length', 'papermag-extension' ),
                'default' => esc_html__( '20', 'papermag-extension' ),
            ),

        ),
    ) );

    // blog single optoins
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Single', 'papermag-extension' ),
        'id'     => 'single_page',
        'icon'   => 'fa fa-pencil-square-o',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Single Post Layout', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'papermag_single_post_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Single Post Layout', 'papermag-extension' ),
                'options' => array(
                    '1' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/left-sidebar.jpg',
                    '2' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/no-sidebar.jpg',
                    '3' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/right-sidebar.jpg',
                ),
                'default' => '3',
            ),
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Single Post Option', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'          => 'page-spacing-single',
                'type'        => 'spacing',
                'title'       => 'Single Blog Spacing',
                'output'      => '.papermag-single-post-section',
                'output_mode' => 'padding', // or margin, relative
            ),

            array(
                'id'      => 'blog_nav',
                'title'   => esc_html__( 'Show Navigation', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Post Navigation', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'blog_tags',
                'title'   => esc_html__( 'Show Tags', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Post Tags', 'papermag-extension' ),
                'default' => true,
            ),

            array(
                'id'      => 'blog_share',
                'title'   => esc_html__( 'Show Share Option', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Show Post Share Icon', 'papermag-extension' ),
                'default' => true,
            ),

        ),
    ) );

    // Create a section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => 'Error Page',
        'id'     => 'error_page',
        'icon'   => 'fa fa-exclamation',
        'fields' => array(
            

            array(  //nav bar one start
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( '404 Page Options', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'error_code',
                'type'    => 'text',
                'title'   => esc_html__( 'Error Code', 'papermag-extension' ),
                'default' => esc_html__( '404', 'papermag-extension' ),
            ),
            array(
                'id'      => 'error_title',
                'type'    => 'text',
                'title'   => esc_html__( '404 Title', 'papermag-extension' ),
                'default' => esc_html__( 'Look’s like here is nothing', 'papermag-extension' ),
            ),
            array(
                'id'      => 'error_button',
                'type'    => 'text',
                'title'   => esc_html__( '404 Button', 'papermag-extension' ),
                'default' => esc_html__( 'Go Back Home', 'papermag-extension' ),
            ),

            array(
                'id'          => 'page-spacing-error',
                'type'        => 'spacing',
                'title'       => 'Page Spacing',
                'output'      => '.papermag-erro-page',
                'output_mode' => 'padding', // or margin, relative
            ),

        ),
    ) );

    /*-------------------------------------------------------
     ** Footer  Options
    --------------------------------------------------------*/
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Footer', 'papermag-extension' ),
        'id'     => 'footer_options',
        'icon'   => 'fa fa-copyright',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Footer Options', 'papermag-extension' ) . '</h3>',
            ),
            array(
                'id'      => 'footer_cta_enable',
                'title'   => esc_html__( 'Do You want to Show Footer CTA Bar', 'papermag-extension' ),
                'type'    => 'switcher',
                'desc'    => esc_html__( 'Enable or Disable CTA Bar', 'papermag-extension' ),
                'default' => true,
            ),
            array(
                'id'    => 'elm_footer_widget',
                'type'  => 'text',
                'title' => esc_html__( 'Elementor Footer Widget', 'papermag-extension' ),
                'desc' => esc_html__( 'Enter Shortcode Here', 'papermag-extension' ),
            ),
            array(
                'id'    => 'papermag_footer_logo_tag',
                'type'  => 'text',
                'title' => esc_html__( 'Footer Logo Tag', 'papermag-extension' ),
                'desc' => esc_html__( 'Logo Tagline', 'papermag-extension' ),
            ),
            array(
                'id'    => 'papermag_footer_logo_text',
                'type'  => 'text',
                'title' => esc_html__( 'Footer Logo Text', 'papermag-extension' ),
                'desc' => esc_html__( 'Logo Text', 'papermag-extension' ),
            ),

            array(
                'type'    => 'subheading',
                'content' => '<h3>' . esc_html__( 'Footer Copyright Area Options', 'papermag-extension' ) . '</h3>',
            ),

            array(
                'id'    => 'papermag_copywrite_text',
                'title' => esc_html__( 'Copyright Area Text', 'papermag-extension' ),
                'type'  => 'wp_editor',
                'desc'  => esc_html__( 'Footer Copyright Text', 'papermag-extension' ),
            ),

            array(
                'id'     => 'footer_link',
                'type'   => 'repeater',
                'title'  => esc_html__('Footer Link', 'papermag-extension'),
                'fields' => array(            
                    array(
                    'id'    => 'footer_link_text',
                    'type'  => 'text',
                    'title' => esc_html__('Footer Link Text', 'papermag-extension'),
                    ),
                    array(
                    'id'    => 'footer_link',
                    'type'  => 'link',
                    'title' => esc_html__('Footer Link', 'papermag-extension'),
                    ),
                
                ),
            ),

        ),
    ) );

    // Backup section
    CSF::createSection( $prefix . '_theme_options', array(
        'title'  => esc_html__( 'Backup', 'papermag-extension' ),
        'id'     => 'backup_options',
        'icon'   => 'fa fa-window-restore',
        'fields' => array(
            array(
                'type' => 'backup',
            ),
        ),
    ) );

}