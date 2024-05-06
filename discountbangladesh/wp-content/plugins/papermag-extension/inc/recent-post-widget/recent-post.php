<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class PaperMag_Recent_Post extends WP_Widget {

	function __construct() {

		$widget_ops = array( 
			'classname' => 'papermag_latest_news_widget', 
			'description' => esc_html__('A widget that display latest posts from all categories', 'papermag-extension') 
		);
		$control_ops = array( 'width' => 300, 
			'height' => 350, 
			'id_base' => 'papermag_latest_news_widget' 
		);

		parent::__construct( 
			'papermag_latest_news_widget', 
			esc_html__('papermag Latest Posts With Thumbnail', 'papermag-extension'), 
			$widget_ops, $control_ops 
		);
	}

	function widget( $args, $instance ) {
		extract( $args );

		// Our variables from the widget settings.
		$title 	= apply_filters('widget_title', (!isset($instance['title']) ? '' : $instance['title']) );
		$categories 	= (!isset($instance['categories'])? '': $instance['categories']);
		$post_count 	= (!isset($instance['post_count'])? '': $instance['post_count']);
        $post_title_crop 	= (!isset($instance['post_title_crop'])? '10': $instance['post_title_crop']);
     
        $layout     = 'layout1';

        if ( ! empty($instance['orderby']) ) {
            $orderby     = $instance['orderby'];
        } else {
            $orderby     = 'latestpost';
        }

        if ( $orderby == 'popularposts' ) {
			$query = array(
				'posts_per_page' => $post_count,
				'order' => 'DESC',
				'nopaging' => 0,
				'post_status' => 'publish',
				'meta_key' => 'newszone_post_views_count',
				'orderby' => 'meta_value_num',
				'ignore_sticky_posts' => 1,
				'cat' => $categories,
				'suppress_filters' => false,
			);
        } else {
			$query = array(
				'posts_per_page' => $post_count,
				'order' => 'DESC',
				'nopaging' => 0,
				'post_status' => 'publish',
				'ignore_sticky_posts' => 1,
				'cat' => $categories,
				'suppress_filters' => false,
			);
        }

		$args = new WP_Query($query);
		if ($args->have_posts()) :

			print $before_widget;

		if ( $title )
			print $before_title . $title . $after_title;
		?>
		<div class="recent-posts-widget">
			<div class="papermag-post-item">
				<?php $i=0; while ($args->have_posts()) : $args->the_post(); $i++; ?>
					<div class="papermag__post-content d-flex papermag-common-hover">
						<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
							<div class="post-thumb">
							 <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>);">
						 	  </a>
							</div>
							<div class="papermag__postpost-info">
                                <div class="post-meta-info common-style-meta d-flex">
                                    <div class="post-cat">                                
                                        <?php papermag_category_name();?>
                                    </div>

                                    <div class="post-cmt">
                                        <i class="fal fa-comments"></i> <?php echo esc_attr(get_comments_number());?>
                                    </div>              

                                    <div class="post-view">
                                        <i class="fal fa-bolt"></i> <?php echo esc_attr(papermag_get_views());?>
                                    </div>
                                </div>
								<h5 class="papermag__post-title hover-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), $post_title_crop,'')); ?></a></h5>
							</div>
						<?php } else{?>
							<div class="post-info media-body">
                                <div class="post-meta-info common-style-meta d-flex">
                                    <div class="post-cat">                                
                                        <?php papermag_category_name();?>
                                    </div>

                                    <div class="post-cmt">
                                        <i class="fal fa-comments"></i> <?php echo esc_attr(get_comments_number());?>
                                    </div>              

                                    <div class="post-view">
                                        <i class="fal fa-bolt"></i> <?php echo esc_attr(papermag_get_views());?>
                                    </div>
                                </div>
								<h5 class="papermag__post-title hover-title"><a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), $post_title_crop,'')); ?></a></h5>
							</div>
						<?php } ?>
						<div class="clearfix"></div>
						</div>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php
	print $after_widget;
}

function update( $new_instance, $old_instance ) {
	$instance = $old_instance;

	$instance['title'] 			= esc_html( $new_instance['title'] );
	$instance['categories'] 	= $new_instance['categories'];
	$instance['orderby'] 		= esc_html( $new_instance['orderby'] );
    $instance['post_count'] 	= esc_html( $new_instance['post_count'] );
    $instance['post_title_crop'] = esc_html( $new_instance['post_title_crop'] );

	return $instance;
}


function form( $instance ) {

	$defaults = array(
		'title' => esc_html__('Blog Posts', 'papermag-extension'),
		'post_count' => 4,
		'orderby' => 'latestpost',
		'categories' => '',
		'post_title_crop' => 10
		);

      $instance = wp_parse_args( (array) $instance, $defaults );

      ?>
      
		<!-- Widget Title -->
		<p>
			<label for="<?php print $this->get_field_id( 'title' ); ?>"><?php esc_html_e('Title:', 'papermag-extension'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'title' ); ?>" name="<?php print $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>"  />
		</p>

		<!-- Ordered By -->
        <p>
            <label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php esc_html_e('Order By', 'papermag-extension'); ?></label>
            <?php
            $options = array(
                'latestpost' 	=> 'latest Posts',
                'popularposts' 	=> 'Popular Posts',
            );
            if(isset($instance['orderby'])) $orderby = $instance['orderby'];
            ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
                <?php
                $op = '<option value="%s"%s>%s</option>';

                foreach ($options as $key=>$value ) {

                    if ($orderby === $key) {
                        printf($op, $key, ' selected="selected"', $value);
                    } else {
                        printf($op, $key, '', $value);
                    }
                }
                ?>
            </select>
        </p>

		<!-- Post Category -->
		<p>
			<label for="<?php print $this->get_field_id('categories'); ?>"><?php esc_html_e('Filter by Categories', 'papermag-extension'); ?></label>
			<select id="<?php print $this->get_field_id('categories'); ?>" name="<?php print $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>All categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php print $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php print $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<!-- Count of Latest Posts -->
		<p>
			<label for="<?php print $this->get_field_id( 'post_count' ); ?>"><?php esc_html_e('Count of Latest Post', 'papermag-extension'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'post_count' ); ?>" name="<?php print $this->get_field_name( 'post_count' ); ?>" value="<?php echo esc_attr( $instance['post_count'] ); ?>" size="3" />
		</p>

      <!-- Post Title Crop-->
		<p>
			<label for="<?php print $this->get_field_id( 'post_title_crop' ); ?>"><?php esc_html_e('Post Title Crop:', 'papermag-extension'); ?></label>
			<input  type="text" class="widefat" id="<?php print $this->get_field_id( 'post_title_crop' ); ?>" name="<?php print $this->get_field_name( 'post_title_crop' ); ?>" value="<?php echo esc_attr( $instance['post_title_crop'] ); ?>"  />
		</p>


		<?php
	}

}
