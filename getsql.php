<?php 

include ('db.php');

				$year=$_GET['y'];

				$sqlget="SELECT * FROM data WHERE annee=".$year." ORDER BY mois ASC";
				$resget= mysql_query($sqlget);

				$sqleventget="SELECT * FROM event WHERE annee=".$year." ORDER BY mois ASC";
				$resgetevent=mysql_query($sqleventget);
				//echo $sqleventget;

echo '[';
				$i=0;
				while ($tabget=mysql_fetch_array($resget)){

					while ($tabeventget=mysql_fetch_array($resgetevent)){

						echo $tabeventget['evenement'];
					}

					if ($i!=0){
						echo ',';
					}

					echo $tabget['naissance'];
					$i++;


				}

echo ']';

			
 ?>