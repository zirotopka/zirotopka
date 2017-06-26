$( document ).ready(function() {
	$('.send').on('click',function(){
		$('.new_message').attr('style','display:block;')
		$('.received_message').attr('style','display:none;')
		$('.sended_message').attr('style','display:none;')
		$('.i-o_message').attr('style','display:none;')
	});

	$('.input').on('click',function(){
		$('.new_message').attr('style','display:none;')
		$('.received_message').attr('style','display:block;')
		$('.sended_message').attr('style','display:none;')	
		$('.i-o_message').attr('style','display:block;')
		$('.sended').text('ВХОДЯЩИЕ')
	});

	$('.output').on('click',function(){
		$('.new_message').attr('style','display:none;')
		$('.received_message').attr('style','display:none;')
		$('.sended_message').attr('style','display:block;')	
		$('.i-o_message').attr('style','display:block;')
		$('.sended').text('ОТПРАВЛЕННЫЕ')
	});
})