<?php
/**
 * Template Name: Slider page template
 *
 * Description: Use this page template to create static home page with slider on top. 
 * It has title and comments disabled by default.
 * @since Iconic One Pro v1.4
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
		<div id="content" role="main">
					<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'themonic' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'themonic' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
<?php get_footer(); ?>