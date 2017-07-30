jQuery(document).ready(function(){
	$(window).scroll(function(){
		if ($("#Scrollspy ul li").hasClass("active")) {
			$('.spy_sections').attr('style','display: block!important;');
			$('#prgr_l_mn').attr('style','display: none;');
			$('#bns_l_mn').attr('style','display: none;');
		}
		else {
			$('.spy_sections').attr('style','display: none!important;');
			$('#prgr_l_mn').attr('style','display: block;');
			$('#bns_l_mn').attr('style','display: block;');
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
