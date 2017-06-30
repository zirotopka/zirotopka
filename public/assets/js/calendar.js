$(document).ready(function(){
	//------------------Календарь лк--------------------
	$(".box-cal").on('mouseover',function(){
		var cal = $(this).find('.cal_hints');
		var offset = cal.offset();
		var max_left_pos = $("html").width() - cal.width() -44;
		if ($("html").width() > 991) {
			if (offset.left > max_left_pos) {
				cal.offset({left:max_left_pos});			
			}
		} else {
			if (offset.left > max_left_pos) {
				cal.offset({left:max_left_pos});			
			}
		}
	});
		



	//------------------Каледраь формы------------------
	$('.drp-control').on('click',function(){
		$(".ui-datepicker-header").append('<a class="prew_year" href="#"><img src="/ico/left.png" alt="" /></a>');
		$(".ui-datepicker-header").append('<a class="next_year" href="#"><img src="/ico/right.png" alt="" /></a>');
	});	

	$('.ui-datepicker-month').on('change',function(){
		$(".ui-datepicker-header").append('<a class="prew_year" href="#"><img src="/ico/left.png" alt="" /></a>');
		$(".ui-datepicker-header").append('<a class="next_year" href="#"><img src="/ico/right.png" alt="" /></a>');
	});	


	$( "#program_date_input" ).datepicker({
    dateFormat: "dd-mm-yy",
    monthNamesShort: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
    dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
    dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
  	changeMonth: true,
  	changeYear: true,
  	firstDay: 1,
  	minDate: 0,
  	gotoCurrent: true,
	showOtherMonths: true,
  });

	$('.next_year').on('click',function(){
	    $('.ui-datepicker-year > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  	});
})