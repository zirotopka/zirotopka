var _token = jQuery('meta[name="csrf-token"]').prop('content');

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
	$('#choose_programe_form').modal('show');
	$("#program_bnr").attr('src',"/image/test/r.one_start.png");
	$('.selectpicker').on('hidden.bs.select', function (e) {
  	var	program_id = $('.selectpicker').val();
  		if (program_id == 1) {
  			$("#program_bnr").attr('src',"/image/test/r.one_start.png");
  				
  		}
  		else if (program_id == 2){
  			$("#program_bnr").attr('src',"/image/test/r.one_pro.png");
  		}
  		else if (program_id == 3){
  			$("#program_bnr").attr('src',"/image/test/r.one_run.png");
  		}
  		else if (program_id == 4){
  			$("#program_bnr").attr('src',"/image/test/r.one_run+.png");
  		}
  		else if (program_id == 5){
  			$("#program_bnr").attr('src',"/image/test/r.one_power.png");
  		}
	});
jQuery.ajax({
            type: "post",
            url: 'program/get_program',
            data: {id},
            success: function (data) {
            }
        });   
});


