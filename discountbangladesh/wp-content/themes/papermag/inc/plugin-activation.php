<?php

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'papermag_register_required_plugins' );

function papermag_register_required_plugins() {

    $plugins = array(
        array(
			'name'               => esc_html__('papermag Extension', 'papermag'),
			'slug'               => 'papermag-extension',
			'source'             => get_template_directory() . '/inc/plugins/papermag-extension.zip', 
			'required'           => true,
			'force_activation'   => false,
			'force_deactivation' => false,
		),
        array(
            'name'     => 'Elementor Website Builder',
            'slug'     => 'elementor',
            'required' => true,
        ),
        array(
            'name'     => 'Elementor Header & Footer Builder',
            'slug'     => 'header-footer-elementor',
            'required' => true,
        ),

        array(
            'name'     => 'MC4WP: Mailchimp for WordPress',
            'slug'     => 'mailchimp-for-wp',
            'required' => false,
        ),

        array(
            'name'     => 'SVG Support',
            'slug'     => 'svg-support',
            'required' => false,
        ),

        array(
            'name'     => 'Contact Form 7',
            'slug'     => 'contact-form-7',
            'required' => false,
        ),

        array(
            'name'     => esc_html__( 'One Click Demo Import', 'papermag' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name'     => 'Breadcrumb NavXT',
            'slug'     => 'breadcrumb-navxt',
            'required' => true,
        ),
        array(
            'name'     => 'AccessPress Social Counter',
            'slug'     => 'accesspress-social-counter',
            'required' => true,
        ),

    );

    $config = array(
        'id'           => 'papermag',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',

    );

    tgmpa( $plugins, $config );
}
