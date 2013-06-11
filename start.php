<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creoptima</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/Chart.js"></script>
</head>
<body>

	<nav>
		<a href="#"><div id="logomini">Creoptima</div></a>
		<div class="wrap">
			<ul>
				<li><a href="#" class="selected">Events</a></li>
				<li><a href="#">Weather</a></li>
			</ul> 
		</div>	
	</nav>
	<div class="texture">
		<div class="wrap">
			<div>
				<h1 id="radarh1">EVENTS EFFECTS ON FERTILITY</h1>
				<h2 id="radarh2">Datas are presented monthly with a global views of every year since 2002</h2>
			</div>
			<div>
				<div id="centre">&nbsp;</div>
				<canvas id="canvas" height="600" width="600"></canvas>
				
			</div>

<?php 
include('db.php');

$sqlannee="SELECT DISTINCT annee FROM data ORDER BY annee ASC";
$resannee=mysql_query($sqlannee);


echo '<ul>';

while ($tabannee=mysql_fetch_array($resannee)){


	echo '<li>'.$tabannee['annee'].'</li>';


	}
	echo '</ul>';



$sqlannee2="SELECT DISTINCT annee FROM data ORDER BY annee ASC";
$resannee2=mysql_query($sqlannee2);


echo '<ul>';

while ($tabannee2=mysql_fetch_array($resannee2)){


	$sqlnaiss="SELECT SUM(naissance) FROM data WHERE annee=".$tabannee2['annee'];
	$resnaissance=mysql_query($sqlnaiss);

	// echo $sqlnaiss;

	while ($tabnaiss=mysql_fetch_array($resnaissance)){

			echo '<li>'.substr($tabnaiss[0], 0, 3).'k</li>';


	}
}

echo '</ul>';
 ?>

			
		</div>
	</div>
	


	<script>

		var radarChartData = {
			labels : ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"],
			datasets : [
				{
					fillColor : "rgba(220,220,220,0)",
					strokeColor : "rgba(163,61,61,1)",
					pointColor : "gba(0,0,0,1)",
					pointStrokeColor : "#fff",
					data : [65,59,90,81,56,55,40,30,54,10,78,83]
				},
				{
					fillColor : "rgba(151,187,205,0)",
					strokeColor : "rgba(234,163,61,1)",
					pointColor : "rgba(151,187,205,1)",
					pointStrokeColor : "#fff",
					data : [28,48,40,19,96,27,100,65,59,90,81,56]
				}
			]
			
		}

	var myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData,{scaleShowLabels : false, pointLabelFontSize : 10});
	
	</script>




	<footer>
		<div class="footer_wrapper">
			<span>Creoptima ®</span>
			<span>“Créé avec amour et passion comme vous le ferez pour vos bébés”</span>
			<span>Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A propos</span>	
		</div>
		
	</footer>
	</body>
</html>
