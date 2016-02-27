<?php 
/**
 * Child Theme Customizer
 *
 * The majority of the customizer options for the Kitchen Sink child theme come from the parent theme.
 * But, we're going to do a few things to customize and expand on them.
 *
 * @since 1.0.3
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */
 
/**
 * Add Customizer generated CSS to header
 *
 * @since 1.0.3
 */
function child_customizer_css() {
	do_action('child_customizer_css');
		
	$output = '';	


	echo ( $output ) ? '<style>' . apply_filters('child_customizer_css', $output) . "\n" . '</style>' . "\n" : '';
}
add_action('wp_head', 'child_customizer_css');


/**
 * JavaScript handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.3
 */
function child_customize_preview_js() {
	wp_enqueue_script('child-inti-customizer-preview', get_stylesheet_directory_uri() . '/framework/customizer/js/child-theme-customizer-preview.js', array('customize-preview'), filemtime(get_stylesheet_directory() . '/framework/customizer/js/child-theme-customizer-preview.js'), true );
}
add_action('customize_preview_init', 'child_customize_preview_js');


/**
 * JavaScript handlers to make Theme Customizer controls perform interesting functions.
 *
 * @since 1.0.3
 */
function child_customize_controls_js() {
	wp_enqueue_script('child-inti-customizer-controls', get_stylesheet_directory_uri() . '/framework/customizer/js/child-theme-customizer-controls.js', array('customize-controls'), filemtime(get_stylesheet_directory() . '/framework/customizer/js/child-theme-customizer-controls.js'), true );
}
add_action('customize_controls_enqueue_scripts', 'child_customize_controls_js');


/**
 * Register Customizer
 *
 * 1) Defines classes for custom controls
 * 2) Adds all sections and settings
 *
 * @since 1.0.3
 */
