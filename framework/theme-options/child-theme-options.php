<?php
/**
 * Child Theme Options
 * 
 * The majority of the theme options for the Kitchen Sink child theme come from the parent theme.
 * But, we're going to do a few things to customize and expand on them.
 *
 * 1) We're going to override the pluggable function called inti_options_setup() with a new one
 *    that is almost identical. We do this so we can add a new submenu page in a specific location
 *    to achieve a specific order. If we created a function to add it separated, we could only be able
 *    to add it at the start or the end. The new submenu page is for options relevant to the blocks or
 *    components we add to the front page.
 *
 * 2) We create a function called child_options_interface() for the inti_options_interface_filter_tabs
 *    filter. This let's us add a new tab for the front page options.
 *
 * 3) We override another pluggable function called inti_initialize_general_options() which is one of
 *    many that set up an array for options. Here we remove, or comment out, a group of options for
 *    a grid of blog posts that appear on the front page of the parent theme. These blog posts now
 *    become one of our component blocks in this child theme, with the same options removed from General
 *    and placed into the new tab "Front Page".
 *
 * @author Tom McFarlin (http://tommcfarlin.com)
 * @author Waqa Studios
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */


/**
 * Override pluggable function in parent theme options so we can add new submenus in specific orders.
 */
function inti_options_setup() {

	add_theme_page(
		__('Inti Options', 'inti'),                    // The title to be displayed in the browser window for this page.
		__('Inti Options', 'inti'),                    // The text to be displayed for this menu item
		'manage_options',                    // Which type of users can see this menu item
		'inti_theme_options',            // The unique ID - that is, the slug - for this menu item
		'inti_options_interface'             // The name of the function to call when rendering this menu's page
	);
	
	add_menu_page(
		__('Inti Options', 'inti'),                    // The value used to populate the browser's title bar when the menu page is active
		__('Inti Options', 'inti'),                    // The text of the menu in the administrator's sidebar
		'administrator',                    // What roles are able to access the menu
		'inti_theme_options',               // The ID used to bind submenu items to this menu 
		'inti_options_interface'             // The callback function used to render this menu
	);
	
	add_submenu_page(
		'inti_theme_options',               // The ID of the top-level menu page to which this submenu item belongs
		__( 'General Options', 'inti' ),         // The value used to populate the browser's title bar when the menu page is active
		__( 'General Options', 'inti' ),                 // The label of this submenu item displayed in the menu
		'manage_options',                    // What roles are able to access this submenu item
		'inti_theme_options&tab=general_options',    // The ID used to represent this submenu item
		'inti_options_interface'             // The callback function used to render the options for this submenu item
	);

	// our child theme addition
	add_submenu_page(
		'inti_theme_options',
		__( 'Front Page', 'inti' ),
		__( 'Front Page', 'inti' ),
		'manage_options',
		'inti_theme_options&tab=frontpage_options',
		create_function( null, 'inti_options_interface( "frontpage_options" );' )
	);	

	add_submenu_page(
		'inti_theme_options',
		__( 'Header/Navigation', 'inti' ),
		__( 'Header/Navigation', 'inti' ),
		'manage_options',
		'inti_theme_options&tab=headernav_options',
		create_function( null, 'inti_options_interface( "headernav_options" );' )
	);

	add_submenu_page(
		'inti_theme_options',
		__( 'Footer/Analytics', 'inti' ),
		__( 'Footer/Analytics', 'inti' ),
		'manage_options',
		'inti_theme_options&tab=footer_options',
		create_function( null, 'inti_options_interface( "footer_options" );' )
	);

	add_submenu_page(
		'inti_theme_options',
		__( 'Social Media Profiles', 'inti' ),
		__( 'Social Media Profiles', 'inti' ),
		'manage_options',
		'inti_theme_options&tab=social_options',
		create_function( null, 'inti_options_interface( "social_options" );' )
	);
	
	add_submenu_page(
		'inti_theme_options',
		__( 'Commenting', 'inti' ),
		__( 'Commenting', 'inti' ),
		'manage_options',
		'inti_theme_options&tab=commenting_options',
		create_function( null, 'inti_options_interface( "commenting_options" );' )
	);


} // end inti_options_setup
add_action( 'admin_menu', 'inti_options_setup' );



