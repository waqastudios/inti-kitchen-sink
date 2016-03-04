<?php
/**
 * Content - Child Headers
 * Adds alternate layouts for different page header styles 
 * (header includes hero banners, F6 top bar menu, logo etc)
 *
 * @package Inti
 * @since 1.0.4
 * @license GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 */

/**
 * 
 */
function child_remove_header_content_actions(){
    remove_action( 'inti_hook_site_banner_after', 'inti_do_main_dropdown_menu');
}
add_action( 'after_setup_theme', 'child_remove_header_content_actions', 0 );


/**
 * Add main menu before or after site banner
 * add or remove .row to control max width
 * 
 * @since 1.0.4
 */
function child_do_main_dropdown_menu() {
   //adds the main menu
	if ( has_nav_menu('dropdown-menu') ) {?>
		<nav class="top-bar" id="top-bar-menu">
			<div class="row">

			<?php 
				/**
				* Add logo or site title to the navigation bar, in addition or instead of having the site banner
				*/
				$mobilebanner = get_inti_option('show_nav_logo_title', 'inti_customizer_options', 'none');

				if ($mobilebanner != 'none') :
			?>
				<div class="top-bar-left float-left hide-for-mlarge mobile-banner">
					<ul class="menu">
						<li class="menu-text site-logo">
							<?php if ( get_inti_option('nav_logo_image', 'inti_customizer_options') ) : ?>
								<?php inti_do_srcset_image(get_inti_option('nav_logo_image', 'inti_customizer_options'), esc_attr( get_bloginfo('name', 'display') . ' logo')); ?>
							<?php endif; ?>
						</li>
						<li class="menu-text site-title"><?php bloginfo('name'); ?></li>
					</ul>
				</div>
			<?php endif; ?>
				<div class="top-bar-left show-for-mlarge main-dropdown-menu">
					<?php echo inti_get_dropdown_menu(); ?>
				</div>
				<div class="top-bar-right show-for-mlarge">
					<?php 
					$showsocial = get_inti_option('nav_social', 'inti_headernav_options');
					if ($showsocial) echo inti_get_dropdown_social_links();  ?>
				</div>
				<div class="top-bar-right float-right hide-for-mlarge">
					<ul class="menu">
						<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
						<li class="menu-text off-canvas-button"><a data-toggle="inti-off-canvas-menu">Menu</a></li>
					</ul>
				</div>
			</div>
		</nav>
	<?php
	}
}
add_action('inti_hook_site_banner_after', 'child_do_main_dropdown_menu');


/**
 * Add main menu before or after site banner
 * add or remove .row to control max width
 * 
 * @since 1.0.5
 */
function child_do_header_optin() {
	if (inti_current_theme_supports( 'inti-post-types', 'opt-in' )) : 
		get_template_part('template-parts/part-opt-in', 'header');
	endif;
}
add_action('inti_hook_site_banner_after', 'child_do_header_optin');
?>