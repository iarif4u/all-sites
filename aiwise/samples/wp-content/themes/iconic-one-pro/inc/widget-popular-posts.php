<?php
/*
 * Simple Popular Post Widget	for Iconic One Pro										
 * Display Popular posts in your sidebar.
 * Author: Shashank Singh | Themonic.com
*/

//register widgets
function io_popular_widget() {
	register_widget( 'io_popular_widget' );
}

class io_popular_widget extends WP_Widget {
  function __construct() {
  $widget_ops = array('classname' => 'io_popular_widget','description' => __( 'A Widget to dispaly Popular Posts With Thumbs', 'themonic' ));
  parent::__construct('iop-popular-posts-widget', __( 'Iconic One Pro Popular Posts', 'themonic' ), $widget_ops);	
	}
	
/*
* Display the widget
*/	
  	function widget( $args, $instance ) {
		extract($args);
		 		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
				$ioposts = isset( $instance['ioposts'] ) ? esc_attr( $instance['ioposts'] ) : '';
		
		/* Before widget (defined by themes). */
		echo $before_widget;
		if($title)
			echo $before_title . $title . $after_title;
		/* Display the widget title if one was input (before and after defined by themes). */
		?>

 <!-- Begin popular posts -->
			<div class="themonicpt">
			<ul>
					<?php global $post;$iop_popularposts = new WP_Query('orderby=comment_count&ignore_sticky_posts=1&showposts='.$ioposts );
					while ($iop_popularposts->have_posts()) : $iop_popularposts->the_post(); ?>
					
				 <li>
					<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
						<a href="<?php the_permalink();?>"><?php the_post_thumbnail('themonic-thumbnail'); ?></a>
						<?php else :?>
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
								<img class="alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sidethumb/default.png" alt="defaultimg" />
							</a>
					<?php endif;?>
							<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
				</li>
					<?php endwhile; wp_reset_query(); ?>
			</ul>
			</div> 
 			<!-- End recent posts -->
 

		<!-- End container -->
		<?php	
	/* After widget (defined by themes). */
		echo $after_widget;		

	}
	
/**
	 * Update the widget settings.
	 */	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'] ;
		$instance['ioposts'] = strip_tags( $new_instance['ioposts']);
 		return $instance;
	}
	
	// Widget form
	
	function form( $instance ) {

				$defaults = array( 'title' => __('Popular Posts ', 'themonic '),'ioposts' => '5');
   				$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
 		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'themonic'); ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

 		
		<p>
			<label for="<?php echo $this->get_field_id('ioposts'); ?>"><?php _e('Number of Posts to Show:','themonic'); ?></label>
			<input id="<?php echo $this->get_field_id('ioposts'); ?>" type="text" name="<?php echo $this->get_field_name('ioposts'); ?>" value="<?php echo $instance['ioposts'];?>"  maxlength="2" size="5" /> 
		</p>
		<?php
			
	}	

}
add_action( 'widgets_init', 'io_popular_widget' );
?>