function child_options_interface( $tabs ) {
	$tabs = array(
		'general_options' => __('General', 'inti'),
		'frontpage_options' => __('Front Page', 'inti'),
		'headernav_options' => __('Header/Navigation', 'inti'),
		'footer_options' => __('Footer/Analytics', 'inti'),
		'social_options' => __('Social Media Profiles', 'inti'),
		'commenting_options' => __('Commenting', 'inti')
		);
	return $tabs;
}
add_filter('inti_options_interface_filter_tabs', 'child_options_interface');


/**
 * Provides default values for the Front Page Options.
 */
function inti_default_frontpage_options() {
	
	$defaults = array(
		'blogblock_post_category' => '-1',
		'blogblock_post_number' => '3',
		'blogblock_post_columns' => '1',
		'blogblock_exclude_category'  =>  '1'
	);
	
	return apply_filters( 'inti_default_frontpage_options', $defaults );
	
} // end inti_default_frontpage_options


/**
 * Initializes the theme's general options page by registering the Sections,
 * Fields, and Settings.
 *
 * The overrides the plugable funtion found in the parent theme
 * We have this here because we want to remove any front page options from the General page/tab
 */
function inti_initialize_general_options() {

	// If the theme options don't exist, create them.
	if( false == get_option( 'inti_general_options' ) ) {  
		add_option( 'inti_general_options', apply_filters( 'inti_default_general_options', inti_default_general_options() ) );
	} // end if

	// First, we register a section. This is necessary since all future options must belong to a 
	add_settings_section(
		'general_settings_section',         // ID used to identify this section and with which to register options
		__( 'Posts and Pages', 'inti' ),     // Title to be displayed on the administration page
		'inti_posts_and_pages_callback', // Callback used to render the description of the section
		'inti_general_options'     // Page on which to add this section of options
	);
	
		// Next, we'll introduce the fields for toggling the visibility of content elements.
		add_settings_field( 
			'excerpt_limit',                      // ID used to identify the field throughout the theme
			__( 'Except Limit', 'inti' ),                          // The label to the left of the option interface element
			'inti_excerpt_limit_callback',   // The name of the function responsible for rendering the option interface
			'inti_general_options',    // The page on which this option will be displayed
			'general_settings_section',         // The name of the section to which this field belongs
			array(                              // The array of arguments to pass to the callback. In this case, just a description.
				__( 'How many characters do you want to display for excerpts?', 'inti' ),
			)
		);
	
		add_settings_field( 
			'read_more_text',                     
			__( 'Read More text', 'inti' ),             
			'inti_read_more_text_callback',  
			'inti_general_options',                    
			'general_settings_section',         
			array(                              
				__( 'After the excerpt there\'s a button or link with this text to continue reading.', 'inti' ),
			)
		);
	
		add_settings_field( 
			'blog_interface',                      
			__( 'Blog Index Style', 'inti' ),              
			'inti_blog_interface_callback',   
			'inti_general_options',        
			'general_settings_section',         
			array(                              
				__( 'You can display posts in a classic blog style as in option one, or shorts style as in option two.', 'inti' ),
			)
		);
	
		add_settings_field( 
			'breadcrumbs',                      
			__( 'Show Breadcrumbs', 'inti' ),              
			'inti_breadcrumbs_callback',   
			'inti_general_options',
			'general_settings_section',         
			array(                              
				__( 'They can be displayed before and after the content, or not at all.', 'inti' ),
			)
		);
	
		add_settings_field( 
			'pagination',                      
			__( 'Pagination Style', 'inti' ),              
			'inti_pagination_callback',   
			'inti_general_options',
			'general_settings_section',         
			array(                              
				__( 'Move between lists of posts in archives with number or Next/Previous links', 'inti' ),
			)
		);
	
		add_settings_field( 
			'nextprev_post_links',                      
			__( 'Links to Next/Previous posts on single posts', 'inti' ),              
			'inti_nextprev_post_links_callback',   
			'inti_general_options',
			'general_settings_section',         
			array(                              
				__( 'Move from one post to the next or previous post directly with Next/Previous links', 'inti' ),
			)
		);


/**
 * We're removing the front page options from general, because they'll now go in their own page especially for front page options
 */
	// add_settings_section(
	// 	'general_settings_section_2',         // ID used to identify this section and with which to register options
	// 	__( 'Front Page', 'inti' ),     // Title to be displayed on the administration page
	// 	'inti_frontpage_callback', // Callback used to render the description of the section
	// 	'inti_general_options'     // Page on which to add this section of options
	// );
	
	// 	add_settings_field( 
	// 		'frontpage_post_category',                      // ID used to identify the field throughout the theme
	// 		__( 'Post Category to display', 'inti' ),                          // The label to the left of the option interface element
	// 		'inti_frontpage_post_category_callback',   // The name of the function responsible for rendering the option interface
	// 		'inti_general_options',    // The page on which this option will be displayed
	// 		'general_settings_section_2'
	// 	);
	
	// 	add_settings_field( 
	// 		'frontpage_post_number',                      // ID used to identify the field throughout the theme
	// 		__( 'Number of posts to display', 'inti' ),                          // The label to the left of the option interface element
	// 		'inti_frontpage_post_number_callback',   // The name of the function responsible for rendering the option interface
	// 		'inti_general_options',    // The page on which this option will be displayed
	// 		'general_settings_section_2'
	// 	);

	// 	add_settings_field( 
	// 		'frontpage_post_columns',                      // ID used to identify the field throughout the theme
	// 		__( 'Number of columns', 'inti' ),                          // The label to the left of the option interface element
	// 		'inti_frontpage_post_columns_callback',   // The name of the function responsible for rendering the option interface
	// 		'inti_general_options',    // The page on which this option will be displayed
	// 		'general_settings_section_2'
	// 	);

	// 	add_settings_field( 
	// 		'frontpage_exclude_category',                      // ID used to identify the field throughout the theme
	// 		__( 'Exclude front page category', 'inti' ),                          // The label to the left of the option interface element
	// 		'inti_frontpage_exclude_category_callback',   // The name of the function responsible for rendering the option interface
	// 		'inti_general_options',    // The page on which this option will be displayed
	// 		'general_settings_section_2'
	// 	);



	add_settings_section(
		'general_settings_section_3',         // ID used to identify this section and with which to register options
		__( 'Sharing', 'inti' ),     // Title to be displayed on the administration page
		'inti_sharing_callback', // Callback used to render the description of the section
		'inti_general_options'     // Page on which to add this section of options
	);
	
		add_settings_field( 
			'sharing_on_posts',                      // ID used to identify the field throughout the theme
			__( 'Enable sharing on Posts', 'inti' ),                          // The label to the left of the option interface element
			'inti_sharing_posts_callback',   // The name of the function responsible for rendering the option interface
			'inti_general_options',    // The page on which this option will be displayed
			'general_settings_section_3'
		);
	
		add_settings_field( 
			'sharing_on_pages',                      // ID used to identify the field throughout the theme
			__( 'Enable sharing on Pages', 'inti' ),                          // The label to the left of the option interface element
			'inti_sharing_pages_callback',   // The name of the function responsible for rendering the option interface
			'inti_general_options',    // The page on which this option will be displayed
			'general_settings_section_3'
		);

		add_settings_field( 
			'sharing_platforms',                      // ID used to identify the field throughout the theme
			__( 'Display these sharing platforms', 'inti' ),                          // The label to the left of the option interface element
			'inti_sharing_platforms_callback',   // The name of the function responsible for rendering the option interface
			'inti_general_options',    // The page on which this option will be displayed
			'general_settings_section_3',         // The name of the section to which this field belongs
			array(                 
				'options'   =>  array (
									'twitter'   =>  'Twitter',
									'facebook'   =>  'Facebook',
									'google'   =>  'Google+',
									'linkedin'   =>  'LinkedIn',
									'pinterest'   =>  'Pinterest',
									'tumblr'   =>  'Tumblr',

								)
			)
		);



	add_settings_section(
		'general_settings_section_4',         // ID used to identify this section and with which to register options
		__( '404', 'inti' ),     // Title to be displayed on the administration page
		'inti_404_callback', // Callback used to render the description of the section
		'inti_general_options'     // Page on which to add this section of options
	);
	
		add_settings_field( 
			'page_not_found',                      // ID used to identify the field throughout the theme
			__( 'Message to display when page not found', 'inti' ),                          // The label to the left of the option interface element
			'inti_page_not_found_callback',   // The name of the function responsible for rendering the option interface
			'inti_general_options',    // The page on which this option will be displayed
			'general_settings_section_4',         // The name of the section to which this field belongs
			array(                              // The array of arguments to pass to the callback. In this case, just a description.
				__( '', 'inti' ),
			)
		);
	


	
	// Finally, we register the fields with WordPress
	register_setting(
		'inti_general_options',
		'inti_general_options'
	);

	
} // end inti_initialize_general_options
add_action( 'admin_init', 'inti_initialize_general_options' );


