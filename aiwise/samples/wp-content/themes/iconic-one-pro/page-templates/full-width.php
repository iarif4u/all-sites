<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Normal full width template.
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>
	<div id="primary" class="site-content">
		<?php if( get_theme_mod( 'iop_breadcrumb_selection' ) != 'value3' ) { ?>
			<?php if ( get_theme_mod( 'iop_breadcrumb_selection' ) == 'value1' ): ?>
				<div class="themonic-breadcrumb"><?php iop_breadcrumb(); ?></div>
			<?php else: ?>	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
			<?php endif; ?>	
		<?php } ?>
		<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
