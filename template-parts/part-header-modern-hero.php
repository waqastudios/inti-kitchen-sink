<?php inti_hook_site_header_before(); ?>

<?php 
	$hero_bg = get_inti_option('header_hero_bg', 'inti_customizer_options', false);
?>
<div id="site-header-modern-hero" class="site-header modern-hero"<?php if ( $hero_bg ) echo ' style="background-image: url('. $hero_bg .');"'; ?>>

	<?php inti_hook_site_banner_before(); ?>
	
	<div id="site-banner-sticky-container" class="sticky-container" data-sticky-container>
		<div class="sticky" data-sticky data-sticky-on="small" data-margin-top="0">	


			<div class="site-banner" role="banner">
				<div class="grid-x">
					
					<div class="mlarge-4 large-3 cell show-for-mlarge">
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
						<div class="title-area" >
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<p class="site-description"><?php bloginfo('description'); ?></p>
						</div>
						<div class="">
							<?php inti_hook_site_banner_title_area_after(); ?>
						</div>
					</div><!-- .cell -->
					<div class="mlarge-8 large-9 cell" >
						<?php if ( has_nav_menu('dropdown-menu') ) : ?>
							<nav class="top-bar" id="top-bar-menu">
								
								<?php

								/**
								* Add logo or site title to the navigation bar, in addition or instead of having the site banner
								*/
								$mobile_logo = get_inti_option('show_nav_logo_title', 'inti_customizer_options', 'none');

								if ($mobile_logo != 'none') : ?>
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

								<?php 
								endif; ?>

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

							</nav>
						<?php endif; ?>
					</div>

				</div>
			</div><!-- .site-banner -->	
		</div>
	</div>

<?php if ( is_front_page() ) : ?>
	<div class="site-hero frontpage">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="mlarge-6 cell">
					<div class="hero-area">
						<h1><?php _e('Example text', 'inti-child'); ?></h1>
						<p><?php _e('Could be made editable in customizer', 'inti-child'); ?></p>
						<p><a href="#" class="button"><?php _e('More Info', 'inti-child'); ?></a></p>
					</div>
				</div>
				<div class="mlarge-6 cell">
					<div class="callout">
						<h5><?php _e('Replace this with something important', 'inti-child'); ?></h5>
						<p><?php _e('Perhaps an image of a product or an opt-in.', 'inti-child'); ?></p>
						<?php if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) : 
							// get_template_part('template-parts/part-opt-in', 'header');
						endif; ?>
					</div>
				</div>
			</div><!-- .grid-x . grid-padding-x -->
		</div><!-- .grid-container -->
	</div>
<?php elseif ( is_page() ) : ?>
	<div class="site-hero page">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="mlarge-6 cell">
					<h1><?php _e('Example text', 'inti-child'); ?></h1>
				</div>
				<div class="mlarge-6 cell">
					
				</div>
			</div><!-- .grid-x . grid-padding-x -->
		</div><!-- .grid-container -->
	</div>
<?php elseif ( is_home() || is_archive() || is_single() ) : ?>
	<div class="site-hero post archive">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="mlarge-6 cell">
					<h1><?php _e('Example text', 'inti-child'); ?></h1>
				</div>
				<div class="mlarge-6 cell">
					
				</div>
			</div><!-- .grid-x . grid-padding-x -->
		</div><!-- .grid-container -->
	</div>
<?php elseif ( 'inti-example-post-type' == get_post_type() || is_post_type_archive('inti-example-post-type') ) : ?>
	<div class="site-hero inti-example-post-type inti-example-taxonomy">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="mlarge-6 cell">
					<h1><?php _e('Example text', 'inti-child'); ?></h1>
				</div>
				<div class="mlarge-6 cell">
					
				</div>
			</div><!-- .grid-x . grid-padding-x -->
		</div><!-- .grid-container -->
	</div>
<?php endif; ?>

	<?php inti_hook_site_banner_after(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

</div>

<?php inti_hook_site_header_after(); ?>