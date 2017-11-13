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
                    $('#reg-email').after('<i class="fa fa-check good" style="color:#ff8a18; position: absolute; margin: 4px 10px 3px;"> </i>');
                    $('.bad').attr('style','display: none;');
                } else {
                    $('#reg-email').after('<i class="fa fa-times bad" style="color:#ff8a18; position: absolute;margin: 4px 10px 3px;"> </i>');
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
    $("#faq_refs").on('click',function(){
        $('.ref .qw1').attr('style','display: block!important;')
    });
    $("#about_program").on('click',function(){
        $('.prg .qw2').attr('style','display: block!important;')
    });
    $("#faq_ruls").on('click',function(){
        $('.ruls .qw3').attr('style','display: block!important;')
    });
    $("#faq_razn").on('click',function(){
        $('.all .qw4').attr('style','display: block!important;')
    });

    jQuery('body').on('click','.question',function(event){
        event.preventDefault();

        var closestLi = $(this).closest('li'),
            answ = closestLi.find('.answ').eq(0);

        if (answ.hasClass('hidden')) {
            answ.removeClass('hidden');
        } else {
            answ.addClass('hidden');
        }
    });
});