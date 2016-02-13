<?php
/**
 * Display Services
 *
 * This block requires an accompanying post type to be created,
 * which by default would be called "inti-service"
 *
 * "inti-service" also has a custom taxonomy called "inti-service-category"
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
	$title = get_inti_option('fpb_servicesblock_title', 'inti_customizer_options');
	$description = get_inti_option('fpb_servicesblock_description', 'inti_customizer_options');

	$service_category = get_inti_option('fpb_service_category', 'inti_customizer_options', -1);
	$number_posts = get_inti_option('fpb_service_post_number', 'inti_customizer_options', 3);
	$post_columns = get_inti_option('fpb_service_post_columns', 'inti_customizer_options', 3);
	$default_action_text = get_inti_option('read_more_text', 'inti_general_options', 'Read more &raquo;');
?>
	<section class="block services">
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
	<?php // start the loop
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array( 
			'post_type'           => 'inti-service',
			'tax_query'           => array(
										array(
											'taxonomy' => 'inti-service-category', 
											'field' => 'id', 
											'terms' => $service_category)
									 ),
			'posts_per_page'      => $number_posts,
			'ignore_sticky_posts' => 1,
			'paged'               => $paged );
		
		global $services_query;
		$services_query = new WP_Query( $args ); ?>
			  
		<?php if ( $services_query->have_posts() ) : ?>
		
		
			<?php // if more than one column use block-grid
			if ( $post_columns != 1 ) echo '<div class="row small-up-1 medium-up-1 mlarge-up-' . $post_columns . '" data-equalizer data-equalize-on="mlarge">'; ?>
			
				<?php while ( $services_query->have_posts() ) : $services_query->the_post(); global $more; $more = 0; ?>
					
					<?php if ( $post_columns != 1 ) echo '<div class="column">'; ?>
						<?php 
							// get the service meta values
							$action_text = get_post_meta(get_the_ID(), '_inti_service_action_text', true);
							$action_url = get_post_meta(get_the_ID(), '_inti_service_url', true);
							$action_new = get_post_meta(get_the_ID(), '_inti_service_new', true);

							// set a final text for button (or link, or alt text or whatever)
							$final_action_text = '';
							if ($action_text) {
								$final_action_text = $action_text;
							} else {
								$final_action_text = $default_action_text;
							}

							// set a final url
							$final_url = '';
							if ($action_url) {
								$final_url = $action_url;
							} else {
								$final_url = get_the_permalink();
							}

						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> data-equalizer-watch>
							<div class="entry-body">
								<?php  if ( has_post_thumbnail() ) : ?>
								<div class="row">
									<div class="columns">
										<div class="entry-thumbnail">
											<a href="<?php echo $final_url; ?>" 
											    rel="bookmark" 
											    title="<?php the_title_attribute(); ?>"
											    <?php if ($action_new) echo 'target="_blank"' ?>>
												<?php the_post_thumbnail( 'service-thumbnail', array( 'class' => 'service-thumbnail', 'alt' => $final_action_text ) ); ?>
											</a>
										</div>
									</div>
								</div>
								<?php endif; ?>
								<div class="row">
									<div class="columns"> 

										
										<header class="entry-header">
											<h3 class="entry-title">
												<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __('%s', 'inti'), the_title_attribute('echo=0') ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
											</h3>
										</header><!-- .entry-header -->
										

										<div class="entry-summary">
											<?php the_excerpt(); ?>
											<a href="<?php echo $final_url; ?>" 
											    rel="bookmark" 
											    title="<?php the_title_attribute(); ?>"
											    <?php if ($action_new) echo 'target="_blank"' ?>
											    class="button read-more">
												<?php echo $final_action_text; ?>
											</a>
										</div><!-- .entry-content -->               

										 <footer class="entry-footer">
											
										</footer><!-- .entry-footer -->

									</div>
								</div>

							</div><!-- .entry-body -->
						</article><!-- #post -->
						
					<?php if ( $post_columns != 1 ) echo '</div>'; ?> 
					
				<?php endwhile; // end of the loop ?>
				
			<?php if ( $post_columns != 1 ) echo '</div>'; // close the block-grid ?>
			

		<?php endif; // end have_posts() check ?>
	</section>