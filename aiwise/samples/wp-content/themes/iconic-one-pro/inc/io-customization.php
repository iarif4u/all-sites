<?php

$options = get_option('iconiconepro'); 

/*[Header Section]*/
if ( ! function_exists( 'iop_head' ) ) {
	function iop_head() { 
	global $options
?>
<style type="text/css">
@media screen and (max-width: 767px) {
	.themonic-nav ul.nav-menu, .themonic-nav div.nav-menu > ul, .themonic-nav li {
    border-bottom: none;
    }
}
<?php if( get_theme_mod( 'full_width_header' ) == '1') { ?>
	.site-header .themonic-logo {margin: 0; padding: 0;}
	.site-header .socialmedia {margin-top: -50px;}
	@media screen and (max-width: 1100px) and (min-width: 768px) {.site-header .themonic-logo img {width: 100%;}}
	.themonic-nav ul.nav-menu, .themonic-nav div.nav-menu > ul {border-top: none;}
	.themonic-nav {margin-top:-2px;}
	.js .selectnav {border-radius: 0; margin-left:-0.4px; width: 100%;}
<?php } ?>
<?php if( get_theme_mod( 'heading_one_at_home' ) == '1') { ?>
	.top-header { text-indent: -5000px; overflow: hidden; }
<?php } ?>
<?php if( get_theme_mod( 'show_both_logo_title' ) == '1' && get_theme_mod( 'full_width_header' ) == '0' ) { ?>
.top-header { padding-left: 20px; float: right; } 
<?php } else if ( get_theme_mod( 'show_both_logo_title' ) == '1' && get_theme_mod( 'full_width_header' ) == '1' ) { ?>
.top-header { padding: 0; float: left; }
<?php } else if ( get_theme_mod( 'show_both_logo_title' ) == '1' ) { ?>
.top-header { padding-left: 20px; float: right; }
<?php } else { ?>
.top-header { padding: 20px; float: left; }
<?php } ?>
<?php if( get_theme_mod( 'iop_social_square' ) == '1') { ?>
	.socialmedia a i { border-radius: 0; }
<?php } ?>
</style>

<?php }
}

?>