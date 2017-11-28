$(document).ready(function(){
	//------------------Календарь лк--------------------
	$(".box-cal").on('mouseover',function(){
		var FIREFOX = /Firefox/i.test(navigator.userAgent);		
		var cal = $(this).find('.cal_hints');
		var offset = cal.offset();
		var max_left_pos = $("html").width() - cal.width() -44;
		if ($("html").width() > 991) {
			if (offset.left > max_left_pos) {
				if (FIREFOX) {	
					cal.offset({left:max_left_pos-10});			
				} else {
					cal.offset({left:max_left_pos-14});
				}
			}
		} 
		else{
			if (offset.left > max_left_pos) {
				if (FIREFOX) {	
					cal.offset({left:max_left_pos});			
				} else {
					cal.offset({left:max_left_pos+1});
				}
			}	
		}
		
		
	});
		



	//------------------Каледраь формы------------------

	var inputDate = $("#program_date_input");
	var changeYearButtons = function() {
	    setTimeout(function() {
	        var widgetHeader = inputDate.datepicker("widget").find(".ui-datepicker-header");
	        //you can opt to style up these simple buttons tho
	        var prevYrBtn = $('<a class="prew_year" href="#"><img src="/ico/left.png" alt="" /></a>');
	        prevYrBtn.bind("click", function() {
	            $.datepicker._adjustDate(inputDate, -1, 'Y');
	        });
	        var nextYrBtn = $('<a class="next_year" href="#"><img src="/ico/right.png" alt="" /></a>');
	        nextYrBtn.bind("click", function() {
	            $.datepicker._adjustDate(inputDate, +1, 'Y');

	        });
	        prevYrBtn.appendTo(widgetHeader);
	        nextYrBtn.appendTo(widgetHeader);

	    }, 1);
	};

	var dates = $("#program_date_input").datepicker({
	    beforeShow: changeYearButtons,
	    onChangeMonthYear: changeYearButtons,
	    dateFormat: "dd-mm-yy",
	    monthNamesShort: [ "Январь", "Февр.", "Март", "Апрель", "Май", "Июнь",
	                "Июль", "Август", "Сентяб.", "Октябь", "Ноябрь", "Декаб." ],
	    dayNames: ["Воскресенье","Понедельник","Вторник","Среда","Четверг","Пятница","Суббота"],
	    dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
	  	changeMonth: true,
	  	changeYear: true,
	  	firstDay: 1,
	  	minDate: new Date(nowYear, nowMonth - 1, nowDay),
	  	gotoCurrent: true,
		showOtherMonths: true,
	});

    jQuery('input.date').each(function(){
        jQuery(this).datepicker({dateFormat:'dd/mm/yy', changeMonth: true,    stepMonths: 12, showAnim:"slideDown" });
        jQuery('#ui-datepicker-div .ui-helper-hidden-accessible').css("position", "absolute !important");
        jQuery('#ui-datepicker-div').css('clip', 'auto');
    });

	$('.next_year').on('click',function(){
	    $('.ui-datepicker-year > option:selected').removeAttr('selected').next('option').attr('selected', 'selected');
  	});
})