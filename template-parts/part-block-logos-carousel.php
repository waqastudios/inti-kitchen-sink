<?php
/**
 * Display 'Featured in' or 'As seen in' brand carousel of logos
 *
 * This block requires a accompanying post type to be created,
 * which by default would be called "inti-logo"
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
	// get the options
$show = get_inti_option('fpb_logos_show', 'inti_customizer_options', 1);
$title = get_inti_option('fpb_logos_title', 'inti_customizer_options');
$description = get_inti_option('fpb_logos_description', 'inti_customizer_options');

if ($show) :
	$logos = new WP_Query(array(
		'post_type' => 'inti-logo',
		'order' => 'ASC',
		'orderby' => 'menu_order',
		'posts_per_page' => -1
	)); 

?>
	<section class="block logos">
		<div class="row">
			<div class="column">
				<?php if ($title || $description) : ?>
				<header>
					<?php if ($title) : ?><h3><?php echo $title; ?></h3><?php endif; ?>
					<?php if ($description) : ?><p><?php echo $description; ?></p><?php endif; ?>
				</header>
				<?php endif; ?>
				<?php if ($logos->have_posts()): ?>
					<div class="inti-carousel inti-logos-carousel clearfix">
					<?php while ( $logos->have_posts() ) : $logos->the_post(); global $post; ?>

						<div class="slide">
						<?php 
							if ( has_post_thumbnail($post->ID) ) :

								// Get the meta data 
								$logo_url = get_post_meta( $post->ID, "_inti_logo_url", true );
								if ( $logo_url ) : ?>
									<a href="<?php echo esc_url($logo_url); ?>" target="_blank">
										<?php the_post_thumbnail( 'logo-thumbnail', array( 'class'	=> 'logo-thumbnail', 'alt' => get_the_title() ) ); ?>
									</a>
								<?php else : ?>
									<?php the_post_thumbnail( 'logo-thumbnail', array( 'class'	=> 'logo-thumbnail', 'alt' => get_the_title() ) ); ?>
								<?php endif; ?>
							<?php endif; ?>
						</div>

					<?php endwhile; wp_reset_query(); ?>
					</div>
				<?php else: ?>
					<div class="row">
						<div class="callout warning" data-closable>
							<p><?php _e('There are currently no published logos', 'inti-child'); ?></p>
							<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				<?php endif; ?>		
			</div>
		</div>
	</section>
<?php endif; ?>