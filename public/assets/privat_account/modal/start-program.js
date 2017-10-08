$( document ).ready(function() {
	$('#starting_form').modal('show');
	$('body').on('click','.cont_butt',function(){
		$('#starting_form').modal('hide');
	});
})