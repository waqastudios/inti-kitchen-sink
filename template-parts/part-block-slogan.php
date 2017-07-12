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
$slogan = get_inti_option('fpb_slogan', 'inti_customizer_options', 'Inti Foundation - Kitchen Sink child theme');
?>

<?php if ($show) : ?>	

	<section class="block slogan">	

		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="small-12 cell">
					<h2><?php echo $slogan; ?></h2>
				</div>
			</div>
		</div>

	</section>

<?php endif; ?>