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
	return '…';
}
add_filter('excerpt_more', 'new_excerpt_more',9999);


/**
 * Using the post id of a testimonail, get the metadata and return it with
 * formatting
 */
function get_testimonial_owner($id) {

    $post_t = get_post($id);

    /* Build owner info */
    $testimonial_role = get_post_meta( $id, '_inti_testimonial_role', true );
    $testimonial_company = get_post_meta( $id, '_inti_testimonial_company', true );
    $testimonial_url = get_post_meta( $id, '_inti_testimonial_url', true );
    $testimonial_new = get_post_meta( $id, '_inti_testimonial_new', true );

    $owner_html = '<span class="testimonial-name">'.$post_t->post_title.'</span>';
    if ($testimonial_role) {
        $owner_html .= ', <span class="testimonial-role">'.$testimonial_role.'</span>';
        if ($testimonial_company) $owner_html .= ', ';          
    }
    if ($testimonial_company) {
        if ($post_t->post_title && !$testimonial_role) $owner_html .= ', '; 
        $owner_html .= '<span class="testimonial-company">';
        if ($testimonial_url) {
            if ($testimonial_new) {
				$owner_html .= '<a href="'.$testimonial_url.'" target="_blank">'.$testimonial_company.'</a>';
            } else {
            	$owner_html .= '<a href="'.$testimonial_url.'">'.$testimonial_company.'</a>';
            }
        } else {
            $owner_html .= $testimonial_company;
        }
        $owner_html .= '</span>';
    }

    return $owner_html;
}


/**
 * Output the formated metadata from get_testimonial_owner()
 */
function the_testimonial_owner($id) {
    $owner_html = get_testimonial_owner($id);

    echo $owner_html;
}