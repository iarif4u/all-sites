<?php

/**
 *
 * Get PaperMag Theme options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_get_option' ) ) {
    function cs_get_option( $option = '', $default = null ) {
        $options = get_option( 'papermag_theme_options' ); // Attention: Set your unique id of the framework
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}

/**
 *
 * Get get switcher option
 *  for theme options
 * @since 1.0.0
 * @version 1.0.0
 *
 */

if ( ! function_exists( 'cs_get_switcher_option' )) {

    function cs_get_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'papermag_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  (is_null($return_val) || '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}

if ( ! function_exists( 'cs_switcher_option' )) {

    function cs_switcher_option( $option = '', $default = null ) {
        $options = get_option( 'papermag_theme_options' ); // Attention: Set your unique id of the framework
        $return_val =  ( isset( $options[$option] ) ) ? $options[$option] : $default;
        $return_val =  ( '1' == $return_val ) ? true : false;;
        return $return_val;
    }
}


/**
 * Function for get a metaboxes
 *
 * @param $prefix_key Required Meta unique slug
 * @param $meta_key Required Meta slug
 * @param $default Optional Set default value
 * @param $id Optional Set post id
 *
 * @return mixed
 */
function papermag_get_meta( $prefix_key, $meta_key, $default = null, $id = '' ) {
    if ( !$id ) {
        $id = get_the_ID();
    }

    $meta_boxes = get_post_meta( $id, $prefix_key, true );
    return ( isset( $meta_boxes[$meta_key] ) ) ? $meta_boxes[$meta_key] : $default;
}

/**
 * Get Header layout
 *
 * @return string
 */
function papermag_site_header() {
    $header_layout = cs_get_option( 'global_nav_menu', 'header-style-one' );

    if ( is_page() ) {
        $page_header = papermag_get_meta( 'papermag_page_meta', 'header_layout', 'default' );

        if ( 'default' !== $page_header ) {
            $header_layout = $page_header;
        }
    }

    return $header_layout;
}

 /**
  * Site Logo
  */
function papermag_logo(){ 
    $global_logo = cs_get_option('theme_logo');
    $page_footer = papermag_get_meta( 'papermag_page_meta', 'page_logo', 'default' );
    ?>
    <?php if(!empty($page_footer['url'])):?>
        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <img src="<?php echo esc_url($page_footer['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php elseif(isset($global_logo['url']) && $global_logo['url']):?>
        <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
        <img src="<?php echo esc_url($global_logo['url']);?>" alt="<?php echo esc_attr(get_bloginfo());?>">
        </a>
    <?php else:?>
        <?php 
            if(has_custom_logo()){
                the_custom_logo();
            }else{ ?>
            <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo_1.svg" alt="<?php esc_attr_e('Logo', 'papermag'); ?>">
            </a>
        <?php    }
        ?>
    <?php endif;?>
<?php }

/**
 * Sticky Logo
 */
function sticky_logo(){ 
    $theme_sticky_logo = cs_get_option('theme_sticky_logo');    
?>
    <a class="navbar-brand sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php if(isset($theme_sticky_logo['url']) && $theme_sticky_logo['url'] ):?>
        <img src="assets/img/footer-logo-2.png" alt="<?php esc_html_e('logo', 'papermag') ;?>">
        <?php else:?>
            <img src="<?php echo esc_url(get_template_directory_uri());?>/assets/img/footer-logo-2.png" alt="<?php esc_html_e('logo', 'papermag') ;?>">
        <?php endif;?>
    </a>
<?php 
}
