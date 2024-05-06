<?php 
/*
* @packge PaperMag
* @since 1.0.0
 */
function papermag_import() { 
    return array(
    
    array(
        'import_file_name'             => esc_html__('Magazine Demo','papermag'),
        'page_title'                   => esc_html__('Import Demo Data','papermag'),
        'local_import_file'            => PAPERMAG_DIR_PATH.'/demo/magazine-demo.xml',
        'local_import_widget_file'     => PAPERMAG_DIR_PATH.'/demo/magazine-widget.wie',
        'local_import_customizer_file' => PAPERMAG_DIR_PATH.'/demo/magazine.dat',
        'import_preview_image_url'     => 'https://themeunique.com/papermag/fashion-demo.jpg',
        'import_notice'                => esc_html__( 'This import maybe finish on 2-5 minutes', 'papermag' ),
        'preview_url'                  => 'https://themeunique.com/papermag/magazine/',
    ),        
    array(
        'import_file_name'             => esc_html__('News Demo','papermag'),
        'page_title'                   => esc_html__('Import Demo Data','papermag'),
        'local_import_file'            => PAPERMAG_DIR_PATH.'/demo/demo-data2.xml',
        'local_import_widget_file'     => PAPERMAG_DIR_PATH.'/demo/widget2.wie',
        'local_import_customizer_file' => PAPERMAG_DIR_PATH.'/demo/papermag-customizer2.dat',
        'import_preview_image_url'     => 'https://themeunique.com/papermag/politics-demo-preview.jpg',
        'import_notice'                => esc_html__( 'This import maybe finish on 2-5 minutes', 'papermag' ),
        'preview_url'                  => 'https://themeunique.com/papermag/newspaper/',

    ),  
    array(
        'import_file_name'             => esc_html__('Sports Demo','papermag'),
        'page_title'                   => esc_html__('Import Demo Data','papermag'),
        'local_import_file'            => PAPERMAG_DIR_PATH.'/demo/sports-demo.xml',
        'local_import_widget_file'     => PAPERMAG_DIR_PATH.'/demo/sports-widget.wie',
        'local_import_customizer_file' => PAPERMAG_DIR_PATH.'/demo/sports-customizer.dat',
        'import_preview_image_url'     => 'https://themeunique.com/papermag/sports-demo.jpg',
        'import_notice'                => esc_html__( 'This import maybe finish on 2-5 minutes', 'papermag' ),
        'preview_url'                  => 'https://themeunique.com/papermag/sports/',

    ),  
    
    );
}
add_filter( 'pt-ocdi/import_files', 'papermag_import' );


add_action( 'pt-ocdi/after_import',  'papermag_after_import' );

if(!function_exists( 'papermag_after_import')):
function papermag_after_import() {

	$main_menu = get_term_by('name', 'Primary', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
     ) );

	//Set Front page

	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'News' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
}
endif;