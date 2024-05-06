<?php
/*
 * The Template for displaying all single posts.
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>
<?php $options = get_option('iconiconepro'); ?>
		<div id="primary" class="site-content">
		<?php if( get_theme_mod( 'iop_breadcrumb_selection' ) != 'value3' ) { ?>
			<?php if ( get_theme_mod( 'iop_breadcrumb_selection' ) == 'value1' ): ?>
				<div class="themonic-breadcrumb"><?php iop_breadcrumb(); ?></div>
			<?php elseif ( get_theme_mod( 'iop_breadcrumb_selection' ) == 'value2' ): ?>	
				<?php if ( function_exists( 'breadcrumb_trail' ) ) breadcrumb_trail(); ?>
			<?php elseif ( get_theme_mod( 'iop_breadcrumb_selection' ) == 'value4' ): ?>
				<?php if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				} ?>
			<?php endif; ?>
		<?php } ?>
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

<?php if($options['themonic_related_posts'] == '1') { ?>		
	<?php $orig_post = $post; // start of related posts
		global $post;
		$categories = get_the_category($post->ID);
		if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

		$args=array(
		'category__in' => $category_ids,
		'post__not_in' => array($post->ID),
		'posts_per_page'=> 4, // Number of related posts that will be shown.
		'ignore_sticky_posts'=>1
		);
		$my_query = new wp_query( $args );
		if( $my_query->have_posts() ) {
		echo '<div class="relatedposts"><p>' . __( 'Related Posts', 'themonic' ) .'</p><ul>';
		while( $my_query->have_posts() ) {
		$my_query->the_post();?>

			<li>
				<?php if($options['themonic_rp_thumbs'] == '1') { ?>
					<div class="themonicthumb"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('themonic-thumbnail');  ?></a>
					</div>
				<?php } ?>
				<div class="relatedcontent">
					<a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</div>
			
			</li>
		<?php
						}			
						echo '</ul></div>';
				}
		}
			$post = $orig_post;
			wp_reset_query(); ?>
			<?php } ?>
				
				<nav class="nav-single">
					<div class="assistive-text"><?php _e( 'Post navigation', 'themonic' ); ?></div>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themonic' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themonic' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>