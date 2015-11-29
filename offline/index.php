<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

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

        <?php
            include("../parts/header2.php");
        ?>

        <div class="container">

            <div class="jumbotron">
                 <h1>Installation du serveur Offline</h1>

                <p>
                    <br>Cette page a pour but de vous aider à paramétrer et utiliser la Billetterie Évènementielle de l'UTC.<br>
                    Vous y trouverez toutes les informations nécessaires afin de faire fonctionner le serveur Offline nécessaire lors de l'évènement.
                </p>

            </div>
            <!-- Example row of columns -->
            <div class="row">
                <div class="col-md-4">
                     <h2>Installation de Ubuntu</h2>

                    <p>
                        Pour faire fonctionner notre système, nous nous sommes basé sur l'utilisation d'un environnement Linux.<br><br>
                        Pour utiliser la Billetterie Évènementielle UTC, veuillez télécharger et installer Ubuntu ou Debian.<br><br><br>
                    </p>
                    <p align="center" style="margin-left:-20px;">
                        <a class="btn btn-info" href="http://www.ubuntu.com/download" target="_blank">Site Officiel de Ubuntu</a> <a class="btn btn-info" href="http://www.debian.org/distrib/" target="_blank">Site Officiel de Debian</a>
                    </p>
                </div>
                <div class="col-md-4">
                     <h2>Configuration du NFC</h2>

                    <p>
                        La badgeuse sur laquelle le système a été développé : <b>ACR122U USB NFC Reader</b><br><br>
                        Veuillez suivre le tutoriel présent sur cette page pour installer la badgeuse NFC, partie essentiel du système.<br><br><br>


                    <p align="center" style="margin-left:-20px;">
                        <a class="btn btn-info" style="width:170px;" href="../setup/" target="_blank">Installation du NFC</a>
                    </p>

                </div>
                <div class="col-md-4">
                     <h2>Installation du Serveur</h2>

                    <p>
                        Dans cette section vous trouverez les informations nécessaires pour paramétrer votre système Linux pour y installer le serveur offline.<br><br>
                        Veuillez vous munir de l'ordinateur connecté à Internet <br><br><br>
                    </p>
                    <p align="center" style="margin-left:-20px;">
                        <button type="button" class="btn btn-info btn-lg btn-modal" data-toggle="modal" data-target="#myModal">
                            Tutoriel d'installation
                        </button>
                    </p>

                </div>
            </div>

            <?php
                include("../parts/footer.php");
            ?>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Tutoriel d'installation</h4>
                        </div>
                        <div class="modal-body">
                            <div class="jumbotron" style="padding-top:20px;">
                                <h1>Installation du serveur Offline</h1><br>
                                <h4>En cas de problème lors de l'installation, vous pouvez utiliser le <a href="../contact/" target="_blank">formulaire de contact</a> pour nous en faire part.</h4
                                <br><br>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <h3>Menu</h3><br>
                                        <a href="#" class="btn btn-info btn-large" style="width: 95%;" name="div1">Installation du serveur</a><br><br>
                                        <a href="#" class="btn btn-info btn-large" style="width: 95%;" name="div2">Installation de l'application</a><br><br>
                                        <a href="#" class="btn btn-info btn-large" style="width: 95%;" name="div3">Lancement du Serveur</a><br><br>
                                        <a href="#" class="btn btn-info btn-large" style="width: 95%;" name="div4">Import / Export de la DB</a><br><br>
                                </div>
                                <div class="col-md-9" style="max-height : 370px; overflow:auto;">
                                    <div id="div1" style="display:none">
                                        <h3>Installation du serveur Linux Apache MySQL PHP</h3>

                                        Ouvrir un terminal et entrer : "<EM><b>apt-get update</b></EM>"<br><br>

                                        Toujours dans le même terminal entrer : "<EM><b>apt-get install apache2 php5 libapache2-mod-php5</b></EM>"<br><br>

                                        Toujours dans le même terminal entrer : "<EM><b>apt-get install mysql-server mysql-client php5-mysql</b></EM>"<br><br>

                                        <b><br><br>Maintenant une rapide configuration, toujours dans le terminal :</b>

                                        "<EM><b>mysql -u root</b></EM>"<br><br>
                                        Le prompt devrait maintenant montrer : <b>mysql></b><br><br>
                                        Nous allons donc rentrer les lignes suivantes : <br><br>
                                        "<EM><b>USE mysql;</b></EM>"<br>
                                        "<EM><b>UPDATE user SET Password=PASSWORD('billetterie') WHERE user='root';</b></EM>"<br>
                                        "<EM><b>FLUSH PRIVILEGES;</b></EM>"<br>
                                    </div>
                                    <div id="div2" style="display:none">
                                        <h3>Installation de la Web-Application Serveur Offline</h3>
                                        Télécharger notre logiciel maison : <a href="#" onClick="alert('Pas Encore Dispo');" class="btn btn-danger">Download</a><br>
                                    </div>
                                    <div id="div3" style="display:none">
                                        <h3>Lancement du Logiciel</h3>
                                        Ouvrir le navigateur et taper dans la barre d'adresse :  <a href="http://localhost/">http://localhost/</a>
                                        L'adresse IP est affichée dans le navigateur, c'est par celle que les ordinateurs en réseau avec l'ordinateur serveur
                                        pourront se connecter à celui.
                                    </div>
                                    <div id="div4" style="display:none">
                                        <h3>Import / Export de la Base de Donnée</h3>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas condimentum auctor orci at lacinia. Etiam ornare, quam eu semper tincidunt, erat elit ultricies orci, at vestibulum mi leo in est. Proin vitae orci sit amet metus porttitor tincidunt vitae sed quam. Etiam rutrum aliquet diam vel fringilla. Nam ut porta ipsum. Pellentesque sed bibendum velit. Proin eget nunc dui, eget ultrices leo. Nullam placerat tellus in sem cursus vel mollis nulla hendrerit. Suspendisse ac odio eu tellus hendrerit egestas eu et enim.<br><br>
                                        Fusce non lorem sed metus viverra iaculis quis eget risus. Curabitur cursus laoreet quam non commodo. Fusce velit dui, interdum non bibendum et, posuere sed turpis. Quisque sollicitudin pellentesque commodo. Donec in massa in erat tincidunt gravida. In neque lorem, egestas nec viverra quis, egestas ac nisl. Fusce dolor tellus, ultricies eget fermentum eu, cursus at nisl. Nam dignissim venenatis urna, commodo tincidunt ligula consequat in.
                                    </div>
                                    <div id="Start">
                                        <h3>Tutoriel d'installation</h3>
                                        Pour installer le serveur, veuillez suivre les étapes dans l'ordre du menu de gauche.<br><br>
                                        Seul un des ordinateurs ne nécessitera d'être capable de faire tourner le serveur et il pourra être utilisé
                                        simmultannément pour le contrôle des places.
                                        Cependant nous vous conseillons d'installer le serveur sur tous les ordinateurs pour palier à tout problème.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        <script>
            $(document).ready(function()
            {
                $('a').click(function ()
                {
                    var divname= this.name;
                    $("#"+divname).show("slow").siblings().hide("slow");
                });
            });
        </script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="../flatUI/js/vendor/video.js"></script>
        <script src="../flatUI/js/flat-ui.min.js"></script>

    </body>

</html>
