<?php
/**
 * Iconic One Extra Functions
 */
function iconic_one_pro_excerpts() { ?>
		<div class="entry-summary">
				<!-- Ico nic One home page thumbnail with custom excerpt -->
			<div class="excerpt-thumb">
			<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'iconic-one' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
			<?php if ( wp_is_mobile() ) : ?>
				<?php the_post_thumbnail('post-thumbnail'); ?>
			<?php else : ?>
				<?php the_post_thumbnail('excerpt-thumbnail', 'class=alignleft'); ?>
			<?php endif; ?>
				</a>
			<?php endif;?>
		</div>
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php }

function iop_social_icons() { ?>
		<div class="socialmedia">
			<?php if( get_theme_mod( 'io_search_header' ) == '1') { ?>
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<div><label class="screen-reader-text" for="s">Search for:</label>
					<input type="text" placeholder="Search" name="s" id="s" />
					<input type="submit"  id="searchsubmit" value="&#xf002;" />
				</div>
			</form>
			<?php } ?>
			<?php if( get_theme_mod( 'twitter_url' ) !== '' ) { ?>
				<a href="<?php echo esc_url( get_theme_mod( 'twitter_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-twitter"></i></a> 
			<?php } ?>
			<?php if( get_theme_mod( 'facebook_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url( get_theme_mod( 'facebook_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if( get_theme_mod( 'insta_url' ) !== '' ) { ?>
					<a href="<?php echo esc_url(get_theme_mod( 'insta_url', 'default_value' ) ); ?>" rel="author" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if( get_theme_mod( 'linkedin_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'linkedin_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>	
			<?php } ?>
			<?php if( get_theme_mod( 'youtube_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'youtube_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>	
			<?php } ?>
			<?php if( get_theme_mod( 'pinterest_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'pinterest_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>	
			<?php } ?>
			<?php if( get_theme_mod( 'rss_url' ) !== '' ) { ?>
			<a class="rss" href="<?php echo esc_url( get_theme_mod( 'rss_url', 'default_value' ) ); ?>" target="_blank"><i class="fa fa-rss"></i></a>	
			<?php } ?>
		</div>
		<?php }	

function iop_mobile_bar() { ?>
			<?php if( get_theme_mod( 'iop_header_search_bar' ) == '1') : ?>	
			<?php if ( ( wp_is_mobile() ) ) : ?> 
				<div class="themonic-top-bar">
				<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
					<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
					<input type="search" class="search-field"
						placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
						value="<?php echo get_search_query() ?>" name="s"
						title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
				<input type="submit" class="search-submit"
					value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
				</form>
				</div>
			<?php endif; ?>
			<?php endif; ?>
			<?php if ( ( wp_is_mobile() ) ) : ?>
				<?php	{ echo '<style> input[type="search"] { -webkit-appearance: listbox !important; -webkit-border-radius:0px; } @media screen and (max-width: 767px) { .js .selectnav { -webkit-appearance: listbox !important; } };</style>';} ?>
			<?php endif; ?>
		<?php }			
require_once( get_template_directory() . '/inc/fonts.php' );
require_once( get_template_directory() . '/inc/themonic-sanitizer.php' );
function themonic_control_panel_style() {
	$pcolor = get_theme_mod( 'pmain_theme_color' );
	$pwtcolor = get_theme_mod( 'pwidget_color' );
	$pwtbgcolor = get_theme_mod( 'pwidget_bg_color' );
	$pfontfamily = get_theme_mod( 'google_font_setting' );
	$pmenutxtcolor = get_theme_mod( 'iop_menu_text_color' );
	$pfontsize = get_theme_mod( 'themonic_font_size' );
	$primarycolor = "";
	$pwidgetcolor = "";
	$pwidgetbgcolor = "";
	
	if ( $pcolor != '' ) {
	$primarycolor = "
	.themonic-nav .current-menu-item > a, .themonic-nav .current-menu-ancestor > a, .themonic-nav .current_page_item > a, .themonic-nav .current_page_ancestor > a {
		background: {$pcolor};
		color: #FFFFFF;
		font-weight: bold;
	}
	.themonic-nav ul.nav-menu, .themonic-nav div.nav-menu > ul {
		border-bottom: 5px solid {$pcolor};
	}
	.themonic-nav li a:hover {
		background: {$pcolor};
	}
	.themonic-nav li:hover {
		background: {$pcolor};
	}
	.categories a {
		background: {$pcolor};
	}
	.read-more a {
		color: {$pcolor};
	}
	.featured-post {
		color: {$pcolor};
	}
	#emailsubmit {
		background: {$pcolor};
	}
	#searchsubmit {
		background: {$pcolor};
		color: {$pmenutxtcolor};
	}
	.sub-menu .current-menu-item > a, .sub-menu .current-menu-ancestor > a, .sub-menu .current_page_item > a, .sub-menu .current_page_ancestor > a {
		background: {$pcolor};
		color: #ffffff;
		font-weight: bold;
	}
	.themonic-nav .current-menu-item a, .themonic-nav .current-menu-ancestor a, .themonic-nav .current_page_item a, .themonic-nav .current_page_ancestor a {
    color: {$pmenutxtcolor};
    font-weight: bold;
	}
	.themonic-nav li a:hover {
		color: {$pmenutxtcolor};
	}
	.comments-area article {
		border-color: #E1E1E1 #E1E1E1 {$pcolor};
	}";
	}
	if ( $pwtcolor != '' ) {
	$pwidgetcolor = "
	.widget-title {
		color: {$pwtcolor};
	}";
	}
	if ( $pwtbgcolor != '' ) {
	$pwidgetbgcolor = "
	.widget-area .widget-title {
		background: {$pwtbgcolor};
	}";
	}
	if ($pfontfamily != '') {
	$pbodyfamily = ".site { font-family:'{$pfontfamily}', arial ;}";
	} else {
	$pbodyfamily = ".site { font-family: 'roboto', arial ;}";
	}
	
	if ($pfontsize != '') {
	$pbodyfont = ".site { font-size:{$pfontsize}px;}";
	} else {
	$pbodyfont = ".site { font-size: 14px;}";
	}
	
	$custom_css = $primarycolor . $pwidgetcolor .$pwidgetbgcolor . $pbodyfont . $pbodyfamily ;
	wp_add_inline_style( 'themonic-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'themonic_control_panel_style' );