$( document ).ready(function() {
	$('.edit_btn').on('click',function(){
		$('.user-data-content').attr('style','display:none;')
		$('.show-hidden-form').attr('style','display:block;')
	});



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