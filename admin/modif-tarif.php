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
		<h4 class="alert_info"><center>Création de nouveaux tarifs</center></h4>
		<div class="clear"></div>
		<div class="spacer"></div>
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved" style="margin-top:-5px;"></h3>
		</header>

		<div class="tab_container">
			<div style="display: block;" id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<tbody> 
			<tr> 
    				<td>Désignation :</td> 
    				<td><input type="date" class="form-control" id="usr"></td> 
				</tr> 
				<tr> 
    				<td>Type :</td> 
    				<td><select class="form-control" id="sel1">
							<option>Choisir un type</option>
							<option>Cotisant BDE</option>
							<option>Non cotisant BDE</option>
							<option>Extérieure</option>
						  </select>
					</td> 
				</tr>   
				<tr> 
    				<td>Prix :</td> 
    				<td><div class="input-append">
						  <input class="span2" id="appendedInput" type="text">
						  <span class="add-on">&#8364</span>
						</div></td> 
				</tr>
				<tr> 
    				<td>Choisissez votre affiche :</td> 
    				<td><input type="file" /></td> 
				</tr>
					<td>Nombre de places :</td> 
    				<td><input type="date" class="form-control" id="usr"></td> 
				<tr>
					<td></td>
					<td>		<a href="modif-event.php" class="btn btn-primary" role="button"> Créer le tarif </a></td>
				</tr>
				
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
	</section>
	
	<?php
            include("../parts/footer.php");
    ?>


</body>

</html>