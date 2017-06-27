$( document ).ready(function() {
	$('.replenish_btn').on('click',function(){
		$('.input_money').attr('style','display:block;')
		$('.output_money').attr('style','display:none;')
	});
	$('.black_btn').on('click',function(){
		$('.output_money').attr('style','display:block;')
		$('.input_money').attr('style','display:none;')
	});

})