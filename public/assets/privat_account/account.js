$( document ).ready(function() {
	update_training_height();

	$( window ).resize(function() {
		update_training_height();
	});

	$('.otchet').on('click',function(){
			$(this).find('.load').eq(0).attr('src','/ico/load_act.png');
			$(this).find('.load').eq(0).attr('style','width:3.1em');
	});
	$('.otchet').on('mouseover',function(){
			$(this).find('.load').eq(0).attr('src','/ico/load_hov.png');
			$(this).find('.load').eq(0).attr('style','width:3.1em');
	});
	$('.otchet').on('mouseout',function(){
			$(this).find('.load').eq(0).attr('src','/ico/load.png');
			$(this).find('.load').eq(0).attr('style','width:3em');
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
