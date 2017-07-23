var attachment_count = 0,
	image_mime = ['image/jpeg','image/pjpeg','image/png'],
	video_mime = ['video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv'];

$( document ).ready(function() {
	update_training_height();

	$( window ).resize(function() {
		update_training_height();
	});

	$('body').on('click','#send-proof-file',function(){
		var reports = jQuery('.otchet'),
			programm_stages = {};

		jQuery.each(reports, function(index, report){
			var attachment_files = jQuery(report).find('input.attachment-file'),
				data_programm_stage = jQuery(report).data('programm-stage'),
				attachment_files_arr = [],
				url;

			if (attachment_files.length > 0) {
				jQuery.each(attachment_files, function(index, file){
					url = jQuery(file).val();
					attachment_files_arr.push(url);
				});

				programm_stages[data_programm_stage] = attachment_files_arr;
			}
		});

		swal({
            title: "Загрузка тренировки!",
            text: "Ожидайте. Это может занять некоторое время",
            imageUrl: "/ico/spinner.gif",
            imageWidth: '50',
            imageHeight: '50',
            showConfirmButton: false
        });

        $.ajax({
	        url: '/api/private_office/store_training',
	        type: 'POST',
	        data: {programm_stages: JSON.stringify(programm_stages)},
	        success: function(result) {
	        	console.log(result);
	        	if (result['code'] == 200) {
					 swal({
					   title: 'Файлы по тренировке успешно отправлены!',
					   showCloseButton: true,
					   showConfirmButton: false,
					 }).then(
					   function () {
					    }, function (dismiss) {
					    	seal.close();
					 	}
					 )
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
	});

	$('body').on('change','.add_file', function() {
		var file = this.files[0],
			report = jQuery(this).closest('.otchet').eq(0),
			attachment_container = report.find('.attachment-container').eq(0);

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
		    formData.append( 'destinationPath', '/trainings/' );

		    $.ajax({
		        url: '/api/file/store_attachment',
		        type: 'POST',
		        data: formData,
		        cache: false,
		        processData: false, 
		        contentType: false, 
		        success: function(result) {
		        	if (result['code'] == 200) {
		        		attachment_container.attr('style','border-right: 0.1em solid #C5C5C5;border-left: 0.1em solid #C5C5C5;border-bottom: 0.1em solid #C5C5C5;')
							var attachment_html = '';
						if (result['file_type']= 2) {	
							attachment_html += '<div class="attachment-item" >'; 
							attachment_html += '<img class="attachment-img" id="attachment-img" src="' + result['preview'] + '">';
							attachment_html += '<label for="attachment-img>" class="attachment-img-mask"><i class="fa fa-window-close" aria-hidden="true"></i></label>';
							attachment_html += '<input type="hidden" class="attachment-file" name="attachment[' + attachment_count + ']" value="' + result['file_url'] + '">'; 
							attachment_html += '<span class="attachment-span">' + result['file_name'] + '</span>'; 
							attachment_html += '</div>'; 
						} else if (result['file_type'] = 3) {
							attachment_html += '<div class="attachment-item" >'; 
							attachment_html += '<img class="attachment-img" src="/ico/video-default.png">';
							attachment_html += '<label for="attachment-img>" class="attachment-img-mask"><i class="fa fa-window-close" aria-hidden="true"></i></label>';
							attachment_html += '<input type="hidden" class="attachment-file" name="attachment[' + attachment_count + ']" value="' + result['file_url'] + '">'; 
							attachment_html += '<span class="attachment-span">' + result['file_name'] + '</span>'; 
							attachment_html += '</div>';
						}
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
});

function update_training_height() {
	if ($('body').width() > 766){
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
}
