<?php
	// Page d'accueil : /index.php
	header("Content-Type: application/json', charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	$api = new API();

  $userLogin = isset($_POST['assoMember']) ? mb_strtolower($_POST['assoMember'], 'UTF-8') : '';
	$asso = isset($_SESSION['currentAsso']) ? mb_strtolower($_SESSION['currentAsso'], 'UTF-8') : '';

  if ($userLogin != '' && $asso != ''){
		try{
			if ($api->removeAssoMember($userLogin, $asso))
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
