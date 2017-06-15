$( document ).ready(function() {
// 	$('body').on('click','.overlay',function(){
// 		var this_btn = $(this),
// 			id = this_btn.data('id'),
// 			video_id = 'video_' + id,
// 			video = document.getElementById(video_id);

// 		play(this_btn, video);
// 	}) 

   $('body').on('click','.video_holder',function() {
   		var thisContainer = jQuery(this),
   			exercive_id = thisContainer.data('id');

   		jQuery.ajax({
            type: "post",
            url: '/privat_office/get_exercive_video',
            data: {exercive_id: exercive_id},
            success: function (data) {
                if (data['response'] == 200) {
                    var video = document.createElement('video'),
                    	source = document.createElement('source'),
                    	src = data['data'];
						video_container = $('#video-container'),
						video_modal_form = $('#video-modal');

					video_container.html('');

					video.className = 'video-descr';
					video.id = 'exercive';
					video.controls = 'controlls';

					source.src = src;
    				source.type = 'video/ogg';

    				video.appendChild( source );

					video_container.html( video );

                    video_modal_form.modal('show');

                    video.play();
                } else {
                    alert('Видео не может быть загружено. Обратитесь в тех. поддержку.')
                }
            }
        });
   })
});


	

