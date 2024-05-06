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

if(get_post_meta(get_the_ID(), 'papermag_post_gall_meta', true)) {
	$post_gallery_meta = get_post_meta(get_the_ID(), 'papermag_post_gall_meta', true);
} else {
	$post_gallery_meta = array();
}

if( array_key_exists( 'post-gall-item', $post_gallery_meta )) {
	$gall_img_url = $post_gallery_meta['post-gall-item'];
} else {
	$gall_img_url = '';
}
$post_gallery_ids = explode( ',', $gall_img_url );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
	<div class="papermag-blog-gallery owl-carousel">
		<?php foreach($post_gallery_ids as $item):?>
            <div class="papermag-post-gall-item" style="background-image:url(<?php echo esc_url(wp_get_attachment_url($item));?>)">
            </div>
        <?php endforeach;?>
	</div>	
	<?php get_template_part('template-parts/common/post-summery'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
