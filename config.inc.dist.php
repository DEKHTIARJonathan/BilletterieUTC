<?php

	$root = realpath($_SERVER["DOCUMENT_ROOT"]);

	// Paramètres de BDD
	$_CONFIG['db']['host'] = "localhost";
	$_CONFIG['db']['name'] = "billetterie_utc";
	$_CONFIG['db']['user'] = "root";
	$_CONFIG['db']['pass'] = "##########################";
	$_CONFIG['db']['port'] = 3306;

	$_CONFIG["website"]["title"] = "Billetterie UTC";
	$_CONFIG["website"]['home'] = "http://localhost/";
	$_CONFIG["website"]['uploadPath'] = $root.'/images/upload/';

	// Chemin vers le serveur CAS (avec le / final)
	$_CONFIG["cas"]["url"] = "https://cas.utc.fr/cas/";
	$_CONFIG["cas"]["service"] = $_CONFIG["website"]['home']."inc/connect.php";

	$_CONFIG['ginger']["key"] = "#####################################";
	$_CONFIG['ginger']["url"] = "https://assos.utc.fr/ginger_dev/v1/";

?>
