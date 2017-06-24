<?php inti_hook_site_header_before(); ?>

<div id="site-header" class="site-header business-hero">

	<?php inti_hook_site_banner_before(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div class="site-banner<?php if ( !get_inti_option('show_site_banner_mobile', 'inti_customizer_options') ) echo " show-for-mlarge"; ?>" role="banner">
		<div class="row">
			<div class="mlarge-4 large-3 columns">
				<?php inti_hook_site_banner_site_logo_before(); ?>
				<?php  
				/**
				* Add logo or site title to the site-banner, hidden in on smaller screens where another logo is shown on top-bar
				*/
				$logo = get_inti_option('logo_image', 'inti_customizer_options');

				if ( $logo ) : ?>
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
					<div class="row medium-up-1 mlarge-up-3">
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
	<?php if ( has_nav_menu('dropdown-menu') ) : ?>
		<div id="site-banner-sticky-container" class="sticky-container" data-sticky-container>
			<div class="sticky" data-sticky data-sticky-on="small" data-top-anchor="primary" data-margin-top="0">	
				<nav class="top-bar" id="top-bar-menu">
					<div class="row">

					<?php

					/**
					* Add logo or site title to the navigation bar
					* i. if one is set for the 'mobile nav' in customizer
					* ii. if a different one is to be shown on the nav bar if it's currently sticky
					*/
					$mobile_logo = get_inti_option('show_nav_logo_title', 'inti_customizer_options', 'none');
					$sticky_logo = get_inti_option('show_sticky_logo_title', 'inti_customizer_options', 'none');

					// logo in nav on small screens
					if ('none' != $mobile_logo) : ?>
						<div class="top-bar-left hide-for-mlarge mobile-logo">
							<div class="site-logo">
								<?php if ( get_inti_option('nav_logo_image', 'inti_customizer_options') ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php inti_do_srcset_image(get_inti_option('nav_logo_image', 'inti_customizer_options'), esc_attr( get_bloginfo('name', 'display') . ' logo')); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="site-title"><?php bloginfo('name'); ?></div>
						</div>

					<?php endif; 

					// logo on nav when sticky (needs CSS _navigation.scss)
					if ('none' != $sticky_logo) : ?>
						<div class="top-bar-left show-for-mlarge sticky-logo animated fadeInLeft">
							<div class="site-logo">
								<?php if ( get_inti_option('nav_logo_image', 'inti_customizer_options') ) : ?>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php inti_do_srcset_image(get_inti_option('nav_logo_image', 'inti_customizer_options'), esc_attr( get_bloginfo('name', 'display') . ' logo')); ?>
									</a>
								<?php endif; ?>
							</div>
							<div class="site-title"><?php bloginfo('name'); ?></div>
						</div>

					<?php endif; ?>



						<div class="top-bar-right show-for-mlarge main-dropdown-menu">
							<?php echo inti_get_dropdown_menu(); ?>
							<?php 
							$showsocial = get_inti_option('nav_social', 'inti_headernav_options');
							if ($showsocial) echo inti_get_dropdown_social_links();  ?>
						</div>
						<div class="top-bar-right hide-for-mlarge">
							<div class="off-canvas-button">
								<a data-toggle="inti-off-canvas-menu">
									<div class="hamburger">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</a>
							</div>
						</div>

					</div>
				</nav>
			</div>
		</div>
	<?php endif; ?>

	<?php 
		$hero_bg = get_inti_option('header_hero_bg', 'inti_customizer_options', false);
	?>
<?php if ( is_front_page() ) : ?>
	<div class="site-hero frontpage"<?php if ( $hero_bg ) echo ' style="background-image: url('. $hero_bg .');"'; ?>>
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
					<p><?php _e('Perhaps an image of a product or an opt-in.', 'inti-child'); ?></p>
					<?php if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) : 
						// get_template_part('template-parts/part-opt-in', 'header');
					endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php elseif ( is_page() ) : ?>
	<div class="site-hero page"<?php if ( $hero_bg ) echo ' style="background-image: url('. $hero_bg .');"'; ?>>
		<div class="row">
			<div class="mlarge-6 columns">
				<h1><?php _e('Example text', 'inti-child'); ?></h1>
			</div>
			<div class="mlarge-6 columns">
				
			</div>
		</div>
	</div>
<?php elseif ( is_home() || is_archive() || is_single() ) : ?>
	<div class="site-hero post archive"<?php if ( $hero_bg ) echo ' style="background-image: url('. $hero_bg .');"'; ?>>
		<div class="row">
			<div class="mlarge-6 columns">
				<h1><?php _e('Example text', 'inti-child'); ?></h1>
			</div>
			<div class="mlarge-6 columns">
				
			</div>
		</div>
	</div>
<?php elseif ( 'inti-example-post-type' == get_post_type() || is_post_type_archive('inti-example-post-type') ) : ?>
	<div class="site-hero inti-example-post-type inti-example-taxonomy"<?php if ( $hero_bg ) echo ' style="background-image: url('. $hero_bg .');"'; ?>>
		<div class="row">
			<div class="mlarge-6 columns">
				<h1><?php _e('Example text', 'inti-child'); ?></h1>
			</div>
			<div class="mlarge-6 columns">
				
			</div>
		</div>
	</div>
<?php endif; ?>
</div>

<?php inti_hook_site_header_after(); ?>