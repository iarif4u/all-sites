<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package papermag
 */
$blog_author_info = cs_get_option('blog_author_info');
$blog_tags = cs_get_option('blog_tags');
$blog_share = cs_get_option('blog_share');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('papermag-single-content'); ?>>
	<?php if(has_post_thumbnail()):;?>
	<div class="blog-post-thumbnail">
		<?php the_post_thumbnail('papermag_blog_940_560');?>
	</div>
	<?php endif;?>
	<div class="entry-meta-top d-flex justify-content-between ">
		<div class="post-bottom-meta">
			<div class="auth-avater">
			<?php printf('<a href="%2$s">%1$s</a>',
				get_avatar( get_the_author_meta( 'ID' ), 40 ), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
				get_the_author()
			); ?>
			</div>			
			<div class="papermag-post-date">
				<span><?php the_author()?></span>
				<div class="papermag-post-date">
					<?php echo esc_html(get_the_time( get_option('date_format')));?>
				</div>				
			</div>
		</div>
		<div class="post-meta-right d-flex">			
			<div class="post-single-meta-item meta-cmt">
				<i class="fal fa-comments"></i>
				<span class="item-val">
					<?php echo esc_attr(get_comments_number());?>
				</span>
			</div>

			<?php if(function_exists('papermag_get_views')):;?>
			<div class="post-single-meta-item meta-view">
				<i class="fal fa-bolt"></i>
				<span class="item-val">
					<?php echo esc_attr(papermag_get_views());?>
				</span>
			</div>
			<?php endif;?>
		</div>
	</div>
	<header class="entry-header">
		<?php 
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'papermag' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'papermag' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if(true == $blog_tags || function_exists('papermag_post_share')):?>
	<div class="entry-footer">
		<div class="row">
			<div class="col-lg-6 col-6">
				<?php 
					if(true == $blog_tags){
						papermag_entry_footer();
					}
				?>
			</div>
			<div class="col-lg-6 col-6 text-right">
				<?php 
				if(true == $blog_share){
					if(function_exists('papermag_post_share')){
						papermag_post_share();
					}
					
				}
				?>
			</div>
		</div>
	</div>
	<?php endif;?>
</article><!-- #post-<?php the_ID(); ?> -->
