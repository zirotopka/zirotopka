$(document).ready(function(){
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