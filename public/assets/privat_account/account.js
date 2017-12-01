var image_mime = ['image/jpeg','image/pjpeg','image/png'],
	video_mime = ['video/mpeg,video/mp4,video/3gpp,video/3gpp2,video/x-flv,video/x-ms-wmv'];

$( document ).ready(function() {
	update_training_height();
	update_feed_heigth();

	checkIsFiles();

	$('body').on('click','.fa-window-close',function(){
		var otchet = $(this).closest('.otchet').eq(0),
			otch_hover = otchet.find('.otch_hover').eq(0);

		$(this).closest('.attachment-item').remove();

		//Прячем кнопку
		if (otch_hover.hasClass('hidden')) {
			otch_hover.removeClass('hidden');
		}

		checkIsFiles();
	});

	$( window ).resize(function() {
		update_training_height();
		update_feed_heigth();
	});

	$('body').on('click','#send-proof-file',function(){
		var sendBtn = jQuery(this);

		if (!sendBtn.hasClass('send-proof-file_act')) {
			swal({
			   title: 'Внимание!',
			   text: 'Выполните все упражнения',
			   showCloseButton: true,
			   showConfirmButton: false,
			})

			return true;
		}

		swal({
            title: 'Внимание!',
            text: 'Вы готовы отправить отчет?',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "rgb(15,157,88)",
            confirmButtonText: "Ок",
            cancelButtonText: "Нет",
            closeOnConfirm: true,
            closeOnCancel: true
        }).then(
		   function () {
		   	   sendReport();
		    }, function (dismiss) {

		 	}
		 )
	});

	$('body').on('change','.add_file', function() {
		var file = this.files[0],
			otch_hover = jQuery(this).closest('.otch_hover').eq(0),
			report = jQuery(this).closest('.otchet').eq(0),
			attachment_container = report.find('.attachment-container').eq(0),
			attachment_items = attachment_container.find('.attachment-item');

		if (attachment_items.length < 1) {
			swal({
				title: "Загрузка файла!",
	            text: "Ожидайте. Это может занять некоторое время",
	            imageUrl: "/ico/spinner.gif",
	            imageWidth: '50',
	            imageHeight: '50',
	            showConfirmButton: false
	        });

			var formData = new FormData(),
				slug = jQuery('#current_slug').val();

			formData.append( 'file', file );
		    formData.append( 'destinationPath', '/trainings/' + slug + '/' );

		    $.ajax({
		        url: '/api/file/store_attachment',
		        type: 'POST',
		        data: formData,
		        cache: false,
		        processData: false, 
		        contentType: false, 
		        success: function(result) {
		        	if (result['code'] == 200) {
						var attachment_html = '';

						attachment_html += '<div class="attachment-item attachment_block" >'; 

						if (result['file_type']= 2) {	
							attachment_html += '<img class="attachment-img" id="attachment-img" src="' + result['preview'] + '">';
						} else if (result['file_type'] = 3) {
							attachment_html += '<img class="attachment-img" src="/ico/video-default.png">';

						}
						
						attachment_html += '<label for="attachment-img>" class="attachment-img-mask"><i class="fa fa-window-close" aria-hidden="true"></i></label>';
						attachment_html += '<input type="hidden" class="attachment-file" name="attachment[' + uniqid() + ']" value="' + result['file_url'] + '">'; 
						attachment_html += '<span class="attachment-span">' + result['file_name'] + '</span>'; 
						attachment_html += '</div>';

						attachment_container.append(attachment_html);

						//Прячем кнопку
						if (!otch_hover.hasClass('hidden')) {
							otch_hover.addClass('hidden');
						}

						//Показываем отправку
						checkIsFiles();
						
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
					   text: 'Превышен допустимый размер файла (100 Мб)',
					   showCloseButton: true,
					   showConfirmButton: false,
					})
		        }
		    });
		} else {
			swal({ 
        		title: 'Внимание!', 
	        	text: 'Загружено максимальное кол-во файлов', 
	        	showCloseButton: true, 
	        	showConfirmButton: false, 
	       });
		}
	});
});

function sendReport() {
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
				   title: 'Спасибо!',
				   text: result['text'],
				   showCloseButton: true,
				   showConfirmButton: true,
				   confirmButtonText: 'Oк',
				   confirmButtonColor: '#ff8a18',
				 }).then(
				   function () {
				   	    window.location.href = '/';
				    }, function (dismiss) {
				    	window.location.href = '/';
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
}

function checkIsFiles() {
	var reports = jQuery('.otchet'),
		sendBtn = jQuery('#send-proof-file'),
		handler = 1;

	jQuery.each(reports, function(index, report){
		var attachment_files = jQuery(report).find('input.attachment-file');

		if (attachment_files.length <= 0) {
			handler = 0;
		}
	});

	if (handler) {
		if (!sendBtn.hasClass('send-proof-file_act')) {
			sendBtn.addClass('send-proof-file_act');
		}
	} else {
		if (sendBtn.hasClass('send-proof-file_act')) {
			sendBtn.removeClass('send-proof-file_act');
		}
	}

	return true;
}

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

function update_feed_heigth(){
	if ($('body').width() > 766){
		var feeds = $('.fd_dscr_blk'), 
			max_height = 0,
			height = 0;

		$.each(feeds, function( index, value ) {
			height = $(value).outerHeight();

			if ( height > max_height ) {
				max_height = height;
			}
		})	

		$.each(feeds, function( index, value ) {
			$(value).outerHeight( max_height );
		});
	}
}

function uniqid (pr = '', en = '') {
    var pr = pr || '', en = en || false, result, us;

    this.seed = function (s, w) {
        s = parseInt(s, 10).toString(16);
        return w < s.length ? s.slice(s.length - w) : 
                  (w > s.length) ? new Array(1 + (w - s.length)).join('0') + s : s;
    };

    result = pr + this.seed(parseInt(new Date().getTime() / 1000, 10), 8) 
                + this.seed(Math.floor(Math.random() * 0x75bcd15) + 1, 5);

    if (en) result += (Math.random() * 10).toFixed(8).toString();

    return result;
};
