$(document).ready(function(){
    var mySwiper = new Swiper ('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      slidesPerView: 1,
	  centeredSlides: true,
      loop: true,
	  pagination: '.swiper-pagination',
	  paginationClickable: true,
 	  nextButton: '.swiper-button-next',
      prevButton: '.swiper-button-prev',
    });


  $('body').on('click','.ico_play1',function() {
      var video_modal_form = $('#video-modal'),
          thisContainer = jQuery(this),
          video = videojs("comment-video");
          video.src("/video/trainings/ROneStart/17_otzimaniya_ot_pola.mp4");
          video_modal_form.modal('show');
          video.load();
          video.play();
        
      });
    
  $('body').on('click','.ico_play2',function() {
      var video_modal_form = $('#video-modal'),
          thisContainer = jQuery(this),
          video = videojs("comment-video");
          video.src("/video/trainings/ROneStart/09_yagodichniy_most.mp4");
          video_modal_form.modal('show');
          video.load();
          video.play();
        
      });
    
  $('body').on('click','.ico_play3',function() {
    var video_modal_form = $('#video-modal'),
        thisContainer = jQuery(this),
        video = videojs("comment-video");
        video.src("/video/trainings/ROneStart/14_prised_vipad_nazad.mp4");
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

  
