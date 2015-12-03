<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once $root.'/config.inc.php';
  require_once('mailfunc.php');
  require_once('mailclass.php');
  require_once('recaptchalib.php');

   $error = "";
   $success = "";
   ############################### On récupère le nom #####################
    if (isset($_POST["name"]) && $_POST["name"] !== "")
        $name = $_POST["name"];
    else
         $error .= "Le nom est vide\n";
   ############################### On récupère l'email #####################

    if (isset($_POST["email"]) && $_POST["email"] !== "")
        $email = $_POST["email"];
    else
        $error .= "L'email est vide\n";

    ############################### On récupère le message #####################

    if (isset($_POST["message"]) && $_POST["message"] !== "")
        $message = $_POST["message"];
    else
        $error .= "Le message est vide\n";

    ############# Si un des champs est non valide => On redirige #####################

    ############################### On récupère vérifie que le CAPTCHA a bien été entré #####################
    if ($error == "" && isset($_POST["recaptcha_challenge_field"]))
    {


        $resp = recaptcha_check_answer ($_CONFIG['email']["captcha"]["private"],
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid)
            $error .= "Erreur dans le Captcha Code";
        else
        {
            ###################### On envoie le mail #####################

            $mail = new send_mail();
            $mail->importance();
            $mail->addFrom('Billetterie Evenementielle UTC <'.$_CONFIG['email']["sender"].'>');
            $mail->addTo($_CONFIG['email']["recipient"]);
            $mail->addSubject('Un Message pour l\'equipe de la Billetterie Evenementielle UTC');

            $body_m = 'La personne <b>'.$name.'</b> vous a contacté<br>';
            $body_m .= 'Voici son email <b>'.$email.'</b><br><br>';
            $body_m .= '<b>Son message :</b><br><br>';
            $body_m .= $message;
            $body_m .= '<br><br>###########################<br><br>';
            $body_m .= '<b>Amicalement, Le serviteur Maileur</b><br><br>';

            $mail->addContent(nl2br($body_m), 'html');

            $mail->checkIntegrityMail();

            $mail->build_mail();
            $mail->send();

            $success .= "Mail envoyé avec Succes";

            ##################### Fin du mail ############################

        }
    }
    else
    {
        $error .= "Le Captcha Code n'a pas été envoyé";
    }

    echo $error.$success;

?>
