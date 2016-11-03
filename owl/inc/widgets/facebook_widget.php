<?php
/**
 * Plugin Name: Facebook Widget
 */

add_action( 'widgets_init', 'winvader_facebook_load_widget' );

function winvader_facebook_load_widget() {
	register_widget( 'winvader_facebook_widget' );
}

class winvader_facebook_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function winvader_facebook_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'winvader_facebook_widget', 'description' => esc_html__('A widget that displays a Facebook Like Box', 'winvader') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 320, 'height' => 430, 'id_base' => 'winvader_facebook_widget' );

		/* Create the widget. */
		parent::__construct( 'winvader_facebook_widget', esc_html__('Owl - Facebook Like Box', 'winvader'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$page_url      = $instance['page_url'];
		$cover_img_url = $instance['cover_img_url'];
		$cover_title   = $instance['cover_title'];
		$cover         = $instance['cover'];
		$faces         = $instance['faces'];
		$stream        = $instance['stream'];
		$header        = $instance['header'];
		$width         = $instance['width'];
		$height        = $instance['height'];
		
		/* Before widget (defined by themes). */
		echo balanceTags($before_widget);

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo balanceTags($before_title . $title . $after_title);
		
		$themedir = get_stylesheet_directory_uri();
		if ( $cover_img_url == '' ) {
			$cover_img_url = $themedir.'/img/sidebar-facebook-image.jpg';
		}
		?>
		
			<div class="facebook-widget-wrapper">
			<div class="facebook-widget-content" style="width:<?php echo balanceTags($width); ?>px; height:<?php echo balanceTags($height); ?>px;">
				<?php if($cover) { ?>
				<div class="facebook-widget-cover" style="background-image: url('<?php echo balanceTags($cover_img_url); ?>');">
					<h3><?php echo balanceTags($cover_title); ?></h3>
				</div>
				<?php } ?>
				<iframe src="http://www.facebook.com/plugins/likebox.php?href=<?php echo balanceTags($page_url); ?>&amp;width=<?php echo balanceTags($width); ?>&amp;colorscheme=light&amp;show_faces=<?php if($faces) { echo 'true'; } else { echo 'false'; } ?>&amp;border_color&amp;stream=<?php if($stream) { echo 'true'; } else { echo 'false'; } ?>&amp;header=<?php if($header) { echo 'true'; } else { echo 'false'; } ?>&amp;height=<?php echo balanceTags($height); ?>" style="border:none; overflow:hidden; width:<?php echo balanceTags($width); ?>px; height:<?php echo balanceTags($height); ?>px;"></iframe>
			</div>
			</div>
			
		<?php

		/* After widget (defined by themes). */
		echo balanceTags($after_widget);
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['page_url']      = strip_tags( $new_instance['page_url'] );
		$instance['cover_img_url'] = strip_tags( $new_instance['cover_img_url'] );
		$instance['cover_title']   = $new_instance['cover_title'];
		$instance['cover']         = strip_tags( $new_instance['cover'] );
		$instance['faces']         = strip_tags( $new_instance['faces'] );
		$instance['stream']        = strip_tags( $new_instance['stream'] );
		$instance['header']        = strip_tags( $new_instance['header'] );
		$instance['width']         = strip_tags( $new_instance['width'] );
		$instance['height']        = strip_tags( $new_instance['height'] );

		return $instance;
	}
 

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Find us on Facebook', 'width' => 320, 'height' => 430, 'header' => 'on', 'cover_img_url' => '', 'cover_title' => '', 'cover' => 'on', 'faces' => 'on', 'page_url' => '', 'stream' => true);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'title' )); ?>">Title:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'title' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'title' )); ?>" value="<?php echo balanceTags($instance['title']); ?>" style="width:100%;" />
		</p>
		
		<!-- Page url -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'page_url' )); ?>">Facebook Page URL:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'page_url' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'page_url' )); ?>" value="<?php echo balanceTags($instance['page_url']); ?>" style="width:100%;" />
			<small>For example: http://www.facebook.com/envato</small>
		</p>
		
		<!-- Cover Image url -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'cover_img_url' )); ?>">Cover Image URL:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'cover_img_url' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'cover_img_url' )); ?>" value="<?php echo balanceTags($instance['cover_img_url']); ?>" style="width:100%;" />
		</p>
		
		<!-- Cover Title -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'cover_title' )); ?>">Cover Title Text:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'cover_title' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'cover_title' )); ?>" value="<?php echo balanceTags($instance['cover_title']); ?>" style="width:100%;" />			
			<small>For example: &lt;i&gt;follow on&lt;/i&gt;&lt;br&gt; facebook</small>
		</p>

		<!-- Cover -->
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'cover' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'cover' )); ?>" <?php checked( (bool) $instance['cover'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'cover' )); ?>">Show Cover Image & Text:</label>
		</p>
		
		<!-- Faces -->
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'faces' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'faces' )); ?>" <?php checked( (bool) $instance['faces'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'faces' )); ?>">Show Faces:</label>
		</p>
		
		<!-- Stream -->
		<p>	
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'stream' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'stream' )); ?>" <?php checked( (bool) $instance['stream'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'stream' )); ?>">Show Stream:</label>
		</p>
		
		<!-- Header -->
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'header' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'header' )); ?>" <?php checked( (bool) $instance['header'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'header' )); ?>">Show Header:</label>
		</p>
		
		<!-- Widget width -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'width' )); ?>">Like Box width:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'width' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'width' )); ?>" value="<?php echo balanceTags($instance['width']); ?>" style="width:20%;" />
		</p>
		
		<!-- Widget height -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'height' )); ?>">Like Box height:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'height' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'height' )); ?>" value="<?php echo balanceTags($instance['height']); ?>" style="width:20%;" />
			<small>Note: If you are showing the stream the height should be around 500.</small>
		</p>


	<?php
	}
}

?>