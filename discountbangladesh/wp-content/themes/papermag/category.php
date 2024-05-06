<?php
/**
 * The template for displaying Category Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PaperMag
 */

get_header();
$cate_breadcrumb_on = cs_get_option('cate_breadcrumb_on');
$papermag_blog_layout = cs_get_option('papermag_blog_layout');
if(false != $cate_breadcrumb_on){
	papermag_breadcrumb();
}
$paperPostClass = '';
if(is_active_sidebar('sidebar-1')){
	$paperPostClass = 'col-lg-9';
}else{
	$paperPostClass = 'col-lg-12';
}
?>  
    <div class="papermag-blog-main-content papermag-category-page">
		<div class="container">
			<div class="row">
				<?php if('1' == $papermag_blog_layout):?>
				<?php get_sidebar();?>
				<div class="<?php echo esc_attr($paperPostClass);?>">
                    <?php papermag_category_loop();?>				
				</div>
				<?php elseif('2' == $papermag_blog_layout):?>
				<div class="col-lg-12">
					<?php papermag_category_loop();?>				
				</div>
				<?php else:?>
				<div class="<?php echo esc_attr($paperPostClass);?>">
					<?php papermag_category_loop();?>				
				</div>
				<?php get_sidebar();?>
				<?php endif;?>
			</div>
		</div>
	</div>

<?php
get_footer();
