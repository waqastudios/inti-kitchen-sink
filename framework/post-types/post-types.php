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




if(!function_exists('brand_post_type_init')){
	function brand_post_type_init() {
		$labels = array(
			'name' => _x('Brands', 'post type general name', inti),
			'singular_name' => _x('Brand', 'post type singular name', inti),
			'add_new' => __('Add New', 'Brand', inti),
			'add_new_item' => __('Add New Brand', inti),
			'edit_item' => __('Edit Brand', inti),
			'new_item' => __('New Brand', inti),
			'view_item' => __('View Brand', inti),
			'search_items' => __('Search Brands', inti),
			'not_found' =>  __('No Brand found', inti),
			'not_found_in_trash' => __('No Brand found in Trash', inti), 
			'parent_item_colon' => '',
			'menu_name' => _x('Brands', '', inti)
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
add_action('init', 'brand_post_type_init');

