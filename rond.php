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
		<canvas id="canvas2" height="450" width="450"></canvas>

<?php 
include('db.php');

$sqltaux=' SELECT * FROM meteo WHERE annee="2005" AND region="Bretagne" OR region="Ile-de-France" and annee="2005"';
$restaux=mysql_query($sqltaux);
// echo $sqltaux; 

 $tabtaux=mysql_fetch_array($restaux);
	echo 'soleil '.$tabtaux['soleil'] .'<br/>';

	echo 'pluie '.$tabtaux['pluie'];




	echo'
	<script>

		var doughnutData = [
				{
					value: '.$tabtaux['soleil'].',
					color:"#ffd97d"
				},
				{
					value : '.$tabtaux['pluie'].',
					color : "#b6dcf3"
				}
			
			];</script>';
			 $tabtaux=mysql_fetch_array($restaux);


			echo'<script>

					var doughnutData2 = [
				{
					value: '.$tabtaux['soleil'].',
					color:"#ffd97d"
				},
				{
					value : '.$tabtaux['pluie'].',
					color : "#b6dcf3"
				}
			
			]; </script>';


 ?>

<script>


	var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
	var myDoughnut2 = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutData2);

	
	</script>
	</body>
</html>
