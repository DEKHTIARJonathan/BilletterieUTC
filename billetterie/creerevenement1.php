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
    
        <link rel="stylesheet" type="text/css" href="../css/style.css?dev=01" />
        
        <title> Billetterie UTC </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link href="../bootstrap/css/bootstrap.min.css?dev=01" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
              }
        </style>
        
        <link href="../bootstrap/css/bootstrap-responsive.min.css?dev=01" rel="stylesheet">
        
        <script src="../scripts/jquery-1.9.1.min.js?dev=01"  ></script>
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
				<h1><center>Création d'événement</center></h1>
				<br>
				<br>
				 <form role="form"><center>
				  <div class="form-group">
					  <label for="usr">Nom de l'événement :</label><br>
					  <input type="text" class="form-control" id="usr">
				  </div>
				  <br>
				  <div class="form-group">
					  <label for="usr">Nombre de places :</label><br>
					  <input type="text" class="form-control" id="usr">
				  </div>
				  <br>
				  <a href="creerevenement2.php" class="btn btn-primary" role="button">Suite -></a>
				 </center>
				</form>
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
    
        <script src="../bootstrap/js/bootstrap-modal.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