/**
 * Initializes the child theme's front page options page by registering the Sections,
 * Fields, and Settings.
 */
function inti_initialize_frontpage_options() {

	// If the theme options don't exist, create them.
	if( false == get_option( 'inti_frontpage_options' ) ) {  
		add_option( 'inti_frontpage_options', apply_filters( 'inti_default_frontpage_options', inti_default_frontpage_options() ) );
	} // end if


/**
 * We're removing the front page options from general, because they'll now go in their own page especially for front page options
 */
	add_settings_section(
		'frontpage_settings_section_1',         // ID used to identify this section and with which to register options
		__( 'Blog Block', 'inti' ),     // Title to be displayed on the administration page
		'inti_blogblock_callback', // Callback used to render the description of the section
		'inti_frontpage_options'     // Page on which to add this section of options
	);
	
		add_settings_field( 
			'blogblock_post_category',                      // ID used to identify the field throughout the theme
			__( 'Post Category to display', 'inti' ),                          // The label to the left of the option interface element
			'inti_blogblock_post_category_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_1'
		);
	
		add_settings_field( 
			'blogblock_post_number',                      // ID used to identify the field throughout the theme
			__( 'Number of posts to display', 'inti' ),                          // The label to the left of the option interface element
			'inti_blogblock_post_number_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_1'
		);

		add_settings_field( 
			'blogblock_post_columns',                      // ID used to identify the field throughout the theme
			__( 'Number of columns', 'inti' ),                          // The label to the left of the option interface element
			'inti_blogblock_post_columns_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_1'
		);

		add_settings_field( 
			'blogblock_exclude_category',                      // ID used to identify the field throughout the theme
			__( 'Exclude front page category', 'inti' ),                          // The label to the left of the option interface element
			'inti_blogblock_exclude_category_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_1'
		);


	add_settings_section(
		'frontpage_settings_section_2',         // ID used to identify this section and with which to register options
		__( 'Featured In Block', 'inti' ),     // Title to be displayed on the administration page
		'inti_featuredinblock_callback', // Callback used to render the description of the section
		'inti_frontpage_options'     // Page on which to add this section of options
	);
	
		add_settings_field( 
			'featuredinblock_title',                      // ID used to identify the field throughout the theme
			__( 'Title (Optional)', 'inti' ),                          // The label to the left of the option interface element
			'inti_featuredinblock_title_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_2'
		);
	
		add_settings_field( 
			'featuredinblock_description',                      // ID used to identify the field throughout the theme
			__( 'Description (Optional)', 'inti' ),                          // The label to the left of the option interface element
			'inti_featuredinblock_description_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_2'
		);


	add_settings_section(
		'frontpage_settings_section_3',         // ID used to identify this section and with which to register options
		__( 'Testimonial Block', 'inti' ),     // Title to be displayed on the administration page
		'inti_testimonialblock_callback', // Callback used to render the description of the section
		'inti_frontpage_options'     // Page on which to add this section of options
	);
	
		add_settings_field( 
			'testimonialblock_title',                      // ID used to identify the field throughout the theme
			__( 'Title (Optional)', 'inti' ),                          // The label to the left of the option interface element
			'inti_testimonialblock_title_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_3'
		);
	
		add_settings_field( 
			'testimonialblock_description',                      // ID used to identify the field throughout the theme
			__( 'Description (Optional)', 'inti' ),                          // The label to the left of the option interface element
			'inti_testimonialblock_description_callback',   // The name of the function responsible for rendering the option interface
			'inti_frontpage_options',    // The page on which this option will be displayed
			'frontpage_settings_section_3'
		);

		
	
	// Finally, we register the fields with WordPress
	register_setting(
		'inti_frontpage_options',
		'inti_frontpage_options'
	);

	
} // end inti_initialize_general_options
add_action( 'admin_init', 'inti_initialize_frontpage_options' );


