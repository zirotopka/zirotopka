var _token = jQuery('meta[name="csrf-token"]').prop('content');

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
	$('#choose_programe_form').modal('show');
	$('.selectpicker').on('changed.bs.select', function (e) {
		var program_id = $('.selectpicker').val();
    
	    jQuery.ajax({
		    type: "post",
		    url: '/program/get_program',
		    data: {id: program_id},
		    success: function (result) {
			$('#r_prgr_name').text(result['name']);
			$('#r_prgr_descr').text(result['description']);
			$('#r_prgr_price').text(result['cost']);
	    	}  
	  	});
		
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
	
	$('.selectpicker').on('loaded.bs.select', function (e) {
		var program_id = $('.selectpicker').val();
    
	    jQuery.ajax({
		    type: "post",
		    url: '/program/get_program',
		    data: {id: program_id},
		    success: function (result) {
			$('#r_prgr_name').text(result['name']);
			$('#r_prgr_descr').text(result['description']);
			$('#r_prgr_price').text(result['cost']+" руб.");
	    	}  
	  	});
		
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
	$('#open_reg').on('click',function(){
		$('#login').modal('hide');
	})
});

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



