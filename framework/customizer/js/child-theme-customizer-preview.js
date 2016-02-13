/**
 * Theme Customizer javascript functions.
 *
 * Contains handlers to make the Customizer preview reload any changes asynchronously.
 *
 */

( function( $ ) {
	
    wp.customize('site_introduction', function(value) {
        value.bind(function(to) {
            $('#site-introduction-content .entry-content').html(to);
        });
    });

    wp.customize('inti_customizer_options[features_introduction]', function(value) {
        value.bind(function(to) {
            $('#feature-list h2').html(to);
        });
    });


} )( jQuery );