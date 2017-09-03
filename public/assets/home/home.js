jQuery(document).ready(function(){
	jQuery('body').on('change','#reg-email',function(){
		var email = jQuery(this).val();

        $.ajax({
            type: "POST",
            url: '/api/user/checkEmail',
            data: {
            	email: email,
            },
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log('Error:', data);
                console.log('Error:', data['responseText']);
            }
        });
           
	})
});