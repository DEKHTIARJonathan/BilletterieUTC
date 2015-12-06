<?php
	// Page d'accueil : /index.php
	header("Content-Type: text/html; charset=UTF-8");
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	require_once $root.'/config.inc.php';
	require_once $root.'/inc/API.php';

	if (substr_count($_SERVER["REQUEST_URI"], '/') == 2)
		$pre_url = "./";
	else
		$pre_url = "../";

	$api = new API();
?>
<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="<?php echo $_CONFIG["website"]['home']; ?>admin/"><img alt="" src="assets/images/logo.png" width="120"></a>
			</div><!-- logo collapse icon -->
			<div class="sidebar-collapse">
				<a class="sidebar-collapse-icon" href="#">

				<i class="entypo-menu"></i></a>
			</div>

			<div class="sidebar-mobile-menu visible-xs">
				<a class="with-animation" href="#">
				<i class="entypo-menu"></i></a>
			</div>
			<div class="logo assoSelect">
				Mon Association :&nbsp;
				<select class="selectboxit visible" style="width:138px;" id="assoSelect">
					<optgroup label="Mes Associations">
						<?php
							if(!$_SESSION['admin']){
								for ($i = 0; $i < sizeof($_SESSION['assos']); $i++){
									echo '<option value="'.$_SESSION['assos'][$i].'">'.$_SESSION['assos'][$i].'</option>';
								}
							}
							else{
								$array = $api->getAllAssos();
								for ($i = 0; $i < sizeof($array); $i++){
									echo '<option value="'.$array[$i].'">'.$array[$i].'</option>';
								}
							}
						?>
				</select>
				<br><br>
			</div>
		</header>



		<script>
			$("#assoSelect").on('change', function() {
				window.location = "http://"+window.location.hostname + window.location.pathname + "?asso=" + this.value ; // or $(this).val()
			});
		</script>

		<ul class="main-menu" id="main-menu" style="">

			<li class="active has-sub root-level">
				<a href="<?php echo $pre_url; ?>index.php"><i class="entypo-home"></i><span class="title">Accueil</span></a>
			</li>

			<?php
				if($_SESSION['admin']){
					echo '<li class="opened has-sub root-level">
						<a ><i class="entypo-gauge"></i><span class="title">Administration Billetterie</span></a>
						<ul class="visible">
							<li>
								<a href="'.$pre_url.'index.php"><span class="title">Création Association</span></a>
							</li>
							<li>
								<a href="'.$pre_url.'index.php"><span class="title">Gestion des droits admin</span></a>
							</li>
						</ul>
					</li>';
				}
			?>

			<li class="has-sub root-level">
				<a ><i class="entypo-gauge"></i><span class="title">Mon association</span></a>
				<ul>
					<li>
						<a href="<?php echo $pre_url; ?>index.php"><span class="title">Paramètres Associations</span></a>
					</li>
					<li>
						<a href="<?php echo $pre_url; ?>index.php"><span class="title">Gérer les membres</span></a>
					</li>
				</ul>
			</li>
			<li class="root-level">
				<a href="<?php echo $pre_url; ?>index.php"><i class="entypo-calendar"></i><span class="title">Créer un événement</span></a>
			</li>
			<li class="root-level">
				<a href="<?php echo $pre_url; ?>index.php"><i class="entypo-users"></i><span class="title">Gérer mes événements</span></a>
			</li>
			<li class="root-level">
				<a href="<?php echo $_CONFIG["website"]['home']; ?>"><i class="entypo-logout"></i><span class="title">Retour sur la Billetterie</span></a>
			</li>
			<li class="root-level">
				<a href="<?php echo $pre_url; ?>../inc/disconnect.php"><i class="entypo-logout"></i><span class="title">Déconnexion</span></a>
			</li>
		</ul>
	</div>
</div>
