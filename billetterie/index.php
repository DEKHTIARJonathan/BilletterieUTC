<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
  require_once $root.'/config.inc.php';
	require_once $root.'/inc/checksession.php';
	require_once $root.'/inc/dbconnect.php';
?>

<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="../css/style.css" />

        <title> Billetterie UTC </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
              }
        </style>

        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

        <script src="../scripts/jquery-1.9.1.min.js"  ></script>
        <!-- <script type="text/javascript" src="scripts/general.js" charset="utf-8"></script> -->


    </head>
    <body>

      <div class="container">
        <?php
            include("../parts/header.php");
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

							$sth = $connexion->prepare('SELECT `t1`.`eventID`, `t1`.`asso`, `t1`.`eventName`, `t1`.`eventDate`, `t1`.`eventFlyer`, `t1`.`eventTicketMax`, `t1`.`location`, `t2`.`placeLeft` FROM `events` as `t1`, (SELECT events.eventTicketMax - (SELECT COUNT(*) FROM `tickets`) as `placeLeft`, `eventID` FROM `events`) as `t2` WHERE `eventDate` >= CURDATE() and `t2`.`eventID` = `t1`.`eventID` order by `eventDate`;');

              $sth->execute();

							$i = 0;

              while ($row = $sth->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
								$id = $row["eventID"];
								$name = $row["eventName"];
								$asso = $row["asso"];
								$date = $row["eventDate"];
								$location = $row["location"];
								$eventFlyer = $row["eventFlyer"];
								$maxTickets = $row["eventTicketMax"];
								$ticketsLeft = $row["placeLeft"];

								if ($i % 3 == 0)
									echo '<tr class="success">';
								else if ($i % 3 == 1)
									echo '<tr class="warning">';
								else
									echo '<tr class="info">';
								$i = $i +1;

								echo'<td><div class="span3"><img src="../'.$eventFlyer.'" alt="affiche-evenement style="width=200px;height=200px"></div></td>
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

				<div class="modal hide fade" id="modal" style="display: none;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 id="modal-header"></h3>
					</div>
					<div class="modal-body" id="modal-body">
					</div>
				</div>


			</div>
		</div>

        <script src="../bootstrap/js/bootstrap-modal.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
