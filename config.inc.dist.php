<?php

	// Paramètres de BDD
	$_CONFIG['db']['host'] = "localhost";
	$_CONFIG['db']['name'] = "billetterie_utc";
	$_CONFIG['db']['user'] = "root";
	$_CONFIG['db']['pass'] = "########################################";
	$_CONFIG['db']['port'] = 3306;

	// Caractéristiques de la plateforme.
	$_CONFIG["website"]["title"] = "Billetterie UTC";
	$_CONFIG["website"]['home'] = "http://localhost/";
	$_CONFIG["website"]['uploadPath'] = $root.'/images/upload/';

	// Chemin vers le serveur CAS (avec le / final)
	$_CONFIG["cas"]["url"] = "https://cas.utc.fr/cas/";
	$_CONFIG["cas"]["service"] = $_CONFIG["website"]['home']."inc/connect.php";

	// GINGER API SETTINGS
	$_CONFIG['ginger']["key"] = "########################################";
	$_CONFIG['ginger']["service"] = "https://assos.utc.fr/ginger_dev/v1/";

	//PAY UTC API SETTINGS
	$_CONFIG['payutc']["key"] = "########################################";
	$_CONFIG['payutc']["service"] = "https://assos.utc.fr/payutc_dev/v1/";

	//EMAIL SETTINGS
	$_CONFIG['email']["captcha"]["private"] = "########################################";
	$_CONFIG['email']["captcha"]["public"] = "########################################";
	$_CONFIG['email']["sender"] = "billetterie@assos.utc.fr";

?>
