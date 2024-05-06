<?php
/**
 * Template Name: No Header With Sidebar
 *
 * Description: Use this for creating landing pages/Squeeze pages
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.8.7
 */

get_header(); ?>


	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
	
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
<style type="text/css">
.site-header{display:none;}
</style>
