var radarChartData = {
	labels : ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0)",
			strokeColor : "rgba(163,61,61,1)",
			pointColor : "rgba(0,0,0,1)",
			pointStrokeColor : "#000",
			data : [10,21,14,1,2,31,28,15,26,30,30,27]
		},
		{
			fillColor : "rgba(151,187,205,0)",
			strokeColor : "rgba(234,163,61,1)",
			pointColor : "rgba(0,0,0,1)",
			pointStrokeColor : "#000",
			data : [28,15,26,30,30,27,10,21,14,1,2,31]
		}
	]
	
}

var myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData,{scaleShowLabels : false, pointLabelFontSize : 10});