$( document ).ready(function() {
	$('.send').on('click',function(){
		$('.new_message').attr('style','display:block;');
		$('.message_list').attr('style','display:none;');
		$('.received_message').attr('style','none;');
		$('.back').attr('style','display:none;');
		$('.sended').text('ВХОДЯЩИЕ');
	});
	$('.input').on('click',function(){
		$('.new_message').attr('style','display:none;');
		$('.message_list').attr('style','display:block;');
		$('.received_message').attr('style','none;');
		$('.back').attr('style','display:block;');
		$('.sended').text('ВХОДЯЩИЕ');
	});

	$('.output').on('click',function(){		
		$('.new_message').attr('style','display:none;');
		$('.message_list').attr('style','display:block;');
		$('.received_message').attr('style','none;');
		$('.back').attr('style','display:block;');
		$('.sended').text('ОТПРАВЛЕННЫЕ');
	});


	$('.min_msg_cont').on('click',function(){
		$('.received_message').attr('style','display:block;');
		if ($('body').width() < 991) {
			$('.message_list').attr('style','display:none;')	
		}
		

	})



    $('.message_list').perfectScrollbar();
})