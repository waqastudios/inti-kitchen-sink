<?php
/**
 * Styles
 * WordPress will add these style sheets to the theme header
 *
 * You'll notice this file has the same file name as the styles file in the parent
 * Inti Foundation. This causes this child theme version to override the parent theme
 * version in its entirety. In this case, we are ignoring the parent theme styles and
 * creating our own in the child theme, including all aspects of Foundation and the settings
 * file.
 *
 * @package Inti
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/wp_register_style
 * @link http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @see wp_register_style
 * @see wp_enqueue_style
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

add_action('wp_enqueue_scripts', 'child_register_styles', 9);
add_action('wp_enqueue_scripts', 'child_enqueue_styles', 9);
 
function child_register_styles() {
	// register styles
	wp_register_style('inti', get_stylesheet_directory_uri() . '/library/css/inti-min.css', array(), filemtime(get_stylesheet_directory() . '/library/css/inti-min.css'), 'all');
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'), 'all');
}

function child_enqueue_styles() {
	if ( !is_admin() ) { 
		// enqueue styles
		wp_enqueue_style('inti'); 
		
		// add style.css with child themes
		if ( is_child_theme() ) {
			wp_enqueue_style('style');
		}
	}
}