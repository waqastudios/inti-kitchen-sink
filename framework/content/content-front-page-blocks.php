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
 * @since 1.0.0
 */
function child_block_front_page_loop() { ?>
	<section class="block front-page-loop">
		<?php get_template_part('loops/loop', 'frontpage'); ?>
	</section>
<?php
}
add_action('child_hook_front_page_blocks', 'child_block_front_page_loop', 2);


?>