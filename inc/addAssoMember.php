<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	$api = new API();

  $userLogin = isset($_POST['userId']) ? mb_strtolower($_POST['userId'], 'UTF-8') : '';
	$memberRole = isset($_POST['memberRole']) ? ucfirst(mb_strtolower($_POST['memberRole'], 'UTF-8')) : '';
	$asso = isset($_SESSION['currentAsso']) ? mb_strtolower($_SESSION['currentAsso'], 'UTF-8') : '';

  if ($userLogin != '' && $memberRole != '' && $asso != ''){
		try{
			if ($api->addAssoMember($userLogin, $asso, $memberRole))
				header('Location: '.$_CONFIG["website"]['home'].'admin/assoMembers.php');
			else
					header('Location: '.$_CONFIG["website"]['home'].'admin/assoMembers.php?error='.urlencode("Erreur lors de l'ajout dans la base de données."));
		}
		catch(Exception $e){
			header('Location: '.$_CONFIG["website"]['home'].'admin/assoMembers.php?error='.urlencode("Erreur: ".$e));
		}
  }
  else
		header('Location: '.$_CONFIG["website"]['home'].'admin/assoMembers.php?error='.urlencode("Erreur: Paramètre userId et/ou memberRole non reçu ou association non fixée."));

?>
