<?php
/**
 * Display Testimonials slider
 *
 * This block requires an accompanying post type to be created,
 * which by default would be called "inti-testimonial"
 *
 * "inti-testimonial" also has a custom taxonomy called "inti-testimonial-category"
 *
 * Helper functions have been created and added to child-helpers.php that return a formatted
 * string of the name of the person who gave the testimonail and the business they
 * represent. 
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.3
 */


// get the options
$title = get_inti_option('fpb_testimonials_title', 'inti_customizer_options');
$description = get_inti_option('fpb_testimonials_description', 'inti_customizer_options');

$testimonial_category = get_inti_option('fpb_testimonials_category', 'inti_customizer_options', 0);
$number_posts = get_inti_option('fpb_testimonials_post_number', 'inti_customizer_options', -1);
$order = get_inti_option('fpb_testimonials_order', 'inti_customizer_options', 'ASC');

$args = "";
if ($testimonial_category == 0) {
	$args = array( 
	'post_type'           => 'inti-testimonial',
	'posts_per_page'      => $number_posts,
	'order'               => $order,
	'orderby'             => 'date',
	'ignore_sticky_posts' => 1 );
} else {
	$args = array( 
	'post_type'           => 'inti-testimonial',
	'tax_query'           => array(
								array(
									'taxonomy' => 'inti-testimonial-category', 
									'field' => 'id', 
									'terms' => $testimonial_category)
							 ),
	'posts_per_page'      => $number_posts,
	'order'               => $order,
	'orderby'             => 'date',
	'ignore_sticky_posts' => 1 );
}

$testimonials = new WP_Query($args); 

?>
	<section class="block testimonials">
		<div class="row">
			<div class="column">
				<?php if ($title || $description) : ?>
				<header class="block-header">
					<?php if ($title) : ?><h3><?php echo $title; ?></h3><?php endif; ?>
					<?php if ($description) : ?><p><?php echo $description; ?></p><?php endif; ?>
				</header>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="inti-slider inti-testimonial-slider clearfix">
				<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); global $post; ?>
					<?php 
						// Get the meta data 
						$testimonial_role = get_post_meta( $post->ID, "_inti_testimonial_role", true );
						$testimonial_company = get_post_meta( $post->ID, "_inti_testimonial_company", true );
						$testimonial_url = get_post_meta( $post->ID, "_inti_testimonial_url", true ); 

					?>
					<div class="slide testimonial">

						<?php // if it has a thumbnail, create two columns, else just one
						if ( has_post_thumbnail($post->ID) ) : ?>
							<div class="medium-5 mlarge-4 columns">
								<div class="testimonial-image">
									<?php the_post_thumbnail('testimonial-thumbnail'); ?>
								</div>
							</div>
							<div class="medium-7 mlarge-8 columns">
								<blockquote>
									<div class="testimonial-text">
										<?php the_excerpt(); ?>
										<cite class="testimonial-owner">	
											<?php the_testimonial_owner($post->ID); ?>		
										</cite>
									</div>
								</blockquote>
							</div>
						<?php 
						else : ?>
							<div class="column">
								<blockquote>
									<div class="testimonial-text">
										<cite><?php the_excerpt(); ?></cite>
										<p class="testimonial-owner">	
											<?php the_testimonial_owner($post->ID); ?>					
										</p>
									</div>
								</blockquote>
							</div>
						<?php endif; ?>
				
					</div>
				<?php endwhile; wp_reset_query(); ?>
							
			</div>
		</div>
	</section>