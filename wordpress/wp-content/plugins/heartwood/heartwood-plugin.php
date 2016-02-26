<?php
/*
Plugin Name: Site Plugin for HeartwoodMontessori.com
Description: We're using this to keep our code a bit cleaner
*/
/* Start Adding Functions Below this Line */


// Creating the widget 
class hw_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'hw_widget', 

		// Widget name will appear in UI
		__('HW Events Calendar', 'hw_cal'), 

		// Widget description
		array( 'description' => __( 'List of upcoming events from Google Calendar', 'hw_cal' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		echo __( '<div id="upcomingEvents"></div>', 'hw_cal' );
		echo $args['after_widget'];
	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'hw_cal' );
		}
		?>
		<!-- Widget admin form -->
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php  }
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

// Register and load the widget
function hw_load_widget() {
	register_widget( 'hw_widget' );
}
add_action( 'widgets_init', 'hw_load_widget' );


/* Stop Adding Functions Below this Line */
?>