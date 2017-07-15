$( document ).ready(function() {
// 	$('body').on('click','.overlay',function(){
// 		var this_btn = $(this),
// 			id = this_btn.data('id'),
// 			video_id = 'video_' + id,
// 			video = document.getElementById(video_id);

// 		play(this_btn, video);
// 	}) 

  $('body').on('click','.video_holder',function() {
    var video_modal_form = $('#video-modal'),
        thisContainer = jQuery(this),
 			  exercive_id = thisContainer.data('id');

 		jQuery.ajax({
      type: "post",
      url: '/privat_office/get_exercive_video',
      data: {exercive_id: exercive_id},
      success: function (data) {
        if (data['response'] == 200) {
          
          var video = videojs("training-video");
          video.src(data['data']);
          //video.load();
          //video.play();

          video_modal_form.modal('show');
//              videojs('exercive');
          video.load();
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