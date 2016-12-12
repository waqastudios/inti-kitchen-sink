<?php
/**
 * The template for displaying page content as a Front Page Block
 *
 * @package Inti
 * @subpackage Templates
 * @since 1.0.14
 */

/**
 * This file provides a template to modify the front page block 'page'
 *
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="entry-body">

			<?php inti_hook_page_header_before(); ?>

			<header class="entry-header">
				<?php inti_hook_page_header(); ?>
			</header><!-- .entry-header -->
			
			<?php inti_hook_page_header_after(); ?>
					
			<div class="entry-content">
				<?php inti_hook_page_content_before_the_content(); ?>
				<?php the_content(); ?>
				<?php inti_hook_page_content_after_the_content(); ?>
			</div><!-- .entry-content -->
			
			<footer class="entry-footer">
				<?php inti_hook_page_footer(); ?>
			</footer><!-- .entry-footer -->
			
		</div><!-- .entry-body -->
	</article><!-- #post -->
