<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package papermag
 */
if(has_post_thumbnail()){
    $post_class = 'papermag-blog-item papermag-common-hover';
}else{
    $post_class = 'papermag-blog-item papermag-common-hover no-thumbnail';
}
$theme_blog_author = cs_get_option('theme_blog_author');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php if( has_post_thumbnail()):?>
	<div class="papermag-blog-thumb">
		<?php the_post_thumbnail('papermag_blog_940_400');?>
		<?php if(true == $theme_blog_author):?>
		<?php printf('<a class="blog-authore" href="%2$s">%1$s %3$s</a>',
			get_avatar( get_the_author_meta( 'ID' ), 30 ), 
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			get_the_author()
		); ?>
		<?php endif;?>
	</div>
	<?php endif;?>	
	<?php get_template_part('template-parts/common/post-summery'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
