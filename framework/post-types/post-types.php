<?php
/**
 * Post Types
 * Custom post types should be added to child themes, this parent theme 
 * has no custom post types by default, but if it did they would go here
 *
 * @package Inti
 * @author Stuart Starrs
 * @since 1.0.2
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */


/**
 * Change custom type's title placeholder text
 */
add_filter( 'enter_title_here', 'change_post_type_titles' );
function change_post_type_titles( $title ){
    $screen = get_current_screen();
     
    if  ( 'inti-brand' == $screen->post_type && inti_current_theme_supports('inti-post-types', 'brand') ) {
        $title = __('Enter brand name', 'inti-child');
     }

    if  ( 'inti-testimonial' == $screen->post_type && inti_current_theme_supports('inti-post-types', 'testimonial') ) {
        $title = __('Enter person\'s name', 'inti-child');
    }

    if  ( 'inti-opt-in' == $screen->post_type && inti_current_theme_supports('inti-post-types', 'opt-in') ) {
        $title = __('Purpose/Name', 'inti-child');
    }
 
    return $title;
}


/**
 * Post Type - Brand
 * @since 1.0.3
 * Related Taxonomy: None
 * Related Metaboxes: inti_register_brand_metabox
 */
if (inti_current_theme_supports('inti-post-types', 'brand') ) {
	add_action('init', 'brand_post_type_init');
	function brand_post_type_init() {
		$labels = array(
			'name' => _x('Brands', 'post type general name', 'inti-child'),
			'singular_name' => _x('Brand', 'post type singular name', 'inti-child'),
			'add_new' => __('Add New', 'Brand', 'inti-child'),
			'add_new_item' => __('Add New Brand', 'inti-child'),
			'edit_item' => __('Edit Brand', 'inti-child'),
			'new_item' => __('New Brand', 'inti-child'),
			'view_item' => __('View Brand', 'inti-child'),
			'search_items' => __('Search Brands', 'inti-child'),
			'not_found' =>  __('No Brand found', 'inti-child'),
			'not_found_in_trash' => __('No Brand found in Trash', 'inti-child'), 
			'parent_item_colon' => '',
			'menu_name' => _x('Brands', '', 'inti-child')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => false,
			'show_ui' => true, 
			'rewrite'   => true,
			'has_archive' => false,
			'query_var' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'show_in_nav_menus' => false,
			'menu_position' => 35,
			'menu_icon' => 'dashicons-images-alt2', 
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'page-attributes'
			)
		);
		register_post_type('inti-brand',$args);
	}
}


/**
 * Post Type - Testimonial
 * @since 1.0.3
 * Related Taxonomy: inti-testimonial-group
 * Related Metaboxes: inti_register_testimonial_metabox
 */
if (inti_current_theme_supports('inti-post-types', 'testimonial') ) {
	add_action('init', 'testimonial_post_type_init');
	function testimonial_post_type_init() {
		$labels = array(
			'name' => _x('Testimonials', 'post type general name', 'inti-child'),
			'singular_name' => _x('Testimonial', 'post type singular name', 'inti-child'),
			'add_new' => __('Add New', 'Testimonial', 'inti-child'),
			'add_new_item' => __('Add New Testimonial', 'inti-child'),
			'edit_item' => __('Edit Testimonial', 'inti-child'),
			'new_item' => __('New Testimonial', 'inti-child'),
			'view_item' => __('View Testimonial', 'inti-child'),
			'search_items' => __('Search Testimonials', 'inti-child'),
			'not_found' =>  __('No Testimonial found', 'inti-child'),
			'not_found_in_trash' => __('No Testimonial found in Trash', 'inti-child'), 
			'parent_item_colon' => '',
			'menu_name' => _x('Testimonials', '', 'inti-child')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => false,
			'show_ui' => true, 
			'rewrite' => array( 'slug' => 'testimonials' ),
			'has_archive' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'show_in_nav_menus' => false,
			'menu_position' => 35,
			'menu_icon' => 'dashicons-smiley', 
			'taxonomies' => array('inti-testimonial-category'),
			'supports' => array(
				'title',
				'thumbnail',
				'editor'
			)
		);
		register_post_type('inti-testimonial',$args);
	}
}


/**
 * Post Type - Service
 * @since 1.0.3
 * Related Taxonomy: inti-service-category
 * Related Metaboxes: inti_register_service_metabox
 */
if (inti_current_theme_supports('inti-post-types', 'service') ) {
	add_action('init', 'service_post_type_init');
	function service_post_type_init() {
		$labels = array(
			'name' => _x('Services', 'post type general name', 'inti-child'),
			'singular_name' => _x('Service', 'post type singular name', 'inti-child'),
			'add_new' => __('Add New', 'Service', 'inti-child'),
			'add_new_item' => __('Add New Service', 'inti-child'),
			'edit_item' => __('Edit Service', 'inti-child'),
			'new_item' => __('New Service', 'inti-child'),
			'view_item' => __('View Service', 'inti-child'),
			'search_items' => __('Search Services', 'inti-child'),
			'not_found' =>  __('No Service found', 'inti-child'),
			'not_found_in_trash' => __('No Service found in Trash', 'inti-child'), 
			'parent_item_colon' => '',
			'menu_name' => _x('Services', '', 'inti-child')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'rewrite' => array( 'slug' => 'services' ),
			'has_archive' => true,
			'query_var' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'show_in_nav_menus' => true,
			'menu_position' => 35,
			'menu_icon' => 'dashicons-lightbulb', 
			'taxonomies' => array('inti-service-category'),
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'page-attributes'
			)
		);
		register_post_type('inti-service',$args);
	}
}


/**
 * Post Type - Opt-in Form
 * @since 1.0.4
 * Related Taxonomy: None
 * Related Metaboxes: inti_register_opt_in_metabox
 */
if (inti_current_theme_supports('inti-post-types', 'opt-in') ) {
	add_action('init', 'opt_in_post_type_init');
	function opt_in_post_type_init() {
		$labels = array(
			'name' => _x('Opt-in Forms', 'post type general name', 'inti-child'),
			'singular_name' => _x('Opt-in Form', 'post type singular name', 'inti-child'),
			'add_new' => __('Add New', 'Opt-in Form', 'inti-child'),
			'add_new_item' => __('Add New Opt-in Form', 'inti-child'),
			'edit_item' => __('Edit Opt-in Form', 'inti-child'),
			'new_item' => __('New Opt-in Form', 'inti-child'),
			'view_item' => __('View Opt-in Form', 'inti-child'),
			'search_items' => __('Search Opt-ins', 'inti-child'),
			'not_found' =>  __('No Opt-in Form found', 'inti-child'),
			'not_found_in_trash' => __('No Opt-in Form found in Trash', 'inti-child'), 
			'parent_item_colon' => '',
			'menu_name' => _x('Opt-in Forms', '', 'inti-child')
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => false,
			'show_ui' => true, 
			'rewrite'   => false,
			'has_archive' => false,
			'query_var' => true,
			'capability_type' => 'page',
			'hierarchical' => false,
			'show_in_nav_menus' => false,
			'menu_position' => 35,
			'menu_icon' => 'dashicons-align-none', 
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
			)
		);
		register_post_type('inti-opt-in',$args);
	}
}