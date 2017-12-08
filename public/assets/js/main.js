var _token = jQuery('meta[name="csrf-token"]').prop('content');

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
	$('#success_form').modal('show');
//	$('html').perfectScrollbar();
	$(".rg_btn").click(function() {
	    $('html,body').animate({
	        scrollTop: $("#section_2").offset().top},
	        800);
	});

	$('#choose_programe_form').modal('show');

	$('.selectpicker').on('changed.bs.select', function (e) {
		get_program();
	});
	
	$('.selectpicker').on('loaded.bs.select', function (e) {
		get_program();
	});

	$('#open_reg').on('click',function(){
		$('#login').modal('hide');
	})

	if ($('body').width() <=992) {
		var mySwiper = new Swiper ('.swiper-container', {
	      // Optional parameters
	      direction: 'horizontal',
		  centeredSlides: true,
		  pagination: '.swiper-pagination',
		  paginationClickable: true,
	 	  nextButton: '.swiper-button-next',
	      prevButton: '.swiper-button-prev',
	    });
	} else {
	    var mySwiper = new Swiper ('.swiper-container', {
	      // Optional parameters
	      direction: 'horizontal',
	      slidesPerView: 3,
		  centeredSlides: true,
	      loop: true,
		  pagination: '.swiper-pagination',
		  paginationClickable: true,
	 	  nextButton: '.swiper-button-next',
	      prevButton: '.swiper-button-prev',
	    });
	};
 
    $('.start_shader_gray').on('mouseenter',function(){
    	$('.start_shader').attr('style',"display:block;");
    	$('.prg1').attr('style',"display:none;");
    });
    $('.start_shader, .start_shader h4, .start_shader p').on('mouseleave',function(){
    	$(this).attr('style',"display:none;");
    	$('.prg1').attr('style',"display:block;");
    });

    $('.pro_shader_gray').on('mouseenter',function(){
    	$('.pro_shader').attr('style',"display:block;");
    	$('.prg2').attr('style',"display:none;");
    });
    $('.pro_shader, .pro_shader h4, .pro_shader p').on('mouseleave',function(){
    	$(this).attr('style',"display:none;");
    	$('.prg2').attr('style',"display:block;");
    });

    $('.pow_shader_gray').on('mouseenter',function(){
    	$('.pow_shader').attr('style',"display:block;");
    	$('.prg3').attr('style',"display:none;");
    });
    $('.pow_shader, .pow_shader h4, .pow_shader p').on('mouseleave',function(){
    	$(this).attr('style',"display:none;");
    	$('.prg3').attr('style',"display:block;");
    });

    $('.run_shader_gray').on('mouseenter',function(){
    	$('.run_shader').attr('style',"display:block;");
    	$('.prg4').attr('style',"display:none;");
    });
    $('.run_shader, .run_shader h4, .run_shader p').on('mouseleave',function(){
    	$(this).attr('style',"display:none;");
    	$('.prg4').attr('style',"display:block;");
    });

    $('.runp_shader_gray').on('mouseenter',function(){
    	$('.runp_shader').attr('style',"display:block;");
    	$('.prg5').attr('style',"display:none;");
    });
    $('.runp_shader, .runp_shader h4, .runp_shader p').on('mouseleave',function(){
    	$(this).attr('style',"display:none;");
    	$('.prg5').attr('style',"display:block;");
    });

$('body').on('click','.ico_play',function() {
    var video_modal_form = $('#video-modal'),
        thisContainer = jQuery(this),
 			  comment_id = thisContainer.data('id');

 		jQuery.ajax({
      type: "post",
      url: '/get_comment_video',
      data: {comment_id: comment_id},
      success: function (data) {
        if (data['response'] == 200) {
          
          var video = videojs("comment-video");
          video.src(data['data']);
          video_modal_form.modal('show');
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

function get_program() {
	var program_id = $('.selectpicker').val();

	if (program_id == undefined || program_id == 0) {
		program_id = 1;
	}
    
    jQuery.ajax({
	    type: "post",
	    url: '/program/get_program',
	    data: {id: program_id},
	    success: function (result) {
			$('#r_prgr_name').text(result['name']);
			$('#r_prgr_descr').text(result['description']);
			$('#r_prgr_price').text(result['cost']);
			$("#program_bnr").attr('src',result['logo']);
    	}  
  	});
}

Array.prototype.in_array = function(p_val) {
    for(var i = 0, l = this.length; i < l; i++)  {
        if(this[i] == p_val) {
            return true;
        }
    }

    return false;
}

function in_array(needle, haystack, strict) {	// Checks if a value exists in an array
	// 
	// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)

	var found = false, key, strict = !!strict;

	for (key in haystack) {
		if ((strict && haystack[key] === needle) || (!strict && haystack[key] == needle)) {
			found = true;
			break;
		}
	}

	return found;
}