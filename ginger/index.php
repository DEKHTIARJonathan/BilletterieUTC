<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
  require_once $root.'/ginger/ApiException.php';
  require_once $root.'/ginger/KoalaClient.php';
  require_once $root.'/ginger/GingerClient.php';

	$ginger = new \Ginger\Client\GingerClient ($_CONFIG['ginger']["key"], $_CONFIG['ginger']["service"], $_CONFIG['debug']);

  try{
	  $user = $ginger->getUser("jdekhtia");

	  echo var_dump($user);
	  echo $user->login;echo"<br>";
	  echo $user->nom;echo"<br>";
	  echo $user->prenom;echo"<br>";
	  echo $user->mail;echo"<br>";
	  echo $user->type;echo"<br>";
	  echo $user->is_adulte;echo"<br>";
	  echo $user->is_cotisant;echo"<br>";
	  echo $user->badge_uid;echo"<br>";
	  echo $user->expiration_badge;echo"<br>";
  }
  catch(Exception $e){
	  echo "Fail";
  }

	$array = $ginger->findPersonne("f");
	echo var_dump($array);
?>
