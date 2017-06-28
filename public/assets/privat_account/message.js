$( document ).ready(function() {
	$('.back').on('click',function(){
		$('.new_message').attr('style','display:block;');
		$('.received_message').attr('style','display:none;');
		$('.sended_message').attr('style','display:none;');
		$('.message_list').attr('style','display:none;');
		$('.back').attr('style','display:none;');
	});

	$('.input').on('click',function(){
		$('.new_message').attr('style','display:none;');
		$('.message_list').attr('style','display:block;');
		$('.back').attr('style','display:block;');
		$('.sended').text('ВХОДЯЩИЕ');
	});

	$('.output').on('click',function(){
		$('.new_message').attr('style','display:none;');
		$('.message_list').attr('style','display:block;');
		$('.back').attr('style','display:block;');
		$('.sended').text('ОТПРАВЛЕННЫЕ');
	});

	$('.min_msg_cont').on('click',function(){
		$('.received_message').attr('style','display:block;');
	})

    $('.message_list').perfectScrollbar();
})