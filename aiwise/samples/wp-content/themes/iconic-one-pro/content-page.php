<?php
/*
 * The template used for displaying page content in page.php
 *
 * @package Iconic One Pro
 * 
 * @since Iconic One Pro 1.0
 */
?>
<?php $options = get_option('iconiconepro'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<center><?php the_post_thumbnail('post-thumbnail'); ?></center>
		
	<?php if ( !is_page_template('page-templates/no-title.php') && !is_page_template('page-templates/no-title-full-width.php')  ) : ?>		
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
	<?php endif; ?>

		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'themonic' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
					
	<?php  if ( !is_page( array('contact', 'contact-us')) )  { ?>				
		<?php if( $options['themonic_social_share'] == '1') { // display social sharing buttons() ?>
		<div class="themonic-social-share">
			<ul>
			<?php if($options['themonic_facebook'] == '1') { // display facebook () ?>
				<li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>%2F&amp;send=false&amp;layout=button_count&amp;width=107&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:107px; height:21px;" allowTransparency="true"></iframe></li>
            <?php } ?>
			<?php if($options['themonic_fshare'] == '1') { // display facebook share () ?>
				<li><iframe src="https://www.facebook.com/plugins/share_button.php?href=<?php the_permalink(); ?>&layout=button&size=small&width=89&height=20&appId" width="89" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe></li>
			<?php } ?>		
            <?php if($options['themonic_twitter'] == '1') { // display twitter () ?>
					<li>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						<a data-lang="en" data-via="" data-text="<?php the_title(); ?>" data-url="<?php the_permalink(); ?>" class="twitter-share-button" href="https://twitter.com/share">tweet</a>
					</li>
			<?php } ?>	
			<?php if($options['themonic_pin'] == '1') { // display pinterest () ?>		
						<li>
							<a data-pin-config="none" data-pin-do="buttonBookmark" href="//pinterest.com/pin/create/button/"><img src="//assets.pinterest.com/images/PinExt.png" /></a>
							<script src="//assets.pinterest.com/js/pinit.js"></script>
						</li>
			<?php } ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php } ?>
	<?php } ?>
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'themonic' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post -->
