<?php
	if (substr_count($_SERVER["REQUEST_URI"], '/') == 1)
		$pre_url = "./";
	else
		$pre_url = "../";
?>
<div class="sidebar-menu">
	<div class="sidebar-menu-inner">
		<header class="logo-env">
			<!-- logo -->
			<div class="logo">
				<a href="index.html"><img alt="" src="assets/images/logo.png" width="120"></a>
			</div><!-- logo collapse icon -->
			<div class="sidebar-collapse">
				<a class="sidebar-collapse-icon" href="#">
				<!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i></a>
			</div>
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a class="with-animation" href="#">
				<!-- add class "with-animation" to support animation --> <i class="entypo-menu"></i></a>
			</div>
		</header>
		<ul class="main-menu" id="main-menu" style="">
			<li class="has-sub root-level">
				<a href="<?php echo $pre_url; ?>index.php"><i class="entypo-home"></i><span class="title">Accueil</span></a>
			</li>
			<li class="active opened active has-sub root-level">
				<a ><i class="entypo-gauge"></i><span class="title">Mes associations</span></a>
				<ul class="visible">
					<li class="active">
						<a href="<?php echo $pre_url; ?>index.php"><span class="title">Paramètres Associations</span></a>
					</li>
					<li>
						<a href="<?php echo $pre_url; ?>index.php"><span class="title">Gérer les membres</span></a>
					</li>
				</ul>
			</li>
			<li class="active opened active has-sub root-level">
				<a ><i class="entypo-gauge"></i><span class="title">Mon association</span></a>
				<ul class="visible">
					<li class="active">
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
				<a href="<?php echo $pre_url; ?>../inc/disconnect.php"><i class="entypo-logout"></i><span class="title">Déconnexion</span></a>
			</li>
		</ul>
	</div>
</div>
