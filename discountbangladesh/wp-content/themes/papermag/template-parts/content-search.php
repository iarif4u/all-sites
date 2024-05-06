<?php
/**
 * Template part for displaying results in search pages
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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<?php if( has_post_thumbnail()):?>
	<div class="papermag-blog-thumb">
		<?php the_post_thumbnail('papermag_blog_940_400');?>
		<?php printf('<a class="blog-authore" href="%2$s">%1$s %3$s</a>',
			get_avatar( get_the_author_meta( 'ID' ), 30 ), 
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			get_the_author()
		); ?>
	</div>
	<?php endif;?>
	<div class="papermag-blog-content">
		<h1 class="hover-title exo-main-post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
		<div class="blog-excerpt">
			<?php the_excerpt();?>
		</div>	
		<a class="papermag-btn" href="<?php the_permalink();?>">Read More</a>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
