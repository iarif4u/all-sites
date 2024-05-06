<?php
/*
 * Theme Metabox
 * @package papermag-extension
 * @since 1.0.0
 * */

if ( !defined( 'ABSPATH' ) ) {
    exit(); // exit if access directly
}

if ( class_exists( 'CSF' ) ) {

    $prefix = 'papermag';

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $post_metabox = 'papermag_page_meta';

    CSF::createMetabox( $post_metabox, array(
        'title'     => 'Page Options',
        'post_type' => 'page',
    ) );

    //
    // Header Section
    CSF::createSection( $post_metabox, array(
        'title'  => 'Header',
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__( 'Nav Menu Option', 'papermag-extension' ),
            ),

            array(
                'id'      => 'page_logo',
                'title'   => esc_html__( 'Page Logo', 'papermag-extension' ),
                'type'    => 'media',
                'library' => 'image',
                'default' => get_template_directory_uri() . "/",
                'desc'    => esc_html__( 'Upload Logo Here', 'papermag-extension' ),
            ),

            array(
                'id'      => 'header_layout',
                'type'    => 'image_select',
                'title'   => esc_html__( 'Select Header Navigation Style', 'papermag-extension' ),
                'options' => array(
                    'header-style-one' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-1.png',
                    'header-style-two' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-2.png',
                    'header-style-three' => PAPERMAG_PLUGIN_IMG_PATH . '/admin/header-3.png',
                ),
                'default' => 'header-style-one',
            ),

        ),
    ) );

    /*-------------------------------------
    Post Format Options
    -------------------------------------*/
    $post_format_metabox = 'papermag_post_format_meta';

    CSF::createMetabox( $post_format_metabox, array(
        'title'     => 'Post Video',
        'post_type' => 'post',
		'post_formats' => 'video',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
    ) );

    // Video Link
    CSF::createSection( $post_format_metabox, array(
        'title'  => 'Post Settings Settings',
        'fields' => array(
              array(
                'id'      => 'video_link',
                'type'    => 'text',
                'title'   => esc_html__('Video Link', 'papermag-extension'),
                'desc'    => esc_html__('Enter Video Link Here', 'papermag-extension'),
            ),
        ),
    ) );

    /**
     * Post Gallery Format
     */
    $post_format_gall_metabox = 'papermag_post_gall_meta';

    CSF::createMetabox( $post_format_gall_metabox, array(
        'title'     => 'Post Gallery',
        'post_type' => 'post',
		'post_formats' => 'gallery',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
    ) );

    // Video Link
    
    CSF::createSection( $post_format_gall_metabox, array(
        'title'  => 'Post Gallery Settings',
        'fields' => array(
            array(
                'id'          => 'post-gall-item',
                'type'        => 'gallery',
                'title'       => 'Gallery',
                'add_title'   => 'Add Images',
                'edit_title'  => 'Edit Images',
                'clear_title' => 'Remove Images',
              ),
          ),
    ) );

    /*-------------------------------------
    Page Options
    -------------------------------------*/
    $cate_metabox = 'papermag_cate_meta';

    CSF::createTaxonomyOptions( $cate_metabox, array(
        'taxonomy'  => 'category',
        'data_type' => 'serialize',
    ) );

     // Header Section
     CSF::createSection( $cate_metabox, array(
        'title'  => 'Header',
        'fields' => array(
            array(
                'id'      => 'cate_img_upload',
                'type'    => 'media',
                'title'   => 'Media',
            ),
            array(
                'id'    => 'cate-color',
                'type'  => 'color',
                'title' => 'Color',
            ),
        ),
    ) );

} //endif
