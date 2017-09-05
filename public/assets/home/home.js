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
                if (data['response'] == 200) {
                    $('#reg-email').after('<i class="fa fa-check good" style="color:#ff8a18; position: absolute; margin: 2%;"> </i>');
                    $('.bad').attr('style','display: none;');
                } else {
                    $('#reg-email').after('<i class="fa fa-times bad" style="color:#ff8a18; position: absolute; margin: 2%;"> </i>');
                    $('.good').attr('style','display: none;');
                    $('.bad').attr('title', data['text']);
                }
            },
            error: function (data) {
                console.log('Error:', data);
                console.log('Error:', data['responseText']);
            }
        });
           
	})
});