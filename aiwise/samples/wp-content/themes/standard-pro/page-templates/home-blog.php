<?php
/*
 * Template Name: Home Blog Layout
 *
 * The template for displaying all posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package standard_pro
 */

get_header(); ?>
			
	<div id="primary" class="content-area">

		<?php get_template_part('template-parts/content', 'featured'); ?>

		<?php

			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query('paged='.$paged);
		?>

		<div id="main" class="site-main clear">

			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
				if ($paged > 1) {
			?>
			<div class="breadcrumbs clear">
				<h1>
					<?php _e( 'Latest Posts', 'standard-pro' ); ?>
					<?php echo '('. $paged.'/'. $wp_query->max_num_pages . ')'; ?>
				</h1>	
			</div><!-- .breadcrumbs -->

			<?php 
				}
			?>

			<?php
				if ($paged <= 1) {
					dynamic_sidebar( 'content-ad' );
				}
			?>
			
			<div id="recent-content" class="content-loop">

				<?php
					if ( have_posts() ) :

					$i = 1;

					while ($wp_query->have_posts()) : $wp_query->the_post();
					
						get_template_part('template-parts/content', 'loop');
					
						$i++;

					endwhile;

					else :

					get_template_part( 'template-parts/content', 'none' );

				?>

			<?php endif; ?>

			</div><!-- #recent-content -->
			
		</div><!-- #main -->
		<?php

			global $wp_version;

			if ( $wp_version >= 4.1 ) :

				the_posts_pagination( array( 'prev_text' => _x( 'Previous', 'previous post', 'standard-pro' ) ) );
			
			endif;

		?>

		<?php $wp_query = null; $wp_query = $temp;?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
