<?php
/*
Plugin Name: Site Plugin for HeartwoodMontessori.com
Description: We're using this to keep our code a bit cleaner by writing some custom plugins and widgets
*/



class hw_cal_widget extends WP_Widget {

	function hw_cal_widget() {
		parent::__construct(
		// Base ID of your widget
		'hw_cal', 

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
			$title = __( 'Events', 'hw_cal' );
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
} 

class hw_custom_post_list_widget extends WP_Widget {

	function hw_custom_post_list_widget() {
		parent::__construct(
		// Base ID of your widget
		'hw_posts', 

		// Widget name will appear in UI
		__('HW Recent News', 'hw_posts'), 

		// Widget description
		array( 'description' => __( 'List of recent news and posts.', 'hw_posts' ), ) 
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

		$pq = new WP_Query(array( 'showposts' => 4 ));
			if( $pq->have_posts() ) : ?>
			
			<ul class="activity-list">
			<?php 
				while ( $pq->have_posts() ) : $pq->the_post(); ?> 
				<li class="activity-item">
					<a href="<?= the_permalink(); ?>" class="activity-link">
						<span class="activity-date">
							<span class="day"><?= the_time('D'); ?></span>
							<span class="month"><?= the_time('M'); ?></span>
							<span class="date"><?= the_time('j'); ?></span>
						</span>
					
						<span class="activity-title"><?= the_title(); ?></span>
					</a>
				</li>
 			<?php wp_reset_query(); endwhile; ?>
			</ul>
			<a href="#" class="activity-more">
				<span class="icon"></span>View All News 
			</a>
		<?php endif; echo $args['after_widget'];

	}
			
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'News', 'hw_posts' );
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
} 


// Register and load the widget
function hw_load_widget() {
	register_widget( 'hw_cal_widget' );
	register_widget( 'hw_custom_post_list_widget' );
}

add_action( 'widgets_init', 'hw_load_widget' );

?>