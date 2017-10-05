$( document ).ready(function() {
	jQuery('body').on('change','#sumFront',function(){
		var thisInput = jQuery(this),
			thisSum = parseInt(thisInput.val()),
			modalWindos = thisInput.closest('.modal').eq(0),
			backSum = modalWindos.find('#sumBack').eq(0);

		if (thisSum == NaN) {
			backSum.val(0);
			thisInput.val('');
		} else {
			backSum.val(thisSum);
			thisInput.val(number_format(thisSum, 0, '.', ' ') + ' руб.');
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
