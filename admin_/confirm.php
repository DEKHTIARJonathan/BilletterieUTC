<?php
	// Page d'accueil : /index.php 
	header("Content-Type: text/html; charset=UTF-8"); 
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/dbconnect.php';

	$key = isset($_GET['key']) ? $_GET['key'] : '';
	
	if ($key == "")
		header('Location: '.$_CONFIG['home']."admin/");
	
	$sth = $connexion->prepare('UPDATE `assos` SET `verified` = "1" WHERE `verif_key` = :key');
	
	$sth->bindParam(':key', $key);

	$rslt =  $sth->execute();
	
	if($sth->rowCount()){
		header( "refresh:5;url=".$_CONFIG['home']."admin/"); 
		echo "You have Confirmed your account, redirecting in 5 seconds<br>";
		echo 'If not, click <a href="'.$_CONFIG['home'].'admin/"><b>here</b></a>.';
	}		
	else{
		header( "refresh:5;url=".$_CONFIG['home']."admin/"); 
		echo "Account already activated or the key is not valid, redirecting in 5 seconds<br>";
		echo 'If not, click <a href="'.$_CONFIG['home'].'admin/"><b>here</b></a>.';
	}

?>