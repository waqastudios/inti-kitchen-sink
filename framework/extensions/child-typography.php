<?php
/**
 * Child Typography
 * Adds to or overwrites contents typography.php in parent theme
 *
 * @package Inti
 * @author Anthony Wilhelm (@awshout / anthonywilhelm.com)
 * @since 1.0.14
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */


/**
 * Add Child Google Fonts
 * Filter to add additional fonts to lists of Google Font faces
 * (this does not mean they are enqueue - that happens in 'inti_do_typography_google_fonts()' 
 * based on which are being used' )
 */
 
function child_get_typography_google_fonts($google_faces) {

	// these are the fonts from the parent theme, do you need to add another?
		// $google_faces = array(
		// 	"'Arvo', serif" => "Arvo",
		// 	"'Copse', sans-serif" => "Copse",
		// 	"'Cabin', sans-serif" => "Cabin",
		// 	"'Droid Sans', sans-serif" => "Droid Sans",
		// 	"'Droid Serif', serif" => "Droid Serif",
		// 	"'Josefin Slab', serif" => "Josefin Slab",
		// 	"'Lato', sans-serif" => "Lato",
		// 	"'Lobster', cursive" => "Lobster",
		// 	"'Nobile', sans-serif" => "Nobile",
		// 	"'Open Sans', sans-serif" => "Open Sans",
		// 	"'Oswald', sans-serif" => "Oswald",
		// 	"'Pacifico', cursive" => "Pacifico",
		// 	"'Roboto', sans-serif" => "Roboto",
		// 	"'Rokkitt', serif" => "Rokkit",
		// 	"'PT Sans', sans-serif" => "PT Sans",
		// 	"'Quattrocento', serif" => "Quattrocento",
		// 	"'Raleway', cursive" => "Raleway",
		// 	"'Titillium Web', sans-serif" => "Titillium Web",
		// 	"'Ubuntu', sans-serif" => "Ubuntu",
		// 	"'Vollkorn', serif" => "Vollkorn",
		// 	"'Yanone Kaffeesatz', sans-serif" => "Yanone Kaffeesatz");

	// Add new faces here, for example...
	$new_faces = array(
		"'Philosopher', sans-serif" => "Philosopher"
	);
	$sorted_array = array_merge($new_faces, $google_faces);
	ksort($sorted_array);

	return $sorted_array;
}
add_filter('inti_filter_get_typography_google_fonts', 'child_get_typography_google_fonts');

/**
 * Enqueue Google Fonts
 * To actually make the font enqueue rather than just appear as a style option
 * that can't be used, enqueue it here.
 * ** Needs Inti Foundation 1.2.10 or greater ** 
 */
function child_do_typography_google_fonts($selected_faces) {

	// Add new faces here, for example...
	$manually_enqueue = array(
		"'Philosopher', sans-serif"
	);
	$enqueue_these = array_merge($manually_enqueue, $selected_faces);

	return $enqueue_these;
}
add_filter('inti_filter_do_typography_google_fonts', 'child_do_typography_google_fonts');

/**
 * Change enqueued font weights and styles
 */
function child_do_typography_weights($weights) {
	
	// overwrite as needed
	$weights = "300,400,600";

	return $weights;
}
add_filter('inti_filter_do_typography_weights', 'child_do_typography_weights');

/**
 * Add Font Size Options
 */
function child_get_typography_font_sizes($existing) {

	// these are the sizes from the parent theme, do you need to add another?
		// $fontsizes = array(
		// 	"80%" => "20% Smaller",
		// 	"100%" => "Default",
		// 	"120%" => "20% Bigger",
		// 	"140%" => "40% Bigger",
		// 	"160%" => "60% Bigger",
		// 	"180%" => "80% Bigger",
		// 	"200%" => "100% Bigger");

	$new_sizes = array(
		"250%" => "150% Bigger"
	);
	$final_sizes = array_merge($new_sizes, $existing);

	return $final_sizes;
}
add_filter('inti_filter_get_typography_font_sizes', 'child_get_typography_font_sizes');