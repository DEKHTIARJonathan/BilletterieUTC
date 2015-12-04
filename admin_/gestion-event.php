<?php
	header("Content-Type: text/html; charset=UTF-8");
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>

	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<?php
            include("../parts/header.php");
    ?>

	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<?php
		include("parts/menu.php");
	?>

	<section id="main" class="column">
		<h4 class="alert_warning"><center>Gestion des événements</center></h4>

			<h1><center>Liste des événements</center></h1>


				</div>

				<div class="row">
					<table class="table">
						<tbody>
						  <tr class="success">
							<td><div class="span3"><img src="../images/upload/affiche.jpg" alt="affiche-evenement style="width=200px;height=200px"></div></td>
							<td><div class="span6"><br><h3><center>Estu Noel <br> <br> nombre de place restantes : 2 </center></h3></div></td>
							<td><div class="span3"><br><br><center><a href="modif-event.php" class="btn btn-warning" role="button"> Modifier l'événement </a><a href="billetterie.php" class="btn btn-danger" role="button">Supprimer l'événement</a></center></div></td>
						  </tr>
						  <tr class="warning">
							<td><div class="span3"><img src="../images/upload/affiche2.jpg" alt="affiche-evenement style="width=200px;height=200px"></div></td>
							<td><div class="span6"><br><h3><center>Hackathon<br> <br> nombre de place restantes : 0 </center></h3></div></td>
							<td><div class="span3"><br><br><center><a href="modif-event.php" class="btn btn-warning" role="button"> Modifier l'événement </a><a href="billetterie.php" class="btn btn-danger" role="button">Supprimer l'événement</a></center></div></td>
						  </tr>
						  <tr class="info">
							<td><div class="span3"><img src="../images/upload/affiche3.jpg" alt="affiche-evenement style="width=200px;height=200px"></div></td>
							<td><div class="span6"><br><h3><center>Ski UTC<br> <br> nombre de place restantes : 73 </center></h3></div></td>
							<td><div class="span3"><br><br><center><a href="modif-event.php" class="btn btn-warning" role="button"> Modifier l'événement </a><a href="billetterie.php" class="btn btn-danger" role="button">Supprimer l'événement</a></center></div></td>
						  </tr>
						</tbody>
					  </table>
						</div>
					</div>

				</div>

		<div class="clear"></div>
		<div class="spacer"></div>
	</section>

	<?php
            include("../parts/footer.php");
    ?>


</body>

</html>
