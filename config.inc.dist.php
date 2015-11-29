<?php

	// Paramètres de BDD
	$_CONFIG['sql_host'] = "localhost";
	$_CONFIG['sql_db'] = "billetterie_utc";
	$_CONFIG['sql_user'] = "root";
	$_CONFIG['sql_pass'] = "";
	$_CONFIG['sql_port'] = 3306;

	// Chemin vers le serveur CAS (avec le / final)
	$_CONFIG['cas_url'] = "https://cas.utc.fr/cas/";
	$_CONFIG['home'] = "http://localhost/";
	$_CONFIG['service'] = $_CONFIG['home']."inc/connect.php";
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	$_CONFIG['uploadPath'] = $root.'/images/upload/';

?>