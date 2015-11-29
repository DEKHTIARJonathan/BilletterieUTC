<?php

    header("Content-Type: text/html; charset=UTF-8");
    $root = realpath($_SERVER["DOCUMENT_ROOT"]);

    session_start();



	  $asso = isset($_SESSION['asso']) ? $_SESSION['asso'] : '';
    $email_asso = isset($_SESSION['email']) ? $_SESSION['email'] : '';

    if($asso == "" || $email_asso == "")
        header('Location: '.$_CONFIG['home']."admin/");
?>
