<?php
/**
 * Display 'Featured in' or 'As seen in' brand carousel
 *
 * This block requires a accompanying post type to be created,
 * which by default would be called "inti-brand"
 *
 * This block also (normally) requires that each logo link to either
 * the magazine/newspaper/article that the logo represents a feature in
 * when not set up as a on-site page. This would require a metabox to be
 * added to the custom type.
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.2
 */

	$brands = new WP_Query(array(
		'post_type' => 'inti-brand',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'posts_per_page' => -1
	)); 

?>
	<section class="block featured-in">
		<div class="row">
			<div class="inti-carousel inti-brand clearfix">
				<?php while ( $brands->have_posts() ) : $brands->the_post(); global $post; ?>

					<div class="slide">
					<?php 
						if ( has_post_thumbnail($post->ID) ) :

							// Get the meta data 
							$brand_url = get_post_meta( $post->ID, "_inti_brand_url", true );
							if ( $brand_url ) : ?>
								<a href="<?php echo esc_url($brand_url); ?>" target="_blank">
									<?php the_post_thumbnail( 'brand-thumbnail', array( 'class'	=> 'brand-thumbnail', 'alt' => get_the_title() ) ); ?>
								</a>
							<?php else : ?>
								<?php the_post_thumbnail( 'brand-thumbnail', array( 'class'	=> 'brand-thumbnail', 'alt' => get_the_title() ) ); ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>

				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</section>