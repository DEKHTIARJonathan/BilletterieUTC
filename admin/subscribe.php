<?php 
	// Page d'accueil : /index.php 
	header("Content-Type: text/html; charset=UTF-8"); 
	$error = isset($_GET['error']) ? $_GET['error'] : '';
	
	if ($error == "1")
		echo "<script>alert('Un champ n\'a pas été renseigné !');</script>";
	else if ($error == "2")
		echo "<script>alert('Les mots de passe ne correspondent pas !');</script>";
?>

<!DOCTYPE html>
<html >
  <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Billetterie UTC - Subscription Panel</title>
		

		<link rel="stylesheet" type="text/css" href="../css/style.css" />

        <link href="../bootstrap/css/bootstrap.min.css?dev=01" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <link href="../bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        
        <script src="../scripts/jquery-1.9.1.min.js"  ></script>
		
		<link rel="stylesheet" href="css/styling.css">
       

  </head>

  <body>

    <div class="wrapper">
		<div class="container">
			<div id="wrap">
				<?php
					include("../parts/header.php");
				?>
				<center><h1 style="margin-top:120px; margin-bottom:-50px;">Inscris toi MotherF***er !</h1></center>
				
				<div class="loginPanel">
				
					<form class="form" action="createAccount.php" method="post">
						<div class="input-append">
							<input class="span2" id="appendedInput" type="text" placeholder="Email Asso" style="height: 30px;"  name="email">
						<span class="add-on"  style="height: 30px; color:black;">@assos.utc.fr</span>
						</div><br>
						<input type="password" placeholder="Password" style="height: 30px;"  name="pass1"><br>
						<input type="password" placeholder="Password Confirm" style="height: 30px;" name="pass2"><br><br>
						<button type="submit" id="login-button">Inscris Moi Mécréant</button><br>
					</form>
					
					<div style="margin-top:-30px;">
					
						<?php
							include("../parts/footer.php");
						?>
					</div>
				
				</div>
				
				
				
			</div>
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
	
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/index.js"></script>
 
  </body>
</html>
