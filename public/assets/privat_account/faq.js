$('document').ready(function(){
	$('.show_access').on('click',function(){
		$('.access_list').attr('style','display:block;');
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.else_list').attr('style','display:none;');
	});

	$('.show_progr').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:block!important;');
		$('.else_list').attr('style','display:none;');
	});

	$('.show_ruls').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:block!important;');
		$('.programm_list').attr('style','display:none;');
		$('.else_list').attr('style','display:none;');
	});

	$('.show_alls').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.else_list').attr('style','display:block!important;');

	});

	$('.faq_back').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:block;');
		$('.ruls_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.else_list').attr('style','display:none;');
	})
})
