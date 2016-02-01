<?php
/**
 * Content - Front Page Blocks
 * Adds blocks (mostly from template-parts) to the front page template
 *
 * @package Inti
 * @since 1.0.0
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * Standard Page Content Block
 * Adds a block that displays the page content of the static page 
 * that is asssigned as the static front page
 *
 * @since 1.0.0
 */
function child_block_page_content() { ?>
	<section class="block page-content">
		<div class="row">
			<div class="small-12 columns">
				<?php // get the page loop
				get_template_part('loops/loop', 'page'); ?>
			</div>
		</div>
	</section><!-- .block page-content -->
<?php
}
add_action('child_hook_front_page_blocks', 'child_block_page_content', 1);


/**
 * Default Inti Foundation Parent Post Loop
 * By default, Inti Foundation displays a list of posts on the from page, 
 * from a category defined in the theme options
 * 
 * @since 1.0.2
 */
function child_block_blog_posts() { 
	get_template_part('template-parts/part-block', 'blog-posts');
	// get_template_part('template-parts/part-block', 'blog-posts-variant-1');
}
add_action('child_hook_front_page_blocks', 'child_block_blog_posts', 2);


/**
 * Featured in/As Seen in carousel
 * This block would show logos from media companies where the client's business was
 * featured in a report or article
 * 
 * @since 1.0.2
 */
function child_block_featured_in() { 
	get_template_part('template-parts/part-block', 'featured-in');
}
add_action('child_hook_front_page_blocks', 'child_block_featured_in', 3);


/**
 * Testimonials carousel
 * This block displays testimonials in a slider
 * 
 * @since 1.0.3
 */
function child_block_testimonials() { 
	get_template_part('template-parts/part-block', 'testimonials');
}
add_action('child_hook_front_page_blocks', 'child_block_testimonials', 3);


?>