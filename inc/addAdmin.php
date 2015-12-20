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

  $userLogin = isset($_POST['userId']) ? mb_strtolower($_POST['userId'], 'UTF-8') : '';

  if ($userLogin != ''){
		try{
			if ($api->addAdmin($userLogin))
				header('Location: '.$_CONFIG["website"]['home'].'admin/');
			else
					header('Location: '.$_CONFIG["website"]['home'].'admin/platformRights.php');
		}
		catch(Exception $e){
			header('Location: '.$_CONFIG["website"]['home'].'admin/platformRights.php');
		}
  }
  else
		header('Location: '.$_CONFIG["website"]['home'].'admin/platformRights.php');

?>
