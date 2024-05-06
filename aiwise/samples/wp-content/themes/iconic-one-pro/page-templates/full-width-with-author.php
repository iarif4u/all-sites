<?php
/**
 * Template Name: Full-width with Author Bio
 *
 * Description: Full width template with Author Bio.
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>


	<div id="primary" class="site-content">
		<?php if($options['themonic_breadcrumb'] == '1') { ?>
			<?php if ( !is_front_page() ) { ?>
				<div class="themonic-breadcrumb"><?php iop_breadcrumb(); ?></div> 
			<?php } ?>
		<?php } ?>
		<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
					<?php if ( is_singular() && get_the_author_meta( 'description' ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'themonic_author_bio_avatar_size', 68 ) ); ?>
					</div><!-- .author-avatar -->
				<div class="author-description">
						<?php printf( __( 'Author: %s', 'themonic' ), get_the_author() ); ?> 
					<?php if ( get_the_author_meta( 'twitter' ) ) { ?>
					<a href="<?php the_author_meta( 'twitter' ); ?>"><i class="fa fa-twitter"></i></a>
					<?php } // End check for Twitter ?>
					<?php if ( get_the_author_meta( 'facebook' ) ) { ?>
					<a href="<?php the_author_meta( 'facebook' ); ?>"><i class="fa fa-facebook"></i></a>
					<?php } // End check for Facebook ?>
					<?php if ( get_the_author_meta( 'linkedin' ) ) { ?>
					<a href="<?php the_author_meta( 'linkedin' ); ?>?rel=author"><i class="fa fa-linkedin"></i></a>
					<?php } // End check for Linkedin ?>
					<?php if ( get_the_author_meta( 'instagram' ) ) { ?>
					<a href="<?php the_author_meta( 'instagram' ); ?>"><i class="fa fa-instagram"></i></a>
					<?php } // End check for Instagram ?>
				<p><?php the_author_meta( 'description' ); ?></p>
				</div><!-- .author-description -->
				</div><!-- .author-info -->
			<?php endif; ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
