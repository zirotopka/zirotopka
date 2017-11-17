$('document').ready(function(){
	$('.item-question').on('click', function(){
		var $holder = $(this).parents('.block-list-questions'),
			itemType = $(this).attr('data-type');

        $('.block-list-questions').hide();

        $holder.show();
        $holder.find('.answ:nht-child('+itemType+')').show();
	});
})