add_action('inti_customize_register', 'child_new_section');
function child_new_section($wp_customize) {
	
	/**
	 * 1) Defines classes for custom controls
	 */	
	class WP_Customize_Dropdown_Testimonials_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-testimonials-categories';	
		
		public function render_content() {
			$dropdown = wp_dropdown_categories( 
				array( 
					'name'             => '_customize-dropdown-testimonials-categories-' . $this->id,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_all'  => __("All Categories", 'inti'),
					'show_count'       => true,
					'taxonomy'         => 'inti-testimonial-category',
					'hide_if_empty'    => false,
					'selected'         => $this->value(),
				 )
			 );

			$dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

			printf( 
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			 );
		}
	}

	class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-categories';	
		
		public function render_content() {
			$dropdown = wp_dropdown_categories( 
				array( 
					'name'             => '_customize-dropdown-categories-' . $this->id,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_none' => __("All Categories", 'inti'),
					'show_count' => true,
					'hide_if_empty'    => false,
					'selected'         => $this->value(),
				 )
			 );

			$dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

			printf( 
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			 );
		}
	}

	class WP_Customize_Dropdown_Services_Categories_Control extends WP_Customize_Control {
		public $type = 'dropdown-services-categories';	
		
		public function render_content() {
			$dropdown = wp_dropdown_categories( 
				array( 
					'name'             => '_customize-dropdown-services-categories-' . $this->id,
					'echo'             => 0,
					'hide_empty'       => false,
					'show_option_all'  => __("All Categories", 'inti'),
					'show_count'       => true,
					'taxonomy'         => 'inti-service-category',
					'hide_if_empty'    => false,
					'selected'         => $this->value(),
				 )
			 );

			$dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

			printf( 
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				$this->label,
				$dropdown
			 );
		}
	}

	class WP_Customize_WPEditor_Control extends WP_Customize_Control {
		public $type = 'wysiwyg';

			public function render_content() { ?>
				<style>
					.mce-container {
						z-index: 99999999999999 !important;
					}
					#wp-link-wrap {
						z-index: 99999999999999 !important;
					}
					#wp-link-backdrop {
						z-index: 99999999999999 !important;
					}
				</style>
				<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<input type="hidden" <?php $this->link(); ?> value="<?php echo esc_textarea( $this->value() ); ?>">
					<?php
					$content = $this->value();
					$editor_id = str_replace('[', '_', $this->id);
					$editor_id = str_replace(']', '', $editor_id);
					$settings = array( 
						'textarea_name' => $this->id,
						'media_buttons' => false, 
						'drag_drop_upload'=>false );

					wp_editor( $content, $editor_id, $settings );

					do_action('admin_footer');
					do_action('admin_print_footer_scripts');

					?>
				
				</label>
			<?php
		}
	}
	

	/**
	 * 3) Adds all sections and settings
	 */

	// Blog Posts Block
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'posts' )) {
		$wp_customize->add_section('inti_customizer_front_page_block_blog', array( 
			'title'    => __('Front Page: Blog Posts', 'inti'),
			'description' => __('Configure the settings for the blog posts block', 'inti'),
			'priority' => 1,
		 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_post_category]', array( 
				'default'    => 1,
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );	
				$wp_customize->add_control(
					new WP_Customize_Dropdown_Categories_Control(
						$wp_customize,
						'inti_customizer_options[fpb_post_category]',
						array(
							'label'    => __('Post Category to display', 'inti'),
							'settings' => 'inti_customizer_options[fpb_post_category]',
							'section'  => 'inti_customizer_front_page_block_blog',
							'priority' => 1,
						)
					)
				);
			$wp_customize->add_setting('inti_customizer_options[fpb_post_number]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'transport'		 => 'postMessage',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_post_number]', array( 
					'label'    => __('Number of Posts to display', 'inti'),
					'section'  => 'inti_customizer_front_page_block_blog',
					'type'     => 'text',
					'priority' => 2,
				 ) );

			$wp_customize->add_setting('inti_customizer_options[fpb_post_columns]', array( 
				'default'        => 'numbered',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_post_columns]', array( 
					'label'    => __('Number of columns', 'inti'),
					'section'  => 'inti_customizer_front_page_block_blog',
					'type'     => 'select',
					'choices'  => array( 
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
					),
					'priority' => 3,
				 ) );	
			$wp_customize->add_setting('inti_customizer_options[fpb_exclude_category]', array( 
				'default'    => 1,
				'type'       => 'option',
				'capability' => 'manage_options',
				'transport'  => 'postMessage',
			 ) );	
				$wp_customize->add_control('inti_customizer_options[fpb_exclude_category]', array( 
					'label'    => __('Exclude front page category', 'inti'),
					'section'  => 'inti_customizer_front_page_block_blog',
					'description' => __('Hide the posts shown on the front page in the blog index', 'inti'),
					'type'     => 'checkbox',
					'priority' => 4,
				 ) );
	}


	// Featured In Block
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'brands' )) {
		$wp_customize->add_section('inti_customizer_front_page_block_featured_in', array( 
			'title'    => __('Front Page: Featured In', 'inti'),
			'description' => __('Configure the settings for the featured in block', 'inti'),
			'priority' => 1,
		 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_featuredinblock_title]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_featuredinblock_title]', array( 
					'label'    => __('Title (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_featured_in',
					'type'     => 'text',
					'priority' => 2,
				 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_featuredinblock_description]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_featuredinblock_description]', array( 
					'label'    => __('Description (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_featured_in',
					'type'     => 'textarea',
					'priority' => 2,
				 ) );
	}


	// Testimonials Block
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'testimonials' )) {
		$wp_customize->add_section('inti_customizer_front_page_block_testimonials', array( 
			'title'    => __('Front Page: Testimonials', 'inti'),
			'description' => __('Configure the settings for the testimonial block', 'inti'),
			'priority' => 1,
		 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_testimonials_title]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_testimonials_title]', array( 
					'label'    => __('Title (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_testimonials',
					'type'     => 'text',
					'priority' => 2,
				 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_testimonials_description]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_testimonials_description]', array( 
					'label'    => __('Description (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_testimonials',
					'type'     => 'textarea',
					'priority' => 3,
				 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_testimonials_category]', array( 
				'default'    => 0,
				'type'       => 'option',
				'capability' => 'manage_options',
			 ) );	
				$wp_customize->add_control(
					new WP_Customize_Dropdown_Testimonials_Categories_Control(
						$wp_customize,
						'inti_customizer_options[fpb_testimonials_category]',
						array(
							'label'    => __('Service Category to display', 'inti'),
							'settings' => 'inti_customizer_options[fpb_testimonials_category]',
							'section'  => 'inti_customizer_front_page_block_testimonials',
							'priority' => 4,
						)
					)
				);
			$wp_customize->add_setting('inti_customizer_options[fpb_testimonials_post_number]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_testimonials_post_number]', array( 
					'label'    => __('Number of Testimonials to display', 'inti'),
					'section'  => 'inti_customizer_front_page_block_testimonials',
					'type'     => 'text',
					'priority' => 5,
				 ) );

			$wp_customize->add_setting('inti_customizer_options[fpb_testimonials_order]', array( 
				'default'        => 'ASC',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_testimonials_order]', array( 
					'label'    => __('Order', 'inti'),
					'section'  => 'inti_customizer_front_page_block_testimonials',
					'type'     => 'select',
					'choices'  => array( 
						'ASC' => __('Ascending', 'inti'),
						'DESC' => __('Descending', 'inti')
					),
					'priority' => 6,
				 ) );	
	}

	// Personal Bio Block
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'bio' )) {
		$wp_customize->add_section('inti_customizer_front_page_block_personal_bio', array( 
			'title'    => __('Front Page: Personal Bio', 'inti'),
			'description' => __('Modify front page content', 'inti'),
			'priority' => 1,
		 ) );

			$wp_customize->add_setting('inti_customizer_options[fpb_personal_bio_title]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_personal_bio_title]', array( 
					'label'    => __('Title (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_personal_bio',
					'type'     => 'text',
					'priority' => 2,
				 ) );

			$wp_customize->add_setting('inti_customizer_options[fpb_personal_bio]', array( 
				'default'    => get_option('inti_customizer_options[fpb_personal_bio]'),
				'type'       => 'option',
				'capability' => 'manage_options',
				// 'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control(
					new WP_Customize_WPEditor_Control(
						$wp_customize,
						'inti_customizer_options[fpb_personal_bio]', 
						array( 
							'label'    => __('Personal Bio', 'inti'),
							'section'  => 'inti_customizer_front_page_block_personal_bio',
							'type' => 'wysiwyg',
							'priority' => 3,
						)
					)
				);

			$wp_customize->add_setting('inti_customizer_options[fpb_personal_bio_image]', array( 
				'default'    => get_option('inti_customizer_options[fpb_personal_bio_image]'),
				'type'       => 'option',
				'capability' => 'manage_options',
				// 'transport'  => 'postMessage',
			 ) );
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize, 
						'inti_customizer_options[fpb_personal_bio_image]', 
						array( 
							'label'    => __('Bio Photo', 'inti'),
							'section'  => 'inti_customizer_front_page_block_personal_bio',
							'settings' => 'inti_customizer_options[fpb_personal_bio_image]',
							'priority' => 4,
						)
					)
				);	
			$wp_customize->add_setting('inti_customizer_options[fpb_personal_bio_link]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
				'transport' 	 => 'postMessage',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_personal_bio_link]', array( 
					'label'    => __('URL for Image or Button (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_personal_bio',
					'description' => __('Adding a URL here will link the bio image or button to that URL.', 'inti'),
					'type'     => 'text',
					'priority' => 5,
				 ) );
	}

	// Services Block
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'services' )) {
		$wp_customize->add_section('inti_customizer_front_page_block_services', array( 
			'title'    => __('Front Page: Services', 'inti'),
			'description' => __('Configure the settings for the services block', 'inti'),
			'priority' => 1,
		 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_services_title]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_services_title]', array( 
					'label'    => __('Title (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_services',
					'type'     => 'text',
					'priority' => 2,
				 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_services_description]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_services_description]', array( 
					'label'    => __('Description (Optional)', 'inti'),
					'section'  => 'inti_customizer_front_page_block_services',
					'type'     => 'textarea',
					'priority' => 2,
				 ) );
			$wp_customize->add_setting('inti_customizer_options[fpb_services_category]', array( 
				'default'    => 1,
				'type'       => 'option',
				'capability' => 'manage_options',
			 ) );	
				$wp_customize->add_control(
					new WP_Customize_Dropdown_Services_Categories_Control(
						$wp_customize,
						'inti_customizer_options[fpb_services_category]',
						array(
							'label'    => __('Service Category to display', 'inti'),
							'settings' => 'inti_customizer_options[fpb_services_category]',
							'section'  => 'inti_customizer_front_page_block_services',
							'priority' => 3,
						)
					)
				);
			$wp_customize->add_setting('inti_customizer_options[fpb_services_post_number]', array( 
				'default'        => '',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_services_post_number]', array( 
					'label'    => __('Number of Services to display', 'inti'),
					'section'  => 'inti_customizer_front_page_block_services',
					'type'     => 'text',
					'priority' => 4,
				 ) );

			$wp_customize->add_setting('inti_customizer_options[fpb_services_post_columns]', array( 
				'default'        => 'numbered',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_services_post_columns]', array( 
					'label'    => __('Number of columns', 'inti'),
					'section'  => 'inti_customizer_front_page_block_services',
					'type'     => 'select',
					'choices'  => array( 
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
					),
					'priority' => 5,
				 ) );	

			$wp_customize->add_setting('inti_customizer_options[fpb_services_order]', array( 
				'default'        => 'ASC',
				'type'           => 'option',
				'capability'     => 'manage_options',
			 ) );
				$wp_customize->add_control('inti_customizer_options[fpb_services_order]', array( 
					'label'    => __('Order', 'inti'),
					'section'  => 'inti_customizer_front_page_block_services',
					'type'     => 'select',
					'choices'  => array( 
						'ASC' => __('Ascending', 'inti'),
						'DESC' => __('Descending', 'inti')
					),
					'priority' => 6,
				 ) );	
	}

}