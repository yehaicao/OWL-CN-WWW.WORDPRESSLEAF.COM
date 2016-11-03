<?php
/*
Plugin Name: Featured Video Widget
Plugin URI: http://wp-time.com/featured-video-widget/
Description: Add featured Youtube or Vimeo or Keek video in your sidebar easily, responsive and customize height.
Version: 1.4
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/
// Featured Video Widget
class QassimFeaturedVideoWidget extends WP_Widget {
	function QassimFeaturedVideoWidget() {
		parent::__construct( false, 'Owl - 精选视频', array('description' => '显示来自YouTube或Vimeo或keek的精选视频。') );
	}
	function widget( $args, $instance ) {
		extract( $args );
		$title = $instance['title'];
		$video = $instance['videolink'];
		$height = $instance['height'];
		
		if( empty($height) ){
			$height = '220';
		}
		?>
            <?php 
			if( !empty($video) ){
				if( preg_match("/(youtube.com)+/", $video) or preg_match("/(youtu.be)+/", $video) ){
					$protocol 	= array('http://', 'https://', 'www.', 'youtube.com', 'youtu.be', 'embed', 'watch?v=', '/');
					$video_link = str_replace($protocol, '', $video);
					$the_result = '<iframe style="width:100%;max-width:100%;display:block;height:'.$height.'px;" src="http://youtube.com/embed/'.$video_link.'" allowfullscreen></iframe>';
				}
				elseif( preg_match("/(vimeo.com)+/", $video) ){
					$protocol 	= array('http://', 'https://', 'www.', 'vimeo.com', '/');
					$video_link = str_replace($protocol, '', $video);
					$the_result = '<iframe style="width:100%;max-width:100%;display:block;height:'.$height.'px;" src="http://player.vimeo.com/video/'.$video_link.'" allowfullscreen></iframe>';
				}
				elseif( preg_match("/(keek.com)+/", $video) ){
					$regex = array("/.*\\/(?=[^\\/]*\\/)|\\//m");
					$preg_replace = preg_replace($regex, "", $video);
					$str_replace = str_replace("keek", "", $preg_replace);
					$video_link = "https://www.keek.com/keek/$str_replace/embed?autoplay=0&mute=0&controls=1&loop=0";
					$the_result = '<iframe style="width:100%;max-width:100%;display:block;height:'.$height.'px;" src="'.$video_link.'" allowfullscreen></iframe>';
				}else{
					$the_result = '<ul><li>错误视频链接！请仅添加YouTube或Vimeo或keek视频链接。</li></ul>';
				}
			}else{
				$the_result = '<ul><li>请添加YouTube或Vimeo或keek视频链接。</li></ul>';
			}
			?>
            
			<?php echo balanceTags($args['before_widget'] . $args['before_title'] . $title . $args['after_title']); ?>
            
			<?php echo balanceTags($the_result); ?>
            
            <?php echo  $args['after_widget']; ?>
        <?php
	}//widget
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['videolink'] = strip_tags($new_instance['videolink']);
		$instance['height'] = strip_tags($new_instance['height']);
		return $instance;
	}//update
	
	function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance
		);
		
		$defaults = array(
			'title' 	=> 'Featured Video',
			'videolink' => '',
			'height' 	=> '220'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		$title = $instance['title'];
		$videolink = $instance['videolink'];
		$height = $instance['height'];
		?>
			<p>
				<label for="<?php echo balanceTags($this->get_field_id('title')); ?>">Title:</label> 
				<input class="widefat" id="<?php echo balanceTags($this->get_field_id('title')); ?>" name="<?php echo balanceTags($this->get_field_name('title')); ?>" type="text" value="<?php echo balanceTags($title); ?>" />
			</p>
            
			<p>
				<label for="<?php echo balanceTags($this->get_field_id('videolink')); ?>">Video Link:</label> 
				<input class="widefat" id="<?php echo balanceTags($this->get_field_id('videolink')); ?>" name="<?php echo balanceTags($this->get_field_name('videolink')); ?>" type="text" value="<?php echo balanceTags($videolink); ?>" />
			</p>

			<p>
				<label for="<?php echo balanceTags($this->get_field_id('height')); ?>">Height:</label> 
				<input class="widefat" id="<?php echo balanceTags($this->get_field_id('height')); ?>" name="<?php echo balanceTags($this->get_field_name('height')); ?>" type="text" value="<?php echo balanceTags($height); ?>" />
			</p>
        <?php
		
	}//form
	
}
add_action('widgets_init', create_function('', 'return register_widget("QassimFeaturedVideoWidget");') );
?>