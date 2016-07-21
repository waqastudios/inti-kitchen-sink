<?php 

/**
 * Add a shortcode for code displaying
 */
function inti_shortcode_opt_in( $atts, $content = null ) {	
	$content = trim($content);	
	extract( shortcode_atts( array(
		'id' => ''
	), $atts));
	$optin_id = $id;

	ob_start();

	include(locate_template('template-parts/part-opt-in-shortcode.php'));

	
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
add_shortcode('opt-in', 'inti_shortcode_opt_in');



/**
 * Add a filter so it shows in the shortcode picker
 */
function inti_shortcode_add_opt_in_to_select($args){
	$args['inti-opt-in'] = __('Opt-In Form', 'inti-child');
	return $args;
}
add_filter( 'inti_shortcode_filter_select' , 'inti_shortcode_add_opt_in_to_select');


/**
 * Enqueue JS
 */
function child_shortcode_enqueue_opt_in_shortcode($hook){
	if ($hook == "post.php" || $hook == "post-new.php" || is_customize_preview() ){

		wp_register_script('inti-opt-in', get_stylesheet_directory_uri() . '/framework/shortcodes/js/shortcode-opt-in.js', '', filemtime(get_stylesheet_directory() . '/framework/shortcodes/js/shortcode-opt-in.js'), TRUE);
		wp_enqueue_script('inti-opt-in'); 
	}
}
add_action('admin_enqueue_scripts', 'child_shortcode_enqueue_opt_in_shortcode');

/**
 * Dispaly for inti-opt-in
 */
function inti_shortcode_add_opt_in() {
	ob_start();?>
	<tr class="option inti-opt-in">
		<th class="label">
			<label for="opt-in-id"><?php _e('Choose an Opt-In Form', 'inti-child'); ?></label>
		</th>

		<td class="field">
			<?php 
				$args = array(
					'post_type' => 'inti-opt-in',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'posts_per_page' => 100,
				);
				$optins = new WP_Query($args);

				?>

				<select name="opt-in-id" id="opt-in-id" class="widefat">'

					<option value="-1">&mdash; <?php _e('Select a Form', 'inti-child'); ?> &mdash;</option>;

					<?php
					while($optins->have_posts()) : $optins->the_post(); ?>

						<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>

					<?php
					endwhile;
					?>
					
				</select>

		</td>
	</tr>

	

	<?php
	$html = ob_get_clean();
	$html = apply_filters('inti_shortcode_filter_opt_in', $html);
	echo $html;
}
add_action('inti_shortcode_view', 'inti_shortcode_add_opt_in');