<?php
/*
 * Category pages section display - posts with excerpt and thumbs.
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>
<?php $options = get_option('iconiconepro'); ?>
	<section id="primary" class="site-content">
		<?php if($options['themonic_category_slider'] == '1') { ?>
			<div class="flex-container">
				<div class="flexslider">
				<ul class="slides">
					<?php
						$options = get_option('iconiconepro');
						$cur_cat_id = get_cat_id( single_cat_title("",false) );
						query_posts(array('cat' => $cur_cat_id  , 'posts_per_page' => '5'));
						if(have_posts()) :
						while(have_posts()) : the_post();
					?>
				<li>
				<p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('ioslider-thumbnail'); ?></a></p>
				<p class="flex-caption"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
				</li>
					<?php
						endwhile;
						endif;
						wp_reset_query();
					?>
				</ul>
				</div>
			</div>	
		<?php } ?>
		
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'themonic' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			endwhile;

			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
			<?php if($options['themonic_pagination'] == '1') : ?>
					<div class="themonic-pagination"><?php themonic_pagination(); ?></div>
					<div style="display: block; clear: both;"></div>
				<?php else : ?>	
					<?php themonic_content_nav( 'nav-below' ); ?>
			<?php endif; ?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>