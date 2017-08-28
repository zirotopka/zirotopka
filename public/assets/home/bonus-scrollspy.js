jQuery(document).ready(function(){
	$(window).scroll(function(){
		if ($("#Scrollspy ul li").hasClass("active")) {
			$('.spy_sections').attr('style','display: block!important;');
			$('.bonus_spy').attr('style','display: block!important;');
			$('#bns_l_mn').attr('style','border-left: 0.4em solid #F36D00;')
		}
		else {
			$('.spy_sections').attr('style','display: none!important;');
			$('.bonus_spy').attr('style','display: block!important;');
			$('#bns_l_mn').attr('style','border-left: none;')
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
