$(document).ready(function(){
//	$('html').perfectScrollbar();
	$(".abo_btn").click(function() {
	    $('html,body').animate({
	        scrollTop: $("#bonus_2").offset().top},
	        800);
	});

	$("body").on('click','.parthner_btn', function () {
	    $('#registr #reg_role').val('arbitrage');
	    $('#registr').modal('show');
	  });
})