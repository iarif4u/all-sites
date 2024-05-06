<?php
/**
 * Template Name: PaperMag Elementor Full Template
 *
 * 
 * @package PaperMag
 */

get_header(); 
?>

<div class="clearfix"></div>

<div id="elementor_page_builder">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; // End of the loop. ?>

</div><!-- #main -->

<div class="clearfix"></div>

<?php get_footer(); ?>
