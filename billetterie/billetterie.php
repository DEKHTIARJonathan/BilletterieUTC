<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';
	require_once $root.'/inc/dbconnect.php';

	$eventID = isset($_GET['eventID']) ? $_GET['eventID'] : '';
	if ($eventID == "")
		header('Location: '.$_CONFIG['home']."billetterie/");
	else{
		$sth = $connexion->prepare('SELECT `t1`.`eventFlyer`, `t1`.`eventName`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `t2`.`eventID` = `t1`.`eventID` and `t1`.`eventID` = :eventID');

		$sth->bindParam(':eventID', $eventID);

		$sth->execute();
		$row = $sth->fetch();

		$flyer = $row["eventFlyer"];
		$placeLeft = $row["placeLeft"];
		$name = $row["eventName"];

	}


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
				<h1><center><?php echo $name; ?></center></h1>


			</div>

			<div class="row">
				<div class="col-md-5">
				<?php



					echo '<img src="../'.$flyer.'" alt="affiche-evenement">';
				?>


				</div>
				<div class="col-md-7">
					<table class="table">
						<thead>
						  <tr>
							<th>Type de place</th>
							<th>Prix de la place</th>
							<th>Nombre de place</th>
							<th>                </th>
						  </tr>
						</thead>
						<tbody>
							<?php
								$sth = $connexion->prepare('SELECT * FROM `tarifs` WHERE `eventID` = :eventID');
								$sth->bindParam(':eventID', $eventID);

								$sth->execute();

								$i = 0;

								while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
									$tarifID = $row["tarifID"];
									$eventID = $row["eventID"];
									$name = $row["tarifName"];
									$price = $row["price"];
									$maxByUser = $row["maxByUser"];

									if ($i % 3 == 0)
										echo '<tr class="success">';
									else if ($i % 3 == 1)
										echo '<tr class="warning">';
									else
										echo '<tr class="info">';
									$i = $i +1;

									echo '<td>'.$name.'</td>';
									echo '<td>'.$price.'&#8364</td>';
									echo '<td><div class="form-group"><select class="form-control" id="sel1">';

									for ($j = 1; $j <= $maxByUser; $j++) {
										echo '<option>'.$j.'</option>';
									}

									echo '</select></div></td>';
									echo '<td><button type="button" class="btn btn-success">Acheter</button></td>';
									echo '</tr>';
								}
							?>
						</tbody>
					  </table>
					<br>
					<h3><center>Nombre de place restantes : <?php echo $placeLeft; ?></center></h3>
					<br>
				</div>
			</div>

        </div>

            <?php
                include("../parts/footer.php");
            ?>

            <div class="modal hide fade" id="modal" style="display: none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-header"></h3>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div>


        </div>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../flatUI/js/vendor/video.js"></script>
		<script src="../flatUI/js/flat-ui.min.js"></script>
  </body>
</html>
