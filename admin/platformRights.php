<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	// Checking the user is administrator of the platform.
	if(!$_SESSION['admin'])
		header('Location: '.$_CONFIG["website"]['home'].'admin/');

	$api = new API();

	$asso = isset($_GET['asso']) ? $_GET['asso'] : '';
	if ($asso != ''){
		if (!$api->checkRights($_SESSION['login'], $asso)){
			if (isset($_SESSION['currentAsso']))
			 $asso = $_SESSION['currentAsso'];
			else{
			 $asso = $_SESSION['assos'][0];
			 $_SESSION['currentAsso'] = $asso;
			}
		}
		else
			$_SESSION['currentAsso'] = $asso;
	}
	else{
		if (isset($_SESSION['currentAsso']))
		 $asso = $_SESSION['currentAsso'];
		else{
		 $asso = $_SESSION['assos'][0];
		 $_SESSION['currentAsso'] = $asso;
		}
	}

?>

<!doctype html>
<html lang="en">
<head>

	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">

	<link href="assets/images/favicon.ico" rel="icon">
	<title><?php echo $_CONFIG["website"]["title"]; ?></title>

	<link href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"	id="style-resource-1" rel="stylesheet">
	<link href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2" rel="stylesheet">
	<link href="fonts.googleapis.com/cssdcaf.css?family=Noto+Sans:400,700,400italic" id="style-resource-3" rel="stylesheet">
	<link href="assets/css/bootstrap.css" id="style-resource-4" rel="stylesheet">
	<link href="assets/css/neon-core.css" id="style-resource-5" rel="stylesheet">
	<link href="assets/css/neon-theme.css" id="style-resource-6" rel="stylesheet">
	<link href="assets/css/neon-forms.css" id="style-resource-7" rel="stylesheet">
	<link href="assets/css/style.css" id="style-resource-8" rel="stylesheet">

	<script src="assets/js/jquery-1.11.3.min.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo $root.'/scripts/ie8-responsive-file-warning.js'; ?>"></script>
	<![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body class="page-body page-fade">
	<div class="page-container">
		<?php
			include("parts/menu.php");
		?>

		<div class="main-content">

			<hr>

			<ol class="breadcrumb bc-3">
				<li><a href="<?php echo $_CONFIG["website"]['home']."admin"?>"><i class="fa-home"></i>Accueil</a></li>
				<li><a href="<?php echo $_CONFIG["website"]['home']."admin"?>">Administration Billetterie</a></li>
				<li class="active"><strong>Gestion des droits administrateurs</strong></li>
			</ol>

			<h2>Gestion des droits administrateurs</h2><br>
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-body">
							<form class="form-horizontal form-groups-bordered" role="form" method="post" action="<?php echo $_CONFIG["website"]['home']."inc/createAsso.php" ?>">
								<div class="form-group">
									<label class="col-sm-4 control-label" for="assoName">Nom du nouvel administrateur :</label>
									<div class="col-sm-8">
										<input autocomplete="off" class="form-control" id="userName" name="userName" placeholder="Ecrivez le nom du nouvel administrateur" type="text">
										<input id="userId" name="userId" type="hidden" value="">

										<ul class="dropdown-menu" id="proposalUL"></ul>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										<button class="btn btn-blue" type="submit">Envoyer la demande</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary" data-collapsed="0">
						<div class="panel-body">
							<form class="form-horizontal form-groups-bordered" role="form" method="post" action="<?php echo $_CONFIG["website"]['home']."inc/createAsso.php" ?>">
								<div class="form-group">
									<label class="col-sm-3 control-label" for="assoName">Nom de l'association :</label>
									<div class="col-sm-5">
										<input class="form-control" id="assoName" name="assoName" placeholder="Nom de votre association"	type="text">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="assoEmail">Adresse email associative :</label>
									<div class="col-sm-5">
										<input class="form-control" disabled id="assoEmail" type="text" placeholder="@assos.utc.fr">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label" for="payutcKey">PayUTC API Key :</label>
									<div class="col-sm-5">
										<input class="form-control" id="payutcKey" name="payutcKey" type="text" placeholder="Votre API Key PAYUTC">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-5">
										<button class="btn btn-blue" type="submit">Envoyer la création</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<link id="style-resource-1" rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
	<link id="style-resource-2" rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">
	<link id="style-resource-3" rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
	<link id="style-resource-4" rel="stylesheet" href="assets/js/select2/select2.css">
	<link id="style-resource-5" rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
	<link id="style-resource-6" rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
	<link id="style-resource-7" rel="stylesheet" href="assets/js/icheck/skins/minimal/_all.css">
	<link id="style-resource-8" rel="stylesheet" href="assets/js/icheck/skins/square/_all.css">
	<link id="style-resource-9" rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
	<link id="style-resource-10" rel="stylesheet" href="assets/js/icheck/skins/futurico/futurico.css">
	<link id="style-resource-11" rel="stylesheet" href="assets/js/icheck/skins/polaris/polaris.css">
	<link id="style-resource-12" rel="stylesheet" href="assets/js/dropzone/dropzone.css">

	<script id="script-resource-1" src="assets/js/gsap/TweenMax.min.js"></script>
	<script id="script-resource-2" src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script id="script-resource-3" src="assets/js/bootstrap.js"></script>
	<script id="script-resource-4" src="assets/js/joinable.js"></script>
	<script id="script-resource-5" src="assets/js/resizeable.js"></script>
	<script id="script-resource-6" src="assets/js/neon-api.js"></script>
	<script id="script-resource-7" src="assets/js/cookies.min.js"></script>
	<script id="script-resource-8" src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script id="script-resource-9" src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
	<script id="script-resource-10" src="assets/js/jquery.sparkline.min.js"></script>
	<script id="script-resource-11" src="assets/js/rickshaw/vendor/d3.v3.js"></script>
	<script id="script-resource-12" src="assets/js/rickshaw/rickshaw.min.js"></script>
	<script id="script-resource-13" src="assets/js/raphael-min.js"></script>
	<script id="script-resource-14" src="assets/js/morris.min.js"></script>
	<script id="script-resource-15" src="assets/js/toastr.js"></script>
	<script id="script-resource-16" src="assets/js/neon-chat.js"></script> <!-- JavaScripts initializations and stuff -->
	<script id="script-resource-17" src="assets/js/neon-custom.js"></script> <!-- Demo Settings -->
	<script id="script-resource-18" src="assets/js/neon-demo.js"></script>
	<script id="script-resource-19" src="assets/js/script.js"></script>
	<script id="script-resource-20" src="assets/js/select2/select2.min.js"></script>
	<script id="script-resource-21" src="assets/js/bootstrap-tagsinput.min.js"></script>
	<script id="script-resource-22" src="assets/js/typeahead.min.js"></script>
	<!--	<script id="script-resource-23" src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>	-->
	<script id="script-resource-24" src="assets/js/bootstrap-datepicker.js"></script>
	<script id="script-resource-25" src="assets/js/bootstrap-timepicker.min.js"></script>
	<script id="script-resource-26" src="assets/js/bootstrap-colorpicker.min.js"></script>
	<script id="script-resource-27" src="assets/js/moment.min.js"></script>
	<script id="script-resource-28" src="assets/js/daterangepicker/daterangepicker.js"></script>
	<script id="script-resource-29" src="assets/js/jquery.multi-select.js"></script>
	<script id="script-resource-30" src="assets/js/icheck/icheck.min.js"></script>
	<script id="script-resource-31" src="assets/js/dropzone/dropzone.js"></script>
	<script id="script-resource-32" src="assets/js/fileinput.js"></script>
	<script id="script-resource-33" src="assets/js/jquery.inputmask.bundle.js"></script>

	<script> <?php echo '$(\'#assoSelect option[value="'.$asso.'"]\').prop("selected", true);'; ?></script>
	<script>
		$('#userName').on('input', function() {
			var requestSTR = this.value;
			$("#proposalUL").removeClass("typeahead");
			$("#proposalUL").empty();
			if (requestSTR != ""){
				$.ajax({
				  url: "/inc/findPersonne.php",
				  type: "get", //send it through get method
				  data:{request:requestSTR},
					dataType: "json",
				  success: function(response) {
				    if (response["status"] != "OK")
							alert("KO");
						else {
							$.each(response["rslt"], function(i, item) {
								$("#proposalUL").append('<li class="proposal"><a href="#">'+item.prenom + " " + item.nom + " ("+item.login+")"+'</a></li>');
							});
							$("#proposalUL").addClass("typeahead");
							setCallBack();
						}
				  },
				  error: function(xhr) {
				    alert ("Error Fetching People from Ginger");
				  }
				});
			}
		});

		function setCallBack(){
			$(".proposal").on('click', function() {
				var fullName = $(this).text();
				$('#userName').val(fullName);
				$('#userId').val(fullName.substr(fullName.indexOf("(") + 1).slice(0,-1));
				$("#proposalUL").removeClass("typeahead");
				$("#proposalUL").empty();
			});
		}

	</script>

</body>
</html>
