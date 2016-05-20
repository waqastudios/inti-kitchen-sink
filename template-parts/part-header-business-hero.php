<?php inti_hook_site_header_before(); ?>

<div id="site-header" class="site-header">

	<?php inti_hook_site_banner_before(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div class="site-banner<?php if ( !get_inti_option('show_site_banner_mobile', 'inti_customizer_options') ) echo " show-for-mlarge"; ?> business-hero" role="banner">
		<div class="row">
			<div class="mlarge-4 large-3 columns">
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
				<div class="contact-area">
					<div class="row mlarge-up-1 large-up-3">
						<div class="column">
							<div class="contact-method phone">
								<div class="contact-icon"><i class="fa fa-phone"></i></div>
								<div class="contact-text">
									<p><strong><?php _e('Call now!', 'inti-child'); ?></strong></p>
									<p>1-800-123-4567</p>
								</div>
							</div>
						</div>
						<div class="column">
							<div class="contact-method physical">
								<div class="contact-icon"><i class="fa fa-home"></i></div>
								<div class="contact-text">
									<p><strong><?php _e('Visit us!', 'inti-child'); ?></strong></p>
									<p><?php _e('100 Your Address', 'inti-child'); ?></p>
								</div>
							</div>
						</div>
						<div class="column">
							<div class="contact-method email">
								<div class="contact-icon"><i class="fa fa-envelope"></i></div>
								<div class="contact-text">
									<p><strong><?php _e('Email Us', 'inti-child'); ?></strong></p>
									<p>you@youremail.local</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .site-banner -->

	<?php inti_hook_site_banner_after(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div class="site-hero business-hero">
		<div class="row">
			<div class="mlarge-6 columns">
				<div class="hero-area">
					<h1><?php _e('Example text', 'inti-child'); ?></h1>
					<p><?php _e('Could be made editable in customizer', 'inti-child'); ?></p>
					<p><a href="#" class="button"><?php _e('More Info', 'inti-child'); ?></a></p>
				</div>
			</div>
			<div class="mlarge-6 columns">
				<div class="callout">
					<h5><?php _e('Replace this with something important', 'inti-child'); ?></h5>
					<p><?php _e('Perhaps an image of a product', 'inti-child'); ?></p>
				</div>
			</div>
		</div>
	</div>

</div>

<?php inti_hook_site_header_after(); ?>

