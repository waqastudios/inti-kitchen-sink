<?php
/**
 * Content - Child Headers
 * Adds alternate layouts for different page header styles 
 * (header includes hero banners, F6 top bar menu, logo etc)
 *
 * @package Inti
 * @since 1.0.4
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * 
 */
function child_remove_header_content_actions(){
    remove_action( 'inti_hook_site_banner_after', 'inti_do_main_dropdown_menu');
}
add_action( 'after_setup_theme', 'child_remove_header_content_actions', 15 );


/**
 * Add main menu before or after site banner
 * add or remove .row to control max width
 * 
 * @since 1.0.4
 */
function child_do_main_dropdown_menu() {
	// adds the main menu
	// place the top-bar code from the part-header-*.php templates if you'd like to use hooks
}
// add_action('inti_hook_site_banner_after', 'child_do_main_dropdown_menu');
// add_action('inti_hook_site_banner_before', 'child_do_main_dropdown_menu');
// add_action('child_hook_site_banner_auxiliary_column', 'child_do_main_dropdown_menu');


/**
 * Add main menu before or after site banner
 * add or remove .row to control max width
 * 
 * @since 1.0.5
 */
function child_do_header_optin() {
	if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) : 
		get_template_part('template-parts/part-opt-in', 'header');
	endif;
}
// add_action('inti_hook_site_banner_after', 'child_do_header_optin');
?>