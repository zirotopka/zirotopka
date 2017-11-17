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

/* -----------------------Передалать нужно ---------------------*/

	$('body').on('click',".access_block .qww1",function(){
		$('.FAQ').attr('style','display:none;');
		$('.access_list').attr('style','display:block;');
		$('.answ1').removeClass('hidden');
		$('.qw1').focus();
	});

	$('body').on('click',".access_block .qww2",function(){
		$('.FAQ').attr('style','display:none;');
		$('.access_list').attr('style','display:block;');
		$('.answ2').removeClass('hidden');
		$('.qw2').focus();
	});

	$('body').on('click',".access_block .qww3",function(){
		$('.FAQ').attr('style','display:none;');
		$('.access_list').attr('style','display:block;');
		$('.answ3').removeClass('hidden');
		$('.qw3').focus();
	});

	$('body').on('click',"#oprg .qww1",function(){
		$('.FAQ').attr('style','display:none;');
		$('.programm_list').attr('style','display:block!important;');
		$('.answ1').removeClass('hidden');
		$('.qw1').focus();
	});

	$('body').on('click',"#oprg .qww2",function(){
		$('.FAQ').attr('style','display:none;');
		$('.programm_list').attr('style','display:block!important;');
		$('.answ2').removeClass('hidden');
		$('.qw2').focus();
	});

	$('body').on('click',"#oprg .qww3",function(){
		$('.FAQ').attr('style','display:none;');
		$('.programm_list').attr('style','display:block!important;');
		$('.answ3').removeClass('hidden');
		$('.qw3').focus();
	});

	$('body').on('click',"#oprv .qww1",function(){
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:block!important;');
		$('.answ1').removeClass('hidden');
		$('.qw1').focus();
	});

	$('body').on('click',"#oprv .qww2",function(){
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:block!important;');
		$('.answ2').removeClass('hidden');
		$('.qw2').focus();
	});

	$('body').on('click',"#oprv .qww3",function(){
		$('.FAQ').attr('style','display:none;');
		$('.ruls_list').attr('style','display:block!important;');
		$('.answ3').removeClass('hidden');
		$('.qw3').focus();
	});

	$('body').on('click',"#ovsm .qww1",function(){
		$('.FAQ').attr('style','display:none;');
		$('.else_list').attr('style','display:block!important;');
		$('.answ1').removeClass('hidden');
		$('.qw1').focus();
	});

	$('body').on('click',"#ovsm .qww2",function(){
		$('.FAQ').attr('style','display:none;');
		$('.else_list').attr('style','display:block!important;');
		$('.answ2').removeClass('hidden');
		$('.qw2').focus();
	});

	$('body').on('click',"#ovsm .qww3",function(){
		$('.FAQ').attr('style','display:none;');
		$('.else_list').attr('style','display:block!important;');
		$('.answ3').removeClass('hidden');
		$('.qw3').focus();
	});
/*---------------------------------------------------------------*/

	$('body').on('click','.qw1',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};
		$('.answ1').removeClass('hidden');

	});
	$('body').on('click','.qw2',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};
		$('.answ2').removeClass('hidden');

	});
	$('body').on('click','.qw3',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};		$('.answ3').removeClass('hidden');
	});
	$('body').on('click','.qw4',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};		$('.answ4').removeClass('hidden');
	});
	$('body').on('click','.qw5',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};		$('.answ5').removeClass('hidden');
	});
	$('body').on('click','.qw6',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};		$('.answ6').removeClass('hidden');
	});
	$('body').on('click','.qw7',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};		$('.answ7').removeClass('hidden');
	});
	$('body').on('click','.qw8',function(){
		for(var i=0; i<7; i++){
			if (!$('.answ'+i).hasClass('hidden')){
				$('.answ'+i).addClass('hidden');
			};
		};
		$('.answ8').removeClass('hidden');
	});
})
