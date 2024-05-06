<?php
/**
 * The template for displaying Tag pages.
 *
 * Read more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'themonic' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
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