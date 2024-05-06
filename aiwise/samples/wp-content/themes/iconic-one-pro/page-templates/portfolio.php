<?php
/**
 * Template Name: Portfolio Template
 * Only works when there are some posts in a category named portfolio
 * Iconic One Pro<div style="padding:20px;" class="portfolio-template">
 */
get_header(); ?>


	<h1 style="text-align:center;padding:20px 0;">
	<?php get_template_part( 'content', 'page' ); ?>
	</h1>

 	<div class="io-portfolio-wrap">
  <div class="io-portfolio">
	<ul class="iop-image">
	<?php
	query_posts(array('category_name' => 'portfolio', 'posts_per_page' => 12));
	if(have_posts()) :
	    while(have_posts()) : the_post();
	?>

	  <li>
		<?php the_post_thumbnail('ioslider-thumbnail'); ?>
		<p class="portfolio-caption"><a href="<?php the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
	  </li>

	<?php
	    endwhile;
	endif;
	wp_reset_query();
	?>
	</ul>
  </div>
</div>

    <br class="clearfloat" />

<?php get_footer(); ?>