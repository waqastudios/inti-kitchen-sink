<?php
/**
 * Widget: Opt-In
 * This widget accompanies the inti-opt-in post type and allows
 * the user to select which of these to display.
 * 
 * This could also be a model for other custom widgets. Also, see the
 * commented code for how you would add custom javascript to your 
 * widget's back end.
 *
 *
 * @author Waqa Studios
 * @since 1.0.4
 */


class inti_widget_opt_in extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'inti_opt_in', // Base ID
			__( 'Opt-In Form', 'inti-child' ), // Name
			array( 'description' => __( 'Displays an opt-in form in the sidebar', 'inti-child' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		// Output before widget
		echo $args['before_widget'];

		$optin_id = empty($instance['optin_id']) ? ' ' : apply_filters('widget_optin_id', $instance['optin_id']);

		include(locate_template('template-parts/part-opt-in-widget.php'));
		// Output after widget
		echo $args['after_widget'];

	}

 	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'optin_id' => -1 ) );
		$optin_id = $instance['optin_id'];
	?>
		<p>
			<label for="<?php echo $this->get_field_id('optin_id'); ?>"><?php _e('Opt-In Form:', 'inti-child'); ?></label>
		</p>

	<?php 
		$args = array(
			'post_type' => 'inti-opt-in',
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => 100,
		);
		$optins = new WP_Query($args);

		?>

		<select name="<?php echo $this->get_field_name('optin_id'); ?>" id="<?php echo $this->get_field_id('optin_id'); ?>" class="widefat">

			<option value="-1">&mdash; <?php _e('Select a Form', 'inti-child'); ?> &mdash;</option>;

			<?php
			while($optins->have_posts()) : $optins->the_post(); ?>

				<option value="<?php the_ID(); ?>" <?php selected( get_the_ID(), esc_attr($optin_id) ); ?>><?php the_title(); ?></option>

			<?php
			endwhile;
			?>
			
		</select>

	<?php

	}
 
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['optin_id'] = $new_instance['optin_id'];
		return $instance;
	}
 
}
add_action( 'widgets_init', function(){ register_widget('inti_widget_opt_in' ); });

?>