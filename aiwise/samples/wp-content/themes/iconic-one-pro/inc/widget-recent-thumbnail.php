<?php
/**
 * Recent posts Thumbnail widget
 * Display most recent posts from specified categories.
 * Author: Shashank Singh | Themonic.com
 */

//register widgets
class themonicwidget extends WP_Widget {
    function __construct() {
        parent::__construct(false, $name = 'Iconic One Pro Recent Posts Thumbnails');
    }
	function form($instance) {             
        $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $io_posts = isset( $instance['io_posts'] ) ? esc_attr( $instance['io_posts'] ) : '5';
		$io_recent_order = isset( $instance['io_recent_order'] ) ? esc_attr( $instance['io_recent_order'] ) : 'date';
		$io_category = isset( $instance['io_category'] ) ? esc_attr( $instance['io_category'] ) : '';
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'themonic'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('io_posts'); ?>"><?php _e('Number of Posts Displayed:', 'themonic'); ?> <input class="widefat" id="<?php echo $this->get_field_id('io_posts'); ?>" name="<?php echo $this->get_field_name('io_posts'); ?>" type="text" value="<?php echo $io_posts; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('io_recent_order'); ?>"><?php _e('Order By: date or modified', 'themonic'); ?> <input class="widefat" id="<?php echo $this->get_field_id('io_recent_order'); ?>" name="<?php echo $this->get_field_name('io_recent_order'); ?>" type="text" value="<?php echo $io_recent_order; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('io_category'); ?>"><?php _e('Enter numerical category ID', 'themonic'); ?> <input class="widefat" id="<?php echo $this->get_field_id('io_category'); ?>" name="<?php echo $this->get_field_name('io_category'); ?>" type="text" value="<?php echo $io_category; ?>" /></label></p>

		<?php
    }
	function widget($args, $instance) {
    extract( $args );
    $title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
	$io_posts = isset( $instance['io_posts'] ) ? esc_attr( $instance['io_posts'] ) : '5';
	$io_recent_order = isset( $instance['io_recent_order'] ) ? esc_attr( $instance['io_recent_order'] ) : 'date';
	$io_category = isset( $instance['io_category'] ) ? esc_attr( $instance['io_category'] ) : '';
    ?>
      <?php echo $before_widget; ?>
         <?php if ( $title )
            echo $before_title . $title . $after_title; ?>
 
         <div class="themonicpt">        
		 <ul>
    <?php
        global $post;
        $args = array( 'numberposts' => $io_posts , 'orderby' => $io_recent_order , 'category' => $io_category );
        $myposts = get_posts( $args );
        foreach( $myposts as $post ) : setup_postdata($post); ?>
		<li>
		    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
				<a href="<?php the_permalink();?>"><?php the_post_thumbnail('themonic-thumbnail'); ?></a>
			<?php else :?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themonic' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
				<img class="alignleft" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sidethumb/default.png" />
			</a>
				<?php endif;?>
					<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
	    </li> 
			<?php wp_reset_postdata(); endforeach; ?>
		</ul><div class="clear"></div>
		</div>
 
         <?php echo $after_widget; ?>
<?php
    }
}
add_action('widgets_init', function() { return register_widget( "themonicwidget" ); }); 
