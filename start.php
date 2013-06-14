<?php include('db.php');?>
 
<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Creoptima</title>
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
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
<body id="start">
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
                                <h2 id="radarh2"> Les données sont présentées par mois avec une vision globale de chaque année depuis 2002 </h2>
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
function graphique(annee1,annee2,event1,event2){
    var radar = new RGraph.Radar('canvas',annee2,annee1)
        .Set('labels', ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Decembre"])
        .Set('tooltips', event1.concat(event2)) //Hover
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
 var naissanceG = [0,0,0,0,0,0,0,0,0,0,0,0];
 var eventsG = ["vide","vide","vide","vide","vide","vide","vide","vide","vide","vide","vide","vide"];
  graphique(naissanceG,naissanceG,eventsG,eventsG);
 
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
                        donnees = data.split('----')
                        naissance = []
                        events = []
                        for(var i= 0; i < data.length-1; i++){
                                if(donnees[i]){
                                        naissance[i] = parseInt(donnees[i].split('-_-')[2])
                                        events[i] = donnees[i].split('-_-')[1]+" -> "+parseInt(donnees[i].split('-_-')[2])+" bébés"
                                        console.log(donnees[i].split('-_-')[0]+' '+events[i]+': '+donnees[i].split('-_-')[2])
                                }
                        }
                        RGraph.Reset(document.getElementById('canvas'))
                        graphique(naissanceG,naissance,eventsG,events);
                        naissanceG = naissance
                        eventsG = events
                }
        })
        test = $(this)
  }

  })
 
})
 
 
 
</script>
 
 
        </body>
</html>