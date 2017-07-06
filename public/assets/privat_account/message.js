$( document ).ready(function() {
	$('.min_msg_cont').on('click',function(){
		$('.received_message').attr('style','display:block;');
		if ($('body').width() < 991) {
			$('.message_list').attr('style','display:none;')	
		}
		

})

    $('.message_list').perfectScrollbar();
})