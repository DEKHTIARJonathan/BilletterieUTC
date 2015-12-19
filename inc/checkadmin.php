<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';

	require_once $root.'/inc/API.php';
	$api = new API();

  if ($api->isAdmin($_SESSION['login'])){
    $_SESSION['admin'] = True;

		$array = $api->getAllAssos();
		for ($i = 0; $i < sizeof($array); $i ++){
			$_SESSION['assos'][$i] = $array[$i];
			$_SESSION['roles'][$i] = "admin";
		}
  }
	else {
		if ($api->isAssoAdmin($_SESSION['login'])){
			$_SESSION['admin'] = False;

			$matrix = $api->getAssosRoles($_SESSION['login']);

			for ($i = 0; $i < sizeof($matrix['association']); $i ++){
				$_SESSION['assos'][$i] = $matrix['association'][$i];
				$_SESSION['roles'][$i] = $matrix['role'][$i];
			}
		}
		else
			header('Location: '.$_CONFIG["website"]['home']);
  }

?>
