<?php
/**
 * The main template for a static front page
 *
 * @package Inti
 * @subpackage Templates
 * @since 1.0.0
 */

$default_layout = get_inti_option('page_layout', 'inti_customizer_options', '2c-l');
$meta_layout = get_inti_option('', '', '', '_inti_layout_radio');
$layout = inti_get_layout($default_layout, $meta_layout);

get_header(); ?>


	<div id="primary" class="site-content">
	
		<?php inti_hook_content_before(); ?>
	
		<?php child_hook_front_page_blocks() ?>
		
		<?php inti_hook_content_after(); ?>
		
	</div><!-- #primary -->


<?php get_footer(); ?>