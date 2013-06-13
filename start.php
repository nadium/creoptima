<?php include('db.php');?>
 
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Creoptima</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
 
        <script src="js/RGraphLibraries/RGraph.common.core.js" ></script>
    <script src="js/RGraphLibraries/RGraph.common.dynamic.js" ></script>
    <script src="js/RGraphLibraries/RGraph.common.effects.js" ></script>
    <script src="js/RGraphLibraries/RGraph.common.tooltips.js" ></script>
    <script src="js/RGraphLibraries/RGraph.radar.js" ></script>
 
        <script src="js/Chart.js"></script>
</head>
<body>
        <nav>
                <a href="/"><div id="logomini">Creoptima</div></a>
                <div class="wrap">
                        <ul>
                                <li><a href="start.php" class="selected">Évènement</a></li>
                                <li><a href="meteo.php">Météo</a></li>
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
                                <canvas id="canvas" height="500" width="700"></canvas> 
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
    var radar = new RGraph.Radar('canvas',annee2,annee1)
        .Set('labels', ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"])
        .Set('tooltips', ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre",
            "Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"]) //Hover
        .Set('key.colors','rgba(0,0,0,1')
        .Set('background.circles.poly', true)
        .Set('background.circles.spacing', 30)
        .Set('colors', ['transparent','transparent']) //background
        .Set('axes.color', 'transparent') //Axes vertical horizontal
        .Set('highlights', true) //Affichage des points
        .Set('strokestyle', ['rgba(163,61,61,1)','rgba(234,163,61,1)']) //Ligne couleur
    RGraph.Effects.Radar.Grow(radar);
       
}
 
$(document).ready(function(){
 var donnees = [50000,50000,50000,50000,50000,50000,50000,50000,50000,50000,50000,50000];
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
                        donnees_naissance = []
                        for(var i= 0; i < data.split(',').length; i++){
                                donnees_naissance[i] = parseInt(data.split(',')[i])
                        }
                        RGraph.Reset(document.getElementById('canvas'))
                        graphique(donnees_naissance, donnees);
                        donnees = donnees_naissance;
                }
        })
        test = $(this)
  }
 
 
 
  })
 
})
 
 
 
</script>
 
 
        </body>
</html>