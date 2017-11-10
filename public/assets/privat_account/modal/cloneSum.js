$( document ).ready(function() {
	jQuery('body').on('keyup','#sumFront',function(){
		var thisInput = jQuery(this),
			RegEx=/\s/g,
			thisSum = parseInt(thisInput.val().replace(RegEx,"")),
			modalWindows = thisInput.closest('.modal').eq(0),
			backSum = modalWindows.find('.sumBack');

		if (thisSum == NaN) {
<<<<<<< HEAD
			jQuery.each(backSum,function(index, value){
=======
			jQuery.each(backSum, function(index, value){
>>>>>>> cadf8cebed8e49931709831d5e28ae7a84696488
				jQuery(this).val(0);
			});

			thisInput.val('');
		} else {
<<<<<<< HEAD
			jQuery.each(backSum,function(index, value){
=======
			jQuery.each(backSum, function(index, value){
>>>>>>> cadf8cebed8e49931709831d5e28ae7a84696488
				jQuery(this).val(thisSum);
			});

			thisInput.val(number_format(thisSum, 0, '.', ' '));
		}
	})

	jQuery('#withdrawal_modal').on('keyup','#sumFront',function(){
		var thisInput = jQuery(this),
			thisSum = parseInt(thisInput.val()),
			balanceСonstraintsVal = jQuery('#balanceСonstraints').val();

			if (thisSum > balanceСonstraintsVal) {
				thisInput.val(balanceСonstraintsVal);
			}
	})
})

function number_format( number, decimals, dec_point, thousands_sep ) {	// Format a number with grouped thousands
	// 
	// +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +	 bugfix by: Michael White (http://crestidg.com)

	var i, j, kw, kd, km;

	// input sanitation & defaults
	if( isNaN(decimals = Math.abs(decimals)) ){
		decimals = 2;
	}
	if( dec_point == undefined ){
		dec_point = ",";
	}
	if( thousands_sep == undefined ){
		thousands_sep = ".";
	}

	i = parseInt(number = (+number || 0).toFixed(decimals)) + "";

	if( (j = i.length) > 3 ){
		j = j % 3;
	} else{
		j = 0;
	}

	km = (j ? i.substr(0, j) + thousands_sep : "");
	kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
	//kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
	kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");


	return km + kw + kd;
}
