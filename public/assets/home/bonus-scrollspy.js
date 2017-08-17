jQuery(document).ready(function(){
	$(window).scroll(function(){
		if ($("#Scrollspy ul li").hasClass("active")) {
			$('.spy_sections').attr('style','display: block!important;');
			$('.bonus_spy').attr('style','display: block!important;');
			$('#prgr_l_mn').attr('style','display: none;');
			$('#mn_l_mn').attr('style','display: none;');
		}
		else {
			$('.spy_sections').attr('style','display: none!important;');
			$('.bonus_spy').attr('style','display: block!important;');
			$('#prgr_l_mn').attr('style','display: block;');
			$('#mn_l_mn').attr('style','display: block; padding: 1.5em 0 1em 4em!important;');
		};		
	});

	$('body').scrollspy({ 
		target: '.spy-active',
	});

	$(".navbar a").on('click', function(event) {
		if (this.hash !== "") {
		    event.preventDefault();
	    var hash = this.hash;
		    $('html, body').animate({
		    	scrollTop: $(hash).offset().top
		    }, 800, function(){

		    window.location.hash = hash;
			});

	  	}
	});

});
