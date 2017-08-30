$(document).ready(function(){
//	$('html').perfectScrollbar();
	$(".abo_btn").click(function() {
	    $('html,body').animate({
	        scrollTop: $("#bonus_2").offset().top},
	        800);
	});
})