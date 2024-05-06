<?php
/*
 * Header Section of Iconic One
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */
?><!DOCTYPE html>
<?php $options = get_option('iconiconepro'); ?>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php iop_head(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php $options = get_option('iconiconepro'); ?>
<?php iop_mobile_bar() ?>
		
<div id="page" class="site">

<?php if($options['above_header_check'] == '1') { // display above header #AD3()?>
			<div class="themonic-ad3"><?php echo $options['above_header_hook']; ?></div>
		<?php } ?>
	<header id="masthead" class="site-header" role="banner">
		<?php if ( get_theme_mod( 'themonic_logo' ) ) : ?>
		<div class="themonic-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'themonic_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
			<?php if ( get_theme_mod( 'show_both_logo_title' ) == '1') { ?>
		<div class="top-header">
			<?php if ( is_front_page() && is_home() ) : // Display H1 title on home page only ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if( get_theme_mod( 'heading_one_at_home' ) != '1') { ?><a class="site-description"><?php bloginfo( 'description' ); ?></a>
				<?php } ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php if( get_theme_mod( 'heading_one_at_home' ) != '1') { ?><br><a class="site-description"><?php bloginfo( 'description' ); ?></a>
				<?php } ?>
			<?php endif; ?>
		</div>
			<?php } ?>
		</div>
		<?php if( get_theme_mod( 'iop_social_activate' ) == '1') { ?>
			<?php iop_social_icons() ?>
		<?php } ?>
			<?php else : ?>
		<div class="top-header">
			<?php if ( is_front_page() && is_home() ) : // Display H1 title on home page only ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php if( get_theme_mod( 'heading_one_at_home' ) != '1') { ?><a class="site-description"><?php bloginfo( 'description' ); ?></a>
				<?php } ?>
			<?php else : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<br><?php if( get_theme_mod( 'heading_one_at_home' ) != '1') { ?><a class="site-description"><?php bloginfo( 'description' ); ?></a>
				<?php } ?>
			<?php endif; ?>
		</div>
		<?php if( get_theme_mod( 'iop_social_activate' ) == '1') { ?>
			<?php iop_social_icons() ?>
		<?php } ?>
		<?php endif; ?>

		<nav id="site-navigation" class="themonic-nav" role="navigation">
			<a class="assistive-text" href="#main" title="<?php esc_attr_e( 'Skip to content', 'themonic' ); ?>"><?php _e( 'Skip to content', 'themonic' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'menu-top', 'menu_class' => 'nav-menu', 'container' => 'ul' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="clear"></div>
	</header><!-- #masthead -->
	<?php if($options['below_header_check'] == '1') { // display below nav #AD2()?>
			<div class="themonic-ad2"><?php echo $options['below_header_hook']; ?></div>
	<?php } ?>
	<div id="main" class="wrapper">	