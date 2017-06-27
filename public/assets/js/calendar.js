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
	$( "#program_date_input" ).datepicker({
    dateFormat: "dd-mm-yy",
    monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
    dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
    dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
  	changeMonth: true,
  	changeYear: true,
  });

})