<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	$api = new API();

  $assoName = isset($_POST['assoName']) ? ucfirst(strtolower($_POST['assoName'])) : '';
	$assoEmail = isset($_POST['assoName']) ? strtolower($_POST['assoName'])."@assos.utc.fr" : '';
	$assoPayUtcKey = isset($_POST['payutcKey']) ? strtolower($_POST['payutcKey']) : '';

	if($_SESSION['admin']){
	  if ($assoName != '' && $assoEmail != '' && $assoPayUtcKey != ''){
			try{
				if ($api->createAsso($assoName, $assoEmail, $assoPayUtcKey))
					header('Location: '.$_CONFIG["website"]['home'].'admin/');
				else
						header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php');
			}
			catch(Exception $e){
				header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php');
			}
	  }
	  else
			header('Location: '.$_CONFIG["website"]['home'].'admin/createAsso.php');
	}
	else
		header('Location: '.$_CONFIG["website"]['home'].'admin/');
?>
