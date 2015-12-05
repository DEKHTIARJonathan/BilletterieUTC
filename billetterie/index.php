<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';
	require_once $root.'/inc/API.php';

	$api = new API();

	$eventID = isset($_GET['eventID']) ? $_GET['eventID'] : '';

	$matrix = $api->getAllEventsAlived();

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

        <div class="container">

			<div id="wrap">

				<div class="page-header">
					<a href="#" id="logout" class="btn btn-danger pull-right" style="display: none;"> Logout </a>
					<h1><center>Liste des événements</center></h1>


				</div>

				<div class="row">
					<table class="table">
						<tbody>

						<?php

							$i = 0;

							for ($i = 0; $i < sizeof($matrix["id"]); $i++) {
								$id = $matrix["id"][$i];
								$name = $matrix["name"][$i];
								$asso = $matrix["asso"][$i];
								$date = $matrix["date"][$i];
								$location = $matrix["location"][$i];
								$eventFlyer = $matrix["eventFlyer"][$i];
								$maxTickets = $matrix["maxTickets"][$i];
								$ticketsLeft = $matrix["ticketsLeft"][$i];

								if ($i % 3 == 0)
									echo '<tr class="success">';
								else if ($i % 3 == 1)
									echo '<tr class="warning">';
								else
									echo '<tr class="info">';

								echo'<td><div class="frame"><span class="helper"></span><img class="centered-img" src="../'.$eventFlyer.'" alt="affiche-evenement"></div></td>
									 <td><div class="span6"><br><h3><center>'.$name.' @ '.$location.'<br>- '.$date.' -<br> <br> nombre de place restantes : '.$ticketsLeft.' </center></h3></div></td>
									 <td><div class="span3"><br><br><center><br><br><a href="billetterie.php?eventID='.$id.'" class="btn btn-primary" role="button">Acheter des places</a></center></div></td>
									 </tr>';
							}
						?>
						</tbody>
					  </table>
						</div>
					</div>

				</div>

				<?php
					include("../parts/footer.php");
				?>

			</div>
		</div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../flatUI/js/vendor/video.js"></script>
		<script src="../flatUI/js/flat-ui.min.js"></script>
    </body>
</html>
