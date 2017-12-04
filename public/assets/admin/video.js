$( document ).ready(function() {

	 $('body').on('click','.task_video',function() {
	    var video_modal_form = $('#video-modal'),
	        thisContainer = jQuery(this),
	 			  file_url = thisContainer.data('file');

	 	var video = videojs("training-video");
	      video.src(file_url);
	      video_modal_form.modal('show');
	      video.load();
	      video.play();

	  });
	  $("#video-modal").on('hide.bs.modal', function () {
	      var video = document.getElementsByTagName('video');
	      for (var i = 0; i < video.length; i++) {
	        video[i].load();
	      }
	  });
});  
