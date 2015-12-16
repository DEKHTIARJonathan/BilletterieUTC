<?php
	// Page d'accueil : /index.php
	header("Content-Type: application/json', charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/gingerAPI.php';
	require_once $root.'/inc/checkadmin.php';

	$ginger = new gingerAPI();

  $inputSTR = isset($_GET['request']) ? mb_strtolower($_GET['request'], 'UTF-8') : '';

	if($_SESSION['admin'] && $inputSTR != ''){
		try{
			$arr = array("status"=>"OK", "rslt"=>$ginger->findPersonne($inputSTR));
		}
		catch(Exception $e){
			$arr = array("status"=>"KO", "Error"=>"API Call Failed");
		}
	}
  else
		$arr = array("status"=>"KO", "Error"=>"Get Parameter Failed");

	echo json_encode($arr);
?>
