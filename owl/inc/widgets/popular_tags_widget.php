<?php
class winvadertheme_popular_tag extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'winvader_pop_tags', 'description' => esc_html__( "Add most used tags to Widget Area", 'winvader') );
        parent::__construct('winvader_tag_cloud', esc_html__('Owl - Tag Cloud', 'winvader'), $widget_ops);  
    }

    function widget($args, $instance) {

        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        ?>
        <?php echo balanceTags($before_widget); ?>
        <?php if ( $title !="" ) echo balanceTags($before_title . $title . $after_title); ?>
            <div class="winvader-tag-cloud">
               <?php wp_tag_cloud('unit=px&smallest=13&largest=13&number=10&format=link'); ?>
            </div>
        <?php echo balanceTags($after_widget); ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();
    }    

        function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '') );
        $title = strip_tags($instance['title']);
?>
        <p><label for="<?php echo balanceTags($this->get_field_id('title')); ?>"><?php _e('Title:', 'winvader'); ?></label>
        <input class="widefat" id="<?php echo balanceTags($this->get_field_id('title')); ?>" name="<?php echo balanceTags($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

<?php
    }
}
add_action( 'widgets_init', create_function( '', 'register_widget( "winvadertheme_popular_tag" );' ) );