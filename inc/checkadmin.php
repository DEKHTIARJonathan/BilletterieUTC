<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';

	require_once $root.'/inc/API.php';
	$api = new API();

	$role = $api->getPlatformRole($_SESSION['login']);

  if ($role == "admin"){
    echo "admin";
    $_SESSION['admin'] = True;
    $_SESSION['assos'] = "";
    $_SESSION['roles'] = "";
  } elseif ($role == "user") {
    $_SESSION['admin'] = False;

    $matrix = $api->getAssosRoles($_SESSION['login']);
    
    if (sizeof($matrix['association']) > 0){
  		for ($i = 0; $i < sizeof($matrix['association']); $i ++){
  			$_SESSION['assos'][$i] = $matrix['association'][$i];
  			$_SESSION['roles'][$i] = $matrix['role'][$i];
  		}
    }

  } else
    header('Location: '.$_CONFIG["website"]['home']);

  /*
	if (sizeof($rslt) > 0){
		for ($i = 0; $i < sizeof($rslt); $i ++){
			$_SESSION['association'] = $rslt[$i]['association'];
			$_SESSION['role'] = $rslt[$i]['role'];
		}
		header('Location: '.$_CONFIG["website"]['home']."admin2/index.php");
	}
	else
		header('Location: '.$_CONFIG["website"]['home']);

  session_start();

  $asso = isset($_SESSION['asso']) ? $_SESSION['asso'] : '';
  $email_asso = isset($_SESSION['email']) ? $_SESSION['email'] : '';

  if($asso == "" || $email_asso == "")

  */

?>
