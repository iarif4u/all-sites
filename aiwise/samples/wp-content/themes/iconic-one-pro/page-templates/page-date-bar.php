<?php
/**
 * Template Name: Page with Date Author Bar
 *
 * Description: Normal full width template.
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */

get_header(); ?>


	<div id="primary" class="site-content">
		<?php if($options['themonic_breadcrumb'] == '1') { ?>
			<?php if ( !is_front_page() ) { ?>
				<div class="themonic-breadcrumb"><?php iop_breadcrumb(); ?></div> 
			<?php } ?>
		<?php } ?>
		<div id="content" role="main">
		
					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				
				<div class="below-title-meta">
		<div class="adt">
		<?php _e('By','themonic'); ?>
        <span class="vcard author">
			<span class="fn"><?php echo the_author_posts_link(); ?></span>
        </span>
        <span class="meta-sep">|</span> 
			<span class="date updated"><?php echo get_the_date(); ?></span>		 
        </div>
		<!--start
		<div class="adt-comment">
		<span><a class="link-comments" href="<?php  comments_link(); ?>"><?php comments_number(__('0 Comment','themonic'),__('1 Comment','themonic'),__('% Comments','themonic')); ?></a></span> 
        </div>
		end- uncomment start and end line to show comments -->      
     </div><!-- below title meta end --><div class="clear"></div>
				
				<?php comments_template( '', true ); ?>
				
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		
	</div><!-- #primary -->
	
<?php get_sidebar(); ?>	
<?php get_footer(); ?>
