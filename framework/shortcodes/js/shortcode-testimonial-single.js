(function($) {

	$('#shortcode-picker').live('change', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-testimonial-single' ) {
			$('#yourshortcode').text('[testimonial-single id=""]');
		}
	});
	$('#shortcode-insert').live('click', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-testimonial-single' ) {
				var id     = $('#testimonial-single-id').val(),
					align     = $('#testimonial-single-align').val();

				var shortcode = '[testimonial-single id="' + id + '"';

				if (align != 'left') {
					shortcode += ' align="' + align + '"';
				}

				shortcode += ']';

				tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcode);
				tb_remove();
		}
	});

})(jQuery);