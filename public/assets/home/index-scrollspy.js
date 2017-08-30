jQuery(document).ready(function(){
	$(window).scroll(function(){
		if ($("#Scrollspy ul li").hasClass("active")) {
			$('.spy_sections').attr('style','display: block!important;');
			$('.index_spy').attr('style','display: block!important;');
			$('#mn_l_mn').attr('style','border-left: 0.4em solid #F36D00; padding: 1.5em 0 1em 4em!important;')
		}
		else {
			$('.spy_sections').attr('style','display: none!important;');
			$('.index_spy').attr('style','display: none!important;');
			$('#mn_l_mn').attr('style','border-left: none; padding: 1.5em 0 1em 4em!important;')
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
