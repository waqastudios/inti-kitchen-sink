<?php
/**
 * Taxonomies
 * Custom post types sometimes have custom taxonomies.
 *
 * @package Inti
 * @author Stuart Starrs
 * @since 1.0.3
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */


/**
 * Taxonomy: Testimonial Category
 * Related Post Type: inti-testimonial
 * Description: Split testimonials into types that will let us do things like
 * devide them by service offered, product purchased, or page they appear on etc. 
 * @since 1.0.3
 */

if (inti_current_theme_supports('inti-post-types', 'testimonial') ) {
	add_action( 'init', 'testimonial_taxonomies', 0 );  
	function testimonial_taxonomies() {  
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'inti-child'),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'inti-child'),
			'search_items'      => __( 'Search Testimonial Categories', 'inti-child'),
			'all_items'         => __( 'All Testimonial Categories', 'inti-child'),
			'parent_item'       => __( 'Parent Category', 'inti-child'),
			'parent_item_colon' => __( 'Parent Category:', 'inti-child'),
			'edit_item'         => __( 'Edit Category', 'inti-child'),
			'update_item'       => __( 'Update Category', 'inti-child'),
			'add_new_item'      => __( 'Add New Testimonial Category', 'inti-child'),
			'new_item_name'     => __( 'New Category Name', 'inti-child'),
			'menu_name'         => __( 'Categories', 'inti-child'),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'testimonial-category' ),
		);

	    register_taxonomy( 'inti-testimonial-category', 'inti-testimonial', $args);
	}
}


/**
 * Taxonomy: Service Category
 * Related Post Type: inti-service
 * Description: Split services into types that will let us do things like
 * devide them by service offered, product purchased, or page they appear on etc. 
 * @since 1.0.3
 */

if (inti_current_theme_supports('inti-post-types', 'service') ) {
	add_action( 'init', 'service_taxonomies', 0 );  
	function service_taxonomies() {  
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name', 'inti-child'),
			'singular_name'     => _x( 'Category', 'taxonomy singular name', 'inti-child'),
			'search_items'      => __( 'Search Service Categories', 'inti-child'),
			'all_items'         => __( 'All Service Categories', 'inti-child'),
			'parent_item'       => __( 'Parent Category', 'inti-child'),
			'parent_item_colon' => __( 'Parent Category:', 'inti-child'),
			'edit_item'         => __( 'Edit Category', 'inti-child'),
			'update_item'       => __( 'Update Category', 'inti-child'),
			'add_new_item'      => __( 'Add New Service Category', 'inti-child'),
			'new_item_name'     => __( 'New Category Name', 'inti-child'),
			'menu_name'         => __( 'Categories', 'inti-child'),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'service-category' ),
		);

	    register_taxonomy( 'inti-service-category', 'inti-service', $args);
	}
}