(function($) {

	$('body').on('change', '#shortcode-picker', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-testimonials' ) {
			$('#yourshortcode').text('[testimonials catid=""]');
		}
	});
	$('body').on('click', '#shortcode-insert', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-testimonials' ) {
				var catid     = $('#testimonials-catid').val(),
					align     = $('#testimonials-align').val(),
					order     = $('#testimonials-order').val();

				var shortcode = '[testimonials catid="' + catid + '"';

				if (align != 'left') {
					shortcode += ' align="' + align + '"';
				} 

				if (order != 'ASC') {
					shortcode += ' order="' + order + '"';
				} 

				shortcode += ']';

				tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcode);
				tb_remove();
		}
	});

})(jQuery);