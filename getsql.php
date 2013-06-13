<?php 

include ('db.php');

				$year=$_GET['y'];

				$sqlget="SELECT * FROM data WHERE annee=".$year." ORDER BY mois ASC";
				$resget= mysql_query($sqlget);


				$i=0;
				while ($tabget=mysql_fetch_array($resget)){


					if ($i!=0){
						echo ',';
					}

					echo $tabget['naissance'];
					$i++;


				}



			
 ?>