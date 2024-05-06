<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package PaperMag
 */

get_header();
papermag_breadcrumb();
$papermag_news_layout = cs_get_option('papermag_news_layout');
$paperPostClass = '';
if(is_active_sidebar('sidebar-1')){
	$paperPostClass = 'col-lg-9';
}else{
	$paperPostClass = 'col-lg-10 offset-lg-1';
}
?>
	<div class="papermag-blog-main-content">
		<div class="container">
			<div class="row">
			<?php if('1' == $papermag_news_layout):?>
				<?php get_sidebar();?>
				<div class="<?php echo esc_attr($paperPostClass);?>">
					<?php papermag_archive_loop();?>
				</div>
				<?php elseif('2' == $papermag_news_layout):?>
					<div class="col-lg-10 offset-lg-1">
						<?php papermag_archive_loop();?>
					</div>
				<?php else:?>
					<div class="<?php echo esc_attr($paperPostClass);?>">
						<?php papermag_archive_loop();?>
					</div>
					<?php get_sidebar();?>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php
get_footer();
