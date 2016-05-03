<?php
/**
 * Display Google Map
 *
 * This block takes a Google Maps embed src and displays it on the front
 * page. 
 *
 * @package Inti
 * @subpackage blocks
 * @since 1.0.9
 */


// get the options
$show = get_inti_option('fpb_gmap_show', 'inti_customizer_options', 1);
$src = get_inti_option('fpb_gmap_source', 'inti_customizer_options', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12090.470159428245!2d-73.9856644!3d40.7484405!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd134e199a405a163!2sEmpire+State+Building!5e0!3m2!1sen!2spe!4v1462314250678');
 
if ($show) :
?>

	<section class="block gmap">	
		<iframe src="<?php echo $src; ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>

<? endif; ?>