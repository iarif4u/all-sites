<?php
/*
Plugin Name: PaperMag Extension
Plugin URI: https://themeforest.net/user/itcroc
Description: After install the PaperMag WordPress Theme, you must need to install this "PaperMag Extension" first to get all functions of PaperMag WP Theme.
Author: Raziul Islam
Author URI: https://themeforest.net/user/itcroc
Version: 1.3
Text Domain: papermag-extension
*/
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define('PAPERMAG_DIR_PATH',plugin_dir_path(__FILE__));
define('PAPERMAG_DIR_URL',plugin_dir_url(__FILE__));
define('PAPERMAG_INC_PATH', PAPERMAG_DIR_PATH . '/inc' );
define( 'PAPERMAG_PLUGIN_IMG_PATH', PAPERMAG_DIR_URL . '/assets/img' );

/**
 * Css Framework Load
 */
if ( file_exists(PAPERMAG_DIR_PATH.'/lib/codestar-framework/codestar-framework.php') ) {
    require_once  PAPERMAG_DIR_PATH.'/lib/codestar-framework/codestar-framework.php';
}

// Load Script
function papermag_frontend_scripts() {
    wp_enqueue_style( 'papermag-admin-style', PAPERMAG_DIR_URL . "assets/css/admin-style.css");
}
add_action( 'admin_enqueue_scripts', 'papermag_frontend_scripts' );
/**
 * Post Widget With Thumbnail
 */
function papermag_post_widget_register(){
    register_widget( 'PaperMag_Recent_Post' );
}
add_action('widgets_init', 'papermag_post_widget_register');

include_once PAPERMAG_INC_PATH . "/elementor_extension.php";
include_once PAPERMAG_INC_PATH . "/options/theme-option.php";
include_once PAPERMAG_INC_PATH . "/options/theme-metabox.php";
include_once PAPERMAG_INC_PATH . "/recent-post-widget/recent-post.php";
include_once PAPERMAG_INC_PATH . "/demo-import.php";

