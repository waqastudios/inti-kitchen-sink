<?php
/**
 * Display Video
 *
 * Shows a video with or without a title. Useful for a sales pitch or introduction
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.4
 */


// get the options
$show = get_inti_option('fpb_video_show', 'inti_customizer_options', 1);
$title = get_inti_option('fpb_video_title', 'inti_customizer_options');
$aspect = get_inti_option('fpb_video_aspect', 'inti_customizer_options', 'widescreen');
$source = get_inti_option('fpb_video_source', 'inti_customizer_options', 'YouTube');
$code = get_inti_option('fpb_video_code', 'inti_customizer_options');
$button_text = get_inti_option('fpb_video_button_text', 'inti_customizer_options');
$button_link = get_inti_option('fpb_video_button_link', 'inti_customizer_options');

if ($show) :
?>

	<section class="block video">	
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
			<div class="column">
				
				<article>
					<?php if ($code) : ?>
					<div class="flex-video <?php echo $aspect; ?>">

					<?php 
						switch ($source) {
							case 'YouTube':
								?> 
									<iframe src="http://www.youtube.com/embed/<?php echo $code; ?>?wmode=opaque&showsearch=0&rel=0&modestbranding=1&showinfo=0&controls=2" frameborder="0"></iframe>
								<?php
								break;
							case 'Vimeo':
								?> 
									<iframe src="http://player.vimeo.com/video/<?php echo $code; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ff0179" width="300" height="169" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
								<?php
								break;
							case 'Wistia':
								?> 
									<iframe src="http://fast.wistia.net/embed/iframe/<?php echo $code; ?>?plugin%5Bsocialbar-v1%5D%5Bon%5D=false" frameborder="0" allowtransparency="true" allowfullscreen scrolling="no"></iframe>
								<?php
								break;
						}
					 ?>
					</div>
					<?php endif; ?>
					<?php if ($button_text) : ?>
					<a href="<?php echo $button_link; ?>" class="button"><?php echo $button_text; ?></a>
					<?php endif; ?>
				</article>

			</div>
		</div>
	</section>
<?php 
endif;
?>