<?php 
/**
 * Helpers for this child theme
 *
 * @since 1.0.2
 */


/**
 * Remove the readmore link for excerpts because we'll add out own
 * read more buttons manually outside of the the_excerpt()s HTML tags
 */
function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more',9999);