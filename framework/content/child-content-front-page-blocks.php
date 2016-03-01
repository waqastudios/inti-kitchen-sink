<?php
/**
 * Content - Front Page Blocks
 * Adds blocks (mostly from template-parts) to the front page template
 *
 * You can easily turn on and off the front page blocks in functions.php with:-
 * 	add_theme_support(
 *		'inti-front-page-blocks',
 *		array('page', 'posts', 'services', 'testimonials', 'brands', 'bio')
 *	);
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
function child_block_page_content() { 
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'page' )) {
	?>
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
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'posts' )) {
		get_template_part('template-parts/part-block', 'blog-posts');
		// get_template_part('template-parts/part-block', 'blog-posts-variant-1');
	}
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
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'brands' )) {
		get_template_part('template-parts/part-block', 'featured-in');
	}
}
add_action('child_hook_front_page_blocks', 'child_block_featured_in', 3);


/**
 * Testimonials carousel
 * This block displays testimonials in a slider
 * 
 * @since 1.0.3
 */
function child_block_testimonials() {
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'testimonials' )) {
		get_template_part('template-parts/part-block', 'testimonials');
	}
}
add_action('child_hook_front_page_blocks', 'child_block_testimonials', 4);


/**
 * Personal bio
 * This block displays a biography and photo, or similar
 * 
 * @since 1.0.3
 */
function child_block_personal_bio() { 
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'bio' )) {
		get_template_part('template-parts/part-block', 'personal-bio');
	}
}
add_action('child_hook_front_page_blocks', 'child_block_personal_bio', 5);


/**
 * Video
 * This block displays a video from a 3rd party site
 * 
 * @since 1.0.4
 */
function child_block_video() { 
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'bio' )) {
		get_template_part('template-parts/part-block', 'video');
	}
}
add_action('child_hook_front_page_blocks', 'child_block_video', 6);


/**
 * Services
 * This block displays services
 * 
 * @since 1.0.3
 */
function child_block_services() { 
	if (inti_current_theme_supports( 'inti-front-page-blocks', 'services' )) {
		get_template_part('template-parts/part-block', 'services');
		// get_template_part('template-parts/part-block', 'services-variant-1');
	}
}
add_action('child_hook_front_page_blocks', 'child_block_services', 7);



?>