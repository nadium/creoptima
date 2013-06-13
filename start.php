<?php include('db.php');?>

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
<body>
	<nav>
		<a href="/"><div id="logomini">Creoptima</div></a>
		<div class="wrap">
			<ul>
				<li><a href="start.php" class="selected">Events</a></li>
				<li><a href="meteo.php">Weather</a></li>
			</ul> 
		</div>	
	</nav>

	<div class="texture">
		<div class="wrap">
			<div>
				<h1 id="radarh1"> L'EFFET DES EVENEMENTS SUR LA FERTILITE</h1>
				<h2 id="radarh2">Chaques années les données sont mensuellement présentées avec une vision globale depuis 2002 </h2>
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
				echo 
				'<li class="anneeget" id='.$tabannee['annee'].'>'
					.$tabannee['annee'].
				'</li>';
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





<script>
function graphique(annee1,annee2){
	var radarChartData = {
		labels : ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0)",
				strokeColor : "rgba(163,61,61,1)",
				pointColor : "rgba(0,0,0,1)",
				pointStrokeColor : "#000",
				data : annee2
			},
			{
				fillColor : "rgba(151,187,205,0)",
				strokeColor : "rgba(234,163,61,1)",
				pointColor : "rgba(0,0,0,1)",
				pointStrokeColor : "#000",
				data : annee1
			}
		]
		
	}

var myRadar = new Chart(document.getElementById("canvas").getContext("2d")).Radar(radarChartData,{scaleShowLabels : true, pointLabelFontSize : 16});
}

$(document).ready(function(){
  var donnees = [60,60,60,60,60,60,60,60,60,60,60,60];
  graphique(donnees,donnees);

  var li1,test;
  $('li.anneeget').click(function(){

  if(!test || $(this).attr('id') != test.attr('id')){

 	if($('li').hasClass('deux') && $('li').hasClass('premier')){
 	 $(this).removeClass('deux')
 	 $('li.premier').removeClass('premier')
 	 $('li.deux').removeClass('deux')
 	 li1.addClass('premier')
 	 li1 = $(this)
 	 $(this).addClass('deux')
 	} else if(!$('li').hasClass('deux') && $('li').hasClass('premier')){
 	  
 	 $(this).addClass('deux')
 	 $(this).removeClass('premier')
 	 li1 = $(this)
 	} else if(!$('li').hasClass('deux') && !$('li').hasClass('premier')){
 	 $(this).addClass('premier')

  }
 	$.ajax({
 	 url: "getsql.php?y="+$(this).attr('id'),
 	 success: function(data, textStatus, jqXHR){
 	 graphique(data.split(','), donnees);
 	 donnees = data.split(',');
 	 }
 	})
 	test = $(this)
  }



  })

})



</script>


	</body>
</html>
