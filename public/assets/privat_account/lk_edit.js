$( document ).ready(function() {
	$('.edit_btn').on('click',function(){
		$('.user-data-content').attr('style','display:none;')
		$('.show-hidden-form').attr('style','display:block;')
	});

	$(".phone-inp").inputmask('+9 (999) 999-99-99');
	$(".birthdate-left").inputmask("99");
	$(".birthdate-center").inputmask("99");
	$(".birthdate-right").inputmask("9999");
	

	$('.birthday').customSelect();
	$('#days').customSelect();

	    //populate our years select box
	    for (i = new Date().getFullYear(); i > 1900; i--){
	        $('#years').append($('<option />').val(i).html(i));
	    }
	    //populate our months select box
	    if ($("html").width() < 768) {
		    for (i = 1; i > 13; i++){
		    	if ( i == 1) {
		        	$('#months').append($('<option />').val(i).html('Январь'));
		    	}
		    	else if ( i == 2) {
		        	$('#months').append($('<option />').val(i).html('Февраль'));
		    	}
		    	else if ( i == 3) {
		        	$('#months').append($('<option />').val(i).html('Март'));
		    	}
		    	else if ( i == 4) {
		        	$('#months').append($('<option />').val(i).html('Апрель'));
		    	}
		    	else if ( i == 5) {
		        	$('#months').append($('<option />').val(i).html('Май'));
		    	}
		    	else if ( i == 6) {
		        	$('#months').append($('<option />').val(i).html('Июнь'));
		    	}
		    	else if ( i == 7) {
		        	$('#months').append($('<option />').val(i).html('Июль'));
		    	}
		    	else if ( i == 8){
		        	$('#months').append($('<option />').val(i).html('Август'));
		    	}
		    	else if ( i == 9){
		        	$('#months').append($('<option />').val(i).html('Сентабрь'));
		    	}
		    	else if ( i == 10){
		        	$('#months').append($('<option />').val(i).html('Октябрь'));
		    	}
		    	else if ( i == 11){
		        	$('#months').append($('<option />').val(i).html('Ноябрь'));
		    	}
		    	else if ( i == 12){
		        	$('#months').append($('<option />').val(i).html('Декабрь'));
		    	}
		    }
	    } else {
	    	for (i = 1; i < 13; i++){
	        	$('#months').append($('<option />').val(i).html(i));
	    	}
	    }

	    //populate our Days select box
	    updateNumberOfDays(); 

	    //"listen" for change events
	    $('#years, #months').change(function(){
	        updateNumberOfDays(); 
	    });

	//function to update the days based on the current values of month and year
	function updateNumberOfDays(){
	    $('#days').html('');
	    month = $('#months').val();
	    year = $('#years').val();
	    days = daysInMonth(month, year);

	    for(i=1; i < days+1 ; i++){
	            $('#days').append($('<option />').val(i).html(i));
	    }
	}

	//helper function
	function daysInMonth(month, year) {
	    return new Date(year, month, 0).getDate();
	}

	$('body').on('change','#download-logos',function(){
		var file = this.files[0];
		var formData = new FormData();

		formData.append('logo',file);

	    $.ajax({
	        url: '/user/change_logo',
	        type: 'POST',
	        data: formData,
	        cache: false,
	        //dataType: 'json',
	        processData: false, 
	        contentType: false, 
	        success: function( result ){
	            if (result['response'] = 200) {
					$('.logo-img').attr('src','/image/logos/'+result['url']);
	            } else {
	           		console.log('ОШИБКИ Загрузки фото');
	            }
	        },
	        error: function( jqXHR, textStatus, errorThrown ){
	            console.log('ОШИБКИ AJAX запроса: ' + textStatus );
	        }
	    });
	})
})