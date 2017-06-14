$(document).ready(function(){
	$('.tooltipstered').tooltipster({
   theme: ['tooltipster-borderless', 'tooltipster-borderless-customized'],
   delay: 200,
   maxWidth: 400,
   side: 'bottom',
	});

	$('#choose_programe_form').modal('show')
	$( "#program_date_input" ).datepicker();
	$('#video-moadl').on('hide.bs.modal', function () {
		var video = document.getElementsByTagName('video');
		for (var i = 0; i < video.length; i++) {
			video[i].load();
		}
	});
})