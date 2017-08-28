$('document').ready(function(){
	$('.show_access').on('click',function(){
		$('.access_list').attr('style','display:block;');
		$('.FAQ').attr('style','display:none;');
		$('.immunity_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.question_list').attr('style','display:none;');
	});

	$('.show_programm').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.immunity_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:block;');
		$('.question_list').attr('style','display:none;');
	});

	$('.show_immunity').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.immunity_list').attr('style','display:block;');
		$('.programm_list').attr('style','display:none;');
		$('.question_list').attr('style','display:none;');
	});

	$('.show_questions').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:none;');
		$('.immunity_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.question_list').attr('style','display:none;');

	});

	$('.faq_back').on('click',function(){
		$('.access_list').attr('style','display:none;');
		$('.FAQ').attr('style','display:block;');
		$('.immunity_list').attr('style','display:none;');
		$('.programm_list').attr('style','display:none;');
		$('.question_list').attr('style','display:none;');
	})
})
