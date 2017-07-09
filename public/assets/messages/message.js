var attachment_count = 0,
	image_mime = ['image/jpeg','image/pjpeg','image/png'],
	video_mime = ['video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv'];

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
					   title: 'Ваше сообщение отправлено!',
					   text: 'Тренер вскоре ответит вам',
					   showCloseButton: true,
					   showConfirmButton: false,
					 }).then(
					   function () {
					    }, function (dismiss) {
					    	location.href = '/messages/1';
					 	}
					 )
				} else {
					swal({
					   title: 'Ошибка!',
					   text: result['text'],
					   showCloseButton: true,
					   showConfirmButton: false,
					 });
				}
	    	},
	    	error: function(data) {
	    		swal({
				   title: 'Ошибка!',
				   text: 'ОШИБКИ AJAX запроса: ' + textStatus,
				   showCloseButton: true,
				   showConfirmButton: false,
				})
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
	    		swal({
				   title: 'Ошибка!',
				   text: 'ОШИБКИ AJAX запроса: ' + textStatus,
				   showCloseButton: true,
				   showConfirmButton: false,
				})
            } 
	  	});
	});

	$('body').on('change','.add_file', function() {
		var file = this.files[0];

		if (file != undefined) {
			swal({
	            title: "Загрузка файла!",
	            text: "Ожидайте. Это может занять некоторое время",
	            imageUrl: "/ico/spinner.gif",
	            imageWidth: '50',
	            imageHeight: '50',
	            showConfirmButton: false
	        });

			var formData = new FormData();

			formData.append( 'file', file );
		    formData.append( 'destinationPath', '/messages/' );

		    $.ajax({
		        url: '/api/file/store_attachment',
		        type: 'POST',
		        data: formData,
		        cache: false,
		        processData: false, 
		        contentType: false, 
		        success: function(result) {
		        	if (result['code'] == 200) {
						var attachment_container = $('#attachment-container'),
							attachment_html = '';

						attachment_html += '<div class="attachment-item">'; 
						attachment_html += '<img class="attachment-img" src="' + result['preview'] + '">'; 
						attachment_html += '<input type="hidden" name="attachment[' + attachment_count + ']" value="' + result['file_url'] + '">'; 
						attachment_html += '<span class="attachment-span">' + result['file_name'] + '</span>'; 
						attachment_html += '</div>'; 

						attachment_container.append(attachment_html);

						attachment_count++;

						swal.close();
					} else {
						swal({
						   title: 'Ошибка!',
						   text: result['text'],
						   showCloseButton: true,
						   showConfirmButton: false,
						})
					}

		        },
		        error: function( jqXHR, textStatus, errorThrown ){
		        	swal({
					   title: 'Ошибка!',
					   text: 'ОШИБКИ AJAX запроса: ' + textStatus,
					   showCloseButton: true,
					   showConfirmButton: false,
					})
		        }
		    });
		}
	});
})

