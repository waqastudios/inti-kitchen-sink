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
add_action( 'init', 'testimonial_taxonomies', 0 );  
function testimonial_taxonomies() {  
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', WAQA_DOMAIN),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', WAQA_DOMAIN),
		'search_items'      => __( 'Search Testimonial Categories', WAQA_DOMAIN),
		'all_items'         => __( 'All Testimonial Categories', WAQA_DOMAIN),
		'parent_item'       => __( 'Parent Category', WAQA_DOMAIN),
		'parent_item_colon' => __( 'Parent Category:', WAQA_DOMAIN),
		'edit_item'         => __( 'Edit Category', WAQA_DOMAIN),
		'update_item'       => __( 'Update Category', WAQA_DOMAIN),
		'add_new_item'      => __( 'Add New Testimonial Category', WAQA_DOMAIN),
		'new_item_name'     => __( 'New Category Name', WAQA_DOMAIN),
		'menu_name'         => __( 'Categories', WAQA_DOMAIN),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'testimonial-category' ),
	);

    register_taxonomy( 'inti-testimonial-group', 'inti-testimonial', $args);
}