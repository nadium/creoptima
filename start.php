<?php include('db.php');?>

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
		<a href="http://localhost/git/creoptima"><div id="logomini">Creoptima</div></a>
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

		//Liste des années
			$sqlannee="SELECT DISTINCT annee FROM data ORDER BY annee ASC";
			$resannee=mysql_query($sqlannee);



			echo '<ul>';

			while ($tabannee=mysql_fetch_array($resannee)){
				echo '<li><a href="start.php?y='.$tabannee['annee'].'">'.$tabannee['annee'].'</a></li>';
			}
			echo '</ul>';


		//Liste des naissances
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



			if (isset($_GET['y'])){
				$year=$_GET['y'];
				//echo $year;

				$sqlget="SELECT naissance FROM data WHERE annee=".$year;
				$resget= mysql_connect($sqlget);

				echo $sqlget;

			}
			


	


echo '</ul>';
 ?>

		</div>
	</div>

	<footer>
		<div class="footer_wrapper">
			<span>Creoptima ®</span>
			<span>“Créé avec amour et passion comme vous le ferez pour vos bébés”</span>
			<span>Contact&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A propos</span>	
		</div>
	</footer>

	</body>
	<script src="js/script.js"></script>
</html>
