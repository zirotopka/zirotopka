$( document ).ready(function() {
	update_training_height();

	$( window ).resize(function() {
		update_training_height();
	});
});

function update_training_height() {
	var blocks = $('.prog-txt-container'),
		max_height = 0,
		height = 0;

	$.each(blocks, function( index, value ) {
		height = $(value).outerHeight();

		if ( height > max_height ) {
			max_height = height;
		}
	})	

	$.each(blocks, function( index, value ) {
		$(value).outerHeight( max_height );
	});
}