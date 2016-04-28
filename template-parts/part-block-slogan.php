<?php
/**
 * Display Slogan
 *
 * This block shows a block of text, by default in a <h2>, and is generally used
 * to show a company slogan, often below a hero image in some designs
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.9
 */


// get the options
$show = get_inti_option('fpb_slogan_show', 'inti_customizer_options', 1);
$slogan = get_inti_option('fpb_slogan', 'inti_customizer_options');
?>

<?php if ($show) : ?>	

	<section class="block personal-bio">	

		<div class="row">
			<div class="column">
				<h2><?php echo $slogan; ?></h2>
			</div>
		</div>

	</section>

<?php endif; ?>