<?php
 
include ('db.php');
 
$year=$_GET['y'];
 
$sqlget="SELECT * FROM data WHERE annee=".$year." ORDER BY mois ASC";
$resget= mysql_query($sqlget);
 
 
$sqleventget="SELECT * FROM event WHERE annee=".$year." ORDER BY id ASC";
$resgetevent=mysql_query($sqleventget);
$mois = ["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
$retour = Array();
 
        while ($tabeventget=mysql_fetch_array($resgetevent)){
                $retour[(array_search($tabeventget['mois'], $mois)+1)]['evenement'] = $tabeventget['evenement'];
        }
$i=0;
while ($tabget=mysql_fetch_array($resget)){
        $retour[$tabget['mois']]['naissance'] = $tabget['naissance'];
        $i++;
}
foreach ($retour as $key => $value) {
        echo $mois[$key-1].'-_-'.$retour[$key]['evenement'].'-_-'.$retour[$key]['naissance'].'----';
}
?>