<?php
/**
 * A new loop in inti-kitchen-sink because the we use the functionality to display
 * the page content of the page set as front-page so often as a Front Page Block.
 * This loop loads a new post format for the 'page' FPB.
 *
 * @package Inti
 * @subpackage loops
 * @since 1.0.14
 */
?>



	<?php while ( have_posts() ) : the_post(); ?>

		<?php inti_hook_page_before(); ?>

		<?php // get page content
		get_template_part('post-formats/format', 'frontpage-page'); ?>

		<?php inti_hook_page_after(); ?>   
		
	<?php endwhile; // end of the loop ?>

	<?php if ( is_page_template() ) { rewind_posts(); } ?>
