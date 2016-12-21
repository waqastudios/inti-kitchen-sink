<?php
/**
 * Inti Foundation Kitchen Sink Functions
 *
 * @package Inti
 * @author Waqa Studios
 * @since 1.0.0
 * @copyright Copyright (c) 2015, Waqa Studios
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */


/**
 * Child Theme Setup
 * Modify this function to deactivate features in the parent theme
 *
 * See functions.php in Inti Foundation
 * Remove the comment slashes (//) next to the functions
 * 
 * Remove or add array elements in add_theme_support() as needed
 */
function childtheme_override_setup() {

	/**
	 * Features to expand on Inti Foundation
	 */ 
	add_theme_support(
		'inti-front-page-blocks',
		array('page', 'posts', 'services', 'testimonials', 'brands', 'bio', 'video', 'gmap', 'slogan')
	);
	
	add_theme_support(
		'inti-post-types',
		array('slide', 'service', 'testimonial', 'brand', 'opt-in')
	);
	
	add_theme_support(
		'inti-page-templates',
		array('front-page', 'news-page', 'portfolio', 'contact') //examples
	);

	/**
	 * Basic Inti Foundation Features to be support in this child theme
	 */ 
	add_theme_support(
		'inti-layouts',
		array('1c', '2c-l', '2c-r', '1c-thin')
	);

	add_theme_support(
		'inti-menus',
		array('dropdown-menu', 'off-canvas-menu', 'footer-menu')
	);
	
	add_theme_support(
		'inti-sidebars',
		array('primary', 'frontpage', 'footer')
	);

	add_theme_support('inti-customizer');

	add_theme_support('inti-theme-options');

	add_theme_support('inti-backgrounds');
	
	add_theme_support('inti-fonts');

	add_theme_support('inti-breadcrumbs');
	
	add_theme_support('inti-pagination');
	
	add_theme_support('inti-post-header-meta');
	
	add_theme_support('inti-shortcodes');
		
	add_theme_support('inti-sticky-sidebars');
	
	add_theme_support('inti-custom-login');

	add_theme_support('inti-scroll-to-top');
	
	/**
	 * WordPress features
	 */ 
	add_theme_support('menus');
	
	// different post formats for tumblog style posting
	add_theme_support(
		'post-formats',
		array('aside', 'gallery','link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);
	
	/**
	 * 3rd Party Supprt
	 */
	add_theme_support( 'woocommerce' );
	
	add_theme_support('post-thumbnails');
	
	add_image_size('thumb-300', 300, 250, true);
	add_image_size('thumb-200', 200, 150, true);

	add_image_size('blog-thumbnail', 800, 600, true);
	add_image_size('brand-thumbnail', 200, 150, true);
	add_image_size('testimonial-thumbnail', 800, 800, true);
	add_image_size('service-thumbnail', 800, 800, true);
	
	
	// RSS feed links to header.php for posts and comments.
	add_theme_support('automatic-feed-links');
	
	// editor stylesheet for TinyMCE
	add_editor_style('/library/css/editor.css');

	// load parent translations
	load_theme_textdomain( 'inti' , get_template_directory() . '/languages');

	// load parent translations
	load_theme_textdomain( 'inti-child' , get_stylesheet_directory() . '/languages');

		
	/**
	 * Load framework files from child theme's framework directory
	 * 
	 * locate_template() will first check the child theme for a file in that location,
	 * and if not found, will search the parent theme. Override parent theme files by giving
	 * the child theme versions the same name, set a unique name or add a prefix to load
	 * them in addition to parent theme files.
	 */ 
	// require_once locate_template('/framework/content/child-content-header.php');
	// require_once locate_template('/framework/content/child-content-footer.php');

	require_once locate_template('/framework/content/child-content-front-page-blocks.php');
	require_once locate_template('/framework/content/child-content-header.php');
	require_once locate_template('/framework/content/child-content-footer.php');
	require_once locate_template('/framework/functions/child-helpers.php');
	require_once locate_template('/framework/functions/theme-supports.php');
	require_once locate_template('/framework/metaboxes/child-metaboxes.php');
	require_once locate_template('/framework/customizer/child-customize.php');
	require_once locate_template('/framework/theme-options/child-theme-options.php');
	require_once locate_template('/framework/extensions/child-typography.php');

	require_once locate_template('/framework/post-types/taxonomies.php');

	if (inti_current_theme_supports( 'inti-post-types', 'testimonial' )) {
		require_once locate_template('/framework/shortcodes/shortcode-testimonials.php');
		require_once locate_template('/framework/shortcodes/shortcode-testimonial-single.php');
	}
	if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) {
		require_once locate_template('/framework/shortcodes/shortcode-opt-in.php');
		require_once locate_template('/framework/widgets/opt-in.php');
	}

}
add_action('after_setup_theme', 'childtheme_override_setup', 15);




/**
 * Add your own custom functions below
 */




/*
 * Declare some hooks
 */
function child_hook_front_page_blocks() {
	do_action('child_hook_front_page_blocks');
}
function child_hook_site_banner_auxiliary_column() {
	do_action('child_hook_site_banner_auxiliary_column');
}