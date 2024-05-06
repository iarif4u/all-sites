<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PaperMag
 */

get_header();
$cate_breadcrumb_on = cs_get_option('cate_breadcrumb_on');
$papermag_single_post_layout = cs_get_option('papermag_single_post_layout');
papermag_breadcrumb();
if(is_active_sidebar('sidebar-1')){
	$paperPostClass = 'col-lg-9';
}else{
	$paperPostClass = 'col-lg-10 offset-lg-1';
}
?>
	<div class="papermag-single-post-section">
		<div class="container">
			<div class="row">
				<?php if('1' == $papermag_single_post_layout):?>
				<?php get_sidebar();?>
				<div class="<?php echo esc_attr($paperPostClass);?>">
					<?php papermag_single_post_loop();?>
				</div>
				<?php elseif('2' == $papermag_single_post_layout):?>
				<div class="col-lg-10 offset-lg-1">
					<?php papermag_single_post_loop();?>
				</div>
				<?php else:?>				
				<div class="<?php echo esc_attr($paperPostClass);?>">
					<?php papermag_single_post_loop();?>
				</div>
				<?php get_sidebar();?>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php

get_footer();
