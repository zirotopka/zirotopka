$( document ).ready(function() {
	//Отправляем новое сообщение
	$('body').on('click','#send_new_message', function() {
		var data = $('#new_message_form').serialize();

		jQuery.ajax({
		    type: "POST",
		    url: '/api/message',
		    data: data,
		    dataType: 'json',
		    success: function (result) {
				if (result['code'] == 200) {
					 swal({
					   title: 'Auto close alert!',
					   text: 'I will close in 2 seconds.',
					   timer: 2000
					 }).then(
					   function () {},
							handling the promise rejection
					   function (dismiss) {
					     if (dismiss === 'timer') {
					       console.log('I was closed by the timer')
					     }
					   }
					 )
				} else {

				}
	    	},
	    	error: function(data) {

            } 
	  	});
	});

	//Получаем данные по сообщению
	$('body').on('click','.show-message', function() {
		var data_id = $(this).data('id'),
			data_type = $(this).data('type');

		jQuery.ajax({
		    type: "GET",
		    url: '/message/'+ data_id,
		    data: {type:data_type},
		    success: function (result) {
		    	console.log(result);
				if (result['response'] == 200) {
					$('#show-message-container').html(result['data']);
				} else {

				}
	    	},
	    	error: function(data) {

            } 
	  	});
	});
})

