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
 * @version 1.0.8
 */


// get the options
$show = get_inti_option('fpb_testimonials_show', 'inti_customizer_options', 1);

$title = get_inti_option('fpb_testimonials_title', 'inti_customizer_options');
$description = get_inti_option('fpb_testimonials_description', 'inti_customizer_options');

$testimonial_category = get_inti_option('fpb_testimonials_category', 'inti_customizer_options', 0);
$number_posts = get_inti_option('fpb_testimonials_post_number', 'inti_customizer_options', -1);
$order = get_inti_option('fpb_testimonials_order', 'inti_customizer_options', 'ASC');
$content = get_inti_option('fpb_testimonials_content', 'inti_customizer_options', 'excerpt');

$hide_photos = get_inti_option('fpb_testimonials_hide_photos', 'inti_customizer_options', '');
$linkto_type = get_inti_option('fpb_testimonials_linkto_type', 'inti_customizer_options', '');
$linkto_page = get_inti_option('fpb_testimonials_linkto_page', 'inti_customizer_options', '');

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


if ($show) :
	$testimonials = new WP_Query($args); 
?>
	<section class="block testimonials">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<?php if ($title || $description) : ?>
					<header class="block-header">
						<?php if ($title) : ?><h3><?php echo $title; ?></h3><?php endif; ?>
						<?php if ($description) : ?><p><?php echo $description; ?></p><?php endif; ?>
					</header>
					<?php endif; ?>
				</div>
			</div>
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<div class="inti-slider inti-testimonial-slider clearfix" data-equalizer data-equalize-on="small">
						<?php if ($testimonials->have_posts()) : ?>
							<?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
								<?php 
									// Get the meta data 
									$testimonial_role = get_post_meta( get_the_ID(), "_inti_testimonial_role", true );
									$testimonial_company = get_post_meta( get_the_ID(), "_inti_testimonial_company", true );
									$testimonial_url = get_post_meta( get_the_ID(), "_inti_testimonial_url", true ); 
												
									$link = "";
									if ($linkto_type == "permalink") {
										$link = '<a href="' . get_the_permalink() . '">';
									} elseif ($linkto_type == "url" && $linkto_page != "-1") {
										$link = '<a href="' . get_the_permalink($linkto_page) . '">';
									} else {
										// Do nothing
									}

								?>
								<div class="slide">
									<?php 
										if ($link) {
											echo $link;
										} 
									 ?>

									<blockquote class="testimonial" data-equalizer-watch>
										<div class="grid-x grid-padding-x">
											
											<?php // if it has a thumbnail, create two cells, else just one
											if ( has_post_thumbnail(get_the_ID()) && $hide_photos == 0 ) : ?>
											<div class="medium-5 mlarge-4 cell">
												<div class="testimonial-image">
													<?php the_post_thumbnail('testimonial-thumbnail'); ?>
												</div>
											</div>
											<div class="medium-7 mlarge-8 cell">
												
												<div class="testimonial-text">
													<?php
														if ($content == "excerpt") {
															the_excerpt();
														} else {
															the_content();
														}
													 ?>
													<cite class="testimonial-owner">	
														<?php the_testimonial_owner(get_the_ID()); ?>		
													</cite>
												</div>
												
											</div>
											<?php else : ?>
											<div class="small-12 cell">
												
												<div class="testimonial-text">
													<?php 
														if ($content == "excerpt") {
															the_excerpt();
														} else {
															the_content();
														}
													 ?>
													<cite class="testimonial-owner">	
														<?php the_testimonial_owner(get_the_ID()); ?>		
													</cite>
												</div>
												
											</div>
											<?php endif; ?>	

										</div>
									</blockquote>
							

									<?php 
										if ($link) {
											echo '</a>';
										} 
									 ?>
								</div>
							<?php endwhile;
								wp_reset_query(); ?>
						<?php else: ?>
							<div class="callout warning" data-closable>
								<p><?php _e('There are currently no published testimonials in this category', 'inti-child'); ?></p>
								<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						<?php endif; ?>		
					</div>
				</div><!-- .cell -->
			</div><!-- .grid-x .grid-padding-x -->
		</div><!-- .grid-container -->
	</section>
<?php endif; ?>