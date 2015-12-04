<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';

	$checkemail = isset($_GET['checkemail']) ? $_GET['checkemail'] : '';

	if ($checkemail == "1")
		echo "<script>alert('Check your email to confirm!');</script>";

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
		<link rel="stylesheet" href="css/styling.css">

		<!-- <link href="bootflat/css/bootflat.min.css" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


		<style type="text/css">
			html,body {
				height: 100%;
				margin: 0px;
				padding: 0px;
			}

			h1, .h1 {
				color: rgb(255, 255, 255);
			}

			.btn{
				color: rgb(255, 255, 255) !important;
				font-size: 18px;
    		padding-top: 8px;
			}

			/* mouse over link */
			a:hover {
			    text-decoration: underline;
			}
			.input-group-addon {
				background-color: #797979;
			}
		</style>

		<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
		<script src="../flatUI/js/vendor/jquery.min.js"></script>
  </head>

  <body>
		<div class="wrapper">
	    <div class="login-screen">
				<center>
					<h1>Récupération mot de passe</h1>
					<div style="max-width:600px;">
		        <div class="login-form">
							<form method="post" action="../inc/createAdminAccount.php" ENCTYPE="x-www-form-urlencoded">
			          <div class="input-group">
			            <input type="text" class="form-control login-field"  placeholder="Entrez le nom de votre association" id="email" name="email" aria-describedby="basic-addon2">
									<span class="input-group-addon" id="basic-addon2">@assos.utc.fr</span>
			          </div>
					  <br>

								<input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" VALUE=" Inscris moi Biatch !">
								<a class="login-link" href="index.php">Retour au panneau de connection !</a>
							</form>
		        </div>
					</div>
				</center>
			</div>

			<ul class="bg-bubbles">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../flatUI/js/vendor/video.js"></script>
		<script src="../flatUI/js/flat-ui.min.js"></script>
		<script src="js/index.js"></script>
  </body>
</html>
