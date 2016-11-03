<?php
/*-----------------------------------------------------------------------------------*/
/*	Flicker Widget Class
/*-----------------------------------------------------------------------------------*/

add_action( 'widgets_init', 'winvader_flickr_widget' );

function winvader_flickr_widget() {
	register_widget( 'winvader_Flickr_Widget' );
}


class winvader_Flickr_Widget extends WP_Widget {

	var $defaults;

	function winvader_Flickr_Widget() {
		$widget_ops = array( 'classname' => 'mks_flickr_widget', 'description' => esc_html__( 'Display your Flickr photostream', 'winvader' ) );
		$control_ops = array( 'id_base' => 'mks_flickr_widget' );
		parent::__construct( 'mks_flickr_widget', esc_html__( 'Owl - Flickr', 'winvader' ), $widget_ops, $control_ops );



		$this->defaults = array(
			'title' => 'Flickr',
			'id' => '',
			'count' => 9,
			't_width' => 100,
			't_height' => 100
		);

		//Allow themes or plugins to modify default parameters
		$this->defaults = apply_filters( 'mks_flickr_widget_modify_defaults', $this->defaults );
	}

	function widget( $args, $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults );

		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		echo balanceTags($before_widget);
		if ( ! empty( $title ) ) {
			echo balanceTags($before_title . $title . $after_title);
		}

		$photos = $this->get_photos( $instance['id'], $instance['count'] );

		if ( !empty( $photos ) ) {
			$style = 'style="width: '.$instance['t_width'].'px; height: '.$instance['t_height'].'px;"';
			$styleimage = 'style="min-height: '.$instance['t_height'].'px;"';
			echo '<ul class="flickr">';
			foreach ( $photos as $photo ) {
				$imgreplaced = str_replace("_t", "_q", $photo['img_src']);
				
				
				echo '<li><a '.$style.' href="'.$photo['img_url'].'" title="'.$photo['title'].'" target="_blank"><img src="'.$imgreplaced.'" alt="'.$photo['title'].'"/></a></li>';
			}
			echo '</ul>';
			echo '<div class="clear"></div>';
		}
		echo balanceTags($after_widget);
	}


	function get_photos( $id, $count = 8 ) {
		if ( empty( $id ) )
			return false;

		$transient_key = md5( 'mks_flickr_cache_' . $id . $count );
		$cached = get_transient( $transient_key );
		if ( !empty( $cached ) ) {
			return $cached;
		}

		$output = array();
		$rss = 'http://api.flickr.com/services/feeds/photos_public.gne?id='.$id.'&lang=en-us&format=rss_200';
		$rss = fetch_feed( $rss );

		if ( is_wp_error( $rss ) ) {
			//check for group feed
			$rss = 'http://api.flickr.com/services/feeds/groups_pool.gne?id='.$id.'&lang=en-us&format=rss_200';
			$rss = fetch_feed( $rss );
		}

		if ( !is_wp_error( $rss ) ) {
			$maxitems = $rss->get_item_quantity( $count );
			$rss_items = $rss->get_items( 0, $maxitems );
			foreach ( $rss_items as $item ) {
				$temp = array();
				$temp['img_url'] = esc_url( $item->get_permalink() );
				$temp['title'] = esc_html( $item->get_title() );
				$content =  $item->get_content();
				preg_match_all( "/<IMG.+?SRC=[\"']([^\"']+)/si", $content, $sub, PREG_SET_ORDER );
				$photo_url = str_replace( "_m.jpg", "_t.jpg", $sub[0][1] );
				$temp['img_src'] = esc_url( $photo_url );
				$output[] = $temp;
			}

			set_transient( $transient_key, $output, 60 * 60 * 24 );
		}


		return $output;
	}

	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['id'] = strip_tags( $new_instance['id'] );
		$instance['count'] = absint( $new_instance['count'] );
		$instance['t_width'] = absint( $new_instance['t_width'] );
		$instance['t_height'] = absint( $new_instance['t_height'] );
		return $new_instance;
	}


	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'title' )); ?>"><?php _e( 'Title', 'winvader' ); ?>:</label>
			<input class="widefat" id="<?php echo balanceTags($this->get_field_id( 'title' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'id' )); ?>"><?php _e( 'Flickr ID', 'winvader' ); ?>:</label> <small><a href="http://idgettr.com/" target="_blank"><?php _e( 'What\'s my Flickr ID?', 'meks' ); ?></a></small>
			<input class="widefat" id="<?php echo balanceTags($this->get_field_id( 'id' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'id' )); ?>" type="text" value="<?php echo esc_attr( $instance['id'] ); ?>" />
			<small class="howto"><?php _e( 'Example ID: 23100287@N07', 'meks' ); ?></small>
		</p>
		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 'count' )); ?>"><?php _e( 'Number of photos', 'winvader' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['count'] ); ?>" id="<?php echo balanceTags($this->get_field_id( 'count' )); ?>" name="<?php echo balanceTags($this->get_field_name( 'count' )); ?>" />
		</p>

		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 't_width' )); ?>"><?php _e( 'Thumbnail width', 'winvader' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['t_width'] ); ?>" id="<?php echo balanceTags($this->get_field_id( 't_width' )); ?>" name="<?php echo balanceTags($this->get_field_name( 't_width' )); ?>" /> px
		</p>

		<p>
			<label for="<?php echo balanceTags($this->get_field_id( 't_height' )); ?>"><?php _e( 'Thumbnail height', 'winvader' ); ?>:</label>
			<input class="small-text" type="text" value="<?php echo absint( $instance['t_height'] ); ?>" id="<?php echo balanceTags($this->get_field_id( 't_height' )); ?>" name="<?php echo balanceTags($this->get_field_name( 't_height' )); ?>" /> px
		</p>

		<?php
	}
}
?>
