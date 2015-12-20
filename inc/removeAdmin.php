<?php
	// Page d'accueil : /index.php
	header("Content-Type: application/json', charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	// Checking the user is administrator of the platform.
	if(!$_SESSION['admin'])
		header('Location: '.$_CONFIG["website"]['home'].'admin/');

	$api = new API();

  $userLogin = isset($_POST['admin']) ? mb_strtolower($_POST['admin'], 'UTF-8') : '';

  if ($userLogin != ''){
		try{
			if ($api->removeAdmin($userLogin))
				echo json_encode(array("status"=>"OK"));
			else
				echo json_encode(array("status"=>"OK", "error"=>"SQL Request Failed"));
		}
		catch(Exception $e){
			echo json_encode(array("status"=>"OK", "error"=>$e));
		}
  }
  else
		echo json_encode(array("status"=>"OK", "error"=>"POST parameter admin not passed"));

?>
