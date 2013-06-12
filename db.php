<?php

	mysql_connect("localhost","root","root") or die ("Erreur de connexion a MySql".mysql_error());
	mysql_select_db("datavise") or die ("Erreur de connexion a la base datavize".mysql_error());

?>