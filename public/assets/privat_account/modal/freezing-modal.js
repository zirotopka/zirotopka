$( document ).ready(function() {
	$('#freezing_form').modal('show');
		$('body').on('click','#here',function(){
		$('#freezing_form').modal('hide');
	});
})