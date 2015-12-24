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

		</script>

		<ul class="main-menu" id="main-menu" style="">

			<li class="root-level" id="home">
				<a href="<?php echo $pre_url; ?>index.php"><i class="entypo-home"></i><span class="title">Accueil</span></a>
			</li>

			<?php
				if($_SESSION['admin']){
					echo '<li class="has-sub root-level" id="adminBilletterie">
						<a ><i class="entypo-gauge"></i><span class="title">Administration Billetterie</span></a>
						<ul id="adminBilletterieUL">
							<li id="createAsso">
								<a href="'.$pre_url.'createAsso.php"><span class="title">Création Association</span></a>
							</li>
							<li id="platformRights">
								<a href="'.$pre_url.'platformRights.php"><span class="title">Gestion des droits admins</span></a>
							</li>
						</ul>
					</li>';
				}
			?>

			<li class="has-sub root-level" id="adminAsso">
				<a ><i class="entypo-gauge"></i><span class="title">Mon association</span></a>
				<ul id="adminAssoUL">
					<li id="myAsso">
						<a href="<?php echo $pre_url; ?>myAsso.php"><span class="title">Paramètres de mon Association</span></a>
					</li>
					<li id="assoMembers">
						<a href="<?php echo $pre_url; ?>assoMembers.php"><span class="title">Gérer les membres</span></a>
					</li>
				</ul>
			</li>
			<li class="root-level" id="createEvent">
				<a href="<?php echo $pre_url; ?>createEvent.php"><i class="entypo-calendar"></i><span class="title">Créer un événement</span></a>
			</li>
			<li class="root-level" id="myEvents">
				<a href="<?php echo $pre_url; ?>myEvents.php"><i class="entypo-users"></i><span class="title">Gérer mes événements</span></a>
			</li>
			<li class="root-level">
				<a href="<?php echo $_CONFIG["website"]['home']; ?>"><i class="entypo-logout"></i><span class="title">Retour sur la Billetterie</span></a>
			</li>
			<li class="root-level">
				<a href="<?php echo $_CONFIG["website"]['home']; ?>inc/disconnect.php"><i class="entypo-logout"></i><span class="title">Déconnexion</span></a>
			</li>
		</ul>
	</div>
</div>


<script>


</script>
