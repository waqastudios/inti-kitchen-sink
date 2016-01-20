<?php
/**
 * @package Inti
 * @author Waqa Studios
 * @since 1.0.0
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */




/**
 * Brand metabox
 */
add_action( 'cmb2_init', 'inti_register_brand_metabox' );
function inti_register_brand_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_inti_brand_';

	$cmb_brand = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Brand Configuration', 'inti' ),
		'object_types'  => array( 'inti-brand' ), // Post type
		// 'show_on_cb' => 'inti_hide_if_front_page', // function should return a bool value
		'context'    => 'side',
		'priority'   => 'core',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );	

	$cmb_brand->add_field( array(
		'name'    => __( 'Brand URL (optional)', 'inti' ),
		'desc'    => __( 'Link the brand logo (Featured Image) to an external URL', 'inti' ),
		'id'      => $prefix . 'url',
		'type'    => 'text_url',
		'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	) );

}