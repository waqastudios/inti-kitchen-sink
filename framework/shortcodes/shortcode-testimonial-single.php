<?php 

/**
 * Add a shortcode for displaying single testimonials
 */
function inti_shortcode_testimonial_single( $atts, $content = null ) {	
	$content = trim($content);	
	extract( shortcode_atts( array(
		'id' => '',
		'align' => ''
	), $atts));

		// fetch the testimonial
		$testimonial_object = get_post($id);
		if ($testimonial_object->post_type == 'inti-testimonial' && $testimonial_object->post_status == 'publish'){

			ob_start();

			$has_image = has_post_thumbnail($id); 
			$image_html = '';
			$default_attr = array(
				'alt'	=> $testimonial_object->post_title,
				'title'	=> $testimonial_object->post_title
			);
			if (has_post_thumbnail($testimonial_object->ID)) {
				$image_html = get_the_post_thumbnail($testimonial_object->ID, 'testimonial-thumbnail', $default_attr);
			}

?>

				<?php if ($align == "left" || $align == "") : ?>

					<blockquote class="testimonial">
						<?php if ($has_image) : ?>
							<div class="row">
								<div class="medium-5 mlarge-4 columns">
									<div class="testimonial-image">
										<?php echo $image_html; ?>
									</div>
								</div>
								<div class="medium-7 mlarge-8 columns">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="row">
								<div class="column">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</blockquote>



				<?php elseif ($align == "right") : ?>

					<blockquote class="testimonial right callout">
						<?php if ($has_image) : ?>
							<div class="row">
								<div class="medium-5 medium-push-7 mlarge-4 mlarge-push-8 columns">
									<div class="testimonial-image">
										<?php echo $image_html; ?>
									</div>
								</div>
								<div class="medium-7 medium-pull-5 mlarge-8 mlarge-pull-4 columns">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="row">
								<div class="column">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</blockquote>



				<?php elseif ($align == "vertical") : ?>

					<blockquote class="testimonial vertical callout">
						<?php if ($has_image) : ?>
							<div class="row">
								<div class="column">
									<div class="testimonial-image">
										<?php echo $image_html; ?>
									</div>
								</div>
								<div class="column">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php else : ?>
							<div class="row">
								<div class="column">
									<div class="testimonial-text">
										<?php echo wpautop($testimonial_object->post_content); ?>
										<cite class="testimonial-owner">
											<?php the_testimonial_owner($testimonial_object->ID); ?>
										</cite>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</blockquote>



				<?php else : ?>

					<div class="callout alert"><?php the_testimonial_owner($testimonial_object->ID); ?>
						<p><?php _e('No testimonial was found with this ID, you may need to re-insert this shortcode.', 'inti-child') ?></p>
					</div>
				<?php endif; ?>

				

		
		<?php

			$html = ob_get_contents();
			ob_end_clean();
		} else {
			ob_start(); ?>
	
			<div class="callout alert">
				<p><?php _e('No testimonial was found with this ID, you may need to re-insert this shortcode.', 'inti-child') ?></p>
			</div>

			<?php
			$html = ob_get_contents();
			ob_end_clean();
		}
		wp_reset_query();
		return $html;
}
add_shortcode('testimonial-single', 'inti_shortcode_testimonial_single');



/**
 * Add a filter so it shows in the shortcode picker
 */
function inti_shortcode_add_testimonial_single_to_select($args){
	$args['inti-testimonial-single'] = __('Testimonial (Single)', 'inti-child');
	return $args;
}
add_filter( 'inti_shortcode_filter_select' , 'inti_shortcode_add_testimonial_single_to_select');


/**
 * Enqueue JS
 */
function child_shortcode_enqueue_testimonial_single_shortcodes($hook){
	if ($hook == "post.php"){

		wp_register_script('inti-testimonial-single', get_stylesheet_directory_uri() . '/framework/shortcodes/js/shortcode-testimonial-single.js', '', filemtime(get_stylesheet_directory() . '/framework/shortcodes/js/shortcode-testimonial-single.js'), TRUE);
		wp_enqueue_script('inti-testimonial-single'); 
	}
}
add_action('admin_enqueue_scripts', 'child_shortcode_enqueue_testimonial_single_shortcodes');

/**
 * Dispaly for inti-testimonial-single
 */
function inti_shortcode_add_testimonial_single() {
	ob_start();?>
	<tr class="option inti-testimonial-single">
		<th class="label">
			<label for="testimonial-single-id"><?php _e('Choose a Testimonial', 'inti-child'); ?></label>
		</th>

		<td class="field">
			<select name="testimonial-single-id" id="testimonial-single-id" class="widefat">
				<option value="" selected>&mdash; <?php _e('Select a testimonial by name', 'inti-child'); ?> &mdash;</option>
				<?php
					$testimonial = new WP_Query('post_type=inti-testimonial&posts_per_page=-1'); 
					while($testimonial->have_posts()) : $testimonial->the_post();
				?>
						<option value="<?php echo get_the_ID(); ?>" selected><?php _e(get_the_title(get_the_ID()), 'inti-child'); ?></option>
					<?php endwhile; ?>
			</select>
		</td>
	</tr>
	<tr class="option inti-testimonial-single">
		<th class="label">
			<label for="testimonial-single-align"><?php _e('Photo Align', 'inti-child'); ?></label>
		</th>

		<td class="field">
		
			<select name="testimonial-single-align" id="testimonial-single-align" class="widefat">
				<option value="left" selected><?php _e('Left', 'inti-child'); ?></option>
				<option value="right"><?php _e('Right', 'inti-child'); ?></option>
				<option value="vertical"><?php _e('Photo above', 'inti-child'); ?></option>
			</select>

		</td>
	</tr>	

	<?php
	$html = ob_get_clean();
	$html = apply_filters('inti_shortcode_filter_testimonial_single', $html);
	echo $html;
}
add_action('inti_shortcode_view', 'inti_shortcode_add_testimonial_single');