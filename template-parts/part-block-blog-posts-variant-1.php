<?php
/**
 * Display blog posts on the homepage - variant 1
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.2
 */
?>
	<?php // get the options
		$post_category = get_inti_option('frontpage_post_category', 'inti_general_options', -1);
		$number_posts = get_inti_option('frontpage_number_posts', 'inti_general_options', 3);

	?>
	<section class="block blog-posts variant-1">
	<?php // start the loop
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array( 
			'post_type'           => 'post',
			'cat'                 => $post_category,
			'posts_per_page'      => $number_posts,
			'ignore_sticky_posts' => 1,
			'paged'               => $paged );
		
		global $frontpage_query;
		$frontpage_query = new WP_Query( $args ); ?>
			  
		<?php if ( $frontpage_query->have_posts() ) : $odd = true; ?>
		
		
			
				<?php while ( $frontpage_query->have_posts() ) : $frontpage_query->the_post(); global $more; $more = 0; ?>
					
					<?php inti_hook_post_before(); ?>
					
						
						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> data-equalizer-watch>
							<div class="entry-body">

								<div class="row">

									<div class="mlarge-6 columns <?php if (false == $odd) echo 'mlarge-push-6'; ?>">
										<div class="entry-thumbnail">
											<?php  if ( has_post_thumbnail() ) : ?>
												<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail( 'blog-thumbnail', array( 'class' => 'blog-thumbnail', 'alt' => get_the_title() ) ); ?>
												</a>
											<?php endif; ?>
										</div>
									</div>
							
									<div class="mlarge-6 columns <?php if (false == $odd) echo 'mlarge-pull-6'; ?>">
										<header class="entry-header">
											<div class="entry-meta category">
												<?php 
													$args = array( 
														'show_author' => false,
														'show_date'   => false,
														'show_cat'    => true,
														'show_tag'    => false,
														'show_icons'  => false,
														'show_uncategorized' => false,
													 );
													echo inti_get_post_header_meta($args); 
												?>
											</div>
											<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __('%s', 'inti'), the_title_attribute('echo=0') ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
											<div class="entry-meta date comments">
												<?php 
													$args = array( 
														'show_author' => false,
														'show_date'   => true,
														'show_cat'    => false,
														'show_tag'    => false,
														'show_icons'  => false,
														'show_uncategorized' => false,
													 );
													echo inti_get_post_header_meta($args); 

													echo inti_get_post_page_footer_comments_link();
												?>
											</div>
										</header><!-- .entry-header -->

										<div class="entry-summary">
											<?php the_excerpt(); ?>
										</div><!-- .entry-content -->   

										<footer class="entry-footer">
											
										</footer><!-- .entry-footer -->

									</div>            
				

								</div>
									


							</div><!-- .entry-body -->
						</article><!-- #post -->
						
					
					<?php inti_hook_post_after(); ?>

					<?php if (true == $odd) : $odd = false; else : $odd = true; endif; ?>

				<?php endwhile; // end of the loop ?>
			

		<?php endif; // end have_posts() check ?>
	</section>