$(document).ready(function(){
	var ctxL = document.getElementById("lineChartMonth").getContext('2d');
	var myLineChart = new Chart(ctxL, {
	    type: 'line',
	    data: {
	        labels: adjansyListDays,
	        datasets: [
	            {
	                label: "Кол-во рефералов за текущий месяц",
	                fillColor: "rgba(220,220,220,0.2)",
	                strokeColor: "rgba(220,220,220,1)",
	                pointColor: "rgba(220,220,220,1)",
	                pointStrokeColor: "#fff",
	                pointHighlightFill: "#fff",
	                pointHighlightStroke: "rgba(220,220,220,1)",
	                data: adjansyListValues
	            },
	        ]
	    },
	    options: {
	        responsive: true,
	        animation: {
                animateScale: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                    }
                }]
            }
	    }    
	});

	var ctxL = document.getElementById("lineChartAccruals").getContext('2d');
	var myLineChart = new Chart(ctxL, {
	    type: 'line',
	    data: {
	        labels: adjansyListDays,
	        datasets: [
	            {
	                label: "Заработано средств за сутки",
	                fillColor: "rgba(220,220,220,0.2)",
	                strokeColor: "rgba(220,220,220,1)",
	                pointColor: "rgba(220,220,220,1)",
	                pointStrokeColor: "#fff",
	                pointHighlightFill: "#fff",
	                pointHighlightStroke: "rgba(220,220,220,1)",
	                data: accrualsSumPerDay
	            },
	        ]
	    },
	    options: {
	        responsive: true,
	        animation: {
                animateScale: true
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value) { if (Number.isInteger(value)) { return value; } },
                        stepSize: 1
                    }
                }]
            }
	    }    
	});
});