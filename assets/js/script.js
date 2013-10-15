$(document).ready(function() {

	if ($.support.pjax) {
		// $(document).pjax('#content a', '#content'); // every 'a' within '#content' to be clicked will load the content in '#content'

		// $(document).on('submit', 'form', function(e) {
			// $.pjax.submit(e, '#content', {type: $(this).attr('method').toUpperCase() });
		// });
		
		// $('#content').on('pjax:end', init );
	}

});
