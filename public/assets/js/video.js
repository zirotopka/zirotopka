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

          			video.className = 'vjs-matrix video-js ';
          			video.id = 'exercive';
          			video.controls = 'controlls';
                video.width = '1000';
                video.height = '560';
          			source.src = src;
          			source.type = 'video/ogg';


          			video.appendChild( source );

          			video_container.html( video );

                video_modal_form.modal('show');
                videojs('exercive');

                video.play();

            } else {
                alert('Видео не может быть загружено. Обратитесь в тех. поддержку.')
            }

        }
    });
   });
  $("#video-modal").on('hide.bs.modal', function () {
      var video = document.getElementsByTagName('video');
      for (var i = 0; i < video.length; i++) {
        video[i].load();
      }
    });
});