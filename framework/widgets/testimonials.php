<?php
/**
 * Widget: Tesimonials Carousel
 *
 *
 * @author Waqa Studios
 * @since 1.1.2
 */


class inti_widget_testimonial extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'inti_testimonial', // Base ID
			__( 'Testimonials Carousel', 'inti-child' ), // Name
			array( 'description' => __( 'Displays an testimonial slider in the sidebar', 'inti-child' ), ) // Args
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

		// Title for Widget
		$title = "";
		if ( ! empty( $instance['title'] ) ) {
			$title = $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			echo trim($title);
		}

		$testimonial_category_id = empty($instance['testimonial_category_id']) ? '0' : apply_filters('widget_testimonial_category_id', $instance['testimonial_category_id']);

		$number_posts = empty($instance['number_posts']) ? '6' : apply_filters('widget_number_posts', $instance['number_posts']);
		$order = empty($instance['order']) ? 'ASC' : apply_filters('widget_order', $instance['order']);
		$content = empty($instance['content']) ? 'excerpt' : apply_filters('widget_content', $instance['content']);

		$hide_photos = get_inti_option('fpb_testimonials_hide_photos', 'inti_customizer_options', '');
		$linkto_type = empty($instance['linkto_type']) ? 'none' : apply_filters('widget_linkto_type', $instance['linkto_type']);
		$linkto_page = empty($instance['linkto_page']) ? '0' : apply_filters('widget_linkto_page', $instance['linkto_page']);

		$testimonial_args = "";
		if ($testimonial_category_id == 0) {
			$testimonial_args = array( 
			'post_type'           => 'inti-testimonial',
			'posts_per_page'      => $number_posts,
			'order'               => $order,
			'orderby'             => 'rand',
			'ignore_sticky_posts' => 1 );
		} else {
			$testimonial_args = array( 
			'post_type'           => 'inti-testimonial',
			'tax_query'           => array(
										array(
											'taxonomy' => 'inti-testimonial-category', 
											'field' => 'id', 
											'terms' => $testimonial_category_id)
									 ),
			'posts_per_page'      => $number_posts,
			'order'               => $order,
			'orderby'             => 'rand',
			'ignore_sticky_posts' => 1 );
		} 

		$testimonials = new WP_Query($testimonial_args); 

		?>

			<div class="inti-testimonial-widget clearfix" data-equalizer data-equalize-on="small">
				<?php if ($testimonials->have_posts()) : ?>
					<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
						<?php 
							// Get the meta data 
							$testimonial_role = get_post_meta( get_the_ID(), "_inti_testimonial_role", true );
							$testimonial_company = get_post_meta( get_the_ID(), "_inti_testimonial_company", true );
							$testimonial_url = get_post_meta( get_the_ID(), "_inti_testimonial_url", true ); 
										
							$link = "";
							if ($linkto_type == "permalink") {
								$link = '<a href="' . get_the_permalink() . '">';
							} elseif ($linkto_type == "url" && $linkto_page != "-1") {
								$link = '<a href="' . get_the_permalink($linkto_page) . '">';
							} else {
								// Do nothing
							}

						?>
						<div class="slide">
							<?php 
								if ($link) {
									echo $link;
								} 
							 ?>

							<blockquote class="testimonial" data-equalizer-watch>
								<div class="grid-x">
									
									<?php // if it has a thumbnail, create two cells with real photo
									if ( has_post_thumbnail(get_the_ID()) && $hide_photos == 0 ) : ?>
									<div class="small-12 cell">
										<div class="testimonial-image">
											<?php the_post_thumbnail('thumbnail'); ?>
										</div>
									</div>
									<div class="small-12 cell">
										
										<div class="testimonial-text">
											<?php
												if ($content == "excerpt") {
													the_excerpt();
												} else {
													the_content();
												}
											 ?>
											<cite class="testimonial-owner">	
												<?php the_testimonial_owner(get_the_ID()); ?>		
											</cite>
										</div>
										
									</div>
									<?php else :  ?>
									<div class="small-12 cell">
										
										<div class="testimonial-text">
											<?php 
												if ($content == "excerpt") {
													the_excerpt();
												} else {
													the_content();
												}
											 ?>
											<cite class="testimonial-owner">	
												<?php the_testimonial_owner(get_the_ID()); ?>		
											</cite>
										</div>
										
									</div>
									<?php endif; ?>	

								</div>
							</blockquote>
					

							<?php 
								if ($link) {
									echo '</a>';
								} 
							 ?>
						</div>
					<?php endwhile;
						wp_reset_query(); ?>
				<?php else: ?>
					<div class="callout warning" data-closable>
						<p><?php _e('There are currently no published testimonials in this category', 'inti-child'); ?></p>
						<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>		
			</div>

		<?php

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
		$instance = wp_parse_args( (array) $instance, array( 'order' => 'ASC', 'content' => 'content', 'testimonial_category_id' => -1 ) );
		$title = apply_filters('widget_title', $instance['title']);
		$number_posts = $instance['number_posts'];
		$order = $instance['order'];
		$content = $instance['content'];
		$linkto_type = $instance['linkto_type'];
		$linkto_page = $instance['linkto_page'];
		$testimonial_category_id = $instance['testimonial_category_id'];
	?>		
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'inti'); ?>: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

		<p>
			<label for="<?php echo $this->get_field_id('testimonial_category_id'); ?>"><?php _e('Testimonials Category', 'inti-child'); ?>:</label>

			<?php 
				wp_dropdown_categories( 
						array( 
							'name'             => $this->get_field_name('testimonial_category_id'),
							'echo'             => true,
							'class'			   => 'widefat',
							'hide_empty'       => false,
							'show_option_all'  => '&mdash; ' . __("All Categories", 'inti-child') . ' &mdash;',
							'show_count'       => true,
							'taxonomy'         => 'inti-testimonial-category',
							'selected'         => $testimonial_category_id,
						 )
					 );
			?>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('number_posts'); ?>"><?php _e('Number of testimonials to display', 'inti-child'); ?>:</label> <input class="widefat" id="<?php echo $this->get_field_id('number_posts'); ?>" name="<?php echo $this->get_field_name('number_posts'); ?>" type="text" value="<?php echo esc_attr($number_posts); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order', 'inti-child'); ?>: </label>
			<select name="<?php echo $this->get_field_name('order'); ?>" id="<?php echo $this->get_field_id('order'); ?>">
				<option value="ASC" <?php selected(esc_attr($order), 'ASC'); ?>><?php _e('Ascending', 'inti-child') ?></option>
				<option value="DESC" <?php selected(esc_attr($order), 'DESC'); ?>><?php _e('Descending', 'inti-child') ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('What to display', 'inti-child'); ?>: </label>
			<select name="<?php echo $this->get_field_name('content'); ?>" id="<?php echo $this->get_field_id('content'); ?>">
				<option value="excerpt" <?php selected(esc_attr($content), 'excerpt'); ?>><?php _e('Excerpt Only', 'inti-child') ?></option>
				<option value="content" <?php selected(esc_attr($content), 'content'); ?>><?php _e('Full Content', 'inti-child') ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('linkto_type'); ?>"><?php _e('Link Slides To', 'inti-child'); ?>: </label>
			<select name="<?php echo $this->get_field_name('linkto_type'); ?>" id="<?php echo $this->get_field_id('linkto_type'); ?>">
				<option value="none" <?php selected(esc_attr($linkto_type), 'none'); ?>><?php _e('No Link', 'inti-child') ?></option>
				<option value="permalink" <?php selected(esc_attr($linkto_type), 'permalink'); ?>><?php _e('Testimonial Single (if theme supports)', 'inti-child') ?></option>
				<option value="url" <?php selected(esc_attr($linkto_type), 'url'); ?>><?php _e('Praise Page (with a testimonials shortcode)', 'inti-child') ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('linkto_page'); ?>"><?php _e('Page to link to (if selected above)', 'inti-child'); ?>: </label>
			
			<?php 
				$args = array(
					'post_type' => 'page',
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => 100,
				);
				$pages = new WP_Query($args);

				$dropdown = '<select name=' . $this->get_field_name('linkto_page') .
									 'id="' . $this->get_field_id('linkto_page') .'" 
									 class="postform">';

				$dropdown .= '<option value="-1">&mdash; ' . __('Select Page', 'inti-child') . ' &mdash;</option>';


				while($pages->have_posts()) : $pages->the_post();
					$dropdown .= '<option value="'. get_the_ID(). '" ' . selected(esc_attr($linkto_page), get_the_ID(), false) .'>'.get_the_title().'</option>';
				endwhile;

					

				$dropdown .= '</select>';

				// $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

				echo $dropdown;
			 ?>


		</p>
		
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
		$instance['title'] = $new_instance['title'];
		$instance['number_posts'] = $new_instance['number_posts'];
		$instance['order'] = $new_instance['order'];
		$instance['content'] = $new_instance['content'];
		$instance['linkto_type'] = $new_instance['linkto_type'];
		$instance['linkto_page'] = $new_instance['linkto_page'];
		$instance['testimonial_category_id'] = $new_instance['testimonial_category_id'];
		return $instance;
	}
 
}
add_action( 'widgets_init', function(){ register_widget('inti_widget_testimonial' ); });

?>