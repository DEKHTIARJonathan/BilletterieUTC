<?php
  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once $root.'/config.inc.php';
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);

	require_once $root.'/class/Auth.php';

  register_login();

  if (!isset($_SESSION['auth']['logged']) || !$_SESSION['auth']['logged'])
      header('Location: '.$_CONFIG["cas"]["url"].'login?service='.$_CONFIG["cas"]["service"]);
  else {
  	$_SESSION['login'] = $_SESSION['auth']["login_utc"];
  	header('Location: '.$_CONFIG["website"]['home']);
  }

?>
