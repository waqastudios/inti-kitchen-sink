<?php
/**
 * @package Inti
 * @author Waqa Studios
 * @since 1.0.0
 * @version 1.0.4
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


/**
 * Testimonial metabox
 */
add_action( 'cmb2_init', 'inti_register_testimonial_metabox' );
function inti_register_testimonial_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_inti_testimonial_';

	$cmb_testimonial = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Testimonial Meta', 'inti' ),
		'object_types'  => array( 'inti-testimonial' ), // Post type
		// 'show_on_cb' => 'inti_hide_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'core',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_testimonial->add_field( array(
		'name'    => __( 'Role', 'inti' ),
		'desc'    => __( 'Position, Job Title', 'inti' ),
		'id'      => $prefix . 'role',
		'type'    => 'text'
	) );	

	$cmb_testimonial->add_field( array(
		'name'    => __( 'Company/ Organization', 'inti' ),
		'desc'    => __( 'Company or organization', 'inti' ),
		'id'      => $prefix . 'company',
		'type'    => 'text'
	) );

	$cmb_testimonial->add_field( array(
		'name'    => __( 'Company URL', 'inti' ),
		'desc'    => __( 'Link the company to an external URL', 'inti' ),
		'id'      => $prefix . 'url',
		'type'    => 'text_url',
		'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	) );


	$cmb_testimonial->add_field( array(
		'name'    => __( 'Open in new window', 'inti' ),
		'desc'    => __( 'Open link to the company in a new window', 'inti' ),
		'id'      => $prefix . 'new',
		'type'    => 'checkbox',
	) );
}


/**
 * Service metabox
 */
add_action( 'cmb2_init', 'inti_register_service_metabox' );
function inti_register_service_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_inti_service_';

	$cmb_service = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Service Meta', 'inti' ),
		'object_types'  => array( 'inti-service' ), // Post type
		// 'show_on_cb' => 'inti_hide_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'core',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	$cmb_service->add_field( array(
		'name'    => __( 'Action Text', 'inti' ),
		'desc'    => __( 'Any call-to-action text the theme supports, possibly a button below the service description or the alt text on the service image', 'inti' ),
		'id'      => $prefix . 'action_text',
		'type'    => 'text'
	) );

	$cmb_service->add_field( array(
		'name'    => __( 'Custom URL', 'inti' ),
		'desc'    => __( 'Alternative link to custom URL - leave blank to keep default service page', 'inti' ),
		'id'      => $prefix . 'url',
		'type'    => 'text_url',
		'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	) );


	$cmb_service->add_field( array(
		'name'    => __( 'Open in new window', 'inti' ),
		'desc'    => __( 'Open link to the company in a new window', 'inti' ),
		'id'      => $prefix . 'new',
		'type'    => 'checkbox',
	) );
}


/**
 * Opt-in metabox
 */
add_action( 'cmb2_init', 'inti_register_opt_in_metabox' );
function inti_register_opt_in_metabox() {
	// Start with an underscore to hide fields from custom fields list
	$prefix = '_inti_opt_in_';

	$cmb_opt_in = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Opt-in Configuration', 'inti' ),
		'object_types'  => array( 'inti-opt-in' ), // Post type
		// 'show_on_cb' => 'inti_hide_if_front_page', // function should return a bool value
		'context'    => 'normal',
		'priority'   => 'core',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );	

	$cmb_opt_in->add_field( array(
		'name'    => __( 'Post action URL', 'inti' ),
		'desc'    => __( 'URL to post the form to', 'inti' ),
		'id'      => $prefix . 'url',
		'type'    => 'text_url',
		'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
	) );

	$cmb_opt_in->add_field( array(
		'name'    => __( 'Hidden Fields', 'inti' ),
		'desc'    => __( 'Most form embed codes come with fields that are kept hidden, paste those here.', 'inti' ),
		'id'      => $prefix . 'hidden',
		'type'    => 'textarea_code',
	) );


	$cmb_opt_in->add_field( array(
		'name' => __( 'First Name field', 'inti' ),
		'desc' => __( 'Values for the First Name field', 'inti' ),
		'id'   => $prefix . 'first_name_title',
		'type' => 'title',
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'First Name element name', 'inti' ),
		'desc'    => __( 'Value for the name property', 'inti' ),
		'id'      => $prefix . 'first_name_name',
		'type'    => 'text_medium',
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'First Name element placeholder text', 'inti' ),
		'desc'    => __( 'Value for the placeholder property', 'inti' ),
		'id'      => $prefix . 'first_name_placeholder',
		'type'    => 'text_medium',
		'default' => __('First Name', 'inti'),
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'First Name required', 'inti' ),
		'desc'    => __( 'This field is required', 'inti' ),
		'id'      => $prefix . 'first_name_required',
		'type'    => 'checkbox',
	) );


	$cmb_opt_in->add_field( array(
		'name' => __( 'Email Address field', 'inti' ),
		'desc' => __( 'Values for the Email Address field', 'inti' ),
		'id'   => $prefix . 'email_title',
		'type' => 'title',
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'Email element name', 'inti' ),
		'desc'    => __( 'Value for the name property', 'inti' ),
		'id'      => $prefix . 'email_name',
		'type'    => 'text_medium',
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'Email element placeholder text', 'inti' ),
		'desc'    => __( 'Value for the placeholder property', 'inti' ),
		'id'      => $prefix . 'email_placeholder',
		'type'    => 'text_medium',
		'default' => __('Email', 'inti'),
	) );
	$cmb_opt_in->add_field( array(
		'name'    => __( 'Email required', 'inti' ),
		'desc'    => __( 'This field is required', 'inti' ),
		'id'      => $prefix . 'email_required',
		'type'    => 'checkbox',
	) );


	$cmb_opt_in->add_field( array(
		'name'    => __( 'Submit Button Text', 'inti' ),
		'desc'    => __( 'Text for submit button', 'inti' ),
		'id'      => $prefix . 'button_text',
		'type'    => 'text_small',
	) );

}