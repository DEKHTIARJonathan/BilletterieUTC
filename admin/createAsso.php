<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';
	require_once $root.'/inc/checkadmin.php';

	$api = new API();

	$asso = isset($_GET['asso']) ? $_GET['asso'] : '';
	if ($asso != ''){
		if (!$api->checkRights($_SESSION['login'], $asso))
			$asso = $_SESSION['assos'][0];
	}
	else
		$asso = $_SESSION['assos'][0];

?>

<!doctype html>
<html lang="en">
<head>
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="Neon Admin Panel" name="description">
	<meta content="Laborator.co" name="author">
	<link href="assets/images/favicon.ico" rel="icon">
	<title><?php echo $_CONFIG["website"]["title"]; ?></title>
	<link href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"
	id="style-resource-1" rel="stylesheet">
	<link href="assets/css/font-icons/entypo/css/entypo.css" id="style-resource-2"
	rel="stylesheet">
	<link href=
	"../fonts.googleapis.com/cssdcaf.css?family=Noto+Sans:400,700,400italic" id=
	"style-resource-3" rel="stylesheet">
	<link href="assets/css/bootstrap.css" id="style-resource-4" rel="stylesheet">
	<link href="assets/css/neon-core.css" id="style-resource-5" rel="stylesheet">
	<link href="assets/css/neon-theme.css" id="style-resource-6" rel="stylesheet">
	<link href="assets/css/neon-forms.css" id="style-resource-7" rel="stylesheet">
	<link href="assets/css/style.css" id="style-resource-7" rel="stylesheet">
	<script src="assets/js/jquery-1.11.3.min.js">
	</script>
	<!--[if lt IE 9]>
	<script src="../scripts/ie8-responsive-file-warning.js"></script>
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

			<div class="row">

			</div>

		</div>

	<link href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css" id="style-resource-1" rel="stylesheet">
	<link href="assets/js/rickshaw/rickshaw.min.css" id="style-resource-2" rel="stylesheet">

	<script id="script-resource-1" src="assets/js/gsap/TweenMax.min.js"></script>
	<script id="script-resource-2" src=	"assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
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
	<script> <?php echo '$(\'#assoSelect option[value="'.$asso.'"]\').prop("selected", true);'; ?></script>

</body>
</html>
