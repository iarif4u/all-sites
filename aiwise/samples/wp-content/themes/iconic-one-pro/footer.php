<?php
/**
 * Footer section template.
 * @package WordPress
 * 
 * @since Iconic One Pro 1.0
 */
?>
<?php $options = get_option('iconiconepro'); ?>
	</div><!-- #main .wrapper -->
	<?php if($options['iconic_one_pro_footer_widget'] == '1') { // display footer widgets() ?>
			<div id="iop-footer" class="widget-area">
				<div class="footer-widget">
                <?php if( is_active_sidebar( 'footer-one' ) ) dynamic_sidebar( 'footer-one' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-two' ) ) dynamic_sidebar( 'footer-two' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-three' ) ) dynamic_sidebar( 'footer-three' ); ?>
				</div>
            </div>
	 <?php } ?>		
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
		<div class="footercopy"><?php echo wp_kses_post(get_theme_mod( 'textarea_copy', 'custom footer text left' )); ?></div>
		<div class="footercredit"><?php echo wp_kses_post(get_theme_mod( 'custom_text_right', 'custom footer text right' )); ?></div>
		<div class="clear"></div>
		</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<div class="site-wordpress">
		<?php if($options['themonic_credit_link'] == '1') { // for removing credit link () ?>
		        <?php if ( isset ($options['themonic_affiliate']) && $options['themonic_affiliate'] !== '' ): ?>
					<a href="https://themonic.com/iconic-one-pro/?ap_id=<?php echo $options['themonic_affiliate']; ?>">Iconic One Pro</a> Theme | Powered by <a href="http://wordpress.org">Wordpress</a>
					  <?php else:?>
					<a href="https://themonic.com/iconic-one-pro/">Iconic One Pro</a> Theme | Powered by <a href="https://wordpress.org">Wordpress</a>
				<?php endif; ?>	
									
		<?php } ?>		
				</div><!-- .site-info -->
				<div class="clear"></div>
			<?php if ($options['enable_footer_code'] != '') { ?>
				<?php if ( isset ($options['footer_analytics']) && $options['footer_analytics'] !== '' ) { ?>
							 <div class="footer-analytics"><?php echo $options['footer_analytics']; ?></div>
				<?php } ?>
			<?php } ?>
		</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>