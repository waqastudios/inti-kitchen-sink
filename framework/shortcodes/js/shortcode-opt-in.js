(function($) {

	$('#shortcode-picker').live('change', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-opt-in' ) {
			$('#yourshortcode').text('[opt-in id=""]');
		}
	});
	$('#shortcode-insert').live('click', function() {
		var $currentShortcode = $('#shortcode-picker').val();
		if( $currentShortcode === 'inti-opt-in' ) {
				var id     = $('#opt-in-id').val();

				var shortcode = '[opt-in id="' + id + '"]';
				tinyMCE.activeEditor.execCommand('mceInsertContent', false, shortcode);
				tb_remove();
		}
	});

})(jQuery);