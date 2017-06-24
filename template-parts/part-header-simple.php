<?php inti_hook_site_header_before(); ?>

<div id="site-header" class="site-header">

	<?php inti_hook_site_banner_before(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div id="site-banner" class="site-banner<?php if ( !get_inti_option('show_site_banner_mobile', 'inti_customizer_options') ) echo " show-for-mlarge"; ?>" role="banner">
		<div class="row">
			<div class="column">
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
				<?php endif; // end if logo ?>
				<?php inti_hook_site_banner_site_logo_after(); ?>
				<?php inti_hook_site_banner_title_area_before(); ?>
				<div class="title-area">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<p class="site-description"><?php bloginfo('description'); ?></p>
				</div>
				<?php inti_hook_site_banner_title_area_after(); ?>
			</div>
			
		</div><!-- .row -->
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

						<div class="top-bar-left show-for-mlarge main-dropdown-menu">
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

	<?php if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) : 
		get_template_part('template-parts/part-opt-in', 'header');
	endif; ?>

</div>

<?php inti_hook_site_header_after(); ?>