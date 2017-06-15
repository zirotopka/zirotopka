var _token = jQuery('meta[name="csrf-token"]').prop('content');

jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){
	$('.tooltipstered').tooltipster({
   theme: ['tooltipster-borderless', 'tooltipster-borderless-customized'],
   delay: 200,
   maxWidth: 400,
   side: 'bottom',
	});

	$('#choose_programe_form').modal('show')
	$( "#program_date_input" ).datepicker();


})