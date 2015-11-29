<?php

	// Page d'accueil : /index.php 
	header("Content-Type: text/html; charset=UTF-8"); 
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/dbconnect.php';
	
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$password1 = isset($_POST['pass1']) ? $_POST['pass1'] : '';
	$password2 = isset($_POST['pass2']) ? $_POST['pass2'] : '';
	
	
	
	if ($email == "" or $password1 == "" or $password2 == "")
		header('Location: '.$_CONFIG['home']."admin/subscribe.php?error=1");
	
	else if ($password1 != $password2)
		header('Location: '.$_CONFIG['home']."admin/subscribe.php?error=2");
	
	$sth = $connexion->prepare('INSERT INTO `assos` (`name`, `email`, `password`, `verified`, `verif_key`) VALUES  (:name, CONCAT(:email, "@assos.utc.fr"), SHA1(:password), 0, :key)');
	
	$sth->bindParam(':name', $email);
	$sth->bindParam(':email', $email);
	$sth->bindParam(':password', $password1);
	$key = generateRandomString(40);
	$sth->bindParam(':key', $key);

	if($sth->execute()){
		// Préparation du mail contenant le lien d'activation
		$destinataire = $email."@assos.utc.fr";
		$destinataire = "marco.flint31@gmail.com";
		$sujet = "Activer votre compte" ;
		$entete = "From: billetterie@assos.utc.fr" ;
		 
		// Le lien d'activation est composé du login(log) et de la clé(cle)
		$message = 'Bienvenue sur la Billetterie UTC,
		 
		Pour activer votre compte, veuillez cliquer sur le lien ci dessous
		ou copier/coller dans votre navigateur internet.
		 
		'.$_CONFIG['home'].'admin/confirm.php?key='.$key.'
		 
		 
		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';
		 
		 
		mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
		header('Location: '.$_CONFIG['home']."admin/index.php?checkemail=1");
		
		
		
	}
		
	/*
	if ($row["rslt"] == 1){
		session_start();
		$_SESSION['asso'] = $row["name"];
		$_SESSION['idAsso'] = $row["idAsso"];
		$_SESSION['email'] = $email;
		header('Location: '.$_CONFIG['home']."admin/admin.php");
	}
	else
		header('Location: '.$_CONFIG['home']."admin/");
	*/

?>