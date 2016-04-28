<?php
/**
 * Display Personal Bio
 *
 * This block has just two options to display, a block of text and an accompanying image.
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.3
 */


// get the options
$show = get_inti_option('fpb_personal_bio_show', 'inti_customizer_options', 1);
$title = get_inti_option('fpb_personal_bio_title', 'inti_customizer_options');
$bio_text = get_inti_option('fpb_personal_bio', 'inti_customizer_options');
$bio_image = get_inti_option('fpb_personal_bio_image', 'inti_customizer_options');
$bio_link = get_inti_option('fpb_personal_bio_link', 'inti_customizer_options');
 
if ($show):
?>
	<section class="block personal-bio">	
	<?php if ($title) : ?>	
		<div class="row">
			<div class="column">
				<header class="block-header">
					<h3><?php echo $title; ?></h3>
				</header>
			</div>
		</div>
	<?php endif; ?>
		<div class="row">
			<div class="mlarge-8 columns">
				<?php echo $bio_text; ?>
			</div>
			<div class="mlarge-4 columns">
				<?php if ($bio_link): ?><a href="<?php echo $bio_link; ?>"><?php endif; ?>
				<img src="<?php echo $bio_image; ?>" alt="">
				<?php if ($bio_link): ?></a><?php endif ?>
			</div>
		</div>
	</section>

<?php endif; ?>