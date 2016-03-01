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


class inti_widget_inti_opt_in extends WP_Widget {
	function inti_widget_inti_opt_in() {
		$widget_ops = array('classname' => 'inti_opt_in', 'description' => __('Displays an opt-in form in the sidebar', 'inti') );
		$this->WP_Widget('inti_widget_inti_opt_in', 'Opt-In Form', $widget_ops);

		// add_action( 'admin_enqueue_scripts', array($this, 'inti_widget_add_js') );
	}


	/**
	 * Adds JS files to the sidebar page in the dashboard
	 */
	// function inti_widget_add_js($hook) {
	// 	if( $hook == 'widgets.php' ) {
	// 		wp_enqueue_media();	
	// 		wp_enqueue_style('thickbox');
	// 		wp_enqueue_script('thickbox');
	// 		wp_register_script( 'optin-widget', get_template_directory_uri() . '/framework/widgets/js/image.js', array('jquery'), "", TRUE );
	// 		wp_enqueue_script('optin-widget');
	// 	}
	// }


 	/**
	 * Creates the widget interface in the dashboard
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'optin_id' => '' ) );
		$optin_id = $instance['optin_id'];
	?>
		<p>
			<label for="<?php echo $this->get_field_id('optin_id'); ?>"><?php _e('Opt-In Form:', 'inti'); ?></label>
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

			<option value="-1">&mdash; <?php _e('Select a Form', 'inti'); ?> &mdash;</option>;

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
	 * Saves the new values to the database
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['optin_id'] = $new_instance['optin_id'];
		return $instance;
	}


 	/**
	 * Public view markup on the website
	 */
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		$optin_id = empty($instance['optin_id']) ? ' ' : apply_filters('widget_optin_id', $instance['optin_id']);

		include(locate_template('template-parts/part-opt-in-widget.php'));

	}
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("inti_widget_inti_opt_in");') );

?>