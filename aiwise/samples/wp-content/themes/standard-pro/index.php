<?php get_header(); ?>

	<div id="primary" class="content-area clear">	

		<?php get_template_part('template-parts/content', 'featured'); ?>
			
		<main id="main" class="site-main clear">

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

			<div id="recent-content" class="content-<?php if(get_theme_mod('loop-style','choice-1') == 'choice-1') { echo 'magazine'; } elseif(get_theme_mod('loop-style','choice-1') == 'choice-2') { echo 'list'; }  elseif(get_theme_mod('loop-style','choice-1') == 'choice-3') { echo 'loop'; } else { echo 'grid'; } ?>">

				<?php

				if ( have_posts() ) :	
				
				$i = 1;

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					if (get_theme_mod('loop-style','choice-1') == 'choice-1') {

						get_template_part('template-parts/content', 'magazine');

					} elseif (get_theme_mod('loop-style','choice-1') == 'choice-2') {

						get_template_part('template-parts/content', 'list');

					} elseif (get_theme_mod('loop-style','choice-1') == 'choice-3') {

						get_template_part('template-parts/content', 'loop');

					} else {
						get_template_part('template-parts/content', 'grid');						
					}

					$i++;

				endwhile;

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif; 

				?>

			</div><!-- #recent-content -->		

		</main><!-- .site-main -->

		<?php get_template_part( 'template-parts/pagination', '' ); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
