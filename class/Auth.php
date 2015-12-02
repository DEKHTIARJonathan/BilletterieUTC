<?php
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/class/Cas.class.php';
    require_once $root.'/config.inc.php';

    session_start();

    if(!isset($_SESSION['auth']))
    {
        $_SESSION['auth'] = Array("logged" => False, "login_utc" => "", "cas_url" => Cas::getUrl());
    }

    function is_logged() {
        return $_SESSION['auth'];
    }

    function register_login() {
        global $_CONFIG;

        $ticket = $_GET["ticket"];
		$service = $_CONFIG["cas"]["service"];

        $login = Cas::authenticate($ticket, $service);

        if($login == -1) {
            $_SESSION['auth'] = Array("logged" => False, "login_utc" => "", "cas_url" => Cas::getUrl());
            return array_merge( Array("error" => Array("title" => "Connexion refusé")), is_logged());
        } else {
            $_SESSION['auth'] = Array("logged" => True, "login_utc" => $login, "cas_url" => Cas::getUrl());
            return array_merge( Array("success" => Array("title" => "Connexion réussi")), is_logged());
        }

    }

    function logout() {
        session_destroy();
        session_start();
        $_SESSION['auth'] = Array("logged" => False, "login_utc" => "", "cas_url" => Cas::getUrl());
        return is_logged();
    }

?>
