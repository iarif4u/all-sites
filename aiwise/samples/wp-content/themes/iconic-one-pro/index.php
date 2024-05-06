<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Iconic One Pro 
 * 
 * @since Iconic One Pro 1.0 
 */

get_header(); ?>
<?php $options = get_option('iconiconepro'); ?>
	<div id="primary" class="site-content">
<?php if($options['themonic_slider'] == '1') { ?>
	<div class="flex-container">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$options = get_option('iconiconepro');
						$io_slider = $options['themonic_slider_category'];
						query_posts(array('cat' => $io_slider , 'posts_per_page' => '5'));
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
	<div class="clear"></div>
<?php } ?>
	<?php if( ( get_theme_mod( 'hpw', '0' ) == '1' ) ) { // display home page widgets() ?>
			<div id="hp-widgets" class="widget-area">
				<div class="hp-widget-section">
                <?php if( is_active_sidebar( 'hpw-one' ) ) dynamic_sidebar( 'hpw-one' ); ?>
				</div>
				<div class="hp-widget-section">
				<?php if( is_active_sidebar( 'hpw-two' ) ) dynamic_sidebar( 'hpw-two' ); ?>
				</div>
            </div>
	 <?php } ?>	
	<div id="content" role="main">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
			<?php if($options['themonic_pagination'] == '1') : ?>
					<div class="themonic-pagination"><?php themonic_pagination(); ?></div>
					<div style="display: block; clear: both;"></div>
			<?php else : ?>	
					<?php themonic_content_nav( 'nav-below' ); ?>
			<?php endif; ?>
			
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">

			<?php if ( current_user_can( 'edit_posts' ) ) :
				// Show a different message to a logged-in user who can add posts.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'No posts to display', 'themonic' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'themonic' ), admin_url( 'post-new.php' ) ); ?></p>
				</div><!-- .entry-content -->

			<?php else :
				// Show the default message to everyone else.
			?>
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'themonic' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Kindly search your topic below or browse the recent posts.', 'themonic' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			<?php endif; // end current_user_can() check ?>

			</article><!-- #post-0 -->

		<?php endif; // end have_posts() check ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>