<?php inti_hook_site_header_before(); ?>

<div id="site-header" class="site-header">

	<?php inti_hook_site_banner_before(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div class="site-banner modern-hero" role="banner">
		<div class="row">
			<div class="mlarge-4 large-3 columns <?php if ( !get_inti_option('show_site_banner_mobile', 'inti_customizer_options') ) echo " show-for-mlarge"; ?>">
				<?php inti_hook_site_banner_site_logo_before(); ?>
				<?php if ( get_inti_option('logo_image', 'inti_customizer_options') ) : ?>
				<div class="site-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php inti_do_srcset_image(get_inti_option('logo_image', 'inti_customizer_options'), esc_attr( get_bloginfo('name', 'display') . ' logo')); ?>
					</a>
				</div><!-- .site-logo -->
				<?php inti_hook_site_banner_site_logo_after(); ?>
				<?php inti_hook_site_banner_title_area_before(); ?>
				<?php endif; // end of logo ?>
				<div class="title-area">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<p class="site-description"><?php bloginfo('description'); ?></p>
				</div>
				<?php inti_hook_site_banner_title_area_after(); ?>
			</div><!-- .columns -->
			<div class="mlarge-8 large-9 columns">
				<?php child_hook_site_banner_auxiliary_column(); ?>
			</div>
		</div>
		<div class="site-hero modern-hero">
			<div class="row">
				<div class="mlarge-6 columns">
					<div class="hero-area">
						<h1>Example text</h1>
						<p>Could be made editable in customizer</p>
						<p><a href="#" class="button">More Info</a></p>
					</div>
				</div>
				<div class="mlarge-6 columns">
					<div class="callout">
						<h5>Replace this with something important</h5>
						<p>Perhaps an image of a product</p>
					</div>
				</div>
			</div>
		</div><!-- .site-hero -->
	</div><!-- .site-banner -->

	<?php inti_hook_site_banner_after(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

</div>

<?php inti_hook_site_header_after(); ?>


