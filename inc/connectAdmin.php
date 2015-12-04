<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';

	require_once $root.'/inc/API.php';
	$api = new API();

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';

	if ($email == "" or $password == "")
		header('Location: '.$_CONFIG["website"]['home']."admin/");

	$rslt = $api->authenticate($_SESSION['login']);

	if (sizeof($rslt) > 0){
		for ($i = 0; $i < sizeof($rslt); $i ++){
			$_SESSION['association'] = $rslt[$i]['association'];
			$_SESSION['role'] = $rslt[$i]['role'];
		}
		header('Location: '.$_CONFIG["website"]['home']."admin2/index.php");
	}
	else
		header('Location: '.$_CONFIG["website"]['home']);

?>
