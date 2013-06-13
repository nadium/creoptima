<!doctype html>
<html>
	<head>
		<title>Doughnut Chart</title>
		<script src="Chart.js"></script>
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = no">
		<style>
			canvas{
			}
		</style>
	</head>
	<body>
		<canvas id="canvas" height="450" width="450"></canvas>
<?php 
include('db.php');

$sqltaux=' SELECT * FROM meteo WHERE annee="2005" AND region="Alsace" OR region="Ile-de-France" and annee="2005""';
$restaux=mysql_query($sqltaux);

echo $sqltaux;

//$pluie

 ?>

	<script>

		var doughnutData = [
				{
					value: 30,
					color:"#ffd97d"
				},
				{
					value : 50,
					color : "#b6dcf3"
				}
			
			];



	var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
	
	</script>
	</body>
</html>
