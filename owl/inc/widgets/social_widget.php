<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'winvader_social_load_widget' );

function winvader_social_load_widget() {
	register_widget( 'winvader_social_widget' );
}

class winvader_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function winvader_social_widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'winvader_social_widget', 'description' => esc_html__('A widget that displays your social icons', 'winvader') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'winvader_social_widget' );

		/* Create the widget. */
		parent::__construct( 'winvader_social_widget', esc_html__('Owl - Social Icons', 'winvader'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$facebook     = $instance['facebook'];
		$twitter      = $instance['twitter'];
		$instagram    = $instance['instagram'];
		$pinterest    = $instance['pinterest'];
		$bloglovin    = $instance['bloglovin'];
		$googleplus   = $instance['googleplus'];
		$tumblr       = $instance['tumblr'];
		$youtube      = $instance['youtube'];
		$flickr       = $instance['flickr'];
		$dribbble     = $instance['dribbble'];
		$vkontakte    = $instance['vkontakte'];
		$linkedin     = $instance['linkedin'];
		$digg         = $instance['digg'];
		$skype        = $instance['skype'];
		$vimeo        = $instance['vimeo'];
		$stumbleupon  = $instance['stumbleupon'];
		$yahoo        = $instance['yahoo'];
		$foursquare   = $instance['foursquare'];
		
		
		
		$rss = $instance['rss'];
		
		/* Before widget (defined by themes). */
		echo balanceTags($before_widget);

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo balanceTags($before_title . $title . $after_title);

		?>
		
			<div class="widget-social">
				<?php if($facebook) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twitter) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($instagram) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($pinterest) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($bloglovin) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>
				<?php if($googleplus) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i></a><?php endif; ?>
				<?php if($tumblr) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_tumblr')); ?>" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($youtube) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if($flickr) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_flickr')); ?>" target="_blank"><i class="fa fa-flickr"></i></a><?php endif; ?>
				<?php if($dribbble) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
				<?php if($vkontakte) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_vkontakte')); ?>" target="_blank"><i class="fa fa-vk"></i></a><?php endif; ?>
				<?php if($linkedin) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if($digg) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_digg')); ?>" target="_blank"><i class="fa fa-digg"></i></a><?php endif; ?>
				<?php if($skype) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_skype')); ?>" target="_blank"><i class="fa fa-skype"></i></a><?php endif; ?>
				<?php if($vimeo) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
				<?php if($stumbleupon) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_stumbleupon')); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a><?php endif; ?>
				<?php if($yahoo) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_yahoo')); ?>" target="_blank"><i class="fa fa-yahoo"></i></a><?php endif; ?>
				<?php if($foursquare) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_foursquare')); ?>" target="_blank"><i class="fa fa-foursquare"></i></a><?php endif; ?>				
				<?php if($rss) : ?><a href="<?php echo balanceTags(get_theme_mod('wi_rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
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
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['facebook']    = strip_tags( $new_instance['facebook'] );
		$instance['twitter']     = strip_tags( $new_instance['twitter'] );
		$instance['instagram']   = strip_tags( $new_instance['instagram'] );
		$instance['pinterest']   = strip_tags( $new_instance['pinterest'] );
		$instance['bloglovin']   = strip_tags( $new_instance['bloglovin'] );
		$instance['googleplus']  = strip_tags( $new_instance['googleplus'] );
		$instance['tumblr']      = strip_tags( $new_instance['tumblr'] );
		$instance['youtube']     = strip_tags( $new_instance['youtube'] );
		$instance['flickr']      = strip_tags( $new_instance['flickr'] );
		$instance['dribbble']    = strip_tags( $new_instance['dribbble'] );
		$instance['vkontakte']   = strip_tags( $new_instance['vkontakte'] );
		$instance['linkedin']    = strip_tags( $new_instance['linkedin'] );
		$instance['digg']        = strip_tags( $new_instance['digg'] );
		$instance['skype']       = strip_tags( $new_instance['skype'] );
		$instance['vimeo']       = strip_tags( $new_instance['vimeo'] );
		$instance['stumbleupon'] = strip_tags( $new_instance['stumbleupon'] );
		$instance['yahoo']       = strip_tags( $new_instance['yahoo'] );
		$instance['foursquare']  = strip_tags( $new_instance['foursquare'] );
		$instance['rss']         = strip_tags( $new_instance['rss'] );

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'Follow Me', 'facebook' => 'on', 'twitter' => 'on', 'instagram' => 'on', );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'title' )); ?>">Title:</label>
			<input id="<?php echo balanceTags($this->get_field_id( 'title' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'title' )); ?>" value="<?php echo balanceTags($instance['title']); ?>" style="width:90%;" />
		</p>
		
		<p>Note: Set your social links in the Customizer</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'facebook' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'facebook' )); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'facebook' )); ?>">Show Facebook:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'twitter' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'twitter' )); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'twitter' )); ?>">Show Twitter:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'instagram' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'instagram' )); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'instagram' )); ?>">Show Instagram:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'pinterest' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'pinterest' )); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'pinterest' )); ?>">Show Pinterest:</label>	
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'bloglovin' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'bloglovin' )); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'bloglovin' )); ?>">Show Bloglovin:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'googleplus' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'googleplus' )); ?>" <?php checked( (bool) $instance['googleplus'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'googleplus' )); ?>">Show Google Plus:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'tumblr' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'tumblr' )); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'tumblr' )); ?>">Show Tumblr:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'youtube' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'youtube' )); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'youtube' )); ?>">Show Youtube:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'flickr' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'flickr' )); ?>" <?php checked( (bool) $instance['flickr'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'flickr' )); ?>">Show Flickr:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'dribbble' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'dribbble' )); ?>" <?php checked( (bool) $instance['dribbble'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'dribbble' )); ?>">Show Dribbble:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'vkontakte' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'vkontakte' )); ?>" <?php checked( (bool) $instance['vkontakte'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'vkontakte' )); ?>">Show Vkontakte:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'linkedin' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'linkedin' )); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'linkedin' )); ?>">Show LinkedIn:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'digg' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'digg' )); ?>" <?php checked( (bool) $instance['digg'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'digg' )); ?>">Show Digg:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'skype' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'skype' )); ?>" <?php checked( (bool) $instance['skype'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'skype' )); ?>">Show Skype:</label>
		</p>
		
		<p> 
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'vimeo' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'vimeo' )); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'vimeo' )); ?>">Show Vimeo:</label>
			
		</p>
		
		<p> 
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'stumbleupon' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'stumbleupon' )); ?>" <?php checked( (bool) $instance['stumbleupon'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'stumbleupon' )); ?>">Show Stumbleupon:</label>
			
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'yahoo' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'yahoo' )); ?>" <?php checked( (bool) $instance['yahoo'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'yahoo' )); ?>">Show Yahoo:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'foursquare' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'foursquare' )); ?>" <?php checked( (bool) $instance['foursquare'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'foursquare' )); ?>">Show Foursquare:</label>
		</p>
		
		<p>
			<input type="checkbox" id="<?php echo balanceTags($this->get_field_id( 'rss' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'rss' )); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
			<label for="<?php echo balanceTags($this->get_field_id( 'rss' )); ?>">Show RSS:</label>
		</p>


	<?php
	}
}

?>