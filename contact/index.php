<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once $root.'/config.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
			<title><?php echo $_CONFIG["website"]["title"]; ?></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">

			<!-- Loading Bootstrap -->
			<link href="../flatUI/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

			<!-- Loading Flat UI -->
			<link href="../flatUI/css/flat-ui.min.css" rel="stylesheet">

			<link rel="shortcut icon" href="../img/favicon.ico">

			<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
			<!--[if lt IE 9]>
				<script src="js/vendor/html5shiv.js"></script>
				<script src="js/vendor/respond.min.js"></script>
			<![endif]-->

			<link rel="stylesheet" type="text/css" href="../css/style.css" />

			<!-- <link href="bootflat/css/bootflat.min.css" rel="stylesheet" type="text/css" /> -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


			<style type="text/css">
				body {
					padding-top: 60px;
					padding-bottom: 40px;
				}
			</style>

			<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
			<script src="../flatUI/js/vendor/jquery.min.js"></script>
    </head>
    <body>

      <div class="container">
        <?php
            include("../parts/header2.php");
        ?>

        <div class="jumbotron" style="padding-top:25px; overflow:hidden;">
            <h1>Contacte la Team</h1>
            Vous souhaitez prendre part au projet de la Billetterie Évènementielle ?<br>
            Vous rencontrez un problème avec l'utilisation de la solution logicielle ?<br><br>
            <b>N'hésitez pas à nous contacter</b>
        </div><br>

			<form method="post" name="MailerForm" id="MailerForm" action="#">
				<div class="row controls">
					<div class="form-group  col-md-6">
            <input type="text" value="" placeholder="Nom" class="form-control" name="name" id="name">
          </div>
					<div class="form-group  col-md-6">
            <input type="email" value="" placeholder="Adresse Email" class="form-control" name="email" id="email">
          </div>
					<div class="form-group  col-md-12">
            <textarea placeholder="Votre Message" class="form-control" name="message" id="message" rows="8"></textarea>
          </div>
					<div class="col-md-5" style="margin-top:15px; text-align:right;">
						<?php
							require_once('recaptchalib.php');
							echo recaptcha_get_html($_CONFIG['email']["captcha"]["public"]);
						?>
					</div>
					<div class="col-md-5 col-sm-push-1" style=" margin-top:65px;">
						<input type="submit" id="contact-submit" class="btn btn-primary col-md-8" value="Envoyer" />
					</div>
				</div>
			</form>

				<?php
					include("../parts/footer.php");
				?>
			</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../flatUI/js/vendor/video.js"></script>
		<script src="../flatUI/js/flat-ui.min.js"></script>
    </body>
</html>
