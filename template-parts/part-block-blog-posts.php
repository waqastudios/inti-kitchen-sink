<?php
/**
 * Display blog posts on the homepage
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.2
 * @version 1.0.8
 */

// get the options
$show = get_inti_option('fpb_blog_show', 'inti_customizer_options', 1);
$post_category = get_inti_option('fpb_post_category', 'inti_customizer_options', 0);
$number_posts = get_inti_option('fpb_post_number', 'inti_customizer_options', 3);
$post_columns = get_inti_option('fpb_post_columns', 'inti_customizer_options', 3);
$order = get_inti_option('fpb_post_order', 'inti_customizer_options', 'DESC');

$showlinktoblog = get_inti_option('fpb_blog_link_show', 'inti_customizer_options', 0);
$bloglinkurl = get_inti_option('fpb_blog_link_url', 'inti_customizer_options', get_permalink(get_option('page_for_posts')));
$bloglinktext = get_inti_option('fpb_blog_link_text', 'inti_customizer_options', __('View All Posts', 'inti-child'));

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$args = array( 
	'post_type'           => 'post',
	'cat'                 => $post_category,
	'posts_per_page'      => $number_posts,
	'order'               => $order,
	'ignore_sticky_posts' => 1,
	'paged'               => $paged );

global $frontpage_query;

if ($show) :
	$frontpage_query = new WP_Query( $args ); 
?>
	<section class="block blog-posts">
		<div class="grid-container">
			<?php if ( $frontpage_query->have_posts() ) : ?>
			
			
				<?php // if more than one cell use block-grid
				if ( $post_columns != 1 ) echo '<div class="grid-x grid-margin-x small-up-1 medium-up-1 mlarge-up-' . $post_columns . '">'; ?>
				
					<?php while ( $frontpage_query->have_posts() ) : $frontpage_query->the_post(); global $more; $more = 0; ?>
						
						<?php inti_hook_post_before(); ?>
						
						<?php if ( $post_columns != 1 ) echo '<div class="cell">'; ?>
							
							<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
								<div class="entry-body">
									<?php  if ( has_post_thumbnail() ) : ?>
									<div class="grid-x grid-margin-x">
										<div class="cell">
											<div class="entry-thumbnail">
												<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
													<?php the_post_thumbnail( 'blog-thumbnail', array( 'class' => 'blog-thumbnail', 'alt' => get_the_title() ) ); ?>
												</a>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<div class="grid-x grid-margin-x">
										<div class="cell"> 

											
											<header class="entry-header">
													
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
												
												<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __('%s', 'inti'), the_title_attribute('echo=0') ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
												<div class="grid-x grid-margin-x">
													<div class="medium-6 cell">
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
														?>
													</div>
													<div class="medium-6 cell">
														<?php 
															echo inti_get_post_page_footer_comments_link();
														?>
													</div>
												</div>
											</header><!-- .entry-header -->
											

											<div class="entry-summary">
												<?php the_excerpt(); ?>
												<a href="<?php the_permalink(); ?>" class="button read-more"><?php echo get_inti_option('read_more_text', 'inti_general_options', __('Read more >', 'inti')); ?></a>
											</div><!-- .entry-content -->               

											<footer class="entry-footer">
												
											</footer><!-- .entry-footer -->

										</div>
									</div>

									
										


								</div><!-- .entry-body -->
							</article><!-- #post -->
							
						<?php if ( $post_columns != 1 ) echo '</div>'; ?> 
						
						<?php inti_hook_post_after(); ?>

					<?php endwhile; // end of the loop 
						wp_reset_query(); ?>
					
				<?php if ( $post_columns != 1 ) echo '</div>'; // close the block-grid ?>
				
			<?php else: ?>
				<div class="grid-container">
					<div class="callout warning" data-closable>
						<p><?php _e('There are currently no published blog posts in this category.', 'inti-child'); ?></p>
						<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			<?php endif; // end have_posts() check ?>
			<?php if ($showlinktoblog) : ?>
				<div class="grid-container">
					<nav class="content-navigation block-blog-posts-navigation" role="navigation">
						<div class="grid-x grid-margin-x">
							<div class="small-12 cell">
								<a href="<?php echo $bloglinkurl; ?>" class="button"><?php echo $bloglinktext; ?></a>
							</div>
						</div><!-- .grid-x -->
					</nav>
				</div>
			<?php endif; ?>
		</div><!-- .grid-container -->
	</section>
<?php endif; ?>