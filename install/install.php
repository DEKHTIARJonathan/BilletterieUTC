<?php
    require('../config.inc.php');

    $mysqli = new mysqli($_CONFIG['db']['host'], $_CONFIG['db']['user'], $_CONFIG['db']['pass'], $_CONFIG['db']['name']);

    /* Vérification de la connexion */
    if (mysqli_connect_errno()) {
        printf("Echec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }
	
	/* Modification du jeu de résultats en utf8 */

	if (!$mysqli->set_charset("utf8"))
		echo "Erreur lors du chargement du jeu de caractères utf8: ". $mysqli->error;
	else
		echo "Jeu de caractères courant: ". $mysqli->character_set_name();


    $requete = file_get_contents("structure.sql");

    if ($mysqli->multi_query($requete))
    {
        $web = "<html>";
        $web .= "<head>";
        $web .= '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
        $web .= "</head>";
        $web .= "<body>";
        $web .= "<h1>La base a bien été installée</h1>";
        $web .= "</body>";
        $web .= "</html>";

        echo $web;

    }

    else

    {
        $web = "<html>";
        $web .= "<head>";
        $web .= '<meta http-equiv="content-type" content="text/html; charset=utf-8" />';
        $web .= "</head>";
        $web .= "<body>";
        $web .= "<h1>La base n'a pas été installée correctement</h1>";
        $web .= "</body>";
        $web .= "</html>";

        echo $web;
        echo $mysqli->error;

    }


    $mysqli->close();
?>