/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */ 

/**
 * This function provides a simple description for the General Options page. 
 *
 * It's called from the 'inti_initialize_frontpage_options' function by being passed as a parameter
 * in the add_settings_section function.
 */

function inti_blogblock_callback() {
	echo '<p>' . __( 'Options for the Blog Blog.', 'inti' ) . '</p>';
} 
// end inti_blogblock_callback

function inti_featuredinblock_callback() {
	echo '<p>' . __( 'Options for the Featured In carousel.', 'inti' ) . '</p>';
} 

function inti_testimonialblock_callback() {
	echo '<p>' . __( 'Options for the Featured In carousel.', 'inti' ) . '</p>';
} 
// end inti_blogblock_callback

/* ------------------------------------------------------------------------ *
 * Field Callbacks
 * ------------------------------------------------------------------------ */ 
function inti_blogblock_post_category_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	wp_dropdown_categories(array(
		'show_option_none' => __("All Categories", 'inti'),
		'show_count' => true,
		'taxonomy' => 'category',
		'name' => 'inti_frontpage_options[blogblock_post_category]',
		'id' => 'blogblock_post_category',
		'selected' => $options['frontpage_post_category']
	)); 
}

function inti_blogblock_post_number_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	$data = "";
	if( isset( $options['blogblock_post_number'] ) ) {
		$data = $options['blogblock_post_number'];
	} // end if


	$html = '<input type="text" id="blogblock_post_number" name="inti_frontpage_options[blogblock_post_number]" value="' . $data . '" />'; 
	
	
	echo $html;
}

