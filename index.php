<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
		require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';
?>
<!DOCTYPE html>
<html>
	<head>

		<title><?php echo $_CONFIG["website"]["title"]; ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Loading Bootstrap -->
		<link href="flatUI/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Loading Flat UI -->
		<link href="flatUI/css/flat-ui.min.css" rel="stylesheet">

		<link rel="shortcut icon" href="img/favicon.ico">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
		<!--[if lt IE 9]>
			<script src="js/vendor/html5shiv.js"></script>
			<script src="js/vendor/respond.min.js"></script>
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="css/style.css" />

		<!-- <link href="bootflat/css/bootflat.min.css" rel="stylesheet" type="text/css" /> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


		<style type="text/css">
			body {
				padding-top: 60px;
				padding-bottom: 40px;
			}
		</style>

		<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
		<script src="flatUI/js/vendor/jquery.min.js"></script>

	</head>
	<body>
		<div class="container">
			<?php
				include("parts/header2.php");
			?>

			<div class="container">
				<div id="wrap">

					<div class="page-header">
						<a href="#" id="logout" class="btn btn-danger pull-right" style="display: none;"> Logout </a>
						<h1>Billetterie UTC - Vente de places</h1>
					</div>

					<?php
						if( !isset($_SESSION['login']) || $_SESSION['login'] == '')
						{
							echo '<p class="lead" id="lead">Veuillez vous connecter !</p>';
							echo '<p id="content">Pour pouvoir acheter des billets, vous devez vous authentifier... <br> ';
							echo '<a href="./inc/connect.php" class="btn btn-large btn-info pull-right" id="cas-connection"> Me connecter </a></p>';
						}
						else
						{
							echo '<p class="lead" id="lead">Allez fais ton shopping MotherF***er !</p>';
							echo '<p id="content">You are connected MotherF***er !!!<br> ';
							echo '<a href="inc/disconnect.php" class="btn btn-large btn-danger pull-right" id="cas-connection"> Me Déconnecter </a></p>';
						}
					?>
					<br><br><br>
				</div>
			</div>

			<?php
				include("parts/footer.php");
			?>

		</div>


		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="flatUI/js/vendor/video.js"></script>
		<script src="flatUI/js/flat-ui.min.js"></script>
	</body>
</html>
