<?php

// File Security Check
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

function papermag_theme_options_style() {

    //
    // Enqueueing StyleSheet file
    //
    wp_enqueue_style( 'papermag-theme-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $css_output = '';
    $colr_opt = cs_get_option('theme_gradiend_color'); 
    $colr_1 = '';
    $colr_2 = '';
    if(isset($colr_opt['color-1']) && $colr_opt['color-1']){
        $colr_1 = $colr_opt['color-1'];
    }
    if(isset($colr_opt['color-2']) && $colr_opt['color-2']){
        $colr_2 = $colr_opt['color-2'];
    }
    
    //Theme Gradient COlor
    $css_output .= '
        .papermag-darkmode span:after,
        .subscribe-form input[type="submit"],
        .post-meta-right .post-single-meta-item i,
        .papermag-single-content .entry-content blockquote:after,
        .form-submit input[type="submit"],
        .papermag-tabs-list.nav-pills .nav-link.active:after,
        .papermag-post-tap-area .nav-pills .nav-link.active:after,
        .apsc-icons-wrapper .apsc-each-profile:hover,
        .sticky .papermag-blog-content,
        .papermag-post-pagination ul li span.current, 
        .papermag-post-pagination ul li a:hover,
        .widget.widget_search .search-form input[type="submit"]{
            background: -webkit-gradient(linear, left top, right top, from('.esc_attr($colr_1).'), to('.esc_attr($colr_2).'));
            background: -o-linear-gradient(left, '.esc_attr($colr_1).' 0%, '.esc_attr($colr_2).' 100%);
            background: linear-gradient(90deg, '.esc_attr($colr_1).' 0%, '.esc_attr($colr_2).' 100%);
        }
        .common-style-meta .papermag-cate-name,
        .post-list-info .post-cat a,
        .post-list-content-one .post-cat a,
        .papermag-blog-item .papermag-cate-name{
            background: -webkit-gradient(linear, left top, right top, from('.esc_attr($colr_1).'), to('.esc_attr($colr_2).'));
            background: -o-linear-gradient(left, '.esc_attr($colr_1).' 0%, '.esc_attr($colr_2).' 100%);
            background: linear-gradient(90deg, '.esc_attr($colr_1).' 0%, '.esc_attr($colr_2).' 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    ';
    

    wp_add_inline_style( 'papermag-theme-custom-style', $css_output );

}
add_action( 'wp_enqueue_scripts', 'papermag_theme_options_style' );
