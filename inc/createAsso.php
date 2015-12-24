<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	// Checking the user is administrator of the platform.
	if(!$_SESSION['admin'])
		header('Location: '.$_CONFIG["website"]['home'].'admin/');

	$api = new API();

  $assoName = isset($_POST['assoName']) ? $_POST['assoName'] : '';
	$assoEmail = isset($_POST['assoName']) ? mb_strtolower($_POST['assoName'], 'UTF-8')."@assos.utc.fr" : '';
	$assoPayUtcKey = isset($_POST['payutcKey']) ? mb_strtolower($_POST['payutcKey'], 'UTF-8') : '';

  if ($assoName != '' && $assoEmail != '' && $assoPayUtcKey != ''){
		try{
			if ($api->createAsso($assoName, $assoEmail, $assoPayUtcKey))
				header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php');
			else
					header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php?error='.urlencode("Erreur dans l'execution du code SQL."));
		}
		catch(Exception $e){
			header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php?error='.urlencode("Erreur: ".$e));
		}
  }
  else
		header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php?error='.urlencode("Erreur: Un ou des arguments sont manquants"));

?>