function inti_blogblock_post_columns_callback($args) {
	
	$options = get_option('inti_frontpage_options');

	$html = '<p><input type="radio" id="blogblock-post-columns-1" name="inti_frontpage_options[blogblock_post_columns]" value="1"' . checked( "1", $options['blogblock_post_columns'], false ) . '/>';
	$html .= '&nbsp;';
	$html .= '<label for="blogblock-post-columns-1">1</label>';

	$html .= '&nbsp;&nbsp;&nbsp;&nbsp;';

	$html .= '<input type="radio" id="blogblock-post-columns-2" name="inti_frontpage_options[blogblock_post_columns]" value="2"' . checked( "2", $options['blogblock_post_columns'], false ) . '/>';
	$html .= '&nbsp;';
	$html .= '<label for="blogblock-post-columns-2">2</label>';

	$html .= '&nbsp;&nbsp;&nbsp;&nbsp;';

	$html .= '<input type="radio" id="frontpage-post-columns-3" name="inti_frontpage_options[frontpage_post_columns]" value="3"' . checked( "3", $options['frontpage_post_columns'], false ) . '/>';
	$html .= '&nbsp;';
	$html .= '<label for="frontpage-post-columns-3">3</label>';

	$html .= '&nbsp;&nbsp;&nbsp;&nbsp;';

	$html .= '<input type="radio" id="frontpage-post-columns-4" name="inti_frontpage_options[frontpage_post_columns]" value="4"' . checked( "4", $options['frontpage_post_columns'], false ) . '/>';
	$html .= '&nbsp;';
	$html .= '<label for="frontpage-post-columns-3">4</label></p>';
	
	echo $html;
	
}

function inti_blogblock_exclude_category_callback() {

	$options = get_option( 'inti_frontpage_options' );
	
	$html = '<input type="checkbox" id="frontpage_exclude_category" name="inti_frontpage_options[frontpage_exclude_category]" value="1"' . checked( 1, $options['frontpage_exclude_category'], false ) . '/>';
	$html .= '&nbsp;';
	$html .= '<label for="frontpage_exclude_category">Exclude the front page post category from the rest of the blog</label><p></p><br><br>';
	
	echo $html;

}



function inti_featuredinblock_title_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	$data = "";
	if( isset( $options['featuredinblock_title'] ) ) {
		$data = $options['featuredinblock_title'];
	} // end if


	$html = '<input type="text" id="featuredinblock_title" name="inti_frontpage_options[featuredinblock_title]" value="' . $data . '" class="widefat" />'; 
	
	
	echo $html;
}

function inti_featuredinblock_description_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	$data = "";
	if( isset( $options['featuredinblock_description'] ) ) {
		$data = $options['featuredinblock_description'];
	} // end if


	$html = '<textarea id="featuredinblock_description" name="inti_frontpage_options[featuredinblock_description]" class="widefat" rows="2">' . $data . '</textarea>'; 
	
	
	echo $html;
}



function inti_testimonialblock_title_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	$data = "";
	if( isset( $options['testimonialblock_title'] ) ) {
		$data = $options['testimonialblock_title'];
	} // end if


	$html = '<input type="text" id="testimonialblock_title" name="inti_frontpage_options[testimonialblock_title]" value="' . $data . '" class="widefat" />'; 
	
	
	echo $html;
}

function inti_testimonialblock_description_callback($args) {
	
	$options = get_option('inti_frontpage_options');
	
	$data = "";
	if( isset( $options['testimonialblock_description'] ) ) {
		$data = $options['testimonialblock_description'];
	} // end if


	$html = '<textarea id="testimonialblock_description" name="inti_frontpage_options[testimonialblock_description]" class="widefat" rows="2">' . $data . '</textarea>'; 
	
	
	echo $html;
}