<?php inti_hook_site_header_before(); ?>

<div id="site-header" class="site-header">

	<?php inti_hook_site_banner_before(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>

	<div class="slide-hero-container" data-sticky-container>
		<div class="sticky" data-sticky data-sticky-on="medium" data-anchor="0" data-margin-top="0">	

			<div class="site-banner slide-hero" role="banner">
				<div class="row">
					<div class="large-5 columns show-for-mlarge">
						<?php inti_hook_site_banner_site_logo_before(); ?>
						<?php if ( get_inti_option('logo_image', 'inti_customizer_options') ) : ?>
						<div class="site-logo desktop">
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
					<div class="large-7 columns">
						<?php if ( has_nav_menu('dropdown-menu') ) : ?>
							<nav class="top-bar" id="top-bar-menu">
								<div class="row">

								<?php

								/**
								* Add logo or site title to the navigation bar, in addition or instead of having the site banner
								*/
								$mobilebanner = get_inti_option('show_nav_logo_title', 'inti_customizer_options', 'none');

								if ($mobilebanner != 'none') : ?>
									<div class="top-bar-left hide-for-mlarge mobile-banner">
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
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .site-banner -->

		</div>
	</div>

	<?php if ( is_front_page() && inti_current_theme_supports('inti-post-types', 'slide') ): ?>
		<?php
			$slides = new WP_Query(array(
				'post_type' => 'inti-slide',
				'order' => 'ASC',
				'orderby' => 'menu_order',
				'posts_per_page' => -1
			)); 

		?>
		<header class="main-slider">
			<div class="row expanded">
				
					<?php if ($slides->have_posts()): ?>
						<div class="inti-main-slider clearfix">
						<?php while ( $slides->have_posts() ) : $slides->the_post(); global $post; ?>
							<?php if ( has_post_thumbnail($post->ID) ) : ?>
							<div class="slide" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) ); ?>);">
								<div class="row expanded">
									<?php //the_post_thumbnail( 'full', array( 'class'	=> 'full', 'alt' => get_the_title() ) ); ?>
									<div class="slide-entry">
										<div class="row unexpanded">
											<div class="column">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
									<div class="site-scroll">
										<a href="#primary" data-scroll data-options='{"offset":80}'>
											<i class="fa fa-angle-down"></i>
										</a>
									</div>
								</div>
							</div>

						<?php endif; ?>

						<?php endwhile; wp_reset_query(); ?>
						</div>
					<?php else : ?>
						<div class="inti-main-slider clearfix">
							<div class="slide">
								<div class="row">
									<div class="callout warning">
										<p><?php _e("You'll need to add some slides, friend.", 'inti-child') ?></p>
									</div>
									<div class="site-scroll">
										<a href="#primary" data-scroll data-options='{"offset":80}'>
											<i class="fa fa-angle-down"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="row">
									<div class="callout warning">
										<p><?php _e("I'm not your friend, buddy!", 'inti-child') ?></p>
									</div>
									<div class="site-scroll">
										<a href="#primary" data-scroll data-options='{"offset":80}'>
											<i class="fa fa-angle-down"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="slide">
								<div class="row">
									<div class="callout warning">
										<p><?php _e("Hey, relax guy!", 'inti-child') ?></p>
									</div>
									<div class="site-scroll">
										<a href="#primary" data-scroll data-options='{"offset":80}'>
											<i class="fa fa-angle-down"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

						
					<?php endif; ?>		
			</div>
		</header>
	<?php elseif ('inti-post-type-example' == get_post_type()) : ?>


	<?php elseif (is_page()) : ?>
		<header class="internal-banner" style="background-image: url('<?php echo the_post_thumbnail_url( 'full' ); ?>');">
			<div class="row expanded">
				<div class="column"></div>
			</div>
		</header>
	<?php else : ?>
		<header class="internal-banner small">
			<div class="row expanded">
				<div class="column"></div>
			</div>
		</header>
	<?php endif; ?>

	<?php inti_hook_site_banner_after(); // inti_do_main_dropwdown_menu() is placed above or below banner ?>


</div>

<?php inti_hook_site_header_after(); ?>

