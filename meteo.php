<?php 
include('db.php');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Creoptima</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="js/Chart.js"></script>
</head>
<body id="meteo">
	<?php $sqltaux=' SELECT * FROM meteo WHERE annee="2005" AND region="Bretagne" OR region="Ile-de-France" and annee="2005"';
$restaux=mysql_query($sqltaux);
// echo $sqltaux; 

 $tabtaux=mysql_fetch_array($restaux);
	

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
	<nav>
		<a href="/"><div id="logomini">Creoptima</div></a>
		<div class="wrap">
			<ul>
				<li><a href="start.php" >Évènement</a></li>
				<li><a href="meteo.php"class="selected">Météo</a></li>
			</ul> 
		</div>	
	</nav>

	<div class="texture">
		<div class="wrap">
			<div>
				<h1 id="radarh1">LES EFFETS DE LA MÉTÉO SUR LA FERTILITÉ</h1>
			</div>
			<div id="ensoleillement">
				<div id="etat-soleil">JOURS ENSOLEILLÉS</div>
				<ul>
					<li><div class="barre" style="height:200px;"><div class="pushbottom"><div class="region">Alsace</div></div></div></li>
					<li><div class="barre" style="height:97px;"><div class="pushbottom"><div class="region">Aquitaine</div></div></div></li>
					<li><div class="barre" style="height:110px;"><div class="pushbottom"><div class="region">Auvergne</div></div></div></li>
					<li><div class="barre" style="height:80px;"><div class="pushbottom"><div class="region">Basse-Normandie</div></div></div></li>
					<li><div class="barre" style="height:60px;"><div class="pushbottom"><div class="region">Bourgogne</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Bretagne</div></div></div></li>
					<li><div class="barre" style="height:75px;"><div class="pushbottom"><div class="region">Centre</div></div></div></li>
					<li><div class="barre" style="height:120px;"><div class="pushbottom"><div class="region">Champagne-Ardenne</div></div></div></li>
					<li><div class="barre" style="height:20px;"><div class="pushbottom"><div class="region">Corse</div></div></div></li>
					<li><div class="barre" style="height:75px;"><div class="pushbottom"><div class="region">Franche-Compté</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Haute-Normandie</div></div></div></li>
					<li><div class="barre" style="height:150px;"><div class="pushbottom"><div class="region">Île-de-France</div></div></div></li>
					<li><div class="barre" style="height:200px;"><div class="pushbottom"><div class="region">Languedoc-Rousillon</div></div></div></li>
					<li><div class="barre" style="height:50px;"><div class="pushbottom"><div class="region">Limousin</div></div></div></li>
					<li><div class="barre" style="height:80px;"><div class="pushbottom"><div class="region">Lorraine</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Midi-Pyrénées</div></div></div></li>
					<li><div class="barre" style="height:65px;"><div class="pushbottom"><div class="region">Nord-Pas-de-Calais</div></div></div></li>
					<li><div class="barre" style="height:120px;"><div class="pushbottom"><div class="region">Pays de la Loire</div></div></div></li>
					<li><div class="barre" style="height:97px;"><div class="pushbottom"><div class="region">Picardie</div></div></div></li>
					<li><div class="barre" style="height:150px;"><div class="pushbottom"><div class="region">Poitou-Charentes</div></div></div></li>
					<li><div class="barre" style="height:100px;"><div class="pushbottom"><div class="region">Provence-Alpes-Côte-d'Azur</div></div></div></li>
					<li><div class="barre" style="height:240px;"><div class="pushbottom"><div class="region">Rhone-Alpes</div></div></div></li>
 				
				</ul>
			</div>
			<div id="frise">&nbsp;</div>
			<div id="pluie">
				<div id="etat-pluie">JOURS DE PLUIE</div>
					<ul>
					<li><div class="barre" style="height:40px;"><div class="pushbottom"><div class="region">Alsace</div></div></div></li>
					<li><div class="barre" style="height:250px;"><div class="pushbottom"><div class="region">Aquitaine</div></div></div></li>
					<li><div class="barre" style="height:110px;"><div class="pushbottom"><div class="region">Auvergne</div></div></div></li>
					<li><div class="barre" style="height:240px;"><div class="pushbottom"><div class="region">Basse-Normandie</div></div></div></li>
					<li><div class="barre" style="height:60px;"><div class="pushbottom"><div class="region">Bourgogne</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Bretagne</div></div></div></li>
					<li><div class="barre" style="height:75px;"><div class="pushbottom"><div class="region">Centre</div></div></div></li>
					<li><div class="barre" style="height:120px;"><div class="pushbottom"><div class="region">Champagne-Ardenne</div></div></div></li>
					<li><div class="barre" style="height:20px;"><div class="pushbottom"><div class="region">Corse</div></div></div></li>
					<li><div class="barre" style="height:75px;"><div class="pushbottom"><div class="region">Franche-Compté</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Haute-Normandie</div></div></div></li>
					<li><div class="barre" style="height:150px;"><div class="pushbottom"><div class="region">Île-de-France</div></div></div></li>
					<li><div class="barre" style="height:200px;"><div class="pushbottom"><div class="region">Languedoc-Rousillon</div></div></div></li>
					<li><div class="barre" style="height:50px;"><div class="pushbottom"><div class="region">Limousin</div></div></div></li>
					<li><div class="barre" style="height:80px;"><div class="pushbottom"><div class="region">Lorraine</div></div></div></li>
					<li><div class="barre" style="height:70px;"><div class="pushbottom"><div class="region">Midi-Pyrénées</div></div></div></li>
					<li><div class="barre" style="height:65px;"><div class="pushbottom"><div class="region">Nord-Pas-de-Calais</div></div></div></li>
					<li><div class="barre" style="height:120px;"><div class="pushbottom"><div class="region">Pays de la Loire</div></div></div></li>
					<li><div class="barre" style="height:97px;"><div class="pushbottom"><div class="region">Picardie</div></div></div></li>
					<li><div class="barre" style="height:150px;"><div class="pushbottom"><div class="region">Poitou-Charentes</div></div></div></li>
					<li><div class="barre" style="height:100px;"><div class="pushbottom"><div class="region">Provence-Alpes-Côte-d'Azur</div></div></div></li>
					<li><div class="barre" style="height:240px;"><div class="pushbottom"><div class="region">Rhone-Alpes</div></div></div></li>
					
				</ul>
			</div>
				
			<div id="comparaison">
				<div class="nomregion">BRETAGNE</div>
				<div class="nomregion">ÎLE-DE-FRANCE</div>
				<div class="clear"></div>
				<div id="cns">
					<div class="stats">
					<?php 
						echo "<span style='color:#5bb2e7'>".$tabtaux['pluie'] .' JOURS</span><br><br>';
						echo "<span style='color:#ffd97d'>".$tabtaux['soleil'] .' JOURS</span>';
					?>
					</div>
					<canvas id="canvas" height="400" width="400"></canvas>
					<canvas id="canvas2" height="400" width="400"></canvas>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<footer>
		<div class="footer_wrapper">
			<span>Creoptima ®</span>
			<span>“Créé avec amour et passion comme vous le ferez pour vos bébés”</span>
			<span>Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A propos</span>	
		</div>
	</footer>

	

<script>


	var myDoughnut = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(doughnutData);
	var myDoughnut2 = new Chart(document.getElementById("canvas2").getContext("2d")).Doughnut(doughnutData2);

	
	</script>

	</body>
</html>
