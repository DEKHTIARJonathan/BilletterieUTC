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
    
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        
        <title> Billetterie UTC </title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
              }
        </style>
        
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        
        <script src="scripts/jquery-1.9.1.min.js"  ></script>
        <!-- <script type="text/javascript" src="scripts/general.js" charset="utf-8"></script> -->

        
    </head>
    <body>
    
      <div class="container">
        <?php
            include("parts/header.php");
        ?>
        
        <div class="container">
            <div id="wrap">
                
                    <div class="page-header">
                        <a href="#" id="logout" class="btn btn-danger pull-right" style="display: none;"> Logout </a>
                        <h1>Billetterie UTC - Vente de places</h1> 
                    </div>
                    <div id="alert" style="display: none;" class="alert alert-block">
                        <h4 id="alert-title">Alert title</h4>
                        <p id="alert-content">Alert content</p>        
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
         
            <div class="modal hide fade" id="modal" style="display: none;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 id="modal-header"></h3>
                </div>
                <div class="modal-body" id="modal-body">
                </div>
            </div>


        </div>
    
        <script src="bootstrap/js/bootstrap-modal.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
