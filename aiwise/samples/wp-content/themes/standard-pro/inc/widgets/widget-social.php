<?php
/**
 * Social widget.
 *
 * @package    standard_pro
 * @author     HappyThemes
 * @copyright  Copyright (c) 2016, HappyThemes
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */
class standard_pro_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets.
	 *
	 * @since 1.0.0
	 */
	function __construct() {

		// Set up the widget options.
		$widget_options = array(
			'classname'   => 'widget-standard_pro-social widget_social_icons',
			'description' => __( 'Display your social media icons.', 'standard-pro' )
		);

		// Create the widget.
		parent::__construct(
			'standard_pro-social',                        // $this->id_base
			__( '&raquo; Social Icons', 'standard-pro' ), // $this->name
			$widget_options                           // $this->widget_options
		);
	}

	/**
	 * Outputs the widget based on the arguments input through the widget controls.
	 *
	 * @since 1.0.0
	 */
	function widget( $args, $instance ) {
		extract( $args );

		// Output the theme's $before_widget wrapper.
		echo $before_widget;

		// If the title not empty, display it.
		if ( $instance['title'] ) {
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;
		}
		if ( $instance['desc'] ) {
			echo '<div class="desc">' . esc_html( $instance['desc'] ) . '</div>';
		}

			// Display the social icons.
			echo '<div class="social-icons"><ul>';
				if ( $instance['twitter'] ) {
					echo '<li class="twitter"><a href="' . esc_url( $instance['twitter'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-twitter.png" alt=""/></a></li>';
				}
				if ( $instance['facebook'] ) {
					echo '<li class="facebook"><a href="' . esc_url( $instance['facebook'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-facebook.png" alt=""/></a></li>';
				}
				if ( $instance['pinterest'] ) {
					echo '<li class="pinterest"><a href="' . esc_url( $instance['pinterest'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-pinterest.png" alt=""/></a></li>';
				}
				if ( $instance['youtube'] ) {
					echo '<li class="youtube"><a href="' . esc_url( $instance['youtube'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-youtube.png" alt=""/></a></li>';
				}
				if ( $instance['linkedin'] ) {
					echo '<li class="linkedin"><a href="' . esc_url( $instance['linkedin'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-linkedin.png" alt=""/></a></li>';
				}
				if ( $instance['instagram'] ) {
					echo '<li class="instagram"><a href="' . esc_url( $instance['instagram'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-instagram.png" alt=""/></a></li>';
				}
				if ( $instance['tumblr'] ) {
					echo '<li class="tumblr"><a href="' . esc_url( $instance['tumblr'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-tumblr.png" alt=""/></a></li>';
				}
				if ( $instance['rss'] ) {
					echo '<li class="rss"><a href="' . esc_url( $instance['rss'] ) . '"><img src="'. get_template_directory_uri() . '/assets/img/icon-rss.png" alt=""/></a></li>';
				}
			echo '</ul></div>';

		// Close the theme's widget wrapper.
		echo $after_widget;

	}

	/**
	 * Updates the widget control options for the particular instance of the widget.
	 *
	 * @since 1.0.0
	 */
	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title']      = strip_tags( $new_instance['title'] );
		$instance['desc']      = strip_tags( $new_instance['desc'] );
		$instance['facebook']   = esc_url( $new_instance['facebook'] );
		$instance['twitter']    = esc_url( $new_instance['twitter'] );
		$instance['pinterest']  = esc_url( $new_instance['pinterest'] );
		$instance['youtube']      = esc_url( $new_instance['youtube'] );
		$instance['linkedin']   = esc_url( $new_instance['linkedin'] );
		$instance['instagram']  = esc_url( $new_instance['instagram'] );
		$instance['tumblr']     = esc_url( $new_instance['tumblr'] );
		$instance['rss']        = esc_url( $new_instance['rss'] );

		return $instance;
	}

	/**
	 * Displays the widget control options in the Widgets admin screen.
	 *
	 * @since 1.0.0
	 */
	function form( $instance ) {

		// Default value.
		$defaults = array(
			'title'      => esc_html__( 'Follow Us', 'standard-pro' ),
			'desc'       => esc_html__( 'Stay updated via social channels', 'standard-pro' ),
			'facebook'   => '',
			'twitter'    => '',
			'pinterest'  => '',
			'youtube'    => '',
			'linkedin'   => '',
			'instagram'  => '',
			'tumblr'     => '',
			'rss'        => ''
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
	?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>">
				<?php _e( 'Description', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo esc_attr( $instance['desc'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">
				<?php _e( 'Facebook', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_url( $instance['facebook'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">
				<?php _e( 'Twitter', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_url( $instance['twitter'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'pinterest' ); ?>">
				<?php _e( 'Pinterest', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_url( $instance['pinterest'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'youtube' ); ?>">
				<?php _e( 'YouTube', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_url( $instance['youtube'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'linkedin' ); ?>">
				<?php _e( 'LinkedIn', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_url( $instance['linkedin'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'instagram' ); ?>">
				<?php _e( 'Instagram', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_url( $instance['instagram'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'tumblr' ); ?>">
				<?php _e( 'Tumblr', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo esc_url( $instance['tumblr'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">
				<?php _e( 'RSS Feed', 'standard-pro' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo esc_url( $instance['rss'] ); ?>" placeholder="<?php echo  esc_attr( 'http://' ); ?>" />
		</p>

	<?php

	}

}
